<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Estudiante</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
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

        /* NAVBAR SUPERIOR */
        .student-navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: #ffffff;
            border-bottom: 2px solid #d1d5db;
            z-index: 100;
            height: 70px;
        }

        .navbar-content {
            max-width: 100%;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .navbar-brand span {
            font-size: 1.1rem;
            font-weight: 600;
            color: #b91c1c;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: 0 2px 8px rgba(185, 28, 28, 0.2);
        }

        .user-details h4 {
            font-size: 0.9rem;
            font-weight: 600;
            color: #1f2937;
        }

        .user-details p {
            font-size: 0.75rem;
            color: #6b7280;
        }

        .btn-logout {
            padding: 8px 18px;
            background: transparent;
            color: #b91c1c;
            border: 1px solid #b91c1c;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-logout:hover {
            background: #b91c1c;
            color: #ffffff;
        }

        /* SIDEBAR LATERAL */
        .sidebar {
            position: fixed;
            top: 70px;
            left: 0;
            width: 260px;
            height: calc(100vh - 70px);
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }

        .sidebar-nav {
            padding: 24px 16px;
        }

        .nav-section {
            margin-bottom: 28px;
        }

        .nav-section-title {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #9ca3af;
            padding: 0 12px;
            margin-bottom: 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 14px;
            margin-bottom: 4px;
            border-radius: 8px;
            text-decoration: none;
            color: #4b5563;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            background: #fef2f2;
            color: #b91c1c;
        }

        .nav-link.active {
            background: #b91c1c;
            color: #ffffff;
        }

        .nav-link svg {
            width: 20px;
            height: 20px;
            margin-right: 12px;
        }

        .nav-divider {
            height: 1px;
            background: #e5e7eb;
            margin: 20px 0;
        }

        /* CONTENIDO PRINCIPAL */
        .main-content {
            margin-left: 260px;
            margin-top: 70px;
            min-height: calc(100vh - 70px);
            padding: 32px;
        }

        .content-header {
            margin-bottom: 32px;
        }

        .content-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
        }

        .content-header p {
            color: #6b7280;
            font-size: 0.95rem;
        }

        /* ALERTAS */
        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.9rem;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        /* MOBILE */
        .mobile-menu-btn {
            display: none;
            padding: 8px;
            background: transparent;
            border: none;
            cursor: pointer;
            color: #4b5563;
        }

        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 90;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu-btn {
                display: block;
            }

            .user-details {
                display: none;
            }
        }

        /* TÍTULO SECCIÓN */
        .section-title {
            color: #111827;
            margin-bottom: 24px;
            font-size: 1.5rem;
            font-weight: 700;
        }

        /* ACORDEÓN DE PRÁCTICAS */
        .practicas-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .practica-accordion {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .practica-accordion:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        .practica-header {
            background: #fafafa;
            padding: 20px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            border-bottom: 1px solid #e5e7eb;
            transition: all 0.2s ease;
        }

        .practica-header:hover {
            background: #f9fafb;
        }

        .practica-title {
            display: flex;
            align-items: center;
            gap: 16px;
            flex: 1;
        }

        .practica-title h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #111827;
            margin: 0;
        }

        .status-indicator {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .status-badge.aprobada {
            background: #d1fae5;
            color: #065f46;
        }

        .status-badge.pendiente {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-badge.rechazada {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-badge.asignada {
            background: #e0e7ff;
            color: #4338ca;
        }

        .toggle-icon {
            color: #6b7280;
            font-size: 1.2rem;
            transition: transform 0.3s ease;
            font-weight: bold;
        }

        .toggle-icon.open {
            transform: rotate(180deg);
        }

        /* CONTENIDO DE PRÁCTICA */
        .practica-content {
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.4s ease;
        }

        .practica-content.open {
            padding: 28px;
            max-height: 2000px;
        }

        /* NUEVA ESTRUCTURA DE 2 COLUMNAS */
        .practica-body {
            display: grid;
            grid-template-columns: 1.7fr 1.3fr;
            gap: 20px;
            align-items: start;
        }

        .practica-info-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* BLOQUES DE INFORMACIÓN REDISEÑADOS */
        .info-section-block {
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
        }

        .section-block-header {
            background-color: #f5f6f8;
            padding: 14px 18px;
            border-bottom: 2.2px solid #1f2937;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-block-icon {
            font-size: 1.2rem;
        }

        .section-block-title {
            font-weight: 650;
            font-size: 0.95rem;
            color: #1f1a1a;
            /* text-transform: uppercase; */
            letter-spacing: 0.03em;
            padding-left: 15px;
        }

        .section-block-content {
            padding: 16px;
            background: #ffffff;
        }

        .info-row {
            display: flex;
            padding: 10px 0;
            border-bottom: 1px solid #f3f4f6;
            padding-left: 17px;
        }

        .info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-row:first-child {
            padding-top: 0;
        }

        .info-row-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #6b7280;
            min-width: 100px;
            flex-shrink: 0;
        }

        .info-row-value {
            font-size: 0.9rem;
            color: #1f2937;
            font-weight: 500;
        }

        /* GRID DETALLES */
        .detalles-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .detalle-card {
            background: linear-gradient(135deg, #fafafa 0%, #ffffff 100%);
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px;
            text-align: center;
            transition: all 0.2s ease;
        }

        .detalle-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(185, 28, 28, 0.1);
            border-color: #fca5a5;
        }

        .detalle-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 8px;
            display: block;
        }

        .detalle-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: #b91c1c;
            display: block;
        }

        /* OBSERVACIONES */
        .observaciones-box {
            background: linear-gradient(135deg, #fef2f2 0%, #ffffff 100%);
            border-left: 4px solid #b91c1c;
            padding: 16px 18px;
            border-radius: 6px;
            margin: 0;
            border: 1px solid #fecaca;
            border-left-width: 4px;
        }

        .observaciones-text {
            font-size: 0.9rem;
            color: #7f1d1d;
            line-height: 1.6;
            font-style: italic;
        }

        /* ACCIONES */
        .acciones-container {
            background: linear-gradient(135deg, #fafafa 0%, #ffffff 100%);
            border-radius: 12px;
            padding: 24px;
            border: 2px solid #e5e7eb;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .status-message {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 18px;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .status-message svg {
            width: 22px;
            height: 22px;
            flex-shrink: 0;
        }

        .status-message.warning {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e3a8a;
            border: 2px solid #3b82f6;
        }

        .status-message.success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border: 2px solid #10b981;
        }

        .status-message.error {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            border: 2px solid #ef4444;
        }

        .actions-row {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* BOTONES */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 22px;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-primary {
            background: #b91c1c;
            color: white;
        }

        .btn-primary:hover {
            background: #991b1b;
        }

        .btn-secondary {
            background: #374151;
            color: white;
        }

        .btn-secondary:hover {
            background: #1f2937;
        }

        .btn-success {
            background: #024ee8;
            color: white;
        }

        .btn-success:hover {
            background: #024ee8;
        }

        .btn svg {
            width: 18px;
            height: 18px;
        }

        /* FORMULARIO DE SUBIDA */
        .upload-form {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
        }

        .form-row {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
        }

        .form-input {
            padding: 12px 16px;
            border: 1.5px solid #d1d5db;
            border-radius: 6px;
            font-size: 0.9rem;
            background: white;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #b91c1c;
            box-shadow: 0 0 0 3px rgba(185, 28, 28, 0.1);
        }

        /* ESTADO VACÍO */
        .empty-state {
            text-align: center;
            padding: 80px 32px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .empty-state-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .empty-state-icon svg {
            width: 40px;
            height: 40px;
            color: #b91c1c;
        }

        .empty-state h4 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 0.95rem;
            color: #6b7280;
        }

        @media (max-width: 768px) {
            .practica-body {
                grid-template-columns: 1fr;
            }

            .acciones-container {
                position: static;
            }

            .detalles-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .actions-row {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .practica-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .status-indicator {
                width: 100%;
                justify-content: space-between;
            }

            .practica-title {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>
</head>

<body x-data="{ 
    sidebarOpen: false,
    openPracticas: [],
    togglePractica(id) {
        if (this.openPracticas.includes(id)) {
            this.openPracticas = this.openPracticas.filter(p => p !== id);
        } else {
            this.openPracticas.push(id);
        }
    },
    isPracticaOpen(id) {
        return this.openPracticas.includes(id);
    }
}">

    <!-- NAVBAR SUPERIOR -->
    <nav class="student-navbar">
        <div class="navbar-content">
            <div class="navbar-brand">
                <button @click="sidebarOpen = !sidebarOpen" class="mobile-menu-btn">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <a href="{{ route('estudiante.dashboard') }}" style="display: flex; align-items: center; text-decoration: none;">
                    <img src="https://aulavirtualmoodle.uleam.edu.ec/pluginfile.php/1/core_admin/logo/0x200/1767816587/logo_ULEAM_2017_vertical.png" alt="ULEAM" style="height: 45px; width: auto;">
                </a>
                <span>Portal del Estudiante</span>
            </div>

            <div class="navbar-user">
                <div class="user-info">
                    <div class="user-details">
                        <h4>{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</h4>
                        <p>Estudiante</p>
                    </div>
                    <div class="user-avatar">
                        {{ substr(Auth::user()->nombres, 0, 1) }}{{ substr(Auth::user()->apellidos, 0, 1) }}
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- SIDEBAR -->
    <aside class="sidebar" :class="sidebarOpen ? 'open' : ''" @click.away="sidebarOpen = false">
        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">Principal</div>
                
                <a href="{{ route('estudiante.dashboard') }}" 
                   class="nav-link {{ request()->routeIs('estudiante.dashboard') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('estudiante.practicas') }}" 
                   class="nav-link {{ request()->routeIs('estudiante.practicas') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Mis Prácticas
                </a>

                <a href="{{ route('estudiante.certificados') }}" 
   class="nav-link {{ request()->routeIs('estudiante.certificados') ? 'active' : '' }}">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
    </svg>
    Certificados
</a>
            </div>

            <div class="nav-divider"></div>

            <div class="nav-section">
                <div class="nav-section-title">Cuenta</div>

                <a href="{{ route('estudiante.perfil') }}" 
                   class="nav-link {{ request()->routeIs('estudiante.perfil') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Mi Perfil
                </a>
            </div>
        </nav>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main-content">
        <!-- Alertas -->
        @if(session('success'))
            <div class="alert alert-success">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
        @endif

        <!-- Contenedor de Prácticas -->
        <div class="practicas-container">
            <h2 class="section-title">Mis Prácticas Profesionales</h2>

            @php
                $practicas = Auth::user()->practicas;
            @endphp

            @forelse($practicas as $practica)
                <div class="practica-accordion">
                    <!-- HEADER -->
                    <div class="practica-header" @click="togglePractica({{ $practica->id }})">
                        <div class="practica-title">
                            <h3>Práctica {{ $practica->tipo }}</h3>
                        </div>
                        <div class="status-indicator">
                            <span class="status-badge 
                                @if($practica->estado === 'aprobada') aprobada
                                @elseif($practica->estado === 'pendiente_revision') pendiente
                                @elseif($practica->estado === 'rechazada') rechazada
                                @else asignada @endif">
                                @if($practica->estado === 'aprobada') Aprobada
                                @elseif($practica->estado === 'pendiente_revision') En Revisión
                                @elseif($practica->estado === 'rechazada') Rechazada
                                @else {{ ucfirst($practica->estado) }}
                                @endif
                            </span>
                            <span class="toggle-icon" :class="isPracticaOpen({{ $practica->id }}) ? 'open' : ''">
                                ▼
                            </span>
                        </div>
                    </div>

                    <!-- CONTENIDO -->
                    <div class="practica-content" :class="isPracticaOpen({{ $practica->id }}) ? 'open' : ''">
                        <!-- Grid de 2 columnas: info + acciones -->
                        <div class="practica-body">
                            <!-- COLUMNA IZQUIERDA: Información -->
                            <div class="practica-info-section">
                                <!-- Estudiante -->
                                <!-- <div class="info-section-block">
                                    <div class="section-block-header">
                                        <span class="section-block-title">Estudiante</span>
                                    </div>
                                    <div class="section-block-content">
                                        <div class="info-row">
                                            <span class="info-row-label">Nombre:</span>
                                            <span class="info-row-value">{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-row-label">Cédula:</span>
                                            <span class="info-row-value">{{ Auth::user()->cedula }}</span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-row-label">Correo:</span>
                                            <span class="info-row-value">{{ Auth::user()->email }}</span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-row-label">Institución:</span>
                                            <span class="info-row-value">
                                                {{ Auth::user()->institucion->nombre ?? 'No asignada' }}
                                            </span>
                                        </div>

                                        <div class="info-row">
                                            <span class="info-row-label">Carrera:</span>
                                            <span class="info-row-value">
                                                {{ Auth::user()->carrera->nombre ?? 'No asignada' }}
                                            </span>
                                        </div>

                                    </div>
                                </div> -->

                                <!-- Detalles de la Práctica -->
                                <div class="info-section-block">
                                    <div class="section-block-header">
                                        <span class="section-block-title">Detalles de la Práctica</span>
                                    </div>
                                    <div class="section-block-content">
                                        <div class="info-row">
                                            <span class="info-row-label">Institución:</span>
                                            <span class="info-row-value">{{ $practica->lugarPractica->nombre ?? 'N/A' }}</span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-row-label">Dirección:</span>
                                            <span class="info-row-value">{{ $practica->lugarPractica->direccion ?? 'N/A' }}</span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-row-label">Teléfono:</span>
                                            <span class="info-row-value">{{ $practica->lugarPractica->telefono ?? 'N/A' }}</span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-row-label">Correo:</span>
                                            <span class="info-row-value">{{ $practica->lugarPractica->email ?? 'N/A' }}</span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-row-label">Periodo:</span>
                                            <span class="info-row-value">{{ $practica->anio_lectivo ?? 'N/A' }}</span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-row-label">Horas:</span>
                                            <span class="info-row-value">{{ $practica->horas_requeridas ?? 'N/A' }} hrs</span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-row-label">Desde:</span>
                                            <span class="info-row-value">
                                                {{ $practica->fecha_inicio ? $practica->fecha_inicio->format('d/m/Y') : 'N/A' }}
                                            </span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-row-label">Hasta:</span>
                                            <span class="info-row-value">
                                                {{ $practica->fecha_finalizacion 
                                                    ? \Carbon\Carbon::parse($practica->fecha_finalizacion)->format('d/m/Y') 
                                                    : 'Pendiente' 
                                                }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                               <!-- Observaciones -->
                                @if($practica->observaciones)
                                    <div class="info-section-block">
                                        <div class="section-block-content">
                                            <div class="info-row">
                                                <span class="info-row-label">Observación:</span>
                                                <span class="info-row-value">
                                                    {{ $practica->observaciones }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>

                            <!-- COLUMNA DERECHA: Acciones -->
                            <div class="acciones-container">
                                @if($practica->estado === 'asignada')
                                    <form action="{{ route('estudiante.practica.subir', $practica->id) }}" 
                                        method="POST" 
                                        enctype="multipart/form-data"
                                        class="upload-form">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label class="form-label">Fecha de Finalización</label>
                                                <input type="date" 
                                                    name="fecha_finalizacion" 
                                                    required
                                                    max="{{ date('Y-m-d') }}"
                                                    class="form-input">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Subir Certificado (PDF)</label>
                                                <input type="file" 
                                                    name="archivo" 
                                                    accept=".pdf"
                                                    required
                                                    class="form-input">
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                                </svg>
                                                Enviar
                                            </button>
                                        </div>
                                    </form>

                                @elseif($practica->estado === 'pendiente_revision')
                                    <div class="status-message warning">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>Documento en revisión por el administrador</span>
                                    </div>

                                @elseif($practica->estado === 'aprobada')
                                    <div class="status-message success">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>¡Práctica aprobada exitosamente!</span>
                                    </div>
                                    
                                    <div class="actions-row">
                                        <a href="{{ route('certificado.vista', $practica) }}" 
                                           target="_blank"
                                           class="btn btn-secondary">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Ver Certificado
                                        </a>
                                        
                                        <a href="{{ route('certificado.descargar', $practica) }}" 
                                           class="btn btn-success">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            Descargar PDF
                                        </a>
                                    </div>

                                @elseif($practica->estado === 'rechazada')
                                    <div class="status-message error">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>Práctica rechazada - Su informe de práctica requiere correcciones. Revise los detalles y proceda con la solicitud de reasignación</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <h4>No tienes prácticas asignadas</h4>
                    <p>El administrador te asignará una práctica pronto</p>
                </div>
            @endforelse
        </div>

    </main>

</body>
</html