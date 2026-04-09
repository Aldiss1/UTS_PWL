<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Destination;
use App\Models\Category;
use App\Models\Facility;

class DashboardStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Destinasi Wisata', Destination::count())
                ->description('Lokasi wisata yang terdaftar di Jawa Timur')
                ->descriptionIcon('heroicon-m-map')
                ->color('success'),
            Stat::make('Kategori Wisata', Category::count())
                ->description('Berdasarkan penggolongan jenis')
                ->descriptionIcon('heroicon-m-tag')
                ->color('info'),
            Stat::make('Fasilitas Terdata', Facility::count())
                ->description('Fasilitas pendukung destinasi')
                ->descriptionIcon('heroicon-m-building-storefront')
                ->color('primary'),
        ];
    }
}
