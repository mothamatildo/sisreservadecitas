<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $pacientes = Paciente::all();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */public function store(Request $request)
{
    $request->validate([
        'nombres'=> 'required',
        'apellidos'=> 'required',
        'cc'=> 'required|unique:pacientes',
        'nro_seguro'=> 'required|unique:pacientes',
        'celular'=> 'required',
        'fecha_nacimiento'=> 'required',
        'genero'=> 'required',
        'direccion'=> 'required',
        'correo'=> 'required|max:250|unique:pacientes',
        'grupo_sanguineo'=> 'required',
        'alergias'=> 'required',
        'contacto_emergencia'=> 'required',
    ]);

    $paciente = new Paciente();
    $paciente->nombres = $request->nombres;
    $paciente->apellidos = $request->apellidos;
    $paciente->cc = $request->cc;
    $paciente->nro_seguro = $request->nro_seguro;
    $paciente->celular = $request->celular;
    $paciente->fecha_nacimiento = $request->fecha_nacimiento;
    $paciente->genero = $request->genero;
    $paciente->direccion = $request->direccion;
    $paciente->correo = $request->correo;
    $paciente->grupo_sanguineo = $request->grupo_sanguineo;
    $paciente->alergias = $request->alergias;
    $paciente->contacto_emergencia = $request->contacto_emergencia;
    $paciente->observaciones = $request->observaciones;

    $paciente->save();

    return redirect()->route('admin.pacientes.index')
        ->with('mensaje', 'Paciente registrado correctamente')
        ->with('icono', 'success');
}
    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
