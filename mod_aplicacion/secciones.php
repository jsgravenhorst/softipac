<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
	$db = new DB_Funciones(); 
    
    $opcion = $_POST['opcion'];
    $data = "";
    $seccion = $_POST['seccion'];
    
    if($opcion == "consulta"){
        $cargaSeccion   	= $db->adminCargarSeccion($seccion);
        
        $data = "<thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Descripci&oacute;n</th>
                        <th>Secci&oacute;n</th>
                        <th>Idioma</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>";
    
        if( $cargaSeccion != false ) 
        { 				  							  					  					  
            for ( $i = 0; $i< sizeof($cargaSeccion); $i++ ) 
        	{
        		$idsecciondetalle   = $cargaSeccion[$i]['idsecciondetalle'];
        		$titulo             = $cargaSeccion[$i]['titulo'];
        		$descripcion        = $cargaSeccion[$i]['contenido'];
        		$nombre_seccion     = $cargaSeccion[$i]['nombre_seccion'];
        		$idioma             = $cargaSeccion[$i]['nombre_idioma'];
        	    
        	    $data .="
        	    
        	    <tr>
                    <td><span>$idsecciondetalle</span></td>
                    <td>$titulo</td>
                    <td>$descripcion</td>
                    <td>$nombre_seccion</td>
                    <td>$idioma</td>
                    <td>
                        <div class='btn-group btn-actions'>
                            <a href='secciones_mod.php?var=$idsecciondetalle&secc=$seccion'>
                                <button type='button' class='btn'>
                                    <i class='fa fa-edit'></i>Editar
                                </button>
                            </a>
                        </div><!-- .btn-group -->
                    </td>
                </tr>";
        	}
        	$data .= "</tbody>";
        	echo $data;
        }
    }elseif($opcion == "actualizar"){
        
        $idsecidioma   = $_POST['idsecidioma'];
        $titulo         = $_POST['titulo'];
        $descripcion    = $_POST['descripcion'];

		$update = $db->actualizarSeccion($idsecidioma, $titulo, $descripcion);

	  if ( $update ){
			echo "success";
		}else{
		    echo "error";
		}
    }else{
        $idsecidioma = $_POST['opcion'];
        $return_arr = array();
        $cargaSeccionMod   	= $db->adminCargarSeccionMod($seccion, $idsecidioma);
    
        if( $cargaSeccionMod != false ) 
        {
            for ( $i = 0; $i< sizeof($cargaSeccionMod); $i++ ) 
            {
    			$row_array['idsecidioma']    = $cargaSeccionMod[$i]['idsecciondetalle'];
                $row_array['titulo']         = $cargaSeccionMod[$i]['titulo'];
                $row_array['descripcion']    = $cargaSeccionMod[$i]['contenido'];
                $row_array['nombreidioma']   = $cargaSeccionMod[$i]['nombre_idioma'];
                array_push($return_arr, $row_array);
            }
            echo json_encode($return_arr);
        }
    }
?>
