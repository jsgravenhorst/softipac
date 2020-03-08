<?php   
    include('../directiva.php');
    $idpaciente     = $_GET['var'];
    $idcita         = $_GET['cita'];
    $idarea         = $_GET['idarea'];
    $idhist         = $_GET['idhist'];
    $idinforme      = $_GET['idinforme'];
    $idTerapeuta    = $_GET['idTerapeuta'];
?>

<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        
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
                                    <form id="form_Historia" role="form" method='post'  action='' name='datos'>
                                        <input type="hidden" id="idpaciente" value="<?php echo"$idpaciente";?>">
                                        <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                        <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
                                        <input name="idinforme" id="idinforme" type="hidden" class="form-control" value="<?php echo"$idinforme";?>">
                                        <input name="idTerapeuta" id="idTerapeuta" type="hidden" class="form-control" value="<?php echo"$idTerapeuta";?>">
                                        
                                        <!--<ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item active">
                                                <a class="nav-link active" href="#ficha" role="tab" data-toggle="tab">Evaluación Fonoaudiológica</a>
                                            </li>
                                            
                                        </ul>-->
                                        
                                        <!-- ********************** TAB EVALUACION FONOAUDIOLOGICA ********************** -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="ficha">
                                                
                                                
                                                <div class="card">
                                                <div class="card-header" role="tab" id="headingTwo">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsePaciente" aria-expanded="true" aria-controls="collapsePaciente">
                                                        <h5 class="mb-0">EVALUACI&Oacute;N DE FONOAUDIOLOG&Iacute;A</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapsePaciente" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                
                                                                <!-- ***********************************************Nombres y Apellidos Paciente************************************************************************* -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Nombres y Apellidos: </b></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label id='lbpacienteNombres'></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Fecha de Nacimiento: </b></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label id='pacienteLugarNacimiento'></label>
                                                                        <label id='lbpacienteFechaNacimiento'></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Edad: </b></label>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label id='lbpacienteEdad'></label>
                                                                        <label>A&ntilde;os </label>
                                                                        <label id="lbpacienteMeses"></label>
                                                                        <label>Meses</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>N&uacute;mero de identificaci&oacute;n: </b></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label id="pacienteDocumento"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Madre:</b></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label id='lbmadreNombres'></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Informante:</b></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label id='InformantePac'></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Direcci&oacute;n:</b></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label id='lbpacienteDireccion'></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>EPS:</b></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label id='lbpacienteIdEps'></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Fecha de valoraci&oacute;n:</b></label><br>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label name='fonoFechaValoracion' id='fonoFechaValoracion'></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Fecha de entrega de informe:</b></label><br>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label name='fonoFechaEntregaInforme' id='fonoFechaEntregaInforme'></label>
                                                                    </div>
                                                                </div>
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
                                                <div id="collapseMotivoConsulta" class="collapse" role="tabpanel" aria-labelledby="headingMotivoConsulta">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <textarea readonly class="form-control" rows="8" name="motivoConsultaObservacion" id="motivoConsultaObservacion"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingRemitido">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseRemitido" aria-controls="collapseRemitido">
                                                        <h5 class="mb-0">Remisi&oacute;n</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseRemitido" class="collapse" role="tabpanel" aria-labelledby="headingRemitido">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Remitido por:</label>
                                                                        <input readonly name='remitidoRemision' id='remitidoRemision' type="text" class="form-control" placeholder="Remitido por">
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Motivo</label>
                                                                        <input readonly name='motivoRemision' id='motivoRemision' type="text" class="form-control" placeholder="Motivo">
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
                                                <div id="collapseDiagnosticoPrevio" class="collapse" role="tabpanel" aria-labelledby="headingDiagnosticoPrevio">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Diagn&oacute;sticos Asociados a la valoraci&oacute;n en APA</label>
                                                                        <textarea readonly name="diagnosticos"  id="diagnosticos" class="form-control" rows="8" placeholder="Digite Diagn&oacute;sticos" required="required"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                                <!-- *********************************************** Estomatognatico ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingEstomatognatico">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEstomatognatico" aria-expanded="true" aria-controls="collapseEstomatognatico">
                                                            <h5 class="mb-12">Evaluaci&oacute;n del sistema Estomatogn&aacute;tico</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseEstomatognatico" class="collapse" role="tabpanel" aria-labelledby="headingEstomatognatico">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div id="preguntasEstomatognatico1" class="row"></div>
                                                                <div id="preguntasEstomatognatico2" class="row"></div>
                                                                <div id="preguntasEstomatognatico3" class="row"></div>
                                                                <div id="preguntasEstomatognatico4" class="row"></div>
                                                                <div id="preguntasEstomatognatico5" class="row"></div>
                                                                <div id="preguntasEstomatognatico6" class="row"></div>
                                                                <div id="preguntasEstomatognatico7" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                
                                                <!-- *********************************************** Soporte fisico ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingFisico">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFisico" aria-expanded="true" aria-controls="collapseFisico">
                                                            <h5 class="mb-12">Configuraci&oacute;n &oacute;sea</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseFisico" class="collapse" role="tabpanel" aria-labelledby="headingFisico">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                
                                                                <div id="cargaSoporteFisico" class="row"></div>
                                                                
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Alimentacion ************************************************************************* -->
                                                <div class="card ">
                                                <div class="card-header" role="tab" id="headingAlimentacion">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseAlimentacion" aria-expanded="true" aria-controls="collapseAlimentacion">
                                                        <h5 class="mb-0">Alimentaci&oacute;n</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseAlimentacion" class="collapse" role="tabpanel" aria-labelledby="headingAlimentacion">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Tipos de alimentos observados por la evaluaci&oacute;n</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div id="alimentacion1" class="row"></div>
                                                            <div id="alimentacion2" class="row"></div>
                                                            <div id="alimentacion3" class="row"></div>
                                                            <div id="alimentacion4" class="row"></div>
                                                            
                                                            
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                                <!-- *********************************************** Prelinguistico ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingPrelinguistico">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePrelinguistico" aria-expanded="true" aria-controls="collapsePrelinguistico">
                                                            <h5 class="mb-12">Conductas preling&uuml;isticas</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsePrelinguistico" class="collapse" role="tabpanel" aria-labelledby="headingPrelinguistico">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                
                                                                <div id="prelinguistico15" class="row"></div>
                                                                <div id="prelinguistico16" class="row"></div>
                                                                <div id="prelinguistico17" class="row"></div>
                                                                <div id="prelinguistico18" class="row"></div>
                                                                <div id="prelinguistico19" class="row"></div>
                                                                <div id="prelinguistico20" class="row"></div>
                                                                <div id="prelinguistico21" class="row"></div>
                                                                <div id="prelinguistico22" class="row"></div>
                                                                
                                                                
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** lenguaje expresivo ************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingExpresivo">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseExpresivo" aria-expanded="true" aria-controls="collapseExpresivo">
                                                            <h5 class="mb-0">Lenguaje Expresivo</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseExpresivo" class="collapse" role="tabpanel" aria-labelledby="headingExpresivo">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div id="lenguajeexpresivo" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** lenguaje comprensivo ************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingComprensivo">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseComprensivo" aria-expanded="true" aria-controls="collapseComprensivo">
                                                            <h5 class="mb-0">Lenguaje Comprensivo</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseComprensivo" class="collapse" role="tabpanel" aria-labelledby="headingComprensivo">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div id="lenguajecomprensivo" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Conductas y habitos ************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingConductas">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseConductas" aria-expanded="true" aria-controls="collapseConductas">
                                                            <h5 class="mb-0">Conductas y H&aacute;bitos</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseConductas" class="collapse" role="tabpanel" aria-labelledby="headingConductas">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div id="conductas" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Cognitivo ************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingCognitivo">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseCognitivo" aria-expanded="true" aria-controls="collapseCognitivo">
                                                            <h5 class="mb-0">Cognitivo</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseCognitivo" class="collapse" role="tabpanel" aria-labelledby="headingCognitivo">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div id="cognitivo" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Juego ************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingJuego">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseJuego" aria-expanded="true" aria-controls="collapseJuego">
                                                            <h5 class="mb-0">Juego</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseJuego" class="collapse" role="tabpanel" aria-labelledby="headingJuego">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div id="juego" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Area social ************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingAreasocial">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAreasocial" aria-expanded="true" aria-controls="collapseAreasocial">
                                                            <h5 class="mb-0">&Aacute;rea social</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseAreasocial" class="collapse" role="tabpanel" aria-labelledby="headingAreasocial">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div id="areasocial" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->

                                                <!-- *********************************************** Diagnostico ************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingDiagnostico">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDiagnostico" aria-expanded="true" aria-controls="collapseDiagnostico">
                                                            <h5 class="mb-0">Diagn&oacute;stico</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseDiagnostico" class="collapse" role="tabpanel" aria-labelledby="headingDiagnostico">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">

                                                                </div>
                                                                <div id="diagnostico" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->

                                                <!-- *********************************************** Recomendaciones ************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingRecomendaciones">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseRecomendaciones" aria-expanded="true" aria-controls="collapseRecomendaciones">
                                                            <h5 class="mb-0">Recomendaciones</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseRecomendaciones" class="collapse" role="tabpanel" aria-labelledby="headingRecomendaciones">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">

                                                                </div>
                                                                <div id="recomendaciones" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                            </div> <!-- FIN TAB-->
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button"  class="btn btn-primary" onclick="generarInformePdf(<?php echo "$idpaciente,$idinforme";?>);"> <i class="fa fa-file"> </i>&nbsp; Imprimir Informe PDF</button>
                                        </div>

                                    </form>
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
        ?>
        
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../vendor/datatables/jquery.dataTables.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
        
        <script src="../js/sb-admin.min.js"></script>
        <script src="../js/sb-admin-datatables.min.js"></script>
        <script src="../js/funciones_historia_fono.js"></script>
        <script src="../js/calculaEdad.js"></script>
        <script type"javascript">
            
            var idpaciente      = document.getElementById("idpaciente").value;
            var idcita          = document.getElementById("idcita").value;
            var idhist          = document.getElementById("idhist").value;
            var idtipocita      = 2;
            
            if(idcita != "" && idtipocita == 2){
                editarCitaInformacion(idpaciente,idcita, idtipocita);
            }
            
            cargarDatos();
            cargaFechaValoracion(idpaciente);
            cargaFechaEntregaInforme(idpaciente);
            cargaMotivoInforme(idpaciente);
            cargaDatosPsicologia(idpaciente);
            cargaEstomatognatico1();
            cargaEstomatognatico2();
            cargaEstomatognatico3();
            cargaEstomatognatico4();
            cargaEstomatognatico5();
            cargaEstomatognatico6();
            cargaEstomatognatico7();
            cargaSoporteFisico();
            cargaAlimentacion1();
            cargaAlimentacion2();
            cargaAlimentacion3();
            cargaAlimentacion4();
            
            cargaAlimentacion23();
            cargaAlimentacion24();
            cargaAlimentacion25();
            cargaAlimentacion26();
            cargaAlimentacion27();
            cargaAlimentacion28();
            
            cargaPrelinguistico15();
            cargaPrelinguistico16();
            cargaPrelinguistico17();
            cargaPrelinguistico18();
            cargaPrelinguistico19();
            cargaPrelinguistico20();
            cargaPrelinguistico21();
            cargaPrelinguistico22();

            cargaDiagnostico()
            cargaRecomendaciones();
            
            //Consulta FechaValoracion
            function cargaFechaValoracion(idpaciente){
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaFechaValoracion", idpaciente:idpaciente, idarea:idarea}, function(data){
                    $("#fonoFechaValoracion").text(data);
                });
            }
            
            //Consulta FechaEntregaInforme
            function cargaFechaEntregaInforme(idpaciente){
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaFechaEntregaInforme", idpaciente:idpaciente, idarea:idarea}, function(data){
                    $("#fonoFechaEntregaInforme").text(data);
                });
            }
            
            //Sistema Estomatognatico
            function cargaEstomatognatico1(){
                var idinforme = $("#idinforme").val();
                var idexamen = 1;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaEstomatognatico1", idinforme:idinforme, idexamen:idexamen}, function(data){
                    $("#preguntasEstomatognatico1").html(data); 
                });
            }
            
            //Sistema Estomatognatico labio superior
            function cargaEstomatognatico2(){
                var idinforme = $("#idinforme").val();
                var idexamen = 2;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaEstomatognatico2", idinforme:idinforme, idexamen:idexamen},function(data){
                    $("#preguntasEstomatognatico2").html(data); 
                });
            }
            
            //Sistema Estomatognatico labio inferior
            function cargaEstomatognatico3(){
                var idinforme = $("#idinforme").val();
                var idexamen = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaEstomatognatico3", idinforme:idinforme, idexamen:idexamen},function(data){
                    $("#preguntasEstomatognatico3").html(data); 
                });
            }
            
            //Sistema Estomatognatico Encia
            function cargaEstomatognatico4(){
                var idinforme = $("#idinforme").val();
                var idexamen = 4;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaEstomatognatico4", idinforme:idinforme, idexamen:idexamen},function(data){
                    $("#preguntasEstomatognatico4").html(data); 
                });
            }
            
            //Sistema Estomatognatico Color
            function cargaEstomatognatico5(){
                var idinforme = $("#idinforme").val();
                var idexamen = 5;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaEstomatognatico5", idinforme:idinforme, idexamen:idexamen},function(data){
                    $("#preguntasEstomatognatico5").html(data); 
                });
            }
            
            //Sistema Estomatognatico Sensibilidad
            function cargaEstomatognatico6(){
                var idinforme = $("#idinforme").val();
                var idexamen = 6;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaEstomatognatico6", idinforme:idinforme, idexamen:idexamen},function(data){
                    $("#preguntasEstomatognatico6").html(data); 
                });
            }
            
            //Sistema Estomatognatico Boca seca
            function cargaEstomatognatico7(){
                var idinforme = $("#idinforme").val();
                var idexamen = 7;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaEstomatognatico7", idinforme:idinforme, idexamen:idexamen},function(data){
                    $("#preguntasEstomatognatico7").html(data); 
                });
            }
            
            function respuestaEstomatognatico(idinforme, idopciones, idexamen, campo, idcheck){
                if($("#"+idcheck+":checked").val() != null ){
                    var idoption = 1;
                }else{
                    var idoption = 0;
                }
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"respuestaEstomatognatico", idinforme:idinforme, idopciones:idopciones, idexamen:idexamen, campo:campo, idoption:idoption},function(data){
                   cargaEstomatognatico();
                });
            }
            
            ///Alimentacion fase anticipatoria
            function cargaAlimentacion1(){
                var idinforme = $("#idinforme").val();
                var idexamen = 11;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaAlimentacion1", idinforme:idinforme, idexamen:idexamen},function(dataAlim){
                    $("#alimentacion1").html(dataAlim); 
                });
            }
            
            ///Alimentacion fase preparatoria
            function cargaAlimentacion2(){
                var idinforme = $("#idinforme").val();
                var idexamen = 12;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaAlimentacion2", idinforme:idinforme, idexamen:idexamen},function(dataAlim){
                    $("#alimentacion2").html(dataAlim); 
                });
            }
            
            ///Alimentacion fase oral
            function cargaAlimentacion3(){
                var idinforme = $("#idinforme").val();
                var idexamen = 13;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaAlimentacion3", idinforme:idinforme, idexamen:idexamen},function(dataAlim){
                    $("#alimentacion3").html(dataAlim); 
                });
            }
            
            ///Alimentacion conclusiones
            function cargaAlimentacion4(){
                var idinforme = $("#idinforme").val();
                var idexamen = 14;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaAlimentacion4", idinforme:idinforme, idexamen:idexamen},function(dataAlim){
                    $("#alimentacion4").html(dataAlim); 
                });
            }
            
            ///lenguaje expresivo
            function cargaAlimentacion23(){
                var idinforme = $("#idinforme").val();
                var idexamen = 23;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaAlimentacion23", idinforme:idinforme, idexamen:idexamen},function(dataAlim){
                    $("#lenguajeexpresivo").html(dataAlim); 
                });
            }
            
            ///lenguaje comprensivo
            function cargaAlimentacion24(){
                var idinforme = $("#idinforme").val();
                var idexamen = 24;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaAlimentacion24", idinforme:idinforme, idexamen:idexamen},function(dataAlim){
                    $("#lenguajecomprensivo").html(dataAlim); 
                });
            }
            
            ///Conductas y habitos
            function cargaAlimentacion25(){
                var idinforme = $("#idinforme").val();
                var idexamen = 25;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaAlimentacion25", idinforme:idinforme, idexamen:idexamen},function(dataAlim){
                    $("#conductas").html(dataAlim); 
                });
            }
            
            ///Cognitivo
            function cargaAlimentacion26(){
                var idinforme = $("#idinforme").val();
                var idexamen = 26;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaAlimentacion26", idinforme:idinforme, idexamen:idexamen},function(dataAlim){
                    $("#cognitivo").html(dataAlim); 
                });
            }
            
            ///Juego
            function cargaAlimentacion27(){
                var idinforme = $("#idinforme").val();
                var idexamen = 27;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaAlimentacion27", idinforme:idinforme, idexamen:idexamen},function(dataAlim){
                    $("#juego").html(dataAlim); 
                });
            }
            
            ///Area social
            function cargaAlimentacion28(){
                var idinforme = $("#idinforme").val();
                var idexamen = 28;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaAlimentacion28", idinforme:idinforme, idexamen:idexamen},function(dataAlim){
                    $("#areasocial").html(dataAlim); 
                });
            }
            
            
            function respuestaAlimentacion(idinforme, idopciones, idexamen){
                var texto = $("#textoAlimen"+idexamen).val();
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"respuestaAlimentacion", idinforme:idinforme, idopciones:idopciones, idexamen:idexamen, texto:texto},function(data){
                   cargaAlimentacion1();
                });
            }
            
            ///Prelinguistico movimiento
            function cargaPrelinguistico15(){
                var idinforme = $("#idinforme").val();
                var idexamen = 15;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaPrelinguistico15", idinforme:idinforme, idexamen:idexamen},function(dataPre){
                    $("#prelinguistico15").html(dataPre); 
                });
            }
            
            ///Prelinguistico ojos
            function cargaPrelinguistico16(){
                var idinforme = $("#idinforme").val();
                var idexamen = 16;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaPrelinguistico16", idinforme:idinforme, idexamen:idexamen},function(dataPre){
                    $("#prelinguistico16").html(dataPre); 
                });
            }
            
            ///Prelinguistico sonrisa
            function cargaPrelinguistico17(){
                var idinforme = $("#idinforme").val();
                var idexamen = 17;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaPrelinguistico17", idinforme:idinforme, idexamen:idexamen},function(dataPre){
                    $("#prelinguistico17").html(dataPre); 
                });
            }
            
            ///Prelinguistico nombre
            function cargaPrelinguistico18(){
                var idinforme = $("#idinforme").val();
                var idexamen = 18;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaPrelinguistico18", idinforme:idinforme, idexamen:idexamen},function(dataPre){
                    $("#prelinguistico18").html(dataPre); 
                });
            }
            
            ///Prelinguistico palabras
            function cargaPrelinguistico19(){
                var idinforme = $("#idinforme").val();
                var idexamen = 19;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaPrelinguistico19", idinforme:idinforme, idexamen:idexamen},function(dataPre){
                    $("#prelinguistico19").html(dataPre); 
                });
            }
            
            ///Prelinguistico juegos
            function cargaPrelinguistico20(){
                var idinforme = $("#idinforme").val();
                var idexamen = 20;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaPrelinguistico20", idinforme:idinforme, idexamen:idexamen},function(dataPre){
                    $("#prelinguistico20").html(dataPre); 
                });
            }
            
            ///Prelinguistico silabas
            function cargaPrelinguistico21(){
                var idinforme = $("#idinforme").val();
                var idexamen = 21;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaPrelinguistico21", idinforme:idinforme, idexamen:idexamen},function(dataPre){
                    $("#prelinguistico21").html(dataPre); 
                });
            }
            
            ///Prelinguistico partes
            function cargaPrelinguistico22(){
                var idinforme = $("#idinforme").val();
                var idexamen = 22;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaPrelinguistico22", idinforme:idinforme, idexamen:idexamen},function(dataPre){
                    $("#prelinguistico22").html(dataPre); 
                });
            }
            
            function respuestaPrelinguistico(idinforme, idopciones, idexamen, campo, idcheck){
                if(campo == "texto"){
                    var idoption = $("#"+idcheck).val();
                }else{
                    if($("#"+idcheck+":checked").val() != null ){
                        var idoption = 1;
                    }else{
                        var idoption = 0;
                    }
                }
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"respuestaPrelinguistico", idinforme:idinforme, idopciones:idopciones, idexamen:idexamen, campo:campo, idoption:idoption},function(data){
                   cargaPrelinguistico15();
                });
            }

            ///diagnostico
            function cargaDiagnostico(){
                var idinforme = $("#idinforme").val();
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaDiagnostico", idinforme:idinforme},function(dataDiagnostico){
                $("#diagnostico").html(dataDiagnostico);
                });
            }

            function respuestaDiagnostico(idinforme){
                var texto = $("#diagnostico"+idinforme).val();
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"respuestaDiagnostico", idinforme:idinforme, texto:texto},function(data){
                cargaDiagnostico();
                });
            }

            
            ///recomendaciones
            function cargaRecomendaciones(){
                var idinforme = $("#idinforme").val();
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaRecomendaciones", idinforme:idinforme},function(dataRecomendacion){
                    $("#recomendaciones").html(dataRecomendacion);
                });
            }
            
            function respuestaRecomendaciones(idinforme){
                var texto = $("#recomendaciones"+idinforme).val();
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"respuestaRecomendaciones", idinforme:idinforme, texto:texto},function(data){
                   cargaRecomendaciones();
                });
            }
            
            //Soporte Fisico
            function cargaSoporteFisico(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_informe_fono.php",{opcion:"cargaSoporteFisico", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#cargaSoporteFisico").html(data); 
                });
            }
            
            /*function respuestaSoporteFisico(idpaciente, idrespuesta, campo, idcheck){
                var idarea = 3;
                //var campo = $("#"+campo).val();
                if(campo == "otros"){
                    var idoption = $("#otros").val();
                }else{
                    if($("#"+idcheck+":checked").val() != null ){
                        var idoption = 1;
                    }else{
                        var idoption = 0;
                    }
                }
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaSoporteFisico", idpaciente:idpaciente, idrespuesta:idrespuesta, campo:campo, idoption:idoption, idarea:idarea},function(data){
                   cargaEvaluacionHabla();
                });
            }*/
            
        </script>
        
    </body>
    

</html>