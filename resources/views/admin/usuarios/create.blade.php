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

                <form action="#" method="POST">
                    @csrf

                    <!-- Nombre -->
                    <div class="form-group">
                        <label>Nombre del usuario</label> <b>*</b>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label>Email</label><b>*</b>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label>Password</label><b>*</b>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <!-- Confirmación -->
                    <div class="form-group">
                        <label>Password verificación</label><b>*</b>
                        <input type="password" class="form-control" name="password_confirmation">
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
