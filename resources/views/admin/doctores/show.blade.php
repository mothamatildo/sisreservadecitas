@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Doctor: {{$doctor->nombres." ".$doctor->apellidos}}</h1>
    </div>
</div>

<hr>

<div class="col-md-12">

    <div class="card card-outline card-info">

        <div class="card-header">
            <h3 class="card-title">Datos registrados</h3>
        </div>

        <div class="card-body">

            <!-- Datos personales -->
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Nombres</label>
                        <p>{{$doctor->nombres}}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Apellidos</label>
                        <p>{{$doctor->apellidos}}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Teléfono</label>
                        <p>{{$doctor->telefono}}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Licencia médica</label>
                        <p>{{$doctor->licencia_medica}}</p>
                    </div>
                </div>

            </div>

            <br>

            <!-- Datos adicionales -->
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Especialidad</label>
                        <p>{{$doctor->especialidad}}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Email</label>
                        <p>{{$doctor->user->email}}</p>
                    </div>
                </div>

            </div>

            <br>

            <hr>

            <!-- Botón -->
            <div class="form-group">
                <a href="{{ url('admin/doctores') }}" class="btn btn-secondary">
                    Volver
                </a>
            </div>

        </div>

    </div>

</div>

@endsection