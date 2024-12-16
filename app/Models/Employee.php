<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_name',
        'first_name',
        'last_name',
        'full_name',
        'nick_name',
        'first_name_th',
        'last_name_th',
        'nick_name_th',
        'full_name_th',
        'gender',
        'birth_date',
        'email',
        'phone',
        'phone_hash',
        'national_id_no',
        'national_id_no_hash',
        'national_id_no_expiry_date',
        'passport_no',
        'passport_no_expiry_date',
        'photo_path',
        'age',
        'nationality',
        'religion',
        'marital_status',
        'military_status',
        'contact_person1_name',
        'contact_person1_phone',
        'contact_person1_relation',
        'contact_person2_name',
        'contact_person2_phone',
        'contact_person2_relation',
        'address_house_no',
        'address_village',
        'address_street',
        'address_subdistrict',
        'address_district',
        'address_city',
        'address_province',
        'address_postcode',
        'address_house_no_th',
        'address_village_th',
        'address_street_th',
        'address_subdistrict_th',
        'address_district_th',
        'address_city_th',
        'address_province_th',
        'address_postcode_th',
        'company_id',
        'division_id',
        'department_id',
        'supervisor_id',
        'staff_no',
        'como_code',
        'position_id',
        'workplace_id',
        'start_date',
        'probation_days',
        'pass_probation_date',
        'security_hospital',
        'profident_fund_join_date',
        'profident_fund_leave_date',
        'status',
        'onboarding_checklist',
        'tags',
        'updated_by_id',
        'notify_to_hr',
        'end_date',
        'is_rehired',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'birth_date' => 'date',
        'national_id_no_expiry_date' => 'date',
        'passport_no_expiry_date' => 'date',
        'company_id' => 'integer',
        'division_id' => 'integer',
        'department_id' => 'integer',
        'supervisor_id' => 'integer',
        'position_id' => 'integer',
        'workplace_id' => 'integer',
        'start_date' => 'date',
        'pass_probation_date' => 'date',
        'profident_fund_join_date' => 'date',
        'profident_fund_leave_date' => 'date',
        'onboarding_checklist' => 'array',
        'tags' => 'array',
        'updated_by_id' => 'integer',
        'end_date' => 'date',
        'is_rehired' => 'boolean',
        'deleted_at' => 'timestamp',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function workplace(): BelongsTo
    {
        return $this->belongsTo(Workplace::class);
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
