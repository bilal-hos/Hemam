<?php

use App\Http\Controllers\Volunteer\API\AuthController;
use App\Http\Controllers\Volunteer\API\OpportunityController;
use App\Http\Controllers\Volunteer\API\OrganizationController;
use App\Http\Controllers\Volunteer\API\VolunteerController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('volunteer')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::get('/profile', [VolunteerController::class, 'show'])->middleware('auth:sanctum');
    Route::put('/profile', [VolunteerController::class, 'update'])->middleware('auth:sanctum');

    Route::apiResource('organizations', OrganizationController::class)->middleware('auth:sanctum');
    Route::apiResource('opportunities', OpportunityController::class)->middleware('auth:sanctum');
});
