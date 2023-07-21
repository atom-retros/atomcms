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
        return view('help-center.tickets.create', [
            'openTickets' => WebsiteHelpCenterTicket::where('open', true)->get(),
        ]);
    }

    public function create()
    {
        return view('help-center.tickets.create', [
            'categories' => WebsiteHelpCenterCategory::get(),
            'openTickets' => WebsiteHelpCenterTicket::where('open', true)->get(),
        ]);
    }

    public function store(WebsiteTicketFormRequest $request)
    {
        Auth::user()->tickets()->create($request->validated());

        return redirect()->back()->with('success', __('Ticket submitted!'));
    }

    public function show(WebsiteHelpCenterTicket $ticket)
    {
        return view('help-center.tickets.show', [
            'ticket' => $ticket->load(['user:id,username,look', 'category']),
            'openTickets' => WebsiteHelpCenterTicket::where('open', true)->get(),
        ]);
    }
}
