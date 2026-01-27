<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Sistema de Certificados') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }

    body {
        background-color: #f4f6f8;
        color: #1f2937;
    }

    /* NAVBAR */
    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        background: #ffffff;
        border-bottom: 2px solid #d1d5db;
        z-index: 50;
    }

    .nav-link {
        color: #374151;
        text-decoration: none;
        font-weight: 500;
    }

    .nav-link:hover {
        color: #b91c1c; /* rojo ULEAM */
    }

    .btn {
        padding: 8px 22px;
        border-radius: 4px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }

    .btn-login {
        color: #b91c1c;
        border-color: #b91c1c;
        background: transparent;
    }

    .btn-login:hover {
        background: #b91c1c;
        color: #ffffff;
    }

    .btn-register {
        background: #b91c1c;
        color: #ffffff;
        border-color: #b91c1c;
    }

    .btn-register:hover {
        background: #991b1b;
    }

    /* HERO */
    .hero {
        min-height: calc(90vh - 120px); /* resta la navbar */
    padding-top: 90px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f4f6f8;
    }

    .hero-content {
    max-width: 1000px; /* más ancho */
    background: #ffffff;
    padding: 48px 56px; /* menos alto, más cómodo */
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    text-align: center;
}


    /* TITULOS */
    h1 {
        font-size: 2.4rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 20px;
    }

    h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 8px;
        text-align: center;
    }

    p {
        color: #4b5563;
        line-height: 1.6;
    }

    /* FLUJO */
    .flow-step {
        background: #ffffff;
        padding: 28px;
        border-radius: 6px;
        border: 1px solid #e5e7eb;
        text-align: center;
    }

    .flow-number {
        width: 40px;
        height: 40px;
        background: #b91c1c;
        color: white;
        border-radius: 50%;
        margin: 0 auto 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }

/* =========================
   CTA SECTION
========================= */

.cta-section {
    background: #ffffff;
    border-top: 57px solid #f4f6f8;
    padding: 48px 24px;
}

/* GRID PRINCIPAL (si lo usas) */
.cta-grid {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.4fr 1fr 1fr 0.8fr;
    align-items: center;
    gap: 48px;
}

/* CONTENEDOR CTA */
.cta-content {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.3fr 0.4fr 0.7fr;
    align-items: center;
    gap: 40px;
}

.cta-text {
    text-align: left;
}

/* Logo ULEAM */
.uleam-logo {
    height: 110px !important;
    width: auto !important;
    max-height: none !important;
    max-width: none !important;
    object-fit: contain;
}


/* =========================
   CTA EXTRA (CONTACTO / REDES)
========================= */

.cta-extra {
    display: grid;
    grid-template-columns: repeat(2, max-content);
    gap: 48px;
    margin-top: 32px;
}

.cta-block h4 {
    font-size: 0.9rem;
    font-weight: 600;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    color: #1f2937;
    margin-bottom: 14px;
}

/* =========================
   LISTAS
========================= */

.cta-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.cta-list li {
    margin-bottom: 10px;
}

/* LINKS BASE (ÚNICO, SIN DUPLICADOS) */
.cta-list a {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 8px 14px;
    border-radius: 8px;
    font-size: 0.95rem;
    font-weight: 500;
    text-decoration: none;
    border: 1px solid #e5e7eb;
    transition: all 0.25s ease;
}

/* =========================
   TARJETA CORREO
========================= */

.cta-mail {
    background: #f9fafb;
    color: #374151;
}

.cta-mail::before {
    content: "✉";
    width: 28px;
    height: 28px;
    border-radius: 6px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    color: #b91c1c;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
}

.cta-mail:hover {
    background: #fff5f5;
    border-color: #b91c1c;
    color: #b91c1c;
}

/* =========================
   GITHUB
========================= */

.cta-github {
    background: #f8fafc;
    color: #111827;
}

.cta-github::before {
    content: "";
    width: 20px;
    height: 20px;
    background: url("https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg")
        no-repeat center;
    background-size: contain;
}

.cta-github:hover {
    background: #eef2ff;
    border-color: #6366f1;
    transform: translateX(4px);
}

/* =========================
   RESPONSIVE
========================= */

