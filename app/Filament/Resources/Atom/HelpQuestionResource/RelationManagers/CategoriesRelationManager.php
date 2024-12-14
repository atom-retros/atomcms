<?php

namespace App\Filament\Resources\Atom\HelpQuestionResource\RelationManagers;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Traits\TranslatableResource;
use Filament\Resources\RelationManagers\RelationManager;
use App\Filament\Resources\Atom\HelpQuestionCategoryResource;

class CategoriesRelationManager extends RelationManager
{
    use TranslatableResource;

    protected static string $relationship = 'categories';

    protected static ?string $recordTitleAttribute = 'name';

    public static string $translateIdentifier = 'help-question-categories';

    protected static ?string $inverseRelationship = 'questions';

    public function form(Form $form): Form
    {
        return $form->schema(HelpQuestionCategoryResource::getForm());
    }

    public function table(Table $table): Table
    {
        return $table->columns(HelpQuestionCategoryResource::getTable())
            ->modifyQueryUsing(fn ($query) => $query->latest('id'))
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make(),
            ]);
    }
}
