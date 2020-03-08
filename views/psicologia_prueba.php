<?php   
    include('../directiva.php');
    $idpaciente = $_GET['var'];
    $idarea     = $_GET['idarea'];
    $verBoton   = false;
?>

<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Apaautismo Cali</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
        
        <link rel="stylesheet" href="../css/jquery-ui.css">
        <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/jquery.timepicker.css" />
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker.min.css" />

	
	    <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="../js/jquery-1.12.4.js"></script>
        <script src="../js/jquery-ui.js"></script>
        <script src="../js/jquery.timepicker.js"></script>
        <script src="../js/bootstrap-datepicker.min.js"></script>
        
       
    </head>

<body>

    <div class="page-container">
            
            <?php
        		include('menu.php');
        	?>
            
            <div class="content-container">
                
                <div class="page-title">
                    <div class="mobile-menu">
                        <a href="#"><i class="fa fa-bars"></i></a>
                    </div> <!-- .mobile-menu -->                    
                    
                    <div class="pull-left">
                        <h3>Apa Autismo Cali</h3>                        
                        <ol class="breadcrumb">
                            <li><a href="<?php echo $cms['base-url']; ?>">Panel de Administrador</a></li>                
                        </ol><!-- .breadcrumb -->                                        
                    </div><!-- .pull-left -->                                        
                </div><!--.page-title --> 
                
                <div class="content-inner">
                    <div class="stat-boxes">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                        
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item active">
                                                <a class="nav-link active" href="#m-chat" role="tab" data-toggle="tab">M-CHAT</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#dsm-iv" role="tab" data-toggle="tab">DSM V</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#idea" role="tab" data-toggle="tab">IDEA</a>
                                            </li>
                                            
                                        </ul>
                                        
                                        <!-- ********************** TAB PANEL M-CHAT ********************** -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="m-chat">
                                                <!-- *********************************************** PACIENTE ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingMchat">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseMchat" aria-expanded="true" aria-controls="collapseMchat">
                                                            <h5 class="mb-12">Cuestionario de Autismo en la Infancia - Modificado</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsePaciente" class="collapse show" role="tabpanel" aria-labelledby="headingMchat">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    
                                                                    <?php
                                                                        if($idarea != $areausr){
                                                                            $verBoton = false;
                                                                            echo'<input name="verBoton" id="verBoton" type="text" class="form-control" value="disabled">';
                                                                        }else{
                                                                            $verBoton = true;
                                                                            echo'<input name="verBoton" id="verBoton" type="text" class="form-control" value="">';
                                                                        }                           
                                                                    ?>
                                                                    
                                                                    <!-- ***********************************************Nombres y Apellidos Paciente************************************************************************* -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><h6>Por favor, rellene lo que su hijo hace habitualmente. Trate de responder a todas
                                                                                las preguntas. Si la conducta es poco frecuente (ej. la ha observado una o dos
                                                                                veces), responda “No”.</h6></label>
                                                                                <input type="hidden" id="idpaciente" value="<?php echo"$idpaciente";?>">
                                                                            </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                </div><!-- .row -->
                                                                <div id="preguntasMchat" class="row">
                                                                
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** CONCLUSIONES MCHAT ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingconclusionesMchat">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseconclusionesMchat" aria-expanded="true" aria-controls="collapseconclusionesMchat">
                                                            <h5 class="mb-12">Conclusiones MCHAT</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseconclusionesMchat" class="collapse show" role="tabpanel" aria-labelledby="headingconclusionesMchat">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <textarea class=" form-control" rows="20" id="conclusionesMCHAT" name="conclusionesMCHAT"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .row -->
                                                                <div class="row">
                                                                    <?php
                                                                        if($verBoton){
                                                                            echo'<div class="col-md-12">
                                                                                    <div class="button-form">
                                                                                        <button onclick="guardaConclusionesMCHAT()" class="btn btn-primary" style="float:right;">Guardar</button>
                                                                                    </div>
                                                                                </div>';
                                                                        }
                                                                    ?>
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                    
                                                    
                                                    
                                                    
                                                    
                                            </div> <!-- FIN TAB-->
                                          
                                            <!-- ********************** TAB PANEL DSM IV **********************-->
                                            <div role="tabpanel" class="w-100 tab-pane fade" id="dsm-iv">
                                            <!-- ***********************************************Card Motivo Consulta************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingDsm-iv">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDsm-iv" aria-expanded="true" aria-controls="collapseDsm-iv">
                                                            <h5 class="mb-0">DSM V</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseDsm-iv" class="collapse show" role="tabpanel" aria-labelledby="headingDsm-iv">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Consideraciones según el DSM-V<br>
                                                                            El DSM-V: Es el Manual de Diagnóstico y Estadístico de los trastornos mentales, el cual establece directrices para establecer el diagnóstico del Trastorno del Espectro del Autismo (TEA). Su utilización debe estar presidida por el juicio clínico en diferentes contextos de observación o por el análisis de los antecedentes. Inicialmente se evalúa el cumplimiento de los criterios y posteriormente se establece el nivel de gravedad del TEA teniendo en cuenta los grados que van del uno al tres, donde el uno representa un nivel de necesita ayuda, grado dos necesidad de ayuda notable y grado tres, necesidad de ayuda “muy”notable.  </b></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- ***********************************************Card Diagnosticos Previos************************************************************************* -->
    
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingDiagnosticoPrevio">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDiagnosticoPrevio" aria-expanded="true" aria-controls="collapseDiagnosticoPrevio">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                        <label><h6>Criterios a evaluar</h6></label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                        <label><h6>Cumple</h6></label>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseDiagnosticoPrevio" class="collapse show" role="tabpanel" aria-labelledby="headingDiagnosticoPrevio">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div id="ADSMV" class="row"></div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingFicha">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFicha" aria-expanded="true" aria-controls="collapseFicha">
                                                            <h5 class="mb-12">Nivel de Gravedad del TEA</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseFicha" class="collapse show" role="tabpanel" aria-labelledby="headingFicha">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    
                                                                    <!-- ***********************************************Ficha************************************************************************* -->
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <textarea class="form-control" rows="30" style="width: 900px; height: 250px" id="tea" name="tea"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                        if($verBoton){
                                                                            echo'<div class="col-md-12">
                                                                                    <div class="button-form">
                                                                                        <button onclick="respuestaDSMVTea()" class="btn btn-primary" style="float:right;">Guardar</button>
                                                                                    </div>
                                                                                </div>';
                                                                        }
                                                                    ?>
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                
                                                <!-- *********************************************** CONCLUSIONES DSMV ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingconclusionesDSMV">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseconclusionesDSMV" aria-expanded="true" aria-controls="collapseconclusionesDSMV">
                                                            <h5 class="mb-12">Conclusiones DSMV</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseconclusionesDSMV" class="collapse show" role="tabpanel" aria-labelledby="headingconclusionesDSMV">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <textarea class=" form-control" rows="20" style="width: 900px; height: 250px" id="conclusionesDSMV" name="conclusionesDSMV"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .row -->
                                                                <div class="row">
                                                                    <?php
                                                                        if($verBoton){
                                                                            echo'<div class="col-md-12">
                                                                                    <div class="button-form">
                                                                                        <button onclick="guardaConclusionesDSMV()" class="btn btn-primary" style="float:right;">Guardar</button>
                                                                                    </div>
                                                                                </div>';
                                                                        }
                                                                    ?>
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                            </div>
                                            
                                            <!-- ********************** TAB PANEL IDEA **********************-->
                                            <div role="tabpanel" class="w-100 tab-pane fade" id="idea">
                                              
                                                <!-- ***********************************************Card Antecedentes Familiares************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingIdea">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseIdea" aria-expanded="true" aria-controls="collapseIdea">
                                                            <h5 class="mb-0">Escala del Inventario del Espectro Autista (IDEA)</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseIdea" class="collapse show" role="tabpanel" aria-labelledby="headingIdea">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>INSTRUCCIONES: A continuación le presento la Escala del Inventario del Espectro Autista
                                                                                (IDEA). Este instrumento permite valorar la seriedad y la profundidad de los rasgos autistas
                                                                                que presenta una persona. Le invito a pensar en las características que su alumno presenta y
                                                                                después elija en cada dimensión sólo una respuesta, esta debe ser la que mejor describa las
                                                                                conductas de su alumno. NOTA: Asignar siempre la puntuación más baja que sea posible. Se
                                                                                reserva el valor 0 para aquellos casos en que no hay anomalías en la dimensión
                                                                                correspondiente. Las puntuaciones 7, 5, 3 y 1, se reserva para los casos claramente situados
                                                                                entre dos puntuaciones pares.</b></label>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <!-- ***********************************************Card dimension 1************************************************************************* -->
                                                                                <div class="card ">
                                                                                    <div class="card-header" role="tab" id="headingDimension1">
                                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDimension1" aria-expanded="true" aria-controls="collapseDimension1">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Dimensi&oacute;n 1: Relaciones Sociales</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Selecci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Valor</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div><!-- .card-header -->
                                                                                    <div id="collapseDimension1" class="collapse show" role="tabpanel" aria-labelledby="headingDimension1">
                                                                                        <div class="card-block">
                                                                                            <div class="card-body">
                                                                                                <div class="row" id="idea1">
                                                                                                </div>
                                                                                                <div class="row" id="ideaResp1">
                                                                                                </div>
                                                                                            </div><!-- .card-body -->
                                                                                        </div><!-- .card-block -->
                                                                                    </div><!-- .collapse show -->
                                                                                </div><!-- .card -->
                                                                                <!-- ***********************************************Card dimension 1************************************************************************* -->
                                                                                
                                                                                <!-- ***********************************************Card dimension 2************************************************************************* -->
                                                                                <div class="card ">
                                                                                    <div class="card-header" role="tab" id="headingDimension2">
                                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDimension2" aria-expanded="true" aria-controls="collapseDimension2">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Dimensi&oacute;n 2: Capacidades de Referencia Conjunta</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Selecci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Valor</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div><!-- .card-header -->
                                                                                    <div id="collapseDimension2" class="collapse show" role="tabpanel" aria-labelledby="headingDimension2">
                                                                                        <div class="card-block">
                                                                                            <div class="card-body">
                                                                                                <div class="row" id="idea2">
                                                                                                </div>
                                                                                                <div class="row" id="ideaResp2">
                                                                                                </div>
                                                                                            </div><!-- .card-body -->
                                                                                        </div><!-- .card-block -->
                                                                                    </div><!-- .collapse show -->
                                                                                </div><!-- .card -->
                                                                                <!-- ***********************************************Card dimension 2************************************************************************* -->
                                                                                
                                                                                <!-- ***********************************************Card dimension 3************************************************************************* -->
                                                                                <div class="card ">
                                                                                    <div class="card-header" role="tab" id="headingDimension3">
                                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDimension3" aria-expanded="true" aria-controls="collapseDimension3">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Dimensi&oacute;n 3: Capacidades intersubjetivas y mentalistas</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Selecci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Valor</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div><!-- .card-header -->
                                                                                    <div id="collapseDimension3" class="collapse show" role="tabpanel" aria-labelledby="headingDimension3">
                                                                                        <div class="card-block">
                                                                                            <div class="card-body">
                                                                                                <div class="row" id="idea3">
                                                                                                </div>
                                                                                                <div class="row" id="ideaResp3">
                                                                                                </div>
                                                                                            </div><!-- .card-body -->
                                                                                        </div><!-- .card-block -->
                                                                                    </div><!-- .collapse show -->
                                                                                </div><!-- .card -->
                                                                                <!-- ***********************************************Card dimension 3************************************************************************* -->
                                                                                
                                                                                <!-- ***********************************************Card dimension 4************************************************************************* -->
                                                                                <div class="card ">
                                                                                    <div class="card-header" role="tab" id="headingDimension4">
                                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDimension4" aria-expanded="true" aria-controls="collapseDimension4">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Dimensi&oacute;n 4: Funciones Comunicativas</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Selecci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Valor</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div><!-- .card-header -->
                                                                                    <div id="collapseDimension4" class="collapse show" role="tabpanel" aria-labelledby="headingDimension4">
                                                                                        <div class="card-block">
                                                                                            <div class="card-body">
                                                                                                <div class="row" id="idea4">
                                                                                                </div>
                                                                                                <div class="row" id="ideaResp4">
                                                                                                </div>
                                                                                            </div><!-- .card-body -->
                                                                                        </div><!-- .card-block -->
                                                                                    </div><!-- .collapse show -->
                                                                                </div><!-- .card -->
                                                                                <!-- ***********************************************Card dimension 4************************************************************************* -->
                                                                                <!-- ***********************************************Card dimension 5************************************************************************* -->
                                                                                <div class="card ">
                                                                                    <div class="card-header" role="tab" id="headingDimension5">
                                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDimension5" aria-expanded="true" aria-controls="collapseDimension5">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Dimensi&oacute;n 5: Lenguaje Expresivo</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Selecci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Valor</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div><!-- .card-header -->
                                                                                    <div id="collapseDimension5" class="collapse show" role="tabpanel" aria-labelledby="headingDimension5">
                                                                                        <div class="card-block">
                                                                                            <div class="card-body">
                                                                                                <div class="row" id="idea5">
                                                                                                </div>
                                                                                                <div class="row" id="ideaResp5">
                                                                                                </div>
                                                                                            </div><!-- .card-body -->
                                                                                        </div><!-- .card-block -->
                                                                                    </div><!-- .collapse show -->
                                                                                </div><!-- .card -->
                                                                                <!-- ***********************************************Card dimension 5************************************************************************* -->
                                                                                <!-- ***********************************************Card dimension 6************************************************************************* -->
                                                                                <div class="card ">
                                                                                    <div class="card-header" role="tab" id="headingDimension6">
                                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDimension6" aria-expanded="true" aria-controls="collapseDimension6">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Dimensi&oacute;n 6: Lenguaje Receptivo</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Selecci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Valor</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div><!-- .card-header -->
                                                                                    <div id="collapseDimension6" class="collapse show" role="tabpanel" aria-labelledby="headingDimension6">
                                                                                        <div class="card-block">
                                                                                            <div class="card-body">
                                                                                                <div class="row" id="idea6">
                                                                                                </div>
                                                                                                <div class="row" id="ideaResp6">
                                                                                                </div>
                                                                                            </div><!-- .card-body -->
                                                                                        </div><!-- .card-block -->
                                                                                    </div><!-- .collapse show -->
                                                                                </div><!-- .card -->
                                                                                <!-- ***********************************************Card dimension 6************************************************************************* -->
                                                                                <!-- ***********************************************Card dimension 7************************************************************************* -->
                                                                                <div class="card ">
                                                                                    <div class="card-header" role="tab" id="headingDimension7">
                                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDimension7" aria-expanded="true" aria-controls="collapseDimension7">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Dimensi&oacute;n 7: Anticipaci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Selecci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Valor</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div><!-- .card-header -->
                                                                                    <div id="collapseDimension7" class="collapse show" role="tabpanel" aria-labelledby="headingDimension7">
                                                                                        <div class="card-block">
                                                                                            <div class="card-body">
                                                                                                <div class="row" id="idea7">
                                                                                                </div>
                                                                                                <div class="row" id="ideaResp7">
                                                                                                </div>
                                                                                            </div><!-- .card-body -->
                                                                                        </div><!-- .card-block -->
                                                                                    </div><!-- .collapse show -->
                                                                                </div><!-- .card -->
                                                                                <!-- ***********************************************Card dimension 7************************************************************************* -->
                                                                                <!-- ***********************************************Card dimension 8************************************************************************* -->
                                                                                <div class="card ">
                                                                                    <div class="card-header" role="tab" id="headingDimension8">
                                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDimension8" aria-expanded="true" aria-controls="collapseDimension8">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Dimensi&oacute;n 8: Flexibilidad</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Selecci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Valor</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div><!-- .card-header -->
                                                                                    <div id="collapseDimension8" class="collapse show" role="tabpanel" aria-labelledby="headingDimension8">
                                                                                        <div class="card-block">
                                                                                            <div class="card-body">
                                                                                                <div class="row" id="idea8">
                                                                                                </div>
                                                                                                <div class="row" id="ideaResp8">
                                                                                                </div>
                                                                                            </div><!-- .card-body -->
                                                                                        </div><!-- .card-block -->
                                                                                    </div><!-- .collapse show -->
                                                                                </div><!-- .card -->
                                                                                <!-- ***********************************************Card dimension 8************************************************************************* -->
                                                                                <!-- ***********************************************Card dimension 9************************************************************************* -->
                                                                                <div class="card ">
                                                                                    <div class="card-header" role="tab" id="headingDimension9">
                                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDimension9" aria-expanded="true" aria-controls="collapseDimension9">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Dimensi&oacute;n 9: Sentido de la Actividad</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Selecci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Valor</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div><!-- .card-header -->
                                                                                    <div id="collapseDimension9" class="collapse show" role="tabpanel" aria-labelledby="headingDimension9">
                                                                                        <div class="card-block">
                                                                                            <div class="card-body">
                                                                                                <div class="row" id="idea9">
                                                                                                </div>
                                                                                                <div class="row" id="ideaResp9">
                                                                                                </div>
                                                                                            </div><!-- .card-body -->
                                                                                        </div><!-- .card-block -->
                                                                                    </div><!-- .collapse show -->
                                                                                </div><!-- .card -->
                                                                                <!-- ***********************************************Card dimension 9************************************************************************* -->
                                                                                <!-- ***********************************************Card dimension 10************************************************************************* -->
                                                                                <div class="card ">
                                                                                    <div class="card-header" role="tab" id="headingDimension10">
                                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDimension10" aria-expanded="true" aria-controls="collapseDimension10">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Dimensi&oacute;n 10: Ficci&oacute;n e Imaginaci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Selecci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Valor</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div><!-- .card-header -->
                                                                                    <div id="collapseDimension10" class="collapse show" role="tabpanel" aria-labelledby="headingDimension10">
                                                                                        <div class="card-block">
                                                                                            <div class="card-body">
                                                                                                <div class="row" id="idea10">
                                                                                                </div>
                                                                                                <div class="row" id="ideaResp10">
                                                                                                </div>
                                                                                            </div><!-- .card-body -->
                                                                                        </div><!-- .card-block -->
                                                                                    </div><!-- .collapse show -->
                                                                                </div><!-- .card -->
                                                                                <!-- ***********************************************Card dimension 10************************************************************************* -->
                                                                                <!-- ***********************************************Card dimension 11************************************************************************* -->
                                                                                <div class="card ">
                                                                                    <div class="card-header" role="tab" id="headingDimension11">
                                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDimension11" aria-expanded="true" aria-controls="collapseDimension11">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Dimensi&oacute;n 11: Imitaci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Selecci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Valor</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div><!-- .card-header -->
                                                                                    <div id="collapseDimension11" class="collapse show" role="tabpanel" aria-labelledby="headingDimension11">
                                                                                        <div class="card-block">
                                                                                            <div class="card-body">
                                                                                                <div class="row" id="idea11">
                                                                                                </div>
                                                                                                <div class="row" id="ideaResp11">
                                                                                                </div>
                                                                                            </div><!-- .card-body -->
                                                                                        </div><!-- .card-block -->
                                                                                    </div><!-- .collapse show -->
                                                                                </div><!-- .card -->
                                                                                <!-- ***********************************************Card dimension 11************************************************************************* -->
                                                                                <!-- ***********************************************Card dimension 12************************************************************************* -->
                                                                                <div class="card ">
                                                                                    <div class="card-header" role="tab" id="headingDimension12">
                                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDimension12" aria-expanded="true" aria-controls="collapseDimension12">
                                                                                            <div class="row">
                                                                                                <div class="col-md-10">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Dimensi&oacute;n 12: Suspensi&oacute;n (Capacidad de crear significantes)</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Selecci&oacute;n</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-1">
                                                                                                    <div class="form-group">
                                                                                                        <label><h6>Valor</h6></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div><!-- .card-header -->
                                                                                    <div id="collapseDimension12" class="collapse show" role="tabpanel" aria-labelledby="headingDimension12">
                                                                                        <div class="card-block">
                                                                                            <div class="card-body">
                                                                                                <div class="row" id="idea12">
                                                                                                </div>
                                                                                                <div class="row" id="ideaResp12">
                                                                                                </div>
                                                                                            </div><!-- .card-body -->
                                                                                        </div><!-- .card-block -->
                                                                                    </div><!-- .collapse show -->
                                                                                </div><!-- .card -->
                                                                                <!-- ***********************************************Card dimension 12************************************************************************* -->
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                <!-- ***********************************************Card CONCENTRADO DE PUNTAJES************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingAntecedentesPrenatales">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAntecedentesPrenatales" aria-expanded="true" aria-controls="collapseAntecedentesPrenatales">
                                                            <h5 class="mb-0">Concentrado de Puntajes</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseAntecedentesPrenatales" class="collapse"  role="tabpanel" aria-labelledby="headingAntecedentesPrenatales">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-11">
                                                                        <div class="form-group">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        <div class="form-group">
                                                                            <label><b>TOTAL</b></label>
                                                                        </div>
                                                                    </div>
                                                                 
                                                                    <div class="col-md-1">
                                                                        <div class="form-group">
                                                                            <input name='total1' id='total1' type="hidden" class="form-control" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        <div class="form-group">
                                                                            <input name='total2' id='total2' type="hidden" class="form-control" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        <div class="form-group">
                                                                            <input name='total3' id='total3' type="hidden" class="form-control" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        <div class="form-group">
                                                                            <input name='total4' id='total4' type="hidden" class="form-control" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-11">
                                                                        <div class="form-group">
                                                                            <label style="text-align:right;"><b>Puntuaci&oacute;n total en espectro autista</b>
                                                                            (Suma de las puntuaciones de todas las dimensiones)</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        <div class="form-group">
                                                                            <input name='grantotal' id='grantotal' type="text" class="form-control" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                <!-- ***********************************************Card RESULTADOS************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingPrenatalParto">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePrenatalParto" aria-expanded="true" aria-controls="collapsePrenatalParto">
                                                            <h5 class="mb-0">Resultados</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsePrenatalParto" class="collapse" role="tabpanel" aria-labelledby="headingPrenatalParto">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Nivel 1: Autismo Cl&aacute;sico tipo Kanner</b></label>
                                                                                <p>Es el nivel que cursa con mayor afectación y correspondería a puntuaciones altas del Inventario de Espectro Autista, entre 70 y 96 aproximadamente.</p>
                                                                            <label><b>Nivel 2: Autismo Regresivo</b></label>
                                                                                <p>Se denomina así dado que se presenta la pérdida de capacidades aprendidas. Después de una
                                                                                etapa evolutiva aparentemente dentro de la normalidad se pierde el contacto ocular, el
                                                                                lenguaje y otras habilidades cognitivas. Puntuaciones en el Inventario de Espectro Autista
                                                                                aproximadamente entre 50 y 70.</p>
                                                                            <label><b>Nivel 3: Autismo de Alto funcionamiento</b></label>
                                                                                <p>Hay todavía gran controversia entre especialistas en esta denominación ya que puede
                                                                                solaparse en cierta medida con el Síndrome de Asperger que se expone en el siguiente nivel.
                                                                                Sus primeras manifestaciones suelen ser confundidas con el Déficit de Atención o trastornos
                                                                                de otro tipo, dado que no presentan algunos de los elementos nucleares del TEA.
                                                                                El lenguaje está presente si bien también lo están las dificultades para relacionarse con sus
                                                                                iguales. La presencia de una gama restrictiva y repetitiva de intereses rutinarios suele dar
                                                                                paso a obsesiones recurrentes y de difícil manejo. Puntuaciones en el Inventario de Espectro
                                                                                Autista aproximadamente entre 40 y 50.</p>
                                                                            <label><b>Nivel 4: Síndrome de Asperger</b></label>
                                                                                <p>Las personas con Síndrome de Asperger supondrían dentro de los TEA los de menor
                                                                                afectación. Así son personas que suelen estudiar en centros ordinarios, pasan sin llamar
                                                                                excesivamente la atención, salvo algunas etiquetas (en especial durante la adolescencia) de
                                                                                “raros” o “solitarios”. En algunas áreas pueden ser especialmente competentes si bien, su
                                                                                relación social siempre estará marcada por una incapacidad para entender las claves sociales
                                                                                y las sutilezas de la relación humana (poca empatía). Las puntuaciones en el Inventario de
                                                                                Espectro Autista fluctuarían en la franja más baja, alrededor de 30 a 45. Puntuaciones
                                                                                menores de 30 podrían indicar problemas específicos en alguna área pero se alejarían
                                                                                progresivamente de la posibilidad diagnóstica de un TEA</p>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** CONCLUSIONES IDEA ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingconclusionesIDEA">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseconclusionesIDEA" aria-expanded="true" aria-controls="collapseconclusionesIDEA">
                                                            <h5 class="mb-12">Conclusiones IDEA</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseconclusionesIDEA" class="collapse show" role="tabpanel" aria-labelledby="headingconclusionesIDEA">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <textarea class=" form-control" rows="20" style="width: 900px; height: 250px" id="conclusionesIDEA" name="conclusionesIDEA"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .row -->
                                                                <div class="row">
                                                                    
                                                                    
                                                                    <?php
                                                                        if($verBoton){
                                                                            echo'<div class="col-md-12">
                                                                                    <div class="button-form">
                                                                                        <button onclick="guardaConclusionesIDEA()" class="btn btn-primary" style="float:right;">Guardar</button>
                                                                                    </div>
                                                                                </div>';
                                                                        }
                                                                    ?>
                                                                    
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                            </div> <!--fin tab IDEA-->
                                        </div>
                                </div><!--col-md-12-->
                            </div><!--row-->
                        </div><!-- /.container-fluid --> 
                    </div><!-- .stat-boxes -->
                </div> <!-- .container-inner -->                                                         
            </div><!-- .content-container -->                                                            
        </div><!-- .page-container -->
        
        <?php
            include("../modal/modal_AddConstitucion.php");
            include("../modal/modal_AddTratamientos.php");
            include("../modal/modal_exito.php");
        ?>
        
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../vendor/datatables/jquery.dataTables.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
        
        <script src="../js/sb-admin.min.js"></script>
        <script src="../js/sb-admin-datatables.min.js"></script>
        <script src="../js/funciones.js"></script>
        
        <script type="text/javascript" src="../tinymce/js/jquery.min.js"></script>
		<script type="text/javascript" src="../tinymce/plugin/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="../tinymce/plugin/tinymce/init-tinymce.js"></script>
		
	    <script type"javascript">
        
            $(document).ready(function(){
                var verBoton = $("#verBoton").val();
                if(verBoton == 'disabled'){
                    $('input[type="checkbox"]').attr("disabled",true);
                    $('input[type="text"], textarea').attr("readonly","readonly");
                    $('input[type="text"]').attr("readonly",true);
                }else{
                    $('input[type="checkbox"]').removeAttr("disabled");
                }
            }); 
            
            var idpaciente = document.getElementById("idpaciente").value;
            cargaPreguntasMCHAT(idpaciente);
            cargaPreguntasDSMV(idpaciente);
            cargaPreguntasDSMVTEA(idpaciente);
            cargaPreguntasIDEA(idpaciente);
            consolidadoIDEA(idpaciente);
            
            //////PRUEBAS  MCHAT
            function cargaPreguntasMCHAT(idpaciente){
                var idarea = 1;
                var disabled = $("#verBoton").val();
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultaPreguntasMchat", idpaciente:idpaciente, idarea:idarea, disabled:disabled},function(data){
                    $("#preguntasMchat").html(data); 
                });
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultaConclusionesMchat", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#conclusionesMCHAT").html(data);
                });
            }
            
            function respuestaMchat(idpaciente, idrespuesta, idoption){
                var idarea = 1;
            
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"actualizaPreguntasMchat", idpaciente:idpaciente, idrespuesta:idrespuesta, idoption:idoption, idarea:idarea},function(data){
                   cargaPreguntasMCHAT(idpaciente);
                });
            }
            
            function guardaConclusionesMCHAT(){
                var idarea = 1;
                var idpaciente = $("#idpaciente").val();
                var conclusionMCHAT = $('textarea#conclusionesMCHAT').val();
                
              
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"actualizaConclusionesMCHAT", idpaciente:idpaciente, conclusionMCHAT:conclusionMCHAT, idarea:idarea},function(data){
                  alert("Datos guardados");
                });
               
            }
            
            //////PRUEBAS  DSMV
            function cargaPreguntasDSMV(idpaciente){
                var idarea = 1;
                var disabled = $("#verBoton").val();
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultaPreguntasDSMV", idpaciente:idpaciente, idarea:idarea, disabled:disabled},function(data){
                    $("#ADSMV").html(data); 
                });
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultaConclusionesDSMV", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#conclusionesDSMV").html(data);
                });
            }
            
            function respuestaDSMV(idpaciente, idrespuesta){
                var idarea = 1;
                if($("#check"+idrespuesta+":checked").val() != null ){
                    var idoption = 1;
                }else{
                    var idoption = 0;
                }
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"actualizaPreguntasDSMV", idpaciente:idpaciente, idrespuesta:idrespuesta, idoption:idoption, idarea:idarea},function(data){
                   cargaPreguntasDSMV(idpaciente);
                });
            }
            
            function guardaConclusionesDSMV(){
                var idarea = 1;
                var idpaciente = $("#idpaciente").val();
                var conclusionDSMV = $('#conclusionesDSMV').val();
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"actualizaConclusionesDSMV", idpaciente:idpaciente, conclusionDSMV:conclusionDSMV, idarea:idarea},function(data){
                   alert("Datos guardados");
                });
            }
            
            ////////TEA
            function cargaPreguntasDSMVTEA(idpaciente){
                var idarea = 1;
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultaPreguntasDSMVTEA", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#tea").html(data);
                });
            }
            
            function respuestaDSMVTea(){
                var idarea = 1;
                var idpaciente = $("#idpaciente").val();
                var texto = $('#tea').val();
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"actualizaPreguntasTEA", idpaciente:idpaciente, texto:texto, idarea:idarea},function(data){
                   alert("Datos guardados");
                });
            }
            
            //////PRUEBAS  IDEA
            function cargaPreguntasIDEA(idpaciente){
                var idarea = 1;
                var disabled = $("#verBoton").val();
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultaPreguntasIDEA", idpaciente:idpaciente, idarea:idarea, disabled:disabled},function(dataIDEA){
                    
                    for (var i in dataIDEA)
                    {
                        datosIDEA = dataIDEA[i];
                        $("#idea1").html(datosIDEA.idea1);
                        $("#idea2").html(datosIDEA.idea2); 
                        $("#idea3").html(datosIDEA.idea3); 
                        $("#idea4").html(datosIDEA.idea4);
                        $("#idea5").html(datosIDEA.idea5);
                        $("#idea6").html(datosIDEA.idea6); 
                        $("#idea7").html(datosIDEA.idea7); 
                        $("#idea8").html(datosIDEA.idea8); 
                        $("#idea9").html(datosIDEA.idea9);
                        $("#idea10").html(datosIDEA.idea10); 
                        $("#idea11").html(datosIDEA.idea11); 
                        $("#idea12").html(datosIDEA.idea12);
                        
                        $("#ideaResp1").html(datosIDEA.ideaResp1);
                        $("#ideaResp2").html(datosIDEA.ideaResp2);
                        $("#ideaResp3").html(datosIDEA.ideaResp3);
                        $("#ideaResp4").html(datosIDEA.ideaResp4);
                        $("#ideaResp5").html(datosIDEA.ideaResp5);
                        $("#ideaResp6").html(datosIDEA.ideaResp6);
                        $("#ideaResp7").html(datosIDEA.ideaResp7);
                        $("#ideaResp8").html(datosIDEA.ideaResp8);
                        $("#ideaResp9").html(datosIDEA.ideaResp9);
                        $("#ideaResp10").html(datosIDEA.ideaResp10);
                        $("#ideaResp11").html(datosIDEA.ideaResp11);
                        $("#ideaResp12").html(datosIDEA.ideaResp12);
                    }
                },'json');
                
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultaConclusionesIDEA", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#conclusionesIDEA").html(data);
                });
            }
            
            function guardaConclusionesIDEA(){
                var idarea = 1;
                var idpaciente = $("#idpaciente").val();
                var conclusionIDEA = $('#conclusionesIDEA').val();

                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"actualizaConclusionesIDEA", idpaciente:idpaciente, conclusionIDEA:conclusionIDEA, idarea:idarea},function(dataIDEA){
                   alert("Datos guardados");
                });
            }
            
            function respuestaIDEA(idpaciente, idrespuesta){
                var idarea = 1;
                
                if($("#dim"+idrespuesta+":checked").val() != null ){
                    var idoption = 1;
                }else{
                    var idoption = 0;
                }
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"actualizaPreguntasIDEA", idpaciente:idpaciente, idrespuesta:idrespuesta, idoption:idoption, idarea:idarea},function(data){
                });
                consolidadoIDEA(idpaciente);
            }
            
            function respuestaIDEATerapeuta(idpaciente, idrespuesta){
                var idarea = 1;
                var idoption = $("#respt"+idrespuesta).val();

                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"actualizaPreguntasIDEATerapeuta", idpaciente:idpaciente, idrespuesta:idrespuesta, idoption:idoption, idarea:idarea},function(data){
                 
                });
                consolidadoIDEA(idpaciente);
            }
            
            function consolidadoIDEA(idpaciente){
                var idarea = 1;
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultaPreguntasTotalIDEA", idpaciente:idpaciente, idarea:idarea},function(dataRes){
                   for(var i in dataRes){
                       datosRes = dataRes[i];
                        $("#dim1").val(datosRes.dim1);
                        $("#dim2").val(datosRes.dim2);
                        $("#dim3").val(datosRes.dim3);
                        $("#dim4").val(datosRes.dim4);
                        $("#dim5").val(datosRes.dim5);
                        $("#dim6").val(datosRes.dim6);
                        $("#dim7").val(datosRes.dim7);
                        $("#dim8").val(datosRes.dim8);
                        $("#dim9").val(datosRes.dim9);
                        $("#dim10").val(datosRes.dim10);
                        $("#dim11").val(datosRes.dim11);
                        $("#dim12").val(datosRes.dim12);
                        
                        var total1 = datosRes.dim1+datosRes.dim2+datosRes.dim3;
                        $("#total1").val(total1);
                        var total2 = datosRes.dim4+datosRes.dim5+datosRes.dim6;
                        $("#total2").val(total2);
                        var total3 = datosRes.dim7+datosRes.dim8+datosRes.dim9;
                        $("#total3").val(total3);
                        var total4 = datosRes.dim10+datosRes.dim11+datosRes.dim12;
                        $("#total4").val(total4);
                        $("#grantotal").val(total1+total2+total3+total4);
                   }
                },'json');
            }
            
            
            function actualizaValoracion(){
                alert("valoracion");
            }
            
        </script>
    </body>
</html>