<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Select::make('tour_package_id')
                    ->relationship('tourPackage', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                \Filament\Forms\Components\TextInput::make('customer_name')->required()->maxLength(255),
                \Filament\Forms\Components\TextInput::make('customer_email')->email()->required()->maxLength(255),
                \Filament\Forms\Components\TextInput::make('customer_phone')->tel()->maxLength(255),
                \Filament\Forms\Components\TextInput::make('participants_count')->numeric()->required()->minValue(1)->default(1),
                \Filament\Forms\Components\TextInput::make('total_price')->numeric()->required()->prefix('Rp')->default(0),
                \Filament\Forms\Components\Select::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required()
                    ->default('pending'),
            ]);
    }
}
