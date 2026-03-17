@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Paciente: {{$paciente->nombres}} {{$paciente->apellidos}}</h1>
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
                        <label>Nombres</label> 
                     <p>{{$paciente->nombres}}</p>
                    </div>
                    </div>


                    <!-- Email -->
                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Apellidos</label>
                         <p>{{$paciente->apellidos}}</p>
                    
                    </div>
                    </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>CC</label> 
                         <p>{{$paciente->cc}}</p>
                    </div>
                    </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Nro de seguro</label>
                         <p>{{$paciente->nro_seguro}}</p>

                    </div>
                    </div>







                  </div>

                  <div class="row">
                    
                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Fecha de nacimiento</label>
                         <p>{{$paciente->fecha_nacimiento}}</p>
                    </div>
                    </div>

                                                            <div class="col-md-3">
                                            <div class="form-group">
                        <label>Género</label>
                                        <p>
                                            @if ($paciente->genero=='M') MASCULINO @else FEMENINO @endif                                       
                                        </p>

                    </div>
                    </div>

                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Celular</label>
  <p>{{$paciente->celular}}</p>
                    </div>

       
                    </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Correo</label> 
  <p>{{$paciente->correo}}</p>
                    </div>

       
                    </div>

            


                    



                  </div>
                  <div class="row">
                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                        <label>Dirección</label>
  <p>{{$paciente->direccion}}</p>
                    </div>
                    </div>

                                                            <div class="col-md-3">
                                            <div class="form-group">
                        <label>Grupo Sanguineo</label>
  <p>{{$paciente->grupo_sanguineo}}</p>

                    </div>
                    </div>

                    
                                        <div class="col-md-3">
                                            <div class="form-group">
                        <label>Alergias</label> 
  <p>{{$paciente->alergias}}</p>
                    </div>
                    </div>

                    <div class="col-md-3">
                                            <div class="form-group">
                        <label>Contacto de emergencia</label>
                          <p>{{$paciente->contacto_emergencia}}</p>
                    </div>

       
                    </div>

                                        <div class="col-md-9">
                                            <div class="form-group">
                        <label>Observaciones</label>
  <p>{{$paciente->observaciones}}</p>
                    </div>

       
                    </div>

            


                    



                  </div>






                    <hr>

                    <div class="form-group">
                        <a href="{{ url('admin/pacientes') }}" class="btn btn-secondary">
                            Volver
                        </a>

                  
                    </div>

              

            </div>

        </div>

    </div>
</div>

@endsection
