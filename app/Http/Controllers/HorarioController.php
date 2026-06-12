<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Doctor;
use App\Models\Consultorio;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::with('doctor', 'consultorio')->get();
        return view('admin.horarios.index', compact('horarios'));
    }

public function create()
{
    $doctores = Doctor::all();
    $consultorios = Consultorio::all();
    $horarios = Horario::with('doctor','consultorio')->get();

    $horas = [];

for ($i = 8; $i < 20; $i++) {

    $inicio = str_pad($i, 2, '0', STR_PAD_LEFT).':00';
    $fin = str_pad($i + 1, 2, '0', STR_PAD_LEFT).':00';

    $horas[] = [
        'inicio' => $inicio,
        'fin' => $fin
    ];
}

    return view('admin.horarios.create', compact(
        'doctores',
        'consultorios',
        'horarios',
        'horas'
    ));
}

    public function store(Request $request)
{
    $request->validate([
        'doctor_id' => 'required',
        'consultorio_id' => 'required',
        'dia' => 'required',
        'hora_inicio' => 'required|date_format:H:i',
        'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
    ]);

    $horarioExistente = Horario::where('dia', $request->dia)
        ->where(function ($query) use ($request) {

            $query->where(function ($query) use ($request) {
                $query->where('hora_inicio', '>=', $request->hora_inicio)
                      ->where('hora_inicio', '<', $request->hora_fin);
            })

            ->orWhere(function ($query) use ($request) {
                $query->where('hora_fin', '>', $request->hora_inicio)
                      ->where('hora_fin', '<=', $request->hora_fin);
            })

            ->orWhere(function ($query) use ($request) {
                $query->where('hora_inicio', '<', $request->hora_inicio)
                      ->where('hora_fin', '>', $request->hora_fin);
            });
        })
        ->exists();

    if ($horarioExistente) {
        return redirect()->back()
            ->withInput()
            ->with('mensaje', 'Ya existe un horario que se superpone con el horario ingresado')
            ->with('icono', 'error');
    }

    Horario::create([
        'doctor_id' => $request->doctor_id,
        'consultorio_id' => $request->consultorio_id,
        'dia' => $request->dia,
        'hora_inicio' => $request->hora_inicio,
        'hora_fin' => $request->hora_fin,
    ]);

    return redirect()->route('admin.horarios.index')
        ->with('mensaje', 'Horario creado correctamente')
        ->with('icono', 'success');
}

public function show($id)
{
    $horario = Horario::find($id);

    return view('admin.horarios.show', compact('horario'));
}



    public function edit(Horario $horario)
    {
        //
    }

    public function update(Request $request, Horario $horario)
    {
        //
    }

    public function destroy(Horario $horario)
    {
        //
    }
}