<?php

namespace App\Providers;

use App\Nova\Ban;
use App\Nova\WordFilter;
use App\Nova\Permission;
use App\Nova\StaffApplication;
use App\Nova\PrivateChatlog;
use App\Nova\RoomChatlog;
use App\Nova\Room;
use App\Nova\Team;
use App\Nova\User;
use Laravel\Nova\Nova;
use App\Nova\Dashboards\Main;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Atom\Core\Models\WebsiteSetting;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::mainMenu(fn () => [
            MenuSection::dashboard(Main::class)
                ->icon('home'),

            MenuSection::make('Hotel', [
                MenuItem::resource(Ban::class),
                MenuItem::resource(Permission::class),
                MenuItem::resource(Room::class),
                MenuItem::resource(Team::class),
                MenuItem::resource(StaffApplication::class),
                MenuItem::resource(User::class),
                MenuItem::resource(WordFilter::class),
                MenuItem::resource(PrivateChatlog::class),
                MenuItem::resource(RoomChatlog::class),
            ])->icon('server')->collapsable(),

            MenuSection::make('Website', [
                // MenuItem::resource(Permission::class),
            ])->icon('globe')->collapsable(),

            MenuSection::make('Emulator', [
                // MenuItem::resource(Permission::class),
            ])->icon('server')->collapsable(),
        ]);
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define(
            'viewNova',
            fn ($user) => $user->rank >= WebsiteSetting::firstWhere('key', 'min_staff_rank')->value,
        );
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
