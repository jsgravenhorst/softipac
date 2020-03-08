<?php   
    include('../directiva.php');
    $idpaciente = $_GET['var'];
    $idcita     = $_GET['cita'];
    $idtipocita = $_GET['tipocita'];
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
                            <div class="col-lg-12">
                                <form id="form_Cita" role="form" method='post'  action='' name='datos'>
                                    <!-- **************************************************Datos ocultos************************************************************ -->
                                    <input name="idusuario" id="idusuario" type="hidden" class="form-control" value="<?php echo"$idusuario";?>">
                                    <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                    <input name="idtipocita" id="idtipocita" type="hidden" class="form-control" value="<?php echo"$idtipocita";?>">
                                    <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                    <input name="pacienteIdDocumento" id="pacienteIdDocumento" type="hidden" class="form-control" >
                                    <input name="pacienteIdUsuario" id="pacienteIdUsuario" type="hidden" class="form-control" >
                                    <input name="pacienteIdParentesco" id="pacienteIdParentesco" type="hidden" class="form-control" >
                                    <input name="acudienteIdTipoUsuario" id="acudienteIdTipoUsuario" type="hidden" class="form-control" >
                                    <input name="acudienteIdUsuario" id="acudienteIdUsuario" type="hidden" class="form-control" >
                                    <input name="acudienteIdDocumento" id="acudienteIdDocumento" type="hidden" class="form-control" >
                                    <input name="madreIdTipoUsuario" id="madreIdTipoUsuario" type="hidden" class="form-control" >
                                    <input name="madreIdUsuario" id="madreIdUsuario" type="hidden" class="form-control" >
                                    <input name="madreIdDocumento" id="madreIdDocumento" type="hidden" class="form-control" >
                                    <input name="padreIdTipoUsuario" id="padreIdTipoUsuario" type="hidden" class="form-control" >
                                    <input name="padreIdUsuario" id="padreIdUsuario" type="hidden" class="form-control" >
                                    <input name="padreIdDocumento" id="padreIdDocumento" type="hidden" class="form-control" >
                                    <!-- **************************************************Configuracion Fecha y Hora Cita************************************************************ -->
                                    <div class="card ">
                                        <div class="card-header" role="tab" id="headingInformacion">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseInformacion" aria-expanded="true" aria-controls="collapseInformacion">
                                                <h5 class="mb-0">Cita Inicial de Informaci&oacute;n</h5>
                                            </a>
                                        </div><!-- .card-header -->
                                        <div id="collapseInformacion" class="collapse show" role="tabpanel" aria-labelledby="headingInformacion">
                                            <div class="card-block">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Fecha Cita*</label><br>
                                                                <input name="fechaCitaIni" id="fechaCitaIni" type="text" placeholder="yyyy-dd-mm" required="required" class="date-picker form-control">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Aplica</label>
                                                                <input name="aplica" id="aplica" type="text" class="form-control" readonly="true">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                    </div><!-- .row -->
                                                </div><!-- .card-body -->
                                            </div><!-- .card-block -->
                                        </div><!-- .collapse show -->
                                    </div><!-- .card -->
                                    <!-- *******************************************************Datos Paciente**************************************************************************************** -->
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingTwo">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePaciente" aria-expanded="true" aria-controls="collapseOne">
                                                <h5 class="mb-0">Datos Paciente</h5>
                                            </a>
                                        </div><!-- .card-header -->
                                        <div id="collapsePaciente" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="card-block">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <!-- **************************************************Datos  Documento Paciente**************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tipo de Documento* (Otro sino se suministra)</label>
                                                                <select name="pacienteIdTipoDocumento" id="pacienteIdTipoDocumento" class="form-control" required="required">
                                                                    <option>Seleccione</option>
                                                                </select>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>N&uacute;mero Documento* (0 sino se suministra)</label>
                                                                <input name="pacienteDocumento" id="pacienteDocumento" type="text" class="form-control" placeholder="Digite el N&uacute;mero del Documento" required="required">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ***********************************************Nombres y Apellidos Paciente************************************************************************* -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nombres* (NA sino se suministra)</label>
                                                                <input name="pacienteNombres" id="pacienteNombres" type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" required="required">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Primer apellido* (NA sino se suministra)</label>
                                                                <input name="pacientePrimerApellido" id="pacientePrimerApellido" type="text" class="form-control" placeholder="Digite el Primer Apellido" required="required">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Segundo apellido</label>
                                                                <input name="pacienteSegundoApellido" id="pacienteSegundoApellido" type="text" class="form-control" placeholder="Digite el Segundo Apellido">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ***********************************************Fecha Nacimiento Paciente************************************************************************* -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Fecha de Nacimiento* (2017-31-01)</label><br>
                                                                <input name="pacienteFechaNacimiento" id="pacienteFechaNacimiento" type="text"  class="date-picker form-control" placeholder="yyyy-dd-mm" required="required">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ***********************************************Edad y Meses Paciente************************************************************************** -->
                                                        <br>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Edad* (0 sino se suministra)</label>
                                                                <input name="pacienteEdad" id="pacienteEdad" type="number" class="form-control" placeholder="Digite la Edad" required="required">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Meses* (0 sino se suminstra)</label>
                                                                <div class="input-group">
                                                                    <input name="pacienteMeses" id="pacienteMeses" type="number" class="form-control" placeholder="Digite los Meses" required="required">
                                                                </div><!-- .input-group -->
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- **************************************************Datos  Genero Paciente**************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Sexo*</label>
                                                                <select name="pacienteIdGenero" id="pacienteIdGenero" class="form-control" required="required">
                                                                    <option>Seleccione</option>
                                                                </select>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- **************************************************Datos  Escolaridad Paciente**************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Escolaridad* (Otro sino se suministra)</label>
                                                                <select name="pacienteIdEscolaridad" id="pacienteIdEscolaridad" class="form-control" required="required">
                                                                    <option>Seleccione</option>
                                                                </select>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- **************************************************Datos  Tutela Paciente**************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tutela* (No sino se suministra)</label>
                                                                <select name="pacienteTutela" id="pacienteTutela" class="form-control" required="required">
                                                                    <option>Seleccione</option>
                                                                    <option value='S'>SI</option>
                                                                    <option value='N'>NO</option>
                                                                </select>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- **************************************************Datos  Eps Paciente**************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>EPS* (Particular sino se suministra)</label>
                                                                <input name='pacienteIdEps' id='pacienteIdEps' type="hidden" class="form-control" placeholder="Ingrese el Nombre de la EPS">
                                                                <input name='pacienteEps' id='pacienteEps' type="text" class="form-control" placeholder="Ingrese el Nombre de la EPS">
                                                                <!--<select name="pacienteIdEps" id="pacienteIdEps" class="form-control" required="required">
                                                                    <option>Seleccione</option>
                                                                </select> -->
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        
                                                    </div><!-- .row -->
                                                </div><!-- .card-body -->
                                            </div><!-- ."card-block -->
                                        </div><!-- .collapse show -->
                                    </div><!-- .card -->
                                    <!-- *******************************************************Datos Padres y Acudiente**************************************************************************************** -->
                                    <div id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="card ">
                                            <div class="card-header" role="tab" id="headingDatosMadre">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseDatosMadre" aria-expanded="false" aria-controls="collapseDatosMadre">
                                                    <h5 class="mb-0">Datos Madre</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseDatosMadre" class="collapse" role="tabpanel" aria-labelledby="headingDatosMadre">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- **************************************************Datos  Documento Madre**************************************************************** -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Tipo de Documento (Otro sino se suministra)</label>
                                                                    <select name="madreIdTipoDocumento" id="madreIdTipoDocumento" class="form-control">
                                                                        <option>Seleccione</option>
                                                                    </select>
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>N&uacute;mero Documento (0 sino se suministra)</label>
                                                                    <input name="madreDocumento" id="madreDocumento" type="text" class="form-control" placeholder="Digite el N&uacute;mero del Documento" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Nombres y Apellidos Madre************************************************************************* -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Nombres Madre</label>
                                                                    <input name="madreNombres" id="madreNombres" type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Primer Apellido </label>
                                                                    <input name="madrePrimerApellido" id="madrePrimerApellido" type="text" class="form-control" placeholder="Digite el Primer Apellido" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Segundo Apellido</label>
                                                                    <input name="madreSegundoApellido" id="madreSegundoApellido" type="text" class="form-control" placeholder="Digite el Segundo Apellido">
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Edad Madre************************************************************************** -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Edad </label>
                                                                    <input name="madreEdad" id="madreEdad" type="number" class="form-control" placeholder="Digite la Edad" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- **************************************************Datos  Escolaridad Madre**************************************************************** -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Escolaridad </label>
                                                                    <select name="madreIdEscolaridad" id="madreIdEscolaridad" class="form-control">
                                                                        <option>Seleccione</option>
                                                                    </select>
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- **************************************************Datos  Ocupacion Madre**************************************************************** -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Ocupaci&oacute;n </label>
                                                                    <input name="madreOcupacion" id="madreOcupacion" type="text" class="form-control" placeholder="Digite la Ocupaci&oacute;n" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Datos Direccion Madre************************************************************************* -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Direcci&oacute;n </label>
                                                                    <input name="madreDireccion" id="madreDireccion" type="text" class="form-control" placeholder="Digite la Direcci&oacute;n" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Datos Telefonos Madre************************************************************************* -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Tel&eacute;fono Fijo</label>
                                                                    <input name="madreTelefonoFijo" id="madreTelefonoFijo" type="text" class="form-control" placeholder="Digite el Tel&eacute;fono fijo">
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Celular </label>
                                                                    <input name="madreTelefonoCelular" id="madreTelefonoCelular" type="text" class="form-control" placeholder="Digite el Celular" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Datos Correo Electronico Madre************************************************************************* -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Correo Electr&oacute;nico</label>
                                                                    <input name="madreEmail" id="madreEmail" type="text" class="form-control" placeholder="Digite el Correo Electr&oacute;nico">
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .car-block -->
                                            </div><!-- .collapse -->
                                        </div><!-- .card -->
                                        <!-- *******************************************************Datos Padre**************************************************************************************** -->
                                        <div class="card ">
                                            <div class="card-header" role="tab" id="headingDatosPadre">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseDatosPadre" aria-expanded="false" aria-controls="collapseDatosPadre">
                                                    <h5 class="mb-0">Datos Padre</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <!-- **************************************************Datos  Documento Padre**************************************************************** -->
                                            <div id="collapseDatosPadre" class="collapse" role="tabpanel" aria-labelledby="headingDatosPadre">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Tipo de Documento</label>
                                                                    <select name="padreIdTipoDocumento" id="padreIdTipoDocumento" class="form-control">
                                                                        <option>Seleccione</option>
                                                                    </select>
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>N&uacute;mero Documento (0 sino se suministra)</label>
                                                                    <input name="padreDocumento" id="padreDocumento" type="text" class="form-control" placeholder="Digite el N&uacute;mero del Documento" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Nombres y Apellidos Padre************************************************************************* -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Nombres Padre</label>
                                                                    <input name="padreNombres" id="padreNombres" type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Primer Apellido</label>
                                                                    <input name="padrePrimerApellido" id="padrePrimerApellido" type="text" class="form-control" placeholder="Digite el Primer Apellido" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Segundo Apellido</label>
                                                                    <input name="padreSegundoApellido" id="padreSegundoApellido" type="text" class="form-control" placeholder="Digite el Segundo Apellido">
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Edad Padre************************************************************************** -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Edad</label>
                                                                    <input name="padreEdad" id="padreEdad" type="number" class="form-control" placeholder="Digite la Edad" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- **************************************************Datos  Escolaridad Padre**************************************************************** -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Escolaridad</label>
                                                                    <select name="padreIdEscolaridad" id="padreIdEscolaridad" class="form-control">
                                                                        <option>Seleccione</option>
                                                                    </select>
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Datos Ocupacion Padre************************************************************************* -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Ocupaci&oacute;n</label>
                                                                    <input name="padreOcupacion" id="padreOcupacion" type="text" class="form-control" placeholder="Digite la Ocupaci&oacute;n" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Datos Direccion Padre************************************************************************* -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Direcci&oacute;n</label>
                                                                    <input name="padreDireccion" id="padreDireccion" type="text" class="form-control" placeholder="Digite la Direcci&oacute;n" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Datos Telefonos Padre************************************************************************* -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Tel&eacute;fono Fijo</label>
                                                                    <input name="padreTelefonoFijo" id="padreTelefonoFijo" type="text" class="form-control" placeholder="Digite el Tel&eacute;fono Fijo">
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Celular</label>
                                                                    <input  name="padreTelefonoCelular"  id="padreTelefonoCelular" type="text" class="form-control" placeholder="Digite el Celular" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Datos Correo Electronico Padre************************************************************************* -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Correo Electr&oacute;nico</label>
                                                                    <input name="padreEmail" id="padreEmail" type="text" class="form-control" placeholder="Digite el Correo Electr&oacute;nico">
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card-block -->
                                            </div><!-- .collapse -->
                                        </div><!-- .card -->
                                        <!-- *******************************************************Datos Acudiente**************************************************************************************** -->
                                        <div class="card ">
                                            <div class="card-header" role="tab" id="headingTwo">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseAcudiente" aria-expanded="true" aria-controls="collapseOne">
                                                    <h5 class="mb-0">Datos Acudiente</h5>
                                                </a>
                                            </div>
                                            <div id="collapseAcudiente" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- **************************************************Datos  Documento Acudiente**************************************************************** -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Tipo de Documento</label>
                                                                    <select name="acudienteIdTipoDocumento" id="acudienteIdTipoDocumento" class="form-control">
                                                                        <option>Seleccione</option>
                                                                    </select>
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>N&uacute;mero Documento</label>
                                                                    <input name="acudienteDocumento" id="acudienteDocumento" type="text" class="form-control" placeholder="Digite el N&uacute;mero del Documento" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- **************************************************Datos  Parentesco Acudiente**************************************************************** -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Parentesco</label>
                                                                    <select name="acudienteIdParentesco" id="acudienteIdParentesco" class="form-control">
                                                                        <option>Seleccione</option>
                                                                    </select>
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Nombres y Apellidos Acudiente************************************************************************* -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Nombres Acudiente</label>
                                                                    <input name="acudienteNombres" id="acudienteNombres" type="text" class="form-control" placeholder="Digete el(los) Nombre(s)" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Primer Apellido</label>
                                                                    <input name="acudientePrimerApellido" id="acudientePrimerApellido" type="text" class="form-control" placeholder="Digite el Primer Apellido" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Segundo Apellido</label>
                                                                    <input name="acudienteSegundoApellido" id="acudienteSegundoApellido" type="text" class="form-control" placeholder="Digite el Segundo Apellido">
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Edad Acudiente************************************************************************** -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Edad</label>
                                                                    <div class="input-group">
                                                                        <input name="acudienteEdad" id="acudienteEdad" type="number" class="form-control" placeholder="Digite la Edad" >
                                                                    </div><!-- .input-group -->
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- **************************************************Datos  Escolaridad Acudiente**************************************************************** -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Escolaridad</label>
                                                                    <select name="acudienteIdEscolaridad" id="acudienteIdEscolaridad" class="form-control">
                                                                        <option>Seleccione</option>
                                                                    </select>
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- **************************************************Ocupacion Acudiente**************************************************************** -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Ocupaci&oacute;n</label>
                                                                    <div class="input-group">
                                                                        <input name="acudienteOcupacion" id="acudienteOcupacion" type="text" class="form-control"  placeholder="Digite la Ocupaci&oacute;n" >
                                                                    </div><!-- .input-group -->
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Datos Direccion Acudiente************************************************************************* -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Direcci&oacute;n</label>
                                                                    <input name="acudienteDireccion" id="acudienteDireccion" type="text" class="form-control" placeholder="Digite  la Direcci&oacute;n" >
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <!-- ***********************************************Datos Telefonos Acudiente************************************************************************* -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Tel&eacute;fono Fijo</label>
                                                                    <input name="acudienteTelefonoFijo" id="acudienteTelefonoFijo" type="text" class="form-control" placeholder="Digite el Tel&eacute;fono fijo">
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Celular</label>
                                                                    <input name="acudienteTelefonoCelular" id="acudienteTelefonoCelular" type="text" class="form-control" placeholder="Digite el Celular">
                                                                </div><!-- .form-group -->
                                                            </div>
                                                            <!-- ***********************************************Datos Correo Electronico Acudiente************************************************************************* -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Correo Electr&oacute;nico</label>
                                                                    <input name="acudienteEmail" id="acudienteEmail" type="text" class="form-control" placeholder="Digite el Correo Electr&oacute;nico">
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-4 -->
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card-block -->
                                            </div><!-- .collapse show -->
                                        </div><!-- .card -->
                                        <!-- ***********************************************Datos Motivo Consulta************************************************************************* -->
                                        <div class="card ">
                                            <div class="card-header" role="tab" id="headingMotivo">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseMotivo" aria-expanded="false" aria-controls="collapseMotivo">
                                                    <h5 class="mb-0">Motivo de Consulta (NA sino se suministra)</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseMotivo" class="collapse" role="tabpanel" aria-labelledby="headingMotivo">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea  name="motivoConsulta" id="motivoConsulta" class="form-control" rows="5" placeholder="Digite Motivo Consulta" ></textarea>
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-12 -->
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card-block -->
                                            </div><!-- .collapse -->
                                        </div><!-- .card -->
                                        <!-- ***********************************************Datos Diagnosticos************************************************************************* -->
                                        <div class="card ">
                                            <div class="card-header" role="tab" id="headingDiagnostico">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseDiagnostico" aria-expanded="false" aria-controls="collapseDiagnostico">
                                                    <h5 class="mb-0">Diagn&oacute;sticos Previos (Autismo sino se suministra)</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseDiagnostico" class="collapse" role="tabpanel" aria-labelledby="headingDiagnostico">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Diagn&oacute;sticos</label>
                                                                    <textarea name="diagnosticos"  id="diagnosticos" class="form-control" rows="5" placeholder="Digite Diagn&oacute;sticos" ></textarea>
                                                                   <br>
                                                                    <label>Remitido por:</label>
                                                                    <input name="remitido" id="remitido" type="text" class="form-control" placeholder="Digite M&eacute;dico que remite">
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-12 -->
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card-block -->
                                            </div><!-- .collapse -->
                                        </div><!-- .card -->
                                        <!-- ***********************************************Datos  Expectativas************************************************************************* -->
                                        <div class="card ">
                                            <div class="card-header" role="tab" id="headingExpectativas">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseExpectativas" aria-expanded="false" aria-controls="collapseExpectativas">
                                                    <h5 class="mb-0">Expectativas (NA sino se suministra)</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseExpectativas" class="collapse" role="tabpanel" aria-labelledby="headingExpectativas">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea  name="expectativas" id="expectativas" class="form-control" rows="5"  placeholder="Digite Expectativas"></textarea>
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-12 -->
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card-block -->
                                            </div><!-- .collapse -->
                                        </div><!-- .card -->
                                        <!-- ***********************************************Datos  Recomendaciones****************************************************************************************************************************** -->
                                        <div class="card ">
                                            <div class="card-header" role="tab" id="headingRecomendaciones">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseRecomendaciones" aria-expanded="false" aria-controls="collapseRecomendaciones">
                                                    <h5 class="mb-0">Recomendaciones (NA sino se suministra)</h5>
                                                </a>
                                            </div>
                                            <div id="collapseRecomendaciones" class="collapse" role="tabpanel" aria-labelledby="headingRecomendaciones">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea name="recomTenerCta" id="recomTenerCta" class="form-control" rows="5"  placeholder="Digite Recomendaciones" ></textarea>
                                                                </div><!-- .form-group -->
                                                            </div><!-- col-md-12 -->
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card-block -->
                                            </div><!-- .collapse -->
                                        </div><!-- .card -->
                                        <!-- ***********************************************Datos  Informacion****************************************************************************************************************************** -->
                                        <div class="card ">
                                            <div class="card-header" role="tab" id="headingInfGeneral">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseInfGeneral" aria-expanded="false" aria-controls="collapseInfGeneral">
                                                    <h5 class="mb-0">Informaci&oacute;n General</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseInfGeneral" class="collapse" role="tabpanel" aria-labelledby="headingInfGeneral">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea name="inFoGral" id="inFoGral" class="form-control" rows="5" placeholder="Digite Informaci&oacute;n General"></textarea>
                                                                </div><!-- .form-group -->
                                                            </div><!-- .col-md-12 -->
                                                        </div><!-- .row -->
                                                    </div><!-- .card-body -->
                                                </div><!-- .card-block -->
                                            </div><!-- .collapse -->
                                        </div>
                                        <br>
                                        <div class="col-md-12" style="text-align:center">
                                            <button id="btnCita" type="submit" class="btn btn-primary" style='float:right;'>Guardar</button>
                                        </div><!-- col-md-12 -->
                                    </div><!-- .accordion -->
                                </form>
                            </div><!-- .row -->
                        </div><!-- /.container-fluid -->
                    </div><!-- .stat-boxes -->
                </div> <!-- .container-inner -->
            </div><!-- .content-container -->
            <div class='cargando'>
              <img src="../images/load.gif" ><h3>Procesando datos por favor espere...</h3>
            </div>
            <?php
                include("../modal/modal_exito.php");
                include("../modal/modal_error.php");
            ?>
        </div><!-- .page-container -->
        
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../vendor/datatables/jquery.dataTables.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
        
        <script src="../js/sb-admin.min.js"></script>
        <script src="../js/sb-admin-datatables.min.js"></script>
        <script src="../js/funciones.js"></script>
        <script src="../js/calculaEdad.js"></script>
        
         <script type="text/javascript">
            $(function() {
                    $("#pacienteEps").autocomplete({
                        source: "../mod_aplicacion/admin_completa_eps.php",
                        minLength: 2,
                        select: function(event, ui) {
        					event.preventDefault();
        					$('#pacienteEps').val(ui.item.eps);
        					$('#pacienteIdEps').val(ui.item.ideps);
        			     }
                    });
        		});
        </script>
        
        
        <script type"javascript">
            
            var idpaciente  = document.getElementById("idpaciente").value;
            var idcita      = document.getElementById("idcita").value;
            var idtipocita  = document.getElementById("idtipocita").value;
            if(idcita != "" && idtipocita == 1){
                editarCitaInformacion(idpaciente,idcita, idtipocita);
            }
            
            if(idcita != "" && idtipocita == 2){
                editarCitaInformacion(idpaciente,idcita, idtipocita);
            }
            cargarDatos();
        </script>
    </body>
</html>