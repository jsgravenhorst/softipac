<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
	
	$db = new DB_Funciones(); 
    
    $idanexo  = $_POST['idanexo'];
    
    $delete = $db->eliminarArchivo($idanexo);
    
    if ( $delete ){
        echo "success";
    }else{
        echo "error";
    }

?>
