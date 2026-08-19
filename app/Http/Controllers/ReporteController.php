<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Reserva;
use App\Models\Pago;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Filtros
        |--------------------------------------------------------------------------
        */

        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $doctor_id = $request->doctor_id;
        $estado = $request->estado;

        /*
        |--------------------------------------------------------------------------
        | Consulta de reservas
        |--------------------------------------------------------------------------
        */

        $queryReservas = Reserva::with([
            'paciente',
            'doctor',
            'consultorio'
        ]);

        if ($fecha_inicio) {
            $queryReservas->whereDate('fecha', '>=', $fecha_inicio);
        }

        if ($fecha_fin) {
            $queryReservas->whereDate('fecha', '<=', $fecha_fin);
        }

        if ($doctor_id) {
            $queryReservas->where('doctor_id', $doctor_id);
        }

        if ($estado) {
            $queryReservas->where('estado', $estado);
        }

        $reservas = $queryReservas
            ->orderBy('fecha', 'desc')
            ->orderBy('hora', 'desc')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Totales de reservas
        |--------------------------------------------------------------------------
        */

        $total_reservas = $reservas->count();

        $total_pendientes = $reservas
            ->where('estado', 'Pendiente')
            ->count();

        $total_confirmadas = $reservas
            ->where('estado', 'Confirmada')
            ->count();

        $total_atendidas = $reservas
            ->where('estado', 'Atendida')
            ->count();

        $total_canceladas = $reservas
            ->where('estado', 'Cancelada')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Consulta de pagos
        |--------------------------------------------------------------------------
        */

$queryPagos = Pago::with([
    'reserva.paciente',
    'reserva.doctor',
    'reserva.consultorio'
]);

/*
|--------------------------------------------------------------------------
| Filtros por fecha del pago
|--------------------------------------------------------------------------
*/

if ($fecha_inicio) {
    $queryPagos->whereDate('fecha_pago', '>=', $fecha_inicio);
}

if ($fecha_fin) {
    $queryPagos->whereDate('fecha_pago', '<=', $fecha_fin);
}

/*
|--------------------------------------------------------------------------
| Filtros relacionados con la reserva
|--------------------------------------------------------------------------
*/

if ($doctor_id) {
    $queryPagos->whereHas('reserva', function ($query) use ($doctor_id) {
        $query->where('doctor_id', $doctor_id);
    });
}

if ($estado) {
    $queryPagos->whereHas('reserva', function ($query) use ($estado) {
        $query->where('estado', $estado);
    });
}

$pagos = $queryPagos
    ->orderBy('fecha_pago', 'desc')
    ->get();

        /*
        |--------------------------------------------------------------------------
        | Totales de pagos
        |--------------------------------------------------------------------------
        */

        $total_pagos = $pagos->count();

        $total_recaudado = $pagos
            ->where('estado', 'Pagado')
            ->sum('valor');

        $total_pendiente = $pagos
            ->where('estado', 'Pendiente')
            ->sum('valor');

        /*
        |--------------------------------------------------------------------------
        | Pacientes
        |--------------------------------------------------------------------------
        */

        $total_pacientes = $reservas
            ->pluck('paciente_id')
            ->unique()
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Doctores
        |--------------------------------------------------------------------------
        */

        $doctores = Doctor::orderBy('nombres')
            ->orderBy('apellidos')
            ->get();

        return view('admin.reportes.index', compact(
            'reservas',
            'pagos',
            'doctores',
            'fecha_inicio',
            'fecha_fin',
            'doctor_id',
            'estado',
            'total_reservas',
            'total_pendientes',
            'total_confirmadas',
            'total_atendidas',
            'total_canceladas',
            'total_pagos',
            'total_recaudado',
            'total_pendiente',
            'total_pacientes'
        ));
    }
}