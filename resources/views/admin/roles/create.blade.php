@extends('layouts.admin')

@section('content')

<div class="row">
    <h1>Crear rol</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Registrar nuevo rol</h3>
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

                <form action="{{ route('admin.roles.store') }}" method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="nombre">
                                    Nombre del rol
                                </label>

                                <input type="text"
                                       name="nombre"
                                       id="nombre"
                                       class="form-control"
                                       value="{{ old('nombre') }}"
                                       placeholder="Ej: Administrador"
                                       required>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="estado">
                                    Estado
                                </label>

                                <select name="estado"
                                        id="estado"
                                        class="form-control"
                                        required>

                                    <option value="Activo"
                                        {{ old('estado', 'Activo') == 'Activo' ? 'selected' : '' }}>
                                        Activo
                                    </option>

                                    <option value="Inactivo"
                                        {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>
                                        Inactivo
                                    </option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-12">

                            <div class="form-group">

                                <label for="descripcion">
                                    Descripción
                                </label>

                                <textarea name="descripcion"
                                          id="descripcion"
                                          class="form-control"
                                          rows="4"
                                          placeholder="Descripción del rol">{{ old('descripcion') }}</textarea>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <a href="{{ route('admin.roles.index') }}"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Cancelar

                            </a>

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="bi bi-save"></i>
                                Guardar rol

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection