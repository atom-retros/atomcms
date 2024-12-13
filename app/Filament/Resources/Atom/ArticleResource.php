<?php

namespace App\Filament\Resources\Atom;

use App\Models\Articles\WebsiteArticle;
use Filament\Tables;
use App\Models\Article;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Forms\Components\CKEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use App\Filament\Traits\TranslatableResource;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\Atom\ArticleResource\Pages;
use App\Filament\Resources\Atom\ArticleResource\RelationManagers;

class ArticleResource extends Resource
{
    use TranslatableResource;

    protected static ?string $model = WebsiteArticle::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $slug = 'website/articles';

    public static string $translateIdentifier = 'articles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::getForm());
    }

    public static function getForm(): array
    {
        return [
            Tabs::make('Main')
                ->tabs([
                    Tabs\Tab::make(__('filament::resources.tabs.Home'))
                        ->icon('heroicon-o-home')
                        ->schema([
                            TextInput::make('title')
                                ->label(__('filament::resources.inputs.title'))
                                ->required()
                                ->autocomplete()
                                ->maxLength(255)
                                ->columnSpan('full'),

                            TextInput::make('description')
                                ->label(__('filament::resources.inputs.description'))
                                ->required()
                                ->maxLength(255)
                                ->autocomplete()
                                ->columnSpan('full'),

                            TextInput::make('image')
                                ->label(__('filament::resources.inputs.image'))
                                ->required()
                                ->maxLength(255)
                                ->columnSpan('full'),

                            CKEditor::make('content')
                                ->label(__('filament::resources.inputs.content'))
                                ->required()
                                ->columnSpan('full'),
                        ]),

                    Tabs\Tab::make(__('filament::resources.tabs.Configurations'))
                        ->icon('heroicon-o-cog')
                        ->schema([
                            Toggle::make('visible')
                                ->onIcon('heroicon-s-check')
                                ->label(__('filament::resources.inputs.visible'))
                                ->default(true)
                                ->offIcon('heroicon-s-x-mark'),

                            Toggle::make('fixed')
                                ->onIcon('heroicon-s-check')
                                ->label(__('filament::resources.inputs.fixed'))
                                ->default(false)
                                ->offIcon('heroicon-s-x-mark'),

                            Toggle::make('allow_comments')
                                ->onIcon('heroicon-s-check')
                                ->label(__('filament::resources.inputs.allow_comments'))
                                ->default(true)
                                ->offIcon('heroicon-s-x-mark'),

                            Toggle::make('is_promotion')
                                ->label(__('filament::resources.inputs.is_promotion'))
                                ->onIcon('heroicon-s-check')
                                ->default(false)
                                ->reactive()
                                ->offIcon('heroicon-s-x-mark'),

                            DateTimePicker::make('promotion_ends_at')
                                ->displayFormat('Y-m-d H:i')
                                ->native(false)
                                ->withoutSeconds()
                                ->hidden(fn (\Filament\Forms\Get $get) => !$get('is_promotion'))
                                ->label(__('filament::resources.inputs.promotion_ends_at'))
                                ->required()
                                ->columnSpan('full'),
                        ]),
                ])->columnSpanFull()
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->poll('60s')
            ->columns(static::getTable())
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getTable(): array
    {
        return [
            TextColumn::make('id')
                ->label(__('filament::resources.columns.id')),

            ImageColumn::make('image')
                ->circular()
                ->extraAttributes(['style' => 'image-rendering: pixelated'])
                ->size(50)
                ->label(__('filament::resources.columns.image')),

            TextColumn::make('title')
                ->label(__('filament::resources.columns.title'))
                ->searchable()
                ->limit(50),

            TextColumn::make('user.username')
                ->searchable()
                ->label(__('filament::resources.columns.by')),

            ToggleColumn::make('visible')
                ->label(__('filament::resources.columns.visible'))
                ->onIcon('heroicon-s-check')
                ->toggleable()
                ->disabled(),

            ToggleColumn::make('fixed')
                ->label(__('filament::resources.columns.fixed'))
                ->onIcon('heroicon-s-check')
                ->toggleable()
                ->disabled(),

            ToggleColumn::make('allow_comments')
                ->label(__('filament::resources.columns.allow_comments'))
                ->onIcon('heroicon-s-check')
                ->toggleable()
                ->disabled(),
        ];
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\TagsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'view' => Pages\ViewArticle::route('/{record}'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
