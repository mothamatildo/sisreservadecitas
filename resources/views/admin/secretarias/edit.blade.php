@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Modificar secretaria: {{$secretaria->nombres}} {{$secretaria->apellidos}}</h1>
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

<form action="{{url('/admin/secretarias',$secretaria->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div class="row">
                        <div class="col-md-3">
                                                <div class="form-group">
                        <label>Nombres</label> <b>*</b>
                        <input type="text" value="{{$secretaria->nombres}}" class="form-control" name="nombres" required>
                        @error('nombres')
                        <small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                            </div> 

                             <div class="col-md-3">
                                                <div class="form-group">
                        <label>Apellidos</label> <b>*</b>
                        <input type="text" value="{{$secretaria->apellidos}}" class="form-control" name="apellidos" required>
                        @error('apellidos')
                        <small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                            </div> 
                                                    <div class="col-md-3">
                                                <div class="form-group">
                        <label>CC</label> <b>*</b>
                        <input type="text" value="{{$secretaria->cc}}" class="form-control" name="cc" required>
                        @error('cc')
                        <small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                            </div> 

                              <div class="col-md-3">
                                                <div class="form-group">
                        <label>Celular</label> <b>*</b>
                        <input type="text" value="{{$secretaria->celular}}" class="form-control" name="celular" required>
                        @error('celular')
                        <small style="color:red">{{$message}}</small>

                            
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
                        <input type="date" value="{{$secretaria->fecha_nacimiento}}" class="form-control" name="fecha_nacimiento" required>
                        @error('fecha_nacimiento')
                        <small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                            </div> 
                                                       <div class="col-md-9">
                                                <div class="form-group">
                        <label>Dirección</label> <b>*</b>
                        <input type="text" value="{{$secretaria->direccion}}" class="form-control" name="direccion" required>
                        @error('direccion')
                        <small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                            </div> 
                    </div>

<div class="row">
        <div class="col-md-4">
                            <!-- Email -->
                    <div class="form-group">
                        <label>Email</label><b>*</b>
                        <input type="email" value="{{$secretaria->user->email}}" class="form-control" name="email" required>
                                                @error('email')
                        <small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
  </div>
    <div class="col-md-4">
                            <!-- Password -->
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                                                @error('password')
                        <small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
  </div>
                    <!-- Confirmación -->
                <div class="col-md-4">
                        <div class="form-group">
                        <label>Password verificación</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
    </div>
</div>




                    <hr>

                    <div class="row">
                        <div class="col-md">
                            
                    <div class="form-group">
                        <a href="{{ url('admin/secretarias') }}" class="btn btn-secondary">Cancelar</a>

                        <button type="submit" class="btn btn-success">
                            Actualizar registro
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
