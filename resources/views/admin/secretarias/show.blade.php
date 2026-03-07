@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Secretaria: {{$secretaria->nombres}} {{$secretaria->apellidos}}</h1>
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


                    <!-- Nombre -->
                    <div class="row">
                        <div class="col-md-3">
                                                <div class="form-group">
                        <label>Nombres</label>
                        <p>{{$secretaria->nombres}}</p>
                    
                    </div>
                            </div> 

                             <div class="col-md-3">
                                                <div class="form-group">
                        <label>Apellidos</label>
                                                <p>{{$secretaria->apellidos}}</p>

                     
                    </div>
                            </div> 
                                                    <div class="col-md-3">
                                                <div class="form-group">
                        <label>CC</label> 
                        <p>{{$secretaria->cc}}</p>
                    </div>
                            </div> 

                              <div class="col-md-3">
                                                <div class="form-group">
                        <label>Celular</label>
                        <p>{{$secretaria->celular}}</p>

                            
                     
                    </div>
                            </div> 

                    </div>

                    <br>



                    <!-- Email -->
                    <div class="row">
                                                      <div class="col-md-3">
                                                <div class="form-group">
                        <label>Fecha nacimiento</label> 
                        <p>{{$secretaria->fecha_nacimiento}}</p>
                    </div>
                            </div> 
                                                       <div class="col-md-6">
                                                <div class="form-group">
                        <label>Dirección</label> 
                        <p>{{$secretaria->direccion}}</p>
                    </div>
                            </div> 

                                    <div class="col-md-3">
                            <!-- Email -->
                    <div class="form-group">
                        <label>Email</label>
                        <p>{{$secretaria->user->email}}</p>
                        
                    </div>
  </div>
                    </div>





    </div>
</div>




                    <hr>

                    <div class="row">
                        <div class="col-md">
                            
                    <div class="form-group">
                      <div class="ms-3 mt-3">
<a href="{{route('admin.secretarias.index')}}" class="btn btn-secondary" style="margin-left:20px;">Volver</a>
</div>

                    </div>
                        </div>
                    </div>


                </form>

            </div>

        </div>

    </div>
</div>

@endsection
