@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Información de la reserva</h3>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
                        <strong>Paciente:</strong>
                        <p>
                            {{ $reserva->paciente->nombres }}
                            {{ $reserva->paciente->apellidos }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <strong>Doctor:</strong>
                        <p>
                            {{ $reserva->doctor->nombres }}
                            {{ $reserva->doctor->apellidos }}
                        </p>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <strong>Especialidad:</strong>
                        <p>
                            {{ $reserva->doctor->especialidad }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <strong>Consultorio:</strong>
                        <p>
                            {{ $reserva->consultorio->nombre }}
                            - {{ $reserva->consultorio->ubicacion }}
                        </p>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">
                        <strong>Fecha:</strong>
                        <p>{{ $reserva->fecha }}</p>
                    </div>

                    <div class="col-md-4">
                        <strong>Hora:</strong>
                        <p>{{ $reserva->hora }}</p>
                    </div>

                    <div class="col-md-4">
                        <strong>Estado:</strong>
                        <p>
                            <span class="badge bg-warning">
                                {{ $reserva->estado }}
                            </span>
                        </p>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">
                        <strong>Observaciones:</strong>

                        <p>
                            {{ $reserva->observaciones ?? 'Sin observaciones' }}
                        </p>
                    </div>

                </div>

                <hr>

                <a href="{{ route('admin.reservas.index') }}"
                   class="btn btn-secondary">

                    Volver

                </a>

                <a href="{{ route('admin.reservas.edit', $reserva->id) }}"
                   class="btn btn-success">

                    Editar reserva

                </a>

            </div>

        </div>

    </div>
</div>

@endsection