@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Detalle del historial clínico</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Información del historial</h3>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
                        <strong>Paciente:</strong>

                        <p>
                            {{ $historial->paciente->nombres }}
                            {{ $historial->paciente->apellidos }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <strong>Fecha:</strong>

                        <p>
                            {{ $historial->fecha }}
                        </p>
                    </div>

                </div>

                <hr>

                <div class="form-group">
                    <strong>Motivo de consulta:</strong>

                    <p>
                        {{ $historial->motivo_consulta }}
                    </p>
                </div>

                <div class="form-group">
                    <strong>Diagnóstico:</strong>

                    <p>
                        {{ $historial->diagnostico ?? 'No registrado' }}
                    </p>
                </div>

                <div class="form-group">
                    <strong>Tratamiento:</strong>

                    <p>
                        {{ $historial->tratamiento ?? 'No registrado' }}
                    </p>
                </div>

                <div class="form-group">
                    <strong>Observaciones:</strong>

                    <p>
                        {{ $historial->observaciones ?? 'Sin observaciones' }}
                    </p>
                </div>

                <hr>

                <a href="{{ route('admin.historiales.index') }}"
                   class="btn btn-secondary">
                    Volver
                </a>

                <a href="{{ route('admin.historiales.edit', $historial->id) }}"
                   class="btn btn-success">
                    Editar
                </a>

            </div>

        </div>

    </div>
</div>

@endsection