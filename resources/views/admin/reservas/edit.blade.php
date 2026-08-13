@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Editar reserva</h3>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Hay algunos errores:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.reservas.update', $reserva->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Paciente</label>

                                <select name="paciente_id" class="form-control" required>
                                    <option value="">Seleccione un paciente</option>

                                    @foreach($pacientes as $paciente)
                                        <option value="{{ $paciente->id }}"
                                            {{ $reserva->paciente_id == $paciente->id ? 'selected' : '' }}>

                                            {{ $paciente->nombres }}
                                            {{ $paciente->apellidos }}

                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Doctor</label>

                                <select name="doctor_id" class="form-control" required>
                                    <option value="">Seleccione un doctor</option>

                                    @foreach($doctores as $doctor)
                                        <option value="{{ $doctor->id }}"
                                            {{ $reserva->doctor_id == $doctor->id ? 'selected' : '' }}>

                                            Dr. {{ $doctor->nombres }}
                                            {{ $doctor->apellidos }}
                                            - {{ $doctor->especialidad }}

                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Consultorio</label>

                                <select name="consultorio_id" class="form-control" required>
                                    <option value="">Seleccione un consultorio</option>

                                    @foreach($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}"
                                            {{ $reserva->consultorio_id == $consultorio->id ? 'selected' : '' }}>

                                            {{ $consultorio->nombre }}
                                            - {{ $consultorio->ubicacion }}

                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Fecha</label>

                                <input type="date"
                                       name="fecha"
                                       class="form-control"
                                       value="{{ $reserva->fecha }}"
                                       required>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hora</label>

                                <input type="time"
                                       name="hora"
                                       class="form-control"
                                       value="{{ $reserva->hora }}"
                                       required>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">

                                <label>Estado</label>

                                <select name="estado" class="form-control" required>

                                    <option value="Pendiente"
                                        {{ $reserva->estado == 'Pendiente' ? 'selected' : '' }}>
                                        Pendiente
                                    </option>

                                    <option value="Confirmada"
                                        {{ $reserva->estado == 'Confirmada' ? 'selected' : '' }}>
                                        Confirmada
                                    </option>

                                    <option value="Atendida"
                                        {{ $reserva->estado == 'Atendida' ? 'selected' : '' }}>
                                        Atendida
                                    </option>

                                    <option value="Cancelada"
                                        {{ $reserva->estado == 'Cancelada' ? 'selected' : '' }}>
                                        Cancelada
                                    </option>

                                </select>

                            </div>
                        </div>


                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Observaciones</label>

                                <textarea name="observaciones"
                                          class="form-control"
                                          rows="3">{{ $reserva->observaciones }}</textarea>

                            </div>

                        </div>

                    </div>


                    <hr>

                    <a href="{{ route('admin.reservas.index') }}"
                       class="btn btn-secondary">

                        Cancelar

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save"></i>
                        Actualizar reserva

                    </button>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection