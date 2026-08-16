<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Reserva;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Mostrar listado de pagos.
     */
    public function index()
    {
        $pagos = Pago::with([
            'reserva.paciente',
            'reserva.doctor',
            'reserva.consultorio'
        ])->latest()->get();

        return view('admin.pagos.index', compact('pagos'));
    }

    /**
     * Mostrar formulario para crear un pago.
     */
    public function create()
    {
        $reservas = Reserva::with([
            'paciente',
            'doctor',
            'consultorio'
        ])->latest()->get();

        return view('admin.pagos.create', compact('reservas'));
    }

    /**
     * Guardar un nuevo pago.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'valor' => 'required|numeric|min:0',
            'metodo_pago' => 'required|string|max:100',
            'fecha_pago' => 'required|date',
            'estado' => 'required|string|max:50',
            'observaciones' => 'nullable|string',
        ]);

        Pago::create($request->all());

        return redirect()
            ->route('admin.pagos.index')
            ->with('success', 'Pago registrado correctamente.');
    }

    /**
     * Mostrar un pago.
     */
   public function show(string $id)
{
    $pago = Pago::with([
        'reserva.paciente',
        'reserva.doctor',
        'reserva.consultorio'
    ])->findOrFail($id);

    return view('admin.pagos.show', compact('pago'));
}

    /**
     * Mostrar formulario para editar.
     */
public function edit(string $id)
{
    $pago = Pago::findOrFail($id);

    $reservas = Reserva::with([
        'paciente',
        'doctor',
        'consultorio'
    ])->get();

    return view('admin.pagos.edit', compact('pago', 'reservas'));
}

    /**
     * Actualizar un pago.
     */
public function update(Request $request, string $id)
{
    $request->validate([
        'reserva_id' => 'required|exists:reservas,id',
        'valor' => 'required|numeric|min:0',
        'metodo_pago' => 'required|string|max:50',
        'fecha_pago' => 'required|date',
        'estado' => 'required|string|max:50',
        'observaciones' => 'nullable|string',
    ]);

    $pago = Pago::findOrFail($id);

    $pago->update([
        'reserva_id' => $request->reserva_id,
        'valor' => $request->valor,
        'metodo_pago' => $request->metodo_pago,
        'fecha_pago' => $request->fecha_pago,
        'estado' => $request->estado,
        'observaciones' => $request->observaciones,
    ]);

    return redirect()
        ->route('admin.pagos.index')
        ->with('success', 'Pago actualizado correctamente.');
}

    /**
     * Eliminar un pago.
     */
public function destroy(string $id)
{
    $pago = Pago::findOrFail($id);

    $pago->delete();

    return redirect()
        ->route('admin.pagos.index')
        ->with('success', 'Pago eliminado correctamente.');
}
}