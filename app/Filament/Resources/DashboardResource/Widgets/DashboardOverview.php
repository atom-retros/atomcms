<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use App\Models\User;
use Atom\Core\Models\CatalogItem;
use Atom\Core\Models\Room;
use Atom\Core\Models\WebsiteArticle;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardOverview extends BaseWidget
{
    /**
     * The widget statistics.
     */
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::count()),
            Stat::make('Furniture', CatalogItem::count()),
            Stat::make('Rooms', Room::count()),
            Stat::make('News Articles', WebsiteArticle::count()),
        ];
    }
}
