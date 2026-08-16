<?php

use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HistorialClinicoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ConfiguracionController;

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




// RUTAS PARA EL ADMIN - HORARIOS //

Route::get('/admin/horarios', [HorarioController::class, 'index'])
->name('admin.horarios.index')
->middleware('auth');

Route::get('/admin/horarios/create', [HorarioController::class, 'create'])
->name('admin.horarios.create')
->middleware('auth');

Route::post('/admin/horarios', [HorarioController::class, 'store'])
->name('admin.horarios.store')
->middleware('auth');

Route::get('/admin/horarios/{id}', [HorarioController::class, 'show'])
->name('admin.horarios.show')
->middleware('auth');

Route::get('/admin/horarios/{id}/edit', [HorarioController::class, 'edit'])
->name('admin.horarios.edit')
->middleware('auth');

Route::put('/admin/horarios/{id}', [HorarioController::class, 'update'])
->name('admin.horarios.update')
->middleware('auth');

Route::get('/admin/horarios/{id}/confirm-delete', [HorarioController::class, 'confirmDelete'])
    ->name('admin.horarios.confirmDelete')
    ->middleware('auth');

Route::delete('/admin/horarios/{id}', [HorarioController::class, 'destroy'])
    ->name('admin.horarios.destroy')
    ->middleware('auth');    

///ajax
Route::get('/admin/horarios/consultorios/{id}', [HorarioController::class, 'cargar_datos_consultorios'])
->name('admin.horarios.cargar_datos_consultorios')
->middleware('auth');



// RUTAS PARA EL ADMIN - RESERVAS //

Route::get('/admin/reservas', [ReservaController::class, 'index'])
    ->name('admin.reservas.index')
    ->middleware('auth');

Route::get('/admin/reservas/create', [ReservaController::class, 'create'])
    ->name('admin.reservas.create')
    ->middleware('auth');

Route::post('/admin/reservas', [ReservaController::class, 'store'])
    ->name('admin.reservas.store')
    ->middleware('auth');

Route::get('/admin/reservas/{id}', [ReservaController::class, 'show'])
    ->name('admin.reservas.show')
    ->middleware('auth');

Route::get('/admin/reservas/{id}/edit', [ReservaController::class, 'edit'])
    ->name('admin.reservas.edit')
    ->middleware('auth');

Route::put('/admin/reservas/{id}', [ReservaController::class, 'update'])
    ->name('admin.reservas.update')
    ->middleware('auth');

Route::delete('/admin/reservas/{id}', [ReservaController::class, 'destroy'])
    ->name('admin.reservas.destroy')
    ->middleware('auth');


// RUTAS PARA EL ADMIN - HISTORIAL CLÍNICO

Route::get('/admin/historiales', [HistorialClinicoController::class, 'index'])
    ->name('admin.historiales.index')
    ->middleware('auth');

Route::get('/admin/historiales/create', [HistorialClinicoController::class, 'create'])
    ->name('admin.historiales.create')
    ->middleware('auth');

Route::post('/admin/historiales', [HistorialClinicoController::class, 'store'])
    ->name('admin.historiales.store')
    ->middleware('auth');

Route::get('/admin/historiales/{id}', [HistorialClinicoController::class, 'show'])
    ->name('admin.historiales.show')
    ->middleware('auth');

Route::get('/admin/historiales/{id}/edit', [HistorialClinicoController::class, 'edit'])
    ->name('admin.historiales.edit')
    ->middleware('auth');

Route::put('/admin/historiales/{id}', [HistorialClinicoController::class, 'update'])
    ->name('admin.historiales.update')
    ->middleware('auth');

Route::delete('/admin/historiales/{id}', [HistorialClinicoController::class, 'destroy'])
    ->name('admin.historiales.destroy')
    ->middleware('auth');    

// RUTAS PARA EL ADMIN - PAGOS

Route::get('/admin/pagos', [PagoController::class, 'index'])
    ->name('admin.pagos.index')
    ->middleware('auth');

Route::get('/admin/pagos/create', [PagoController::class, 'create'])
    ->name('admin.pagos.create')
    ->middleware('auth');

Route::post('/admin/pagos', [PagoController::class, 'store'])
    ->name('admin.pagos.store')
    ->middleware('auth');

Route::get('/admin/pagos/{id}', [PagoController::class, 'show'])
    ->name('admin.pagos.show')
    ->middleware('auth');

Route::get('/admin/pagos/{id}/edit', [PagoController::class, 'edit'])
    ->name('admin.pagos.edit')
    ->middleware('auth');

Route::put('/admin/pagos/{id}', [PagoController::class, 'update'])
    ->name('admin.pagos.update')
    ->middleware('auth');

Route::delete('/admin/pagos/{id}', [PagoController::class, 'destroy'])
    ->name('admin.pagos.destroy')
    ->middleware('auth');


    Route::resource('admin/configuracion', ConfiguracionController::class)
    ->names('admin.configuracion');