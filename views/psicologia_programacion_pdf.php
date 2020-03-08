
<?php
    ob_start();
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("../mod_conexion/db_funciones.php");
    require_once("../dompdf/dompdf_config.inc.php");
    include ("../mod_aplicacion/fechaEs.php");

    $idpaciente  = $_GET['var'];
    $filename    = "programacion_".$idpaciente.'.pdf';

    $db                 = new DB_Funciones();
    $cargaProgramacion  = $db->adminCargarProgramacion($idpaciente);
    $tamnoPapel         = "letter";
    $orientacionPapel   = "portrait";
    $fechaMayor         = 0;
    $valorDefault       = " ";

    ############################################Datos del Paciente################################################
    $nombrePaciente = $cargaProgramacion[0]['nompachrini'];
    $fchNacPaciente = $cargaProgramacion[0]['fchnacpr'];
    $edadPaciente   = $cargaProgramacion[0]['edhrfin'];
    $mesesPaciente  = $cargaProgramacion[0]['meses'];
    $docPaciente    = $cargaProgramacion[0]['doclugar'];
    $nomAcudiente   = $cargaProgramacion[0]['acuobs'];
    $dirAcudiente   = $cargaProgramacion[0]['dirnomtera'];
    $telAcudiente   = $cargaProgramacion[0]['telarea'];
    $epsPaciente    = $cargaProgramacion[0]['epsnomterapr'];

    $nomteraProg   = $cargaProgramacion[1]['epsnomterapr'];
    $datosteraProg = $cargaProgramacion[1]['datosteraprog'];
    $firmateraProg = $cargaProgramacion[1]['firmateraprog'];
    $firmaruta     = "../firmas";

    ###########################################Fechas Programacion  del Paciente####################################
    $fechasProgramacion = array();
    $j = 0;
    for ($i = 1; $i < sizeof($cargaProgramacion); $i++)
    {
        if ( !in_array($cargaProgramacion[$i]['fchnacpr'],$fechasProgramacion) )
        {
            $fechasProgramacion[$j] = $cargaProgramacion[$i]['fchnacpr'] ;
            $j++;
        }
    }
    ###########################################################################################################

    for ($i = 0; $i < sizeof($fechasProgramacion); $i++)
    {
        $contOcurrencias = 0;

        for ($j = 1; $j < sizeof($cargaProgramacion); $j++)
        {
            if ($fechasProgramacion[$i] == $cargaProgramacion[$j]['fchnacpr'])
            {
                $contOcurrencias++;
            }
        }

        if($contOcurrencias > $fechaMayor)
        {
            $fechaMayor = $contOcurrencias;
        }
    }

    $columnas        = 0;
    $limiteColumnas  = 5;
    $fchProgramacion = '';
    $hrinicial       = '';
    $hrfinal         = '';
    $nomTerapeuta    = '';
    $areaTerapeuta   = '';
    $lugar           = '';
    $observacion     = '';

?>

