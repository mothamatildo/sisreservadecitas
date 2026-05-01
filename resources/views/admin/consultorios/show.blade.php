@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Consultorio: {{$consultorio->nombre}} </h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-info">

            <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
            </div>

            <div class="card-body">

             
                    
                    
                    <div class="row">
                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Nombre del consultorio</label>
                        <p>{{$consultorio->nombre}}</p>
                     
                    </div>
                    </div>


                    
                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Ubicación</label>
                        <p>{{$consultorio->ubicacion}}</p>
                    </div>
                    </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Capacidad</label>
                        <p>{{$consultorio->ubicacion}}</p>

                    </div>
                    </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Telefono</label> 
                      <p>{{$consultorio->telefono}}</p>
                     
                    </div>
                    </div>







                  </div>

                  <div class="row">
                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                        <label>Especialidad</label>
                        <p>{{$consultorio->especialidad}}</p>
                    </div>
                    </div>

                                                            <div class="col-md-3">
                                            <div class="form-group">
                        <label>Estado</label>
                     <p>{{$consultorio->estado}}</p>
                    </div>
                    </div>  


            
                  </div>
    
                    <hr>

                    <div class="form-group">
                        <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary">
                           Volver
                        </a>

                 
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection
