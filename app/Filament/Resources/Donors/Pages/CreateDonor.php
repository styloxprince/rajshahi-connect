<?php

namespace App\Filament\Resources\Donors\Pages;

use App\Filament\Resources\Donors\DonorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDonor extends CreateRecord
{
    protected static string $resource = DonorResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // অ্যাডমিন নিজে ডোনার যোগ করলেও সম্মতির সময় রাখা হয়
        $data['consented_at'] = now();

        return $data;
    }
}
