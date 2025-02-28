<?php

namespace App\Filament\Widgets;

use Filament\Widgets\LineChartWidget;
use Illuminate\Support\Facades\DB;

class DashboardCharts extends LineChartWidget
{
    protected static ?string $heading = 'Dashboard Statistics';

    protected function getData(): array
    {
        // استعلام لجلب بيانات "clients"
        $clients = DB::table('clients')
            ->selectRaw('COUNT(*) as count, DATE(created_at) as date')
            ->groupBy('date')
            ->pluck('count', 'date');

        // استعلام لجلب بيانات "services"
        $services = DB::table('services')
            ->selectRaw('COUNT(*) as count, DATE(created_at) as date')
            ->groupBy('date')
            ->pluck('count', 'date');

        return [
            'datasets' => [
                [
                    'label' => 'Clients Registered',
                    'data' => $clients->values()->toArray(),
                    'borderColor' => '#4caf50',
                    'backgroundColor' => 'rgba(76, 175, 80, 0.5)',
                ],
                [
                    'label' => 'Services Created',
                    'data' => $services->values()->toArray(),
                    'borderColor' => '#2196f3',
                    'backgroundColor' => 'rgba(33, 150, 243, 0.5)',
                ],
            ],
            'labels' => $clients->keys()->toArray(),
        ];
    }
}
