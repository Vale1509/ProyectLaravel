<?php

use App\Http\Controllers\AController;
use App\Http\Controllers\AdoptanteController;
use App\Http\Controllers\DController;
use App\Http\Controllers\DonacionController;
use App\Http\Controllers\MController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PController;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\VController;
use App\Http\Controllers\VoluntarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', [MenuController::class, 'index'])->name('menu.index');

// Rutas para PerroController
Route::prefix('perros')->group(function () {
    Route::get('/', [PerroController::class, 'index'])->name('perro.index');
    Route::post('/registrar', [PerroController::class, 'create'])->name('perro.create');
    Route::post('/modificar', [PerroController::class, 'update'])->name('perro.update');
    Route::get('/eliminar-{id}', [PerroController::class, 'delete'])->name('perro.delete');
});

// Rutas para AdoptanteController
Route::prefix('adoptantes')->group(function () {
    Route::get('/', [AdoptanteController::class, 'index'])->name('adoptante.index');
    Route::post('/registrar', [AdoptanteController::class, 'create'])->name('adoptante.create');
    Route::post('/modificar', [AdoptanteController::class, 'update'])->name('adoptante.update');
    Route::get('/eliminar-{id}', [AdoptanteController::class, 'delete'])->name('adoptante.delete');
});

// Rutas para VoluntarioController
Route::prefix('voluntarios')->group(function () {
    Route::get('/', [VoluntarioController::class, 'index'])->name('voluntario.index');
    Route::post('/registrar', [VoluntarioController::class, 'create'])->name('voluntario.create');
    Route::post('/modificar', [VoluntarioController::class, 'update'])->name('voluntario.update');
    Route::get('/eliminar-{id}', [VoluntarioController::class, 'delete'])->name('voluntario.delete');
});

// Rutas para DonacionController
Route::prefix('donaciones')->group(function () {
    Route::get('/', [DonacionController::class, 'index'])->name('donacion.index');
    Route::post('/registrar', [DonacionController::class, 'create'])->name('donacion.create');
    Route::post('/modificar', [DonacionController::class, 'update'])->name('donacion.update');
    Route::get('/eliminar-{id}', [DonacionController::class, 'delete'])->name('donacion.delete');
});

// Rutas para RegistroController
Route::prefix('registros')->group(function () {
    Route::get('/', [RegistroController::class, 'index'])->name('registro.index');
    Route::post('/registrar', [RegistroController::class, 'create'])->name('registro.create');
    Route::post('/modificar', [RegistroController::class, 'update'])->name('registro.update');
    Route::get('/eliminar-{id}', [RegistroController::class, 'delete'])->name('registro.delete');
});*/

Route::get('/', [MController::class, 'index'])->name('m.index');
// Rutas para PerroController
Route::prefix('perros')->group(function () {
    Route::get('/', [PController::class, 'index'])->name('p.index');
    Route::post('/registrar', [PController::class, 'create'])->name('p.create');
    Route::put('/perros/modificar/{perro}', [PController::class,'update'])->name('p.update');
    Route::get('/eliminar-{id}', [PController::class, 'delete'])->name('p.delete');
});

// Rutas para AdoptanteController
Route::prefix('adoptantes')->group(function () {
    Route::get('/', [AController::class, 'index'])->name('a.index');
    Route::post('/registrar', [AController::class, 'create'])->name('a.create');
    Route::put('/adoptantes/modificar/{adoptante}', [AController::class, 'update'])->name('a.update');
    Route::get('/eliminar-{id}', [AController::class, 'delete'])->name('a.delete');
});

// Rutas para VoluntarioController
Route::prefix('voluntarios')->group(function () {
    Route::get('/', [VController::class, 'index'])->name('v.index');
    Route::post('/registrar', [VController::class, 'create'])->name('v.create');
    Route::put('/voluntarios/modificar/{voluntario}', [VController::class, 'update'])->name('v.update');
    Route::get('/eliminar-{id}', [VController::class, 'delete'])->name('v.delete');
});

// Rutas para DonacionController
Route::prefix('donaciones')->group(function () {
    Route::get('/', [DController::class, 'index'])->name('d.index');
    Route::post('/registrar', [DController::class, 'create'])->name('d.create');
    Route::put('/donaciones/modificar/{donacion}', [DController::class, 'update'])->name('d.update');
    Route::get('/eliminar-{id}', [DController::class, 'delete'])->name('d.delete');
});



