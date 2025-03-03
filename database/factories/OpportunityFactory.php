<?php

namespace Database\Factories;

use App\Models\Organaization;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opportunity>
 */
class OpportunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cities = ['Damascus', 'Hammah', 'Aleppo', 'Daraa'];
        return [
            'organization_id' => Organization::inRandomOrder()->first()->id,  // Create a random organization
            'type' => $this->faker->word(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->dateTimeBetween('+1 week', '+1 year')->format('Y-m-d'),
            'status' => $this->faker->randomElement(['pending', 'active', 'completed']),
            'country' => 'Syria',  // You can change this to dynamic if needed
            'city' => $this->faker->randomElement($cities),
            'address' => $this->faker->address(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
        ];
    }
}
