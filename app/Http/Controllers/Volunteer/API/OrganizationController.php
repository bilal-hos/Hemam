<?php

namespace App\Http\Controllers\Volunteer\API;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $organizations = Organization::all();
            return apiResponse(true, 'organizations', $organizations, 200);
        }
        return apiResponse(false, 'user not found', [], 404);
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
    public function show(string $id)
    {
        $organization = Organization::find($id);
        if ($organization) {
            return apiResponse(true, 'organization', $organization->with(['user', 'opportunities'])->get(), 200);
        }
        return apiResponse(false, 'organization not found', [], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
