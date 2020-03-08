<?php

    error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
	$db = new DB_Funciones(); 
	
    $idsubcategoria = $_POST['idsubcategoria'];
    $nombre         = $_POST['nombre'];
    $nombrecarpeta  = $_POST['nombrecarpeta'];
    
    
    $carpeta = '../../images/trabajos/'.$idsubcategoria.'/'.$nombrecarpeta;
    if (!file_exists($carpeta)) {
        $oldmask = umask(0);
        mkdir($carpeta, 0777);
        umask($oldmask);
    }
    
    if (isset($_FILES['imagen'])){


        	if ($_FILES['imagen']['type']=='image/png' || $_FILES['imagen']['type']=='image/jpeg'){

        	move_uploaded_file($_FILES["imagen"]["tmp_name"],$carpeta.'/'.$_FILES["imagen"]["name"]);
        	$validar=true;
        	}
        	else $validar=false;

    }
    
    $imagen = $idsubcategoria.'/'.$nombrecarpeta.'/'.$_FILES["imagen"]["name"][0];
    
    $nombrecarpeta  = $idsubcategoria.'/'.$nombrecarpeta;
    
    $insert = $db->insertarProductos($idsubcategoria,$nombre,$imagen,$nombrecarpeta);
    
    if ( $insert ){
    	echo "success";
    }else{
        echo "error";
    }

?>