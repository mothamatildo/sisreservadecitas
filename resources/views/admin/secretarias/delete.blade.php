@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Borrar secretaria: {{$secretaria->nombres}} {{$secretaria->apellidos}}</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-danger">

            <div class="card-header">
                <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
            </div>

            <div class="card-body">

<form action="{{url('/admin/secretarias',$secretaria->id)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <!-- Nombre -->
                    <div class="row">
                        <div class="col-md-3">
                                                <div class="form-group">
                        <label>Nombres</label> 
                        <input type="text" value="{{$secretaria->nombres}}" class="form-control" name="nombres" disabled>
                        @error('nombres')
                        <small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                            </div> 

                             <div class="col-md-3">
                                                <div class="form-group">
                        <label>Apellidos</label> 
                        <input type="text" value="{{$secretaria->apellidos}}" class="form-control" name="apellidos" disabled>
                        @error('apellidos')
                        <small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                            </div> 
                                                    <div class="col-md-3">
                                                <div class="form-group">
                        <label>CC</label> 
                        <input type="text" value="{{$secretaria->cc}}" class="form-control" name="cc" disabled>
                        @error('cc')
                        <small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                            </div> 

                              <div class="col-md-3">
                                                <div class="form-group">
                        <label>Celular</label> 
                        <input type="text" value="{{$secretaria->celular}}" class="form-control" name="celular" disabled>
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
                        <label>Fecha nacimiento</label> 
                        <input type="date" value="{{$secretaria->fecha_nacimiento}}" class="form-control" name="fecha_nacimiento" disabled>
                        @error('fecha_nacimiento')
                        <small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                            </div> 
                                                       <div class="col-md-9">
                                                <div class="form-group">
                        <label>Dirección</label> 
                        <input type="text" value="{{$secretaria->direccion}}" class="form-control" name="direccion" disabled>
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
                        <label>Email</label>
                        <input type="email" value="{{$secretaria->user->email}}" class="form-control" name="email" disabled>
                                                @error('email')
                        <small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
  </div>
 
                
    </div>
</div>




                    <hr>

                    <div class="row">
                        <div class="col-md">
                            
                    <div class="form-group">
                        <a href="{{ url('admin/secretarias') }}" class="btn btn-secondary">Cancelar</a>

                        <button type="submit" class="btn btn-danger">
                            Eliminar registro
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
