<?php
    require_once("../mod_conexion/db_funciones.php"); 
    $dbf = new DB_Funciones();
    $listadoCitasInformacion    = $dbf->cargarListadoCitasInformacion();
?>

<div class="card mb-3">
    <div class="card-header alert alert-info">
        <i class="fa fa-table"></i> Listado de Citas</div>
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
                        echo'<tr>
                                <td>'.$documento.'</td>
                                <td>'.$nombres.'</td>
                                <td>'.$primerapellido.'</td>
                                <td>'.$eps.'</td>
                                <td>'.$escolaridad.'</td>
                                <td>'.$telefonocelular.'</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="citaInformacion.php?var='.$idusuario.'&cita='.$idcita.'&tipocita=2" class="btn btn-sm dropdown-item" >
                                                <i class="fa fa-edit"></i> Editar
                                            </a>
                                            <a href="psicologia_programacion.php?idpaciente='.$idusuario.'&nompaciente='.$nombres.'" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-file-text-o"></i> Programaci&oacute;n de Evaluaci&oacute;n
                                            </a>
                                            <!--<a href="javascript:programarEvaluacion('.$idusuario.',\''.$nombres.'\')" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-calendar"></i> Programaci&oacute;n de Evaluaci&oacute;n
                                            </a>-->
                                            <a href="javascript:cancelarCita('.$tipocita_idtipocita.','.$idcita.')" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-eraser"></i> Cancelar Cita
                                            </a>
                                            <!--<a href="psicologia_historia.php?var='.$idusuario.'" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-file-text-o"></i> Ir Historia Cl&iacute;nica
                                            </a>-->
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