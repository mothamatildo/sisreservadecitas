<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Paciente;
use App\Models\Doctor;
use App\Models\Consultorio;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Mostrar listado de reservas.
     */
    public function index()
    {
        $reservas = Reserva::with([
            'paciente',
            'doctor',
            'consultorio'
        ])->orderBy('fecha')->orderBy('hora')->get();

        return view('admin.reservas.index', compact('reservas'));
    }

    /**
     * Mostrar formulario para crear una reserva.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('nombres')->get();
        $doctores = Doctor::orderBy('nombres')->get();
        $consultorios = Consultorio::orderBy('nombre')->get();

        return view('admin.reservas.create', compact(
            'pacientes',
            'doctores',
            'consultorios'
        ));
    }

    /**
     * Guardar una nueva reserva.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'doctor_id' => 'required|exists:doctors,id',
            'consultorio_id' => 'required|exists:consultorios,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'estado' => 'required|string|max:50',
            'observaciones' => 'nullable|string',
        ]);
        
$existe = Reserva::where('doctor_id', $request->doctor_id)
    ->where('fecha', $request->fecha)
    ->where('hora', $request->hora)
    ->exists();

if ($existe) {
    return back()
        ->withInput()
        ->withErrors([
            'hora' => 'El doctor ya tiene una reserva registrada para esa fecha y hora.'
        ]);
}
        Reserva::create($request->all());

        return redirect()
            ->route('admin.reservas.index')
            ->with('success', 'Reserva creada correctamente.');
    }

    /**
     * Mostrar una reserva.
     */
    public function show(string $id)
    {
        $reserva = Reserva::with([
            'paciente',
            'doctor',
            'consultorio'
        ])->findOrFail($id);

        return view('admin.reservas.show', compact('reserva'));
    }

    /**
     * Mostrar formulario para editar.
     */
    public function edit(string $id)
    {
        $reserva = Reserva::findOrFail($id);

        $pacientes = Paciente::orderBy('nombres')->get();
        $doctores = Doctor::orderBy('nombres')->get();
        $consultorios = Consultorio::orderBy('nombre')->get();

        return view('admin.reservas.edit', compact(
            'reserva',
            'pacientes',
            'doctores',
            'consultorios'
        ));
    }

    /**
     * Actualizar una reserva.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'doctor_id' => 'required|exists:doctors,id',
            'consultorio_id' => 'required|exists:consultorios,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'estado' => 'required|string|max:50',
            'observaciones' => 'nullable|string',
        ]);

        $reserva = Reserva::findOrFail($id);

        $reserva->update($request->all());

        return redirect()
            ->route('admin.reservas.index')
            ->with('success', 'Reserva actualizada correctamente.');
    }

    /**
     * Eliminar una reserva.
     */
    public function destroy(string $id)
    {
        $reserva = Reserva::findOrFail($id);

        $reserva->delete();

        return redirect()
            ->route('admin.reservas.index')
            ->with('success', 'Reserva eliminada correctamente.');
    }
}