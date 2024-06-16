<?php

namespace App\Http\Middleware;

use App\Models\Miscellaneous\WebsiteInstallation;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class InstallationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $this->ensureInstallationTableExists();

        $installation = $this->getInstallation();

        if ($installation->completed) {
            return $this->redirectToWelcomeIfInstalled($request, $next);
        }

        $isInstallationStepHandled = $this->handleInstallationSteps($request, $installation);

        if (!$isInstallationStepHandled) {
            return $this->redirectIfNotCompleted($installation);
        }

        return $next($request);
    }

    private function ensureInstallationTableExists()
    {
        if (!Schema::hasTable('website_installation')) {
            Artisan::call("migrate", ['--path' => "database/migrations/" . findMigration('website_installation')]);
        }

        if (!Schema::hasTable('sessions')) {
            Artisan::call("migrate", ['--path' => "database/migrations/" . findMigration('sessions')]);
        }
    }

    private function getInstallation()
    {
        if (WebsiteInstallation::doesntExist()) {
            return WebsiteInstallation::create([
                'installation_key' => Str::uuid()
            ]);
        }

        return WebsiteInstallation::first();
    }

    private function handleInstallationSteps(Request $request, WebsiteInstallation $installation)
    {
        if ($this->isWelcomeStep($request, $installation)) {
            return true;
        }

        if ($this->isRedirectToWelcome($request, $installation)) {
            return false;
        }

        if ($this->isInvalidAccess($request, $installation)) {
            abort(403);
        }

        if ($this->isInvalidStep($request)) {
            return false;
        }

        if ($this->isMismatchedStep($request, $installation)) {
            return false;
        }

        return true;
    }

    private function isWelcomeStep(Request $request, WebsiteInstallation $installation)
    {
        return $installation->step === 0 && $request->getRequestUri() === '/installation';
    }

    private function isRedirectToWelcome(Request $request, WebsiteInstallation $installation)
    {
        return $installation->step === 0 && $request->getRequestUri() !== '/installation' && $request->method() !== 'POST';
    }

    private function isInvalidAccess(Request $request, WebsiteInstallation $installation)
    {
        return $installation->step > 0 && $request->ip() !== $installation->user_ip;
    }

    private function isInvalidStep(Request $request)
    {
        return !$this->isValidStep($request) && $this->isNonPostRequest($request);
    }

    private function isMismatchedStep(Request $request, WebsiteInstallation $installation)
    {
        return $this->getCurrentStep($request) !== $installation->step && $this->isNonPostRequest($request);
    }

    private function isValidStep(Request $request)
    {
        $step = $this->getCurrentStep($request);
        return filter_var($step, FILTER_VALIDATE_INT) !== false;
    }

    private function isNonPostRequest(Request $request)
    {
        return $request->method() !== 'POST' || $request->is('restart-installation');
    }

    private function getCurrentStep(Request $request)
    {
        return (int) Str::after($request->path(), 'step/');
    }

    private function redirectToStep(int $step)
    {
        return to_route('installation.show-step', $step);
    }

    protected function redirectIfNotCompleted(WebsiteInstallation $installation)
    {
        if ($installation->step === 0) {
            return to_route('installation.index');
        }

        return $this->redirectToStep($installation->step ?: 0);
    }

    private function redirectToWelcomeIfInstalled(Request $request, Closure $next)
    {
        if ($request->is('installation*')) {
            return to_route('welcome');
        }

        return $next($request);
    }
}
