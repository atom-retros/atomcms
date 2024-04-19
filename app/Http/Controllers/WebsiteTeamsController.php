<?php

namespace App\Http\Controllers;

use App\Models\WebsiteTeam;
use App\Services\Community\TeamService;
use Illuminate\View\View;

class WebsiteTeamsController extends Controller
{
    public function __construct(private readonly TeamService $teamService)
    {
    }

    public function __invoke(): View
    {
        $employees = $this->teamService->fetchTeams();
        return view('community.teams', [
            'employees' => $employees,
        ]);
    }
}
