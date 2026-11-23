<?php

namespace App\Filament\Widgets;

use App\Models\BloodRequest;
use App\Models\Donor;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BloodOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        $open = BloodRequest::where('status', 'open')->count();
        $today = BloodRequest::whereDate('created_at', today())->count();
        $fulfilled = BloodRequest::where('status', 'fulfilled')->count();
        $totalDonors = Donor::count();
        $activeDonors = Donor::where('is_available', true)->count();

        return [
            Stat::make('চলমান অনুরোধ', $open)
                ->description('এখনো রক্ত পাওয়া যায়নি')
                ->color($open > 0 ? 'danger' : 'success'),
            Stat::make('আজকের নতুন অনুরোধ', $today)
                ->description('আজ সারাদিনে এসেছে')
                ->color('warning'),
            Stat::make('সক্রিয় রক্তদাতা', $activeDonors)
                ->description('মোট নিবন্ধিত: ' . $totalDonors)
                ->color('primary'),
            Stat::make('পূরণ হওয়া অনুরোধ', $fulfilled)
                ->description('এ পর্যন্ত মোট')
                ->color('success'),
        ];
    }
}
