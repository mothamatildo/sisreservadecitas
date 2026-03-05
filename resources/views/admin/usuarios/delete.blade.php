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

        <div class="card card-danger">

            <div class="card-header">
                <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
            </div>

            <div class="card-body">

                <form action="{{asset ('/admin/usuarios/create')}}" method="POST">
                    @csrf

                    <!-- Nombre -->
                    <div class="form-group">
                        <label>Nombre del usuario</label> 
                        <input type="text" value="{{$usuario->name}}" class="form-control" name="name" disabled>
                        @error('name')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="{{$usuario->email}}" class="form-control" name="email" disabled>
                                                @error('email')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>


                    <hr>

                    <div class="form-group">
                        <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-danger">
                            Eliminar usuario
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection
