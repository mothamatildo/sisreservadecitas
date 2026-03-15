@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Registro de un nuevo usuario</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-6">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Complete los datos</h3>
            </div>

            <div class="card-body">

            <form action="{{asset ('/admin/usuarios/create')}}" method="POST">
                    @csrf

                    <!-- Nombre -->
                    <div class="form-group">
                        <label>Nombre del usuario</label> <b>*</b>
                        <input type="text" value="{{old('name')}}" class="form-control" name="name" required>
                        @error('name')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label>Email</label><b>*</b>
                        <input type="email" value="{{old('email')}}" class="form-control" name="email" required>
                                                @error('email')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label>Password</label><b>*</b>
                        <input type="password" class="form-control" name="password" required>
                                                @error('password')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>

                    <!-- Confirmación -->
                    <div class="form-group">
                        <label>Password verificación</label><b>*</b>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <hr>

                    <div class="form-group">
                        <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Registrar usuario
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection
