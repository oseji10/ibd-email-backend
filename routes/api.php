<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NomineesController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/nominees/all-nominees', [NomineesController::class, 'showNominees']);
    Route::post('/nominees/add-nominee', [NomineesController::class, 'addNominee']);
});
Route::get('/nominees/update-nominee/{id}', [NomineesController::class, 'updateNomineeStatusToAccepted']);
// Add this to your routes/api.php file
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
