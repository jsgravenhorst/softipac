<?php
    require_once("../mod_conexion/db_funciones.php"); 
    include ("fechaEs.php");
    $db = new DB_Funciones();
    $idpaciente = $_POST['idpaciente'];
    $idusuario  = $_POST['idusuario'];
    
    $cargaListProgramacion  = $db->adminCargarListProgramacion($idpaciente);
?>

<div class="card mb-3">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table display table-striped table-bordered" id="dataTableOrder" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora Inicial</th>
                        <th>Hora Final</th>
                        <th>Area</th>
                        <th>Profesional</th>
                        <th>Lugar Evaluaci&oacute;n</th>
                        <th>Observaciones</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if( $cargaListProgramacion != false )
                {
        
                    for ( $i = 0; $i< sizeof($cargaListProgramacion); $i++ )
                	{
                	$fechaFormateada    = new FechaEs($cargaListProgramacion[$i]['fecha'] );
                	$idprogramacion     = $cargaListProgramacion[$i]['idprogramacion'];
                	$fecha              = $fechaFormateada->getDateFormat(false);
                	$horaini            = $cargaListProgramacion[$i]['horaini'];
                	$horafin            = $cargaListProgramacion[$i]['horafin'];
                	$idarea             = $cargaListProgramacion[$i]['area_idarea'];
                	$area               = $cargaListProgramacion[$i]['area'];
                	$profesional        = $cargaListProgramacion[$i]['profesional'];
                	$lugarevaluacion    = $cargaListProgramacion[$i]['lugarevaluacion'];
                	$observacion        = $cargaListProgramacion[$i]['observacion'];
                	    echo"
                    	    <tr>
                                <td>$fecha</td>
                                <td>$horaini</td>
                                <td>$horafin</td>
                                <td>$area</td>
                                <td>$profesional</td>
                                <td>$lugarevaluacion</td>
                                <td>$observacion</td>
                                <td style='text-align:center'>
                                    <a href='#' data-toggle='modal' class='fh5co-card-item' onclick='editarProgramacion($idprogramacion,$idusuario,$idpaciente,$idarea);'>
                                        <i class='fa fa-eye'></i>
                                    </a>
                                </td>
                                <td style='text-align:center'>
                                    <a href='' data-toggle='modal' class='fh5co-card-item' onclick='eliminarProgramacion($idprogramacion);'>
                                        <i class='fa fa-trash-o'></i>
                                    </a>
                                </td>
                            </tr>";
                	}
                }
                ?>
              </tbody>
            </table>
        </div>
    </div>
</div>