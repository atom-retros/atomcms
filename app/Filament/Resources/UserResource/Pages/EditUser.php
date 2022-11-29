<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use App\Services\RconService;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Mod;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if ($record->online === '1') {
            $this->updateThroughRcon($record, $data);

            return $record;
        }

        if (empty($data['motto'])) {
            $data['motto'] = '';
        }

        $record->update($data);

        return $record;
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('User updated')
            ->body('The user has been saved successfully.');
    }

    private function updateThroughRcon(Model $record, array $data) {
        $rconService = new RconService();

        if ($record->mail != $data['mail']) {
            $record->update([
                'mail' => $data['mail'],
            ]);
        }

        if ($record->motto != $data['motto']) {
            $rconService->setMotto($record, $data['motto']);
        }

        if ($record->credits != $data['credits']) {
            $total = (0 - $record->credits) + $data['credits'];
            $rconService->giveCredits($record, $total);
        }

        if ($record->username != $data['username'] || $record->rank != $data['rank']) {
            $rconService->disconnectUser($record);
            sleep(0.5);
        }

        if ($record->username != $data['username']) {
            $record->update([
                'username' => $data['username'],
            ]);
        }

        if ($record->rank != $data['rank']) {
            $rconService->setRank($record, $data['rank']);
        }
    }
}
