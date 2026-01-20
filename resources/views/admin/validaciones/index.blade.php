<x-admin-layout>
    <x-slot name="header">
        Validar Documentos
    </x-slot>

    <style>
        /* CONTENEDOR PRINCIPAL */
        .validaciones-container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        /* HEADER CON ALERTA */
        .alert-header {
            padding: 20px 28px;
            background: linear-gradient(135deg, #024ee8 0%, #024ee8 100%);
            border-bottom: 2px solid #0a1733;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-header svg {
            width: 24px;
            height: 24px;
            color: #000000;
            flex-shrink: 0;
        }

        .alert-header h3 {
            font-size: 1.15rem;
            font-weight: 700;
            color: #000000;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .count-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            padding: 4px 10px;
            background: #050505;
            color: #ffffff;
            font-size: 0.85rem;
            font-weight: 700;
            border-radius: 16px;
            box-shadow: 0 2px 6px rgba(146, 64, 14, 0.3);
        }

        /* TABLA */
        .validaciones-table {
            width: 100%;
            border-collapse: collapse;
        }

        .validaciones-table thead {
            background: #f9fafb;
        }

        .validaciones-table th {
            padding: 14px 20px;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #1c50b7;
            border-bottom: 1px solid #121213;
        }

        .validaciones-table th.text-center {
            text-align: center;
        }

        .validaciones-table tbody tr {
            border-bottom: 1px solid #bdd0f5;
            transition: all 0.2s ease;
        }

        .validaciones-table tbody tr:hover {
            background: #bdd0f5;
        }

        .validaciones-table tbody tr:last-child {
            border-bottom: none;
        }

        .validaciones-table td {
            padding: 16px 20px;
            font-size: 0.9rem;
            color: #4b5563;
        }

        /* AVATAR Y INFO ESTUDIANTE */
        .student-info {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .student-avatar {
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
            font-size: 0.95rem;
            box-shadow: 0 2px 8px rgba(185, 28, 28, 0.2);
        }

        .student-details {
            flex: 1;
        }

        .student-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 3px;
        }

        .student-email {
            font-size: 0.8rem;
            color: #6b7280;
        }

        /* BADGES */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 12px;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 20px;
            white-space: nowrap;
        }

        .badge-practica {
            background: #dbeafe;
            color: #1e40af;
        }

        /* LUGAR INFO */
        .lugar-info {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .lugar-nombre {
            font-size: 0.9rem;
            color: #6b7280;
        }

        .lugar-direccion {
            font-size: 0.8rem;
            color: #6b7280;
        }

        /* BOTÓN VER PDF */
        .btn-pdf {
            display: inline-flex;
            align-items: center;
            padding: 8px 14px;
            background: #9fabc4;
            color: #4b5563;
            font-size: 0.8rem;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-pdf:hover {
            background: #e5e7eb;
            color: #1f2937;
            transform: translateY(-1px);
        }

        .btn-pdf svg {
            width: 16px;
            height: 16px;
            margin-right: 6px;
        }

        /* BOTÓN REVISAR */
        .btn-revisar {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            background: linear-gradient(135deg, #024ee8 0%, #024ee8  100%);
            color: #ffffff;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.2);
        }

        .btn-revisar:hover {
            background: linear-gradient(135deg, #224da3 0%, #20448a 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .btn-revisar svg {
            width: 18px;
            height: 18px;
            margin-right: 8px;
        }

        /* ESTADO VACÍO */
        .empty-state {
            padding: 80px 32px;
            text-align: center;
        }

        .empty-state-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .empty-state-icon svg {
            width: 40px;
            height: 40px;
            color: #065f46;
        }

        .empty-state h4 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 0.9rem;
            color: #6b7280;
        }

        /* RESPONSIVE */
        @media (max-width: 1200px) {
            .validaciones-table {
                font-size: 0.85rem;
            }

            .validaciones-table th,
            .validaciones-table td {
                padding: 12px 14px;
            }
        }

        @media (max-width: 768px) {
            .alert-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .alert-header h3 {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>

    <div class="validaciones-container">
        <!-- Header con Alerta -->
        <div class="alert-header">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <h3>
                Prácticas Pendientes de Revisión
                <span class="count-badge">{{ $practicasPendientes->count() }}</span>
            </h3>
        </div>

        <!-- Tabla -->
        <div style="overflow-x: auto;">
            <table class="validaciones-table">
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Periodo</th>
                        <th>Práctica</th>
                        <th>Lugar</th>
                        <th>Horas</th>
                        <th>Fecha Finalización</th>
                        <th class="text-center">Documento</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($practicasPendientes as $practica)
                        <tr>
                            <td>
                                <div class="student-info">
                                    <div class="student-avatar">
                                        {{ substr($practica->estudiante->nombres, 0, 1) }}{{ substr($practica->estudiante->apellidos, 0, 1) }}
                                    </div>
                                    <div class="student-details">
                                        <div class="student-name">
                                            {{ $practica->estudiante->nombres }} {{ $practica->estudiante->apellidos }}
                                        </div>
                                        <div class="student-email">
                                            {{ $practica->estudiante->email }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <strong style="color: #1f2937;">{{ $practica->anio_lectivo }}</strong>
                            </td>
                            <td>
                                <span class="badge badge-practica">
                                    Práctica {{ $practica->tipo }}
                                </span>
                            </td>
                            <td>
                                <div class="lugar-info">
                                    <div class="lugar-nombre">
                                        {{ $practica->lugarPractica->nombre ?? 'N/A' }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p style="color: #6b7280;">{{ $practica->horas_requeridas }}</p> horas
                            </td>
                            <td style="color: #6b7280;">
                                {{ $practica->fecha_finalizacion ? $practica->fecha_finalizacion->format('d/m/Y') : 'N/A' }}
                            </td>
                            <td class="text-center">
                                @if($practica->archivo_url)
                                    <a href="{{ Storage::url($practica->archivo_url) }}" 
                                       target="_blank"
                                       class="btn-pdf">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        Ver PDF
                                    </a>
                                @else
                                    <span style="color: #9ca3af; font-size: 0.85rem;">Sin archivo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.validaciones.revisar', $practica) }}" 
                                   class="btn-revisar">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Revisar
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <h4>¡Excelente! No hay documentos pendientes</h4>
                                    <p>Todas las prácticas han sido procesadas</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>