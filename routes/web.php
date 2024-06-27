<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AsignacionesController;

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
    return redirect('/login');
});

Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'index']);
Route::get('/usuarios/registrar', [App\Http\Controllers\UsuariosController::class, 'create']);
Route::post('/usuarios/registrar', [App\Http\Controllers\UsuariosController::class, 'store']);
Route::get('/usuarios/actualizar/{id}', [App\Http\Controllers\UsuariosController::class, 'edit']);
Route::put('/usuarios/actualizar/{id}', [App\Http\Controllers\UsuariosController::class, 'update']);

Route::get('/asignaciones', [AsignacionesController::class, 'index']);
Route::get('/asignaciones/registrar', [AsignacionesController::class, 'create']);
Route::post('/asignaciones/registrar', [AsignacionesController::class, 'store']);
Route::get('/asignaciones/actualizar/{id}', [AsignacionesController::class, 'edit']);
Route::put('/asignaciones/actualizar/{id}', [AsignacionesController::class, 'update']);
Route::get('/asignaciones/estado/{id}', [AsignacionesController::class, 'estado']);


Route::get('/cursos', [App\Http\Controllers\CursosController::class, 'index']);
Route::get('/cursos/registrar', [App\Http\Controllers\CursosController::class, 'create']);
Route::post('/cursos/registrar', [CursosController::class, 'store']);
Route::get('/cursos/actualizar/{id}', [App\Http\Controllers\CursosController::class, 'edit']);
Route::put('/cursos/actualizar/{id}', [CursosController::class, 'update']);
Route::get('/cursos/estado/{id}', [App\Http\Controllers\CursosController::class, 'estado']);

Route::get('/tareas', [App\Http\Controllers\TareasController::class, 'index']);
Route::get('/tareas/registrar', [App\Http\Controllers\TareasController::class, 'create']);
Route::post('/tareas/registrar', [TareasController::class, 'store']);
Route::get('/tareas/actualizar/{id}', [App\Http\Controllers\TareasController::class, 'edit']);
Route::put('/tareas/actualizar/{id}', [TareasController::class, 'update']);
Route::get('/tareas/eliminar/{id}', [TareasController::class, 'destroy']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
