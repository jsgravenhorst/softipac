<?php   
    include('../directiva.php');
    $idusuario = $_SESSION['tipo_usuario'];
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
        <script src="../js/jquery-1.12.4.js"></script>
        <script src="../js/jquery-ui.js"></script>
        <script src="../js/jquery.timepicker.js"></script>
        <script src="../js/bootstrap-datepicker.min.js"></script>
	
	 <script>
			$(function() {
			    $('#usuarioFechaNacimiento').datepicker();
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
                                <form id="form_Usuario" role="form" method='post'  action='' enctype="multipart/form-data" name='datos'>
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingPaciente">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseDatosPaciente" aria-expanded="true" aria-controls="collapseDatosPaciente">
                                                <h5 class="mb-0">Configuraci&oacute;n de Usuarios</h5>
                                            </a>
                                        </div>
                                        <div id="collapseDatosPaciente" class="collapse show" role="tabpanel" aria-labelledby="headingPaciente">
                                            <div class="card-block">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <!-- **************************************************Datos  Documento Usuario**************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tipo de Documento* (Otro sino se suministra)</label>
                                                                <select name='usarioIdTipoDocumento' id='usarioIdTipoDocumento' class="form-control">
                                                                    <option>Seleccione</option>
                                                                    <option value='3'>C&eacute;dula de ciudadan&iacute;a</option>
                                                                    <option value='4'>N&uacute;mero Pasaporte</option>
                                                                    <option value='5'>C&eacute;dula Extranjer&iacute;a</option>
                                                                </select>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>N&uacute;mero Documento* (0 sino se suministra)</label>
                                                                <input name='documento' id='documento' type="number" class="form-control" placeholder="Digite el N&uacute;mero del Documento" required="required">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ***********************************************Nombres y Apellidos Usuario************************************************************************* -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Nombres* (NA sino se suministra)</label>
                                                                <input name='usuarioNombres' id='usuarioNombres' type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" required="required">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Primer apellido* (NA sino se suministra)</label>
                                                                <input name='usuarioPrimerApellido' id='usuarioPrimerApellido' type="text" class="form-control" placeholder="Digite el Primer Apellido" required="required">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Segundo apellido</label>
                                                                <input name='usuarioSegundoApellido' id='usuarioSegundoApellido' type="text" class="form-control" placeholder="Digite el Segundo Apellido">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ***********************************************Lugar de Nacimiento Usuario************************************************************************* -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Lugar de Nacimiento</label>
                                                                <input name='usuarioLugarNacimiento' id='usuarioLugarNacimiento' type="text" class="form-control" placeholder="Digite el Lugar de Nacimiento">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ***********************************************Fecha de Nacimiento Usuario************************************************************************* -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Fecha de Nacimiento* (2017-31-01)</label><br>
                                                                <input type='text' name='usuarioFechaNacimiento' id='usuarioFechaNacimiento' class="date-picker form-control" placeholder="yyyy-dd-mm" required="required">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ***********************************************Edad Usuario************************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Edad* (0 sino se suministra)</label>
                                                                <input name='usuarioEdad' id='usuarioEdad' type="number" class="form-control" placeholder="Digite la Edad" required="required readonly">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- **************************************************Datos  Genero Usuario**************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Sexo*</label>
                                                                <select name='idGenero' id='idGenero' class="form-control">
                                                                    <option>Seleccione</option>
                                                                    <option value='1'>Masculino</option>
                                                                    <option value='2'>Femenino</option>
                                                                </select>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ***********************************************Datos Direccion Usuario************************************************************************* -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Direcci&oacute;n* (NA sino se suministra)</label>
                                                                <input name='usuarioDireccion' id='usuarioDireccion' type="text" class="form-control" placeholder="Digite la Direcci&oacute;n">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ***********************************************Datos Telefonos Usuario************************************************************************* -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tel&eacute;fono Fijo</label>
                                                                <input name='usuarioTelefonoFijo' id='usuarioTelefonoFijo' type="text" class="form-control" placeholder="Digite el Tel&eacute;fono fijo">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Celular* (0 sino se suministra)</label>
                                                                <input name='usuarioTelefonoCelular' id='usuarioTelefonoCelular' type="text" class="form-control" placeholder="Digite el Celular" required="required">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ***********************************************Datos Correo Electronico Usuario************************************************************************* -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Correo Electr&oacute;nico</label>
                                                                <input name='usuarioEmail' id='usuarioEmail' type="text" class="form-control" placeholder="Digite el Correo Electr&oacute;nico">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- **************************************************Datos  Escolaridad Usuario**************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Escolaridad* (Otro sino se suministra)</label>
                                                                <select name='usuarioIdEscolaridad' id='usuarioIdEscolaridad' class="form-control">
                                                                    <option>Seleccione</option>
                                                                    <option value='1'>Ninguna</option>
                                                                    <option value='2'>Primaria</option>
                                                                    <option value='3'>Bachiller</option>
                                                                    <option value='5'>Profesional</option>
                                                                    <option value='6'>T&eacute;cnico</option>
                                                                    <option value='7'>Tecn&oacutelogo</option>
                                                                </select>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ****************************************************** Datos TipoUsario ************************************************************************************* -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Area*</label>
                                                                <select name='usuarioArea' id='usuarioArea' class="form-control">
                                                                    <option>Seleccione</option>
                                                                    <option value='1'>Psicologia</option>
                                                                    <option value='2'>Fisioterapia</option>
                                                                    <option value='3'>Fonoaudiologia</option>
                                                                    <option value='4'>Educaci&oacute;n Especial</option>
                                                                    <option value='5'>Terapia Ocupacional</option>
                                                                </select>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Universidad</label>
                                                                <input name="universidad" id="universidad" type="text" class="form-control" placeholder="Digite la Universidad">
                                                            </div><!-- .form-group -->
                                                        </div><!--.col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Tarjeta profesional</label>
                                                                <input name="tarjetaprofesional" id="tarjetaprofesional" type="text" class="form-control" placeholder="Digite n&uacute;mero tarjeta profesional">
                                                            </div><!-- .form-group -->
                                                        </div><!--.col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Registro</label>
                                                                <input name="registro" id="registro" type="text" class="form-control" placeholder="Digite n&uacute;mero registro">
                                                            </div><!-- .form-group -->
                                                        </div><!--.col-md-4 -->
                                                        <!-- ***********************************************NombreUsuario y Password Usuario****************************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Usuario*</label>
                                                                <input name='nombreUsuario' id='nombreUsuario' type="text" class="form-control" placeholder="Digite el Usuario" required="required">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Contrase&ntilde;a*</label>
                                                                <input name='password' id='password' type="password" class="form-control" placeholder="Digite la Contrase&ntilde;a" required="required">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                         <!-- **************************************************Roles Usuario**************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Rol Usuario* (ROL_USER sino se suministra)</label>
                                                                <select name='roles' id='roles' class="form-control">
                                                                    <option>Seleccione</option>
                                                                    <option value='1'>Aplicaci&oacute;n</option>
                                                                    <option value='2'>Usuario - Administrador</option>
                                                                </select>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-lg-6">
                											<div class="form-group m-form__group">
                												<label>Firma digital</label>
                												<div></div>
                												<div class="custom-file">
                													<input type="file" id="imagen" name="imagen[]" value="" class="file-upload btn" >
                												</div>
                											</div>
                										</div>
                                                    </div><!-- .row -->
                                                </div><!-- .card-body -->
                                            </div><!-- .card-block -->
                                        </div><!-- .collapse show -->
                                    </div><!-- .card -->
                                    <br>
                                    <div class="col-md-12" style="text-align: center">
                                        <button type="submit" class="btn btn-primary" style='float:right;'>Guardar Cambios</button>
                                    </div><!-- col-md-12 -->
                                </form>
                            </div><!-- .row -->
                        </div><!-- .container-fluid -->
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
    </body>
</html>