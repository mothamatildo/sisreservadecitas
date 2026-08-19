@extends('layouts.admin')

@section('content')

<style>
    /* ================================
       ESTILOS DEL PANEL DE REPORTES
       ================================ */

    .reportes-table {
        width: 100% !important;
    }

    .reportes-table th {
        background-color: #0d6efd !important;
        color: white !important;
        text-align: center;
        vertical-align: middle !important;
        white-space: nowrap;
    }

    .reportes-table td {
        vertical-align: middle !important;
    }

    .reportes-table td:first-child {
        text-align: center;
        width: 60px;
    }

    .estado-badge {
        min-width: 85px;
        display: inline-block;
        text-align: center;
    }

    /* Separación y apariencia de DataTables */
    .dataTables_wrapper {
        width: 100%;
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 15px;
    }

    .dataTables_wrapper .dataTables_filter input {
        margin-left: 8px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 5px 10px;
    }

    .dataTables_wrapper .dataTables_length select {
        margin: 0 5px;
        padding: 4px 25px 4px 8px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .dataTables_wrapper .dataTables_info {
        padding-top: 10px;
    }

    .dataTables_wrapper .dataTables_paginate {
        padding-top: 5px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        margin-left: 3px;
    }

    /* Evita que las tablas se deformen */
    .table-responsive {
        overflow-x: auto;
    }

    /* Tarjetas de resumen */
    .small-box {
        border-radius: 8px;
    }

    .card {
        border-radius: 8px;
    }

    /* En pantallas pequeñas */
    @media (max-width: 768px) {

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            text-align: left !important;
            margin-bottom: 10px;
        }

        .dataTables_wrapper .dataTables_filter input {
            width: 100%;
            margin-left: 0;
            margin-top: 5px;
        }
    }
</style>


<div class="row">
    <div class="col-md-12">
        <h1>
            <i class="fas fa-chart-bar"></i>
            Reportes del sistema
        </h1>
    </div>
</div>

<hr>


{{-- =========================================================
     FILTROS
     ========================================================= --}}
<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-filter"></i>
                    Filtros de búsqueda
                </h3>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.reportes.index') }}" method="GET">

                    <div class="row">

                        {{-- FECHA INICIAL --}}
                        <div class="col-md-3">
                            <div class="form-group">

                                <label for="fecha_inicio">
                                    Fecha inicial
                                </label>

                                <input type="date"
                                       name="fecha_inicio"
                                       id="fecha_inicio"
                                       class="form-control"
                                       value="{{ $fecha_inicio }}">

                            </div>
                        </div>


                        {{-- FECHA FINAL --}}
                        <div class="col-md-3">
                            <div class="form-group">

                                <label for="fecha_fin">
                                    Fecha final
                                </label>

                                <input type="date"
                                       name="fecha_fin"
                                       id="fecha_fin"
                                       class="form-control"
                                       value="{{ $fecha_fin }}">

                            </div>
                        </div>


                        {{-- DOCTOR --}}
                        <div class="col-md-3">
                            <div class="form-group">

                                <label for="doctor_id">
                                    Doctor
                                </label>

                                <select name="doctor_id"
                                        id="doctor_id"
                                        class="form-control">

                                    <option value="">
                                        Todos los doctores
                                    </option>

                                    @foreach($doctores as $doctor)

                                        <option value="{{ $doctor->id }}"
                                            {{ $doctor_id == $doctor->id ? 'selected' : '' }}>

                                            {{ $doctor->nombres }}
                                            {{ $doctor->apellidos }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>
                        </div>


                        {{-- ESTADO --}}
                        <div class="col-md-3">
                            <div class="form-group">

                                <label for="estado">
                                    Estado de reserva
                                </label>

                                <select name="estado"
                                        id="estado"
                                        class="form-control">

                                    <option value="">
                                        Todos
                                    </option>

                                    <option value="Pendiente"
                                        {{ $estado == 'Pendiente' ? 'selected' : '' }}>
                                        Pendiente
                                    </option>

                                    <option value="Confirmada"
                                        {{ $estado == 'Confirmada' ? 'selected' : '' }}>
                                        Confirmada
                                    </option>

                                    <option value="Atendida"
                                        {{ $estado == 'Atendida' ? 'selected' : '' }}>
                                        Atendida
                                    </option>

                                    <option value="Cancelada"
                                        {{ $estado == 'Cancelada' ? 'selected' : '' }}>
                                        Cancelada
                                    </option>

                                </select>

                            </div>
                        </div>

                    </div>


                    {{-- BOTONES --}}
                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-search"></i>
                        Filtrar

                    </button>


                    <a href="{{ route('admin.reportes.index') }}"
                       class="btn btn-secondary">

                        <i class="fas fa-sync-alt"></i>
                        Limpiar

                    </a>

                </form>

            </div>

        </div>

    </div>
</div>


{{-- =========================================================
     RESUMEN DE RESERVAS
     ========================================================= --}}
<div class="row">

    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">

            <div class="inner">
                <h3>{{ $total_reservas }}</h3>
                <p>Total reservas</p>
            </div>

            <div class="icon">
                <i class="fas fa-calendar-check"></i>
            </div>

        </div>

    </div>


    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">

            <div class="inner">
                <h3>{{ $total_pendientes }}</h3>
                <p>Pendientes</p>
            </div>

            <div class="icon">
                <i class="fas fa-hourglass-half"></i>
            </div>

        </div>

    </div>


    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">

            <div class="inner">
                <h3>{{ $total_confirmadas }}</h3>
                <p>Confirmadas</p>
            </div>

            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>

        </div>

    </div>


    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">

            <div class="inner">
                <h3>{{ $total_canceladas }}</h3>
                <p>Canceladas</p>
            </div>

            <div class="icon">
                <i class="fas fa-times-circle"></i>
            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     RESUMEN DE PAGOS
     ========================================================= --}}
