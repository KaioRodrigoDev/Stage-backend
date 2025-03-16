<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\SubprocessController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::post('/sanctum/token', function (Request $request) {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);
 
//     $user = User::where('email', $request->email)->first();
 
//     if (! $user || ! Hash::check($request->password, $user->password)) {
//         throw ValidationException::withMessages([
//             'email' => ['The provided credentials are incorrect.'],
//         ]);
//     }
 
//     return $user->createToken($request->email)->plainTextToken;
// });

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'getDashboardData']);
    Route::get('/areas', [AreaController::class, 'getAllAreas']);
    Route::post('/area', [AreaController::class, 'createArea']);
    Route::delete('/area', [AreaController::class, 'removeArea']);
    Route::post('/assign-processes-to-area', [ProcessController::class, 'assignProcessToArea']);
    Route::post('/unassign-processe-from-area', [ProcessController::class, 'unassignProcessFromArea']);
    Route::get('/area-by-user', [AreaController::class, 'getAreaByUser']);
    Route::get('/processes', [ProcessController::class, 'getAllProcesses']);
    Route::post('/processes', [ProcessController::class, 'createProcess']);
    Route::delete('/processes', [ProcessController::class, 'deleteProcess']);
    Route::post('/processes-tools', [ProcessController::class, 'createTools']);
    Route::post('/sub-process', [SubprocessController::class, 'createSubprocess']);
    Route::delete('/sub-process', [SubprocessController::class, 'removeSubprocess']);
});