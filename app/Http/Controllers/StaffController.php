<?php

namespace App\Http\Controllers;

use App\Models\Permission;

class StaffController extends Controller
{
    public function __invoke()
    {
        return view('community.staff', [
            'employees' => Permission::query()
                ->select('id', 'rank_name')
                ->where('id', '>=', setting('min_staff_rank'))
                ->orderByDesc('id')
                ->with('users')
                ->get(),
        ]);
    }
}