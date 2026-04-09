<?php

namespace App\Filament\Resources\Facilities\Schemas;

use Filament\Schemas\Schema;

class FacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Select::make('destination_id')->relationship('destination', 'name')->searchable()->required(),
                \Filament\Forms\Components\TextInput::make('name')->required()->maxLength(255),
            ]);
    }
}
