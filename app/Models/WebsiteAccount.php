<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class WebsiteAccount extends Authenticatable
{
    protected $guarded = ['id'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'account_id');
    }

    public function currentUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'current_user_id');
    }


    public function referralsNeeded()
    {
        $referrals = 0;

        if (! is_null($this->referrals)) {
            $referrals = $this->referrals->referrals_total;
        }

        return setting('referrals_needed') - $referrals;
    }
}
