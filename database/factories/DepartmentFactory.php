<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\Department;
use App\Models\Division;
use App\Models\Employee;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'code' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'type' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'company_id' => Company::first()->id,
            'division_id' => Division::first()->id,
            'manager_id' => null,
            'description' => $this->faker->text(),
            'address' => $this->faker->text(),
        ];
    }
}
