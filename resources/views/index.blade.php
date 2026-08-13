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
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;

background:
linear-gradient(
rgba(0,0,0,0.25),
rgba(0,0,0,0.25)
),
url("{{ asset('assets/veterinaria.jpg') }}");

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;

    color: white;
}
        

        /* NAVBAR */
.navbar{
    background: linear-gradient(
        90deg,
        #0d6efd,
        #20c997
    ) !important;

    box-shadow: 0 4px 15px rgba(0,0,0,.15);
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
        /* ANIMACIONES */
html{
    scroll-behavior:smooth;
}

/* NAVBAR MODERNO */
/* NAVBAR MODERNO */
.navbar{
    background: linear-gradient(
        90deg,
        #0d6efd,
        #20c997
    ) !important;

    backdrop-filter: blur(10px);
    box-shadow: 0 4px 15px rgba(0,0,0,.15);
}
/* ESTADISTICAS */
.stats-box{
    padding:25px;
    border-radius:15px;
    background:white;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
    transition:.3s;
}

.stats-box:hover{
    transform:translateY(-5px);
}

/* GALERIA */
.gallery img{
    width:100%;
    height:280px;
    object-fit:cover;
    border-radius:20px;
    transition:0.4s;
    box-shadow:0 8px 20px rgba(0,0,0,.15);
}

.gallery img:hover{
    transform:scale(1.05);
}

/* WHATSAPP */
.whatsapp{
    position:fixed;
    width:60px;
    height:60px;
    bottom:20px;
    right:20px;
    background:#25D366;
    color:white;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:30px;
    text-decoration:none;
    z-index:9999;
    box-shadow:0 5px 15px rgba(0,0,0,.3);
}
    </style>
</head>

<link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">

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
<!-- HERO -->
<header class="text-center">
    <div class="container">

      

  


        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-light btn-lg me-3">
                📅 Agendar Cita
            </a>

            <a href="#services" class="btn btn-outline-light btn-lg">
                Ver Servicios
            </a>
        </div>

    </div>
</header>
<section class="py-5 bg-white">
    <div class="container">
    <div class="row text-center">

        <div class="col-md-3 mb-3">
            <div class="stats-box">
                <h2 class="counter text-primary" data-target="2500">0</h2>
                <p>Mascotas Atendidas</p>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="stats-box">
                <h2 class="counter text-primary" data-target="120">0</h2>
                <p>Veterinarios</p>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="stats-box">
                <h2 class="counter text-primary" data-target="8500">0</h2>
                <p>Citas Realizadas</p>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="stats-box">
                <h2 class="counter text-primary" data-target="15">0</h2>
                <p>Años de Experiencia</p>
            </div>
        </div>

    </div>
</div>
  
</section>

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

<section class="py-5 bg-primary text-white">
    <div class="container text-center">

        <h2 class="mb-5">¿Por qué elegir Mi Amigo Fiel?</h2>

        <div class="row">

            <div class="col-md-4">
                <h4>🐾 Atención Personalizada</h4>
                <p>Cuidamos cada mascota como si fuera parte de nuestra familia.</p>
            </div>

            <div class="col-md-4">
                <h4>🏥 Tecnología Moderna</h4>
                <p>Contamos con herramientas para diagnósticos precisos.</p>
            </div>

            <div class="col-md-4">
                <h4>⏰ Atención Rápida</h4>
                <p>Agenda tus citas en línea de forma sencilla y segura.</p>
            </div>

        </div>

    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Nuestro Equipo Médico</h2>

        <div class="row">

            <div class="col-md-4">
                <div class="card service-card p-4 text-center">
                    <img src="{{ asset('assets/doc1.jpg') }}"
                         class="rounded-circle mx-auto mb-3"
                         width="120">

                    <h4>Dra. María López</h4>
                    <p>Medicina General Veterinaria</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card p-4 text-center">
                    <img src="{{ asset('assets/doc2.jpg') }}"
                         class="rounded-circle mx-auto mb-3"
                         width="120">

                    <h4>Dr. Carlos Ruiz</h4>
                    <p>Cirugía Veterinaria</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card p-4 text-center">
                    <img src="{{ asset('assets/doc3.jpg') }}"
                         class="rounded-circle mx-auto mb-3"
                         width="120">

                    <h4>Dra. Ana Gómez</h4>
                    <p>Dermatología Veterinaria</p>
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

<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5">Lo que dicen nuestros clientes</h2>

        <div class="row">

            <div class="col-md-4">
                <div class="card p-4">
                    ⭐⭐⭐⭐⭐
                    <p>"Excelente atención para mi perro Max."</p>
                    <strong>María Gómez</strong>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4">
                    ⭐⭐⭐⭐⭐
                    <p>"El sistema de citas es muy fácil de usar."</p>
                    <strong>Carlos Pérez</strong>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4">
                    ⭐⭐⭐⭐⭐
                    <p>"Muy buenos profesionales."</p>
                    <strong>Ana Rodríguez</strong>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-5 gallery bg-light">
    <div class="container">

        <div class="text-center mb-5">
        

            <h2 class="fw-bold mt-3">
                Nuestros Pacientes Felices
            </h2>

            <p class="text-muted">
                Conoce algunas de las mascotas que han confiado en nosotros.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">
                <img src="{{ asset('assets/galeria1.jpg') }}"
                     alt="Mascota feliz">
            </div>

            <div class="col-lg-3 col-md-6">
                <img src="{{ asset('assets/galeria2.jpg') }}"
                     alt="Mascota feliz">
            </div>

            <div class="col-lg-3 col-md-6">
                <img src="{{ asset('assets/galeria3.jpg') }}"
                     alt="Mascota feliz">
            </div>

            <div class="col-lg-3 col-md-6">
                <img src="{{ asset('assets/galeria4.jpg') }}"
                     alt="Mascota feliz">
            </div>

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

<a href="https://wa.me/573001234567"
   class="whatsapp"
   target="_blank">
   💬
</a>

-<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration:1000,
    once:true
});

const counters=document.querySelectorAll('.counter');

counters.forEach(counter=>{

    const updateCounter=()=>{

        const target=+counter.getAttribute('data-target');
        const count=+counter.innerText;

        const increment=target/100;

        if(count<target){
            counter.innerText=Math.ceil(count+increment);
            setTimeout(updateCounter,20);
        }else{
            counter.innerText=target+"+";
        }
    };

    updateCounter();

});
</script>
</body>
</html>