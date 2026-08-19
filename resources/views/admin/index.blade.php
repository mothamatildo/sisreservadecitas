@extends('layouts.admin')

@section('content')

<div class="row">
    <h1>Panel principal</h1>
</div>

<hr>

<div class="row">

    {{-- USUARIOS --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $total_usuarios }}</h3>
                <p>Usuarios</p>
            </div>

            <div class="icon">
                <i class="ion fas bi bi-file-person"></i>
            </div>

            <a href="{{ url('admin/usuarios') }}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    {{-- SECRETARIAS --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $total_secretarias }}</h3>
                <p>Secretarias</p>
            </div>

            <div class="icon">
                <i class="ion fas bi bi-person-circle"></i>
            </div>

            <a href="{{ url('admin/secretarias') }}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    {{-- PACIENTES --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $total_pacientes }}</h3>
                <p>Pacientes</p>
            </div>

            <div class="icon">
                <i class="ion fas bi bi-person-check-fill"></i>
            </div>

            <a href="{{ url('admin/pacientes') }}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    {{-- CONSULTORIOS --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $total_consultorios }}</h3>
                <p>Consultorios</p>
            </div>

            <div class="icon">
                <i class="ion fas bi bi-building-add"></i>
            </div>

            <a href="{{ url('admin/consultorios') }}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    {{-- DOCTORES --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $total_doctores }}</h3>
                <p>Doctores</p>
            </div>

            <div class="icon">
                <i class="ion fas bi bi-person-lines-fill"></i>
            </div>

            <a href="{{ url('admin/doctores') }}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    {{-- HORARIOS --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $total_horarios }}</h3>
                <p>Horarios</p>
            </div>

            <div class="icon">
                <i class="ion fas bi bi-calendar-week"></i>
            </div>

            <a href="{{ url('admin/horarios') }}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    {{-- RESERVAS --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $total_reservas }}</h3>
                <p>Reservas</p>
            </div>

            <div class="icon">
                <i class="ion fas bi bi-calendar-check"></i>
            </div>

            <a href="{{ url('admin/reservas') }}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    {{-- HISTORIAL CLÍNICO --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3>{{ $total_historiales }}</h3>
                <p>Historial clínico</p>
            </div>

            <div class="icon">
                <i class="ion fas bi bi-file-medical"></i>
            </div>

            <a href="{{ url('admin/historiales') }}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    {{-- PAGOS --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $total_pagos }}</h3>
                <p>Pagos</p>
            </div>

            <div class="icon">
                <i class="ion fas bi bi-cash-coin"></i>
            </div>

            <a href="{{ url('admin/pagos') }}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    {{-- REPORTES --}}
<div class="col-lg-3 col-6">
    <div class="small-box bg-danger">

        <div class="inner">
            <h3>
                <i class="fas fa-chart-bar"></i>
            </h3>

            <p>Reportes</p>
        </div>

        <div class="icon">
            <i class="fas fa-chart-pie"></i>
        </div>

        <a href="{{ route('admin.reportes.index') }}"
           class="small-box-footer">

            Más información
            <i class="fas fa-arrow-circle-right"></i>

        </a>

    </div>
</div>

    <div class="col-lg-3 col-6">

    <div class="small-box bg-secondary">

        <div class="inner">

            <h3>{{ $total_roles }}</h3>

            <p>Roles</p>

        </div>

        <div class="icon">

            <i class="ion fas fa-user-shield"></i>

        </div>

        <a href="{{ url('roles') }}"
           class="small-box-footer">

            Más información
            <i class="fas fa-arrow-circle-right"></i>

        </a>

    </div>

</div>

</div>

@endsection