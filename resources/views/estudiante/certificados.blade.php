<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Mis Certificados</title>
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
            background-color: #f5f5f5;
            color: #2c3e50;
        }

        /* NAVBAR SUPERIOR */
        .student-navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: #ffffff;
            border-bottom: 2px solid #e0e0e0;
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
            background: #b91c1c;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .user-details h4 {
            font-size: 0.9rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .user-details p {
            font-size: 0.75rem;
            color: #7f8c8d;
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

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 70px;
            left: 0;
            width: 260px;
            height: calc(100vh - 70px);
            background: #ffffff;
            border-right: 1px solid #e0e0e0;
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
            color: #95a5a6;
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
            color: #34495e;
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
            background: #ecf0f1;
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
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .content-header p {
            color: #7f8c8d;
            font-size: 0.95rem;
        }

        /* MOBILE */
        .mobile-menu-btn {
            display: none;
            padding: 8px;
            background: transparent;
            border: none;
            cursor: pointer;
            color: #34495e;
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

        /* CERTIFICADOS */
        .certificates-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .info-text {
            color: #5a6c7d;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 32px;
            font-weight: 600;
        }

        .certificates-section {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ecf0f1;
        }

        .certificates-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .certificate-item {
            background: white;
            border-radius: 10px;
            padding: 0;
            border: 1px solid #e0e0e0;
            overflow: hidden;
            transition: all 0.2s ease;
        }

        .certificate-item:hover {
            border-color: #b91c1c;
            box-shadow: 0 2px 8px rgba(185, 28, 28, 0.1);
        }

        .certificate-header {
            background: #fafafa;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e0e0e0;
        }

        .certificate-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .certificate-icon {
            width: 40px;
            height: 40px;
            background: #514b4b;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }

        .certificate-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .certificate-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-available {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }

        .status-available::before {
            content: "✅";
            font-size: 0.9em;
        }

        .status-locked {
            background: #f5f5f5;
            color: #7f8c8d;
            border: 1px solid #e0e0e0;
        }

        .status-locked::before {
            content: "🔒";
            font-size: 0.9em;
        }

        .certificate-details {
            padding: 20px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 20px;
        }

        .detail-card {
            background: #fafafa;
            padding: 16px;
            border-radius: 8px;
            border-left: 3px solid #024ee8;
        }

        .detail-label {
            font-size: 0.85rem;
            color: #7f8c8d;
            margin-bottom: 6px;
        }

        .detail-value {
            font-size: 1rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .detail-value.completed {
            color: #059669;
        }

        .certificate-actions {
            padding: 20px;
            background: #fafafa;
            border-top: 1px solid #e0e0e0;
            display: flex;
            gap: 12px;
        }

        .action-btn {
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 1px solid transparent;
        }

        .btn-download {
            background: #b91c1c;
            color: white;
        }

        .btn-download:hover {
            background: #991b1b;
        }

        .btn-view {
            background: white;
            color: #34495e;
            border: 1px solid #d0d0d0;
        }

        .btn-view:hover {
            background: #f8f8f8;
            border-color: #b91c1c;
            color: #b91c1c;
        }

        .btn-disabled {
            background: #f5f5f5;
            color: #95a5a6;
            border: 1px solid #e0e0e0;
            cursor: not-allowed;
        }

        /* PROGRESO */
        .progress-section {
            background: white;
            border-radius: 10px;
            padding: 24px;
            border: 1px solid #e0e0e0;
            margin-bottom: 40px;
        }

        .progress-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 16px;
        }

        .progress-steps {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            margin-bottom: 24px;
        }

        .progress-steps::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            height: 2px;
            background: #e0e0e0;
            z-index: 1;
        }

        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #95a5a6;
            font-weight: 600;
            margin-bottom: 8px;
            border: 2px solid #e0e0e0;
        }

        .step-icon.completed {
            background: #d1fae5;
            color: #065f46;
            border-color: #6ee7b7;
        }

        .step-label {
            font-size: 0.85rem;
            color: #7f8c8d;
            text-align: center;
        }

        .step-status {
            font-size: 0.8rem;
            color: #95a5a6;
            margin-top: 4px;
        }

        .requirements-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .requirement-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            background: #fafafa;
            border-radius: 8px;
        }

        .requirement-icon {
            color: #95a5a6;
        }

        .requirement-icon.completed {
            color: #024ee8;
        }

        .requirement-text {
            font-size: 0.9rem;
            color: #34495e;
        }

        @media (max-width: 768px) {
            .certificate-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .certificate-actions {
                flex-direction: column;
            }

            .progress-steps {
                flex-direction: column;
                align-items: flex-start;
                gap: 24px;
            }

            .progress-steps::before {
                top: 20px;
                left: 20px;
                bottom: 0;
                right: auto;
                width: 2px;
                height: calc(100% - 40px);
            }

            .progress-step {
                flex-direction: row;
                align-items: center;
                gap: 16px;
                width: 100%;
            }

            .step-label {
                text-align: left;
            }
        }
    </style>
