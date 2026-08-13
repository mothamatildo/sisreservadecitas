@extends('layouts.app')

@section('content')

<style>
    .text-warning{
    color:#ffd43b !important;
}

.text-warning:hover{
    color:#ffec99 !important;
}

.text-white{
    color:white !important;
}

body{
    background:url('{{ asset("assets/veterinaria.jpg") }}');
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    min-height:100vh;
}

.login-container{
    min-height:85vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.glass-card{
    width:450px;
    padding:40px;
    border-radius:25px;

    background:rgba(255,255,255,.15);

    backdrop-filter:blur(15px);

    border:1px solid rgba(255,255,255,.25);

    box-shadow:0 20px 40px rgba(0,0,0,.25);
}

.glass-card h1{
    color:white;
    font-weight:700;
}

.glass-card p{
    color:white;
    opacity:.9;
}

.glass-card label{
    color:white;
}

.form-control{
    border-radius:12px;
}

.btn-login{
    background:linear-gradient(
        90deg,
        #2563eb,
        #10b981
    );

    border:none;
    border-radius:50px;
    color:white;
    padding:12px;
    font-weight:600;
}

.btn-login:hover{
    color:white;
    opacity:.9;
}
</style>

<div class="container">

    <div class="login-container">

        <div class="glass-card">

            <div class="text-center mb-4">

                <h1>🐾 Mi Amigo Fiel</h1>

                <p>
                    Sistema de Gestión Veterinaria
                </p>

            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">

                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Contraseña</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>

                </div>

                <div class="form-check mb-4">

                    <input class="form-check-input"
                           type="checkbox"
                           name="remember">

                    <label class="form-check-label">
                        Recordarme
                    </label>

                </div>

                <button class="btn btn-login w-100">
                    Iniciar Sesión
                </button>
                <div class="text-center mt-4">

    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}"
           class="text-decoration-none text-white">
            ¿Olvidaste tu contraseña?
        </a>
    @endif

    <hr class="my-3 text-white">

    <span class="text-white">
        ¿No tienes una cuenta?
    </span>

    <br>

    <a href="{{ route('register') }}"
       class="fw-bold text-warning text-decoration-none">
        Crear una cuenta
    </a>

</div>

            </form>

        </div>

    </div>

</div>

@endsection