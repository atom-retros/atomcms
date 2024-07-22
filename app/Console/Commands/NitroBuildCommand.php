<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use function Laravel\Prompts\progress;
use Symfony\Component\Process\Process;

class NitroBuildCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nitro:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The command for building the Nitro assets.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        progress(
            label: 'Pulling down the nitro directories',
            steps: ['git submodule init', 'git submodule update'],
            callback: fn (string $command) => $this->executeCommand($command),
        );

        progress(
            label: 'Generating symlinks',
            steps: array_map(fn (string $fileName) => sprintf('ln -sfn %s %s', base_path('nitro/' . $fileName), public_path($fileName)), ['nitro-swf', 'nitro-assets']),
            callback: fn (string $command) => $this->executeCommand($command),
        );

        progress(
            label: 'Generating the nitro converter configuration file',
            steps: [config('nitro-converter')],
            callback: fn (array $config) => $this->createConfigFile($config, base_path('nitro/nitro-converter/configuration.json')),
        );

        progress(
            label: 'Generating the nitro renderer config file.',
            steps: [config('nitro-react.renderer-config')],
            callback: fn (array $config) => $this->createConfigFile($config, base_path('nitro/nitro-react/public/renderer-config.json')),
        );

        progress(
            label: 'Build and run the nitro converter.',
            steps: ['yarn', 'yarn build', 'yarn start'],
            callback: fn (string $command) => $this->executeCommand($command, 'nitro/nitro-converter'),
        );

        progress(
            label: 'Merging the assets into the nitro-assets directory.',
            steps: ['cp -r ' . base_path('nitro/nitro-converter/assets/*') . ' ' . base_path('nitro/nitro-assets')],
            callback: fn (string $command) => $this->executeCommand($command),
        );

        progress(
            label: 'Generating the nitro UI config file.',
            steps: [config('nitro-react.ui-config')],
            callback: fn (array $config) => $this->createConfigFile($config, base_path('nitro/nitro-react/public/ui-config.json')),
        );

        progress(
            label: 'Build and run nitro react.',
            steps: ['yarn', 'yarn build:prod'],
            callback: fn (string $command) => $this->executeCommand($command, 'nitro/nitro-react'),
        );

        progress(
            label: 'Manipulate the nitro files to work with the Laravel application.',
            steps: ['cp dist/assets/index-*.js dist/assets/index.js', 'cp dist/assets/nitro-renderer-*.js dist/assets/nitro-renderer.js', 'cp dist/assets/vendor-*.js dist/assets/vendor.js', 'sed -i.bak \'s/\/src\//\/dist\/src\//g\' dist/src/assets/index.css'],
            callback: fn (string $command) => $this->executeCommand($command, 'nitro/nitro-react'),
        );

        progress(
            label: 'Symlink the nitro files to the public directory.',
            steps: ['ln -sfn ' . base_path('nitro/nitro-react/dist') . ' ' . public_path('dist')],
            callback: fn (string $command) => $this->executeCommand($command),
        );
    }

    /**
     * Merge the configuration file.
     */
    protected function createConfigFile(array $config, string $path): void
    {
        file_put_contents($path, json_encode($config, JSON_PRETTY_PRINT));
    }

    /**
     * Execute a generic command.
     */
    protected function executeCommand(string $command, string $basePath = ''): void
    {
        $process = Process::fromShellCommandline(
            command: $command,
            cwd: base_path($basePath),
            timeout: null,
        );

        $process->run(fn ($type, $line) => $this->output->write($line));

        if (! $process->isSuccessful()) {
            $this->error('Command failed: ' . $command);
            exit(1);
        }
    }
}
