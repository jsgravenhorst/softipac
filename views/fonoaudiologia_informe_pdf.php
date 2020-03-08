<?php
    ob_start();
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("../mod_conexion/db_funciones.php");
    require_once("../dompdf/dompdf_config.inc.php");
    require_once ("../mod_aplicacion/fechaEs.php");

    $idpaciente  = $_GET['idpaciente'];
    $idinforme  =  $_GET['idinforme'];

    $db               = new DB_Funciones();
    $cargaInforme     = $db->imprimirInformeFono($idpaciente,$idinforme);

    $filename         = "informe_".$idpaciente.'.pdf';
    $tamnoPapel       = "letter";
    $orientacionPapel = "portrait";
    $indice           = 0;
    $seleccion        = "x";
    $valorDefault     = " ";

    $bocaNormal  = $valorDefault;
    $bocaAmplia  = $valorDefault;
    $bocaPequena = $valorDefault;

    $labSupGrueso        = $valorDefault;
    $labSupCorto         = $valorDefault;
    $labSupNormal        = $valorDefault;
    $labSupEvertido      = $valorDefault;
    $labSupIrregularidad = $valorDefault;

    $labInfGrueso   = $valorDefault;
    $labInfCorto    = $valorDefault;
    $labInfNormal   = $valorDefault;
    $labInfEvertido = $valorDefault;

    $enciaNormal = $valorDefault;

    $encColorNormal   = $valorDefault;
    $encColorAmarillo = $valorDefault;
    $encColorBlanco   = $valorDefault;
    $encColorRojo     = $valorDefault;
    $encColorOtro     = $valorDefault;

    $encSenNormal        = $valorDefault;
    $encSenHiposensible  = $valorDefault;
    $encSenHipersensible = $valorDefault;

    $bocaSecaSi = $valorDefault;
    $bocaSecaNo = $valorDefault;

    $simFacialNormal   = $valorDefault;
    $simFacialAlterada = $valorDefault;

    $tonMusNormal      = $valorDefault;
    $tonMusHipotonico  = $valorDefault;
    $tonMusHipertonico = $valorDefault;

    $senNormal     = $valorDefault;
    $senAumentada  = $valorDefault;
    $senDisminuida = $valorDefault;

    $movNormal   = $valorDefault;
    $movAlterada = $valorDefault;

    $movimientoSi    = $valorDefault;
    $movimientoNo    = $valorDefault;

    $sigueojosSi      =  $valorDefault;
    $sigueojosNo      =  $valorDefault;
    $sigueojosAlgunas = $valorDefault;

    $sonrisaSi      = $valorDefault;
    $sonrisaNo      = $valorDefault;
    $sonrisaAlgunas = $valorDefault;

    $comprendenomSi = $valorDefault;
    $comprendenomNo = $valorDefault;

    $comprendepalSi = $valorDefault;
    $comprendepalNo = $valorDefault;

    $juegosSi      = $valorDefault;
    $juegosNo      = $valorDefault;
    $juegosAlgunas = $valorDefault;
    $juegosSiNoInc = $valorDefault;

    $imitasilSi = $valorDefault;
    $imitasilNo = $valorDefault;

    $senpartesSi = $valorDefault;
    $senpartesNo = $valorDefault;

    /**********************************************************************DATOS PACIENTE***************************************************************************************************************************/
    $nombrePaciente    = $cargaInforme['datospaciente'][$indice]['nombres'];
    $fchNacPaciente    = date( 'd M Y', strtotime($cargaInforme['datospaciente'][$indice]['fechanacimiento']));
    $edadPaciente      = $cargaInforme['datospaciente'][$indice]['edad'];
    $documentoPaciente = $cargaInforme['datospaciente'][$indice]['documento'];
    $nombreMadre       = $cargaInforme['datospaciente'][$indice]['nombremam'];
    $lugarNacimiento   = $cargaInforme['datospaciente'][$indice]['lugarnacimiento'];
    $meses             = $cargaInforme['datospaciente'][$indice]['meses'];
    $dirPaciente       = $cargaInforme['datospaciente'][$indice]['direccion'];
    $ciudadResPaciente = $cargaInforme['datospaciente'][$indice]['ciudadresidencia'];
    $epsPaciente       = $cargaInforme['datospaciente'][$indice]['eps'];
    $informante        = $cargaInforme['datospaciente'][$indice]['informante'];
    $fechaEval         = $cargaInforme['fecha_eval'][$indice]['fecha_prog'];
    $fechaCrea         = $cargaInforme['fecha_eval'][$indice]['fecha_crea'];
    /**********************************************************************MOTIVO CONSULTA - REMISION - DIAGNOSTICOS PREVIOS *******************************************************************************/
    $motivoConsulta   = $cargaInforme['mot_rem_diag'][$indice]['motivoconsulta'];
    $remitidoPor      = $cargaInforme['mot_rem_diag'][$indice]['remitidopor'];
    $motivoRemision   = $cargaInforme['mot_rem_diag'][$indice]['motivo'];
    $diagnosticosPrev = $cargaInforme['mot_rem_diag'][$indice]['diagnostico'];

    /*****************************************************************************************************************************************************************************************************
     *                                                                       EVALUACION DEL SISTEMA ESTOMATOGNATICO
     *******************************************************************************************************************************************************************************************************/
    /*****************************************************************************Examen Extra Oral ********************************************************************************************************/
    /********************************************************************************  Boca *****************************************************************************************************************/
    if ($cargaInforme['boca'][$indice]['normal'] == 1)
    {
        $bocaNormal = $seleccion;
    }

    if ($cargaInforme['boca'][$indice]['amplia'] == 1)
    {
        $bocaAmplia = $seleccion;
    }

    if ($cargaInforme['boca'][$indice]['pequena'] == 1)
    {
        $bocaPequena = $seleccion;
    }
     /*******************************************************************************Labio Superior************************************************************************************************************/
    if ($cargaInforme['labiosup'][$indice]['grueso'] == 1)
    {
        $labSupGrueso = $seleccion;
    }

    if ($cargaInforme['labiosup'][$indice]['corto'] == 1)
    {
        $labSupCorto = $seleccion;
    }

    if ($cargaInforme['labiosup'][$indice]['normal'] == 1)
    {
        $labSupNormal = $seleccion;
    }

    if ($cargaInforme['labiosup'][$indice]['evertido'] == 1)
    {
        $labSupEvertido = $seleccion;
    }

    if ($cargaInforme['labiosup'][$indice]['irregularidad'] == 1)
    {
        $labSupIrregularidad = $seleccion;
    }
    /************************************************************************************Labio Inferior ****************************************************************************************************/
    if ($cargaInforme['labioinf'][$indice]['grueso'] == 1)
    {
        $labInfGrueso = $seleccion;
    }

    if ($cargaInforme['labioinf'][$indice]['corto'] == 1)
    {
        $labInfCorto = $seleccion;
    }

    if ($cargaInforme['labioinf'][$indice]['normal'] == 1)
    {
        $labInfNormal = $seleccion;
    }

    if ( $cargaInforme['labioinf'][$indice]['evertido'] == 1)
    {
        $labInfEvertido = $seleccion;
    }
       /*************************************************************************************Examen Intraoral*******************************************************************************************************/
   /*****************************************************************************Encia Normal**********************************************************************************************************************/
    if ( $cargaInforme['encnormal'][$indice]['normal'] == 1)
    {
        $enciaNormal = $seleccion;
    }
   /*****************************************************************************Color Encia*************************************************************************************************************************/
    if ( $cargaInforme['enccolor'][$indice]['normal'] == 1)
    {
        $encColorNormal = $seleccion;
    }

    if ( $cargaInforme['enccolor'][$indice]['amarillo'] == 1)
    {
        $encColorAmarillo = $seleccion;
    }

    if ( $cargaInforme['enccolor'][$indice]['blanco'] == 1)
    {
        $encColorBlanco = $seleccion;
    }

    if ( $cargaInforme['enccolor'][$indice]['rojo'] == 1)
    {
        $encColorRojo = $seleccion;
    }

    if ( $cargaInforme['enccolor'][$indice]['otro'] == 1)
    {
        $encColorOtro = $seleccion;
    }
    /****************************************************************************Sensibilidad Encia*************************************************************************************************************/
    if ( $cargaInforme['encsen'][$indice]['normal'] == 1)
    {
        $encSenNormal = $seleccion;
    }

    if ( $cargaInforme['encsen'][$indice]['hiposensible'] == 1)
    {
        $encSenHiposensible = $seleccion;
    }

    if ( $cargaInforme['encsen'][$indice]['hipersensible'] == 1)
    {
        $encSenHipersensible = $seleccion;
    }
        /*********************************************************************************Boca Seca**********************************************************************************************************************/

    if ( $cargaInforme['bocaseca'][$indice]['si'] == 1)
    {
        $bocaSecaSi = $seleccion;
    }

    if ( $cargaInforme['bocaseca'][$indice]['no'] == 1)
    {
        $bocaSecaNo = $seleccion;
    }
