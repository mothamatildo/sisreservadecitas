<?php

namespace App\Http\Controllers;

use App\Models\HistorialClinico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class HistorialClinicoController extends Controller
{
    /**
     * Mostrar listado de historiales.
     */
    public function index()
    {
        $historiales = HistorialClinico::with('paciente')
            ->orderBy('fecha', 'desc')
            ->get();

        return view('admin.historiales.index', compact('historiales'));
    }

    /**
     * Mostrar formulario para crear.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('nombres')->get();

        return view('admin.historiales.create', compact('pacientes'));
    }

    /**
     * Guardar nuevo historial.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha' => 'required|date',
            'motivo_consulta' => 'required|string',
            'diagnostico' => 'nullable|string',
            'tratamiento' => 'nullable|string',
            'observaciones' => 'nullable|string',
        ]);

        HistorialClinico::create($request->all());

        return redirect()
            ->route('admin.historiales.index')
            ->with('success', 'Historial clínico creado correctamente.');
    }

    /**
     * Mostrar un historial.
     */
    public function show(string $id)
    {
        $historial = HistorialClinico::with('paciente')
            ->findOrFail($id);

        return view('admin.historiales.show', compact('historial'));
    }

    /**
     * Mostrar formulario para editar.
     */
    public function edit(string $id)
    {
        $historial = HistorialClinico::findOrFail($id);

        $pacientes = Paciente::orderBy('nombres')->get();

        return view(
            'admin.historiales.edit',
            compact('historial', 'pacientes')
        );
    }

    /**
     * Actualizar historial.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha' => 'required|date',
            'motivo_consulta' => 'required|string',
            'diagnostico' => 'nullable|string',
            'tratamiento' => 'nullable|string',
            'observaciones' => 'nullable|string',
        ]);

        $historial = HistorialClinico::findOrFail($id);

        $historial->update($request->all());

        return redirect()
            ->route('admin.historiales.index')
            ->with('success', 'Historial clínico actualizado correctamente.');
    }

    /**
     * Eliminar historial.
     */
    public function destroy(string $id)
    {
        $historial = HistorialClinico::findOrFail($id);

        $historial->delete();

        return redirect()
            ->route('admin.historiales.index')
            ->with('success', 'Historial clínico eliminado correctamente.');
    }
}