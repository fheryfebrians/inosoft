<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KendaraanController;
use App\Http\Controllers\Api\PenjualanController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function() {
    Route::get('kendaraan/stok', [KendaraanController::class, 'stok']);
    Route::resource('kendaraan', KendaraanController::class);
    Route::get('penjualan/laporan', [PenjualanController::class, 'laporan']);
    Route::resource('penjualan', PenjualanController::class);
});