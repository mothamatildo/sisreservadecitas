@extends('layouts.admin')

@section('content')

<div class="row">
    <h1>Editar pago</h1>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">Modificar datos del pago</h3>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Por favor, revise los siguientes errores:</strong>

                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.pagos.update', $pago->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- RESERVA --}}
                        <div class="col-md-12">

                            <div class="form-group">

                                <label for="reserva_id">
                                    Reserva
                                </label>

                                <select name="reserva_id"
                                        id="reserva_id"
                                        class="form-control"
                                        required>

                                    <option value="">
                                        Seleccione una reserva
                                    </option>

                                    @foreach($reservas as $reserva)

                                        <option value="{{ $reserva->id }}"
                                            {{ old('reserva_id', $pago->reserva_id) == $reserva->id ? 'selected' : '' }}>

                                            Reserva #{{ $reserva->id }}
                                            -
                                            {{ $reserva->paciente->nombres }}
                                            {{ $reserva->paciente->apellidos }}
                                            -
                                            {{ $reserva->fecha }}
                                            -
                                            {{ $reserva->hora }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>


                        {{-- VALOR --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="valor">
                                    Valor del pago
                                </label>

                                <input type="number"
                                       name="valor"
                                       id="valor"
                                       class="form-control"
                                       value="{{ old('valor', $pago->valor) }}"
                                       min="0"
                                       step="0.01"
                                       required>

                            </div>

                        </div>


                        {{-- MÉTODO DE PAGO --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="metodo_pago">
                                    Método de pago
                                </label>

                                <select name="metodo_pago"
                                        id="metodo_pago"
                                        class="form-control"
                                        required>

                                    <option value="">
                                        Seleccione un método
                                    </option>

                                    <option value="Efectivo"
                                        {{ old('metodo_pago', $pago->metodo_pago) == 'Efectivo' ? 'selected' : '' }}>
                                        Efectivo
                                    </option>

                                    <option value="Tarjeta"
                                        {{ old('metodo_pago', $pago->metodo_pago) == 'Tarjeta' ? 'selected' : '' }}>
                                        Tarjeta
                                    </option>

                                    <option value="Transferencia"
                                        {{ old('metodo_pago', $pago->metodo_pago) == 'Transferencia' ? 'selected' : '' }}>
                                        Transferencia
                                    </option>

                                    <option value="Nequi"
                                        {{ old('metodo_pago', $pago->metodo_pago) == 'Nequi' ? 'selected' : '' }}>
                                        Nequi
                                    </option>

                                    <option value="Daviplata"
                                        {{ old('metodo_pago', $pago->metodo_pago) == 'Daviplata' ? 'selected' : '' }}>
                                        Daviplata
                                    </option>

                                </select>

                            </div>

                        </div>


                        {{-- FECHA --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="fecha_pago">
                                    Fecha de pago
                                </label>

                                <input type="date"
                                       name="fecha_pago"
                                       id="fecha_pago"
                                       class="form-control"
                                       value="{{ old('fecha_pago', $pago->fecha_pago) }}"
                                       required>

                            </div>

                        </div>


                        {{-- ESTADO --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="estado">
                                    Estado
                                </label>

                                <select name="estado"
                                        id="estado"
                                        class="form-control"
                                        required>

                                    <option value="Pendiente"
                                        {{ old('estado', $pago->estado) == 'Pendiente' ? 'selected' : '' }}>
                                        Pendiente
                                    </option>

                                    <option value="Pagado"
                                        {{ old('estado', $pago->estado) == 'Pagado' ? 'selected' : '' }}>
                                        Pagado
                                    </option>

                                    <option value="Anulado"
                                        {{ old('estado', $pago->estado) == 'Anulado' ? 'selected' : '' }}>
                                        Anulado
                                    </option>

                                </select>

                            </div>

                        </div>


                        {{-- OBSERVACIONES --}}
                        <div class="col-md-12">

                            <div class="form-group">

                                <label for="observaciones">
                                    Observaciones
                                </label>

                                <textarea name="observaciones"
                                          id="observaciones"
                                          class="form-control"
                                          rows="4"
                                          placeholder="Observaciones del pago">{{ old('observaciones', $pago->observaciones) }}</textarea>

                            </div>

                        </div>

                    </div>


                    {{-- BOTONES --}}
                    <div class="row">

                        <div class="col-md-12">

                            <a href="{{ route('admin.pagos.index') }}"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Cancelar

                            </a>

                            <button type="submit"
                                    class="btn btn-success">

                                <i class="bi bi-pencil"></i>
                                Actualizar pago

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection