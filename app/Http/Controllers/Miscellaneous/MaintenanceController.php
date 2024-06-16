<?php

namespace App\Http\Controllers\Miscellaneous;

use App\Http\Controllers\Controller;
use App\Models\Miscellaneous\WebsiteMaintenanceTask;
use Illuminate\View\View;

class MaintenanceController extends Controller
{
    public function __invoke(): View
    {
        return view('maintenance', [
            'tasks' => WebsiteMaintenanceTask::with('user:id,username,look')->simplePaginate(5),
        ]);
    }
}
