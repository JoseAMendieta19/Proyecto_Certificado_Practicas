<x-admin-layout>
    <x-slot name="header">
        Revisar Práctica - {{ $practica->estudiante->nombres }} {{ $practica->estudiante->apellidos }}
    </x-slot>

    <div class="max-w-5xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Información del Estudiante y Práctica -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Datos del Estudiante -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Datos del Estudiante
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Nombre Completo</p>
                            <p class="font-medium text-gray-900">{{ $practica->estudiante->nombres }} {{ $practica->estudiante->apellidos }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium text-gray-900">{{ $practica->estudiante->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Cédula</p>
                            <p class="font-medium text-gray-900">{{ $practica->estudiante->cedula ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Carrera</p>
                            <p class="font-medium text-gray-900">{{ $practica->estudiante->carrera->nombre ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Detalles de la Práctica -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Detalles de la Práctica
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Tipo de Práctica</p>
                            <p class="font-medium text-gray-900">
                                <span class="inline-flex px-2 py-1 text-sm rounded-full bg-blue-100 text-blue-800">
                                    Práctica {{ $practica->tipo }}
                                </span>
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Horas Requeridas</p>
                            <p class="font-medium text-gray-900">{{ $practica->horas_requeridas }} horas</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Lugar de Práctica</p>
                            <p class="font-medium text-gray-900">{{ $practica->lugarPractica->nombre ?? 'N/A' }}</p>
                            <p class="text-sm text-gray-500">{{ $practica->lugarPractica->direccion ?? '' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Fecha de Inicio</p>
                            <p class="font-medium text-gray-900">{{ $practica->fecha_inicio ? $practica->fecha_inicio->format('d/m/Y') : 'N/A' }}</p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-sm text-gray-500">Fecha de Finalización</p>
                            <p class="font-medium text-gray-900">{{ $practica->fecha_finalizacion ? $practica->fecha_finalizacion->format('d/m/Y') : 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Documento Subido -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                        Documento de Validación
                    </h3>
                    @if($practica->archivo_url)
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            <p class="mt-2 text-sm text-gray-600">Documento PDF subido por el estudiante</p>
                            <a href="{{ Storage::url($practica->archivo_url) }}" 
                               target="_blank"
                               class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Ver Documento Completo
                            </a>
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-4">No se ha subido ningún documento</p>
                    @endif
                </div>

            </div>

            <!-- Panel de Acciones -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm p-6 sticky top-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Acciones de Validación</h3>
                    
                    <!-- Formulario Aprobar -->
                    <form action="{{ route('admin.validaciones.aprobar', $practica) }}" 
                          method="POST" 
                          class="mb-4"
                          onsubmit="return confirm('¿Estás seguro de APROBAR esta práctica? Se enviará un email al estudiante.');">
                        @csrf
                        <div class="mb-4">
                            <label for="observaciones_aprobar" class="block text-sm font-medium text-gray-700 mb-2">
                                Comentarios (opcional)
                            </label>
                            <textarea name="observaciones" 
                                      id="observaciones_aprobar"
                                      rows="3"
                                      placeholder="Ej: Excelente trabajo, cumple con todos los requisitos."
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"></textarea>
                        </div>
                        <button type="submit" 
                                class="w-full flex items-center justify-center px-4 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Aprobar Práctica
                        </button>
                    </form>

                    <div class="relative my-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">o</span>
                        </div>
                    </div>

                    <!-- Formulario Rechazar -->
                    <form action="{{ route('admin.validaciones.rechazar', $practica) }}" 
                          method="POST"
                          onsubmit="return confirm('¿Estás seguro de RECHAZAR esta práctica? Debes especificar el motivo.');">
                        @csrf
                        <div class="mb-4">
                            <label for="observaciones_rechazar" class="block text-sm font-medium text-gray-700 mb-2">
                                Motivo del rechazo <span class="text-red-500">*</span>
                            </label>
                            <textarea name="observaciones" 
                                      id="observaciones_rechazar"
                                      rows="3"
                                      required
                                      placeholder="Ej: Faltan 20 horas documentadas, el certificado no está firmado..."
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500"></textarea>
                        </div>
                        <button type="submit" 
                                class="w-full flex items-center justify-center px-4 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Rechazar Práctica
                        </button>
                    </form>

                    <div class="mt-6 pt-6 border-t">
                        <a href="{{ route('admin.validaciones.index') }}" 
                           class="block text-center px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            ← Volver al listado
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-admin-layout>