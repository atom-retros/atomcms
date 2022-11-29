<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Services\RconService;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class CurrenciesRelationManager extends RelationManager
{
    protected static string $relationship = 'currencies';

    protected static ?string $recordTitleAttribute = 'type';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('type')
                    ->getStateUsing(function (Model $record) {
                        return config('habbo.currencies.' . $record->type) ?? $record->type;
                    }),
                Tables\Columns\TextColumn::make('amount'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->using(function (Model $record, array $data): Model {
                    $rconService = new RconService();

                    if ($record->type === 0 && $record->amount != $data['amount']) {
                        $total = (0 - $record->user->currency('duckets')) + $data['amount'];
                        $rconService->giveDuckets($record->user, $total);
                    }

                    if ($record->type === 5 && $record->amount != $data['amount']) {
                        $total = (0 - $record->user->currency('diamonds')) + $data['amount'];
                        $rconService->giveDiamonds($record->user, $total);
                    }

                    if ($record->type === 101 && $record->amount != $data['amount']) {
                        $total = (0 - $record->user->currency('points')) + $data['amount'];
                        $rconService->givePoints($record->user, 101, $total);
                    }

                    return $record;
                }),
            ]);
    }
}
