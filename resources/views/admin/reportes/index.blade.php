<x-admin-layout>
    <x-slot name="header">
        Reportes y Estadísticas
    </x-slot>

    <!-- Estadísticas Generales -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">
        
        <!-- Total Estudiantes -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Total Estudiantes</p>
                    <p class="text-3xl font-bold mt-2">{{ $estadisticas['total_estudiantes'] }}</p>
                </div>
                <div class="bg-white bg-opacity-30 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Asignadas -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">Asignadas</p>
                    <p class="text-3xl font-bold mt-2">{{ $estadisticas['practicas_asignadas'] }}</p>
                </div>
                <div class="bg-white bg-opacity-30 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pendientes -->
        <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm font-medium">Pendientes</p>
                    <p class="text-3xl font-bold mt-2">{{ $estadisticas['practicas_pendientes'] }}</p>
                </div>
                <div class="bg-white bg-opacity-30 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Aprobadas -->
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Aprobadas</p>
                    <p class="text-3xl font-bold mt-2">{{ $estadisticas['practicas_aprobadas'] }}</p>
                </div>
                <div class="bg-white bg-opacity-30 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Rechazadas -->
        <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-lg shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-red-100 text-sm font-medium">Rechazadas</p>
                    <p class="text-3xl font-bold mt-2">{{ $estadisticas['practicas_rechazadas'] }}</p>
                </div>
                <div class="bg-white bg-opacity-30 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    <!-- Panel de Descarga -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Generar Reporte</h3>
            <p class="text-sm text-gray-500 mt-1">Descarga un reporte completo de todas las prácticas</p>
        </div>

        <div class="p-6">
            <form action="{{ route('admin.reportes.descargar') }}" method="GET" class="space-y-6">
                
                <!-- Filtro por Estado -->
                <div>
                    <label for="estado" class="block text-sm font-medium text-gray-700 mb-2">
                        Filtrar por Estado (opcional)
                    </label>
                    <select name="estado" 
                            id="estado" 
                            class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Todas las prácticas</option>
                        <option value="asignada">Asignadas</option>
                        <option value="pendiente_revision">Pendientes de Revisión</option>
                        <option value="aprobada">Aprobadas</option>
                        <option value="rechazada">Rechazadas</option>
                    </select>
                </div>

                <!-- Formato de Descarga -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">
                        Formato de Descarga
                    </label>
                    <div class="flex flex-wrap gap-4">
                        
                        <!-- Opción Excel -->
                        <button type="submit" 
                                name="formato" 
                                value="excel"
                                class="flex items-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors shadow-md">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <div class="text-left">
                                <div class="font-semibold">Descargar Excel</div>
                                <div class="text-xs text-green-100">Formato .xlsx para análisis</div>
                            </div>
                        </button>

                        <!-- Opción PDF -->
                        <button type="submit" 
                                name="formato" 
                                value="pdf"
                                class="flex items-center px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors shadow-md">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            <div class="text-left">
                                <div class="font-semibold">Descargar PDF</div>
                                <div class="text-xs text-red-100">Formato para impresión</div>
                            </div>
                        </button>

                    </div>
                </div>

                <!-- Información adicional -->
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                    <div class="flex">
                        <svg class="w-5 h-5 text-blue-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="text-sm text-blue-700">
                            <p class="font-medium">Información sobre los reportes:</p>
                            <ul class="list-disc list-inside mt-2 space-y-1">
                                <li>El reporte incluye todos los datos de estudiantes y sus prácticas</li>
                                <li>Puedes filtrar por estado para obtener reportes específicos</li>
                                <li>Los archivos incluyen: cédula, nombres, institución, carrera, tipo de práctica, lugar, horas, fechas y estado</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</x-admin-layout>