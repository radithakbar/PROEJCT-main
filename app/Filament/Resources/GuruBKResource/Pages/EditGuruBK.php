<?php

namespace App\Filament\Resources\GuruBKResource\Pages;

use App\Filament\Resources\GuruBKResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuruBK extends EditRecord
{
    protected static string $resource = GuruBKResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
