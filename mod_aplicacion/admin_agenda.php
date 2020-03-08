<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
    $idusuario = $_SESSION['idusuario'];
	$db = new DB_Funciones();

    $opcion = $_POST['opcion'];
    
    /**
         *
         *  Datos de la Agenda
         *
         */
        $fechaCitaIni   = $_POST['fechaCitaIni'];
        $horacita       = $_POST['horacita'];
        $observacion    = $_POST['observacion'];
        $idusuario      = $_POST['idusuario'];
        $idcita         = $_POST['idcita'];
        $remitido       = "S";
        /**
         *
         *  Datos del Paciente
         *
         */
        $pacienteIdDocumento        = $_POST['pacienteIdDocumento'];
        $pacienteIdUsuario          = $_POST['pacienteIdUsuario'];
        $pacienteIdParentesco       = $_POST['pacienteIdParentesco'];
        $pacienteIdTipoDocumento    = $_POST['pacienteIdTipoDocumento'];
        $pacienteDocumento          = $_POST['pacienteDocumento'];
        $pacienteNombres            = $_POST['pacienteNombres'];
        $pacientePrimerApellido     = $_POST['pacientePrimerApellido'];
        $pacienteSegundoApellido    = $_POST['pacienteSegundoApellido'];
        $pacienteFechaNacimiento    = $_POST['pacienteFechaNacimiento'];
        $pacienteEdad               = $_POST['pacienteEdad'];
        $pacienteMeses              = $_POST['pacienteMeses'];
        $pacienteIdGenero           = $_POST['pacienteIdGenero'];
        $pacienteIdEscolaridad      = $_POST['pacienteIdEscolaridad'];
        $pacienteTutela             = $_POST['pacienteTutela'];
        $pacienteIdEps              = $_POST['pacienteIdEps'];
        $pacienteEps                = $_POST['pacienteEps'];
        $diagnosticos               = $_POST['diagnosticos'];
        /**
         *
         *  Datos del Acudiente
         *
         */
        $acudienteIdTipoDocumento = $_POST['acudienteIdTipoDocumento'];
        $acudienteDocumento       = $_POST['acudienteDocumento'];
        $acudienteIdDocumento     = $_POST['acudienteIdDocumento'];
        $acudienteIdUsuario       = $_POST['acudienteIdUsuario'];
        $acudienteIdParentesco    = $_POST['acudienteIdParentesco'];
        $acudienteNombres         = $_POST['acudienteNombres'];
        $acudientePrimerApellido  = $_POST['acudientePrimerApellido'];
        $acudienteSegundoApellido = $_POST['acudienteSegundoApellido'];
        $acudienteEdad            = $_POST['acudienteEdad'];
        $acudienteIdEscolaridad   = $_POST['acudienteIdEscolaridad'];
        $acudienteOcupacion       = $_POST['acudienteOcupacion'];
        $acudienteDireccion       = $_POST['acudienteDireccion'];
        $acudienteTelefonoFijo    = $_POST['acudienteTelefonoFijo'];
        $acudienteTelefonoCelular = $_POST['acudienteTelefonoCelular'];
        $acudienteEmail           = $_POST['acudienteEmail'];

    if($opcion == "insertar")
    {
        $insertar = $db->insertarAgenda($idusuario,
                                        $fechaCitaIni,
                                        $horacita,
                                        $observacion,
                                        $pacienteIdTipoDocumento,
                                        $pacienteDocumento,
                                        $pacienteNombres,
                                        $pacientePrimerApellido,
                                        $pacienteSegundoApellido,
                                        $pacienteFechaNacimiento,
                                        $pacienteEdad,
                                        $pacienteMeses,
                                        $pacienteIdGenero,
                                        $pacienteIdEscolaridad,
                                        $pacienteTutela,
                                        $pacienteIdEps,
                                        $pacienteEps,
                                        $diagnosticos,
                                        $acudienteIdTipoDocumento,
                                        $acudienteDocumento,
                                        $acudienteIdParentesco,
                                        $acudienteNombres,
                                        $acudientePrimerApellido,
                                        $acudienteSegundoApellido,
                                        $acudienteEdad,
                                        $acudienteIdEscolaridad,
                                        $acudienteOcupacion,
                                        $acudienteDireccion,
                                        $acudienteTelefonoFijo,
                                        $acudienteTelefonoCelular,
                                        $acudienteEmail );
        if ( $insertar ){
            echo "success";
        }else{
            echo "error";
        }
    }elseif($opcion == "consultar"){
        $idpaciente = $_POST['idpaciente'];
        $idcita     = $_POST['idcita'];
        
        $return_arr = array();
        $consultaCita   	= $db->consultarCita($idpaciente, $idcita);
    
        if( $consultaCita != false ) 
        {
            for ( $i = 0; $i< sizeof($consultaCita); $i++ ) 
            {
                $row_array['fecha']                     = $consultaCita[$i]['fechacitaini'];
                $row_array['idhora']                    = $consultaCita[$i]['hora_idhora'];
                $row_array['hora']                      = $consultaCita[$i]['hora'];
                $row_array['observacion']               = $consultaCita[$i]['observacion'];
                $row_array['pacienteIdDocumento']       = $consultaCita[$i]['pacienteIdDocumento'];
                $row_array['pacienteIdUsuario']         = $consultaCita[$i]['pacienteIdUsuario'];
                $row_array['pacienteIdParentesco']      = $consultaCita[$i]['pacienteIdParentesco'];
                $row_array['pacienteIdTipoDocumento']   = $consultaCita[$i]['pacienteIdTipoDocumento'];
                $row_array['pacienteTipoDocumento']     = $consultaCita[$i]['pacienteTipoDocumento'];
                $row_array['pacienteDocumento']         = $consultaCita[$i]['pacienteDocumento'];
                $row_array['pacienteNombres']           = $consultaCita[$i]['pacienteNombres'];
                $row_array['pacientePrimerApellido']    = $consultaCita[$i]['pacientePrimerApellido'];
                $row_array['pacienteSegundoApellido']   = $consultaCita[$i]['pacienteSegundoApellido'];
                $row_array['pacienteFechaNacimiento']   = $consultaCita[$i]['pacienteFechaNacimiento'];
                $row_array['pacienteEdad']              = $consultaCita[$i]['pacienteEdad'];
                $row_array['pacienteMeses']             = $consultaCita[$i]['pacienteMeses'];
                $row_array['pacienteIdGenero']          = $consultaCita[$i]['pacienteIdGenero'];
                $row_array['genero']                    = $consultaCita[$i]['genero'];
                $row_array['pacienteIdEscolaridad']     = $consultaCita[$i]['pacienteIdEscolaridad'];
                $row_array['pacienteEscolaridad']       = $consultaCita[$i]['pacienteEscolaridad'];
                $row_array['pacienteTutela']            = $consultaCita[$i]['pacienteTutela'];
                $row_array['pacienteIdEps']             = $consultaCita[$i]['pacienteIdEps'];
                $row_array['pacienteEps']               = $consultaCita[$i]['pacienteEps'];
                $row_array['diagnosticos']              = $consultaCita[$i]['diagnosticos'];
                $row_array['acudienteIdTipoDocumento']  = $consultaCita[$i]['acudienteIdTipoDocumento'];
                $row_array['acudienteTipoDocumento']    = $consultaCita[$i]['acudienteTipoDocumento'];
                $row_array['acudienteDocumento']        = $consultaCita[$i]['acudienteDocumento'];
                $row_array['acudienteIdDocumento']      = $consultaCita[$i]['acudienteIdDocumento'];
                $row_array['acudienteIdUsuario']        = $consultaCita[$i]['acudienteIdUsuario'];
                $row_array['acudienteIdParentesco']     = $consultaCita[$i]['acudienteIdParentesco'];
                $row_array['acudienteParentesco']       = $consultaCita[$i]['acudienteParentesco'];
                $row_array['acudienteNombres']          = $consultaCita[$i]['acudienteNombres'];
                $row_array['acudientePrimerApellido']   = $consultaCita[$i]['acudientePrimerApellido'];
                $row_array['acudienteSegundoApellido']  = $consultaCita[$i]['acudienteSegundoApellido'];
                $row_array['acudienteEdad']             = $consultaCita[$i]['acudienteEdad'];
                $row_array['acudienteIdEscolaridad']    = $consultaCita[$i]['acudienteIdEscolaridad'];
                $row_array['acudienteEscolaridad']      = $consultaCita[$i]['acudienteEscolaridad'];
                $row_array['acudienteOcupacion']        = $consultaCita[$i]['acudienteOcupacion'];
                $row_array['acudienteDireccion']        = $consultaCita[$i]['acudienteDireccion'];
                $row_array['acudienteTelefonoFijo']     = $consultaCita[$i]['acudienteTelefonoFijo'];
                $row_array['acudienteTelefonoCelular']  = $consultaCita[$i]['acudienteTelefonoCelular'];
                $row_array['acudienteEmail']            = $consultaCita[$i]['acudienteEmail'];
                $row_array['remitido']                  = $consultaCita[$i]['remitido'];
                $row_array['motivoconsulta']            = $consultaCita[$i]['motivoconsulta'];
                $row_array['expectativas']              = $consultaCita[$i]['expectativas'];
                $row_array['recomTenerCta']             = $consultaCita[$i]['recomTenerCta'];
                $row_array['inFoGral']                  = $consultaCita[$i]['inFoGral'];
                
                array_push($return_arr, $row_array);
            }
            echo json_encode($return_arr);
        }

    }elseif($opcion == "actualizar"){

        $actualizar = $db->actualizarAgenda($idusuario,
                                            $idcita,
                                            $fechaCitaIni,
                                            $horacita,
                                            $observacion,
                                            $pacienteIdTipoDocumento,
                                            $pacienteIdDocumento,
                                            $pacienteDocumento,
                                            $pacienteIdUsuario,
                                            $pacienteIdParentesco,
                                            $pacienteNombres,
                                            $pacientePrimerApellido,
                                            $pacienteSegundoApellido,
                                            $pacienteFechaNacimiento,
                                            $pacienteEdad,
                                            $pacienteMeses,
                                            $pacienteIdGenero,
                                            $pacienteIdEscolaridad,
                                            $pacienteTutela,
                                            $pacienteIdEps,
                                            $diagnosticos,
                                            $acudienteIdTipoDocumento,
                                            $acudienteIdDocumento,
                                            $acudienteDocumento,
                                            $acudienteIdUsuario,
                                            $acudienteIdParentesco,
                                            $acudienteNombres,
                                            $acudientePrimerApellido,
                                            $acudienteSegundoApellido,
                                            $acudienteEdad,
                                            $acudienteIdEscolaridad,
                                            $acudienteOcupacion,
                                            $acudienteDireccion,
                                            $acudienteTelefonoFijo,
                                            $acudienteTelefonoCelular,
                                            $acudienteEmail);
        if($actualizar)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }elseif($opcion == "cancelar"){

        $idcita  = $_POST['idcita'];

        $cancelar = $db->cancelarCita($idcita);

        if ( $cancelar ){
            echo "success";
        }else{
            echo "error";
        }
    }

