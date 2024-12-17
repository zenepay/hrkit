<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum EmployeeStatus: string implements HasColor, HasLabel
{
        // case Re_Hire = 're-hire';
    case Existing = 'existing';
    case No_Show = 'no-show';
    case Resignation = 'resignation';
    case Termination = 'termination';
    case Retrenchment = 'retrenchment';


    public function getLabel(): string
    {
        return match ($this) {

            self::Existing => __('Existing'),
            self::No_Show => __('No Show'),
            self::Resignation => __('Resignation'),
            self::Termination => __('Termination'),
            self::Retrenchment => __('Retrenchment'),
            default => __('Existing'),
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            // self::Re_Hire => 'primary',
            self::Existing => 'success',
            self::No_Show => 'info',
            self::Resignation => 'danger',
            self::Termination => 'danger',
            self::Retrenchment => 'gray',
            default => __('default'),
        };
    }
}
