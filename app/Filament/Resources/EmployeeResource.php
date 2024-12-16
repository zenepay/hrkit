<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Employment')
                            ->schema([
                                Forms\Components\TextInput::make('title_name')
                                    ->maxLength(10),
                                Forms\Components\TextInput::make('first_name')
                                    ->required()
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('last_name')
                                    ->required()
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('nick_name')
                                    ->maxLength(30),
                                Forms\Components\TextInput::make('first_name_th')
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('last_name_th')
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('nick_name_th')
                                    ->maxLength(30),
                                Forms\Components\TextInput::make('full_name_th')
                                    ->maxLength(100),


                                Forms\Components\Select::make('company_id')
                                    ->relationship('company', 'name')
                                    ->required(),
                                Forms\Components\Select::make('division_id')
                                    ->relationship('division', 'name'),
                                Forms\Components\Select::make('department_id')
                                    ->relationship('department', 'name'),
                                Forms\Components\Select::make('supervisor_id')
                                    ->relationship('supervisor', 'id'),
                                Forms\Components\TextInput::make('staff_no')
                                    ->maxLength(20),
                                Forms\Components\TextInput::make('como_code')
                                    ->maxLength(20),
                                Forms\Components\Select::make('position_id')
                                    ->relationship('position', 'name'),
                                Forms\Components\DatePicker::make('start_date'),
                                Forms\Components\TextInput::make('probation_days')
                                    ->required()
                                    ->numeric()
                                    ->default(120),
                                Forms\Components\DatePicker::make('pass_probation_date'),
                                Forms\Components\TextInput::make('security_hospital')
                                    ->maxLength(100),
                                Forms\Components\DatePicker::make('profident_fund_join_date'),
                                Forms\Components\DatePicker::make('profident_fund_leave_date'),
                                Forms\Components\TextInput::make('status')
                                    ->maxLength(20),

                                Forms\Components\TextInput::make('onboarding_checklist'),
                                Forms\Components\TextInput::make('tags'),
                                Forms\Components\Select::make('updated_by_id')
                                    ->relationship('updatedBy', 'name'),
                                Forms\Components\TextInput::make('notify_to_hr')
                                    ->numeric(),
                                Forms\Components\DatePicker::make('end_date'),
                                Forms\Components\Toggle::make('is_rehired')
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Personal')
                            ->schema([
                                Forms\Components\DatePicker::make('birth_date'),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('phone')
                                    ->tel()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('national_id_no')
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('national_id_no_expiry_date'),
                                Forms\Components\TextInput::make('passport_no')
                                    ->maxLength(225),
                                Forms\Components\DatePicker::make('passport_no_expiry_date'),
                                Forms\Components\TextInput::make('photo_path')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('age')
                                    ->numeric(),
                                Forms\Components\TextInput::make('nationality')
                                    ->maxLength(30),
                                Forms\Components\TextInput::make('religion')
                                    ->maxLength(20),
                                Forms\Components\TextInput::make('marital_status')
                                    ->maxLength(20),
                                Forms\Components\TextInput::make('military_status')
                                    ->maxLength(20),
                            ]),
                        Tabs\Tab::make('Contact')
                            ->schema([

                                Forms\Components\TextInput::make('contact_person1_name')
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('contact_person1_phone')
                                    ->tel()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('contact_person1_relation')
                                    ->maxLength(30),
                                Forms\Components\TextInput::make('contact_person2_name')
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('contact_person2_phone')
                                    ->tel()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('contact_person2_relation')
                                    ->maxLength(30),
                                Forms\Components\TextInput::make('address_house_no')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('address_village')
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('address_street')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('address_subdistrict')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('address_district')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('address_city')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('address_province')
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('address_postcode')
                                    ->maxLength(5),
                                Forms\Components\TextInput::make('address_house_no_th')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('address_village_th')
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('address_street_th')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('address_subdistrict_th')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('address_district_th')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('address_city_th')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('address_province_th')
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('address_postcode_th')
                                    ->maxLength(5),
                            ]),
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nick_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name_th')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name_th')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nick_name_th')
                    ->searchable(),
                Tables\Columns\TextColumn::make('full_name_th')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_hash')
                    ->searchable(),
                Tables\Columns\TextColumn::make('national_id_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('national_id_no_hash')
                    ->searchable(),
                Tables\Columns\TextColumn::make('national_id_no_expiry_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('passport_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('passport_no_expiry_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('photo_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('age')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nationality')
                    ->searchable(),
                Tables\Columns\TextColumn::make('religion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('marital_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('military_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person1_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person1_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person1_relation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person2_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person2_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person2_relation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_house_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_village')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_street')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_subdistrict')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_district')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_province')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_postcode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_house_no_th')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_village_th')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_street_th')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_subdistrict_th')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_district_th')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_city_th')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_province_th')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_postcode_th')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('division.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('department.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supervisor.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('staff_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('como_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('workplace_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('probation_days')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pass_probation_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('security_hospital')
                    ->searchable(),
                Tables\Columns\TextColumn::make('profident_fund_join_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('profident_fund_leave_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updatedBy.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('notify_to_hr')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_rehired')
                    ->boolean(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
