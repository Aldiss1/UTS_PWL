<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Category;

class DestinationsByCategoryChart extends ChartWidget
{
    protected ?string $heading = 'Sebaran Destinasi per Kategori';
    
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $categories = Category::withCount('destinations')->get();
        
        $data = [];
        $labels = [];
        
        foreach ($categories as $category) {
            $labels[] = $category->name;
            $data[] = $category->destinations_count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Destinasi',
                    'data' => $data,
                    'backgroundColor' => ['#f59e0b', '#3b82f6', '#10b981', '#6366f1', '#ef4444', '#8b5cf6'],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