/********************************************************************************************************************************************************************************************************************
 *                                                                                CONFIGURACION OSEA
 ****************************************************************************************************************************************************************************************************************/
/*********************************************************************************Simetria Facial*********************************************************************************************************/
    if ( $cargaInforme['simfacial'][$indice]['normal'] == 1)
    {
        $simFacialNormal = $seleccion;
    }

    if ( $cargaInforme['simfacial'][$indice]['alterada'] == 1)
    {
        $simFacialAlterada = $seleccion;
    }
/*********************************************************************************Tono muscular*******************************************************************************************************************/
    if ( $cargaInforme['tonmuscular'][$indice]['normal'] == 1)
    {
        $tonMusNormal = $seleccion;
    }

    if ( $cargaInforme['tonmuscular'][$indice]['hipotonico'] == 1)
    {
        $tonMusHipotonico = $seleccion;
    }

    if ( $cargaInforme['tonmuscular'][$indice]['hipertonico'] == 1)
    {
        $tonMusHipertonico = $seleccion;
    }
 /*********************************************************************************Sensibilidad**********************************************************************************************************************/
    if ( $cargaInforme['sensibilidad'][$indice]['normal'] == 1)
    {
        $senNormal = $seleccion;
    }

    if ( $cargaInforme['sensibilidad'][$indice]['aumentada'] == 1)
    {
        $senAumentada = $seleccion;
    }

    if ( $cargaInforme['sensibilidad'][$indice]['disminuida'] == 1)
    {
        $senDisminuida = $seleccion;
    }
    /*********************************************************************************Movilidad**********************************************************************************************************************/
    if ( $cargaInforme['movilidad'][$indice]['normal'] == 1)
    {
        $movNormal = $seleccion;
    }

    if ( $cargaInforme['movilidad'][$indice]['alterada'] == 1)
    {
        $movAlterada = $seleccion;
    }
