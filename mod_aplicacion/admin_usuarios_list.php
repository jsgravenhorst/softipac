<?php
    require_once("../mod_conexion/db_funciones.php"); 
    $dbf = new DB_Funciones();
    $ConsultaUsuario    = $dbf->adminCargarUsuario();
?>

<div class="card mb-3">
    <div class="card-header alert alert-info">
        <i class="fa fa-table"></i> Listado de Usuarios</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="display: none">ID</th>
                  <th>Nombres</th>
                  <th>Primer Apellido</th>
                  <th>Segundo Apellido</th>
                  <th>Área</th>
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
                        $area               = $ConsultaUsuario[$i]['area'];
                        echo'<tr>
                                <td style="display: none">'.$idusuario.'</td> 
                                <td>'.$nombres.'</td>
                                <td>'.$primerapellido.'</td>
                                <td>'.$segundoapellido.'</td>
                                <td>'.$area.'</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="usuario_mod.php?var='.$idusuario.'" class="btn btn-sm dropdown-item" >
                                                <i class="fa fa-edit"></i>Editar
                                            </a>
                                            <a href="javascript:eliminarUsuario('.$idusuario.')" class="btn btn-sm confirm-user-delete dropdown-item">
                                                <i class="fa fa-trash-o"></i>Borrar
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