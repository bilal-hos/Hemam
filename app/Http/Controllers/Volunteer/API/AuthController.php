<?php

namespace App\Http\Controllers\Volunteer\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVolunteerRequest;
use App\Models\Volunteer;
use App\Services\VolunteerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $volunteerService;

    public function __construct(VolunteerService $volunteerService)
    {
        $this->volunteerService = $volunteerService;
    }


    public function register(StoreVolunteerRequest $request)
    {
        $data = $request->validated();
        $response = $this->volunteerService->register($data);
        return apiResponse(true, 'user created successfully', $response, 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $info = $this->volunteerService->login($credentials);
        if (!$info) {
            return apiResponse(false, 'Invalid credentials', [], 401);
        }
        return apiResponse(true, 'Volunteer logged in successfully', $info, 200);
    }

    public function logout()
    {
        $user = Auth::user();
        if ($user) {
            $user->currentAccessToken()->delete();
            return apiResponse(true, 'logged out successfully');
        } else {
            return apiResponse(false, 'somthing went wrong', [], 404);
        }
    }
}
