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
          $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor', 'consultorio')->get();
        return view('admin.horarios.index', compact('horarios', 'consultorios'));
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

public function cargar_datos_consultorios($id){
    try{
        $horarios = Horario::with('doctor','consultorio')->where ('consultorio_id',$id)->get();
       // print_r($horarios);
       return view('admin.horarios.cargar_datos_consultorios',compact('horarios'));
    }catch (\Exception $exception){
        return response()->json(['mensaje' => 'Error']);
    }

}

    public function store(Request $request)
{
    // Validación de los datos recibidos
    $request->validate([
        'doctor_id' => 'required|exists:doctors,id',
        'consultorio_id' => 'required|exists:consultorios,id',
        'dia' => 'required',
        'hora_inicio' => 'required|date_format:H:i',
        'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
    ]);

    // Verificar si existe un horario que se cruce
    // con el doctor o con el consultorio seleccionado
    $horarioExistente = Horario::where('dia', $request->dia)
        ->where(function ($query) use ($request) {

            $query->where('doctor_id', $request->doctor_id)
                  ->orWhere('consultorio_id', $request->consultorio_id);

        })
        ->where('hora_inicio', '<', $request->hora_fin)
        ->where('hora_fin', '>', $request->hora_inicio)
        ->exists();

    // Si existe un conflicto, regresar al formulario
    if ($horarioExistente) {
        return redirect()->back()
            ->withInput()
            ->with(
                'mensaje',
                'No se puede registrar el horario porque existe un conflicto con el doctor o el consultorio seleccionado.'
            )
            ->with('icono', 'error');
    }

    // Crear el nuevo horario
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