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
        
        $insertar = $db->crearHistoriaFono($idpaciente, $idarea, $idTerapeuta);
        
        if ( $insertar ){
            echo $insertar;
        }else{
            $insertar = 0;
            echo $insertar;
        }
    }

    if($opcion == "consultarhistoria"){
        $return_arr   = array();
        $consultaHistoria = $db->consultarHistoriaFono($idpaciente, $idarea);

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
    
    if($opcion == "actualizarAnamnesis")
    {
        $idhist                     = $_POST['idhist'];
        $fechaIngreso               = $_POST['fechaCitaIni'];
        $pacienteInstitucion        = $_POST['pacienteInstitucion'];
        $motivoConsultaObservacion  = $_POST['motivoConsultaObservacion'];
        $numerohermanos             = $_POST['numerohermanos'];
        $lugarocupa                 = $_POST['lugarocupa'];
        $transtornoneurologico      = $_POST['transtornoneurologico'];
        $problemaspsiquiatrico      = $_POST['problemaspsiquiatrico'];
        $deficienciasvisaudt        = $_POST['deficienciasvisaudt'];
        $alteracionlenguaje         = $_POST['alteracionlenguaje'];
        $deficitcongnitivo          = $_POST['deficitcongnitivo'];
        $adicciones                 = $_POST['adicciones'];
        $transaprendizaje           = $_POST['transaprendizaje'];
        
        $acudienteIdParentesco      = $_POST['acudienteIdParentesco'];
        $permanecemayortiempo       = $_POST['permanecemayortiempo'];
        $estrato                    = $_POST['estrato'];
        $tipovivienda               = $_POST['tipovivienda'];
        $descripcion                = $_POST['descripcion'];
        
        $numeroembarazos            = $_POST['numeroembarazos'];
        $abortos                    = $_POST['abortos'];
        $mesaborto                  = $_POST['mesaborto'];
        $mesescontrolembr           = $_POST['mesescontrolembr'];
        $lugarcontrolembr           = $_POST['lugarcontrolembr'];
        $convulsiones               = $_POST['convulsiones'];
        $drogadiccion               = $_POST['drogadiccion'];
        $alcoholismo                = $_POST['alcoholismo'];
        $tabaquismo                 = $_POST['tabaquismo'];
        $traumatismo                = $_POST['traumatismo'];
        $cualtraumatismo            = $_POST['cualtraumatismo'];
        $toxoplasmosis              = $_POST['toxoplasmosis'];
        $preclampsia                = $_POST['preclampsia'];
        $infecciones                = $_POST['infecciones'];
        $medicamento                = $_POST['medicamento'];
        $cualmedicamento            = $_POST['cualmedicamento'];
        $intoxicaciones             = $_POST['intoxicaciones'];
        $cualintoxicacion           = $_POST['cualintoxicacion'];
        $alimentacion               = $_POST['alimentacion'];
        $estadoemocional            = $_POST['estadoemocional'];
        $otrosantcfono              = $_POST['otrosantcfono'];
        
        $forceps                    = $_POST['forceps'];
        $circularcordon             = $_POST['circularcordon'];
        $cefalica                   = $_POST['cefalica'];
        $podalica                   = $_POST['podalica'];
        $antendidohospital          = $_POST['antendidohospital'];
        $atendidocasa               = $_POST['atendidocasa'];
        $partera                    = $_POST['partera'];
        $obsrperinatal              = $_POST['obsrperinatal'];
        
        $llanto                     = $_POST['llanto'];
        $hipoxia                    = $_POST['hipoxia'];
        $cianosis                   = $_POST['cianosis'];
        $oxigeno                    = $_POST['oxigeno'];
        $reanimacion                = $_POST['reanimacion'];
        $ictericia                  = $_POST['ictericia'];
        $transfusion                = $_POST['transfusion'];
        $fototerapia                = $_POST['fototerapia'];
        $meconio                    = $_POST['meconio'];
        $traumatismopost            = $_POST['traumatismopost'];
        $cualtraumatismopos         = $_POST['cualtraumatismopos'];
        $obsrposnatal               = $_POST['obsrposnatal'];

        
        $actualizarDatosAnamnesis = $db->actualizarAnamnesis($idhist,
                                                            $idpaciente,
                                                            $fechaIngreso,
                                                            $pacienteInstitucion,
                                                            $motivoConsultaObservacion,
                                                            $numerohermanos,
                                                            $lugarocupa,
                                                            $transtornoneurologico,
                                                            $problemaspsiquiatrico,
                                                            $deficienciasvisaudt,
                                                            $alteracionlenguaje,
                                                            $deficitcongnitivo,
                                                            $adicciones,
                                                            $transaprendizaje,
                                                            $acudienteIdParentesco,
                                                            $permanecemayortiempo,
                                                            $estrato,
                                                            $tipovivienda,
                                                            $descripcion,
                                                            $numeroembarazos,
                                                            $abortos,
                                                            $mesaborto,
                                                            $mesescontrolembr,
                                                            $lugarcontrolembr,
                                                            $convulsiones,
                                                            $drogadiccion,
                                                            $alcoholismo,
                                                            $tabaquismo,
                                                            $traumatismo,
                                                            $cualtraumatismo,
                                                            $toxoplasmosis,
                                                            $preclampsia,
                                                            $infecciones,
                                                            $medicamento,
                                                            $cualmedicamento,
                                                            $intoxicaciones,
                                                            $cualintoxicacion,
                                                            $alimentacion,
                                                            $estadoemocional,
                                                            $otrosantcfono,
                                                            $forceps,
                                                            $circularcordon,
                                                            $cefalica,
                                                            $podalica,
                                                            $antendidohospital,
                                                            $atendidocasa,
                                                            $partera,
                                                            $obsrperinatal,
                                                            $llanto,
                                                            $hipoxia,
                                                            $cianosis,
                                                            $oxigeno,
                                                            $reanimacion,
                                                            $ictericia,
                                                            $transfusion,
                                                            $fototerapia,
                                                            $meconio,
                                                            $traumatismopost,
                                                            $cualtraumatismopos,
                                                            $obsrposnatal);

        if($actualizarDatosAnamnesis)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    
    if($opcion == "actualizarDlloLeng")
    {
        $idhistoria                 = $_POST['idhist'];
        $idhistoriapsico            = $_POST['idhistoriapsico'];
        $silabeo                    = $_POST['silabeo'];
        $edadsilabeo                = $_POST['edadsilabeo'];
        $observacionsilabeo         = $_POST['observacionsilabeo'];
        $comprensionlenguaje        = $_POST['comprensionlenguaje'];
        $problemasarticulatorios    = $_POST['problemasarticulatorios'];
        $lenguajeinteligible        = $_POST['lenguajeinteligible'];
        $seleccionMaterna           = $_POST['seleccionMaterna'];
        $edadmaterna                = $_POST['edadmaterna'];
        $seleccionArtificial        = $_POST['seleccionArtificial'];
        $edadartificial             = $_POST['edadartificial'];
        $seleccionMixta             = $_POST['seleccionMixta'];
        $edadmixta                  = $_POST['edadmixta'];
        $succion                    = $_POST['succion'];
        $deglucion                  = $_POST['deglucion'];
        $sialorrea                  = $_POST['sialorrea'];
        $apariciondientes           = $_POST['apariciondientes'];
        $masticacion                = $_POST['masticacion'];
        $liquidos                   = $_POST['liquidos'];
        $semisolidos                = $_POST['semisolidos'];
        $solidos                    = $_POST['solidos'];
        $balanceado                 = $_POST['balanceado'];
        $comesolo                   = $_POST['comesolo'];
        $diurno                     = $_POST['diurno'];
        $nocturno                   = $_POST['nocturno'];
        $enuresis                   = $_POST['enuresis'];
        $encopresis                 = $_POST['encopresis'];
        $vision                     = $_POST['vision'];
        $audicion                   = $_POST['audicion'];
        $traumatismos               = $_POST['traumatismos'];
        $enfprimanos                = $_POST['enfprimanos'];
        $controlcabeza              = $_POST['controlcabeza'];
        $edadcontrolcabeza          = $_POST['edadcontrolcabeza'];
        $sento                      = $_POST['sento'];
        $edadsento                  = $_POST['edadsento'];
        $gateo                      = $_POST['gateo'];
        $edadgateo                  = $_POST['edadgateo'];
        $camino                     = $_POST['camino'];
        $edadcamino                 = $_POST['edadcamino'];
        $prefmanual                 = $_POST['prefmanual'];
        $edadprefmanual             = $_POST['edadprefmanual'];
        $equilibrio                 = $_POST['equilibrio'];
        $edadequilibrio             = $_POST['edadequilibrio'];
        $motfina                    = $_POST['motfina'];
        $edadmotfina                = $_POST['edadmotfina'];
        $motgruesa                  = $_POST['motgruesa'];
        $edadmotgruesa              = $_POST['edadmotgruesa'];
        $obsrmotor                  = $_POST['obsrmotor'];
        $succiondigital             = $_POST['succiondigital'];
        $edadsucciondigital         = $_POST['edadsucciondigital'];
        $balanceo                   = $_POST['balanceo'];
        $edadbalanceo               = $_POST['edadbalanceo'];
        $onicofagia                 = $_POST['onicofagia'];
        $musarana                   = $_POST['musarana'];
        $golpea                     = $_POST['golpea'];
        $arrancacabello             = $_POST['arrancacabello'];
        $aleteo                     = $_POST['aleteo'];
        $otroscomportamientos       = $_POST['otroscomportamientos'];
        $tranquilo                  = $_POST['tranquilo'];
        $intranquilo                = $_POST['intranquilo'];
        $insonmio                   = $_POST['insonmio'];
        $duermesolo                 = $_POST['duermesolo'];
        $conquienduerme             = $_POST['conquienduerme'];
        $obsrsueno                  = $_POST['obsrsueno'];
        $inquieto                   = $_POST['inquieto'];
        $pasivo                     = $_POST['pasivo'];
        $distraido                  = $_POST['distraido'];
        $impulsivo                  = $_POST['impulsivo'];
        $sociable                   = $_POST['sociable'];
        $destructor                 = $_POST['destructor'];
        $peleador                   = $_POST['peleador'];
        $desatento                  = $_POST['desatento'];
        $timido                     = $_POST['timido'];
        $independiente              = $_POST['independiente'];
        $estanimocomun              = $_POST['estanimocomun'];
        $fobias                     = $_POST['fobias'];
        $juegopreferido             = $_POST['juegopreferido'];
        $personaspreferidas         = $_POST['personaspreferidas'];
        $amigosfacil                = $_POST['amigosfacil'];
        $compartejuego              = $_POST['compartejuego'];
        $fatigabilidad              = $_POST['fatigabilidad'];
        $conductasexual             = $_POST['conductasexual'];
        $obsrconducta               = $_POST['obsrconducta'];
        $neurologia                 = $_POST['neurologia'];
        $tiemponeurologia           = $_POST['tiemponeurologia'];
        $obsrneurologia             = $_POST['obsrneurologia'];
        $fonoaudiologia             = $_POST['fonoaudiologia'];
        $tiempofonoaudiologia       = $_POST['tiempofonoaudiologia'];
        $obsrfonoaudiologia         = $_POST['obsrfonoaudiologia'];
        $teo                        = $_POST['teo'];
        $tiempoteo                  = $_POST['tiempoteo'];
        $obsrteo                    = $_POST['obsrteo'];
        $fisioterapia               = $_POST['fisioterapia'];
        $tiempofisioterapia         = $_POST['tiempofisioterapia'];
        $obsrfisioterapia           = $_POST['obsrfisioterapia'];
        $psico                      = $_POST['psico'];
        $tiempopsico                = $_POST['tiempopsico'];
        $obsrpsico                  = $_POST['obsrpsico'];
        $farmacologio               = $_POST['farmacologio'];
        $tiempofarmacologio         = $_POST['tiempofarmacologio'];
        $obsrfarmacologio           = $_POST['obsrfarmacologio'];
        $cuidadosesp                = $_POST['cuidadosesp'];
        $tiempocuidadosesp          = $_POST['tiempocuidadosesp'];
        $obsrcuidadosesp            = $_POST['obsrcuidadosesp'];
        $otrostratamieto            = $_POST['otrostratamieto'];
        
        //error_log(" hist ".$idhistoriapsico." ".$silabeo." ".$edadsilabeo." ".$observacionsilabeo);
        
        $actualizarDatosDlloLeng = $db->actualizarDlloLeng($idhistoria,
                                                            $idhistoriapsico,
                                                            $idpaciente,
                                                            $silabeo,
                                                            $edadsilabeo,
                                                            $observacionsilabeo,
                                                            $comprensionlenguaje,
                                                            $problemasarticulatorios,
                                                            $lenguajeinteligible,
                                                            $seleccionMaterna,
                                                            $edadmaterna,
                                                            $seleccionArtificial,
                                                            $edadartificial,
                                                            $seleccionMixta,
                                                            $edadmixta,
                                                            $succion,
                                                            $deglucion,
                                                            $sialorrea,
                                                            $apariciondientes,
                                                            $masticacion,
                                                            $liquidos,
                                                            $semisolidos,
                                                            $solidos,
                                                            $balanceado,
                                                            $comesolo,
                                                            $diurno,
                                                            $nocturno,
                                                            $enuresis,
                                                            $encopresis,
                                                            $vision,
                                                            $audicion,
                                                            $traumatismos,
                                                            $enfprimanos,
                                                            $controlcabeza,
                                                            $edadcontrolcabeza,
                                                            $sento,
                                                            $edadsento,
                                                            $gateo,
                                                            $edadgateo,
                                                            $camino,
                                                            $edadcamino,
                                                            $prefmanual,
                                                            $edadprefmanual,
                                                            $equilibrio,
                                                            $edadequilibrio,
                                                            $motfina,
                                                            $edadmotfina,
                                                            $motgruesa,
                                                            $edadmotgruesa,
                                                            $obsrmotor,
                                                            $succiondigital,
                                                            $edadsucciondigital,
                                                            $balanceo,
                                                            $edadbalanceo,
                                                            $onicofagia,
                                                            $musarana,
                                                            $golpea,
                                                            $arrancacabello,
                                                            $aleteo,
                                                            $otroscomportamientos,
                                                            $tranquilo,
                                                            $intranquilo,
                                                            $insonmio,
                                                            $duermesolo,
                                                            $conquienduerme,
                                                            $obsrsueno,
                                                            $inquieto,
                                                            $pasivo,
                                                            $distraido,
                                                            $impulsivo,
                                                            $sociable,
                                                            $destructor,
                                                            $peleador,
                                                            $desatento,
                                                            $timido,
                                                            $independiente,
                                                            $estanimocomun,
                                                            $fobias,
                                                            $juegopreferido,
                                                            $personaspreferidas,
                                                            $amigosfacil,
                                                            $compartejuego,
                                                            $fatigabilidad,
                                                            $conductasexual,
                                                            $obsrconducta,
                                                            $neurologia,
                                                            $tiemponeurologia,
                                                            $obsrneurologia,
                                                            $fonoaudiologia,
                                                            $tiempofonoaudiologia,
                                                            $obsrfonoaudiologia,
                                                            $teo,
                                                            $tiempoteo,
                                                            $obsrteo,
                                                            $fisioterapia,
                                                            $tiempofisioterapia,
                                                            $obsrfisioterapia,
                                                            $psico,
                                                            $tiempopsico,
                                                            $obsrpsico,
                                                            $farmacologio,
                                                            $tiempofarmacologio,
                                                            $obsrfarmacologio,
                                                            $cuidadosesp,
                                                            $tiempocuidadosesp,
                                                            $obsrcuidadosesp,
                                                            $otrostratamieto);

        if($actualizarDatosDlloLeng)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    if($opcion == "actualizarHistEscolar")
    {
        $idhistoria                 = $_POST['idhist'];
        $escolaridad                = $_POST['escolaridad'];
        $motivoEsc                  = $_POST['motivoEsc'];
        $edadnivelinicio            = $_POST['edadnivelinicio'];
        $nivelesrepitencia          = $_POST['nivelesrepitencia'];
        $cualesniveles              = $_POST['cualesniveles'];
        $areasdificultad            = $_POST['areasdificultad'];
        $aptitudhabilidadesdest     = $_POST['aptitudhabilidadesdest'];
        $procesoadaptador           = $_POST['procesoadaptador'];
        $actitudfrenteambesc        = $_POST['actitudfrenteambesc'];
        $apoyofamiliar              = $_POST['apoyofamiliar'];
        $observacinoesgen           = $_POST['observacinoesgen'];
        
        //error_log(" hist ".$idhistoriapsico." ".$silabeo." ".$edadsilabeo." ".$observacionsilabeo);
        
        $actualizarDatosHistEscolar = $db->actualizarHistEscolar($idhistoria,
                                                            $idpaciente,
                                                            $escolaridad,
                                                            $motivoEsc,
                                                            $edadnivelinicio,
                                                            $nivelesrepitencia,
                                                            $cualesniveles,
                                                            $areasdificultad,
                                                            $aptitudhabilidadesdest,
                                                            $procesoadaptador,
                                                            $actitudfrenteambesc,
                                                            $apoyofamiliar,
                                                            $observacinoesgen);

        if($actualizarDatosHistEscolar)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    
    if($opcion == "actualizarAlimentacion")
    {
        $idhistoria                 = $_POST['idhist'];
        $idhistoriapsico            = $_POST['idhistoriapsico'];
        $alimentacionayuda          = $_POST['alimentacionayuda'];
        $decidealimentos            = $_POST['decidealimentos'];
        $solido                     = $_POST['solido'];
        $semisolido                 = $_POST['semisolido'];
        $pure                       = $_POST['pure'];
        $compota                    = $_POST['compota'];
        $perdidapeso                = $_POST['perdidapeso'];
        $cuantoskilos               = $_POST['cuantoskilos'];
        $interesalimentarse         = $_POST['interesalimentarse'];
        $rechazoalimento            = $_POST['rechazoalimento'];
        $cualalimento               = $_POST['cualalimento'];
        $liquidoclaro               = $_POST['liquidoclaro'];
        $liquidoespeso              = $_POST['liquidoespeso'];
        $comerapido                 = $_POST['comerapido'];
        $actividadcome              = $_POST['actividadcome'];
        $cualactividad              = $_POST['cualactividad'];
        $saliva                     = $_POST['saliva'];
        $alimento                   = $_POST['alimento'];     
        $agua                       = $_POST['agua'];
        $observaciones              = $_POST['observaciones']; 
        $neumonias                  = $_POST['neumonias']; 
        $neumoniasfrec              = $_POST['neumoniasfrec']; 
        $ayudaparental              = $_POST['ayudaparental']; 
        $motivoayudaparental        = $_POST['motivoayudaparental']; 
        $cualayudaparental          = $_POST['cualayudaparental']; 
        $tiempoayudaparental        = $_POST['tiempoayudaparental']; 
        $comerestofamilia           = $_POST['comerestofamilia']; 
        $porquecomerestofamilia     = $_POST['porquecomerestofamilia']; 
        $comeotraspersonas          = $_POST['comeotraspersonas'];
        $obsrcomunicativos          = $_POST['obsrcomunicativos'];
        
        //error_log(" hist ".$idhistoriapsico." ".$silabeo." ".$edadsilabeo." ".$observacionsilabeo);
        
        $actualizarDatosAlimentacion = $db->actualizarAlimentacion($idhistoria,
                                                            $idhistoriapsico,
                                                            $idpaciente,
                                                            $alimentacionayuda,
                                                            $decidealimentos,
                                                            $solido,
                                                            $semisolido,
                                                            $pure,
                                                            $compota,
                                                            $perdidapeso,
                                                            $cuantoskilos,
                                                            $interesalimentarse,
                                                            $rechazoalimento,
                                                            $cualalimento,
                                                            $liquidoclaro,
                                                            $liquidoespeso,
                                                            $comerapido,
                                                            $actividadcome,
                                                            $cualactividad,
                                                            $saliva,
                                                            $alimento,
                                                            $agua,
                                                            $observaciones,
                                                            $neumonias,
                                                            $neumoniasfrec,
                                                            $ayudaparental,
                                                            $motivoayudaparental,
                                                            $cualayudaparental,
                                                            $tiempoayudaparental,
                                                            $comerestofamilia,
                                                            $porquecomerestofamilia,
                                                            $comeotraspersonas,
                                                            $obsrcomunicativos);

        if($actualizarDatosAlimentacion)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    if($opcion == "actualizarImpDiagnostica")
    {
        $idhistoria             = $_POST['idhist'];
        $idhistoriapsico        = $_POST['idhistoriapsico'];
        $impresiondiagnostica   = $_POST['impresiondiagnostica'];
        
        $actualizarDatosImpDiagnostica = $db->actualizarImpDiagnostica($idhistoria,
                                                            $idhistoriapsico,
                                                            $idpaciente,
                                                            $impresiondiagnostica);

        if($actualizarDatosImpDiagnostica)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    
    
    if($opcion == 'cargaTemporoEspacial'){
        $idbateria          = 4;
        $consultaTemporo    = $db->cargaTemporoEspacial($idpaciente, $idbateria, $idarea);
        
        if( $consultaTemporo != false )
        {
            for ( $te = 0; $te < sizeof($consultaTemporo); $te++ )
            {
                $idpregunta     = $consultaTemporo[$te]['idpregunta'];
                $pregunta       = $consultaTemporo[$te]['pregunta'];
                $idrespuesta    = $consultaTemporo[$te]['idrespuesta'];
                $observaciones  = $consultaTemporo[$te]['observaciones'];
                $respuesta      = $consultaTemporo[$te]['respuesta'];
                
                if($respuesta == 1){
                    $checked1       = "checked";
                    $checked2       = "";
                }else if($respuesta == 2){
                    $checked1       = "";
                    $checked2       = "checked";
                }else{
                    $checked1       = "";
                    $checked2       = "";
                }
                
                if($idpregunta == 95){
                    $datos .= "<div class='col-md-6'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaTemporoEspacial($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaTemporoEspacial($idpaciente,$idrespuesta)'>
                                    $nbsp
                                    <input name='observacion$idrespuesta' id='observacion$idrespuesta' onblur='respuestaTemporoEspacial($idpaciente,$idrespuesta)' type='hidden' class='form-control'>
                                </div>
                            </div>";
                }
                
                if($te == 0){
                    $datos .= "<div class='col-md-4'>
                                    <div class='form-group'>
                                        <label><b>Pregunta</b></label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <label><b>Respuesta</b></label>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label><b>Observaci&oacute;n</b></label>
                                    </div>
                                </div>";
                }
                
                if($idpregunta != 95){
                    $datos .= "<div class='col-md-4'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaTemporoEspacial($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaTemporoEspacial($idpaciente,$idrespuesta)'>
                                    $nbsp
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <input name='observacion$idrespuesta' id='observacion$idrespuesta' onblur='respuestaTemporoEspacial($idpaciente,$idrespuesta)' type='text' class='form-control' value='$observaciones'>
                                </div>
                            </div>";
                }
            }

            echo $datos;
        }
    }
    
    
    //////ACTUALIZA TEMPORO ESPACIAL


    if($opcion == "respuestaTemporoEspacial")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $idoption       = $_POST['idoption'];
        $texto          = $_POST['texto'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 4;

        $respuestaTemporoEspacial = $db->respuestaTemporoEspacial($idpaciente,
                                                                $idrespuesta,
                                                                $idoption,
                                                                $texto,
                                                                $idbateria,
                                                                $idarea);

        if($respuestaTemporoEspacial)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    ///////Evaluacion Habla
    if($opcion == 'cargaEvaluacionHabla'){
        $idbateria          = 5;
        $consultaEvalHabla    = $db->cargaEvaluacionHabla($idpaciente, $idbateria, $idarea);
        
        if( $consultaEvalHabla != false )
        {
            for ( $te = 0; $te < sizeof($consultaEvalHabla); $te++ )
            {
                $idpregunta     = $consultaEvalHabla[$te]['idpregunta'];
                $pregunta       = $consultaEvalHabla[$te]['pregunta'];
                $idrespuesta    = $consultaEvalHabla[$te]['idrespuesta'];
                $observaciones  = $consultaEvalHabla[$te]['observaciones'];
                $respuesta      = $consultaEvalHabla[$te]['respuesta'];
                
                $datos .= "<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>$pregunta</b></label>
                                    <textarea class='form-control' rows='3' id='obsHabla$idrespuesta' onblur='respuestaEvaluacionHabla($idpaciente,$idrespuesta)'>$observaciones</textarea>
                                </div>
                            </div>";
            }

            echo $datos;
        }
    }
    
    
    if($opcion == "respuestaEvaluacionHabla")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $texto          = $_POST['texto'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 5;

        $respuestaEvaluacionHabla = $db->respuestaEvaluacionHabla($idpaciente,
                                                                $idrespuesta,
                                                                $texto,
                                                                $idbateria,
                                                                $idarea);

        if($respuestaEvaluacionHabla)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    
    ///////Soporte Fisico
    if($opcion == 'cargaSoporteFisico'){
        $idbateria          = 6;
        $consultaTemporo    = $db->cargaSoporteFisico($idpaciente, $idbateria, $idarea);
        
        if( $consultaTemporo != false )
        {
            for ( $te = 0; $te < sizeof($consultaTemporo); $te++ )
            {
                $idpregunta     = $consultaTemporo[$te]['idpregunta'];
                $pregunta       = $consultaTemporo[$te]['pregunta'];
                $idrespuesta    = $consultaTemporo[$te]['idrespuesta'];
                $succion        = $consultaTemporo[$te]['succion'];
                $deglucion      = $consultaTemporo[$te]['deglucion'];
                $mordida        = $consultaTemporo[$te]['mordida'];
                $busqueda       = $consultaTemporo[$te]['busqueda'];
                $moro           = $consultaTemporo[$te]['moro'];
                $presionpalmar  = $consultaTemporo[$te]['presionpalmar'];
                $noaplica       = $consultaTemporo[$te]['noaplica'];
                $otros          = $consultaTemporo[$te]['otros'];
                $normal         = $consultaTemporo[$te]['normal'];
                $alterada       = $consultaTemporo[$te]['alterada'];
                $hipotonico     = $consultaTemporo[$te]['hipotonico'];
                $hipertonico    = $consultaTemporo[$te]['hipertonico'];
                $aumentada      = $consultaTemporo[$te]['aumentada'];
                $disminuida     = $consultaTemporo[$te]['disminuida'];
                
                if($succion == 1){$succion = "checked";}else{$succion = "";}
                if($deglucion == 1){$deglucion = "checked";}else{$deglucion = "";}
                if($mordida == 1){$mordida = "checked";}else{$mordida = "";}
                if($busqueda == 1){$busqueda = "checked";}else{$busqueda = "";}
                if($moro == 1){$moro = "checked";}else{$moro = "";}
                if($presionpalmar == 1){$presionpalmar = "checked";}else{$presionpalmar = "";}
                if($noaplica == 1){$noaplica = "checked";}else{$noaplica = "";}
                if($normal == 1){$normal = "checked";}else{$normal = "";}
                if($alterada == 1){$alterada = "checked";}else{$alterada = "";}
                if($hipotonico == 1){$hipotonico = "checked";}else{$hipotonico = "";}
                if($hipertonico == 1){$hipertonico = "checked";}else{$hipertonico = "";}
                if($aumentada == 1){$aumentada = "checked";}else{$aumentada = "";}
                if($disminuida == 1){$disminuida = "checked";}else{$disminuida = "";}
                
                if($idpregunta == 105){
                    $datos .= "<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>$pregunta:</b></label>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group'>
                                    <input name='succion' id='succion' type='checkbox' $succion onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"succion\", \"succion\")'>
                                    <label>Succi&oacute;n</label>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group'>
                                    <input name='deglucion' id='deglucion' type='checkbox' $deglucion onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"deglucion\", \"deglucion\")'>
                                    <label>Degluci&oacute;n</label>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group'>
                                    <input name='mordida' id='mordida' type='checkbox' $mordida onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"mordida\", \"mordida\")'>
                                    <label>Mordida</label>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group'>
                                    <input name='busqueda' id='busqueda' type='checkbox' $busqueda onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"busqueda\", \"busqueda\")'>
                                    <label>B&uacute;squeda</label>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group'>
                                    <input name='moro' id='moro' type='checkbox' $moro onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"moro\", \"moro\")'>
                                    <label>Moro</label>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group'>
                                    <input name='presionpalmar' id='presionpalmar' type='checkbox' $presionpalmar onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"presionpalmar\", \"presionpalmar\")'>
                                    <label>Presi&oacute;n palmar</label>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group'>
                                    <input name='noaplica' id='noaplica' type='checkbox' $noaplica onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"noaplica\", \"noaplica\")'>
                                    <label>No aplica</label>
                                </div>
                            </div>
                            <div class='col-md-12'>
                                <div class='form-group'>
                                    <label>Otros</label>
                                    <input name='otros' id='otros' type='text' class='form-control' value='$otros' onblur='respuestaSoporteFisico($idpaciente, $idrespuesta, \"otros\", \"otros\")'>
                                </div>
                            </div>
                            <hr>";
                }
                
                if($idpregunta == 106){
                    $datos .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>$pregunta:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='simetrianormal' id='simetrianormal' type='checkbox' $normal onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"normal\", \"simetrianormal\")'>
                                        <label>Normal</label>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <input name='simetriaalterada' id='simetriaalterada' type='checkbox' $alterada onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"alterada\", \"simetriaalterada\")'>
                                        <label>Alterada</label>
                                    </div>
                                </div>";
                    
                }
                
                if($idpregunta == 107){
                    $datos .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>$pregunta:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='tononormal' id='tononormal' type='checkbox' $normal onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"normal\", \"tononormal\")'>
                                        <label>Normal</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='tonohipotonico' id='tonohipotonico' type='checkbox' $hipotonico onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"hipotonico\", \"tonohipotonico\")'>
                                        <label>Hipot&oacute;nico</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='tonohipertonico' id='tonohipertonico' type='checkbox' $hipertonico onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"hipertonico\", \"tonohipertonico\")'>
                                        <label>Hipert&oacute;nico</label>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 108){
                    $datos .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>$pregunta:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='sensibilidadnormal' id='sensibilidadnormal' type='checkbox' $normal onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"normal\", \"sensibilidadnormal\")'>
                                        <label>Normal</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='sensibilidadAumentada' id='sensibilidadAumentada' type='checkbox' $aumentada onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"aumentada\", \"sensibilidadAumentada\")'>
                                        <label>Aumentada</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='sensibilidadDisminuida' id='sensibilidadDisminuida' type='checkbox' $disminuida onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"disminuida\", \"sensibilidadDisminuida\")'>
                                        <label>Disminuida</label>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 109){
                    $datos .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>$pregunta:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='movibilidadnormal' id='movibilidadnormal' type='checkbox' $normal onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"normal\", \"movibilidadnormal\")'>
                                        <label>Normal</label>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <input name='movilidadalterada' id='movilidadalterada' type='checkbox' $alterada onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"alterada\", \"movilidadalterada\")'>
                                        <label>Alterada</label>
                                    </div>
                                </div>";
                }
                
            }

            echo $datos;
        }
    }
    
    if($opcion == "respuestaSoporteFisico")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $campo          = $_POST['campo'];
        $idoption       = $_POST['idoption'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 6;

        $respuestaSoporteFisico = $db->respuestaSoporteFisico($idpaciente,
                                                                $idrespuesta,
                                                                $campo,
                                                                $idoption,
                                                                $idbateria,
                                                                $idarea);

        if($respuestaSoporteFisico)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    //Aspectos comunicativos
    
    if($opcion == 'cargaAspectosComunicativos'){
        $idbateria      = 7;
        $return_arrAC   = array();
        
        $cargaAspectosComunicativos    = $db->cargaAspectosComunicativos($idpaciente, $idbateria, $idarea);
        
        if( $cargaAspectosComunicativos != false )
        {
            for ( $i = 0; $i< sizeof($cargaAspectosComunicativos); $i++ )
            {
                $row_arrayAC['idrespuesta']     = $cargaAspectosComunicativos[$i]['idrespuesta'];
                $row_arrayAC['atenvisual']      = $cargaAspectosComunicativos[$i]['atenvisual'];
                $row_arrayAC['compmirobj']      = $cargaAspectosComunicativos[$i]['compmirobj'];
                $row_arrayAC['atenauditiva']    = $cargaAspectosComunicativos[$i]['atenauditiva'];
                $row_arrayAC['mireschabla']     = $cargaAspectosComunicativos[$i]['mireschabla'];
                $row_arrayAC['interinteracc']   = $cargaAspectosComunicativos[$i]['interinteracc'];
                $row_arrayAC['resordsenc']      = $cargaAspectosComunicativos[$i]['resordsenc'];
                $row_arrayAC['comcor']          = $cargaAspectosComunicativos[$i]['comcor'];
                $row_arrayAC['vocalintencom']   = $cargaAspectosComunicativos[$i]['vocalintencom'];
                $row_arrayAC['intercaras']      = $cargaAspectosComunicativos[$i]['intercaras'];
                $row_arrayAC['vocalarvar']      = $cargaAspectosComunicativos[$i]['vocalarvar'];
                $row_arrayAC['protoconv']       = $cargaAspectosComunicativos[$i]['protoconv'];
                $row_arrayAC['gestindi']        = $cargaAspectosComunicativos[$i]['gestindi'];
                $row_arrayAC['imitasilpal']     = $cargaAspectosComunicativos[$i]['imitasilpal'];
                $row_arrayAC['vocainv']         = $cargaAspectosComunicativos[$i]['vocainv'];
                $row_arrayAC['reconpal']        = $cargaAspectosComunicativos[$i]['reconpal'];
                $row_arrayAC['imitacion']       = $cargaAspectosComunicativos[$i]['imitacion'];
                $row_arrayAC['respordcomp']     = $cargaAspectosComunicativos[$i]['respordcomp'];
                
                array_push($return_arrAC, $row_arrayAC);
            }
            echo json_encode($return_arrAC);
        }
    }
    
    if($opcion == "respuestaAspectosComunicativos")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $campo          = $_POST['campo'];
        $idoption       = $_POST['idoption'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 7;

        $respuestaAspectosComunicativos = $db->respuestaAspectosComunicativos($idpaciente,
                                                                            $idrespuesta,
                                                                            $campo,
                                                                            $idoption,
                                                                            $idbateria,
                                                                            $idarea);

        if($respuestaAspectosComunicativos)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    
    ///////Componente fonologico
    if($opcion == 'cargaComponentefonologico'){
        $idbateria          = 8;
        $consultaCfonologico = $db->cargaComponentefonologico($idpaciente, $idbateria, $idarea);
        
        if( $consultaCfonologico != false )
        {
            for ( $te = 0; $te < sizeof($consultaCfonologico); $te++ )
            {
                $idpregunta     = $consultaCfonologico[$te]['idpregunta'];
                $pregunta       = $consultaCfonologico[$te]['pregunta'];
                $idrespuesta    = $consultaCfonologico[$te]['idrespuesta'];
                $sonfis_intel   = $consultaCfonologico[$te]['sonfis_intel'];
                $bal_semintel   = $consultaCfonologico[$te]['bal_semintel'];
                $juesil_inintel = $consultaCfonologico[$te]['juesil_inintel'];
                
                if($sonfis_intel == 1){$sonfis_intel = "checked";}else{$sonfis_intel = "";}
                if($bal_semintel == 1){$bal_semintel = "checked";}else{$bal_semintel = "";}
                if($juesil_inintel == 1){$juesil_inintel = "checked";}else{$juesil_inintel = "";}
                
                if($idpregunta == 111){
                    $datos .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>Desarrollo fonol&oacute;gico:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='sonfis' id='sonfis' type='checkbox' $sonfis_intel onclick='respuestaComponentefonologico($idpaciente, $idrespuesta, \"sonfis_intel\", \"sonfis\")'>
                                        <label>Sonidos fisiol&oacute;gicos</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='balbuceofon' id='balbuceofon' type='checkbox' $bal_semintel onclick='respuestaComponentefonologico($idpaciente, $idrespuesta, \"bal_semintel\", \"balbuceofon\")'>
                                        <label>Balbuceo</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='juegosilabico' id='juegosilabico' type='checkbox' $juesil_inintel onclick='respuestaComponentefonologico($idpaciente, $idrespuesta, \"juesil_inintel\", \"juegosilabico\")'>
                                        <label>Juego sil&aacute;bico</label>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 112){
                    $datos .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>Habla:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='inteligible' id='inteligible' type='checkbox' $sonfis_intel onclick='respuestaComponentefonologico($idpaciente, $idrespuesta, \"sonfis_intel\", \"inteligible\")'>
                                        <label>Inteligible</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='semiinteligible' id='semiinteligible' type='checkbox' $bal_semintel onclick='respuestaComponentefonologico($idpaciente, $idrespuesta, \"bal_semintel\", \"semiinteligible\")'>
                                        <label>Semi-Inteligible</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='ininteligible' id='ininteligible' type='checkbox' $juesil_inintel onclick='respuestaComponentefonologico($idpaciente, $idrespuesta, \"juesil_inintel\", \"ininteligible\")'>
                                        <label>Ininteligible</label>
                                    </div>
                                </div>";
                }
                
            }

            echo $datos;
        }
    }
    
    if($opcion == "respuestaComponentefonologico")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $campo          = $_POST['campo'];
        $idoption       = $_POST['idoption'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 8;

        $respuestaComponentefonologico = $db->respuestaComponentefonologico($idpaciente,
                                                                $idrespuesta,
                                                                $campo,
                                                                $idoption,
                                                                $idbateria,
                                                                $idarea);

        if($respuestaComponentefonologico)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    
    ///////Cuadro fonologico
    if($opcion == 'cargaCuadrofonologico'){
        $idbateria          = 9;
        $consultaCfonologico = $db->cargaCuadrofonologico($idpaciente, $idbateria, $idarea);
        
        if( $consultaCfonologico != false )
        {
            for ( $te = 0; $te < sizeof($consultaCfonologico); $te++ )
            {
                $idpregunta     = $consultaCfonologico[$te]['idpregunta'];
                $pregunta       = $consultaCfonologico[$te]['pregunta'];
                $idrespuesta    = $consultaCfonologico[$te]['idrespuesta'];
                $p              = $consultaCfonologico[$te]['p'];
                $b              = $consultaCfonologico[$te]['b'];
                $m              = $consultaCfonologico[$te]['m'];
                $s              = $consultaCfonologico[$te]['s'];
                $ch             = $consultaCfonologico[$te]['ch'];
                $t              = $consultaCfonologico[$te]['t'];
                $d              = $consultaCfonologico[$te]['d'];
                $f              = $consultaCfonologico[$te]['f'];
                $j              = $consultaCfonologico[$te]['j'];
                $k              = $consultaCfonologico[$te]['k'];
                $g              = $consultaCfonologico[$te]['g'];
                $l              = $consultaCfonologico[$te]['l'];
                $n              = $consultaCfonologico[$te]['n'];
                $ll             = $consultaCfonologico[$te]['ll'];
                $nn             = $consultaCfonologico[$te]['nn'];
                $r              = $consultaCfonologico[$te]['r'];
                $rr             = $consultaCfonologico[$te]['rr'];
                $observaciones  = $consultaCfonologico[$te]['observaciones'];
                
                if($p == 1){$p = "checked";}else{$p = "";}
                if($b == 1){$b = "checked";}else{$b = "";}
                if($m == 1){$m = "checked";}else{$m = "";}
                if($s == 1){$s = "checked";}else{$s = "";}
                if($ch == 1){$ch = "checked";}else{$ch = "";}
                if($t == 1){$t = "checked";}else{$t = "";}
                if($d == 1){$d = "checked";}else{$d = "";}
                if($f == 1){$f = "checked";}else{$f = "";}
                if($j == 1){$j = "checked";}else{$j = "";}
                if($k == 1){$k = "checked";}else{$k = "";}
                if($g == 1){$g = "checked";}else{$g = "";}
                if($l == 1){$l = "checked";}else{$l = "";}
                if($n == 1){$n = "checked";}else{$n = "";}
                if($ll == 1){$ll = "checked";}else{$ll = "";}
                if($nn == 1){$nn = "checked";}else{$nn = "";}
                if($r == 1){$r = "checked";}else{$r = "";}
                if($rr == 1){$rr = "checked";}else{$rr = "";}
                
                if($idpregunta == 113){
                    $datosCuadro .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>Sustituciones:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-9'>
                                    <div class='form-group'>
                                        <input name='sustitucionp' id='sustitucionp' type='checkbox' $p onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"p\", \"sustitucionp\")'>
                                        <label><b>p</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustitucionb' id='sustitucionb' type='checkbox' $b onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"b\", \"sustitucionb\")'>
                                        <label><b>B</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustitucionm' id='sustitucionm' type='checkbox' $m onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"m\", \"sustitucionm\")'>
                                        <label><b>M</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustitucions' id='sustitucions' type='checkbox' $s onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"s\", \"sustitucions\")'>
                                        <label><b>S</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustitucionch' id='sustitucionch' type='checkbox' $ch onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"ch\", \"sustitucionch\")'>
                                        <label><b>ch</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustituciont' id='sustituciont' type='checkbox' $t onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"t\", \"sustituciont\")'>
                                        <label><b>t</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustituciond' id='sustituciond' type='checkbox' $d onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"d\", \"sustituciond\")'>
                                        <label><b>D</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustitucionf' id='sustitucionf' type='checkbox' $f onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"f\", \"sustitucionf\")'>
                                        <label><b>f</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustitucionj' id='sustitucionj' type='checkbox' $j onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"j\", \"sustitucionj\")'>
                                        <label><b>j</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustitucionk' id='sustitucionk' type='checkbox' $k onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"k\", \"sustitucionk\")'>
                                        <label><b>k</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustituciong' id='sustituciong' type='checkbox' $g onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"g\", \"sustituciong\")'>
                                        <label><b>g</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustitucionl' id='sustitucionl' type='checkbox' $l onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"l\", \"sustitucionl\")'>
                                        <label><b>l</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustitucionn' id='sustitucionn' type='checkbox' $n onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"n\", \"sustitucionn\")'>
                                        <label><b>n</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustitucionll' id='sustitucionll' type='checkbox' $ll onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"ll\", \"sustitucionll\")'>
                                        <label><b>ll</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustitucionnn' id='sustitucionnn' type='checkbox' $nn onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"nn\", \"sustitucionnn\")'>
                                        <label><b>&ntilde;</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustitucionr' id='sustitucionr' type='checkbox' $r onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"r\", \"sustitucionr\")'>
                                        <label><b>r</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='sustitucionrr' id='sustitucionrr' type='checkbox' $rr onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"rr\", \"sustitucionrr\")'>
                                        <label><b>rr</b></label>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 114){
                    $datosCuadro .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>Distorsiones:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-9'>
                                    <div class='form-group'>
                                        <input name='distorcionp' id='distorcionp' type='checkbox' $p onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"p\", \"distorcionp\")'>
                                        <label><b>p</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorcionb' id='distorcionb' type='checkbox' $b onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"b\", \"distorcionb\")'>
                                        <label><b>B</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorcionm' id='distorcionm' type='checkbox' $m onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"m\", \"distorcionm\")'>
                                        <label><b>M</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorcions' id='distorcions' type='checkbox' $s onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"s\", \"distorcions\")'>
                                        <label><b>S</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorcionch' id='distorcionch' type='checkbox' $ch onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"ch\", \"distorcionch\")'>
                                        <label><b>ch</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorciont' id='distorciont' type='checkbox' $t onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"t\", \"distorciont\")'>
                                        <label><b>t</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorciond' id='distorciond' type='checkbox' $d onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"d\", \"distorciond\")'>
                                        <label><b>D</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorcionf' id='distorcionf' type='checkbox' $f onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"f\", \"distorcionf\")'>
                                        <label><b>f</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorcionj' id='distorcionj' type='checkbox' $j onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"j\", \"distorcionj\")'>
                                        <label><b>j</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorcionk' id='distorcionk' type='checkbox' $k onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"k\", \"distorcionk\")'>
                                        <label><b>k</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorciong' id='distorciong' type='checkbox' $g onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"g\", \"distorciong\")'>
                                        <label><b>g</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorcionl' id='distorcionl' type='checkbox' $l onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"l\", \"distorcionl\")'>
                                        <label><b>l</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorcionn' id='distorcionn' type='checkbox' $n onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"n\", \"distorcionn\")'>
                                        <label><b>n</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorcionll' id='distorcionll' type='checkbox' $ll onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"ll\", \"distorcionll\")'>
                                        <label><b>ll</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorcionnn' id='distorcionnn' type='checkbox' $nn onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"nn\", \"distorcionnn\")'>
                                        <label><b>&ntilde;</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorcionr' id='distorcionr' type='checkbox' $r onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"r\", \"distorcionr\")'>
                                        <label><b>r</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='distorcionrr' id='distorcionrr' type='checkbox' $rr onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"rr\", \"distorcionrr\")'>
                                        <label><b>rr</b></label>
                                    </div>
                                </div>";
                }
                if($idpregunta == 115){
                    $datosCuadro .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>Posici&oacute;n Inicial:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-9'>
                                    <div class='form-group'>
                                        <input name='inicialp' id='inicialp' type='checkbox' $p onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"p\", \"inicialp\")'>
                                        <label><b>p</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicialb' id='inicialb' type='checkbox' $b onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"b\", \"inicialb\")'>
                                        <label><b>B</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicialm' id='inicialm' type='checkbox' $m onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"m\", \"inicialm\")'>
                                        <label><b>M</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicials' id='inicials' type='checkbox' $s onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"s\", \"inicials\")'>
                                        <label><b>S</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicialch' id='inicialch' type='checkbox' $ch onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"ch\", \"inicialch\")'>
                                        <label><b>ch</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicialt' id='inicialt' type='checkbox' $t onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"t\", \"inicialt\")'>
                                        <label><b>t</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='iniciald' id='iniciald' type='checkbox' $d onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"d\", \"iniciald\")'>
                                        <label><b>D</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicialf' id='inicialf' type='checkbox' $f onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"f\", \"inicialf\")'>
                                        <label><b>f</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicialj' id='inicialj' type='checkbox' $j onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"j\", \"inicialj\")'>
                                        <label><b>j</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicialk' id='inicialk' type='checkbox' $k onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"k\", \"inicialk\")'>
                                        <label><b>k</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicialg' id='inicialg' type='checkbox' $g onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"g\", \"inicialg\")'>
                                        <label><b>g</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='iniciall' id='iniciall' type='checkbox' $l onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"l\", \"iniciall\")'>
                                        <label><b>l</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicialn' id='inicialn' type='checkbox' $n onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"n\", \"inicialn\")'>
                                        <label><b>n</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicialll' id='inicialll' type='checkbox' $ll onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"ll\", \"inicialll\")'>
                                        <label><b>ll</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicialnn' id='inicialnn' type='checkbox' $nn onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"nn\", \"inicialnn\")'>
                                        <label><b>&ntilde;</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicialr' id='inicialr' type='checkbox' $r onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"r\", \"inicialr\")'>
                                        <label><b>r</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='inicialrr' id='inicialrr' type='checkbox' $rr onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"rr\", \"inicialrr\")'>
                                        <label><b>rr</b></label>
                                    </div>
                                </div>";
                }
                if($idpregunta == 116){
                    $datosCuadro .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>Posici&oacute;n Media:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-9'>
                                    <div class='form-group'>
                                        <input name='mediap' id='mediap' type='checkbox' $p onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"p\", \"mediap\")'>
                                        <label><b>p</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='mediab' id='mediab' type='checkbox' $b onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"b\", \"mediab\")'>
                                        <label><b>B</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='mediam' id='mediam' type='checkbox' $m onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"m\", \"mediam\")'>
                                        <label><b>M</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='medias' id='medias' type='checkbox' $s onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"s\", \"medias\")'>
                                        <label><b>S</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='mediach' id='mediach' type='checkbox' $ch onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"ch\", \"mediach\")'>
                                        <label><b>ch</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='mediat' id='mediat' type='checkbox' $t onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"t\", \"mediat\")'>
                                        <label><b>t</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='mediad' id='mediad' type='checkbox' $d onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"d\", \"mediad\")'>
                                        <label><b>D</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='mediaf' id='mediaf' type='checkbox' $f onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"f\", \"mediaf\")'>
                                        <label><b>f</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='mediaj' id='mediaj' type='checkbox' $j onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"j\", \"mediaj\")'>
                                        <label><b>j</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='mediak' id='mediak' type='checkbox' $k onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"k\", \"mediak\")'>
                                        <label><b>k</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='mediag' id='mediag' type='checkbox' $g onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"g\", \"mediag\")'>
                                        <label><b>g</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='medial' id='medial' type='checkbox' $l onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"l\", \"medial\")'>
                                        <label><b>l</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='median' id='median' type='checkbox' $n onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"n\", \"median\")'>
                                        <label><b>n</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='mediall' id='mediall' type='checkbox' $ll onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"ll\", \"mediall\")'>
                                        <label><b>ll</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='mediann' id='mediann' type='checkbox' $nn onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"nn\", \"mediann\")'>
                                        <label><b>&ntilde;</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='mediar' id='mediar' type='checkbox' $r onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"r\", \"mediar\")'>
                                        <label><b>r</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='mediarr' id='mediarr' type='checkbox' $rr onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"rr\", \"mediarr\")'>
                                        <label><b>rr</b></label>
                                    </div>
                                </div>";
                }
                if($idpregunta == 117){
                    $datosCuadro .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>Posici&oacute;n Final:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-9'>
                                    <div class='form-group'>
                                        <input name='finalp' id='finalp' type='checkbox' $p onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"p\", \"finalp\")'>
                                        <label><b>p</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finalb' id='finalb' type='checkbox' $b onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"b\", \"finalb\")'>
                                        <label><b>B</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finalm' id='finalm' type='checkbox' $m onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"m\", \"finalm\")'>
                                        <label><b>M</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finals' id='finals' type='checkbox' $s onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"s\", \"finals\")'>
                                        <label><b>S</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finalch' id='finalch' type='checkbox' $ch onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"ch\", \"finalch\")'>
                                        <label><b>ch</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finalt' id='finalt' type='checkbox' $t onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"t\", \"finalt\")'>
                                        <label><b>t</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finald' id='finald' type='checkbox' $d onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"d\", \"finald\")'>
                                        <label><b>D</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finalf' id='finalf' type='checkbox' $f onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"f\", \"finalf\")'>
                                        <label><b>f</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finalj' id='finalj' type='checkbox' $j onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"j\", \"finalj\")'>
                                        <label><b>j</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finalk' id='finalk' type='checkbox' $k onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"k\", \"finalk\")'>
                                        <label><b>k</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finalg' id='finalg' type='checkbox' $g onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"g\", \"finalg\")'>
                                        <label><b>g</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finall' id='finall' type='checkbox' $l onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"l\", \"finall\")'>
                                        <label><b>l</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finaln' id='finaln' type='checkbox' $n onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"n\", \"finaln\")'>
                                        <label><b>n</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finalll' id='finalll' type='checkbox' $ll onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"ll\", \"finalll\")'>
                                        <label><b>ll</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finalnn' id='finalnn' type='checkbox' $nn onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"nn\", \"finalnn\")'>
                                        <label><b>&ntilde;</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finalr' id='finalr' type='checkbox' $r onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"r\", \"finalr\")'>
                                        <label><b>r</b></label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='finalrr' id='finalrr' type='checkbox' $rr onclick='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"rr\", \"finalrr\")'>
                                        <label><b>rr</b></label>
                                    </div>
                                </div>";
                }
                if($idpregunta == 118){
                    $datosCuadro .= "<div class='col-md-12'>
                                        <div class='form-group'>
                                            <label><b>Observaciones</b></label>
                                            <textarea class='form-control' rows='4' id='observacionesfono' onblur='respuestaCuadrofonologico($idpaciente, $idrespuesta, \"observaciones\", \"observacionesfono\")'>$observaciones</textarea>
                                        </div>
                                    </div>";
                }
            }

            echo $datosCuadro;
        }
    }
    
    if($opcion == "respuestaCuadrofonologico")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $campo          = $_POST['campo'];
        $idoption       = $_POST['idoption'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 9;

        $respuestaCuadrofonologico = $db->respuestaCuadrofonologico($idpaciente,
                                                                $idrespuesta,
                                                                $campo,
                                                                $idoption,
                                                                $idbateria,
                                                                $idarea);

        if($respuestaCuadrofonologico)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    ///////Componente semantico
    if($opcion == 'cargaComponenteSemantico'){
        $idbateria          = 10;
        $consultaCSemantico = $db->cargaComponenteSemantico($idpaciente, $idbateria, $idarea);
        
        if( $consultaCSemantico != false )
        {
            for ( $te = 0; $te < sizeof($consultaCSemantico); $te++ )
            {
                $idpregunta     = $consultaCSemantico[$te]['idpregunta'];
                $pregunta       = $consultaCSemantico[$te]['pregunta'];
                $idrespuesta    = $consultaCSemantico[$te]['idrespuesta'];
                $id_cau_ef      = $consultaCSemantico[$te]['id_cau_ef'];
                $nom_lug_obj    = $consultaCSemantico[$te]['nom_lug_obj'];
                $clas_temp      = $consultaCSemantico[$te]['clas_temp'];
                $def_med_fin    = $consultaCSemantico[$te]['def_med_fin'];
                
                if($id_cau_ef == 1){$id_cau_ef = "checked";}else{$id_cau_ef = "";}
                if($nom_lug_obj == 1){$nom_lug_obj = "checked";}else{$nom_lug_obj = "";}
                if($clas_temp == 1){$clas_temp = "checked";}else{$clas_temp = "";}
                if($def_med_fin == 1){$def_med_fin = "checked";}else{$def_med_fin = "";}
                
                if($idpregunta == 119){
                    $datos .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>Uso y comprensi&oacute;n de categor&iacute;as:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='identifica' id='identifica' type='checkbox' $id_cau_ef onclick='respuestaComponenteSemantico($idpaciente, $idrespuesta, \"id_cau_ef\", \"identifica\")'>
                                        <label>Identifica</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='nomina' id='nomina' type='checkbox' $nom_lug_obj onclick='respuestaComponenteSemantico($idpaciente, $idrespuesta, \"nom_lug_obj\", \"nomina\")'>
                                        <label>Nomina</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='clasifica' id='clasifica' type='checkbox' $clas_temp onclick='respuestaComponenteSemantico($idpaciente, $idrespuesta, \"clas_temp\", \"clasifica\")'>
                                        <label>Clasifica</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='define' id='define' type='checkbox' $def_med_fin onclick='respuestaComponenteSemantico($idpaciente, $idrespuesta, \"def_med_fin\", \"define\")'>
                                        <label>Define</label>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 120){
                    $datos .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>Relaciones sem&aacute;nticas:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='causaefecto' id='causaefecto' type='checkbox' $id_cau_ef onclick='respuestaComponenteSemantico($idpaciente, $idrespuesta, \"id_cau_ef\", \"causaefecto\")'>
                                        <label>Causa / Efecto</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='lugarobjeto' id='lugarobjeto' type='checkbox' $nom_lug_obj onclick='respuestaComponenteSemantico($idpaciente, $idrespuesta, \"nom_lug_obj\", \"lugarobjeto\")'>
                                        <label>Lugar / Objeto</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='temporales' id='temporales' type='checkbox' $clas_temp onclick='respuestaComponenteSemantico($idpaciente, $idrespuesta, \"clas_temp\", \"temporales\")'>
                                        <label>Temporales</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='mediofin' id='mediofin' type='checkbox' $def_med_fin onclick='respuestaComponenteSemantico($idpaciente, $idrespuesta, \"def_med_fin\", \"mediofin\")'>
                                        <label>Medio / Fin</label>
                                    </div>
                                </div>";
                }
                
            }

            echo $datos;
        }
    }
    
    if($opcion == "respuestaComponenteSemantico")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $campo          = $_POST['campo'];
        $idoption       = $_POST['idoption'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 10;

        $respuestaComponenteSemantico = $db->respuestaComponenteSemantico($idpaciente,
                                                                $idrespuesta,
                                                                $campo,
                                                                $idoption,
                                                                $idbateria,
                                                                $idarea);

        if($respuestaComponenteSemantico)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    ///////Componente Morfosintatico
    if($opcion == 'cargaComponenteMorfosintactico'){
        $idbateria          = 11;
        $consultaCMorfosintactico = $db->cargaComponenteMorfosintactico($idpaciente, $idbateria, $idarea);
        
        if( $consultaCMorfosintactico != false )
        {
            for ( $te = 0; $te < sizeof($consultaCMorfosintactico); $te++ )
            {
                $idpregunta     = $consultaCMorfosintactico[$te]['idpregunta'];
                $pregunta       = $consultaCMorfosintactico[$te]['pregunta'];
                $idrespuesta    = $consultaCMorfosintactico[$te]['idrespuesta'];
                $articulos      = $consultaCMorfosintactico[$te]['articulos'];
                $sustantivos    = $consultaCMorfosintactico[$te]['sustantivos'];
                $verbos         = $consultaCMorfosintactico[$te]['verbos'];
                $adjetivos      = $consultaCMorfosintactico[$te]['adjetivos'];
                $preposiciones  = $consultaCMorfosintactico[$te]['preposiciones'];
                $genero         = $consultaCMorfosintactico[$te]['genero'];
                $numero         = $consultaCMorfosintactico[$te]['numero'];
                $diminutivo     = $consultaCMorfosintactico[$te]['diminutivo'];
                $tiempo         = $consultaCMorfosintactico[$te]['tiempo'];
                $frasessimples  = $consultaCMorfosintactico[$te]['frasessimples'];
                $frasescomplejas = $consultaCMorfosintactico[$te]['frasescomplejas'];
                
                if($articulos == 1){$articulos = "checked";}else{$articulos = "";}
                if($sustantivos == 1){$sustantivos = "checked";}else{$sustantivos = "";}
                if($verbos == 1){$verbos = "checked";}else{$verbos = "";}
                if($adjetivos == 1){$adjetivos = "checked";}else{$adjetivos = "";}
                if($preposiciones == 1){$preposiciones = "checked";}else{$preposiciones = "";}
                if($genero == 1){$genero = "checked";}else{$genero = "";}
                if($numero == 1){$numero = "checked";}else{$numero = "";}
                if($diminutivo == 1){$diminutivo = "checked";}else{$diminutivo = "";}
                if($tiempo == 1){$tiempo = "checked";}else{$tiempo = "";}
                if($frasessimples == 1){$frasessimples = "checked";}else{$frasessimples = "";}
                if($frasescomplejas == 1){$frasescomplejas = "checked";}else{$frasescomplejas = "";}
                
                if($idpregunta == 121){
                    $datos .= "<div class='col-md-12'>
                                    <div class='form-group'>
                                        <label><b>Uso y comprensi&oacute;n de:</b></label>
                                    </div><!-- .form-group -->
                                </div><!-- .col-md-4 -->
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='articulos' id='articulos' type='checkbox' $articulos onclick='respuestaComponenteMorfosintactico($idpaciente, $idrespuesta, \"articulos\", \"articulos\")'>
                                        <label>Art&iacute;culos</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='sustantivos' id='sustantivos' type='checkbox' $sustantivos onclick='respuestaComponenteMorfosintactico($idpaciente, $idrespuesta, \"sustantivos\", \"sustantivos\")'>
                                        <label>Sustantivos</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='verbos' id='verbos' type='checkbox' $verbos onclick='respuestaComponenteMorfosintactico($idpaciente, $idrespuesta, \"verbos\", \"verbos\")'>
                                        <label>Verbos</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='adjetivos' id='adjetivos' type='checkbox' $adjetivos onclick='respuestaComponenteMorfosintactico($idpaciente, $idrespuesta, \"adjetivos\", \"adjetivos\")'>
                                        <label>Adjetivos</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='preposiciones' id='preposiciones' type='checkbox' $preposiciones onclick='respuestaComponenteMorfosintactico($idpaciente, $idrespuesta, \"preposiciones\", \"preposiciones\")'>
                                        <label>Preposiciones</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='genero' id='genero' type='checkbox' $genero onclick='respuestaComponenteMorfosintactico($idpaciente, $idrespuesta, \"genero\", \"genero\")'>
                                        <label>G&eacute;nero</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='numero' id='numero' type='checkbox' $numero onclick='respuestaComponenteMorfosintactico($idpaciente, $idrespuesta, \"numero\", \"numero\")'>
                                        <label>N&uacute;mero</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='diminutivo' id='diminutivo' type='checkbox' $diminutivo onclick='respuestaComponenteMorfosintactico($idpaciente, $idrespuesta, \"diminutivo\", \"diminutivo\")'>
                                        <label>Diminutivo</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='' id='tiempo' type='checkbox' $tiempo onclick='respuestaComponenteMorfosintactico($idpaciente, $idrespuesta, \"tiempo\", \"tiempo\")'>
                                        <label>Tiempo</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='frasessimples' id='frasessimples' type='checkbox' $frasessimples onclick='respuestaComponenteMorfosintactico($idpaciente, $idrespuesta, \"frasessimples\", \"frasessimples\")'>
                                        <label>Frases simples</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <input name='frasescomplejas' id='frasescomplejas' type='checkbox' $frasescomplejas onclick='respuestaComponenteMorfosintactico($idpaciente, $idrespuesta, \"frasescomplejas\", \"frasescomplejas\")'>
                                        <label>Frases complejas</label>
                                    </div>
                                </div>";
                }
                
                
                
            }

            echo $datos;
        }
    }
    
    if($opcion == "respuestaComponenteMorfosintactico")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $campo          = $_POST['campo'];
        $idoption       = $_POST['idoption'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 11;

        $respuestaComponenteMorfosintactico = $db->respuestaComponenteMorfosintactico($idpaciente,
                                                                $idrespuesta,
                                                                $campo,
                                                                $idoption,
                                                                $idbateria,
                                                                $idarea);

        if($respuestaComponenteMorfosintactico)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    ///////Componente Pragmatico
    if($opcion == 'cargaComponentePragmatico'){
        $idbateria          = 11;
        $consultaCPragmatico = $db->cargaComponentePragmatico($idpaciente, $idbateria, $idarea);
        
        if( $consultaCPragmatico != false )
        {
            for ( $te = 0; $te < sizeof($consultaCPragmatico); $te++ )
            {
                $idpregunta     = $consultaCPragmatico[$te]['idpregunta'];
                $pregunta       = $consultaCPragmatico[$te]['pregunta'];
                $idrespuesta    = $consultaCPragmatico[$te]['idrespuesta'];
                $contvisual     = $consultaCPragmatico[$te]['contvisual'];
                $iniconver      = $consultaCPragmatico[$te]['iniconver'];
                $ansiedad       = $consultaCPragmatico[$te]['ansiedad'];
                $finaltema      = $consultaCPragmatico[$te]['finaltema'];
                $initema        = $consultaCPragmatico[$te]['initema'];
                $mantema        = $consultaCPragmatico[$te]['mantema'];
                $cambtema       = $consultaCPragmatico[$te]['cambtema'];
                $curiosidad     = $consultaCPragmatico[$te]['curiosidad'];
                $saludo         = $consultaCPragmatico[$te]['saludo'];
                $enojo          = $consultaCPragmatico[$te]['enojo'];
                $inicom         = $consultaCPragmatico[$te]['inicom'];
                $alturno        = $consultaCPragmatico[$te]['alturno'];
                $sentevent      = $consultaCPragmatico[$te]['sentevent'];
                
                if($contvisual == 1){$contvisual = "checked";}else{$contvisual = "";}
                if($iniconver == 1){$iniconver = "checked";}else{$iniconver = "";}
                if($ansiedad == 1){$ansiedad = "checked";}else{$ansiedad = "";}
                if($finaltema == 1){$finaltema = "checked";}else{$finaltema = "";}
                if($initema == 1){$initema = "checked";}else{$initema = "";}
                if($mantema == 1){$mantema = "checked";}else{$mantema = "";}
                if($cambtema == 1){$cambtema = "checked";}else{$cambtema = "";}
                if($curiosidad == 1){$curiosidad = "checked";}else{$curiosidad = "";}
                if($saludo == 1){$saludo = "checked";}else{$saludo = "";}
                if($enojo == 1){$enojo = "checked";}else{$enojo = "";}
                if($inicom == 1){$inicom = "checked";}else{$inicom = "";}
                if($alturno == 1){$alturno = "checked";}else{$alturno = "";}
                if($sentevent == 1){$sentevent = "checked";}else{$sentevent = "";}
                
                if($idpregunta == 122){
                    $datos .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='contvisual' id='contvisual' type='checkbox' $contvisual onclick='respuestaComponentePragmatico($idpaciente, $idrespuesta, \"contvisual\", \"contvisual\")'>
                                        <label>Contacto visual</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='iniconver' id='iniconver' type='checkbox' $iniconver onclick='respuestaComponentePragmatico($idpaciente, $idrespuesta, \"iniconver\", \"iniconver\")'>
                                        <label>Inicio de conversaci&oacute;n</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='ansiedad' id='ansiedad' type='checkbox' $ansiedad onclick='respuestaComponentePragmatico($idpaciente, $idrespuesta, \"ansiedad\", \"ansiedad\")'>
                                        <label>Ansiedad</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='finaltema' id='finaltema' type='checkbox' $finaltema onclick='respuestaComponentePragmatico($idpaciente, $idrespuesta, \"finaltema\", \"finaltema\")'>
                                        <label>Finaliza tema</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='initema' id='initema' type='checkbox' $initema onclick='respuestaComponentePragmatico($idpaciente, $idrespuesta, \"initema\", \"initema\")'>
                                        <label>Inicia tema</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='mantema' id='mantema' type='checkbox' $mantema onclick='respuestaComponentePragmatico($idpaciente, $idrespuesta, \"mantema\", \"mantema\")'>
                                        <label>Mantiene tema</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='cambtema' id='cambtema' type='checkbox' $cambtema onclick='respuestaComponentePragmatico($idpaciente, $idrespuesta, \"cambtema\", \"cambtema\")'>
                                        <label>Cambia tema</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='curiosidad' id='curiosidad' type='checkbox' $curiosidad onclick='respuestaComponentePragmatico($idpaciente, $idrespuesta, \"curiosidad\", \"curiosidad\")'>
                                        <label>Curiosidad</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='saludo' id='saludo' type='checkbox' $saludo onclick='respuestaComponentePragmatico($idpaciente, $idrespuesta, \"saludo\", \"saludo\")'>
                                        <label>Saludo</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='enojo' id='enojo' type='checkbox' $enojo onclick='respuestaComponentePragmatico($idpaciente, $idrespuesta, \"enojo\", \"enojo\")'>
                                        <label>Enojo</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='inicom' id='inicom' type='checkbox' $inicom onclick='respuestaComponentePragmatico($idpaciente, $idrespuesta, \"inicom\", \"inicom\")'>
                                        <label>Iniciativa comunicativa</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='alturno' id='alturno' type='checkbox' $alturno onclick='respuestaComponentePragmatico($idpaciente, $idrespuesta, \"alturno\", \"alturno\")'>
                                        <label>Alternancia de Turno</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='sentevent' id='sentevent' type='checkbox' $sentevent onclick='respuestaComponentePragmatico($idpaciente, $idrespuesta, \"sentevent\", \"sentevent\")'>
                                        <label>Sentido del Evento</label>
                                    </div>
                                </div>";
                }
                
                
                
            }

            echo $datos;
        }
    }
    
    if($opcion == "respuestaComponentePragmatico")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $campo          = $_POST['campo'];
        $idoption       = $_POST['idoption'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 12;

        $respuestaComponentePragmatico = $db->respuestaComponentePragmatico($idpaciente,
                                                                $idrespuesta,
                                                                $campo,
                                                                $idoption,
                                                                $idbateria,
                                                                $idarea);

        if($respuestaComponentePragmatico)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    
    /////// Lenguaje Expresivo
    if($opcion == 'cargaLenguajeExpresivo'){
        $idbateria          = 13;
        $consultaLExpresivo = $db->cargaLenguajeExpresivo($idpaciente, $idbateria, $idarea);
        
        if( $consultaLExpresivo != false )
        {
            for ( $te = 0; $te < sizeof($consultaLExpresivo); $te++ )
            {
                $idpregunta     = $consultaLExpresivo[$te]['idpregunta'];
                $pregunta       = $consultaLExpresivo[$te]['pregunta'];
                $idrespuesta    = $consultaLExpresivo[$te]['idrespuesta'];
                $normal_si      = $consultaLExpresivo[$te]['normal_si'];
                $alterado_no    = $consultaLExpresivo[$te]['alterado_no'];
                
                if($normal_si == 1){$normal_si = "checked";}else{$normal_si = "";}
                if($alterado_no == 1){$alterado_no = "checked";}else{$alterado_no = "";}
                
                if($idpregunta == 123){
                    $datos .= "<div class='col-md-6'>
                                    <div class='form-group'>
                                        <label><b>Lenguaje espont&aacute;neo</b></label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='esp_normal_si' id='esp_normal_si' type='checkbox' $normal_si onclick='respuestaLenguajeExpresivo($idpaciente, $idrespuesta, \"normal_si\", \"esp_normal_si\")'>
                                        <label>Normal</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='esp_alterado_no' id='esp_alterado_no' type='checkbox' $alterado_no onclick='respuestaLenguajeExpresivo($idpaciente, $idrespuesta, \"alterado_no\", \"esp_alterado_no\")'>
                                        <label>Alterado</label>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 124){
                    $datos .= "<div class='col-md-6'>
                                    <div class='form-group'>
                                        <label><b>Lenguaje autom&aacute;tico</b></label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='aut_normal_si' id='aut_normal_si' type='checkbox' $normal_si onclick='respuestaLenguajeExpresivo($idpaciente, $idrespuesta, \"normal_si\", \"aut_normal_si\")'>
                                        <label>Normal</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='aut_alterado_no' id='aut_alterado_no' type='checkbox' $alterado_no onclick='respuestaLenguajeExpresivo($idpaciente, $idrespuesta, \"alterado_no\", \"aut_alterado_no\")'>
                                        <label>Alterado</label>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 125){
                    $datos .= "<div class='col-md-6'>
                                    <div class='form-group'>
                                        <label><b>Saludo y despedida espont&aacute;neos o por imitaci&oacute;n</b></label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='sal_normal_si' id='sal_normal_si' type='checkbox' $normal_si onclick='respuestaLenguajeExpresivo($idpaciente, $idrespuesta, \"normal_si\", \"sal_normal_si\")'>
                                        <label>Normal</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='sal_alterado_no' id='sal_alterado_no' type='checkbox' $alterado_no onclick='respuestaLenguajeExpresivo($idpaciente, $idrespuesta, \"alterado_no\", \"sal_alterado_no\")'>
                                        <label>Alterado</label>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 126){
                    $datos .= "<div class='col-md-6'>
                                    <div class='form-group'>
                                        <label><b>Imita praxias</b></label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='pra_normal_si' id='pra_normal_si' type='checkbox' $normal_si onclick='respuestaLenguajeExpresivo($idpaciente, $idrespuesta, \"normal_si\", \"pra_normal_si\")'>
                                        <label>Normal</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input name='pra_alterado_no' id='pra_alterado_no' type='checkbox' $alterado_no onclick='respuestaLenguajeExpresivo($idpaciente, $idrespuesta, \"alterado_no\", \"pra_alterado_no\")'>
                                        <label>Alterado</label>
                                    </div>
                                </div>";
                }
                
            }

            echo $datos;
        }
    }
    
    if($opcion == "respuestaLenguajeExpresivo")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $campo          = $_POST['campo'];
        $idoption       = $_POST['idoption'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 13;

        $respuestaLenguajeExpresivo = $db->respuestaLenguajeExpresivo($idpaciente,
                                                                $idrespuesta,
                                                                $campo,
                                                                $idoption,
                                                                $idbateria,
                                                                $idarea);

        if($respuestaLenguajeExpresivo)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    ///////Lenguaje Expresivo
    if($opcion == 'cargaLenguajeExpresivo2'){
        $idbateria          = 13;
        $consultaLExpresivo2 = $db->cargaLenguajeExpresivo2($idpaciente, $idbateria, $idarea);
        
        if( $consultaLExpresivo2 != false )
        {
            for ( $te = 0; $te < sizeof($consultaLExpresivo2); $te++ )
            {
                $idpregunta     = $consultaLExpresivo2[$te]['idpregunta'];
                $pregunta       = $consultaLExpresivo2[$te]['pregunta'];
                $idrespuesta    = $consultaLExpresivo2[$te]['idrespuesta'];
                $respuesta      = $consultaLExpresivo2[$te]['respuesta'];
                
                if($respuesta == 1){
                    $checked1       = "checked";
                    $checked2       = "";
                }else if($respuesta == 2){
                    $checked1       = "";
                    $checked2       = "checked";
                }else{
                    $checked1       = "";
                    $checked2       = "";
                }
                
                if($idpregunta == 127){
                    $datos .= "<div class='col-md-6'>
                                <div class='form-group'>
                                    <label><b>$pregunta</b></label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'>
                                </div>
                            </div>";
                }
                
                if($idpregunta == 128){
                    $datos .= "<div class='col-md-6'>
                                <div class='form-group'>
                                    <label><b>$pregunta</b></label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'>
                                </div>
                            </div>";
                }
                
                if($idpregunta == 129){
                    $datos .= "<div class='col-md-6'>
                                <div class='form-group'>
                                    <label><b>$pregunta</b></label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'>
                                </div>
                            </div>";
                }
                
                if($idpregunta == 130){
                    $datos .= "<div class='col-md-6'>
                                <div class='form-group'>
                                    <label><b>$pregunta</b></label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class='form-group'>
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'>
                                </div>
                            </div>";
                            
                    $datos .="<hr>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label><b>Emite o utiliza:</b></label>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 131){
                    $datos .= "<div class='col-md-6'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'>
                                </div>
                            </div>";
                }
                
                if($idpregunta == 132){
                    $datos .= "<div class='col-md-6'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'>
                                </div>
                            </div>";
                }
                
                if($idpregunta == 133){
                    $datos .= "<div class='col-md-6'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'>
                                </div>
                            </div>";
                }
                
                if($idpregunta == 134){
                    $datos .= "<div class='col-md-6'>
                                <div class='form-group'>
                                    <label>$pregunta</label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaLenguajeExpresivo2($idpaciente,$idrespuesta)'>
                                </div>
                            </div>";
                }
                
            }

            echo $datos;
        }
    }
    
    if($opcion == "respuestaLenguajeExpresivo2")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $idoption       = $_POST['idoption'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 13;

        $respuestaLenguajeExpresivo2 = $db->respuestaLenguajeExpresivo2($idpaciente,
                                                                $idrespuesta,
                                                                $idoption,
                                                                $idbateria,
                                                                $idarea);

        if($respuestaLenguajeExpresivo2)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    
    ///////Lenguaje Comprensivo
    if($opcion == 'cargaLenguajeComprensivo'){
        $idbateria          = 14;
        $consultaLComprensivo = $db->cargaLenguajeComprensivo($idpaciente, $idbateria, $idarea);
        
        if( $consultaLComprensivo != false )
        {
            for ( $te = 0; $te < sizeof($consultaLComprensivo); $te++ )
            {
                $idpregunta     = $consultaLComprensivo[$te]['idpregunta'];
                $pregunta       = $consultaLComprensivo[$te]['pregunta'];
                $idrespuesta    = $consultaLComprensivo[$te]['idrespuesta'];
                $respuesta      = $consultaLComprensivo[$te]['respuesta'];
                
                if($respuesta == 1){
                    $checked1       = "checked";
                    $checked2       = "";
                }else if($respuesta == 2){
                    $checked1       = "";
                    $checked2       = "checked";
                }else{
                    $checked1       = "";
                    $checked2       = "";
                }
                
                if($idpregunta == 135){
                    $datos .= "<div class='col-md-6'>
                                <div class='form-group'>
                                    <label><b>$pregunta</b></label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaLenguajeComprensivo($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaLenguajeComprensivo($idpaciente,$idrespuesta)'>
                                </div>
                            </div>";
                }
                
                if($idpregunta == 136){
                    $datos .= "<div class='col-md-6'>
                                <div class='form-group'>
                                    <label><b>$pregunta</b></label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaLenguajeComprensivo($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaLenguajeComprensivo($idpaciente,$idrespuesta)'>
                                </div>
                            </div>";
                }
                
                if($idpregunta == 137){
                    $datos .= "<div class='col-md-6'>
                                <div class='form-group'>
                                    <label><b>$pregunta</b></label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaLenguajeComprensivo($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaLenguajeComprensivo($idpaciente,$idrespuesta)'>
                                </div>
                            </div>";
                }
            }

            echo $datos;
        }
    }
    
    if($opcion == "respuestaLenguajeComprensivo")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $idoption       = $_POST['idoption'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 14;

        $respuestaLenguajeComprensivo = $db->respuestaLenguajeComprensivo($idpaciente,
                                                                $idrespuesta,
                                                                $idoption,
                                                                $idbateria,
                                                                $idarea);

        if($respuestaLenguajeComprensivo)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    
    ///////Audicion
    if($opcion == 'cargaAudicion'){
        $idbateria          = 15;
        $consultaAudicion = $db->cargaAudicion($idpaciente, $idbateria, $idarea);
        
        if( $consultaAudicion != false )
        {
            for ( $te = 0; $te < sizeof($consultaAudicion); $te++ )
            {
                $idpregunta         = $consultaAudicion[$te]['idpregunta'];
                $pregunta           = $consultaAudicion[$te]['pregunta'];
                $idrespuesta        = $consultaAudicion[$te]['idrespuesta'];
                $normal_si          = $consultaAudicion[$te]['normal_si'];
                $alterado_no        = $consultaAudicion[$te]['alterado_no'];
                $selectrespuesta    = $consultaAudicion[$te]['respuesta'];
                $oido_der           = $consultaAudicion[$te]['oido_der'];
                $oido_izqr          = $consultaAudicion[$te]['oido_izqr'];
                $observacionesaud   = $consultaAudicion[$te]['observaciones'];
                
                if($selectrespuesta == ''){$respuesta = 'Seleccione';}
                if($selectrespuesta == 1){$respuesta = 'Derecho';}
                if($selectrespuesta == 2){$respuesta = 'Izquierdo';}
                if($selectrespuesta == 3){$respuesta = 'Ambos';}
                
                if($normal_si == 1){
                    $checked1       = "checked";
                    $checked2       = "";
                }elseif($normal_si == 0){
                    $checked1       = "";
                    $checked2       = "checked";
                }
                
                if($alterado_no == 1){
                    $checked1       = "";
                    $checked2       = "checked";
                }elseif($alterado_no == 0){
                    $checked1       = "checked";
                    $checked2       = "";
                }
                
                if(is_null($normal_si)){
                    $checked1       = "";
                    $checked2       = "";
                }
                
                if(is_null($alterado_no)){
                    $checked1       = "";
                    $checked2       = "";
                }
                
                if($idpregunta == 138){
                    $datos .= "<div class='col-md-6'>
                                    <div class='form-group'>
                                        <label><b>a.</b> $pregunta</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaAudicion($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaAudicion($idpaciente,$idrespuesta)'>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <select name='select$idrespuesta' id='select$idrespuesta' class='form-control' onclick='respuestaAudicionSelect($idpaciente,$idrespuesta)'>
                                            <option value='$selectrespuesta'>$respuesta</option>
                                            <option value='1'>Derecho</option>
                                            <option value='2'>Izquierdo</option>
                                            <option value='3'>Ambos</option>
                                        </select>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 139){
                    $datos .= "<div class='col-md-6'>
                                    <div class='form-group'>
                                        <label><b>b.</b> $pregunta</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaAudicion($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaAudicion($idpaciente,$idrespuesta)'>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <select name='select$idrespuesta' id='select$idrespuesta' class='form-control' onclick='respuestaAudicionSelect($idpaciente,$idrespuesta)'>
                                            <option value='$selectrespuesta'>$respuesta</option>
                                            <option value='1'>Derecho</option>
                                            <option value='2'>Izquierdo</option>
                                            <option value='3'>Ambos</option>
                                        </select>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 140){
                    $datos .= "<div class='col-md-6'>
                                    <div class='form-group'>
                                        <label><b>c.</b> $pregunta</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaAudicion($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaAudicion($idpaciente,$idrespuesta)'>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <select name='select$idrespuesta' id='select$idrespuesta' class='form-control' onclick='respuestaAudicionSelect($idpaciente,$idrespuesta)'>
                                            <option value='$selectrespuesta'>$respuesta</option>
                                            <option value='1'>Derecho</option>
                                            <option value='2'>Izquierdo</option>
                                            <option value='3'>Ambos</option>
                                        </select>
                                    </div>
                                </div>";
                }
                if($idpregunta == 141){
                    $datos .= "<div class='col-md-6'>
                                    <div class='form-group'>
                                        <label><b>d.</b> $pregunta</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaAudicion($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaAudicion($idpaciente,$idrespuesta)'>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <select name='select$idrespuesta' id='select$idrespuesta' class='form-control' onclick='respuestaAudicionSelect($idpaciente,$idrespuesta)'>
                                            <option value='$selectrespuesta'>$respuesta</option>
                                            <option value='1'>Derecho</option>
                                            <option value='2'>Izquierdo</option>
                                            <option value='3'>Ambos</option>
                                        </select>
                                    </div>
                                </div>";
                }
                if($idpregunta == 142){
                    $datos .= "<div class='col-md-12'>
                                    <div class='form-group'>
                                        <label><b>e. </b>&iquest;Ha presentado alguno de estos s&iacute;ntomas?</label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        &nbsp;
                                    </div>
                                </div>
                                
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label><b>$pregunta</b></label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaAudicion($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaAudicion($idpaciente,$idrespuesta)'>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <select name='select$idrespuesta' id='select$idrespuesta' class='form-control' onclick='respuestaAudicionSelect($idpaciente,$idrespuesta)'>
                                            <option value='$selectrespuesta'>$respuesta</option>
                                            <option value='1'>Derecho</option>
                                            <option value='2'>Izquierdo</option>
                                            <option value='3'>Ambos</option>
                                        </select>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 143){
                    $datos .= "<div class='col-md-2'>
                                    <div class='form-group'>
                                        &nbsp;
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label><b>$pregunta</b></label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaAudicion($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaAudicion($idpaciente,$idrespuesta)'>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <select name='select$idrespuesta' id='select$idrespuesta' class='form-control' onclick='respuestaAudicionSelect($idpaciente,$idrespuesta)'>
                                            <option value='$selectrespuesta'>$respuesta</option>
                                            <option value='1'>Derecho</option>
                                            <option value='2'>Izquierdo</option>
                                            <option value='3'>Ambos</option>
                                        </select>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 144){
                    $datos .= "<div class='col-md-2'>
                                    <div class='form-group'>
                                        &nbsp;
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label><b>$pregunta</b></label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaAudicion($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaAudicion($idpaciente,$idrespuesta)'>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <select name='select$idrespuesta' id='select$idrespuesta' class='form-control' onclick='respuestaAudicionSelect($idpaciente,$idrespuesta)'>
                                            <option value='$selectrespuesta'>$respuesta</option>
                                            <option value='1'>Derecho</option>
                                            <option value='2'>Izquierdo</option>
                                            <option value='3'>Ambos</option>
                                        </select>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 145){
                    $datos .= "<div class='col-md-2'>
                                    <div class='form-group'>
                                        &nbsp;
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label><b>$pregunta</b></label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        SI $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='1' name='radio$idrespuesta' $checked1 onclick='respuestaAudicion($idpaciente,$idrespuesta)'> $nbsp$nbsp
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        NO $nbsp<input type='radio' $disabled id='radio$idrespuesta' value='2' name='radio$idrespuesta' $checked2 onclick='respuestaAudicion($idpaciente,$idrespuesta)'>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        <select name='select$idrespuesta' id='select$idrespuesta' class='form-control' onclick='respuestaAudicionSelect($idpaciente,$idrespuesta)'>
                                            <option value='$selectrespuesta'>$respuesta</option>
                                            <option value='1'>Derecho</option>
                                            <option value='2'>Izquierdo</option>
                                            <option value='3'>Ambos</option>
                                        </select>
                                    </div>
                                </div>";
                }
                
                if($idpregunta == 146){
                    $datos .= "<div class='col-md-4'>
                                    <div class='form-group'>
                                        <label><b>Otoscopia:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>O&iacute;do derecho</label>
                                        <textarea class='form-control' rows='3' id='oido_der' onblur='respuestaAudicionObservaciones($idpaciente, $idrespuesta, \"oido_der\", \"oido_der\")'>$oido_der</textarea>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>O&iacute;do izquierdo</label>
                                        <textarea class='form-control' rows='3' id='oido_izqr' onblur='respuestaAudicionObservaciones($idpaciente, $idrespuesta, \"oido_izqr\", \"oido_izqr\")'>$oido_izqr</textarea>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label><b>Observaciones</b></label>
                                        <textarea class='form-control' rows='5' id='observaciones_aud' onblur='respuestaAudicionObservaciones($idpaciente, $idrespuesta, \"observaciones\", \"observaciones_aud\")'>$observacionesaud</textarea>
                                    </div>
                                </div>";
                }
                
            }

            echo $datos;
        }
    }
    
    if($opcion == "respuestaAudicion")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $normal_si      = $_POST['normal_si'];
        $alterado_no    = $_POST['alterado_no'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 15;

        $respuestaAudicion = $db->respuestaAudicion($idpaciente,
                                                    $idrespuesta,
                                                    $normal_si,
                                                    $alterado_no,
                                                    $idbateria,
                                                    $idarea);

        if($respuestaAudicion)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    if($opcion == "respuestaAudicionSelect")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $idoption       = $_POST['idoption'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 15;

        $respuestaAudicionSelect = $db->respuestaAudicionSelect($idpaciente,
                                                                $idrespuesta,
                                                                $idoption,
                                                                $idbateria,
                                                                $idarea);

        if($respuestaAudicionSelect)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    if($opcion == "respuestaAudicionObservaciones")
    {
        $idpaciente     = $_POST['idpaciente'];
        $idrespuesta    = $_POST['idrespuesta'];
        $campo          = $_POST['campo'];
        $texto          = $_POST['texto'];
        $idarea         = $_POST['idarea'];
        $idbateria      = 15;

        $respuestaAudicionObservaciones = $db->respuestaAudicionObservaciones($idpaciente,
                                                                            $idrespuesta,
                                                                            $campo,
                                                                            $texto,
                                                                            $idbateria,
                                                                            $idarea);

        if($respuestaAudicionObservaciones)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    /*if($opcion == "insertarconstitucion"){
        
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
    }*/
    
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
    
    
    /*if($opcion == "actualizarconstitucion")
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
    }*/
    
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
    
    if($opcion == "consultaNroHnos"){
        $return_arrAnteDif   = array();
        $consultaNroHnos = $db->consultaNroHnos($idpaciente, $idhistoria);
        
        if( $consultaNroHnos != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaNroHnos); $ad++ )
            {
                $row_arrayad['numerohermanos']   = $consultaNroHnos[$ad]['numerohermanos'];
                $row_arrayad['lugarocupa']      = $consultaNroHnos[$ad]['lugarocupa'];
                array_push($return_arrAnteDif, $row_arrayad);
            }
            echo json_encode($return_arrAnteDif);
        }
    }
    
    if($opcion == "consultaAnteFamFono"){
        $return_arrAnte2   = array();
        $consultaAnte2 = $db->consultaAnteFamFono(2, $idhistoria);
        
        if( $consultaAnte2 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAnte2); $ad++ )
            {   
                $row_arrayAnte2['idantecedente']            = $consultaAnte2[$ad]['idantecedente'];
                $row_arrayAnte2['transtornoneurologico']    = $consultaAnte2[$ad]['transtornoneurologico'];
                $row_arrayAnte2['problemaspsiquiatrico']    = $consultaAnte2[$ad]['problemaspsiquiatrico'];
                $row_arrayAnte2['deficienciasvisaudt']      = $consultaAnte2[$ad]['deficienciasvisaudt'];
                $row_arrayAnte2['alteracionlenguaje']       = $consultaAnte2[$ad]['alteracionlenguaje'];
                $row_arrayAnte2['deficitcongnitivo']        = $consultaAnte2[$ad]['deficitcongnitivo'];
                $row_arrayAnte2['adicciones']               = $consultaAnte2[$ad]['adicciones'];
                $row_arrayAnte2['transaprendizaje']         = $consultaAnte2[$ad]['transaprendizaje'];
                $row_arrayAnte2['permanecemayortiempo']     = $consultaAnte2[$ad]['permanecemayortiempo'];
                $row_arrayAnte2['parentesco_idparentesco']  = $consultaAnte2[$ad]['parentesco_idparentesco'];
                
                array_push($return_arrAnte2, $row_arrayAnte2);
            }
            echo json_encode($return_arrAnte2);
        }
    }
    
    
    if($opcion == "consultaAntePreFono"){
        $return_arrAnte3   = array();
        $consultaAnte3 = $db->consultaAntePreFono($idpaciente, $idhistoria);
        
        if( $consultaAnte3 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAnte3); $ad++ )
            {
                
                $row_arrayAnte3['idantecedente']   = $consultaAnte3[$ad]['idantecedente'];
                $row_arrayAnte3['numeroembarazos']   = $consultaAnte3[$ad]['numeroembarazos'];
                $row_arrayAnte3['abortos']      = $consultaAnte3[$ad]['abortos'];
                $row_arrayAnte3['mesaborto']      = $consultaAnte3[$ad]['mesaborto'];
                $row_arrayAnte3['mesescontrolembr']      = $consultaAnte3[$ad]['mesescontrolembr'];
                $row_arrayAnte3['lugarcontrolembr']      = $consultaAnte3[$ad]['lugarcontrolembr'];
                $row_arrayAnte3['convulsiones']      = $consultaAnte3[$ad]['convulsiones'];
                $row_arrayAnte3['drogadiccion']      = $consultaAnte3[$ad]['drogadiccion'];
                $row_arrayAnte3['alcoholismo']      = $consultaAnte3[$ad]['alcoholismo'];
                $row_arrayAnte3['tabaquismo']      = $consultaAnte3[$ad]['tabaquismo'];
                $row_arrayAnte3['traumatismo']      = $consultaAnte3[$ad]['traumatismo'];
                $row_arrayAnte3['cualtraumatismo']      = $consultaAnte3[$ad]['cualtraumatismo'];
                $row_arrayAnte3['toxoplasmosis']      = $consultaAnte3[$ad]['toxoplasmosis'];
                $row_arrayAnte3['preclampsia']      = $consultaAnte3[$ad]['preclampsia'];
                $row_arrayAnte3['infecciones']      = $consultaAnte3[$ad]['infecciones'];
                $row_arrayAnte3['medicamento']      = $consultaAnte3[$ad]['medicamento'];
                $row_arrayAnte3['cualmedicamento']      = $consultaAnte3[$ad]['cualmedicamento'];
                $row_arrayAnte3['intoxicaciones']      = $consultaAnte3[$ad]['intoxicaciones'];
                $row_arrayAnte3['cualintoxicacion']      = $consultaAnte3[$ad]['cualintoxicacion'];
                $row_arrayAnte3['alimentacion']      = $consultaAnte3[$ad]['alimentacion'];
                $row_arrayAnte3['estadoemocional']      = $consultaAnte3[$ad]['estadoemocional'];
                $row_arrayAnte3['otrosantcfono']      = $consultaAnte3[$ad]['otrosantcfono'];
                array_push($return_arrAnte3, $row_arrayAnte3);
            }
            echo json_encode($return_arrAnte3);
        }
    }
    
    if($opcion == "consultaAntePerFono"){
        $return_arrAnte4   = array();
        $consultaAnte4 = $db->consultaAntePerFono($idpaciente, $idhistoria);
        
        if( $consultaAnte4 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAnte4); $ad++ )
            {
                
                $row_arrayAnte4['idantecedente']        = $consultaAnte4[$ad]['idantecedente'];
                $row_arrayAnte4['forceps']              = $consultaAnte4[$ad]['forceps'];
                $row_arrayAnte4['circularcordon']       = $consultaAnte4[$ad]['circularcordon'];
                $row_arrayAnte4['cefalica']             = $consultaAnte4[$ad]['cefalica'];
                $row_arrayAnte4['podalica']             = $consultaAnte4[$ad]['podalica'];
                $row_arrayAnte4['antendidohospital']    = $consultaAnte4[$ad]['antendidohospital'];
                $row_arrayAnte4['atendidocasa']         = $consultaAnte4[$ad]['atendidocasa'];
                $row_arrayAnte4['partera']              = $consultaAnte4[$ad]['partera'];
                $row_arrayAnte4['obsrperinatal']        = $consultaAnte4[$ad]['obsrperinatal'];
                array_push($return_arrAnte4, $row_arrayAnte4);
            }
            echo json_encode($return_arrAnte4);
        }
    }
    
    if($opcion == "consultaAntePosFono"){
        $return_arrAnte5   = array();
        $consultaAnte5 = $db->consultaAntePosFono($idpaciente, $idhistoria);
        
        if( $consultaAnte5 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAnte5); $ad++ )
            {
                $row_arrayAnte5['idantecedente']   = $consultaAnte5[$ad]['idantecedente'];
                $row_arrayAnte5['llanto']   = $consultaAnte5[$ad]['llanto'];
                $row_arrayAnte5['hipoxia']   = $consultaAnte5[$ad]['hipoxia'];
                $row_arrayAnte5['cianosis']      = $consultaAnte5[$ad]['cianosis'];
                $row_arrayAnte5['oxigeno']      = $consultaAnte5[$ad]['oxigeno'];
                $row_arrayAnte5['reanimacion']      = $consultaAnte5[$ad]['reanimacion'];
                $row_arrayAnte5['ictericia']      = $consultaAnte5[$ad]['ictericia'];
                $row_arrayAnte5['transfusion']      = $consultaAnte5[$ad]['transfusion'];
                $row_arrayAnte5['fototerapia']      = $consultaAnte5[$ad]['fototerapia'];
                $row_arrayAnte5['meconio']      = $consultaAnte5[$ad]['meconio'];
                $row_arrayAnte5['traumatismopost']      = $consultaAnte5[$ad]['traumatismo'];
                $row_arrayAnte5['cualtraumatismo']      = $consultaAnte5[$ad]['cualtraumatismo'];
                $row_arrayAnte5['obsrposnatal']      = $consultaAnte5[$ad]['obsrposnatal'];
                array_push($return_arrAnte5, $row_arrayAnte5);
            }
            echo json_encode($return_arrAnte5);
        }
    }
    
    
    if($opcion == "consultaVivienda"){
        $return_arrV   = array();
        $consultaV = $db->consultaVivienda($idpaciente, $idhistoria);
        
        if( $consultaV != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaV); $ad++ )
            {   
                $row_arrayV['idvivienda']   = $consultaV[$ad]['idvivienda'];
                $row_arrayV['estrato']      = $consultaV[$ad]['estrato_idestrato'];
                $row_arrayV['tipovivienda'] = $consultaV[$ad]['tipovivienda_idtipovivienda'];
                $row_arrayV['descripcion']  = $consultaV[$ad]['descripcion'];
                array_push($return_arrV, $row_arrayV);
            }
            echo json_encode($return_arrV);
        }
    }
    
    
    if($opcion == "consultaDlloLeng"){
        $return_arrDlloLeng   = array();
        $consultaDlloLeng = $db->consultaDlloLeng($idpaciente, $idhistoria);
        
        if( $consultaDlloLeng != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaDlloLeng); $ad++ )
            {   
                $row_arrayDlloLeng['frase_idfrase'] = $consultaDlloLeng[$ad]['frase_idfrase'];
                $row_arrayDlloLeng['frase']         = $consultaDlloLeng[$ad]['frase'];
                $row_arrayDlloLeng['silabeo']       = $consultaDlloLeng[$ad]['seleccion'];
                $row_arrayDlloLeng['edad']          = $consultaDlloLeng[$ad]['edad'];
                $row_arrayDlloLeng['observaciones'] = $consultaDlloLeng[$ad]['observaciones'];
                array_push($return_arrDlloLeng, $row_arrayDlloLeng);
            }
            echo json_encode($return_arrDlloLeng);
        }
    }
    
    if($opcion == "consultaDlloLeng4"){
        $return_arrDlloLeng4   = array();
        $consultaDlloLeng4 = $db->consultaDlloLeng4($idpaciente, $idhistoria);
        
        if( $consultaDlloLeng4 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaDlloLeng4); $ad++ )
            {   
                $row_arrayDlloLeng4['iddesarrollo']             = $consultaDlloLeng4[$ad]['iddesarrollo'];
                $row_arrayDlloLeng4['comprensionlenguaje']      = $consultaDlloLeng4[$ad]['comprensionlenguaje'];
                $row_arrayDlloLeng4['problemasarticulatorios']  = $consultaDlloLeng4[$ad]['problemasarticulatorios'];
                $row_arrayDlloLeng4['lenguajeinteligible']      = $consultaDlloLeng4[$ad]['lenguajeinteligible'];
                array_push($return_arrDlloLeng4, $row_arrayDlloLeng4);
            }
            echo json_encode($return_arrDlloLeng4);
        }
    }
    
    if($opcion == "consultaDlloLeng9"){
        $return_arrDlloLeng9   = array();
        $consultaDlloLeng9 = $db->consultaDlloLeng9($idpaciente, $idhistoria);
        
        if( $consultaDlloLeng9 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaDlloLeng9); $ad++ )
            {   
                $row_arrayDlloLeng9['iddesarrollo']             = $consultaDlloLeng9[$ad]['iddesarrollo'];
                $row_arrayDlloLeng9['forma']                    = $consultaDlloLeng9[$ad]['forma'];
                
                if($row_arrayDlloLeng9['forma'] == 'Materna'){
                    $row_arrayDlloLeng9['seleccionMaterna']     = $consultaDlloLeng9[$ad]['seleccion'];
                    $row_arrayDlloLeng9['edadmaterna']          = $consultaDlloLeng9[$ad]['desde'];
                }
                
                if($row_arrayDlloLeng9['forma'] == 'Tetero'){
                    $row_arrayDlloLeng9['seleccionArtificial']  = $consultaDlloLeng9[$ad]['seleccion'];
                    $row_arrayDlloLeng9['edadartificial']       = $consultaDlloLeng9[$ad]['desde'];
                }
                
                if($row_arrayDlloLeng9['forma'] == 'Mixta'){
                    $row_arrayDlloLeng9['seleccionMixta']       = $consultaDlloLeng9[$ad]['seleccion'];
                    $row_arrayDlloLeng9['edadmixta']            = $consultaDlloLeng9[$ad]['desde'];
                }

                array_push($return_arrDlloLeng9, $row_arrayDlloLeng9);
            }
            echo json_encode($return_arrDlloLeng9);
        }
    }
    
    if($opcion == "consultaDlloLeng91"){
        $return_arrDlloLeng91   = array();
        $consultaDlloLeng91 = $db->consultaDlloLeng91($idpaciente, $idhistoria);
        
        if( $consultaDlloLeng91 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaDlloLeng91); $ad++ )
            {   
                $row_arrayDlloLeng91['iddesarrollo']        = $consultaDlloLeng91[$ad]['iddesarrollo'];
                $row_arrayDlloLeng91['succion']             = $consultaDlloLeng91[$ad]['succion'];
                $row_arrayDlloLeng91['deglucion']           = $consultaDlloLeng91[$ad]['deglucion'];
                $row_arrayDlloLeng91['sialorrea']           = $consultaDlloLeng91[$ad]['sialorrea'];
                $row_arrayDlloLeng91['apariciondientes']    = $consultaDlloLeng91[$ad]['apariciondientes'];
                $row_arrayDlloLeng91['masticacion']         = $consultaDlloLeng91[$ad]['masticacion'];
                array_push($return_arrDlloLeng91, $row_arrayDlloLeng91);
            }
            echo json_encode($return_arrDlloLeng91);
        }
    }
    
    if($opcion == "consultaDlloLeng10"){
        $return_arrDlloLeng10   = array();
        $consultaDlloLeng10 = $db->consultaDlloLeng10($idpaciente, $idhistoria);
        
        if( $consultaDlloLeng10 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaDlloLeng10); $ad++ )
            {   
                $row_arrayDlloLeng10['iddesarrollo']             = $consultaDlloLeng10[$ad]['iddesarrollo'];
                $row_arrayDlloLeng10['liquidos']      = $consultaDlloLeng10[$ad]['liquidos'];
                $row_arrayDlloLeng10['semisolidos']  = $consultaDlloLeng10[$ad]['semisolidos'];
                $row_arrayDlloLeng10['solidos']      = $consultaDlloLeng10[$ad]['solidos'];
                $row_arrayDlloLeng10['balanceado']  = $consultaDlloLeng10[$ad]['balanceado'];
                $row_arrayDlloLeng10['comesolo']      = $consultaDlloLeng10[$ad]['comesolo'];
                $row_arrayDlloLeng10['diurno']  = $consultaDlloLeng10[$ad]['diurno'];
                $row_arrayDlloLeng10['nocturno']      = $consultaDlloLeng10[$ad]['nocturno'];
                $row_arrayDlloLeng10['enuresis']  = $consultaDlloLeng10[$ad]['enuresis'];
                $row_arrayDlloLeng10['encopresis']      = $consultaDlloLeng10[$ad]['encopresis'];
                $row_arrayDlloLeng10['vision']  = $consultaDlloLeng10[$ad]['vision'];
                $row_arrayDlloLeng10['audicion']      = $consultaDlloLeng10[$ad]['audicion'];
                $row_arrayDlloLeng10['traumatismos']  = $consultaDlloLeng10[$ad]['traumatismos'];
                $row_arrayDlloLeng10['enfprimanos']      = $consultaDlloLeng10[$ad]['enfprimanos'];
                array_push($return_arrDlloLeng10, $row_arrayDlloLeng10);
            }
            echo json_encode($return_arrDlloLeng10);
        }
    }
    
    if($opcion == "consultaDlloLeng11"){
        $return_arrDlloLeng11   = array();
        $consultaDlloLeng11 = $db->consultaDlloLeng11($idpaciente, $idhistoria);
        
        if( $consultaDlloLeng11 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaDlloLeng11); $ad++ )
            {   
                $row_arrayDlloLeng11['idmotor']         = $consultaDlloLeng11[$ad]['idmotor'];
                $row_arrayDlloLeng11['seleccion']       = $consultaDlloLeng11[$ad]['seleccion'];
                $row_arrayDlloLeng11['edad']            = $consultaDlloLeng11[$ad]['edad'];
                $row_arrayDlloLeng11['iddesarrollo']    = $consultaDlloLeng11[$ad]['iddesarrollo'];
                array_push($return_arrDlloLeng11, $row_arrayDlloLeng11);
            }
            echo json_encode($return_arrDlloLeng11);
        }
    }
    
    if($opcion == "consultaDlloObsr11"){
        $return_arrDlloObsr11   = array();
        $consultaDlloObsr11 = $db->consultaDlloObsr11($idpaciente, $idhistoria);
        
        if( $consultaDlloObsr11 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaDlloObsr11); $ad++ )
            {   
                $row_arrayDlloObsr11['iddesarrollo']    = $consultaDlloObsr11[$ad]['iddesarrollo'];
                $row_arrayDlloObsr11['obsrmotor']       = $consultaDlloObsr11[$ad]['obsrmotor'];
                array_push($return_arrDlloObsr11, $row_arrayDlloObsr11);
            }
            echo json_encode($return_arrDlloObsr11);
        }
    }
    
    if($opcion == "consultaDlloLeng12"){
        $return_arrDlloLeng12   = array();
        $consultaDlloLeng12 = $db->consultaDlloLeng12($idpaciente, $idhistoria);
        
        if( $consultaDlloLeng12 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaDlloLeng12); $ad++ )
            {   
                $row_arrayDlloLeng12['idhabito']         = $consultaDlloLeng12[$ad]['idhabito'];
                $row_arrayDlloLeng12['seleccion']       = $consultaDlloLeng12[$ad]['seleccion'];
                $row_arrayDlloLeng12['edad']            = $consultaDlloLeng12[$ad]['edad'];
                $row_arrayDlloLeng12['iddesarrollo']    = $consultaDlloLeng12[$ad]['iddesarrollo'];
                array_push($return_arrDlloLeng12, $row_arrayDlloLeng12);
            }
            echo json_encode($return_arrDlloLeng12);
        }
    }
    
    if($opcion == "consultaDlloObsr12"){
        $return_arrDlloObsr12   = array();
        $consultaDlloObsr12 = $db->consultaDlloObsr12($idpaciente, $idhistoria);
        
        if( $consultaDlloObsr12 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaDlloObsr12); $ad++ )
            {   
                $row_arrayDlloObsr12['iddesarrollo']    = $consultaDlloObsr12[$ad]['iddesarrollo'];
                $row_arrayDlloObsr12['otroscomportamientos']       = $consultaDlloObsr12[$ad]['otroscomportamientos'];
                array_push($return_arrDlloObsr12, $row_arrayDlloObsr12);
            }
            echo json_encode($return_arrDlloObsr12);
        }
    }
    
    if($opcion == "consultaDlloLeng13"){
        $return_arrDlloLeng13   = array();
        $consultaDlloLeng13 = $db->consultaDlloLeng13($idpaciente, $idhistoria);
        
        if( $consultaDlloLeng13 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaDlloLeng13); $ad++ )
            {   
                $row_arrayDlloLeng13['iddesarrollo']    = $consultaDlloLeng13[$ad]['iddesarrollo'];
                $row_arrayDlloLeng13['tranquilo']       = $consultaDlloLeng13[$ad]['tranquilo'];
                $row_arrayDlloLeng13['intranquilo']     = $consultaDlloLeng13[$ad]['intranquilo'];
                $row_arrayDlloLeng13['insonmio']        = $consultaDlloLeng13[$ad]['insonmio'];
                $row_arrayDlloLeng13['duermesolo']      = $consultaDlloLeng13[$ad]['duermesolo'];
                $row_arrayDlloLeng13['conquienduerme']  = $consultaDlloLeng13[$ad]['conquienduerme'];
                $row_arrayDlloLeng13['obsrsueno']       = $consultaDlloLeng13[$ad]['obsrsueno'];
                array_push($return_arrDlloLeng13, $row_arrayDlloLeng13);
            }
            echo json_encode($return_arrDlloLeng13);
        }
    }
    
    if($opcion == "consultaDlloLeng14"){
        $return_arrDlloLeng14   = array();
        $consultaDlloLeng14 = $db->consultaDlloLeng14($idpaciente, $idhistoria);
        
        if( $consultaDlloLeng14 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaDlloLeng14); $ad++ )
            {   
                $row_arrayDlloLeng14['inquieto']            = $consultaDlloLeng14[$ad]['inquieto'];
                $row_arrayDlloLeng14['pasivo']              = $consultaDlloLeng14[$ad]['pasivo'];
                $row_arrayDlloLeng14['distraido']           = $consultaDlloLeng14[$ad]['distraido'];
                $row_arrayDlloLeng14['impulsivo']           = $consultaDlloLeng14[$ad]['impulsivo'];
                $row_arrayDlloLeng14['sociable']            = $consultaDlloLeng14[$ad]['sociable'];
                $row_arrayDlloLeng14['destructor']          = $consultaDlloLeng14[$ad]['destructor'];
                $row_arrayDlloLeng14['peleador']            = $consultaDlloLeng14[$ad]['peleador'];
                $row_arrayDlloLeng14['desatento']           = $consultaDlloLeng14[$ad]['desatento'];
                $row_arrayDlloLeng14['timido']              = $consultaDlloLeng14[$ad]['timido'];
                $row_arrayDlloLeng14['independiente']       = $consultaDlloLeng14[$ad]['independiente'];
                $row_arrayDlloLeng14['estanimocomun']       = $consultaDlloLeng14[$ad]['estanimocomun'];
                $row_arrayDlloLeng14['fobias']              = $consultaDlloLeng14[$ad]['fobias'];
                $row_arrayDlloLeng14['juegopreferido']      = $consultaDlloLeng14[$ad]['juegopreferido'];
                $row_arrayDlloLeng14['personaspreferidas']  = $consultaDlloLeng14[$ad]['personaspreferidas'];
                $row_arrayDlloLeng14['amigosfacil']         = $consultaDlloLeng14[$ad]['amigosfacil'];
                $row_arrayDlloLeng14['compartejuego']       = $consultaDlloLeng14[$ad]['compartejuego'];
                $row_arrayDlloLeng14['fatigabilidad']       = $consultaDlloLeng14[$ad]['fatigabilidad'];
                $row_arrayDlloLeng14['conductasexual']      = $consultaDlloLeng14[$ad]['conductasexual'];
                $row_arrayDlloLeng14['obsrconducta']        = $consultaDlloLeng14[$ad]['obsrconducta'];
                array_push($return_arrDlloLeng14, $row_arrayDlloLeng14);
            }
            echo json_encode($return_arrDlloLeng14);
        }
    }
    
    if($opcion == "consultaDlloLeng15"){
        $return_arrDlloLeng15   = array();
        $consultaDlloLeng15 = $db->consultaDlloLeng15($idpaciente, $idhistoria);
        
        if( $consultaDlloLeng15 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaDlloLeng15); $ad++ )
            {   
                
                $row_arrayDlloLeng15['idtratamientorealizado']  = $consultaDlloLeng15[$ad]['idtratamientorealizado'];
                if($row_arrayDlloLeng15['idtratamientorealizado'] == 1){
                    $row_arrayDlloLeng15['neurologia']              = $consultaDlloLeng15[$ad]['seleccion'];
                    $row_arrayDlloLeng15['tiemponeurologia']        = $consultaDlloLeng15[$ad]['tiempo'];
                    $row_arrayDlloLeng15['obsrneurologia']          = $consultaDlloLeng15[$ad]['observaciones'];
                }
                
                if($row_arrayDlloLeng15['idtratamientorealizado'] == 2){
                    $row_arrayDlloLeng15['fonoaudiologia']          = $consultaDlloLeng15[$ad]['seleccion'];
                    $row_arrayDlloLeng15['tiempofonoaudiologia']    = $consultaDlloLeng15[$ad]['tiempo'];
                    $row_arrayDlloLeng15['obsrfonoaudiologia']      = $consultaDlloLeng15[$ad]['observaciones'];
                }
                
                if($row_arrayDlloLeng15['idtratamientorealizado'] == 3){
                    $row_arrayDlloLeng15['teo']                 = $consultaDlloLeng15[$ad]['seleccion'];
                    $row_arrayDlloLeng15['tiempoteo']           = $consultaDlloLeng15[$ad]['tiempo'];
                    $row_arrayDlloLeng15['obsrteo']             = $consultaDlloLeng15[$ad]['observaciones'];
                }
                
                if($row_arrayDlloLeng15['idtratamientorealizado'] == 4){
                    $row_arrayDlloLeng15['fisioterapia']        = $consultaDlloLeng15[$ad]['seleccion'];
                    $row_arrayDlloLeng15['tiempofisioterapia']  = $consultaDlloLeng15[$ad]['tiempo'];
                    $row_arrayDlloLeng15['obsrfisioterapia']    = $consultaDlloLeng15[$ad]['observaciones'];
                }
                
                if($row_arrayDlloLeng15['idtratamientorealizado'] == 5){
                    $row_arrayDlloLeng15['psico']               = $consultaDlloLeng15[$ad]['seleccion'];
                    $row_arrayDlloLeng15['tiempopsico']         = $consultaDlloLeng15[$ad]['tiempo'];
                    $row_arrayDlloLeng15['obsrpsico']           = $consultaDlloLeng15[$ad]['observaciones'];
                }
                
                if($row_arrayDlloLeng15['idtratamientorealizado'] == 6){
                    $row_arrayDlloLeng15['farmacologio']        = $consultaDlloLeng15[$ad]['seleccion'];
                    $row_arrayDlloLeng15['tiempofarmacologio']  = $consultaDlloLeng15[$ad]['tiempo'];
                    $row_arrayDlloLeng15['obsrfarmacologio']    = $consultaDlloLeng15[$ad]['observaciones'];
                }
                
                if($row_arrayDlloLeng15['idtratamientorealizado'] == 7){
                    $row_arrayDlloLeng15['cuidadosesp']         = $consultaDlloLeng15[$ad]['seleccion'];
                    $row_arrayDlloLeng15['tiempocuidadosesp']   = $consultaDlloLeng15[$ad]['tiempo'];
                    $row_arrayDlloLeng15['obsrcuidadosesp']     = $consultaDlloLeng15[$ad]['observaciones'];
                }

                array_push($return_arrDlloLeng15, $row_arrayDlloLeng15);
            }
            echo json_encode($return_arrDlloLeng15);
        }
    }
    
    if($opcion == "consultaDlloLeng16"){
        $return_arrDlloLeng16   = array();
        $consultaDlloLeng16 = $db->consultaDlloLeng16($idpaciente, $idhistoria);
        
        if( $consultaDlloLeng16 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaDlloLeng16); $ad++ )
            {   
                $row_arrayDlloLeng16['iddesarrollo']    = $consultaDlloLeng16[$ad]['iddesarrollo'];
                $row_arrayDlloLeng16['otrostratamieto'] = $consultaDlloLeng16[$ad]['otrostratamieto'];
                array_push($return_arrDlloLeng16, $row_arrayDlloLeng16);
            }
            echo json_encode($return_arrDlloLeng16);
        }
    }
    
    if($opcion == "consultaInfEsc"){
        $return_arrInfEsc   = array();
        $consultaInfEsc = $db->consultaInfEsc($idpaciente, $idhistoria);
        
        if( $consultaInfEsc != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaInfEsc); $ad++ )
            {   
                $row_arrayInfEsc['idhistoriaescolar']   = $consultaInfEsc[$ad]['idhistoriaescolar'];
                $row_arrayInfEsc['escolaridad']      = $consultaInfEsc[$ad]['escolaridad'];
                $row_arrayInfEsc['motivoEsc'] = $consultaInfEsc[$ad]['motivo'];
                $row_arrayInfEsc['edadnivelinicio']  = $consultaInfEsc[$ad]['edadnivelinicio'];
                $row_arrayInfEsc['nivelesrepitencia']  = $consultaInfEsc[$ad]['nivelesrepitencia'];
                $row_arrayInfEsc['cualesniveles']  = $consultaInfEsc[$ad]['cualesniveles'];
                $row_arrayInfEsc['areasdificultad']  = $consultaInfEsc[$ad]['areasdificultad'];
                $row_arrayInfEsc['aptitudhabilidadesdest']  = $consultaInfEsc[$ad]['aptitudhabilidadesdest'];
                $row_arrayInfEsc['procesoadaptador']  = $consultaInfEsc[$ad]['procesoadaptador'];
                $row_arrayInfEsc['actitudfrenteambesc']  = $consultaInfEsc[$ad]['actitudfrenteambesc'];
                $row_arrayInfEsc['apoyofamiliar']  = $consultaInfEsc[$ad]['apoyofamiliar'];
                $row_arrayInfEsc['observacinoesgen']  = $consultaInfEsc[$ad]['observacinoesgen'];
                
                array_push($return_arrInfEsc, $row_arrayInfEsc);
            }
            echo json_encode($return_arrInfEsc);
        }
    }
    
    if($opcion == "consultaAlimEfi"){
        $return_arrAlimEfi   = array();
        $consultaAlimEfi = $db->consultaAlimEfi($idpaciente, $idhistoria);
        
        if( $consultaAlimEfi != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAlimEfi); $ad++ )
            {
                $row_arrayad['idseleccionalimentacion']     = $consultaAlimEfi[$ad]['idseleccionalimentacion'];
                $row_arrayad['dependencia_iddependencia']   = $consultaAlimEfi[$ad]['dependencia_iddependencia'];
                $row_arrayad['alimentacion_idalimentacion'] = $consultaAlimEfi[$ad]['alimentacion_idalimentacion'];
                array_push($return_arrAlimEfi, $row_arrayad);
            }
            echo json_encode($return_arrAlimEfi);
        }
    }
    
    if($opcion == "consultaAlimEfi2"){
        $return_arrAlimEfi2   = array();
        $consultaAlimEfi2 = $db->consultaAlimEfi2($idpaciente, $idhistoria);
        
        if( $consultaAlimEfi2 != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAlimEfi2); $ad++ )
            {
                $row_arrayad2['idseleccionalimentacion']     = $consultaAlimEfi2[$ad]['idseleccionalimentacion'];
                $row_arrayad2['dependencia_iddependencia']   = $consultaAlimEfi2[$ad]['dependencia_iddependencia'];
                $row_arrayad2['alimentacion_idalimentacion'] = $consultaAlimEfi2[$ad]['alimentacion_idalimentacion'];
                array_push($return_arrAlimEfi2, $row_arrayad2);
            }
            echo json_encode($return_arrAlimEfi2);
        }
    }
    
    if($opcion == "consultaAlimEfi3"){
        $return_arrAlimEfi   = array();
        $consultaAlimEfi = $db->consultaAlimEfi3($idpaciente, $idhistoria);
        
        if( $consultaAlimEfi != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAlimEfi); $ad++ )
            {
                $row_arrayad['idseleccionalimentacion']   = $consultaAlimEfi[$ad]['idseleccionalimentacion'];
                $row_arrayad['solido']      = $consultaAlimEfi[$ad]['solido'];
                $row_arrayad['semisolido']      = $consultaAlimEfi[$ad]['semisolido'];
                $row_arrayad['pure']  = $consultaAlimEfi[$ad]['pure'];
                $row_arrayad['compota']  = $consultaAlimEfi[$ad]['compota'];
                array_push($return_arrAlimEfi, $row_arrayad);
            }
            echo json_encode($return_arrAlimEfi);
        }
    }
    
    if($opcion == "consultaAlimEfi4"){
        $return_arrAlimEfi   = array();
        $consultaAlimEfi = $db->consultaAlimEfi4($idpaciente, $idhistoria);
        
        if( $consultaAlimEfi != false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAlimEfi); $ad++ )
            {
                $row_arrayAlimEfi4['idseleccionalimentacion']   = $consultaAlimEfi[$ad]['idseleccionalimentacion'];
                $row_arrayAlimEfi4['seleccion']                 = $consultaAlimEfi[$ad]['seleccion'];
                $row_arrayAlimEfi4['texto']                     = $consultaAlimEfi[$ad]['texto'];
                $row_arrayAlimEfi4['idalimentacion']            = $consultaAlimEfi[$ad]['alimentacion_idalimentacion'];
                array_push($return_arrAlimEfi, $row_arrayAlimEfi4);
            }
            echo json_encode($return_arrAlimEfi);
        }
    }
    
    if($opcion == "consultaAlimEfi5"){
        $return_arrAlimEfi5   = array();
        $consultaAlimEfi5 = $db->consultaAlimEfi5($idpaciente, $idhistoria);
        
        if( $consultaAlimEfi5!= false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAlimEfi5); $ad++ )
            {
                $row_arrayAlimEfi5['idseleccionalimentacion']   = $consultaAlimEfi5[$ad]['idseleccionalimentacion'];
                $row_arrayAlimEfi5['seleccion']                 = $consultaAlimEfi5[$ad]['seleccion'];
                $row_arrayAlimEfi5['idalimentacion']            = $consultaAlimEfi5[$ad]['alimentacion_idalimentacion'];
                array_push($return_arrAlimEfi5, $row_arrayAlimEfi5);
            }
            echo json_encode($return_arrAlimEfi5);
        }
    }
    
    if($opcion == "consultaAlimEfi6"){
        $return_arrAlimEfi6   = array();
        $consultaAlimEfi6 = $db->consultaAlimEfi6($idpaciente, $idhistoria);
        
        if( $consultaAlimEfi6!= false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAlimEfi6); $ad++ )
            {
                $row_arrayAlimEfi6['idseleccionalimentacion']   = $consultaAlimEfi6[$ad]['idseleccionalimentacion'];
                $row_arrayAlimEfi6['seleccion']                 = $consultaAlimEfi6[$ad]['seleccion'];
                $row_arrayAlimEfi6['texto']                     = $consultaAlimEfi6[$ad]['texto'];
                $row_arrayAlimEfi6['idalimentacion']            = $consultaAlimEfi6[$ad]['alimentacion_idalimentacion'];
                array_push($return_arrAlimEfi6, $row_arrayAlimEfi6);
            }
            echo json_encode($return_arrAlimEfi6);
        }
    }
    
    if($opcion == "consultaAlimEfi7"){
        $return_arrAlimEfi7   = array();
        $consultaAlimEfi7 = $db->consultaAlimEfi7($idpaciente, $idhistoria);
        
        if( $consultaAlimEfi7!= false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAlimEfi7); $ad++ )
            {
                $row_arrayAlimEfi7['idseleccionalimentacion']   = $consultaAlimEfi7[$ad]['idseleccionalimentacion'];
                $row_arrayAlimEfi7['liquidoclaro']              = $consultaAlimEfi7[$ad]['liquidoclaro'];
                $row_arrayAlimEfi7['liquidoespeso']             = $consultaAlimEfi7[$ad]['liquidoespeso'];
                $row_arrayAlimEfi7['idalimentacion']            = $consultaAlimEfi7[$ad]['alimentacion_idalimentacion'];
                array_push($return_arrAlimEfi7, $row_arrayAlimEfi7);
            }
            echo json_encode($return_arrAlimEfi7);
        }
    }
    
    if($opcion == "consultaAlimEfi8"){
        $return_arrAlimEfi8   = array();
        $consultaAlimEfi8 = $db->consultaAlimEfi8($idpaciente, $idhistoria);
        
        if( $consultaAlimEfi8!= false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAlimEfi8); $ad++ )
            {
                $row_arrayAlimEfi8['idseleccionalimentacion']   = $consultaAlimEfi8[$ad]['idseleccionalimentacion'];
                $row_arrayAlimEfi8['seleccion']                 = $consultaAlimEfi8[$ad]['seleccion'];
                $row_arrayAlimEfi8['idalimentacion']            = $consultaAlimEfi8[$ad]['alimentacion_idalimentacion'];
                array_push($return_arrAlimEfi8, $row_arrayAlimEfi8);
            }
            echo json_encode($return_arrAlimEfi8);
        }
    }
    
    if($opcion == "consultaAlimEfi9"){
        $return_arrAlimEfi9   = array();
        $consultaAlimEfi9 = $db->consultaAlimEfi9($idpaciente, $idhistoria);
        
        if( $consultaAlimEfi9!= false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAlimEfi9); $ad++ )
            {
                $row_arrayAlimEfi9['idseleccionalimentacion']   = $consultaAlimEfi9[$ad]['idseleccionalimentacion'];
                $row_arrayAlimEfi9['seleccion']                 = $consultaAlimEfi9[$ad]['seleccion'];
                $row_arrayAlimEfi9['texto']                     = $consultaAlimEfi9[$ad]['texto'];
                $row_arrayAlimEfi9['idalimentacion']            = $consultaAlimEfi9[$ad]['alimentacion_idalimentacion'];
                array_push($return_arrAlimEfi9, $row_arrayAlimEfi9);
            }
            echo json_encode($return_arrAlimEfi9);
        }
    }
    
    if($opcion == "consultaAlimEfi10"){
        $return_arrAlimEfi10   = array();
        $consultaAlimEfi10 = $db->consultaAlimEfi10($idpaciente, $idhistoria);
        
        if( $consultaAlimEfi10!= false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAlimEfi10); $ad++ )
            {
                $row_arrayAlimEfi10['idseleccionalimentacion']  = $consultaAlimEfi10[$ad]['idseleccionalimentacion'];
                $row_arrayAlimEfi10['saliva']                   = $consultaAlimEfi10[$ad]['saliva'];
                $row_arrayAlimEfi10['alimento']                 = $consultaAlimEfi10[$ad]['alimento'];
                $row_arrayAlimEfi10['agua']                     = $consultaAlimEfi10[$ad]['agua'];
                $row_arrayAlimEfi10['observaciones']            = $consultaAlimEfi10[$ad]['observaciones'];
                $row_arrayAlimEfi10['idalimentacion']           = $consultaAlimEfi10[$ad]['alimentacion_idalimentacion'];
                array_push($return_arrAlimEfi10, $row_arrayAlimEfi10);
            }
            echo json_encode($return_arrAlimEfi10);
        }
    }
    
    if($opcion == "consultaAlimEfi11"){
        $return_arrAlimEfi11   = array();
        $consultaAlimEfi11 = $db->consultaAlimEfi11($idpaciente, $idhistoria);
        
        if( $consultaAlimEfi11!= false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAlimEfi11); $ad++ )
            {
                $row_arrayAlimEfi11['idseleccionalimentacion']   = $consultaAlimEfi11[$ad]['idseleccionalimentacion'];
                $row_arrayAlimEfi11['seleccion']                 = $consultaAlimEfi11[$ad]['seleccion'];
                $row_arrayAlimEfi11['texto']                     = $consultaAlimEfi11[$ad]['texto'];
                $row_arrayAlimEfi11['idalimentacion']            = $consultaAlimEfi11[$ad]['alimentacion_idalimentacion'];
                array_push($return_arrAlimEfi11, $row_arrayAlimEfi11);
            }
            echo json_encode($return_arrAlimEfi11);
        }
    }
    
    
    if($opcion == "consultaAyudaPar12"){
        $return_arrAyudaPar12   = array();
        $consultaAyudaPar12 = $db->consultaAyudaPar12($idpaciente, $idhistoria);
        
        if( $consultaAyudaPar12!= false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAyudaPar12); $ad++ )
            {
                $row_arrayAyudaPar12['idayudaparental']         = $consultaAyudaPar12[$ad]['idayudaparental'];
                $row_arrayAyudaPar12['seleccion']               = $consultaAyudaPar12[$ad]['seleccion'];
                $row_arrayAyudaPar12['motivo']                  = $consultaAyudaPar12[$ad]['motivo'];
                $row_arrayAyudaPar12['idalimentacionparental']  = $consultaAyudaPar12[$ad]['alimentacionparental_idalimentacionparental'];
                $row_arrayAyudaPar12['duracion']                = $consultaAyudaPar12[$ad]['duracion'];
                $row_arrayAyudaPar12['idalimentacion']          = $consultaAyudaPar12[$ad]['alimentacion_idalimentacion'];
                array_push($return_arrAyudaPar12, $row_arrayAyudaPar12);
            }
            echo json_encode($return_arrAyudaPar12);
        }
    }
    
    
    if($opcion == "consultaImpresionDiag"){
        $return_arrImpD   = array();
        $consultaImpresionDiag = $db->consultaImpresionDiag($idpaciente, $idhistoria);
        
        if( $consultaImpresionDiag!= false )
        {
            for ( $ad = 0; $ad< sizeof($consultaImpresionDiag); $ad++ )
            {
                $row_arrayImpD['observaciones']         = $consultaImpresionDiag[$ad]['observaciones'];
                $row_arrayImpD['impresiondiagnostica']  = $consultaImpresionDiag[$ad]['impresiondiagnostica'];
                array_push($return_arrImpD, $row_arrayImpD);
            }
            echo json_encode($return_arrImpD);
        }
    }
    
    if($opcion == "consultaAlimEfi13"){
        $return_arrAlimEfi13   = array();
        $consultaAlimEfi13 = $db->consultaAlimEfi13($idpaciente, $idhistoria);
        
        if( $consultaAlimEfi13!= false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAlimEfi13); $ad++ )
            {
                $row_arrayAlimEfi13['idseleccionalimentacion']   = $consultaAlimEfi13[$ad]['idseleccionalimentacion'];
                $row_arrayAlimEfi13['seleccion']                 = $consultaAlimEfi13[$ad]['seleccion'];
                $row_arrayAlimEfi13['texto']                     = $consultaAlimEfi13[$ad]['texto'];
                $row_arrayAlimEfi13['idalimentacion']            = $consultaAlimEfi13[$ad]['alimentacion_idalimentacion'];
                array_push($return_arrAlimEfi13, $row_arrayAlimEfi13);
            }
            echo json_encode($return_arrAlimEfi13);
        }
    }
    
    if($opcion == "consultaAlimEfi14"){
        $return_arrAlimEfi14   = array();
        $consultaAlimEfi14 = $db->consultaAlimEfi14($idpaciente, $idhistoria);
        
        if( $consultaAlimEfi14!= false )
        {
            for ( $ad = 0; $ad< sizeof($consultaAlimEfi14); $ad++ )
            {
                $row_arrayAlimEfi14['idseleccionalimentacion']   = $consultaAlimEfi14[$ad]['idseleccionalimentacion'];
                $row_arrayAlimEfi14['seleccion']                 = $consultaAlimEfi14[$ad]['seleccion'];
                $row_arrayAlimEfi14['observaciones']             = $consultaAlimEfi14[$ad]['observaciones'];
                $row_arrayAlimEfi14['idalimentacion']            = $consultaAlimEfi14[$ad]['alimentacion_idalimentacion'];
                array_push($return_arrAlimEfi14, $row_arrayAlimEfi14);
            }
            echo json_encode($return_arrAlimEfi14);
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
        $consultaAntPrenatal = $db->consultarAntPrenatalFono($idpaciente, $idhistoria);
        
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
        $consultaAntParto = $db->consultarAntPartoFono($idpaciente, $idhistoria);
        
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
        $consultaEleAlim = $db->consultarEleAlim($idpaciente);
        
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

/////  consulta Sesiones de Evaluacion

if($opcion == "consultarSesionEvaluacion"){

        $idpaciente = $_POST['idpaciente'];
        $datos      = "";
        
        $consultarSesionEvaluacion = $db->consultarSesionEvaluacion($idpaciente);
        
        if( $consultarSesionEvaluacion != false )
        {
            $datos .= "<div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>SESIONES DE EVALUACION</b></label>
                            </div>
                        </div>";
                                
            for ( $SE = 0; $SE< sizeof($consultarSesionEvaluacion); $SE++ )
            {
                $sesion     = $consultarSesionEvaluacion[$SE]['sesion'];
                $persona    = $consultarSesionEvaluacion[$SE]['persona'];
                $valoracion = $consultarSesionEvaluacion[$SE]['valoraciones'];
                $phpdate    = strtotime($consultarSesionEvaluacion[$SE]['fecha']);
                $fecha      = date( 'd M Y', $phpdate );
                
                
                if($valoracion !=''){
                    $datos      .= "<div class='col-md-6' class='form-group' style='text-align:center;'>
                                            <label>$sesion</label>
                                    </div>
                                    <div class='col-md-4'>
                                            <input style='text-align:left' id='valoracion' type='text' value='$valoracion' onblur='actualizaValoracion()' class='form-control'>
                                    </div>";
                }elseif($persona!=''){
                    $datos      .= "<div class='col-md-6' class='form-group' style='text-align:center;'>
                                            <label>$sesion</label>
                                    </div>
                                    <div class='col-md-6' class='form-group' style='text-align:left;'>
                                            <label>$persona</label>
                                    </div>";
                }else{
                    $datos      .= "<div class='col-md-6' class='form-group' style='text-align:center;'>
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