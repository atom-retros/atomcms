<?php

namespace App\Services\Community;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class StaffService
{
    public function fetchStaffPositions(): Collection
    {
        $cacheEnabled = setting('enable_caching') === '1';

        if (Cache::has('staff_positions') && $cacheEnabled) {
            return Cache::get('staff_positions');
        }

        $employees = Permission::query()
            ->select('id', 'rank_name', 'badge', 'staff_color', 'job_description')
            ->where('hidden_rank', false)
            ->where('id', '>=', setting('min_staff_rank'))
            ->orderByDesc('id')
            ->with(['users' => function ($query) {
                $query->select('id', 'username', 'rank', 'look', 'hidden_staff')->where('hidden_staff', false);
            }])
            ->get();

        if ($cacheEnabled) {
            $cacheTimer = (int)setting('cache_timer');
            Cache::put('staff_positions', $employees, now()->addMinutes($cacheTimer));
        }

        return $employees;
    }
}
