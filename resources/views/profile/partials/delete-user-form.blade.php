<section>
    <style>
        .delete-card {
            background: transparent;
            border-radius: 0;
            box-shadow: none;
            overflow: visible;
        }

        .delete-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0 0 8px 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .delete-header-icon {
            width: 28px;
            height: 28px;
            color: #dc2626;
        }

        .delete-header p {
            font-size: 0.95rem;
            color: #6b7280;
            margin: 0;
            line-height: 1.5;
        }

        .delete-body {
            padding: 32px 0;
        }

        .warning-box {
            padding: 20px;
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border: 2px solid #fbbf24;
            border-radius: 12px;
            margin-bottom: 24px;
        }

        .warning-content {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .warning-icon {
            width: 24px;
            height: 24px;
            color: #92400e;
            flex-shrink: 0;
        }

        .warning-text {
            flex: 1;
        }

        .warning-text h3 {
            font-size: 1rem;
            font-weight: 700;
            color: #78350f;
            margin: 0 0 8px 0;
        }

        .warning-text p {
            font-size: 0.875rem;
            color: #92400e;
            margin: 0;
            line-height: 1.6;
        }

        .btn-danger {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 28px;
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            color: #ffffff;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #b91c1c 0%, #7f1d1d 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }

        .btn-danger svg {
            width: 18px;
            height: 18px;
            margin-right: 8px;
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 50;
            padding: 16px;
        }

        .modal-content {
            background: white;
            border-radius: 16px;
            max-width: 500px;
            width: 100%;
            padding: 32px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            margin-bottom: 20px;
        }

        .modal-header h2 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0 0 8px 0;
        }

        .modal-header p {
            font-size: 0.875rem;
            color: #6b7280;
            margin: 0;
            line-height: 1.5;
        }

        .modal-body {
            margin-bottom: 24px;
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
        }

        .form-error {
            font-size: 0.8rem;
            color: #dc2626;
            margin-top: 4px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn-secondary {
            padding: 10px 24px;
            background: #f3f4f6;
            color: #374151;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 8px;
            border: 2px solid #e5e7eb;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }

        .btn-delete-confirm {
            padding: 10px 24px;
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            color: #ffffff;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-delete-confirm:hover {
            background: linear-gradient(135deg, #b91c1c 0%, #7f1d1d 100%);
        }

        @media (max-width: 768px) {
            .delete-header h2 {
                font-size: 1.25rem;
            }

            .modal-content {
                padding: 24px;
            }

            .modal-actions {
                flex-direction: column-reverse;
            }

            .btn-secondary,
            .btn-delete-confirm {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="delete-card">
        <!-- Header -->
        <div class="delete-header">
            <h2>
                <svg class="delete-header-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                Eliminar Cuenta
            </h2>
            <p>Esta acción es permanente y no se puede deshacer.</p>
        </div>

        <!-- Body -->
        <div class="delete-body">
            <!-- Warning Box -->
            <div class="warning-box">
                <div class="warning-content">
                    <svg class="warning-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <div class="warning-text">
                        <h3>⚠️ Advertencia Importante</h3>
                        <p>Una vez que elimines tu cuenta, todos tus recursos y datos se eliminarán permanentemente. Esta acción no se puede deshacer. Por favor, descarga cualquier información que desees conservar antes de proceder.</p>
                    </div>
                </div>
            </div>

            <!-- Delete Button -->
            <button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                class="btn-danger"
            >
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Eliminar Mi Cuenta
            </button>
        </div>
    </div>

    <!-- Modal de Confirmación -->
    <div
        x-data="{ show: false }"
        x-on:open-modal.window="$event.detail === 'confirm-user-deletion' ? show = true : null"
        x-on:close.stop="show = false"
        x-on:keydown.escape.window="show = false"
        x-show="show"
        class="modal-overlay"
        style="display: none;"
    >
        <div
            x-show="show"
            x-transition
            x-on:click.away="show = false"
            class="modal-content"
        >
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div class="modal-header">
                    <h2>¿Estás seguro de que deseas eliminar tu cuenta?</h2>
                    <p>Una vez que se elimine tu cuenta, todos tus recursos y datos se eliminarán permanentemente. Por favor, ingresa tu contraseña para confirmar que deseas eliminar permanentemente tu cuenta.</p>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="password" class="form-label">Contraseña</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="Ingresa tu contraseña"
                            required
                        />
                        @if($errors->userDeletion->get('password'))
                            <div class="form-error">
                                {{ $errors->userDeletion->get('password')[0] }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="modal-actions">
                    <button
                        type="button"
                        x-on:click="show = false"
                        class="btn-secondary"
                    >
                        Cancelar
                    </button>
                    <button type="submit" class="btn-delete-confirm">
                        Eliminar Cuenta
                    </button>
                </div>
            </form>
        </div>
    </div>

</section>