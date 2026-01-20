<x-admin-layout>
    <x-slot name="header">
        Lugares de Práctica
    </x-slot>

    <style>
        /* 🆕 CONTENEDOR DE BOTONES SUPERIOR */
        .top-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            gap: 16px;
        }

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
        }

        .btn-add:hover {
            background: #1040a0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(2, 78, 232, 0.25);
        }

        .btn-add svg {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }

        /* 🆕 FORMULARIO DE BÚSQUEDA */
        .search-form {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .search-input {
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.9rem;
            width: 320px;
            outline: none;
            transition: all 0.2s;
        }

        .search-input:focus {
            border-color: #024ee8;
            box-shadow: 0 0 0 3px rgba(2, 78, 232, 0.1);
        }

        .btn-search {
            background: #024ee8;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.9rem;
        }

        .btn-search:hover {
            background: #1040a0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(2, 78, 232, 0.25);
        }

        .btn-clear {
            background: #6b7280;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
            font-size: 0.9rem;
        }

        .btn-clear:hover {
            background: #4b5563;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(107, 114, 128, 0.25);
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
            background: #eff6ff;
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
            color: #024ee8;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .empty-state a:hover {
            color: #1040a0;
            transform: translateX(4px);
        }

        .empty-state a::after {
            content: '→';
            margin-left: 8px;
            font-size: 1.2rem;
        }

        /* RESPONSIVE */
        @media (max-width: 1200px) {
            .top-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .search-form {
                width: 100%;
            }

            .search-input {
                flex: 1;
                width: 100%;
            }

            .btn-add {
                width: 100%;
                justify-content: center;
            }

            .lugares-table {
                font-size: 0.85rem;
            }

            .lugares-table th,
            .lugares-table td {
                padding: 12px 14px;
            }
        }

        @media (max-width: 768px) {
            .actions-cell {
                gap: 8px;
            }
        }
    </style>

    {{-- 🆕 SECCIÓN SUPERIOR: Botón Agregar + Buscador --}}
    <div class="top-actions">
        <!-- Botón Agregar -->
        <a href="{{ route('admin.lugares.create') }}" class="btn-add">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Agregar Nuevo Lugar
        </a>

        <!-- 🔍 FORMULARIO DE BÚSQUEDA -->
        <form method="GET" action="{{ route('admin.lugares.index') }}" class="search-form">
            <input 
                type="text" 
                name="search" 
                class="search-input"
                placeholder="🔍 Buscar por nombre o dirección..." 
                value="{{ request('search') }}"
            >
            
            <button type="submit" class="btn-search">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 18px; height: 18px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                Buscar
            </button>

            {{-- Botón limpiar (solo si hay búsqueda activa) --}}
            @if(request('search'))
                <a href="{{ route('admin.lugares.index') }}" class="btn-clear">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 18px; height: 18px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Limpiar
                </a>
            @endif
        </form>
    </div>

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
                                        @if(request('search'))
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        @else
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        @endif
                                    </svg>
                                    
                                    @if(request('search'))
                                        <p>No se encontraron lugares que coincidan con: <strong>"{{ request('search') }}"</strong></p>
                                        <a href="{{ route('admin.lugares.index') }}">
                                            Ver todos los lugares
                                        </a>
                                    @else
                                        <p>No hay lugares de práctica registrados</p>
                                        <a href="{{ route('admin.lugares.create') }}">
                                            Crear el primer lugar
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>