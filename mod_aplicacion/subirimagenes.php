<?php

    error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
	$db = new DB_Funciones(); 
	
    $idprod         = $_POST['idprod'];
    $nombrecarpeta  = $_POST['folder'];
    
    $carpeta = '../../images/trabajos/'.$nombrecarpeta;
    
    if (isset($_FILES['imagen'])){
                	
    	$cantidad= count($_FILES["imagen"]["tmp_name"]);
    	
    	for ($i=0; $i<$cantidad; $i++){
        	//Comprobamos si el fichero es una imagen
        	if ($_FILES['imagen']['type'][$i]=='image/png' || $_FILES['imagen']['type'][$i]=='image/jpeg'){

        	move_uploaded_file($_FILES["imagen"]["tmp_name"][$i],$carpeta.'/'.$_FILES["imagen"]["name"][$i]);
        	
        	$imagen = $nombrecarpeta.'/'.$_FILES["imagen"]["name"][$i];
    
            $insert = $db->insertarImagenProductos($imagen,$idprod);
        	
        	$validar=true;
        	}
        	else $validar=false;
        }
    }

    if ( $validar ){
    	echo "success";
    }else{
        echo "error";
    }

?>