<?php
    ob_start();
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("../mod_conexion/db_funciones.php");
    require_once("../dompdf/dompdf_config.inc.php");
    require_once ("../mod_aplicacion/fechaEs.php");

    $idpaciente  = $_GET['var'];
    $filename    = "informe_".$idpaciente.'.pdf';

    $db               = new DB_Funciones();
    $cargaInforme     = $db->imprimirInformePsico($idpaciente);
    $tamnoPapel       = "letter";
    $orientacionPapel = "portrait";
    $valorDefault     = " ";
    $indice           = 0;
    $valoracion       = "";
    /**********************************************************************DATOS PACIENTE***************************************************************************************************************************/
    $documentoPaciente  = $cargaInforme['datospaciente'][$indice]['documento'];
    $nombrePaciente    = $cargaInforme['datospaciente'][$indice]['nombres'];
    $lugarNacimiento   = $cargaInforme['datospaciente'][$indice]['lugarnacimiento'];
    $fchNacPaciente    = date( 'd M Y', strtotime($cargaInforme['datospaciente'][$indice]['fechanacimiento']));
    $edadPaciente      = $cargaInforme['datospaciente'][$indice]['edad'];
    $meses             = $cargaInforme['datospaciente'][$indice]['meses'];
    $dirPaciente       = $cargaInforme['datospaciente'][$indice]['direccion'];
    $ciudadResPaciente = $cargaInforme['datospaciente'][$indice]['ciudadresidencia'];
    $epsPaciente       = $cargaInforme['datospaciente'][$indice]['eps'];
    $informante        = $cargaInforme['datospaciente'][$indice]['informante'];
    /**********************************************************************DATOS PADRE***************************************************************************************************************************/
    $nombrePadre          = $cargaInforme['datospadre'][$indice]['nombres'];
    $edadPadre            = $cargaInforme['datospadre'][$indice]['edad'];
    $escolaridadPadre     = $cargaInforme['datospadre'][$indice]['escolaridad'];
    $ocupacionPadre       = $cargaInforme['datospadre'][$indice]['ocupacion'];
    $telefonoCelularPadre = $cargaInforme['datospadre'][$indice]['telefonocelular'];
    $telefonoFijoPadre    = $cargaInforme['datospadre'][$indice]['telefonofijo'];
   /**********************************************************************DATOS MADRE***************************************************************************************************************************/
    $nombreMadre          = $cargaInforme['datosmadre'][$indice]['nombres'];
    $edadMadre            = $cargaInforme['datosmadre'][$indice]['edad'];
    $escolaridadMadre     = $cargaInforme['datosmadre'][$indice]['escolaridad'];
    $ocupacionMadre       = $cargaInforme['datosmadre'][$indice]['ocupacion'];
    $telefonoCelularMadre = $cargaInforme['datosmadre'][$indice]['telefonocelular'];
    $telefonoFijoMadre    = $cargaInforme['datosmadre'][$indice]['telefonofijo'];
   /**********************************************************************DATOS SESIONES*******************************************************************************/
   /*
   $citaIncial    = date( 'd M Y', strtotime($cargaInforme['datossesiones'][$indice]['cita_inicial']));
   $entrevistaAcu = date( 'd M Y', strtotime($cargaInforme['datossesiones'][$indice]['entr_acudiente']));
   $fechaInforme  = date( 'd M Y', strtotime($cargaInforme['datossesiones'][$indice]['fech_informe']));
    */
    $citaIniFormat = new FechaEs($cargaInforme['datossesiones'][$indice]['cita_inicial']);
    $citaIncial = $citaIniFormat->getDateFormat(false);

    $entrAcuFormat = new FechaEs($cargaInforme['datossesiones'][$indice]['entr_acudiente']);
    $entrevistaAcu = $entrAcuFormat->getDateFormat(false);

    $fechInfoFormat = new FechaEs($cargaInforme['datossesiones'][$indice]['fech_informe']);
    $fechaInforme = $fechInfoFormat->getDateFormat(false);
    
    for( $i = 0; $i < sizeof($cargaInforme['datosvaloracion']); $i++ )
    {
        $fechaFormateada = new FechaEs($cargaInforme['datosvaloracion'][$i]['fch_val']);
        $fechaValoracion = $fechaFormateada->getDateFormat(false);
        
        if ($valoracion == '')
        {
           // $valoracion = date( 'd M Y', strtotime($cargaInforme['datosvaloracion'][$i]['fch_val']));
           $valoracion = $fechaValoracion;
        }else
        {
            //$valoracion = $valoracion. ' - '. date( 'd M Y', strtotime($cargaInforme['datosvaloracion'][$i]['fch_val']));
             $valoracion = $valoracion. ' - '.$fechaValoracion;
        }

    }
   /**********************************************************************DATOS PSICOLOGO*****************************************************************************/
   $psicologo     = $cargaInforme['datossesiones'][$indice]['psic'];
   $area          =  $cargaInforme['datossesiones'][$indice]['area'];
   $universidad   = $cargaInforme['datossesiones'][$indice]['univ'];
   $tarjetaProf   = $cargaInforme['datossesiones'][$indice]['tarjp'];
   $registro      = $cargaInforme['datossesiones'][$indice]['reg'];
   $firma         = $cargaInforme['datossesiones'][$indice]['firma'];
   /**********************************************************************DATOS INFORME*******************************************************************************/
   $motivoConsulta      = $cargaInforme['datosinforme'][$indice]['motivoconsulta'];
   $diagnosticosPrevios = $cargaInforme['datosinforme'][$indice]['diagnostico'];
   $objetivo            = $cargaInforme['datosinforme'][$indice]['objetivo'];
   $metodoEvaluacion    = $cargaInforme['datosinforme'][$indice]['metodoeval'];
   $resultadosInf       = $cargaInforme['datosinforme'][$indice]['resultados'];
   $conclusiones        = $cargaInforme['datosinforme'][$indice]['conclusiones'];
   $recomendaciones     = $cargaInforme['datosinforme'][$indice]['recomendaciones'];
   ?>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html' charset='utf-8'>
