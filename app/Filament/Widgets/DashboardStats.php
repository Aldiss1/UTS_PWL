<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Destination;
use App\Models\TourPackage;
use App\Models\Booking;

class DashboardStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $revenue = Booking::where('payment_status', 'paid')->sum('total_price');
        
        return [
            Stat::make('Total Destinasi Wisata', Destination::count())
                ->description('Lokasi wisata di Jawa Timur')
                ->descriptionIcon('heroicon-m-map')
                ->color('primary'),
            Stat::make('Paket Tour Aktif', TourPackage::where('is_active', true)->count())
                ->description('Paket wisata yang ditawarkan')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('info'),
            Stat::make('Total Pesanan (Bookings)', Booking::count())
                ->description(Booking::where('payment_status', 'pending')->count() . ' Transaksi Pending')
                ->descriptionIcon('heroicon-m-ticket')
                ->color('warning'),
            Stat::make('Total Pendapatan', 'Rp ' . number_format($revenue, 0, ',', '.'))
                ->description('Dari pesanan tervalidasi')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),
        ];
    }
}
