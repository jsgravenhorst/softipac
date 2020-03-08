<?php 
    include('../directiva.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo"$lb_tit_app"?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="../css/font-awesome.min.css" rel="stylesheet">         
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="../wysihtml5/css/bootstrap.min.css"></link>
		<link rel="stylesheet" type="text/css" href="../wysihtml5/css/prettify.css"></link>
		<link rel="stylesheet" type="text/css" href="../wysihtml5/css/bootstrap-wysihtml5.css"></link>
    </head>
    
    <body>
        <div class="page-container">
            
            <?php
                $mi_pagina="Proyectos";
    		    include('menu.php');
                $varproyecto    = $_GET['var'];
                echo"<input name='varproyecto' id='varproyecto' type='hidden' class='form-control' value='$varproyecto'>";
    		?>
            
            <div class="content-container">
                <?php include('header_panel.php');?>
                
                <div class="content-inner">
                    <div id="mensajeproyecto"></div>
                    <div class="card mb-3">
                        <div class="card-header"><i class="fa fa-table"></i> <?php echo"$lb_proyectos_conf";?></div>
                        <div class="card-body">
                            <div class="col-lg-12">   
                                <form id="actualizaProyecto" role="form" method='post'  action='' enctype='mulipart/form-data' name='datos'>
                                    <div class="row" id="proyectocon">
                                        <div class='col-lg-4'>
                                            <div class='form-group'>
                                                <label for='ejemplo_email_1'>Idioma </label>
                                                <input name='idproyecto' id='idproyecto' type='hidden' class='form-control' >
                                                <input name='idproyectidioma' id='idproyectidioma' type='hidden' class='form-control' >
                                                <input name='nombrecarpeta' id='nombrecarpeta' type='hidden' class='form-control'>
                                                <input readonly name='nombreidioma' id='nombreidioma' type='text' class='inputArea form-control' onKeyUp='this.value=this.value.toUpperCase();'  value=''>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class='col-md-4'>
                                            <div class='form-group'>
                                                <label>Imagen Actual</label>
                                                <input readonly name='imagenproy' id='imagenproy' type='text' class='inputArea form-control' value=''>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class='form-group'>
                                                <label>Cambiar Imagen</label>
                                                <input type='file' id='imagen' name='imagen[]'  value=''  class='inputArea file-upload '>
                                            </div>
                                        </div>
                                        
                                        <div class='col-md-12'>
                                            <div class='hero-unit form-group'>
                                                <label>Nombre Proyecto</label>
                                                <textarea name='nombre' id='nombre' class='textarea form-control' rows='1'></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class='col-md-12'>
                                            <div class='hero-unit form-group'>
                                                <label>Descripci&oacute;n corta del Proyecto</label>
                                                <textarea class='textarea form-control' name='desccorta' id='desccorta' rows='3'></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class='col-md-12'>
                                            <div class='hero-unit form-group'>
                                                <label>Descripci&oacute;n del Proyecto</label>
                                                <textarea class='textarea form-control' name='descripcion' id='descripcion' rows='5'></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class='col-md-12'>
                                            <div class='hero-unit form-group'>
                                                <label>Nombre del Cliente</label>
                                                <textarea name='cliente' id='cliente' class='textarea form-control' rows='1'></textarea>
                                            </div>
                                        </div>
                                        <div class='col-md-12'>
                                            <div class='hero-unit form-group'>
                                                <label>Tecnolog&iacute;as</label>
                                                <textarea class='textarea form-control' name='tecnologias' id='tecnologias' rows='5'></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="submit" name="actualizar"  class="btn2 btn-primary2" style='float:right;'>Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
               </div> <!-- .container-inner -->                                                         
            </div><!-- .content-container -->
            <div class='cargando'>
              <img src="../images/load.gif" ><h3>Procesando datos por favor espere...</h3>
            </div>                                                          
        </div><!-- .page-container -->
        
        <script src="../js/chosen/chosen.jquery.min.js"></script>
        <script src="../js/jquery.form.min.js"></script>
        <script src="../js/validation/formValidation.min.js"></script>
        <script src="../js/validation/bootstrap.min.js"></script>
        <script src="../js/moment.min.js"></script>
        <script src="../js/datepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="../js/bootbox.min.js"></script>
        <script src="../js/jquery.site.js"></script>
        
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../vendor/datatables/jquery.dataTables.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
        <script src="../js/sb-admin.min.js"></script>
        <script src="../js/sb-admin-datatables.min.js"></script>
        <script src="../js/funciones.js"></script>
        		
        <script src="../wysihtml5/js/wysihtml5-0.3.0.js"></script>
		<script src="../wysihtml5/js/jquery-1.7.2.min.js"></script>
		<script src="../wysihtml5/js/prettify.js"></script>
		<script src="../wysihtml5/js/bootstrap-wysihtml5.js"></script>

		<script>
			$('.textarea').wysihtml5();
		</script>

		<script type="text/javascript" charset="utf-8">
			$(prettyPrint);
		</script>
		
        <script type"javascript">
            var valor = document.getElementById("varproyecto").value;
            cargarProyectosMod(valor);
        </script>
    </body>

</html>