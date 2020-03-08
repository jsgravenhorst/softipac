<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("../../mod_conexion/db_funciones.php");
    $db = new DB_Funciones();

    $opcion         = $_POST['opcion'];
    $idpaciente     = $_POST['idpaciente'];
    $idinforme      = $_POST['idinforme'];
    $idexamen       = $_POST['idexamen'];
    $idTerapeuta    = $_POST['idTerapeuta'];
    $idcita         = $_POST['idcita'];
    $idarea         = $_POST['idarea'];
    $idhistoria     = $_POST['idhistoria'];
    
    if($opcion == "cargaFechaValoracion"){
        $consultaFchVal = $db->cargaFechaValoracion($idpaciente, $idarea);
        
        if( $consultaFchVal != false )
        {
            for ( $AF = 0; $AF< sizeof($consultaFchVal); $AF++ )
            {
                $fechaCreacion = $consultaFchVal[$AF]['fechacreacion'];
            }
            echo $fechaCreacion;
        }
    }
    
    
    if($opcion == "cargaFechaEntregaInforme"){
        $consultaFchVal = $db->cargaFechaEntregaInforme($idpaciente, $idarea);
        
        if( $consultaFchVal != false )
        {
            for ( $AF = 0; $AF< sizeof($consultaFchVal); $AF++ )
            {
                $fechaCreacion = $consultaFchVal[$AF]['fechacreacion'];
            }
            echo $fechaCreacion;
        }
    }
    
    
    ///////Sistema Estomatognatico boca
    if($opcion == 'cargaEstomatognatico1'){
        $consultaEstomatognatico    = $db->cargaEstomatognatico($idinforme, $idexamen);
        
        if( $consultaEstomatognatico != false )
        {
            for ( $te = 0; $te < sizeof($consultaEstomatognatico); $te++ )
            {
                $idopciones     = $consultaEstomatognatico[$te]['idopciones'];
                $examen_id      = $consultaEstomatognatico[$te]['examen_idexamen'];
                $bocanormal     = $consultaEstomatognatico[$te]['normal'];
                $bocaamplia     = $consultaEstomatognatico[$te]['amplia'];
                $bocapequena    = $consultaEstomatognatico[$te]['pequena'];

                if($bocanormal == 1){$bocanormal = "checked";}else{$bocanormal = "";}
                if($bocaamplia == 1){$bocaamplia = "checked";}else{$bocaamplia = "";}
                if($bocapequena == 1){$bocapequena = "checked";}else{$bocapequena = "";}

                    $datos .= "<div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>Examen extra-oral</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <label><b>Boca:</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='bocanormal' id='bocanormal' type='checkbox' $bocanormal onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"normal\", \"bocanormal\")'>
                                <label>Normal</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='bocaamplia' id='bocaamplia' type='checkbox' $bocaamplia onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"amplia\", \"bocaamplia\")'>
                                <label>Amplia</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='bocapequena' id='bocapequena' type='checkbox' $bocapequena onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"pequena\", \"bocapequena\")'>
                                <label>Peque&ntilde;a</label>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    ///////Sistema Estomatognatico labio superior
    if($opcion == 'cargaEstomatognatico2'){
        $consultaEstomatognatico    = $db->cargaEstomatognatico($idinforme, $idexamen);
        
        if( $consultaEstomatognatico != false )
        {
            for ( $te = 0; $te < sizeof($consultaEstomatognatico); $te++ )
            {
                $idopciones     = $consultaEstomatognatico[$te]['idopciones'];
                $supgrueso      = $consultaEstomatognatico[$te]['grueso'];
                $supcorto       = $consultaEstomatognatico[$te]['corto'];
                $supnormal      = $consultaEstomatognatico[$te]['normal'];
                $supevertido    = $consultaEstomatognatico[$te]['evertido'];
                $supirregularidad = $consultaEstomatognatico[$te]['irregularidad'];

                if($supgrueso == 1){$supgrueso = "checked";}else{$supgrueso = "";}
                if($supcorto == 1){$supcorto = "checked";}else{$supcorto = "";}
                if($supnormal == 1){$supnormal = "checked";}else{$supnormal = "";}
                if($supevertido == 1){$supevertido = "checked";}else{$supevertido = "";}
                if($supirregularidad == 1){$supirregularidad = "checked";}else{$supirregularidad = "";}
                
                    $datos .= "<div class='col-md-2'>
                            <div class='form-group'>
                                <label><b>Labio Superior:</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='supgrueso' id='supgrueso' type='checkbox' $supgrueso onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"grueso\", \"supgrueso\")'>
                                <label>Grueso</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='supcorto' id='supcorto' type='checkbox' $supcorto onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"corto\", \"supcorto\")'>
                                <label>Corto</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='supnormal' id='supnormal' type='checkbox' $supnormal onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"normal\", \"supnormal\")'>
                                <label>Normal</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='supevertido' id='supevertido' type='checkbox' $supevertido onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"evertido\", \"supevertido\")'>
                                <label>Evertido</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='supirregularidad' id='supirregularidad' type='checkbox' $supirregularidad onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"irregularidad\", \"supirregularidad\")'>
                                <label>Presenta irregularidad</label>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    ///////Sistema Estomatognatico labio inferior
    if($opcion == 'cargaEstomatognatico3'){
        $consultaEstomatognatico    = $db->cargaEstomatognatico($idinforme, $idexamen);
        
        if( $consultaEstomatognatico != false )
        {
            for ( $te = 0; $te < sizeof($consultaEstomatognatico); $te++ )
            {
                $idopciones     = $consultaEstomatognatico[$te]['idopciones'];
                $infgrueso      = $consultaEstomatognatico[$te]['grueso'];
                $infcorto       = $consultaEstomatognatico[$te]['corto'];
                $infnormal      = $consultaEstomatognatico[$te]['normal'];
                $infevertido    = $consultaEstomatognatico[$te]['evertido'];

                if($infgrueso == 1){$infgrueso = "checked";}else{$infgrueso = "";}
                if($infcorto == 1){$infcorto = "checked";}else{$infcorto = "";}
                if($infnormal == 1){$infnormal = "checked";}else{$infnormal = "";}
                if($infevertido == 1){$infevertido = "checked";}else{$infevertido = "";}
                
                    $datos .= "<div class='col-md-2'>
                            <div class='form-group'>
                                <label><b>Labio inferior:</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='infgrueso' id='infgrueso' type='checkbox' $infgrueso onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"grueso\", \"infgrueso\")'>
                                <label>Grueso</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='infcorto' id='infcorto' type='checkbox' $infcorto onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"corto\", \"infcorto\")'>
                                <label>Corto</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='infnormal' id='infnormal' type='checkbox' $infnormal onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"normal\", \"infnormal\")'>
                                <label>Normal</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='infevertido' id='infevertido' type='checkbox' $infevertido onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"evertido\", \"infevertido\")'>
                                <label>Evertido</label>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    
    ///////Sistema Estomatognatico Encia
    if($opcion == 'cargaEstomatognatico4'){
        $consultaEstomatognatico    = $db->cargaEstomatognatico($idinforme, $idexamen);
        
        if( $consultaEstomatognatico != false )
        {
            for ( $te = 0; $te < sizeof($consultaEstomatognatico); $te++ )
            {
                $idopciones     = $consultaEstomatognatico[$te]['idopciones'];
                $encianormal      = $consultaEstomatognatico[$te]['normal'];

                if($encianormal == 1){$encianormal = "checked";}else{$encianormal = "";}
                
                    $datos .= "<div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>Examen Intraoral:</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <label><b>Encia:</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='encianormal' id='encianormal' type='checkbox' $encianormal onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"normal\", \"encianormal\")'>
                                <label>Normal</label>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    ///////Sistema Estomatognatico Color
    if($opcion == 'cargaEstomatognatico5'){
        $consultaEstomatognatico    = $db->cargaEstomatognatico($idinforme, $idexamen);
        
        if( $consultaEstomatognatico != false )
        {
            for ( $te = 0; $te < sizeof($consultaEstomatognatico); $te++ )
            {
                $idopciones     = $consultaEstomatognatico[$te]['idopciones'];
                $colornormal    = $consultaEstomatognatico[$te]['normal'];
                $coloramarillo  = $consultaEstomatognatico[$te]['amarillo'];
                $colorblanco    = $consultaEstomatognatico[$te]['blanco'];
                $colorrojo      = $consultaEstomatognatico[$te]['rojo'];
                $colorotro      = $consultaEstomatognatico[$te]['otro'];

                if($colornormal == 1){$colornormal = "checked";}else{$colornormal = "";}
                if($coloramarillo == 1){$coloramarillo = "checked";}else{$coloramarillo = "";}
                if($colorblanco == 1){$colorblanco = "checked";}else{$colorblanco = "";}
                if($colorrojo == 1){$colorrojo = "checked";}else{$colorrojo = "";}
                if($colorotro == 1){$colorotro = "checked";}else{$colorotro = "";}
                
                    $datos .= "<div class='col-md-2'>
                            <div class='form-group'>
                                <label><b>Color:</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='colornormal' id='colornormal' type='checkbox' $colornormal onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"normal\", \"colornormal\")'>
                                <label>Normal</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='coloramarillo' id='coloramarillo' type='checkbox' $coloramarillo onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"amarillo\", \"coloramarillo\")'>
                                <label>Amarillo</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='colorblanco' id='colorblanco' type='checkbox' $colorblanco onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"blanco\", \"colorblanco\")'>
                                <label>Blanco</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='colorrojo' id='colorrojo' type='checkbox' $colorrojo onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"rojo\", \"colorrojo\")'>
                                <label>Rojo</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='colorotro' id='colorotro' type='checkbox' $colorotro onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"otro\", \"colorotro\")'>
                                <label>Otro</label>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    ///////Sistema Estomatognatico Sensibilidad
    if($opcion == 'cargaEstomatognatico6'){
        $consultaEstomatognatico    = $db->cargaEstomatognatico($idinforme, $idexamen);
        
        if( $consultaEstomatognatico != false )
        {
            for ( $te = 0; $te < sizeof($consultaEstomatognatico); $te++ )
            {
                $idopciones     = $consultaEstomatognatico[$te]['idopciones'];
                $normalsensible = $consultaEstomatognatico[$te]['normal'];
                $hiposensible   = $consultaEstomatognatico[$te]['hiposensible'];
                $hipersensible  = $consultaEstomatognatico[$te]['hipersensible'];

                if($normalsensible == 1){$normalsensible = "checked";}else{$normalsensible = "";}
                if($hiposensible == 1){$hiposensible = "checked";}else{$hiposensible = "";}
                if($hipersensible == 1){$hipersensible = "checked";}else{$hipersensible = "";}
                
                    $datos .= "<div class='col-md-2'>
                            <div class='form-group'>
                                <label><b>Sensibilidad:</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='normalsensible' id='normalsensible' type='checkbox' $normalsensible onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"normal\", \"normalsensible\")'>
                                <label>Normal</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='hiposensible' id='hiposensible' type='checkbox' $hiposensible onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"hiposensible\", \"hiposensible\")'>
                                <label>Hiposensible</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='hipersensible' id='hipersensible' type='checkbox' $hipersensible onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"hipersensible\", \"hipersensible\")'>
                                <label>Hipersensible</label>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    ///////Sistema Estomatognatico Boca seca
    if($opcion == 'cargaEstomatognatico7'){
        $consultaEstomatognatico    = $db->cargaEstomatognatico($idinforme, $idexamen);
        
        if( $consultaEstomatognatico != false )
        {
            for ( $te = 0; $te < sizeof($consultaEstomatognatico); $te++ )
            {
                $idopciones     = $consultaEstomatognatico[$te]['idopciones'];
                $bocasecasi     = $consultaEstomatognatico[$te]['si'];
                $bocasecano     = $consultaEstomatognatico[$te]['no'];

                if($bocasecasi == 1){$bocasecasi = "checked";}else{$bocasecasi = "";}
                if($bocasecano == 1){$bocasecano = "checked";}else{$bocasecano = "";}
                
                    $datos .= "<div class='col-md-2'>
                            <div class='form-group'>
                                <label><b>Boca seca:</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='bocasecasi' id='bocasecasi' type='checkbox' $bocasecasi onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"si\", \"bocasecasi\")'>
                                <label>Si</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='bocasecano' id='bocasecano' type='checkbox' $bocasecano onclick='respuestaEstomatognatico($idinforme, $idopciones, $idexamen, \"no\", \"bocasecano\")'>
                                <label>No</label>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    if($opcion == "respuestaEstomatognatico")
    {
        $idinforme      = $_POST['idinforme'];
        $idopciones     = $_POST['idopciones'];
        $idexamen       = $_POST['idexamen'];
        $campo          = $_POST['campo'];
        $idoption       = $_POST['idoption'];

        $respuestaEstomatognatico = $db->respuestaEstomatognatico($idinforme,
                                                                $idopciones,
                                                                $idexamen,
                                                                $campo,
                                                                $idoption);

        if($respuestaEstomatognatico)
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
                
                if($idpregunta == 106){
                    $datos .= "<div class='col-md-3'>
                                    <div class='form-group'>
                                        <label><b>$pregunta:</b></label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input disabled name='simetrianormal' id='simetrianormal' type='checkbox' $normal onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"normal\", \"simetrianormal\")'>
                                        <label>Normal</label>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <input disabled name='simetriaalterada' id='simetriaalterada' type='checkbox' $alterada onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"alterada\", \"simetriaalterada\")'>
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
                                        <input disabled name='tononormal' id='tononormal' type='checkbox' $normal onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"normal\", \"tononormal\")'>
                                        <label>Normal</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input disabled name='tonohipotonico' id='tonohipotonico' type='checkbox' $hipotonico onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"hipotonico\", \"tonohipotonico\")'>
                                        <label>Hipot&oacute;nico</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input disabled name='tonohipertonico' id='tonohipertonico' type='checkbox' $hipertonico onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"hipertonico\", \"tonohipertonico\")'>
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
                                        <input disabled name='sensibilidadnormal' id='sensibilidadnormal' type='checkbox' $normal onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"normal\", \"sensibilidadnormal\")'>
                                        <label>Normal</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input disabled name='sensibilidadAumentada' id='sensibilidadAumentada' type='checkbox' $aumentada onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"aumentada\", \"sensibilidadAumentada\")'>
                                        <label>Aumentada</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <input disabled name='sensibilidadDisminuida' id='sensibilidadDisminuida' type='checkbox' $disminuida onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"disminuida\", \"sensibilidadDisminuida\")'>
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
                                        <input disabled name='movibilidadnormal' id='movibilidadnormal' type='checkbox' $normal onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"normal\", \"movibilidadnormal\")'>
                                        <label>Normal</label>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <input disabled name='movilidadalterada' id='movilidadalterada' type='checkbox' $alterada onclick='respuestaSoporteFisico($idpaciente, $idrespuesta, \"alterada\", \"movilidadalterada\")'>
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
    
    ///////Alimentacion fase anticipatoria
    if($opcion == 'cargaAlimentacion1'){

        $consultaAlimentacion    = $db->cargaAlimentacion($idinforme, $idexamen);
        
        if( $consultaAlimentacion != false )
        {
            for ( $te = 0; $te < sizeof($consultaAlimentacion); $te++ )
            {
                $idopciones     = $consultaAlimentacion[$te]['idopciones'];
                $texto          = $consultaAlimentacion[$te]['texto'];
                
                $datos .= "<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>Fase anticipatoria</b></label>
                                    <textarea class='form-control' rows='3' id='textoAlimen$idexamen' onblur='respuestaAlimentacion($idinforme, $idopciones, $idexamen)' placeholder='Inter&eacute;s en el momento de la alimentaci&oacute;n \nselectividad (agrado o rechazo)'>$texto</textarea>
                                </div>
                            </div>";
            }

            echo $datos;
        }
    }
    
    ///////Alimentacion fase preparatoria
    if($opcion == 'cargaAlimentacion2'){

        $consultaAlimentacion    = $db->cargaAlimentacion($idinforme, $idexamen);
        
        if( $consultaAlimentacion != false )
        {
            for ( $te = 0; $te < sizeof($consultaAlimentacion); $te++ )
            {
                $idopciones     = $consultaAlimentacion[$te]['idopciones'];
                $texto          = $consultaAlimentacion[$te]['texto'];
                
                $datos .= "<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>Fase preparatoria</b></label>
                                    <textarea class='form-control' rows='3' id='textoAlimen$idexamen' onblur='respuestaAlimentacion($idinforme, $idopciones, $idexamen)' placeholder='Masticaci&oacute;n \nrealiza cierre labial funcional. \nPosteriorizaci&oacute;n del alimento'>$texto</textarea>
                                </div>
                            </div>";
            }

            echo $datos;
        }
    }
    
    ///////Alimentacion fase oral
    if($opcion == 'cargaAlimentacion3'){

        $consultaAlimentacion    = $db->cargaAlimentacion($idinforme, $idexamen);
        
        if( $consultaAlimentacion != false )
        {
            for ( $te = 0; $te < sizeof($consultaAlimentacion); $te++ )
            {
                $idopciones     = $consultaAlimentacion[$te]['idopciones'];
                $texto          = $consultaAlimentacion[$te]['texto'];
                
                $datos .= "<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>Fase oral</b></label>
                                    <textarea class='form-control' rows='3' id='textoAlimen$idexamen' onblur='respuestaAlimentacion($idinforme, $idopciones, $idexamen)' placeholder='Activaci&oacute;n del reflejo deglutorio \npatrones compensatorios \nsigno de alerta(ganso y/o signos de alerta como tos).'>$texto</textarea>
                                </div>
                            </div>";
            }

            echo $datos;
        }
    }
    
    ///////Alimentacion conclusiones
    if($opcion == 'cargaAlimentacion4'){

        $consultaAlimentacion    = $db->cargaAlimentacion($idinforme, $idexamen);
        
        if( $consultaAlimentacion != false )
        {
            for ( $te = 0; $te < sizeof($consultaAlimentacion); $te++ )
            {
                $idopciones     = $consultaAlimentacion[$te]['idopciones'];
                $texto          = $consultaAlimentacion[$te]['texto'];
                
                $datos .= "<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>Conclusiones</b></label>
                                    <textarea class='form-control' rows='3' id='textoAlimen$idexamen' onblur='respuestaAlimentacion($idinforme, $idopciones, $idexamen)'>$texto</textarea>
                                </div>
                            </div>";
            }

            echo $datos;
        }
    }
    
    ///////Lenguaje Expresivo
    if($opcion == 'cargaAlimentacion23'){

        $consultaAlimentacion    = $db->cargaAlimentacion($idinforme, $idexamen);
        
        if( $consultaAlimentacion != false )
        {
            for ( $te = 0; $te < sizeof($consultaAlimentacion); $te++ )
            {
                $idopciones     = $consultaAlimentacion[$te]['idopciones'];
                $texto          = $consultaAlimentacion[$te]['texto'];
                
                $datos .= "<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>Lenguaje Expresivo</b></label>
                                    <textarea class='form-control' rows='3' id='textoAlimen$idexamen' onblur='respuestaAlimentacion($idinforme, $idopciones, $idexamen)' placeholder='Modo de comunicaci&oacute;n (verbal, no verbal, otro) \nComponentes del lenguaje\nFon&eacute;tico\nFonol&oacute;gico\nSint&aacute;ctico\nSem&aacute;ntico'>$texto</textarea>
                                </div>
                            </div>";
            }

            echo $datos;
        }
    }
    
    ///////Lenguaje Comprensivo
    if($opcion == 'cargaAlimentacion24'){

        $consultaAlimentacion    = $db->cargaAlimentacion($idinforme, $idexamen);
        
        if( $consultaAlimentacion != false )
        {
            for ( $te = 0; $te < sizeof($consultaAlimentacion); $te++ )
            {
                $idopciones     = $consultaAlimentacion[$te]['idopciones'];
                $texto          = $consultaAlimentacion[$te]['texto'];
                
                $datos .= "<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>Lenguaje Comprensivo</b></label>
                                    <textarea class='form-control' rows='3' id='textoAlimen$idexamen' onblur='respuestaAlimentacion($idinforme, $idopciones, $idexamen)' placeholder='Sem&aacute;ntico\nPragm&aacute;tico'>$texto</textarea>
                                </div>
                            </div>";
            }

            echo $datos;
        }
    }
    
    ///////Conductas y habitos
    if($opcion == 'cargaAlimentacion25'){

        $consultaAlimentacion    = $db->cargaAlimentacion($idinforme, $idexamen);
        
        if( $consultaAlimentacion != false )
        {
            for ( $te = 0; $te < sizeof($consultaAlimentacion); $te++ )
            {
                $idopciones     = $consultaAlimentacion[$te]['idopciones'];
                $texto          = $consultaAlimentacion[$te]['texto'];
                
                $datos .= "<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>Conductas y H&aacute;bitos</b></label>
                                    <textarea class='form-control' rows='3' id='textoAlimen$idexamen' onblur='respuestaAlimentacion($idinforme, $idopciones, $idexamen)' placeholder=''>$texto</textarea>
                                </div>
                            </div>";
            }

            echo $datos;
        }
    }
    
    ///////Cognitivo
    if($opcion == 'cargaAlimentacion26'){

        $consultaAlimentacion    = $db->cargaAlimentacion($idinforme, $idexamen);
        
        if( $consultaAlimentacion != false )
        {
            for ( $te = 0; $te < sizeof($consultaAlimentacion); $te++ )
            {
                $idopciones     = $consultaAlimentacion[$te]['idopciones'];
                $texto          = $consultaAlimentacion[$te]['texto'];
                
                $datos .= "<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>Cognitivo</b></label>
                                    <textarea class='form-control' rows='3' id='textoAlimen$idexamen' onblur='respuestaAlimentacion($idinforme, $idopciones, $idexamen)' placeholder='Calculo\nEscritura\nLectura'>$texto</textarea>
                                </div>
                            </div>";
            }

            echo $datos;
        }
    }
    
    ///////Juego
    if($opcion == 'cargaAlimentacion27'){

        $consultaAlimentacion    = $db->cargaAlimentacion($idinforme, $idexamen);
        
        if( $consultaAlimentacion != false )
        {
            for ( $te = 0; $te < sizeof($consultaAlimentacion); $te++ )
            {
                $idopciones     = $consultaAlimentacion[$te]['idopciones'];
                $texto          = $consultaAlimentacion[$te]['texto'];
                
                $datos .= "<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>Juego</b></label>
                                    <textarea class='form-control' rows='3' id='textoAlimen$idexamen' onblur='respuestaAlimentacion($idinforme, $idopciones, $idexamen)' placeholder='Tipo de juego: (solitario, representativo, simb&oacute;lico).\nInteracci&oacute;n'>$texto</textarea>
                                </div>
                            </div>";
            }

            echo $datos;
        }
    }
    
    ///////Area social
    if($opcion == 'cargaAlimentacion28'){

        $consultaAlimentacion    = $db->cargaAlimentacion($idinforme, $idexamen);
        
        if( $consultaAlimentacion != false )
        {
            for ( $te = 0; $te < sizeof($consultaAlimentacion); $te++ )
            {
                $idopciones     = $consultaAlimentacion[$te]['idopciones'];
                $texto          = $consultaAlimentacion[$te]['texto'];
                
                $datos .= "<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>&Aacute;rea social</b></label>
                                    <textarea class='form-control' rows='3' id='textoAlimen$idexamen' onblur='respuestaAlimentacion($idinforme, $idopciones, $idexamen)' placeholder='Interacci&oacute;n con pares y/o adultos.\nParticipaci&oacute;n en diferentes contextos'>$texto</textarea>
                                </div>
                            </div>";
            }

            echo $datos;
        }
    }
    
    
    if($opcion == "respuestaAlimentacion")
    {
        $idinforme  = $_POST['idinforme'];
        $idopciones = $_POST['idopciones'];
        $idexamen   = $_POST['idexamen'];
        $texto      = $_POST['texto'];

        $respuestaAlimentacion = $db->respuestaAlimentacion($idinforme,
                                                                $idopciones,
                                                                $idexamen,
                                                                $texto);

        if($respuestaAlimentacion)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    
    
    
    ///////cargaPrelinguistico movimientos
    if($opcion == 'cargaPrelinguistico15'){
        $consultaPrelinguistico    = $db->cargaPrelinguistico($idinforme, $idexamen);
        
        if( $consultaPrelinguistico != false )
        {
            for ( $te = 0; $te < sizeof($consultaPrelinguistico); $te++ )
            {
                $idopciones     = $consultaPrelinguistico[$te]['idopciones'];
                $movimientosi   = $consultaPrelinguistico[$te]['si'];
                $movimientono   = $consultaPrelinguistico[$te]['no'];
                $movimientotext = $consultaPrelinguistico[$te]['texto'];

                if($movimientosi == 1){$movimientosi = "checked";}else{$movimientosi = "";}
                if($movimientono == 1){$movimientono = "checked";}else{$movimientono = "";}
                
                    $datos .= "<div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>&iquest;Realiza movimientos con alguna parte del cuerpo, al escuchar que alguien le habla?</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='movimientosi' id='movimientosi' type='checkbox' $movimientosi onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"si\", \"movimientosi\")'>
                                <label>Si</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='movimientono' id='movimientono' type='checkbox' $movimientono onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"no\", \"movimientono\")'>
                                <label>No</label>
                            </div>
                        </div>
                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>&iquest;Qui&eacute;n?</b></label>
                                <textarea class='form-control' rows='1' id='quienmovimiento' onblur='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"texto\", \"quienmovimiento\")'>$movimientotext</textarea>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    ///////cargaPrelinguistico ojos
    if($opcion == 'cargaPrelinguistico16'){
        $consultaPrelinguistico    = $db->cargaPrelinguistico($idinforme, $idexamen);
        
        if( $consultaPrelinguistico != false )
        {
            for ( $te = 0; $te < sizeof($consultaPrelinguistico); $te++ )
            {
                $idopciones     = $consultaPrelinguistico[$te]['idopciones'];
                $ojossi         = $consultaPrelinguistico[$te]['si'];
                $ojosno         = $consultaPrelinguistico[$te]['no'];
                $ojosaalgunas   = $consultaPrelinguistico[$te]['algunas'];
                $ojostext       = $consultaPrelinguistico[$te]['texto'];

                if($ojossi == 1){$ojossi = "checked";}else{$ojossi = "";}
                if($ojosno == 1){$ojosno = "checked";}else{$ojosno = "";}
                if($ojosaalgunas == 1){$ojosaalgunas = "checked";}else{$ojosaalgunas = "";}
                
                    $datos .= "<div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>&iquest;Sigue con los ojos la dirección de la mirada del adulto?</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='ojossi' id='ojossi' type='checkbox' $ojossi onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"si\", \"ojossi\")'>
                                <label>Si</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='ojosno' id='ojosno' type='checkbox' $ojosno onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"no\", \"ojosno\")'>
                                <label>No</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='ojosaalgunas' id='ojosaalgunas' type='checkbox' $ojosaalgunas onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"algunas\", \"ojosaalgunas\")'>
                                <label>Algunas veces</label>
                            </div>
                        </div>
                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>&iquest;Cuando?</b></label>
                                <textarea class='form-control' rows='1' id='cuandoojos' onblur='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"texto\", \"cuandoojos\")'>$ojostext</textarea>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    ///////cargaPrelinguistico sonrisa
    if($opcion == 'cargaPrelinguistico17'){
        $consultaPrelinguistico    = $db->cargaPrelinguistico($idinforme, $idexamen);
        
        if( $consultaPrelinguistico != false )
        {
            for ( $te = 0; $te < sizeof($consultaPrelinguistico); $te++ )
            {
                $idopciones      = $consultaPrelinguistico[$te]['idopciones'];
                $sonrisasi       = $consultaPrelinguistico[$te]['si'];
                $sonrisano       = $consultaPrelinguistico[$te]['no'];
                $sonrisaalgunas  = $consultaPrelinguistico[$te]['algunas'];
                $sonrisatext     = $consultaPrelinguistico[$te]['texto'];

                if($sonrisasi == 1){$sonrisasi = "checked";}else{$sonrisasi = "";}
                if($sonrisano == 1){$sonrisano = "checked";}else{$sonrisano = "";}
                if($sonrisaalgunas == 1){$sonrisaalgunas = "checked";}else{$sonrisaalgunas = "";}
                
                    $datos .= "<div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>&iquest;Posee sonrisa social?</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='sonrisasi' id='sonrisasi' type='checkbox' $sonrisasi onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"si\", \"sonrisasi\")'>
                                <label>Si</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='sonrisano' id='sonrisano' type='checkbox' $sonrisano onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"no\", \"sonrisano\")'>
                                <label>No</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='sonrisaalgunas' id='sonrisaalgunas' type='checkbox' $sonrisaalgunas onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"algunas\", \"sonrisaalgunas\")'>
                                <label>Algunas ocasiones</label>
                            </div>
                        </div>
                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>&iquest;Qui&eacute;n?</b></label>
                                <textarea class='form-control' rows='1' id='quiensonrisa' onblur='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"texto\", \"quiensonrisa\")'>$sonrisatext</textarea>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    ///////cargaPrelinguistico nombre
    if($opcion == 'cargaPrelinguistico18'){
        $consultaPrelinguistico    = $db->cargaPrelinguistico($idinforme, $idexamen);
        
        if( $consultaPrelinguistico != false )
        {
            for ( $te = 0; $te < sizeof($consultaPrelinguistico); $te++ )
            {
                $idopciones     = $consultaPrelinguistico[$te]['idopciones'];
                $nombresi         = $consultaPrelinguistico[$te]['si'];
                $nombreno         = $consultaPrelinguistico[$te]['no'];

                if($nombresi == 1){$nombresi = "checked";}else{$nombresi = "";}
                if($nombreno == 1){$nombreno = "checked";}else{$nombreno = "";}
                
                    $datos .= "<div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>&iquest;El ni&ntilde;o(a) comprende cuando lo llaman por su nombre?</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='nombresi' id='nombresi' type='checkbox' $nombresi onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"si\", \"nombresi\")'>
                                <label>Si</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='nombreno' id='nombreno' type='checkbox' $nombreno onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"no\", \"nombreno\")'>
                                <label>No</label>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    ///////cargaPrelinguistico palabras
    if($opcion == 'cargaPrelinguistico19'){
        $consultaPrelinguistico    = $db->cargaPrelinguistico($idinforme, $idexamen);
        
        if( $consultaPrelinguistico != false )
        {
            for ( $te = 0; $te < sizeof($consultaPrelinguistico); $te++ )
            {
                $idopciones     = $consultaPrelinguistico[$te]['idopciones'];
                $palabrassi         = $consultaPrelinguistico[$te]['si'];
                $palabrasno         = $consultaPrelinguistico[$te]['no'];

                if($palabrassi == 1){$palabrassi = "checked";}else{$palabrassi = "";}
                if($palabrasno == 1){$palabrasno = "checked";}else{$palabrasno = "";}
                
                    $datos .= "<div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>&iquest;El niño(a) comprende palabras en diferentes contextos?</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='palabrassi' id='palabrassi' type='checkbox' $palabrassi onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"si\", \"palabrassi\")'>
                                <label>Si</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='palabrasno' id='palabrasno' type='checkbox' $palabrasno onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"no\", \"palabrasno\")'>
                                <label>No</label>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    ///////cargaPrelinguistico juegos
    if($opcion == 'cargaPrelinguistico20'){
        $consultaPrelinguistico    = $db->cargaPrelinguistico($idinforme, $idexamen);
        
        if( $consultaPrelinguistico != false )
        {
            for ( $te = 0; $te < sizeof($consultaPrelinguistico); $te++ )
            {
                $idopciones     = $consultaPrelinguistico[$te]['idopciones'];
                $juegossi        = $consultaPrelinguistico[$te]['si'];
                $juegosno        = $consultaPrelinguistico[$te]['no'];
                $juegosalgunas   = $consultaPrelinguistico[$te]['algunas'];
                $juegosincluye   = $consultaPrelinguistico[$te]['otro'];

                if($juegossi == 1){$juegossi = "checked";}else{$juegossi = "";}
                if($juegosno == 1){$juegosno = "checked";}else{$juegosno = "";}
                if($juegosalgunas == 1){$juegosalgunas = "checked";}else{$juegosalgunas = "";}
                if($juegosincluye == 1){$juegosincluye = "checked";}else{$juegosincluye = "";}
                
                    $datos .= "<div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>&iquest;Responde a los juegos propuestos por el interlocutor? </b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='juegossi' id='juegossi' type='checkbox' $juegossi onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"si\", \"juegossi\")'>
                                <label>Si</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='juegosno' id='juegosno' type='checkbox' $juegosno onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"no\", \"juegosno\")'>
                                <label>No</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='juegosalgunas' id='juegosalgunas' type='checkbox' $juegosalgunas onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"algunas\", \"juegosalgunas\")'>
                                <label>Algunas veces</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='juegosincluye' id='juegosincluye' type='checkbox' $juegosincluye onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"otro\", \"juegosincluye\")'>
                                <label>Si, pero no los incluye</label>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    
    ///////cargaPrelinguistico silabas
    if($opcion == 'cargaPrelinguistico21'){
        $consultaPrelinguistico    = $db->cargaPrelinguistico($idinforme, $idexamen);
        
        if( $consultaPrelinguistico != false )
        {
            for ( $te = 0; $te < sizeof($consultaPrelinguistico); $te++ )
            {
                $idopciones     = $consultaPrelinguistico[$te]['idopciones'];
                $silabassi         = $consultaPrelinguistico[$te]['si'];
                $silabasno         = $consultaPrelinguistico[$te]['no'];

                if($silabassi == 1){$silabassi = "checked";}else{$silabassi = "";}
                if($silabasno == 1){$silabasno = "checked";}else{$silabasno = "";}
                
                    $datos .= "<div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>&iquest;Imita sílabas y palabras? </b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='silabassi' id='silabassi' type='checkbox' $silabassi onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"si\", \"silabassi\")'>
                                <label>Si</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='silabasno' id='silabasno' type='checkbox' $silabasno onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"no\", \"silabasno\")'>
                                <label>No</label>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    ///////cargaPrelinguistico partes
    if($opcion == 'cargaPrelinguistico22'){
        $consultaPrelinguistico    = $db->cargaPrelinguistico($idinforme, $idexamen);
        
        if( $consultaPrelinguistico != false )
        {
            for ( $te = 0; $te < sizeof($consultaPrelinguistico); $te++ )
            {
                $idopciones     = $consultaPrelinguistico[$te]['idopciones'];
                $partessi         = $consultaPrelinguistico[$te]['si'];
                $partesno         = $consultaPrelinguistico[$te]['no'];

                if($partessi == 1){$partessi = "checked";}else{$partessi = "";}
                if($partesno == 1){$partesno = "checked";}else{$partesno = "";}
                
                    $datos .= "<div class='col-md-12'>
                            <div class='form-group'>
                                <label><b>&iquest;Señala partes de su cuerpo al solicitárselo?</b></label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='partessi' id='partessi' type='checkbox' $partessi onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"si\", \"partessi\")'>
                                <label>Si</label>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='form-group'>
                                <input name='partesno' id='partesno' type='checkbox' $partesno onclick='respuestaPrelinguistico($idinforme, $idopciones, $idexamen, \"no\", \"partesno\")'>
                                <label>No</label>
                            </div>
                        </div>";
                
            }

            echo $datos;
        }
    }
    
    
    if($opcion == "respuestaPrelinguistico")
    {
        $idinforme      = $_POST['idinforme'];
        $idopciones     = $_POST['idopciones'];
        $idexamen       = $_POST['idexamen'];
        $campo          = $_POST['campo'];
        $idoption       = $_POST['idoption'];

        $respuestaPrelinguistico = $db->respuestaPrelinguistico($idinforme,
                                                                $idopciones,
                                                                $idexamen,
                                                                $campo,
                                                                $idoption);

        if($respuestaPrelinguistico)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }

    ///////cargaDiagnostico
    if($opcion == 'cargaDiagnostico'){

        $consultaDiagnostico   = $db->cargaDiagnostico($idinforme);

        if( $consultaDiagnostico != false )
        {
            for ( $te = 0; $te < sizeof($consultaDiagnostico); $te++ )
            {
                $idinforme   = $consultaDiagnostico[$te]['idinforme'];
                $diagnostico = $consultaDiagnostico[$te]['resultados'];

                $datos .= "<div class='col-md-12'>
                                    <div class='form-group'>
                                        <label><b>Diagn&oacute;stico</b></label>
                                        <textarea class='form-control' rows='3' id='diagnostico$idinforme' onblur='respuestaDiagnostico($idinforme)' placeholder=''>$diagnostico</textarea>
                                    </div>
                                </div>";
            }

            echo $datos;
        }
    }

    if($opcion == "respuestaDiagnostico")
    {
        $idinforme  = $_POST['idinforme'];
        $texto      = $_POST['texto'];

        $respuestaDiagnostico = $db->respuestaDiagnostico($idinforme, $texto);

        if($respuestaDiagnostico)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }

    ///////cargaRecomendaciones
    if($opcion == 'cargaRecomendaciones'){

        $consultaRecomendaciones    = $db->cargaRecomendaciones($idinforme);
        
        if( $consultaRecomendaciones != false )
        {
            for ( $te = 0; $te < sizeof($consultaRecomendaciones); $te++ )
            {
                $idinforme       = $consultaRecomendaciones[$te]['idinforme'];
                $recomendaciones = $consultaRecomendaciones[$te]['recomendaciones'];
                
                $datos .= "<div class='col-md-12'>
                                <div class='form-group'>
                                    <label><b>Recomendaciones</b></label>
                                    <textarea class='form-control' rows='3' id='recomendaciones$idinforme' onblur='respuestaRecomendaciones($idinforme)' placeholder=''>$recomendaciones</textarea>
                                </div>
                            </div>";
            }

            echo $datos;
        }
    }
    
    if($opcion == "respuestaRecomendaciones")
    {
        $idinforme  = $_POST['idinforme'];
        $texto      = $_POST['texto'];

        $respuestaRecomendaciones = $db->respuestaRecomendaciones($idinforme, $texto);

        if($respuestaRecomendaciones)
        {
            echo "success";
        }else
        {
            echo "error";
        }
    }
    

