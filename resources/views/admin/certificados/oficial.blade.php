<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de Prácticas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px;
        }

        .certificado {
            background: white;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 60px 80px;
            border: 15px solid #2c3e50;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            position: relative;
            overflow: hidden;
        }

        .certificado::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 10px;
            background: linear-gradient(90deg, #3498db, #2ecc71, #f39c12, #e74c3c);
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 3px solid #3498db;
            padding-bottom: 20px;
        }

        .logo {
            font-size: 48px;
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .institucion {
            font-size: 24px;
            color: #34495e;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .subtitulo {
            font-size: 14px;
            color: #7f8c8d;
            font-style: italic;
        }

        .titulo-certificado {
            text-align: center;
            font-size: 42px;
            color: #2c3e50;
            font-weight: bold;
            margin: 40px 0 30px 0;
            text-transform: uppercase;
            letter-spacing: 4px;
            border-bottom: 4px solid #3498db;
            padding-bottom: 15px;
        }

        .subtitulo-certificado {
            text-align: center;
            font-size: 18px;
            color: #7f8c8d;
            margin-bottom: 40px;
            font-style: italic;
        }

        .contenido {
            text-align: justify;
            font-size: 16px;
            line-height: 2;
            color: #2c3e50;
            margin-bottom: 40px;
        }

        .estudiante-nombre {
            display: inline-block;
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding: 5px 20px;
            margin: 0 10px;
        }

        .detalle-box {
            background: #ecf0f1;
            border-left: 5px solid #3498db;
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .detalle-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 15px;
        }

        .detalle-label {
            font-weight: bold;
            color: #2c3e50;
            width: 40%;
        }

        .detalle-valor {
            color: #34495e;
            width: 55%;
            text-align: right;
        }

        .firmas {
            display: flex;
            justify-content: space-around;
            margin-top: 80px;
            padding-top: 40px;
        }

        .firma {
            text-align: center;
            width: 40%;
        }

        .linea-firma {
            border-top: 2px solid #2c3e50;
            margin-bottom: 10px;
            padding-top: 60px;
        }

        .nombre-firma {
            font-weight: bold;
            font-size: 16px;
            color: #2c3e50;
        }

        .cargo-firma {
            font-size: 13px;
            color: #7f8c8d;
            font-style: italic;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #ecf0f1;
            font-size: 11px;
            color: #95a5a6;
        }

        .codigo-verificacion {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #7f8c8d;
            background: #ecf0f1;
            padding: 10px;
            border-radius: 5px;
        }

        .sello {
            position: absolute;
            right: 80px;
            bottom: 120px;
            width: 120px;
            height: 120px;
            border: 4px solid #e74c3c;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: rotate(-15deg);
            opacity: 0.7;
        }

        .sello-texto {
            text-align: center;
            color: #e74c3c;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="certificado">
        
        <!-- Sello de Aprobado -->
        <div class="sello">
            <div class="sello-texto">
                APROBADO<br>
                <span style="font-size: 12px;">{{ date('Y') }}</span>
            </div>
        </div>

        <!-- Header -->
        <div class="header">
            <div class="logo">🎓</div>
            <div class="institucion">{{ $estudiante->institucion->nombre ?? 'INSTITUCIÓN EDUCATIVA' }}</div>
            <div class="subtitulo">Sistema de Gestión de Certificados de Prácticas Profesionales</div>
        </div>

        <!-- Título -->
        <div class="titulo-certificado">
            CERTIFICADO
        </div>
        <div class="subtitulo-certificado">
            De Prácticas Profesionales
        </div>

        <!-- Contenido -->
        <div class="contenido">
            <p style="text-align: center; margin-bottom: 30px;">
                La <strong>{{ $estudiante->institucion->nombre ?? 'Institución Educativa' }}</strong>, 
                a través del presente documento, <strong>CERTIFICA</strong> que:
            </p>

            <p style="text-align: center; margin: 30px 0;">
                <span class="estudiante-nombre">
                    {{ strtoupper($estudiante->nombres) }} {{ strtoupper($estudiante->apellidos) }}
                </span>
            </p>

            <p>
                Con cédula de identidad <strong>{{ $estudiante->cedula ?? 'N/A' }}</strong>, 
                estudiante de la carrera de <strong>{{ $estudiante->carrera->nombre ?? 'N/A' }}</strong>,
                ha completado satisfactoriamente las <strong>Prácticas Profesionales {{ $practica->tipo }}</strong>
                cumpliendo con todos los requisitos académicos establecidos.
            </p>
        </div>

        <!-- Detalles de la Práctica -->
        <div class="detalle-box">
            <div class="detalle-item">
                <span class="detalle-label">Tipo de Práctica:</span>
                <span class="detalle-valor">Práctica {{ $practica->tipo }}</span>
            </div>
            <div class="detalle-item">
                <span class="detalle-label">Lugar de Ejecución:</span>
                <span class="detalle-valor">{{ $practica->lugarPractica->nombre ?? 'N/A' }}</span>
            </div>
            <div class="detalle-item">
                <span class="detalle-label">Dirección:</span>
                <span class="detalle-valor">{{ $practica->lugarPractica->direccion ?? 'N/A' }}</span>
            </div>
            <div class="detalle-item">
                <span class="detalle-label">Horas Cumplidas:</span>
                <span class="detalle-valor">{{ $practica->horas_requeridas }} horas</span>
            </div>
            <div class="detalle-item">
                <span class="detalle-label">Período:</span>
                <span class="detalle-valor">
                    {{ $practica->fecha_inicio ? $practica->fecha_inicio->format('d/m/Y') : 'N/A' }} - 
                    {{ $practica->fecha_finalizacion ? $practica->fecha_finalizacion->format('d/m/Y') : 'N/A' }}
                </span>
            </div>
        </div>

        <p style="text-align: center; font-size: 15px; margin-top: 30px; line-height: 1.8;">
            Se extiende el presente certificado para los fines que el interesado/a estime conveniente,
            en la ciudad de <strong>Guayaquil</strong>, a los <strong>{{ now()->day }}</strong> días del mes de 
            <strong>{{ now()->locale('es')->monthName }}</strong> del año <strong>{{ now()->year }}</strong>.
        </p>

        <!-- Firmas -->
        <div class="firmas">
            <div class="firma">
                <div class="linea-firma"></div>
                <div class="nombre-firma">Ing. Juan Pérez</div>
                <div class="cargo-firma">Director de Carrera</div>
            </div>
            <div class="firma">
                <div class="linea-firma"></div>
                <div class="nombre-firma">Dra. María González</div>
                <div class="cargo-firma">Coordinadora de Prácticas</div>
            </div>
        </div>

        <!-- Código de Verificación -->
        <div class="codigo-verificacion">
            <strong>Código de Verificación:</strong> {{ strtoupper(substr(md5($practica->id . $estudiante->cedula), 0, 16)) }}
        </div>

        <!-- Footer -->
        <div class="footer">
            Certificado emitido el {{ $fecha_emision }}<br>
            Este documento tiene validez oficial
        </div>

    </div>
</body>
</html>