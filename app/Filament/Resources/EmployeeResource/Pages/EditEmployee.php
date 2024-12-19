<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class EditEmployee extends EditRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['name'] = str_replace('  ', ' ', $data['name']);
        list($data['first_name'], $data['last_name']) = explode(' ', $data['name']);
        unset($data['name']);

        //dd($data);

        $data['pass_probation_date'] = Carbon::parse(strtotime($data['start_date']))->addDays((int) $data['probation_days'])->format('Y-m-d');
        //dd($data['pass_probation_date']);

        $record->update($data);

        return $record;
    }
}
