<?php

namespace App\Filament\Resources\TourPackages\Schemas;

use Filament\Schemas\Schema;

class TourPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')->required()->maxLength(255),
                \Filament\Forms\Components\TextInput::make('price')->numeric()->required()->prefix('Rp'),
                \Filament\Forms\Components\TextInput::make('quota')->numeric()->required(),
                \Filament\Forms\Components\DatePicker::make('departure_date'),
                \Filament\Forms\Components\Select::make('destinations')
                    ->relationship('destinations', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->columnSpanFull(),
                \Filament\Forms\Components\Textarea::make('description')->columnSpanFull(),
                \Filament\Forms\Components\Toggle::make('is_active')->default(true),
            ]);
    }
}
