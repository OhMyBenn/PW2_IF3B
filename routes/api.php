<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\FakultasController;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/fakultas', [FakultasController::class,'index']);
Route::get('/prodi', [ProdiController::class,'index']);
Route::get('/mahasiswa', [MahasiswaController::class,'index']);

Route::post('/fakultas', [FakultasController::class,'store']);
Route::post('/prodi', [ProdiController::class,'store']);
Route::post('/mahasiswa', [MahasiswaController::class,'store']);

Route::patch('/fakultas/{id}', [FakultasController::class,'update']);
Route::patch('/prodi/{id}', [ProdiController::class,'update']);
Route::patch('/mahasiswa/{id}', [MahasiswaController::class,'update']);

Route::delete('/fakultas/{id}', [FakultasController::class,'destroy']);
Route::delete('/prodi/{id}', [ProdiController::class,'destroy']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class,'destroy']);

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class, 'login']);