@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Modificar paciente: {{$paciente->nombres}} {{$paciente->apellidos}}</h1>
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

              <form action="{{url('/admin/pacientes', $paciente->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    
                    <div class="row">
                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Nombres</label> <b>*</b>
                        <input type="text" value="{{$paciente->nombres}}" class="form-control" name="nombres" required>
                        @error('nombres')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>


                    <!-- Email -->
                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Apellidos</label> <b>*</b>
                        <input type="text" value="{{$paciente->apellidos}}" class="form-control" name="apellidos" required>
                        @error('apellidos')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>CC</label> <b>*</b>
                        <input type="text" value="{{$paciente->cc}}" class="form-control" name="cc" required>
                        @error('cc')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Nro de seguro</label> <b>*</b>
                        <input type="text" value="{{$paciente->nro_seguro}}" class="form-control" name="nro_seguro" required>
                        @error('nro_seguro')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>







                  </div>

                  <div class="row">
                    
                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Fecha de nacimiento</label> <b>*</b>
                        <input type="date" value="{{$paciente->fecha_nacimiento}}" class="form-control" name="fecha_nacimiento" required>
                        @error('fecha_nacimiento')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>

<div class="col-md-3">
    <div class="form-group">
        <label>Género</label>
        <select name="genero" class="form-control">
            <option value="M" {{ $paciente->genero == 'M' ? 'selected' : '' }}>MASCULINO</option>
            <option value="F" {{ $paciente->genero == 'F' ? 'selected' : '' }}>FEMENINO</option>
        </select>
    </div>
</div>

                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Celular</label> <b>*</b>
                        <input type="text" value="{{$paciente->celular}}" class="form-control" name="celular" required>
                        @error('celular')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>

       
                    </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Correo</label> <b>*</b>
                        <input type="email" value="{{$paciente->correo}}" class="form-control" name="correo" required>
                        @error('correo')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>

       
                    </div>

            


                    



                  </div>
                  <div class="row">
                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                        <label>Dirección</label> <b>*</b>
                        <input type="text" value="{{$paciente->direccion}}" class="form-control" name="direccion" required>
                        @error('direccion')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>
<div class="col-md-3">
    <div class="form-group">
        <label>Grupo Sanguíneo</label>
        <select name="grupo_sanguineo" class="form-control">
            <option value="A+" {{ $paciente->grupo_sanguineo == 'A+' ? 'selected' : '' }}>A+</option>
            <option value="A-" {{ $paciente->grupo_sanguineo == 'A-' ? 'selected' : '' }}>A-</option>
            <option value="B+" {{ $paciente->grupo_sanguineo == 'B+' ? 'selected' : '' }}>B+</option>
            <option value="B-" {{ $paciente->grupo_sanguineo == 'B-' ? 'selected' : '' }}>B-</option>
            <option value="O+" {{ $paciente->grupo_sanguineo == 'O+' ? 'selected' : '' }}>O+</option>
            <option value="O-" {{ $paciente->grupo_sanguineo == 'O-' ? 'selected' : '' }}>O-</option>
        </select>
    </div>
</div>

                    
                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Alergias</label> <b>*</b>
                        <input type="text" value="{{$paciente->alergias}}" class="form-control" name="alergias" required>
                        @error('alergias')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>

                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Contacto de emergencia</label> <b>*</b>
                        <input type="text" value="{{$paciente->contacto_emergencia}}" class="form-control" name="contacto_emergencia" required>
                        @error('contacto_emergencia')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>

       
                    </div>

                                        <div class="col-md-9">
                                            <div class="form-group">
                        <label>Observaciones</label>
                        <input type="text" value="{{$paciente->observaciones}}" class="form-control" name="observaciones">
                        @error('observaciones')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>

       
                    </div>

            


                    



                  </div>






                    <hr>

                    <div class="form-group">
                        <a href="{{ url('admin/pacientes') }}" class="btn btn-secondary">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-success">
                            Actualizar paciente
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection
