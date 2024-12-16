<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

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


    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
