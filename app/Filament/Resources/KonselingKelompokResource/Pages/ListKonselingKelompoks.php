<?php

namespace App\Filament\Resources\KonselingKelompokResource\Pages;

use App\Filament\Resources\KonselingKelompokResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKonselingKelompoks extends ListRecords
{
    protected static string $resource = KonselingKelompokResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
