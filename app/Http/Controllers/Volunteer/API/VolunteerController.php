<?php

namespace App\Http\Controllers\Volunteer\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateVolunteerRequest;
use App\Models\Address;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $user = Auth::user();
        if ($user) {
            $volunteer = Volunteer::where('user_id', $user->id)
                ->with(['user.address'])  // Eager load the address of the user
                ->first();
            return apiResponse(true, 'volunteer profile', $volunteer, 200);
        }
        return apiResponse(false, 'user not found', [], 404);
    }


    public function update(UpdateVolunteerRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
        if ($user) {
            $user->address;
            if ($request->has('address')) {
                $address = Address::where('user_id', $user->id)->first();
                $address->update(['address' => $data['address']]);
            }
            if ($request->has('city')) {
                $address = Address::where('user_id', $user->id)->first();
                $address->update(['city' => $data['city']]);
            }
            $user_fields = $request->only([
                'name',
                'email',
                'phone',
                'password',
            ]);
            $user->update($user_fields);
            return apiResponse(true, 'volunteer profile updated', $user, 200);
        }
        return apiResponse(false, 'user not found', [], 404);
    }


    public function destroy(string $id)
    {
        //
    }
}
