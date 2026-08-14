@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Historial clínico</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Historiales registrados</h3>

                <div class="card-tools">
                    <a href="{{ route('admin.historiales.create') }}"
                       class="btn btn-primary">
                        Registrar historial
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
                            <th>Fecha</th>
                            <th>Motivo de consulta</th>
                            <th>Diagnóstico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $contador = 1; ?>

                        @foreach($historiales as $historial)

                            <tr>

                                <td>{{ $contador++ }}</td>

                                <td>
                                    {{ $historial->paciente->nombres }}
                                    {{ $historial->paciente->apellidos }}
                                </td>

                                <td>
                                    {{ $historial->fecha }}
                                </td>

                                <td>
                                    {{ $historial->motivo_consulta }}
                                </td>

                                <td>
                                    {{ $historial->diagnostico ?? 'Sin diagnóstico' }}
                                </td>

                                <td style="text-align:center">

                                    <div class="btn-group">

                                        <a href="{{ route('admin.historiales.show', $historial->id) }}"
                                           class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.historiales.edit', $historial->id) }}"
                                           class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('admin.historiales.destroy', $historial->id) }}"
                                              method="POST"
                                              style="display:inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Desea eliminar este historial clínico?')">
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

@endsection