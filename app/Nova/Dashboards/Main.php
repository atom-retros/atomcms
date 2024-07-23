<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\AnalyticCard;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new AnalyticCard(
                model: \Atom\Core\Models\User::class,
                icon: 'users',
            ),
            new AnalyticCard(
                model: \Atom\Core\Models\ItemBase::class,
                title: 'Furniture',
                icon: 'briefcase',
            ),
            new AnalyticCard(
                model: \Atom\Core\Models\Ban::class,
                icon: 'ban',
            ),
            new AnalyticCard(
                model: \Atom\Core\Models\WebsiteHelpCenterTicket::class,
                title: 'Support Tickets',
                icon: 'ticket',
            ),
            new AnalyticCard(
                model: \Atom\Core\Models\WebsiteArticle::class,
                title: 'News Articles',
                icon: 'newspaper',
            ),
            new AnalyticCard(
                model: \Atom\Core\Models\Room::class,
                icon: 'home',
            ),
        ];
    }
}
