<?php

namespace App\Filament\Resources\Atom\HelpQuestionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Atom\HelpQuestionResource;

class ListHelpQuestions extends ListRecords
{
    protected static string $resource = HelpQuestionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
