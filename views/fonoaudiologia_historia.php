<?php   
    include('../directiva.php');
    $idpaciente     = $_GET['var'];
    $idcita         = $_GET['cita'];
    $idhist         = $_GET['idhist'];
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
    			$('#fechaIngreso').datepicker();
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
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item active">
                                            <a class="nav-link active" href="#anamnesis" role="tab" data-toggle="tab">ANAMNESIS</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#dllolenguaje" role="tab" data-toggle="tab">DESARROLLO LENGUAJE</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#infoescolar" role="tab" data-toggle="tab">INFORMACI&Oacute;N ESCOLAR</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tabalimentacion" role="tab" data-toggle="tab">ALIMENTACI&Oacute;N</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#impDiagnostica" role="tab" data-toggle="tab">IMPRESI&Oacute;N DIAGN&Oacute;STICA</a>
                                        </li>
                                    </ul>
                                    
                                    <!-- ********************** TAB PANEL IDENTIFICACION ********************** -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="anamnesis">
                                            <form id="formUPAnamnesis" role="form" method='post'  action='' name='datos'>
                                            
                                                <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                                <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                                <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
                                                <input name="idhistoriapsico" id="" type="hidden" class="idhistoriapsico form-control" >
                                                
                                                <!-- *********************************************** PACIENTE ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingTwo">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePaciente" aria-expanded="true" aria-controls="collapsePaciente">
                                                            <h5 class="mb-0">Identificaci&oacute;n</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsePaciente" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <!-- ***********************************************Nombres y Apellidos Paciente************************************************************************* -->
                                                                     <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Fecha</label><br>
                                                                            <input readonly type='text' name='fechaCitaIni' id='fechaCitaIni' class="date-picker form-control" placeholder="yyyy-dd-mm">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Nombres</label>
                                                                            <input name='pacienteNombres' readonly id='pacienteNombres' type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Primer apellido</label>
                                                                            <input name='pacientePrimerApellido' readonly id='pacientePrimerApellido' type="text" class="form-control" placeholder="Digite el Primer Apellido" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Segundo apellido</label>
                                                                            <input name='pacienteSegundoApellido' readonly id='pacienteSegundoApellido' type="text" class="form-control" placeholder="Digite el Segundo Apellido">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <!-- ***********************************************Fecha Nacimiento Paciente************************************************************************* -->
            
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Fecha de Nacimiento* (2017-01-01)</label><br>
                                                                            <input type='text' name='pacienteFechaNacimiento' readonly id='pacienteFechaNacimiento' class="date-picker form-control" placeholder="yyyy-dd-mm" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Tipo de Documento*</label>
                                                                            <input name='pacienteIdTipoDocumento' readonly id='pacienteIdTipoDocumento' type="text" class="form-control" placeholder="Digite n&uacute;mero">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Documento</label>
                                                                            <input name='pacienteDocumento' readonly id='pacienteDocumento' type="text" class="form-control" placeholder="Digite n&uacute;mero">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Direcci&oacute;n</label>
                                                                            <input name='pacienteDireccion' readonly id='pacienteDireccion' type="text" class="form-control" placeholder="Digite n&uacute;mero">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Tel&eacute;fono fijo</label>
                                                                            <input name='acudienteTelefonoFijo' readonly id='acudienteTelefonoFijo' type="text" class="form-control" placeholder="Digite el n&uacute;mero">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                 
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Tel&eacute;fono movil</label>
                                                                            <input name='acudienteTelefonoCelular' readonly id='acudienteTelefonoCelular' type="text" class="form-control" placeholder="Digite el n&uacute;mero">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Seguridad social del usuario</label>
                                                                            <input name='pacienteEps' readonly id='pacienteEps' type="text" class="form-control" placeholder="Digite escolaridad">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Escolaridad actual del niño</label>
                                                                            <input name='pacienteEscolaridad' readonly id='pacienteEscolaridad' type="text" class="form-control" placeholder="Digite escolaridad">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Instituci&oacute;n</label>
                                                                            <input name='pacienteInstitucion' id='pacienteInstitucion' type="text" class="form-control" placeholder="Digite el nombre del lugar ">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Datos del acudiente</label>
                                                                            <input name='acudienteNombres' readonly id='acudienteNombres' type="text" class="form-control" placeholder="Digite datos acudiente">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Parentesco con el usuario</label>
                                                                            <input name='acudienteParentescoUsuario' readonly id='acudienteParentescoUsuario' type="text" class="form-control" placeholder="Digite datos acudiente">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                            
                                                <!-- ***********************************************    MOTIVO DE CONSULTA    ************************************************************************* -->
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
                                                                        <label>Remitido por:</label>
                                                                        <input name='remitidoRemision' id='remitidoRemision' type="text" readonly class="form-control" placeholder="Remitido por">
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Motivo</label>
                                                                        <textarea class="form-control" rows="3" readonly name="motivoRemision" id="motivoRemision"></textarea>
                                                                    </div>
                                                                </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Desde cuándo se detectó?, quién lo detecto, qué circunstancias familiares rodean el momento de aparición del problema? Expectativas).</label>
                                                                            <textarea class="form-control" rows="3" name="motivoConsultaObservacion" id="motivoConsultaObservacion"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                <!-- ***********************************************    ANTECEDENTES FAMILIARES    ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingDatosPadre">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDatosPadre" aria-controls="collapseDatosPadre">
                                                            <h5 class="mb-0">Antecedentes Familiares</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseDatosPadre" class="collapse" role="tabpanel" aria-labelledby="headingDatosPadre">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                
                                                                <div class="row">
                                                                    <!-- ***********************************************DATOS Padre y Madre************************************************************************* -->
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Nombre del Padre</label>
                                                                            <input name='padreNombres' id='padreNombres' readonly type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <!-- ***********************************************Edad Padre************************************************************************** -->
                                                                    <br>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='padreEdad' id='padreEdad' readonly type="number" class="form-control" placeholder="Digite la Edad">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <!-- **************************************************Datos Ocupacion Padre**************************************************************** -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Ocupaci&oacute;n</label>
                                                                            <input name='padreOcupacion' id='padreOcupacion' readonly type="text" class="form-control" placeholder="Digite la Ocuaci&oacute;n" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <!-- **************************************************Datos  Escolaridad Padre**************************************************************** -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Escolaridad</label>
                                                                            <input name='padreIdEscolaridad' id='padreIdEscolaridad' readonly type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Nombre de la Madre</label>
                                                                            <input name='madreNombres' id='madreNombres' readonly type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <!-- ***********************************************Edad Madre************************************************************************** -->
                                                                    <br>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='madreEdad' id='madreEdad' readonly type="number" class="form-control" placeholder="Digite la Edad">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <!-- **************************************************Datos Ocupacion Madre**************************************************************** -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Ocupaci&oacute;n</label>
                                                                            <input name='madreOcupacion' id='madreOcupacion' readonly type="text" class="form-control" placeholder="Digite la Ocuaci&oacute;n" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <!-- **************************************************Datos  Escolaridad Madre**************************************************************** -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Escolaridad</label>
                                                                            <input name='madreIdEscolaridad' id='madreIdEscolaridad' readonly type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>N&uacute;mero de hermanos</label>
                                                                            <input name='numerohermanos' id='numerohermanos' type="text" class="form-control" placeholder="Digite el n&uacute;mero">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Lugar que Ocupa</label>
                                                                            <input name='lugarocupa' id='lugarocupa' type="text" class="form-control" placeholder="Digite el lugar que ocupa">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Trastorno Neurol&oacute;gico (En qui&eacute;n?)</label>
                                                                            <input name='transtornoneurologico' id='transtornoneurologico' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Problemas Psiqui&aacute;tricos (En qui&eacute;n?)</label>
                                                                            <input name='problemaspsiquiatrico' id='problemaspsiquiatrico' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Deficiencias Visuales o Auditivas</label>
                                                                            <input name='deficienciasvisaudt' id='deficienciasvisaudt' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Alteraciones del Lenguaje</label>
                                                                            <input name='alteracionlenguaje' id='alteracionlenguaje' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>D&eacute;ficit cognitivo (Retardo mental)</label>
                                                                            <input name='deficitcongnitivo' id='deficitcongnitivo' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Adicciones (drogas o Alcohol)</label>
                                                                            <input name='adicciones' id='adicciones' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Trastornos del aprendizaje</label>
                                                                            <input name='transaprendizaje' id='transaprendizaje' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Parentesco entre los padres</label>
                                                                            <select name="acudienteIdParentesco" id="acudienteIdParentesco" class="form-control">
                                                                                <option>Seleccione</option>
                                                                            </select>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            <label>Parientes que viven con el niño (a)</label>
                                                                            <div class="row" id="constitucion">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Con quien permanece la mayor parte del tiempo</label>
                                                                            <input name='permanecemayortiempo' id='permanecemayortiempo' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Estado socioec&oacute;nomico</label>
                                                                            <select name="estrato" id="estrato" class="form-control">
                                                                                <option value=''>Seleccione</option>
                                                                                <option value='1'>Estrato 1</option>
                                                                                <option value='2'>Estrato 2</option>
                                                                                <option value='3'>Estrato 3</option>
                                                                                <option value='4'>Estrato 4</option>
                                                                                <option value='5'>Estrato 5</option>
                                                                                <option value='6'>Estrato 6</option>
                                                                            </select>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Tipo de vivienda</label>
                                                                            <select name="tipovivienda" id="tipovivienda" class="form-control">
                                                                                <option value=''>Seleccione</option>
                                                                                <option value='1'>Propia</option>
                                                                                <option value='2'>Arrendada</option>
                                                                                <option value='3'>Vive en la casa de un familiar</option>
                                                                            </select>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Descripci&oacute;n de la vivienda</label>
                                                                            <input name='descripcion' id='descripcion' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                 <!-- ***********************************************Card Antecedentes Prenatales************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingAntecedentesPrenatales">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAntecedentesPrenatales" aria-expanded="true" aria-controls="collapseAntecedentesPrenatales">
                                                            <h5 class="mb-0">Antecedentes Prenatales</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseAntecedentesPrenatales" class="collapse" role="tabpanel" aria-labelledby="headingAntecedentesPrenatales">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>N&uacute;mero de embarazos</label>
                                                                            <input name='numeroembarazos' id='numeroembarazos' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Abortos</label>
                                                                            <input name='abortos' id='abortos' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name="idantecedente4" id="idantecedente4" type="hidden" class="form-control" >
                                                                            <label>Duraci&oacute;n Embarazo</label>
                                                                            <input readonly='readonly' name='duracion' id='duracion' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Amenaza de aborto</label>
                                                                            <select readonly='readonly' name='abortivas' id='abortivas' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>&iquest;En qu&eacute; mes?</label>
                                                                            <input name='mesaborto' id='mesaborto' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Control del embarazo</label>
                                                                            <select readonly='readonly' name='controlmedico' id='controlmedico' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Meses</label>
                                                                            <select name='mesescontrolembr' id='mesescontrolembr' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='1'>1</option>
                                                                                <option value='2'>2</option>
                                                                                <option value='3'>3</option>
                                                                                <option value='4'>4</option>
                                                                                <option value='5'>5</option>
                                                                                <option value='6'>6</option>
                                                                                <option value='7'>7</option>
                                                                                <option value='8'>8</option>
                                                                                <option value='9'>9</option>
                                                                            </select>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Lugar</label>
                                                                            <input name='lugarcontrolembr' id='lugarcontrolembr' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Enfermedades Eruptivas</label>
                                                                            <input readonly='readonly' name='enferuptivas' id='enferuptivas' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Convulsiones</label>
                                                                            <input name='convulsiones' id='convulsiones' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Adicciones</label>
                                                                                <div class="form-group">
                                                                                    <input name="drogadiccion" id="drogadiccion" type="checkbox" value="S">
                                                                                    <label>Drogadicci&oacute;n</label>
                                                                                
                                                                                    <input name="alcoholismo" id="alcoholismo" type="checkbox" value="S">
                                                                                    <label>Alcoholismo</label>
                                                                                
                                                                                    <input name="tabaquismo" id="tabaquismo" type="checkbox" value="S">
                                                                                    <label>Tabaquismo</label>
                                                                                </div>
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name="idantecedente3" id="idantecedente3" type="hidden" class="form-control" >
                                                                            <label>Traumatismo</label>
                                                                            <select name='traumatismo' id='traumatismo' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                        
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Toxoplasmosis</label>
                                                                            <select name='toxoplasmosis' id='toxoplasmosis' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Preclampsia</label>
                                                                            <select name='preclampsia' id='preclampsia' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Infecciones</label>
                                                                            <select name='infecciones' id='infecciones' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Medicamentos</label>
                                                                            <select name='medicamento' id='medicamento' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Cu&aacute;l?:</label>
                                                                            <textarea class="form-control" rows="3" name="cualmedicamento" id="cualmedicamento"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Intoxicaciones</label>
                                                                            <select name='intoxicaciones' id='intoxicaciones' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                        
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Alimentaci&oacute;n</label>
                                                                            <input name='alimentacion' id='alimentacion' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Estado emocional</label>
                                                                            <input name='estadoemocional' id='estadoemocional' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Otros</label>
                                                                            <input name='otrosantcfono' id='otrosantcfono' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                <!-- ***********************************************Card Prerinatales************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingPrenatalParto">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePrenatalParto" aria-expanded="true" aria-controls="collapsePrenatalParto">
                                                            <h5 class="mb-0">Antecedentes Perinatales</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsePrenatalParto" class="collapse" role="tabpanel" aria-labelledby="headingPrenatalParto">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                        
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Parto - Natural</label>
                                                                            <select readonly='readonly' name='parto' id='parto' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>F&oacute;rceps</label>
                                                                            <input name='forceps' id='forceps' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Complicaciones</label>
                                                                            <input readonly='readonly' name='dificultades' id='dificultades' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Circular de cord&oacute;n</label>
                                                                            <select name='circularcordon' id='circularcordon' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Presentaci&oacute;n Cef&aacute;lica</label>
                                                                            <select name='cefalica' id='cefalica' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Pod&oacute;lica</label>
                                                                            <select name='podalica' id='podalica' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Atendido en el Hospital:</label>
                                                                             <select name='antendidohospital' id='antendidohospital' type="text" class="form-control" >
                                                                                  <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                        
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Casa</label>
                                                                             <select name='atendidocasa' id='atendidocasa' type="text" class="form-control" >
                                                                                  <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                        
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Partera</label>
                                                                             <select name='partera' id='partera' type="text" class="form-control" >
                                                                                  <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <textarea class="form-control" rows="3" name="obsrperinatal" id="obsrperinatal"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- ***********************************************Card Postnatales************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingPostnatales">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePostnatales" aria-expanded="true" aria-controls="collapsePostnatales">
                                                            <h5 class="mb-0">Antecedentes Postnatales</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsePostnatales" class="collapse" role="tabpanel" aria-labelledby="headingPostnatales">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Peso</label>
                                                                            <input readonly='readonly' name='peso' id='peso' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Talla</label>
                                                                            <input readonly='readonly' name='talla' id='talla' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Llanto</label>
                                                                             <select name='llanto' id='llanto' type="text" class="form-control" >
                                                                                  <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Hipoxia</label>
                                                                             <select name='hipoxia' id='hipoxia' type="text" class="form-control" >
                                                                                  <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Cianosis</label>
                                                                             <select name='cianosis' id='cianosis' type="text" class="form-control" >
                                                                                  <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                     <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Incubadora</label>
                                                                            <input readonly='readonly' name='incubadora' id='incubadora' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Ox&iacute;geno</label>
                                                                             <select name='oxigeno' id='oxigeno' type="text" class="form-control" >
                                                                                  <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Reanimaci&oacute;n</label>
                                                                             <select name='reanimacion' id='reanimacion' type="text" class="form-control" >
                                                                                  <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Ictericia</label>
                                                                             <select name='ictericia' id='ictericia' type="text" class="form-control" >
                                                                                  <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Transfusi&oacute;n</label>
                                                                             <select name='transfusion' id='transfusion' type="text" class="form-control" >
                                                                                  <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Fototerapia</label>
                                                                             <select name='fototerapia' id='fototerapia' type="text" class="form-control" >
                                                                                  <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Meconio</label>
                                                                             <select name='meconio' id='meconio' type="text" class="form-control" >
                                                                                  <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Traumatismo</label>
                                                                             <select name='traumatismopost' id='traumatismopost' type="text" class="form-control" >
                                                                                  <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                     <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Cu&aacute;l?:</label>
                                                                            <textarea class="form-control" rows="3" name="cualtraumatismopos" id="cualtraumatismopos"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <textarea class="form-control" rows="3" name="obsrposnatal" id="obsrposnatal"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                    <div class='col-md-12'>
                                                        <div class="button-form">
                                                            <button type="submit" class="btn btn-primary" data-toggle="modal" style='float:right;'>Guardar</button>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                                
                                            </form>
                                        </div> <!--fin tab anamnesis-->
                                        
                                        
                                        <!-- ********************** TAB PANEL DESARROLLO DEL LENGUAJE **********************-->
                                        <div role="tabpanel" class="tab-pane fade" id="dllolenguaje">
                                            <form id="formDlloLeng" role="form" method='post'  action='' name='datos'>
                                            
                                                <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                                <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                                <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
                                                <input name="idhistoriapsico" id="" type="hidden" class="idhistoriapsico form-control" >
                                                
                                                 <!-- ***********************************************Card Desarrollo del lenguaje************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headinglenguaje">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapselenguaje" aria-expanded="true" aria-controls="collapselenguaje">
                                                            <h5 class="mb-0">Desarrollo del lenguaje</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapselenguaje" class="collapse show" role="tabpanel" aria-labelledby="headinglenguaje">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo4" id="iddesarrollo4" type="hidden" class="form-control" >
                                                                            <label>Balbuceo</label>
                                                                            <select readonly='readonly' name='balbuceo' id='balbuceo' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input readonly='readonly' name='edadbalbuceo' id='edadbalbuceo' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input readonly='readonly' name='observacionbalbuceo' id='observacionbalbuceo' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Silabeo</label>
                                                                            <select name='silabeo' id='silabeo' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadsilabeo' id='edadsilabeo' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input name='observacionsilabeo' id='observacionsilabeo' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Palabras</label>
                                                                            <select readonly='readonly' name='palabras' id='palabras' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input readonly='readonly' name='edadpalabras' id='edadpalabras' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input readonly='readonly' name='observacionpalabras' id='observacionpalabras' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Frases</label>
                                                                            <select readonly='readonly' name='frases' id='frases' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input readonly='readonly' name='edadfrases' id='edadfrases' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input readonly='readonly' name='observacionfrases' id='observacionfrases' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Compresi&oacute;n del lenguaje (Actualmente):</label>
                                                                            <input name='comprensionlenguaje' id='comprensionlenguaje' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Hay problemas articulatorios:</label>
                                                                            <input name='problemasarticulatorios' id='problemasarticulatorios' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Usa lenguaje inteligible:</label>
                                                                            <input name='lenguajeinteligible' id='lenguajeinteligible' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
    
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                
                                                 <!-- ***********************************************Card Desarrollo del niño************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingdesarrollo">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedesarrollo" aria-expanded="true" aria-controls="collapsedesarrollo">
                                                            <h5 class="mb-0">Desarrollo del niño</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsedesarrollo" class="collapse show" role="tabpanel" aria-labelledby="headingdesarrollo">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    
                                                                <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Alimentaci&oacute;n Materna</label>
                                                                            <select name='seleccionMaterna' id='seleccionMaterna' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                
                                                                 <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadmaterna' id='edadmaterna' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                
                                                                <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Artificial</label>
                                                                            <select name='seleccionArtificial' id='seleccionArtificial' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                </div>  
                                                                
                                                                 <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadartificial' id='edadartificial' type="text" class="form-control" >
                                                                        </div>
                                                                 </div>
                                                                
                                                                <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Mixta</label>
                                                                            <select name='seleccionMixta' id='seleccionMixta' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                
                                                                 <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadmixta' id='edadmixta' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
    
                                                                <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name="succion" id="succion" type="checkbox" value="S">
                                                                            <label>Succi&oacute;n</label>
                                                                        </div>
                                                                </div>
                                                                 
                                                                <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name="deglucion" id="deglucion" type="checkbox" value="S">
                                                                            <label>Degluci&oacute;n</label>
                                                                        </div>
                                                                </div>
                                                                
                                                                <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name="sialorrea" id="sialorrea" type="checkbox" value="S">
                                                                            <label>Sialorrea</label>
                                                                        </div>
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="apariciondientes" id="apariciondientes" type="checkbox" value="S">
                                                                            <label>Aparici&oacute;n de dientes</label>
                                                                        </div>
                                                                </div>
    
                                                                <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name="masticacion" id="masticacion" type="checkbox" value="S">
                                                                            <label>Masticaci&oacute;n</label>
                                                                        </div>
                                                                </div>
    
                                                            </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->                 
                                                                 
                                                                 
                                                                 
    <!-- ***********************************************Card Estado nutricional del niño************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingnutricion">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsednutricion" aria-expanded="true" aria-controls="collapsednutricion">
                                                            <h5 class="mb-0">Estado nutricional</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsednutricion" class="collapse" role="tabpanel" aria-labelledby="headingnutricion">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
    
                                                                <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="liquidos" id="liquidos" type="checkbox" value="S">
                                                                            <label>L&iacute;quidos</label>
                                                                        </div>
                                                                </div>
                                                                 
                                                                <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name="semisolidos" id="semisolidos" type="checkbox" value="S">
                                                                            <label>Semis&oacute;lidos</label>
                                                                        </div>
                                                                </div>
                                                                
                                                                <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name="solidos" id="solidos" type="checkbox" value="S">
                                                                            <label>S&oacute;lidos</label>
                                                                        </div>
                                                                </div>
                                                                
                                                                <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <input name="balanceado" id="balanceado" type="checkbox" value="S">
                                                                            <label>Balanceado</label>
                                                                        </div>
                                                                </div>
    
                                                                <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="comesolo" id="comesolo" type="checkbox" value="S">
                                                                            <label>Come solo</label>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <h5 class="mb-0"><label>Control de esf&iacute;nteres</label></h5>
                                                                        </div>
                                                                </div>
                                                                 
                                                                <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="diurno" id="diurno" type="checkbox" value="S">
                                                                            <label>Diurno</label>
                                                                        </div>
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="nocturno" id="nocturno" type="checkbox" value="S">
                                                                            <label>Nocturno</label>
                                                                        </div>
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="enuresis" id="enuresis" type="checkbox" value="S">
                                                                            <label>Enuresis</label>
                                                                        </div>
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="encopresis" id="encopresis" type="checkbox" value="S">
                                                                            <label>Encopresis</label>
                                                                        </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Visi&oacute;n</label>
                                                                            <input name='vision' id='vision' type="text" class="form-control" >
                                                                        </div>
                                                                 </div>
                                                                 
                                                                <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Audici&oacute;n</label>
                                                                            <input name='audicion' id='audicion' type="text" class="form-control" >
                                                                        </div>
                                                                 </div> 
                                                                
                                                                <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Traumatismo</label>
                                                                            <input name='traumatismos' id='traumatismos' type="text" class="form-control" >
                                                                        </div>
                                                                 </div>
                                                                 
                                                                <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Enfermedades de los primeros años (Consignar edad, hospitalizaciones y nombre de la enfermedad)</label>
                                                                            <input name='enfprimanos' id='enfprimanos' type="text" class="form-control" >
                                                                        </div>
                                                                 </div>
                                                                 
                                                                 
                                                            </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card --> 
                                                
    <!-- ***********************************************Card Desarrollo Motor del niño************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingmotor">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedmotor" aria-expanded="true" aria-controls="collapsedmotor">
                                                            <h5 class="mb-0">Desarrollo Motor</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsedmotor" class="collapse" role="tabpanel" aria-labelledby="headingmotor">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row" id="dllonutricional">
    
                                  
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Control de Cabeza</label>
                                                                            <select name='controlcabeza' id='controlcabeza' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadcontrolcabeza' id='edadcontrolcabeza' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Se sent&oacute;</label>
                                                                            <select name='sento' id='sento' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadsento' id='edadsento' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Gate&oacute;</label>
                                                                            <select name='gateo' id='gateo' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadgateo' id='edadgateo' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Camin&oacute;</label>
                                                                            <select name='camino' id='camino' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadcamino' id='edadcamino' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Preferencia manual</label>
                                                                            <select name='prefmanual' id='prefmanual' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadprefmanual' id='edadprefmanual' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Equilibrio</label>
                                                                            <select name='equilibrio' id='equilibrio' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadequilibrio' id='edadequilibrio' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Motricidad fina</label>
                                                                            <select name='motfina' id='motfina' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadmotfina' id='edadmotfina' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Motricidad gruesa</label>
                                                                            <select name='motgruesa' id='motgruesa' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                                
                                                                 <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadmotgruesa' id='edadmotgruesa' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>    
                                                                 
                                                                <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input name='obsrmotor' id='obsrmotor' type="text" class="form-control" >
                                                                        </div>
                                                                </div> 
                                                                 
                                                            </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- ***********************************************Card Comportamiento************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingcomportamiento">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedcomportamiento" aria-expanded="true" aria-controls="collapsedcomportamiento">
                                                            <h5 class="mb-0">Comportamiento</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsedcomportamiento" class="collapse" role="tabpanel" aria-labelledby="headingcomportamiento">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <h5 class="mb-0"><label>H&aacute;bitos</label></h5>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Succi&oacute;n digital</label>
                                                                            <select name='succiondigital' id='succiondigital' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadsucciondigital' id='edadsucciondigital' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Balanceo</label>
                                                                            <select name='balanceo' id='balanceo' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edad</label>
                                                                            <input name='edadbalanceo' id='edadbalanceo' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Onicofagia</label>
                                                                            <select name='onicofagia' id='onicofagia' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Musarañas</label>
                                                                            <select name='musarana' id='musarana' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                 
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Se golpea</label>
                                                                            <select name='golpea' id='golpea' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Se arranca el cabello</label>
                                                                            <select name='arrancacabello' id='arrancacabello' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="iddesarrollo1" id="iddesarrollo1" type="hidden" class="form-control" >
                                                                            <label>Aleteo</label>
                                                                            <select name='aleteo' id='aleteo' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Otros</label>
                                                                            <input name='otroscomportamientos' id='otroscomportamientos' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                 
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->      
                                                
                                                <!-- ***********************************************Card Impresión sobre el sueño************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingsueño">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedsueño" aria-expanded="true" aria-controls="collapsedsueño">
                                                            <h5 class="mb-0">Impresi&oacute;n sobre el sueño</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsedsueño" class="collapse" role="tabpanel" aria-labelledby="headingsueño">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="tranquilo" id="tranquilo" type="checkbox" value="S">
                                                                            <label>Tranquilo</label>
                                                                        </div>
                                                                    </div> 
                                                                 
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="intranquilo" id="intranquilo" type="checkbox" value="S">
                                                                            <label>Intranquilo</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="insonmio" id="insonmio" type="checkbox" value="S">
                                                                            <label>Insomnio</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="duermesolo" id="duermesolo" type="checkbox" value="S">
                                                                            <label>Duerme solo</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Con quien duerme:</label>
                                                                            <input name='conquienduerme' id='conquienduerme' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input name='obsrsueno' id='obsrsueno' type="text" class="form-control" >
                                                                        </div>
                                                                    </div> 
                                                                 
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->   
                                                
                                                <!-- ***********************************************Card Conducta personal************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingconducta">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedconducta" aria-expanded="true" aria-controls="collapsedconducta">
                                                            <h5 class="mb-0">Conducta personal</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsedconducta" class="collapse" role="tabpanel" aria-labelledby="headingconducta">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="inquieto" id="inquieto" type="checkbox" value="S">
                                                                            <label>Inquieto</label>
                                                                        </div>
                                                                    </div> 
                                                                 
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="pasivo" id="pasivo" type="checkbox" value="S">
                                                                            <label>Pasivo</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="distraido" id="distraido" type="checkbox" value="S">
                                                                            <label>Distra&iacute;do</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="impulsivo" id="impulsivo" type="checkbox" value="S">
                                                                            <label>Impulsivo</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="sociable" id="sociable" type="checkbox" value="S">
                                                                            <label>Sociable</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="destructor" id="destructor" type="checkbox" value="S">
                                                                            <label>Destructor</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="peleador" id="peleador" type="checkbox" value="S">
                                                                            <label>Peleador</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="desatento" id="desatento" type="checkbox" value="S">
                                                                            <label>Desatento</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="timido" id="timido" type="checkbox" value="S">
                                                                            <label>T&iacute;mido</label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input name="independiente" id="independiente" type="checkbox" value="S">
                                                                            <label>Independiente</label>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Estado de &aacute;nimo m&aacute;s com&uacute;n:</label>
                                                                            <input name='estanimocomun' id='estanimocomun' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                              
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Fobias:</label>
                                                                            <input name='fobias' id='fobias' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Juego preferido:</label>
                                                                            <input name='juegopreferido' id='juegopreferido' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Personas preferidas:</label>
                                                                            <input name='personaspreferidas' id='personaspreferidas' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Hace amigos f&aacute;cilmete</label>
                                                                            <select name='amigosfacil' id='amigosfacil' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>    
                                                                
                                                                
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Comparte el juego</label>
                                                                            <select name='compartejuego' id='compartejuego' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Fatigabilidad:</label>
                                                                            <input name='fatigabilidad' id='fatigabilidad' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Conducta sexual:</label>
                                                                            <input name='conductasexual' id='conductasexual' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input name='obsrconducta' id='obsrconducta' type="text" class="form-control" >
                                                                        </div>
                                                                    </div> 
                                                                 
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card --> 
                                                
                                                <!-- ***********************************************Card Tratamientos realizados************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingtratamientos">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedtratamientos" aria-expanded="true" aria-controls="collapsedtratamientos">
                                                            <h5 class="mb-0">Tratamientos realizados</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsedtratamientos" class="collapse" role="tabpanel" aria-labelledby="headingtratamientos">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                      
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Neurolog&iacute;a</label>
                                                                            <select name='neurologia' id='neurologia' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                                <option value='NA'>N/A</option>
                                                                            </select>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Tiempo</label>
                                                                            <input name='tiemponeurologia' id='tiemponeurologia' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input name='obsrneurologia' id='obsrneurologia' type="text" class="form-control" >
                                                                        </div>
                                                                    </div> 
                                                                
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Fonoaudiolog&iacute;a</label>
                                                                            <select name='fonoaudiologia' id='fonoaudiologia' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                                <option value='NA'>N/A</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Tiempo</label>
                                                                            <input name='tiempofonoaudiologia' id='tiempofonoaudiologia' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input name='obsrfonoaudiologia' id='obsrfonoaudiologia' type="text" class="form-control" >
                                                                        </div>
                                                                    </div> 
                                                                    
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Terapia ocupacional</label>
                                                                            <select name='teo' id='teo' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                                <option value='NA'>N/A</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Tiempo</label>
                                                                            <input name='tiempoteo' id='tiempoteo' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input name='obsrteo' id='obsrteo' type="text" class="form-control" >
                                                                        </div>
                                                                    </div> 
                                                                    
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Fisioterapia</label>
                                                                            <select name='fisioterapia' id='fisioterapia' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                                <option value='NA'>N/A</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Tiempo</label>
                                                                            <input name='tiempofisioterapia' id='tiempofisioterapia' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input name='obsrfisioterapia' id='obsrfisioterapia' type="text" class="form-control" >
                                                                        </div>
                                                                    </div> 
                                                                    
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Psicolog&iacute;a</label>
                                                                            <select name='psico' id='psico' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                                <option value='NA'>N/A</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Tiempo</label>
                                                                            <input name='tiempopsico' id='tiempopsico' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input name='obsrpsico' id='obsrpsico' type="text" class="form-control" >
                                                                        </div>
                                                                    </div> 
                                                                    
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Farmacol&oacute;gicos</label>
                                                                            <select name='farmacologio' id='farmacologio' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                                <option value='NA'>N/A</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Tiempo</label>
                                                                            <input name='tiempofarmacologio' id='tiempofarmacologio' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input name='obsrfarmacologio' id='obsrfarmacologio' type="text" class="form-control" >
                                                                        </div>
                                                                    </div> 
                                                                    
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Cuidados especiales</label>
                                                                            <select name='cuidadosesp' id='cuidadosesp' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                                <option value='NA'>N/A</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Tiempo</label>
                                                                            <input name='tiempocuidadosesp' id='tiempocuidadosesp' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <input name='obsrcuidadosesp' id='obsrcuidadosesp' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Otros</label>
                                                                            <input name='otrostratamieto' id='otrostratamieto' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                 
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                    
                                                    <div class='col-md-12'>
                                                        <div class="button-form">
                                                            <button type="submit" class="btn btn-primary" data-toggle="modal" style='float:right;'>Guardar</button>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </form>
                                        </div> <!--fin tab dllolenguaje-->
                                        
                                        
                                        <!-- ********************** TAB PANEL INFORMACION ESCOLAR **********************-->
                                        <div role="tabpanel" class="tab-pane fade" id="infoescolar">
                                            <form id="formHistEscolar" role="form" method='post'  action='' name='datos'>
                                            
                                                <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                                <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                                <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">  
                                  
                                                  <!-- ***********************************************Card Historia Escolar************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingEscolar">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEscolar" aria-controls="collapseEscolar">
                                                            <h5 class="mb-0">Historia Escolar</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseEscolar" class="collapse show" role="tabpanel" aria-labelledby="headingEscolar">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    
                                                                    <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label>Sin escolaridad</label>
                                                                                <select name='escolaridad' id='escolaridad' class="form-control">
                                                                                    <option>Seleccione</option>
                                                                                    <option value='S'>Si</option>
                                                                                    <option value='N'>No</option>
                                                                                </select>
                                                                            </div>
                                                                    </div>
    
                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            <label>Motivo</label>
                                                                            <input name='motivoEsc' id='motivoEsc' type="text" class="form-control" placeholder="Motivo">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Edad y nivel de inicio:</label>
                                                                            <input name='edadnivelinicio' id='edadnivelinicio' type="text" class="form-control" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Niveles de repitencia:</label>
                                                                            <input name='nivelesrepitencia' id='nivelesrepitencia' type="text" class="form-control" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Cu&aacute;les?</label>
                                                                            <input name='cualesniveles' id='cualesniveles' type="text" class="form-control" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>&Aacute;reas de dificultad</label>
                                                                            <input name='areasdificultad' id='areasdificultad' type="text" class="form-control" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Aptitudes y habilidades destacadas:</label>
                                                                            <input name='aptitudhabilidadesdest' id='aptitudhabilidadesdest' type="text" class="form-control" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Proceso adaptador:</label>
                                                                            <input name='procesoadaptador' id='procesoadaptador' type="text" class="form-control" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Actitud frente al ambiente escolar:</label>
                                                                            <input name='actitudfrenteambesc' id='actitudfrenteambesc' type="text" class="form-control" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Apoyo familiar:</label>
                                                                            <input name='apoyofamiliar' id='apoyofamiliar' type="text" class="form-control" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>OBSERVACIONES GENERALES</label>
                                                                            <input name='observacinoesgen' id='observacinoesgen' type="text" class="form-control" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                               
                                                    <br>
                                                    <div class='col-md-12'>
                                                        <div class="button-form">
                                                            <button type="submit" class="btn btn-primary" data-toggle="modal" style='float:right;'>Guardar</button>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            
                                            </form>    
                                        </div> <!-- FIN TAB-->
                                      
                                        <!-- ********************** TAB PANEL ALIMENTACION **********************-->
                                        <div role="tabpanel" class="w-100 tab-pane fade" id="tabalimentacion">
                                            <form id="formAlimentacion" role="form" method='post'  action='' name='datos'>
                                            
                                            <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                            <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                            <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
                                            <input name="idhistoriapsico" id="" type="hidden" class="idhistoriapsico form-control" >
                                            
                                            
                                        <!-- ***********************************************Card Independencia y autonomia************************************************************************* -->
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingIndependencia">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseIndependencia" aria-expanded="true" aria-controls="collapseIndependencia">
                                                        <h5 class="mb-0">Independencia y autonom&iacute;a</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseIndependencia" class="collapse show" role="tabpanel" aria-labelledby="headingIndependencia">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>En alimentaci&oacute;n necesita ayuda, Qu&eacute; tipo de ayuda?</label>
                                                                        <select name='alimentacionayuda' id='alimentacionayuda' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Semi-Independiente</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Qu&eacute; aditamento utiliza para la ingesta?</label>
                                                                    </div>
                                                                </div>
                                                             </div>
                                                            <div class="row">
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo2" id="iddesarrollo2" type="hidden" class="form-control" >
                                                                        <label>Cuchara</label>
                                                                        <select readonly='readonly' name='cuchara' id='cuchara' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Semi-Independiente</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Tenedor</label>
                                                                        <select readonly='readonly' name='tenedor' id='tenedor' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Semi-Independiente</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Cuchillo</label>
                                                                        <select readonly='readonly' name='cuchillo' id='cuchillo' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Semi-Independiente</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Vaso</label>
                                                                        <select readonly='readonly' name='vaso' id='vaso' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Semi-Independiente</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Pitillo</label>
                                                                        <select readonly='readonly' name='pitillo' id='pitillo' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Semi-Independiente</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Presenta dificultad en la alimentaci&oacute;n?</label>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="row">
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo3" id="iddesarrollo3" type="hidden" class="form-control" >
                                                                        <label>Usa las manos?</label>
                                                                        <select readonly='readonly' name='cogerla' id='cogerla' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Coge?</label>
                                                                        <select readonly='readonly' name='robarla' id='robarla' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Derramar por comisuras?</label>
                                                                        <select readonly='readonly' name='derramar' id='derramar' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo3" id="iddesarrollo3" type="hidden" class="form-control" >
                                                                        <label>Decide que alimentos desea consumir?</label>
                                                                        <select name='decidealimentos' id='decidealimentos' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Si</option>
                                                                            <option value='2'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card Eficiencia************************************************************************* -->

                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingEficiencia">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseEficiencia" aria-expanded="true" aria-controls="collapseEficiencia">
                                                        <h5 class="mb-0">Eficiencia</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseEficiencia" class="collapse show" role="tabpanel" aria-labelledby="headingEficiencia">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Qu&eacute; tipo de consistencia consume?</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">    
                                                                
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input name="solido" id="solido" type="checkbox" value="S">
                                                                        <label>S&oacute;lido</label>
                                                                    </div>
                                                                </div>    
                                                                
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input name="semisolido" id="semisolido" type="checkbox" value="S">
                                                                        <label>Semis&oacute;lido</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input name="pure" id="pure" type="checkbox" value="S">
                                                                        <label>Pure</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input name="compota" id="compota" type="checkbox" value="S">
                                                                        <label>Compota</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo3" id="iddesarrollo3" type="hidden" class="form-control" >
                                                                        <label>Ha presentado p&eacute;rdidas importantes de peso en el &uacute;ltimo tiempo?</label>
                                                                        <select name='perdidapeso' id='perdidapeso' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Cu&aacute;ntos kilos?</label>
                                                                        <input name="cuantoskilos" id="cuantoskilos" type="text" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo3" id="iddesarrollo3" type="hidden" class="form-control" >
                                                                        <label>Manifiesta inter&eacute;s por alimentarse?</label>
                                                                        <select name='interesalimentarse' id='interesalimentarse' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo3" id="iddesarrollo3" type="hidden" class="form-control" >
                                                                        <label>Manifiesta rechazo o preferencia por alg&uacute;n tipo de alimento?</label>
                                                                        <select name='rechazoalimento' id='rechazoalimento' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label>Cu&aacute;l?</label>
                                                                        <input name="cualalimento" id="cualalimento" type="text" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Qu&eacute; tipo de l&iacute;quidos consume habitualmente?</label>
                                                                    </div>
                                                                </div>
                                                              
                                                                
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <input name="liquidoclaro" id="liquidoclaro" type="checkbox" value="S">
                                                                        <label>l&iacute;quido claro</label>
                                                                    </div>
                                                                </div>    
                                                                
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <input name="liquidoespeso" id="liquidoespeso" type="checkbox" value="S">
                                                                        <label>l&iacute;quido espeso</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo3" id="iddesarrollo3" type="hidden" class="form-control" >
                                                                        <label>Cree usted que come muy r&aacute;pido?</label>
                                                                        <select name='comerapido' id='comerapido' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo3" id="iddesarrollo3" type="hidden" class="form-control" >
                                                                        <label>Suele realizar alguna otra actividad mientras come?</label>
                                                                        <select name='actividadcome' id='actividadcome' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Cu&aacute;l(es)?</label>
                                                                        <input name="cualactividad" id="cualactividad" type="text" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card Seguridad************************************************************************* -->
                                            
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingSeguridad">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeguridad" aria-expanded="true" aria-controls="collapseSeguridad">
                                                        <h5 class="mb-0">Seguridad</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseSeguridad" class="collapse show" role="tabpanel" aria-labelledby="headingSeguridad">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                
                                                            <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Presenta broncoaspiraci&oacute;n durante la ingesta?</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">    
                                                                
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input name="saliva" id="saliva" type="checkbox" value="S">
                                                                        <label>Saliva</label>
                                                                    </div>
                                                                </div>    
                                                                
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input name="alimento" id="alimento" type="checkbox" value="S">
                                                                        <label>Alimento</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input name="agua" id="agua" type="checkbox" value="S">
                                                                        <label>Agua</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>OBSERVACI&Oacute;N: Con qu&eacute;? alimentos / l&iacute;quidos / medicamentos</label>
                                                                        <input name="observaciones" id="observaciones" type="text" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo3" id="iddesarrollo3" type="hidden" class="form-control" >
                                                                        <label>Ha presentado neumon&iacute;as?</label>
                                                                        <select name='neumonias' id='neumonias' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label>Con qu&eacute; frecuencia?</label>
                                                                        <input name="neumoniasfrec" id="neumoniasfrec" type="text" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo3" id="iddesarrollo3" type="hidden" class="form-control" >
                                                                        <label>Ha necesitado utilizar alguna ayuda para la alimentaci&oacute;n parenteral?</label>
                                                                        <select name='ayudaparental' id='ayudaparental' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label>Motivo</label>
                                                                        <input name="motivoayudaparental" id="motivoayudaparental" type="text" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo3" id="iddesarrollo3" type="hidden" class="form-control" >
                                                                        <label>Cu&aacute;l?</label>
                                                                        <select name='cualayudaparental' id='cualayudaparental' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Sonda nasogr&aacute;strica</option>
                                                                            <option value='2'>Gastrostom&iacute;a endosc&oacute;pica percut&aacute;nea</option>
                                                                            <option value='3'>Sonda nasoyeyunal</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label>Durante cu&aacute;nto tiempo</label>
                                                                        <input name="tiempoayudaparental" id="tiempoayudaparental" type="text" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                           
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card Aspectos comunicativos y sociales************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingAspectos">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseAspectos" aria-expanded="true" aria-controls="collapseAspectos">
                                                        <h5 class="mb-0">Aspectos comunicativos y sociales</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseAspectos" class="collapse show" role="tabpanel" aria-labelledby="headingAspectos">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo3" id="iddesarrollo3" type="hidden" class="form-control" >
                                                                        <label>Come habitualmente con el resto de su familia?</label>
                                                                        <select name='comerestofamilia' id='comerestofamilia' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label>Por qu&eacute;?</label>
                                                                        <input name="porquecomerestofamilia" id="porquecomerestofamilia" type="text" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo3" id="iddesarrollo3" type="hidden" class="form-control" >
                                                                        <label>Come habitualmente con otras personas adem&aacute;s de su familia?</label>
                                                                        <select name='comeotraspersonas' id='comeotraspersonas' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>OBSERVACI&Oacute;N:</label>
                                                                        <input name="obsrcomunicativos" id="obsrcomunicativos" type="text" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                                <br>
                                                <hr>
                                                <div class='col-md-12'>
                                                    <div class="button-form">
                                                        <button type="submit" class="btn btn-primary" data-toggle="modal" style='float:right;'>Guardar</button>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                            
                                            </form>  
                                        </div>
                                        
                                        <!-- ********************** TAB PANEL INFORMACION IMPRESION DIAGNOSTICA **********************-->
                                        <div role="tabpanel" class="tab-pane fade" id="impDiagnostica">
                                            <form id="formImpDiagnostica" role="form" method='post'  action='' name='datos'>
                                            
                                                <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                                <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                                <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">  
                                                <input name="idhistoriapsico" id="" type="hidden" class="idhistoriapsico form-control" >
                                  
                                                  <!-- ***********************************************Card IMPRESION DIAGNOSTICAr************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingImpDiagnostica">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedImpDiagnostica" aria-controls="collapsedImpDiagnostica">
                                                            <h5 class="mb-0">Impresi&oacute;n diagn&oacute;stica</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsedImpDiagnostica" class="collapse show" role="tabpanel" aria-labelledby="headingImpDiagnostica">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    
                                                                    <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Impresi&oacute;n diagn&oacute;stica</label>
                                                                                <textarea class="form-control" rows="3" name="impresiondiagnostica" id="impresiondiagnostica"></textarea>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                               
                                                    <br>
                                                    <div class='col-md-12'>
                                                        <div class="button-form">
                                                            <button type="submit" class="btn btn-primary" data-toggle="modal" style='float:right;'>Guardar</button>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            
                                            </form>    
                                        </div> <!-- FIN TAB-->
                                        
                                        
                                        <!-- ********************** TAB PANEL TRATAMIENTOS **********************
                                        <div role="tabpanel" class="tab-pane fade" id="tratamientos">
                                          
                                          
                                        </div>-->
                                        
                                    </div>
                                </div><!-- col-md-12-->
                            </div><!-- row -->
                        </div><!-- /.container-fluid --> 
                    </div><!-- .stat-boxes -->
                </div> <!-- .container-inner -->                                                         
            </div><!-- .content-container -->                                                            
        </div><!-- .page-container -->
        
        <?php
            include("../modal/modal_AddConstitucion.php");
            include("../modal/modal_AddTratamientos.php");
            include("../modal/modal_exito.php");
            include("../modal/modal_error.php");
        ?>
        
        
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/datatables/jquery.dataTables.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
        
        <script src="../js/sb-admin.min.js"></script>
        <script src="../js/sb-admin-datatables.min.js"></script>
        <script src="../js/funciones_historia_fono.js"></script>
        <script src="../js/calculaEdad.js"></script>
        <script type"javascript">
            
            var idpaciente      = document.getElementById("idpaciente").value;
            var idcita          = document.getElementById("idcita").value;
            var idhistoria      = document.getElementById("idhist").value;
            var idtipocita      = 2;
            
            if(idcita != "" && idtipocita == 2){
                editarCitaInformacion(idpaciente, idcita, idtipocita);
            }
            
            cargarDatos();
            cargaDatosGenerales(idpaciente,idhistoria);2
            cargarConstitucion(idpaciente,"informe");
            cargarHistoriaPsicoId(idpaciente);
            
            //tab consulta
            cargaMotivo(idpaciente,idhistoria);
            cargaNroHnos(idpaciente,idhistoria);
            cargaAnteFamFono(2,idhistoria);
            cargaVivienda(idpaciente,idhistoria);
            cargaAntePreFono(3,idhistoria);
            cargaAntParto(idpaciente);
            cargaAntPrenatal(idpaciente);
            cargaAntePerFono(4,idhistoria);
            cargaAntePosFono(5,idhistoria);
            
            cargaDllolenguaje(idpaciente);
            cargaDlloLeng(idpaciente);
            cargaDlloLeng4(4,idhistoria);
            cargaDlloLeng9(9,idhistoria);
            cargaDlloLeng91(9,idhistoria);
            cargaDlloLeng10(11,idhistoria);
            cargaDlloLeng11(11,idhistoria);
            cargaDlloObsr11(11,idhistoria);
            cargaDlloLeng12(12,idhistoria);
            cargaDlloObsr12(12,idhistoria);
            cargaDlloLeng13(13,idhistoria);
            cargaDlloLeng14(14,idhistoria);
            cargaDlloLeng15(15,idhistoria);
            cargaDlloLeng16(15,idhistoria);
            
            cargaInfEsc(idpaciente, idhistoria);
            
            cargaAlimEfi(idpaciente,idhistoria);
            cargaAlimEfi2(idpaciente,idhistoria);
            cargaAlimEfi3(idpaciente,idhistoria);
            cargaAlimEfi4(idpaciente,idhistoria);
            cargaAlimEfi5(idpaciente,idhistoria);
            cargaAlimEfi6(idpaciente,idhistoria);
            cargaAlimEfi7(idpaciente,idhistoria);
            cargaAlimEfi8(idpaciente,idhistoria);
            cargaAlimEfi9(idpaciente,idhistoria);
            cargaAlimEfi10(idpaciente,idhistoria);
            cargaAlimEfi11(idpaciente,idhistoria);
            cargaAyudaPar12(idpaciente,idhistoria);
            cargaAlimEfi13(idpaciente,idhistoria);
            cargaAlimEfi14(idpaciente,idhistoria);
            
            cargaImpresionDiag(3,idhistoria);
            
            //datos generales psicologia
            cargaDiagnosticoPrevio(idpaciente,idhistoria);
            cargaAnteDif(idpaciente,idhistoria);
            cargarTratamientos(idhistoria);
            cargaAntFamiliar(idpaciente,idhistoria);
            cargaEleAlim(idpaciente);
            cargaDifComida(idpaciente);

            $("#drogadiccion").on("click", function(){
                if($("#drogadiccion:checked").val() != null ){
                    $("#drogadiccion").val('S');
                }else{
                    $("#drogadiccion").val('N');
                }
            });
            
            $("#alcoholismo").on("click", function(){
                if($("#alcoholismo:checked").val() != null ){
                    $("#alcoholismo").val('S');
                }else{
                    $("#alcoholismo").val('N');
                }
            });
            
            $("#tabaquismo").on("click", function(){
                if($("#tabaquismo:checked").val() != null ){
                    $("#tabaquismo").val('S');
                }else{
                    $("#tabaquismo").val('N');
                }
            });
            
            $("#succion").on("click", function(){
                if($("#succion:checked").val() != null ){
                    $("#succion").val('S');
                }else{
                    $("#succion").val('N');
                }
            });
            
            $("#deglucion").on("click", function(){
                if($("#deglucion:checked").val() != null ){
                    $("#deglucion").val('S');
                }else{
                    $("#deglucion").val('N');
                }
            });
            
            $("#sialorrea").on("click", function(){
                if($("#sialorrea:checked").val() != null ){
                    $("#sialorrea").val('S');
                }else{
                    $("#sialorrea").val('N');
                }
            });
            
            $("#apariciondientes").on("click", function(){
                if($("#apariciondientes:checked").val() != null ){
                    $("#apariciondientes").val('S');
                }else{
                    $("#apariciondientes").val('N');
                }
            });
            
            $("#masticacion").on("click", function(){
                if($("#masticacion:checked").val() != null ){
                    $("#masticacion").val('S');
                }else{
                    $("#masticacion").val('N');
                }
            });
            
            $("#liquidos").on("click", function(){
                if($("#liquidos:checked").val() != null ){
                    $("#liquidos").val('S');
                }else{
                    $("#liquidos").val('N');
                }
            });
            
            $("#semisolidos").on("click", function(){
                if($("#semisolidos:checked").val() != null ){
                    $("#semisolidos").val('S');
                }else{
                    $("#semisolidos").val('N');
                }
            });
            
            $("#solidos").on("click", function(){
                if($("#solidos:checked").val() != null ){
                    $("#solidos").val('S');
                }else{
                    $("#solidos").val('N');
                }
            });
            
            $("#balanceado").on("click", function(){
                if($("#balanceado:checked").val() != null ){
                    $("#balanceado").val('S');
                }else{
                    $("#balanceado").val('N');
                }
            });
            
            $("#diurno").on("click", function(){
                if($("#diurno:checked").val() != null ){
                    $("#diurno").val('S');
                }else{
                    $("#diurno").val('N');
                }
            });
            
            $("#comesolo").on("click", function(){
                if($("#comesolo:checked").val() != null ){
                    $("#comesolo").val('S');
                }else{
                    $("#comesolo").val('N');
                }
            });
            
            $("#nocturno").on("click", function(){
                if($("#nocturno:checked").val() != null ){
                    $("#nocturno").val('S');
                }else{
                    $("#nocturno").val('N');
                }
            });
            
            $("#enuresis").on("click", function(){
                if($("#enuresis:checked").val() != null ){
                    $("#enuresis").val('S');
                }else{
                    $("#enuresis").val('N');
                }
            });
            
            $("#encopresis").on("click", function(){
                if($("#encopresis:checked").val() != null ){
                    $("#encopresis").val('S');
                }else{
                    $("#encopresis").val('N');
                }
            });
            
            $("#tranquilo").on("click", function(){
                if($("#tranquilo:checked").val() != null ){
                    $("#tranquilo").val('S');
                }else{
                    $("#tranquilo").val('N');
                }
            });
            
            $("#intranquilo").on("click", function(){
                if($("#intranquilo:checked").val() != null ){
                    $("#intranquilo").val('S');
                }else{
                    $("#intranquilo").val('N');
                }
            });
            
            $("#insonmio").on("click", function(){
                if($("#insonmio:checked").val() != null ){
                    $("#insonmio").val('S');
                }else{
                    $("#insonmio").val('N');
                }
            });
            
            
            $("#duermesolo").on("click", function(){
                if($("#duermesolo:checked").val() != null ){
                    $("#duermesolo").val('S');
                }else{
                    $("#duermesolo").val('N');
                }
            });
            
            /////////
            
            $("#inquieto").on("click", function(){
                if($("#inquieto:checked").val() != null ){
                    $("#inquieto").val('S');
                }else{
                    $("#inquieto").val('N');
                }
            });
            
            $("#pasivo").on("click", function(){
                if($("#pasivo:checked").val() != null ){
                    $("#pasivo").val('S');
                }else{
                    $("#pasivo").val('N');
                }
            });
            
            $("#distraido").on("click", function(){
                if($("#distraido:checked").val() != null ){
                    $("#distraido").val('S');
                }else{
                    $("#distraido").val('N');
                }
            });
            
            $("#impulsivo").on("click", function(){
                if($("#impulsivo:checked").val() != null ){
                    $("#impulsivo").val('S');
                }else{
                    $("#impulsivo").val('N');
                }
            });
            
            $("#sociable").on("click", function(){
                if($("#sociable:checked").val() != null ){
                    $("#sociable").val('S');
                }else{
                    $("#sociable").val('N');
                }
            });
            
            $("#destructor").on("click", function(){
                if($("#destructor:checked").val() != null ){
                    $("#destructor").val('S');
                }else{
                    $("#destructor").val('N');
                }
            });
            
            $("#peleador").on("click", function(){
                if($("#peleador:checked").val() != null ){
                    $("#peleador").val('S');
                }else{
                    $("#peleador").val('N');
                }
            });
            
            $("#desatento").on("click", function(){
                if($("#desatento:checked").val() != null ){
                    $("#desatento").val('S');
                }else{
                    $("#desatento").val('N');
                }
            });
            
            $("#timido").on("click", function(){
                if($("#timido:checked").val() != null ){
                    $("#timido").val('S');
                }else{
                    $("#timido").val('N');
                }
            });
            
            $("#independiente").on("click", function(){
                if($("#independiente:checked").val() != null ){
                    $("#independiente").val('S');
                }else{
                    $("#independiente").val('N');
                }
            });
            
            /////////////
            
            $("#solido").on("click", function(){
                if($("#solido:checked").val() != null ){
                    $("#solido").val('S');
                }else{
                    $("#solido").val('N');
                }
            });
            
            $("#semisolido").on("click", function(){
                if($("#semisolido:checked").val() != null ){
                    $("#semisolido").val('S');
                }else{
                    $("#semisolido").val('N');
                }
            });
            
            $("#pure").on("click", function(){
                if($("#pure:checked").val() != null ){
                    $("#pure").val('S');
                }else{
                    $("#pure").val('N');
                }
            });
            
            $("#compota").on("click", function(){
                if($("#compota:checked").val() != null ){
                    $("#compota").val('S');
                }else{
                    $("#compota").val('N');
                }
            });
            
            ////////
            
            $("#liquidoclaro").on("click", function(){
                if($("#liquidoclaro:checked").val() != null ){
                    $("#liquidoclaro").val('S');
                }else{
                    $("#liquidoclaro").val('N');
                }
            });
            
            $("#liquidoespeso").on("click", function(){
                if($("#liquidoespeso:checked").val() != null ){
                    $("#liquidoespeso").val('S');
                }else{
                    $("#liquidoespeso").val('N');
                }
            });
            
            ///////
            $("#saliva").on("click", function(){
                if($("#saliva:checked").val() != null ){
                    $("#saliva").val('S');
                }else{
                    $("#saliva").val('N');
                }
            });
            
            $("#alimento").on("click", function(){
                if($("#alimento:checked").val() != null ){
                    $("#alimento").val('S');
                }else{
                    $("#alimento").val('N');
                }
            });
            
            $("#agua").on("click", function(){
                if($("#agua:checked").val() != null ){
                    $("#agua").val('S');
                }else{
                    $("#agua").val('N');
                }
            });
            
        </script>
        
    </body>
</html>