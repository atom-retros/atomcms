<?php

namespace App\Http\Controllers;

class MaintenanceController extends Controller
{
    public function __invoke()
    {
        return view('maintenance');
    }
}