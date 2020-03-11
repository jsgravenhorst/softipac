<?php
    include('../directiva.php');
    $idpaciente     = $_GET['var'];
    $idcita         = $_GET['cita'];
    $idhist         = $_GET['idhist'];
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
                $('#fechaIngreso').datepicker();
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
                                            <a class="nav-link active" href="#anamnesis" role="tab" data-toggle="tab">ANAMNESIS</a>
                                        </li>
                                    </ul>

                                    <!-- ********************** TAB PANEL IDENTIFICACION ********************** -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="anamnesis">
                                            <form id="formUPAnamnesisTO" role="form" method='post'  action='' name='datos'>

                                                <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                                <input name="idcita" id="idcita" type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                                <input name="idhist" id="idhist" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
                                                <input name="idhistoriapsico" id="" type="hidden" class="idhistoriapsico form-control" >

                                                <!-- *********************************************** PACIENTE ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingTwo">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePaciente" aria-expanded="true" aria-controls="collapsePaciente">
                                                            <h5 class="mb-0">Identificaci&oacute;n</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsePaciente" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">

                                                                    <!-- ***********************************************Nombres y Apellidos Paciente************************************************************************* -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Fecha:</label><br>
                                                                            <input readonly type='text' name='fechaCitaIni' id='fechaCitaIni' class="date-picker form-control" placeholder="yyyy-dd-mm">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Nombres:</label>
                                                                            <input name='pacienteNombres' readonly id='pacienteNombres' type="text" class="form-control" placeholder="Digite el(los) Nombre(s)" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Primer apellido:</label>
                                                                            <input name='pacientePrimerApellido' readonly id='pacientePrimerApellido' type="text" class="form-control" placeholder="Digite el Primer Apellido" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Segundo apellido:</label>
                                                                            <input name='pacienteSegundoApellido' readonly id='pacienteSegundoApellido' type="text" class="form-control" placeholder="Digite el Segundo Apellido">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <!-- ***********************************************Fecha Nacimiento Paciente************************************************************************* -->

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Fecha de nacimiento:</label><br>
                                                                            <input type='text' name='pacienteFechaNacimiento' readonly id='pacienteFechaNacimiento' class="date-picker form-control" placeholder="yyyy-dd-mm" required="required">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Edad:</label><br>
                                                                            <input type='text' name='pacienteEdad' readonly id='pacienteEdad' class="date-picker form-control">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Tipo de documento:</label>
                                                                            <input name='pacienteIdTipoDocumento' readonly id='pacienteIdTipoDocumento' type="text" class="form-control">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>N&uacute;mero de documento:</label>
                                                                            <input name='pacienteDocumento' readonly id='pacienteDocumento' type="text" class="form-control">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>EPS:</label>
                                                                            <input name='pacienteEps' readonly id='pacienteEps' type="text" class="form-control">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Escolaridad:</label>
                                                                            <input name='pacienteEscolaridad' readonly id='pacienteEscolaridad' type="text" class="form-control">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Instituci&oacute;n:</label>
                                                                            <input name='pacienteInstitucion' id='pacienteInstitucion' type="text" class="form-control" placeholder="Digite el nombre del lugar ">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Grado:</label>
                                                                            <input name='pacienteGrado' id='pacienteGrado' type="text" class="form-control" placeholder="Digite el grado">
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Dominancia</label>
                                                                            <select name='pacienteDominancia' id='pacienteDominancia' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='N'>Ninguna</option>
                                                                                <option value='D'>Derecha</option>
                                                                                <option value='I'>Izquierda</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->

                                                <!-- ***********************************************    MOTIVO DE CONSULTA    ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingMotivoConsulta">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseMotivoConsulta" aria-expanded="true" aria-controls="collapseMotivoConsulta">
                                                            <h5 class="mb-0">Motivo de Consulta</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseMotivoConsulta" class="collapse show" role="tabpanel" aria-labelledby="headingMotivoConsulta">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Remitido por:</label>
                                                                            <input name='remitidoRemision' id='remitidoRemision' type="text" readonly class="form-control" placeholder="Remitido por">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Motivo</label>
                                                                            <textarea class="form-control" rows="3" readonly name="motivoRemision" id="motivoRemision"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->

                                                <!-- *********************************************** ESTRUCTURA FAMILIAR    ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingDatosPadre">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDatosPadre" aria-controls="collapseDatosPadre">
                                                            <h5 class="mb-0">Estructura Familiar</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseDatosPadre" class="collapse" role="tabpanel" aria-labelledby="headingDatosPadre">
                                                        <div class="card-block">
                                                            <div class="card-body">

                                                                <div class="row">

                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label><b>Parentesco</b></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label><b>Nombres</b></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label><b>Edad</b></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label><b>Ocupaci&oacute;n</b></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="row" id="constitucion">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->

                                                <!-- *********************************************** ANTECEDENTES FAMILIARES    ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingAntecedentesFamiliares">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAntecedentesFamiliares" aria-controls="collapseAntecedentesFamiliares">
                                                            <h5 class="mb-0">Antecedentes Familiares</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseAntecedentesFamiliares" class="collapse" role="tabpanel" aria-labelledby="headingAntecedentesFamiliares">
                                                        <div class="card-block">
                                                            <div class="card-body">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>L&iacute;nea materna:</label>
                                                                            <textarea class="form-control" rows="3" name="lineamaterna" id="lineamaterna"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>L&iacute;nea paterna:</label>
                                                                            <textarea class="form-control" rows="3" name="lineapaterna" id="lineapaterna"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->

                                                <!-- *********************************************** ANTECEDENTES PACIENTE    ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingAntecedentesPaciente">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAntecedentesPaciente" aria-controls="collapseAntecedentesPaciente">
                                                            <h5 class="mb-0">Antecedentes Paciente</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseAntecedentesPaciente" class="collapse" role="tabpanel" aria-labelledby="headingAntecedentesPaciente">
                                                        <div class="card-block">
                                                            <div class="card-body">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Personales:</label>
                                                                            <textarea class="form-control" rows="3" name="antPersonales" id="antPersonales"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Patol&oacute;gicos:</label>
                                                                            <textarea class="form-control" rows="3" name="antPatologicos" id="antPatologicos"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Quir&uacute;rgicos:</label>
                                                                            <textarea class="form-control" rows="3" name="antQuirurgicos" id="antQuirurgicos"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Farmacol&oacute;gicos:</label>
                                                                            <textarea class="form-control" rows="3" name="antFarmacologicos" id="antFarmacologicos"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->

                                                <!-- *********************************************** ANTECEDENTES TERAPEUTICOS    ************************************************************************* -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingAntecedentesTerapeuticos">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAntecedentesTerapeuticos" aria-controls="collapseAntecedentesTerapeuticos">
                                                            <h5 class="mb-0">Antecedentes Terap&eacute;uticos</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseAntecedentesTerapeuticos" class="collapse" role="tabpanel" aria-labelledby="headingAntecedentesTerapeuticos">
                                                        <div class="card-block">
                                                            <div class="card-body">

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Duraci&oacute;n:</label>
                                                                            <input name='antDuracion' id='antDuracion' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Instituci&oacute;n:</label>
                                                                            <input name='antInstitucion' id='antInstitucion' type="text" class="form-control" >
                                                                        </div><!-- .form-group -->
                                                                    </div><!-- .col-md-4 -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>&iquest;Qu&eacute; se trabaj&oacute;?:</label>
                                                                            <textarea class="form-control" rows="3" name="antquetrabajo" id="antquetrabajo"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .row -->
                                                            </div><!-- .card-body -->
                                                        </div><!-- ."card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->


                                                <!-- ***********************************************Card Antecedentes Prenatales************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingAntecedentesPrenatales">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAntecedentesPrenatales" aria-expanded="true" aria-controls="collapseAntecedentesPrenatales">
                                                            <h5 class="mb-0">Antecedentes Prenatales</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapseAntecedentesPrenatales" class="collapse" role="tabpanel" aria-labelledby="headingAntecedentesPrenatales">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Embarazos previos:</label>
                                                                            <select name='embprevios' id='embprevios' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <input name="idantecedente4" id="idantecedente4" type="hidden" class="form-control" >
                                                                            <label>Duraci&oacute;n Embarazo</label>
                                                                            <input readonly='readonly' name='duracion' id='duracion' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Amenaza de aborto</label>
                                                                            <select readonly='readonly' name='abortivas' id='abortivas' class="form-control">
                                                                                <option>Seleccione</option>
                                                                                <option value='S'>Si</option>
                                                                                <option value='N'>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Observaciones del parto:</label>
                                                                            <textarea class="form-control" rows="3" name="observacionesparto" id="observacionesparto"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                </div><!-- .card -->


                                                <!-- ***********************************************Card Postnatales************************************************************************* -->
                                                <div class="card ">
                                                    <div class="card-header" role="tab" id="headingPostnatales">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePostnatales" aria-expanded="true" aria-controls="collapsePostnatales">
                                                            <h5 class="mb-0">Antecedentes Postnatales</h5>
                                                        </a>
                                                    </div><!-- .card-header -->
                                                    <div id="collapsePostnatales" class="collapse" role="tabpanel" aria-labelledby="headingPostnatales">
                                                        <div class="card-block">
                                                            <div class="card-body">
                                                                <div class="row">

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Talla</label>
                                                                            <input readonly='readonly' name='talla' id='talla' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Peso</label>
                                                                            <input readonly='readonly' name='peso' id='peso' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Incubadora</label>
                                                                            <input readonly='readonly' name='incubadora' id='incubadora' type="text" class="form-control" >
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Observaciones</label>
                                                                            <textarea class="form-control" rows="3" name="obsrposnatal" id="obsrposnatal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div><!-- .card-body -->
                                                        </div><!-- .card-block -->
                                                    </div><!-- .collapse show -->
                                                    <div class='col-md-12'>
                                                        <div class="button-form">
                                                            <button type="submit" class="btn btn-primary" data-toggle="modal" style='float:right;'>Guardar</button>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->

                                            </form>
                                        </div> <!--fin tab anamnesis-->

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


        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/datatables/jquery.dataTables.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

        <script src="../js/sb-admin.min.js"></script>
        <script src="../js/sb-admin-datatables.min.js"></script>
        <script src="../js/funciones_historia_ocupacional.js"></script>
        <script src="../js/calculaEdad.js"></script>
        <script type"javascript">

        var idpaciente      = document.getElementById("idpaciente").value;
        var idcita          = document.getElementById("idcita").value;
        var idhistoria      = document.getElementById("idhist").value;
        var idtipocita      = 2;

        if(idcita != "" && idtipocita == 2){
        editarCitaInformacion(idpaciente, idcita, idtipocita);
        }

        cargarDatos();
        cargaDatosGenerales(idpaciente,idhistoria);
        cargarConstitucion(idpaciente,"informe");
        cargarHistoriaPsicoId(idpaciente);

        //tab consulta
        cargarInstitucionGradoDominancia(idhistoria);
        cargaMotivo(idpaciente,idhistoria);
        cargaAntFamiliar(idpaciente,idhistoria);
        cargaAntPaciente(idhistoria);
        cargaAntTerapeuticos(idhistoria);
        cargaAntPrenatal(idpaciente);
        cargaAntPrenatalTO(idhistoria);
        cargaAntParto(idpaciente);
        cargaAntPostnatalTO(idhistoria);

        </script>

    </body>
</html>
