<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    /**
     * Mostrar la configuración.
     */
    public function index()
    {
        $configuracion = Configuracion::first();

        return view('admin.configuracion.index', compact('configuracion'));
    }

    /**
     * Mostrar formulario para crear configuración.
     */
    public function create()
    {
        $configuracion = Configuracion::first();

        return view('admin.configuracion.create', compact('configuracion'));
    }

    /**
     * Guardar configuración.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_clinica' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:50',
            'correo' => 'nullable|email|max:255',
            'horario_atencion' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Configuracion::create($request->all());

        return redirect()
            ->route('admin.configuracion.index')
            ->with('success', 'Configuración guardada correctamente.');
    }

    /**
     * Mostrar configuración.
     */
    public function show(string $id)
    {
        $configuracion = Configuracion::findOrFail($id);

        return view('admin.configuracion.show', compact('configuracion'));
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit(string $id)
    {
        $configuracion = Configuracion::findOrFail($id);

        return view('admin.configuracion.edit', compact('configuracion'));
    }

    /**
     * Actualizar configuración.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre_clinica' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:50',
            'correo' => 'nullable|email|max:255',
            'horario_atencion' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $configuracion = Configuracion::findOrFail($id);

        $configuracion->update([
            'nombre_clinica' => $request->nombre_clinica,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'horario_atencion' => $request->horario_atencion,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()
            ->route('admin.configuracion.index')
            ->with('success', 'Configuración actualizada correctamente.');
    }

    /**
     * Eliminar configuración.
     */
    public function destroy(string $id)
    {
        $configuracion = Configuracion::findOrFail($id);

        $configuracion->delete();

        return redirect()
            ->route('admin.configuracion.index')
            ->with('success', 'Configuración eliminada correctamente.');
    }
}