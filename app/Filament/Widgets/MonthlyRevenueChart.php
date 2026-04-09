<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;

class MonthlyRevenueChart extends ChartWidget
{
    protected ?string $heading = 'Pendapatan Bulanan (Tahun Ini)';
    protected static ?int $sort = 2; // Disamping BookingStatusChart

    protected function getData(): array
    {
        // Mengambil data pendapatan (paid bookings) per bulan menggunakan standard MySQL
        $bookings = Booking::selectRaw('MONTH(created_at) as month, SUM(total_price) as total')
            ->where('payment_status', 'paid')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->get()
            ->pluck('total', 'month')
            ->toArray();

        $data = [];
        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];
        
        // Memastikan array terisi untuk setiap bulan (1-12)
        for ($i = 1; $i <= 12; $i++) {
            $data[] = $bookings[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan (Rp)',
                    'data' => $data,
                    'backgroundColor' => '#3b82f6', // Warna biru cerah yang cocok disandingkan hijau (pie chart)
                    'borderRadius' => 4, // Membuat ujung bar tumpul (rounded)
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
