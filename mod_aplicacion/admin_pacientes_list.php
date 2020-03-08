<?php
    require_once("../mod_conexion/db_funciones.php"); 
    $dbf = new DB_Funciones();
    $ConsultaUsuario    = $dbf->adminCargarPacientes();
?>

<div class="card mb-3">
    <div class="card-header alert alert-info">
        <i class="fa fa-table"></i> Listado de Pacientes</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Edad</th>
                  <th>Dirección</th>
                  <th>EPS</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if( $ConsultaUsuario != false ) 
                    {                                                                                                                                                                                                 
                      for ( $i = 0; $i< sizeof($ConsultaUsuario ); $i++ ) 
                      {                                                                     
                        $idusuario          = $ConsultaUsuario[$i]['idusuario'];
                        $nombres            = $ConsultaUsuario[$i]['nombres'];
                        $primerapellido     = $ConsultaUsuario[$i]['primerapellido'];
                        $segundoapellido    = $ConsultaUsuario[$i]['segundoapellido'];
                        $edad               = $ConsultaUsuario[$i]['edad'];
                        $direccion          = $ConsultaUsuario[$i]['direccion'];
                        $eps                = $ConsultaUsuario[$i]['razonsocial'];
                        echo'<tr>
                                <td>'.$idusuario.'</td>
                                <td>'.$nombres.'</td>
                                <td>'.$primerapellido.' '.$segundoapellido.'</td>
                                <td>'.$edad.'</td>
                                <td>'.$direccion.'</td>
                                <td>'.$eps.'</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="#modal_opciones" data-toggle="modal" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-file-o"> Psicologia</i>
                                            </a>
                                            <a href="#modal_opciones" data-toggle="modal" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-file-o"> Fonoaudiologia</i>
                                            </a>
                                            <a href="#modal_opciones" data-toggle="modal" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-file-o"> Terapia Ocupacional</i>
                                            </a>
                                            <a href="#modal_opciones" data-toggle="modal" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-file-o"> Fisioterapia</i>
                                            </a>
                                            <a href="#modal_opciones" data-toggle="modal" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-file-o"> Educacion Especial</i>
                                            </a>
                                            <a href="#modal_opciones" data-toggle="modal" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-file-o"> Terapia Acuatica</i>
                                            </a>
                                            <a href="#modal_opciones" data-toggle="modal" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-file-o"> Musico Terapia</i>
                                            </a>
                                            <a href="#modal_opciones" data-toggle="modal" class="btn btn-sm dropdown-item">
                                                <i class="fa fa-file-o"> ABA</i>
                                            </a>
                                        </div>
                                    </div> 
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


<!-- todas las opciones
<td>
    <div class="dropdown">
        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
            Acciones
        </button>
        <div class="dropdown-menu">
            <a href="citaInformacion.php?var='.$idusuario.'&cita='.$idcita.'&tipocita=1" class="btn btn-sm dropdown-item">
                <i class="fa fa-file-text-o"></i> Ir a Cita Informaci&oacute;n
            </a>
            <a href="javascript:eliminarListUsuario('.$idusuario.')" class="btn btn-sm confirm-user-delete dropdown-item">
                <i class="fa fa-trash-o"></i> Evoluci&oacute;n
            </a>
            <a href="javascript:subirArchivos('.$idusuario.')" class="btn btn-sm dropdown-item">
                <i class="fa fa-cloud-upload"></i> Subir Archivos
            </a>
            <a href="#modal_listArchivos" data-toggle="modal" class="btn btn-sm dropdown-item" onclick="cargarListArchivos('.$idusuario.');">
                <i class="fa fa-file-o"> Ver Archivos</i>
            </a>
        </div>
    </div> 
</td>



dos opciones

<td style="text-align:center">
    <div class="dropdown">
        <a href="javascript:subirArchivos('.$idusuario.')" class="btn btn-sm dropdown-item">
            <i class="fa fa-cloud-upload"></i>
        </a>
    </div>
</td>
<td style="text-align:center">
    <div class="dropdown">
        <a href="#modal_listArchivos" data-toggle="modal" class="btn btn-sm dropdown-item" onclick="cargarListArchivos('.$idusuario.');">
            <i class="fa fa-file-o"></i>
        </a>
    </div>
</td>




-->