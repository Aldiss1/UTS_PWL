<?php

namespace App\Filament\Widgets;

use App\Models\Destination;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestDestinationsWidget extends BaseWidget
{
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Destinasi yang Baru Ditambahkan';
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Destination::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('image')->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('category.name')
                    ->badge()
                    ->color('primary'),
                Tables\Columns\TextColumn::make('city')
                    ->searchable()
                    ->icon('heroicon-m-map-pin'),
                Tables\Columns\TextColumn::make('price')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('rating')
                    ->sortable()
                    ->badge()
                    ->color('warning')
                    ->icon('heroicon-m-star')
            ])
            ->paginated(false);
    }
}
