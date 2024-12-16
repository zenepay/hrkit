<?php

namespace App\Filament\Resources\PositionLevelResource\Pages;

use App\Filament\Resources\PositionLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPositionLevel extends ViewRecord
{
    protected static string $resource = PositionLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
