<?php   
    include('../directiva.php');
    $idpaciente     = $_GET['var'];
    $idcita         = $_GET['cita'];
    $idhist         = $_GET['idhist'];
    $idinforme      = $_GET['idinforme'];
    $idarea         = $_GET['idarea'];
    $verBoton       = false;
?>

<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
        
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
        
    	 <script>
    			$(function() {
    			$('#fechaCitaIni').datepicker();
    			$('#pacienteFechaNacimiento').datepicker();
    			$('#timepicker').timepicker();
    			});
    			
    			$(document).ready(function(){
                    $("#cerrar").click(function(){
                        location.reload();
                    });
                });
    	</script>
        
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
                                    
                                    <!-- ********************** TAB PANEL IDENTIFICACION ********************** -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="identificacion">
                                            <form id="formInformeFinal" role="form" method='post'  action='' name='datos'>
                                            
                                            <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                            <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                            <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
                                            <input name="idarea" id="idarea" type="hidden" class="form-control" value="<?php echo"$idarea";?>">
                                            <input name="idinforme" id="idinforme" type="hidden" class="form-control" value="<?php echo"$idinforme";?>">
                                            
                                            <?php
                                                if($idarea != $areausr){
                                                    $verBoton = false;
                                                    echo'<input name="verBoton" id="verBoton" type="hidden" class="form-control" value="disabled">';
                                                }else{
                                                    $verBoton = true;
                                                    echo'<input name="verBoton" id="verBoton" type="hidden" class="form-control" value="">';
                                                }                           
                                            ?>
                                            <!-- *********************************************** PACIENTE ************************************************************************* -->
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingTwo">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsePaciente" aria-expanded="true" aria-controls="collapsePaciente">
                                                        <h5 class="mb-0">INFORME DE EVALUACI&Oacute;N POR PSICOLOG&Iacute;A</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapsePaciente" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                
                                                                <!-- ***********************************************Nombres y Apellidos Paciente************************************************************************* -->
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><b>Nombres y Apellidos: </b></label>
                                                                        <label id='lbpacienteNombres'></label>
                                                                        
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Lugar y Fecha de Nacimiento: </b></label>
                                                                        <label id='pacienteLugarNacimiento'></label>
                                                                        <label id='lbpacienteFechaNacimiento'></label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- ***********************************************Edad y Meses Paciente************************************************************************** -->
                                                                <br>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Edad: </b></label>
                                                                        <label id='lbpacienteEdad'></label>
                                                                        <label>A&ntilde;os </label>
                                                                        <label id="lbpacienteMeses"></label>
                                                                        <label>Meses</label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                
                                                                <!-- **************************************************Datos  Direccion Paciente**************************************************************** -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Direcci&oacute;n - Ciudad - Municipio</b></label>
                                                                        <label id='lbpacienteDireccion'>Direcci&oacute;n</label>
                                                                        
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Ciudad</b></label>
                                                                        <label id='lbpacienteCiudad'>Ciudad</label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <div class="col-md-12">
                                                                    <hr>
                                                                </div>
                                                                <!-- ***********************************************Nombres y Apellidos Padre************************************************************************* -->
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Nombre del Padre</b></label>
                                                                        <label id='lbpadreNombres'></label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 --
                                                                <!-- ***********************************************Edad Padre************************************************************************** -->
                                                                <br>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Edad</b></label>
                                                                        <label id='lbpadreEdad'></label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- **************************************************Datos  Escolaridad Padre**************************************************************** -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Escolaridad</b></label>
                                                                        <label id='lbpadreIdEscolaridad'></label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- **************************************************Datos Ocupacion Padre**************************************************************** -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Ocupaci&oacute;n</b></label>
                                                                        <label id='lbpadreOcupacion'></label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Celular</b></label>
                                                                        <label id='lbpadreTelefonoCelular'></label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Tel&eacute;fono Fijo</b></label>
                                                                        <label id='lbpadreTelefonoFijo'></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <hr>
                                                                </div>
                                                                
                                                                <!-- ***********************************************Nombres y Apellidos Madre************************************************************************* -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Nombre de la Madre</b></label>
                                                                        <label id='lbmadreNombres'></label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- ***********************************************Edad Madre************************************************************************** -->
                                                                <br>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Edad</b></label>
                                                                        <label id='lbmadreEdad'></label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- **************************************************Datos  Escolaridad Madre**************************************************************** -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Escolaridad</b></label>
                                                                        <label id='lbmadreIdEscolaridad'></label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- **************************************************Datos Ocupacion Madre**************************************************************** -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Ocupaci&oacute;n</b></label>
                                                                        <label id='lbmadreOcupacion'></label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Celular</b></label>
                                                                        <label id='lbmadreTelefonoCelular'></label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Tel&eacute;fono Fijo</b></label>
                                                                        <label id='lbmadreTelefonoFijo'></label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <!-- **************************************************Datos  Eps Paciente**************************************************************** -->
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><b>EPS</b></label>
                                                                        <label id='lbpacienteIdEps'></label>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><b>Informante</b></label>
                                                                        <label name="pacienteInformante" id="pacienteInformante" ></label>
                                                                        <br>
                                                                        <hr>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <div class="col-md-12 ">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-12 text-center">
                                                                                <div class="form-group">
                                                                                    <div id="sesionEvaluacion" class="row" style="text-align:center"></div>
                                                                                </div><!-- .form-group -->
                                                                            </div><!-- .col-md-4 -->
                                                                        </div>
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                            </div><!-- .row -->
                                                        </div><!-- .card-body -->
                                                    </div><!-- ."card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card Motivo Consulta************************************************************************* -->
                                            
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingMotivoConsulta">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseMotivoConsulta" aria-expanded="true" aria-controls="collapseMotivoConsulta">
                                                        <h5 class="mb-0">Motivo de Consulta</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseMotivoConsulta" class="collapse show" role="tabpanel" aria-labelledby="headingMotivoConsulta">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" rows="8" name="motivoConsultaObservacion" id="motivoConsultaObservacion"></textarea>
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
                                                        <h5 class="mb-0">Diagn&oacute;sticos Previos</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseDiagnosticoPrevio" class="collapse show" role="tabpanel" aria-labelledby="headingDiagnosticoPrevio">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Diagn&oacute;sticos Asociados a la valoraci&oacute;n en APA</label>
                                                                        <textarea name="diagnosticos"  id="diagnosticos" class="form-control" rows="8" placeholder="Digite Diagn&oacute;sticos" required="required"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card Constitucion familiar************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingConsFamiliar">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseConsFamiliar" aria-controls="collapseConsFamiliar">
                                                        <h5 class="mb-0">Constituci&oacute;n Familiar</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseConsFamiliar" class="collapse" role="tabpanel" aria-labelledby="headingConsFamiliar">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row" id="constitucion">
                                                            
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card historia************************************************************************* -->
                                            
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingHistoria">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseHistoria" aria-expanded="true" aria-controls="collapseHistoria">
                                                        <h5 class="mb-0">Historia</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseHistoria" class="collapse" role="tabpanel" aria-labelledby="headingHistoria">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><b>Instituciones Educativas - Intervenciones Terap&eacute;uticas - Evaluaciones</b></label>
                                                                        <!--<textarea class="form-control" rows="8" name="HistoriaObservacion" id="HistoriaObservacion"></textarea>-->
                                                                    </div>
                                                                    <div class="row" id="tratamientosProblema">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card Objetivo Evaluacion************************************************************************* -->
                                            
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingObjEvaluacion">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseObjEvaluacion" aria-expanded="true" aria-controls="collapseObjEvaluacion">
                                                        <h5 class="mb-0">Objetivo de la Evaluaci&oacute;n</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseObjEvaluacion" class="collapse" role="tabpanel" aria-labelledby="headingObjEvaluacion">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" rows="8" name="ObjEvaluacionObservacion" id="ObjEvaluacionObservacion"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card Metodo Evaluacion************************************************************************* -->
                                            
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingMetEvaluacion">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseMetEvaluacion" aria-expanded="true" aria-controls="collapseMetEvaluacion">
                                                        <h5 class="mb-0">M&eacute;todo de Evaluaci&oacute;n</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseMetEvaluacion" class="collapse" role="tabpanel" aria-labelledby="headingMetEvaluacion">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" rows="8" name="MetEvaluacionObservacion" id="MetEvaluacionObservacion"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card Resultados************************************************************************* -->
                                            
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingMetEvaluacion">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseResultados" aria-expanded="true" aria-controls="collapseResultados">
                                                        <h5 class="mb-0">Resultados</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseResultados" class="collapse" role="tabpanel" aria-labelledby="headingResultados">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" rows="8" name="ResultadosObservacion" id="ResultadosObservacion"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card Conclusiones************************************************************************* -->
                                            
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingConclusiones">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseConclusiones" aria-expanded="true" aria-controls="collapseConclusiones">
                                                        <h5 class="mb-0">Conclusiones</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseConclusiones" class="collapse" role="tabpanel" aria-labelledby="headingConclusiones">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" rows="8" name="ConclusionesObservacion" id="ConclusionesObservacion"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card Recomendaciones************************************************************************* -->
                                            
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingRecomendaciones">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseRecomendaciones" aria-expanded="true" aria-controls="collapseRecomendaciones">
                                                        <h5 class="mb-0">Recomendaciones</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseRecomendaciones" class="collapse" role="tabpanel" aria-labelledby="headingRecomendaciones">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" rows="8" name="RecomendacionesObservacion" id="RecomendacionesObservacion"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            <div class="modal-footer">
                                                      <button type="button"  class="btn btn-primary" onclick="generarInformeWord(<?php echo "$idpaciente";?>);"> <i class="fa fa-file"> </i>&nbsp; Imprimir Informe Word</button>
                                                      <button type="button"  class="btn btn-primary" onclick="generarInformePdf(<?php echo "$idpaciente";?>);"> <i class="fa fa-file"> </i>&nbsp; Imprimir Informe PDF</button>
                                                      <button type="submit" class="btn btn-primary" data-toggle="modal" style="float:right;">Guardar</button>
                                             </div>
                                            </form>    
                                        </div> <!-- FIN TAB-->
                                    </div>
                                </div><!-- col-md-12-->
                            </div><!-- row -->
                        </div><!-- /.container-fluid --> 
                    </div><!-- .stat-boxes -->
                </div> <!-- .container-inner -->                                                         
            </div><!-- .content-container -->                                                            
        </div><!-- .page-container -->
      
       <!-- Validacion boton -->
         <?php
             /*
            if($verBoton)
             {
                echo'
                    <!--
                     <div class="col-md-12">
                         <div class="button-form">
                           <button type="submit" class="btn btn-primary" data-toggle="modal" style="float:right;">Guardar</button>
                         </div>
                     </div> --> ';
            }*/
         ?>
        
        <?php
            include("../modal/modal_AddConstitucion.php");
            include("../modal/modal_AddTratamientos.php");
            include("../modal/modal_exito.php");
            include("../modal/modal_error.php");
        ?>
        
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../vendor/datatables/jquery.dataTables.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
        
        <script src="../js/sb-admin.min.js"></script>
        <script src="../js/sb-admin-datatables.min.js"></script>
        <script src="../js/funciones_historia_psico.js"></script>
        <script src="../js/calculaEdad.js"></script>
        <script type"javascript">
        
            $(document).ready(function(){
                var verBoton = $("#verBoton").val();
                //alert("verBoton "+verBoton);
                if(verBoton == 'disabled'){
                    $('input[type="checkbox"]').attr("disabled",true);
                    $('input[type="text"], textarea').attr("readonly","readonly");
                    $('input[type="text"]').attr("readonly",true);
                }else{
                    $('input[type="checkbox"]').removeAttr("disabled");
                }
            }); 
            
            var idpaciente  = document.getElementById("idpaciente").value;
            var idcita      = document.getElementById("idcita").value;
            var idhist      = document.getElementById("idhist").value;
            var idinforme   = document.getElementById("idinforme").value;
            var idarea      = document.getElementById("idarea").value;
            var idtipocita  = 1;
            if(idcita != "" && idtipocita == 1){
                editarCitaInformacion(idpaciente,idcita, idtipocita);
            }
            cargarDatos();
            //tab datos generales
            cargaDatosInforme(idpaciente);
            cargarConstitucion(idpaciente, "informe");
            
            //tab consulta
            cargaMotivoInforme(idpaciente);
            cargaDiagnosticoPrevio(idpaciente,idinforme);
            cargaInformeFinal(idpaciente,idarea);
            cargaSesionEvaluacion(idpaciente);
            
            ////////SESIONES EVALUACION
            function cargaSesionEvaluacion(idpaciente){
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarSesionEvaluacion", idpaciente:idpaciente},function(data){
                    $("#sesionEvaluacion").html(data);
                });
            }
            cargarTratamientosUsuario(idpaciente);
        </script>
        
    </body>
</html>