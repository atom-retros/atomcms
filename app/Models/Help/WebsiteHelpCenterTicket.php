<?php

namespace App\Models\Help;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Purify\Facades\Purify;

class WebsiteHelpCenterTicket extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(WebsiteHelpCenterCategory::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(WebsiteHelpCenterTicketReply::class, 'ticket_id');
    }

    public function canDeleteTicket()
    {
        return $this->user_id === Auth::id() || hasPermission('delete_website_tickets');
    }

    public function canManageTicket()
    {
        return $this->user_id === Auth::id() || hasPermission('manage_website_tickets');
    }

    public function canCloseTicket()
    {
        return $this->user_id === Auth::id() || hasPermission('manage_website_tickets');
    }

    public function isOpen()
    {
        return $this->open || hasPermission('manage_website_tickets');
    }

    public function getContentAttribute($value)
    {
        return Purify::clean($value);
    }
}
