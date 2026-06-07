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
      <td><b>Doctor</b></td>
      <td style="text-align:center"><b>Especialidad</b></td>
      <td style="text-align:center"><b>Consultorio</b></td>
      <td style="text-align:center"><b>Dia de atención</b></td>
      <td style="text-align:center"><b>Hora incio</b></td>
      <td style="text-align:center"><b>Hora fin</b></td>
      <td style="text-align:center"><b>Acciones</b></td>
    </tr>
  </thead>

  <tbody>
    <?php $contador = 1; ?>

    @foreach ($horarios as $horario)
<tr>
    <td>{{$contador++}}</td>
    <td>{{$horario->doctor->nombres ." ".$horario->doctor->apellidos}}</td>   
    <td>{{$horario->doctor->especialidad}}</td> 
    <td>{{$horario->consultorio->nombre." Ubicaión: ".$horario->consultorio->ubicacion}}</td> 
    <td>{{$horario->dia}}</td>
    <td style="text-align:center">{{$horario->hora_inicio}}</td>
    <td style="text-align:center">{{$horario->hora_fin}}</td>


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
<br>

<div class="col-md-12">
      <div class="card card-outline card-primary">
      <dv class="card-header">
        <h3 class="card-title">Calendario atención de doctores</h3>
      </dv>
      <div class="card-body">
        <table style= "text-align: center" class="table  table-striped table-hover table-sm table-bordered">
          <thead>
            <tr style="text-align: center">
              <th>Hora</th>
              <th>Lunes</th>
              <th>Martes</th>
              <th>Miercoles</th>
              <th>Jueves</th>
              <th>Viernes</th>
              <th>Sabado</th>
              <th>Domingo</th>
            </tr>
          </thead>

          <tbody>
          @php
          $horas = ['08:00:00 - 09:00:00','09:00:00 - 10:00:00','10:00:00 - 11:00:00','11:00:00 - 12:00:00','12:00:00 - 13:00:00',
          '13:00:00 - 14:00:00','14:00:00 - 15:00:00','15:00:00 - 16:00:00','16:00:00 - 17:00:00','17:00:00 - 18:00:00','18:00:00 - 19:00:00','19:00:00 - 20:00:00']; 
          $diasSemana = ['LUNES','MARTES','MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
          @endphp
          @foreach($horas as $hora)
@php
list($hora_inicio,$hora_fin) = explode (' - ',$hora);
@endphp

          <tr>
            <td>{{$hora}}</td>
            @foreach ($diasSemana as $dia)
            @php
            $nombre_doctor = '';
            foreach ($horarios as $horario){
              if (strtoupper($horario->dia) == $dia &&
              $hora_inicio >= $horario->hora_inicio &&
              $hora_fin <= $horario->hora_fin ) {
              $nombre_doctor = $horario->doctor->nombres. " ".$horario->doctor->apellidos; 
              break;
              }
            }
            @endphp
                  <td>{{$nombre_doctor}}</td>
            @endforeach
      

          </tr>
          @endforeach  
          </tbody>
        </table>
    

</div>

@endsection