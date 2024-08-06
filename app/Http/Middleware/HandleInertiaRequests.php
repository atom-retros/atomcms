<?php

namespace App\Http\Middleware;

use Atom\Core\Models\User;
use Atom\Core\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'online' => User::whereOnline('1')->count(),
            'settings' => WebsiteSetting::pluck('value', 'key'),
            'locale' => Session::get('locale') ?: app()->getLocale(),
            'supported_locales' => config('locale.supported_locales'),
            'i18n' => __('*'),
            'auth.user' => fn () => $request->user() ? array_merge($request->user()->toArray()) : null,
        ]);
    }
}
