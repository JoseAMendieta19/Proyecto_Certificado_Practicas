<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Certificado de Prácticas Profesionales</title>

<style>
@page {
    size: letter landscape;
    margin: 0;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Times New Roman', serif;
    background: #fff;
    color: #222;
    padding: 0.6cm;
}

.certificado {
    border: 7px solid #c40000;
    padding: 25px 45px 20px 45px;
    height: 18cm;
    position: relative;
    background: #fff;
}

/* ENCABEZADO */
.header {
    text-align: center;
    padding-bottom: 15px;
    margin-bottom: 15px;
    border-bottom: 1px solid #e0e0e0;
}

.header img {
    width: 75px;
    margin-bottom: 8px;
}

.universidad {
    font-size: 12px;
    font-weight: bold;
    color: #c40000;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    line-height: 1.3;
    margin-bottom: 5px;
}

.facultad {
    font-size: 9px;
    color: #666;
    font-style: italic;
}

/* TITULO */
.titulo-section {
    text-align: center;
    margin-bottom: 20px;
}

.titulo {
    font-size: 22px;
    font-weight: bold;
    letter-spacing: 4px;
    color: #c40000;
    margin-bottom: 5px;
}

.subtitulo {
    font-size: 10px;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

/* CONTENIDO PRINCIPAL */
.contenido {
    font-size: 11px;
    line-height: 1.6;
    text-align: justify;
}

.intro-text {
    margin-bottom: 15px;
}

.nombre-section {
    text-align: center;
    margin: 18px 0;
}

.nombre {
    display: inline-block;
    font-size: 14px;
    font-weight: bold;
    padding: 6px 30px;
    border-bottom: 2.5px solid #c40000;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    color: #222;
}

.texto-principal {
    margin-bottom: 18px;
    line-height: 1.7;
}

/* DATOS EN CAJA COMPACTA */
.datos {
    background: #fafafa;
    border-left: 3px solid #c40000;
    padding: 14px 20px;
    margin: 18px 0;
}

.datos p {
    margin-bottom: 7px;
    font-size: 10px;
    line-height: 1.5;
}

.datos p:last-child {
    margin-bottom: 0;
}

.datos strong {
    font-weight: bold;
    color: #333;
    display: inline-block;
    min-width: 130px;
}

/* TEXTO ADICIONAL */
.texto-adicional {
    margin-top: 18px;
    margin-bottom: 18px;
    font-size: 10.5px;
    line-height: 1.6;
    text-align: justify;
}

/* FECHA */
.fecha {
    text-align: center;
    margin: 20px 0 0 0;
    font-size: 10px;
    font-style: italic;
    color: #555;
}

/* FIRMAS CON TABLA (Compatible con dompdf) */
.firmas-tabla {
    width: 100%;
    position: absolute;
    bottom: 95px;
    left: 45px;
    right: 45px;
}

.firmas-tabla td {
    width: 50%;
    text-align: center;
    vertical-align: bottom;
    padding: 0 40px;
}

.linea-firma {
    border-top: 1.5px solid #333;
    margin-bottom: 6px;
    width: 220px;
    margin-left: auto;
    margin-right: auto;
}

.firma-nombre {
    font-size: 11px;
    font-weight: bold;
    margin-bottom: 3px;
    color: #222;
}

.firma-cargo {
    font-size: 9px;
    color: #666;
}

/* FOOTER */
.footer {
    text-align: center;
    font-size: 8px;
    color: #999;
    padding-top: 8px;
    border-top: 1px solid #e0e0e0;
    position: absolute;
    bottom: 18px;
    left: 45px;
    right: 45px;
}

</style>
</head>

<body>
<div class="certificado">
    
    <!-- ENCABEZADO -->
    <div class="header">
        <img src="https://aulavirtualmoodle.uleam.edu.ec/pluginfile.php/1/core_admin/logo/0x200/1767816587/logo_ULEAM_2017_vertical.png" alt="ULEAM Logo">
        <div class="universidad">
            {{ $estudiante->institucion->nombre ?? 'Universidad Laica Eloy Alfaro de Manabí' }}
        </div>
        <div class="facultad">
            Carrera: {{ $estudiante->carrera->nombre ?? 'No registrada' }}
        </div>
    </div>

    <!-- TITULO -->
    <div class="titulo-section">
        <div class="titulo">CERTIFICADO</div>
        <div class="subtitulo">Prácticas Profesionales</div>
    </div>

    <!-- CONTENIDO -->
    <div class="contenido">
        <div class="intro-text">
            La Universidad Laica Eloy Alfaro de Manabí certifica que el/la estudiante:
        </div>

        <div class="nombre-section">
            <div class="nombre">
                {{ $estudiante->nombres }} {{ $estudiante->apellidos }}
            </div>
        </div>

        <div class="texto-principal">
            con cédula de identidad <strong>{{ $estudiante->cedula }}</strong>, ha cumplido satisfactoriamente 
            con las prácticas profesionales correspondientes a su plan de estudios, conforme a la normativa 
            institucional vigente.
        </div>

        <!-- DATOS -->
        <div class="datos">
            <p><strong>Tipo de práctica:</strong> {{ $practica->tipo }}</p>
            <p><strong>Entidad receptora:</strong> {{ $practica->lugarPractica->nombre ?? 'No especificada' }}</p>
            <p><strong>Horas cumplidas:</strong> {{ $practica->horas_requeridas }} horas</p>
            <p><strong>Período:</strong> {{ \Carbon\Carbon::parse($practica->fecha_inicio)->format('d/m/Y') }} – {{ \Carbon\Carbon::parse($practica->fecha_finalizacion)->format('d/m/Y') }}</p>
        </div>

        <!-- TEXTO ADICIONAL -->
        <div class="texto-adicional">
            El/la estudiante ha demostrado responsabilidad, compromiso y desempeño profesional durante el desarrollo 
            de sus prácticas, cumpliendo con los objetivos académicos establecidos por la institución. Este certificado 
            se expide a solicitud del interesado para los fines que estime convenientes.
        </div>

        <div class="fecha">
            Guayaquil, {{ now()->day }} de {{ now()->locale('es')->monthName }} de {{ now()->year }}.
        </div>
    </div>

    <!-- FIRMAS CON TABLA -->
    <table class="firmas-tabla" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <div class="linea-firma"></div>
                <div class="firma-nombre">Ing. Juan Pérez</div>
                <div class="firma-cargo">Director de Carrera</div>
            </td>
            
            <td>
                <div class="linea-firma"></div>
                <div class="firma-nombre">Dra. María González</div>
                <div class="firma-cargo">Coordinadora de Prácticas</div>
            </td>
        </tr>
    </table>

    <!-- FOOTER -->
    <div class="footer">
        Documento académico oficial – Código: {{ strtoupper(substr(md5($practica->id.$estudiante->cedula),0,12)) }}
    </div>

</div>
</body>
</html>