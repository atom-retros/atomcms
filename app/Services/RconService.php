<?php

namespace App\Services;

use App\Models\User;

class RconService
{
    protected $socket;
    protected $connected;

    public function __construct()
    {
        $this->connect();
    }

    protected function connect()
    {
        if (!function_exists('socket_create')) {
            abort(500, 'Please enable sockets in your php.ini!');
        }

        $this->socket = socket_create(
            config('habbo.rcon.domain'),
            config('habbo.rcon.type'),
            config('habbo.rcon.protocol')
        );

        if (!$this->socket) {
            abort(500, sprintf('socket_create() failed: reason: %s', socket_strerror(socket_last_error())));
        }

        if (!@socket_connect($this->socket, setting('rcon_ip'), setting('rcon_port'))) {
            die('It seems like the hotel is currently offline, please wait and try again later.');
        }
    }

    public function sendPacket(string $key, $data = null)
    {
        $data = json_encode(['key' => $key, 'data' => $data]);

        if (!@socket_write($this->socket, $data, strlen($data))) {
            die(sprintf(socket_strerror(socket_last_error($this->socket))));
        }

        if (!$response = @socket_read($this->socket, 2048)) {
            die('It seems like the hotel is experiencing some issues at the moment, please contact one of the owners.');
        }

        return json_decode($response);
    }

    public function sendGift(User $user, int $item_id, string $message = 'Here is a gift.')
    {
        return $this->sendPacket('sendgift', [
            'user_id' => $user->id,
            'itemid' => $item_id,
            'message' => $message,
        ]);
    }

    public function giveCredits(User $user, int $credits)
    {
        return $this->sendPacket('givecredits', [
            'user_id' => $user->id,
            'credits' => $credits,
        ]);
    }

    public function giveBadge(User $user, string $badge)
    {
        return $this->sendPacket('givebadge', [
            'user_id' => $user->id,
            'badge' => $badge,
        ]);
    }

    public function setMotto(User $user, string $motto)
    {
        return $this->sendPacket('setmotto', [
            'user_id' => $user->id,
            'motto' => $motto,
        ]);
    }

    public function updateWordFilter()
    {
        return $this->sendPacket('updatewordfilter');
    }

    public function disconnectUser(User $user)
    {
        return $this->sendPacket('disconnect', [
            'user_id' => $user->id,
            'username' => $user->username,
        ]);
    }

    public function givePoints(User $user, int $type, int $amount)
    {
        return $this->sendPacket('givepoints', [
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
        return $this->sendPacket('setrank', [
            'user_id' => $user->id,
            'rank' => $rank,
        ]);
    }

    public function updateCatalog()
    {
        return $this->sendPacket('updatecatalog');
    }

    public function alertUser(User $user, string $message)
    {
        return $this->sendPacket('alertuser', [
            'user_id' => $user->id,
            'message' => $message,
        ]);
    }

    public function forwardUser(User $user, int $roomId)
    {
        return $this->sendPacket('forwarduser', [
            'user_id' => $user->id,
            'room_id' => $roomId,
        ]);
    }
}
