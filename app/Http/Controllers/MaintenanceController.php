<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MaintenanceController extends Controller
{
    public function __invoke(): View
    {
        return view('maintenance');
    }
}
