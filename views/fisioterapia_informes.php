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
                                        <!-- *********************************************** Formato de evaluacion de fisioterapia  ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingFicha">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFicha" aria-expanded="true" aria-controls="collapseFicha">
                                                    <h5 class="mb-12">Formato de evaluaci&oacute;n de fisioterapia</h5>
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
                                                            <!--<div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Años* (0 sino se suministra)</label>
                                                                    <div class="input-group">
                                                                        <input type="number"  class="form-control" id="pacienteMeses" name="pacienteMeses" placeholder="Digite los Meses" readonly>
                                                                    </div>
                                                                </div>
                                                            </div> -->
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
                                                                    <label>Direcci&oacute;n</label>
                                                                    <input name='pacienteLugarResidencia' id='pacienteLugarResidencia' type="text" class="form-control" placeholder="Digite la Direcci&oacute;n">
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Barrio</label>
                                                                    <input name='pacienteLugarResidencia' id='pacienteLugarResidencia' type="text" class="form-control" placeholder="Digite el Barrio">
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
                                                                    <label>Acudiente</label>
                                                                    <input name='madreNombres' id='madreNombres' type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" required="required">
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>Diagn&oacute;stico M&eacute;dico</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>Diagn&oacute;stico Fisioterapia</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
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
                                                                    <label><b>1. Personales</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>2. Familiares</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>3. Farmacol&oacute;gicos</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>4. Sociales</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>5. Terap&eacute;uticos-Pedag&oacute;gicos</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>6. Traum&aacute;ticos</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>7. Quir&uacute;rgicos</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>Observaci&oacute;n General</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>Tono Muscular</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- ."card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                        
                                        <!-- *********************************************** Actividad ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingActividad">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseActividad" aria-expanded="true" aria-controls="collapseActividad">
                                                    <h5 class="mb-12">Actividad Refleja</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseActividad" class="collapse show" role="tabpanel" aria-labelledby="headingActividad">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            
                                                            <!-- ***********************************************Ficha************************************************************************* -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>1. Desarrollo</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>2. R. Osteotendinosos</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>3. R. Patol&oacute;gicos</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- ."card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                        
                                        <!-- *********************************************** musculo ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingMusculo">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseMusculo" aria-expanded="true" aria-controls="collapseMusculo">
                                                    <h5 class="mb-12">Condiciones MusculoEsquel&eacute;ticas</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseMusculo" class="collapse show" role="tabpanel" aria-labelledby="headingMusculo">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            
                                                            <!-- ***********************************************musculo************************************************************************* -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>1. Flexibilidad</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>2. Oseas</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>3. Ama</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>4. Funcionalidad - Fuerza</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- ."card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                        
                                        <!-- *********************************************** Sensibilidad ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingSensibilidad">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSensibilidad" aria-expanded="true" aria-controls="collapseSensibilidad">
                                                    <h5 class="mb-12">Sensibilidad</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseSensibilidad" class="collapse show" role="tabpanel" aria-labelledby="headingSensibilidad">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- ***********************************************Sensibilidad************************************************************************* -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- ."card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                        <!-- *********************************************** pares ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingPares">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapsePares" aria-expanded="true" aria-controls="collapsePares">
                                                    <h5 class="mb-12">Pares Craneales</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapsePares" class="collapse show" role="tabpanel" aria-labelledby="headingPares">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- ***********************************************Pares************************************************************************* -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- ."card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                        <!-- *********************************************** Postura ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingPostura">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapsePostura" aria-expanded="true" aria-controls="collapsePostura">
                                                    <h5 class="mb-12">Postura</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapsePostura" class="collapse show" role="tabpanel" aria-labelledby="headingPostura">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            
                                                            <!-- ***********************************************musculo************************************************************************* -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>Ajustes posturales - Transici&oacute;n de movimiento</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>Mecanismo postural reflejo</b></label>
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- ."card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                        <!-- *********************************************** coordinacion ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingCoordinacion">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseCoordinacion" aria-expanded="true" aria-controls="collapseCoordinacion">
                                                    <h5 class="mb-12">Coordinacion</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseCoordinacion" class="collapse show" role="tabpanel" aria-labelledby="headingCoordinacion">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- ***********************************************Pares************************************************************************* -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- ."card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                        <!-- *********************************************** esquema ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingEsquema">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEsquema" aria-expanded="true" aria-controls="collapseEsquema">
                                                    <h5 class="mb-12">Esquema Corporal</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseEsquema" class="collapse show" role="tabpanel" aria-labelledby="headingEsquema">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- ***********************************************Pares************************************************************************* -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- ."card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                        <!-- *********************************************** ABC-AVD ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingABC-AVD">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseABC-AVD" aria-expanded="true" aria-controls="collapseABC-AVD">
                                                    <h5 class="mb-12">ABC-AVD</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseABC-AVD" class="collapse show" role="tabpanel" aria-labelledby="headingABC-AVD">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- ***********************************************Pares************************************************************************* -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- ."card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                        <!-- *********************************************** otros ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingOtros">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOtros" aria-expanded="true" aria-controls="collapseOtros">
                                                    <h5 class="mb-12">Otros Sistemas</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseOtros" class="collapse show" role="tabpanel" aria-labelledby="headingOtros">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- ***********************************************Otros************************************************************************* -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- ."card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                        <!-- *********************************************** principales problemas ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingProblemas">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseProblemas" aria-expanded="true" aria-controls="collapseProblemas">
                                                    <h5 class="mb-12">Principales Problemas</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseProblemas" class="collapse show" role="tabpanel" aria-labelledby="headingProblemas">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- ***********************************************Otros************************************************************************* -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- ."card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                        <!-- *********************************************** objetivos - conductas ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingConductas">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseConductas" aria-expanded="true" aria-controls="collapseConductas">
                                                    <h5 class="mb-12">Objetivos - Conductas a seguir</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseConductas" class="collapse show" role="tabpanel" aria-labelledby="headingConductas">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- ***********************************************Otros************************************************************************* -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- ."card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                        <!-- *********************************************** Anexos ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingAnexos">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseAnexos" aria-expanded="true" aria-controls="collapseAnexos">
                                                    <h5 class="mb-12">Anexos</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseAnexos" class="collapse show" role="tabpanel" aria-labelledby="headingConductas">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- ***********************************************Anexos************************************************************************* -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" rows="3" id=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- ."card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                            
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