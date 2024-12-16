<?php

namespace App\Filament\Resources\PositionLevelResource\Pages;

use App\Filament\Resources\PositionLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPositionLevel extends EditRecord
{
    protected static string $resource = PositionLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
