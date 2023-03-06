<?php

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

Route::prefix('auth')->group(function () {
  Route::post('register', [AuthController::class, 'register'])->name('register');
  Route::post('login', [AuthController::class, 'login'])->name('login');
  Route::get('userinfo', [AuthController::class, 'userinfo'])->name('userinfo')->middleware('auth:sanctum');
  Route::get('check', [AuthController::class, 'check'])->name('check');
  Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
  Route::delete('delete', [AuthController::class, 'delete'])->name('delete')->middleware('auth:sanctum');
});
