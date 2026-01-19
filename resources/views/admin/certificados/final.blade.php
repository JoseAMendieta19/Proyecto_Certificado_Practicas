<html lang="es">
<head>
<meta charset="UTF-8">
<title>Certificado Final de Prácticas Profesionales</title>
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
    padding: 0.5cm;
}

.certificado {
    border: 7px solid #c40000;
    padding: 22px 50px;
    min-height: 18cm;
    position: relative;
    background: #fff;
    max-width: 24cm;
    margin: 0 auto;
}

/* ENCABEZADO */
.header {
    text-align: center;
    padding-bottom: 10px;
    margin-bottom: 10px;
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
    font-size: 9.5px;
    color: #666;
    font-style: italic;
}

/* TITULO */
.titulo-section {
    text-align: center;
    margin-bottom: 10px;
}

.titulo {
    font-size: 22px;
    font-weight: bold;
    letter-spacing: 5px;
    color: #c40000;
    margin-bottom: 3px;
}

.subtitulo {
    font-size: 9.5px;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 1.8px;
}

/* CONTENIDO PRINCIPAL */
.contenido {
    font-size: 13px;
    line-height: 1.6;
    text-align: justify;
    max-width: 90%;
    margin: 0 auto;
}

.intro-text {
    margin-bottom: 8px;
    font-size: 13px;
    text-align: center;
}

.nombre-section {
    text-align: center;
    margin: 0px 0 8px 0;
}

.nombre {
    display: inline-block;
    font-size: 15px;
    font-weight: bold;
    padding: 6px 30px;
    border-bottom: 3px solid #c40000;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #222;
}

.texto-principal {
    margin-bottom: 12px;
    line-height: 1.6;
    font-size: 13px;
    text-align: center;
}

/* DATOS DEL CERTIFICADO - TABLA ORGANIZADA */
.datos {
    background: #ffffff;
    border-left: 3px solid #c40000;
    padding: 15px 25px;
    margin: 15px auto;
    max-width: 85%;
}

.datos-tabla {
    width: 100%;
    border-collapse: collapse;
}

.datos-tabla td {
    width: 50%;
    vertical-align: top;
    padding: 8px 25px 8px 0;
}

.datos-tabla td:last-child {
    padding-right: 0;
}

.datos p {
    margin-bottom: 10px;
    font-size: 12px;
    line-height: 1.5;
}

.datos p:last-child {
    margin-bottom: 0;
}

.datos strong {
    font-weight: bold;
    color: #333;
    display: inline-block;
    min-width: 150px;
}

.horas-detalle {
    font-size: 10.5px;
    color: #666;
    font-style: italic;
    margin-left: 8px;
    display: inline;
    white-space: nowrap;
}

/* DURACIÓN - BIEN ORGANIZADA */
.duracion-lista {
    margin: 0;
    padding-left: 0;
    list-style: none;
}

.duracion-lista li {
    margin-bottom: 6px;
    font-size: 12px;
    line-height: 1.4;
}

.duracion-lista li strong {
    font-weight: bold;
    color: #333;
    min-width: 160px;
    display: inline-block;
}

/* TEXTO ADICIONAL */
.texto-adicional {
    font-size: 13px;
    line-height: 1.8;
    text-align: justify;
    margin-top: 15px;
}

.texto-adicional p {
    margin-bottom: 8px;
}

.texto-adicional p:last-child {
    margin-bottom: 0;
    text-align: center;
    font-style: italic;
}

/* FECHA */
.fecha {
    text-align: center;
    margin: 20px 0 5px 0;
    font-size: 11px;
    font-style: italic;
    color: #555;
}

/* FIRMAS - CON MÁS ESPACIO */
.firmas-container {
    margin-top: 50px;
    width: 100%;
}

.firmas-tabla {
    width: 88%;
    margin: 0 auto;
    border-collapse: collapse;
}

