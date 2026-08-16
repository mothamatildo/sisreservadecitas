<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Reserva;
use App\Models\HistorialClinico;
use App\Models\Pago;
use App\Models\Rol;


class AdminController extends Controller
{
    public function index()
    {
        $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_pacientes = Paciente::count();
        $total_consultorios = Consultorio::count();
        $total_doctores = Doctor::count();
        $total_horarios = Horario::count();
        $total_reservas = Reserva::count();
        $total_historiales = HistorialClinico::count();
        $total_pagos = Pago::count();
        $total_roles = Rol::count();

        return view('admin.index', compact(
            'total_usuarios',
            'total_secretarias',
            'total_pacientes',
            'total_consultorios',
            'total_doctores',
            'total_horarios',
            'total_reservas',
            'total_historiales',
            'total_pagos',
            'total_roles'
        ));
    }
}
