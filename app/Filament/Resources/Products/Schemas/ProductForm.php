<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema; // sənin wrapper-in varsa saxlayıram
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
            Tabs::make('ProductTabs')
                ->tabs([
                    // 1) ƏSAS
                    Tab::make('Mehsul haqqinda')
                        ->schema([
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')
                                ->required()
                                ->unique(ignoreRecord: true),
                            Textarea::make('description')
                                ->rows(6)
                                ->columnSpanFull(),
                            FileUpload::make('images')
                                ->multiple()
                                ->image()
                                ->reorderable()
                                ->visibility('public')
                                ->disk('public')
                                ->directory('products')
                                ->panelLayout('grid')
                                ->imagePreviewHeight('200')
                                ->columnSpanFull(),

                            Select::make('categories')
                                ->relationship('categories', 'name')
                                ->multiple()
                                ->preload()
                                ->searchable()
                                ->label('Kateqoriyalar'),

                            TagsInput::make('ingredients')
                                ->label('İnqrediyentlər')
                                ->placeholder('məs: Un 600 qr') // tək nümunə mətni saxla
                                ->reorderable()
                                ->suggestions([
                                    'Un 500 qr', 'Yumurta 2 ədəd', 'Kərə yağı 100 qr', 'Şəkər tozu 200 qr',
                                ]),

                            Select::make('status')
                                ->options([
                                    'draft' => 'Draft',
                                    'published' => 'Published',
                                    'archived' => 'Archived',
                                ])
                                ->default('draft')
                                ->native(false),



                        ])
                        ->columns(2),

                    // 2) QİYMƏT & STOK
                    Tab::make('Qiymət & Stok')
                        ->schema([
                            TextInput::make('price')->numeric()->step('0.01'),
                            TextInput::make('currency')->default('AZN')->length(3),
                            TextInput::make('sku')->maxLength(64),
                            TextInput::make('stock')->numeric()->minValue(0),
                        ])
                        ->columns(4),




                ])
                ->persistTabInQueryString(), // aktiv tab-u URL-də saxlayır
        ]);
    }
}
