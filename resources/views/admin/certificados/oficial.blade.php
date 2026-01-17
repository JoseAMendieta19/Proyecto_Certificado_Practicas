<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado de Prácticas</title>

    <style>
        @page {
            margin: 0.5cm;
            size: letter landscape;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', serif;
            background: white;
            color: #2c3e50;
            padding: 0;
        }

        .certificado {
            background: white;
            width: 100%;
            padding: 20px 40px;
            border: 8px solid #2c3e50;
            border-radius: 0;
            position: relative;
            min-height: auto;
        }

        .certificado::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #3498db, #2ecc71, #f39c12, #e74c3c);
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        .logo {
            font-size: 28px;
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .institucion {
            font-size: 16px;
            color: #34495e;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .subtitulo {
            font-size: 10px;
            color: #7f8c8d;
            font-style: italic;
        }

        .titulo-certificado {
            text-align: center;
            font-size: 28px;
            color: #2c3e50;
            font-weight: bold;
            margin: 12px 0 8px 0;
            text-transform: uppercase;
            letter-spacing: 3px;
            border-bottom: 3px solid #3498db;
            padding-bottom: 8px;
        }

        .subtitulo-certificado {
            text-align: center;
            font-size: 12px;
            color: #7f8c8d;
            margin-bottom: 15px;
            font-style: italic;
        }

        .contenido {
            text-align: justify;
            font-size: 11px;
            line-height: 1.4;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .contenido p {
            margin-bottom: 8px;
        }

        .estudiante-nombre {
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding: 3px 15px;
            margin: 0 5px;
        }

        .detalle-box {
            background: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 10px 12px;
            margin: 12px 0;
            border-radius: 3px;
        }

        .detalle-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-size: 10px;
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
            margin-top: 25px;
            padding-top: 15px;
        }

        .firma {
            text-align: center;
            width: 40%;
        }

        .linea-firma {
            border-top: 2px solid #2c3e50;
            margin-bottom: 8px;
            padding-top: 30px;
        }

        .nombre-firma {
            font-weight: bold;
            font-size: 12px;
            color: #2c3e50;
        }

        .cargo-firma {
            font-size: 10px;
            color: #7f8c8d;
            font-style: italic;
        }

        .footer {
            text-align: center;
            margin-top: 12px;
            padding-top: 8px;
            border-top: 1px solid #ecf0f1;
            font-size: 8px;
            color: #95a5a6;
        }

        .codigo-verificacion {
            text-align: center;
            margin-top: 10px;
            font-size: 9px;
            color: #7f8c8d;
            background: #f8f9fa;
            padding: 6px;
            border-radius: 3px;
        }

        .sello {
            position: absolute;
            right: 50px;
            bottom: 60px;
            width: 80px;
            height: 80px;
            border: 3px solid #e74c3c;
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
            font-size: 11px;
        }
    </style>

</head>
<body>
    <div class="certificado">
        <div class="borde-superior"></div>
        
        <!-- Sello de Aprobado -->
        <div class="sello">
            <div class="sello-texto">
                APROBADO<br>
                <span style="font-size: 11px;">{{ date('Y') }}</span>
            </div>
        </div>

        <!-- Header -->
        <div class="header">
            <div class="logo">🎓</div>
            <div class="institucion">{{ $estudiante->institucion->nombre ?? 'INSTITUCIÓN EDUCATIVA' }}</div>
            <div class="subtitulo">Sistema de Gestión de Certificados de Prácticas Profesionales</div>
        </div>

        <!-- Título -->
        <div class="titulo-certificado">CERTIFICADO</div>
        <div class="subtitulo-certificado">De Prácticas Profesionales</div>

        <!-- Contenido -->
        <div class="contenido">
            <p style="text-align: center; margin-bottom: 15px;">
                La <strong>{{ $estudiante->institucion->nombre ?? 'Institución Educativa' }}</strong>, 
                a través del presente documento, <strong>CERTIFICA</strong> que:
            </p>

            <p style="text-align: center; margin: 15px 0;">
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
                <strong>Tipo de Práctica:</strong>
                <span>Práctica {{ $practica->tipo }}</span>
            </div>
            <div class="detalle-item">
                <strong>Lugar de Ejecución:</strong>
                <span>{{ $practica->lugarPractica->nombre ?? 'N/A' }}</span>
            </div>
            <div class="detalle-item">
                <strong>Dirección:</strong>
                <span>{{ $practica->lugarPractica->direccion ?? 'N/A' }}</span>
            </div>
            <div class="detalle-item">
                <strong>Horas Cumplidas:</strong>
                <span>{{ $practica->horas_requeridas }} horas</span>
            </div>
            <div class="detalle-item">
                <strong>Período:</strong>
                <span>
                    {{ $practica->fecha_inicio ? \Carbon\Carbon::parse($practica->fecha_inicio)->format('d/m/Y') : 'N/A' }} - 
                    {{ $practica->fecha_finalizacion ? \Carbon\Carbon::parse($practica->fecha_finalizacion)->format('d/m/Y') : 'N/A' }}
                </span>
            </div>
        </div>

        <p style="text-align: center; font-size: 12px; margin-top: 15px; line-height: 1.5;">
            Se extiende el presente certificado para los fines que el interesado/a estime conveniente,
            en la ciudad de <strong>Guayaquil</strong>, a los <strong>{{ now()->day }}</strong> días del mes de 
            <strong>{{ now()->locale('es')->monthName }}</strong> del año <strong>{{ now()->year }}</strong>.
        </p>

        <!-- Firmas -->
        <div class="firmas">
            <div class="firmas-container">
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