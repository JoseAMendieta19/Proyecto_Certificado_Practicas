<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Certificado de Prácticas Profesionales</title>

<style>
@page {
    size: letter landscape;
    margin: 1cm;
}

body {
    font-family: 'Times New Roman', serif;
    background: #ffffff;
    color: #2b2b2b;
}

.certificado {
    border: 6px solid #c40000;
    padding: 35px 50px;
    height: 100%;
    position: relative;
}

/* ENCABEZADO */
.header {
    text-align: center;
    margin-bottom: 25px;
}

.header img {
    width: 140px;
    margin-bottom: 10px;
}

.universidad {
    font-size: 18px;
    font-weight: bold;
    color: #c40000;
    text-transform: uppercase;
}

.facultad {
    font-size: 13px;
    color: #555;
}

/* TITULO */
.titulo {
    text-align: center;
    font-size: 26px;
    font-weight: bold;
    letter-spacing: 2px;
    margin: 25px 0 8px;
    color: #c40000;
}

.subtitulo {
    text-align: center;
    font-size: 13px;
    color: #666;
    margin-bottom: 30px;
}

/* CONTENIDO */
.contenido {
    font-size: 14px;
    line-height: 1.8;
    text-align: justify;
}

.nombre {
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    margin: 20px auto;
    border-bottom: 2px solid #c40000;
    width: fit-content;
    padding: 4px 25px;
    text-transform: uppercase;
}

/* DATOS */
.datos {
    margin-top: 20px;
    font-size: 13px;
}

.datos p {
    margin: 6px 0;
}

/* FIRMAS */
.firmas {
    margin-top: 50px;
    display: flex;
    justify-content: space-around;
}

.firma {
    text-align: center;
    width: 35%;
}

.linea {
    border-top: 1.5px solid #333;
    padding-top: 30px;
    margin-bottom: 8px;
}

.firma-nombre {
    font-weight: bold;
    font-size: 13px;
}

.firma-cargo {
    font-size: 11px;
    color: #666;
}

/* FOOTER */
.footer {
    position: absolute;
    bottom: 25px;
    width: 90%;
    text-align: center;
    font-size: 10px;
    color: #777;
}
</style>
</head>

<body>
<div class="certificado">

    <!-- ENCABEZADO -->
    <div class="header">
        <img src="https://aulavirtualmoodle.uleam.edu.ec/pluginfile.php/1/core_admin/logo/0x200/1767816587/logo_ULEAM_2017_vertical.png">
        <div class="universidad">
            {{ $estudiante->institucion->nombre ?? 'Universidad Laica Eloy Alfaro de Manabí' }}
        </div>
        <div class="facultad">
            Carrera: {{ $estudiante->carrera->nombre ?? 'No registrada' }}
        </div>
    </div>

    <!-- TITULO -->
    <div class="titulo">CERTIFICADO</div>
    <div class="subtitulo">Prácticas Profesionales</div>

    <!-- CONTENIDO -->
    <div class="contenido">
        La Universidad Laica Eloy Alfaro de Manabí certifica que el/la estudiante:

        <div class="nombre">
            {{ $estudiante->nombres }} {{ $estudiante->apellidos }}
        </div>

        con cédula de identidad <strong>{{ $estudiante->cedula }}</strong>,
        ha cumplido satisfactoriamente con las prácticas profesionales
        correspondientes a su plan de estudios, conforme a la normativa institucional vigente.

        <div class="datos">
            <p><strong>Tipo de práctica:</strong> {{ $practica->tipo }}</p>
            <p><strong>Entidad receptora:</strong> {{ $practica->lugarPractica->nombre ?? 'No especificada' }}</p>
            <p><strong>Horas cumplidas:</strong> {{ $practica->horas_requeridas }} horas</p>
            <p><strong>Período:</strong>
                {{ \Carbon\Carbon::parse($practica->fecha_inicio)->format('d/m/Y') }}
                –
                {{ \Carbon\Carbon::parse($practica->fecha_finalizacion)->format('d/m/Y') }}
            </p>
        </div>

        <p style="text-align:center; margin-top:20px;">
            Guayaquil, {{ now()->day }} de {{ now()->locale('es')->monthName }} de {{ now()->year }}.
        </p>
    </div>

    <!-- FIRMAS -->
    <div class="firmas">
        <div class="firma">
            <div class="linea"></div>
            <div class="firma-nombre">Ing. Juan Pérez</div>
            <div class="firma-cargo">Director de Carrera</div>
        </div>

        <div class="firma">
            <div class="linea"></div>
            <div class="firma-nombre">Dra. María González</div>
            <div class="firma-cargo">Coordinadora de Prácticas</div>
        </div>
    </div>

    <div class="footer">
        Documento académico oficial – Código:
        {{ strtoupper(substr(md5($practica->id.$estudiante->cedula),0,12)) }}
    </div>

</div>
</body>
</html>
