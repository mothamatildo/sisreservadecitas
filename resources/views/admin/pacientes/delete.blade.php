@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Paciente: {{ $paciente->nombres }} {{ $paciente->apellidos }}</h1>
    </div>
</div>

<hr>

<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">¿Está seguro de eliminar este registro?</h3>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-3">
                <strong>Nombres:</strong><br>
                {{ $paciente->nombres }}
            </div>

            <div class="col-md-3">
                <strong>Apellidos:</strong><br>
                {{ $paciente->apellidos }}
            </div>

            <div class="col-md-3">
                <strong>CI:</strong><br>
                {{ $paciente->cc }}
            </div>

            <div class="col-md-3">
                <strong>Nro de seguro:</strong><br>
                {{ $paciente->nro_seguro }}
            </div>

            <div class="col-md-3 mt-3">
                <strong>Fecha de nacimiento:</strong><br>
                {{ $paciente->fecha_nacimiento }}
            </div>

            <div class="col-md-3 mt-3">
                <strong>Género:</strong><br>
                {{ $paciente->genero == 'M' ? 'MASCULINO' : 'FEMENINO' }}
            </div>

            <div class="col-md-3 mt-3">
                <strong>Celular:</strong><br>
                {{ $paciente->celular }}
            </div>

            <div class="col-md-3 mt-3">
                <strong>Correo:</strong><br>
                {{ $paciente->correo }}
            </div>

            <div class="col-md-6 mt-3">
                <strong>Dirección:</strong><br>
                {{ $paciente->direccion }}
            </div>

            <div class="col-md-3 mt-3">
                <strong>Grupo sanguíneo:</strong><br>
                {{ $paciente->grupo_sanguineo }}
            </div>

            <div class="col-md-3 mt-3">
                <strong>Alergias:</strong><br>
                {{ $paciente->alergias }}
            </div>

            <div class="col-md-3 mt-3">
                <strong>Contacto de emergencia:</strong><br>
                {{ $paciente->contacto_emergencia }}
            </div>

            <div class="col-md-9 mt-3">
                <strong>Observaciones:</strong><br>
                {{ $paciente->observaciones }}
            </div>

        </div>

        <hr>

        <form action="{{ route('admin.pacientes.destroy', $paciente->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <a href="{{ route('admin.pacientes.index') }}" class="btn btn-secondary">
                Volver
            </a>

            <button type="submit" class="btn btn-danger">
                Eliminar definitivamente
            </button>
        </form>

    </div>
</div>

@endsection