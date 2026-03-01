@extends('layouts.admin')
@section('content')
<div class="row">
     <h1>Listado de usuarios</h1>

</div>
    <hr>
<div class="row">

  <div class="col-md-10">
            <div class="card card-outline card-primary">
              <dv class="card-header">
                <h3 class="card-title">Usuarios registrados</h3>
             <div class="card-tools">
                  <a href="{{asset('admin/usuarios/create')}}" class="btn btn-primary">
                   Registrar nuevo
                  </a>
                </div>
                <!-- /.card-tools -->
              </dv>
              <!-- /.card-header -->
              <div class="card-body">
               
                                  <table class="table table-striped table-bordered table-hover table-sm">
  <thead style="background-color:cornflowerblue">
    <tr>
      <td><b>Nro</b></td>
      <td><b>Nombre</b></td>
      <td><b>Email</b></td>
      <td><b>Acciones</b></td>
    </tr>
  </thead>

  <tbody>
    <?php $contador = 1; ?>

    @foreach ($usuarios as $usuario)

<tr>
    <td>{{$contador++}}</td>
    <td>{{$usuario->name}}</td>   
    <td>{{$usuario->email}}</td> 
    <td>
      ver / editar / borrar
    </td>
</tr> 
@endforeach  

  </tbody>
</table>
              
              </div>

            </div>
            <!-- /.card -->
          </div>



    

</div>

@endsection