@media (max-width: 768px) {
    .cta-content {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .cta-extra {
        grid-template-columns: 1fr;
        justify-content: center;
    }

    .uleam-logo {
        justify-self: center;
        margin-top: 32px;
    }
    
}






    /* FOOTER */
    footer {
        background: #131513;
        border-top: 1px solid #e5e7eb;
        padding: 32px 24px;
        text-align: center;
        color: #6b7280;
    }

   


    @media (max-width: 768px) {
    .cta-content {
        flex-direction: column;
        text-align: center;
    }

    .cta-text {
        text-align: center;
    }
}


    /* UTILIDADES */
    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 16px;
    }

    .grid {
        display: grid;
        gap: 32px;
    }

    @media (min-width: 768px) {
        .grid-4 {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    .py-24 {
        padding-top: 0px;
        padding-bottom: 10px;
    }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="container" style="display:flex;justify-content:space-between;align-items:center;height:70px;">
        <span style="font-size:1.1rem;font-weight:600;color:#b91c1c;">
            Sistema de Certificados Académicos
        </span>

        <div style="display:flex;gap:14px;align-items:center;">
            @auth
                @if(auth()->user()->rol === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-login">Mi Cuenta</a>
                @elseif(auth()->user()->rol === 'estudiante')
                    <a href="{{ route('estudiante.dashboard') }}" class="btn btn-login">Mi Cuenta</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn btn-login">
                    Iniciar sesión
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-register">
                        Registrarse
                    </a>
                @endif
            @endauth
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-content">
        <h1>
            Gestión de Certificados<br>
            de Prácticas Laborales
        </h1>

        <p style="max-width:620px;margin:0 auto 40px;">
            Sistema institucional para el registro, validación y emisión
            de certificados de prácticas preprofesionales universitarias.
        </p>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-register">
                Crear cuenta
            </a>
        @endif
    </div>
</section>

<!-- FLUJO -->
<section class="py-24">
    <div class="container">
        <h2>Flujo del sistema</h2>

        <div class="grid grid-4">
            <div class="flow-step">
                <div class="flow-number">1</div>
                <h4>Registro del estudiante</h4>
            </div>

            <div class="flow-step">
                <div class="flow-number">2</div>
                <h4>Carga de documentos</h4>
            </div>

            <div class="flow-step">
                <div class="flow-number">3</div>
                <h4>Revisión académica</h4>
            </div>

            <div class="flow-step">
                <div class="flow-number">4</div>
                <h4>Emisión del certificado</h4>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="cta-grid">

        <!-- Plataforma -->
        <div class="cta-col">
            <h2>Plataforma institucional</h2>
            <p>Desarrollado para la gestión académica universitaria</p>
        </div>

        <!-- Contacto -->
        <div class="cta-col">
            <h4>Contáctanos</h4>
            <ul class="cta-list">
                <li><a class="cta-mail" href="mailto:e1314183896@live.uleam.edu.ec">e1314183896@live.uleam.edu.ec</a></li>
                <li><a class="cta-mail" href="mailto:e1315108926@live.uleam.edu.ec">e1315108926@live.uleam.edu.ec</a></li>
                <li><a class="cta-mail" href="mailto:e1316749314@live.uleam.edu.ec">e1316749314@live.uleam.edu.ec</a></li>
            </ul>
        </div>

        <!-- Redes -->
        <div class="cta-col">
            <h4>Síguenos</h4>
            <ul class="cta-list">
                <li><a class="cta-github" href="https://github.com/Gregorio1723" target="_blank">Gregorio1723</a></li>
                <li><a class="cta-github" href="https://github.com/JoseAMendieta19" target="_blank">JoseAMendieta19</a></li>
                <li><a class="cta-github" href="https://github.com/JonySenges" target="_blank">JonySenges</a></li>
            </ul>
        </div>

        <!-- Logo -->
        <div class="cta-col cta-logo">
            <img
    src="https://aulavirtualmoodle.uleam.edu.ec/pluginfile.php/1/core_admin/logo/0x200/1767816587/logo_ULEAM_2017_vertical.png"
    alt="Logo ULEAM"
    class="uleam-logo"
    style="height:70px;width:auto;"
>

        </div>

    </div>
</section>

<!-- FOOTER -->
<footer>
    <p style="font-size:0.85rem;">
        © todos los derechos reservados - Universidad Laica Eloy Alfaro de Manabí
    </p>

    
</footer>

</body>
</html>
