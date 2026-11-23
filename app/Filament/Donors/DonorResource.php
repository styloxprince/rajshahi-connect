<?php

namespace App\Filament\Resources\Donors;

use App\Filament\Resources\Donors\Pages\CreateDonor;
use App\Filament\Resources\Donors\Pages\EditDonor;
use App\Filament\Resources\Donors\Pages\ListDonors;
use App\Models\Donor;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class DonorResource extends Resource
{
    protected static ?string $model = Donor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;

    protected static ?string $modelLabel = 'রক্তদাতা';

    protected static ?string $pluralModelLabel = 'রক্তদাতা';

    protected static ?string $navigationLabel = 'রক্তদাতা';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('নাম')
                    ->required()
                    ->maxLength(100),
                TextInput::make('phone')
                    ->label('মোবাইল নম্বর')
                    ->required()
                    ->tel()
                    ->length(11)
                    ->regex('/^01[3-9][0-9]{8}$/')
                    ->unique(ignoreRecord: true),
                Select::make('blood_group')
                    ->label('ব্লাড গ্রুপ')
                    ->options(array_combine(Donor::BLOOD_GROUPS, Donor::BLOOD_GROUPS))
                    ->required(),
                Select::make('area')
                    ->label('এলাকা')
                    ->options(array_combine(Donor::AREAS, Donor::AREAS))
                    ->required(),
                DatePicker::make('last_donated_at')
                    ->label('শেষ রক্তদানের তারিখ')
                    ->maxDate(now()),
                Toggle::make('is_available')
                    ->label('বর্তমানে রক্ত দিতে পারবেন')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('নাম')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('মোবাইল')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('blood_group')
                    ->label('গ্রুপ')
                    ->badge()
                    ->color('danger')
                    ->sortable(),
                TextColumn::make('area')
                    ->label('এলাকা')
                    ->searchable(),
                TextColumn::make('last_donated_at')
                    ->label('শেষ রক্তদান')
                    ->date('d M Y')
                    ->placeholder('—')
                    ->sortable(),
                ToggleColumn::make('is_available')
                    ->label('সক্রিয়'),
                TextColumn::make('created_at')
                    ->label('নিবন্ধনের সময়')
                    ->dateTime('d M Y, h:i A')
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('blood_group')
                    ->label('ব্লাড গ্রুপ')
                    ->options(array_combine(Donor::BLOOD_GROUPS, Donor::BLOOD_GROUPS)),
                SelectFilter::make('area')
                    ->label('এলাকা')
                    ->options(array_combine(Donor::AREAS, Donor::AREAS)),
                TernaryFilter::make('is_available')
                    ->label('সক্রিয় অবস্থা'),
            ])
            ->recordActions([
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
            'index' => ListDonors::route('/'),
            'create' => CreateDonor::route('/create'),
            'edit' => EditDonor::route('/{record}/edit'),
        ];
    }
}
