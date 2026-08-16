@extends('layouts.admin')

@section('content')

<div class="row">
    <h1>Crear configuración</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Registrar configuración de la clínica</h3>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Por favor, revise los siguientes errores:</strong>

                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.configuracion.store') }}" method="POST">

                    @csrf

                    <div class="row">

                        {{-- NOMBRE DE LA CLÍNICA --}}
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="nombre_clinica">
                                    Nombre de la clínica
                                </label>

                                <input type="text"
                                       name="nombre_clinica"
                                       id="nombre_clinica"
                                       class="form-control"
                                       value="{{ old('nombre_clinica') }}"
                                       placeholder="Ingrese el nombre de la clínica"
                                       required>

                            </div>
                        </div>

                        {{-- DIRECCIÓN --}}
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="direccion">
                                    Dirección
                                </label>

                                <input type="text"
                                       name="direccion"
                                       id="direccion"
                                       class="form-control"
                                       value="{{ old('direccion') }}"
                                       placeholder="Ingrese la dirección">

                            </div>
                        </div>

                        {{-- TELÉFONO --}}
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="telefono">
                                    Teléfono
                                </label>

                                <input type="text"
                                       name="telefono"
                                       id="telefono"
                                       class="form-control"
                                       value="{{ old('telefono') }}"
                                       placeholder="Ingrese el teléfono">

                            </div>
                        </div>

                        {{-- CORREO --}}
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="correo">
                                    Correo electrónico
                                </label>

                                <input type="email"
                                       name="correo"
                                       id="correo"
                                       class="form-control"
                                       value="{{ old('correo') }}"
                                       placeholder="Ingrese el correo">

                            </div>
                        </div>

                        {{-- HORARIO --}}
                        <div class="col-md-12">
                            <div class="form-group">

                                <label for="horario_atencion">
                                    Horario de atención
                                </label>

                                <input type="text"
                                       name="horario_atencion"
                                       id="horario_atencion"
                                       class="form-control"
                                       value="{{ old('horario_atencion') }}"
                                       placeholder="Ejemplo: Lunes a viernes de 8:00 AM a 6:00 PM">

                            </div>
                        </div>

                        {{-- DESCRIPCIÓN --}}
                        <div class="col-md-12">
                            <div class="form-group">

                                <label for="descripcion">
                                    Descripción
                                </label>

                                <textarea name="descripcion"
                                          id="descripcion"
                                          class="form-control"
                                          rows="4"
                                          placeholder="Descripción de la clínica">{{ old('descripcion') }}</textarea>

                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <a href="{{ route('admin.configuracion.index') }}"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Cancelar

                            </a>

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="bi bi-save"></i>
                                Guardar configuración

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection