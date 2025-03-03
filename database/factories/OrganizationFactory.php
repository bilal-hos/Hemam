<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::whereNull('userable_id')->inRandomOrder()->first()->id,
            'logo' => $this->faker->imageUrl(),  // Replace with actual logo generation logic if needed
            'discrption' => $this->faker->sentence(),
            'industry' => $this->faker->word(),
            'approval_status' => 'pending',  // Default value
            'certificate' => $this->faker->word(),
            'facebook' => $this->faker->url(),
            'website' => $this->faker->url(),
        ];
    }
}
