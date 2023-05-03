<?php

namespace App\Filament\Resources\ShortDomainResource\Pages;

use App\Filament\Resources\ShortDomainResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShortDomain extends EditRecord
{
    protected static string $resource = ShortDomainResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
