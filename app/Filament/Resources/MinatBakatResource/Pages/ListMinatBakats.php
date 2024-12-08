<?php

namespace App\Filament\Resources\MinatBakatResource\Pages;

use App\Filament\Resources\MinatBakatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMinatBakats extends ListRecords
{
    protected static string $resource = MinatBakatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
