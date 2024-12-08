<?php

namespace App\Filament\Resources\KonselingIndividuResource\Pages;

use App\Filament\Resources\KonselingIndividuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKonselingIndividu extends EditRecord
{
    protected static string $resource = KonselingIndividuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
