@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-md-12">
        <h1>Registro de un nuevo horario</h1>
    </div>
</div>

<hr>

<div class="row">

<div class="col-md-4">

    <div class="card card-outline card-primary">

        <div class="card-header">
            <h3 class="card-title">Llene los datos</h3>
        </div>

        <div class="card-body">

            <form action="{{ url('/admin/horarios') }}" method="POST">
                @csrf

                               <div class="form-group">
                    <label>Consultorios *</label>

                    <select name="consultorio_id" id="consultorio_select" class="form-control" required>
                        <option value="">Seleccionar consultorio</option>
                        @foreach($consultorios as $consultorio)
                            <option value="{{ $consultorio->id }}">
                                {{ $consultorio->nombre }}
                                - {{ $consultorio->ubicacion }}
                            </option>
                        @endforeach
                    </select>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const consultorioSelect = document.getElementById('consultorio_select');
    const consultorioInfo = document.getElementById('consultorio_info');

    consultorioSelect.addEventListener('change', function () {

        const consultorioId = this.value;

        if (!consultorioId) {
            consultorioInfo.innerHTML = '';
            return;
        }

        let url = "{{ route('admin.horarios.cargar_datos_consultorios', ':id') }}";
        url = url.replace(':id', consultorioId);

        consultorioInfo.innerHTML = `
            <div class="text-center p-3">
                <i class="fas fa-spinner fa-spin"></i>
                Cargando horarios...
            </div>
        `;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }

                return response.text();
            })
            .then(data => {
                consultorioInfo.innerHTML = data;
            })
            .catch(error => {
                console.error(error);

                consultorioInfo.innerHTML = `
                    <div class="alert alert-danger">
                        Error al cargar los horarios del consultorio.
                    </div>
                `;
            });

    });

});
</script>
                </div>

                <div class="form-group">
                    <label>Doctores *</label>

                    <select name="doctor_id" class="form-control" required>
                        @foreach($doctores as $doctor)
                            <option value="{{ $doctor->id }}">
                                {{ $doctor->nombres }}
                                {{ $doctor->apellidos }}
                                - {{ $doctor->especialidad }}
                            </option>
                        @endforeach
                    </select>
                </div>

 

                <div class="form-group">
                    <label>Día *</label>

                    <select name="dia" class="form-control" required>
                        <option value="LUNES">LUNES</option>
                        <option value="MARTES">MARTES</option>
                        <option value="MIERCOLES">MIERCOLES</option>
                        <option value="JUEVES">JUEVES</option>
                        <option value="VIERNES">VIERNES</option>
                        <option value="SABADO">SABADO</option>
                        <option value="DOMINGO">DOMINGO</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Hora Inicio *</label>

                    <div class="input-group date"
                         id="timepicker_inicio"
                         data-target-input="nearest">

                        <input type="text"
                               name="hora_inicio"
                               class="form-control datetimepicker-input"
                               data-target="#timepicker_inicio"
                               required>

                        <div class="input-group-append"
                             data-target="#timepicker_inicio"
                             data-toggle="datetimepicker">
                            <div class="input-group-text">
                                <i class="far fa-clock"></i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label>Hora Final *</label>

                    <div class="input-group date"
                         id="timepicker_fin"
                         data-target-input="nearest">

                        <input type="text"
                               name="hora_fin"
                               class="form-control datetimepicker-input"
                               data-target="#timepicker_fin"
                               required>

                        <div class="input-group-append"
                             data-target="#timepicker_fin"
                             data-toggle="datetimepicker">
                            <div class="input-group-text">
                                <i class="far fa-clock"></i>
                            </div>
                        </div>

                    </div>
                </div>

                <br>

                <a href="{{ url('/admin/horarios') }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>

                <button type="submit"
                        class="btn btn-primary">
                    Registrar nuevo
                </button>

            </form>

        </div>

    </div>

</div>

<style>
.table-horarios{
    font-size:12px;
    table-layout:fixed;
    width:100%;
}

.table-horarios th{
    text-align:center;
    vertical-align:middle;
    background-color:#f4f6f9;
    font-weight:bold;
}

.table-horarios td{
    text-align:center;
    vertical-align:middle;
    height:45px;
    overflow:hidden;
    word-wrap:break-word;
}

.table-horarios th:first-child,
.table-horarios td:first-child{
    width:100px;
}

.table-responsive{
    overflow-x:auto;
}
</style>

<div class="col-md-8">

    <div class="card card-outline card-primary">

        <div class="card-header">
            <h3 class="card-title">Horarios registrados</h3>
        </div>
<div class="card-body">

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Por favor, corrige los siguientes errores:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/admin/horarios') }}" method="POST">
    </div>

</div>

<script>
$(function () {

    $('#timepicker_inicio').datetimepicker({
        format: 'HH:mm'
    });

    $('#timepicker_fin').datetimepicker({
        format: 'HH:mm'
    });

});
</script>

@endsection
