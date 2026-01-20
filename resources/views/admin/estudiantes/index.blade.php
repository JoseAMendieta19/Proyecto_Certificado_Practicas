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
            background: #b91c1c;
            color: #ffffff;
        }

        .btn-asignar:hover {
            background: #991b1b;
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
            background: #dc2626;
            color: #ffffff;
        }

        .btn-reasignar:hover {
            background: #b91c1c;
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
    </style>

    <div class="estudiantes-container">
        <div class="table-header">
            <h3>Estudiantes Registrados</h3>
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
                            $practicaI  = $estudiante->practicas->where('tipo', 'I')->first();
                            $practicaII = $estudiante->practicas->where('tipo', 'II')->first();
                            $practica = $practicaII ?? $practicaI;
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
                            <td colspan="7" class="no-data">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                <p style="margin: 0; font-size: 0.95rem;">No hay estudiantes registrados</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>