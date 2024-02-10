<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('estudiante', App\Http\Controllers\EstudianteController::class);

Route::resource('curso', App\Http\Controllers\CursoController::class);

Route::resource('profesor', App\Http\Controllers\ProfesorController::class);

Route::resource('aula', App\Http\Controllers\AulaController::class);

Route::resource('nivel', App\Http\Controllers\NivelController::class);

Route::resource('paralelo', App\Http\Controllers\ParaleloController::class);

Route::resource('asignatura', App\Http\Controllers\AsignaturaController::class);

Route::resource('horario', App\Http\Controllers\HorarioController::class);
