<?php

namespace App\Http\Controllers\Volunteer\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVolunteerRequest;
use App\Models\Volunteer;
use App\Services\VolunteerService;
use Illuminate\Http\Request;

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
        $info = $this->volunteerService->register($data);

        return apiResponse(true, 'Volunteer registered successfully', $info, 201);
    }
}