<html>

    <head>
         <meta http-equiv='Content-Type' content='text/html' charset='utf-8'>
    </head>
    <body>
        <div id='content'>
            <table>
                <tr>
                    <td>
                        <div>
                            <table width='140%' align='center'>
                                <tr>
                                    <td>
                                        <b><img src='../images/logoApa.png'></b>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td>
                        <div>
                            <table width='160%' align='center'>
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
                            <div/>
                    </td>
                </tr>
            </table>
            <!-- ###########################################################################Datos del Paciente##########################################################################-->
            <br>
            <table width='100%' align='center'>
                <tr>
                    <td align='center' width='100%'>
                        <font size="1"><b class="bold">PROGRAMACI&Oacute;N DE EVALUACI&Oacute;N</b></font>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
    
                <tr>
                    <td align='left' width='100%'>
                       <font size="1" ><b class='bold'>NOMBRE: <?php echo $nombrePaciente; ?></b></font>
                    </td>
                </tr>
                <tr>
                    <td align='left' width='100%'>
                        <font size="1"><b class='bold'>FECHA DE NACIMIENTO: <?php echo $fchNacPaciente; ?></b></font>
                    </td>
                </tr>
                <tr>
                    <td align='left' width='100%'>
                        <font size="1"><b class='bold'>EDAD: <?php echo $edadPaciente; ?> A&Ntilde;OS <?php echo $mesesPaciente; ?> Meses</b></font>
                    </td>
                </tr>
                <tr>
                    <td align='left' width='100%'>
                        <font size="1"><b class='bold'>N&Uacute;MERO DE IDENTIFICACI&Oacute;N: <?php echo $docPaciente; ?></b></font>
                    </td>
                </tr>
                <tr>
                    <td align='left' width='100%'>
                        <font size="1"><b class='bold'>ACUDIENTE: <?php echo $nomAcudiente; ?> </b></font>
                    </td>
                </tr>
                <tr>
                    <td align='left' width='100%'>
                        <font size="1"><b class='bold'>DIRECCI&Oacute;N: <?php echo $dirAcudiente; ?></b></font>
                    </td>
                </tr>
                <tr>
                    <td align='left' width='100%'>
                        <font size="1"><b class='bold'>TEL&Eacute;FONOS: <?php echo $telAcudiente; ?></b></font>
                    </td>
                </tr>
                <tr>
                    <td align='left' width='100%'>
                        <font size="1"><b class='bold'>EPS: <?php echo $epsPaciente; ?></b></font>
                    </td>
                </tr>
            </table>
            <!-- ###################################################################################################################################################################### -->
    
    
            <!-- ################################################################Dias Programacion#################################################################################### -->
    
                <table align='center' border='1' width="100dp" >
                        <?php #1
                        if ($cargaProgramacion != false)
                        { # if 1
                           
                            for ($i = 0; $i < sizeof($fechasProgramacion); $i++)
                            { # for 1
                                $fechaFormateada = new FechaEs($fechasProgramacion[$i]);
                                $fchProgramacion = $fechaFormateada->getDateFormat(true);
    
                                if ($columnas == 0)
                                { # if 2
                                    ?>
                                    <tr>
                                        <td align="center">
    
                                           <font size="1"> <p><b class="bold" ><?php echo $fchProgramacion; ?></b></p></font>
    
                                            <?php
                                            $contOcurrencias = 0;
    
                                            for($j = 1; $j < sizeof($cargaProgramacion); $j++)
                                            { # for 2
                                                if ( $fechasProgramacion[$i] == $cargaProgramacion[$j]['fchnacpr'])
                                                { # if 3
                                                    $hrinicial     = $cargaProgramacion[$j]['nompachrini'];
                                                    $hrfinal       = $cargaProgramacion[$j]['edhrfin'];
                                                    $nomTerapeuta  = $cargaProgramacion[$j]['dirnomtera'];
                                                    $areaTerapeuta = $cargaProgramacion[$j]['telarea'];
                                                    $lugar         = $cargaProgramacion[$j]['doclugar'];
                                                    $observacion   = $cargaProgramacion[$j]['acuobs'];
                                                    ?> <!-- 2 -->
    
                                                    <font size="1"><p style="margin: 0;"><?php echo $hrinicial;?> - <?php echo $hrfinal; ?> </p></font>
                                                    <?php
                                                        if ($nomTerapeuta != null)
                                                        { ?>
                                                           <font size="1"> <p style="margin: 0;"><?php echo $nomTerapeuta; ?></p></font>
                                                        <?php
                                                        }
                                                        if ($areaTerapeuta != null)
                                                        {?>
                                                            <font size="1"><p style="margin: 0;"><?php echo $areaTerapeuta; ?></p></font>
                                                         <?php
                                                        }
                                                        if ($lugar != null) {
                                                            ?>
                                                            <font size="1"><p style="margin: 0;"><?php echo $lugar; ?></p>
                                                            </font>
                                                            <?php
                                                        }
                                                        if ($observacion != null)
                                                        {?>
                                                            <font size="1"><p style="margin: 0;"><?php echo $observacion; ?></p></font>
                                                            <p>&nbsp;</p>
                                                            <p>&nbsp;</p>
                                                            <p>&nbsp;</p>
                                                        <?php
                                                        }else {?>
                                                            <p>&nbsp;</p>
                                                            <p>&nbsp;</p>
                                                            <?php
                                                        }
                                                    $contOcurrencias++;
                                                }
                                            } # for 2
                                            if ($contOcurrencias < $fechaMayor)
                                            {
                                                for ($k = 1; $k <= $fechaMayor - $contOcurrencias; $k++ )
                                                { ?>
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
    
                                                 <?php
                                                }
                                             }
                                            ?> <!-- 3 -->
                                        </td>
                                <?php } else
                                    { ?>
                                    <td align="center">
    
                                       <font size="1"> <p><b class="bold" ><?php echo $fchProgramacion; ?></b></p></font>
                                        <?php
                                        $contOcurrencias = 0;
                                        for ($j = 1; $j < sizeof($cargaProgramacion); $j++)
                                        { # for 3
                                            if ( $fechasProgramacion[$i] == $cargaProgramacion[$j]['fchnacpr'])
                                            { # if 4
                                                $hrinicial     = $cargaProgramacion[$j]['nompachrini'];
                                                $hrfinal       = $cargaProgramacion[$j]['edhrfin'];
                                                $nomTerapeuta  = $cargaProgramacion[$j]['dirnomtera'];
                                                $areaTerapeuta = $cargaProgramacion[$j]['telarea'];
                                                $lugar         = $cargaProgramacion[$j]['doclugar'];
                                                $observacion   = $cargaProgramacion[$j]['acuobs'];
                                                ?> <!-- 4 -->
                                                <font size="1"><p style="margin: 0;"><?php echo $hrinicial;?> - <?php echo $hrfinal; ?> </p></font>
    
                                                <?php
                                                    if($nomTerapeuta != null)
                                                    {?>
                                                        <font size="1"><p style="margin: 0;"><?php echo $nomTerapeuta; ?></p></font>
                                                    <?php
                                                    }
                                                    if ($areaTerapeuta != null)
                                                    {?>
                                                        <font size="1"><p style="margin: 0;"><?php echo $areaTerapeuta; ?></p></font>
                                                        <?php
                                                    }
                                                    if($lugar != null)
                                                    {?>
                                                       <font size="1"> <p style="margin: 0;"><?php echo $lugar; ?></p></font>
                                                        <?php
                                                    }else
                                                    {?>
                                                        <p>&nbsp;</p>
                                                        <?php
                                                    }
                                                    if($observacion != null)
                                                     {?>
                                                        <font size="1"> <p style="margin: 0;"><?php echo $observacion; ?></p></font>
                                                         <p>&nbsp;</p>
                                                         <p>&nbsp;</p>
                                                         <p>&nbsp;</p>
                                                <?php
                                                      }else
                                                      {?>
                                                        <p>&nbsp;</p>
                                                          <p>&nbsp;</p>
                                                        <?php
                                                     }
                                               $contOcurrencias++;
                                            }
                                        } #for 3
                                        if ($contOcurrencias < $fechaMayor) {
                                            for ($l = 1; $l <= $fechaMayor - $contOcurrencias; $l++) {
                                                ?>
                                                <p>&nbsp;</p>
                                                <p>&nbsp;</p>
                                                <p>&nbsp;</p>
                                                <p>&nbsp;</p>
                                                <p>&nbsp;</p>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </td>
                                        <?php
                                    } # 5
                                $columnas++;
                                if ($columnas == $limiteColumnas)
                                {?> <!-- 5 -->
                                    </tr>
                                    <?php $columnas = 0; # 6\
                                }
                            } # for 1
                        } # if 1 ?> <!-- 6 -->
                    </table>
                    <br>
            <!-- ###################################################################################################################################################################### -->
            <table width="100%" align="left">
                <tr>
                    <td>
                        
                        <p><img style="width:180px;" src="../firmas/<?php echo $firmateraProg;?>"></p>
                        <p>------------------------------</p>
                        <p><?php echo $nomteraProg;?></p>
                        <p><?php echo $datosteraProg;?></p>
                    </td>
                </tr>
            </table>
            <br>
        </div>
    </body>
</html>
<?php
    $dompdf = new DOMPDF();
    $dompdf->set_paper($tamnoPapel, $orientacionPapel);
    $dompdf->load_html(ob_get_clean());
    $dompdf->render();

    $pdf = $dompdf->output();
    $dompdf->stream($filename);  //para generar el archivo en el navegador
?>
