<?php   
    include('../directiva.php');
?>

<!DOCTYP html>
<html>
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
	
	    <script src="../js/funciones.js"></script>
	    <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery-1.12.4.js"></script>
        <script src="../js/jquery-ui.js"></script>
        <script src="../js/jquery.timepicker.js"></script>
        <script src="../js/bootstrap-datepicker.min.js"></script>
        <script src="../js/dropzone.js"></script>
        <link rel="stylesheet" href="../css/dropzone.css">
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
                    <?php
                        include("../mod_aplicacion/admin_pacientes_list.php");
                    ?>
               </div> <!-- .container-inner -->                                                         
            </div><!-- .content-container -->
            <?php
                include("../modal/modal_SubirArchivos.php");
                include("../modal/modal_listArchivos.php");
                include("../modal/modal_confirm_del.php");
                include("../modal/modal_exito.php");
                include("../modal/modal_error.php");
                include("../modal/modal_opciones.php");
            ?>
        </div><!-- .page-container -->
        
        <div id="ajax-modal" class="modal fade"></div><!-- .modal -->
        <script type="text/javascript">
        
        $(document).ready(function(){
            $("#cerrar").on("click",function(){
                location.reload();
            });
        });
            
            var dropzone = new Dropzone("#archivos",{url:"subirArchivo.php"});
            dropzone.on("queuecomplete", function (file) { alert("All files have uploaded "); });
            
            Dropzone.options.dropzone = {
            maxFilesize: 5,
            addRemoveLinks: true,
            dictResponseError: 'Server not Configured',
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg"
          };
        </script>

        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../vendor/datatables/jquery.dataTables.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
        
        <script src="../js/sb-admin.min.js"></script>
        <script src="../js/sb-admin-datatables.min.js"></script>

    </body>
</html>