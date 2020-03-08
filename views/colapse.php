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
                                            <a class="nav-link active" href="#identificacion" role="tab" data-toggle="tab">DATOS GENERALES</a>
                                        </li>
                                        <!--<li class="nav-item">
                                            <a class="nav-link" href="#remision" role="tab" data-toggle="tab">REMISI&Oacute;N</a>
                                        </li>-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="#consulta" role="tab" data-toggle="tab">CONSULTA</a>
                                        </li>
                                        <!--<li class="nav-item">
                                            <a class="nav-link" href="#tratamientos" role="tab" data-toggle="tab">TRATAMIENTOS</a>
                                        </li>-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="#antecedentes" role="tab" data-toggle="tab">ANTECEDENTES</a>
                                        </li>
                                        
                                    </ul>
                                    
                                    <!-- ********************** TAB PANEL IDENTIFICACION ********************** -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="identificacion">
                                            <!-- *********************************************** PACIENTE ************************************************************************* -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel-group">
                                                        <div class="panel panel-default">
                                                          <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                              <a data-toggle="collapse" href="#collapse1">Collapsible panel</a>
                                                            </h4>
                                                          </div>
                                                          <div id="collapse1" class="panel-collapse collapse">
                                                            <div class="panel-body">Panel Body</div>
                                                            <div class="panel-footer">Panel Footer</div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    <div class="card">
                                                        <div class="card-header" role="tab" id="headingTwo">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePaciente" aria-expanded="true" aria-controls="collapsePaciente">
                                                                <h5 class="mb-0">Datos Paciente</h5>
                                                            </a>
                                                        </div><!-- .card-header -->
                                                        <div id="collapsePaciente" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                            <div class="card-block">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        
                                                                        <!-- ***********************************************Nombres y Apellidos Paciente************************************************************************* -->
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Nombres* (NA sino se suministra)</label>
                                                                                <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" required="required">
                                                                            </div><!-- .form-group -->
                                                                        </div><!-- .col-md-4 -->
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Primer apellido* (NA sino se suministra)</label>
                                                                                <input name='pacientePrimerApellido' id='pacientePrimerApellido' type="text" class="form-control" placeholder="Digite el Primer Apellido" required="required">
                                                                            </div><!-- .form-group -->
                                                                        </div><!-- .col-md-4 -->
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Segundo apellido</label>
                                                                                <input name='pacienteSegundoApellido' id='pacienteSegundoApellido' type="text" class="form-control" placeholder="Digite el Segundo Apellido">
                                                                            </div><!-- .form-group -->
                                                                        </div><!-- .col-md-4 -->
                                                                        <!-- ***********************************************Fecha Nacimiento Paciente************************************************************************* -->
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Lugar de Nacimiento</label>
                                                                                <input name='pacienteLugarNacimiento' id='pacienteLugarNacimiento' type="text" class="form-control" placeholder="Digite el Lugar de Nacimiento">
                                                                            </div><!-- .form-group -->
                                                                        </div><!-- .col-md-4 -->
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
                                                                                <label>Meses* (0 sino se suministra)</label>
                                                                                <div class="input-group">
                                                                                    <input type="number"  class="form-control" id="pacienteMeses" name="pacienteMeses" placeholder="Digite los Meses" readonly>
                                                                                </div><!-- .input-group -->
                                                                            </div><!-- .form-group -->
                                                                        </div><!-- .col-md-4 -->
                                                                        <!-- **************************************************Datos  Direccion Paciente**************************************************************** -->
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Direcci&oacute;n</label>
                                                                                <input name='pacienteDireccion' id='pacienteDireccion' type="text" class="form-control" placeholder="Digite La Direcci&oacute;n">
                                                                            </div><!-- .form-group -->
                                                                        </div><!-- .col-md-4 -->
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Ciudad</label>
                                                                                <input name='pacienteCiudad' id='pacienteCiudad' type="text" class="form-control" placeholder="Digite La Ciudad">
                                                                            </div><!-- .form-group -->
                                                                        </div><!-- .col-md-4 -->
                                                                        <!-- **************************************************Datos  Genero Paciente**************************************************************** -->
                                                                        <!--<div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Sexo*</label>
                                                                                <select name='pacienteIdGenero' id='pacienteIdGenero' class="form-control">
                                                                                    <option>Seleccione</option>
                                                                                </select>
                                                                            </div>
                                                                        </div> -->
                                                                        <!-- **************************************************Datos  Escolaridad Paciente**************************************************************** -->
                                                                        <!--<div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Escolaridad* (Otro sino se suministra)</label>
                                                                                <select name='pacienteIdEscolaridad' id='pacienteIdEscolaridad' class="form-control">
                                                                                    <option>Seleccione</option>
                                                                                </select>
                                                                            </div>
                                                                        </div> -->
                                                                        <!-- **************************************************Datos  Tutela Paciente**************************************************************** -->
                                                                        <!--<div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Tutela* (No sino se suministra)</label>
                                                                                <select name='pacienteTutela' id='pacienteTutela' class="form-control">
                                                                                    <option>Seleccione</option>
                                                                                    <option value='S'>SI</option>
                                                                                    <option value='N'>NO</option>
                                                                                </select>
                                                                            </div>
                                                                        </div> -->
                                                                        <!-- **************************************************Datos  Eps Paciente**************************************************************** -->
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>EPS* (Particular sino se suministra)</label>
                                                                                <!--<input name='eps' id='eps' type="text" class="form-control" placeholder="Ingrese el Nombre de la EPS">-->
                                                                                <select name='pacienteIdEps' id='pacienteIdEps' class="form-control">
                                                                                    <option>Seleccione</option>
                                                                                </select>
                                                                            </div><!-- .form-group -->
                                                                        </div><!-- .col-md-4 -->
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Informante</label>
                                                                                <input name='pacienteInformante' id='pacienteInformante' type="text" class="form-control" placeholder="Informante">
                                                                            </div><!-- .form-group -->
                                                                        </div><!-- .col-md-4 -->
                                                                    </div><!-- .row -->
                                                                </div><!-- .card-body -->
                                                            </div><!-- ."card-block -->
                                                        </div><!-- .collapse show -->
                                                    </div><!-- .card -->
                                                </div><!-- .col-md-12 -->
                                            </div><!-- row -->
                                            <!-- ***********************************************    MADRE    ************************************************************************* -->
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingDatosMadre">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseDatosMadre" aria-controls="collapseDatosMadre">
                                                        <h5 class="mb-0">Datos Madre</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseDatosMadre" class="collapse" role="tabpanel" aria-labelledby="headingDatosMadre">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                
                                                                <!-- ***********************************************Nombres y Apellidos Madre************************************************************************* -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Nombres* (NA sino se suministra)</label>
                                                                        <input name='madreNombres' id='madreNombres' type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" required="required">
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Primer apellido* (NA sino se suministra)</label>
                                                                        <input name='madrePrimerApellido' id='madrePrimerApellido' type="text" class="form-control" placeholder="Digite el Primer Apellido" required="required">
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Segundo apellido</label>
                                                                        <input name='madreSegundoApellido' id='madreSegundoApellido' type="text" class="form-control" placeholder="Digite el Segundo Apellido">
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- ***********************************************Edad Madre************************************************************************** -->
                                                                <br>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Edad* (0 sino se suministra)</label>
                                                                        <input name='madreEdad' id='madreEdad' type="number" class="form-control" placeholder="Digite la Edad">
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- **************************************************Datos  Escolaridad Madre**************************************************************** -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Escolaridad* (Otro sino se suministra)</label>
                                                                        <input name='madreIdEscolaridad' id='madreIdEscolaridad' type="text" class="form-control" placeholder="Digite la Escolaridad">
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- **************************************************Datos Ocupacion Madre**************************************************************** -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Ocupaci&oacute;n</label>
                                                                        <input name='madreOcupacion' id='madreOcupacion' type="text" class="form-control" placeholder="Digite la Ocuaci&oacute;n">
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- ***********************************************Datos Direccion Madre************************************************************************* -->
                                                                <!--<div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Direcci&oacute;n* (NA sino se suministra)</label>
                                                                        <input name='madreDireccion' id='madreDireccion' type="text" class="form-control" placeholder="Digite la Direcci&oacute;n" required="required">
                                                                    </div>
                                                                </div>-->
                                                                <!-- ***********************************************Datos Telefonos Madre************************************************************************* -->
                                                                <!--<div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Tel&eacute;fono Fijo</label>
                                                                        <input name='madreTelefonoFijo' id='madreTelefonoFijo' type="text" class="form-control" placeholder="Digite el Tel&eacute;fono fijo">
                                                                    </div>
                                                                </div> -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Celular</label>
                                                                        <input name='madreTelefonoCelular' id='madreTelefonoCelular' type="text" class="form-control" placeholder="Digite el Celular" required="required">
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- ***********************************************Datos Correo Electronico Madre************************************************************************* -->
                                                                <!--<div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Correo Electr&oacute;nico</label>
                                                                        <input name='madreEmail' id='madreEmail' type="text" class="form-control" placeholder="Digite el Correo Electr&oacute;nico">
                                                                    </div>
                                                                </div> -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Casa</label>
                                                                        <select name='madreCasa' id='madreCasa' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Tiene</option>
                                                                            <option value='N'>No tiene</option>
                                                                        </select>
                                                                    </div>
                                                                </div>    
                                                            </div><!-- .row -->
                                                        </div><!-- .card-body -->
                                                    </div><!-- ."card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            <!-- ***********************************************    PADRE    ************************************************************************* -->
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingDatosPadre">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseDatosPadre" aria-controls="collapseDatosPadre">
                                                        <h5 class="mb-0">Datos Padre</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseDatosPadre" class="collapse" role="tabpanel" aria-labelledby="headingDatosPadre">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                
                                                                <!-- ***********************************************Nombres y Apellidos Padre************************************************************************* -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Nombres* (NA sino se suministra)</label>
                                                                        <input name='padreNombres' id='padreNombres' type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" required="required">
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Primer apellido* (NA sino se suministra)</label>
                                                                        <input name='padrePrimerApellido' id='padrePrimerApellido' type="text" class="form-control" placeholder="Digite el Primer Apellido" required="required">
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Segundo apellido</label>
                                                                        <input name='padreSegundoApellido' id='padreSegundoApellido' type="text" class="form-control" placeholder="Digite el Segundo Apellido">
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- ***********************************************Edad Padre************************************************************************** -->
                                                                <br>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Edad* (0 sino se suministra)</label>
                                                                        <input name='padreEdad' id='padreEdad' type="number" class="form-control" placeholder="Digite la Edad">
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- **************************************************Datos  Escolaridad Padre**************************************************************** -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Escolaridad* (Otro sino se suministra)</label>
                                                                        <input name='padreIdEscolaridad' id='padreIdEscolaridad' type="text" class="form-control" placeholder="Digite la Escolaridad">
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- **************************************************Datos Ocupacion Padre**************************************************************** -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Ocupaci&oacute;n</label>
                                                                        <input name='padreOcupacion' id='padreOcupacion' type="text" class="form-control" placeholder="Digite la Ocuaci&oacute;n" >
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- ***********************************************Datos Direccion Padre************************************************************************* -->
                                                                <!--<div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Direcci&oacute;n* (NA sino se suministra)</label>
                                                                        <input name='padreDireccion' id='padreDireccion' type="text" class="form-control" placeholder="Digite la Direcci&oacute;n" required="required">
                                                                    </div>
                                                                </div> -->
                                                                <!-- ***********************************************Datos Telefonos Padre************************************************************************* -->
                                                                <!--<div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Tel&eacute;fono Fijo</label>
                                                                        <input name='padreTelefonoFijo' id='padreTelefonoFijo' type="text" class="form-control" placeholder="Digite el Tel&eacute;fono fijo">
                                                                    </div>
                                                                </div>-->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Celular</label>
                                                                        <input name='padreTelefonoCelular' id='padreTelefonoCelular' type="text" class="form-control" placeholder="Digite el Celular" required="required">
                                                                    </div><!-- .form-group -->
                                                                </div><!-- .col-md-4 -->
                                                                <!-- ***********************************************Datos Correo Electronico Padre************************************************************************* -->
                                                                <!--<div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Correo Electr&oacute;nico</label>
                                                                        <input name='padreEmail' id='padreEmail' type="text" class="form-control" placeholder="Digite el Correo Electr&oacute;nico">
                                                                    </div>
                                                                </div> -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Casa</label>
                                                                        <select name='madreCasa' id='madreCasa' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Tiene</option>
                                                                            <option value='N'>No tiene</option>
                                                                        </select>
                                                                    </div>
                                                                </div>  
                                                            </div><!-- .row -->
                                                        </div><!-- .card-body -->
                                                    </div><!-- ."card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                              <!-- ***********************************************Card Remision************************************************************************* -->
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
                                                                        <input name='remitidoRemision' id='remitidoRemision' type="text" class="form-control" placeholder="Remitido por">
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Motivo</label>
                                                                        <input name='motivoRemision' id='motivoRemision' type="text" class="form-control" placeholder="Motivo">
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
                                                            <div class="row">
                                                                
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Madre</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Nombres de la Madre</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Edad</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Ocupacion</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Vive en la casa?</label>
                                                                        <input name='persona1Constitucion' id='persona1Constitucion' type="checkbox">
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Padre</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Nombres del Padre</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Edad</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Ocupacion</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Vive en la casa?</label>
                                                                        <input name='persona1Constitucion' id='persona1Constitucion' type="checkbox">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Hermano</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Nombres del Hermano</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Edad</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Ocupacion</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Vive en la casa?</label>
                                                                        <input name='persona1Constitucion' id='persona1Constitucion' type="checkbox">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group" style='float:right;'>
                                                                        <label>Otras personas que viven en la casa y su parentezco con el ni&ntilde;o</label>
                                                                        <a id="modal_constitucion" href="#modal_AddConstitucion" role="button" class="btn btn-primary btn-sm" data-toggle="modal">Adicionar</a>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                                
                                        </div> <!-- FIN TAB-->
                                      
                                      <!-- ********************** TAB PANEL REMISION **********************
                                      <div role="tabpanel" class="tab-pane fade" id="remision">
                                        
                                      </div>-->
                                        <!-- ********************** TAB PANEL CONSULTA **********************-->
                                        <div role="tabpanel" class="w-100 tab-pane fade" id="consulta">
                                        <!-- ***********************************************Card Motivo Consulta************************************************************************* -->
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingMotivoConsulta">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseMotivoConsulta" aria-expanded="true" aria-controls="collapseMotivoConsulta">
                                                        <h5 class="mb-0">Motivo de Consulta (Dificultades)</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseMotivoConsulta" class="collapse show" role="tabpanel" aria-labelledby="headingMotivoConsulta">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <textarea class="form-control" rows="3" id="motivoConsultaObservacion"></textarea>
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
                                                                        <label>Diagn&oacute;sticos anteriores (SI) (NO) Cuales? Por parte de quien?</label>
                                                                        <textarea name="diagnosticos"  id="diagnosticos" class="form-control" rows="3" placeholder="Digite Diagn&oacute;sticos" required="required"></textarea>
                                                                    </div>
                                                                </div>
                    
                                                                <!--<div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Remitido por:</label>
                                                                        <input name="remitido" id="remitido" type="text" class="form-control" placeholder="Digite M&eacute;dico que remite">
                                                                    </div>
                                                                </div>-->
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card Historia del Problema************************************************************************* -->
                                            
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingHistoriaProblema">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseHistoriaProblema" aria-expanded="true" aria-controls="collapseHistoriaProblema">
                                                        <h5 class="mb-0">Historia o antecedentes de las dificultades</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseHistoriaProblema" class="collapse show" role="tabpanel" aria-labelledby="headingHistoriaProblema">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>A quﾃｩ edad comenzaron a notar dificultades:   Por que?</label>
                                                                        <input name="edadIniDif" id="edadIniDif" type="text" class="form-control" placeholder="Digite edad">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Por que?</label>
                                                                        <textarea class="form-control" rows="2" id="porque"></textarea>
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Otras conductas reportadas</label>
                                                                        <textarea class="form-control" rows="3" id="otrasConductas"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card Tratamiento del Problema************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingTratamientoProblema">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTratamientoProblema" aria-expanded="true" aria-controls="collapseTratamientoProblema">
                                                        <h5 class="mb-0">Tratamientos anteriores</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseTratamientoProblema" class="collapse show" role="tabpanel" aria-labelledby="headingTratamientoProblema">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>INSTITUCI&Oacute;N</label>
                                                                        <input name='tratamientoProblemaInstitucion' id='tratamientoProblemaInstitucion' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>PROFESI&Oacute;N</label>
                                                                        <input name='tratamientoProblemaProfesion' id='tratamientoProblemaProfesion' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>TIEMPO</label>
                                                                        <input name='tratamientoProblemaTiempo' id='tratamientoProblemaTiempo' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>EDAD INICIO</label>
                                                                        <input name='tratamientoProblemaEdadInicio' id='tratamientoProblemaEdadInicio' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>DURACI&Oacute;N</label>
                                                                        <input name='tratamientoProblemaDuracion' id='tratamientoProblemaDuracion' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>RESULTADOS</label>
                                                                        <input name='tratamientoProblemaResulados' id='tratamientoProblemaResulados' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group" style='float:right;'>
                                                                        <label>OTROS TRATAMIENTOS</label>
                                                                        <a id="modal_tratamientos" href="#modal_AddTratamientos" role="button" class="btn btn-primary btn-sm" data-toggle="modal">Adicionar</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                        </div>
                                        <!-- ********************** TAB PANEL TRATAMIENTOS **********************
                                        <div role="tabpanel" class="tab-pane fade" id="tratamientos">
                                          
                                          
                                        </div>-->
                                        <!-- ********************** TAB PANEL ANTECEDENTES **********************-->
                                        <div role="tabpanel" class="tab-pane fade" id="antecedentes">
                                          
                                            <!-- ***********************************************Card Antecedentes Familiares************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingAntecedentesFamiliares">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseAntecedentesFamiliares" aria-expanded="true" aria-controls="collapseInformacion">
                                                        <h5 class="mb-0">Antecedentes familiares Importantes</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseAntecedentesFamiliares" class="collapse show" role="tabpanel" aria-labelledby="headingAntecedentesFamiliares">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>L&iacute;nea Materna</label>
                                                                        <textarea class="form-control" rows="3" id="antecedentesLineaMadre"></textarea>
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>L&iacute;nea Paterna</label>
                                                                        <textarea class="form-control" rows="3" id="antecedentesLineaPadre"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            <!-- ***********************************************Card Antecedentes Prenatales************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingAntecedentesPrenatales">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseAntecedentesPrenatales" aria-expanded="true" aria-controls="collapseAntecedentesPrenatales">
                                                        <h5 class="mb-0">Antecedentes Prenatales</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseAntecedentesPrenatales" class="collapse show" role="tabpanel" aria-labelledby="headingAntecedentesPrenatales">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>El embarazo fue deseado</label>
                                                                        <select name='madreCasa' id='madreCasa' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Se tomaron anticonceptivos</label>
                                                                        <select name='madreCasa' id='madreCasa' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Abortivas</label>
                                                                        <select name='madreCasa' id='madreCasa' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <!--<div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Es hijo leg&iacute;timo</label>
                                                                        <select name='madreCasa' id='madreCasa' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Natural</label>
                                                                        <select name='madreCasa' id='madreCasa' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Adoptado</label>
                                                                        <select name='madreCasa' id='madreCasa' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Actitud frente al embarazo:</label>
                                                                        <textarea class="form-control" rows="3" id="antecedentesLineaPadre"></textarea>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Existe consanguinidad entre padres</label>
                                                                        <select name='madreCasa' id='madreCasa' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Enfermedades infecciosas</label>
                                                                        <input name='tratamientoProblemaDuracion' id='tratamientoProblemaDuracion' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Eruptivas</label>
                                                                        <input name='tratamientoProblemaDuracion' id='tratamientoProblemaDuracion' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Otros</label>
                                                                        <input name='tratamientoProblemaDuracion' id='tratamientoProblemaDuracion' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Dificultades emocionales</label>
                                                                        <input name='tratamientoProblemaDuracion' id='tratamientoProblemaDuracion' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Tuvo control m&eacute;dico</label>
                                                                        <select name='madreCasa' id='madreCasa' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                    
                                                                <!--<div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Calidad alimentaci&oacute;n</label>
                                                                        <input name='tratamientoProblemaDuracion' id='tratamientoProblemaDuracion' type="text" class="form-control" >
                                                                    </div>
                                                                </div>-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Rayos X</label>
                                                                        <select name='madreCasa' id='madreCasa' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Ecograf&iacute;as</label>
                                                                        <input name='tratamientoProblemaDuracion' id='tratamientoProblemaDuracion' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            <!-- ***********************************************Card Prenatal Parto************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingPrenatalParto">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsePrenatalParto" aria-expanded="true" aria-controls="collapsePrenatalParto">
                                                        <h5 class="mb-0">Prenatal - Parto</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapsePrenatalParto" class="collapse" role="tabpanel" aria-labelledby="headingPrenatalParto">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Duraci&oacute;n Embarazo</label>
                                                                        <input name='' id='' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Parto</label>
                                                                        <select name='madreCasa' id='madreCasa' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Natural</option>
                                                                            <option value='N'>Cesarea</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!--<div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Duraci&oacute;n</label>
                                                                        <input name='' id='' type="text" class="form-control" >
                                                                    </div>
                                                                </div>-->
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Inducido</label>
                                                                        <select name='madreCasa' id='madreCasa' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!--<div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Ruptura previa fuente:</label>
                                                                        <input name='' id='' type="text" class="form-control" >
                                                                    </div>
                                                                </div>-->
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Lugar</label>
                                                                        <input name='' id='' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Atendido por:</label>
                                                                        <input name='' id='' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Dificultades</label>
                                                                        <input name='' id='' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Incubadora</label>
                                                                        <input name='' id='' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Defectos Cong&eacute;nitos</label>
                                                                        <input name='' id='' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Talla</label>
                                                                        <input name='' id='' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Peso</label>
                                                                        <input name='' id='' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <textarea class="form-control" rows="3" id=""></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                        </div> <!--fin tab antecedentes-->
                                        
                                    </div>
                                </form>
                                </div>
                            </div>
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