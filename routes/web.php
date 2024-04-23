<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Usuario;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');})->name('welcome');
Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
Route::get('/Usuario', [UsuarioController::class,'index'])->name('usuario-index');
Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
Route::get('/equipos/listado', [EquipoController::class, 'listadoLibros'])->name('listado.index');
Route::get('/equipos/editar/{id}', [EquipoController::class, 'equipoEditar'])->name('equipo.editar');
Route::get('/usuarios/listado', [UsuarioController::class, 'listadoUsuarios'])->name('listadoUsuarios.index');
Route::get('/equipos/buscar', [EquipoController::class, 'buscarEquipo'])->name('buscar.equipo');
Route::get('/personas/buscar', [UsuarioController::class, 'buscarPersona'])->name('buscar.persona');
Route::get('/personas/buscar', [UsuarioController::class, 'buscarPersona'])->name('buscar.persona');
Route::get('/user', [ UserController::class, 'index'])->name('user-index');
Route::get('/facture', [ FacturaController::class, 'index'])->name('factura-index');
Route::get('/pdfFactura/{id}', [ FacturaController::class, 'generarPDF'])->name('pfd-factura');


});

