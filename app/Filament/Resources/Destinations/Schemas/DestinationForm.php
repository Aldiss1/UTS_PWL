<?php

namespace App\Filament\Resources\Destinations\Schemas;

use Filament\Schemas\Schema;

class DestinationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Select::make('category_id')->relationship('category', 'name')->required(),
                \Filament\Forms\Components\TextInput::make('name')->required()->maxLength(255),
                \Filament\Forms\Components\Select::make('city')->options([
                    'Surabaya' => 'Surabaya', 'Malang' => 'Malang', 'Batu' => 'Batu', 'Bromo' => 'Bromo', 'Banyuwangi' => 'Banyuwangi', 'Madura' => 'Madura', 'Jember' => 'Jember', 'Kediri' => 'Kediri', 'Mojokerto' => 'Mojokerto', 'Pasuruan' => 'Pasuruan', 'Sidoarjo' => 'Sidoarjo', 'Gresik' => 'Gresik', 'Lamongan' => 'Lamongan', 'Tuban' => 'Tuban', 'Bojonegoro' => 'Bojonegoro', 'Magetan' => 'Magetan', 'Madiun' => 'Madiun', 'Ngawi' => 'Ngawi', 'Ponorogo' => 'Ponorogo', 'Pacitan' => 'Pacitan', 'Trenggalek' => 'Trenggalek', 'Tulungagung' => 'Tulungagung', 'Blitar' => 'Blitar', 'Lumajang' => 'Lumajang', 'Probolinggo' => 'Probolinggo', 'Situbondo' => 'Situbondo', 'Bondowoso' => 'Bondowoso', 'Jombang' => 'Jombang', 'Nganjuk' => 'Nganjuk',
                ])->required()->searchable(),
                \Filament\Forms\Components\RichEditor::make('description')->required()->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('image')->image()->directory('destinations'),
                \Filament\Forms\Components\TextInput::make('price')->numeric()->default(0)->prefix('Rp'),
                \Filament\Forms\Components\TextInput::make('rating')->numeric()->inputMode('decimal')->step(0.1)->default(0)->maxValue(5),
                \Filament\Forms\Components\Toggle::make('is_active')->default(true),
            ]);
    }
}
