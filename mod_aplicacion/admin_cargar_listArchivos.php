<?php
    require_once("../mod_conexion/db_funciones.php"); 
    $db = new DB_Funciones();
    $idusuario          = $_POST['idusuario'];
    $cont               = 0;
    $cargaListRevision  = $db->adminCargarListArchivos($idusuario);
?>

<div class="card mb-3">
    <div class="card-header"><i class="fa fa-table"></i> Archivo <?php echo"$idusuario";?></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table display table-striped table-bordered" id="dataTableOrder" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>fecha Cargue</th>
                        <th>Nombre Archivo</th>
                        <th>Ver Archivo</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if( $cargaListRevision != false ) 
                { 				  							  					  					  
                    for ( $i = 0; $i< sizeof($cargaListRevision); $i++ ) 
                	{
                		$idhistoria = $cargaListRevision[$i]['idhistoria'];
                		$idanexo    = $cargaListRevision[$i]['idanexo'];
                		$fecha      = $cargaListRevision[$i]['fecha_cargue'];
                		$archivo    = $cargaListRevision[$i]['archivo'];
                		$ruta       = $cargaListRevision[$i]['ruta'];
                	    $cont       = $cont + 1;
                	    echo"
                	    
                	    <tr>
                            <td style='text-align:center'><span>$cont</span></td>
                            <td>$fecha</td>
                            <td>$archivo</td>
                            <td style='text-align:center'><a href='../$ruta/$archivo'><i class='fa fa-eye'></i></a></td>
                            <td style='text-align:center'>
                            <a href='' data-toggle='modal' class='fh5co-card-item' onclick='eliminarArchivos($idanexo);'>
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