<?php   
    include('../directiva.php');
    $idpaciente     = $_GET['var'];
    $idcita         = $_GET['cita'];
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
                                                            <h5 class="mb-12">Antecedentes</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseAntecedentes" class="collapse show" role="tabpanel" aria-labelledby="headingAntecedentes">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    
                                                                    <!-- ***********************************************Ficha************************************************************************* -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>&iquest;Que medicamentos ha consumido durante el periodo prenatal, peri natal y postnatal?.</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Cuales?</label>
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" placeholder="Digite cuales" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Patologías asociadas al estado actual del paciente</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" placeholder="Digite las patologias" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>&iquest;Algún miembro de la familia ha sufrido de: pérdidas auditivas, problemas de lenguaje.</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Cuales?</label>
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" placeholder="Digite cuales" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** evaluacion de la respiracion ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingRespiracion">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseRespiracion" aria-expanded="true" aria-controls="collapseRespiracion">
                                                            <h5 class="mb-12">Evaluación de la Respiración</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseRespiracion" class="collapse show" role="tabpanel" aria-labelledby="headingRespiracion">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    
                                                                    <!-- ***********************************************Ficha************************************************************************* -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Modo respiratorio:</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Nasal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Mixto con pred. nasal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Oral</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Mixto con pred. oral</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Tipo Respiratorio:</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Costal superior</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Costal medio</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Diafragm&aacute;tico</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Coordinac&oacute;n Fono-respiratoria:</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Normal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Alterada</label>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** evaluacion de la alimentacion ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingAlimentacion">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAlimentacion" aria-expanded="true" aria-controls="collapseAlimentacion">
                                                            <h5 class="mb-12">Evaluación de la Alimentación</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseAlimentacion" class="collapse show" role="tabpanel" aria-labelledby="headingAlimentacion">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    
                                                                    <!-- ***********************************************Ficha************************************************************************* -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Reflejos Orales:</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Presentes</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Ausentes</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Integrados</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Reflejo de B&uacute;squeda</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Succi&oacute;n-Degluci&oacute;n</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Reflejo de Mordida</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Reflejo de nausea</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Integrados</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Examen Extraoral</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Boca:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Normal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Amplia</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Peque&ntilde;a</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Labios:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Labio superior:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Grueso</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Corto</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Normal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Evertido</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Labio inferior:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Grueso</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Corto</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Normal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Evertido</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Sensibilidad:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Normal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Hipo sensible</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Hipersensible</label>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .row -->
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Examen Intraoral</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Enc&iacute;a:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Normal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Sensibilidad:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Normal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Aumentada</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Disminuida</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Color:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Normal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Amarillo</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Blanco</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Rojo</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" placeholder="Otro" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Lengua:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Tama&ntilde;o macroglosia</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>microglosia</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Normal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Punta bifida</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Indentaciones:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Color:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Normal</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Blanco</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" placeholder="Otro" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Boca seca</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                </div><!-- .row -->
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Texturas de alimentos:</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label><b>CONSISTENCIA:</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label><b>TIPO DE COMIDA:</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label><b>OBSERVACION:</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Liquido claro:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Agua:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>liquido espeso:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Yogurth:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Liquido tipo N&eacute;ctar:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Miel:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>S&oacute;lido:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Pan:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Crocantes:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Galletas:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>H&uacute;medo:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Frutas:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Fase anticipatoria</b></label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Fase preparatoria</b></label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Fase oral</b></label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Observaciones</b></label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- *********************************************** evaluacion de lenguaje ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingLenguaje">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseLenguaje" aria-expanded="true" aria-controls="collapseLenguaje">
                                                            <h5 class="mb-12">Evaluación de Lenguaje</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseLenguaje" class="collapse show" role="tabpanel" aria-labelledby="headingLenguaje">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    
                                                                    <!-- ***********************************************Ficha************************************************************************* -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label><b>Intercambio conversacional:</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label><b>Participa:</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Implicación:</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Inicia conversación</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Solo responde</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label><b>Inicia o cambia de tema:</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label><b>Toma o cede turnos:</b></label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                </div><!-- .row -->
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Ni&ntilde;os menores de 1 a&ntilde;o</b></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Realiza movimientos con alguna parte del cuerpo, al escuchar que alguien le habla?.</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" placeholder="Qui&eacute;n?" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Realiza sonidos guturales al escuchar que se le habla directamente?.</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;El ni&ntilde;o(a) grita ó llora?.</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>&iquest;En qué ocasiones principalmente se evidencian estas acciones?</label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Sigue con los ojos la dirección de la mirada del adulto?.</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                            Algunas veces <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" placeholder="Cuando?" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Posee sonrisa social?.</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" placeholder="Qui&eacute;n?" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Hace uso del Gesto Indicativo para comunicar algo?.</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                            Algunas veces <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Mira fijamente lo que quiere?.</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;El niño(a) comprende cuando lo llaman por su nombre?.</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;El niño(a) comprende palabras en diferentes contextos?</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Qué acciones utiliza para realizar una petición?</label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Responde a los juegos propuestos por el interlocutor?</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                            Algunas veces <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Principalmente en qué ocasiones?</label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>&iquest;De qué manera lo hace?</label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Imita sílabas y palabras?</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Señala partes de su cuerpo al solicitárselo?</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Obedece a órdenes simples?</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                            Algunas veces <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Principalmente en qué ocasiones?</label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>&iquest;De qué manera lo hace?</label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Reconoce imágenes familiares en imágenes o fotos?</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                </div><!-- .row -->
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Ni&ntilde;os mayores de 3 a&ntilde;os</b></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Inicia nuevos temas de conversación?</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                            Algunas veces <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Principalmente en qué ocasiones?</label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>&iquest;De qué manera lo hace?</label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Da información adecuada al interlocutor si este pide explicaciones?</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Estructura correctamente su discurso</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Reconoce sinónimos y antónimos</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Explica absurdos verbales y visuales</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Compara clasifica y ordena objetos</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Reconoce partes del cuerpo</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Reconoce objetos por su uso</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            SI <input type="radio" name="radio2">
                                                                            NO <input type="radio" name="radio2">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>OBSERVACIONES</b></label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                </div><!-- .row -->
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Componente Fonológico:</b></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Se evaluó el componente fonológico a través láminas:</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Palabra:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Pronunciaci&oacute;n:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Palabra:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Pronunciaci&oacute;n:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Palabra:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Pronunciaci&oacute;n:</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Uno</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Dos</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Tres</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Cuatro</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Cinco</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Seis</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Siete</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Ocho</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Nueve</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Diez</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Gato</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Cuadrado</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Negro</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Carro</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Verde</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Rojo</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Amarillo</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Café</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Azul</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Pelota</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Pájaro</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Conejo</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Dragón</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Ni&ntilde;a</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Pi&ntilde;a</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Realiza praxias liguales</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Chasquear lengua</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Fruncir ce&ntilde;o</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Gui&ntilde;ar ojo</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Elevar cejas</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name='' id='' type="checkbox">
                                                                            <label>Vibrar lengua</label>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                </div><!-- .row -->
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Componente Sem&aacute;ntico:</b></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label><b>Descripci&oacute;n:</b></label>
                                                                            <textarea class="form-control" rows="3" id=""></textarea>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                </div><!-- .row -->
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
        <script src="../js/funciones.js"></script>
        <script src="../js/calculaEdad.js"></script>
        <script type"javascript">
            
            var idpaciente = document.getElementById("idpaciente").value;
            var idcita = document.getElementById("idcita").value;
            if(idcita != ""){
                editarCita(idpaciente, idcita, 0);
            }
            cargarDatos();
        </script>
        
    </body>
    

</html>