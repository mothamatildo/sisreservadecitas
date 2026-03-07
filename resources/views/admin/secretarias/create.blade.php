@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Registro de nuevos secretarios</h1>
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

                <form action="{{asset ('/admin/secretarias/create')}}" method="POST">
                    @csrf

                    <!-- Nombre -->
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
                        <input type="text" value="{{old('nombres')}}" class="form-control" name="cc" required>
                        @error('cc')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                            </div> 

                              <div class="col-md-3">
                                                <div class="form-group">
                        <label>Celular</label> <b>*</b>
                        <input type="text" value="{{old('celular')}}" class="form-control" name="celular" required>
                        @error('celular')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                            </div> 

                    </div>

                    <br>



                    <!-- Email -->
                    <div class="row">
                                                      <div class="col-md-3">
                                                <div class="form-group">
                        <label>Fecha nacimiento</label> <b>*</b>
                        <input type="date" value="{{old('fecha_nacimiento')}}" class="form-control" name="fecha_nacimiento" required>
                        @error('fecha_nacimiento')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                            </div> 
                                                       <div class="col-md-9">
                                                <div class="form-group">
                        <label>Dirección</label> <b>*</b>
                        <input type="address" value="{{old('direccion')}}" class="form-control" name="direccion" required>
                        @error('direccion')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                            </div> 
                    </div>

<div class="row">
        <div class="col-md-4">
                            <!-- Email -->
                    <div class="form-group">
                        <label>Email</label><b>*</b>
                        <input type="email" class="form-control" name="email" required>
                                                @error('email')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
  </div>
    <div class="col-md-4">
                            <!-- Password -->
                    <div class="form-group">
                        <label>Password</label><b>*</b>
                        <input type="password" class="form-control" name="password" required>
                                                @error('password')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
  </div>
                    <!-- Confirmación -->
                <div class="col-md-4">
                        <div class="form-group">
                        <label>Password verificación</label><b>*</b>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
    </div>
</div>




                    <hr>

                    <div class="row">
                        <div class="col-md">
                            
                    <div class="form-group">
                        <a href="{{ url('admin/secretarias') }}" class="btn btn-secondary">Cancelar</a>

                        <button type="submit" class="btn btn-primary">
                            Registrar nuevo
                        </button>
                    </div>
                        </div>
                    </div>


                </form>

            </div>

        </div>

    </div>
</div>

@endsection
