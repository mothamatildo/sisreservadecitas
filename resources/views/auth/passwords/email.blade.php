@extends('layouts.app')

@section('content')

<style>
body{
    background: url('{{ asset("assets/veterinaria.jpg") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.reset-container{
    min-height: 85vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.glass-card{
    width:500px;
    padding:40px;
    border-radius:25px;
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(15px);
    border:1px solid rgba(255,255,255,.25);
    box-shadow:0 20px 40px rgba(0,0,0,.25);
}

.glass-card h1,
.glass-card p,
.glass-card label{
    color:white;
}

.form-control{
    border-radius:12px;
}

.btn-reset{
    background:linear-gradient(
        90deg,
        #2563eb,
        #10b981
    );
    border:none;
    border-radius:50px;
    color:white;
    font-weight:600;
    padding:12px;
}

.btn-reset:hover{
    color:white;
    opacity:.9;
}

.login-link{
    color:#ffd43b;
    text-decoration:none;
    font-weight:bold;
}
</style>

<div class="container">

    <div class="reset-container">

        <div class="glass-card">

            <div class="text-center mb-4">

                <h1>🔐 Recuperar Contraseña</h1>

                <p>
                    Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
                </p>

            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-4">

                    <label>Correo Electrónico</label>

                    <input id="email"
                           type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email"
                           value="{{ old('email') }}"
                           required>

                    @error('email')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <button type="submit"
                        class="btn btn-reset w-100">
                    Enviar enlace de recuperación
                </button>

                <div class="text-center mt-4 text-white">

                    ¿Recordaste tu contraseña?

                    <br>

                    <a href="{{ route('login') }}"
                       class="login-link">
                        Iniciar Sesión
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection