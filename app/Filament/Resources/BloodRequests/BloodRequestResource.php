<?php

namespace App\Filament\Resources\BloodRequests;

use App\Filament\Resources\BloodRequests\Pages\EditBloodRequest;
use App\Filament\Resources\BloodRequests\Pages\ListBloodRequests;
use App\Models\BloodRequest;
use App\Models\Donor;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BloodRequestResource extends Resource
{
    protected static ?string $model = BloodRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBellAlert;

    protected static ?string $modelLabel = 'রক্তের অনুরোধ';

    protected static ?string $pluralModelLabel = 'রক্তের অনুরোধ';

    protected static ?string $navigationLabel = 'রক্তের অনুরোধ';

    protected static ?int $navigationSort = 1;

    public const STATUSES = [
        'open' => 'চলমান',
        'fulfilled' => 'পূরণ হয়েছে',
        'cancelled' => 'বাতিল',
        'expired' => 'মেয়াদোত্তীর্ণ',
    ];

    public const NEEDED_WHEN = [
        'now' => 'এখনই',
        'today' => 'আজ',
        'tomorrow' => 'কাল',
    ];

    public static function getNavigationBadge(): ?string
    {
        $count = BloodRequest::where('status', 'open')->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('blood_group')
                    ->label('ব্লাড গ্রুপ')
                    ->options(array_combine(Donor::BLOOD_GROUPS, Donor::BLOOD_GROUPS))
                    ->required(),
                Select::make('bags')
                    ->label('কত ব্যাগ')
                    ->options([1 => '১', 2 => '২', 3 => '৩', 4 => '৪+'])
                    ->required(),
                Select::make('needed_when')
                    ->label('কখন লাগবে')
                    ->options(self::NEEDED_WHEN)
                    ->required(),
                TextInput::make('hospital')
                    ->label('হাসপাতাল বা স্থান')
                    ->required()
                    ->maxLength(120),
                TextInput::make('phone')
                    ->label('অনুরোধকারীর মোবাইল')
                    ->required()
                    ->tel()
                    ->length(11),
                Select::make('status')
                    ->label('অবস্থা')
                    ->options(self::STATUSES)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('কখন এসেছে')
                    ->since()
                    ->sortable(),
                TextColumn::make('blood_group')
                    ->label('গ্রুপ')
                    ->badge()
                    ->color('danger')
                    ->sortable(),
                TextColumn::make('bags')
                    ->label('ব্যাগ'),
                TextColumn::make('needed_when')
                    ->label('কখন লাগবে')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => self::NEEDED_WHEN[$state] ?? $state)
                    ->color(fn (string $state): string => $state === 'now' ? 'danger' : 'warning'),
                TextColumn::make('hospital')
                    ->label('হাসপাতাল')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('phone')
                    ->label('মোবাইল')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('status')
                    ->label('অবস্থা')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => self::STATUSES[$state] ?? $state)
                    ->color(fn (string $state): string => match ($state) {
                        'open' => 'danger',
                        'fulfilled' => 'success',
                        'expired' => 'warning',
                        default => 'gray',
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('15s')
            ->filters([
                SelectFilter::make('status')
                    ->label('অবস্থা')
                    ->options(self::STATUSES)
                    ->default('open'),
                SelectFilter::make('blood_group')
                    ->label('ব্লাড গ্রুপ')
                    ->options(array_combine(Donor::BLOOD_GROUPS, Donor::BLOOD_GROUPS)),
            ])
            ->recordActions([
                Action::make('fulfil')
                    ->label('পূরণ হয়েছে')
                    ->icon(Heroicon::OutlinedCheckCircle)
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (BloodRequest $record): bool => $record->status === 'open')
                    ->action(fn (BloodRequest $record) => $record->update(['status' => 'fulfilled'])),
                Action::make('cancel')
                    ->label('বাতিল')
                    ->icon(Heroicon::OutlinedXCircle)
                    ->color('gray')
                    ->requiresConfirmation()
                    ->visible(fn (BloodRequest $record): bool => $record->status === 'open')
                    ->action(fn (BloodRequest $record) => $record->update(['status' => 'cancelled'])),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBloodRequests::route('/'),
            'edit' => EditBloodRequest::route('/{record}/edit'),
        ];
    }
}
