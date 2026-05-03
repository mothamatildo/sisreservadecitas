@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Registro de un nuevo doctor</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Complete los datos</h3>
            </div>

            <div class="card-body">

<form action="{{url('/admin/doctores')}}" method="POST">
    @csrf

    <!-- Datos personales -->
    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label>Nombres</label> <b>*</b>
                <input type="text" value="{{old('nombres')}}" class="form-control" name="nombres" required>
                @error('nombres')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Apellidos</label> <b>*</b>
                <input type="text" value="{{old('apellidos')}}" class="form-control" name="apellidos" required>
                @error('apellidos')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Teléfono</label> <b>*</b>
                <input type="number" value="{{old('telefono')}}" class="form-control" name="telefono" required>
                @error('telefono')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Licencia médica</label> <b>*</b>
                <input type="text" value="{{old('licencia_medica')}}" class="form-control" name="licencia_medica" required>
                @error('licencia_medica')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
        </div>

    </div>

    <br>

    <!-- Datos adicionales -->
    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label>Especialidad</label> <b>*</b>
                <input type="text" value="{{old('especialidad')}}" class="form-control" name="especialidad" required>
                @error('especialidad')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <!-- 🔥 NUEVO: CONSULTORIO -->
        <div class="col-md-3">
            <div class="form-group">
                <label>Consultorio</label> <b>*</b>
                <select name="consultorio_id" class="form-control" required>
                    <option value="">Seleccione...</option>
                    @foreach($consultorios as $consultorio)
                        <option value="{{ $consultorio->id }}">
                            {{ $consultorio->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Email</label><b>*</b>
                <input type="email" value="{{old('email')}}" class="form-control" name="email" required>
                @error('email')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Password</label><b>*</b>
                <input type="password" class="form-control" name="password" required>
                @error('password')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
        </div>

    </div>

    <br>

    <!-- Confirmación -->
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Password verificación</label><b>*</b>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
    </div>

    <hr>

    <!-- Botones -->
    <div class="form-group">
        <a href="{{ url('admin/doctores') }}" class="btn btn-secondary">
            Cancelar
        </a>

        <button type="submit" class="btn btn-primary">
            Registrar doctor
        </button>
    </div>

</form>

            </div>

        </div>

    </div>
</div>

@endsection