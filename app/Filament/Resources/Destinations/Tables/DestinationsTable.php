<?php

namespace App\Filament\Resources\Destinations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class DestinationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image'),
                \Filament\Tables\Columns\TextColumn::make('name')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('category.name')->label('Category')->badge(),
                \Filament\Tables\Columns\TextColumn::make('city')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('price')->money('IDR')->sortable(),
                \Filament\Tables\Columns\TextColumn::make('rating')->sortable(),
                \Filament\Tables\Columns\IconColumn::make('is_active')->boolean(),
                \Filament\Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('category')->relationship('category', 'name'),
                \Filament\Tables\Filters\SelectFilter::make('city')->options([
                    'Surabaya' => 'Surabaya', 'Malang' => 'Malang', 'Batu' => 'Batu', 'Bromo' => 'Bromo', 'Banyuwangi' => 'Banyuwangi', 'Madura' => 'Madura', 'Jember' => 'Jember', 'Kediri' => 'Kediri', 'Mojokerto' => 'Mojokerto', 'Pasuruan' => 'Pasuruan', 'Sidoarjo' => 'Sidoarjo', 'Gresik' => 'Gresik', 'Lamongan' => 'Lamongan', 'Tuban' => 'Tuban', 'Bojonegoro' => 'Bojonegoro', 'Magetan' => 'Magetan', 'Madiun' => 'Madiun', 'Ngawi' => 'Ngawi', 'Ponorogo' => 'Ponorogo', 'Pacitan' => 'Pacitan', 'Trenggalek' => 'Trenggalek', 'Tulungagung' => 'Tulungagung', 'Blitar' => 'Blitar', 'Lumajang' => 'Lumajang', 'Probolinggo' => 'Probolinggo', 'Situbondo' => 'Situbondo', 'Bondowoso' => 'Bondowoso', 'Jombang' => 'Jombang', 'Nganjuk' => 'Nganjuk',
                ]),
                \Filament\Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->recordActions([
                \Filament\Actions\ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
