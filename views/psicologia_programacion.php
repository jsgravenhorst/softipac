<?php   
    include('../directiva.php');
    $idpaciente     = $_GET['idpaciente'];
    $nompaciente    = $_GET['nompaciente'];
    $usuario        = $_SESSION['nom_usuario'];
    $idusuario      = $_SESSION['idusuario'];
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
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="../js/jquery-1.12.4.js"></script>
        <script src="../js/jquery-ui.js"></script>
        <script src="../js/jquery.timepicker.js"></script>
        <script src="../js/bootstrap-datepicker.min.js"></script>
        
    	 <script>
    			$(function() {
    			$('#fecha').datepicker();
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
                                    
                                    <!-- ********************** TAB PANEL IDENTIFICACION ********************** -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="identificacion">
                                            <form id="formProgramacion" role="form" method='post'  action='' name='datos'>
                                                <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                                <input name="idusuario" id="idusuario" type="hidden" class="form-control" value="<?php echo"$idusuario";?>">
                                                <input name="idedit" id="idedit" type="hidden" class="form-control">
                                                <input name="idprogramacion" id="idprogramacion" type="hidden" class="form-control">
                                                <!-- *********************************************** PACIENTE ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingTwo">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePaciente" aria-expanded="true" aria-controls="collapsePaciente">
                                                            <h5 class="mb-0">PROGRAMACI&Oacute;N EVALUACI&Oacute;N <?php echo"$nompaciente";?></h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsePaciente" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Fecha Cita *</label><br>
                                                                            <input name="fecha" id="fecha" type="text" placeholder="yyyy-dd-mm" required="required" class="date-picker form-control">
                                                                        </div> <!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Hora Inicial *</label><br>
                                                                            <input name="horaini" id="horaini" type="text" class="form-control" required="required">
                                                                            <!--<select name="horacita" id="horacita" class="form-control">
                                                                                <option>Seleccione</option>
                                                                            </select>-->
                                                                        </div><!-- .form-group -->
                                                                    </div> <!-- .col-md-2 -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Hora Final *</label><br>
                                                                            <input name="horafin" id="horafin" type="text" class="form-control" required="required">
                                                                            <!--<select name="horacita" id="horacita" class="form-control">
                                                                                <option>Seleccione</option>
                                                                            </select>-->
                                                                        </div><!-- .form-group -->
                                                                    </div> <!-- .col-md-2 -->
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Area </label><br>
                                                                            <select required="required" name="area" id="area" class="form-control">
                                                                                <option value="">Seleccione</option>
                                                                                <option value="1">Psicolog&iacute;a</option>
                                                                                <option value="2">Fisioterapia</option>
                                                                                <option value="3">Fonoaudiolog&iacute;a</option>
                                                                                <option value="4">Educaci&oacute;n Especial</option>
                                                                                <option value="5">Terapia Ocupacional</option>
                                                                                <option value="6">Informaci&oacute;n</option>
                                                                                <option value="7">Todos los Terapeutas</option>
                                                                            </select>
                                                                        </div><!-- .form-group -->
                                                                    </div> <!-- .col-md-2 -->
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Profesional </label><br>
                                                                            <select name="profesional" id="profesional" class="form-control">
                                                                                <option value="">Seleccione</option>
                                                                            </select>
                                                                        </div><!-- .form-group -->
                                                                    </div> <!-- .col-md-2 -->
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Lugar de Evaluci&oacute;n</label>
                                                                            <input name='lugarevaluacion' id='lugarevaluacion' type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <textarea class="form-control" rows="5" name="observaciones" id="observaciones"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <!-- ***********************************************Card Motivo Consulta************************************************************************* -->
                                                
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingMotivoConsulta">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseMotivoConsulta" aria-expanded="true" aria-controls="collapseMotivoConsulta">
                                                            <h5 class="mb-0">Listado de Programaci&oacute;n</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseMotivoConsulta" class="collapse show" role="tabpanel" aria-labelledby="headingMotivoConsulta">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div id="listprogramacion" style=" max-height: calc(80vh - 210px); overflow-y: auto;"></div>
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->
                                                
                                                <div class="modal-footer">
                                                    <button type="button"  class="btn btn-primary" onclick="generarProgramacionPdf(<?php echo"$idpaciente";?>);"><i class="fa fa-file"> </i>&nbsp; Imprimir Programación</button>
                                                    <button type="submit" id="btn_guardar" class="btn btn-primary" data-toggle="modal" >Guardar</button>
                                                </div><!-- .modal-footer -->
                                            
                                            </form>    
                                        </div> <!-- FIN TAB-->
                                      
                                    </div>
                                </div><!-- col-md-12-->
                            </div><!-- row -->
                        </div><!-- /.container-fluid --> 
                    </div><!-- .stat-boxes -->
                </div> <!-- .container-inner -->                                                         
            </div><!-- .content-container -->                                                            
        </div><!-- .page-container -->
        
        <?php
            include("../modal/modal_exito.php");
            include("../modal/modal_error.php");
            include("../modal/modal_confirm_del.php");
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
            
            var idpaciente  = document.getElementById("idpaciente").value;
            var idusuario   = document.getElementById("idusuario").value;
            
            $.post("../mod_aplicacion/admin_psicologia_list_prog.php",{idusuario:idusuario,idpaciente:idpaciente},function(data){
                $("#listprogramacion").html(data);
                $("#idedit").val("");
            });
            
            function editarProgramacion(idprogramacion, idusuario,idpaciente,idarea){
                $("#idedit").val(1);
                $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"editarProgramacion", idprogramacion:idprogramacion,idpaciente:idpaciente, idusuario:idusuario, idarea:idarea},function(data){
                    for (var i in data)
                    {
                        datos = data[i];
                        $("#idprogramacion").val(datos.idprogramacion);
                        $("#fecha").val(datos.fecha);
                        $("#horaini").val(datos.horaini);
                        $("#horafin").val(datos.horafin);
                        $("#lugarevaluacion").val(datos.lugarevaluacion);
                        $("#observaciones").val(datos.observacion);
                        $("#area").val(datos.area);
                        var idareamod = datos.area;
                        if (idareamod != 6 && idareamod != 7 )
                        {
                            $("#profesional").html('<option value="'+datos.usuario_idusuario2+'">'+datos.nombre_terapeuta+'</option>');
                            cargarProfesional(idareamod,2);
                        }else
                            $("#profesional").html('<option value="">Seleccione</option>');
                        }
                },'json');
            }
            
            function eliminarProgramacion(idprogramacion) {

                $("#modal_confirm_del").modal("show");
                $("#textorespuesta").html("Con &eacute;sta operaci&oacute;n eliminar&aacute; el registro ");
                $("#modal-btn-si").on("click", function(){
                    $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"eliminarProgramacion",idprogramacion:idprogramacion},function(data){
                        if(data == "success"){
                            $('#modal_exito').modal('show');
                            location.reload();
                        }else{
                            $('#modal_error').modal('show');
                        }
                    });
                });
                $("#modal-btn-no").on("click", function(){
                    $("#modal_confirm_del").modal('hide');
                });
            }
            
            function cargarProfesional(idarea, opcion){
                $.post("../mod_aplicacion/admin_programacion.php",{idarea:idarea, opcion:opcion},function(data){
                    for(var i in data){
                        $.each(data[i], function( key, value ) {
                            var opt = "<option value='"+value.id+"'>"+value.nombre+"</option>";
                            $("#profesional").append(opt);
                        });
                    }
                },'json'); 
            }
            
            
            $("#area").change(function () {
		           $("#area option:selected").each(function () {
		            idarea = $(this).val();
		            var opcion = 1;
	                $.post("../mod_aplicacion/admin_programacion.php",{idarea:idarea, opcion:opcion},function(data){
                        $("#profesional").html(data);
                    });

		        });
		    });

        </script>
        
    </body>
</html>