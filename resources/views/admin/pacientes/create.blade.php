@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Registro de un nuevo paciente</h1>
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

              <form action="{{url('/admin/pacientes')}}" method="POST">
                    @csrf
                    
                    
                    <div class="row">
                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Nombres</label> <b>*</b>
                        <input type="text" value="{{old('nombres')}}" class="form-control" name="nombres" required>
                        @error('nombres')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>


                    <!-- Email -->
                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Apellidos</label> <b>*</b>
                        <input type="text" value="{{old('apellidos')}}" class="form-control" name="apellidos" required>
                        @error('apellidos')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>CC</label> <b>*</b>
                        <input type="text" value="{{old('cc')}}" class="form-control" name="cc" required>
                        @error('cc')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Nro de seguro</label> <b>*</b>
                        <input type="text" value="{{old('nro_seguro')}}" class="form-control" name="nro_seguro" required>
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
                        <input type="date" value="{{old('fecha_nacimiento')}}" class="form-control" name="fecha_nacimiento" required>
                        @error('fecha_nacimiento')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>

                                                            <div class="col-md-3">
                                            <div class="form-group">
                        <label>Género</label>
                        <select name="genero" id="" class="form-control">
                            <option value="M">MASCULINO</option>
                            <option value="F">FEMENINO</option>
                        </select>

                    </div>
                    </div>

                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Celular</label> <b>*</b>
                        <input type="number" value="{{old('celular')}}" class="form-control" name="celular" required>
                        @error('celular')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>

       
                    </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Correo</label> <b>*</b>
                        <input type="email" value="{{old('correo')}}" class="form-control" name="correo" required>
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
                        <input type="text" value="{{old('direccion')}}" class="form-control" name="direccion" required>
                        @error('direccion')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>

                                                            <div class="col-md-3">
                                            <div class="form-group">
                        <label>Grupo Sanguineo</label>
                        <select name="grupo_sanguineo" id="" class="form-control">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>

                    </div>
                    </div>

                    
                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Alergias</label> <b>*</b>
                        <input type="text" value="{{old('alergias')}}" class="form-control" name="alergias" required>
                        @error('alergias')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>

                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Contacto de emergencia</label> <b>*</b>
                        <input type="number" value="{{old('contacto_emergencia')}}" class="form-control" name="contacto_emergencia" required>
                        @error('contacto_emergencia')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>

       
                    </div>

                                        <div class="col-md-9">
                                            <div class="form-group">
                        <label>Observaciones</label>
                        <input type="text" value="{{old('observaciones')}}" class="form-control" name="observaciones">
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

                        <button type="submit" class="btn btn-primary">
                            Registrar paciente
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection
