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

        return view('admin.horarios.create', compact('doctores', 'consultorios'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Horario $horario)
    {
        //
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