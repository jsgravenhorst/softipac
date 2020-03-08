<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
	$db = new DB_Funciones(); 
    
    $opcion = $_POST['opcion'];
    $data = "";
    
    if($opcion == "consulta"){
        $cargaCategoria   	= $db->adminCargarCategoria();
        
        $data = "<thead>
                    <tr>
                        <th># Categor&iacute;a</th>
                        <th>Contenido</th>
                        <th>Idioma</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>";
    
        if( $cargaCategoria != false ) 
        { 				  							  					  					  
            for ( $i = 0; $i< sizeof($cargaCategoria); $i++ ) 
        	{
        	    
        	    $idcategoria    = $cargaCategoria[$i]['idcategoria'];
        		$idicatidioma   = $cargaCategoria[$i]['idcatidioma'];
        		$contenido      = $cargaCategoria[$i]['descripcion'];
        		$idioma         = $cargaCategoria[$i]['nombre_idioma'];
        	    
        	    $data .="
        	    
        	    <tr>
                    <td><span>$idicatidioma</span></td>
                    <td>$contenido</td>
                    <td>$idioma</td>
                    <td>
                        <div class='btn-group btn-actions'>
                            <a href='categoria_mod.php?var=$idicatidioma'>
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

		$update = $db->actualizarCategoria($idcatidioma,$descripcion);

	  if ( $update ){
			echo "success";
		}else{
		    echo "error";
		}
    }else{
        $idicatidioma = $_POST['opcion'];
        $data = "";
        $cargaCategoria   	= $db->adminCargarCategoriaMod($idicatidioma);
    
        if( $cargaCategoria != false ) 
        {
            for ( $i = 0; $i< sizeof($cargaCategoria); $i++ ) 
            {
    			$idicatidioma   = $cargaCategoria[$i]['idcatidioma'];
    			$descripcion    = $cargaCategoria[$i]['descripcion'];
    			$nombreidioma   = $cargaCategoria[$i]['nombre_idioma'];
    			$data           .= "<div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label for='ejemplo_email_1'>Nombre Categor&iacute;a </label>
                                            <input name='idcatidioma' id='idcatidioma' type='hidden' class='form-control' value='$idicatidioma'>
                                            <input name='descripcion' id='descripcion' type='text' class='form-control placeholder='Ingrese el Nombre' value='$descripcion'>
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