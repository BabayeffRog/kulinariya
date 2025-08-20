<?php

namespace App\Filament\Resources\Recipes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class RecipeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns([1])
            ->components([
                Tabs::make()
                    ->tabs([
                        Tab::make('Əsas')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Section::make('Əsas məlumat')
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Başlıq')
                                            ->required()
                                            ->maxLength(180)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                                        TextInput::make('slug')
                                            ->label('Slug')
                                            ->required()
                                            ->maxLength(200)
                                            ->unique(ignoreRecord: true),

                                        FileUpload::make('image')
                                            ->label('Əsas şəkil')
                                            ->image()
                                            ->disk('public')
                                            ->directory('recipes/covers')
                                            ->visibility('public')
                                            ->imageEditor()
                                            ->columnSpanFull(),

                                        FileUpload::make('media')
                                            ->label('Qalereya')
                                            ->image()
                                            ->multiple()
                                            ->reorderable()
                                            ->downloadable()
                                            ->openable()
                                            ->disk('public')
                                            ->directory('recipes/gallery')
                                            ->visibility('public')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        Tab::make('Tərkib')
                            ->icon('heroicon-o-squares-2x2')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->schema([
                                        // İNQREDİYENT — sadə tags kimi saxlayırsan
                                        TagsInput::make('ingredients')
                                            ->label('İnqrediyentlər')
                                            ->placeholder('məs: Un 600 qr') // tək nümunə mətni saxla
                                            ->reorderable()
                                            ->suggestions([
                                                'Un 500 qr', 'Yumurta 2 ədəd', 'Kərə yağı 100 qr', 'Şəkər tozu 200 qr',
                                            ])
                                            ->columnSpanFull(),


        Textarea::make('instructions')
                                            ->label('Hazırlanma qaydası')
                                            ->rows(10)
                                            ->columnSpanFull(),

                                        TextInput::make('servings')->label('Porsiya')->numeric()->minValue(0),
                                        TextInput::make('prep_time')->label('Hazırlıq vaxtı')->placeholder('məs: 1 saat'),
                                        TextInput::make('cook_time')->label('Bişmə vaxtı')->placeholder('məs: 30 dəqiqə'),
                                        TextInput::make('calories')->numeric()->label('Kalori'),
                                        TextInput::make('difficulty')->label('Çətinlik')->placeholder('Asan / Orta / Çətin'),
                                    ]),
                            ]),

                        Tab::make('Kateqoriya & Etiket')
                            ->icon('heroicon-o-tag')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->schema([


                                        Select::make('category_ids')               // <-- SAHƏ ADI DƏYİŞDİ
                                        ->label('Kateqoriyalar')
                                            ->relationship('categories', 'name')   // <-- RELATION ADI (plural)
                                            ->multiple()
                                            ->preload()
                                            ->searchable()
                                            ->required(),

                                        TagsInput::make('tags')
                                            ->label('Etiketlər')
                                            ->placeholder('SEO üçün açar sözlər'),

                                        TextInput::make('author')->label('Müəllif'),
                                    ]),
                            ]),
                            ]),



                    ]);
    }
}
