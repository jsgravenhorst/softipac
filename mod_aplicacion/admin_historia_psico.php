<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("../mod_conexion/db_funciones.php");
    require_once ("../mod_aplicacion/fechaEs.php");
    
    $db = new DB_Funciones();

    $opcion         = $_POST['opcion'];
    $idpaciente     = $_POST['idpaciente'];
    $idterapeuta    = $_POST['idterapeuta'];
    $idcita         = $_POST['idcita'];
    $idarea         = $_POST['idarea'];
    $idhistoria     = $_POST['idhistoria'];

    if($opcion == "consultarhistoria"){
        $return_arr   = array();
        $consultaHistoria = $db->consultarHistoria($idpaciente, $idarea);

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
    
    if($opcion == "insertarhistoria"){
        
        $insertar = $db->crearHistoria($idpaciente, $idarea, $idterapeuta);
        
        if ( $insertar ){
            echo $insertar;
        }else{
            $insertar = 0;
            echo $insertar;
        }
    }
    
    
    /////////////////////////////////////////////     TAB Datos Generales  /////////////////////////////////////////////
    
    if($opcion == "consultardatos"){
        $return_arr     = array();
        
        $consultaDatosHistoria = $db->consultarDatosHistoria($idpaciente, $idhistoria);
        
        if( $consultaDatosHistoria != false )
        {
            for ( $i = 0; $i< sizeof($consultaDatosHistoria); $i++ )
            {
                $row_array['remitidopor']               = $consultaDatosHistoria[$i]['remitidopor'];
                $row_array['motivo']                    = $consultaDatosHistoria[$i]['motivo'];
                $row_array['ciudad']                    = $consultaDatosHistoria[$i]['ciudadresidencia'];
                $row_array['direccion']                 = $consultaDatosHistoria[$i]['direccion'];
                $row_array['informante']                = $consultaDatosHistoria[$i]['informante'];
                $row_array['pacienteLugarNacimiento']   = $consultaDatosHistoria[$i]['lugarnacimiento'];
                
                array_push($return_arr, $row_array);
            }
            echo json_encode($return_arr);
        }
    }
    
     if($opcion == "consultardatosInf"){

        $return_arr  = array();

        $consultaDatosInf = $db->consultarDatosInf($idpaciente);

        if( $consultaDatosInf != false )
        {
            for ( $i = 0; $i< sizeof($consultaDatosInf); $i++ )
            {
                $row_array['lugarnacimiento']  = $consultaDatosInf[$i]['lugarnacimiento'];
                $row_array['informante']       = $consultaDatosInf[$i]['informante'];

                array_push($return_arr, $row_array);
            }
            echo json_encode($return_arr);
        }
    }
    
    
    if($opcion == "insertarconstitucion"){
        
        $nombresConstitucion    = $_POST['nombresConstitucion'];
        $apellidosConstitucion  = $_POST['apellidosConstitucion'];
        $edadConstitucion       = $_POST['edadConstitucion'];
        $acudienteIdParentesco  = $_POST['acudienteIdParentesco'];
        $ocupacionConstitucion  = $_POST['ocupacionConstitucion'];
        
        $insertarConstitucion = $db->insertarConstitucion($idpaciente,
                                                        $nombresConstitucion,
                                                        $apellidosConstitucion,
                                                        $edadConstitucion,
                                                        $acudienteIdParentesco,
                                                        $ocupacionConstitucion);
        
        if ( $insertarConstitucion ){
            echo "success";
        }else{
            echo "error";
        }
    }
    
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

                $dataConst .= '<div class="col-md-2">
                                <div class="form-group">
                                    <label id=>'.$parentesco.'</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>'.$nombres.' '.$primerapellido.'</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>'.$edad.'</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>'.$ocupacion.'</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Vive en la casa?</label>
                                    <input onclick="cambiarConstitucion('.$idusuario.')" '.$disabled.' name="CkConst'.$idusuario.'" id="CkConst'.$idusuario.'" type="checkbox" value="'.$idusuario.'" '.$checked.'>
                                </div>
                            </div>';
            }
            
        }
        
        echo"$dataConst";
    }
    
    
    if($opcion == "actualizarconstitucion")
    {
        $valor = $_POST['valor'];
        $actualizar = $db->actualizarConstitucion($idpaciente, $valor);
        
        if($actualizar)
        {
            echo "success";
        }else
        {
            echo "error";
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
    
    /////////////////////////////////////////////     TAB Consulta  /////////////////////////////////////////////
    
    if($opcion == "consultarmotivo"){
        $return_arrmo   = array();
        $consultaMotivo = $db->consultarMotivo($idpaciente, $idhistoria);
        
        if( $consultaMotivo != false )
        {
            for ( $mo = 0; $mo< sizeof($consultaMotivo); $mo++ )
            {
                $row_arraymo['motivoConsulta']        = $consultaMotivo[$mo]['motivoconsulta'];
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
    
    if($opcion == "consultarDiagnosticoPrevio"){
        $return_arrDiagPrevio   = array();
        $consultaDiagPrevio = $db->consultarDiagnosticoPrevio($idpaciente, $idhistoria);
        
        if( $consultaDiagPrevio != false )
        {
            for ( $dp = 0; $dp< sizeof($consultaDiagPrevio); $dp++ )
            {
                $row_arraydp['diagnosticos']        = $consultaDiagPrevio[$dp]['diagnostico'];
                array_push($return_arrDiagPrevio, $row_arraydp);
            }
            echo json_encode($return_arrDiagPrevio);
        }
    }
    
    if($opcion == "consultaAnteDif"){
        $return_arrAnteDif   = array();
        $consultaAnteDif = $db->consultarAnteDif($idpaciente, $idhistoria);
        
        if( $consultaAnteDif != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAnteDif); $ad++ )
            {
                $row_arrayad['idantecedente']   = $consultaAnteDif[$ad]['idantecedente'];
                $row_arrayad['edadIniDif']      = $consultaAnteDif[$ad]['edad_ini_dif'];
                $row_arrayad['porqueante']      = $consultaAnteDif[$ad]['porqueante'];
                $row_arrayad['otrasConductas']  = $consultaAnteDif[$ad]['otrascondrep'];
                array_push($return_arrAnteDif, $row_arrayad);
            }
            echo json_encode($return_arrAnteDif);
        }
    }
    
    if($opcion == "insertarTratamiento"){
        
        $idhistoria                     = $_POST['idhistoriatrat'];
        $tratamientoProblemaInstitucion = $_POST['tratamientoProblemaInstitucion'];
        $tratamientoProblemaProfesion   = $_POST['tratamientoProblemaProfesion'];
        $tratamientoProblemaTiempo      = $_POST['tratamientoProblemaTiempo'];
        $tratamientoProblemaEdad        = $_POST['tratamientoProblemaEdad'];
        $tratamientoProblemaDuracion    = $_POST['tratamientoProblemaDuracion'];
        $tratamientoProblemaResultados  = $_POST['tratamientoProblemaResultados'];

        $insertarTratamientos = $db->insertarTratamientos($idhistoria,
                                                            $tratamientoProblemaInstitucion,
                                                            $tratamientoProblemaProfesion,
                                                            $tratamientoProblemaTiempo,
                                                            $tratamientoProblemaEdad,
                                                            $tratamientoProblemaDuracion,
                                                            $tratamientoProblemaResultados);
        
        if ( $insertarTratamientos ){
            echo "success";
        }else{
            echo "error";
        }
    }
    
    
    if($opcion == "consultarTratamientos"){
        
        $dataTrat = "";
        
        $consultarTratamientos = $db->consultarTratamientos($idhistoria);

        if( $consultarTratamientos != false )
        {
            for ( $i = 0; $i< sizeof($consultarTratamientos); $i++ )
            {
                $idtratamiento          = $consultarTratamientos[$i]['idtratamiento'];
                $instituciontratamiento = $consultarTratamientos[$i]['institucion'];
                $profesiontratamiento   = $consultarTratamientos[$i]['profesion'];
                $tiempotratamiento      = $consultarTratamientos[$i]['tiempo'];
                $edadtratamiento        = $consultarTratamientos[$i]['edad'];
                $duraciontratamiento    = $consultarTratamientos[$i]['duracion'];
                $resultadostratamiento  = $consultarTratamientos[$i]['resultados'];

                $dataTrat .= '<div class="col-md-3">
                                    <div class="form-group">
                                        <label>INSTITUCI&Oacute;N</label>
                                        <input type="text" class="form-control" value="'.$instituciontratamiento.'">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PROFESI&Oacute;N</label>
                                        <input type="text" class="form-control" value="'.$profesiontratamiento.'">
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>TIEMPO</label>
                                        <input type="text" class="form-control" value="'.$tiempotratamiento.'">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>EDAD INICIO</label>
                                        <input type="text" class="form-control" value="'.$edadtratamiento.'">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>DURACI&Oacute;N</label>
                                        <input type="text" class="form-control" value="'.$duraciontratamiento.'">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>RESULTADOS</label>
                                        <textarea class="form-control" rows="3">'.$resultadostratamiento.'</textarea>
                                    </div>
                                </div>';
            }
            
        }
        
        echo"$dataTrat";
    }
    
    
    if($opcion == "consultarTratamientosUsuario"){
        
        $dataTrat = "";
        
        $consultarTratamientosUsuario = $db->consultarTratamientosUsuario($idpaciente);

        if( $consultarTratamientosUsuario != false )
        {
            for ( $i = 0; $i< sizeof($consultarTratamientosUsuario); $i++ )
            {
                $idtratamiento          = $consultarTratamientosUsuario[$i]['idtratamiento'];
                $instituciontratamiento = $consultarTratamientosUsuario[$i]['institucion'];
                $profesiontratamiento   = $consultarTratamientosUsuario[$i]['profesion'];
                $tiempotratamiento      = $consultarTratamientosUsuario[$i]['tiempo'];
                $edadtratamiento        = $consultarTratamientosUsuario[$i]['edad'];
                $duraciontratamiento    = $consultarTratamientosUsuario[$i]['duracion'];
                $resultadostratamiento  = $consultarTratamientosUsuario[$i]['resultados'];

                $dataTrat .= '<div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>INSTITUCI&Oacute;N</b> &nbsp;</label>
                                        <label>'.$instituciontratamiento.'</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>PROFESI&Oacute;N</b> &nbsp;</label>
                                        <label>'.$profesiontratamiento.'</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>TIEMPO</b> &nbsp;</label>
                                        <label>'.$tiempotratamiento.'</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>EDAD INICIO</b> &nbsp;</label>
                                        <label>'.$edadtratamiento.'</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>DURACI&Oacute;N</b> &nbsp;</label>
                                        <label>'.$duraciontratamiento.'</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>RESULTADOS</b> &nbsp;</label>
                                        <label>'.$resultadostratamiento.'</label>
                                        <br>
                                        <hr>
                                    </div>
                                </div>';
            }
            
        }
        
        echo"$dataTrat";
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
    
    if($opcion == "consultarAntPrenatal"){
        $return_arrAP   = array();
        $consultaAntPrenatal = $db->consultarAntPrenatal($idpaciente, $idhistoria);
        
        if( $consultaAntPrenatal != false )
        {
            for ( $AP = 0; $AP< sizeof($consultaAntPrenatal); $AP++ )
            {
                $row_arrayAP['idantecedente']   = $consultaAntPrenatal[$AP]['idantecedente'];
                $row_arrayAP['embarazodeseado'] = $consultaAntPrenatal[$AP]['embarazodeseado'];
                $row_arrayAP['anticonceptivos'] = $consultaAntPrenatal[$AP]['anticonceptivos'];
                $row_arrayAP['abortivas']       = $consultaAntPrenatal[$AP]['abortivas'];
                $row_arrayAP['adoptado']        = $consultaAntPrenatal[$AP]['adoptado'];
                $row_arrayAP['actitudembarazo'] = $consultaAntPrenatal[$AP]['actitudembarazo'];
                $row_arrayAP['consgpadres']     = $consultaAntPrenatal[$AP]['consgpadres'];
                $row_arrayAP['enfinfecciosas']  = $consultaAntPrenatal[$AP]['enfinfecciosas'];
                $row_arrayAP['enferuptivas']    = $consultaAntPrenatal[$AP]['enferuptivas'];
                $row_arrayAP['enfotras']        = $consultaAntPrenatal[$AP]['enfotras'];
                $row_arrayAP['dftcemocionales'] = $consultaAntPrenatal[$AP]['dftcemocionales'];
                $row_arrayAP['controlmedico']   = $consultaAntPrenatal[$AP]['controlmedico'];
                $row_arrayAP['rayosx']          = $consultaAntPrenatal[$AP]['rayosx'];
                $row_arrayAP['ecografias']      = $consultaAntPrenatal[$AP]['ecografias'];

                array_push($return_arrAP, $row_arrayAP);
            }
            echo json_encode($return_arrAP);
        }
    }
    
    
    if($opcion == "consultarAntParto"){
        $return_arrAParto   = array();
        $consultaAntParto = $db->consultarAntParto($idpaciente, $idhistoria);
        
        if( $consultaAntParto != false )
        {
            for ( $APa = 0; $APa< sizeof($consultaAntParto); $APa++ )
            {
                $row_arrayAParto['idantecedente']   = $consultaAntParto[$APa]['idantecedente'];
                $row_arrayAParto['duracion']        = $consultaAntParto[$APa]['duracion'];
                $row_arrayAParto['parto']           = $consultaAntParto[$APa]['parto'];
                $row_arrayAParto['inducido']        = $consultaAntParto[$APa]['inducido'];
                $row_arrayAParto['lugar']           = $consultaAntParto[$APa]['lugar'];
                $row_arrayAParto['atendidopor']     = $consultaAntParto[$APa]['atendidopor'];
                $row_arrayAParto['dificultades']    = $consultaAntParto[$APa]['dificultades'];
                $row_arrayAParto['incubadora']      = $consultaAntParto[$APa]['incubadora'];
                $row_arrayAParto['defectoscong']    = $consultaAntParto[$APa]['defectoscong'];
                $row_arrayAParto['talla']           = $consultaAntParto[$APa]['talla'];
                $row_arrayAParto['peso']            = $consultaAntParto[$APa]['peso'];
                $row_arrayAParto['observaciones']   = $consultaAntParto[$APa]['observaciones'];

                array_push($return_arrAParto, $row_arrayAParto);
            }
            echo json_encode($return_arrAParto);
        }
    }
    
    ////// Actualizar Tab Antecedentes

    if($opcion == "actualizaTabAntecedentes")
    {
        $idhist             = $_POST['idhist'];
        $idantecedente2     = $_POST['idantecedente2'];
        $lineamaterna       = $_POST['lineamaterna'];
        $lineapaterna       = $_POST['lineapaterna'];
        $idantecedente3     = $_POST['idantecedente3'];
        $embarazodeseado    = $_POST['embarazodeseado'];
        $anticonceptivos    = $_POST['anticonceptivos'];
        $abortivas          = $_POST['abortivas'];
        $adoptado           = $_POST['adoptado'];
        $actitudembarazo    = $_POST['actitudembarazo'];
        $consgpadres        = $_POST['consgpadres'];
        $enfinfecciosas     = $_POST['enfinfecciosas'];
        $enferuptivas       = $_POST['enferuptivas'];
        $enfotras           = $_POST['enfotras'];
        $dftcemocionales    = $_POST['dftcemocionales'];
        $controlmedico      = $_POST['controlmedico'];
        $rayosx             = $_POST['rayosx'];
        $ecografias         = $_POST['ecografias'];
        $idantecedente4     = $_POST['idantecedente4'];
        $duracion           = $_POST['duracion'];
        $parto              = $_POST['parto'];
        $inducido           = $_POST['inducido'];
        $lugar              = $_POST['lugar'];
        $atendidopor        = $_POST['atendidopor'];
        $dificultades       = $_POST['dificultades'];
        $incubadora         = $_POST['incubadora'];
        $defectoscong       = $_POST['defectoscong'];
        $talla              = $_POST['talla'];
        $peso               = $_POST['peso'];
        $observacionesParto = $_POST['observacionesParto'];

        $actualizaTabAntecedentes = $db->actualizaTabAntecedentes($idhist,
                                                                    $idantecedente2,
                                                                    $lineamaterna,
                                                                    $lineapaterna,
                                                                    $idantecedente3,
                                                                    $embarazodeseado,
                                                                    $anticonceptivos,
                                                                    $abortivas,
                                                                    $adoptado,
                                                                    $actitudembarazo,
                                                                    $consgpadres,
                                                                    $enfinfecciosas,
                                                                    $enferuptivas,
                                                                    $enfotras,
                                                                    $dftcemocionales,
                                                                    $controlmedico,
                                                                    $rayosx,
                                                                    $ecografias,
                                                                    $idantecedente4,
                                                                    $duracion,
                                                                    $parto,
                                                                    $inducido,
                                                                    $lugar,
                                                                    $atendidopor,
                                                                    $dificultades,
                                                                    $incubadora,
                                                                    $defectoscong,
                                                                    $talla,
                                                                    $peso,
                                                                    $observacionesParto);

        if($actualizaTabAntecedentes)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }



/////////////////////////////////////////////     TAB Postnatales  /////////////////////////////////////////////
    
    if($opcion == "consultarAntPostnatal"){
        $return_arrPo   = array();
        $consultaAntPostnatal = $db->consultarAntPostnatal($idpaciente, $idhistoria);
        
        if( $consultaAntPostnatal != false )
        {
            for ( $PO = 0; $PO< sizeof($consultaAntPostnatal); $PO++ )
            {
                $row_arrayPO['idantecedente']       = $consultaAntPostnatal[$PO]['idantecedente'];
                $row_arrayPO['enfposnatal']         = $consultaAntPostnatal[$PO]['enfposnatal'];
                $row_arrayPO['alergiasposnatal']    = $consultaAntPostnatal[$PO]['alergiasposnatal'];
                $row_arrayPO['convulsiones']        = $consultaAntPostnatal[$PO]['convulsiones'];
                $row_arrayPO['cardiacos']           = $consultaAntPostnatal[$PO]['cardiacos'];
                $row_arrayPO['respiratorios']       = $consultaAntPostnatal[$PO]['respiratorios'];
                $row_arrayPO['eruptivaposnatal']    = $consultaAntPostnatal[$PO]['eruptivaposnatal'];
                $row_arrayPO['vacunas']             = $consultaAntPostnatal[$PO]['vacunas'];
                $row_arrayPO['eeg']                 = $consultaAntPostnatal[$PO]['eeg'];
                $row_arrayPO['tomoaxcomp']          = $consultaAntPostnatal[$PO]['tomoaxcomp'];
                $row_arrayPO['potenevocauditivos']  = $consultaAntPostnatal[$PO]['potenevocauditivos'];
                $row_arrayPO['neurologo']           = $consultaAntPostnatal[$PO]['neurologo'];
                $row_arrayPO['otrosprofesionales']  = $consultaAntPostnatal[$PO]['otrosprofesionales'];
                
                array_push($return_arrPo, $row_arrayPO);
            }
            echo json_encode($return_arrPo);
        }
    }


    if($opcion == "consultarDesarrollo"){
        $return_arrDllo   = array();
        $consultaDesarrollo = $db->consultarDesarrollo($idpaciente, $idhistoria);
        
        if( $consultaDesarrollo != false )
        {
            for ( $Dllo = 0; $Dllo< sizeof($consultaDesarrollo); $Dllo++ )
            {
                $row_arrayDllo['iddesarrollo']        = $consultaDesarrollo[$Dllo]['iddesarrollo'];
                if($Dllo == 0){
                   $row_arrayDllo['seleccionMaterna'] = $consultaDesarrollo[$Dllo]['seleccion'];
                    $row_arrayDllo['desdeMaterna']    = $consultaDesarrollo[$Dllo]['desde'];
                    $row_arrayDllo['hastaMaterna']    = $consultaDesarrollo[$Dllo]['hasta']; 
                }
                if($Dllo == 1){
                   $row_arrayDllo['seleccionTetero'] = $consultaDesarrollo[$Dllo]['seleccion'];
                    $row_arrayDllo['desdeTetero']    = $consultaDesarrollo[$Dllo]['desde'];
                    $row_arrayDllo['hastaTetero']    = $consultaDesarrollo[$Dllo]['hasta']; 
                }
                $row_arrayDllo['difgenpaciente']     = $consultaDesarrollo[$Dllo]['difgenpaciente'];
                
                array_push($return_arrDllo, $row_arrayDllo);
            }
            echo json_encode($return_arrDllo);
        }
    }
    
    
    if($opcion == "consultarEleAlim"){
        $return_arrEleAlim   = array();
        $consultaEleAlim = $db->consultarEleAlim($idpaciente, $idhistoria);
        
        if( $consultaEleAlim != false )
        {
            for ( $EleAlim = 0; $EleAlim< sizeof($consultaEleAlim); $EleAlim++ )
            {
                $row_arrayEleAlim['iddesarrollo']   = $consultaEleAlim[$EleAlim]['desarrollo_iddesarrollo'];
                $utensilio                          = $consultaEleAlim[$EleAlim]['utensilio_idutensilio'];
                if($utensilio == 1){
                   $row_arrayEleAlim['cuchara']     = $consultaEleAlim[$EleAlim]['dependencia_iddependencia'];
                }
                if($utensilio == 2){
                   $row_arrayEleAlim['tenedor']     = $consultaEleAlim[$EleAlim]['dependencia_iddependencia'];
                }
                if($utensilio == 3){
                   $row_arrayEleAlim['cuchillo']    = $consultaEleAlim[$EleAlim]['dependencia_iddependencia'];
                }
                if($utensilio == 4){
                   $row_arrayEleAlim['vaso']        = $consultaEleAlim[$EleAlim]['dependencia_iddependencia'];
                }
                if($utensilio == 5){
                   $row_arrayEleAlim['pitillo']     = $consultaEleAlim[$EleAlim]['dependencia_iddependencia'];
                }
                
                array_push($return_arrEleAlim, $row_arrayEleAlim);
            }
            echo json_encode($return_arrEleAlim);
        }
    }
    
    if($opcion == "consultarDifComida"){
        $return_arrComida   = array();
        $consultaDifComida = $db->consultarDifComida($idpaciente, $idhistoria);
        
        if( $consultaDifComida != false )
        {
            for ( $Co = 0; $Co< sizeof($consultaDifComida); $Co++ )
            {
                $row_arrayComida['iddesarrollo']            = $consultaDifComida[$Co]['iddesarrollo'];
                $iddificultad                               = $consultaDifComida[$Co]['iddificultad'];
                if($iddificultad == 1){
                   $row_arrayComida['cogerla']              = $consultaDifComida[$Co]['seleccion'];
                }
                if($iddificultad == 2){
                   $row_arrayComida['robarla']              = $consultaDifComida[$Co]['seleccion'];
                }
                if($iddificultad == 3){
                   $row_arrayComida['derramar']             = $consultaDifComida[$Co]['seleccion'];
                }
                if($iddificultad == 4){
                   $row_arrayComida['sobreselectividad']    = $consultaDifComida[$Co]['seleccion'];
                }
                if($iddificultad == 5){
                   $row_arrayComida['lugarcomida']          = $consultaDifComida[$Co]['seleccion'];
                }
                $row_arrayComida['horario']                 = $consultaDifComida[$Co]['horario'];
                $row_arrayComida['obsrdifcomida']           = $consultaDifComida[$Co]['obsrdifcomida'];
                $row_arrayComida['dondecomida']             = $consultaDifComida[$Co]['donde'];
                
                array_push($return_arrComida, $row_arrayComida);
            }
            echo json_encode($return_arrComida);
        }
    }


////// Actualizar Tab Postnatal

    if($opcion == "actualizaTabPostnatal")
    {
        $idhist             = $_POST['idhist'];
        $idantecedente5     = $_POST['idantecedente5'];
        $enfposnatal        = $_POST['enfposnatal'];
        $alergiasposnatal   = $_POST['alergiasposnatal'];
        $convulsiones       = $_POST['convulsiones'];
        $cardiacos          = $_POST['cardiacos'];
        $respiratorios      = $_POST['respiratorios'];
        $eruptivaposnatal   = $_POST['eruptivaposnatal'];
        $vacunas            = $_POST['vacunas'];
        $eeg                = $_POST['eeg'];
        $tomoaxcomp         = $_POST['tomoaxcomp'];
        $potenevocauditivos = $_POST['potenevocauditivos'];
        $neurologo          = $_POST['neurologo'];
        $otrosprofesionales = $_POST['otrosprofesionales'];
        
        $iddesarrollo1      = $_POST['iddesarrollo1'];
        $seleccionMaterna   = $_POST['seleccionMaterna'];
        $desdeMaterna       = $_POST['desdeMaterna'];
        $hastaMaterna       = $_POST['hastaMaterna'];
        $seleccionTetero    = $_POST['seleccionTetero'];
        $desdeTetero        = $_POST['desdeTetero'];
        $hastaTetero        = $_POST['hastaTetero'];
        $difgenpaciente     = $_POST['difgenpaciente'];
        
        $iddesarrollo2      = $_POST['iddesarrollo2'];
        $cuchara            = $_POST['cuchara'];
        $tenedor            = $_POST['tenedor'];
        $cuchillo           = $_POST['cuchillo'];
        $vaso               = $_POST['vaso'];
        $pitillo            = $_POST['pitillo'];
        
        $iddesarrollo3      = $_POST['iddesarrollo3'];
        $cogerla            = $_POST['cogerla'];
        $robarla            = $_POST['robarla'];
        $derramar           = $_POST['derramar'];
        $sobreselectividad  = $_POST['sobreselectividad'];
        $obsrdifcomida      = $_POST['obsrdifcomida'];
        $horario            = $_POST['horario'];
        $lugarcomida        = $_POST['lugarcomida'];
        $dondecomida        = $_POST['dondecomida'];

        $actualizaTabPostnatal = $db->actualizaTabPostnatal($idhist,
                                                            $idantecedente5,
                                                            $enfposnatal,
                                                            $alergiasposnatal,
                                                            $convulsiones,
                                                            $cardiacos,
                                                            $respiratorios,
                                                            $eruptivaposnatal,
                                                            $vacunas,
                                                            $eeg,
                                                            $tomoaxcomp,
                                                            $potenevocauditivos,
                                                            $neurologo,
                                                            $otrosprofesionales,
                                                            $iddesarrollo1,
                                                            $seleccionMaterna,
                                                            $desdeMaterna,
                                                            $hastaMaterna,
                                                            $seleccionTetero,
                                                            $desdeTetero,
                                                            $hastaTetero,
                                                            $difgenpaciente,
                                                            $iddesarrollo2,
                                                            $cuchara,
                                                            $tenedor,
                                                            $cuchillo,
                                                            $vaso,
                                                            $pitillo,
                                                            $iddesarrollo3,
                                                            $cogerla,
                                                            $robarla,
                                                            $derramar,
                                                            $sobreselectividad,
                                                            $obsrdifcomida,
                                                            $horario,
                                                            $lugarcomida,
                                                            $dondecomida);

        if($actualizaTabPostnatal)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }


/////////////////////////////////////////////     TAB Lenguaje  /////////////////////////////////////////////
    
    if($opcion == "consultarDllolenguaje"){
        $return_arrDL   = array();
        
        $consultaDllolenguaje = $db->consultarDllolenguaje($idpaciente, $idhistoria);
        
        if( $consultaDllolenguaje != false )
        {
            for ( $DL = 0; $DL< sizeof($consultaDllolenguaje); $DL++ )
            {
                $row_arrayDL['iddesarrollo']            = $consultaDllolenguaje[$DL]['iddesarrollo'];
                $idfrase                                = $consultaDllolenguaje[$DL]['idfrase'];
                if($idfrase == 1){
                    $row_arrayDL['balbuceo']            = $consultaDllolenguaje[$DL]['seleccion'];
                    $row_arrayDL['edadbalbuceo']        = $consultaDllolenguaje[$DL]['edad'];
                    $row_arrayDL['observacionbalbuceo'] = $consultaDllolenguaje[$DL]['observaciones'];
                }
                if($idfrase == 2){
                    $row_arrayDL['palabras']            = $consultaDllolenguaje[$DL]['seleccion'];
                    $row_arrayDL['edadpalabras']        = $consultaDllolenguaje[$DL]['edad'];
                    $row_arrayDL['observacionpalabras'] = $consultaDllolenguaje[$DL]['observaciones'];
                }
                if($idfrase == 3){
                    $row_arrayDL['frases']              = $consultaDllolenguaje[$DL]['seleccion'];
                    $row_arrayDL['edadfrases']          = $consultaDllolenguaje[$DL]['edad'];
                    $row_arrayDL['observacionfrases']   = $consultaDllolenguaje[$DL]['observaciones'];
                }
                $row_arrayDL['expdesea']                = $consultaDllolenguaje[$DL]['expdesea'];
                $row_arrayDL['nombraobjetos']           = $consultaDllolenguaje[$DL]['nombraobjetos'];
                $row_arrayDL['claridadhablar']          = $consultaDllolenguaje[$DL]['claridadhablar'];
                $row_arrayDL['narrahechos']             = $consultaDllolenguaje[$DL]['narrahechos'];
                $row_arrayDL['senalaobjetos']           = $consultaDllolenguaje[$DL]['senalaobjetos'];
                $row_arrayDL['buscaobjetos']            = $consultaDllolenguaje[$DL]['buscaobjetos'];
                $row_arrayDL['primerapersona']          = $consultaDllolenguaje[$DL]['primerapersona'];
                $row_arrayDL['respreguntas']            = $consultaDllolenguaje[$DL]['respreguntas'];
                $row_arrayDL['hacepreguntas']           = $consultaDllolenguaje[$DL]['hacepreguntas'];
                $row_arrayDL['dialoga']                 = $consultaDllolenguaje[$DL]['dialoga'];
                $row_arrayDL['diflenguaje']             = $consultaDllolenguaje[$DL]['diflenguaje'];
                
                array_push($return_arrDL, $row_arrayDL);
            }
            echo json_encode($return_arrDL);
        }
    }
    
    
    if($opcion == "consultarDifHabla"){
        $return_arrDH   = array();
        $consultaDifHabla = $db->consultarDifHabla($idpaciente, $idhistoria);
        
        if( $consultaDifHabla != false )
        {
            for ( $DH = 0; $DH< sizeof($consultaDifHabla); $DH++ )
            {
                $row_arrayDH['iddesarrollo']    = $consultaDifHabla[$DH]['iddesarrollo'];
                $row_arrayDH['ecolalia']        = $consultaDifHabla[$DH]['ecolalia'];
                $row_arrayDH['obsrdifhabla']    = $consultaDifHabla[$DH]['obsrdifhabla'];
                $row_arrayDH['sondifhabla']     = $consultaDifHabla[$DH]['sondifhabla'];
                $row_arrayDH['preservdifhabla'] = $consultaDifHabla[$DH]['preservdifhabla'];
                $row_arrayDH['gritosdifhabla']  = $consultaDifHabla[$DH]['gritosdifhabla'];
                $row_arrayDH['tonofindifhabla'] = $consultaDifHabla[$DH]['tonofindifhabla'];
                
                array_push($return_arrDH, $row_arrayDH);
            }
            echo json_encode($return_arrDH);
        }
    }
    
    
    if($opcion == "consultarComNoVerbal"){
        $return_arrNV   = array();
        $consultaComNoVerbal = $db->consultarComNoVerbal($idpaciente, $idhistoria);
        
        if( $consultaComNoVerbal != false )
        {
            for ( $NV = 0; $NV< sizeof($consultaComNoVerbal); $NV++ )
            {
                $row_arrayNV['iddesarrollo']    = $consultaComNoVerbal[$NV]['iddesarrollo'];
                $row_arrayNV['entiendegestos']  = $consultaComNoVerbal[$NV]['entiendegestos'];
                $row_arrayNV['utilizagestos']   = $consultaComNoVerbal[$NV]['utilizagestos'];
                $row_arrayNV['utilizasenal']    = $consultaComNoVerbal[$NV]['utilizasenal'];
                
                array_push($return_arrNV, $row_arrayNV);
            }
            echo json_encode($return_arrNV);
        }
    }
    
    
    
    ////// Actualizar Tab Lenguaje

    if($opcion == "actualizaTabLenguaje")
    {
        $idhist                 = $_POST['idhist'];
        $iddesarrollo4          = $_POST['iddesarrollo4'];
        $balbuceo               = $_POST['balbuceo'];
        $edadbalbuceo           = $_POST['edadbalbuceo'];
        $observacionbalbuceo    = $_POST['observacionbalbuceo'];
        $palabras               = $_POST['palabras'];
        $edadpalabras           = $_POST['edadpalabras'];
        $observacionpalabras    = $_POST['observacionpalabras'];
        $frases                 = $_POST['frases'];
        $edadfrases             = $_POST['edadfrases'];
        $observacionfrases      = $_POST['observacionfrases'];
        $expdesea               = $_POST['expdesea'];
        $nombraobjetos          = $_POST['nombraobjetos'];
        $claridadhablar         = $_POST['claridadhablar'];
        $narrahechos            = $_POST['narrahechos'];
        $senalaobjetos          = $_POST['senalaobjetos'];
        $buscaobjetos           = $_POST['buscaobjetos'];
        $primerapersona         = $_POST['primerapersona'];
        $respreguntas           = $_POST['respreguntas'];
        $hacepreguntas          = $_POST['hacepreguntas'];
        $dialoga                = $_POST['dialoga'];
        $diflenguaje            = $_POST['diflenguaje'];
        
        $iddesarrollo5          = $_POST['iddesarrollo5'];
        $ecolalia               = $_POST['ecolalia'];
        $obsrdifhabla           = $_POST['obsrdifhabla'];
        $sondifhabla            = $_POST['sondifhabla'];
        $preservdifhabla        = $_POST['preservdifhabla'];
        $gritosdifhabla         = $_POST['gritosdifhabla'];
        $tonofindifhabla        = $_POST['tonofindifhabla'];
        
        $iddesarrollo6          = $_POST['iddesarrollo6'];
        $entiendegestos         = $_POST['entiendegestos'];
        $utilizagestos          = $_POST['utilizagestos'];
        $utilizasenal           = $_POST['utilizasenal'];

        $actualizaTabLenguaje = $db->actualizaTabLenguaje($idhist,
                                                        $iddesarrollo4,
                                                        $balbuceo,
                                                        $edadbalbuceo,
                                                        $observacionbalbuceo,
                                                        $palabras,
                                                        $edadpalabras,
                                                        $observacionpalabras,
                                                        $frases,
                                                        $edadfrases,
                                                        $observacionfrases,
                                                        $expdesea,
                                                        $nombraobjetos,
                                                        $claridadhablar,
                                                        $narrahechos,
                                                        $senalaobjetos,
                                                        $buscaobjetos,
                                                        $primerapersona,
                                                        $respreguntas,
                                                        $hacepreguntas,
                                                        $dialoga,
                                                        $diflenguaje,
                                                        $iddesarrollo5,
                                                        $ecolalia,
                                                        $obsrdifhabla,
                                                        $sondifhabla,
                                                        $preservdifhabla,
                                                        $gritosdifhabla,
                                                        $tonofindifhabla,
                                                        $iddesarrollo6,
                                                        $entiendegestos,
                                                        $utilizagestos,
                                                        $utilizasenal);

        if($actualizaTabLenguaje)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }


/////////////////////////////////////////////     TAB Emocional  /////////////////////////////////////////////

    if($opcion == "consultarDlloSoEmocional"){
        $return_arrEmo   = array();
        
        $consultaDlloSoEmocional = $db->consultarDlloSoEmocional($idpaciente, $idhistoria);
        
        if( $consultaDlloSoEmocional != false )
        {
            for ( $Emo = 0; $Emo< sizeof($consultaDlloSoEmocional); $Emo++ )
            {
                $row_arrayEmo['iddesarrollo']       = $consultaDlloSoEmocional[$Emo]['iddesarrollo'];
                $row_arrayEmo['primerasonrisa']     = $consultaDlloSoEmocional[$Emo]['primerasonrisa'];
                $row_arrayEmo['levantabrazos']      = $consultaDlloSoEmocional[$Emo]['levantabrazos'];
                $row_arrayEmo['llantoporaus']       = $consultaDlloSoEmocional[$Emo]['llantoporaus'];
                $row_arrayEmo['reconvoces']         = $consultaDlloSoEmocional[$Emo]['reconvoces'];
                $row_arrayEmo['otros']              = $consultaDlloSoEmocional[$Emo]['otros'];
                $row_arrayEmo['contvisualesp']      = $consultaDlloSoEmocional[$Emo]['contvisualesp'];
                $row_arrayEmo['contdemanda']        = $consultaDlloSoEmocional[$Emo]['contdemanda'];
                $row_arrayEmo['buscaconsfamlia']    = $consultaDlloSoEmocional[$Emo]['buscaconsfamlia'];
                $row_arrayEmo['resptaemociones']    = $consultaDlloSoEmocional[$Emo]['resptaemociones'];
                $row_arrayEmo['risasinmotivo']      = $consultaDlloSoEmocional[$Emo]['risasinmotivo'];
                $row_arrayEmo['llantosinmotivo']    = $consultaDlloSoEmocional[$Emo]['llantosinmotivo'];
                $row_arrayEmo['interpares']         = $consultaDlloSoEmocional[$Emo]['interpares'];
                $row_arrayEmo['interadulto']        = $consultaDlloSoEmocional[$Emo]['interadulto'];
                $row_arrayEmo['usojuguetes']        = $consultaDlloSoEmocional[$Emo]['usojuguetes'];
                $row_arrayEmo['juegos']             = $consultaDlloSoEmocional[$Emo]['juegos'];
                $row_arrayEmo['anticipapeligros']   = $consultaDlloSoEmocional[$Emo]['anticipapeligros'];
                
                array_push($return_arrEmo, $row_arrayEmo);
            }
            echo json_encode($return_arrEmo);
        }
    }
    
    if($opcion == "consultarResistencia"){
        $return_arrRes   = array();
        
        $consultaResistencia = $db->consultarResistencia($idpaciente, $idhistoria);
        
        if( $consultaResistencia != false )
        {
            for ( $Res = 0; $Res< sizeof($consultaResistencia); $Res++ )
            {
                $row_arrayRes['iddesarrollo']       = $consultaResistencia[$Res]['iddesarrollo'];
                $row_arrayRes['cambioshorarios']    = $consultaResistencia[$Res]['cambioshorarios'];
                $row_arrayRes['cambiorutas']        = $consultaResistencia[$Res]['cambiorutas'];
                $row_arrayRes['ubicacionesp']       = $consultaResistencia[$Res]['ubicacionesp'];
                $row_arrayRes['apegoobjetos']       = $consultaResistencia[$Res]['apegoobjetos'];
                $row_arrayRes['actvrepetiivas']     = $consultaResistencia[$Res]['actvrepetiivas'];
                
                array_push($return_arrRes, $row_arrayRes);
            }
            echo json_encode($return_arrRes);
        }
    }

////// Actualizar Tab Emocional

    if($opcion == "actualizaTabEmocional")
    {
        $idhist             = $_POST['idhist'];
        $iddesarrollo7      = $_POST['iddesarrollo7'];
        $primerasonrisa     = $_POST['primerasonrisa'];
        $levantabrazos      = $_POST['levantabrazos'];
        $llantoporaus       = $_POST['llantoporaus'];
        $reconvoces         = $_POST['reconvoces'];
        $otrosemocional     = $_POST['otrosemocional'];
        $contvisualesp      = $_POST['contvisualesp'];
        $contdemanda        = $_POST['contdemanda'];
        $buscaconsfamlia    = $_POST['buscaconsfamlia'];
        $resptaemociones    = $_POST['resptaemociones'];
        $risasinmotivo      = $_POST['risasinmotivo'];
        $llantosinmotivo    = $_POST['llantosinmotivo'];
        $interpares         = $_POST['interpares'];
        $interadulto        = $_POST['interadulto'];
        $usojuguetes        = $_POST['usojuguetes'];
        $juegos             = $_POST['juegos'];
        $anticipapeligros   = $_POST['anticipapeligros'];
        
        $iddesarrollo8      = $_POST['iddesarrollo8'];
        $cambioshorarios    = $_POST['cambioshorarios'];
        $cambiorutas        = $_POST['cambiorutas'];
        $ubicacionesp       = $_POST['ubicacionesp'];
        $apegoobjetos       = $_POST['apegoobjetos'];
        $actvrepetiivas     = $_POST['actvrepetiivas'];

        $actualizaTabEmocional = $db->actualizaTabEmocional($idhist,
                                                        $iddesarrollo7,
                                                        $primerasonrisa,
                                                        $levantabrazos,
                                                        $llantoporaus,
                                                        $reconvoces,
                                                        $otrosemocional,
                                                        $contvisualesp,
                                                        $contdemanda,
                                                        $buscaconsfamlia,
                                                        $resptaemociones,
                                                        $risasinmotivo,
                                                        $llantosinmotivo,
                                                        $interpares,
                                                        $interadulto,
                                                        $usojuguetes,
                                                        $juegos,
                                                        $anticipapeligros,
                                                        $iddesarrollo8,
                                                        $cambioshorarios,
                                                        $cambiorutas,
                                                        $ubicacionesp,
                                                        $apegoobjetos,
                                                        $actvrepetiivas);

        if($actualizaTabEmocional)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }



/////////////////////////////////////////////     TAB Sensorial  /////////////////////////////////////////////

    if($opcion == "consultarAuditiva"){
        $return_arrAU   = array();
        
        $consultaAuditiva = $db->consultarAuditiva($idpaciente, $idhistoria);
        
        if( $consultaAuditiva != false )
        {
            for ( $AU = 0; $AU< sizeof($consultaAuditiva); $AU++ )
            {
                $row_arrayAU['idrespuestasensorial']    = $consultaAuditiva[$AU]['idrespuestasensorial'];
                $idestimulo                             = $consultaAuditiva[$AU]['estimulo_idestimulo'];
                if($idestimulo == 1){
                    $row_arrayAU['resptanombre']            = $consultaAuditiva[$AU]['resptanombre'];
                    $row_arrayAU['resptasonidos']           = $consultaAuditiva[$AU]['resptasonidos'];
                    $row_arrayAU['sospechasordera']         = $consultaAuditiva[$AU]['sospechasordera'];
                    $row_arrayAU['otros']                   = $consultaAuditiva[$AU]['otros'];
                }
                if($idestimulo == 2){
                    $row_arrayAU['sonidosesp']              = $consultaAuditiva[$AU]['sonidosesp'];
                    $row_arrayAU['sonidosext']              = $consultaAuditiva[$AU]['sonidosext'];
                    $row_arrayAU['tapaoidos']               = $consultaAuditiva[$AU]['tapaoidos'];
                    $row_arrayAU['golpeaobj']               = $consultaAuditiva[$AU]['golpeaobj'];
                    $row_arrayAU['audicion']                = $consultaAuditiva[$AU]['audicion'];
                    $row_arrayAU['observacionauditiva']     = $consultaAuditiva[$AU]['observaciones'];
                }
                
                array_push($return_arrAU, $row_arrayAU);
            }
            echo json_encode($return_arrAU);
        }
    }
    
    if($opcion == "consultarVisual"){
        $return_arrVI   = array();
        
        $consultarVisual = $db->consultarVisual($idpaciente, $idhistoria);
        
        if( $consultarVisual != false )
        {
            for ( $VI = 0; $VI< sizeof($consultarVisual); $VI++ )
            {
                $row_arrayVI['idrespuestasensorial']    = $consultarVisual[$VI]['idrespuestasensorial'];
                $idestimulo                             = $consultarVisual[$VI]['estimulo_idestimulo'];
                if($idestimulo == 3){
                    $row_arrayVI['orientamirada']       = $consultarVisual[$VI]['orientamirada'];
                    $row_arrayVI['buscamirada']         = $consultarVisual[$VI]['buscamirada'];
                }
                if($idestimulo == 4){
                    $row_arrayVI['giraobjetos']         = $consultarVisual[$VI]['giraobjetos'];
                    $row_arrayVI['miradaperdida']       = $consultarVisual[$VI]['miradaperdida'];
                    $row_arrayVI['reojo']               = $consultarVisual[$VI]['reojo'];
                    $row_arrayVI['acercaaleja']         = $consultarVisual[$VI]['acercaaleja'];
                    $row_arrayVI['observacionvisual']   = $consultarVisual[$VI]['observaciones'];
                }
                
                array_push($return_arrVI, $row_arrayVI);
            }
            echo json_encode($return_arrVI);
        }
    }
    
    
    if($opcion == "consutlarReceptor"){
        $return_arrREC   = array();
        
        $consutlarReceptor = $db->consutlarReceptor($idpaciente, $idhistoria);
        
        if( $consutlarReceptor != false )
        {
            for ( $REC = 0; $REC< sizeof($consutlarReceptor); $REC++ )
            {
                $row_arrayREC['idrespuestasensorial']   = $consutlarReceptor[$REC]['idrespuestasensorial'];
                $idestimulo                             = $consutlarReceptor[$REC]['estimulo_idestimulo'];
                if($idestimulo == 5){
                    $row_arrayREC['olfativo']           = $consutlarReceptor[$REC]['olfativo'];
                    $row_arrayREC['gustativo']          = $consutlarReceptor[$REC]['gustativo'];
                    $row_arrayREC['tactil']             = $consutlarReceptor[$REC]['tactil'];
                }
                if($idestimulo == 6){
                    $row_arrayREC['puntapies']          = $consutlarReceptor[$REC]['puntapies'];
                    $row_arrayREC['aleteos']            = $consutlarReceptor[$REC]['aleteos'];
                    $row_arrayREC['balanceo']           = $consutlarReceptor[$REC]['balanceo'];
                    $row_arrayREC['juegosaliva']        = $consutlarReceptor[$REC]['juegosaliva'];
                    $row_arrayREC['escupir']            = $consutlarReceptor[$REC]['escupir'];
                    $row_arrayREC['mvtoextrept']        = $consutlarReceptor[$REC]['mvtoextrept'];
                    $row_arrayREC['autoagresiones']     = $consutlarReceptor[$REC]['autoagresiones'];
                }
                
                array_push($return_arrREC, $row_arrayREC);
            }
            echo json_encode($return_arrREC);
        }
    }
    
    
    if($opcion == "consutlarSueno"){
        $return_arrSU   = array();
        
        $consutlarSueno = $db->consutlarSueno($idpaciente, $idhistoria);
        
        if( $consutlarSueno != false )
        {
            for ( $SU = 0; $SU< sizeof($consutlarSueno); $SU++ )
            {
                $row_arraySU['idrespuestasensorial']    = $consutlarSueno[$SU]['idrespuestasensorial'];
                $idestimulo                             = $consutlarSueno[$SU]['estimulo_idestimulo'];
                $row_arraySU['camaindepte']             = $consutlarSueno[$SU]['camaindepte'];
                $row_arraySU['cuartoindepte']           = $consutlarSueno[$SU]['cuartoindepte'];
                $row_arraySU['justificacion']           = $consutlarSueno[$SU]['justificacion'];
                $row_arraySU['horario']                 = $consutlarSueno[$SU]['horario'];
                $row_arraySU['difisueno']               = $consutlarSueno[$SU]['difisueno'];
                
                array_push($return_arrSU, $row_arraySU);
            }
            echo json_encode($return_arrSU);
        }
    }


////// Actualizar Tab Emocional

    if($opcion == "actualizaTabSensorial")
    {
        $idhist                 = $_POST['idhist'];
        $idrespuestasensorial   = $_POST['idrespuestasensorial'];
        $resptanombre           = $_POST['resptanombre'];
        $resptasonidos          = $_POST['resptasonidos'];
        $sospechasordera        = $_POST['sospechasordera'];
        $otrossensorial         = $_POST['otrossensorial'];
        $sonidosesp             = $_POST['sonidosesp'];
        $sonidosext             = $_POST['sonidosext'];
        $tapaoidos              = $_POST['tapaoidos'];
        $golpeaobj              = $_POST['golpeaobj'];
        $audicion               = $_POST['audicion'];
        $observacionauditiva    = $_POST['observacionauditiva'];
        
        $orientamirada          = $_POST['orientamirada'];
        $buscamirada            = $_POST['buscamirada'];
        $giraobjetos            = $_POST['giraobjetos'];
        $miradaperdida          = $_POST['miradaperdida'];
        $reojo                  = $_POST['reojo'];
        $acercaaleja            = $_POST['acercaaleja'];
        $observacionvisual      = $_POST['observacionvisual'];
        

        $olfativo               = $_POST['olfativo'];
        $gustativo              = $_POST['gustativo'];
        $tactil                 = $_POST['tactil'];
        $puntapies              = $_POST['puntapies'];
        $aleteos                = $_POST['aleteos'];
        $balanceo               = $_POST['balanceo'];
        $juegosaliva            = $_POST['juegosaliva'];
        $escupir                = $_POST['escupir'];
        $mvtoextrept            = $_POST['mvtoextrept'];
        $autoagresiones         = $_POST['autoagresiones'];
        
        $camaindepte            = $_POST['camaindepte'];
        $cuartoindepte          = $_POST['cuartoindepte'];
        $justificacion          = $_POST['justificacion'];
        $horariosueno           = $_POST['horariosueno'];
        $difisueno              = $_POST['difisueno'];

        $actualizaTabSensorial = $db->actualizaTabSensorial($idhist,
                                                            $idrespuestasensorial,
                                                            $resptanombre,
                                                            $resptasonidos,
                                                            $sospechasordera,
                                                            $otrossensorial,
                                                            $sonidosesp,
                                                            $sonidosext,
                                                            $tapaoidos,
                                                            $golpeaobj,
                                                            $audicion,
                                                            $observacionauditiva,
                                                            $orientamirada,
                                                            $buscamirada,
                                                            $giraobjetos,
                                                            $miradaperdida,
                                                            $reojo,
                                                            $acercaaleja,
                                                            $observacionvisual,
                                                            $olfativo,
                                                            $gustativo,
                                                            $tactil,
                                                            $puntapies,
                                                            $aleteos,
                                                            $balanceo,
                                                            $juegosaliva,
                                                            $escupir,
                                                            $mvtoextrept,
                                                            $autoagresiones,
                                                            $camaindepte,
                                                            $cuartoindepte,
                                                            $justificacion,
                                                            $horariosueno,
                                                            $difisueno);

        if($actualizaTabSensorial)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }


/////////////////////////////////////////////     TAB Desempeno  /////////////////////////////////////////////

    if($opcion == "consultarDesempeno"){
        $return_arrDES   = array();
        
        $consultarDesempeno = $db->consultarDesempeno($idpaciente, $idhistoria);
        
        if( $consultarDesempeno != false )
        {
            for ( $DES = 0; $DES< sizeof($consultarDesempeno); $DES++ )
            {
                $row_arrayDES['idrepertoriobasico'] = $consultarDesempeno[$DES]['idrepertoriobasico'];
                $row_arrayDES['contactovisual']     = $consultarDesempeno[$DES]['contactovisual'];
                $row_arrayDES['periodosatencion']   = $consultarDesempeno[$DES]['periodosatencion'];
                $row_arrayDES['imitacionmotora']    = $consultarDesempeno[$DES]['imitacionmotora'];
                $row_arrayDES['seguinstrucciones']  = $consultarDesempeno[$DES]['seguinstrucciones'];
                $row_arrayDES['esqcorporal']        = $consultarDesempeno[$DES]['esqcorporal'];
                
                array_push($return_arrDES, $row_arrayDES);
            }
            echo json_encode($return_arrDES);
        }
    }
    
    
    if($opcion == "consultarHigiene"){
        $return_arrHI   = array();
        
        $consultarHigiene = $db->consultarHigiene($idpaciente, $idhistoria);
        
        if( $consultarHigiene != false )
        {
            for ( $HI = 0; $HI< sizeof($consultarHigiene); $HI++ )
            {
                $idaseo                         = $consultarHigiene[$HI]['aseopersonal_idaseopersonal'];
                if($idaseo == 1){
                    $row_arrayHI['corporal']    = $consultarHigiene[$HI]['dependencia_iddependencia'];
                }
                if($idaseo == 2){
                    $row_arrayHI['cepillado']   = $consultarHigiene[$HI]['dependencia_iddependencia'];
                }
                if($idaseo == 3){
                    $row_arrayHI['manos']       = $consultarHigiene[$HI]['dependencia_iddependencia'];
                }
                if($idaseo == 4){
                    $row_arrayHI['cara']        = $consultarHigiene[$HI]['dependencia_iddependencia'];
                }
                if($idaseo == 5){
                    $row_arrayHI['peinado']     = $consultarHigiene[$HI]['dependencia_iddependencia'];
                }
                if($idaseo == 6){
                    $row_arrayHI['toalla']      = $consultarHigiene[$HI]['dependencia_iddependencia'];
                }
                
                $row_arrayHI['controlesfinter'] = $consultarHigiene[$HI]['controlesfinter'];
                
                array_push($return_arrHI, $row_arrayHI);
            }
            echo json_encode($return_arrHI);
        }
    }
    
    ////// Actualizar Tab Emocional

    if($opcion == "actualizaTabDesActual")
    {
        $idhist                 = $_POST['idhist'];
        $idrepertoriobasico     = $_POST['idrepertoriobasico'];
        $contactovisual         = $_POST['contactovisual'];
        $periodosatencion       = $_POST['periodosatencion'];
        $imitacionmotora        = $_POST['imitacionmotora'];
        $seguinstrucciones      = $_POST['seguinstrucciones'];
        $esqcorporal            = $_POST['esqcorporal'];
        
        $corporal               = $_POST['corporal'];
        $cepillado              = $_POST['cepillado'];
        $manos                  = $_POST['manos'];
        $cara                   = $_POST['cara'];
        $peinado                = $_POST['peinado'];
        $toalla                 = $_POST['toalla'];
        $controlesfinter        = $_POST['controlesfinter'];
        $observacionprenda1     = $_POST['observacionprenda1'];
        $observacionprenda2     = $_POST['observacionprenda2'];
        $observacionprenda3     = $_POST['observacionprenda3'];
        $observacionprenda4     = $_POST['observacionprenda4'];
        $observacionprenda5     = $_POST['observacionprenda5'];
        $observacionprenda6     = $_POST['observacionprenda6'];
        $observacionprenda7     = $_POST['observacionprenda7'];
        
        $amarra                 = $_POST['seleccion1'];
        $desamarra              = $_POST['seleccion2'];
        $subecierre             = $_POST['seleccion3'];
        $bajacierre             = $_POST['seleccion4'];
        $abotona                = $_POST['seleccion5'];
        $desabotona             = $_POST['seleccion6'];
        
        $observacionHabilidad1  = $_POST['observacionHabilidad1'];
        $observacionHabilidad2  = $_POST['observacionHabilidad2'];
        $observacionHabilidad3  = $_POST['observacionHabilidad3'];
        $observacionHabilidad4  = $_POST['observacionHabilidad4'];
        $observacionHabilidad5  = $_POST['observacionHabilidad5'];
        $observacionHabilidad6  = $_POST['observacionHabilidad6'];

        $actualizaTabDesActual = $db->actualizaTabDesActual($idhist,
                                                            $idrepertoriobasico,
                                                            $contactovisual,
                                                            $periodosatencion,
                                                            $imitacionmotora,
                                                            $seguinstrucciones,
                                                            $esqcorporal,
                                                            $corporal,
                                                            $cepillado,
                                                            $manos,
                                                            $cara,
                                                            $peinado,
                                                            $toalla,
                                                            $controlesfinter,
                                                            $observacionprenda1,
                                                            $observacionprenda2,
                                                            $observacionprenda3,
                                                            $observacionprenda4,
                                                            $observacionprenda5,
                                                            $observacionprenda6,
                                                            $observacionprenda7,
                                                            $amarra,
                                                            $desamarra,
                                                            $subecierre,
                                                            $bajacierre,
                                                            $abotona,
                                                            $desabotona,
                                                            $observacionHabilidad1,
                                                            $observacionHabilidad2,
                                                            $observacionHabilidad3,
                                                            $observacionHabilidad4,
                                                            $observacionHabilidad5,
                                                            $observacionHabilidad6);

        if($actualizaTabDesActual)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    ////// Consultar Prenda de Vestir
    if($opcion == "consultarPrendasVestir"){
        
        $dataPrenda = "";
        $ponerse    = "ponerse";
        $quitarse   = "quitarse";
        $checked1   = "";
        $checked2   = "";
        $count      = 1;
        $count2     = 2;
        $disabled   = $_POST['verBoton'];
        
        $consultarPrendasVestir = $db->consultarPrendasVestir($idhistoria);

        if( $consultarPrendasVestir != false )
        {
            for ( $i = 0; $i< sizeof($consultarPrendasVestir); $i++ )
            {
                $idprenda           = $consultarPrendasVestir[$i]['prenda_idprenda'];
                $prenda             = $consultarPrendasVestir[$i]['prenda'];
                $checkponerse       = $consultarPrendasVestir[$i]['ponerse'];
                $checkquitarse      = $consultarPrendasVestir[$i]['quitarse'];
                $observaciones      = $consultarPrendasVestir[$i]['Observaciones'];
                
                if($checkponerse == 'S'){
                    $checked1        = "checked";
                }else{
                    $checked1        = "";
                }

                if($checkquitarse == 'S'){
                    $checked2        = "checked";
                }else{
                    $checked2        = "";
                }

                $dataPrenda .= '<div class="col-md-2">
                                    <div class="form-group">
                                        <label>'.$prenda.'</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>'.$ponerse.'</label>
                                        <input name="check'.$count.'" id="check'.$count.'" type="checkbox" '.$disabled.' '.$checked1.' onclick="guardarPrendaVestir('.$count.',\''.$ponerse.'\','.$idprenda.')">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>'.$quitarse.'</label>
                                        <input name="check'.$count2.'" id="check'.$count2.'" type="checkbox" '.$disabled.' '.$checked2.' onclick="guardarPrendaVestir('.$count2.',\''.$quitarse.'\','.$idprenda.')">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Observaciones</label>
                                        <input name="observacionprenda'.$idprenda.'" id="observacionprenda'.$idprenda.'" type="text" class="form-control" value="'.$observaciones.'">
                                    </div>
                                </div>';
                $count = $count + 2;
                $count2 = $count2 + 2;
            }
            
        }
        
        echo"$dataPrenda";
    }
    
    
    ////// Actualizar Prenda de Vestir

    if($opcion == "actualizaPrendaVestir")
    {
        $idhist     = $_POST['idhistoria'];
        $respuesta  = $_POST['respuesta'];
        $idprenda   = $_POST['idprenda'];
        $valor      = $_POST['idvalor'];

        $actualizaPrendaVestir = $db->actualizaPrendaVestir($idhist,
                                                            $respuesta,
                                                            $idprenda,
                                                            $valor);

        if($actualizaPrendaVestir)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }


////// Consultar Habilidad Motriz
    if($opcion == "consultarHabilidadMotriz"){
        
        $dataHabilidad = "";
        
        $consultarHabilidadMotriz = $db->consultarHabilidadMotriz($idhistoria);

        if( $consultarHabilidadMotriz != false )
        {
            for ( $i = 0; $i< sizeof($consultarHabilidadMotriz); $i++ )
            {
                $idhabilidadmotriz  = $consultarHabilidadMotriz[$i]['idhabilidadmotriz'];
                $seleccion          = $consultarHabilidadMotriz[$i]['seleccion'];
                $habilidadmotriz    = $consultarHabilidadMotriz[$i]['habilidadmotriz'];
                $observaciones      = $consultarHabilidadMotriz[$i]['observaciones'];
                
                $dataHabilidad .= "<div class='col-md-3'>
                                        <div class='form-group'>
                                            <label>$habilidadmotriz</label>
                                            <select name='seleccion$idhabilidadmotriz' id='seleccion$idhabilidadmotriz' class='form-control'>
                                                <option>$seleccion</option>
                                                <option>Seleccione</option>
                                                <option value='Si'>Si</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-3'>
                                        <div class='form-group'>
                                            <label>Observaciones</label>
                                            <input name='observacionHabilidad$idhabilidadmotriz' id='observacionHabilidad$idhabilidadmotriz' type='text' class='form-control' value='$observaciones' >
                                        </div>
                                    </div>";
            }
            
        }
        
        echo"$dataHabilidad";
    }


/////////////////////////////////////////////     TAB HABILIDAD  /////////////////////////////////////////////

    if($opcion == "consultarHabilidades"){
        $return_arrHAB   = array();
        
        $consultarHabilidades = $db->consultarHabilidades($idpaciente, $idhistoria);
        
        if( $consultarHabilidades != false )
        {
            for ( $HAB = 0; $HAB< sizeof($consultarHabilidades); $HAB++ )
            {
                $row_arrayHAB['habilespeciales']    = $consultarHabilidades[$HAB]['habilespeciales'];
                $row_arrayHAB['dificultadescond']   = $consultarHabilidades[$HAB]['dificultadescond'];
                $row_arrayHAB['caractambiente']     = $consultarHabilidades[$HAB]['caractambiente'];

                array_push($return_arrHAB, $row_arrayHAB);
            }
            echo json_encode($return_arrHAB);
        }
    }


////// Actualizar Tab HABILILIDAD

if($opcion == "actualizaTabHabilidades")
    {
        $idhist             = $_POST['idhist'];
        $habilespeciales    = $_POST['habilespeciales'];
        $dificultadescond   = $_POST['dificultadescond'];
        $caractambiente     = $_POST['caractambiente'];

        $actualizaTabHabilidades = $db->actualizaTabHabilidades($idhist,
                                                                $habilespeciales,
                                                                $dificultadescond,
                                                                $caractambiente);

        if($actualizaTabHabilidades)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }


//////PRUEBA MCHAT

if($opcion == "consultaPreguntasMchat"){

        $idpaciente     = $_POST['idpaciente'];
        $idarea         = $_POST['idarea'];
        $disabled       = $_POST['disabled'];
        $datos          = "";
        $checked        = "";
        $lblcriterio    = "";
        $totalcritico   = 0;
        $totalalterado  = 0;
        $totalnormal    = 0;
        
        $consultarMchat = $db->consultarMchat($idpaciente, $idarea);
        
        if( $consultarMchat != false )
        {
            for ( $Mchat = 0; $Mchat< sizeof($consultarMchat); $Mchat++ )
            {
                $idpregunta     = $consultarMchat[$Mchat]['pregunta_idpregunta'];
                $idrespuesta    = $consultarMchat[$Mchat]['idrespuesta'];
                $idpaciente     = $consultarMchat[$Mchat]['usuario_idusuario1'];
                $pregunta       = $consultarMchat[$Mchat]['pregunta'];
                $criterio       = $consultarMchat[$Mchat]['criterio'];
                
                if($criterio == 1){
                    $checked1       = "checked";
                    $checked2       = "";
                }else if($criterio == 2){
                    $checked1       = "";
                    $checked2       = "checked";
                }else{
                    $checked1       = "";
                    $checked2       = "";
                    $lblcriterio    = "";
                }
                
                if($idpregunta == 2 || $idpregunta == 7 || $idpregunta == 9 || $idpregunta == 13 || $idpregunta == 14 || $idpregunta == 15){
                    if($checked2 == "checked"){
                        $lblcriterio = "<b>Critico</b>";
                        $totalcritico = $totalcritico + 1;
                    }else if($checked1 == "checked"){
                        $lblcriterio = "Normal";
                        $totalnormal = $totalnormal + 1;
                    }else{
                        $lblcriterio  = "";
                    }
                }else if($idpregunta == 11 || $idpregunta == 18 || $idpregunta == 20 || $idpregunta == 22){
                    if($checked2 == "checked"){
                        $lblcriterio = "Normal";
                        $totalnormal = $totalnormal + 1;
                    }else if($checked1 == "checked"){
                        $lblcriterio = "Alterado";
                        $totalalterado = $totalalterado + 1;
                    }else{
                        $lblcriterio  = "";
                    }
                }else{
                    if($checked2 == "checked"){
                        $lblcriterio = "Alterado";
                        $totalalterado = $totalalterado + 1;
                    }else if($checked1 == "checked"){
                        $lblcriterio = "Normal";
                        $totalnormal = $totalnormal + 1;
                    }else{
                        $lblcriterio = "";
                    }
                }
                

                $datos .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <label>$idpregunta. $pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' name='radio$idpregunta' $checked1 onclick='respuestaMchat($idpaciente,$idrespuesta,1)'> $nbsp$nbsp
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' name='radio$idpregunta' $checked2 onclick='respuestaMchat($idpaciente,$idrespuesta,2)'>
                                    $nbsp $lblcriterio
                                </div>
                            </div>";
            }
            $datos .= "<div class='col-md-4' style='text-align:center;'>
                            <div class='form-group'>
                                <label><b>NORMAL</b></label><br>
                                <label><b>$totalnormal</b></label>
                            </div>
                        </div>
                        <div class='col-md-4' style='text-align:center;'>
                            <div class='form-group'>
                                <label><b>ALTERADO</b></label><br>
                                <label><b>$totalalterado</b></label>
                            </div>
                        </div>
                        <div class='col-md-4' style='text-align:center;'>
                            <div class='form-group'>
                                <label><b>CRITICO</b></label><br>
                                <label><b>$totalcritico</b></label>
                            </div>
                        </div>";
            echo $datos;
        }
    }
    
    
    /// Consula conclusiones MCHAT
    if($opcion == "consultaConclusionesMchat"){

        $idpaciente     = $_POST['idpaciente'];
        $idarea         = $_POST['idarea'];
        $datos          = "";
        
        $consultarConclusionMchat = $db->consultarConclusionMchat($idpaciente, $idarea);
        
        if( $consultarConclusionMchat != false )
        {
            for ( $Mchat = 0; $Mchat< sizeof($consultarConclusionMchat); $Mchat++ )
            {
                $datos     = html_entity_decode($consultarConclusionMchat[$Mchat]['conclusion']);
            }
             echo $datos;
        }
    }
    
    
//////ACTUALIZA MCHAT


if($opcion == "actualizaPreguntasMchat")
    {
        $idpaciente = $_POST['idpaciente'];
        $idrespuesta = $_POST['idrespuesta'];
        $idoption   = $_POST['idoption'];
        $idarea     = $_POST['idarea'];

        $actualizaPreguntasMchat = $db->actualizaPreguntasMchat($idpaciente,
                                                                $idrespuesta,
                                                                $idoption,
                                                                $idarea);

        if($actualizaPreguntasMchat)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }

//////ACTUALIZA Conclusiones  MCHAT
if($opcion == "actualizaConclusionesMCHAT")
    {
        $idpaciente     = $_POST['idpaciente'];
        $conclusion     = $_POST['conclusionMCHAT'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 1;

        $actualizaConclusionesMCHAT = $db->actualizaConclusiones($idpaciente,
                                                                $conclusion,
                                                                $idarea,
                                                                $idbateria);

        if($actualizaConclusionesMCHAT)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }

///////////////////////// PRUEBA DSMV

if($opcion == "consultaPreguntasDSMV"){

        $idpaciente = $_POST['idpaciente'];
        $idarea     = $_POST['idarea'];
        $disabled   = $_POST['disabled'];
        $datos      = "";
        $checked    = "";
        $cont       = 0;
        $nro        = 0;
        $totalA     = 0;
        $totalB     = 0;
        $totalC     = 0;
        $totalD     = 0;
        $totalE     = 0;
        
        $consultarDSMV = $db->consultarDSMV($idpaciente, $idarea);
        
        if( $consultarDSMV != false )
        {
            for ( $DSMV = 0; $DSMV< sizeof($consultarDSMV); $DSMV++ )
            {
                $idpregunta     = $consultarDSMV[$DSMV]['pregunta_idpregunta'];
                $idrespuesta    = $consultarDSMV[$DSMV]['idrespuesta'];
                $idpaciente     = $consultarDSMV[$DSMV]['usuario_idusuario1'];
                $pregunta       = $consultarDSMV[$DSMV]['pregunta'];
                $tea            = $consultarDSMV[$DSMV]['tea'];
                $nombrepaciente = strtoupper($consultarDSMV[$DSMV]['nombres']);
                
                if($idpregunta == 24 || $idpregunta == 25 || $idpregunta == 26){
                    if($tea == 1){
                        $checked = "checked";
                        $totalA = $totalA + 1;
                    }else{
                        $checked = "";
                    }
                }
                
                if($idpregunta == 27 || $idpregunta == 28 || $idpregunta == 29 || $idpregunta == 30){
                    if($tea == 1){
                        $checked = "checked";
                        $totalB = $totalB + 1;
                    }else{
                        $checked = "";
                    }
                }
                
                if($idpregunta == 31){
                    if($tea == 1){
                        $checked = "checked";
                        $totalC = $totalC + 1;
                    }else{
                        $checked = "";
                    }
                }
                
                if($idpregunta == 32){
                    if($tea == 1){
                        $checked = "checked";
                        $totalD = $totalD + 1;
                    }else{
                        $checked = "";
                    }
                }
                
                if($idpregunta == 33){
                    if($tea == 1){
                        $checked = "checked";
                        $totalE = $totalE + 1;
                    }else{
                        $checked = "";
                    }
                }
                
                $cont       = $cont + 1;
                $nro        = $nro + 1;
                
                if($cont == 1){
                    $datos .="<div class='col-md-12'>
                                    <div class='form-group'>
                                        <label><b>A. Deficiencias persistentes en la comunicacion social y en la interaccion social</b></label><br>
                                    </div>
                                </div>";
                }
                
                if($cont == 4){
                    $datos .="<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>B. Patrones restrictivos y repetitivos de comportamiento, intereses o actividades, que se manifiestan en dos o más de los siguientes puntos, actualmente o por los antecedentes (los ejemplos son ilustrativos, pero no exhaustivos):</b></label>
                                </div>
                            </div>";
                    $nro        = 1;
                }
                if($cont == 8){
                    $nro        = C;
                    $b          = "<b>";
                    $b2         = "</b>";
                }
                if($cont == 9){
                    $nro        = D;
                    $b          = "<b>";
                    $b2         = "</b>";
                }
                if($cont == 10){
                    $nro        = E;
                    $b          = "<b>";
                    $b2         = "</b>";
                }
                if($cont < 11){
                    $datos .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <p>$b $nro. $pregunta $b2</p><br>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    <input name='check$idrespuesta' $disabled id='check$idrespuesta' $checked onclick='respuestaDSMV($idpaciente,$idrespuesta)' type='checkbox' >
                                </div>
                            </div>";
                }
                
            }
            $datos .= "
                            <table style='border:1px solid grey; width:60%; text-align:center'>
                                <tr style='border:1px solid grey; text-align:center'>
                                    <td><b>$nombrepaciente</b></td>
                                    <td>Cumple</td>
                                </tr>
                                <tr style='border:1px solid grey; text-align:center'>
                                    <td>Criterio A</td>
                                    <td>$totalA / 3</td>
                                </tr>
                                <tr style='border:1px solid grey; text-align:center'>
                                    <td>Criterio B</td>
                                    <td>$totalB / 4</td>
                                </tr>
                                <tr style='border:1px solid grey; text-align:center'>
                                    <td>Criterio C</td>
                                    <td>$totalC / 1</td>
                                </tr>
                                <tr style='border:1px solid grey; text-align:center'>
                                    <td>Criterio D</td>
                                    <td>$totalD / 1</td>
                                </tr>
                                <tr style='border:1px solid grey; text-align:center'>
                                    <td>Criterio E</td>
                                    <td>$totalE / 1</td>
                                </tr>
                            </table>";
            echo $datos;
        }
    }

/// Consula conclusiones DSMV
    if($opcion == "consultaConclusionesDSMV"){

        $idpaciente     = $_POST['idpaciente'];
        $idarea         = $_POST['idarea'];
        $datos          = "";
        
        $consultarConclusionDSMV = $db->consultarConclusionDSMV($idpaciente, $idarea);
        
        if( $consultarConclusionDSMV != false )
        {
            for ( $DSMV = 0; $DSMV< sizeof($consultarConclusionDSMV); $DSMV++ )
            {
                $datos     = html_entity_decode($consultarConclusionDSMV[$DSMV]['conclusion']);
            }
             echo $datos;
        }
    }
    
    
/////////////////ACTUALIZA PRUEBA DSMV
if($opcion == "actualizaPreguntasDSMV")
    {
        $idpaciente = $_POST['idpaciente'];
        $idrespuesta = $_POST['idrespuesta'];
        $idoption   = $_POST['idoption'];
        $idarea     = $_POST['idarea'];

        $actualizaPreguntasDSMV = $db->actualizaPreguntasDSMV($idpaciente,
                                                                $idrespuesta,
                                                                $idoption,
                                                                $idarea);
                                                                
        if($actualizaPreguntasDSMV)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    
    //////ACTUALIZA Conclusiones  DSMV
if($opcion == "actualizaConclusionesDSMV")
    {
        $idpaciente     = $_POST['idpaciente'];
        $conclusion     = $_POST['conclusionDSMV'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 2;

        $actualizaConclusionesDSMV = $db->actualizaConclusiones($idpaciente,
                                                                $conclusion,
                                                                $idarea,
                                                                $idbateria);

        if($actualizaConclusionesDSMV)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    ///////////////////////// PRUEBA TEA

if($opcion == "consultaPreguntasDSMVTEA"){

        $idpaciente = $_POST['idpaciente'];
        $idarea     = $_POST['idarea'];
        $idpregunta = 34;

        $consultarDSMVTEA = $db->consultarDSMVTEA($idpaciente, $idarea, $idpregunta);
        
        if( $consultarDSMVTEA != false )
        {
            for ( $DSMVTEA = 0; $DSMVTEA< sizeof($consultarDSMVTEA); $DSMVTEA++ )
            {
                $tea        = html_entity_decode($consultarDSMVTEA[$DSMVTEA]['tea']);
            }
            echo $tea;
        }
    }

    
    /////////////////ACTUALIZA TEA
if($opcion == "actualizaPreguntasTEA")
    {
        $idpaciente = $_POST['idpaciente'];
        $idpregunta = 34;
        $texto   = $_POST['texto'];
        $idarea     = $_POST['idarea'];

        $actualizaPreguntasTEA = $db->actualizaPreguntasTEA($idpaciente,
                                                                $idpregunta,
                                                                $texto,
                                                                $idarea);
                                                                
        if($actualizaPreguntasDSMV)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
///////////////////////// PRUEBA IDEA

if($opcion == "consultaPreguntasIDEA"){
        
        $return_arrIDEA = array();
        
        $idpaciente = $_POST['idpaciente'];
        $idarea     = $_POST['idarea'];
        $disabled   = $_POST['disabled'];
        $datos      = "";
        $checked    = "";
        $cont       = 0;
        $nro        = "";
        $puntuacion = 10;
        $puntuacion2 = 10;
        $puntuacion3 = 10;
        $puntuacion4 = 10;
        $puntuacion5 = 10;
        $puntuacion6 = 10;
        $puntuacion7 = 10;
        $puntuacion8 = 10;
        $puntuacion9 = 10;
        $puntuacion10 = 10;
        $puntuacion11 = 10;
        $puntuacion12 = 10;
        
        $consultarIDEA = $db->consultarIDEA($idpaciente, $idarea);
        
        if( $consultarIDEA != false )
        {
            for ( $IDEA = 0; $IDEA< sizeof($consultarIDEA); $IDEA++ )
            {
                $idpregunta     = $consultarIDEA[$IDEA]['pregunta_idpregunta'];
                $idrespuesta    = $consultarIDEA[$IDEA]['idrespuesta'];
                $idpaciente     = $consultarIDEA[$IDEA]['usuario_idusuario1'];
                $pregunta       = $consultarIDEA[$IDEA]['pregunta'];
                $respuesta      = $consultarIDEA[$IDEA]['respuesta'];
                $dim            = $consultarIDEA[$IDEA]['criterio_dim_idcriterio_dim'];
                
                $cont       = $cont + 1;
                
                if($respuesta == 1){
                    $checked = "checked";
                    $totalA = $totalA + 1;
                }else{
                    $checked = "";
                }
                
                if($dim == 1){
                    $puntuacion = $puntuacion - 2;
                    $row_arrayIDEA['idea1'] .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group'>
                                    <input name='dim$idrespuesta' id='dim$idrespuesta' $disabled $checked onclick='respuestaIDEA($idpaciente,$idrespuesta)' type='checkbox' class='form-control'>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group' style='text-align:center'>
                                    <label><h6><b>$puntuacion</b></h6></label>
                                </div>
                            </div>";
                }
                
                if($dim == 2){
                    $puntuacion2 = $puntuacion2 - 2;
                    $row_arrayIDEA['idea2'] .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group'>
                                    <input name='dim$idrespuesta' id='dim$idrespuesta' $disabled $checked onclick='respuestaIDEA($idpaciente,$idrespuesta)' type='checkbox' class='form-control'>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group' style='text-align:center'>
                                    <label><h6><b>$puntuacion2</b></h6></label>
                                </div>
                            </div>";
                }
                
                if($dim == 3){
                    $puntuacion3 = $puntuacion3 - 2;
                    $row_arrayIDEA['idea3'] .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group'>
                                    <input name='dim$idrespuesta' id='dim$idrespuesta' $disabled $checked onclick='respuestaIDEA($idpaciente,$idrespuesta)' type='checkbox' class='form-control'>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group' style='text-align:center'>
                                    <label><h6><b>$puntuacion3</b></h6></label>
                                </div>
                            </div>";
                }
                
                if($dim == 4){
                    $puntuacion4 = $puntuacion4 - 2;
                    $row_arrayIDEA['idea4'] .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group'>
                                    <input name='dim$idrespuesta' id='dim$idrespuesta' $disabled $checked onclick='respuestaIDEA($idpaciente,$idrespuesta)' type='checkbox' class='form-control'>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group' style='text-align:center'>
                                    <label><h6><b>$puntuacion4</b></h6></label>
                                </div>
                            </div>";
                }
                
                if($dim == 5){
                    $puntuacion5 = $puntuacion5 - 2;
                    $row_arrayIDEA['idea5'] .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group'>
                                    <input name='dim$idrespuesta' id='dim$idrespuesta' $disabled $checked onclick='respuestaIDEA($idpaciente,$idrespuesta)' type='checkbox' class='form-control'>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group' style='text-align:center'>
                                    <label><h6><b>$puntuacion5</b></h6></label>
                                </div>
                            </div>";
                }
                
                if($dim == 6){
                    $puntuacion6 = $puntuacion6 - 2;
                    $row_arrayIDEA['idea6'] .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group'>
                                    <input name='dim$idrespuesta' id='dim$idrespuesta' $disabled $checked onclick='respuestaIDEA($idpaciente,$idrespuesta)' type='checkbox' class='form-control'>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group' style='text-align:center'>
                                    <label><h6><b>$puntuacion6</b></h6></label>
                                </div>
                            </div>";
                }
                
                if($dim == 7){
                    $puntuacion7 = $puntuacion7 - 2;
                    $row_arrayIDEA['idea7'] .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group'>
                                    <input name='dim$idrespuesta' id='dim$idrespuesta' $disabled $checked onclick='respuestaIDEA($idpaciente,$idrespuesta)' type='checkbox' class='form-control'>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group' style='text-align:center'>
                                    <label><h6><b>$puntuacion7</b></h6></label>
                                </div>
                            </div>";
                }
                
                if($dim == 8){
                    $puntuacion8 = $puntuacion8 - 2;
                    $row_arrayIDEA['idea8'] .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group'>
                                    <input name='dim$idrespuesta' id='dim$idrespuesta' $disabled $checked onclick='respuestaIDEA($idpaciente,$idrespuesta)' type='checkbox' class='form-control'>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group' style='text-align:center'>
                                    <label><h6><b>$puntuacion8</b></h6></label>
                                </div>
                            </div>";
                }
                
                if($dim == 9){
                    $puntuacion9 = $puntuacion9 - 2;
                    $row_arrayIDEA['idea9'] .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group'>
                                    <input name='dim$idrespuesta' id='dim$idrespuesta' $disabled $checked onclick='respuestaIDEA($idpaciente,$idrespuesta)' type='checkbox' class='form-control'>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group' style='text-align:center'>
                                    <label><h6><b>$puntuacion9</b></h6></label>
                                </div>
                            </div>";
                }
                
                if($dim == 10){
                    $puntuacion10 = $puntuacion10 - 2;
                    $row_arrayIDEA['idea10'] .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group'>
                                    <input name='dim$idrespuesta' id='dim$idrespuesta' $disabled $checked onclick='respuestaIDEA($idpaciente,$idrespuesta)' type='checkbox' class='form-control'>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group' style='text-align:center'>
                                    <label><h6><b>$puntuacion10</b></h6></label>
                                </div>
                            </div>";
                }
                
                if($dim == 11){
                    $puntuacion11 = $puntuacion11 - 2;
                    $row_arrayIDEA['idea11'] .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group'>
                                    <input name='dim$idrespuesta' id='dim$idrespuesta' $disabled $checked onclick='respuestaIDEA($idpaciente,$idrespuesta)' type='checkbox' class='form-control'>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group' style='text-align:center'>
                                    <label><h6><b>$puntuacion11</b></h6></label>
                                </div>
                            </div>";
                }
                
                if($dim == 12){
                    $puntuacion12 = $puntuacion12 - 2;
                    $row_arrayIDEA['idea12'] .= "<div class='col-md-10'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group'>
                                    <input name='dim$idrespuesta' id='dim$idrespuesta' $disabled $checked onclick='respuestaIDEA($idpaciente,$idrespuesta)' type='checkbox' class='form-control'>
                                </div>
                            </div>
                            <div class='col-md-1'>
                                <div class='form-group' style='text-align:center'>
                                    <label $disabled><h6><b>$puntuacion12</b></h6></label>
                                </div>
                            </div>";
                }
                            
                array_push($return_arrIDEA, $row_arrayIDEA);
                
            }
            //echo json_encode($return_arrIDEA);
        }
        
        $consultarIDEARespuesta = $db->consultarIDEARespuesta($idpaciente, $idarea);
        
        if( $consultarIDEARespuesta != false )
        {
            for ( $IDEAr = 0; $IDEAr< sizeof($consultarIDEARespuesta); $IDEAr++ )
            {
                $idrespuesta    = $consultarIDEARespuesta[$IDEAr]['idrespuesta'];
                $idpaciente     = $consultarIDEARespuesta[$IDEAr]['usuario_idusuario1'];
                $pregunta       = $consultarIDEARespuesta[$IDEAr]['pregunta'];
                $respuesta      = $consultarIDEARespuesta[$IDEAr]['respuesta'];
                $dim            = $consultarIDEARespuesta[$IDEAr]['criterio_dim_idcriterio_dim'];
                
                if($dim == 1){
                    $row_arrayIDEA['ideaResp1'] .= "<div class='col-md-11'>
                                    <div class='form-group'>
                                        <label><h6><b>Respuesta dada por el terapeuta</b></h6></label>
                                    </div>
                                </div>
                                <div class='col-md-1'>
                                    <div class='form-group'>
                                        <input style='text-align:center' $disabled id='respt$idrespuesta' type='text' value='$respuesta' onblur='respuestaIDEATerapeuta($idpaciente,$idrespuesta)' class='form-control'>
                                    </div>
                                </div>";
                }
                
                if($dim == 2){
                    $row_arrayIDEA['ideaResp2'] .= "<div class='col-md-11'>
                                    <div class='form-group'>
                                        <label><h6><b>Respuesta dada por el terapeuta</b></h6></label>
                                    </div>
                                </div>
                                <div class='col-md-1'>
                                    <div class='form-group'>
                                        <input style='text-align:center' $disabled id='respt$idrespuesta' type='text' value='$respuesta' onblur='respuestaIDEATerapeuta($idpaciente,$idrespuesta)' class='form-control'>
                                    </div>
                                </div>";
                }
                
                if($dim == 3){
                    $row_arrayIDEA['ideaResp3'] .= "<div class='col-md-11'>
                                    <div class='form-group'>
                                        <label><h6><b>Respuesta dada por el terapeuta</b></h6></label>
                                    </div>
                                </div>
                                <div class='col-md-1'>
                                    <div class='form-group'>
                                        <input style='text-align:center' $disabled id='respt$idrespuesta' type='text' value='$respuesta' onblur='respuestaIDEATerapeuta($idpaciente,$idrespuesta)' class='form-control'>
                                    </div>
                                </div>";
                }
                
                if($dim == 4){
                    $row_arrayIDEA['ideaResp4'] .= "<div class='col-md-11'>
                                    <div class='form-group'>
                                        <label><h6><b>Respuesta dada por el terapeuta</b></h6></label>
                                    </div>
                                </div>
                                <div class='col-md-1'>
                                    <div class='form-group'>
                                        <input style='text-align:center' $disabled id='respt$idrespuesta' type='text' value='$respuesta' onblur='respuestaIDEATerapeuta($idpaciente,$idrespuesta)' class='form-control'>
                                    </div>
                                </div>";
                }
                
                if($dim == 5){
                    $row_arrayIDEA['ideaResp5'] .= "<div class='col-md-11'>
                                    <div class='form-group'>
                                        <label><h6><b>Respuesta dada por el terapeuta</b></h6></label>
                                    </div>
                                </div>
                                <div class='col-md-1'>
                                    <div class='form-group'>
                                        <input style='text-align:center' $disabled id='respt$idrespuesta' type='text' value='$respuesta' onblur='respuestaIDEATerapeuta($idpaciente,$idrespuesta)' class='form-control'>
                                    </div>
                                </div>";
                }
                
                if($dim == 6){
                    $row_arrayIDEA['ideaResp6'] .= "<div class='col-md-11'>
                                    <div class='form-group'>
                                        <label><h6><b>Respuesta dada por el terapeuta</b></h6></label>
                                    </div>
                                </div>
                                <div class='col-md-1'>
                                    <div class='form-group'>
                                        <input style='text-align:center' $disabled id='respt$idrespuesta' type='text' value='$respuesta' onblur='respuestaIDEATerapeuta($idpaciente,$idrespuesta)' class='form-control'>
                                    </div>
                                </div>";
                }
                
                if($dim == 7){
                    $row_arrayIDEA['ideaResp7'] .= "<div class='col-md-11'>
                                    <div class='form-group'>
                                        <label><h6><b>Respuesta dada por el terapeuta</b></h6></label>
                                    </div>
                                </div>
                                <div class='col-md-1'>
                                    <div class='form-group'>
                                        <input style='text-align:center' $disabled id='respt$idrespuesta' type='text' value='$respuesta' onblur='respuestaIDEATerapeuta($idpaciente,$idrespuesta)' class='form-control'>
                                    </div>
                                </div>";
                }
                
                if($dim == 8){
                    $row_arrayIDEA['ideaResp8'] .= "<div class='col-md-11'>
                                    <div class='form-group'>
                                        <label><h6><b>Respuesta dada por el terapeuta</b></h6></label>
                                    </div>
                                </div>
                                <div class='col-md-1'>
                                    <div class='form-group'>
                                        <input style='text-align:center' $disabled id='respt$idrespuesta' type='text' value='$respuesta' onblur='respuestaIDEATerapeuta($idpaciente,$idrespuesta)' class='form-control'>
                                    </div>
                                </div>";
                }
                
                if($dim == 9){
                    $row_arrayIDEA['ideaResp9'] .= "<div class='col-md-11'>
                                    <div class='form-group'>
                                        <label><h6><b>Respuesta dada por el terapeuta</b></h6></label>
                                    </div>
                                </div>
                                <div class='col-md-1'>
                                    <div class='form-group'>
                                        <input style='text-align:center' $disabled id='respt$idrespuesta' type='text' value='$respuesta' onblur='respuestaIDEATerapeuta($idpaciente,$idrespuesta)' class='form-control'>
                                    </div>
                                </div>";
                }
                
                if($dim == 10){
                    $row_arrayIDEA['ideaResp10'] .= "<div class='col-md-11'>
                                    <div class='form-group'>
                                        <label><h6><b>Respuesta dada por el terapeuta</b></h6></label>
                                    </div>
                                </div>
                                <div class='col-md-1'>
                                    <div class='form-group'>
                                        <input style='text-align:center' $disabled id='respt$idrespuesta' type='text' value='$respuesta' onblur='respuestaIDEATerapeuta($idpaciente,$idrespuesta)' class='form-control'>
                                    </div>
                                </div>";
                }
                
                if($dim == 11){
                    $row_arrayIDEA['ideaResp11'] .= "<div class='col-md-11'>
                                    <div class='form-group'>
                                        <label><h6><b>Respuesta dada por el terapeuta</b></h6></label>
                                    </div>
                                </div>
                                <div class='col-md-1'>
                                    <div class='form-group'>
                                        <input style='text-align:center' $disabled id='respt$idrespuesta' type='text' value='$respuesta' onblur='respuestaIDEATerapeuta($idpaciente,$idrespuesta)' class='form-control'>
                                    </div>
                                </div>";
                }
                
                if($dim == 12){
                    $row_arrayIDEA['ideaResp12'] .= "<div class='col-md-11'>
                                    <div class='form-group'>
                                        <label><h6><b>Respuesta dada por el terapeuta</b></h6></label>
                                    </div>
                                </div>
                                <div class='col-md-1'>
                                    <div class='form-group'>
                                        <input style='text-align:center' $disabled id='respt$idrespuesta' type='text' value='$respuesta' onblur='respuestaIDEATerapeuta($idpaciente,$idrespuesta)' class='form-control'>
                                    </div>
                                </div>";
                }
                array_push($return_arrIDEA, $row_arrayIDEA);
            }
            echo json_encode($return_arrIDEA);
        }
    }
            

/////////////////ACTUALIZA PRUEBA IDEA
if($opcion == "actualizaPreguntasIDEA")
    {
        $idpaciente = $_POST['idpaciente'];
        $idrespuesta = $_POST['idrespuesta'];
        $idoption   = $_POST['idoption'];
        $idarea     = $_POST['idarea'];

        $actualizaPreguntasIDEA = $db->actualizaPreguntasIDEA($idpaciente,
                                                                $idrespuesta,
                                                                $idoption,
                                                                $idarea);
                                                                
        if($actualizaPreguntasIDEA)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
if($opcion == "actualizaPreguntasIDEATerapeuta")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $idoption       = $_POST['idoption'];
        $idarea         = $_POST['idarea'];

        $actualizaPreguntasIDEATerapeuta = $db->actualizaPreguntasIDEATerapeuta($idpaciente,
                                                                $idrespuesta,
                                                                $idoption,
                                                                $idarea);
                                                                
        if($actualizaPreguntasIDEATerapeuta)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }

if($opcion == "consultaPreguntasTotalIDEA"){
        
        $return_arrTotalIDEA = array();
        
        $idpaciente = $_POST['idpaciente'];
        $idarea     = $_POST['idarea'];
        $datos      = "";
        $checked    = "";
        $cont       = 0;
        $nro        = "";
        
        $consultarIDEA = $db->consultarIDEARespuesta($idpaciente, $idarea);
        
        if( $consultarIDEA != false )
        {
            for ( $IDEA = 0; $IDEA< sizeof($consultarIDEA); $IDEA++ )
            {
                $respuesta   = $consultarIDEA[$IDEA]['respuesta'];
                $dim         = $consultarIDEA[$IDEA]['criterio_dim_idcriterio_dim'];
                
                $cont       = $cont + 1;
                if($dim == 1){
                    $totaldim1 = $totaldim1 + $respuesta;
                    $row_arrayTotalIDEA['dim1'] = $totaldim1;
                }
                
                if($dim == 2){
                    $totaldim2 = $totaldim2 + $respuesta;
                    $row_arrayTotalIDEA['dim2'] = $totaldim2;
                }
                
                if($dim == 3){
                    $totaldim3 = $totaldim3 + $respuesta;
                    $row_arrayTotalIDEA['dim3'] = $totaldim3;
                }
                
                if($dim == 4){
                    $totaldim4 = $totaldim4 + $respuesta;
                    $row_arrayTotalIDEA['dim4'] = $totaldim4;
                }
                
                if($dim == 5){
                    $totaldim5 = $totaldim5 + $respuesta;
                    $row_arrayTotalIDEA['dim5'] = $totaldim5;
                }
                
                if($dim == 6){
                    $totaldim6 = $totaldim6 + $respuesta;
                    $row_arrayTotalIDEA['dim6'] = $totaldim6;
                }
                
                if($dim == 7){
                    $totaldim7 = $totaldim7 + $respuesta;
                    $row_arrayTotalIDEA['dim7'] = $totaldim7;
                }
                
                if($dim == 8){
                    $totaldim8 = $totaldim8 + $respuesta;
                    $row_arrayTotalIDEA['dim8'] = $totaldim8;
                }
                
                if($dim == 9){
                    $totaldim9 = $totaldim9 + $respuesta;
                    $row_arrayTotalIDEA['dim9'] = $totaldim9;
                }
                
                if($dim == 10){
                    $totaldim10 = $totaldim10 + $respuesta;
                    $row_arrayTotalIDEA['dim10'] = $totaldim10;
                }
                
                if($dim == 11){
                    $totaldim11 = $totaldim11 + $respuesta;
                    $row_arrayTotalIDEA['dim11'] = $totaldim11;
                }
                
                if($dim == 12){
                    $totaldim12 = $totaldim12 + $respuesta;
                    $row_arrayTotalIDEA['dim12'] = $totaldim12;
                }
                            
                array_push($return_arrTotalIDEA, $row_arrayTotalIDEA);
                
            }
            echo json_encode($return_arrTotalIDEA);
        }
    }
    
    
    /// Consula conclusiones IDEA
    if($opcion == "consultaConclusionesIDEA"){

        $idpaciente     = $_POST['idpaciente'];
        $idarea         = $_POST['idarea'];
        $datos          = "";
        
        $consultarConclusionIDEA = $db->consultarConclusionIDEA($idpaciente, $idarea);
        
        if( $consultarConclusionIDEA != false )
        {
            for ( $IDEA = 0; $IDEA< sizeof($consultarConclusionIDEA); $IDEA++ )
            {
                $datos     = html_entity_decode($consultarConclusionIDEA[$IDEA]['conclusion']);
            }
             echo $datos;
        }
    }
    
    //////ACTUALIZA Conclusiones  IDEA
if($opcion == "actualizaConclusionesIDEA")
    {
        
        $idpaciente     = $_POST['idpaciente'];
        $conclusion     = $_POST['conclusionIDEA'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 3;
        
        

        $actualizaConclusionesIDEA = $db->actualizaConclusiones($idpaciente,
                                                                $conclusion,
                                                                $idarea,
                                                                $idbateria);

        if($actualizaConclusionesIDEA)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    
    ////// Actualizacion la informacion del informe Final
    
    if($opcion == "consultarInformeFinal"){
        $return_arr   = array();
        $consultaInformeFinal = $db->consultarInformeFinal($idpaciente,$idarea);

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
    
    if($opcion == "cargarInformeFinal"){
        $return_arrInf   = array();
        $cargarInformeFinal = $db->consultarInformeFinal($idpaciente, $idarea);

        if( $cargarInformeFinal != false )
        {
            for ( $i = 0; $i< sizeof($cargarInformeFinal); $i++ )
            {
                $row_arrayInf['idinforme']          = $cargarInformeFinal[$i]['idinforme'];
                $row_arrayInf['objetivo']           = $cargarInformeFinal[$i]['objetivo'];
                $row_arrayInf['metodoeval']         = $cargarInformeFinal[$i]['metodoeval'];
                $row_arrayInf['resultados']         = $cargarInformeFinal[$i]['resultados'];
                $row_arrayInf['conclusiones']       = $cargarInformeFinal[$i]['conclusiones'];
                $row_arrayInf['recomendaciones']    = $cargarInformeFinal[$i]['recomendaciones'];
                array_push($return_arrInf, $row_arrayInf);
            }
            echo json_encode($return_arrInf);
        }
    }
    
    if($opcion == "insertarInformeFinal"){
        
        $insertarInformeFinal = $db->crearInformeFinal($idterapeuta,$idarea,$idpaciente);
        
        if ( $insertarInformeFinal ){
            echo $insertarInformeFinal;
        }else{
            $insertarInformeFinal = 0;
            echo $insertarInformeFinal;
        }
    }
    
    if($opcion == "actualizaInformeFinal")
    {
        $idpaciente                 = $_POST['idpaciente'];
        $idinforme                  = $_POST['idinforme'];
        $ObjEvaluacionObservacion   = $_POST['ObjEvaluacionObservacion'];
        $MetEvaluacionObservacion   = $_POST['MetEvaluacionObservacion'];
        $ResultadosObservacion      = $_POST['ResultadosObservacion'];
        $ConclusionesObservacion    = $_POST['ConclusionesObservacion'];
        $RecomendacionesObservacion = $_POST['RecomendacionesObservacion'];
        
        $actualizarInformeFinal = $db->actualizarInformeFinal(  $idpaciente,
                                                                $idinforme,
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

/////  consulta Sesiones de Evaluacion

if($opcion == "consultarSesionEvaluacion"){

        $idpaciente = $_POST['idpaciente'];
        $datos      = "";
        
        $consultarSesionEvaluacion = $db->consultarSesionEvaluacion($idpaciente);
        
        if( $consultarSesionEvaluacion != false )
        {
            $datos .= "<div class='col-md-12' align='left'>
                            <div class='form-group'>
                                <label><b>SESIONES DE EVALUACION</b></label>
                            </div>
                        </div>";

            $conFchValMax = 0;
            for( $i = 0; $i < sizeof($consultarSesionEvaluacion); $i++ )
            {
                $fchValoracion = $consultarSesionEvaluacion[$i]['valoraciones'];

                if($fchValoracion !='')
                {
                    $conFchValMax++;
                }
            }

            $conFchVal = 0;
            $fchValoracion = '';
            for ( $SE = 0; $SE< sizeof($consultarSesionEvaluacion); $SE++ )
            {
                $sesion     = $consultarSesionEvaluacion[$SE]['sesion'];
                $persona    = $consultarSesionEvaluacion[$SE]['persona'];
                $valoracion = $consultarSesionEvaluacion[$SE]['valoraciones'];
               /*
                $phpdate    = strtotime($consultarSesionEvaluacion[$SE]['fecha']);
                $fecha      = date( 'd M Y', $phpdate );
                */
                if($valoracion !='')
                {
                    $conFchVal++;
                   /*
                    $phpFecha    = strtotime($valoracion);
                    $valoracion  = date( 'd M Y', $phpFecha );
                    */
                    $fechaFormateada = new FechaEs($valoracion);
                    $valoracion = $fechaFormateada->getDateFormat(false);

                    if ($conFchVal == $conFchValMax ) 
                    {
                        if( $conFchValMax == 1)
                        {
                            $fchValoracion =  $valoracion;

                        }else
                        {
                            $fchValoracion = $fchValoracion. ' - '. $valoracion;
                        }
                        
                        $datos      .= "<div class='col-md-6' class='form-group' style='text-align:left;'>
                                            <label>$sesion</label>
                                    </div>
                                    <div  class='col-md-6' class='form-group' style='text-align:left;'>                                           
                                           <label>$fchValoracion</label>
                                    </div>";
                    }else {
                        if ($fchValoracion == '') {
                            $fchValoracion = $valoracion;
                        } else {
                            $fchValoracion = $fchValoracion. ' - '. $valoracion;
                        }
                    }
                }elseif($persona!='')
                {
                    $datos      .= "<div class='col-md-6' class='form-group' style='text-align:left;'>
                                            <label>$sesion</label>
                                    </div>
                                    <div class='col-md-6' class='form-group' style='text-align:left;'>
                                            <label>$persona</label>
                                    </div>";
                }else
                    {
                     $fechaFormateada = new FechaEs($consultarSesionEvaluacion[$SE]['fecha']);
                     $fecha = $fechaFormateada->getDateFormat(false);
                    
                     $datos      .= "<div class='col-md-6' class='form-group' style='text-align:left;'>
                                            <label>$sesion</label>
                                      </div>
                                      <div class='col-md-6' class='form-group' style='text-align:left;'>
                                         <label>$fecha</label>
                                      </div>";
                     }
            }

            echo $datos;
        }
    }
    
    ///////////PROGRAMACION
    
    if($opcion == "insertarProgramacion"){

        $idpaciente   = $_POST['idpaciente'];
        $idusuario    = $_POST['idusuario'];
        $fecha        = $_POST['fecha'];
        $horaini      = $_POST['horaini'];
        $horafin      = $_POST['horafin'];
        $area         = $_POST['area'];
        $profesional  = $_POST['profesional'];

        if(empty($profesional)){
            $profesional = 'null';
        }

        $lugarevaluacion    = $_POST['lugarevaluacion'];
        $observaciones      = $_POST['observaciones'];
        
        $insertarProgramacion = $db->insertarProgramacion($idpaciente,
                                                            $idusuario,
                                                            $fecha,
                                                            $horaini,
                                                            $horafin,
                                                            $area,
                                                            $profesional,
                                                            $lugarevaluacion,
                                                            $observaciones);
        
        if ( $insertarProgramacion ){
            echo "success";
        }else{
            echo "error";
        }
    }
    
    if($opcion == "actualizarProgramacion"){
        
        $idprogramacion     = $_POST['idprogramacion'];
        $idpaciente         = $_POST['idpaciente'];
        $idusuario          = $_POST['idusuario'];
        $fecha              = $_POST['fecha'];
        $horaini            = $_POST['horaini'];
        $horafin            = $_POST['horafin'];
        $area               = $_POST['area'];
        $profesional        = $_POST['profesional'];
        $lugarevaluacion    = $_POST['lugarevaluacion'];
        $observaciones      = $_POST['observaciones'];

        if (empty($profesional)) {
            $profesional = 'null';
        }
        
        $actualizarProgramacion = $db->actualizarProgramacion($idprogramacion,
                                                            $idpaciente,
                                                            $idusuario,
                                                            $fecha,
                                                            $horaini,
                                                            $horafin,
                                                            $area,
                                                            $profesional,
                                                            $lugarevaluacion,
                                                            $observaciones);
        
        if ( $actualizarProgramacion ){
            echo "success";
        }else{
            echo "error";
        }
    }
    
    if($opcion == "editarProgramacion"){
        
        $idpaciente         = $_POST['idpaciente'];
        $idusuario          = $_POST['idusuario'];
        $idprogramacion     = $_POST['idprogramacion'];
        $idarea             = $_POST['idarea'];
        
        $return_arr   = array();
        $editarProgramacion = $db->editarProgramacion($idprogramacion, $idpaciente, $idusuario,$idarea);
        
        if( $editarProgramacion != false )
        {
            for ( $ep = 0; $ep< sizeof($editarProgramacion); $ep++ ) {
                $row_array['idprogramacion'] = $editarProgramacion[$ep]['idprogramacion'];
                $row_array['fecha'] = $editarProgramacion[$ep]['fecha'];
                $row_array['horaini'] = $editarProgramacion[$ep]['horaini'];
                $row_array['horafin'] = $editarProgramacion[$ep]['horafin'];
                $row_array['lugarevaluacion'] = $editarProgramacion[$ep]['lugarevaluacion'];
                $row_array['observacion'] = $editarProgramacion[$ep]['observacion'];
                $row_array['area'] = $editarProgramacion[$ep]['area_idarea'];
                $row_array['usuario_idusuario'] = $editarProgramacion[$ep]['usuario_idusuario'];
                $row_array['usuario_idusuario1'] = $editarProgramacion[$ep]['usuario_idusuario1'];

                if ($idarea !== "6" && $idarea !== "7")
                {
                    $row_array['usuario_idusuario2'] = $editarProgramacion[$ep]['usuario_idusuario2'];
                    $row_array['nombre_terapeuta'] = $editarProgramacion[$ep]['nombre_terapeuta'];
                }

                array_push($return_arr, $row_array);
            }
            echo json_encode($return_arr);
        }
    }
    
    if($opcion == "eliminarProgramacion"){
        
        $idprogramacion     = $_POST['idprogramacion'];

        $eliminarProgramacion = $db->eliminarProgramacion($idprogramacion);
        
        if ( $eliminarProgramacion ){
            echo "success";
        }else{
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