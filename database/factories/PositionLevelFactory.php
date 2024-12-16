<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\PositionLevel;

class PositionLevelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PositionLevel::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'company_id' => Company::factory(),
            'level' => $this->faker->randomFloat(1, 0, 9.9),
            'purchase_quota' => $this->faker->randomFloat(2, 0, 99999999.99),
        ];
    }
}