.firmas-tabla td {
    width: 50%;
    text-align: center;
    vertical-align: bottom;
    padding: 0 15px;
}

.linea-firma {
    border-top: 1.5px solid #333;
    margin-bottom: 6px;
    width: 220px;
    margin-left: auto;
    margin-right: auto;
}

.firma-nombre {
    font-size: 11.5px;
    font-weight: bold;
    margin-bottom: 4px;
    color: #222;
    line-height: 1.3;
}

.firma-cargo {
    font-size: 9.5px;
    color: #666;
    line-height: 1.2;
}

/* FOOTER - MEJOR CENTRADO */
.footer {
    text-align: center;
    font-size: 9px;
    color: #777;
    padding-top: 12px;
    border-top: 1px solid #e0e0e0;
    margin-top: 30px;
    letter-spacing: 0.3px;
    max-width: 90%;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.4;
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
        <div class="titulo">CERTIFICADO FINAL</div>
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
            la totalidad de las Prácticas Profesionales correspondientes a su plan de estudios, conforme a la 
            normativa institucional vigente, habiendo aprobado <strong>Prácticas Profesionales I</strong> y 
            <strong>Prácticas Profesionales II</strong>.
        </div>

        <!-- DATOS EN FORMATO TABULAR BIEN ESTRUCTURADO -->
        <div class="datos">
            <table class="datos-tabla" cellspacing="0" cellpadding="0">
                <tr>
                    <!-- COLUMNA IZQUIERDA - ENTIDADES Y HORAS -->
                    <td>
                        <p><strong>Entidad Práctica I:</strong> {{ ucfirst($practicaI->lugarPractica->nombre ?? 'No especificada') }}</p>
                        <p><strong>Entidad Práctica II:</strong> {{ ucfirst($practicaII->lugarPractica->nombre ?? 'No especificada') }}</p>
                        <p><strong>Horas totales cumplidas:</strong> {{ $totalHoras }} horas
                            <span class="horas-detalle">({{ $practicaI->horas_requeridas }} horas en PP I y {{ $practicaII->horas_requeridas }} horas en PP II)</span>
                        </p>
                    </td>
                    
                    <!-- COLUMNA DERECHA - DURACIÓN -->
                    <td>
                        <p><strong>Duración de las prácticas:</strong></p>
                        <ul class="duracion-lista">
                            <li><strong>Prácticas Profesionales I:</strong> 
                                {{ \Carbon\Carbon::parse($practicaI->fecha_inicio)->format('d/m/Y') }} al 
                                {{ \Carbon\Carbon::parse($practicaI->fecha_finalizacion)->format('d/m/Y') }}
                            </li>
                            <li><strong>Prácticas Profesionales II:</strong> 
                                {{ \Carbon\Carbon::parse($practicaII->fecha_inicio)->format('d/m/Y') }} al 
                                {{ \Carbon\Carbon::parse($practicaII->fecha_finalizacion)->format('d/m/Y') }}
                            </li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>

        <!-- TEXTO ADICIONAL -->
        <div class="texto-adicional">
            <p>Durante el desarrollo de las prácticas, el/la estudiante demostró responsabilidad, compromiso y un 
            desempeño acorde a los objetivos académicos establecidos. En virtud de lo expuesto, se certifica la 
            culminación total del proceso de prácticas profesionales.</p>
            
            <p>El presente certificado se expide a solicitud del interesado para los fines que estime convenientes.</p>
        </div>

        <div class="fecha">
            Manta, {{ now()->day }} de {{ now()->locale('es')->monthName }} de {{ now()->year }}.
        </div>
    </div>

    <!-- FIRMAS -->
    <div class="firmas-container">
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
    </div>

    <!-- FOOTER -->
    <div class="footer">
        Documento académico oficial – Certificado Final de Prácticas Profesionales – Código: {{ strtoupper(substr(md5($practicaI->id.$practicaII->id.$estudiante->cedula),0,12)) }}
    </div>

</div>
</body>
</html>