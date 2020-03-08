<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
	$db = new DB_Funciones(); 
    
    $opcion = $_POST['opcion'];
    $data = "";
    
    if($opcion == "consulta"){
        $cargaSubCategoria   	= $db->adminCargarSubCategoria();
        
        $data = "<thead>
                    <tr>
                        <th># SubCategor&iacute;a</th>
                        <th>Contenido</th>
                        <th>Idioma</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>";
    
        if( $cargaSubCategoria != false ) 
        { 				  							  					  					  
            for ( $i = 0; $i< sizeof($cargaSubCategoria); $i++ ) 
        	{
        	    
        	    $idsubcategoria = $cargaSubCategoria[$i]['idsubcategoria'];
        		$idicatidioma   = $cargaSubCategoria[$i]['idsubcatidioma'];
        		$contenido      = $cargaSubCategoria[$i]['descripcion_subcat'];
        		$idioma         = $cargaSubCategoria[$i]['nombre_idioma'];
        	    
        	    $data .="
        	    
        	    <tr>
                    <td><span>$idicatidioma</span></td>
                    <td>$contenido</td>
                    <td>$idioma</td>
                    <td>
                        <div class='btn-group btn-actions'>
                            <a href='subcategoria_mod.php?var=$idicatidioma'>
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
        
        $idcatidioma    = $_POST['idcatidioma'];
        $descripcion    = $_POST['descripcion'];

		$update = $db->actualizarSubCategoria($idcatidioma,$descripcion);

	  if ( $update ){
			echo "success";
		}else{
		    echo "error";
		}
    }else{
        $idicatidioma = $_POST['opcion'];
        $data = "";
        $cargaSubCategoriaMod   	= $db->adminCargarSubCategoriaMod($idicatidioma);
    
        if( $cargaSubCategoriaMod != false ) 
        {
            for ( $i = 0; $i< sizeof($cargaSubCategoriaMod); $i++ ) 
            {
    			$idicatidioma   = $cargaSubCategoriaMod[$i]['idsubcatidioma'];
    			$descripcion    = $cargaSubCategoriaMod[$i]['descripcion_subcat'];
    			$nombreidioma   = $cargaSubCategoriaMod[$i]['nombre_idioma'];
    			$data           .= "<div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label for='ejemplo_email_1'>Nombre Sub Categor&iacute;a </label>
                                            <input name='idsubcatidioma' id='idsubcatidioma' type='hidden' class='form-control' value='$idicatidioma'>
                                            <input name='descripcion' id='descripcion' type='text' class='form-control' placeholder='Ingrese el Nombre' value='$descripcion'>
                                        </div>
                                    </div>
    								
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label for='ejemplo_email_1'>Idioma</label>
                                            <input readonly name='nombreidioma' id='nombreidioma' type='text' class='form-control' onKeyUp='this.value=this.value.toUpperCase();' placeholder='Ingrese la Cedula' value='$nombreidioma'>
                                        </div>
                                    </div>";
            }
            echo $data;
        }
    }
?>
