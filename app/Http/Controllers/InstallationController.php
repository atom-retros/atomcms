<?php

namespace App\Http\Controllers;

use App\Models\WebsiteInstallation;
use App\Models\WebsiteSetting;
use App\Rules\ValidateInstallationKeyRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class InstallationController extends Controller
{
    public function index()
    {
        foreach (config('setup.installation.tables') as $table) {
            if (Schema::hasTable($table)) {
                continue;
            }

            Artisan::call("migrate", ['--path' => "database/migrations/" . findMigration($table)]);
            Artisan::call("db:seed");
        }

        return view('installation.index');
    }

    public function storeInstallationKey(Request $request)
    {
        $request->validate([
           'installation_key' => ['required', 'string', 'max:255', new ValidateInstallationKeyRule],
        ]);

        WebsiteInstallation::first()->update([
            'step' => 1,
            'user_ip' => $request->ip(),
        ]);

        return to_route('installation.show-step', 1);
    }

    public function showStep($currentStep)
    {
        $step = (int)$currentStep;

        $settings = match ($step) {
            1 => $this->getStepOneSettings(),
            2 => $this->getStepTwoSettings(),
            3 => $this->getStepThreeSettings(),
            4 => $this->getStepFourSettings(),
            5 => [], // Left empty as this is the completion step
            default => throw new \Exception('Step does not exist'),
        };

        return view('installation.step-' . $step, [
            'settings' => $settings,
        ]);
    }

    public function saveStepSettings(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            WebsiteSetting::where('key', '=', $key)->update([
                'value' => $value
            ]);
        }

        WebsiteInstallation::increment('step');

        return to_route('installation.show-step', WebsiteInstallation::first()->step);
    }

    public function previousStep()
    {
        WebsiteInstallation::decrement('step');

        return to_route('installation.show-step', WebsiteInstallation::first()->step);
    }

    public function restartInstallation()
    {
        WebsiteInstallation::first()->update([
            'step' => 0,
            'installation_key' => Str::uuid(),
            'user_ip' => null,
        ]);

        return to_route('installation.index');
    }

    public function completeInstallation()
    {
        $installation = WebsiteInstallation::first();
        $installation->update([
            'step' => $installation->step + 1,
            'completed' => true,
        ]);

        return to_route('welcome');
    }

    private function getStepOneSettings()
    {
        return $this->getSettingsForStep(['theme', 'hotel_name', 'rcon_ip', 'rcon_port', 'avatar_imager', 'discord_invitation_link', 'discord_widget_id']);
    }

    private function getStepTwoSettings()
    {
        return $this->getSettingsForStep(['start_motto', 'start_credits', 'start_duckets', 'start_diamonds', 'start_points', 'start_look', 'max_accounts_per_ip']);
    }

    private function getStepThreeSettings()
    {
        return $this->getSettingsForStep(['referrals_needed', 'referral_reward_amount', 'min_staff_rank', 'maintenance_message', 'requires_beta_code', 'disable_registration', 'cms_color_mode']);
    }

    private function getStepFourSettings()
    {
        return $this->getSettingsForStep(['give_hc_on_register', 'hc_on_register_duration', 'max_comment_per_article', 'website_wordfilter_enabled', 'vpn_block_enabled', 'ipdata_api_key', 'housekeeping_url']);
    }

    private function getSettingsForStep(array $settings)
    {
        return WebsiteSetting::query()
            ->whereIn('key', $settings)
            ->select(['key', 'value', 'comment'])
            ->get();

        /*
         * return WebsiteSetting::query()
            ->whereIn('key', $settings)
            ->select(['key', 'value', 'comment'])
            ->get()
            ->mapWithKeys(function ($setting) {
                return [$setting->key => [
                    'value' => $setting->value,
                    'comment' => $setting->comment,
                ]];
            });
         * */
    }
}
