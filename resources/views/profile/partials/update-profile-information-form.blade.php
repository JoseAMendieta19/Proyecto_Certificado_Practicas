<section>
    <style>
        .profile-card {
            background: transparent;
            border-radius: 0;
            box-shadow: none;
            overflow: visible;
        }

        .profile-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0 0 8px 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-header-icon {
            width: 28px;
            height: 28px;
            color: #dc2626;
        }

        .profile-header p {
            font-size: 0.95rem;
            color: #6b7280;
            margin: 0;
            line-height: 1.5;
        }

        .profile-body {
            padding: 32px 0;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
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
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-label svg {
            width: 16px;
            height: 16px;
            color: #6b7280;
        }

        .form-input-disabled {
            width: 100%;
            padding: 12px 16px;
            font-size: 0.95rem;
            color: #6b7280;
            background: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-family: inherit;
            cursor: not-allowed;
        }

        .institution-note {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 24px;
            padding: 12px 16px;
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border: 1px solid #3b82f6;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #1e40af;
        }

        .institution-note svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        @media (max-width: 768px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }

            .profile-header h2 {
                font-size: 1.25rem;
            }

            .profile-body {
                padding: 24px 0;
            }
        }
    </style>

    <div class="profile-card">
        <!-- Header -->
        <div class="profile-header">
            <h2>
                <svg class="profile-header-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Información Personal
            </h2>
            <p>Datos registrados en el sistema institucional.</p>
        </div>

        <!-- Body -->
        <div class="profile-body">
            <div class="profile-grid">
                <!-- Nombres -->
                <div class="form-group">
                    <label class="form-label">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Nombres
                    </label>
                    <input 
                        type="text" 
                        class="form-input-disabled" 
                        value="{{ $user->nombres ?? $user->name }}" 
                        disabled
                        readonly
                    />
                </div>

                <!-- Apellidos -->
                <div class="form-group">
                    <label class="form-label">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Apellidos
                    </label>
                    <input 
                        type="text" 
                        class="form-input-disabled" 
                        value="{{ $user->apellidos ?? 'N/A' }}" 
                        disabled
                        readonly
                    />
                </div>

                <!-- Cédula -->
                <div class="form-group">
                    <label class="form-label">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                        </svg>
                        Cédula
                    </label>
                    <input 
                        type="text" 
                        class="form-input-disabled" 
                        value="{{ $user->cedula ?? 'N/A' }}" 
                        disabled
                        readonly
                    />
                </div>

                <!-- Correo Electrónico -->
                <div class="form-group">
                    <label class="form-label">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Correo Electrónico
                    </label>
                    <input 
                        type="email" 
                        class="form-input-disabled" 
                        value="{{ $user->email }}" 
                        disabled
                        readonly
                    />
                </div>

                @if($user->rol === 'estudiante')
                <!-- Carrera (Solo estudiantes) -->
                <div class="form-group">
                    <label class="form-label">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        Carrera
                    </label>
                    <input 
                        type="text" 
                        class="form-input-disabled" 
                        value="{{ $user->carrera->nombre ?? 'N/A' }}" 
                        disabled
                        readonly
                    />
                </div>

                <!-- Institución (Solo estudiantes) -->
<div class="form-group">
    <label class="form-label">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
        </svg>
        Institución
    </label>
    <input 
        type="text" 
        class="form-input-disabled" 
        value="{{ $user->institucion->nombre ?? 'N/A' }}" 
        disabled
        readonly
    />
</div>
                @endif
            </div>

            <!-- Nota informativa -->
            <div class="institution-note">
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                @if($user->rol === 'estudiante')
                    Estos datos son administrados por la institución y no pueden ser modificados por el estudiante.
                @else
                    Estos datos son administrados por la institución y no pueden ser modificados
                @endif
            </div>
        </div>
    </div>

</section>