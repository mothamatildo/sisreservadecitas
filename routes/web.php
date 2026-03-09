<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretariaController;

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