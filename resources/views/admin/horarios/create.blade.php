@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Registro de un nuevo horario</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
            </div>

            <div class="card-body">

                <form action="{{ url('/admin/horarios') }}" method="POST">
                    @csrf

                    <!-- Doctores y Consultorios -->
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Doctores</label> <b>*</b>

                                <select name="doctor_id" class="form-control" required>
                                    @foreach($doctores as $doctor)
                                        <option value="{{ $doctor->id }}">
                                            {{ $doctor->nombres }} {{ $doctor->apellidos }} - {{ $doctor->especialidad }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Consultorios</label> <b>*</b>

                                <select name="consultorio_id" class="form-control" required>
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}">
                                            {{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                    </div>

                    <br>

                    <!-- Día y Horarios -->
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Día</label> <b>*</b>

                                <select name="dia" class="form-control" required>
                                    <option value="LUNES">LUNES</option>
                                    <option value="MARTES">MARTES</option>
                                    <option value="MIERCOLES">MIERCOLES</option>
                                    <option value="JUEVES">JUEVES</option>
                                    <option value="VIERNES">VIERNES</option>
                                    <option value="SABADO">SABADO</option>
                                    <option value="DOMINGO">DOMINGO</option>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hora Inicio</label> <b>*</b>

                                <input type="time"
                                       name="hora_inicio"
                                       value="{{ old('hora_inicio') }}"
                                       class="form-control"
                                       required>

                                @error('hora_inicio')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hora Final</label> <b>*</b>

                                <input type="time"
                                       name="hora_fin"
                                       value="{{ old('hora_fin') }}"
                                       class="form-control"
                                       required>

                                @error('hora_fin')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <br>

                    <div class="form-group">
                        <a href="{{ url('/admin/horarios') }}" class="btn btn-secondary">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Registrar nuevo
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection