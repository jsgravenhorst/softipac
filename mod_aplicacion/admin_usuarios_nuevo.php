<?php
    error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
        			   
	$db = new DB_Funciones();

	$usarioIdTipoDocumento  = $_POST['usarioIdTipoDocumento'];
	$documento              = $_POST['documento'];
	$usuarioNombres         = $_POST['usuarioNombres'];
	$usuarioPrimerApellido  = $_POST['usuarioPrimerApellido'];
	$usuarioSegundoApellido = $_POST['usuarioSegundoApellido'];
    $usuarioLugarNacimiento = $_POST['usuarioLugarNacimiento'];
    $usuarioFechaNacimiento = $_POST['usuarioFechaNacimiento'];
	$usuarioEdad            = $_POST['usuarioEdad'];
    $idGenero               = $_POST['idGenero'];
    $usuarioDireccion       = $_POST['usuarioDireccion'];
    $usuarioTelefonoFijo    = $_POST['usuarioTelefonoFijo'];
    $usuarioTelefonoCelular = $_POST['usuarioTelefonoCelular'];
    $usuarioEmail           = $_POST['usuarioEmail'];
	$usuarioIdEscolaridad   = $_POST['usuarioIdEscolaridad'];
	$usuarioArea            = $_POST['usuarioArea'];
    $universidad            = $_POST['universidad'];
    $tarjetaprofesional     = $_POST['tarjetaprofesional'];
    $registro               = $_POST['registro'];
    $nombreUsuario          = $_POST['nombreUsuario'];
    $password               = $_POST['password'];
	$roles                  = $_POST['roles'];
	$carpeta = '../firmas';
    
    if (!file_exists($carpeta)) {
        $oldmask = umask(0);
        mkdir($carpeta, 0777);
        umask($oldmask);
    }
    
    if (isset($_FILES['imagen'])){
        $verimagen = $_FILES["imagen"]["name"][$i];
    	$cantidad= count($_FILES["imagen"]["tmp_name"]);
    	
    	for ($i=0; $i<$cantidad; $i++){
        	//Comprobamos si el fichero es una imagen
        	if ($_FILES['imagen']['type'][$i]=='image/png' || $_FILES['imagen']['type'][$i]=='image/jpeg'){
            	move_uploaded_file($_FILES["imagen"]["tmp_name"][$i],$carpeta.'/'.$_FILES["imagen"]["name"][$i]);
            	$validar=true;
        	}
        	else $validar=false;
        }
    }
    
    $imagen = $_FILES["imagen"]["name"][0];

$insertar = $db->insertarUsuario(   $usarioIdTipoDocumento,
                                	$documento,
                                	$usuarioNombres,
                                	$usuarioPrimerApellido,
                                	$usuarioSegundoApellido,
                                    $usuarioLugarNacimiento,
                                    $usuarioFechaNacimiento,
                                    $usuarioEdad,
                                    $idGenero,
                                    $usuarioDireccion,
                                    $usuarioTelefonoFijo,
                                    $usuarioTelefonoCelular,
                                    $usuarioEmail,
                                	$usuarioIdEscolaridad,
                                	$usuarioArea,
                                    $universidad,
                                    $tarjetaprofesional,
                                    $registro,
                                    $nombreUsuario,
                                    $password,
                                	$roles,
                                	$imagen);
    if( $insertar ){
		echo "success";
    }else{
		echo "error";
	}
?>