/************************************************************************************************************************************************************************************************************************
 *                                                                                           ALIMENTACION
 ************************************************************************************************************************************************************************************************************************/

/***************************************************************************************Fase Anticipatoria **************************************************************************************************************/
    $faseant =  $cargaInforme['faseantp'][$indice]['faseant'];
/*****************************************************************************************Fase Preparatoria*************************************************************************************************************/
    $fasepre = $cargaInforme['faseprep'][$indice]['fasepre'];
/*****************************************************************************************Fase Oral********************************************************************************************************************/
    $faseoral =  $cargaInforme['faseorl'][$indice]['faseoral'];
/*****************************************************************************************Conclusion********************************************************************************************************************/
    $conclusion = $cargaInforme['conclusion'][$indice]['texto'];
/************************************************************************************************************************************************************************************************************************
 *                                                                                   CONDUCTA PRELINGUISTICA
 *************************************************************************************************************************************************************************************************************************/
/***************************************************************************************Realiza Movimientos***************************************************************************************************************/
    if ( $cargaInforme['movimiento'][$indice]['si'] == 1)
    {
        $movimientoSi = $seleccion;
    }

    if ( $cargaInforme['movimiento'][$indice]['no'] == 1)
    {
        $movimientoNo = $seleccion;
    }
    $movimientoQuien = $cargaInforme['movimiento'][$indice]['texto'];
/***************************************************************************************Sigue con los ojos ***************************************************************************************************************/
    if ( $cargaInforme['sigueojos'][$indice]['si'] == 1)
    {
        $sigueojosSi = $seleccion;
    }

    if ( $cargaInforme['sigueojos'][$indice]['no'] == 1)
    {
        $sigueojosNo = $seleccion;
    }

    if ( $cargaInforme['sigueojos'][$indice]['algunas'] == 1)
    {
        $sigueojosAlgunas = $seleccion;
    }
    $sigueojosQuien   =  $cargaInforme['sigueojos'][$indice]['texto'];
