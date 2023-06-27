<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Socket;

class RconService
{
    public Socket|bool $socket = false;
    public bool $isConnected = false;

    public function __construct()
    {
        $this->initialization();
    }

    private function initialization(): void
    {
        if (! $this->socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) {
            Log::error("socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n");
            $this->closeConnection();

            return;
        }

        if (! @socket_connect($this->socket, setting('rcon_ip'), (int)setting('rcon_port'))) {
            Log::error("socket_connect() failed: reason: " . socket_strerror(socket_last_error()) . "\n");
            $this->closeConnection();

            return;
        }

        $this->isConnected = true;
    }

    private function closeConnection(): void
    {
        $this->socket = false;
        $this->isConnected = false;
    }

    public function sendCommand(string $command, array|null $data = null)
    {
        if (! $this->socket) {
            return;
        }

        $data = json_encode(['key' => $command, 'data' => $data]);

        if (! @socket_write($this->socket, $data, strlen($data))) {
            Log::error(socket_strerror(socket_last_error($this->socket)));
        }

        $this->closeConnection();
        $this->initialization();
    }

    public function sendGift(User $user, int $item_id, string $message = 'Here is a gift.')
    {
        $this->sendCommand('sendgift', [
            'user_id' => $user->id,
            'itemid' => $item_id,
            'message' => $message,
        ]);
    }

    public function giveCredits(User $user, int $credits)
    {
        $this->sendCommand('givecredits', [
            'user_id' => $user->id,
            'credits' => $credits,
        ]);
    }

    public function giveBadge(User $user, string $badge)
    {
        $this->sendCommand('givebadge', [
            'user_id' => $user->id,
            'badge' => $badge,
        ]);
    }

    public function setMotto(User $user, string $motto)
    {
        $this->sendCommand('setmotto', [
            'user_id' => $user->id,
            'motto' => $motto,
        ]);
    }

    public function updateWordFilter()
    {
        $this->sendCommand('updatewordfilter');
    }

    public function disconnectUser(User $user)
    {
        $this->sendCommand('disconnect', [
            'user_id' => $user->id,
            'username' => $user->username,
        ]);
    }

    public function givePoints(User $user, int $type, int $amount)
    {
        $this->sendCommand('givepoints', [
            'user_id' => $user->id,
            'points' => $amount,
            'type' => $type,
        ]);
    }

    public function giveGotw(User $user, int $amount)
    {
        return $this->givePoints($user, 101, $amount);
    }

    public function giveDiamonds(User $user, int $amount)
    {
        return $this->givePoints($user, 5, $amount);
    }

    public function giveDuckets(User $user, int $amount)
    {
        return $this->givePoints($user, 0, $amount);
    }

    public function setRank(User $user, int $rank)
    {
        $this->sendCommand('setrank', [
            'user_id' => $user->id,
            'rank' => $rank,
        ]);
    }

    public function updateCatalog()
    {
        $this->sendCommand('updatecatalog');
    }

    public function alertUser(User $user, string $message)
    {
        $this->sendCommand('alertuser', [
            'user_id' => $user->id,
            'message' => $message,
        ]);
    }

    public function forwardUser(User $user, int $roomId)
    {
        $this->sendCommand('forwarduser', [
            'user_id' => $user->id,
            'room_id' => $roomId,
        ]);
    }

    public function updateConfig(User $user, string $command)
    {
        $this->sendCommand('executecommand', [
            'user_id' => $user->id,
            'command' => $command,
        ]);
    }
}
