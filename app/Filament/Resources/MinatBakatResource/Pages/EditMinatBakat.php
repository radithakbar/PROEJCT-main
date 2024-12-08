<?php

namespace App\Filament\Resources\MinatBakatResource\Pages;

use App\Filament\Resources\MinatBakatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMinatBakat extends EditRecord
{
    protected static string $resource = MinatBakatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
