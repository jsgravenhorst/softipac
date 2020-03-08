<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
	$db = new DB_Funciones(); 
    
    $data = "";
    $cargaIdioma   	= $db->adminCargarIdioma();

    if( $cargaIdioma != false ) 
    {
        for ( $i = 0; $i< sizeof($cargaIdioma); $i++ ) 
        {
			$ididioma    = $cargaIdioma[$i]['ididioma'];
			$nombre	     = $cargaIdioma[$i]['nombre_idioma'];
			$data       .= "<option value='$ididioma'>$nombre</option>";
        }
        echo $data;
    } 
?>