/***************************************************************************************Posee sonrisa social****************************************************************************************************************/
    if ( $cargaInforme['sonrisa'][$indice]['si'] == 1)
    {
        $sonrisaSi = $seleccion;
    }

    if ( $cargaInforme['sonrisa'][$indice]['no'] == 1)
    {
        $sonrisaNo = $seleccion;
    }

    if ( $cargaInforme['sonrisa'][$indice]['algunas'] == 1)
    {
        $sonrisaAlgunas = $seleccion;
    }
    $sonrisaQuien   = $cargaInforme['sonrisa'][$indice]['texto'];
/***************************************************************************************Comprende llaman nombre****************************************************************************************************************/
    if ( $cargaInforme['compnom'][$indice]['si'] == 1)
    {
        $comprendenomSi = $seleccion;
    }

    if ( $cargaInforme['compnom'][$indice]['no'] == 1)
    {
        $comprendenomNo = $seleccion;
    }
/***************************************************************************************Comprende palabras********************************************************************************************************************/
    if ( $cargaInforme['comppal'][$indice]['si'] == 1)
    {
        $comprendepalSi = $seleccion;
    }

    if ( $cargaInforme['comppal'][$indice]['no'] == 1)
    {
        $comprendepalNo = $seleccion;
    }
    /***************************************************************************************Responde a los juegos********************************************************************************************************************/
    if ($cargaInforme['juegos'][$indice]['si'] == 1)
    {
        $juegosSi = $seleccion;
    }

    if ( $cargaInforme['juegos'][$indice]['no'] == 1)
    {
        $juegosNo = $seleccion;
    }

    if ( $cargaInforme['juegos'][$indice]['algunas'] == 1)
    {
        $juegosAlgunas = $seleccion;
    }

    if ( $cargaInforme['juegos'][$indice]['otro'] == 1)
    {
        $juegosSiNoInc = $seleccion;
    }

    /***************************************************************************************Imita silabas********************************************************************************************************************/
    if ( $cargaInforme['imitasil'][$indice]['si'] == 1)
    {
        $imitasilSi = $seleccion;
    }

    if ( $cargaInforme['imitasil'][$indice]['no'] == 1)
    {
        $imitasilNo = $seleccion;
    }
    /***************************************************************************************Señala partes  ********************************************************************************************************************/
    if ( $cargaInforme['senpartes'][$indice]['si'] == 1)
    {
        $senpartesSi = $seleccion;
    }

    if ( $cargaInforme['senpartes'][$indice]['no'] == 1)
    {
        $senpartesNo = $seleccion;
    }
    /*****************************************************************************************************************************************************************************************************************************
     *                                                                                          LENGUAJE
     ****************************************************************************************************************************************************************************************************************************/
    /***************************************************************************************Lenguaje Expresivo ********************************************************************************************************************/
    $expr = $cargaInforme['expr'][$indice]['texto'];
    /***************************************************************************************Lenguaje Expresivo ********************************************************************************************************************/
    $compr = $cargaInforme['compr'][$indice]['texto'];
    /*****************************************************************************************************************************************************************************************************************************
                                                                                            CONDUCTA Y HABITOS
     ***************************************************************************************************************************************************************************************************************************/
    $habitos = $cargaInforme['habitos'][$indice]['texto'];
    /*****************************************************************************************************************************************************************************************************************************
                                                                                                COGNITIVO
     ***************************************************************************************************************************************************************************************************************************/
    $cognitivo = $cargaInforme['cognitivo'][$indice]['texto'];
    /*****************************************************************************************************************************************************************************************************************************
                                                                                                JUEGO
     ***************************************************************************************************************************************************************************************************************************/
    $juego = $cargaInforme['juego'][$indice]['texto'];
    /*****************************************************************************************************************************************************************************************************************************
                                                                                                AREA SOCIAL
     ***************************************************************************************************************************************************************************************************************************/
    $areasocial =$cargaInforme['areasoc'][$indice]['texto'];
    /*****************************************************************************************************************************************************************************************************************************
                                                                                            DIAGNOSTICOS Y RECOMENDACIONES
     ***************************************************************************************************************************************************************************************************************************/
    $resultados      = $cargaInforme['diagrecom'][$indice]['resultados'];
    $recomendaciones = $cargaInforme['diagrecom'][$indice]['recomendaciones'];
    /*****************************************************************************************************************************************************************************************************************************
                                                                                                DATOS TERAPEUTA
     ***************************************************************************************************************************************************************************************************************************/
    $firma       = $cargaInforme['datostera'][$indice]['firma'];
    $nombresFono = $cargaInforme['datostera'][$indice]['fono'];
    $area        = $cargaInforme['datostera'][$indice]['area'];
    $universidad = $cargaInforme['datostera'][$indice]['universidad'];
    $tarjetaProf = $cargaInforme['datostera'][$indice]['tarjetaprofesional'];
    $registro    = $cargaInforme['datostera'][$indice]['registro'];
