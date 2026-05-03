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
        // 🔥 AQUÍ ESTÁ LA CLAVE
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

        // 🔥 Crear usuario
        $usuario = new User();
        $usuario->name = $request->nombres . ' ' . $request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        // 🔥 Crear doctor
        $doctor = new Doctor();
        $doctor->user_id = $usuario->id;
        $doctor->consultorio_id = $request->consultorio_id; // 🔥 CLAVE
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
}