<?php
    include('../directiva.php');
    $idpaciente = $_GET['var'];
    $idcita     = $_GET['cita'];
    $idhistoria = $_GET['idhistoria'];

    ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=shift_jis">

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
    </head>
    <body>
        <div class="page-container">
            <?php
                include('menu.php');
            ?>
            <div class="content-container">

                <div class="page-title">
                    <div class="mobile-menu">
                        <a href="#"><i class="fa fa-bars"></i> </a>
                    </div><!-- .mobile-menu -->
                    <div class="pull-left">
                        <h3>Apa Autismo Cali</h3>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo $cms['base-ure'];?>">Panel de Administrador</a> </li>
                        </ol> <!-- breadcrumb -->
                    </div><!-- pull-left -->
                </div> <!-- page-title -->

                <div class="content-inner">
                    <div class="stat-boxes">
                        <div class="container-fluid">
                            <div class="col-lg-12">
                                <form id="formUPAnamnesis" role="form" method="post" action="" name="datos">

                                    <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                    <input name="idcita"     id="idcita"     type="hidden" class="form-control" value="<?php echo"$idcita";?>">
                                    <input name="idhistoria" id="idhistoria" type="hidden" class="form-control" value="<?php echo"$idhistoria";?>">

                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePaciente" aria-expanded="true" aria-controls="collapsePaciente">
                                                <h5>Datos Paciente</h5>
                                            </a>
                                        </div><!-- card-header -->

                                        <div id="collapsePaciente" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="card-block">
                                                <div class="card-body">
                                                    <!-- ********************************************Fecha Programcion ***********************************************************************-->
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="fechaProgramacion">Fecha Programaci&oacute;n</label>
                                                                <input type="text" name="fechaProgramacion" id="fechaProgramacion" class="date-picker form-control" placeholder="yyyy-dd-mm">
                                                            </div><!-- form-group -->
                                                        </div><!-- col-md-3 -->
                                                    </div><!-- row -->
                                                    <!-- ******************************************************************Datos Paciente********************************************************************************** -->
                                                    <div class="row">
                                                        <!--*********************************************************************Datos Documento ******************************************************************************* -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="pacienteIdTipoDocumento">Tipo de Documento</label>
                                                                <input name='pacienteIdTipoDocumento' id='pacienteIdTipoDocumento' type="text" class="form-control">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="pacienteDocumento">Documento</label>
                                                                <input name='pacienteDocumento' id='pacienteDocumento' type="text" class="form-control">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ************************************************************** Nombres y Apellidos ******************************************************************************************************** -->
                                                        <div class="form-group">
                                                            <label for="pacienteNombres">Nombres</label>
                                                            <input name='pacienteNombres' id='pacienteNombres' type="text" class="form-control">
                                                        </div><!-- .form-group -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="pacientePrimerApellido">Primer apellido</label>
                                                                <input name='pacientePrimerApellido' id='pacientePrimerApellido' type="text" class="form-control">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="pacienteSegundoApellido">Segundo apellido</label>
                                                                <input name='pacienteSegundoApellido' id='pacienteSegundoApellido' type="text" class="form-control">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ****************************************************************Fecha Nacimiento y Edad *************************************************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="pacienteFechaNacimiento">Fecha de Nacimiento</label><br>
                                                                <input type='text' name='pacienteFechaNacimiento' id='pacienteFechaNacimiento' class="date-picker form-control">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="pacienteEdad">Edad</label>
                                                                <input name='pacienteEdad' id='pacienteEdad' type="text" class="form-control">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ****************************************************************EPS*************************************************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="pacienteEps">EPS</label>
                                                                <input name='pacienteEps' id='pacienteEps' type="text" class="form-control">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <!-- ****************************************************************Escolaridad*************************************************************************************************** -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="pacienteEscolaridad">Escolaridad</label>
                                                                <input name='pacienteEscolaridad' readonly id='pacienteEscolaridad' type="text" class="form-control">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="pacienteInstitucion">Instituci&oacute;n Educativa</label>
                                                                <input name='pacienteInstitucion' id='pacienteInstitucion' type="text" class="form-control">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="pacienteGrado">Grado</label>
                                                                <input name='pacienteGrado' id='pacienteGrado' type="text" class="form-control">
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="pacienteDominancia">Dominancia</label>
                                                                <select name="pacienteDominancia" id="pacienteDominancia" class="form-control">
                                                                    <option value=''>Seleccione</option>
                                                                    <option value='1'>Ninguna</option>
                                                                    <option value='2'>Derecha</option>
                                                                    <option value='3'>Izquierda</option>
                                                                </select>
                                                            </div><!-- .form-group -->
                                                        </div><!-- .col-md-4 -->
                                                    </div><!-- row -->
                                                </div><!-- card-body -->
                                            </div><!-- card-block -->
                                        </div><!-- collapse show -->
                                    </div><!-- card -->
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
                                                                <label for="remitidoRemision">Remitido por:</label>
                                                                <input name='remitidoRemision' id='remitidoRemision' type="text" class="form-control">
                                                            </div><!-- form-group -->
                                                        </div> <!-- col-md-12 -->
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="motivoRemision">Motivo</label>
                                                                <textarea class="form-control" rows="3" name="motivoRemision" id="motivoRemision"></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-md-12 -->
                                                    </div> <!-- row -->
                                                </div><!-- .card-body -->
                                            </div><!-- .card-block -->
                                        </div><!-- .collapse show -->
                                    </div><!-- .card -->
                                    <!-- ***********************************************    Estructura Familiar  ************************************************************************* -->
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingEstrucFam">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEstrucFam" aria-expanded="true" aria-controls="collapseEstrucFam">
                                                <h5 class="mb-0">Estructura Familiar</h5>
                                            </a>
                                        </div><!-- .card-header -->
                                        <div id="collapseEstrucFam" class="collapse show" role="tabpanel" aria-labelledby="headingEstrucFam">
                                            <div class="card-block">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label>Parientes que viven con el niño (a)</label>
                                                                <div class="row" id="constitucion">
                                                                </div><!-- row -->
                                                            </div><!-- form-group -->
                                                        </div><!-- col-md-10 -->
                                                    </div><!-- row -->
                                                </div><!-- card-body -->
                                            </div><!-- card-block -->
                                        </div><!-- collapse show -->
                                    </div><!-- card -->
                                    <!-- ***********************************************    Antecedentes Familiares  ************************************************************************* -->
                                    <div class="card ">
                                        <div class="card-header" role="tab" id="headingAntecedentesFamiliares">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseAntecedentesFamiliares" aria-expanded="true" aria-controls="collapseAntFam">
                                                <h5 class="mb-0">Antecedentes Familiares </h5>
                                            </a>
                                        </div><!-- .card-header -->
                                        <div id="collapseAntecedentesFamiliares" class="collapse show" role="tabpanel" aria-labelledby="headingAntecedentesFamiliares">
                                            <div class="card-block">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input name="idantecedente2" id="idantecedente2" type="hidden" class="form-control" >
                                                                <label for="lineamaterna">L&iacute;nea Materna</label>
                                                                <textarea class="form-control" rows="3" name="lineamaterna" id="lineamaterna"></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col0-md-6 -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="lineapaterna">L&iacute;nea Paterna</label>
                                                                <textarea class="form-control" rows="3" name="lineapaterna" id="lineapaterna"></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-md-6 -->
                                                    </div><!-- row -->
                                                </div><!-- .card-body -->
                                            </div><!-- .card-block -->
                                        </div><!-- .collapse show -->
                                    </div><!-- card -->
                                    <!-- ***********************************************    Antecedentes Paciente   ************************************************************************* -->
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingAntecentesPatologicos">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseAntecedentesPatologicos" aria-expanded="true" aria-controls="collapseAntPato">
                                                <h5 class="mb-0">Antecedentes  Paciente</h5>
                                            </a>
                                        </div><!-- card-header -->
                                        <!-- ***********************************************    Antecedentes  Patologicos  ************************************************************************* -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="antpatologicos">Patol&oacute;gicos</label>
                                                <textarea class="form-control" rows="3" name="antpatologicos" id="antpatologicos"></textarea>
                                            </div><!--form-group-->
                                        </div><!--col-md-12 -->
                                        <!-- ***********************************************    Antecedentes Quirurgicoss  ************************************************************************* -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="antquirurgicos">Quir&uacute;rgicos</label>
                                                <textarea class="form-control" rows="3" name="antquirurgicos" id="antquirurgicos"></textarea>
                                            </div><!--form-group-->
                                        </div><!--col-md-12-->
                                        <!-- ***********************************************    Antecedentes Farmacologicos  ************************************************************************* -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="antfarmacologicos">Farmacol&oacute;gicos</label>
                                                <textarea class="form-control" rows="3" name="antfarmacologicos" id="antfarmacologicos"></textarea>
                                            </div><!--form-group-->
                                        </div><!--col-md-12-->
                                        <!-- ***********************************************    Antecedentes Terapeuticos  ************************************************************************* -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="antterapeuticos">Terap&eacute;uticos</label>
                                                <textarea class="form-control" rows="3" name="antterapeuticos" id="antterapeuticos"></textarea>
                                            </div><!--form-group-->
                                        </div><!--col-md-12-->
                                    </div><!-- card -->
                                    <!-- *********************************************** Antecedentes Prenatales************************************************************************* -->
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
                                                                <label for="embrPrevios">Embarazos previos</label>
                                                                <select name='embrPrevios' id='embrPrevios' class="form-control">
                                                                    <option>Seleccione</option>
                                                                    <option value='S'>Si</option>
                                                                    <option value='N'>No</option>
                                                                </select>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input name="idantecedente4" id="idantecedente4" type="hidden" class="form-control" >
                                                                <label for="embrDuracion">Duraci&oacute;n Embarazo</label>
                                                                <input  name='embrDuracion' id='embrDuracion' type="text" class="form-control" >
                                                            </div><!-- form-group -->
                                                        </div><!-- col-md-4 -->

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="amenAborto">Amenaza de aborto</label>
                                                                <select name='amenAborto' id='amenAborto' class="form-control">
                                                                    <option>Seleccione</option>
                                                                    <option value='S'>Si</option>
                                                                    <option value='N'>No</option>
                                                                </select>
                                                            </div><!-- form-group -->
                                                        </div><!-- col-md-4 -->
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="obsParto">Observaciones del parto</label>
                                                                <textarea class="form-control" rows="3" name="obsParto" id="obsParto"></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!--col-md-8 -->
                                                    </div><!-- row -->
                                                </div><!-- card-body -->
                                            </div><!-- card-block -->
                                        </div><!-- collapse -->
                                    </div><!-- card -->
                                    <!-- *********************************************** Antecedentes Posnatales************************************************************************* -->
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
                                                                <label for="peso">Peso</label>
                                                                <input name='peso' id='peso' type="text" class="form-control" >
                                                            </div><!-- form-group -->
                                                        </div><!-- col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="talla">Talla</label>
                                                                <input name='talla' id='talla' type="text" class="form-control" >
                                                            </div><!-- form-group -->
                                                        </div><!-- col-md-4 -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="incubadora">Incubadora</label>
                                                                <input name='incubadora' id='incubadora' type="text" class="form-control" >
                                                            </div><!-- form-group -->
                                                        </div><!-- col-md-4 -->
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="obsPosnatal">Observaciones </label>
                                                                <textarea class="form-control" rows="3" name="obsPosnatal" id="obsPosnatal"></textarea>
                                                            </div><!-- form-group -->
                                                        </div><!--col-md-8 -->
                                                    </div><!-- row -->
                                                </div><!-- card-body -->
                                            </div><!-- card-block -->
                                        </div><!-- collapse -->
                                    </div><!-- card -->
                                </form><!-- form -->
                            </div><!-- col-lg-12 -->
                        </div><!-- container-fluid -->
                    </div><!-- stat-boxes -->
                </div><!-- content-inner -->
            </div><!--- container -->
        </div><!-- page-container -->
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
        <script src="../js/funciones_historia_teo.js"></script>
        <script type="javascript">
            var idpaciente      = document.getElementById("idpaciente").value;
            var idcita          = document.getElementById("idcita").value;
            var idhistoria      = document.getElementById("idhistoria").value;

            cargarDatosPaciente(idpaciente);
            cargarFechaProgramacion(idpaciente);
        </script>


    </body>
</html>
