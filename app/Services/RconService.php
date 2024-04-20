<?php

namespace App\Services;

use Socket;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Exceptions\RconConnectionException;

class RconService
{
    protected Socket|bool $socket = false;
    protected bool $isConnected = false;
    protected array $config = [];

    public function __construct()
    {
        $this->config = [
            'ip'   => setting('rcon_ip'),
            'port' => setting('rcon_port'),
        ];

        $this->initialize();
    }

    /**
     * @throws RconConnectionException
     */
    private function initialize(): void
    {
        $this->socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        if (!$this->socket) {
            $error = socket_strerror(socket_last_error());
            Log::error("RCON initialization failed: $error");

            throw new RconConnectionException("Failed to create socket: $error");
        }

        if (!@socket_connect($this->socket, $this->config['ip'], $this->config['port'])) {
            $error = socket_strerror(socket_last_error());
            Log::error("RCON connection failed: $error");

            $this->closeConnection();

            throw new RconConnectionException("Failed to connect to RCON: $error");
        }

        $this->isConnected = true;
    }

    private function closeConnection(): void
    {
        if ($this->socket) {
            socket_close($this->socket);
        }

        $this->socket = false;
        $this->isConnected = false;
    }

    /**
     * @throws RconConnectionException
     */
    public function sendCommand(string $command, ?array $data = null)
    {
        if (!$this->isConnected) {
            $error = "RCON command failed: Not connected";
            Log::error($error);

            throw new RconConnectionException($error);
        }

        $payload = json_encode(['key' => $command, 'data' => $data]);

        if (!@socket_write($this->socket, $payload, strlen($payload))) {
            $error = socket_strerror(socket_last_error($this->socket));
            Log::error("RCON command ($command) failed: $error");

            $this->closeConnection();

            throw new RconConnectionException("Failed to send RCON command ($command): $error");
        }

        return true;
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
