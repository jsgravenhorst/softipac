<?php   
    include('../directiva.php');
    $idpaciente     = $_GET['var'];
    $idcita         = $_GET['cita'];
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
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
                                <form id="form_Agenda" role="form" method='post'  action='' name='datos'>
                                    
                                    <!-- **************************************************Datos ocultos************************************************************ -->
                                    
                                    <input name='idusuario' id='idusuario' type="hidden" class="form-control" value="<?php echo"$idusuario";?>">
                                    <input name='idpaciente' id='idpaciente' type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                    <input name='idcita' id='idcita' type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                    <input name='pacienteIdDocumento' id='pacienteIdDocumento' type="hidden" class="form-control" >
                                    <input name='pacienteIdUsuario' id='pacienteIdUsuario' type="hidden" class="form-control" >
                                    <input name='pacienteIdParentesco' id='pacienteIdParentesco' type="hidden" class="form-control" >
                                    <input name='acudienteIdUsuario' id='acudienteIdUsuario' type="hidden" class="form-control" >
                                    <input name='acudienteIdDocumento' id='acudienteIdDocumento' type="hidden" class="form-control" >
                                    <!--<input name='madreIdUsuario' id='madreIdUsuario' type="hidden" class="form-control" >
                                    <input name='madreIdDocumento' id='madreIdDocumento' type="hidden" class="form-control" >
                                    <input name='padreIdUsuario' id='padreIdUsuario' type="hidden" class="form-control" >
                                    <input name='padreIdDocumento' id='padreIdDocumento' type="hidden" class="form-control" >-->
                                    <!-- **************************************************Configuracion Fecha y Hora Cita************************************************************ -->
                                    <div class="card ">
                                        <div class="card-header" role="tab" id="headingTwo">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseConfiguracion" aria-expanded="true" aria-controls="collapseOne">
                                                <h5 class="mb-0">Configuraci&oacute;n Hora Cita</h5>
                                            </a>
                                        </div><!-- .card-header -->
                                        <div id="collapseConfiguracion" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="card-block">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Fecha Cita *</label><br>
                                                                <input name="fechaCitaIni" id="fechaCitaIni" type="text" placeholder="yyyy-dd-mm" required="required" class="date-picker form-control">
                                                            </div> <!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Hora Cita *</label><br>
                                                                <select name="horacita" id="horacita" class="form-control">
                                                                    <option>Seleccione</option>
                                                                </select>
                                                            </div><!-- .form-group -->
                                                        </div> <!-- .col-md-2 -->
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
                                                                <select name="pacienteIdTipoDocumento" id="pacienteIdTipoDocumento" class="form-control">
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
                                                                <input  name="pacienteFechaNacimiento" id="pacienteFechaNacimiento" type="text" class="date-picker form-control" placeholder="yyyy-dd-mm" required="required">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ***********************************************Edad y Meses Paciente************************************************************************** -->
                                                        <br>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Edad* (0 sino se suministra)</label>
                                                                <input name="pacienteEdad" id="pacienteEdad" type="number" class="form-control" placeholder="Digite la Edad" readonly>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Meses* (0 sino se suministra)</label>
                                                                <div class="input-group">
                                                                    <input name="pacienteMeses" id="pacienteMeses" type="number"  class="form-control"  placeholder="Digite los Meses" readonly>
                                                                </div><!-- .input-group -->
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- **************************************************Datos  Genero Paciente**************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Sexo*</label>
                                                                <select name="pacienteIdGenero" id="pacienteIdGenero" class="form-control">
                                                                    <option>Seleccione</option>
                                                                </select>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- **************************************************Datos  Escolaridad Paciente**************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Escolaridad* (Otro sino se suministra)</label>
                                                                <select name="pacienteIdEscolaridad" id="pacienteIdEscolaridad" class="form-control">
                                                                    <option>Seleccione</option>
                                                                </select>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- **************************************************Datos  Tutela Paciente**************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tutela* (No sino se suministra)</label>
                                                                <select name="pacienteTutela" id="pacienteTutela" class="form-control">
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
                                                                <!--<select name="pacienteIdEps" id="pacienteIdEps" class="form-control">
                                                                    <option>Seleccione</option>
                                                                </select>-->
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- **************************************************Datos  Diagnosticos Paciente**************************************************************** -->
                                                        <div class="col-md-12">
                                                            <label>Diagn&oacute;stico* (NA sino se suministra)</label>
                                                            <div class="form-group">
                                                                <textarea name ="diagnosticos" id="diagnosticos" class="form-control" rows="5" required="required"></textarea>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-12 -->
                                                    </div><!-- .row -->
                                                </div><!-- .card-body -->
                                            </div><!-- ."card-block -->
                                        </div><!-- .collapse show -->
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
                                                                <label>Tipo de Documento* (Otro sino se suministra)</label>
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
                                                                <input name="acudientePrimerApellido" id="acudientePrimerApellido" type="text" class="form-control" placeholder="Digite el Primer Apellido">
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
                                                                    <input name="acudienteOcupacion" id="acudienteOcupacion" type="text" class="form-control" placeholder="Digite la Ocupaci&oacute;n" >
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
                                                        <!-- *************************************************Observaciones************************************************************************** -->
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Observaciones</label>
                                                                <textarea name="observacion" id="observacion" class="form-control" rows="5" ></textarea>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                    </div><!-- .row -->
                                                </div><!-- .card-body -->
                                            </div><!-- .card-block -->
                                        </div><!-- .collapse show -->
                                    </div><!-- .card -->
                                    <br>
                                    <div class="col-md-12" style="text-align:center">
                                        <button id="btnAgenda" type="submit" class="btn btn-primary" style='float:right;'>Guardar</button>
                                    </div><!-- .col-md-12 -->
                                </form>
                            </div>
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
            
            var idpaciente = document.getElementById("idpaciente").value;
            var idcita = document.getElementById("idcita").value;
            if(idcita != ""){
                editarCita(idpaciente, idcita, 0);
            }
            cargarDatos();
        </script>
    </body>
</html>