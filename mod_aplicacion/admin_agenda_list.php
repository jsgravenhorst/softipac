<?php
    require_once("../mod_conexion/db_funciones.php"); 
    $dbf = new DB_Funciones();
    $listadoAgenda = $dbf->cargarListadoAgenda();
?>

<div class="card mb-3">
    <div class="card-header alert alert-info">
        <i class="fa fa-table"></i> Listado de Agenda</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>FECHA</th>
                  <th>HORA</th>
                  <th>NOMBRES</th>
                  <th>APELLIDO</th>
                  <th>TEL&Eacute;FONO FIJO</th>
                  <th>CELULAR</th>
                  <th>ACCIONES</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if( $listadoAgenda != false ) 
                    {                                                                                                                                                                                                 
                      for ( $i = 0; $i< sizeof($listadoAgenda ); $i++ ) 
                      {                                                                     
                        $idcita                 = $listadoAgenda[$i]['idcita'];
                        $tipocita_idtipocita    = $listadoAgenda[$i]['tipocita_idtipocita'];
                        $fechacitaini           = $listadoAgenda[$i]['fechacitaini'];
                        $hora                   = $listadoAgenda[$i]['hora'];
                        $idusuario              = $listadoAgenda[$i]['idusuario'];
                        $nombres                = $listadoAgenda[$i]['nombres'];
                        $primerapellido         = $listadoAgenda[$i]['primerapellido'];
                        $telefonofijo           = $listadoAgenda[$i]['telefonofijo'];
                        $teleonocelular         = $listadoAgenda[$i]['telefonocelular'];
                        echo'<tr>
                                <td>'.$fechacitaini.'</td>
                                <td>'.$hora.'</td>
                                <td>'.$nombres.'</td>
                                <td>'.$primerapellido.'</td>
                                <td>'.$telefonofijo.'</td>
                                <td>'.$teleonocelular.'</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="agenda.php?var='.$idusuario.'&cita='.$idcita.'" class="btn btn-sm dropdown-item" >
                                                <i class="fa fa-edit"></i> Editar
                                            </a>
                                            <a href="javascript:cancelarCita('.$tipocita_idtipocita.','.$idcita.')" class="btn btn-sm dropdown-item" >
                                                <i class="fa fa-eraser"></i> Cancelar Cita
                                            </a>
                                            <a href="citaInformacion.php?var='.$idusuario.'&cita='.$idcita.'&tipocita=1" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-file-text-o"></i> Ir a Cita Informaci&oacute;n
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