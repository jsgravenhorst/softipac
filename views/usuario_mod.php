<?php   
    include('../directiva.php');
    $idusuario = $_SESSION['tipo_usuario'];
    $idusuarioMod   = $_GET['var'];
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
                                <form id="form_UsuarioMod" role="form" method='post'  action='' enctype="multipart/form-data" name='datos'>
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingPaciente">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseDatosPaciente" aria-expanded="true" aria-controls="collapseDatosPaciente">
                                                <h5 class="mb-0">Configuraci&oacute;n de Usuarios</h5>
                                            </a>
                                        </div>
                                        <input type="hidden" name="idusuarioMod" id="idusuarioMod" value="<?php echo$idusuarioMod;?>">
                                        <div id="collapseDatosPaciente" class="collapse show" role="tabpanel" aria-labelledby="headingPaciente">
                                            <div class="card-block">
                                                <div class="card-body" id="usuariomod">
                                                    
                                                    
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
        
        <script type"javascript">
            var idusuario = document.getElementById("idusuarioMod").value;
            cargarCategoria(idusuario);
            
            function cargarCategoria(idusuario) {
                $.post("../mod_aplicacion/admin_usuarios.php",{opcion:idusuario},function(data){
                    $("#usuariomod").html(data);
                });
            }
        </script>
        
    </body>
</html>