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
                ->where('hidden_rank', false)
                ->orderByDesc('id')
                ->with(['users', function ($query) {
                    $query->where('hidden_staff', false);
                }])
                ->get(),
        ]);
    }
}