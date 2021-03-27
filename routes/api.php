<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//API Login
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user', [AuthController::class, 'user']);

//API Masyarakat

//API Petugas

//API Pengaduan
Route::get('/pengaduan', [PengaduanController::class, 'all']);
Route::get('/pengaduan/{id}', [PengaduanController::class, 'show']);
Route::post('/pengaduan', [PengaduanController::class, 'store']);
Route::put('/pengaduan/{id}', [PengaduanController::class, 'update']);
Route::delete('/pengaduan/{id}', [PengaduanController::class, 'delete']);

//API Tanggapan
