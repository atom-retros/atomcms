<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use App\Models\Room;
use App\Models\User;
use App\Models\Camera;
use App\Models\ItemDefinition;
use Illuminate\Support\Number;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TopDashboardOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(__('filament::resources.stats.users_count.title'), Number::format(User::count(), '0', '1', app()->getLocale()))
                ->description(__('filament::resources.stats.users_count.description'))
                ->chart([20, 20])
                ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
                ->color('success'),

            Stat::make(__('filament::resources.stats.furniture_count.title'), Number::format(ItemDefinition::count(), '0', '1', app()->getLocale()))
                ->description(__('filament::resources.stats.furniture_count.description'))
                ->descriptionIcon('heroicon-m-cube', IconPosition::Before)
                ->chart([20, 20])
                ->color('danger'),

            Stat::make(__('filament::resources.stats.rooms_count.title'), Number::format(Room::count(), '0', '1', app()->getLocale()))
                ->description(__('filament::resources.stats.rooms_count.description'))
                ->descriptionIcon('heroicon-m-building-storefront', IconPosition::Before)
                ->chart([20, 20])
                ->color('warning'),

            Stat::make(__('filament::resources.stats.photos_count.title'), Number::format(Camera::count(), '0', '1', app()->getLocale()))
                ->description(__('filament::resources.stats.photos_count.description'))
                ->descriptionIcon('heroicon-m-camera', IconPosition::Before)
                ->chart([20, 20])
                ->color('primary'),
        ];
    }
}
