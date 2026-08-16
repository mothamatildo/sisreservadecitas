@extends('layouts.admin')

@section('content')

<div class="row">
    <h1>Detalle del pago</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Información del pago</h3>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
                        <strong>Paciente:</strong>
                        <p>
                            {{ $pago->reserva->paciente->nombres }}
                            {{ $pago->reserva->paciente->apellidos }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <strong>Doctor:</strong>
                        <p>
                            {{ $pago->reserva->doctor->nombres }}
                            {{ $pago->reserva->doctor->apellidos }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <strong>Consultorio:</strong>
                        <p>
                            {{ $pago->reserva->consultorio->nombre }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <strong>Fecha de la reserva:</strong>
                        <p>
                            {{ $pago->reserva->fecha }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <strong>Hora de la reserva:</strong>
                        <p>
                            {{ $pago->reserva->hora }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <strong>Valor del pago:</strong>
                        <p>
                            ${{ number_format($pago->valor, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <strong>Método de pago:</strong>
                        <p>
                            {{ $pago->metodo_pago }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <strong>Fecha de pago:</strong>
                        <p>
                            {{ $pago->fecha_pago }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <strong>Estado:</strong>

                        <p>
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
                        </p>
                    </div>

                    <div class="col-md-12">
                        <strong>Observaciones:</strong>

                        <p>
                            {{ $pago->observaciones ?? 'Sin observaciones' }}
                        </p>
                    </div>

                </div>

                <hr>

                <a href="{{ route('admin.pagos.index') }}"
                   class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>
                    Volver

                </a>

                <a href="{{ route('admin.pagos.edit', $pago->id) }}"
                   class="btn btn-success">

                    <i class="bi bi-pencil"></i>
                    Editar

                </a>

            </div>

        </div>

    </div>
</div>

@endsection