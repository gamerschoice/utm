<?php

namespace App\Filament\Resources\ShortdomainResource\Pages;

use App\Filament\Resources\ShortdomainResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShortdomains extends ListRecords
{
    protected static string $resource = ShortdomainResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
