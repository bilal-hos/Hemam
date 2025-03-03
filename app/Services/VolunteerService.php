<?php

namespace App\Services;

use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class VolunteerService
{

    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $volunteer = Volunteer::create([
            'user_id' => $user->id,
        ]);
        $user->userable_id = $volunteer->id;
        $user->userable_type = Volunteer::class;
        $user->save();

        $token = $user->createToken('volunteer')->plainTextToken;
        $volunteer = Volunteer::where('id', $volunteer->id)->with('user')->first();
        $response['volunteer'] = $volunteer;
        $response['token'] = $token;
        return $response;
    }



    public function login($credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('volunteer')->plainTextToken;
            $volunteer = Volunteer::where('user_id', $user->id)->with('user')->first();
            $response['volunteer'] = $volunteer;
            $response['token'] = $token;
            return $response;
        }
        return false;
    }
}
