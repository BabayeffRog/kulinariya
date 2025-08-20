<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Cover image (images JSON-un ilk elementi)
                ImageColumn::make('images.0')
                    ->label('Şəkil')
                    ->square()
                    ->toggleable(),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Dinamik valyuta ilə pul sütunu
                TextColumn::make('price')
                    ->money(fn ($record) => $record->currency) // AZN, USD və s.
                    ->sortable()
                    ->alignEnd(),

                TextColumn::make('currency')
                    ->label('Valyuta')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable()
                    ->toggleable(),

                // Stok-u badge kimi göstərək
                BadgeColumn::make('stock')
                    ->label('Stok')
                    ->sortable()
                    ->colors(fn ($state) => $state > 0 ? ['success'] : ['danger'])
                    ->formatStateUsing(fn ($state) => (int) $state),

                // Kateqoriyalar badge-lə (belongsToMany)
                TextColumn::make('categories.name')
                    ->label('Kateqoriyalar')
                    ->badge()
                    ->limit(6),

                // Ingredients — tags kimi
                TagsColumn::make('ingredients')
                    ->label('İnqrediyentlər')
                    ->limit(3)
                    ->toggleable(isToggledHiddenByDefault: true),

                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'draft',
                        'success' => 'published',
                        'gray'    => 'archived',
                    ])
                    ->icons([
                        'heroicon-o-pencil'  => 'draft',
                        'heroicon-o-check'   => 'published',
                        'heroicon-o-archive-box' => 'archived',
                    ])
                    ->sortable(),

                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->since()   // “x dəq əvvəl” kimi
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->since()
                    ->sortable(),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                // Soft delete üçün
                TrashedFilter::make(),

                // Status filtri
                SelectFilter::make('status')
                    ->options([
                        'draft'     => 'Draft',
                        'published' => 'Published',
                        'archived'  => 'Archived',
                    ]),

                // Stok: hamısı / yalnız stokda olan / stokda olmayan
                TernaryFilter::make('in_stock')
                    ->label('Stok')
                    ->boolean()
                    ->trueLabel('Yalnız stokda')
                    ->falseLabel('Yalnız stokda deyil')
                    ->queries(
                        true: fn (Builder $q) => $q->where('stock', '>', 0),
                        false: fn (Builder $q) => $q->where('stock', '=', 0),
                        blank: fn (Builder $q) => $q
                    ),

                // Qiymət aralığı
                Filter::make('price_range')
                    ->form([
                        \Filament\Forms\Components\TextInput::make('min')->numeric()->label('Min'),
                        \Filament\Forms\Components\TextInput::make('max')->numeric()->label('Max'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when(filled($data['min'] ?? null), fn ($q) => $q->where('price', '>=', $data['min']))
                            ->when(filled($data['max'] ?? null), fn ($q) => $q->where('price', '<=', $data['max']));
                    }),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
