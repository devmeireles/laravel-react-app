<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('hotels')->name('hotels.')->group(function () {
    Route::get('/', [HotelController::class, 'index'])->name('index');
    Route::get('/{id}', [HotelController::class, 'show'])->name('show');
    Route::post('/', [HotelController::class, 'store'])->name('store');
    Route::patch('/{id}', [HotelController::class, 'update'])->name('update');
    Route::delete('/{id}', [HotelController::class, 'destroy'])->name('destroy');
});