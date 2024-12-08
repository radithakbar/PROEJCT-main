<?php

namespace App\Filament\Resources\GuruBKResource\Pages;

use App\Filament\Resources\GuruBKResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGuruBKS extends ListRecords
{
    protected static string $resource = GuruBKResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(
                
            )->label('New Guru BK'),
        ];
    }
}
