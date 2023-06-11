<?php

namespace App\Actions;

use App\Models\User;
use App\Services\RconService;

class SendCurrency
{
    public function __construct(protected RconService $rcon)
    {
    }

    public function execute(User $user, string $type, ?int $amount)
    {
        if (!$amount && $amount <= 0) {
            return false;
        }

        if ($this->rcon->isConnected()) {
            return match ($type) {
                'credits' => $this->rcon->giveCredits($user, $amount),
                'duckets' => $this->rcon->giveDuckets($user, $amount),
                'diamonds' => $this->rcon->giveDiamonds($user, $amount),
                default => false,
            };
        }

        return match ($type) {
            'credits' => $user->increment('credits', $amount),
            'duckets' => $user->currencies()->where('type', 0)->increment('amount', $amount),
            'diamonds' => $user->currencies()->where('type', 5)->increment('amount', $amount),
            default => false,
        };
    }
}
