<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
	$db = new DB_Funciones(); 
    
    $opcion = $_POST['opcion'];
    $data = "";
    
    if($opcion == "consulta"){
        $cargaProducto   	= $db->adminCargarProductos();
        
        $data = "<thead>
                    <tr>
                        <th>#</th>
                        <th>Descripci&oacute;n</th>
                        <th>Subcategor&iacute;a</th>
                        <th>Idioma</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>";
    
        if( $cargaProducto != false ) 
        { 				  							  					  					  
            for ( $i = 0; $i< sizeof($cargaProducto); $i++ ) 
        	{
        		$idprodidioma   = $cargaProducto[$i]['idproductoidioma'];
        		$idprod         = $cargaProducto[$i]['idproducto'];
        		$descripcion    = $cargaProducto[$i]['descripcion_producto'];
        		$nombresubcat   = $cargaProducto[$i]['nombre_subcategoria'];
        		$idioma         = $cargaProducto[$i]['nombre_idioma'];
        	    
        	    $data .="
        	    
        	    <tr>
                    <td><span>$idprodidioma</span></td>
                    <td>$descripcion</td>
                    <td>$nombresubcat</td>
                    <td>$idioma</td>
                    <td>
                        <div class='btn-group btn-actions'>
                            <button type='button' class='btn dropdown-toggle' data-toggle='dropdown'>
                                Acciones
                            </button>
                            <div class='dropdown-menu'>
                                <a href='productos_mod.php?var=$idprodidioma' class='dropdown-item'>
                                    <i class='fa fa-edit'></i>Editar
                                </a>
                                <a href='javascript:eliminarProducto($idprod)' data-id='42' class='confirm-user-delete dropdown-item'>
                                    <i class='fa fa-trash-o'></i>Borrar
                                </a>
                            </div>
                        </div><!-- .btn-group -->
                    </td>
                </tr>";
        	}
        	$data .= "</tbody>";
        	echo $data;
        }
    }if($opcion == "consultalist"){
        $cargaListProducto   	= $db->adminCargarListProductos();
        
        $data = "<thead>
                    <tr>
                        <th>Producto</th>
                        <th>Descripci&oacute;n</th>
                        <th>Subcategor&iacute;a</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>";
    
        if( $cargaListProducto != false ) 
        { 				  							  					  					  
            for ( $i = 0; $i< sizeof($cargaListProducto); $i++ ) 
        	{
        		$idprod         = $cargaListProducto[$i]['idproducto'];
        		$nombreprod     = $cargaListProducto[$i]['nombre_producto'];
        		$nombrecarpeta  = $cargaListProducto[$i]['nombrecarpeta'];
        		$nombresubcat   = $cargaListProducto[$i]['nombre_subcategoria'];
        	    
        	    $data .="
        	    
        	    <tr>
                    <td><span>$idprod</span></td>
                    <td>$nombreprod</td>
                    <td>$nombresubcat</td>
                    <td>
                        <div class='btn-group btn-actions'>
                                <button type='button' id='btnupimgs' class='btn' onclick='subirImagenes($idprod,\"$nombrecarpeta\");'>
                                    <i class='fa fa-upload'></i>&nbsp;Subir im&aacute;genes
                                </button>
                        </div><!-- .btn-group -->
                    </td>
                </tr>";
        	}
        	$data .= "</tbody>";
        	echo $data;
        }
    }elseif($opcion == "actualizar"){
        
        $idprodidioma   = $_POST['idprodidioma'];
        $descripcion    = $_POST['descripcion'];

		$update = $db->actualizarProductos($idprodidioma,$descripcion);

	  if ( $update ){
			echo "success";
		}else{
		    echo "error";
		}
    }elseif($opcion == "eliminar"){
        
        $idprod  = $_POST['idprod'];

        $delete = $db->eliminarProducto($idprod);

      if ( $delete ){
            echo "success";
        }else{
            echo "error";
        }
    }else{
        $idprodidioma = $_POST['idprodidioma'];
        
        if($idprodidioma != ""){
            $data = "";
            $cargaProductosMod   	= $db->adminCargarProductosMod($idprodidioma);
        
            if( $cargaProductosMod != false ) 
            {
                for ( $i = 0; $i< sizeof($cargaProductosMod); $i++ ) 
                {
        			$idprodidioma   = $cargaProductosMod[$i]['idproductoidioma'];
        			$descripcion    = $cargaProductosMod[$i]['descripcion_producto'];
        			$nombreidioma   = $cargaProductosMod[$i]['nombre_idioma'];
        			$data           .= "<div class='col-lg-6'>
                                            <div class='form-group'>
                                                <label for='ejemplo_email_1'>Nombre Producto </label>
                                                <input name='idprodidioma' id='idprodidioma' type='hidden' class='form-control' value='$idprodidioma'>
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
    }
?>
