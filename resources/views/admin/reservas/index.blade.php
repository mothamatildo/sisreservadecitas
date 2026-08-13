@extends('layouts.admin')

@section('content')

<div class="row">
    <h1>Listado de reservas</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Reservas registradas</h3>

                <div class="card-tools">
                    <a href="{{ route('admin.reservas.create') }}" class="btn btn-primary">
                        Registrar nueva
                    </a>
                </div>
            </div>

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table id="example1" class="table table-striped table-bordered table-hover table-sm">

                    <thead style="background-color:cornflowerblue">
                        <tr>
                            <td><b>Nro</b></td>
                            <td><b>Paciente</b></td>
                            <td style="text-align:center"><b>Doctor</b></td>
                            <td style="text-align:center"><b>Consultorio</b></td>
                            <td style="text-align:center"><b>Fecha</b></td>
                            <td style="text-align:center"><b>Hora</b></td>
                            <td style="text-align:center"><b>Estado</b></td>
                            <td style="text-align:center"><b>Acciones</b></td>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $contador = 1; ?>

                        @foreach ($reservas as $reserva)

                            <tr>

                                <td>{{ $contador++ }}</td>

                                <td>
                                    {{ $reserva->paciente->nombres }}
                                    {{ $reserva->paciente->apellidos }}
                                </td>

                                <td style="text-align:center">
                                    {{ $reserva->doctor->nombres }}
                                    {{ $reserva->doctor->apellidos }}
                                </td>

                                <td style="text-align:center">
                                    {{ $reserva->consultorio->nombre }}
                                </td>

                                <td style="text-align:center">
                                    {{ $reserva->fecha }}
                                </td>

                                <td style="text-align:center">
                                    {{ $reserva->hora }}
                                </td>

                                <td style="text-align:center">
                                    <span class="badge bg-warning">
                                        {{ $reserva->estado }}
                                    </span>
                                </td>

                                <td style="text-align:center">

                                    <div class="btn-group">

                                        <a href="{{ route('admin.reservas.show', $reserva->id) }}"
                                           class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.reservas.edit', $reserva->id) }}"
                                           class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('admin.reservas.destroy', $reserva->id) }}"
                                              method="POST"
                                              style="display:inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Está seguro de eliminar esta reserva?')">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

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
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ Reservas",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
                                "infoFiltered": "(Filtrado de _MAX_ total Reservas)",
                                "lengthMenu": "Mostrar _MENU_ Reservas",
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
                                    buttons: [
                                        'copy',
                                        'pdf',
                                        'csv',
                                        'excel',
                                        'print'
                                    ]
                                },
                                {
                                    extend: 'colvis',
                                    text: 'Visor de columnas'
                                }
                            ]

                        }).buttons().container().appendTo(
                            '#example1_wrapper .col-md-6:eq(0)'
                        );

                    });
                </script>

            </div>

        </div>

    </div>
</div>

@endsection