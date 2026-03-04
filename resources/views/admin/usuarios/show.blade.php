@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Usuario: {{$usuario->name}}</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-6">

        <div class="card card-outline card-info">

            <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
            </div>

            <div class="card-body">

                

                    <!-- Nombre -->
                    <div class="form-group">
                        <label>Nombre del usuario</label>
                       <p>{{$usuario->name}}</p>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label>Email</label>
                         <p>{{$usuario->email}}</p>
                    </div>

<hr>
                    <div class="form-group">
                        <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">
                            Cancelar
                        </a>

                    </div>



            </div>

        </div>

    </div>
</div>

@endsection
