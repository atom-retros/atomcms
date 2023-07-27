<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Purify\Facades\Purify;

class WebsiteHelpCenterTicketReply extends Model
{
    protected $guarded = ['id'];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(WebsiteHelpCenterTicket::class, 'ticket_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function canDeleteReply()
    {
        return $this->user_id === Auth::id() || hasPermission('delete_website_ticket_replies');
    }

    public function getContentAttribute($value)
    {
        return Purify::clean($value);
    }
}
