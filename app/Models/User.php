<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'id',
        'password',
        'remember_token',
    ];

    public function currencies(): HasMany
    {
        return $this->hasMany(UserCurrency::class, 'user_id');
    }

    public function sessionLogs()
    {
        return $this->hasMany(UserSessionLog::class)
            ->latest();
    }

    public function currency(string $currency)
    {
        if (!$this->relationLoaded('currencies')) {
            $this->load('currencies');
        }

        $type = match ($currency) {
            'duckets' => 0,
            'diamonds' => 5,
            'points' => 101,
        };

        return $this->currencies->where('type', $type)->first()->amount ?? 0;
    }

    public function permission(): HasOne
    {
        return $this->hasOne(Permission::class, 'id', 'rank');
    }

    public function articles(): HasMany
    {
        return $this->hasMany(WebsiteArticle::class);
    }

    public function referrals(): HasOne
    {
        return $this->hasOne(UserReferral::class);
    }

    public function userReferrals(): HasMany
    {
        return $this->hasMany(Referral::class);
    }

    public function claimedReferralLog(): HasMany
    {
        return $this->hasMany(ClaimedReferralLog::class);
    }

    public function badges(): HasMany
    {
        return $this->hasMany(UserBadge::class);
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'owner_id');
    }

    public function friends(): HasMany
    {
        return $this->hasMany(MessengerFriendship::class, 'user_one_id');
    }

    public function referralsNeeded()
    {
        $referrals = 0;

        if (!is_null($this->referrals)) {
            $referrals = $this->referrals->referrals_total;
        }

        return setting('referrals_needed') - $referrals;
    }

    public function ban(): HasOne
    {
        return $this->hasOne(Ban::class, 'user_id')->where('ban_expire', '>', time());
    }

    public function settings(): HasOne
    {
        return $this->hasOne(UserSetting::class);
    }

    public function ssoTicket(): string
    {
        $sso = sprintf("%s-%s", setting('hotel_name'), Str::uuid());

        // Recursive function - Call itself again if the auth ticket already exists
        if (User::query()->where('auth_ticket', $sso)->exists()) {
            return $this->ssoTicket();
        }

        $this->update([
            'auth_ticket' => $sso
        ]);

        return $sso;
    }

    public function getOnlineFriends(int $total = 10)
    {
        return $this->friends()
            ->select(['user_two_id', 'users.id', 'users.username', 'users.look', 'users.motto', 'users.last_online'])
            ->join('users', 'users.id', '=', 'user_two_id')
            ->where('users.online', '1')
            ->inRandomOrder()
            ->limit($total)
            ->get();
    }
}
