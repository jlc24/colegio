<?php

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes');
Route::get('/estudiantes/show', [EstudianteController::class, 'show'])->name('estudiantes.show');
Route::get('/estudiante/edit/{id}', [EstudianteController::class, 'edit'])->name('estudiante.edit');
Route::post('/estudiante', [EstudianteController::class, 'store'])->name('estudiante.store');
Route::post('/estudiante/{id}', [EstudianteController::class, 'update'])->name('estudiante.update');
Route::delete('/estudiante/{id}', [EstudianteController::class, 'destroy'])->name('estudiante.destroy');
Route::get('/cambiarEstadoEstudiante/{id}', [EstudianteController::class, 'cambiarEstadoEstudiante'])->name('estudiante.estado');

Route::get('/profesores', [ProfesorController::class, 'index'])->name('profesores');
Route::get('/profesores/show', [ProfesorController::class, 'show'])->name('profesores.show');
Route::get('/profesor/edit/{id}', [ProfesorController::class, 'edit'])->name('profesor.edit');
Route::post('/profesor', [ProfesorController::class, 'store'])->name('profesor.store');
Route::post('/profesor/{id}', [ProfesorController::class, 'update'])->name('profesor.update');
Route::delete('/profesor/{id}', [ProfesorController::class, 'destroy'])->name('profesor.destroy');
Route::get('/cambiarEstadoProfesor/{id}', [ProfesorController::class, 'cambiarEstadoProfesor'])->name('profesor.estado');

Route::resource('curso', App\Http\Controllers\CursoController::class);

Route::resource('profesor', App\Http\Controllers\ProfesorController::class);

Route::resource('aula', App\Http\Controllers\AulaController::class);

Route::resource('nivel', App\Http\Controllers\NivelController::class);

Route::resource('paralelo', App\Http\Controllers\ParaleloController::class);

Route::resource('asignatura', App\Http\Controllers\AsignaturaController::class);

Route::resource('horario', App\Http\Controllers\HorarioController::class);
