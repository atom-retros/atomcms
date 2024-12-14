<?php

namespace App\Filament\Resources\User;

use App\Models\User\Ban;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Traits\TranslatableResource;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Tables\Columns\UserAvatarColumn;
use App\Filament\Resources\User\BanResource\Pages;

class BanResource extends Resource
{
    use TranslatableResource;

    protected static ?string $model = Ban::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-exclamation';

    protected static ?string $navigationGroup = 'User Management';

    protected static ?string $slug = 'user-management/bans';

    protected static ?int $navigationSort = 1;

    public static string $translateIdentifier = 'bans';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('ban_reason')
                    ->label(__('filament::resources.inputs.reason'))
                    ->columnSpanFull(),

                Select::make('type')
                    ->native(false)
                    ->label(__('filament::resources.inputs.type'))
                    ->columnSpanFull()
                    ->options([
                        'account' => __('filament::resources.common.Account'),
                        'ip' => __('filament::resources.common.IP'),
                        'machine' => __('filament::resources.common.Machine'),
                        'super' => __('filament::resources.common.Super'),
                    ]),

                DateTimePicker::make('ban_expire')
                    ->native(false)
                    ->label(__('filament::resources.inputs.expires_at'))
                    ->displayFormat('Y-m-d H:i')
                    ->format('U')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label(__('filament::resources.columns.id')),

                UserAvatarColumn::make('avatar')
                    ->toggleable()
                    ->pointer('user.look')
                    ->label(__('filament::resources.columns.avatar'))
                    ->options('&size=m&head_direction=3&gesture=sml&headonly=1'),

                TextColumn::make('user.username')
                    ->label(__('filament::resources.columns.username'))
                    ->searchable(),

                TextColumn::make('staff.username')
                    ->label(__('filament::resources.columns.by'))
                    ->searchable(),

                TextColumn::make('ban_reason')
                    ->label(__('filament::resources.columns.reason'))
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();

                        if (strlen($state) <= $column->getCharacterLimit()) return null;

                        return $state;
                    })
                    ->limit(15)
                    ->searchable(),

                TextColumn::make('type')
                    ->badge()
                    ->label(__('filament::resources.columns.type'))
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'account' => __('filament::resources.common.Account'),
                        'ip' => __('filament::resources.common.IP'),
                        'machine' => __('filament::resources.common.Machine'),
                        'super' => __('filament::resources.common.Super'),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'account' => 'primary',
                        'ip' => 'success',
                        'machine' => 'primary',
                        'super' => 'danger',
                    }),

                TextColumn::make('timestamp')
                    ->label(__('filament::resources.columns.banned_at'))
                    ->date('Y-m-d H:i'),

                TextColumn::make('ban_expire')
                    ->label(__('filament::resources.columns.expires_at'))
                    ->formatStateUsing(fn (string $state): string => $state == 0 ? __('filament::resources.common.Never') : date('Y-m-d H:i', $state)),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBans::route('/'),
        ];
    }
}
