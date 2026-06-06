@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Datos del horario</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-info">

            <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
            </div>

            <div class="card-body">



                    <!-- Doctores y Consultorios -->
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Doctores</label>
                                <p>{{$horario->doctor->nombres." ".$horario->doctor->apellidos." - ".$horario->doctor->especialidad}}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Consultorios</label>
                                <p>{{$horario->consultorio->nombre." - ".$horario->consultorio->ubicacion}}</p>


                            </div>
                        </div>

                    </div>

                    <br>

                    <!-- Día y Horarios -->
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Día</label>
                                <p>{{$horario->dia}}</p>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hora Inicio</label>
                                <p>{{$horario->hora_inicio}}</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hora Final</label>
                                 <p>{{$horario->hora_inicio}}</p>
                            </div>
                        </div>

                    </div>

                    <br>

                    <div class="form-group">
                        <a href="{{ url('/admin/horarios') }}" class="btn btn-secondary">Volver</a>


                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection