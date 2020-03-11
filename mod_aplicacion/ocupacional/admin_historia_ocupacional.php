<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("../../mod_conexion/db_funciones.php");
    $db = new DB_Funciones();

    $opcion         = $_POST['opcion'];
    $idpaciente     = $_POST['idpaciente'];
    $idTerapeuta    = $_POST['idTerapeuta'];
    $idcita         = $_POST['idcita'];
    $idarea         = $_POST['idarea'];
    $idhistoria     = $_POST['idhistoria'];

    if($opcion == "insertarhistoria"){

        $insertar = $db->crearHistoriaTO($idpaciente, $idarea, $idTerapeuta);

        if ( $insertar ){
            echo $insertar;
        }else{
            $insertar = 0;
            echo $insertar;
        }
    }

    if($opcion == "consultarhistoria"){
        $return_arr   = array();
        $consultaHistoria = $db->consultarHistoriaTO($idpaciente, $idarea);

        if( $consultaHistoria != false )
        {
            for ( $i = 0; $i< sizeof($consultaHistoria); $i++ )
            {
                $idhistoria = $consultaHistoria[$i]['idhistoriaclinica'];
            }
        }else{
            $idhistoria = 0;
        }
        echo $idhistoria;
    }

    /////////////////////////////////////////////     TAB Datos Generales  /////////////////////////////////////////////

    if($opcion == "consultarHistoriaPsicoId"){
        $return_arrHPsicoId   = array();
        $consultaHPsicoId = $db->consultarHistoriaPsicoId($idpaciente);

        if( $consultaHPsicoId != false )
        {
            for ( $Id = 0; $Id< sizeof($consultaHPsicoId); $Id++ )
            {
                $row_arrayHPsicoId['idhistoriaclinica'] = $consultaHPsicoId[$Id]['idhistoriaclinica'];
                array_push($return_arrHPsicoId, $row_arrayHPsicoId);
            }
            echo json_encode($return_arrHPsicoId);
        }
    }

    if($opcion == "consultarIdHistoriaPsico"){
        $return_arrIdHPsico   = array();
        $consultaIdHPsico = $db->consultarIdHistoriaPsico($idpaciente);

        if( $consultaIdHPsico != false )
        {
            for ( $AF = 0; $AF< sizeof($consultaIdHPsico); $AF++ )
            {
                $row_arrayIdHPsico['idhistoriaclinica'] = $consultaIdHPsico[$AF]['idhistoriaclinica'];

                array_push($return_arrIdHPsico, $row_arrayIdHPsico);
            }
            //echo json_encode($return_arrIdHPsico);
            echo $row_arrayIdHPsico['idhistoriaclinica'];
        }
    }


    if($opcion == "consultardatos")
    {
        $return_arr = array();
        $consultaDatosRemision = $db->consultarDatosRemision($idpaciente);

        if ($consultaDatosRemision != false) {
            for ($i = 0; $i < sizeof($consultaDatosRemision); $i++) {
                $row_array['remitidopor'] = $consultaDatosRemision[$i]['remitidopor'];
                $row_array['motivo'] = $consultaDatosRemision[$i]['motivo'];
                array_push($return_arr, $row_array);
            }
            echo json_encode($return_arr);
        }
    }


    if($opcion == "cargarInstitucionGradoDominancia")
    {
        $return_arrIGD = array();
        $consultaIGD = $db->cargarInstitucionGradoDominancia($idhistoria);

        if ($consultaIGD != false) {
            for ($i = 0; $i < sizeof($consultaIGD); $i++) {
                $row_arrayIGD['pacienteInstitucion']    = $consultaIGD[$i]['institucion'];
                $row_arrayIGD['pacienteGrado']          = $consultaIGD[$i]['grado'];
                $row_arrayIGD['pacienteDominancia']     = $consultaIGD[$i]['dominancia'];
                array_push($return_arrIGD, $row_arrayIGD);
            }
            echo json_encode($return_arrIGD);
        }
    }


    ////// Actualizacion Datos generales

    if($opcion == "actualizaDatosGrales")
    {
        $idhist                     = $_POST['idhist'];
        $remitidoRemision           = $_POST['remitidoRemision'];
        $motivoRemision             = $_POST['motivoRemision'];
        $pacienteDireccion          = $_POST['pacienteDireccion'];
        $pacienteCiudad             = $_POST['pacienteCiudad'];
        $informante                 = $_POST['pacienteInformante'];
        $pacienteLugarNacimiento    = $_POST['pacienteLugarNacimiento'];

        $actualizarDatosGrales = $db->actualizarDatosGrales($idpaciente, $idhist, $remitidoRemision, $motivoRemision, $pacienteDireccion, $pacienteCiudad, $informante, $pacienteLugarNacimiento);

        if($actualizarDatosGrales)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }

    if($opcion == "actualizarAnamnesisTO")
    {
        $idhist                 = $_POST['idhist'];
        $pacienteInstitucion    = $_POST['pacienteInstitucion'];
        $pacienteGrado          = $_POST['pacienteGrado'];
        $pacienteDominancia     = $_POST['pacienteDominancia'];
        $lineamaterna           = $_POST['lineamaterna'];
        $lineapaterna           = $_POST['lineapaterna'];
        $antPatologicos         = $_POST['antPatologicos'];
        $antQuirurgicos         = $_POST['antQuirurgicos'];
        $antFarmacologicos      = $_POST['antFarmacologicos'];
        $antDuracion            = $_POST['antDuracion'];
        $antInstitucion         = $_POST['antInstitucion'];
        $antquetrabajo          = $_POST['antquetrabajo'];
        $embprevios             = $_POST['embprevios'];
        $observacionesparto     = $_POST['observacionesparto'];
        $obsrposnatal           = $_POST['obsrposnatal'];

        $actualizarDatosAnamnesisTO = $db->actualizarAnamnesisTO($idhist,
            $pacienteInstitucion,
            $pacienteGrado,
            $pacienteDominancia,
            $lineamaterna,
            $lineapaterna,
            $antPatologicos,
            $antQuirurgicos,
            $antFarmacologicos,
            $antDuracion,
            $antInstitucion,
            $antquetrabajo,
            $embprevios,
            $observacionesparto,
            $obsrposnatal);

        if($actualizarDatosAnamnesisTO)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }


    ///constitucion
    if($opcion == "consultarconstitucion"){
        $dataConst  = "";
        $checked    = "";
        $disabled   = $_POST['disabled'];

        $consultarConstitucion = $db->consultarConstitucion($idpaciente);

        if( $consultarConstitucion != false )
        {
            for ( $i = 0; $i< sizeof($consultarConstitucion); $i++ )
            {
                $idusuario      = $consultarConstitucion[$i]['idusuario'];
                $parentesco     = $consultarConstitucion[$i]['parentesco'];
                $nombres        = $consultarConstitucion[$i]['nombres'];
                $primerapellido = $consultarConstitucion[$i]['primerapellido'];
                $edad           = $consultarConstitucion[$i]['edad'];
                $ocupacion      = $consultarConstitucion[$i]['ocupacion'];
                $constfamiliar  = $consultarConstitucion[$i]['constfamiliar'];

                if($constfamiliar != "" && $constfamiliar == 'S'){
                    $checked = 'checked';
                }else{
                    $constfamiliar == 'N';
                    $checked = '';
                }

                $dataConst .= '<div class="col-md-3">
                                    <div class="form-group">
                                        <label id=>'.$parentesco.'</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>'.$nombres.' '.$primerapellido.'</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>'.$edad.'</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>'.$ocupacion.'</label>
                                    </div>
                                </div>';
            }
        }
        echo"$dataConst";
    }

    /////////////////////////////////////////////     TAB Consulta  /////////////////////////////////////////////

    if($opcion == "consultarmotivo"){
        $return_arrmo   = array();
        $consultaMotivo = $db->consultarMotivoFono($idpaciente, $idhistoria);

        if( $consultaMotivo != false )
        {
            for ( $mo = 0; $mo< sizeof($consultaMotivo); $mo++ )
            {
                $row_arraymo['motivoConsulta']        = $consultaMotivo[$mo]['motivoconsulta'];
                $row_arraymo['institucion']        = $consultaMotivo[$mo]['institucion'];
                array_push($return_arrmo, $row_arraymo);
            }
            echo json_encode($return_arrmo);
        }
    }

    if($opcion == "consultarmotivoPaciente"){
        $return_arrmoPaciente   = array();
        $consultaMotivoPaciente = $db->consultarMotivoPaciente($idpaciente);

        if( $consultaMotivoPaciente != false )
        {
            for ( $mop = 0; $mop< sizeof($consultaMotivoPaciente); $mop++ )
            {
                $row_arraymoPaciente['motivoConsulta']        = $consultaMotivoPaciente[$mop]['motivoconsulta'];
                array_push($return_arrmoPaciente, $row_arraymoPaciente);
            }
            echo json_encode($return_arrmoPaciente);
        }
    }
    ////// Actualizar Tab Consulta

    if($opcion == "actualizaTabConsulta")
    {
        $idhist                     = $_POST['idhist'];
        $idantecedente              = $_POST['idantecedente'];
        $motivoConsultaObservacion  = $_POST['motivoConsultaObservacion'];
        $diagnosticos               = $_POST['diagnosticos'];
        $edadIniDif                 = $_POST['edadIniDif'];
        $porqueante                 = $_POST['porqueante'];
        $otrasConductas             = $_POST['otrasConductas'];

        $actualizaTabConsulta = $db->actualizaTabConsulta($idhist,
            $idantecedente,
            $motivoConsultaObservacion,
            $diagnosticos,
            $edadIniDif,
            $porqueante,
            $otrasConductas);

        if($actualizaTabConsulta)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }


    /////////////////////////////////////////////     TAB Antecedentes  /////////////////////////////////////////////

    if($opcion == "consultarAntFamiliar"){
        $return_arrAF   = array();
        $consultaAntFamiliar = $db->consultarAntFamiliar($idpaciente, $idhistoria);

        if( $consultaAntFamiliar != false )
        {
            for ( $AF = 0; $AF< sizeof($consultaAntFamiliar); $AF++ )
            {
                $row_arrayAF['idantecedente']       = $consultaAntFamiliar[$AF]['idantecedente'];
                $row_arrayAF['lineamaterna']        = $consultaAntFamiliar[$AF]['lineamaterna'];
                $row_arrayAF['lineapaterna']        = $consultaAntFamiliar[$AF]['lineapaterna'];
                array_push($return_arrAF, $row_arrayAF);
            }
            echo json_encode($return_arrAF);
        }
    }

    if($opcion == "consultarAntPaciente"){
        $return_arrAPac   = array();

        /***************************************** Personales **************************************************************************/
        $consultaAntPac6 = $db->consultarAntPaciente(6, $idhistoria);

        if( $consultaAntPac6 != false )
        {
            for ( $APac6 = 0; $APac6< sizeof($consultaAntPac6); $APac6++ )
            {
                $row_arrayAPac6['antPersonales'] = $consultaAntPac6[$APac6]['porqueante'];
                array_push($return_arrAPac, $row_arrayAPac6);
            }
        }
        /**************************************Patologicos***********************************************************************************/
        $consultaAntPac7 = $db->consultarAntPaciente(7, $idhistoria);

        if( $consultaAntPac7 != false )
        {
            for ( $APac7 = 0; $APac7< sizeof($consultaAntPac6); $APac7++ )
            {
                $row_arrayAPac7['antPatologicos'] = $consultaAntPac6[$APac7]['porqueante'];
                array_push($return_arrAPac, $row_arrayAPac7);
            }
        }
      /******************************************Quirurgicos************************************************************************************/
        $consultaAntPac8 = $db->consultarAntPaciente(8, $idhistoria);

        if( $consultaAntPac8 != false )
        {
            for ( $APac8 = 0; $APac8< sizeof($consultaAntPac8); $APac8++ )
            {
                $row_arrayAPac8['antQuirurgicos'] = $consultaAntPac8[$APac8]['porqueante'];
                array_push($return_arrAPac, $row_arrayAPac8);
            }
        }
        /******************************************Farmacologicos************************************************************************************/
        $consultaAntPac9 = $db->consultarAntPaciente(9, $idhistoria);

        if( $consultaAntPac9 != false )
        {
            for ( $APac9 = 0; $APac9< sizeof($consultaAntPac9); $APac9++ )
            {
                $row_arrayAPac9['antFarmacologicos'] = $consultaAntPac9[$APac9]['porqueante'];
                array_push($return_arrAPac, $row_arrayAPac9);
            }
        }

        echo json_encode($return_arrAPac);
    }

    if($opcion == "consultarAntTerapeuticos"){
        $return_arrATera   = array();
        $consultaAntTera = $db->consultarAntTerapeuticos($idhistoria);

        if( $consultaAntTera != false )
        {
            for ( $ATera = 0; $ATera< sizeof($consultaAntTera); $ATera++ )
            {
                $row_arrayATera['antInstitucion']   = $consultaAntTera[$ATera]['institucion'];
                $row_arrayATera['antDuracion']      = $consultaAntTera[$ATera]['duracion'];
                $row_arrayATera['antquetrabajo']    = $consultaAntTera[$ATera]['quetrabajo'];
                array_push($return_arrATera, $row_arrayATera);
            }
            echo json_encode($return_arrATera);
        }
    }

    if($opcion == "consultarAntPrenatal"){
        $return_arrAP   = array();
        $consultaAntPrenatal = $db->consultarAntPrenatalFono($idpaciente, $idhistoria);

        if( $consultaAntPrenatal != false )
        {
            for ( $AP = 0; $AP< sizeof($consultaAntPrenatal); $AP++ )
            {
                $row_arrayAP['abortivas']       = $consultaAntPrenatal[$AP]['abortivas'];
                array_push($return_arrAP, $row_arrayAP);
            }
            echo json_encode($return_arrAP);
        }
    }

    if($opcion == "consultarAntPrenatalTO"){
        $return_arrAPTO   = array();
        $consultaAntPrenatalTO = $db->consultarAntPrenatalTO($idhistoria);

        if( $consultaAntPrenatalTO != false )
        {
            for ( $APTO = 0; $APTO< sizeof($consultaAntPrenatalTO); $APTO++ )
            {
                $row_arrayAPTO['embprevios']            = $consultaAntPrenatalTO[$APTO]['embprevios'];
                $row_arrayAPTO['observacionesparto']    = $consultaAntPrenatalTO[$APTO]['observaciones'];
                array_push($return_arrAPTO, $row_arrayAPTO);
            }
            echo json_encode($return_arrAPTO);
        }
    }

    if($opcion == "consultarAntParto"){
        $return_arrAParto   = array();
        $consultaAntParto = $db->consultarAntPartoFono($idpaciente, $idhistoria);

        if( $consultaAntParto != false )
        {
            for ( $APa = 0; $APa< sizeof($consultaAntParto); $APa++ )
            {
                $row_arrayAParto['idantecedente']   = $consultaAntParto[$APa]['idantecedente'];
                $row_arrayAParto['duracion']        = $consultaAntParto[$APa]['duracion'];
                $row_arrayAParto['parto']           = $consultaAntParto[$APa]['parto'];
                $row_arrayAParto['dificultades']    = $consultaAntParto[$APa]['dificultades'];
                $row_arrayAParto['incubadora']      = $consultaAntParto[$APa]['incubadora'];
                $row_arrayAParto['talla']           = $consultaAntParto[$APa]['talla'];
                $row_arrayAParto['peso']            = $consultaAntParto[$APa]['peso'];
                array_push($return_arrAParto, $row_arrayAParto);
            }
            echo json_encode($return_arrAParto);
        }
    }

    if($opcion == "consultarAntPostnatalTO"){
        $return_arrAPostTO   = array();
        $consultaAntPostTO = $db->consultarAntPostnatalTO($idhistoria);

        if( $consultaAntPostTO != false )
        {
            for ( $APostTO = 0; $APostTO< sizeof($consultaAntPostTO); $APostTO++ )
            {
                $row_arrayAPostTO['obsrposnatal']    = $consultaAntPostTO[$APostTO]['observaciones'];
                array_push($return_arrAPostTO, $row_arrayAPostTO);
            }
            echo json_encode($return_arrAPostTO);
        }
    }




    ////// Actualizacion la informacion del informe Final

    if($opcion == "consultarInformeFinalFono"){
        $return_arr   = array();
        $consultaInformeFinal = $db->consultarInformeFinalFono($idpaciente, $idarea);

        if( $consultaInformeFinal != false )
        {
            for ( $i = 0; $i< sizeof($consultaInformeFinal); $i++ )
            {
                $idinforme = $consultaInformeFinal[$i]['idinforme'];
            }
        }else{
            $idinforme = 0;
        }
        echo $idinforme;
    }

    if($opcion == "cargarInformeFinalFono"){
        $return_arrInf   = array();
        $cargarInformeFinal = $db->consultarInformeFinalFono($idpaciente, $idarea);

        if( $cargarInformeFinal != false )
        {
            for ( $i = 0; $i< sizeof($cargarInformeFinal); $i++ )
            {
                $row_arrayInf['idinforme']          = $cargarInformeFinal[$i]['idinforme'];
                $row_arrayInf['historia']           = $cargarInformeFinal[$i]['historia'];
                $row_arrayInf['objetivo']           = $cargarInformeFinal[$i]['objetivo'];
                $row_arrayInf['metodoeval']         = $cargarInformeFinal[$i]['metodoeval'];
                $row_arrayInf['resultados']         = $cargarInformeFinal[$i]['resultados'];
                $row_arrayInf['conclusiones_idea']  = $cargarInformeFinal[$i]['conclusiones_idea'];
                $row_arrayInf['recomendaciones']    = $cargarInformeFinal[$i]['recomendaciones'];
                array_push($return_arrInf, $row_arrayInf);
            }
            echo json_encode($return_arrInf);
        }
    }

    if($opcion == "insertarInformeFinalFono"){

        $insertarInformeFinal = $db->crearInformeFinalFono($idpaciente, $idarea, $idTerapeuta);

        if ( $insertarInformeFinal ){
            echo $insertarInformeFinal;
        }else{
            $insertarInformeFinal = 0;
            echo $insertarInformeFinal;
        }
    }

    if($opcion == "actualizaInformeFinalFono")
    {
        $idpaciente                 = $_POST['idpaciente'];
        $idinforme                  = $_POST['idinforme'];
        $HistoriaObservacion        = $_POST['HistoriaObservacion'];
        $ObjEvaluacionObservacion   = $_POST['ObjEvaluacionObservacion'];
        $MetEvaluacionObservacion   = $_POST['MetEvaluacionObservacion'];
        $ResultadosObservacion      = $_POST['ResultadosObservacion'];
        $ConclusionesObservacion    = $_POST['ConclusionesObservacion'];
        $RecomendacionesObservacion = $_POST['RecomendacionesObservacion'];

        $actualizarInformeFinal = $db->actualizarInformeFinalFono($idpaciente,
            $idinforme,
            $HistoriaObservacion,
            $ObjEvaluacionObservacion,
            $MetEvaluacionObservacion,
            $ResultadosObservacion,
            $ConclusionesObservacion,
            $RecomendacionesObservacion);

        if($actualizarInformeFinal)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }



    ////////////////////////////

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

    if($opcion == "consultar")
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
    }
