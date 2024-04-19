<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Services\Community\StaffService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class StaffController extends Controller
{
    public function __construct(private readonly StaffService $staffService)
    {
    }

    public function __invoke(): View
    {
        $employees = $this->staffService->fetchStaffPositions();

        return view('community.staff', [
            'employees' => $employees,
        ]);
    }
}
