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
        <script src="../js/dropzone.js"></script>
        <link rel="stylesheet" href="../css/dropzone.css">
        
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
                                                    <h5 class="mb-12">Varios</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseFicha" class="collapse show" role="tabpanel" aria-labelledby="headingFicha">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>Descripci&oacute;n</b></label>
                                                                    <textarea class="tinymce form-control" rows="30" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <div class="button-form">
                                                                    <button type="submit" class="btn btn-primary" style='float:right;'>Guardar</button>
                                                                    <button type="button" class="btn btn-default" style='float:right;'>Imprimir</button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                        
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <!-- Change /upload-target to your upload address -->
                                                                    <form action="subirArchivo.php" class="dropzone" enctype="multipart/form-data">
                                                                        <div class="fallback">
                                                                            <input type="file" name="file" multiple id="archivos">
                                                                        </div>
                                                                        <input type="hidden" id="carpeta" name="carpeta">
                                                                        <div class="listfiles">
                                                                            
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
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
        
        <script type="text/javascript" src="../tinymce/js/jquery.min.js"></script>
		<script type="text/javascript" src="../tinymce/plugin/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="../tinymce/plugin/tinymce/init-tinymce.js"></script>
		
        <!--<script type"javascript">
            
            var idpaciente = document.getElementById("idpaciente").value;
            var idcita = document.getElementById("idcita").value;
            if(idcita != ""){
                editarCita(idpaciente, idcita, 0);
            }
            cargarDatos();
        </script>-->
        
    </body>
    

</html>