?>
<html>
    <head>
        <meta  http-equiv="Content-Type" content="text/html" charset="UTF-8">
    </head>
    <body>
        <div id="content">
            <table id="tabla_principal" cellspacing="24" align="center">
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
                <!-- ###############################################################################################################Titulo################################################################################################################ -->
                <tr id="fila_titulo">
                    <td id="columna_titulo" align="center">
                        <font size="1"><b class="bold">INFORME DE EVALUACI&Oacute;N POR FONOAUDIOLOG&Iacute;A</b></font>
                    </td>
                </tr>
                <!--  #####################################################################################################DATOS DEL PACIENTE############################################################################################################ -->
                <tr id="fila_paciente">
                    <td id="columna_paciente">
                        <table  id="tabla_paciente" width="100%" align="left">
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="1" ><b class='bold'>NOMBRE:</b> <?php echo $nombrePaciente; ?></font>
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
                                    <font size="1" ><b class='bold'>N&Uacute;MERO DE IDENTIFICACI&Oacute;N:</b> <?php echo $documentoPaciente; ?></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="1"><b class='bold'>NOMBRE DE LA MADRE:</b> <?php echo $nombreMadre; ?></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="1"><b class='bold'>INFORMANTE:</b> <?php echo $informante; ?></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="1"><b class='bold'>DIRECCI&Oacute;N:</b> <?php echo $dirPaciente; ?></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="1"><b class='bold'>EPS:</b> <?php echo $epsPaciente; ?></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="1"><b class='bold'>FECHA DE VALORACI&Oacute;N :</b> <?php echo $fechaEval; ?></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="1"><b class='bold'>FECHA ENTREGA DE INFORME:</b> <?php echo $fechaCrea; ?></font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <!-- ###########################################################################MOTIVO CONSULTA################################################################################ -->
                <tr>
                    <td>
                        <table>
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

                        </table>
                    </td>
                </tr>
                <!-- ###########################################################################REMISION################################################################################################# -->
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>REMISI&Oacute;N</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="2"><b class='bold'>Remitido por:</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%' >
                                    <?php echo $remitidoPor; ?>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>Motivo:</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%' >
                                    <?php echo $motivoRemision; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- ###########################################################################DIAGNOSTICOS PREVIOS################################################################################ -->
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>DIAGN&Oacute;STICOS PREVIOS</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%' >
                                    <?php echo $diagnosticosPrev; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- ###########################################################################EVALUACION DEL SISTEMA ESTOMATOGNATICO################################################################################ -->
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>EVALUACI&Oacute;N DEL SISTEMA ESTOMATOGN&Aacute;TICO</b></font>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>Examen extra-oral</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="2"><b class='bold'>Boca:</b>
                                        &nbsp;
                                        Normal&nbsp;<b class="bold"><u><?php echo $bocaNormal; ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Amplia&nbsp;<b class="bold"><u><?php echo $bocaAmplia; ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Peque&ntilde;a&nbsp;<b class="bold"><u><?php echo $bocaPequena; ?></u></b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="2">
                                        <b class='bold'>Labio Superior:</b>
                                        &nbsp;
                                        Grueso&nbsp;<b class="bold"><u><?php echo $labSupGrueso; ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Corto&nbsp;<b class="bold"><u><?php echo $labSupCorto ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Normal&nbsp;<b class="bold"><u><?php echo $labSupNormal ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Evertido&nbsp;<b class="bold"><u><?php echo $labSupEvertido; ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Presenta irregularidad&nbsp;<b class="bold"><u><?php echo $labSupIrregularidad; ?></u></b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="2">
                                        <b class="bold">Labio Inferior:</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;Grueso&nbsp;<b class="bold"><u><?php echo $labInfGrueso ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Corto&nbsp;<b class="bold"><u><?php echo $labInfCorto ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Normal&nbsp;<b class="bold"><u><?php echo $labInfNormal ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Evertido&nbsp;<b class="bold"><u><?php echo $labInfEvertido ?></u></b>
                                    </font>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>Examen intraoral</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="2">
                                        <b class="bold">Encia:</b>
                                        &nbsp;Normal&nbsp;<b class="bold"><u><?php echo $enciaNormal ?></u></b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="2">
                                        <b class="bold">Color:</b>
                                        &nbsp;Normal&nbsp;<b class="bold"><u><?php echo $encColorNormal  ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Amarillo&nbsp;<b class="bold"><u><?php echo $encColorAmarillo ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Blanco&nbsp;<b class="bold"><u><?php echo $encColorBlanco ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Rojo&nbsp;<b class="bold"><u><?php echo $encColorRojo ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Otro&nbsp;<b class="bold"><u><?php echo $encColorOtro ?></u></b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="2">
                                        <b class="bold">Sensibilidad:</b>
                                        &nbsp;Normal&nbsp;<b class="bold"><u><?php echo $encSenNormal  ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Hiposensible&nbsp;<b class="bold"><u><?php echo $encSenHiposensible ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Hipersensible&nbsp;<b class="bold"><u><?php echo $encSenHipersensible ?></u></b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="2">
                                        <b class="bold">Boca Seca:</b>
                                        &nbsp;Si&nbsp;<b class="bold"><u><?php echo $bocaSecaSi  ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        No&nbsp;<b class="bold"><u><?php echo $bocaSecaNo ?></u></b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- ###########################################################################CONFIGURACION OSEA################################################################################ -->
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>CONFIGURACI&Oacute;N OSEA</b></font>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr>
                                <td>
                                    <font size="2">
                                        <b class="bold">Simetria Facial:</b>
                                        &nbsp;Normal&nbsp;<b class="bold"><u><?php echo $simFacialNormal  ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Alterada&nbsp;<b class="bold"><u><?php echo $simFacialAlterada ?></u></b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="2">
                                        <b class="bold">Tono Muscular:</b>
                                        &nbsp;Normal&nbsp;<b class="bold"><u><?php echo $tonMusNormal  ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Hipot&oacute;nico&nbsp;<b class="bold"><u><?php echo $tonMusHipotonico ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Hipert&oacute;nico&nbsp;<b class="bold"><u><?php echo $tonMusHipertonico ?></u></b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="2">
                                        <b class="bold">Sensibilidad:</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Normal&nbsp;<b class="bold"><u><?php echo $senNormal  ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Aumentada&nbsp;<b class="bold"><u><?php echo $senAumentada ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Disminuida&nbsp;<b class="bold"><u><?php echo $senDisminuida ?></u></b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font size="2">
                                        <b class="bold">Movilidad:</b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Normal&nbsp;<b class="bold"><u><?php echo $movNormal  ?></u></b>
                                        &nbsp;&nbsp;&nbsp;
                                        Alterada&nbsp;<b class="bold"><u><?php echo $movAlterada ?></u></b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- ####################################################################################ALIMENTACION############################################################################################################################# -->
               <tr>
                   <td>
                       <table>
                           <tr>
                               <td align='left' width='100%'>
                                   <font size="2"><b class='bold'>ALIMENTACI&Oacute;N</b></font>
                               </td>
                           </tr>
                           <tr>
                               <td><font size="2"><b class="bold">Tipos de alimentos observados por la evaluaci&oacute;n</b>&nbsp;</font></td>
                           </tr>
                           <tr><td></td></tr>
                           <tr>
                               <td><font size="2"><b class="bold">Fase anticipatoria</b></font></td>
                           </tr>
                           <tr>
                               <td><?php echo $faseant; ?></td>
                           </tr>
                           <tr><td></td></tr>
                           <tr>
                               <td><font size="2"><b class="bold">Fase preparatoria</b></font></td>
                           </tr>
                           <tr>
                               <td><?php echo $fasepre; ?></td>
                           </tr>
                           <tr><td></td></tr>
                           <tr>
                               <td><font size="2"><b class="bold">Fase oral</b></font></td>
                           </tr>
                           <tr>
                               <td><?php echo $faseoral; ?></td>
                           </tr>
                           <tr><td></td></tr>
                           <tr>
                               <td><font size="2"><b class="bold">Conclusi&oacute;n</b></font></td>
                           </tr>
                           <tr>
                               <td><?php echo $conclusion; ?></td>
                           </tr>
                       </table>
                   </td>
               </tr>
               <!-- ####################################################################################CONDUCTAS PRELINGUISTICAS############################################################################################################################# -->
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>CONDUCTAS PRELING&Uuml;ISTICAS</b></font>
                                </td>
                            </tr>
                            <!-- ####################################################################################Realiza Movimientos############################################################################################################################# -->
                            <tr>
                                <td>
                                    <font size="2"><b class='bold'>&iquest;Realiza movimientos con alguna parte del cuerpo, al escuchar que alguien le habla ?</b></font>
                                    &nbsp;
                                    Si&nbsp;<b class="bold"><u><?php echo $movimientoSi; ?></u></b>
                                    &nbsp;&nbsp;&nbsp;
                                    No&nbsp;<b class="bold"><u><?php echo $movimientoNo; ?></u></b>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr>
                                <td>
                                    <font size="2"><b class='bold'>&iquest;Quien ?</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo  $movimientoQuien; ?>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <!-- ####################################################################################Sigue con los ojos############################################################################################################################# -->
                            <tr>
                                <td>
                                    <font size="2"><b class='bold'>&iquest;Sigue con los ojos la direcci&oacute;n de la mirada del adulto ?</b></font>
                                    &nbsp;
                                    Si&nbsp;<b class="bold"><u><?php echo $sigueojosSi; ?></u></b>
                                    &nbsp;&nbsp;&nbsp;
                                    No&nbsp;<b class="bold"><u><?php echo $sigueojosNo; ?></u></b>
                                    &nbsp;&nbsp;&nbsp;
                                    Algunas veces&nbsp;<b class="bold"><u><?php echo $sigueojosAlgunas; ?></u></b>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr>
                                <td>
                                    <font size="2"><b class='bold'>&iquest;Cuando ?</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo  $sigueojosQuien; ?>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <!-- ####################################################################################Posee sonrisa social############################################################################################################################# -->
                            <tr>
                                <td>
                                    <font size="2"><b class='bold'>&iquest;Posee sonrisa social ?</b></font>
                                    &nbsp;
                                    Si&nbsp;<b class="bold"><u><?php echo $sonrisaSi; ?></u></b>
                                    &nbsp;&nbsp;&nbsp;
                                    No&nbsp;<b class="bold"><u><?php echo $sonrisaNo; ?></u></b>
                                    &nbsp;&nbsp;&nbsp;
                                    Algunas veces&nbsp;<b class="bold"><u><?php echo $sonrisaAlgunas; ?></u></b>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr>
                                <td>
                                    <font size="2"><b class='bold'>&iquest;Qui&eacute;n ?</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo  $sonrisaQuien; ?>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <!-- ####################################################################################Comprende cuando lo llaman############################################################################################################################# -->
                            <tr>
                                <td>
                                    <font size="2"><b class='bold'>&iquest;El ni&ntilde;o comprende cuando lo llaman por su nombre ?</b></font>
                                    &nbsp;
                                    Si&nbsp;<b class="bold"><u><?php echo $comprendenomSi; ?></u></b>
                                    &nbsp;&nbsp;&nbsp;
                                    No&nbsp;<b class="bold"><u><?php echo $comprendenomNo; ?></u></b>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <!-- ####################################################################################Comprende palabras############################################################################################################################# -->
                            <tr>
                                <td>
                                    <font size="2"><b class='bold'>&iquest;El ni&ntilde;o comprende palabras en diferentes contextos ?</b></font>
                                    &nbsp;
                                    Si&nbsp;<b class="bold"><u><?php echo $comprendepalSi; ?></u></b>
                                    &nbsp;&nbsp;&nbsp;
                                    No&nbsp;<b class="bold"><u><?php echo $comprendepalNo; ?></u></b>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <!-- ####################################################################################Responde Juegos############################################################################################################################# -->
                            <tr>
                                <td>
                                    <font size="2"><b class='bold'>&iquest;Responde a los juegos propuestso por el interlocutor ?</b></font>
                                    &nbsp;
                                    Si&nbsp;<b class="bold"><u><?php echo $juegosSi; ?></u></b>
                                    &nbsp;&nbsp;
                                    No&nbsp;<b class="bold"><u><?php echo $juegosNo; ?></u></b>
                                    &nbsp;&nbsp;
                                    Algunas veces&nbsp;<b class="bold"><u><?php echo $juegosAlgunas; ?></u></b>
                                    &nbsp;
                                    Si, pero no los incluye&nbsp;<b class="bold"><u><?php echo $juegosSiNoInc; ?></u></b>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <!-- ####################################################################################Imitia silabas y palabras############################################################################################################################# -->
                            <tr>
                                <td>
                                    <font size="2"><b class='bold'>&iquest;Imita s&iacute;labas y palabras ?</b></font>
                                    &nbsp;
                                    Si&nbsp;<b class="bold"><u><?php echo $imitasilSi; ?></u></b>
                                    &nbsp;&nbsp;&nbsp;
                                    No&nbsp;<b class="bold"><u><?php echo $imitasilNo; ?></u></b>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <!-- ####################################################################################Senala partes############################################################################################################################# -->
                            <tr>
                                <td>
                                    <font size="2"><b class='bold'>&iquest;Se&ntilde;ala partes del cuerpo al solicita ?</b></font>
                                    &nbsp;
                                    Si&nbsp;<b class="bold"><u><?php echo $senpartesSi; ?></u></b>
                                    &nbsp;&nbsp;&nbsp;
                                    No&nbsp;<b class="bold"><u><?php echo $senpartesNo; ?></u></b>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- ###########################################################################LENGUAJE EXPRESIVO################################################################################ -->
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>LENGUAJE EXPRESIVO</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%' >
                                    <?php echo $expr; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- ###########################################################################LENGUAJE EXPRESIVO################################################################################ -->
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>LENGUAJE COMPRENSIVO</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%' >
                                    <?php echo $compr; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- ###########################################################################CONDUCTAS Y HABITOS EXPRESIVO################################################################################ -->
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>CONDUCTAS Y H&Aacute;BITOS</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%' >
                                    <?php echo $habitos; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- ###########################################################################COGNITIVO################################################################################ -->
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>COGNITIVO</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%' >
                                    <?php echo $cognitivo; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- ###########################################################################JUEGO################################################################################ -->
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>JUEGO</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%' >
                                    <?php echo $juego; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- ###########################################################################AREA SOCIAL################################################################################ -->
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>&Aacute;REA SOCIAL</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%' >
                                    <?php echo $areasocial; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- ###########################################################################DIAGNOTICOS################################################################################ -->
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>DIAGN&Oacute;STICO</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%' >
                                    <?php echo $resultados; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- ###########################################################################RECOMENDACIONES################################################################################ -->
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td align='left' width='100%'>
                                    <font size="2"><b class='bold'>RECOMENDACIONES</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' width='100%' >
                                    <?php echo $recomendaciones; ?>
                                </td>
                            </tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr>
                                <td align="left" width="100%">
                                    <img style="width:180px;" src="../firmas/<?php echo $firma;?>">
                                </td>
                            </tr>
                            <tr>
                                <td align="left" width="100%">
                                    <b><?php echo strtoupper($nombresFono);?></b>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" width="100%">
                                    <b><?php echo strtoupper($area);?></b>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" width="100%">
                                    <b><?php echo strtoupper($universidad);?></b>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" width="100%">
                                  <b>TP <?php echo strtoupper($tarjetaProf);?></b>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" width="100%">
                                   <b>Res - <?php echo strtoupper($registro);?></b>
                                </td>
                            </tr>
                        </table>
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
