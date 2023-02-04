<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffApplicationFormRequest;
use App\Models\WebsiteOpenPosition;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class StaffApplicationsController extends Controller
{
    public function index(): Response
    {
        return view('community.staff-applications', [
            'positions' => WebsiteOpenPosition::canApply()->with('permission')->get(),
        ]);
    }

    public function show(WebsiteOpenPosition $position): Response
    {
        return view('community.staff-applications-apply', [
            'position' => $position->load('permission'),
        ]);
    }

    public function store(WebsiteOpenPosition $position, StaffApplicationFormRequest $request): RedirectResponse
    {
        if ($request->user()->applications()->where('rank_id', $position->permission->id)->exists()) {
            return redirect()->back()->withErrors([
                'message' => __('You have already applied for this position.'),
            ]);
        }

        if ($position->apply_from > now() || $position->apply_to < now()) {
            return redirect()->back()->withErrors([
                'message' => __('You cannot apply for this position.'),
            ]);
        }

        $request->user()->applications()->create([
            'rank_id' => $position->permission->id,
            'content' => $request->input('content'),
        ]);

        return to_route('staff-applications.index')->with('success', __('Your application has been submitted!'));
    }
}
