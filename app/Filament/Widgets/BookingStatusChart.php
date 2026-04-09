<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;

class BookingStatusChart extends ChartWidget
{
    protected ?string $heading = 'Status Transaksi Booking';
    protected static ?int $sort = 2; // Bersebelahan dengan Destinations Chart

    protected function getData(): array
    {
        $pending = Booking::where('payment_status', 'pending')->count();
        $paid = Booking::where('payment_status', 'paid')->count();
        $cancelled = Booking::where('payment_status', 'cancelled')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Total Bookings',
                    'data' => [$pending, $paid, $cancelled],
                    'backgroundColor' => [
                        '#eab308', // warning
                        '#22c55e', // success
                        '#ef4444', // danger
                    ],
                ],
            ],
            'labels' => ['Pending', 'Paid', 'Cancelled'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
