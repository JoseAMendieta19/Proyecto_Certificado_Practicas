<!DOCTYPE html>
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
    padding-bottom: 10px;
    margin-bottom: 10px;
    border-bottom: 1px solid #e0e0e0;
}

.header img {
    width: 60px;
    margin-bottom: 5px;
}

.universidad {
    font-size: 11px;
    font-weight: bold;
    color: #c40000;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    line-height: 1.3;
    margin-bottom: 3px;
}

.facultad {
    font-size: 8px;
    color: #666;
    font-style: italic;
}

.vinculacion {
    font-size: 7px;
    color: #888;
    margin-top: 2px;
    font-weight: normal;
}

.exito-badge {
    background: #c40000;
    color: white;
    padding: 3px 15px;
    border-radius: 10px;
    display: inline-block;
    margin: 5px 0;
    font-size: 7px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

/* TITULO */
.titulo-section {
    text-align: center;
    margin-bottom: 15px;
}

.titulo {
    font-size: 20px;
    font-weight: bold;
    letter-spacing: 3px;
    color: #c40000;
    margin-bottom: 3px;
}

.subtitulo {
    font-size: 9px;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 1.2px;
}

/* CONTENIDO PRINCIPAL */
.contenido {
    font-size: 10px;
    line-height: 1.5;
    text-align: justify;
}

.intro-text {
    margin-bottom: 10px;
}

.nombre-section {
    text-align: center;
    margin: 12px 0;
}

.nombre {
    display: inline-block;
    font-size: 12px;
    font-weight: bold;
    padding: 4px 20px;
    border-bottom: 2px solid #c40000;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    color: #222;
}

.texto-principal {
    margin-bottom: 12px;
    line-height: 1.5;
}

/* TOTAL HORAS COMPACT */
.total-horas-compact {
    background: #fafafa;
    border: 1px solid #c40000;
    padding: 8px;
    margin: 12px 0;
    text-align: center;
    border-radius: 3px;
}

.total-horas-compact-label {
    font-size: 8px;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 2px;
}

.total-horas-compact-valor {
    font-size: 20px;
    font-weight: bold;
    color: #c40000;
    margin: 2px 0;
}

.total-horas-compact-texto {
    font-size: 7px;
    color: #888;
}

/* DETALLE PRÁCTICAS COMPACT */
.detalle-practicas-compact {
    margin: 15px 0;
}

.detalle-practicas-titulo {
    font-size: 9px;
    font-weight: bold;
    color: #c40000;
    margin-bottom: 8px;
    padding-bottom: 2px;
    border-bottom: 1px solid #e0e0e0;
}

.practicas-compact-grid {
    display: flex;
    gap: 10px;
    margin: 8px 0;
}

.practica-compact-box {
    flex: 1;
    background: #fafafa;
    border: 1px solid #ddd;
    padding: 8px;
    font-size: 8px;
}

.practica-compact-titulo {
    font-weight: bold;
    color: #c40000;
    margin-bottom: 5px;
    text-align: center;
    text-transform: uppercase;
    font-size: 8px;
}

.dato-compact-fila {
    display: flex;
    margin-bottom: 3px;
}

.dato-compact-etiqueta {
    font-weight: bold;
    color: #333;
    min-width: 40px;
    font-size: 7px;
}

.dato-compact-valor {
    color: #555;
    flex: 1;
    font-size: 7px;
}

.estado-compact-aprobado {
    color: #c40000;
    font-weight: bold;
    font-size: 7px;
}

/* INFORMACIÓN ESTUDIANTE COMPACT */
.info-estudiante-compact {
    background: #f5f5f5;
    border-left: 2px solid #c40000;
    padding: 8px 12px;
    margin: 12px 0;
    font-size: 8px;
}

.info-compact-fila {
    display: flex;
    margin-bottom: 4px;
}

.info-compact-etiqueta {
    font-weight: bold;
    color: #333;
    min-width: 80px;
    font-size: 8px;
}

.info-compact-valor {
    color: #555;
    flex: 1;
    font-size: 8px;
}

/* FECHA */
.fecha {
    text-align: center;
    margin: 15px 0;
    font-size: 9px;
    font-style: italic;
    color: #555;
}

/* FIRMAS CON TABLA (Compatible con dompdf) */
.firmas-tabla {
    width: 100%;
    position: absolute;
    bottom: 70px;
    left: 45px;
    right: 45px;
}

.firmas-tabla td {
    width: 33.33%;
    text-align: center;
    vertical-align: bottom;
    padding: 0 15px;
}

.linea-firma {
    border-top: 1px solid #333;
    margin-bottom: 4px;
    width: 120px;
    margin-left: auto;
    margin-right: auto;
}

.firma-nombre {
    font-size: 10px;
    font-weight: bold;
    margin-bottom: 2px;
    color: #222;
}

.firma-cargo {
    font-size: 7px;
    color: #666;
}

/* SELLO */
.sello {
    position: absolute;
    bottom: 75px;
    right: 50px;
    width: 70px;
    height: 70px;
    border: 2px solid #c40000;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    z-index: 10;
}

.sello-texto {
    text-align: center;
    font-size: 6px;
    font-weight: bold;
    color: #c40000;
    line-height: 1.1;
}

/* FOOTER */
.footer {
    text-align: center;
    font-size: 7px;
    color: #999;
    padding-top: 6px;
    border-top: 1px solid #e0e0e0;
    position: absolute;
    bottom: 15px;
    left: 45px;
    right: 45px;
    line-height: 1.2;
}

</style>
</head>

<body>
<div class="certificado">
    
    <!-- ENCABEZADO -->
    <div class="header">
        <img src="https://aulavirtualmoodle.uleam.edu.ec/pluginfile.php/1/core_admin/logo/0x200/1767816587/logo_ULEAM_2017_vertical.png" alt="ULEAM Logo">
        <div class="universidad">
            UNIVERSIDAD LAICA "ELOY ALFARO" DE MANABÍ
        </div>
        <div class="facultad">
            Facultad de {{ $estudiante->carrera->nombre ?? 'N/A' }}
        </div>
        <div class="vinculacion">
            Coordinación de Vinculación con la Sociedad
        </div>
        <div class="exito-badge">
            ✦ PRÁCTICAS COMPLETADAS CON ÉXITO ✦
        </div>
    </div>

    <!-- TITULO -->
    <div class="titulo-section">
        <div class="titulo">CERTIFICADO FINAL</div>
        <div class="subtitulo">De Culminación de Prácticas Profesionales</div>
    </div>

    <!-- CONTENIDO -->
    <div class="contenido">
        <div class="intro-text">
            La Universidad Laica "Eloy Alfaro" de Manabí, a través de la Coordinación de Vinculación con la Sociedad, 
            <strong>CERTIFICA</strong> que:
        </div>

        <div class="nombre-section">
            <div class="nombre">
                {{ strtoupper($estudiante->nombres . ' ' . $estudiante->apellidos) }}
            </div>
        </div>

        <div class="texto-principal">
            con cédula de identidad <strong>{{ $estudiante->cedula }}</strong>, estudiante de la carrera de 
            <strong>{{ $estudiante->carrera->nombre ?? 'N/A' }}</strong>, ha completado satisfactoriamente 
            <strong>TODAS SUS PRÁCTICAS PROFESIONALES</strong> establecidas en el plan de estudios.
        </div>

        <!-- TOTAL HORAS COMPACT -->
        <div class="total-horas-compact">
            <div class="total-horas-compact-label">Total de Horas Completadas</div>
            <div class="total-horas-compact-valor">{{ $totalHoras }}</div>
            <div class="total-horas-compact-texto">Horas de Prácticas Profesionales</div>
        </div>

        <!-- DETALLE PRÁCTICAS COMPACT -->
        <div class="detalle-practicas-compact">
            <div class="detalle-practicas-titulo">DETALLE DE PRÁCTICAS REALIZADAS</div>
            
            <div class="practicas-compact-grid">
                <!-- Práctica I -->
                <div class="practica-compact-box">
                    <div class="practica-compact-titulo">✓ PRÁCTICA I</div>
                    <div class="dato-compact-fila">
                        <div class="dato-compact-etiqueta">Lugar:</div>
                        <div class="dato-compact-valor">{{ $practicaI->lugarPractica->nombre ?? 'N/A' }}</div>
                    </div>
                    <div class="dato-compact-fila">
                        <div class="dato-compact-etiqueta">Horas:</div>
                        <div class="dato-compact-valor">{{ $practicaI->horas_requeridas ?? 'N/A' }}</div>
                    </div>
                    <div class="dato-compact-fila">
                        <div class="dato-compact-etiqueta">Estado:</div>
                        <div class="dato-compact-valor estado-compact-aprobado">✓ APROBADA</div>
                    </div>
                </div>

                <!-- Práctica II -->
                <div class="practica-compact-box">
                    <div class="practica-compact-titulo">✓ PRÁCTICA II</div>
                    <div class="dato-compact-fila">
                        <div class="dato-compact-etiqueta">Lugar:</div>
                        <div class="dato-compact-valor">{{ $practicaII->lugarPractica->nombre ?? 'N/A' }}</div>
                    </div>
                    <div class="dato-compact-fila">
                        <div class="dato-compact-etiqueta">Horas:</div>
                        <div class="dato-compact-valor">{{ $practicaII->horas_requeridas ?? 'N/A' }}</div>
                    </div>
                    <div class="dato-compact-fila">
                        <div class="dato-compact-etiqueta">Estado:</div>
                        <div class="dato-compact-valor estado-compact-aprobado">✓ APROBADA</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- INFORMACIÓN ESTUDIANTE COMPACT -->
        <div class="info-estudiante-compact">
            <div class="info-compact-fila">
                <div class="info-compact-etiqueta">Carrera:</div>
                <div class="info-compact-valor">{{ $estudiante->carrera->nombre ?? 'N/A' }}</div>
            </div>
            <div class="info-compact-fila">
                <div class="info-compact-etiqueta">Nivel:</div>
                <div class="info-compact-valor">{{ $estudiante->nivel ?? 'N/A' }}° Nivel</div>
            </div>
            <div class="info-compact-fila">
                <div class="info-compact-etiqueta">Fecha Emisión:</div>
                <div class="info-compact-valor">{{ now()->format('d/m/Y') }}</div>
            </div>
        </div>

        <div class="fecha">
            Manta, {{ now()->day }} de {{ now()->locale('es')->monthName }} de {{ now()->year }}.
        </div>
    </div>

    <!-- FIRMAS -->
    <table class="firmas-tabla" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <div class="linea-firma"></div>
                <div class="firma-nombre">_____________________</div>
                <div class="firma-cargo">Coordinador de Vinculación</div>
            </td>
            
            <td>
                <div class="linea-firma"></div>
                <div class="firma-nombre">_____________________</div>
                <div class="firma-cargo">Director de Carrera</div>
            </td>
            
            <td>
                <div class="linea-firma"></div>
                <div class="firma-nombre">_____________________</div>
                <div class="firma-cargo">Decano de Facultad</div>
            </td>
        </tr>
    </table>

    <!-- SELLO -->
    <div class="sello">
        <div class="sello-texto">
            SELLO<br>
            OFICIAL<br>
            ULEAM<br>
            <span style="font-size: 5px;">FINAL</span>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <strong>Manta - Manabí - Ecuador | www.uleam.edu.ec</strong><br>
        Documento que certifica la culminación de todas las prácticas profesionales
    </div>

</div>
</body>
</html>