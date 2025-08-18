<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Ad')
                    ->required()
                    ->maxLength(255)
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) =>
                    $set('slug', Str::slug($state))
                    ),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true),
               Select::make('parent_id')
                    ->label('Əsas Kateqoriya')
                    ->options(Category::pluck('name', 'id'))
                    ->searchable()
                    ->nullable()
                    ->default(null),
                FileUpload::make('image')
                    ->label('Şəkil')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->directory('categories') // storage/app/public/categories
                    ->maxSize(2048),

                Toggle::make('status')
                    ->label('Aktiv/Passiv')
                    ->default(true),
            ]);
    }
}
