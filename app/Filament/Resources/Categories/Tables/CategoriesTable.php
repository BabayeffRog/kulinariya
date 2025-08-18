<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Şəkil')
                    ->circular()
                    ->disk('public')
                    ->visibility('public'),

                TextColumn::make('name')
                    ->label('Ad')
                    ->searchable()
                    ->sortable(),


                TextColumn::make('parent.name')
                    ->label('Əsas Kateqoriya')
                    ->sortable(),

                IconColumn::make('status')
                    ->boolean()
                    ->label('Status'),

                TextColumn::make('created_at')
                    ->label('Yaradıldı')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
