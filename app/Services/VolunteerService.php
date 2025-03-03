<?php

namespace App\Services;

use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;

class VolunteerService
{
    /**
     * Attempt to log the user in.
     *
     * @param array $credentials
     * @return bool
     */
    public function register(array $data)
    {
        $user = User::create($data);
        $volunteer = Volunteer::create(['user_id' => $user->id]);

        $user->update(['userable_id' => $volunteer->id, 'userable_type' => Volunteer::class]);
        $token = $user->createToken('volunteer')->plainTextToken;

        return $info = ['volunteer' => $user, 'token' => $token];
    }

    /**
     * Log the user out.
     *
     * @return void
     */
    public function logout(): void
    {
        Auth::logout();
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        return Auth::user();
    }

    /**
     * Check if the user is authenticated.
     *
     * @return bool
     */
    public function check(): bool
    {
        return Auth::check();
    }
}
