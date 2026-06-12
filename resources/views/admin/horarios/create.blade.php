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
                    <label>Consultorios *</label>

                    <select name="consultorio_id" class="form-control" required>
                        @foreach($consultorios as $consultorio)
                            <option value="{{ $consultorio->id }}">
                                {{ $consultorio->nombre }}
                                - {{ $consultorio->ubicacion }}
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

<div class="col-md-8">

 <table class="table table-bordered table-sm table-horarios">

        <thead>
        <tr>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sábado</th>
            <th>Domingo</th>
        </tr>
        </thead>

        <tbody>

        @php
            $dias = [
                'LUNES',
                'MARTES',
                'MIERCOLES',
                'JUEVES',
                'VIERNES',
                'SABADO',
                'DOMINGO'
            ];
        @endphp

        @foreach($horas as $hora)

        <tr>

            <td>
                {{ substr($hora['inicio'],0,5) }}
                -
                {{ substr($hora['fin'],0,5) }}
            </td>

            @foreach($dias as $dia)

<td>

@php
    $encontrado = false;
@endphp

@foreach($horarios as $horario)

    @if(
        trim($horario->dia) == trim($dia) &&
        $horario->hora_inicio <= $hora['inicio'] &&
        $horario->hora_fin >= $hora['fin']
    )

{{ $horario->doctor->nombres.' '.$horario->doctor->apellidos }}

        @php
            $encontrado = true;
        @endphp

    @endif

@endforeach

@if(!$encontrado)
    -
@endif

</td>

            @endforeach

        </tr>

        @endforeach

        </tbody>

    </table>

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
