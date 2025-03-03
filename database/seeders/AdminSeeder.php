<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 3; $i++) {
            $admin = Admin::factory()->create();
            $userable_id = $admin->id;
            $userable_type = get_class($admin);
            $user_id = $admin->user_id;
            $user = User::find($user_id);
            $user->update([
                'userable_id' => $userable_id,
                'userable_type' => $userable_type,
            ]);
        }
    }
}
