<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\UsuariosController;

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

Route::get('/datos',[DatosController::class,'index']);
Route::post('/datos/registrar',[DatosController::class,'store']);
Route::put('/datos/actualizar',[DatosController::class,'update']);


Route::get('/usuarios',[UsuariosController::class,'index']);
Route::post('/usuarios/registrar',[UsuariosController::class,'store']);
Route::put('/usuarios/actualizar',[UsuariosController::class,'update']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
