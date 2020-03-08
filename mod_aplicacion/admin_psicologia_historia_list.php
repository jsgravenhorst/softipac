<?php
    require_once("../mod_conexion/db_funciones.php"); 
    $dbf            = new DB_Funciones();
    $idarea         = $_GET['idarea'];
    $idterapeuta    = $_SESSION['idusuario'];
    $areaPsic       = 1;
    $listadoCitasInformacion  = $dbf->cargarListadoEvaluacion($areaPsic);
?>

<div class="card mb-3">
    <div class="card-header alert alert-info">
        <i class="fa fa-table"></i> Listado de psicolog&iacute;a </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>DOCUMENTO</th>
                  <th>NOMBRES</th>
                  <th>APELLIDO</th>
                  <th>EPS</th>
                  <th>ESCOLARIDAD</th>
                  <th>CELULAR</th>
                  <th>TERAPEUTA</th>
                  <th>ACCIONES</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if( $listadoCitasInformacion != false ) 
                    {                                                                                                                                                                                                 
                      for ( $i = 0; $i< sizeof($listadoCitasInformacion ); $i++ ) 
                      {                                                                     
                        $idcita              = $listadoCitasInformacion[$i]['idcita'];
                        $tipocita_idtipocita = $listadoCitasInformacion[$i]['tipocita_idtipocita'];
                        $documento           = $listadoCitasInformacion[$i]['documento'];
                        $idusuario           = $listadoCitasInformacion[$i]['idusuario'];
                        $nombres             = $listadoCitasInformacion[$i]['nombres'];
                        $primerapellido      = $listadoCitasInformacion[$i]['primerapellido'];
                        $eps                 = $listadoCitasInformacion[$i]['razonsocial'];
                        $escolaridad         = $listadoCitasInformacion[$i]['escolaridad'];
                        $telefonocelular     = $listadoCitasInformacion[$i]['telefonocelular'];
                        $terapeuta           = $listadoCitasInformacion[$i]['terapeuta'];
                        $idarea              = 1;
                        echo'<tr>
                                <td>'.$documento.'</td>
                                <td>'.$nombres.'</td>
                                <td>'.$primerapellido.'</td>
                                <td>'.$eps.'</td>
                                <td>'.$escolaridad.'</td>
                                <td>'.$telefonocelular.'</td>
                                <td>'.$terapeuta.'</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="citaInformacion.php?var='.$idusuario.'&cita='.$idcita.'&tipocita=2" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-file-text-o"></i> Ir a Cita Informaci&oacute;n
                                            </a>
                                            <a href="javascript:consultaHistoria('.$idusuario.','.$idcita.','.$areaPsic.','.$idterapeuta.')" class="btn btn-sm dropdown-item" >
                                                <i class="fa fa-edit"></i> Historia Cl&iacute;nica
                                            </a>
                                            <a href="psicologia_prueba.php?var='.$idusuario.'&idarea='.$areaPsic.'" class="btn btn-sm dropdown-item" >
                                                <i class="fa fa-eraser"></i> Pruebas
                                            </a>
                                            <a href="javascript:consultaInformeFinal('.$idusuario.','.$idcita.','.$areaPsic.','.$idterapeuta.')" class="btn btn-sm dropdown-item" >
                                                <i class="fa fa-file"></i> Informe Final
                                            </a>
                                        </div>
                                    </div><!-- .btn-group -->
                                </td>
                            </tr>';
                      }
                    }
                ?>
              </tbody>
            </table>
        </div>
    </div>
</div>