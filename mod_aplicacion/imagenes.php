<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
	$db = new DB_Funciones(); 
    
    $opcion = $_POST['opcion'];
    $idprod = $_POST['idprod'];
    $data = "";
    
    if($opcion == "consulta"){
        $cargaImagenes   	= $db->CargarImagenesProductos($idprod);
        
        $data = "<thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre Im&aacute;gen</th>
                        <th>Nombre producto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>";
    
        if( $cargaImagenes != false ) 
        { 				  							  					  					  
            for ( $i = 0; $i< sizeof($cargaImagenes); $i++ ) 
        	{
        		$idimagen           = $cargaImagenes[$i]['idimagen'];
        		$nombre_imagen      = $cargaImagenes[$i]['nombre_imagen'];
        		$nombre_producto    = $cargaImagenes[$i]['nombre_producto'];
        	    
        	    $data .="
        	    
        	    <tr>
                    <td><span>$idimagen</span></td>
                    <td>$nombre_imagen</td>
                    <td>$nombre_producto</td>
                    <td>
                        <div class='btn-group btn-actions'>
                            <a href='javascript:eliminarImagen($idimagen)' >
                                <button type='button' class='btn'>
                                    <i class='fa fa-trash-o'></i>&nbsp;Eliminar
                                </button>
                            </a>
                        </div><!-- .btn-group -->
                    </td>
                </tr>";
        	}
        	$data .= "</tbody>";
        	echo $data;
        }
    }elseif($opcion == "eliminar"){
        
        $idimagen  = $_POST['idimagen'];

        $delete = $db->eliminarImagen($idimagen);

      if ( $delete ){
            echo "success";
        }else{
            echo "error";
        }
    }
?>
