@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Registro de un nuevo consultorio</h1>
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

              <form action="{{url('/admin/consultorios')}}" method="POST">
                    @csrf
                    
                    
                    <div class="row">
                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Nombre del consultorio</label> <b>*</b>
                        <input type="text" value="{{old('nombre')}}" class="form-control" name="nombre" required>
                        @error('nombre')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>


                    
                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Ubicación</label> <b>*</b>
                        <input type="text" value="{{old('ubicacion')}}" class="form-control" name="ubicacion" required>
                        @error('ubicacion')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Capacidad</label> <b>*</b>
                        <input type="text" value="{{old('capacidad')}}" class="form-control" name="capacidad" required>
                        @error('capacidad')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Telefono</label> 
                        <input type="text" value="{{old('telefono')}}" class="form-control" name="telefono" >
                     
                    </div>
                    </div>







                  </div>

                  <div class="row">
                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                        <label>Especialidad</label> <b>*</b>
                        <input type="text" value="{{old('especialidad')}}" class="form-control" name="especialidad" required>
                        @error('especialidad')
                        ><small style="color:red">{{$message}}</small>

                            
                        @enderror
                    </div>
                    </div>

                                                            <div class="col-md-3">
                                            <div class="form-group">
                        <label>Estado</label>
                        <select name="estado" id="" class="form-control">
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="ACTIVO">INACTIVO</option>
                        </select>

                    </div>
                    </div>  


            
                  </div>
    
                    <hr>

                    <div class="form-group">
                        <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Registrar consultorio
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection
