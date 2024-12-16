<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\Department;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;


class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title_name' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'full_name' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'nick_name' => $this->faker->regexify('[A-Za-z0-9]{30}'),
            'first_name_th' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'last_name_th' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'nick_name_th' => $this->faker->regexify('[A-Za-z0-9]{30}'),
            'full_name_th' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'gender' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'birth_date' => $this->faker->date(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'phone_hash' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'national_id_no' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'national_id_no_hash' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'national_id_no_expiry_date' => $this->faker->date(),
            'passport_no' => $this->faker->regexify('[A-Za-z0-9]{225}'),
            'passport_no_expiry_date' => $this->faker->date(),
            'photo_path' => $this->faker->word(),
            'age' => $this->faker->numberBetween(-10000, 10000),
            'nationality' => $this->faker->regexify('[A-Za-z0-9]{30}'),
            'religion' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'marital_status' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'military_status' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'contact_person1_name' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'contact_person1_phone' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'contact_person1_relation' => $this->faker->regexify('[A-Za-z0-9]{30}'),
            'contact_person2_name' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'contact_person2_phone' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'contact_person2_relation' => $this->faker->regexify('[A-Za-z0-9]{30}'),
            'address_house_no' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'address_village' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'address_street' => $this->faker->word(),
            'address_subdistrict' => $this->faker->word(),
            'address_district' => $this->faker->word(),
            'address_city' => $this->faker->word(),
            'address_province' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'address_postcode' => $this->faker->regexify('[A-Za-z0-9]{5}'),
            'address_house_no_th' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'address_village_th' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'address_street_th' => $this->faker->word(),
            'address_subdistrict_th' => $this->faker->word(),
            'address_district_th' => $this->faker->word(),
            'address_city_th' => $this->faker->word(),
            'address_province_th' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'address_postcode_th' => $this->faker->regexify('[A-Za-z0-9]{5}'),
            'company_id' => Company::factory(),
            'division_id' => Division::factory(),
            'department_id' => Department::factory(),
            'supervisor_id' => null,
            'staff_no' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'como_code' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'position_id' => Position::factory(),
            'start_date' => $this->faker->date(),
            'probation_days' => $this->faker->numberBetween(-10000, 10000),
            'pass_probation_date' => $this->faker->date(),
            'security_hospital' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'profident_fund_join_date' => $this->faker->date(),
            'profident_fund_leave_date' => $this->faker->date(),
            'status' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'onboarding_checklist' => '{}',
            'tags' => '{}',
            'updated_by_id' => User::factory(),
            'notify_to_hr' => $this->faker->numberBetween(-10000, 10000),
            'end_date' => $this->faker->date(),
            'is_rehired' => $this->faker->boolean(),
            'deleted_at' => $this->faker->dateTime(),
        ];
    }
}
