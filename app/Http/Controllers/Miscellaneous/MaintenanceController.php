<?php

namespace App\Http\Controllers\Miscellaneous;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class MaintenanceController extends Controller
{
    public function __invoke(): View
    {
        return view('maintenance');
    }
}
