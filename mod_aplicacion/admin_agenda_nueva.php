<?php
    error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
        			   
	$db = new DB_Funciones();

	$usarioIdTipoDocumento  = $_POST['usarioIdTipoDocumento'];
	$documento              = $_POST['documento'];
	$usuarioNombres         = $_POST['usuarioNombres'];
	$usuarioPrimerApellido  = $_POST['usuarioPrimerApellido'];
	$usuarioSegundoApellido = $_POST['usuarioSegundoApellido'];
	$nombreUsuario          = $_POST['nombreUsuario'];
	$password               = $_POST['password'];
	$usuarioEdad            = $_POST['usuarioEdad'];
	$usuarioFechaNacimiento = $_POST['usuarioFechaNacimiento'];
	$usuarioLugarNacimiento = $_POST['usuarioLugarNacimiento'];
	$tutela                 = 'S';
	$idGenero               = $_POST['idGenero'];
	$usuarioIdEstado        = 1;
	$usuarioIdEscolaridad   = $_POST['usuarioIdEscolaridad'];
	$usuarioDireccion       = $_POST['usuarioDireccion'];
	$usuarioTelefonoFijo    = $_POST['usuarioTelefonoFijo'];
	$usuarioTelefonoCelular = $_POST['usuarioTelefonoCelular'];
	$usuarioIdTipoUsuario   = $_POST['usuarioIdTipoUsuario'];
	$roles                  = $_POST['roles'];
	
    $insertar = $db->insertarUsuario($usuarioNombres,
                                    $usuarioPrimerApellido,
                                    $usuarioSegundoApellido,
                                    $usuarioEdad,
                                    $usuarioFechaNacimiento,
                                    $tutela,
                                    $usuarioIdTipoUsuario,
                                    $usarioIdTipoDocumento,
                                    $idGenero,
                                    $usuarioIdEstado,
                                    $usuarioIdEscolaridad);

    if( $insertar ){
		echo "success";
    }else{
		echo "error";
	}
?>