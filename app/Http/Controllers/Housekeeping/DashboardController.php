<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('housekeeping.dashboard');
    }
}
