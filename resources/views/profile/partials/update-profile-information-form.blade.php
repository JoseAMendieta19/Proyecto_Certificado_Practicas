<section>
    <style>
        /* CONTENEDOR DE PERFIL */
        .profile-card {
    background: transparent;
    border-radius: 0;
    box-shadow: none;
    overflow: visible;
}


        

        .profile-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            margin: 0 0 8px 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-header-icon {
            width: 28px;
            height: 28px;
            color: #d30f0f;
        }

        .profile-header p {
            font-size: 0.95rem;
            color: #131111;
            margin: 0;
            line-height: 1.5;
        }

        /* BODY DEL CARD */
        .profile-body {
            padding: 32px;
        }

        /* FORMULARIO */
        .profile-form {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        /* GRUPO DE CAMPO */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        /* LABEL */
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

        /* INPUT */
        .form-input {
            width: 100%;
            padding: 12px 16px;
            font-size: 0.95rem;
            color: #1f2937;
            background: #ffffff;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .form-input:focus {
            outline: none;
            border-color: #dc2626;
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1);
            background: #ffffff;
        }

        .form-input:hover:not(:focus) {
            border-color: #d1d5db;
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        /* ERROR MESSAGE */
        .form-error {
            font-size: 0.8rem;
            color: #dc2626;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 4px;
        }

        .form-error svg {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        /* ALERTA DE VERIFICACIÓN */
        .verification-alert {
            margin-top: 12px;
            padding: 14px 18px;
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border: 2px solid #fbbf24;
            border-radius: 10px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .verification-alert svg {
            width: 20px;
            height: 20px;
            color: #92400e;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .verification-content {
            flex: 1;
        }

        .verification-text {
            font-size: 0.875rem;
            color: #78350f;
            margin: 0 0 8px 0;
            line-height: 1.5;
        }

        .verification-button {
            display: inline-flex;
            align-items: center;
            padding: 6px 14px;
            background: #92400e;
            color: #ffffff;
            font-size: 0.8rem;
            font-weight: 600;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .verification-button:hover {
            background: #78350f;
            transform: translateY(-1px);
        }

        /* MENSAJE DE ÉXITO VERIFICACIÓN */
        .verification-success {
            margin-top: 10px;
            padding: 10px 14px;
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border: 2px solid #10b981;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #065f46;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .verification-success svg {
            width: 16px;
            height: 16px;
        }

        /* FOOTER CON ACCIONES */
        .form-actions {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 8px;
            padding-top: 24px;
            border-top: 2px solid #f3f4f6;
        }

        /* BOTÓN GUARDAR */
        .btn-save {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 32px;
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: #ffffff;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }

        .btn-save:active {
            transform: translateY(0);
        }

        .btn-save svg {
            width: 18px;
            height: 18px;
            margin-right: 8px;
        }

        /* MENSAJE GUARDADO */
        .saved-message {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 20px;
            border: 2px solid #10b981;
            animation: slideIn 0.3s ease;
        }

        .saved-message svg {
            width: 16px;
            height: 16px;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .profile-header {
                padding: 20px 24px;
            }

            .profile-header h2 {
                font-size: 1.25rem;
            }

            .profile-body {
                padding: 24px;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-save {
                width: 100%;
            }

            .saved-message {
                justify-content: center;
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
                Información del Perfil
            </h2>
            <p>Actualiza la información de tu cuenta y dirección de correo electrónico.</p>
        </div>

        <!-- Body -->
        <div class="profile-body">
            
            <!-- Formulario de verificación oculto -->
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <!-- Formulario principal -->
            <form method="post" action="{{ route('profile.update') }}" class="profile-form">
                @csrf
                @method('patch')

                <!-- Campo Nombre -->
                <div class="form-group">
                    <label for="name" class="form-label">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Nombre
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-input" 
                        value="{{ old('name', $user->name) }}" 
                        required 
                        autofocus 
                        autocomplete="name"
                        placeholder="Ingresa tu nombre completo"
                    />
                    @if($errors->get('name'))
                        <div class="form-error">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            {{ $errors->get('name')[0] }}
                        </div>
                    @endif
                </div>

                <!-- Campo Email -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Correo Electrónico
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input" 
                        value="{{ old('email', $user->email) }}" 
                        required 
                        autocomplete="username"
                        placeholder="correo@ejemplo.com"
                    />
                    @if($errors->get('email'))
                        <div class="form-error">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            {{ $errors->get('email')[0] }}
                        </div>
                    @endif

                    <!-- Alerta de verificación de email -->
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="verification-alert">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <div class="verification-content">
                                <p class="verification-text">
                                    Tu correo electrónico no está verificado.
                                </p>
                                <button type="button" form="send-verification" class="verification-button">
                                    Haz clic aquí para reenviar el correo de verificación.
                                </button>

                                @if (session('status') === 'verification-link-sent')
                                    <div class="verification-success">
                                        <svg fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Acciones -->
                <div class="form-actions">
                    <button type="submit" class="btn-save">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M5 13l4 4L19 7"/>
                        </svg>
                        Guardar
                    </button>

                    @if (session('status') === 'profile-updated')
                        <div
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="saved-message"
                        >
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Guardado.
                        </div>
                    @endif
                </div>
            </form>

        </div>
    </div>

</section>
