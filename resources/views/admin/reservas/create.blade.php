@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Registrar nueva reserva</h3>
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

                <form action="{{ route('admin.reservas.store') }}" method="POST">

                    @csrf

                    <div class="row">

                        {{-- PACIENTE --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="paciente_id">Paciente</label>

                                <select name="paciente_id"
                                        id="paciente_id"
                                        class="form-control"
                                        required>

                                    <option value="">Seleccione un paciente</option>

                                    @foreach($pacientes as $paciente)

                                        <option value="{{ $paciente->id }}"
                                            {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>

                                            {{ $paciente->nombres }}
                                            {{ $paciente->apellidos }}

                                        </option>

                                    @endforeach

                                </select>
                            </div>
                        </div>


                        {{-- DOCTOR --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doctor_id">Doctor</label>

                                <select name="doctor_id"
                                        id="doctor_id"
                                        class="form-control"
                                        required>

                                    <option value="">Seleccione un doctor</option>

                                    @foreach($doctores as $doctor)

                                        <option value="{{ $doctor->id }}"
                                            {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>

                                            Dr.
                                            {{ $doctor->nombres }}
                                            {{ $doctor->apellidos }}
                                            - {{ $doctor->especialidad }}

                                        </option>

                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        {{-- CONSULTORIO --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="consultorio_id">Consultorio</label>

                                <select name="consultorio_id"
                                        id="consultorio_id"
                                        class="form-control"
                                        required>

                                    <option value="">Seleccione un consultorio</option>

                                    @foreach($consultorios as $consultorio)

                                        <option value="{{ $consultorio->id }}"
                                            {{ old('consultorio_id') == $consultorio->id ? 'selected' : '' }}>

                                            {{ $consultorio->nombre }}
                                            - {{ $consultorio->ubicacion }}

                                        </option>

                                    @endforeach

                                </select>
                            </div>
                        </div>


                        {{-- FECHA --}}
                        <div class="col-md-3">
                            <div class="form-group">

                                <label for="fecha">Fecha</label>

                                <input type="date"
                                       name="fecha"
                                       id="fecha"
                                       class="form-control"
                                       value="{{ old('fecha') }}"
                                       required>

                            </div>
                        </div>


                        {{-- HORA --}}
                        <div class="col-md-3">
                            <div class="form-group">

                                <label for="hora">Hora</label>

                                <input type="time"
                                       name="hora"
                                       id="hora"
                                       class="form-control"
                                       value="{{ old('hora') }}"
                                       required>

                            </div>
                        </div>

                    </div>


                    <div class="row">

                        {{-- ESTADO --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="estado">Estado</label>

                                <select name="estado"
                                        id="estado"
                                        class="form-control"
                                        required>

                                    <option value="Pendiente">
                                        Pendiente
                                    </option>

                                    <option value="Confirmada">
                                        Confirmada
                                    </option>

                                    <option value="Atendida">
                                        Atendida
                                    </option>

                                    <option value="Cancelada">
                                        Cancelada
                                    </option>

                                </select>

                            </div>

                        </div>


                        {{-- OBSERVACIONES --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="observaciones">
                                    Observaciones
                                </label>

                                <textarea name="observaciones"
                                          id="observaciones"
                                          class="form-control"
                                          rows="3"
                                          placeholder="Observaciones de la reserva">{{ old('observaciones') }}</textarea>

                            </div>

                        </div>

                    </div>


                    <hr>

                    <div class="row">

                        <div class="col-md-12">

                            <a href="{{ route('admin.reservas.index') }}"
                               class="btn btn-secondary">

                                Cancelar

                            </a>

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="bi bi-save"></i>
                                Guardar reserva

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection