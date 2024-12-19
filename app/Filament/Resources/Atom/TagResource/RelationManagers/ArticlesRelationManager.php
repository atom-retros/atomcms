<?php

namespace App\Filament\Resources\Atom\TagResource\RelationManagers;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Traits\TranslatableResource;
use App\Filament\Resources\Atom\ArticleResource;
use Filament\Resources\RelationManagers\RelationManager;

class ArticlesRelationManager extends RelationManager
{
    use TranslatableResource;

    // Use camelCase to match the method in the Tag model
    protected static string $relationship = 'websiteArticles';

    protected static ?string $recordTitleAttribute = 'title';

    public static string $translateIdentifier = 'article';

    public function form(Form $form): Form
    {
        return $form
            ->schema(ArticleResource::getForm());
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns(ArticleResource::getTable())
            ->modifyQueryUsing(fn ($query) => $query->latest())
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make(),
            ]);
    }
}
