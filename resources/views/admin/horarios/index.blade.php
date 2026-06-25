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
      <div class="row">
        <div class="col-md-4">
           <h3 class="card-title">Calendario atención de doctores</h3>
        </div>
        <div class="col-md-4">
          <div style="float:right">
            <label for="">Consultorios</label>
          </div>
            
                 
          
        </div>
        <div class="col-md-4">
             <select name="consultorio_id" id="consultorio_select" class="form-control" required>
                        @foreach($consultorios as $consultorio)
                            <option value="{{ $consultorio->id }}">
                                {{ $consultorio->nombre }}
                                - {{ $consultorio->ubicacion }}
                            </option>
                        @endforeach
                    </select>

        </div>
        
      </div>

      </dv>
      <div class="card-body">


        <script>
          $('#consultorio_select').on('change', function() {
          var consultorio_id = $('#consultorio_select').val();
          var url = "{{route('admin.horarios.cargar_datos_consultorios',':id')}}";
          url = url.replace(':id',consultorio_id);

          if(consultorio_id){
            $.ajax({
              url: url,
              type: 'GET',
              success:function (data) {
                $('#consultorio_info').html (data);
              },
             error: function (){
              alert ('Error al obtener los datos del consultorio');
             }              
            });
          }else{
            $('#consultorio_info').html ('');
          } 
          });
        </script>
        <hr>
        <div id="consultorio_info">

        </div>
        
   

</div>

@endsection