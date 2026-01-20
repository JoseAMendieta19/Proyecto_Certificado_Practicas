<x-admin-layout>
    <x-slot name="header">
        Gestión de Estudiantes
    </x-slot>

    <style>
        /* CONTENEDOR PRINCIPAL */
        .estudiantes-container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        /* HEADER DE LA TABLA */
        .table-header {
            padding: 20px 24px;
            border-bottom: 2px solid #f3f4f6;
            background: #fafafa;
        }

        .table-header h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        /* 🆕 ESTILOS DEL BUSCADOR */
        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .search-form {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .search-input {
            padding: 10px 16px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 0.9rem;
            width: 300px;
            outline: none;
            transition: all 0.2s;
        }

        .search-input:focus {
            border-color: #024ee8;
            box-shadow: 0 0 0 3px rgba(2, 78, 232, 0.2);
        }

        .btn-search {
            background: #024ee8;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-search:hover {
            background: #024ee8;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(2, 78, 232, 0.2);
        }

        .btn-clear {
            background: #6b7280;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }

        .btn-clear:hover {
            background: #4b5563;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(107, 114, 128, 0.2);
        }

        /* TABLA */
        .estudiantes-table {
            width: 100%;
            border-collapse: collapse;
        }

        .estudiantes-table thead {
            background: #f9fafb;
        }

        .estudiantes-table th {
            padding: 14px 20px;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #6b7280;
            border-bottom: 1px solid #e5e7eb;
        }

        .estudiantes-table th.text-center {
            text-align: center;
        }

        .estudiantes-table tbody tr {
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.2s ease;
        }

        .estudiantes-table tbody tr:hover {
            background: #fef2f2;
        }

        .estudiantes-table tbody tr:last-child {
            border-bottom: none;
        }

        .estudiantes-table td {
            padding: 16px 20px;
            font-size: 0.9rem;
            color: #374151;
        }

        .estudiantes-table td.font-medium {
            font-weight: 600;
            color: #1f2937;
        }

        /* BADGES DE ESTADO */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 12px;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 20px;
            white-space: nowrap;
        }

        .badge svg {
            width: 14px;
            height: 14px;
            margin-right: 4px;
        }

        .badge-gray {
            background: #f3f4f6;
            color: #4b5563;
        }

        .badge-blue {
            background: #dbeafe;
            color: #1e40af;
        }

        .badge-yellow {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-green {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-red {
            background: #fee2e2;
            color: #991b1b;
        }

        /* BOTONES DE ACCIÓN */
        .btn-action {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            font-size: 0.8rem;
            font-weight: 600;
            border-radius: 6px;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }

        .btn-action svg {
            width: 16px;
            height: 16px;
            margin-right: 6px;
        }

        .btn-asignar {
            background: #024ee8;
            color: #ffffff;
        }

        .btn-asignar:hover {
            background: #113a8a;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(185, 28, 28, 0.2);
        }

        .btn-revisar {
            background: #024ee8;
            color: #ffffff;
        }

        .btn-revisar:hover {
            background: #113a8a;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(245, 158, 11, 0.2);
        }

        .btn-reasignar {
            background: #024ee8;
            color: #ffffff;
        }

        .btn-reasignar:hover {
            background: #113a8a;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(220, 38, 38, 0.2);
        }

        /* ESTADO DE PRÁCTICA */
        .estado-practica {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        .practica-tipo {
            font-size: 0.75rem;
            font-weight: 600;
            color: #4b5563;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* CELDA CENTRADA */
        .text-center {
            text-align: center;
        }

        /* RESPONSIVE */
        .table-wrapper {
            overflow-x: auto;
        }

        @media (max-width: 1200px) {
            .estudiantes-table {
                font-size: 0.85rem;
            }

            .estudiantes-table th,
            .estudiantes-table td {
                padding: 12px 14px;
            }

            .btn-action {
                padding: 6px 12px;
                font-size: 0.75rem;
            }

            .search-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-input {
                width: 100%;
            }
        }

        /* SIN DATOS */
        .no-data {
            padding: 48px 24px;
            text-align: center;
            color: #9ca3af;
        }

        .no-data svg {
            width: 48px;
            height: 48px;
            margin: 0 auto 12px;
            opacity: 0.5;
        }

        .no-data a {
            color: #b91c1c;
            text-decoration: underline;
            font-size: 0.9rem;
            margin-top: 8px;
            display: inline-block;
        }

        .no-data a:hover {
            color: #991b1b;
        }
    </style>

    <div class="estudiantes-container">
        {{-- 🆕 HEADER CON BUSCADOR --}}
        <div class="table-header">
            <div class="search-container">
                <h3>Estudiantes Registrados</h3>
                
                {{-- 🔍 FORMULARIO DE BÚSQUEDA --}}
                <form method="GET" action="{{ route('admin.estudiantes.index') }}" class="search-form">
                    <input 
                        type="text" 
                        name="search" 
                        class="search-input"
                        placeholder="🔍 Buscar por cédula o nombre..." 
                        value="{{ request('search') }}"
                    >
                    
                    <button type="submit" class="btn-search">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 16px; height: 16px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Buscar
                    </button>

                    {{-- Botón limpiar (solo si hay búsqueda activa) --}}
                    @if(request('search'))
                        <a href="{{ route('admin.estudiantes.index') }}" class="btn-clear">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 16px; height: 16px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Limpiar
                        </a>
                    @endif
                </form>
            </div>
        </div>

        <div class="table-wrapper">
            <table class="estudiantes-table">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombres</th>
                        <th>Institución</th>
                        <th>Carrera</th>
                        <th class="text-center">Acciones</th>
                        <th class="text-center">Estado</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($estudiantes as $estudiante)
                    @php
                        // 🆕 LÓGICA MEJORADA: Buscar prácticas activas (no rechazadas)
                        $practicaI = $estudiante->practicas
                            ->where('tipo', 'I')
                            ->whereIn('estado', ['asignada', 'pendiente_revision', 'aprobada'])
                            ->sortByDesc('updated_at')
                            ->first();
                        
                        $practicaII = $estudiante->practicas
                            ->where('tipo', 'II')
                            ->whereIn('estado', ['asignada', 'pendiente_revision', 'aprobada'])
                            ->sortByDesc('updated_at')
                            ->first();
                        
                        // Priorizar Práctica II si existe, sino mostrar Práctica I
                        $practica = $practicaII ?? $practicaI;
                        
                        // 🆕 Si no hay práctica activa, buscar si hay alguna rechazada
                        if (!$practica) {
                            $practica = $estudiante->practicas
                                ->where('estado', 'rechazada')
                                ->sortByDesc('updated_at')
                                ->first();
                        }
                    @endphp

                    <tr>
                        <td>{{ $estudiante->cedula }}</td>
                        <td class="font-medium">
                            {{ $estudiante->nombres }} {{ $estudiante->apellidos }}
                        </td>
                        <td>{{ $estudiante->institucion?->nombre ?? 'Sin institución' }}</td>
                        <td>{{ $estudiante->carrera?->nombre ?? 'Sin carrera' }}</td>

                        {{-- ACCIONES --}}
                        <td class="text-center">
                            @if (!$practica)
                                <a href="{{ route('admin.estudiantes.asignar', $estudiante->id) }}"
                                   class="btn-action btn-asignar">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Asignar Práctica I
                                </a>

                            @elseif ($practica->estado === 'asignada')
                                <span style="color: #9ca3af;">—</span>

                            @elseif ($practica->estado === 'pendiente_revision')
                                <a href="{{ route('admin.validaciones.revisar', $practica->id) }}"
                                   class="btn-action btn-revisar">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    Revisar archivo
                                </a>

                            @elseif ($practica->estado === 'aprobada')
                                @if ($practica->tipo === 'I' && !$practicaII)
                                    <a href="{{ route('admin.estudiantes.asignar', $estudiante->id) }}"
                                       class="btn-action btn-asignar">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
                                        Asignar Práctica II
                                    </a>
                                @else
                                    <span class="badge badge-green">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Completado
                                    </span>
                                @endif

                            @elseif ($practica->estado === 'rechazada')
                                <a href="{{ route('admin.estudiantes.asignar', $estudiante->id) }}"
                                   class="btn-action btn-reasignar">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    Reasignar
                                </a>
                            @endif
                        </td>

                        {{-- ESTADO --}}
                        <td class="text-center">
                            @if (!$practica)
                                <span class="badge badge-gray">
                                    No asignada
                                </span>
                            @else
                                <div class="estado-practica">
                                    <span class="practica-tipo">
                                        Práctica {{ $practica->tipo }}
                                    </span>
                                    @switch($practica->estado)
                                        @case('asignada')
                                            <span class="badge badge-blue">
                                                Asignada
                                            </span>
                                            @break
                                        @case('pendiente_revision')
                                            <span class="badge badge-yellow">
                                                Pendiente revisión
                                            </span>
                                            @break
                                        @case('aprobada')
                                            <span class="badge badge-green">
                                                Aprobada
                                            </span>
                                            @break
                                        @case('rechazada')
                                            <span class="badge badge-red">
                                                Rechazada
                                            </span>
                                            @break
                                    @endswitch
                                </div>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="no-data">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if(request('search'))
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                @else
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                @endif
                            </svg>
                            
                            @if(request('search'))
                                <p style="margin: 0; font-size: 0.95rem;">
                                    No se encontraron estudiantes que coincidan con: <strong>"{{ request('search') }}"</strong>
                                </p>
                                <a href="{{ route('admin.estudiantes.index') }}">
                                    Ver todos los estudiantes
                                </a>
                            @else
                                <p style="margin: 0; font-size: 0.95rem;">No hay estudiantes registrados</p>
                            @endif
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>