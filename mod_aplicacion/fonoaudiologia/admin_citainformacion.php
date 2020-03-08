<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("../../mod_conexion/db_funciones.php");
    $db = new DB_Funciones();

    $opcion     = $_POST['opcion'];
    $idusuario  = $_POST['idusuario'];

    $madre = 1;
    $padre = 2;

    /**
     *
     *  Datos de la Cita Informacion
     *
     */
    $idcita         = $_POST['idcita'];
    $fechaCitaIni   = $_POST['fechaCitaIni'];
    $motivoConsulta = $_POST['motivoConsulta'];
    $expectativas   = $_POST['expectativas'];
    $recomTenerCta  = $_POST['recomTenerCta'];
    $inFoGral       = $_POST['inFoGral'];
    /**
     *
     *  Datos del Paciente
     *
     */
    $pacienteIdTipoDocumento  = $_POST['pacienteIdTipoDocumento'];
    $pacienteIdDocumento      = $_POST['pacienteIdDocumento'];
    $pacienteDocumento        = $_POST['pacienteDocumento'];
    $pacienteIdUsuario        = $_POST['pacienteIdUsuario'];
    $pacienteNombres          = $_POST['pacienteNombres'];
    $pacientePrimerApellido   = $_POST['pacientePrimerApellido'];
    $pacienteSegundoApellido  = $_POST['pacienteSegundoApellido'];
    $pacienteFechaNacimiento  = $_POST['pacienteFechaNacimiento'];
    $pacienteEdad             = $_POST['pacienteEdad'];
    $pacienteMeses            = $_POST['pacienteMeses'];
    $pacienteIdGenero         = $_POST['pacienteIdGenero'];
    $pacienteIdEscolaridad    = $_POST['pacienteIdEscolaridad'];
    $pacienteTutela           = $_POST['pacienteTutela'];
    $pacienteIdEps            = $_POST['pacienteIdEps'];
    $pacienteEps              = $_POST['pacienteEps'];
    $diagnosticos             = $_POST['diagnosticos'];
    $remitido                 = $_POST['remitido'];

    /**
     *
     *  Datos de la Madre
     *
     */
    $madreIdTipoDocumento = $_POST['madreIdTipoDocumento'];
    $madreIdTipoUsuario   = $_POST['madreIdTipoUsuario'];
    $madreIdUsuario       = $_POST['madreIdUsuario'];
    $madreIdDocumento     = $_POST['madreIdDocumento'];
    $madreDocumento       = $_POST['madreDocumento'];
    $madreNombres         = $_POST['madreNombres'];
    $madrePrimerApellido  = $_POST['madrePrimerApellido'];
    $madreSegundoApellido = $_POST['madreSegundoApellido'];
    $madreEdad            = $_POST['madreEdad'];
    $madreIdEscolaridad   = $_POST['madreIdEscolaridad'];
    $madreOcupacion       = $_POST['madreOcupacion'];
    $madreDireccion       = $_POST['madreDireccion'];
    $madreTelefonoFijo    = $_POST['madreTelefonoFijo'];
    $madreTelefonoCelular = $_POST['madreTelefonoCelular'];
    $madreEmail           = $_POST['madreEmail'];

    /**
     *
     *  Datos del Padre
     *
     */
    $padreIdTipoDocumento = $_POST['padreIdTipoDocumento'];
    $padreIdDocumento     = $_POST['padreIdDocumento'];
    $padreDocumento       = $_POST['padreDocumento'];
    $padreIdTipoUsuario   = $_POST['padreIdTipoUsuario'];
    $padreIdUsuario       = $_POST['padreIdUsuario'];
    $padreNombres         = $_POST['padreNombres'];
    $padrePrimerApellido  = $_POST['padrePrimerApellido'];
    $padreSegundoApellido = $_POST['padreSegundoApellido'];
    $padreEdad            = $_POST['padreEdad'];
    $padreIdEscolaridad   = $_POST['padreIdEscolaridad'];
    $padreOcupacion       = $_POST['padreOcupacion'];
    $padreDireccion       = $_POST['padreDireccion'];
    $padreTelefonoFijo    = $_POST['padreTelefonoFijo'];
    $padreTelefonoCelular = $_POST['padreTelefonoCelular'];
    $padreEmail           = $_POST['padreEmail'];

    /**
     *
     *  Datos del Acudiente
     *
     */
    $acudienteIdTipoDocumento = $_POST['acudienteIdTipoDocumento'];
    $acudienteIdDocumento     = $_POST['acudienteIdDocumento'];
    $acudienteDocumento       = $_POST['acudienteDocumento'];
    $acudienteIdTipoUsuario   = $_POST['acudienteIdTipoUsuario'];
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
            if($pacienteIdUsuario != null)
            {
                /**
                 * Si el paciente ya ha sido creado por el usuario en la pagina de Agenda
                 */
                 
                $insertar = $db->insertarCitaInformacion( $fechaCitaIni,
                                                          $motivoConsulta,
                                                          $expectativas,
                                                          $recomTenerCta,
                                                          $inFoGral,
                                                          $idusuario,
                                                          $pacienteIdTipoDocumento,
                                                          $pacienteIdDocumento,
                                                          $pacienteDocumento,
                                                          $pacienteIdUsuario,
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
                                                          $remitido,
                                                          $madreIdTipoDocumento,
                                                          $madreIdDocumento,
                                                          $madreDocumento,
                                                          $madreIdTipoUsuario,
                                                          $madreIdUsuario,
                                                          $madreNombres,
                                                          $madrePrimerApellido,
                                                          $madreSegundoApellido,
                                                          $madreEdad,
                                                          $madreIdEscolaridad,
                                                          $madreOcupacion,
                                                          $madreDireccion,
                                                          $madreTelefonoFijo,
                                                          $madreTelefonoCelular,
                                                          $madreEmail,
                                                          $padreIdTipoDocumento,
                                                          $padreIdDocumento,
                                                          $padreDocumento,
                                                          $padreIdTipoUsuario,
                                                          $padreIdUsuario,
                                                          $padreNombres,
                                                          $padrePrimerApellido,
                                                          $padreSegundoApellido,
                                                          $padreEdad,
                                                          $padreIdEscolaridad,
                                                          $padreOcupacion,
                                                          $padreDireccion,
                                                          $padreTelefonoFijo,
                                                          $padreTelefonoCelular,
                                                          $padreEmail,
                                                          $acudienteIdTipoDocumento,
                                                          $acudienteIdDocumento,
                                                          $acudienteDocumento,
                                                          $acudienteIdParentesco,
                                                          $acudienteIdUsuario,
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
            /**
             * Si el paciente no ha sido creado aun sino que esta siendo creado desde la pagina Cita Informacion
             */
            }else{
                error_log("insertando desde cita de informacion");
                $insertar = $db->insertar_CitaInformacion($fechaCitaIni,
                                                          $motivoConsulta,
                                                          $expectativas,
                                                          $recomTenerCta,
                                                          $inFoGral,
                                                          $idusuario,
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
                                                          $remitido,
                                                          $madreIdTipoDocumento,
                                                          $madreDocumento,
                                                          $madreNombres,
                                                          $madrePrimerApellido,
                                                          $madreSegundoApellido,
                                                          $madreEdad,
                                                          $madreIdEscolaridad,
                                                          $madreOcupacion,
                                                          $madreDireccion,
                                                          $madreTelefonoFijo,
                                                          $madreTelefonoCelular,
                                                          $madreEmail,
                                                          $padreIdTipoDocumento,
                                                          $padreDocumento,
                                                          $padreNombres,
                                                          $padrePrimerApellido,
                                                          $padreSegundoApellido,
                                                          $padreEdad,
                                                          $padreIdEscolaridad,
                                                          $padreOcupacion,
                                                          $padreDireccion,
                                                          $padreTelefonoFijo,
                                                          $padreTelefonoCelular,
                                                          $padreEmail,
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
                                                          $acudienteEmail);
            }

            if ( $insertar ){
                echo "success";
            }else{
                echo "error";
            }

        }elseif($opcion == "consultar")
        {
            $idpaciente = $_POST['idpaciente'];
            $idcita     = $_POST['idcita'];
            $idtipocita = $_POST['idtipocita'];

            $acudiente  = 5;
            $padre      = 2;
            $madre      = 3;
            $agenda     = 1;

            $return_arr   = array();
            $consultaCita = $db->consultarCita($idpaciente, $idcita);

            if( $consultaCita != false )
            {
                for ( $i = 0; $i< sizeof($consultaCita); $i++ )
                {
                    $row_array['fecha']                     = $consultaCita[$i]['fechacitaini'];
                    $row_array['idhora']                    = $consultaCita[$i]['hora_idhora'];
                    $row_array['hora']                      = $consultaCita[$i]['hora'];
                    $row_array['nombre_aplicador']          = $consultaCita[$i]['nombre_aplicador'];
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
                    $row_array['pacientedireccion']         = $consultaCita[$i]['pacientedireccion'];
                    $row_array['pacienteciudadresidencia']  = $consultaCita[$i]['pacienteciudadresidencia'];
                    $row_array['pacienteIdGenero']          = $consultaCita[$i]['pacienteIdGenero'];
                    $row_array['genero']                    = $consultaCita[$i]['genero'];
                    $row_array['pacienteIdEscolaridad']     = $consultaCita[$i]['pacienteIdEscolaridad'];
                    $row_array['pacienteEscolaridad']       = $consultaCita[$i]['pacienteEscolaridad'];
                    $row_array['pacienteTutela']            = $consultaCita[$i]['pacienteTutela'];
                    $row_array['pacienteIdEps']             = $consultaCita[$i]['pacienteIdEps'];
                    $row_array['pacienteEps']               = $consultaCita[$i]['pacienteEps'];
                    $row_array['diagnosticos']              = $consultaCita[$i]['diagnosticos'];
                    $idparentesco                           = $consultaCita[$i]['acudienteIdParentesco'];
                    $idtipousuario                          = $consultaCita[$i]['idtipousuario'];

                    /**
                     * Que pasa si el acudiente no es ni el padre ni la madre 
                     */

                    if($idparentesco == $madre)
                    {
                        $row_array['madreIdTipoDocumento']  = $consultaCita[$i]['acudienteIdTipoDocumento'];
                        $row_array['madreTipoDocumento']    = $consultaCita[$i]['acudienteTipoDocumento'];
                        $row_array['madreDocumento']        = $consultaCita[$i]['acudienteDocumento'];
                        $row_array['madreIdDocumento']      = $consultaCita[$i]['acudienteIdDocumento'];
                        $row_array['madreIdTipoUsuario']    = $consultaCita[$i]['acudienteIdTipoUsuario'];
                        $row_array['madreIdUsuario']        = $consultaCita[$i]['acudienteIdUsuario'];
                        $row_array['madreIdParentesco']     = $consultaCita[$i]['acudienteIdParentesco'];
                        $row_array['madreParentesco']       = $consultaCita[$i]['acudienteParentesco'];
                        $row_array['madreNombres']          = $consultaCita[$i]['acudienteNombres'];
                        $row_array['madrePrimerApellido']   = $consultaCita[$i]['acudientePrimerApellido'];
                        $row_array['madreSegundoApellido']  = $consultaCita[$i]['acudienteSegundoApellido'];
                        $row_array['madreEdad']             = $consultaCita[$i]['acudienteEdad'];
                        $row_array['madreIdEscolaridad']    = $consultaCita[$i]['acudienteIdEscolaridad'];
                        $row_array['madreEscolaridad']      = $consultaCita[$i]['acudienteEscolaridad'];
                        $row_array['madreOcupacion']        = $consultaCita[$i]['acudienteOcupacion'];
                        $row_array['madreDireccion']        = $consultaCita[$i]['acudienteDireccion'];
                        $row_array['madreTelefonoFijo']     = $consultaCita[$i]['acudienteTelefonoFijo'];
                        $row_array['madreTelefonoCelular']  = $consultaCita[$i]['acudienteTelefonoCelular'];
                        $row_array['madreEmail']            = $consultaCita[$i]['acudienteEmail'];
                    }

                    if($idparentesco == $padre)
                    {
                        $row_array['padreIdTipoDocumento']  = $consultaCita[$i]['acudienteIdTipoDocumento'];
                        $row_array['padreTipoDocumento']    = $consultaCita[$i]['acudienteTipoDocumento'];
                        $row_array['padreDocumento']        = $consultaCita[$i]['acudienteDocumento'];
                        $row_array['padreIdDocumento']      = $consultaCita[$i]['acudienteIdDocumento'];
                        $row_array['padreIdTipoUsuario']    = $consultaCita[$i]['acudienteIdTipoUsuario'];
                        $row_array['padreIdUsuario']        = $consultaCita[$i]['acudienteIdUsuario'];
                        $row_array['padreIdParentesco']     = $consultaCita[$i]['acudienteIdParentesco'];
                        $row_array['padreParentesco']       = $consultaCita[$i]['acudienteParentesco'];
                        $row_array['padreNombres']          = $consultaCita[$i]['acudienteNombres'];
                        $row_array['padrePrimerApellido']   = $consultaCita[$i]['acudientePrimerApellido'];
                        $row_array['padreSegundoApellido']  = $consultaCita[$i]['acudienteSegundoApellido'];
                        $row_array['padreEdad']             = $consultaCita[$i]['acudienteEdad'];
                        $row_array['padreIdEscolaridad']    = $consultaCita[$i]['acudienteIdEscolaridad'];
                        $row_array['padreEscolaridad']      = $consultaCita[$i]['acudienteEscolaridad'];
                        $row_array['padreOcupacion']        = $consultaCita[$i]['acudienteOcupacion'];
                        $row_array['padreDireccion']        = $consultaCita[$i]['acudienteDireccion'];
                        $row_array['padreTelefonoFijo']     = $consultaCita[$i]['acudienteTelefonoFijo'];
                        $row_array['padreTelefonoCelular']  = $consultaCita[$i]['acudienteTelefonoCelular'];
                        $row_array['padreEmail']            = $consultaCita[$i]['acudienteEmail'];

                    }

                    if($idtipocita == $agenda){
                        $row_array['acudienteIdTipoDocumento']  = $consultaCita[$i]['acudienteIdTipoDocumento'];
                        $row_array['acudienteTipoDocumento']    = $consultaCita[$i]['acudienteTipoDocumento'];
                        $row_array['acudienteDocumento']        = $consultaCita[$i]['acudienteDocumento'];
                        $row_array['acudienteIdDocumento']      = $consultaCita[$i]['acudienteIdDocumento'];
                        $row_array['acudienteIdTipoUsuario']    = $consultaCita[$i]['acudienteIdTipoUsuario'];
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
                    }elseif($idtipousuario == $acudiente){
                        $row_array['acudienteIdTipoDocumento']  = $consultaCita[$i]['acudienteIdTipoDocumento'];
                        $row_array['acudienteTipoDocumento']    = $consultaCita[$i]['acudienteTipoDocumento'];
                        $row_array['acudienteDocumento']        = $consultaCita[$i]['acudienteDocumento'];
                        $row_array['acudienteIdDocumento']      = $consultaCita[$i]['acudienteIdDocumento'];
                        $row_array['acudienteIdTipoUsuario']    = $consultaCita[$i]['acudienteIdTipoUsuario'];
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
                    }

                    $row_array['remitido']                  = $consultaCita[$i]['remitido'];
                    $row_array['motivoconsulta']            = $consultaCita[$i]['motivoconsulta'];
                    $row_array['expectativas']              = $consultaCita[$i]['expectativas'];
                    $row_array['recomtenercta']             = $consultaCita[$i]['recomtenercta'];
                    $row_array['infogral']                  = $consultaCita[$i]['infogral'];

                    array_push($return_arr, $row_array);
                }
                echo json_encode($return_arr);
            }
        }elseif($opcion == "actualizar")
        {
            //error_log("datos ".$fechaCitaIni." - ".$idcita." - ".$motivoConsulta." - ".$expectativas." - ".$recomTenerCta." - ".$inFoGral." - ".$idusuario." - ".$pacienteIdTipoDocumento." - ".$pacienteIdDocumento." - ".$pacienteDocumento." - ".$pacienteIdUsuario." - ".$pacienteNombres." - ".$pacientePrimerApellido." - ".$pacienteSegundoApellido." - ".$pacienteFechaNacimiento." - ".$pacienteEdad." - ".$pacienteMeses." - ".$pacienteIdGenero." - ".$pacienteIdEscolaridad." - ".$pacienteTutela." - ".$pacienteIdEps." - ".$diagnosticos." - ".$remitido." - ".$madreIdTipoDocumento." - ".$madreIdDocumento." - ".$madreDocumento." - ".$madreIdTipoUsuario." - ".$madreIdUsuario." - ".$madreNombres." - ".$madrePrimerApellido." - ".$madreSegundoApellido." - ".$madreEdad." - ".$madreIdEscolaridad." - ".$madreOcupacion." - ".$madreDireccion." - ".$madreTelefonoFijo." - ".$madreTelefonoCelular." - ".$madreEmail." - ".$padreIdTipoDocumento." - ".$padreIdDocumento." - ".$padreDocumento." - ".$padreIdTipoUsuario." - ".$padreIdUsuario." - ".$padreNombres." - ".$padrePrimerApellido." - ".$padreSegundoApellido." - ".$padreEdad." - ".$padreIdEscolaridad." - ".$padreOcupacion." - ".$padreDireccion." - ".$padreTelefonoFijo." - ".$padreTelefonoCelular." - ".$padreEmail." - ".$acudienteIdTipoDocumento." - ".$acudienteIdDocumento." - ".$acudienteDocumento." - ".$acudienteIdParentesco." - ".$acudienteIdTipoUsuario." - ".$acudienteIdUsuario." - ".$acudienteNombres." - ".$acudientePrimerApellido." - ".$acudienteSegundoApellido." - ".$acudienteEdad." - ".$acudienteIdEscolaridad." - ".$acudienteOcupacion." - ".$acudienteDireccion." - ".$acudienteTelefonoFijo." - ".$acudienteTelefonoCelular." - ".$acudienteEmail);
            
            $actualizar = $db->actualizarCitaInformacion($fechaCitaIni,
                                                         $idcita,
                                                         $motivoConsulta,
                                                         $expectativas,
                                                         $recomTenerCta,
                                                         $inFoGral,
                                                         $idusuario,
                                                         $pacienteIdTipoDocumento,
                                                         $pacienteIdDocumento,
                                                         $pacienteDocumento,
                                                         $pacienteIdUsuario,
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
                                                         $remitido,
                                                         $madreIdTipoDocumento,
                                                         $madreIdDocumento,
                                                         $madreDocumento,
                                                         $madreIdTipoUsuario,
                                                         $madreIdUsuario,
                                                         $madreNombres,
                                                         $madrePrimerApellido,
                                                         $madreSegundoApellido,
                                                         $madreEdad,
                                                         $madreIdEscolaridad,
                                                         $madreOcupacion,
                                                         $madreDireccion,
                                                         $madreTelefonoFijo,
                                                         $madreTelefonoCelular,
                                                         $madreEmail,
                                                         $padreIdTipoDocumento,
                                                         $padreIdDocumento,
                                                         $padreDocumento,
                                                         $padreIdTipoUsuario,
                                                         $padreIdUsuario,
                                                         $padreNombres,
                                                         $padrePrimerApellido,
                                                         $padreSegundoApellido,
                                                         $padreEdad,
                                                         $padreIdEscolaridad,
                                                         $padreOcupacion,
                                                         $padreDireccion,
                                                         $padreTelefonoFijo,
                                                         $padreTelefonoCelular,
                                                         $padreEmail,
                                                         $acudienteIdTipoDocumento,
                                                         $acudienteIdDocumento,
                                                         $acudienteDocumento,
                                                         $acudienteIdParentesco,
                                                         $acudienteIdTipoUsuario,
                                                         $acudienteIdUsuario,
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
        }elseif($opcion == "cancelar")
        {
            $cancelar = $db->cancelarCita($idcita);

            if ( $cancelar )
            {
                echo "success";
            }else
            {
                echo "error";
            }
        }