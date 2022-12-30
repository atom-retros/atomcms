<?php

namespace App\Filament\Resources\Content;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\WebsiteArticle;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use FilamentTiptapEditor\TiptapEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Content\WebsiteArticleResource\Pages;
use App\Filament\Resources\Content\WebsiteArticleResource\RelationManagers;
use Filament\Tables\Columns\ImageColumn;

class WebsiteArticleResource extends Resource
{
    protected static ?string $model = WebsiteArticle::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Articles Manager';

    protected static ?string $slug = 'content/articles-manager';

    protected static ?string $label = 'article';

    protected static ?string $pluralLabel = 'articles';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->autofocus()
                            ->reactive()
                            ->columnSpan('2/3')
                            ->afterStateUpdated(function (\Closure $set, $state) {
                                $set('slug', \Str::slug($state));
                            })
                            ->placeholder('Enter a title for the article'),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('Enter a slug for the article'),

                        TextInput::make('short_story')
                            ->required()
                            ->placeholder('Enter a short story for the article'),

                        TextInput::make('image')
                            ->required()
                            ->placeholder('Enter a image for the article'),

                        TiptapEditor::make('full_story')
                            ->required()
                            ->extraInputAttributes(['style' => 'min-height: 350px'])
                            ->columnSpan('full'),
                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan([
                        'sm' => 2,
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('image')
                    ->label('Image')
                    ->size(50)
                    ->circular(),

                TextColumn::make('user.username')
                    ->label('User')
                    ->toggleable(true, true)
                    ->searchable(),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable(isIndividual: true)
                    ->limit(50),

                TextColumn::make('short_story')
                    ->label('Short Story')
                    ->searchable(isIndividual: true)
                    ->toggleable()
                    ->limit(50),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->date(config('habbo.site.date_format')),
            ])
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWebsiteArticles::route('/'),
            'create' => Pages\CreateWebsiteArticle::route('/create'),
            'view' => Pages\ViewWebsiteArticle::route('/{record}'),
        ];
    }
}
