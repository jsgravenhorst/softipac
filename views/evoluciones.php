<?php   
    include('../directiva.php');
    $idpaciente     = $_GET['var'];
    $idcita         = $_GET['cita'];
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
                                    <form id="form_Evolucion" role="form" method='post'  action='' name='datos'>
                                        <!-- *********************************************** Formato de evaluacion de fisioterapia  ************************************************************************* -->
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingFicha">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFicha" aria-expanded="true" aria-controls="collapseFicha">
                                                    <h5 class="mb-12">Evoluciones</h5>
                                                </a>
                                            </div><!-- .card-header -->
                                            <div id="collapseFicha" class="collapse show" role="tabpanel" aria-labelledby="headingFicha">
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            
                                                            <!-- ***********************************************Ficha************************************************************************* -->
                                                            
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>A&ntilde;o</label><br>
                                                                    <select name='pacienteIdGenero' id='pacienteIdGenero' class="form-control">
                                                                        <option>Seleccione</option>
                                                                        <option>2000</option>
                                                                        <option>2001</option>
                                                                        <option>2002</option>
                                                                        <option>2003</option>
                                                                        <option>2004</option>
                                                                        <option>2005</option>
                                                                        <option>2006</option>
                                                                        <option>2007</option>
                                                                        <option>2008</option>
                                                                        <option>2009</option>
                                                                        <option>2010</option>
                                                                        <option>2011</option>
                                                                        <option>2012</option>
                                                                        <option>2013</option>
                                                                        <option>2014</option>
                                                                        <option>2015</option>
                                                                        <option>2016</option>
                                                                        <option>2017</option>
                                                                        <option>2018</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Mes</label><br>
                                                                    <select name='pacienteIdGenero' id='pacienteIdGenero' class="form-control">
                                                                        <option>Seleccione</option>
                                                                        <option>Enero</option>
                                                                        <option>Febrero</option>
                                                                        <option>Marzo</option>
                                                                        <option>Abril</option>
                                                                        <option>Mayo</option>
                                                                        <option>Junio</option>
                                                                        <option>Julio</option>
                                                                        <option>Agosto</option>
                                                                        <option>Septiembre</option>
                                                                        <option>Octubre</option>
                                                                        <option>Noviembre</option>
                                                                        <option>Diciembre</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>D&iacute;a</label><br>
                                                                    <select name='pacienteIdGenero' id='pacienteIdGenero' class="form-control">
                                                                        <option>Seleccione</option>
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                        <option>5</option>
                                                                        <option>6</option>
                                                                        <option>7</option>
                                                                        <option>8</option>
                                                                        <option>9</option>
                                                                        <option>10</option>
                                                                        <option>11</option>
                                                                        <option>12</option>
                                                                        <option>13</option>
                                                                        <option>14</option>
                                                                        <option>15</option>
                                                                        <option>16</option>
                                                                        <option>17</option>
                                                                        <option>18</option>
                                                                        <option>19</option>
                                                                        <option>20</option>
                                                                        <option>21</option>
                                                                        <option>22</option>
                                                                        <option>23</option>
                                                                        <option>24</option>
                                                                        <option>25</option>
                                                                        <option>26</option>
                                                                        <option>27</option>
                                                                        <option>28</option>
                                                                        <option>29</option>
                                                                        <option>30</option>
                                                                        <option>31</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class='col-md-3'>
                                                                <div class="button-form">
                                                                    <button type="submit" class="btn btn-primary" data-toggle="modal" style='float:right;'>Consultar</button>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label><b>Descripci&oacute;n</b></label>
                                                                    <textarea class="tinymce form-control" id="textEvolucion" name="textEvolucion" rows="30" id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-12'>
                                                                <div class="button-form">
                                                                    <!--<button type="submit" class="btn btn-primary" style='float:right;'>Guardar</button>-->
                                                                    <button onclick="actualizaEvoluciones()" class="btn btn-primary" style='float:right;'>Guardar</button>
                                                                    <button type="button" class="btn btn-default" style='float:right;'>Imprimir</button>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
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
		
        <script type"javascript">
            
            /*var idpaciente = document.getElementById("idpaciente").value;
            var idcita = document.getElementById("idcita").value;
            if(idcita != ""){
                editarCita(idpaciente, idcita, 0);
            }
            cargarDatos();*/
            cargaEvoluciones();
            
            function cargaEvoluciones(){
                $.post("../mod_aplicacion/admin_evolucion.php",{opcion:"consultar"},function(data){
                    $("#textEvolucion").html(data);
                });
            }
            
            function guardaEvoluciones(){
                //var texto = $('#tea').val();
                var textEvolucion = tinymce.get('textEvolucion').getContent();
                //var texto document.getElementById('tea').value;
                
                alert("insertadno evolucion "+textEvolucion);
                $.post("../mod_aplicacion/admin_evolucion.php",{opcion:"insertar", textEvolucion:textEvolucion},function(data){
                   
                });
            }
            
            function actualizaEvoluciones(){
                //var texto = $('#tea').val();
                var textEvolucion = tinymce.get('textEvolucion').getContent();
                //var texto document.getElementById('tea').value;
                
                alert("insertadno evolucion "+textEvolucion);
                $.post("../mod_aplicacion/admin_evolucion.php",{opcion:"actualizar", textEvolucion:textEvolucion},function(data){
                   
                });
            }
        </script>
        
    </body>
    

</html>