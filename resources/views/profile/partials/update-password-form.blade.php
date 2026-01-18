<section>
    <style>
        .password-card {
            background: transparent;
            border-radius: 0;
            box-shadow: none;
            overflow: visible;
        }

        .password-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0 0 8px 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .password-header-icon {
            width: 28px;
            height: 28px;
            color: #dc2626;
        }

        .password-header p {
            font-size: 0.95rem;
            color: #6b7280;
            margin: 0;
            line-height: 1.5;
        }

        .password-body {
            padding: 32px 0;
        }

        .password-form {
            display: flex;
            flex-direction: column;
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

        .form-actions {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 8px;
            padding-top: 24px;
            border-top: 2px solid #f3f4f6;
        }

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

        @media (max-width: 768px) {
            .password-header h2 {
                font-size: 1.25rem;
            }

            .password-body {
                padding: 24px 0;
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

    <div class="password-card">
        <!-- Header -->
        <div class="password-header">
            <h2>
                <svg class="password-header-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                Actualizar Contraseña
            </h2>
            <p>Asegúrate de usar una contraseña segura para proteger tu cuenta.</p>
        </div>

        <!-- Body -->
        <div class="password-body">
            <form method="post" action="{{ route('password.update') }}" class="password-form">
                @csrf
                @method('put')

                <!-- Contraseña Actual -->
                <div class="form-group">
                    <label for="update_password_current_password" class="form-label">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Contraseña Actual
                    </label>
                    <input 
                        type="password" 
                        id="update_password_current_password" 
                        name="current_password" 
                        class="form-input" 
                        autocomplete="current-password"
                        placeholder="Ingresa tu contraseña actual"
                        required
                    />
                    @if($errors->updatePassword->get('current_password'))
                        <div class="form-error">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            {{ $errors->updatePassword->get('current_password')[0] }}
                        </div>
                    @endif
                </div>

                <!-- Nueva Contraseña -->
                <div class="form-group">
                    <label for="update_password_password" class="form-label">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                        </svg>
                        Nueva Contraseña
                    </label>
                    <input 
                        type="password" 
                        id="update_password_password" 
                        name="password" 
                        class="form-input" 
                        autocomplete="new-password"
                        placeholder="Ingresa tu nueva contraseña"
                        required
                    />
                    @if($errors->updatePassword->get('password'))
                        <div class="form-error">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            {{ $errors->updatePassword->get('password')[0] }}
                        </div>
                    @endif
                </div>

                <!-- Confirmar Contraseña -->
                <div class="form-group">
                    <label for="update_password_password_confirmation" class="form-label">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Confirmar Nueva Contraseña
                    </label>
                    <input 
                        type="password" 
                        id="update_password_password_confirmation" 
                        name="password_confirmation" 
                        class="form-input" 
                        autocomplete="new-password"
                        placeholder="Confirma tu nueva contraseña"
                        required
                    />
                    @if($errors->updatePassword->get('password_confirmation'))
                        <div class="form-error">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            {{ $errors->updatePassword->get('password_confirmation')[0] }}
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
                        Actualizar Contraseña
                    </button>

                    @if (session('status') === 'password-updated')
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
                            Contraseña actualizada correctamente
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

</section>
