<?php

namespace App\Filament\Widgets;

use App\Models\BloodRequest;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LatestOpenRequests extends TableWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('সর্বশেষ চলমান অনুরোধ')
            ->query(fn () => BloodRequest::query()->where('status', 'open')->latest()->limit(5))
            ->columns([
                TextColumn::make('created_at')
                    ->label('কখন এসেছে')
                    ->since(),
                TextColumn::make('blood_group')
                    ->label('গ্রুপ')
                    ->badge()
                    ->color('danger'),
                TextColumn::make('bags')
                    ->label('ব্যাগ'),
                TextColumn::make('needed_when')
                    ->label('কখন লাগবে')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ['now' => 'এখনই', 'today' => 'আজ', 'tomorrow' => 'কাল'][$state] ?? $state)
                    ->color(fn (string $state): string => $state === 'now' ? 'danger' : 'warning'),
                TextColumn::make('hospital')
                    ->label('হাসপাতাল')
                    ->wrap(),
                TextColumn::make('phone')
                    ->label('মোবাইল')
                    ->copyable(),
            ])
            ->paginated(false)
            ->poll('15s');
    }
}
