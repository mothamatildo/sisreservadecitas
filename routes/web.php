<?php

use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\DoctorController;

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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// RUTAS PARA EL ADMIN 

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])
->name('admin.index')
->middleware ('auth');


// RUTAS PARA EL ADMIN - USUARIOS

Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])
->name('admin.usuarios.index')
->middleware ('auth');

Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])
->name('admin.usuarios.create')
->middleware ('auth');

Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])
->name('admin.usuarios.store')
->middleware ('auth');

Route::get ('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])
->name('admin.usuarios.show')
->middleware ('auth');

Route::get ('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])
->name('admin.usuarios.edit')
->middleware ('auth');

Route::put ('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])
->name('admin.usuarios.update')
->middleware ('auth');

Route::get ('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])
->name('admin.usuarios.confirmDelete')
->middleware ('auth');

Route::delete ('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])
->name('admin.usuarios.destroy')
->middleware ('auth');



// RUTAS PARA EL ADMIN - SECRETARIAS

Route::get('/admin/secretarias', [SecretariaController::class, 'index'])
->name('admin.secretarias.index')
->middleware('auth');

Route::get('/admin/secretarias/create', [SecretariaController::class, 'create'])
->name('admin.secretarias.create')
->middleware('auth');

Route::post('/admin/secretarias', [SecretariaController::class, 'store'])
->name('admin.secretarias.store')
->middleware('auth');

Route::get('/admin/secretarias/{id}', [SecretariaController::class, 'show'])
->name('admin.secretarias.show')
->middleware('auth');

Route::get('/admin/secretarias/{id}/edit', [SecretariaController::class, 'edit'])
->name('admin.secretarias.edit')
->middleware('auth');

Route::put('/admin/secretarias/{id}', [SecretariaController::class, 'update'])
->name('admin.secretarias.update')
->middleware('auth');

Route::get ('/admin/secretarias/{id}/confirm-delete', [App\Http\Controllers\SecretariaController::class, 'confirmDelete'])
->name('admin.secretarias.confirmDelete')
->middleware ('auth');

Route::delete ('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'destroy'])
->name('admin.secretarias.destroy')
->middleware ('auth');

// RUTAS PARA EL ADMIN - PACIENTES

Route::get('/admin/pacientes', [PacienteController::class, 'index'])
->name('admin.pacientes.index')
->middleware('auth');

Route::get('/admin/pacientes/create', [PacienteController::class, 'create'])
->name('admin.pacientes.create')
->middleware('auth');

Route::post('/admin/pacientes', [PacienteController::class, 'store'])
->name('admin.pacientes.store')
->middleware('auth');

Route::get('/admin/pacientes/{id}', [PacienteController::class, 'show'])
->name('admin.pacientes.show')
->middleware('auth');

Route::get('/admin/pacientes/{id}/edit', [PacienteController::class, 'edit'])
->name('admin.pacientes.edit')
->middleware('auth');

Route::put('/admin/pacientes/{id}', [PacienteController::class, 'update'])
->name('admin.pacientes.update')
->middleware('auth');

Route::get('/admin/pacientes/{id}/confirm-delete', [PacienteController::class, 'confirmDelete'])
    ->name('admin.pacientes.confirmDelete')
    ->middleware('auth');

Route::delete('/admin/pacientes/{id}', [PacienteController::class, 'destroy'])
    ->name('admin.pacientes.destroy')
    ->middleware('auth');


// RUTAS PARA EL ADMIN - CONSULTORIOS

Route::get('/admin/consultorios', [ConsultorioController::class, 'index'])
->name('admin.consultorios.index')
->middleware('auth');

Route::get('/admin/consultorios/create', [ConsultorioController::class, 'create'])
->name('admin.consultorios.create')
->middleware('auth');

Route::post('/admin/consultorios', [ConsultorioController::class, 'store'])
->name('admin.consultorios.store')
->middleware('auth');

Route::get('/admin/consultorios/{id}', [ConsultorioController::class, 'show'])
->name('admin.consultorios.show')
->middleware('auth');

Route::get('/admin/consultorios/{id}/edit', [ConsultorioController::class, 'edit'])
->name('admin.consultorios.edit')
->middleware('auth');

Route::put('/admin/consultorios/{id}', [ConsultorioController::class, 'update'])
->name('admin.consultorios.update')
->middleware('auth');

Route::get('/admin/consultorios/{id}/confirm-delete', [ConsultorioController::class, 'confirmDelete'])
    ->name('admin.consultorios.confirmDelete')
    ->middleware('auth');

Route::delete('/admin/consultorios/{id}', [ConsultorioController::class, 'destroy'])
    ->name('admin.consultorios.destroy')
    ->middleware('auth');


// RUTAS PARA EL ADMIN - DOCTORES //

Route::get('/admin/doctores', [DoctorController::class, 'index'])
->name('admin.doctores.index')
->middleware('auth');

Route::get('/admin/doctores/create', [DoctorController::class, 'create'])
->name('admin.doctores.create')
->middleware('auth');

Route::post('/admin/doctores', [DoctorController::class, 'store'])
->name('admin.doctores.store')
->middleware('auth');

Route::get('/admin/doctores/{id}', [DoctorController::class, 'show'])
->name('admin.doctores.show')
->middleware('auth');

Route::get('/admin/doctores/{id}/edit', [DoctorController::class, 'edit'])
->name('admin.doctores.edit')
->middleware('auth');

Route::put('/admin/doctores/{id}', [DoctorController::class, 'update'])
->name('admin.doctores.update')
->middleware('auth');

Route::get('/admin/doctores/{id}/confirm-delete', [DoctorController::class, 'confirmDelete'])
    ->name('admin.doctores.confirmDelete')
    ->middleware('auth');

Route::delete('/admin/doctores/{id}', [DoctorController::class, 'destroy'])
    ->name('admin.doctores.destroy')
    ->middleware('auth');    
