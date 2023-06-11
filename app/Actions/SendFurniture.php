<?php

namespace App\Actions;

use App\Models\User;
use App\Services\RconService;

class SendFurniture
{
    public function __construct(protected RconService $rcon)
    {
    }

    public function execute(User $user, array $furnitureData)
    {
        if ($this->rcon->isConnected()) {
            foreach ($furnitureData as $furniture) {
                for ($i = 0; $i < $furniture['amount']; $i++) {
                    $this->rcon->sendGift($user, $furniture['item_id'], 'Thank you for supporting ' . setting('hotel_name'));
                }
            }

            return;
        }

        foreach ($furnitureData as $furniture) {
            for ($i = 0; $i < $furniture['amount']; $i++) {
                $user->items()->create([
                    'item_id' => $furniture['item_id'],
                ]);
            }
        }
    }
}