</head>
<body x-data="{ sidebarOpen: false }">
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
                <a href="{{ route('estudiante.dashboard') }}" class="nav-link">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('estudiante.practicas') }}" class="nav-link {{ request()->routeIs('estudiante.practicas') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Mis Prácticas
                </a>
                <a href="{{ route('estudiante.certificados') }}" class="nav-link {{ request()->routeIs('estudiante.certificados') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Mis Certificados
                </a>
            </div>
            <div class="nav-divider"></div>
            <div class="nav-section">
                <div class="nav-section-title">Cuenta</div>
                <a href="{{ route('estudiante.perfil') }}" class="nav-link">
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
        <div class="content-header">
            <h1>Mis Certificados</h1>
            <p>Consulta, gestiona y descarga tus certificados de prácticas profesionales.</p>
        </div>

        @php
            $practicaI = Auth::user()->practicas->where('tipo', 'I')->first();
            $practicaII = Auth::user()->practicas->where('tipo', 'II')->first();
            $practicaIAprobada = $practicaI && $practicaI->estado === 'aprobada';
            $practicaIIAprobada = $practicaII && $practicaII->estado === 'aprobada';
            $certificadoDisponible = $practicaIAprobada && $practicaIIAprobada;
        @endphp

        <div class="certificates-container">
            <p class="info-text">
                Para desbloquear tu certificado oficial, debes aprobar tanto la Práctica I como la Práctica II. Revisa tu progreso a continuación.
            </p>

            <!-- Progreso de Certificación -->
            <div class="progress-section">
                <h3 class="progress-title">Progreso de Certificación</h3>
                <div class="progress-steps">
                    <div class="progress-step">
                        <div class="step-icon {{ $practicaIAprobada ? 'completed' : '' }}">
                            {{ $practicaIAprobada ? '✓' : '1' }}
                        </div>
                        <div class="step-label">Práctica I</div>
                        <div class="step-status">
                            @if($practicaIAprobada)
                                ✅ Completada
                            @elseif($practicaI && $practicaI->estado === 'pendiente_revision')
                                ⏳ En revisión
                            @elseif($practicaI && $practicaI->estado === 'asignada')
                                ⏳ En progreso
                            @elseif($practicaI && $practicaI->estado === 'rechazada')
                                ❌ Rechazada
                            @else
                                ❌ Pendiente
                            @endif

                        </div>
                    </div>
                    <div class="progress-step">
                        <div class="step-icon {{ $practicaIIAprobada ? 'completed' : '' }}">
                            {{ $practicaIIAprobada ? '✓' : '2' }}
                        </div>
                        <div class="step-label">Práctica II</div>
                        <div class="step-status">
                            @if($practicaIIAprobada)
                                ✅ Completada
                            @elseif($practicaII && $practicaII->estado === 'pendiente_revision')
                                ⏳ En revisión
                            @elseif($practicaII && $practicaII->estado === 'asignada')
                                ⏳ En progreso
                            @elseif($practicaII && $practicaII->estado === 'rechazada')
                                ❌ Rechazada
                            @else
                                ❌ Pendiente
                            @endif
                        </div>
                    </div>
                    <div class="progress-step">
                        <div class="step-icon {{ $certificadoDisponible ? 'completed' : '' }}">
                            {{ $certificadoDisponible ? '✓' : '3' }}
                        </div>
                        <div class="step-label">Certificado Final</div>
                        <div class="step-status">
                            @if($certificadoDisponible)
                                ✅ Disponible
                            @else
                                🔒 Bloqueado
                            @endif
                        </div>
                    </div>
                </div>
                <div class="requirements-list">
                    <div class="requirement-item">
                        <div class="requirement-icon {{ $practicaIAprobada ? 'completed' : '' }}">
                            {{ $practicaIAprobada ? '✓' : '○' }}
                        </div>
                        <div class="requirement-text">Práctica I aprobada ({{ $practicaI ? $practicaI->horas_requeridas ?? '0' : '0' }} horas)</div>
                    </div>
                    <div class="requirement-item">
                        <div class="requirement-icon {{ $practicaIIAprobada ? 'completed' : '' }}">
                            {{ $practicaIIAprobada ? '✓' : '○' }}
                        </div>
                        <div class="requirement-text">Práctica II aprobada ({{ $practicaII ? $practicaII->horas_requeridas ?? '0' : '0' }} horas)</div>
                    </div>
                    <div class="requirement-item">
                        <div class="requirement-icon {{ $certificadoDisponible ? 'completed' : '' }}">
                            {{ $certificadoDisponible ? '✓' : '○' }}
                        </div>
                        <div class="requirement-text">Ambas prácticas completadas ({{ ($practicaI->horas_requeridas ?? 0) + ($practicaII->horas_requeridas ?? 0) }} horas totales)</div>
                    </div>
                </div>
            </div>

            <!-- Certificados Disponibles -->
            <div class="certificates-section">
                <h3 class="section-title">Certificados Disponibles</h3>
                <div class="certificates-list">
                    <!-- Certificado Práctica I -->
                    <div class="certificate-item">
                        <div class="certificate-header">
                            <div class="certificate-title">
                                <div class="certificate-icon">📄</div>
                                <div class="certificate-name">Certificado Práctica I</div>
                            </div>
                            <span class="certificate-status {{ $practicaIAprobada ? 'status-available' : 'status-locked' }}">
                                {{ $practicaIAprobada ? 'DISPONIBLE' : 'BLOQUEADO' }}
                            </span>
                        </div>
                        <div class="certificate-details">
                            <div class="details-grid">
                                <div class="detail-card">
                                    <div class="detail-label">Estado de la Práctica</div>
                                    <div class="detail-value {{ $practicaIAprobada ? 'completed' : '' }}">
                                        @if($practicaIAprobada)
                                            ✅ Aprobada
                                        @elseif($practicaI)
                                            @if($practicaI->estado === 'pendiente_revision')
                                                ⏳ En revisión
                                            @elseif($practicaI->estado === 'rechazada')
                                                ❌ Rechazada
                                            @else
                                                📋 Asignada
                                            @endif
                                        @else
                                            ⚠️ No asignada
                                        @endif
                                    </div>
                                </div>
                                <div class="detail-card">
                                    <div class="detail-label">Horas Completadas</div>
                                    <div class="detail-value">
                                        {{ $practicaI ? $practicaI->horas_requeridas ?? '0' : '0' }} horas
                                    </div>
                                </div>
                                <div class="detail-card">
                                    <div class="detail-label">Tipo de Práctica</div>
                                    <div class="detail-value">Práctica Profesional I</div>
                                </div>
                            </div>
                        </div>
                        <div class="certificate-actions">
    @if($practicaIAprobada)
        <a href="{{ route('certificado.descargar', $practicaI->id) }}" class="action-btn" style="background: #024ee8; color: white; transition: all 0.2s ease;" 
           onmouseover="this.style.background='#047857'" onmouseout="this.style.background='#059669'"
           onmousedown="this.style.background='#065f46'" onmouseup="this.style.background='#047857'">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            Descargar PDF
        </a>
        <a href="{{ route('certificado.vista', $practicaI->id) }}" target="_blank" rel="noopener noreferrer" class="action-btn" style="background: #f1f5f9; color: #334155; border: 1px solid #cbd5e1; transition: all 0.2s ease;" 
           onmouseover="this.style.background='#e2e8f0'; this.style.color='#1e293b'" onmouseout="this.style.background='#f1f5f9'; this.style.color='#334155'"
           onmousedown="this.style.background='#cbd5e1'; this.style.color='#0f172a'" onmouseup="this.style.background='#e2e8f0'; this.style.color='#1e293b'">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
            Ver Certificado
        </a>
    @else
        <button class="action-btn btn-disabled" disabled>
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
            No disponible
        </button>
    @endif
</div>
                    </div>

                    <!-- Certificado Práctica II -->
                    <div class="certificate-item">
                        <div class="certificate-header">
                            <div class="certificate-title">
                                <div class="certificate-icon">📄</div>
                                <div class="certificate-name">Certificado Práctica II</div>
                            </div>
                            <span class="certificate-status {{ $practicaIIAprobada ? 'status-available' : 'status-locked' }}">
                                {{ $practicaIIAprobada ? 'DISPONIBLE' : 'BLOQUEADO' }}
                            </span>
                        </div>
                        <div class="certificate-details">
                            <div class="details-grid"><div class="detail-card">
                                    <div class="detail-label">Estado de la Práctica</div>
                                    <div class="detail-value {{ $practicaIIAprobada ? 'completed' : '' }}">
                                        @if($practicaIIAprobada)
                                            ✅ Aprobada
                                        @elseif($practicaII)
                                            @if($practicaII->estado === 'pendiente_revision')
                                                ⏳ En revisión
                                            @elseif($practicaII->estado === 'rechazada')
                                                ❌ Rechazada
                                            @else
                                                📋 Asignada
                                            @endif
                                        @else
                                            ⚠️ No asignada
                                        @endif
                                    </div>
                                </div>
                                <div class="detail-card">
                                    <div class="detail-label">Horas Completadas</div>
                                    <div class="detail-value">
                                        {{ $practicaII ? $practicaII->horas_requeridas ?? '0' : '0' }} horas
                                    </div>
                                </div>
                                <div class="detail-card">
                                    <div class="detail-label">Tipo de Práctica</div>
                                    <div class="detail-value">Práctica Profesional II</div>
                                </div>
                            </div>
                        </div>
                        <div class="certificate-actions">
    @if($practicaIIAprobada)
        <a href="{{ route('certificado.descargar', $practicaII->id) }}" class="action-btn" style="background: #024ee8; color: white; transition: all 0.2s ease;" 
           onmouseover="this.style.background='#047857'" onmouseout="this.style.background='#059669'"
           onmousedown="this.style.background='#065f46'" onmouseup="this.style.background='#047857'">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            Descargar PDF
        </a>
        <a href="{{ route('certificado.vista', $practicaII->id) }}" target="_blank" rel="noopener noreferrer" class="action-btn" style="background: #f1f5f9; color: #334155; border: 1px solid #cbd5e1; transition: all 0.2s ease;" 
           onmouseover="this.style.background='#e2e8f0'; this.style.color='#1e293b'" onmouseout="this.style.background='#f1f5f9'; this.style.color='#334155'"
           onmousedown="this.style.background='#cbd5e1'; this.style.color='#0f172a'" onmouseup="this.style.background='#e2e8f0'; this.style.color='#1e293b'">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
            Ver Certificado
        </a>
    @else
        <button class="action-btn btn-disabled" disabled>
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
            No disponible
        </button>
    @endif
</div>
                    </div><!-- Certificado Final -->
                <div class="certificate-item">
                    <div class="certificate-header">
                        <div class="certificate-title">
                            <div class="certificate-icon">🎓</div>
                            <div class="certificate-name">Certificado de Prácticas Profesionales Completas</div>
                        </div>
                        <span class="certificate-status {{ $certificadoDisponible ? 'status-available' : 'status-locked' }}">
                            {{ $certificadoDisponible ? 'DISPONIBLE' : 'BLOQUEADO' }}
                        </span>
                    </div>
                    <div class="certificate-details">
                        <div class="details-grid">
                            <div class="detail-card">
                                <div class="detail-label">Estado General</div>
                                <div class="detail-value {{ $certificadoDisponible ? 'completed' : '' }}">
                                    @if($certificadoDisponible)
                                        ✅ Todas las prácticas completadas
                                    @else
                                        ⚠️ Pendiente de completar
                                    @endif
                                </div>
                            </div>
                            <div class="detail-card">
                                <div class="detail-label">Horas Totales</div>
                                <div class="detail-value">
                                    {{ ($practicaI->horas_requeridas ?? 0) + ($practicaII->horas_requeridas ?? 0) }} horas
                                </div>
                            </div>
                            <div class="detail-card">
                                <div class="detail-label">Certificación</div>
                                <div class="detail-value">Prácticas Profesionales I y II</div>
                            </div>
                        </div>
                    </div>
                    <div class="certificate-actions">
                        @if($certificadoDisponible)
                            <a href="{{ route('certificado.final.descargar') }}" class="action-btn btn-download">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Descargar Certificado Final
                            </a>
                            <a href="{{ route('certificado.final.vista') }}" target="_blank" rel="noopener noreferrer" class="action-btn" style="background: #f1f5f9; color: #334155; border: 1px solid #cbd5e1; transition: all 0.2s ease;" 
           onmouseover="this.style.background='#e2e8f0'; this.style.color='#1e293b'" onmouseout="this.style.background='#f1f5f9'; this.style.color='#334155'"
           onmousedown="this.style.background='#cbd5e1'; this.style.color='#0f172a'" onmouseup="this.style.background='#e2e8f0'; this.style.color='#1e293b'">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
            Ver Certificado
        </a>
    @else
        <button class="action-btn btn-disabled" disabled>
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
            Certificado No Disponible
        </button>
    @endif
</div>
                </div>
            </div>
        </div>
    </div>
</main></body>
</html>