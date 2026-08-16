@extends('layouts.admin')

@section('content')

<div class="row">
    <h1>Detalle de configuración</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Información de la clínica</h3>

                <div class="card-tools">
                    <a href="{{ route('admin.configuracion.edit', $configuracion->id) }}"
                       class="btn btn-success">
                        <i class="bi bi-pencil"></i>
                        Editar configuración
                    </a>
                </div>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
                        <strong>Nombre de la clínica:</strong>
                        <p>{{ $configuracion->nombre_clinica }}</p>
                    </div>

                    <div class="col-md-6">
                        <strong>Dirección:</strong>
                        <p>{{ $configuracion->direccion ?? 'No registrada' }}</p>
                    </div>

                    <div class="col-md-6">
                        <strong>Teléfono:</strong>
                        <p>{{ $configuracion->telefono ?? 'No registrado' }}</p>
                    </div>

                    <div class="col-md-6">
                        <strong>Correo electrónico:</strong>
                        <p>{{ $configuracion->correo ?? 'No registrado' }}</p>
                    </div>

                    <div class="col-md-12">
                        <strong>Horario de atención:</strong>
                        <p>{{ $configuracion->horario_atencion ?? 'No registrado' }}</p>
                    </div>

                    <div class="col-md-12">
                        <strong>Descripción:</strong>
                        <p>{{ $configuracion->descripcion ?? 'No registrada' }}</p>
                    </div>

                </div>

            </div>

            <div class="card-footer">

                <a href="{{ route('admin.configuracion.index') }}"
                   class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>
                    Volver

                </a>

            </div>

        </div>

    </div>
</div>

@endsection