<html>
    <link rel="stylesheet" type="text/css" href="../css/jquery.timepicker.css" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker.min.css" />

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
<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
	$db = new DB_Funciones(); 
    
    $opcion = $_POST['opcion'];
    $data = "";
    
    if($opcion == "actualizar"){
        $idusuarioMod           = $_POST['idusuarioMod'];
        $usarioIdTipoDocumento  = $_POST['usarioIdTipoDocumento'];
        $iddocumento            = $_POST['iddocumento'];
    	$documento              = $_POST['documento'];
    	$usuarioNombres         = $_POST['usuarioNombres'];
    	$usuarioPrimerApellido  = $_POST['usuarioPrimerApellido'];
    	$usuarioSegundoApellido = $_POST['usuarioSegundoApellido'];
        $usuarioLugarNacimiento = $_POST['usuarioLugarNacimiento'];
        $usuarioFechaNacimiento = $_POST['usuarioFechaNacimiento'];
        $usuarioEdad            = $_POST['usuarioEdad'];
        $idGenero               = $_POST['idGenero'];
        $usuarioDireccion       = $_POST['usuarioDireccion'];
        $usuarioTelefonoFijo    = $_POST['usuarioTelefonoFijo'];
        $usuarioTelefonoCelular = $_POST['usuarioTelefonoCelular'];
        $usuarioEmail           = $_POST['usuarioEmail'];
    	$usuarioIdEscolaridad   = $_POST['usuarioIdEscolaridad'];
    	$usuarioArea            = $_POST['usuarioArea'];
    	$universidad            = $_POST['universidad'];
        $tarjetaprofesional     = $_POST['tarjetaprofesional'];
        $registro               = $_POST['registro'];
        $nombreUsuario          = $_POST['nombreUsuario'];
        $password               = $_POST['password'];
    	$roles                  = $_POST['roles'];
    	$carpeta = '../firmas';
        
        if (!file_exists($carpeta)) {
            $oldmask = umask(0);
            mkdir($carpeta, 0777);
            umask($oldmask);
        }
        
        if (isset($_FILES['imagen'])){
            $verimagen = $_FILES["imagen"]["name"][$i];
        	$cantidad= count($_FILES["imagen"]["tmp_name"]);
        	
        	for ($i=0; $i<$cantidad; $i++){
            	//Comprobamos si el fichero es una imagen
            	if ($_FILES['imagen']['type'][$i]=='image/png' || $_FILES['imagen']['type'][$i]=='image/jpeg'){
                	move_uploaded_file($_FILES["imagen"]["tmp_name"][$i],$carpeta.'/'.$_FILES["imagen"]["name"][$i]);
                	$validar=true;
            	}
            	else $validar=false;
            }
        }
        
        $imagen = $_FILES["imagen"]["name"][0];
    	
        $update = $db->actualizarUsuario($idusuarioMod,
                                        $usarioIdTipoDocumento,
                                        $iddocumento,
                                    	$documento,
                                        $usuarioNombres,
                                        $usuarioPrimerApellido,
                                        $usuarioSegundoApellido,
                                        $usuarioLugarNacimiento,
                                        $usuarioFechaNacimiento,
                                        $usuarioEdad,
                                        $idGenero,
                                        $usuarioDireccion,
                                        $usuarioTelefonoFijo,
                                        $usuarioTelefonoCelular,
                                        $usuarioEmail,
                                        $usuarioIdEscolaridad,
                                        $usuarioArea,
                                        $universidad,
                                        $tarjetaprofesional,
                                        $registro,
                                        $nombreUsuario,
                                        $password,
                                        $roles,
                                        $imagen);

	  if ( $update ){
			echo true;
		}else{
		    echo false;
		}
    }elseif($opcion == "eliminar"){
        
        $idusuario  = $_POST['idusuario'];

        $delete = $db->eliminarUsuario($idusuario);

      if ( $delete ){
            echo "success";
        }else{
            echo "error";
        }
    }else{
        $idusu = $_POST['opcion'];
        $data = "";
        $cargaUsuariosMod   	= $db->adminCargarUsuarioMod($idusu);
    
        if( $cargaUsuariosMod != false ) 
        {
            for ( $i = 0; $i< sizeof($cargaUsuariosMod); $i++ ) 
            {
                $tipo                       = $cargaUsuariosMod[$i]['tipo'];
                $idtipodocumento            = $cargaUsuariosMod[$i]['idtipodocumento'];
                $documento_iddocumento      = $cargaUsuariosMod[$i]['documento_iddocumento'];
                $nrodocumento               = $cargaUsuariosMod[$i]['documento'];
                $iddocumento                = $cargaUsuariosMod[$i]['iddocumento'];
                $tipousuario_idtipousuario  = $cargaUsuariosMod[$i]['tipousuario_idtipousuario'];
                $tipousuario                = $cargaUsuariosMod[$i]['tipousuario'];
                $estado_idestado            = $cargaUsuariosMod[$i]['estado_idestado'];
                $nombres                    = $cargaUsuariosMod[$i]['nombres'];
                $primerapellido             = $cargaUsuariosMod[$i]['primerapellido']; 
                $segundoapellido            = $cargaUsuariosMod[$i]['segundoapellido'];
                $lugarnacimiento            = $cargaUsuariosMod[$i]['lugarnacimiento'];
                $fechanacimiento            = $cargaUsuariosMod[$i]['fechanacimiento'];
                $edad                       = $cargaUsuariosMod[$i]['edad'];
                $genero_idgenero            = $cargaUsuariosMod[$i]['genero_idgenero'];
                $genero                     = $cargaUsuariosMod[$i]['genero'];
                $direccion                  = $cargaUsuariosMod[$i]['direccion'];
                $telefonofijo               = $cargaUsuariosMod[$i]['telefonofijo'];
                $telefonocelular            = $cargaUsuariosMod[$i]['telefonocelular'];
                $email                      = $cargaUsuariosMod[$i]['email'];
                $escolaridad_idescolaridad  = $cargaUsuariosMod[$i]['escolaridad_idescolaridad'];
                $escolaridad                = $cargaUsuariosMod[$i]['escolaridad'];
                $area_idarea                = $cargaUsuariosMod[$i]['area_idarea'];
                $area                       = $cargaUsuariosMod[$i]['area'];
                $universidad                = $cargaUsuariosMod[$i]['universidad'];
                $tarjetaprofesional         = $cargaUsuariosMod[$i]['tarjetaprofesional'];
                $registro                   = $cargaUsuariosMod[$i]['registro'];
                $nombreusuario              = $cargaUsuariosMod[$i]['nombreusuario'];
                $password                   = $cargaUsuariosMod[$i]['password'];
                $firmadigital               = $cargaUsuariosMod[$i]['firmadigital'];
    			$data           .= '<div class="row">
                                        <!-- **************************************************Datos  Documento Usuario**************************************************************** -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tipo de Documento* (Otro sino se suministra)</label>
                                                <select name="usarioIdTipoDocumento" id="usarioIdTipoDocumento" class="form-control">
                                                    <option value="'.$idtipodocumento.'">'.$tipo.'</option>
                                                    <option value="3">C&eacute;dula de ciudadan&iacute;a</option>
                                                    <option value="4">N&uacute;mero Pasaporte</option>
                                                    <option value="5">C&eacute;dula Extranjer&iacute;a</option>
                                                </select>
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>N&uacute;mero Documento* (0 sino se suministra)</label>
                                                <input name="iddocumento" id="iddocumento" type="hidden" class="form-control" value="'.$iddocumento.'" required="required">
                                                <input name="documento" id="documento" type="number" class="form-control" value="'.$nrodocumento.'" required="required">
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                        <!-- ***********************************************Nombres y Apellidos Usuario************************************************************************* -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombres* (NA sino se suministra)</label>
                                                <input name="usuarioNombres" id="usuarioNombres" type="text" class="form-control" value="'.$nombres.'"  required="required">
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Primer apellido* (NA sino se suministra)</label>
                                                <input name="usuarioPrimerApellido" id="usuarioPrimerApellido" type="text" class="form-control" value="'.$primerapellido.'"  required="required">
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Segundo apellido</label>
                                                <input name="usuarioSegundoApellido" id="usuarioSegundoApellido" type="text" class="form-control" value="'.$segundoapellido.'">
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                         <!-- ***********************************************Lugar de Nacimiento Usuario************************************************************************* -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Lugar de Nacimiento</label>
                                                <input name="usuarioLugarNacimiento" id="usuarioLugarNacimiento" type="text" class="form-control" value="'.$lugarnacimiento.'">
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                         <!-- ***********************************************Fecha de Nacimiento Usuario************************************************************************* -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fecha de Nacimiento* (2017-31-01)</label><br>
                                                <input type="text" name="usuarioFechaNacimiento" id="usuarioFechaNacimiento" class="date-picker form-control" value="'.$fechanacimiento.'" required="required">
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                        <!-- ***********************************************Edad Usuario************************************************************************** -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Edad* (0 sino se suministra)</label>
                                                <input name="usuarioEdad" id="usuarioEdad" type="number" class="form-control" value="'.$edad.'" required="required">
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                       
                                        <!-- **************************************************Datos  Genero Usuario**************************************************************** -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Sexo*</label>
                                                <select name="idGenero" id="idGenero" class="form-control">
                                                    <option value="'.$genero_idgenero.'">'.$genero.'</option>
                                                    <option value="1">Masculino</option>
                                                    <option value="2">Femenino</option>
                                                </select>
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                          <!-- ***********************************************Datos Direccion Usuario************************************************************************* -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Direcci&oacute;n* (NA sino se suministra)</label>
                                                <input name="usuarioDireccion" id="usuarioDireccion" type="text" value="'.$direccion.'" class="form-control" >
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                        <!-- ***********************************************Datos Telefonos Usuario************************************************************************* -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tel&eacute;fono Fijo</label>
                                                <input name="usuarioTelefonoFijo" id="usuarioTelefonoFijo" type="text" class="form-control" value="'.$telefonofijo.'">
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Celular* (0 sino se suministra)</label>
                                                <input name="usuarioTelefonoCelular" id="usuarioTelefonoCelular" type="text" class="form-control" value="'.$telefonocelular.'" required="required">
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                        <!-- ***********************************************Datos Correo Electronico Usuario************************************************************************* -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Correo Electr&oacute;nico</label>
                                                <input name="usuarioEmail" id="usuarioEmail" type="text" class="form-control" value="'.$email.'">
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                        <!-- **************************************************Datos  Escolaridad Usuario**************************************************************** -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Escolaridad* (Otro sino se suministra)</label>
                                                <select name="usuarioIdEscolaridad" id="usuarioIdEscolaridad" class="form-control">
                                                    <option value="'.$escolaridad_idescolaridad.'">'.$escolaridad.'</option>
                                                    <option value="1">Ninguna</option>
                                                    <option value="2">Primaria</option>
                                                    <option value="3">Bachiller</option>
                                                     <option value="5">Profesional</option>
                                                    <option value="6">T&eacute;cnico</option>
                                                    <option value="7">Tecn&oacutelogo</option>
                                                </select>
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                        <!-- ****************************************************** Datos TipoUsario ************************************************************************************* -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Area*</label>
                                                <select name="usuarioArea" id="usuarioArea" class="form-control">
                                                    <option value="'.$area_idarea.'">'.$area.'</option>
                                                    <option value="1">Psicologia</option>
                                                    <option value="2">Fisioterapia</option>
                                                    <option value="3">Fonoaudiologia</option>
                                                    <option value="4">Educaci&oacute;n Especial</option>
                                                    <option value="5">Terapia Ocupacional</option>
                                                </select>
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Universidad</label>
                                                    <input name="universidad" id="universidad" type="text" class="form-control" value="'.$universidad.'" placeholder="Digite la Universidad">
                                            </div><!-- .form-group -->
                                        </div><!--.col-md-4 -->
                                         <div class="col-md-4">
                                           <div class="form-group">
                                               <label>Tarjeta profesional</label>
                                               <input name="tarjetaprofesional" id="tarjetaprofesional" type="text" class="form-control" value="'.$tarjetaprofesional.'" placeholder="Digite la Tarjeta Profesional">
                                           </div><!-- .form-group -->
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Registro</label>
                                                <input name="registro" id="registro" type="text" class="form-control" value="'.$registro.'" placeholder="Digite n&uacute;mero registro">
                                            </div><!-- .form-group -->
                                         </div><!--.col-md-4 -->
                                          <!-- ***********************************************NombreUsuario y Password Usuario****************************************************************************** -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Usuario*</label>
                                                <input name="nombreUsuario" id="nombreUsuario" type="text" class="form-control" value="'.$nombreusuario.'" >
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contrase&ntilde;a*</label>
                                                <input name="password" id="password" type="password" class="form-control" >
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->
                                        <!-- **************************************************Roles Usuario**************************************************************** -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Rol Usuario* (ROL_USER sino se suministra)</label>
                                                <select name="roles" id="roles" class="form-control">
                                                    <option value="'.$tipousuario_idtipousuario.'">'.$tipousuario.'</option>
                                                    <option value="1">Aplicaci&oacute;n</option>
                                                    <option value="2">Usuario - Administrador</option>
                                                </select>
                                            </div><!-- .form-group -->
                                        </div><!-- .col-md-4 -->   
                                        <div class="col-lg-4">
											<div class="form-group m-form__group">
												<label>Firma digital</label>
												<div></div>
												<div class="custom-file">
													<input type="file" id="imagen" name="imagen[]" value="'.$firmadigital.'" class="file-upload btn" >
												</div>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="form-group m-form__group">
												<label></label>
												<div class="custom-file">
												    <img src="../firmas/'.$firmadigital.'" style="width:50%"></img>
												</div>
											</div>
										</div>
										
                                    </div>';
            }
            echo $data;
        }
    }
?>
    <script src="../js/calculaEdad.js"></script>

</html>