<div class="row">

    <div class="col-lg-3 col-6">

        <div class="small-box bg-primary">

            <div class="inner">
                <h3>{{ $total_pagos }}</h3>
                <p>Total pagos</p>
            </div>

            <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>

        </div>

    </div>


    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>
                    ${{ number_format($total_recaudado, 0, ',', '.') }}
                </h3>

                <p>Total recaudado</p>

            </div>

            <div class="icon">
                <i class="fas fa-chart-line"></i>
            </div>

        </div>

    </div>


    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>
                    ${{ number_format($total_pendiente, 0, ',', '.') }}
                </h3>

                <p>Pago pendiente</p>

            </div>

            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>

        </div>

    </div>


    <div class="col-lg-3 col-6">

        <div class="small-box bg-secondary">

            <div class="inner">

                <h3>{{ $total_pacientes }}</h3>

                <p>Pacientes involucrados</p>

            </div>

            <div class="icon">
                <i class="fas fa-users"></i>
            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     TABLA DE RESERVAS
     ========================================================= --}}
<div class="row">

    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">

                <h3 class="card-title">
                    <i class="fas fa-calendar-alt"></i>
                    Detalle de reservas
                </h3>

            </div>


            <div class="card-body">

                <div class="table-responsive">

                    <table id="tablaReservas"
                           class="table table-striped table-bordered table-hover table-sm reportes-table">

                        <thead>

                            <tr>
                                <th style="width: 60px;">Nro</th>
                                <th>Paciente</th>
                                <th>Doctor</th>
                                <th>Consultorio</th>
                                <th style="width: 120px;">Fecha</th>
                                <th style="width: 100px;">Hora</th>
                                <th style="width: 120px;">Estado</th>
                            </tr>

                        </thead>


                        <tbody>

                            @php
                                $contador = 1;
                            @endphp


                            @foreach($reservas as $reserva)

                                <tr>

                                    <td class="text-center">
                                        {{ $contador++ }}
                                    </td>


                                    <td>
                                        {{ $reserva->paciente->nombres }}
                                        {{ $reserva->paciente->apellidos }}
                                    </td>


                                    <td>
                                        {{ $reserva->doctor->nombres }}
                                        {{ $reserva->doctor->apellidos }}
                                    </td>


                                    <td>
                                        {{ $reserva->consultorio->nombre }}
                                    </td>


                                    <td class="text-center">
                                        {{ $reserva->fecha }}
                                    </td>


                                    <td class="text-center">
                                        {{ $reserva->hora }}
                                    </td>


                                    <td class="text-center">

                                        @if($reserva->estado == 'Pendiente')

                                            <span class="badge badge-warning estado-badge">
                                                {{ $reserva->estado }}
                                            </span>

                                        @elseif($reserva->estado == 'Confirmada')

                                            <span class="badge badge-success estado-badge">
                                                {{ $reserva->estado }}
                                            </span>

                                        @elseif($reserva->estado == 'Atendida')

                                            <span class="badge badge-primary estado-badge">
                                                {{ $reserva->estado }}
                                            </span>

                                        @else

                                            <span class="badge badge-danger estado-badge">
                                                {{ $reserva->estado }}
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     TABLA DE PAGOS
     ========================================================= --}}
