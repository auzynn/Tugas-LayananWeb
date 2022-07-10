<?php

use App\Http\Controllers\API\HotelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('hotel', HotelController::class);

// Route::post('/create', [HotelController::class, 'create']);
// Route::get('/edit/{id}', [HotelController::class, 'edit']);
// Route::put('/edit/{id}', [HotelController::class, 'update']);
// Route::get('/delete/{id}', [HotelController::class, 'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});