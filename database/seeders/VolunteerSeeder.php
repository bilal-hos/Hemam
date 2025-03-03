<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 30; $i++) {
            $customer = Volunteer::factory()->create();
            $userable_id = $customer->id;
            $userable_type = get_class($customer);
            $user_id = $customer->user_id;
            $user = User::find($user_id);
            $user->update([
                'userable_id' => $userable_id,
                'userable_type' => $userable_type,
            ]);
        }
    }
}
