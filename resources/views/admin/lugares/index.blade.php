<x-admin-layout>
    <x-slot name="header">
        Lugares de Práctica
    </x-slot>

    <style>
        /* BOTÓN AGREGAR */
        .btn-add {
            display: inline-flex;
            align-items: center;
            padding: 12px 24px;
            background: #024ee8;
            color: #ffffff;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s ease;
            margin-bottom: 24px;
        }

        .btn-add:hover {
            background: #1040a0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(185, 28, 28, 0.25);
        }

        .btn-add svg {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }

        /* CONTENEDOR TABLA */
        .lugares-container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        /* TABLA */
        .lugares-table {
            width: 100%;
            border-collapse: collapse;
        }

        .lugares-table thead {
            background: #f9fafb;
        }

        .lugares-table th {
            padding: 14px 20px;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #6b7280;
            border-bottom: 1px solid #e5e7eb;
        }

        .lugares-table th.text-center {
            text-align: center;
        }

        .lugares-table tbody tr {
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.2s ease;
        }

        .lugares-table tbody tr:hover {
            background: #fef2f2;
        }

        .lugares-table tbody tr:last-child {
            border-bottom: none;
        }

        .lugares-table td {
            padding: 16px 20px;
            font-size: 0.9rem;
            color: #4b5563;
        }

        .lugares-table td.font-medium {
            font-weight: 600;
            color: #1f2937;
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

        .badge-active {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-inactive {
            background: #f3f4f6;
            color: #4b5563;
        }

        /* BOTONES DE ACCIÓN */
        .actions-cell {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .btn-icon {
            padding: 8px;
            background: transparent;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .btn-icon svg {
            width: 20px;
            height: 20px;
        }

        .btn-edit {
            color: #3b82f6;
        }

        .btn-edit:hover {
            background: #eff6ff;
            color: #1e40af;
        }

        .btn-delete {
            color: #dc2626;
        }

        .btn-delete:hover {
            background: #fef2f2;
            color: #991b1b;
        }

        /* ESTADO VACÍO */
        .empty-state {
            padding: 64px 24px;
            text-align: center;
        }

        .empty-state svg {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            color: #d1d5db;
        }

        .empty-state p {
            font-size: 1rem;
            color: #6b7280;
            margin-bottom: 16px;
        }

        .empty-state a {
            display: inline-flex;
            align-items: center;
            color: #b91c1c;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .empty-state a:hover {
            color: #991b1b;
            transform: translateX(4px);
        }

        .empty-state a::after {
            content: '→';
            margin-left: 8px;
            font-size: 1.2rem;
        }

        /* RESPONSIVE */
        @media (max-width: 1200px) {
            .lugares-table {
                font-size: 0.85rem;
            }

            .lugares-table th,
            .lugares-table td {
                padding: 12px 14px;
            }
        }

        @media (max-width: 768px) {
            .btn-add {
                width: 100%;
                justify-content: center;
            }

            .actions-cell {
                gap: 8px;
            }
        }
    </style>

    <!-- Botón Agregar -->
    <a href="{{ route('admin.lugares.create') }}" class="btn-add">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Agregar Nuevo Lugar
    </a>

    <!-- Tabla de Lugares -->
    <div class="lugares-container">
        <div style="overflow-x: auto;">
            <table class="lugares-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lugares as $lugar)
                        <tr>
                            <td class="font-medium">{{ $lugar->nombre }}</td>
                            <td>{{ $lugar->direccion }}</td>
                            <td>{{ $lugar->telefono ?? 'N/A' }}</td>
                            <td>{{ $lugar->email ?? 'N/A' }}</td>
                            <td class="text-center">
                                @if($lugar->activo)
                                    <span class="badge badge-active">Activo</span>
                                @else
                                    <span class="badge badge-inactive">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <a href="{{ route('admin.lugares.edit', $lugar) }}" 
                                       class="btn-icon btn-edit"
                                       title="Editar">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.lugares.destroy', $lugar) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('¿Estás seguro de eliminar este lugar?');"
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn-icon btn-delete"
                                                title="Eliminar">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <p>No hay lugares de práctica registrados</p>
                                    <a href="{{ route('admin.lugares.create') }}">
                                        Crear el primer lugar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>