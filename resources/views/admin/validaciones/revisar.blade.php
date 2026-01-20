<x-admin-layout>
    <x-slot name="header">
        Revisar Práctica
    </x-slot>

    <style>
        /* VARIABLES Y RESET */
        * {
            box-sizing: border-box;
        }

        /* CONTENEDOR PRINCIPAL */
        .revisar-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* HEADER DE LA PÁGINA */
        .page-header {
       background: #EFF6FF;


            border-radius: 16px;
            padding: 32px;
            margin-bottom: 32px;
            box-shadow: 0 4px 20px rgba(220, 38, 38, 0.15);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #024ee8;
            font-size: 1.8rem;
            font-weight: 700;
            box-shadow: 0 4px 16px rgba(255, 255, 255, 0.3);
            flex-shrink: 0;
        }

        .header-text h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #060606;
            margin: 0 0 6px 0;
        }

        .header-text p {
            font-size: 0.95rem;
            color: #000000;
            margin: 0;
        }

        .header-badge {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            color: #050505;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .header-badge svg {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }

        /* LAYOUT PRINCIPAL */
        .main-layout {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 24px;
            align-items: start;
        }

        /* TARJETAS DE INFORMACIÓN */
        .info-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .card-header {
            padding: 20px 28px;
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            border-bottom: 2px solid #e5e7eb;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .card-header svg {
            width: 22px;
            height: 22px;
            flex-shrink: 0;
            color: #dc2626;
        }

        .card-header h3 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0;
        }

        .card-body {
            padding: 28px;
        }

        /* GRID DE INFORMACIÓN */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .info-item.full-width {
            grid-column: 1 / -1;
        }

        .info-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .info-value {
            font-size: 0.95rem;
            font-weight: 600;
            color: #111827;
        }

        .info-subtext {
            font-size: 0.85rem;
            color: #6b7280;
            margin-top: 2px;
        }

        /* BADGE TIPO PRÁCTICA */
        .practice-badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            background: linear-gradient(135deg, #024ee8 0%, #024ee8 100%);
            color: #000000;
            font-size: 0.85rem;
            font-weight: 700;
            border-radius: 24px;
            border: 2px solid #000000;
        }

        /* ÁREA DE DOCUMENTO */
        .document-area {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border: 2px dashed #fca5a5;
            border-radius: 12px;
            padding: 40px;
            text-align: center;
        }

        .document-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            color: #dc2626;
        }

        .document-text {
            font-size: 0.95rem;
            color: #991b1b;
            margin-bottom: 20px;
        }

        .btn-view-document {
            display: inline-flex;
            align-items: center;
            padding: 12px 28px;
            background: linear-gradient(135deg, #024ee8 0%, #024ee8 100%);
            color: #ffffff;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        .btn-view-document:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }

        .btn-view-document svg {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }

        /* PANEL DE ACCIONES (STICKY) */
        .actions-panel {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            position: sticky;
            top: 24px;
        }

        .panel-header {
            padding: 24px;
            background: linear-gradient(135deg, #024ee8 0%, #024ee8 100%);
            border-bottom: 2px solid #991b1b;
        }

        .panel-header h3 {
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel-header svg {
            width: 22px;
            height: 22px;
            color: #fef3c7;
        }

        .panel-body {
            padding: 28px;
        }

        /* FORMULARIOS */
        .form-section {
            margin-bottom: 24px;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-label .required {
            color: #dc2626;
            margin-left: 3px;
        }

        .form-textarea {
            width: 100%;
            padding: 12px 16px;
            font-size: 0.9rem;
            color: #1f2937;
            background: #ffffff;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            resize: vertical;
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .form-textarea:focus {
            outline: none;
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .form-textarea::placeholder {
            color: #9ca3af;
        }

        /* BOTONES DE ACCIÓN */
        .btn-action {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 14px 24px;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }

        .btn-action svg {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .btn-approve {
            background: linear-gradient(135deg, #024ee8 0%, #024ee8 100%);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3);
        }

        .btn-approve:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(22, 163, 74, 0.4);
        }

        .btn-reject {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        .btn-reject:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }

        .btn-back {
            background: #ffffff;
            color: #4b5563;
            border: 2px solid #e5e7eb;
            box-shadow: none;
        }

        .btn-back:hover {
            background: #f9fafb;
            border-color: #d1d5db;
        }

        /* SEPARADOR */
        .divider {
            position: relative;
            margin: 24px 0;
        }

        .divider-line {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
        }

        .divider-line div {
            width: 100%;
            border-top: 1px solid #e5e7eb;
        }

        .divider-text {
            position: relative;
            display: flex;
            justify-content: center;
        }

        .divider-text span {
            padding: 0 12px;
            background: #ffffff;
            color: #9ca3af;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .section-divider {
            margin: 28px 0;
            padding-top: 28px;
            border-top: 2px solid #f3f4f6;
        }

        /* RESPONSIVE */
        @media (max-width: 1200px) {
            .main-layout {
                grid-template-columns: 1fr;
            }

            .actions-panel {
                position: relative;
                top: 0;
            }
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 24px;
            }

            .header-info {
                width: 100%;
            }

            .header-avatar {
                width: 56px;
                height: 56px;
                font-size: 1.4rem;
            }

            .header-text h1 {
                font-size: 1.35rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .card-body {
                padding: 20px;
            }

            .panel-body {
                padding: 20px;
            }
        }
    </style>

    <div class="revisar-container">
        
        <!-- Header de la Página -->
        <div class="page-header">
            <div class="header-info">
                <div class="header-avatar">
                    {{ substr($practica->estudiante->nombres, 0, 1) }}{{ substr($practica->estudiante->apellidos, 0, 1) }}
                </div>
                <div class="header-text">
                    <h1>{{ $practica->estudiante->nombres }} {{ $practica->estudiante->apellidos }}</h1>
                    <p>{{ $practica->estudiante->email }}</p>
                </div>
            </div>
            <div class="header-badge">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Pendiente de Revisión
            </div>
        </div>

        <!-- Layout Principal -->
        <div class="main-layout">
            
            <!-- Columna Izquierda: Información -->
            <div>
                
                <!-- Datos del Estudiante -->
                <div class="info-card">
                    <div class="card-header">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <h3>Datos del Estudiante</h3>
                    </div>
                    <div class="card-body">
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">Nombre Completo</span>
                                <span class="info-value">{{ $practica->estudiante->nombres }} {{ $practica->estudiante->apellidos }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Cédula</span>
                                <span class="info-value">{{ $practica->estudiante->cedula ?? 'N/A' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Email Institucional</span>
                                <span class="info-value">{{ $practica->estudiante->email }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Carrera</span>
                                <span class="info-value">{{ $practica->estudiante->carrera->nombre ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detalles de la Práctica -->
                <div class="info-card">
                    <div class="card-header">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <h3>Detalles de la Práctica</h3>
                    </div>
                    <div class="card-body">
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">Tipo de Práctica</span>
                                <span class="practice-badge">Práctica {{ $practica->tipo }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Horas Requeridas</span>
                                <span class="info-value">{{ $practica->horas_requeridas }} horas</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Fecha de Inicio</span>
                                <span class="info-value">{{ $practica->fecha_inicio ? $practica->fecha_inicio->format('d/m/Y') : 'N/A' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Fecha de Finalización</span>
                                <span class="info-value">{{ $practica->fecha_finalizacion ? $practica->fecha_finalizacion->format('d/m/Y') : 'N/A' }}</span>
                            </div>
                            <div class="info-item full-width">
                                <span class="info-label">Lugar de Práctica</span>
                                <span class="info-value">{{ $practica->lugarPractica->nombre ?? 'N/A' }}</span>
                                @if($practica->lugarPractica && $practica->lugarPractica->direccion)
                                    <span class="info-subtext">{{ $practica->lugarPractica->direccion }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Documento de Validación -->
                <div class="info-card">
                    <div class="card-header">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                        <h3>Documento de Validación</h3>
                    </div>
                    <div class="card-body">
                        @if($practica->archivo_url)
                            <div class="document-area">
                                <svg class="document-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                                <p class="document-text">Documento PDF subido por el estudiante</p>
                                <a href="{{ Storage::url($practica->archivo_url) }}" 
                                   target="_blank"
                                   class="btn-view-document">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Ver Documento Completo
                                </a>
                            </div>
                        @else
                            <div class="document-area">
                                <svg class="document-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                                <p class="document-text" style="color: #9ca3af;">No se ha subido ningún documento</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <!-- Columna Derecha: Panel de Acciones -->
            <div>
                <div class="actions-panel">
                    <div class="panel-header">
                        <h3>
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Validar Práctica
                        </h3>
                    </div>
                    <div class="panel-body">
                        
                        <!-- Formulario Aprobar -->
                        <form action="{{ route('admin.validaciones.aprobar', $practica) }}" 
                              method="POST"
                              onsubmit="return confirm('¿Estás seguro de APROBAR esta práctica? Se enviará un email al estudiante.');">
                            @csrf
                            <div class="form-section">
                                <label for="observaciones_aprobar" class="form-label">
                                    Comentarios (opcional)
                                </label>
                                <textarea name="observaciones" 
                                          id="observaciones_aprobar"
                                          rows="3"
                                          class="form-textarea"
                                          placeholder="Ej: Excelente trabajo, cumple con todos los requisitos."></textarea>
                            </div>
                            <button type="submit" class="btn-action btn-approve">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Aprobar Práctica
                            </button>
                        </form>

                        <!-- Separador -->
                        <div class="divider">
                            <div class="divider-line">
                                <div></div>
                            </div>
                            <div class="divider-text">
                                <span>o</span>
                            </div>
                        </div>

                        <!-- Formulario Rechazar -->
                        <form action="{{ route('admin.validaciones.rechazar', $practica) }}" 
                              method="POST"
                              onsubmit="return confirm('¿Estás seguro de RECHAZAR esta práctica? Debes especificar el motivo.');">
                            @csrf
                            <div class="form-section">
                                <label for="observaciones_rechazar" class="form-label">
                                    Motivo del rechazo <span class="required">*</span>
                                </label>
                                <textarea name="observaciones" 
                                          id="observaciones_rechazar"
                                          rows="3"
                                          class="form-textarea"
                                          required
                                          placeholder="Ej: Faltan 20 horas documentadas, el certificado no está firmado..."></textarea>
                            </div>
                            <button type="submit" class="btn-action btn-reject">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Rechazar Práctica
                            </button>
                        </form>

                        <!-- Botón Volver -->
                        <div class="section-divider">
                            <a href="{{ route('admin.validaciones.index') }}" 
                               class="btn-action btn-back">
                                ← Volver al listado
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</x-admin-layout>