<div class="row">

    <div class="col-md-12">

        <div class="card card-outline card-success">

            <div class="card-header">

                <h3 class="card-title">
                    <i class="fas fa-money-bill-wave"></i>
                    Detalle de pagos
                </h3>

            </div>


            <div class="card-body">

                <div class="table-responsive">

                    <table id="tablaPagos"
                           class="table table-striped table-bordered table-hover table-sm reportes-table">

                        <thead>

                            <tr>
                                <th style="width: 60px;">Nro</th>
                                <th>Paciente</th>
                                <th style="width: 140px;">Valor</th>
                                <th style="width: 140px;">Método</th>
                                <th style="width: 130px;">Fecha</th>
                                <th style="width: 120px;">Estado</th>
                            </tr>

                        </thead>


                        <tbody>

                            @php
                                $contadorPago = 1;
                            @endphp


                            @foreach($pagos as $pago)

                                <tr>

                                    <td class="text-center">
                                        {{ $contadorPago++ }}
                                    </td>


                                    <td>
                                        {{ $pago->reserva->paciente->nombres }}
                                        {{ $pago->reserva->paciente->apellidos }}
                                    </td>


                                    <td class="text-right">

                                        ${{ number_format($pago->valor, 0, ',', '.') }}

                                    </td>


                                    <td class="text-center">
                                        {{ $pago->metodo_pago }}
                                    </td>


                                    <td class="text-center">
                                        {{ $pago->fecha_pago }}
                                    </td>


                                    <td class="text-center">

                                        @if($pago->estado == 'Pagado')

                                            <span class="badge badge-success estado-badge">
                                                {{ $pago->estado }}
                                            </span>

                                        @elseif($pago->estado == 'Pendiente')

                                            <span class="badge badge-warning estado-badge">
                                                {{ $pago->estado }}
                                            </span>

                                        @else

                                            <span class="badge badge-danger estado-badge">
                                                {{ $pago->estado }}
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     DATATABLES
     ========================================================= --}}
<script>

$(document).ready(function () {

    $('#tablaReservas').DataTable({

        pageLength: 10,

        lengthMenu: [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],

        autoWidth: false,

        responsive: false,

        dom: 'Bfrtip',

    buttons: [

        {
            extend: 'copy',
            text: '<i class="fas fa-copy"></i> Copiar',
            className: 'btn btn-secondary btn-sm'
        },

        {
            extend: 'excel',
            text: '<i class="fas fa-file-excel"></i> Excel',
            className: 'btn btn-success btn-sm',
            title: 'Reporte de Reservas'
        },

        {
            extend: 'pdf',
            text: '<i class="fas fa-file-pdf"></i> PDF',
            className: 'btn btn-danger btn-sm',
            title: 'Reporte de Reservas',
            orientation: 'landscape',
            pageSize: 'A4'
        },

        {
            extend: 'print',
            text: '<i class="fas fa-print"></i> Imprimir',
            className: 'btn btn-primary btn-sm',
            title: 'Reporte de Reservas'
        }

    ],

    language: {

        emptyTable: "No hay reservas",

        info: "Mostrando _START_ a _END_ de _TOTAL_ reservas",

        infoEmpty: "Mostrando 0 a 0 de 0 reservas",

        infoFiltered: "(Filtrado de _MAX_ total reservas)",

        lengthMenu: "Mostrar _MENU_ reservas",

        search: "Buscar:",

        zeroRecords: "No se encontraron reservas",

        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
        }

    }

});

$('#tablaPagos').DataTable({

    pageLength: 10,

    lengthMenu: [
        [10, 25, 50, 100],
        [10, 25, 50, 100]
    ],

    autoWidth: false,

    responsive: false,

    dom: 'Bfrtip',

    buttons: [

        {
            extend: 'copy',
            text: '<i class="fas fa-copy"></i> Copiar',
            className: 'btn btn-secondary btn-sm'
        },

        {
            extend: 'excel',
            text: '<i class="fas fa-file-excel"></i> Excel',
            className: 'btn btn-success btn-sm',
            title: 'Reporte de Pagos'
        },

        {
            extend: 'pdf',
            text: '<i class="fas fa-file-pdf"></i> PDF',
            className: 'btn btn-danger btn-sm',
            title: 'Reporte de Pagos',
            orientation: 'landscape',
            pageSize: 'A4'
        },

        {
            extend: 'print',
            text: '<i class="fas fa-print"></i> Imprimir',
            className: 'btn btn-primary btn-sm',
            title: 'Reporte de Pagos'
        }

    ],

    language: {

        emptyTable: "No hay pagos",

        info: "Mostrando _START_ a _END_ de _TOTAL_ pagos",

        infoEmpty: "Mostrando 0 a 0 de 0 pagos",

        infoFiltered: "(Filtrado de _MAX_ total pagos)",

        lengthMenu: "Mostrar _MENU_ pagos",

        search: "Buscar:",

        zeroRecords: "No se encontraron pagos",

        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
        }

    }

});

});

</script>

@endsection