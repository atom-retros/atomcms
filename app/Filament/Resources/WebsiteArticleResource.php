<?php

namespace App\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Atom\Core\Models\WebsiteArticle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Illuminate\Http\Request;

class WebsiteArticleResource extends Resource
{
    /**
     * The model the resource corresponds to.
     */
    protected static ?string $model = WebsiteArticle::class;

    /**
     * The navigation group the resource belongs to.
     */
    protected static ?string $navigationGroup = 'Website';

    /**
     * The schema for the resource.
     */
    public static function schema(Form $form): array
    {
        return [
            TextInput::make('title')
                ->required()
                ->unique(ignoreRecord: true)
                ->columnSpanFull()
                ->maxLength(255)
                ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state))),

            Hidden::make('slug'),

            TextInput::make('short_story')
                ->required()
                ->columnSpanFull()
                ->maxLength(255),

            RichEditor::make('full_story')
                ->required()
                ->columnSpanFull(),

            Hidden::make('user_id')
                ->default(fn (Request $request) => $request->user()->id),

            FileUpload::make('image')
                ->image()
                ->required()
                ->columnSpanFull(),

            Select::make('can_comment')
                ->options(['1' => 'Yes', '0' => 'No'])
                ->default('1')
                ->columnSpanFull(),
        ];
    }

    /**
     * Get the columns for the resource.
     */
    public static function columns(Table $table): array
    {
        return [
            TextColumn::make('title')
                ->searchable(),

            TextColumn::make('user.username')
                ->label('Author')
                ->searchable(),

            IconColumn::make('can_comment')
                ->label('Comment')
                ->boolean(),
        ];
    }
}
