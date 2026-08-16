<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Mostrar listado de roles.
     */
    public function index()
    {
        $roles = Rol::latest()->get();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Mostrar formulario para crear un rol.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Guardar un nuevo rol.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string|max:50',
        ]);

        Rol::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
        ]);

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Rol registrado correctamente.');
    }

    /**
     * Mostrar un rol.
     */
    public function show(string $id)
    {
        $rol = Rol::findOrFail($id);

        return view('admin.roles.show', compact('rol'));
    }

    /**
     * Mostrar formulario para editar un rol.
     */
    public function edit(string $id)
    {
        $rol = Rol::findOrFail($id);

        return view('admin.roles.edit', compact('rol'));
    }

    /**
     * Actualizar un rol.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string|max:50',
        ]);

        $rol = Rol::findOrFail($id);

        $rol->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
        ]);

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Rol actualizado correctamente.');
    }

    /**
     * Eliminar un rol.
     */
    public function destroy(string $id)
    {
        $rol = Rol::findOrFail($id);

        $rol->delete();

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Rol eliminado correctamente.');
    }
}