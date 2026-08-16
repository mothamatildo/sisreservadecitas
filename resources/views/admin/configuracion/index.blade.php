@extends('layouts.admin')

@section('content')

<div class="row">
    <h1>Configuración</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Configuración de la clínica</h3>

                <div class="card-tools">

                    @if(!$configuracion)
                        <a href="{{ route('admin.configuracion.create') }}"
                           class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i>
                            Crear configuración
                        </a>
                    @else
                        <a href="{{ route('admin.configuracion.edit', $configuracion->id) }}"
                           class="btn btn-success">
                            <i class="bi bi-pencil"></i>
                            Editar configuración
                        </a>
                    @endif

                </div>
            </div>

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($configuracion)

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
                            <strong>Correo:</strong>
                            <p>{{ $configuracion->correo ?? 'No registrado' }}</p>
                        </div>

                        <div class="col-md-6">
                            <strong>Horario de atención:</strong>
                            <p>{{ $configuracion->horario_atencion ?? 'No registrado' }}</p>
                        </div>

                        <div class="col-md-12">
                            <strong>Descripción:</strong>
                            <p>{{ $configuracion->descripcion ?? 'No registrada' }}</p>
                        </div>

                    </div>

                @else

                    <div class="alert alert-info">
                        No existe una configuración registrada.
                    </div>

                @endif

            </div>

        </div>

    </div>
</div>

@endsection