<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Consultorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Listar doctores
     */
    public function index()
    {
        $doctores = Doctor::with('user', 'consultorio')->get();

        return view('admin.doctores.index', compact('doctores'));
    }

    /**
     * Mostrar formulario
     */
    public function create()
    {
      
        $consultorios = Consultorio::all();

        return view('admin.doctores.create', compact('consultorios'));
    }

    /**
     * Guardar doctor
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres'=> 'required',
            'apellidos'=> 'required',
            'telefono'=> 'required',
            'licencia_medica'=> 'required',
            'especialidad'=> 'required',
            'consultorio_id'=> 'required', // 🔥 IMPORTANTE
            'email'=>'required|max:250|unique:users',
            'password'=>'required|max:250|confirmed',
        ]);

        // Crear usuario
        $usuario = new User();
        $usuario->name = $request->nombres . ' ' . $request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        // Crear doctor
        $doctor = new Doctor();
        $doctor->user_id = $usuario->id;
        $doctor->consultorio_id = $request->consultorio_id; 
        $doctor->nombres = $request->nombres;
        $doctor->apellidos = $request->apellidos;
        $doctor->telefono = $request->telefono;
        $doctor->licencia_medica = $request->licencia_medica;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();

        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'Se registró el doctor correctamente')
            ->with('icono', 'success');
    }

public function show($id)
{
    $doctor = Doctor::findOrFail($id);
    $consultorios = Consultorio::all();

    return view('admin.doctores.show', compact('doctor', 'consultorios'));
}

public function edit($id)
{
    $doctor = Doctor::findOrFail($id);
    $consultorios = Consultorio::all();

    return view('admin.doctores.edit', compact('doctor', 'consultorios'));
}

public function update(Request $request, $id)
{
    $doctor = Doctor::findOrFail($id);

    $request->validate([
        'nombres' => 'required',
        'apellidos' => 'required',
        'telefono' => 'required',
        'licencia_medica' => 'required',
        'especialidad' => 'required',
        'consultorio_id' => 'required',
        'email' => 'required|max:250|unique:users,email,' . $doctor->user->id,
        'password' => 'nullable|max:250|confirmed',
    ]);

    // ACTUALIZAR USUARIO
    $usuario = User::find($doctor->user_id);

    $usuario->name = $request->nombres . ' ' . $request->apellidos;
    $usuario->email = $request->email;

    // SOLO ACTUALIZA PASSWORD SI SE ESCRIBE UNA NUEVA
    if($request->password != ""){
        $usuario->password = Hash::make($request->password);
    }

    $usuario->save();

    // ACTUALIZAR DOCTOR
    $doctor->consultorio_id = $request->consultorio_id;
    $doctor->nombres = $request->nombres;
    $doctor->apellidos = $request->apellidos;
    $doctor->telefono = $request->telefono;
    $doctor->licencia_medica = $request->licencia_medica;
    $doctor->especialidad = $request->especialidad;

    $doctor->save();

    return redirect()->route('admin.doctores.index')
        ->with('mensaje', 'Se actualizó el doctor correctamente')
        ->with('icono', 'success');
}
}