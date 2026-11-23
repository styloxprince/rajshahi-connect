<?php

namespace App\Filament\Widgets;

use App\Models\Donor;
use Filament\Widgets\ChartWidget;

class DonorsByGroupChart extends ChartWidget
{
    protected static ?int $sort = 2;

    protected ?string $pollingInterval = '60s';

    public function getHeading(): ?string
    {
        return 'গ্রুপ অনুযায়ী সক্রিয় রক্তদাতা';
    }

    protected function getData(): array
    {
        $counts = Donor::where('is_available', true)
            ->selectRaw('blood_group, count(*) as total')
            ->groupBy('blood_group')
            ->pluck('total', 'blood_group');

        return [
            'datasets' => [
                [
                    'label' => 'রক্তদাতা',
                    'data' => collect(Donor::BLOOD_GROUPS)->map(fn (string $g): int => (int) ($counts[$g] ?? 0))->all(),
                    'backgroundColor' => '#C90016',
                ],
            ],
            'labels' => Donor::BLOOD_GROUPS,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => ['legend' => ['display' => false]],
            'scales' => ['y' => ['ticks' => ['precision' => 0]]],
        ];
    }
}
