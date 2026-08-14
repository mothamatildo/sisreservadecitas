@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Registrar historial clínico</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Datos del historial clínico</h3>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Se encontraron algunos errores:</strong>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.historiales.store') }}" method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="paciente_id">
                                    Paciente
                                </label>

                                <select name="paciente_id"
                                        id="paciente_id"
                                        class="form-control"
                                        required>

                                    <option value="">
                                        Seleccione un paciente
                                    </option>

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

                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="fecha">
                                    Fecha
                                </label>

                                <input type="date"
                                       name="fecha"
                                       id="fecha"
                                       class="form-control"
                                       value="{{ old('fecha', date('Y-m-d')) }}"
                                       required>

                            </div>
                        </div>

                    </div>


                    <div class="form-group">

                        <label for="motivo_consulta">
                            Motivo de consulta
                        </label>

                        <textarea name="motivo_consulta"
                                  id="motivo_consulta"
                                  class="form-control"
                                  rows="3"
                                  required>{{ old('motivo_consulta') }}</textarea>

                    </div>


                    <div class="form-group">

                        <label for="diagnostico">
                            Diagnóstico
                        </label>

                        <textarea name="diagnostico"
                                  id="diagnostico"
                                  class="form-control"
                                  rows="3">{{ old('diagnostico') }}</textarea>

                    </div>


                    <div class="form-group">

                        <label for="tratamiento">
                            Tratamiento
                        </label>

                        <textarea name="tratamiento"
                                  id="tratamiento"
                                  class="form-control"
                                  rows="3">{{ old('tratamiento') }}</textarea>

                    </div>


                    <div class="form-group">

                        <label for="observaciones">
                            Observaciones
                        </label>

                        <textarea name="observaciones"
                                  id="observaciones"
                                  class="form-control"
                                  rows="3">{{ old('observaciones') }}</textarea>

                    </div>


                    <div class="form-group">

                        <a href="{{ route('admin.historiales.index') }}"
                           class="btn btn-secondary">

                            Cancelar

                        </a>

                        <button type="submit"
                                class="btn btn-primary">

                            Guardar historial

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection
