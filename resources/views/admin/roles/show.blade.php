@extends('layouts.admin')

@section('content')

<div class="row">
    <h1>Detalle del rol</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">

                <h3 class="card-title">
                    Información del rol
                </h3>

                <div class="card-tools">

                    <a href="{{ route('admin.roles.edit', $rol->id) }}"
                       class="btn btn-success">

                        <i class="bi bi-pencil"></i>
                        Editar rol

                    </a>

                </div>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">

                        <strong>Nombre del rol:</strong>

                        <p>
                            {{ $rol->nombre }}
                        </p>

                    </div>

                    <div class="col-md-6">

                        <strong>Estado:</strong>

                        <p>

                            @if($rol->estado == 'Activo')

                                <span class="badge badge-success">
                                    {{ $rol->estado }}
                                </span>

                            @else

                                <span class="badge badge-danger">
                                    {{ $rol->estado }}
                                </span>

                            @endif

                        </p>

                    </div>

                    <div class="col-md-12">

                        <strong>Descripción:</strong>

                        <p>
                            {{ $rol->descripcion ?? 'Sin descripción' }}
                        </p>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <a href="{{ route('admin.roles.index') }}"
                   class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>
                    Volver

                </a>

            </div>

        </div>

    </div>
</div>

@endsection