<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Certificados</title>

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
        overflow-x: hidden;
        max-width: 100vw;
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
        color: #b91c1c;
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
        min-height: calc(70vh - 120px);
        padding-top: 95px;
        padding-bottom: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f4f6f8;
    }

    .hero-content {
        max-width: 1000px;
        background: #ffffff;
        padding: 30px 38px;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        text-align: center;
    }

    /* TITULOS */
    h1 {
        font-size: 2.0rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 15px;
        margin-top: 0;
        line-height: 1.3;
    }

    h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 24px;
        text-align: center;
    }

    p {
        color: #4b5563;
        line-height: 1.6;
    }

    /* FLUJO DEL SISTEMA */
    .flow-section {
        padding: 60px 0;
        background: #f4f6f8;
    }

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

    /* CTA SECTION MEJORADA */
    .cta-section {
        background: #ffffff;
        padding: 35px 20px;
    }

    .cta-container {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 0.9fr 2.8fr 1fr;
        gap: 40px;
        align-items: center;
        padding: 0 40px;
    }

    /* COLUMNA IZQUIERDA - TÍTULO */
    .cta-left {
        padding-right: 15px;
    }

    .cta-left h2 {
        text-align: left;
        font-size: 1.25rem;
        margin-bottom: 8px;
    }

    .cta-left p {
        color: #6b7280;
        font-size: 0.8rem;
        line-height: 1.4;
    }

    /* COLUMNA CENTRO - CONTACTOS Y REDES */
    .cta-center {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .section-title {
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        color: #b91c1c;
        margin-bottom: 10px;
    }

    .contacts-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 8px 12px;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.25s ease;
        color: #374151;
        font-size: 0.8rem;
        font-weight: 500;
        white-space: nowrap;
    }

    .contact-item:hover {
        background: #fff5f5;
        border-color: #111111;
        color: #353535;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(185, 28, 28, 0.1);
    }

    .contact-icon {
        width: 14px;
        height: 14px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #b91c1c;
        font-size: 0.7rem;
        flex-shrink: 0;
    }

    /* SECCIÓN DE REDES SOCIALES */
    .social-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .social-item {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 8px 12px;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        text-decoration: none;
        color: #111827;
        font-size: 0.8rem;
        font-weight: 500;
        transition: all 0.25s ease;
        white-space: nowrap;
    }

    .social-item:hover {
        background: #eef2ff;
        border-color: #0f0f13;
        transform: translateX(4px);
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.15);
    }

    .github-icon {
        width: 14px;
        height: 14px;
        background: url("https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg") no-repeat center;
        background-size: contain;
        flex-shrink: 0;
    }

    /* COLUMNA DERECHA - LOGO */
    .cta-right {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding-left: 30px;
    }

    .uleam-logo {
        height: 100px !important;
        width: auto !important;
        object-fit: contain;
        margin-right: 20px;
    }

    /* FOOTER */
    footer {
        background: #404142;
        border-top: 1px solid #e5e7eb;
        padding: 20px 24px;
        text-align: center;
        color: #6b7280;
    }

    /* UTILIDADES */
    .container {
        max-width: 1250px;
        margin: 0 auto;
        padding: 0 0px;
        width: 100%;
    }

    .grid {
        display: grid;
        gap: 32px;
        width: 100%;
    }

    .grid-4 {
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    }

    /* RESPONSIVE */
    @media (min-width: 768px) {
        .grid-4 {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    @media (max-width: 992px) {
        .cta-container {
            grid-template-columns: 1fr;
            gap: 32px;
            text-align: center;
        }

        .cta-left h2 {
            text-align: center;
        }

        .cta-center {
            align-items: center;
        }

        .contacts-grid {
            grid-template-columns: 1fr;
            max-width: 400px;
            margin: 0 auto;
        }

        .social-grid {
            grid-template-columns: repeat(3, 1fr);
            max-width: 500px;
            margin: 0 auto;
        }

        .cta-right {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 1.8rem;
        }

        h2 {
            font-size: 1.5rem;
        }

        .hero-content {
            padding: 32px 24px;
        }

        .uleam-logo {
            height: 70px !important;
        }

        .grid-4 {
            grid-template-columns: 1fr;
        }

        .social-grid {
            grid-template-columns: 1fr;
        }
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
            <a href="{{ route('login') }}" class="btn btn-login">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="btn btn-register">Registrarse</a>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-content">
        <h1>
            Gestión de<br>
            Prácticas Preprofesionales
        </h1>

        <p style="max-width:620px;margin:0 auto 32px;">
            Sistema institucional para el registro, validación y emisión
            de certificados de prácticas preprofesionales universitarias de la ULEAM.
        </p>

        <img 
            src="{{ asset('imagenes/estudiantes.jpg') }}" 
            alt="Estudiantes con certificados"
            style="width: 100%; max-width: 750px; height: auto; border-radius: 12px; margin-bottom: 18px; display: block; box-shadow: 0 4px 20px rgba(0,0,0,0.1);"
        >

        <div style="text-align: center; padding-bottom: 10px; padding-top: 18px;">
            <a href="{{ route('register') }}" class="btn btn-register">Crear cuenta</a>
        </div>
    </div>
</section>

<!-- FLUJO -->
<section class="flow-section">
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
    <div class="cta-container">
        
        <!-- IZQUIERDA: Título y descripción -->
        <div class="cta-left">
            <h2>Plataforma institucional</h2>
            <p>Desarrollado para la gestión académica universitaria</p>
        </div>

        <!-- CENTRO: Contactos y redes sociales -->
        <div class="cta-center">
            <div>
                <h4 class="section-title">Contáctanos</h4>
                <div class="contacts-grid">
                    <a class="contact-item" href="mailto:e1314183896@live.uleam.edu.ec">
                        <span class="contact-icon">✉</span>
                        <span>e1314183896@live.uleam.edu.ec</span>
                    </a>
                    <a class="contact-item" href="mailto:e1315108926@live.uleam.edu.ec">
                        <span class="contact-icon">✉</span>
                        <span>e1315108926@live.uleam.edu.ec</span>
                    </a>
                    <a class="contact-item" href="mailto:e1316749314@live.uleam.edu.ec">
                        <span class="contact-icon">✉</span>
                        <span>e1316749314@live.uleam.edu.ec</span>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="section-title">Síguenos en GitHub</h4>
                <div class="social-grid">
                    <a class="social-item" href="https://github.com/Gregorio1723" target="_blank">
                        <span class="github-icon"></span>
                        <span>Gregorio1723</span>
                    </a>
                    <a class="social-item" href="https://github.com/JoseAMendieta19" target="_blank">
                        <span class="github-icon"></span>
                        <span>JoseAMendieta19</span>
                    </a>
                    <a class="social-item" href="https://github.com/JonySenges" target="_blank">
                        <span class="github-icon"></span>
                        <span>JonySenges</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- DERECHA: Logo ULEAM -->
        <div class="cta-right">
            <img
                src="https://aulavirtualmoodle.uleam.edu.ec/pluginfile.php/1/core_admin/logo/0x200/1767816587/logo_ULEAM_2017_vertical.png"
                alt="Logo ULEAM"
                class="uleam-logo"
            >
        </div>

    </div>
</section>

<!-- FOOTER -->
<footer>
    <p style="font-size:0.75rem;color:#9ca3af;">
        © Todos los derechos reservados - Universidad Laica Eloy Alfaro de Manabí
    </p>
</footer>

</body>
</html>