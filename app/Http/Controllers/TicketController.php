<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebsiteTicketFormRequest;
use App\Models\WebsiteHelpCenterCategory;
use App\Models\WebsiteHelpCenterTicket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        return view('help-center.tickets.create');
    }

    public function create()
    {
        return view('help-center.tickets.create', [
            'categories' => WebsiteHelpCenterCategory::get(),
        ]);
    }

    public function store(WebsiteTicketFormRequest $request)
    {
        $data = $request->validated();
        Auth::user()->tickets()->create([
            'category_id' => $data['category_id'],
            'status_id' => 1,
            'content' => $data['content']
        ]);

        return redirect()->back()->with('success', __('Ticket submitted!'));
    }
}
