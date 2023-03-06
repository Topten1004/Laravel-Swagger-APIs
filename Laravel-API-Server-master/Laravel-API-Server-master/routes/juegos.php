<?php

use App\Http\Controllers\DesarrolladoraController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\JuegoController;

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

Route::prefix('juegos')->group(function () {
  Route::get('/', [JuegoController::class, 'index'])->name('getAllJuegos');
  Route::get('/paginate', [JuegoController::class, 'paginate'])->name('getPaginateJuegos');
  Route::get('/random', [JuegoController::class, 'random'])->name('getRandomJuegos');
  Route::post('/', [JuegoController::class, 'store'])->name('addJuego')->middleware('auth:sanctum');
  Route::get('{slug}', [JuegoController::class, 'show'])->name('getJuego');
  Route::post('/edit', [JuegoController::class, 'update'])->name('editJuego')->middleware('auth:sanctum');
  Route::delete('/delete/{slug}', [JuegoController::class, 'delete'])->name('deleteJuego')->middleware('auth:sanctum');
  Route::post('/filter/search/', [JuegoController::class, 'filter'])->name('filterJuego');
  Route::prefix('desarrolladoras')->group(function () {
    Route::get('/show/all', [DesarrolladoraController::class, 'index'])->name('getAllDesarrolladoras');
    Route::get('/{slug}', [DesarrolladoraController::class, 'show'])->name('getJuegoDesarrolladora');
  });
  Route::prefix('generos')->group(function () {
    Route::get('/show/all', [GeneroController::class, 'index'])->name('getAllGeneros');
    Route::get('/{slug}', [GeneroController::class, 'show'])->name('getJuegosGenero');
  });
});