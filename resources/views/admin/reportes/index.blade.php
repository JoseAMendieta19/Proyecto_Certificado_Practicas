<x-admin-layout>
    <x-slot name="header">
        Reportes y Estadísticas
    </x-slot>

    <style>
        /* TARJETAS DE ESTADÍSTICAS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: linear-gradient(135deg, var(--color-from) 0%, var(--color-to) 100%);
            border-radius: 12px;
            padding: 24px;
            color: #ffffff;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .stat-card-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-info p:first-child {
            font-size: 0.85rem;
            opacity: 0.9;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1;
        }

        .stat-icon {
            background: rgba(255, 255, 255, 0.25);
            border-radius: 50%;
            padding: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon svg {
            width: 32px;
            height: 32px;
        }

        /* COLORES DE TARJETAS */
        .stat-estudiantes {
            --color-from: #b91c1c;
            --color-to: #991b1b;
        }

        .stat-asignadas {
            --color-from: #059669;
            --color-to: #047857;
        }

        .stat-pendientes {
            --color-from: #f59e0b;
            --color-to: #d97706;
        }

        .stat-aprobadas {
            --color-from: #7c3aed;
            --color-to: #6d28d9;
        }

        .stat-rechazadas {
            --color-from: #dc2626;
            --color-to: #b91c1c;
        }

        /* PANEL DE REPORTES */
        .report-panel {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .report-header {
            padding: 24px 28px;
            background: #fafafa;
            border-bottom: 2px solid #f3f4f6;
        }

        .report-header h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 4px;
        }

        .report-header p {
            font-size: 0.9rem;
            color: #6b7280;
        }

        .report-content {
            padding: 32px 28px;
        }

        /* FORMULARIO */
        .form-section {
            margin-bottom: 28px;
        }

        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-select {
            width: 100%;
            max-width: 500px;
            padding: 12px 16px;
            font-size: 0.9rem;
            color: #1f2937;
            background: #ffffff;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .form-select:focus {
            outline: none;
            border-color: #b91c1c;
            box-shadow: 0 0 0 3px rgba(185, 28, 28, 0.1);
        }

        /* BOTONES DE DESCARGA */
        .download-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
        }

        .btn-download {
            display: flex;
            align-items: center;
            padding: 16px 24px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-download:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        }

        .btn-download svg {
            width: 24px;
            height: 24px;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .btn-download-content {
            text-align: left;
        }

        .btn-download-title {
            font-size: 0.95rem;
            margin-bottom: 2px;
        }

        .btn-download-subtitle {
            font-size: 0.75rem;
            opacity: 0.9;
        }

        .btn-excel {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            color: #ffffff;
        }

        .btn-excel:hover {
            background: linear-gradient(135deg, #047857 0%, #065f46 100%);
        }

        .btn-pdf {
            background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
            color: #ffffff;
        }

        .btn-pdf:hover {
            background: linear-gradient(135deg, #991b1b 0%, #7f1d1d 100%);
        }

        /* ALERTA INFO */
        .alert-info {
            background: #eff6ff;
            border-left: 4px solid #3b82f6;
            border-radius: 8px;
            padding: 18px 20px;
            margin-top: 28px;
        }

        .alert-info-content {
            display: flex;
            gap: 14px;
        }

        .alert-info svg {
            width: 22px;
            height: 22px;
            color: #3b82f6;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .alert-info-text {
            font-size: 0.85rem;
            color: #1e40af;
        }

        .alert-info-text p {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .alert-info-text ul {
            list-style: disc;
            margin-left: 18px;
        }

        .alert-info-text li {
            margin-bottom: 6px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-number {
                font-size: 2rem;
            }

            .form-select {
                max-width: 100%;
            }

            .download-buttons {
                flex-direction: column;
            }

            .btn-download {
                width: 100%;
            }
        }
    </style>

    <!-- Estadísticas Generales -->
    <div class="stats-grid">
        
        <!-- Total Estudiantes -->
        <div class="stat-card stat-estudiantes">
            <div class="stat-card-content">
                <div class="stat-info">
                    <p>Total Estudiantes</p>
                    <div class="stat-number">{{ $estadisticas['total_estudiantes'] }}</div>
                </div>
                <div class="stat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Asignadas -->
        <div class="stat-card stat-asignadas">
            <div class="stat-card-content">
                <div class="stat-info">
                    <p>Asignadas</p>
                    <div class="stat-number">{{ $estadisticas['practicas_asignadas'] }}</div>
                </div>
                <div class="stat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pendientes -->
        <div class="stat-card stat-pendientes">
            <div class="stat-card-content">
                <div class="stat-info">
                    <p>Pendientes</p>
                    <div class="stat-number">{{ $estadisticas['practicas_pendientes'] }}</div>
                </div>
                <div class="stat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Aprobadas -->
        <div class="stat-card stat-aprobadas">
            <div class="stat-card-content">
                <div class="stat-info">
                    <p>Aprobadas</p>
                    <div class="stat-number">{{ $estadisticas['practicas_aprobadas'] }}</div>
                </div>
                <div class="stat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Rechazadas -->
        <div class="stat-card stat-rechazadas">
            <div class="stat-card-content">
                <div class="stat-info">
                    <p>Rechazadas</p>
                    <div class="stat-number">{{ $estadisticas['practicas_rechazadas'] }}</div>
                </div>
                <div class="stat-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    <!-- Panel de Descarga -->
    <div class="report-panel">
        <div class="report-header">
            <h3>Generar Reporte</h3>
            <p>Descarga un reporte completo de todas las prácticas</p>
        </div>

        <div class="report-content">
            <form action="{{ route('admin.reportes.descargar') }}" method="GET">
                
                <!-- Filtro por Estado -->
                <div class="form-section">
                    <label for="estado" class="form-label">
                        Filtrar por Estado (opcional)
                    </label>
                    <select name="estado" id="estado" class="form-select">
                        <option value="">Todas las prácticas</option>
                        <option value="asignada">Asignadas</option>
                        <option value="pendiente_revision">Pendientes de Revisión</option>
                        <option value="aprobada">Aprobadas</option>
                        <option value="rechazada">Rechazadas</option>
                    </select>
                </div>

                <!-- Formato de Descarga -->
                <div class="form-section">
                    <label class="form-label">
                        Formato de Descarga
                    </label>
                    <div class="download-buttons">
                        
                        <!-- Opción Excel -->
                        <button type="submit" name="formato" value="excel" class="btn-download btn-excel">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <div class="btn-download-content">
                                <div class="btn-download-title">Descargar Excel</div>
                                <div class="btn-download-subtitle">Formato .xlsx para análisis</div>
                            </div>
                        </button>

                        <!-- Opción PDF -->
                        <button type="submit" name="formato" value="pdf" class="btn-download btn-pdf">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            <div class="btn-download-content">
                                <div class="btn-download-title">Descargar PDF</div>
                                <div class="btn-download-subtitle">Formato para impresión</div>
                            </div>
                        </button>

                    </div>
                </div>

                <!-- Información adicional -->
                <div class="alert-info">
                    <div class="alert-info-content">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="alert-info-text">
                            <p>Información sobre los reportes:</p>
                            <ul>
                                <li>El reporte incluye todos los datos de estudiantes y sus prácticas</li>
                                <li>Puedes filtrar por estado para obtener reportes específicos</li>
                                <li>Los archivos incluyen: cédula, nombres, institución, carrera, tipo de práctica, lugar, horas, fechas y estado</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</x-admin-layout>