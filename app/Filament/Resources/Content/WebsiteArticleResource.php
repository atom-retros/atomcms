<?php

namespace App\Filament\Resources\Content;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\WebsiteArticle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Content\WebsiteArticleResource\Pages;
use App\Filament\Resources\Content\WebsiteArticleResource\RelationManagers;

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
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'edit' => Pages\EditWebsiteArticle::route('/{record}/edit'),
        ];
    }
}