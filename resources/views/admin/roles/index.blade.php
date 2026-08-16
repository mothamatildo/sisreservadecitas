@extends('layouts.admin')

@section('content')

<div class="row">
    <h1>Listado de roles</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Roles registrados</h3>

                <div class="card-tools">
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i>
                        Crear nuevo rol
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
                            <td><b>Nro</b></td>
                            <td><b>Nombre</b></td>
                            <td><b>Descripción</b></td>
                            <td style="text-align:center"><b>Estado</b></td>
                            <td style="text-align:center"><b>Acciones</b></td>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $contador = 1; ?>

                        @foreach($roles as $rol)

                        <tr>

                            <td>{{ $contador++ }}</td>

                            <td>
                                {{ $rol->nombre }}
                            </td>

                            <td>
                                {{ $rol->descripcion ?? 'Sin descripción' }}
                            </td>

                            <td style="text-align:center">

                                @if($rol->estado == 'Activo')

                                    <span class="badge badge-success">
                                        {{ $rol->estado }}
                                    </span>

                                @else

                                    <span class="badge badge-danger">
                                        {{ $rol->estado }}
                                    </span>

                                @endif

                            </td>

                            <td style="text-align:center">

                                <div class="btn-group">

                                    <a href="{{ route('admin.roles.show', $rol->id) }}"
                                       class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.roles.edit', $rol->id) }}"
                                       class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('admin.roles.destroy', $rol->id) }}"
                                          method="POST"
                                          style="display:inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Está seguro de eliminar este rol?')">

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
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
            "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
            "infoFiltered": "(Filtrado de _MAX_ total Roles)",
            "lengthMenu": "Mostrar _MENU_ Roles",
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