</head>
<body>
<div id='content'>
    <table id="tabla_principal" cellspacing="25" align="center">
        <!-- ###########################################################################ENCABEZADO######################################################################################### -->
        <tr id="fila_encabezado">
            <td id="columna_encabezado">
                <table width="90%" align="center">
                    <tr>
                        <td id="columna_logo" align="center">
                            <b><img src='../images/logoApa.png'></b>
                        </td>
                        <td id="columna_informacion">
                            <table id="tabla_informacion" width='100%' align='center'>
                                <tr>
                                    <td align='center' width='100%'>
                                        <font size="1" ><b class="bold">ASOCIACI&Oacute;N DE PERSONAS CON AUTISMO</b></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td align='center' width='100%'>
                                        <font size="1"><b class="bold">PERSONER&Iacute;A JUR&Iacute;DICA 0039 SEPTIEMBRE 8 DE 1993 NIT.800.205.977-3</b></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td align='center' width='100%'>
                                        <font size="1"><b class="bold">CALLE 2 No. 43-86 TELEFAX 5524567 CALI-COLOMBIA</b></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td align='center' width='100%'>
                                        <font size="1"><b class="bold">EMAIL: info@apaautismocali.com</b></font>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- ###########################################################################Titulo################################################################################# -->
        <tr id="fila_titulo">
            <td id="columna_titulo" align="center">
                <font size="1"><b class="bold">INFORME DE EVALUACI&Oacute;N POR PSICOLOG&Iacute;A</b></font>
            </td>
        </tr>
        <!-- ###########################################################################DATOS DEL PACIENTE########################################################################## -->
        <tr id="fila_paciente">
            <td id="columna_paciente">
                <table  id="tabla_paciente" width="100%" align="left" border="0.5">
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1" ><b class='bold'>IDENTIFICACI&Oacute;N:</b> <?php echo $documentoPaciente; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1" ><b class='bold'>NOMBRES Y APELLIDOS:</b> <?php echo $nombrePaciente; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>LUGAR Y FECHA DE NACIMIENTO:</b> <?php echo $lugarNacimiento; ?> <?php echo $fchNacPaciente; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>EDAD:</b> <?php echo $edadPaciente; ?><b> A&Ntilde;OS <?php echo $meses; ?> MESES</b></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>DIRECCI&Oacute;N: </b><?php echo $dirPaciente; ?><b> CIUDAD: <?php echo $ciudadResPaciente ; ?> </b></font>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <!-- ###########################################################################DATOS DEL PADRE########################################################################## -->
        <tr id="fila_padre">
            <td id="columna_padre">
                <table  id="tabla_padre" width="100%" align="left" border="0.5">
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>NOMBRE DEL PADRE:</b><?php echo $nombrePadre; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>EDAD:</b><?php echo $edadPadre; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>ESCOLARIDAD:</b><?php echo $escolaridadPadre; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>OCUPACI&Oacute;N:</b><?php echo $ocupacionPadre; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>TEL&Eacute;FONO CELULAR:</b><?php echo $telefonoCelularPadre; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>TEL&Eacute;FONO FIJO:</b><?php echo $telefonoFijoPadre; ?></font>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <!-- ###########################################################################DATOS DE LA MADRE########################################################################## -->
        <tr id="fila_madre">
            <td id="columna_madre">
                <table  id="tabla_madre" width="100%" align="left" border="0.5">
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>NOMBRE DE LA MADRE:</b> <?php echo $nombreMadre; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>EDAD:</b> <?php echo $edadMadre; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>ESCOLARIDAD:</b> <?php echo $escolaridadMadre; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>OCUPACI&Oacute;N:</b> <?php echo $ocupacionMadre; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>TEL&Eacute;FONO CELULAR:</b> <?php echo $telefonoCelularMadre; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>TEL&Eacute;FONO FIJO:</b> <?php echo $telefonoFijoMadre; ?></font>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr id="fila_sesion">
            <td id="columna_sesion" align="center">
                <font size="1"><b class="bold">SESIONES DE EVALUACI&Oacute;N</b></font>
            </td>
        </tr>
        <!-- ###########################################################################SESIONES DE EVALUACION########################################################################## -->
        <tr id="fila_sesiones">
            <td id="columna_sesiones">
                <table width='100%' align='left'border="0.5">
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>CITA INICIAL:</b> <?php echo $citaIncial; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>ENTREVISTA ACUDIENTE:</b> <?php echo $entrevistaAcu; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>VALORACI&Oacute;N (ES):</b> <?php echo $valoracion; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>FECHA INFORME:</b> <?php echo $fechaInforme; ?></font>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <!-- ###########################################################################MOTIVO CONSULTA################################################################################ -->
        <tr>
            <td align='left' width='100%'>
                <font size="2"><b class='bold'>MOTIVO CONSULTA</b></font>
            </td>
        </tr>
        <tr>
            <td align='left' width='100%' >
                <?php echo $motivoConsulta; ?>
            </td>
        </tr>
        <!-- ###########################################################################DIAGNOSTICOS PREVIOS################################################################################ -->
        <tr>
            <td align='left' width='100%'>
                <font size="2"><b class='bold'>DIAGN&Oacute;STICOS PREVIOS</b></font>
            </td>
        </tr>
        <tr>
            <td align='left' width='100%' >
                <?php echo $diagnosticosPrevios; ?>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <td align='center' width='100%'>
                <font size="2"><b class='bold'>CONSTITUCI&Oacute;N FAMILIAR</b></font>
            </td>
        </tr>
        <!-- ###########################################################################CONSTITUCIÓN FAMILIAR################################################################################ -->
        <tr id="fila_consfamilar">
            <td id="columna_consfamiliar" align="center">
                <table id="table_consfamiliar" border="0.5" align="center">
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>PARENTESCO</b></font>
                        </td>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>NOMBRES</b></font>
                        </td>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>EDAD</b></font>
                        </td>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>OCUPACIÓN</b></font>
                        </td>
                    </tr>
                    <?php
                    for ($j = 0; $j < sizeof($cargaInforme['datosconsfamiliar']); $j++)
                    {
                        $parentesco        = $cargaInforme['datosconsfamiliar'][$j]['parentesco'];
                        $nombresFamiliar   =  $cargaInforme['datosconsfamiliar'][$j]['nombres'];
                        $edadFamiliar      = $cargaInforme['datosconsfamiliar'][$j]['edad'];
                        $ocupacionFamiliar = $cargaInforme['datosconsfamiliar'][$j]['ocupacion'];
                        ?>
                        <tr>
                            <td align='left' width='100%'>
                                <font size="1"><?php echo $parentesco; ?></font>
                            </td>
                            <td align='left' width='100%'>
                                <font size="1"><?php echo $nombresFamiliar; ?></font>
                            </td>
                            <td align='left' width='100%'>
                                <font size="1"><?php echo $edadFamiliar; ?></font>
                            </td>
                            <td align='left' width='100%'>
                                <font size="1"><?php echo $ocupacionFamiliar; ?></font>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <td align='center' width='100%'>
                <font size="2"><b class='bold'>HISTORIA - INSTITUCIONES EDUCATIVAS - INTERVENCIONES TERAPE&Uacute;TICAS - EVALUACIONES</b></font>
            </td>
        </tr>
        <tr id="fila_historia">
            <td id="columna_historia">
                <table id="table_historia" border="0.5">
                    <tr>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>PROFESI&Oacute;N</b></font>
                        </td>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>INSTITUCI&Oacute;N</b></font>
                        </td>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>TIEMPO</b></font>
                        </td>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>EDAD INICIO</b></font>
                        </td>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>DURACI&Oacute;N</b></font>
                        </td>
                        <td align='left' width='100%'>
                            <font size="1"><b class='bold'>RESULTADOS</b></font>
                        </td>
                    </tr>
                    <?php
                    for ($k = 0; $k < sizeof($cargaInforme['datoshistoria']); $k++)
                    {
                        $profesion   = $cargaInforme['datoshistoria'][$k]['profesion'];
                        $institucion = $cargaInforme['datoshistoria'][$k]['institucion'];
                        $tiempo      = $cargaInforme['datoshistoria'][$k]['tiempo'];
                        $edad        = $cargaInforme['datoshistoria'][$k]['edad'];
                        $duracion    = $cargaInforme['datoshistoria'][$k]['duracion'];
                        $resultados  = $cargaInforme['datoshistoria'][$k]['resultados'];
                        ?>
                        <tr>
                            <td align='left' width='100%'>
                                <font size="1"><?php echo $profesion; ?></font>
                            </td>
                            <td align='left' width='100%'>
                                <font size="1"><?php echo $institucion; ?></font>
                            </td>
                            <td align='left' width='100%'>
                                <font size="1"><?php echo $tiempo; ?></font>
                            </td>
                            <td align='left' width='100%'>
                                <font size="1"><?php echo $edad; ?></font>
                            </td>
                            <td align='left' width='100%'>
                                <font size="1"><?php echo $duracion; ?></font>
                            </td>
                            <td align='left' width='100%'>
                                <font size="1"><?php echo $resultados; ?></font>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
    <table id="table_historia">
        <tr><td></td></tr>
        <tr><td></td></tr>
    </table>
        <!-- ###########################################################################OBJETIVO EVALUACION################################################################################ -->
    <table id="table_historia">
        <tr id="fila_objevaluacion">
            <td align='left' width='100%'>
                <font size="2"><b class='bold'>OBJETIVO DE LA EVALUACI&Oacute;N</b></font>
            </td>
        </tr>
    </table>
    <br>
    <?php echo"<p align='justify'>".nl2br($objetivo)."</p>"; ?>
    <table id="table_historia">
        <tr><td></td></tr>
        <tr><td></td></tr>
    </table>
        <!-- ###########################################################################METODO EVALUACION################################################################################ -->
    <table id="table_historia">
        <tr id="fila_metevaluacion">
            <td align='left' width='100%'>
                <font size="2"><b class='bold'>METODO DE EVALUACI&Oacute;N</b></font>
            </td>
        </tr>
    </table>
    <br>
    <?php echo"<p align='justify'>".nl2br($metodoEvaluacion)."</p>"; ?>
    <table id="table_historia">
        <tr><td></td></tr>
        <tr><td></td></tr>
    </table>
        <!-- ###########################################################################RESULTADOS################################################################################ -->
    <table id="table_historia">
        <tr id="fila_resultados">
            <td align='left' width='100%'>
                <font size="2"><b class='bold'>RESULTADOS</b></font>
            </td>
        </tr>
    </table>
    <br>
    <?php echo"<p align='justify'>".nl2br($resultadosInf)."</p>"; ?>
    <table id="table_historia">
        <tr><td></td></tr>
        <tr><td></td></tr>
    </table>
        <!-- ###########################################################################CONCLUSIONES################################################################################ -->
    <table id="table_historia">
        <tr id="fila_conclusiones">
            <td align='left' width='100%'>
                <font size="2"><b class='bold'>CONCLUSIONES</b></font>
            </td>
        </tr>
    </table>
    <br>
    <?php echo"<p align='justify'>".nl2br($conclusiones)."</p>"; ?>
    <table id="table_historia">
        <tr><td></td></tr>
        <tr><td></td></tr>
    </table>
    <table id="table_historia">
        <tr><td></td></tr>
        <tr id="fila_recomendaciones">
            <td align='left' width='100%'>
                <font size="2"><b class='bold'>RECOMENDACIONES</b></font>
            </td>
        </tr>
    </table>
    <br>
    <?php echo"<p align='justify'>".nl2br($recomendaciones)."</p>"; ?>
    <table id="table_historia">
        <tr><td></td></tr>
        <tr><td></td></tr>
    </table>
    <table id="table_historia">
        <tr id="fila_firma">
            <td>
                <p><img style="width:180px;" src="../firmas/<?php echo $firma;?>"></p>
                <p>------------------------------</p>
                <p><?php echo strtoupper($psicologo);?></p>
                <p><?php echo $area;?></p>
                <p><?php echo $universidad;?></p>
                <p>TP<?php echo $tarjetaProf;?></p>
                <p>Res <?php echo $registro; ?></p>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
<?php
    $dompdf = new DOMPDF();
    $dompdf->set_paper($tamnoPapel, $orientacionPapel);
    $dompdf->load_html(ob_get_clean());
    $dompdf->render();
    $pdf = $dompdf->output();
    $dompdf->stream($filename);
?>

