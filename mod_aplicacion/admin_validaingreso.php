<?php
	session_start();
	error_reporting(E_ALL ^ E_NOTICE);
	
	require_once("../mod_conexion/db_funciones.php"); 
	$db = new DB_Funciones();
	
	$nick       = $_POST['nick'];
	$password   = $_POST['password'];
	
	$password = md5($password);
	
	$validausr = $db->validaUsuario($nick, $password);
	
	if( $validausr != false ) 
	{										  
		for ( $i = 0; $i< sizeof($validausr); $i++ ) 
			{
			    $usuar		= $validausr[$i]['nombreusuario'];
			    $passw 		= $validausr[$i]['password'];
				$nombres 	= $validausr[$i]['nombres'];
				$idusuario 	= $validausr[$i]['idusuario'];
				$idarea 	= $validausr[$i]['area_idarea'];
			}
	}
				
	if($nick != null && $nick == $usuar && $password == $passw)
	{
		$_SESSION['usuario']     = $nick;
		$_SESSION['auth']        = "yes";
		$_SESSION['nom_usuario'] = $nombres;
		$_SESSION['idusuario']   = $idusuario;
		$_SESSION['idarea']      = $idarea;
		echo"success";  
	}else{
		echo"error";  
	}

?>