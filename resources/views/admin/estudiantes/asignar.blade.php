<x-admin-layout>
    <x-slot name="header">
        Asignar Práctica - {{ $estudiante->nombres }} {{ $estudiante->apellidos }}
    </x-slot>

    <style>
        /* CONTENEDOR PRINCIPAL */
        .asignar-container {
            max-width: 900px;
        }

        /* TARJETA DE INFORMACIÓN */
        .info-card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            padding: 28px;
            margin-bottom: 28px;
        }

        .info-card h3 {
            font-size: 1.15rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .info-card h3 svg {
            width: 22px;
            height: 22px;
            margin-right: 10px;
            color: #b91c1c;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .info-item {
            border-left: 3px solid #f3f4f6;
            padding-left: 14px;
        }

        .info-label {
            font-size: 0.8rem;
            color: #6b7280;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 0.95rem;
            color: #1f2937;
            font-weight: 600;
        }

        /* FORMULARIO */
        .form-card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .form-header {
            padding: 20px 28px;
            background: #fafafa;
            border-bottom: 2px solid #f3f4f6;
        }

        .form-header h3 {
            font-size: 1.15rem;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        .form-body {
            padding: 32px 28px;
        }

        /* CAMPOS DE FORMULARIO */
        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-label .required {
            color: #b91c1c;
            margin-left: 3px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 12px 16px;
            font-size: 0.9rem;
            color: #1f2937;
            background: #ffffff;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #b91c1c;
            box-shadow: 0 0 0 3px rgba(185, 28, 28, 0.1);
        }

        .form-input.error,
        .form-select.error,
        .form-textarea.error {
            border-color: #dc2626;
        }

        .form-textarea {
            resize: vertical;
            min-height: 90px;
        }

        .form-hint {
            display: block;
            margin-top: 6px;
            font-size: 0.8rem;
            color: #6b7280;
        }

        .form-error {
            display: block;
            margin-top: 6px;
            font-size: 0.8rem;
            color: #dc2626;
            font-weight: 500;
        }

        /* 🆕 BADGE PARA AÑO LECTIVO ACTUAL */
        .badge-actual {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 4px;
            margin-left: 8px;
        }

        /* ALERTA INFO */
        .alert-info {
            background: #eff6ff;
            border-left: 4px solid #3b82f6;
            border-radius: 8px;
            padding: 18px 20px;
            margin-bottom: 24px;
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

        /* ALERTA WARNING */
        .alert-warning {
            background: #fffbeb;
            border: 1.5px solid #fbbf24;
            border-radius: 8px;
            padding: 12px 16px;
            margin-top: 10px;
            font-size: 0.85rem;
            color: #92400e;
        }

        .alert-warning a {
            color: #b91c1c;
            font-weight: 600;
            text-decoration: underline;
        }

        /* BOTONES */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            padding-top: 24px;
            border-top: 1.5px solid #f3f4f6;
        }

        .btn {
            padding: 11px 24px;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
            border: none;
        }

        .btn-secondary {
            background: transparent;
            color: #4b5563;
            border: 1.5px solid #d1d5db;
        }

        .btn-secondary:hover {
            background: #f9fafb;
            border-color: #9ca3af;
        }

        .btn-primary {
            background: #b91c1c;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #991b1b;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(185, 28, 28, 0.25);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .form-body {
                padding: 24px 20px;
            }

            .form-actions {
                flex-direction: column;
                gap: 10px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>

    <div class="asignar-container">
        
        <!-- Información del Estudiante -->
        <div class="info-card">
            <h3>
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Información del Estudiante
            </h3>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Nombres Completos</div>
                    <div class="info-value">{{ $estudiante->nombres }} {{ $estudiante->apellidos }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Cédula</div>
                    <div class="info-value">{{ $estudiante->cedula }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Institución</div>
                    <div class="info-value">{{ $estudiante->institucion->nombre ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Carrera</div>
                    <div class="info-value">{{ $estudiante->carrera->nombre ?? 'N/A' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Email</div>
                    <div class="info-value">{{ $estudiante->email }}</div>
                </div>
            </div>
        </div>

        <!-- Formulario de Asignación -->
        <div class="form-card">
            <div class="form-header">
                <h3>Asignar Nueva Práctica</h3>
            </div>

            <form action="{{ route('admin.practica.store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $estudiante->id }}">

                <div class="form-body">
                    
                    {{-- 🆕 AÑO LECTIVO - NUEVO CAMPO --}}
                    <div class="form-group">
                        <label for="anio_lectivo" class="form-label">
                            Año Lectivo<span class="required">*</span>
                        </label>
                        <select name="anio_lectivo" 
                                id="anio_lectivo" 
                                required
                                class="form-select @error('anio_lectivo') error @enderror">
                            <option value="">Seleccione el año lectivo</option>
                            @foreach($aniosLectivos as $anio)
                                <option value="{{ $anio }}" 
                                    {{ old('anio_lectivo', $anioLectivoActual) == $anio ? 'selected' : '' }}>
                                    {{ $anio }}
                                    @if($anio == $anioLectivoActual)
                                        (Actual)
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        @error('anio_lectivo')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                        <span class="form-hint">
                            Período académico al que corresponde esta práctica. 
                            Año actual: <strong>{{ $anioLectivoActual }}</strong>
                        </span>
                    </div>

                    <!-- Tipo de Práctica -->
                    <div class="form-group">
                        <label for="tipo" class="form-label">
                            Tipo de Práctica<span class="required">*</span>
                        </label>
                        <select name="tipo" 
                                id="tipo" 
                                required
                                class="form-select @error('tipo') error @enderror">

                            <option value="">Seleccione el tipo de práctica</option>

                            {{-- REASIGNACIÓN: mantener el tipo rechazado --}}
                            @if(isset($practicaRechazada))
                                <option value="{{ $practicaRechazada->tipo }}" selected>
                                    Práctica {{ $practicaRechazada->tipo }}
                                </option>
                            @else
                                {{-- Asignación normal --}}
                                @if(!$practicaI)
                                    <option value="I" {{ old('tipo') == 'I' ? 'selected' : '' }}>
                                        Práctica I
                                    </option>
                                @endif

                                @if($practicaI && $practicaI->estado === 'aprobada' && !$practicaII)
                                    <option value="II" {{ old('tipo') == 'II' ? 'selected' : '' }}>
                                        Práctica II
                                    </option>
                                @endif
                            @endif
                        </select>

                        @error('tipo')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                        <span class="form-hint">
                            @if(!$practicaI)
                                El estudiante debe completar primero la Práctica I
                            @elseif($practicaI && $practicaI->estado !== 'aprobada')
                                Debe aprobar la Práctica I antes de asignar la Práctica II
                            @endif
                        </span>
                    </div>

                    <!-- Lugar de Práctica -->
                    <div class="form-group">
                        <label for="lugar_practica_id" class="form-label">
                            Lugar de Práctica<span class="required">*</span>
                        </label>
                        <select name="lugar_practica_id" 
                                id="lugar_practica_id" 
                                required
                                class="form-select @error('lugar_practica_id') error @enderror">
                            <option value="">Seleccione un lugar</option>
                            @foreach($lugaresPractica as $lugar)
                                <option value="{{ $lugar->id }}" {{ old('lugar_practica_id') == $lugar->id ? 'selected' : '' }}>
                                    {{ $lugar->nombre }} - {{ $lugar->direccion }}
                                </option>
                            @endforeach
                        </select>
                        @error('lugar_practica_id')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                        @if($lugaresPractica->isEmpty())
                            <div class="alert-warning">
                                ⚠️ No hay lugares de práctica disponibles. 
                                <a href="{{ route('admin.lugares.create') }}">Crear uno aquí</a>
                            </div>
                        @endif
                    </div>

                    <!-- Horas Requeridas -->
                    <div class="form-group">
                        <label for="horas_requeridas" class="form-label">
                            Horas Requeridas<span class="required">*</span>
                        </label>
                        <input type="number" 
                               name="horas_requeridas" 
                               id="horas_requeridas" 
                               min="1"
                               max="500"
                               value="{{ old('horas_requeridas', 40) }}"
                               required
                               placeholder="Ej: 40"
                               class="form-input @error('horas_requeridas') error @enderror">
                        @error('horas_requeridas')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                        <span class="form-hint">Número de horas que debe completar el estudiante</span>
                    </div>

                    <!-- Fecha de Inicio -->
                    <div class="form-group">
                        <label for="fecha_inicio" class="form-label">
                            Fecha de Inicio<span class="required">*</span>
                        </label>
                        <input type="date" 
                               name="fecha_inicio" 
                               id="fecha_inicio"
                               min="{{ \Carbon\Carbon::today()->addDays(2)->toDateString() }}"
                                value="{{ old('fecha_inicio', \Carbon\Carbon::today()->addDays(2)->toDateString()) }}"
                                required
                                class="form-input @error('fecha_inicio') error @enderror">
                        @error('fecha_inicio')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                        <span class="form-hint">Fecha en la que el estudiante debe comenzar la práctica</span>
                    </div>

                    <!-- Observaciones Iniciales -->
                    <div class="form-group">
                        <label for="observaciones" class="form-label">
                            Observaciones Iniciales (opcional)
                        </label>
                        <textarea name="observaciones" 
                                  id="observaciones" 
                                  placeholder="Instrucciones especiales o información adicional para el estudiante..."
                                  class="form-textarea @error('observaciones') error @enderror">{{ old('observaciones') }}</textarea>
                        @error('observaciones')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Información adicional -->
                    <div class="alert-info">
                        <div class="alert-info-content">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div class="alert-info-text">
                                <p>Información importante:</p>
                                <ul>
                                    <li>El estudiante recibirá un email con los detalles de la práctica asignada</li>
                                    <li>Una vez asignada, el estudiante deberá completar las horas y subir su certificado</li>
                                    <li>Podrás revisar y aprobar/rechazar el documento cuando lo suba</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="form-actions">
                        <a href="{{ route('admin.estudiantes.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Asignar Práctica
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</x-admin-layout>