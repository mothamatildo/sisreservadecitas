@extends('layouts.admin')
@section('content')

<div class="row">
     <h1>Listado de horarios</h1>
</div>

<hr>

<div class="row">
  <div class="col-md-12">
    <div class="card card-outline card-primary">

      <div class="card-header">
        <h3 class="card-title">Horarios registrados</h3>

        <div class="card-tools">
          <a href="{{asset('admin/horarios/create')}}" class="btn btn-primary">
            Registrar nuevo
          </a>
        </div>
      </div>

      <div class="card-body">

<table id="example1" class="table table-striped table-bordered table-hover table-sm">
  <thead style="background-color:cornflowerblue">
    <tr>
      <td><b>Nro</b></td>
      <td><b>Consultorio</b></td>
      <td style="text-align:center"><b>Ubicación</b></td>
      <td style="text-align:center"><b>Capacidad</b></td>
      <td style="text-align:center"><b>Telefono</b></td>
      <td style="text-align:center"><b>Especialidad</b></td>
      <td style="text-align:center"><b>Estado</b></td>
      <td style="text-align:center"><b>Acciones</b></td>
    </tr>
  </thead>

  <tbody>
    <?php $contador = 1; ?>

    @foreach ($horarios as $horario)
<tr>
    <td>{{$contador++}}</td>
    <td>{{$horario->nombre}}</td>   
    <td>{{$horario->ubicacion}}</td> 
    <td>{{$horario->capacidad}}</td> 
    <td>{{$horario->telefono}}</td>
    <td>{{$horario->especialidad}}</td>
    <td>{{$horario->estado}}</td>


    <!-- 👇 ACCIONES JUSTO DESPUÉS -->
    <td style="text-align: center">
        <div class="btn-group">

            <a href="{{asset('admin/horarios/'.$horario->id)}}" class="btn btn-info btn-sm">
                <i class="bi bi-eye"></i>
            </a>

            <a href="{{asset('admin/horarios/'.$horario->id.'/edit')}}" class="btn btn-success btn-sm">
                <i class="bi bi-pencil"></i>
            </a>

            <a href="{{ asset('admin/horarios/'.$horario->id.'/confirm-delete') }}" 
               class="btn btn-danger btn-sm">
                <i class="bi bi-trash"></i>
            </a>

        </div>
    </td>

</tr> 
@endforeach  

  </tbody>
</table>

<script>
$(function () {
    $("#example1").DataTable({
        "pageLength": 5,
        "language": {
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Horarios",
            "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
            "infoFiltered": "(Filtrado de _MAX_ total Horarios)",
            "lengthMenu": "Mostrar _MENU_ Horarios",
            "search": "Buscador:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },

        // 🔥 IMPORTANTE PARA QUITAR EL BOTÓN (+)
        responsive: false,

        lengthChange: true,
        autoWidth: false,

        columnDefs: [
            { orderable: false, targets: -1 } // desactiva ordenar en Acciones
        ],

        buttons: [
            {
                extend: 'collection',
                text: 'Reportes',
                buttons: ['copy','pdf','csv','excel','print']
            },
            {
                extend: 'colvis',
                text: 'Visor de columnas'
            }
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>

      </div>
    </div>
  </div>
</div>

@endsection