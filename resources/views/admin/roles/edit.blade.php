@extends('layouts.admin')

@section('content')

<div class="row">
    <h1>Editar rol</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Modificar datos del rol</h3>
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

                <form action="{{ route('admin.roles.update', $rol->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

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
                                       value="{{ old('nombre', $rol->nombre) }}"
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
                                        {{ old('estado', $rol->estado) == 'Activo' ? 'selected' : '' }}>
                                        Activo
                                    </option>

                                    <option value="Inactivo"
                                        {{ old('estado', $rol->estado) == 'Inactivo' ? 'selected' : '' }}>
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
                                          placeholder="Descripción del rol">{{ old('descripcion', $rol->descripcion) }}</textarea>

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
                                    class="btn btn-success">

                                <i class="bi bi-pencil"></i>
                                Actualizar rol

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection