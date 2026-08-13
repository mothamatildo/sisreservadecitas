@extends('layouts.app')

@section('content')

<style>
body{
    background: url('{{ asset("assets/veterinaria.jpg") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.register-container{
    min-height: 85vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.glass-card{
    width: 500px;
    padding: 40px;
    border-radius: 25px;
    background: rgba(255,255,255,.15);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255,255,255,.25);
    box-shadow: 0 20px 40px rgba(0,0,0,.25);
}

.glass-card h1,
.glass-card p,
.glass-card label{
    color: white;
}

.form-control{
    border-radius: 12px;
}

.btn-register{
    background: linear-gradient(
        90deg,
        #2563eb,
        #10b981
    );
    border: none;
    border-radius: 50px;
    color: white;
    font-weight: 600;
    padding: 12px;
}

.btn-register:hover{
    color: white;
    opacity: .9;
}

.login-link{
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.login-link:hover{
    color: #f8f9fa;
}
</style>

<div class="container">

    <div class="register-container">

        <div class="glass-card">

            <div class="text-center mb-4">
                <h1>🐾 Mi Amigo Fiel</h1>
                <p>Crear Cuenta</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label>Nombre Completo</label>

                    <input id="name"
                           type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name"
                           value="{{ old('name') }}"
                           required>

                    @error('name')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
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

                <div class="mb-3">
                    <label>Contraseña</label>

                    <input id="password"
                           type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password"
                           required>

                    @error('password')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label>Confirmar Contraseña</label>

                    <input id="password-confirm"
                           type="password"
                           class="form-control"
                           name="password_confirmation"
                           required>
                </div>

                <button type="submit"
                        class="btn btn-register w-100">
                    Crear Cuenta
                </button>

                <div class="text-center mt-4 text-white">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}" class="login-link">
                        Inicia sesión aquí
                    </a>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection