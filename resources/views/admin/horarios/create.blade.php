@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Registro de un nuevo horario</h1>
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

<form action="{{url('/admin/horarios/create')}}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Día</label> <b>*</b>
                <select name="dia" id="" class="form-control ">
                 <option value="LUNES">LUNES</option>
                  <option value="MARTES">MARTES</option>
                   <option value="MIERCOLES">MIERCOLES</option>
                    <option value="JUEVES">JUEVES</option>
                     <option value="VIERNES">VIERNES</option>
                      <option value="SABADO">SABADO</option>
                      <option value="DOMINGO">DOMINGO</option>
                </select>
                
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Hora inicio</label> <b>*</b>
                <input type="time" value="{{old('hora_inicio')}}" class="form-control" name="hora_inicio" required>
                @error('hora_inicio')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Hora final</label> <b>*</b>
                <input type="time" value="{{old('hora_final')}}" class="form-control" name="hora_final" required>
                @error('hora_final')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
        </div>



    </div>

    <br>

    <!-- Datos adicionales -->
    <div class="row">

                <div class="col-md-6">
            <div class="form-group">
                <label>Doctores</label> <b>*</b>
                <select name="doctor_id" id="" class="form-control ">
                @foreach ($doctores as $doctore)
                <option value="{{$doctore->id}}">{{$doctore->nombres." ".$doctore->apellidos. " - ".$doctore->especialidad }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Consultorios</label> <b>*</b>
                              <select name="consultorio_id" id="" class="form-control ">
                @foreach ($consultorios as $consultorio)
                <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicaion}}</option>
                @endforeach
                </select>
            </div>
        </div>



  



    </div>

    <br>



    <hr>

    <!-- Botones -->
    <div class="form-group">
        <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Cancelar</a>

        <button type="submit" class="btn btn-primary">Registrar horario</button>
    </div>

</form>

            </div>

        </div>

    </div>
</div>

@endsection