<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mi Amigo Fiel 🐾</title>

    <link rel="icon" href="{{ asset('assets/favicon.ico') }}" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <style>
        /* 🎨 PALETA PRO */
        :root {
            --azul: #0d6efd;
            --azul-oscuro: #0b5ed7;
            --gris: #6c757d;
            --gris-claro: #f8f9fa;
        }

        /* HERO CON IMAGEN */
        header {
            background: linear-gradient(rgba(13,110,253,0.7), rgba(13,110,253,0.7)),
            url("{{ asset('assets/veterinaria.jpg') }}");
            background-size: cover;
            background-position: center;
            color: white;
        }

        /* NAVBAR */
        .navbar {
            background-color: #212529 !important;
        }

        /* BOTONES */
        .btn-primary {
            background-color: var(--azul);
            border: none;
        }

        .btn-primary:hover {
            background-color: var(--azul-oscuro);
        }

        /* CARDS */
        .service-card {
            border-radius: 15px;
            transition: 0.3s;
            border: none;
            background: white;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 10px 25px rgba(0,0,0,0.15);
        }

        /* ICONOS */
        .icon {
            font-size: 40px;
            color: var(--azul);
            margin-bottom: 10px;
        }

        /* SECCIÓN CTA */
        .cta {
            background: linear-gradient(45deg, #0d6efd, #6ea8fe);
            color: white;
            border-radius: 15px;
            padding: 40px;
        }

        /* FOOTER */
        footer {
            background: #212529;
        }
    </style>
</head>

<body id="page-top">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container px-4">
        <a class="navbar-brand" href="#">🐾 Mi Amigo Fiel</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a class="nav-link" href="#about">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>

                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-primary ms-3">
                        Iniciar Sesión
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<header class="text-center" style="padding: 160px 0;">
    <div class="container">
        <h1 class="fw-bold">Clínica Veterinaria 🐶🐱</h1>
        <p class="lead">Cuidamos la salud de tu mascota con tecnología y amor</p>
        <a href="{{ route('login') }}" class="btn btn-light btn-lg mt-3">
            Agendar Cita
        </a>
    </div>
</header>

<!-- NOSOTROS -->
<section id="about" class="py-5 text-center">
    <div class="container">
        <h2 class="mb-3">¿Quiénes somos?</h2>
        <p class="lead text-muted">
            Somos una clínica veterinaria moderna con atención profesional,
            dedicada al bienestar de tus mascotas.
        </p>
    </div>
</section>

<!-- SERVICIOS -->
<section id="services" class="bg-light py-5">
    <div class="container text-center">
        <h2 class="mb-5">Nuestros Servicios</h2>

        <div class="row">

            <div class="col-md-4">
                <div class="card service-card p-4">
                    <div class="icon">🐶</div>
                    <h4>Consulta</h4>
                    <p class="text-muted">Diagnóstico y revisión médica profesional.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card p-4">
                    <div class="icon">💉</div>
                    <h4>Vacunación</h4>
                    <p class="text-muted">Protección completa contra enfermedades.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card p-4">
                    <div class="icon">🛁</div>
                    <h4>Estética</h4>
                    <p class="text-muted">Baño, corte y cuidado integral.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5">
    <div class="container text-center">
        <div class="cta">
            <h3>Agenda tu cita hoy 🐾</h3>
            <p>No dejes la salud de tu mascota para después</p>
            <a href="{{ route('login') }}" class="btn btn-light">
                Ir al sistema
            </a>
        </div>
    </div>
</section>

<!-- CONTACTO -->
<section id="contact" class="py-5 text-center">
    <div class="container">
        <h2>Contacto</h2>
        <p class="text-muted">📍 Bogotá, Colombia</p>
        <p>📞 +57 300 000 0000</p>
        <p>📧 contacto@miamigofiel.com</p>
    </div>
</section>

<!-- FOOTER -->
<footer class="text-white text-center py-4">
    <p>© 2026 Mi Amigo Fiel - Sistema Veterinario</p>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/scripts.js') }}"></script>

</body>
</html>