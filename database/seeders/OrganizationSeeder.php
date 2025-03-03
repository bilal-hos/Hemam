<?php

namespace Database\Seeders;


use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $customer = Organization::factory()->create();
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
