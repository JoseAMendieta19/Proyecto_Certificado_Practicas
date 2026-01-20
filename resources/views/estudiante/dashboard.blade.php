<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>

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

        /* SIDEBAR */
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

        /* TARJETAS DE ESTADÍSTICAS - ESTILO ADMIN */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            border-left: 4px solid var(--border-color);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-card-content {
            display: flex;
            align-items: center;
        }

        .stat-icon {
            flex-shrink: 0;
            width: 56px;
            height: 56px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--icon-bg);
        }

        .stat-icon svg {
            width: 28px;
            height: 28px;
            color: #ffffff;
        }

        .stat-info {
            margin-left: 20px;
            flex: 1;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #6b7280;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .stat-value {
            font-size: 2.25rem;
            font-weight: 700;
            color: #111827;
            line-height: 1;
        }

        /* COLORES DE TARJETAS */
        .stat-total {
            --border-color: #b91c1c;
            --icon-bg: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
        }

        .stat-asignadas {
            --border-color: #059669;
            --icon-bg: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .stat-pendientes {
            --border-color: #2563eb;
            --icon-bg: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }

        .stat-aprobadas {
            --border-color: #7c3aed;
            --icon-bg: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
        }

        /* PANEL DE ACTIVIDAD */
        .activity-panel {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .activity-header {
            padding: 20px 28px;
            background: #fafafa;
            border-bottom: 2px solid #f3f4f6;
        }

        .activity-header h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        .activity-content {
            padding: 24px 28px;
        }

        /* ITEMS DE ACTIVIDAD */
        .activity-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 0;
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.2s ease;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-item:hover {
            background: #fef2f2;
            margin: 0 -12px;
            padding-left: 12px;
            padding-right: 12px;
            border-radius: 8px;
        }

        .activity-left {
            display: flex;
            align-items: center;
            flex: 1;
        }

        .activity-avatar {
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: 0 2px 8px rgba(185, 28, 28, 0.2);
        }

        .activity-details {
            margin-left: 16px;
            flex: 1;
        }

        .activity-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 4px;
        }

        .activity-description {
            font-size: 0.85rem;
            color: #6b7280;
        }

        .activity-badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 6px;
        }

        .badge-asignada {
            background: #dbeafe;
            color: #1e40af;
        }

        .badge-pendiente_revision {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-aprobada {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-rechazada {
            background: #fee2e2;
            color: #991b1b;
        }

        .activity-time {
            font-size: 0.8rem;
            color: #9ca3af;
            white-space: nowrap;
            margin-left: 16px;
        }

        /* ESTADO VACÍO */
        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: #9ca3af;
        }

        .empty-state svg {
            width: 56px;
            height: 56px;
            margin: 0 auto 16px;
            opacity: 0.4;
        }

        .empty-state p {
            font-size: 0.95rem;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-value {
                font-size: 2rem;
            }

            .activity-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .activity-time {
                margin-left: 60px;
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

                <a href="{{ route('estudiante.dashboard') }}" class="nav-link active">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Inicio
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
        <!-- Header -->

        <!-- Header -->
        <!-- <div class="content-header">
            <h1>Bienvenido, {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</h1>
            <p>Gestiona tus prácticas profesionales desde este panel</p>
        </div> -->
        <div class="content-header">
            <h1>Seguimiento General</h1>
        </div>

        <!-- Tarjetas de Estadísticas -->
        <div class="stats-grid">
            
            <!-- Total Prácticas -->
            <div class="stat-card stat-total">
                <div class="stat-card-content">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label">Total Prácticas</div>
                        <div class="stat-value">{{ $totalPracticas }}</div>
                    </div>
                </div>
            </div>

            <!-- Prácticas Asignadas -->
            <div class="stat-card stat-asignadas">
                <div class="stat-card-content">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label">Prácticas Asignadas</div>
                        <div class="stat-value">{{ $practicasAsignadas }}</div>
                    </div>
                </div>
            </div>

            <!-- Pendientes Revisión -->
            <div class="stat-card stat-pendientes">
                <div class="stat-card-content">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label">Pendientes Revisión</div>
                        <div class="stat-value">{{ $practicasPendientes }}</div>
                    </div>
                </div>
            </div>

            <!-- Prácticas Aprobadas -->
            <div class="stat-card stat-aprobadas">
                <div class="stat-card-content">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label">Prácticas Aprobadas</div>
                        <div class="stat-value">{{ $practicasAprobadas }}</div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Actividad Reciente -->
        <div class="activity-panel">
            <div class="activity-header">
                <h3>Actividad Reciente</h3>
            </div>
            <div class="activity-content">
                @forelse($actividadReciente as $practica)
                    <div class="activity-item">
                        <div class="activity-left">
                            <div class="activity-avatar">
                                {{ substr(Auth::user()->nombres, 0, 1) }}{{ substr(Auth::user()->apellidos, 0, 1) }}
                            </div>
                            <div class="activity-details">
                                <div class="activity-name">
                                    {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}
                                </div>
                                <div class="activity-description">
                                    Práctica {{ $practica->tipo }}
                                    <span class="activity-badge badge-{{ $practica->estado }}">
                                        @if($practica->estado === 'aprobada') Aprobada
                                        @elseif($practica->estado === 'pendiente_revision') En Revisión
                                        @elseif($practica->estado === 'rechazada') Rechazada
                                        @else Asignada
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="activity-time">
                            {{ $practica->updated_at->diffForHumans() }}
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                        <p>No hay actividad reciente</p>
                    </div>
                @endforelse
            </div>
        </div>

    </main>

</body>
</html>