<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
	
    $idusuario = $_SESSION['idusuario'];
	$db = new DB_Funciones();

    $opcion = $_POST['opcion'];

    $textoEvolucion   = $_POST['textEvolucion'];

    if($opcion == "insertar")
    {
        $insertar = $db->insertarEvolucion($idusuario, $textoEvolucion);
        
        if ( $insertar ){
            echo "success";
        }else{
            echo "error";
        }
    }elseif($opcion == "consultar"){

        $datos          = "";
        
        $consultarEvolucion = $db->consultarEvolucion();
        
        if( $consultarEvolucion != false )
        {
            for ( $i = 0; $i< sizeof($consultarEvolucion); $i++ )
            {
                $datos     = html_entity_decode($consultarEvolucion[$i]['textoevolucion']);
            }
             echo $datos;
        }
    }elseif($opcion == "actualizar"){
        $idpaciente     = 319;
        $idarea         = 1;
        $idbateria      = 1;
error_log("actualizadndo admin evolucion $textoEvolucion");
        $actualizaEvolucion = $db->actualizaEvolucion($idpaciente,
                                                                $textoEvolucion,
                                                                $idarea,
                                                                $idbateria);

        if($actualizaEvolucion)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }elseif($opcion == "cancelar"){


    }

