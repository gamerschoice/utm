<?php

namespace App\Filament\Resources\ShortdomainResource\Pages;

use App\Filament\Resources\ShortdomainResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShortdomain extends EditRecord
{
    protected static string $resource = ShortdomainResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
