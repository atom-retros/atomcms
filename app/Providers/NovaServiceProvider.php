<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use App\Nova\Dashboards\Main;
use Laravel\Nova\Menu\MenuItem;
use Illuminate\Support\Facades\DB;
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
                MenuItem::resource(\App\Nova\Badge::class),

                MenuItem::resource(\App\Nova\RoomAds::class),

                MenuItem::resource(\App\Nova\Ban::class)
                    ->withBadge($this->badge('bans'), 'info'),

                MenuItem::resource(\App\Nova\Permission::class)
                    ->withBadge($this->badge('permissions'), 'info'),

                MenuItem::resource(\App\Nova\Room::class)
                    ->withBadge($this->badge('rooms'), 'info'),

                MenuItem::resource(\App\Nova\Team::class)
                    ->withBadge($this->badge('website_teams'), 'info'),

                MenuItem::resource(\App\Nova\StaffApplication::class)
                    ->withBadge($this->badge('website_staff_applications'), 'warning'),

                MenuItem::resource(\App\Nova\User::class)
                    ->withBadge($this->badge('users'), 'info'),

                MenuItem::resource(\App\Nova\WordFilter::class)
                    ->withBadge($this->badge('wordfilter'), 'info'),

                MenuItem::resource(\App\Nova\PrivateChatlog::class)
                    ->withBadge($this->badge('chatlogs_private'), 'danger'),

                MenuItem::resource(\App\Nova\RoomChatlog::class)
                    ->withBadge($this->badge('chatlogs_room'), 'danger'),
            ])->icon('server')->collapsable(),

            MenuSection::make('Website', [
                MenuItem::resource(\App\Nova\WebsiteSetting::class)
                    ->withBadge($this->badge('website_settings'), 'danger'),

                MenuItem::resource(\App\Nova\WebsiteRuleCategory::class)
                    ->withBadge($this->badge('website_rule_categories'), 'info'),

                MenuItem::resource(\App\Nova\WebsiteArticle::class)
                    ->withBadge($this->badge('website_articles'), 'info'),

                MenuItem::resource(\App\Nova\WebsiteBetaCode::class)
                    ->withBadge($this->badge('website_beta_codes', ['user_id' => null]), 'info'),

                MenuItem::resource(\App\Nova\WebsiteBlackList::class)
                    ->withBadge($this->badge('website_ip_blacklist'), 'danger'),

                MenuItem::resource(\App\Nova\WebsiteWhiteList::class)
                    ->withBadge($this->badge('website_ip_whitelist'), 'danger'),

                MenuItem::resource(\App\Nova\WebsiteHelpCenter::class)
                    ->withBadge($this->badge('website_help_center_categories'), 'info'),

                MenuItem::resource(\App\Nova\WebsiteSupportTicket::class)
                    ->withBadge($this->badge('website_help_center_tickets', ['open' => '1']), 'warning'),
            ])->icon('globe')->collapsable()->collapsedByDefault(),

            MenuSection::make('Furniture', [
                MenuItem::resource(\App\Nova\Furniture::class)
                    ->withBadge($this->badge('items_base'), 'info'),

                MenuItem::resource(\App\Nova\CatalogPage::class)
                    ->withBadge($this->badge('catalog_pages'), 'info'),

                MenuItem::resource(\App\Nova\BuildersClubCatalogPage::class)
                    ->withBadge($this->badge('catalog_pages_bc'), 'info'),

                MenuItem::resource(\App\Nova\CatalogClubOffer::class)
                    ->withBadge($this->badge('catalog_club_offers'), 'info'),

                MenuItem::resource(\App\Nova\CatalogTargetOffer::class)
                    ->withBadge($this->badge('catalog_target_offers'), 'info'),

                MenuItem::resource(\App\Nova\CatalogFeaturedPage::class)
                    ->withBadge($this->badge('catalog_featured_pages'), 'info'),

                MenuItem::resource(\App\Nova\CatalogClothing::class)
                    ->withBadge($this->badge('catalog_clothing'), 'info'),
            ])->icon('briefcase')->collapsable()->collapsedByDefault(),

            MenuSection::make('Emulator', [
                MenuItem::resource(\App\Nova\EmulatorSetting::class)
                    ->withBadge($this->badge('emulator_settings'), 'danger'),

                MenuItem::resource(\App\Nova\EmulatorText::class)
                    ->withBadge($this->badge('emulator_texts'), 'danger'),
            ])->icon('server')->collapsable()->collapsedByDefault(),
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
            fn ($user) => $user->rank >= WebsiteSetting::firstWhere('key', 'min_housekeeping_rank')?->value ?? 6,
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
     * Get the badge status for a resource.
     */
    public function badge(string $table, array $where = []): callable
    {
        return fn () => DB::table($table)
            ->where($where)
            ->count();
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
