@extends('layouts.admin')

@section('content')

<div class="row">
    <h1>Listado de pagos</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Pagos registrados</h3>

                <div class="card-tools">
                    <a href="{{ route('admin.pagos.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i>
                        Registrar nuevo pago
                    </a>
                </div>
            </div>

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table id="example1"
                       class="table table-striped table-bordered table-hover table-sm">

                    <thead style="background-color:cornflowerblue">
                        <tr>
                            <th>Nro</th>
                            <th>Paciente</th>
                            <th>Doctor</th>
                            <th>Consultorio</th>
                            <th class="text-center">Valor</th>
                            <th class="text-center">Método de pago</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php
                            $contador = 1;
                        @endphp

                        @foreach($pagos as $pago)

                        <tr>

                            <td>{{ $contador++ }}</td>

                            <td>
                                {{ $pago->reserva->paciente->nombres }}
                                {{ $pago->reserva->paciente->apellidos }}
                            </td>

                            <td>
                                {{ $pago->reserva->doctor->nombres }}
                                {{ $pago->reserva->doctor->apellidos }}
                            </td>

                            <td>
                                {{ $pago->reserva->consultorio->nombre }}
                            </td>

                            <td class="text-center">
                                ${{ number_format($pago->valor, 0, ',', '.') }}
                            </td>

                            <td class="text-center">
                                {{ $pago->metodo_pago }}
                            </td>

                            <td class="text-center">
                                {{ $pago->fecha_pago }}
                            </td>

                            <td class="text-center">

                                @if($pago->estado == 'Pagado')

                                    <span class="badge badge-success">
                                        {{ $pago->estado }}
                                    </span>

                                @elseif($pago->estado == 'Pendiente')

                                    <span class="badge badge-warning">
                                        {{ $pago->estado }}
                                    </span>

                                @else

                                    <span class="badge badge-danger">
                                        {{ $pago->estado }}
                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <div class="btn-group">

                                    <a href="{{ route('admin.pagos.show', $pago->id) }}"
                                       class="btn btn-info btn-sm"
                                       title="Ver pago">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.pagos.edit', $pago->id) }}"
                                       class="btn btn-success btn-sm"
                                       title="Editar pago">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('admin.pagos.destroy', $pago->id) }}"
                                          method="POST"
                                          style="display:inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Eliminar pago"
                                                onclick="return confirm('¿Está seguro de eliminar este pago?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

<script>
$(function () {

    $("#example1").DataTable({

        "pageLength": 5,

        "language": {
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Pagos",
            "infoEmpty": "Mostrando 0 a 0 de 0 Pagos",
            "infoFiltered": "(Filtrado de _MAX_ total Pagos)",
            "lengthMenu": "Mostrar _MENU_ Pagos",
            "search": "Buscador:",
            "zeroRecords": "Sin resultados encontrados",

            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },

        responsive: false,
        lengthChange: true,
        autoWidth: false,

        columnDefs: [
            {
                orderable: false,
                targets: -1
            }
        ],

        buttons: [
            {
                extend: 'collection',
                text: 'Reportes',
                buttons: ['copy', 'pdf', 'csv', 'excel', 'print']
            },
            {
                extend: 'colvis',
                text: 'Visor de columnas'
            }
        ]

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

});
</script>

@endsection