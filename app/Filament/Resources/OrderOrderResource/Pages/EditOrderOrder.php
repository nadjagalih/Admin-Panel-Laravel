<?php

namespace App\Filament\Resources\OrderOrderResource\Pages;

use App\Filament\Resources\OrderOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderOrder extends EditRecord
{
    protected static string $resource = OrderOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
