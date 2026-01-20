<x-admin-layout>
    <x-slot name="header">
        Editar Lugar de Práctica
    </x-slot>

    <style>
        /* CONTENEDOR */
        .edit-container {
            max-width: 800px;
        }

        /* TARJETA FORMULARIO */
        .form-card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .form-content {
            padding: 32px;
        }

        /* CAMPOS */
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

        .form-input {
            width: 100%;
            padding: 12px 16px;
            font-size: 0.9rem;
            color: #1f2937;
            background: #ffffff;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #b91c1c;
            box-shadow: 0 0 0 3px rgba(185, 28, 28, 0.1);
        }

        .form-input.error {
            border-color: #dc2626;
        }

        .form-error {
            display: block;
            margin-top: 6px;
            font-size: 0.8rem;
            color: #dc2626;
            font-weight: 500;
        }

        /* CHECKBOX */
        .checkbox-group {
            display: flex;
            align-items: center;
            padding: 16px;
            background: #f9fafb;
            border-radius: 8px;
            border: 1.5px solid #e5e7eb;
            transition: all 0.2s ease;
        }

        .checkbox-group:hover {
            background: #fef2f2;
            border-color: #fecaca;
        }

        .checkbox-input {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #b91c1c;
            margin-right: 12px;
        }

        .checkbox-label {
            font-size: 0.9rem;
            color: #374151;
            cursor: pointer;
            user-select: none;
        }

        /* BOTONES */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            padding-top: 24px;
            border-top: 1.5px solid #f3f4f6;
            margin-top: 32px;
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
            background: #024ee8;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #0b45ba;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(185, 28, 28, 0.25);
        }

        /* ICON DECORATIVO */
        .form-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg,#024ee8 0%, #024ee8 100%);
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(185, 28, 28, 0.2);
        }

        .form-icon svg {
            width: 24px;
            height: 24px;
            color: #ffffff;
        }

        .form-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
        }

        .form-subtitle {
            font-size: 0.9rem;
            color: #6b7280;
            margin-bottom: 32px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .form-content {
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

    <div class="edit-container">
        <div class="form-card">
            <div class="form-content">
                <!-- Header con icono -->
                <div class="form-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>

                <h2 class="form-title">Editar Lugar de Práctica</h2>
                <p class="form-subtitle">Actualiza la información del lugar de práctica</p>

                <form action="{{ route('admin.lugares.update', $lugar->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="nombre" class="form-label">
                            Nombre del Lugar<span class="required">*</span>
                        </label>
                        <input type="text"
                               name="nombre"
                               id="nombre"
                               value="{{ old('nombre', $lugar->nombre) }}"
                               required
                               placeholder="Ej: Hospital General"
                               class="form-input @error('nombre') error @enderror">
                        @error('nombre')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Dirección -->
                    <div class="form-group">
                        <label for="direccion" class="form-label">
                            Dirección<span class="required">*</span>
                        </label>
                        <input type="text"
                               name="direccion"
                               id="direccion"
                               value="{{ old('direccion', $lugar->direccion) }}"
                               required
                               placeholder="Ej: Av. Principal #123, Centro"
                               class="form-input @error('direccion') error @enderror">
                        @error('direccion')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Teléfono -->
                    <div class="form-group">
                        <label for="telefono" class="form-label">
                            Teléfono
                        </label>
                        <input type="text"
                               name="telefono"
                               id="telefono"
                               value="{{ old('telefono', $lugar->telefono) }}"
                               placeholder="Ej: 05 2345-678"
                               class="form-input @error('telefono') error @enderror">
                        @error('telefono')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="form-label">
                            Email de Contacto
                        </label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email', $lugar->email) }}"
                               placeholder="contacto@lugar.com"
                               class="form-input @error('email') error @enderror">
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Estado Activo -->
                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox"
                                   name="activo"
                                   id="activo"
                                   value="1"
                                   {{ old('activo', $lugar->activo) ? 'checked' : '' }}
                                   class="checkbox-input">
                            <label for="activo" class="checkbox-label">
                                Lugar activo (disponible para asignar a estudiantes)
                            </label>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="form-actions">
                        <a href="{{ route('admin.lugares.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Actualizar Lugar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-admin-layout>