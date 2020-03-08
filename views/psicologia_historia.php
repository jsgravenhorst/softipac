<?php   
    include('../directiva.php');
    $idpaciente     = $_GET['var'];
    $idcita         = $_GET['cita'];
    $idhist         = $_GET['idhist'];
    $idarea         = $_GET['idarea'];
    $verBoton       = false;

?>

<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
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
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item active">
                                            <a class="nav-link active" href="#identificacion" role="tab" data-toggle="tab">DATOS GENERALES</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#consulta" role="tab" data-toggle="tab">CONSULTA</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#antecedentes" role="tab" data-toggle="tab">ANTECEDENTES</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#postnatales" role="tab" data-toggle="tab">POSTNATALES</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#dllolenguaje" role="tab" data-toggle="tab">DESARROLLO LENGUAJE</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#dlloemocional" role="tab" data-toggle="tab">DESARROLLO SOCIO-EMOCIONAL</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#responsividad" role="tab" data-toggle="tab">RESPUESTA SENSORIAL</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#desempenoActual" role="tab" data-toggle="tab">DESEMPE&Ntilde;O ACTUAL</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#habilidades" role="tab" data-toggle="tab">HABILIDADES ESPECIALES</a>
                                        </li>
                                    </ul>
                                    
                                    <!-- ********************** TAB PANEL IDENTIFICACION ********************** -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="identificacion">
                                            <form id="formDatosGrales" role="form" method='post'  action='' name='datos'>
                                            
                                                <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                                <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                                <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">

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
                                                                    <!-- **************************************************Datos  Eps Paciente**************************************************************** -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>EPS* (Particular sino se suministra)</label>
                                                                            <input name='pacienteEps' id='pacienteEps' type="text" class="form-control" readonly="true" placeholder="Ingrese el Nombre de la EPS">
                                                                            <!--<select name="pacienteIdEps" id="pacienteIdEps" class="form-control">
                                                                                <option>Seleccione</option>
                                                                            </select>-->
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
                                                                            <label>Nombres Madre</label>
                                                                            <input name='madreNombres' id='madreNombres' type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Primer apellido</label>
                                                                            <input name='madrePrimerApellido' id='madrePrimerApellido' type="text" class="form-control" placeholder="Digite el Primer Apellido" >
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
                                                                            <label>Edad</label>
                                                                            <input name='madreEdad' id='madreEdad' type="number" class="form-control" placeholder="Digite la Edad">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <!-- **************************************************Datos  Escolaridad Madre**************************************************************** -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Escolaridad</label>
                                                                            <input name='madreIdEscolaridad' id='madreIdEscolaridad'  class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <!-- **************************************************Datos Ocupacion Madre**************************************************************** -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Ocupaci&oacute;n</label>
                                                                            <input name='madreOcupacion' id='madreOcupacion' type="text" class="form-control" placeholder="Digite la Ocuaci&oacute;n">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Celular</label>
                                                                            <input name='madreTelefonoCelular' id='madreTelefonoCelular' type="text" class="form-control" placeholder="Digite el Celular" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Tel&eacute;fono Fijo</label>
                                                                            <input name='madreTelefonoFijo' id='madreTelefonoFijo' type="text" class="form-control" placeholder="Digite el Tel&eacute;fono fijo">
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
                                                                            <label>Nombres Padre</label>
                                                                            <input name='padreNombres' id='padreNombres' type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Primer apellido</label>
                                                                            <input name='padrePrimerApellido' id='padrePrimerApellido' type="text" class="form-control" placeholder="Digite el Primer Apellido" >
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
                                                                            <label>Edad</label>
                                                                            <input name='padreEdad' id='padreEdad' type="number" class="form-control" placeholder="Digite la Edad">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <!-- **************************************************Datos  Escolaridad Padre**************************************************************** -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Escolaridad</label>
                                                                            <input name='padreIdEscolaridad' id='padreIdEscolaridad' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <!-- **************************************************Datos Ocupacion Padre**************************************************************** -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Ocupaci&oacute;n</label>
                                                                            <input name='padreOcupacion' id='padreOcupacion' type="text" class="form-control" placeholder="Digite la Ocuaci&oacute;n" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Celular</label>
                                                                            <input name='padreTelefonoCelular' id='padreTelefonoCelular' type="text" class="form-control" placeholder="Digite el Celular">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Tel&eacute;fono Fijo</label>
                                                                            <input name='padreTelefonoFijo' id='padreTelefonoFijo' type="text" class="form-control" placeholder="Digite el Tel&eacute;fono fijo">
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
                                                                <div class="row" id="constitucion">

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group" style='float:right;'>
                                                                            <label>Otras personas que viven en la casa y su parentesco con el ni&ntilde;o</label>
                                                                            <?php
                                                                                if($verBoton){
                                                                                    echo'<a id="modal_constitucion" href="#modal_AddConstitucion" role="button" class="btn btn-primary btn-sm" data-toggle="modal">Adicionar familiar</a>';
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                    <br>
                                                    <hr>
                                                    <?php
                                                        if($verBoton){
                                                            echo'<div class="col-md-12">
                                                                <div class="button-form">
                                                                    <button type="submit" class="btn btn-primary" data-toggle="modal" style="float:right;">Guardar</button>
                                                                </div>
                                                            </div>';
                                                        }
                                                    ?>
                                                </div><!-- .card -->
                                            </form>    
                                        </div> <!-- FIN TAB-->
                                      
                                      <!-- ********************** TAB PANEL REMISION **********************
                                      <div role="tabpanel" class="tab-pane fade" id="remision">
                                        
                                      </div>-->
                                        <!-- ********************** TAB PANEL CONSULTA **********************-->
                                        <div role="tabpanel" class="w-100 tab-pane fade" id="consulta">
                                            <form id="formConsulta" role="form" method='post'  action='' name='datos'>
                                            
                                            <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                            <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                            <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
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
                                                                        <textarea class="form-control" rows="3" name="motivoConsultaObservacion" id="motivoConsultaObservacion"></textarea>
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
                                                                        <label>Diagn&oacute;sticos anteriores (SI) (NO) &iquest;Cuales? &iquest;Por parte de quien?</label>
                                                                        <textarea name="diagnosticos"  id="diagnosticos" class="form-control" rows="3" placeholder="Digite Diagn&oacute;sticos"></textarea>
                                                                    </div>
                                                                </div>
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
                                                                        <input name="idantecedente" id="idantecedente" type="hidden" class="form-control" >
                                                                        <label>A qu&eacute; edad comenzaron a notar dificultades:   &iquest;Por que?</label>
                                                                        <input name="edadIniDif" id="edadIniDif" type="text" class="form-control" placeholder="Digite edad">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>&iquest;Por que?</label>
                                                                        <textarea class="form-control" rows="2" name="porqueante" id="porqueante"></textarea>
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Otras conductas reportadas</label>
                                                                        <textarea class="form-control" rows="3" name ="otrasConductas" id="otrasConductas"></textarea>
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
                                                            <div class="row" id="tratamientosProblema">
                                                                
                                                            </div>
                                                            
                                                            
                                                            <?php
                                                                if($verBoton){
                                                                    echo'<div class="col-md-12">
                                                                            <div class="form-group" style="float:right;">
                                                                                <a id="modal_tratamientos" href="#modal_AddTratamientos" role="button" class="btn btn-primary btn-sm" data-toggle="modal">Adicionar Tratamientos</a>
                                                                            </div>
                                                                        </div>';
                                                                }
                                                            ?>
                                                            
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                                <br>
                                                <hr>
                                                <?php
                                                    if($verBoton){
                                                        echo'<div class="col-md-12">
                                                            <div class="button-form">
                                                                <button type="submit" class="btn btn-primary" data-toggle="modal" style="float:right;">Guardar</button>
                                                            </div>
                                                        </div>';
                                                    }
                                                ?>
                                            </div><!-- .card -->
                                            
                                            </form>  
                                        </div>
                                        <!-- ********************** TAB PANEL TRATAMIENTOS **********************
                                        <div role="tabpanel" class="tab-pane fade" id="tratamientos">
                                          
                                          
                                        </div>-->
                                        <!-- ********************** TAB PANEL ANTECEDENTES **********************-->
                                        <div role="tabpanel" class="tab-pane fade" id="antecedentes">
                                            <form id="formAntecedentes" role="form" method='post'  action='' name='datos'>
                                            
                                            <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                            <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                            <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
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
                                                                        <input name="idantecedente2" id="idantecedente2" type="hidden" class="form-control" >
                                                                        <label>L&iacute;nea Materna</label>
                                                                        <textarea class="form-control" rows="3" name="lineamaterna" id="lineamaterna"></textarea>
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>L&iacute;nea Paterna</label>
                                                                        <textarea class="form-control" rows="3" name="lineapaterna" id="lineapaterna"></textarea>
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
                                                                        <input name="idantecedente3" id="idantecedente3" type="hidden" class="form-control" >
                                                                        <label>El embarazo fue deseado</label>
                                                                        <select name='embarazodeseado' id='embarazodeseado' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Se tomaron anticonceptivos</label>
                                                                        <select name='anticonceptivos' id='anticonceptivos' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Abortivas</label>
                                                                        <select name='abortivas' id='abortivas' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Adoptado</label>
                                                                        <select name='adoptado' id='adoptado' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Actitud frente al embarazo:</label>
                                                                        <textarea class="form-control" rows="3" name="actitudembarazo" id="actitudembarazo"></textarea>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Existe consanguinidad entre padres</label>
                                                                        <select name='consgpadres' id='consgpadres' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Enfermedades infecciosas</label>
                                                                        <input name='enfinfecciosas' id='enfinfecciosas' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Eruptivas</label>
                                                                        <input name='enferuptivas' id='enferuptivas' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Otros</label>
                                                                        <input name='enfotras' id='enfotras' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Dificultades emocionales</label>
                                                                        <input name='dftcemocionales' id='dftcemocionales' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Tuvo control m&eacute;dico</label>
                                                                        <select name='controlmedico' id='controlmedico' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Rayos X</label>
                                                                        <select name='rayosx' id='rayosx' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Ecograf&iacute;as</label>
                                                                        <input name='ecografias' id='ecografias' type="text" class="form-control" >
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
                                                        <h5 class="mb-0">Parto</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapsePrenatalParto" class="collapse" role="tabpanel" aria-labelledby="headingPrenatalParto">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input name="idantecedente4" id="idantecedente4" type="hidden" class="form-control" >
                                                                        <label>Duraci&oacute;n Embarazo</label>
                                                                        <input name='duracion' id='duracion' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Parto</label>
                                                                        <select name='parto' id='parto' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='N'>Natural</option>
                                                                            <option value='C'>Cesarea</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Inducido</label>
                                                                        <select name='inducido' id='inducido' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Lugar</label>
                                                                        <input name='lugar' id='lugar' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Atendido por:</label>
                                                                        <input name='atendidopor' id='atendidopor' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Dificultades</label>
                                                                        <input name='dificultades' id='dificultades' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Incubadora</label>
                                                                        <input name='incubadora' id='incubadora' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Defectos Cong&eacute;nitos</label>
                                                                        <input name='defectoscong' id='defectoscong' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Talla</label>
                                                                        <input name='talla' id='talla' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Peso</label>
                                                                        <input name='peso' id='peso' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <textarea class="form-control" rows="3" name="observacionesParto" id="observacionesParto"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                                <br>
                                                <hr>
                                                <?php
                                                    if($verBoton){
                                                        echo'<div class="col-md-12">
                                                            <div class="button-form">
                                                                <button type="submit" class="btn btn-primary" data-toggle="modal" style="float:right;">Guardar</button>
                                                            </div>
                                                        </div>';
                                                    }
                                                ?>
                                            </div><!-- .card -->
                                            </form>
                                        </div> <!--fin tab antecedentes-->
                                        <!-- ********************** TAB PANEL ANTECEDENTES **********************-->
                                        <div role="tabpanel" class="tab-pane fade" id="postnatales">
                                            <form id="formPostnatal" role="form" method='post'  action='' name='datos'>
                                            
                                            <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                            <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                            <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">  
                                            <!-- ***********************************************Card antecedentes posnatales************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingPostnatales">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsePostnatales" aria-expanded="true" aria-controls="collapsePostnatales">
                                                        <h5 class="mb-0">Antecedentes postnatales e Historia previa del paciente</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapsePostnatales" class="collapse show" role="tabpanel" aria-labelledby="headingPostnatales">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input name="idantecedente5" id="idantecedente5" type="hidden" class="form-control" >
                                                                        <label>Enfermedades</label>
                                                                        <input name='enfposnatal' id='enfposnatal' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Alergias</label>
                                                                        <input name='alergiasposnatal' id='alergiasposnatal' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Convulsiones</label>
                                                                        <input name='convulsiones' id='convulsiones' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Cardiacos</label>
                                                                        <input name='cardiacos' id='cardiacos' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Respiratorios:</label>
                                                                        <input name='respiratorios' id='respiratorios' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Eruptivas</label>
                                                                        <input name='eruptivaposnatal' id='eruptivaposnatal' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Vacunas</label>
                                                                        <input name='vacunas' id='vacunas' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Electroencefalograma (EEG)</label>
                                                                        <input name='eeg' id='eeg' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Tomografia Axial Computarizada (TAC)</label>
                                                                        <input name='tomoaxcomp' id='tomoaxcomp' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Potenc. Evocados Auditivos</label>
                                                                        <input name='potenevocauditivos' id='potenevocauditivos' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>&iquest;Está en control con Neurolog&iacute;a?</label>
                                                                        <input name='neurologo' id='neurologo' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Otros profesionales</label>
                                                                        <textarea class="form-control" rows="3" name="otrosprofesionales" id="otrosprofesionales"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card historia de desarrollo ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingHistoriaDllo">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseHistoriaDllo" aria-expanded="true" aria-controls="collapseHistoriaDllo">
                                                        <h5 class="mb-0">Historia de Desarrollo</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseHistoriaDllo" class="collapse show" role="tabpanel" aria-labelledby="headingHistoriaDllo">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
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
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Desde</label>
                                                                        <input name='desdeMaterna' id='desdeMaterna' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Hasta</label>
                                                                        <input name='hastaMaterna' id='hastaMaterna' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Tetero</label>
                                                                        <select name='seleccionTetero' id='seleccionTetero' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Desde</label>
                                                                        <input name='desdeTetero' id='desdeTetero' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Hasta</label>
                                                                        <input name='hastaTetero' id='hastaTetero' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Dificultades en general del paciente</label>
                                                                        <input name='difgenpaciente' id='difgenpaciente' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card empleo elementos alimentacion ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingElemAlimentacion">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseElemAlimentacion" aria-expanded="true" aria-controls="collapseElemAlimentacion">
                                                        <h5 class="mb-0">Utilizaci&oacute;n de Utensilios para la Alimentaci&oacute;n</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseElemAlimentacion" class="collapse" role="tabpanel" aria-labelledby="headingElemAlimentacion">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo2" id="iddesarrollo2" type="hidden" class="form-control" >
                                                                        <label>Cuchara</label>
                                                                        <select name='cuchara' id='cuchara' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Ayuda</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Tenedor</label>
                                                                        <select name='tenedor' id='tenedor' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Ayuda</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Cuchillo</label>
                                                                        <select name='cuchillo' id='cuchillo' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Ayuda</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Vaso</label>
                                                                        <select name='vaso' id='vaso' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Ayuda</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Pitillo</label>
                                                                        <select name='pitillo' id='pitillo' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Ayuda</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            <!-- ***********************************************Card empleo dificultades comida ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingDificultadComida">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseDificultadComida" aria-expanded="true" aria-controls="collapseDificultadComida">
                                                        <h5 class="mb-0">Dificultades Comida</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseDificultadComida" class="collapse" role="tabpanel" aria-labelledby="headingDificultadComida">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo3" id="iddesarrollo3" type="hidden" class="form-control" >
                                                                        <label>Cogerla con las manos</label>
                                                                        <select name='cogerla' id='cogerla' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Robarla</label>
                                                                        <select name='robarla' id='robarla' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Derramar / Botarla</label>
                                                                        <select name='derramar' id='derramar' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Sobreselectividad</label>
                                                                        <select name='sobreselectividad' id='sobreselectividad' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='obsrdifcomida' id='obsrdifcomida' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Horarios alimenticios</label>
                                                                        <input name='horario' id='horario' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Lo hace en un lugar espec&iacute;fico</label>
                                                                        <select name='lugarcomida' id='lugarcomida' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>&iquest;Donde?</label>
                                                                        <input name='dondecomida' id='dondecomida' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                                <br>
                                                <hr>
                                                <?php
                                                    if($verBoton){
                                                        echo'<div class="col-md-12">
                                                            <div class="button-form">
                                                                <button type="submit" class="btn btn-primary" data-toggle="modal" style="float:right;">Guardar</button>
                                                            </div>
                                                        </div>';
                                                    }
                                                ?>
                                            </div><!-- .card -->
                                            </form>
                                        </div> <!--fin tab postnateles-->
                                        <!-- ********************** TAB PANEL DESARROLLO DEL LENGUAJE **********************-->
                                        <div role="tabpanel" class="tab-pane fade" id="dllolenguaje">
                                            <form id="formLenguaje" role="form" method='post'  action='' name='datos'>
                                            
                                            <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                            <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                            <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
                                            <!-- ***********************************************Card desarrollo del lenguaje ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingDesarrolloLeng">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseDesarrolloLeng" aria-expanded="true" aria-controls="collapseDesarrolloLeng">
                                                        <h5 class="mb-0">Desarrollo del Lenguaje</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseDesarrolloLeng" class="collapse show" role="tabpanel" aria-labelledby="headingDesarrolloLeng">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo4" id="iddesarrollo4" type="hidden" class="form-control" >
                                                                        <label>Balbuceo</label>
                                                                        <select name='balbuceo' id='balbuceo' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Edad</label>
                                                                        <input name='edadbalbuceo' id='edadbalbuceo' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionbalbuceo' id='observacionbalbuceo' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>1ras Palabras</label>
                                                                        <select name='palabras' id='palabras' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Edad</label>
                                                                        <input name='edadpalabras' id='edadpalabras' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionpalabras' id='observacionpalabras' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>1ra Frases</label>
                                                                        <select name='frases' id='frases' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Edad</label>
                                                                        <input name='edadfrases' id='edadfrases' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionfrases' id='observacionfrases' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>&iquest;C&oacute;mo expresa lo que desea?</label>
                                                                        <input name='expdesea' id='expdesea' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Nombra Objetos</label>
                                                                        <select name='nombraobjetos' id='nombraobjetos' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Claridad al hablar</label>
                                                                        <input name='claridadhablar' id='claridadhablar' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Narra hechos</label>
                                                                        <select name='narrahechos' id='narrahechos' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Se&ntilde;ala Objetos</label>
                                                                        <select name='senalaobjetos' id='senalaobjetos' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Busca objetos</label>
                                                                        <select name='buscaobjetos' id='buscaobjetos' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>1ra Persona</label>
                                                                        <select name='primerapersona' id='primerapersona' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Responde preguntas</label>
                                                                        <select name='respreguntas' id='respreguntas' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Hace preguntas</label>
                                                                        <select name='hacepreguntas' id='hacepreguntas' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Dialoga</label>
                                                                        <select name='dialoga' id='dialoga' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Dificultades</label>
                                                                        <input name='diflenguaje' id='diflenguaje' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card Dificultades de habla ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingDificultaHabla">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseDificultaHabla" aria-expanded="true" aria-controls="collapseDificultaHabla">
                                                        <h5 class="mb-0">Dificultades del habla</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseDificultaHabla" class="collapse show" role="tabpanel" aria-labelledby="headingDificultaHabla">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo5" id="iddesarrollo5" type="hidden" class="form-control" >
                                                                        <label>Ecolalia</label>
                                                                        <select name='ecolalia' id='ecolalia' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='obsrdifhabla' id='obsrdifhabla' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Sonidos</label>
                                                                        <input name='sondifhabla' id='sondifhabla' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Perseveraciones</label>
                                                                        <input name='preservdifhabla' id='preservdifhabla' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Gritos</label>
                                                                        <input name='gritosdifhabla' id='gritosdifhabla' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Tono fingido</label>
                                                                        <input name='tonofindifhabla' id='tonofindifhabla' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            <!-- ***********************************************Card Comunicacion no verbal ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingComunicNoVerbal">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseComunicNoVerbal" aria-expanded="true" aria-controls="collapseComunicNoVerbal">
                                                        <h5 class="mb-0">Comunicaci&oacute;n no Verbal</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseComunicNoVerbal" class="collapse show" role="tabpanel" aria-labelledby="headingComunicNoVerbal">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo6" id="iddesarrollo6" type="hidden" class="form-control" >
                                                                        <label>&iquest;Entiende gestos?</label>
                                                                        <input name='entiendegestos' id='entiendegestos' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>&iquest;Utiliza gestos?</label>
                                                                        <input name='utilizagestos' id='utilizagestos' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>&iquest;Utiliza se&ntilde;alamientos?</label>
                                                                        <input name='utilizasenal' id='utilizasenal' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                                <br>
                                                <hr>
                                                <?php
                                                    if($verBoton){
                                                        echo'<div class="col-md-12">
                                                            <div class="button-form">
                                                                <button type="submit" class="btn btn-primary" data-toggle="modal" style="float:right;">Guardar</button>
                                                            </div>
                                                        </div>';
                                                    }
                                                ?>
                                            </div><!-- .card -->
                                            </form>
                                        </div> <!--fin tab dllolenguaje-->
                                        
                                        <!-- ********************** TAB PANEL DESARROLLO EMOCIONAL **********************-->
                                        <div role="tabpanel" class="tab-pane fade" id="dlloemocional">
                                            <form id="formEmocional" role="form" method='post'  action='' name='datos'>
                                            
                                            <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                            <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                            <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
                                            <!-- ***********************************************Card Desarrollo Emocional  ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingDlloEmocional">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseDlloEmocional" aria-expanded="true" aria-controls="collapseDlloEmocional">
                                                        <h5 class="mb-0">Desarrollo Socio - Emocional</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseDlloEmocional" class="collapse show" role="tabpanel" aria-labelledby="headingDlloEmocional">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo7" id="iddesarrollo7" type="hidden" class="form-control" >
                                                                        <label>1ra Sonrisa</label>
                                                                        <input name='primerasonrisa' id='primerasonrisa' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Levanta brazos</label>
                                                                        <input name='levantabrazos' id='levantabrazos' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Llanto por ausencia</label>
                                                                        <input name='llantoporaus' id='llantoporaus' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Reconoce voces</label>
                                                                        <input name='reconvoces' id='reconvoces' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Otros</label>
                                                                        <input name='otrosemocional' id='otrosemocional' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Contacto visual espont&aacute;neo</label>
                                                                        <input name='contvisualesp' id='contvisualesp' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Contacto ante demanda</label>
                                                                        <input name='contdemanda' id='contdemanda' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Busca que lo consientan familiares</label>
                                                                        <input name='buscaconsfamlia' id='buscaconsfamlia' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Respuesta a emociones</label>
                                                                        <input name='resptaemociones' id='resptaemociones' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Risa sin motivo</label>
                                                                        <input name='risasinmotivo' id='risasinmotivo' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Llanto sin motivo</label>
                                                                        <input name='llantosinmotivo' id='llantosinmotivo' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Interacci&oacute;n con pares</label>
                                                                        <input name='interpares' id='interpares' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Interacci&oacute;n adulto</label>
                                                                        <input name='interadulto' id='interadulto' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Uso de juguetes</label>
                                                                        <input name='usojuguetes' id='usojuguetes' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Juegos</label>
                                                                        <input name='juegos' id='juegos' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Anticipa peligros</label>
                                                                        <input name='anticipapeligros' id='anticipapeligros' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            <!-- ***********************************************Card Resistencia al cambio-apego a objetos/rutinas ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingResistenciaCambio">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseResistenciaCambio" aria-expanded="true" aria-controls="collapseResistenciaCambio">
                                                        <h5 class="mb-0">Resistenca al cambio - apego a Objetos / Rutinas</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseResistenciaCambio" class="collapse show" role="tabpanel" aria-labelledby="headingResistenciaCambio">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input name="iddesarrollo8" id="iddesarrollo8" type="hidden" class="form-control" >
                                                                        <label>&iquest;Le afecta el cambio de horarios?</label>
                                                                        <input name='cambioshorarios' id='cambioshorarios' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>&iquest;Le afecta el cambio rutas?</label>
                                                                        <input name='cambiorutas' id='cambiorutas' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Ubicaci&oacute;n Espacial</label>
                                                                        <input name='ubicacionesp' id='ubicacionesp' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Apego a objetos</label>
                                                                        <input name='apegoobjetos' id='apegoobjetos' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Actividades repetitivas</label>
                                                                        <input name='actvrepetiivas' id='actvrepetiivas' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                                <br>
                                                <hr>
                                                <?php
                                                    if($verBoton){
                                                        echo'<div class="col-md-12">
                                                            <div class="button-form">
                                                                <button type="submit" class="btn btn-primary" data-toggle="modal" style="float:right;">Guardar</button>
                                                            </div>
                                                        </div>';
                                                    }
                                                ?>
                                            </div><!-- .card -->
                                            </form>
                                        </div> <!--fin tab dlloemocional-->
                                        <!-- ********************** TAB PANEL RESPONSIVIDAD SENSORIAL **********************-->
                                        <div role="tabpanel" class="tab-pane fade" id="responsividad">
                                            <form id="formSensorial" role="form" method='post'  action='' name='datos'>
                                            
                                            <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                            <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                            <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
                                            <!-- ***********************************************Card AUDITIVA ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingRespAuditiva">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseRespAuditiva" aria-expanded="true" aria-controls="collapseRespAuditiva">
                                                        <h5 class="mb-0">Auditiva</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseRespAuditiva" class="collapse show" role="tabpanel" aria-labelledby="headingRespAuditiva">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12 card-header">
                                                                    <h5 class="mb-0">Respuesta a est&iacute;mulos</h5>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input name="idrespuestasensorial" id="idrespuestasensorial" type="hidden" class="form-control" >
                                                                        <label>Respuesta al nombre</label>
                                                                        <input name='resptanombre' id='resptanombre' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Respuesta a sonidos</label>
                                                                        <input name='resptasonidos' id='resptasonidos' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Sospecha de sordera</label>
                                                                        <input name='sospechasordera' id='sospechasordera' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Otros</label>
                                                                        <input name='otrossensorial' id='otrossensorial' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 card-header">
                                                                    <h5 class="mb-0">Autoestimulaci&oacute;n / Alteraci&oacute;n</h5>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Sonidos espec&iacute;ficos</label>
                                                                        <input name='sonidosesp' id='sonidosesp' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Sonidos extra&ntilde;os</label>
                                                                        <input name='sonidosext' id='sonidosext' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>&iquest;Se tapa los o&iacute;dos?</label>
                                                                        <input name='tapaoidos' id='tapaoidos' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Golpea Objetos</label>
                                                                        <input name='golpeaobj' id='golpeaobj' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Audici&oacute;n</label>
                                                                        <input name='audicion' id='audicion' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionauditiva' id='observacionauditiva' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            <!-- ***********************************************Card VISUAL ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingRespVisual">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseRespVisual" aria-expanded="true" aria-controls="collapseRespVisual">
                                                        <h5 class="mb-0">Visual</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseRespVisual" class="collapse" role="tabpanel" aria-labelledby="headingRespVisual">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12 card-header">
                                                                    <h5 class="mb-0">Respuesta a est&iacute;mulos</h5>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Orienta mirada</label>
                                                                        <input name='orientamirada' id='orientamirada' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Busca la mirada</label>
                                                                        <input name='buscamirada' id='buscamirada' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 card-header">
                                                                    <h5 class="mb-0">Autoestimulaci&oacute;n / Alteraci&oacute;n</h5>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Gira objetos</label>
                                                                        <input name='giraobjetos' id='giraobjetos' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Mirada perdida</label>
                                                                        <input name='miradaperdida' id='miradaperdida' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Reojo</label>
                                                                        <input name='reojo' id='reojo' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Acerca / Aleja</label>
                                                                        <input name='acercaaleja' id='acercaaleja' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionvisual' id='observacionvisual' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            
                                            <!-- ***********************************************Card RECEPTOR ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingReceptor">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseReceptor" aria-expanded="true" aria-controls="collapseReceptor">
                                                        <h5 class="mb-0">Otros Receptores</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseReceptor" class="collapse" role="tabpanel" aria-labelledby="headingReceptor">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12 card-header">
                                                                    <h5 class="mb-0">Respuesta a est&iacute;mulos</h5>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Olfativo</label>
                                                                        <input name='olfativo' id='olfativo' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Gustativo</label>
                                                                        <input name='gustativo' id='gustativo' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>T&aacute;ctil</label>
                                                                        <input name='tactil' id='tactil' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 card-header">
                                                                    <h5 class="mb-0">Autoestimulaci&oacute;n / Alteraci&oacute;n</h5>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Camina en Puntapi&eacute;s</label>
                                                                        <input name='puntapies' id='puntapies' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Aleteos</label>
                                                                        <input name='aleteos' id='aleteos' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Balanceo</label>
                                                                        <input name='balanceo' id='balanceo' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Juego de Saliva</label>
                                                                        <input name='juegosaliva' id='juegosaliva' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Escupe</label>
                                                                        <input name='escupir' id='escupir' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Movim extra&ntilde;os / repetitivos</label>
                                                                        <input name='mvtoextrept' id='mvtoextrept' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Auto-agresiones</label>
                                                                        <input name='autoagresiones' id='autoagresiones' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            <!-- ***********************************************Card SUEﾃ前 ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingSueno">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSueno" aria-expanded="true" aria-controls="collapseSueno">
                                                        <h5 class="mb-0">Sue&ntilde;o</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseSueno" class="collapse" role="tabpanel" aria-labelledby="headingSueno">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>&iquest;Duerme en cama independiente?</label>
                                                                        <input name='camaindepte' id='camaindepte' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Cuarto independiente</label>
                                                                        <input name='cuartoindepte' id='cuartoindepte' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Justificaci&oacute;n</label>
                                                                        <input name='justificacion' id='justificacion' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Horario de sue&ntilde;o</label>
                                                                        <input name='horariosueno' id='horariosueno' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Dificultades</label>
                                                                        <input name='difisueno' id='difisueno' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                                <br>
                                                <hr>
                                                <?php
                                                    if($verBoton){
                                                        echo'<div class="col-md-12">
                                                            <div class="button-form">
                                                                <button type="submit" class="btn btn-primary" data-toggle="modal" style="float:right;">Guardar</button>
                                                            </div>
                                                        </div>';
                                                    }
                                                ?>
                                            </div><!-- .card -->
                                            </form>
                                        </div> <!--fin tab responsividad-->
                                        <!-- ********************** TAB PANEL DESEMPENO ACTUAL **********************-->
                                        <div role="tabpanel" class="tab-pane fade" id="desempenoActual">
                                            <form id="formDesActual" role="form" method='post'  action='' name='datos'>
                                            
                                            <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                            <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                            <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
                                            <!-- ***********************************************Card DESEMPEﾃ前 ACTUAL ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingDesempeno">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseDesempeno" aria-expanded="true" aria-controls="collapseDesempeno">
                                                        <h5 class="mb-0">Desempe&ntilde;o actual: Repertorios B&aacute;sicos</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseDesempeno" class="collapse show" role="tabpanel" aria-labelledby="headingDesempeno">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input name="idrepertoriobasico" id="idrepertoriobasico" type="hidden" class="form-control">
                                                                        <label>Contacto Visual</label>
                                                                        <input name='contactovisual' id='contactovisual' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Periodos de Atenci&oacute;n</label>
                                                                        <input name='periodosatencion' id='periodosatencion' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Imitaci&oacute;n motora</label>
                                                                        <input name='imitacionmotora' id='imitacionmotora' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Seguimiento de instrucciones</label>
                                                                        <input name='seguinstrucciones' id='seguinstrucciones' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Esquema corporal</label>
                                                                        <input name='esqcorporal' id='esqcorporal' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            <!-- ***********************************************Card HIGIENE ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingHigiene">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseHigiene" aria-expanded="true" aria-controls="collapseHigiene">
                                                        <h5 class="mb-0">Higiene</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseHigiene" class="collapse show" role="tabpanel" aria-labelledby="headingHigiene">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Ba&ntilde;o Corporal</label>
                                                                        <select name='corporal' id='corporal' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Ayuda</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Cepillado de dientes</label>
                                                                        <select name='cepillado' id='cepillado' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Ayuda</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Lavado de manos</label>
                                                                        <select name='manos' id='manos' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Ayuda</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Lavado de cara</label>
                                                                        <select name='cara' id='cara' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Ayuda</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div><div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Peinado</label>
                                                                        <select name='peinado' id='peinado' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Ayuda</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Utilizaci&oacute;n de toalla Higi&eacute;nica</label>
                                                                        <select name='toalla' id='toalla' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='1'>Independiente</option>
                                                                            <option value='2'>Ayuda</option>
                                                                            <option value='3'>Dependiente</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Control de esf&iacute;nteres</label>
                                                                        <input name='controlesfinter' id='controlesfinter' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                            </div><!-- .card -->
                                            <!-- ***********************************************Card VESTIDO ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingVestido">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseVestido" aria-expanded="true" aria-controls="collapseVestido">
                                                        <h5 class="mb-0">Prendas de vestir</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseVestido" class="collapse show" role="tabpanel" aria-labelledby="headingVestido">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            
                                                            <div class="row" id="prendasVestir">
                                                                
                                                            </div>
                                                            
                                                            <div class="row" id="habilidadMotriz">
                                                                
                                                            </div>
                                                            
                                                            <!--<div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Ropa Interior</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Ponerse</label>
                                                                        <input name='check1' id='check1' type="checkbox" onclick="guardarPrendaVestir(1,'ponerse',1)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Quitarse</label>
                                                                        <input name='check2' id='check2' type="checkbox" onclick="guardarPrendaVestir(2,'quitarse',1)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionropa' id='observacionropa' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Medias</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Ponerse</label>
                                                                        <input name='check3' id='check3' type="checkbox" onclick="guardarPrendaVestir(3,'ponerse',2)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Quitarse</label>
                                                                        <input name='check4' id='check4' type="checkbox"  onclick="guardarPrendaVestir(4,'quitarse',2)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionmedias' id='observacionmedias' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Pantal&oacute;n</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Ponerse</label>
                                                                        <input name='check5' id='check5' type="checkbox" onclick="guardarPrendaVestir(5,'ponerse',3)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Quitarse</label>
                                                                        <input name='check6' id='check6' type="checkbox" onclick="guardarPrendaVestir(6,'quitarse',3)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionpantalon' id='observacionpantalon' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Camiseta</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Ponerse</label>
                                                                        <input name='check7' id='check7' type="checkbox" onclick="guardarPrendaVestir(7,'ponerse',4)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Quitarse</label>
                                                                        <input name='check8' id='check8' type="checkbox" onclick="guardarPrendaVestir(8,'quitarse',4)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacioncamiseta' id='observacioncamiseta' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Camisa/Blusa</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Ponerse</label>
                                                                        <input name='check9' id='check9' type="checkbox" onclick="guardarPrendaVestir(9,'ponerse',5)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Quitarse</label>
                                                                        <input name='check10' id='check10' type="checkbox" onclick="guardarPrendaVestir(10,'quitarse',5)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacioncamisa' id='observacioncamisa' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Vestido</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Ponerse</label>
                                                                        <input name='check11' id='check11' type="checkbox" onclick="guardarPrendaVestir(11,'ponerse',6)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Quitarse</label>
                                                                        <input name='check12' id='check12' type="checkbox" onclick="guardarPrendaVestir(12,'quitarse',6)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionvestido' id='observacionvestido' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Zapatos</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Ponerse</label>
                                                                        <input name='check13' id='check13' type="checkbox" onclick="guardarPrendaVestir(13,'ponerse',7)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Quitarse</label>
                                                                        <input name='check14' id='check14' type="checkbox" onclick="guardarPrendaVestir(14,'quitarse',7)">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionzapatos' id='observacionzapatos' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Amarra</label>
                                                                        <select name='amarra' id='amarra' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionHabilidad1' id='observacionHabilidad1' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Desamarra</label>
                                                                        <select name='desamarra' id='desamarra' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionHabilidad2' id='observacionHabilidad2' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Sube cierres</label>
                                                                        <select name='subecierre' id='subecierre' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionHabilidad3' id='observacionHabilidad3' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Baja cierres</label>
                                                                        <select name='bajacierre' id='bajacierre' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionHabilidad4' id='observacionHabilidad4' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Abotona</label>
                                                                        <select name='abotona' id='abotona' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionHabilidad5' id='observacionHabilidad5' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Desabotona</label>
                                                                        <select name='desabotona' id='desabotona' class="form-control">
                                                                            <option>Seleccione</option>
                                                                            <option value='S'>Si</option>
                                                                            <option value='N'>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Observaciones</label>
                                                                        <input name='observacionHabilidad6' id='observacionHabilidad6' type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>-->
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                                <br>
                                                <hr>
                                                <?php
                                                    if($verBoton){
                                                        echo'<div class="col-md-12">
                                                            <div class="button-form">
                                                                <button type="submit" class="btn btn-primary" data-toggle="modal" style="float:right;">Guardar</button>
                                                            </div>
                                                        </div>';
                                                    }
                                                ?>
                                            </div><!-- .card -->
                                            </form>
                                        </div> <!--fin tab desempeno actual-->
                                        <!-- ********************** TAB PANEL HABILIDADES ESPECIALES **********************-->
                                        <div role="tabpanel" class="tab-pane fade" id="habilidades">
                                            <form id="formHabilidades" role="form" method='post'  action='' name='datos'>
                                            
                                            <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                            <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                            <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
                                            <!-- ***********************************************Card Habilidades especiales ************************************************************************* -->
                                            <div class="card ">
                                                <div class="card-header" role="tab" id="headingHabEspeciales">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseHabEspeciales" aria-expanded="true" aria-controls="collapseHabEspeciales">
                                                        <h5 class="mb-0">Habilidades especiales</h5>
                                                    </a>
                                                </div><!-- .card-header -->
                                                <div id="collapseHabEspeciales" class="collapse show" role="tabpanel" aria-labelledby="headingHabEspeciales">
                                                    <div class="card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Habilidades Especiales</label>
                                                                        <textarea class="form-control" rows="3" name="habilespeciales" id="habilespeciales"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Dificultades de conducta</label>
                                                                        <textarea class="form-control" rows="3" name="dificultadescond" id="dificultadescond" placeholder="Por favor describir todas las conductas que la madre menciona acerca del paciente y las que se observen por el ente evaluador"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Caracter&iacute;sticas ambientales</label>
                                                                        <textarea class="form-control" rows="3" name="caractambiente" id="caractambiente"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-body -->
                                                    </div><!-- .card-block -->
                                                </div><!-- .collapse show -->
                                                <br>
                                                <hr>
                                                <?php
                                                    if($verBoton){
                                                        echo'<div class="col-md-12">
                                                            <div class="button-form">
                                                                <button type="submit" class="btn btn-primary" data-toggle="modal" style="float:right;">Guardar</button>
                                                            </div>
                                                        </div>';
                                                    }
                                                ?>
                                            </div><!-- .card -->
                                            </form>
                                        </div> <!--fin tab habilidades-->
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
            var idhistoria  = document.getElementById("idhist").value;
            var idtipocita  = 1;
            if(idcita != "" && idtipocita == 1){
                editarCitaInformacion(idpaciente, idcita, idtipocita);
            }
            cargarDatos();
            //tab datos generales
            cargaDatosGenerales(idpaciente,idhistoria);
            cargarConstitucion(idpaciente, "historia");
            
            //tab consulta
            cargaMotivo(idpaciente,idhistoria);
            cargaDiagnosticoPrevio(idpaciente,idhistoria);
            cargaAnteDif(idpaciente,idhistoria);
            cargarTratamientos(idhistoria);
            
            //tab antecedentes
            cargaAntFamiliar(idpaciente,idhistoria);
            cargaAntPrenatal(idpaciente,idhistoria);
            cargaAntParto(idpaciente,idhistoria);
            
            //tab postnatales
            cargaAntPostnatal(idpaciente,idhistoria);
            cargaDesarrollo(idpaciente,idhistoria);
            cargaEleAlim(idpaciente,idhistoria);
            cargaDifComida(idpaciente,idhistoria);
            
            //tab lenguaje
            cargaDllolenguaje(idpaciente,idhistoria);
            cargaDifHabla(idpaciente,idhistoria);
            cargaComNoVerbal(idpaciente,idhistoria);
            
            //tab EMOCIONAL
            cargaDlloSoEmocional(idpaciente,idhistoria);
            cargaResistencia(idpaciente,idhistoria);
            
            //tab SENSORIAL
            cargaAuditiva(idpaciente,idhistoria);
            cargaVisual(idpaciente,idhistoria);
            cargaReceptor(idpaciente,idhistoria);
            cargaSueno(idpaciente,idhistoria);
            
            //tab DESEMPENO
            cargaDesempeno(idpaciente,idhistoria);
            cargaHigiene(idpaciente,idhistoria);
            
            //tab HABILIDADES
            cargaHabilidades(idpaciente,idhistoria);
            
            cargaPrendasVestir(idhistoria);
            cargaHabilidadMotriz(idhistoria);
            
            //$('#sr').attr('readonly',true);
            //$('input[type="checkbox"]').attr("readonly",true);
            
            function guardarPrendaVestir(idcheck, respuesta, idprenda){
                if($("#check"+idcheck+":checked").val() != null ){
                    var idvalor = "S";
                    //alert("valor chequado "+idcheck+" respuesta "+respuesta+" idprenda "+idprenda+" resp "+idvalor+" paciente "+idpaciente+" cita "+idcita+" historia "+idhistoria);
                }else{
                    var idvalor = "N";
                    //alert("valor NO chequado "+idcheck+" respuesta "+respuesta+" idprenda "+idprenda+" resp "+idvalor+" paciente "+idpaciente+" cita "+idcita+" historia "+idhistoria);
                }
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"actualizaPrendaVestir", idhistoria:idhistoria, respuesta:respuesta, idprenda:idprenda, idvalor:idvalor},function(data){
                   //alert("se actualizaron los datos dsmv");
                });
            }
            
        </script>
        
    </body>
</html>