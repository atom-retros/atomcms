<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use App\Nova\Dashboards\Main;
use Laravel\Nova\Menu\MenuItem;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Menu\MenuSection;
use Atom\Core\Models\WebsiteSetting;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Actions\ActionEvent;
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

                MenuItem::resource(\App\Nova\CatalogImage::class),

                MenuItem::resource(\App\Nova\Ban::class),

                MenuItem::resource(\App\Nova\Permission::class),

                MenuItem::resource(\App\Nova\Room::class),

                MenuItem::resource(\App\Nova\Guild::class),

                MenuItem::resource(\App\Nova\Team::class),

                MenuItem::resource(\App\Nova\StaffApplication::class),

                MenuItem::resource(\App\Nova\User::class),
                
                MenuItem::resource(\App\Nova\WordFilter::class),

                MenuItem::resource(\App\Nova\BannedUsername::class),

                MenuItem::resource(\App\Nova\PrivateChatlog::class),

                MenuItem::resource(\App\Nova\RoomChatlog::class),
            ])->icon('server')->collapsable(),

            MenuSection::make('Config', [
                MenuItem::resource(\App\Nova\UiText::class),

                MenuItem::resource(\App\Nova\ProductData::class),

                MenuItem::resource(\App\Nova\FurnitureData::class),
            ])->icon('cog')->collapsable(),

            MenuSection::make('Website', [
                MenuItem::resource(\App\Nova\WebsiteSetting::class),

                MenuItem::resource(\App\Nova\WebsiteHomeCategory::class),

                MenuItem::resource(\App\Nova\WebsiteHomeItem::class),

                MenuItem::resource(\App\Nova\WebsiteRuleCategory::class),
            
                MenuItem::resource(\App\Nova\WebsiteArticle::class),

                MenuItem::resource(\App\Nova\WebsiteOpenPosition::class),

                MenuItem::resource(\App\Nova\WebsiteRareValueCategory::class),

                MenuItem::resource(\App\Nova\WebsiteRareValue::class),


                MenuItem::resource(\App\Nova\WebsiteCollectible::class),
                
                MenuItem::resource(\App\Nova\CameraWeb::class)
                    ->withBadge($this->badge('camera_web', ['approved' => 0]), 'warning'),

                MenuItem::resource(\App\Nova\WebsiteBetaCode::class),

                MenuItem::resource(\App\Nova\WebsiteBlackList::class),

                MenuItem::resource(\App\Nova\WebsiteWhiteList::class),

                MenuItem::resource(\App\Nova\WebsiteHelpCenter::class),

                MenuItem::resource(\App\Nova\WebsiteSupportTicket::class)
                    ->withBadge($this->badge('website_help_center_tickets', ['open' => 1]), 'danger'),
            ])->icon('globe')->collapsable()->collapsedByDefault(),

            MenuSection::make('Shop', [
                MenuItem::resource(\App\Nova\WebsiteShopCategory::class),

                MenuItem::resource(\App\Nova\WebsiteShopArticle::class),
                
                MenuItem::resource(\App\Nova\WebsiteShopVoucher::class),
            ])->icon('credit-card')->collapsable()->collapsedByDefault(),

            MenuSection::make('Furniture', [
                MenuItem::resource(\App\Nova\Furniture::class),

                MenuItem::resource(\App\Nova\CatalogPage::class),

                MenuItem::resource(\App\Nova\BuildersClubCatalogPage::class),

                MenuItem::resource(\App\Nova\CatalogClubOffer::class),

                MenuItem::resource(\App\Nova\CatalogTargetOffer::class),

                MenuItem::resource(\App\Nova\CatalogFeaturedPage::class),

                MenuItem::resource(\App\Nova\CatalogClothing::class),
            ])->icon('briefcase')->collapsable()->collapsedByDefault(),

            MenuSection::make('Emulator', [
                MenuItem::resource(\App\Nova\EmulatorSetting::class),

                MenuItem::resource(\App\Nova\EmulatorText::class),
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
