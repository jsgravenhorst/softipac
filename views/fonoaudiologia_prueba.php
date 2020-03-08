<?php   
    include('../directiva.php');
    $idpaciente     = $_GET['var'];
    $idcita         = $_GET['cita'];
    $idarea         = $_GET['idarea'];
?>

<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
        
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
                                        
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item active">
                                                <a class="nav-link active" href="#ficha" role="tab" data-toggle="tab">Evaluación Fonoaudiológica</a>
                                            </li>
                                            
                                        </ul>
                                        
                                        <!-- ********************** TAB EVALUACION FONOAUDIOLOGICA ********************** -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="ficha">
                                                <!-- *********************************************** Ficha de identificacion ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingFicha">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFicha" aria-expanded="true" aria-controls="collapseFicha">
                                                            <h5 class="mb-12">Ficha de identificación</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseFicha" class="collapse show" role="tabpanel" aria-labelledby="headingFicha">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    
                                                                    <!-- ***********************************************Ficha************************************************************************* -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Fecha de Evaluación* (2017-01-01)</label><br>
                                                                            <input type="hidden" id="idpaciente" value="<?php echo"$idpaciente";?>">
                                                                            <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                                                            <input type='text' name='fonoFechaEvaluacion' id='fonoFechaEvaluacion' class="date-picker form-control" placeholder="yyyy-dd-mm" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Nombres Paciente</label>
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Apellidos paciente* (NA sino se suministra)</label>
                                                                            <input name='pacientePrimerApellido' id='pacientePrimerApellido' type="text" class="form-control" placeholder="Digite el Primer Apellido" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <!-- ***********************************************Fecha Nacimiento Paciente************************************************************************* -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Fecha de Nacimiento* (2017-01-01)</label><br>
                                                                            <input type='text' name='pacienteFechaNacimiento' id='pacienteFechaNacimiento' class="date-picker form-control" placeholder="yyyy-dd-mm" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <!-- ***********************************************Edad y Meses Paciente************************************************************************** -->
                                                                    <br>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Edad* (0 sino se suministra)</label>
                                                                            <input name='pacienteEdad' id='pacienteEdad' type="number" class="form-control" placeholder="Digite la Edad" readonly>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Años* (0 sino se suministra)</label>
                                                                            <div class="input-group">
                                                                                <input type="number"  class="form-control" id="pacienteMeses" name="pacienteMeses" placeholder="Digite los Meses" readonly>
                                                                            </div><!-- .input-group -->
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Sexo*</label>
                                                                            <select name='pacienteIdGenero' id='pacienteIdGenero' class="form-control">
                                                                                <option>Seleccione</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Lugar de Residencia</label>
                                                                            <input name='pacienteLugarResidencia' id='pacienteLugarResidencia' type="text" class="form-control" placeholder="Digite el Lugar de Residencia">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Tel&eacute;fono</label>
                                                                            <input name='fonoTelefono' id='fonoTelefono' type="text" class="form-control" placeholder="Digite el Tel&eacute;fono">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Nombre de la mamá* (NA sino se suministra)</label>
                                                                            <input name='madreNombres' id='madreNombres' type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Ocupaci&oacute;n</label>
                                                                            <input name='madreOcupacion' id='madreOcupacion' type="text" class="form-control" placeholder="Digite la Ocupaci&oacute;n">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Nombre del papá* (NA sino se suministra)</label>
                                                                            <input name='padreNombres' id='padreNombres' type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Ocupaci&oacute;n</label>
                                                                            <input name='padreOcupacion' id='padreOcupacion' type="text" class="form-control" placeholder="Digite la Ocupaci&oacute;n" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Antecedentes ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingAntecedentes">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAntecedentes" aria-expanded="true" aria-controls="collapseAntecedentes">
                                                            <h5 class="mb-12">Ubicaci&oacute;n Temporo - Espacial</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseAntecedentes" class="collapse show" role="tabpanel" aria-labelledby="headingAntecedentes">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div id="preguntasTemporo" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** evaluacion de habla ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingHabla">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseHabla" aria-expanded="true" aria-controls="collapseHabla">
                                                            <h5 class="mb-12">Evaluación de habla</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseHabla" class="collapse show" role="tabpanel" aria-labelledby="headingHabla">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                
                                                                <div id="evaluacionHabla" class="row"></div>
                                                                
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Soporte fisico ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingFisico">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFisico" aria-expanded="true" aria-controls="collapseFisico">
                                                            <h5 class="mb-12">Soporte f&iacute;sico</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseFisico" class="collapse show" role="tabpanel" aria-labelledby="headingFisico">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                
                                                                <div id="cargaSoporteFisico" class="row"></div>
                                                                
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Aspectos comunicativos ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingComunicativos">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseComunicativos" aria-expanded="true" aria-controls="collapseComunicativos">
                                                            <h5 class="mb-12">Aspectos comunicativos</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseComunicativos" class="collapse show" role="tabpanel" aria-labelledby="headingComunicativos">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                
                                                                <div class="row">
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input type="hidden" id="idrespuestaAC">
                                                                            <input name='atenvisual' id='atenvisual' type="checkbox" value="" onclick="respuestaAspectosComunicativos('atenvisual');">
                                                                            <label>Atenci&oacute;n visual</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='compmirobj' id='compmirobj' type="checkbox" value="" onclick="respuestaAspectosComunicativos('compmirobj');">
                                                                            <label>Comparte mirada con objetos</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='atenauditiva' id='atenauditiva' type="checkbox" value="" onclick="respuestaAspectosComunicativos('atenauditiva');">
                                                                            <label>Atenci&oacute;n auditiva</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='mireschabla' id='mireschabla' type="checkbox" value="" onclick="respuestaAspectosComunicativos('mireschabla');">
                                                                            <label>Mira o escucha cuando se le habla</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='interinteracc' id='interinteracc' type="checkbox" value="" onclick="respuestaAspectosComunicativos('interinteracc');">
                                                                            <label>Inter&eacute;s por la interacci&oacute;n</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='resordsenc' id='resordsenc' type="checkbox" value="" onclick="respuestaAspectosComunicativos('resordsenc');">
                                                                            <label>Responde ordenes sencillas</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='comcor' id='comcor' type="checkbox" value="" onclick="respuestaAspectosComunicativos('comcor');">
                                                                            <label>Comunicaci&oacute;n corporal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='vocalintencom' id='vocalintencom' type="checkbox" value="" onclick="respuestaAspectosComunicativos('vocalintencom');">
                                                                            <label>Vocalizaci&oacute;n con intenci&oacute;n comunicativa</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='intercaras' id='intercaras' type="checkbox" value="" onclick="respuestaAspectosComunicativos('intercaras');">
                                                                            <label>Inter&eacute;s por las caras</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='vocalarvar' id='vocalarvar' type="checkbox" value="" onclick="respuestaAspectosComunicativos('vocalarvar');">
                                                                            <label>Vocalizaciones largas y variadas</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='protoconv' id='protoconv' type="checkbox" value="" onclick="respuestaAspectosComunicativos('protoconv');">
                                                                            <label>Protoconversaciones</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='gestindi' id='gestindi' type="checkbox" value="" onclick="respuestaAspectosComunicativos('gestindi');">
                                                                            <label>Gesto indicativo</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='imitasilpal' id='imitasilpal' type="checkbox" value="" onclick="respuestaAspectosComunicativos('imitasilpal');">
                                                                            <label>Imita s&iacute;labas y palabras</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='vocainv' id='vocainv' type="checkbox" value="" onclick="respuestaAspectosComunicativos('vocainv');">
                                                                            <label>Vocalizaciones involuntarias</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='reconpal' id='reconpal' type="checkbox" value="" onclick="respuestaAspectosComunicativos('reconpal');">
                                                                            <label>Reconoce palabras</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='imitacion' id='imitacion' type="checkbox" value="" onclick="respuestaAspectosComunicativos('imitacion');">
                                                                            <label>Imitaci&oacute;n</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='respordcomp' id='respordcomp' type="checkbox" value="" onclick="respuestaAspectosComunicativos('respordcomp');">
                                                                            <label>Responde ordenes complejas</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                <!-- *********************************************** Fonologico ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingFonologico">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFonologico" aria-expanded="true" aria-controls="collapseFonologico">
                                                            <h5 class="mb-12">Componente Fonol&oacute;gico</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseFonologico" class="collapse show" role="tabpanel" aria-labelledby="headingFonologico">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                
                                                                <div id="cargaComponentefonologico" class="row"></div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Cuadro fonol&oacute;gico:</b></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="cargaCuadrofonologico" class="row"></div>
                                                                
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Semantico ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingSemantico">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSemantico" aria-expanded="true" aria-controls="collapseSemantico">
                                                            <h5 class="mb-12">Componente Sem&aacute;ntico</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseSemantico" class="collapse show" role="tabpanel" aria-labelledby="headingSemantico">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div id="cargaComponenteSemantico" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Morfosintactico ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingMorfosintactico">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseMorfosintactico" aria-expanded="true" aria-controls="collapseMorfosintactico">
                                                            <h5 class="mb-12">Componente Morfosint&aacute;ctico</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseMorfosintactico" class="collapse show" role="tabpanel" aria-labelledby="headingMorfosintactico">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div id="cargaComponenteMorfosintactico" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Pragmatico ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingPragmatico">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePragmatico" aria-expanded="true" aria-controls="collapsePragmatico">
                                                            <h5 class="mb-12">Componente Pragm&aacute;tico</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsePragmatico" class="collapse show" role="tabpanel" aria-labelledby="headingPragmatico">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div id="cargaComponentePragmatico" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Lenguaje Expresivo ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingExpresivo">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseExpresivo" aria-expanded="true" aria-controls="collapseExpresivo">
                                                            <h5 class="mb-12">Lenguaje Expresivo</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseExpresivo" class="collapse show" role="tabpanel" aria-labelledby="headingExpresivo">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div id="cargaLenguajeExpresivo" class="row"></div>
                                                                <hr>
                                                                <div id="cargaLenguajeExpresivo2" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Lenguaje Comprensivo ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingComprensivo">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseComprensivo" aria-expanded="true" aria-controls="collapseComprensivo">
                                                            <h5 class="mb-12">Lenguaje Comprensivo</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseComprensivo" class="collapse show" role="tabpanel" aria-labelledby="headingComprensivo">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div id="cargaLenguajeComprensivo" class="row"></div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** Audicion ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingAudicion">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAudicion" aria-expanded="true" aria-controls="collapseAudicion">
                                                            <h5 class="mb-12">Audici&oacute;n</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseAudicion" class="collapse show" role="tabpanel" aria-labelledby="headingAudicion">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Situaci&oacute;n actual:</b></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="cargaAudicion" class="row"></div>
                                                                
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                            </div> <!-- FIN TAB-->
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
            var idtipocita      = 2;
            
            if(idcita != "" && idtipocita == 2){
                editarCitaInformacion(idpaciente,idcita, idtipocita);
            }
            
            cargarDatos();
            cargaTemporoEspacial();
            cargaEvaluacionHabla();
            cargaSoporteFisico();
            cargaAspectosComunicativos();
            cargaComponentefonologico();
            cargaCuadrofonologico();
            cargaComponenteSemantico();
            cargaComponenteMorfosintactico();
            cargaComponentePragmatico();
            cargaLenguajeExpresivo();
            cargaLenguajeExpresivo2();
            cargaLenguajeComprensivo();
            cargaAudicion();
            
            //Temporo Espacial
            function cargaTemporoEspacial(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"cargaTemporoEspacial", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#preguntasTemporo").html(data); 
                });
            }
            
            function respuestaTemporoEspacial(idpaciente, idrespuesta){
                var idarea = 3;
                var texto = $("#observacion"+idrespuesta).val();
                var idoption = $('input:radio[name=radio'+idrespuesta+']:checked').val();
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaTemporoEspacial", idpaciente:idpaciente, idrespuesta:idrespuesta, idoption:idoption, texto:texto, idarea:idarea},function(data){
                   cargaTemporoEspacial();
                });
            }
            
            ///Evaluacion habla
            function cargaEvaluacionHabla(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"cargaEvaluacionHabla", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#evaluacionHabla").html(data); 
                });
            }
            
            function respuestaEvaluacionHabla(idpaciente, idrespuesta){
                var idarea = 3;
                var texto = $("#obsHabla"+idrespuesta).val();
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaEvaluacionHabla", idpaciente:idpaciente, idrespuesta:idrespuesta, texto:texto, idarea:idarea},function(data){
                   cargaEvaluacionHabla();
                });
            }
            
            //Soporte Fisico
            function cargaSoporteFisico(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"cargaSoporteFisico", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#cargaSoporteFisico").html(data); 
                });
            }
            
            function respuestaSoporteFisico(idpaciente, idrespuesta, campo, idcheck){
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
            }
            
            //Aspectos comunicativos
            function cargaAspectosComunicativos(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"cargaAspectosComunicativos", idpaciente:idpaciente, idarea:idarea},function(dataRes){
                   for(var i in dataRes){
                       datosRes = dataRes[i];
                        $("#idrespuestaAC").val(datosRes.idrespuesta);
                        if(datosRes.atenvisual == 1){$("#atenvisual").prop("checked", true);}else{$("#atenvisual").prop("checked", false);}
                        if(datosRes.compmirobj == 1){$("#compmirobj").prop("checked", true);}else{$("#compmirobj").prop("checked", false);}
                        if(datosRes.atenauditiva == 1){$("#atenauditiva").prop("checked", true);}else{$("#atenauditiva").prop("checked", false);}
                        if(datosRes.mireschabla == 1){$("#mireschabla").prop("checked", true);}else{$("#mireschabla").prop("checked", false);}
                        if(datosRes.interinteracc == 1){$("#interinteracc").prop("checked", true);}else{$("#interinteracc").prop("checked", false);}
                        if(datosRes.resordsenc == 1){$("#resordsenc").prop("checked", true);}else{$("#resordsenc").prop("checked", false);}
                        if(datosRes.comcor == 1){$("#comcor").prop("checked", true);}else{$("#comcor").prop("checked", false);}
                        if(datosRes.vocalintencom == 1){$("#vocalintencom").prop("checked", true);}else{$("#vocalintencom").prop("checked", false);}
                        if(datosRes.intercaras == 1){$("#intercaras").prop("checked", true);}else{$("#intercaras").prop("checked", false);}
                        if(datosRes.vocalarvar == 1){$("#vocalarvar").prop("checked", true);}else{$("#vocalarvar").prop("checked", false);}
                        if(datosRes.protoconv == 1){$("#protoconv").prop("checked", true);}else{$("#protoconv").prop("checked", false);}
                        if(datosRes.gestindi == 1){$("#gestindi").prop("checked", true);}else{$("#gestindi").prop("checked", false);}
                        if(datosRes.imitasilpal == 1){$("#imitasilpal").prop("checked", true);}else{$("#imitasilpal").prop("checked", false);}
                        if(datosRes.vocainv == 1){$("#vocainv").prop("checked", true);}else{$("#vocainv").prop("checked", false);}
                        if(datosRes.reconpal == 1){$("#reconpal").prop("checked", true);}else{$("#reconpal").prop("checked", false);}
                        if(datosRes.imitacion == 1){$("#imitacion").prop("checked", true);}else{$("#imitacion").prop("checked", false);}
                        if(datosRes.respordcomp == 1){$("#respordcomp").prop("checked", true);}else{$("#respordcomp").prop("checked", false);}
                   }
                },'json');
            }
            
            function respuestaAspectosComunicativos(campo){
                var idpaciente = $("#idpaciente").val();
                var idrespuesta = $("#idrespuestaAC").val();
                var idarea = 3;
                
                if($("#"+campo+":checked").val() != null ){
                    var idoption = 1;
                }else{
                    var idoption = 0;
                }
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaAspectosComunicativos", idpaciente:idpaciente, idrespuesta:idrespuesta, campo:campo, idoption:idoption, idarea:idarea},function(data){
                   cargaAspectosComunicativos();
                });
            }
            
            //Componente fonologico
            function cargaComponentefonologico(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"cargaComponentefonologico", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#cargaComponentefonologico").html(data); 
                });
            }
            
            function respuestaComponentefonologico(idpaciente, idrespuesta, campo, idcheck){
                var idarea = 3;
                
                if($("#"+idcheck+":checked").val() != null ){
                    var idoption = 1;
                }else{
                    var idoption = 0;
                }
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaComponentefonologico", idpaciente:idpaciente, idrespuesta:idrespuesta, campo:campo, idoption:idoption, idarea:idarea},function(data){
                   cargaComponentefonologico();
                });
            }
            
            // Cuadro fonologico
            
            function cargaCuadrofonologico(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"cargaCuadrofonologico", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#cargaCuadrofonologico").html(data); 
                });
            }
            
            function respuestaCuadrofonologico(idpaciente, idrespuesta, campo, idcheck){
                var idarea = 3;
                
                if(campo == "observaciones"){
                    var idoption = $("#observacionesfono").val();
                }else{
                    if($("#"+idcheck+":checked").val() != null ){
                        var idoption = 1;
                    }else{
                        var idoption = 0;
                    }
                }
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaCuadrofonologico", idpaciente:idpaciente, idrespuesta:idrespuesta, campo:campo, idoption:idoption, idarea:idarea},function(data){
                   cargaCuadrofonologico();
                });
            }
            
            //Componente semantico
            function cargaComponenteSemantico(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"cargaComponenteSemantico", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#cargaComponenteSemantico").html(data); 
                });
            }
            
            function respuestaComponenteSemantico(idpaciente, idrespuesta, campo, idcheck){
                var idarea = 3;
                
                if($("#"+idcheck+":checked").val() != null ){
                    var idoption = 1;
                }else{
                    var idoption = 0;
                }
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaComponenteSemantico", idpaciente:idpaciente, idrespuesta:idrespuesta, campo:campo, idoption:idoption, idarea:idarea},function(data){
                   cargaComponenteSemantico();
                });
            }
            
            
            //Componente Morfosintactico
            function cargaComponenteMorfosintactico(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"cargaComponenteMorfosintactico", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#cargaComponenteMorfosintactico").html(data); 
                });
            }
            
            function respuestaComponenteMorfosintactico(idpaciente, idrespuesta, campo, idcheck){
                var idarea = 3;
                
                if($("#"+idcheck+":checked").val() != null ){
                    var idoption = 1;
                }else{
                    var idoption = 0;
                }
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaComponenteMorfosintactico", idpaciente:idpaciente, idrespuesta:idrespuesta, campo:campo, idoption:idoption, idarea:idarea},function(data){
                   cargaComponenteMorfosintactico();
                });
            }
            
        
            //Componente Pragmatico
            function cargaComponentePragmatico(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"cargaComponentePragmatico", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#cargaComponentePragmatico").html(data); 
                });
            }
            
            function respuestaComponentePragmatico(idpaciente, idrespuesta, campo, idcheck){
                var idarea = 3;
                
                if($("#"+idcheck+":checked").val() != null ){
                    var idoption = 1;
                }else{
                    var idoption = 0;
                }
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaComponentePragmatico", idpaciente:idpaciente, idrespuesta:idrespuesta, campo:campo, idoption:idoption, idarea:idarea},function(data){
                   cargaComponentePragmatico();
                });
            }
            
            
            //Componente Lenguaje Expresivo
            function cargaLenguajeExpresivo(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"cargaLenguajeExpresivo", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#cargaLenguajeExpresivo").html(data); 
                });
            }
            
            function respuestaLenguajeExpresivo(idpaciente, idrespuesta, campo, idcheck){
                var idarea = 3;
                
                if($("#"+idcheck+":checked").val() != null ){
                    var idoption = 1;
                }else{
                    var idoption = 0;
                }
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaLenguajeExpresivo", idpaciente:idpaciente, idrespuesta:idrespuesta, campo:campo, idoption:idoption, idarea:idarea},function(data){
                   cargaLenguajeExpresivo();
                });
            }
            
            function cargaLenguajeExpresivo2(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"cargaLenguajeExpresivo2", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#cargaLenguajeExpresivo2").html(data); 
                });
            }
            
            function respuestaLenguajeExpresivo2(idpaciente, idrespuesta){
                var idarea = 3;
                var idoption = $('input:radio[name=radio'+idrespuesta+']:checked').val();
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaLenguajeExpresivo2", idpaciente:idpaciente, idrespuesta:idrespuesta, idoption:idoption, idarea:idarea},function(data){
                   cargaLenguajeExpresivo2();
                });
            }
            
            // Lenguaje Comprensivo
            function cargaLenguajeComprensivo(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"cargaLenguajeComprensivo", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#cargaLenguajeComprensivo").html(data); 
                });
            }
            
            function respuestaLenguajeComprensivo(idpaciente, idrespuesta){
                var idarea = 3;
                var idoption = $('input:radio[name=radio'+idrespuesta+']:checked').val();
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaLenguajeComprensivo", idpaciente:idpaciente, idrespuesta:idrespuesta, idoption:idoption, idarea:idarea},function(data){
                   cargaLenguajeComprensivo();
                });
            }
            
            
            // cargaAudicion
            function cargaAudicion(){
                var idpaciente = $("#idpaciente").val();
                var idarea = 3;
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"cargaAudicion", idpaciente:idpaciente, idarea:idarea},function(data){
                    $("#cargaAudicion").html(data); 
                });
            }
            
            function respuestaAudicion(idpaciente, idrespuesta){
                var idarea = 3;
                var idoption = $('input:radio[name=radio'+idrespuesta+']:checked').val();
                if(idoption == 1){
                    normal_si = "1";
                    alterado_no = "0";
                }else{
                    alterado_no = "2";
                    normal_si = "0";
                }
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaAudicion", idpaciente:idpaciente, idrespuesta:idrespuesta, normal_si:normal_si, alterado_no:alterado_no, idarea:idarea},function(data){
                   cargaAudicion();
                });
            }
            
            function respuestaAudicionSelect(idpaciente, idrespuesta){
                var idarea = 3;
                var idoption = $('#select'+idrespuesta).val();
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaAudicionSelect", idpaciente:idpaciente, idrespuesta:idrespuesta, idoption:idoption, idarea:idarea},function(data){
                   cargaAudicion();
                });
            }
            
            
            function respuestaAudicionObservaciones(idpaciente, idrespuesta, campo, idobservacion){
                var idarea = 3;
                var texto = $("#"+idobservacion).val();
                
                $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"respuestaAudicionObservaciones", idpaciente:idpaciente, idrespuesta:idrespuesta, campo:campo, texto:texto, idarea:idarea},function(data){
                   cargaAudicion();
                });
            }
            
        </script>
        
    </body>
    

</html>