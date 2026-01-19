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
    padding: 30px 60px 31px 60px;
    min-height: 18cm;
    position: relative;
    background: #fff;
    max-width: 24cm;
    margin: 0 auto;
}

/* ENCABEZADO */
.header {
    text-align: center;
    padding-bottom: 15px;
    margin-bottom: 15px;
    border-bottom: 1px solid #e0e0e0;
}

.header img {
    width: 85px;
    margin-bottom: 10px;
}

.universidad {
    font-size: 13px;
    font-weight: bold;
    color: #c40000;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    line-height: 1.4;
    margin-bottom: 6px;
}

.facultad {
    font-size: 10px;
    color: #666;
    font-style: italic;
}

/* TITULO */
.titulo-section {
    text-align: center;
    margin-bottom: 18px;
}

.titulo {
    font-size: 24px;
    font-weight: bold;
    letter-spacing: 5px;
    color: #c40000;
    margin-bottom: 6px;
}

.subtitulo {
    font-size: 10px;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 1.8px;
}

/* CONTENIDO PRINCIPAL */
.contenido {
    font-size: 14px;
    line-height: 1.7;
    text-align: justify;
    max-width: 90%;
    margin: 0 auto;
}

.intro-text {
    margin-bottom: 15px;
    font-size: 14px;
}

.nombre-section {
    text-align: center;
    margin: 0px 0;
    margin-bottom: 13px;
}

.nombre {
    display: inline-block;
    font-size: 16px;
    font-weight: bold;
    padding: 8px 35px;
    border-bottom: 3px solid #c40000;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #222;
}

.texto-principal {
    margin-bottom: 18px;
    line-height: 1.8;
    font-size: 14px;
}

/* ============================================
   MODIFICACIÓN: DATOS EN CAJA CON 2 COLUMNAS
   ============================================ */
.datos {
    background: #ffffff;
    border-left: 3px solid #c40000;
    padding: 12px 15px;
    margin: 15px auto;
    max-width: 85%;
}

/* CAMBIO: Tabla para las 2 columnas (compatible con PDF) */
.datos-tabla {
    width: 100%;
}

.datos-tabla td {
    width: 50%;
    vertical-align: top;
    padding-right: 15px;
}

.datos-tabla td:last-child {
    padding-right: 0;
}
/* ============================================ */

.datos p {
    margin-bottom: 6px;
    font-size: 13px;
    line-height: 1.7;
}

.datos p:last-child {
    margin-bottom: 0;
}

.datos strong {
    font-weight: bold;
    color: #333;
    display: inline-block;
    min-width: 110px;
}

/* TEXTO ADICIONAL */
.texto-adicional {
    /*margin-top: 15px; */
    /* margin-bottom: 15px; */
    font-size: 14px;
    line-height: 1.8;
    text-align: justify;
}

/* FECHA */
.fecha {
    text-align: center;
    margin: 18px 0 0 0;
    font-size: 11.5px;
    font-style: italic;
    color: #555;
}

/* FIRMAS CON TABLA (Compatible con dompdf) */
.firmas-tabla {
    width: 90%;
    position: absolute;
    margin: 45px auto 0 auto;
    position: static;
}

.firmas-tabla td {
    width: 50%;
    text-align: center;
    vertical-align: bottom;
    padding: 0 20px;
}

.linea-firma {
    border-top: 1.5px solid #333;
    margin-bottom: 6px;
    width: 240px;
    margin-left: auto;
    margin-right: auto;
}

.firma-nombre {
    font-size: 12px;
    font-weight: bold;
    margin-bottom: 4px;
    color: #222;
}

.firma-cargo {
    font-size: 10px;
    color: #666;
}

/* FOOTER */
.footer {
    text-align: center;
    font-size: 9px;
    color: #999;
    padding-top: 10px;
    border-top: 1px solid #e0e0e0;
    position: static;
    margin-top: 25px;
    bottom: 18px;
    left: 60px;
    right: 60px;
}
.introduccion-text {
    margirn-bottom: 0px;
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
        <div class="introduccion-text">
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

        <!-- ============================================
             MODIFICACIÓN: DATOS DIVIDIDOS EN 2 COLUMNAS CON TABLA
             ============================================ -->
        <div class="datos">
            <table class="datos-tabla" cellspacing="0" cellpadding="0">
                <tr>
                    <!-- COLUMNA 1: Tipo, Entidad, Horas -->
                    <td>
                        <p><strong>Tipo de práctica:</strong> {{ $practica->tipo }}</p>
                        <p><strong>Entidad receptora:</strong> {{ $practica->lugarPractica->nombre ?? 'No especificada' }}</p>
                        <p><strong>Horas cumplidas:</strong> {{ $practica->horas_requeridas }} horas</p>
                    </td>
                    
                    <!-- COLUMNA 2: Período, Fecha inicio, Fecha fin -->
                    <td>
                        <p><strong>Período:</strong> {{ $practica->anio_lectivo }}</p>
                        <p><strong>Fecha de inicio:</strong> {{ \Carbon\Carbon::parse($practica->fecha_inicio)->format('d/m/Y') }}</p>
                        <p><strong>Fecha de fin:</strong> {{ \Carbon\Carbon::parse($practica->fecha_finalizacion)->format('d/m/Y') }}</p>
                    </td>
                </tr>
            </table>
        </div>
        <!-- ============================================ -->

        <!-- TEXTO ADICIONAL -->
        <div class="texto-adicional">
            El/la estudiante ha demostrado responsabilidad, compromiso y desempeño profesional durante el desarrollo 
            de sus prácticas, cumpliendo con los objetivos académicos establecidos. Este certificado 
            se expide a solicitud del interesado para los fines que estime convenientes.
        </div>

        <div class="fecha">
            Manta, {{ now()->day }} de {{ now()->locale('es')->monthName }} de {{ now()->year }}.
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