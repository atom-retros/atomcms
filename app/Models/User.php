<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Fortify\TwoFactorAuthenticationProvider;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable;

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

    public function sessions()
    {
        return $this->hasMany(Session::class);
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

    public function ban(): HasOne
    {
        return $this->hasOne(Ban::class, 'user_id')->where('ban_expire', '>', time())->whereIn('type', ['account', 'super']);
    }

    public function settings(): HasOne
    {
        return $this->hasOne(UserSetting::class);
    }

    public function ssoTicket(): string
    {
        $sso = sprintf('%s-%s', Str::replace(' ', '', setting('hotel_name')), Str::uuid());

        // Recursive function - Call itself again if the auth ticket already exists
        if (User::where('auth_ticket', $sso)->exists()) {
            return $this->ssoTicket();
        }

        $this->update([
            'auth_ticket' => $sso,
        ]);

        return $sso;
    }

    public function betaCode(): HasOne
    {
        return $this->hasOne(WebsiteBetaCode::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(WebsiteTeam::class, 'team_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(WebsiteStaffApplications::class, 'user_id');
    }

    public function hcSubscription(): HasOne
    {
        return $this->hasOne(UserSubscription::class);
    }

    public function articleComments(): HasMany
    {
        return $this->hasMany(WebsiteArticleComment::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(WebsitePaypalTransaction::class);
    }

    public function usedShopVouchers(): HasMany
    {
        return $this->hasMany(WebsiteUsedShopVoucher::class);
    }

    public function items(): HasMany
    {
    return $this->hasMany(Item::class, 'user_id');
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(WebsiteHelpCenterTicket::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(WebsiteAccount::class, 'account_id');
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

    public function photos(): HasMany
    {
        return $this->hasMany(CameraWeb::class);
    }

    public function profileGuestbook(): HasMany
    {
        return $this->hasMany(WebsiteUserGuestbook::class, 'profile_id');
    }

    public function guestbook(): HasMany
    {
        return $this->hasMany(WebsiteUserGuestbook::class, 'user_id');
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

    public function confirmTwoFactorAuthentication($code)
    {
        $codeIsValid = app(TwoFactorAuthenticationProvider::class)
            ->verify(decrypt($this->two_factor_secret), $code);

        if (! $codeIsValid) {
            return false;
        }

        $this->update([
            'two_factor_confirmed' => true,
        ]);

        return true;
    }

    public function hasAppliedForPosition(int $rankId)
    {
        return $this->applications()->where('rank_id', '=', $rankId)->exists();
    }

    public function changePassword(string $newPassword) {
        $this->password = Hash::make($newPassword);
        $this->save();
    }
}
