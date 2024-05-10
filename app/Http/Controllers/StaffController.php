<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StaffController extends Controller
{
    public function __invoke(): View
    {
        $employees = $this->getPositionsWithUsers();

        return view('community.staff', [
            'employees' => $employees,
        ]);
    }

    private function getPositionsWithUsers()
    {
        return Permission::query()
            ->select('id', 'rank_name', 'badge', 'staff_color', 'job_description')
            ->when(Auth::user()->rank < (int)setting('min_rank_to_see_hidden_staff'), function ($query) {
                return $query->where('hidden_rank', false);
            })
            ->where('id', '>=', setting('min_staff_rank'))
            ->orderByDesc('id')
            ->with(['users' => function ($query) {
                $query->select('id', 'username', 'rank', 'look', 'hidden_staff')
                    ->when(Auth::user()->rank < (int)setting('min_rank_to_see_hidden_staff'), function ($query) {
                        return $query->where('hidden_staff', false);
                    });
            }])
            ->get();
    }
}
