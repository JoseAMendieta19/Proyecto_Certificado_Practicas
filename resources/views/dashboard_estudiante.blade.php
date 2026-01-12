<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard del Estudiante
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Mensaje de bienvenida -->
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded">
                <div class="flex">
                    <svg class="w-6 h-6 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <p class="font-medium text-blue-800">Bienvenido, {{ Auth::user()->nombres }}!</p>
                        <p class="text-sm text-blue-700 mt-1">Aquí puedes gestionar tus prácticas profesionales</p>
                    </div>
                </div>
            </div>

            <!-- Mis Prácticas -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-900">Mis Prácticas</h3>
                </div>

                <div class="p-6">
                    @php
                        $practicas = Auth::user()->practicas;
                    @endphp

                    @forelse($practicas as $practica)
                        <div class="mb-6 last:mb-0 border-2 rounded-lg p-6 
                            {{ $practica->estado === 'aprobada' ? 'border-green-500 bg-green-50' : 
                               ($practica->estado === 'rechazada' ? 'border-red-500 bg-red-50' : 
                               ($practica->estado === 'pendiente_revision' ? 'border-yellow-500 bg-yellow-50' : 'border-blue-500 bg-blue-50')) }}">
                            
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h4 class="text-xl font-bold text-gray-900">Práctica {{ $practica->tipo }}</h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        <strong>Lugar:</strong> {{ $practica->lugarPractica->nombre ?? 'N/A' }}
                                    </p>
                                </div>
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full
                                    {{ $practica->estado === 'asignada' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $practica->estado === 'pendiente_revision' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $practica->estado === 'aprobada' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $practica->estado === 'rechazada' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst(str_replace('_', ' ', $practica->estado)) }}
                                </span>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <p class="text-sm text-gray-600"><strong>Horas requeridas:</strong></p>
                                    <p class="text-lg font-semibold">{{ $practica->horas_requeridas }} horas</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600"><strong>Fecha de inicio:</strong></p>
                                    <p class="text-lg font-semibold">{{ $practica->fecha_inicio ? $practica->fecha_inicio->format('d/m/Y') : 'No asignada' }}</p>
                                </div>
                            </div>

                            @if($practica->observaciones)
                                <div class="bg-white border-l-4 border-gray-400 p-3 rounded mt-4">
                                    <p class="text-sm font-medium text-gray-700">Observaciones:</p>
                                    <p class="text-sm text-gray-600 mt-1">{{ $practica->observaciones }}</p>
                                </div>
                            @endif

                            <!-- Acciones según el estado -->
                            <div class="mt-4 flex items-center space-x-3">
                                
                                @if($practica->estado === 'asignada')
                                    <!-- Formulario para subir documento -->
                                    <form action="{{ route('estudiante.practica.subir', $practica->id) }}" 
                                          method="POST" 
                                          enctype="multipart/form-data"
                                          class="flex items-center space-x-3 w-full">
                                        @csrf
                                        <div class="flex-1">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Fecha de finalización</label>
                                            <input type="date" 
                                                   name="fecha_finalizacion" 
                                                   required
                                                   max="{{ date('Y-m-d') }}"
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                        </div>
                                        <div class="flex-1">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Subir certificado (PDF)</label>
                                            <input type="file" 
                                                   name="archivo" 
                                                   accept=".pdf"
                                                   required
                                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                        </div>
                                        <div class="pt-6">
                                            <button type="submit" 
                                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                                Enviar para revisión
                                            </button>
                                        </div>
                                    </form>

                                @elseif($practica->estado === 'pendiente_revision')
                                    <div class="flex items-center text-yellow-700">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="font-medium">Documento en revisión por el administrador</span>
                                    </div>

                                @elseif($practica->estado === 'aprobada')
                                    <div class="flex items-center space-x-4">
                                        <div class="flex items-center text-green-700">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class="font-medium">¡Práctica aprobada!</span>
                                        </div>
                                        
                                        <!-- Botones de descarga -->
                                        <a href="{{ route('certificado.vista', $practica) }}" 
                                           target="_blank"
                                           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Ver Certificado
                                        </a>
                                        
                                        <a href="{{ route('certificado.descargar', $practica) }}" 
                                           class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                      d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            Descargar PDF
                                        </a>
                                    </div>

                                @elseif($practica->estado === 'rechazada')
                                    <div class="flex items-center text-red-700">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="font-medium">Práctica rechazada - Revisa las observaciones y vuelve a subir el documento</span>
                                    </div>
                                @endif

                            </div>

                        </div>
                    @empty
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            <p class="mt-2 text-gray-500 font-medium">No tienes prácticas asignadas aún</p>
                            <p class="text-sm text-gray-400">El administrador te asignará una práctica pronto</p>
                        </div>
                    @endforelse

                </div>
            </div>

        </div>
    </div>
</x-app-layout>