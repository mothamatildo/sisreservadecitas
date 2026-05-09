@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Doctor: {{$doctor->nombres." ".$doctor->apellidos}}</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-success">

            <div class="card-header">
                <h3 class="card-title">Complete los datos</h3>
            </div>

            <div class="card-body">

                <form action="{{url('/admin/doctores', $doctor->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Datos personales -->
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nombres</label> <b>*</b>
                                <input type="text" value="{{$doctor->nombres}}" class="form-control" name="nombres" required>

                                @error('nombres')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Apellidos</label> <b>*</b>
                                <input type="text" value="{{$doctor->apellidos}}" class="form-control" name="apellidos" required>

                                @error('apellidos')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Teléfono</label> <b>*</b>
                                <input type="number" value="{{$doctor->telefono}}" class="form-control" name="telefono" required>

                                @error('telefono')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Licencia médica</label> <b>*</b>
                                <input type="text" value="{{$doctor->licencia_medica}}" class="form-control" name="licencia_medica" required>

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
                                <input type="text" value="{{$doctor->especialidad}}" class="form-control" name="especialidad" required>

                                @error('especialidad')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Consultorio -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Consultorio</label> <b>*</b>

                                <select name="consultorio_id" class="form-control" required>

                                    @foreach($consultorios as $consultorio)

                                        <option value="{{$consultorio->id}}"
                                            {{$doctor->consultorio_id == $consultorio->id ? 'selected' : ''}}>

                                            {{$consultorio->nombre}}

                                        </option>

                                    @endforeach

                                </select>

                                @error('consultorio_id')
                                    <small style="color:red">{{$message}}</small>
                                @enderror

                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email</label><b>*</b>

                                <input type="email"
                                       value="{{$doctor->user->email}}"
                                       class="form-control"
                                       name="email"
                                       required>

                                @error('email')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Password</label><b>*</b>

                                <input type="password"
                                       class="form-control"
                                       name="password">

                                @error('password')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <br>

                    <!-- Confirmación password -->
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Password verificación</label><b>*</b>

                                <input type="password"
                                       class="form-control"
                                       name="password_confirmation">
                            </div>
                        </div>

                    </div>

                    <hr>

                    <!-- Botones -->
                    <div class="form-group">

                        <a href="{{ url('admin/doctores') }}" class="btn btn-secondary">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-success">
                            Actualizar doctor
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection