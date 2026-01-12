<x-admin-layout>
    <x-slot name="header">
        Seguimiento General
    </x-slot>

    <style>
        /* TARJETAS DE ESTADÍSTICAS */
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
        .stat-estudiantes {
            --border-color: #b91c1c;
            --icon-bg: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
        }

        .stat-asignadas {
            --border-color: #059669;
            --icon-bg: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .stat-pendientes {
            --border-color: #f59e0b;
            --icon-bg: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
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

    <!-- Tarjetas de Estadísticas -->
    <div class="stats-grid">
        
        <!-- Total Estudiantes -->
        <div class="stat-card stat-estudiantes">
            <div class="stat-card-content">
                <div class="stat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Total Estudiantes</div>
                    <div class="stat-value">
                        {{ \App\Models\User::where('rol', 'estudiante')->count() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Prácticas Asignadas -->
        <div class="stat-card stat-asignadas">
            <div class="stat-card-content">
                <div class="stat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Prácticas Asignadas</div>
                    <div class="stat-value">
                        {{ \App\Models\Practica::where('estado', 'asignada')->count() }}
                    </div>
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
                    <div class="stat-value">
                        {{ \App\Models\Practica::where('estado', 'pendiente_revision')->count() }}
                    </div>
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
                    <div class="stat-value">
                        {{ \App\Models\Practica::where('estado', 'aprobada')->count() }}
                    </div>
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
            @php
                $practicasRecientes = \App\Models\Practica::with('estudiante')
                    ->latest()
                    ->take(5)
                    ->get();
            @endphp

            @forelse($practicasRecientes as $practica)
                <div class="activity-item">
                    <div class="activity-left">
                        <div class="activity-avatar">
                            {{ substr($practica->estudiante->nombres, 0, 1) }}
                        </div>
                        <div class="activity-details">
                            <div class="activity-name">
                                {{ $practica->estudiante->nombres }} {{ $practica->estudiante->apellidos }}
                            </div>
                            <div class="activity-description">
                                Práctica {{ $practica->tipo }}
                                <span class="activity-badge badge-{{ $practica->estado }}">
                                    {{ ucfirst(str_replace('_', ' ', $practica->estado)) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="activity-time">
                        {{ $practica->created_at->diffForHumans() }}
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

</x-admin-layout>   