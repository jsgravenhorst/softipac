<?php ob_start();
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
	require_once("../dompdf/dompdf_config.inc.php");
	$db = new DB_Funciones();
	
	$idvehiculo    = $_GET['var'];
	
	$cargaMtoMod   	= $db->adminCargarMtoMod($idvehiculo);
        
    if( $cargaMtoMod != false ) 
    {
        for ( $i = 0; $i< sizeof($cargaMtoMod); $i++ ) 
        {
			$idvehiculo        = $cargaMtoMod[$i]['idvehiculo'];
			$idrevision        = $cargaMtoMod[$i]['idrevision'];
			$placa             = $cargaMtoMod[$i]['placa'];
			$interno           = $cargaMtoMod[$i]['nro_interno'];
			$numconductor      = $cargaMtoMod[$i]['numconductor'];
			$nombreconductor   = $cargaMtoMod[$i]['nombre_usuario']." ".$cargaMtoMod[$i]['apellido'];
			$docpropietario    = $cargaMtoMod[$i]['documento_propietario'];
			$ruta              = $cargaMtoMod[$i]['idruta'];
			$descripcion       = $cargaMtoMod[$i]['descripcion'];
			$fechaMto          = $cargaMtoMod[$i]['fecha'];
			$fechaSOAT         = $cargaMtoMod[$i]['soat'];
			$fechaTMC          = $cargaMtoMod[$i]['revision_tmc'];
			$fechaEXTRA        = $cargaMtoMod[$i]['extra_contra'];
			$fechaOPERACION    = $cargaMtoMod[$i]['tarjeta_operacion'];
			$kilometraje       = $cargaMtoMod[$i]['km_actual'];
			$tarjetapropiedad  = $cargaMtoMod[$i]['tarjeta_propiedad'];
			$cableado          = $cargaMtoMod[$i]['cableado_electrico'];
			if($cableado == 1){$cableado = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$cableado = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$aceitemotor       = $cargaMtoMod[$i]['fuga_aceite_motor'];
			if($aceitemotor == 1){$aceitemotor = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$aceitemotor = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$soportebateria    = $cargaMtoMod[$i]['soporte_bateria'];
			if($soportebateria == 1){$soportebateria = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$soportebateria = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$refrigerante      = $cargaMtoMod[$i]['fuga_refrigerante'];
			if($refrigerante == 1){$refrigerante = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$refrigerante = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$combustible       = $cargaMtoMod[$i]['fuga_combustible'];
			if($combustible == 1){$combustible = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$combustible = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$inyeccion         = $cargaMtoMod[$i]['bomba_inyeccion'];
			if($inyeccion == 1){$inyeccion = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$inyeccion = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$embrague          = $cargaMtoMod[$i]['funcionamiento_embrague'];
			if($embrague == 1){$embrague = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$embrague = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$soportecaja       = $cargaMtoMod[$i]['soportes_caja'];
			if($soportecaja == 1){$soportecaja = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$soportecaja = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$aceitecaja        = $cargaMtoMod[$i]['fugas_aceite'];
			if($aceitecaja == 1){$aceitecaja = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$aceitecaja = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$juegomandos       = $cargaMtoMod[$i]['juego_mandos'];
			if($juegomandos == 1){$juegomandos = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$juegomandos = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$nivelaceite       = $cargaMtoMod[$i]['nivel_aceite'];
			if($nivelaceite == 1){$nivelaceite = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$nivelaceite = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$ajuste            = $cargaMtoMod[$i]['ajuste'];
			if($ajuste == 1){$ajuste = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$ajuste = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$cardan            = $cargaMtoMod[$i]['juego_excesivo_cardan'];
			if($cardan == 1){$cardan = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$cardan = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$cadenacardan      = $cargaMtoMod[$i]['cadena_cardan'];
			if($cadenacardan == 1){$cadenacardan = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$cadenacardan = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$aceitecardan      = $cargaMtoMod[$i]['fuga_aceite'];
			if($aceitecardan == 1){$aceitecardan = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$aceitecardan = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$suspension        = $cargaMtoMod[$i]['fija_elem_suspension'];
			if($suspension == 1){$suspension = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$suspension = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$llanta            = $cargaMtoMod[$i]['llanta_labrado'];
			if($llanta == 1){$llanta = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$llanta = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$amortigua         = $cargaMtoMod[$i]['amortiguador_exis_fuga'];
			if($amortigua == 1){$amortigua = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$amortigua = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$tijeras           = $cargaMtoMod[$i]['tijeras'];
			if($tijeras == 1){$tijeras = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$tijeras = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$brazo             = $cargaMtoMod[$i]['brazo_axial'];
			if($brazo == 1){$brazo = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$brazo = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$terminales        = $cargaMtoMod[$i]['terminales_direccion'];
			if($terminales == 1){$terminales = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$terminales = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$rotulas           = $cargaMtoMod[$i]['rotulas'];
			if($rotulas == 1){$rotulas = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$rotulas = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$resortes          = $cargaMtoMod[$i]['ballestas_resortes'];
			if($resortes == 1){$resortes = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$resortes = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$colores           = $cargaMtoMod[$i]['colores_avisos'];
			if($colores == 1){$colores = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$colores = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$emblemas          = $cargaMtoMod[$i]['distintivos_emblemas'];
			if($emblemas == 1){$emblemas = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$emblemas = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$reflectivos       = $cargaMtoMod[$i]['placa_lateral_reflectivos'];
			if($reflectivos == 1){$reflectivos = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$reflectivos = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$pintura           = $cargaMtoMod[$i]['latoneria_pintura'];
			if($pintura == 1){$pintura = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$pintura = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$bomper            = $cargaMtoMod[$i]['bomperes'];
			if($bomper == 1){$bomper = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$bomper = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$pisos             = $cargaMtoMod[$i]['pisos_estribos'];
			if($pisos == 1){$pisos = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$pisos = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$emergencia        = $cargaMtoMod[$i]['mecanismos_emergencia'];
			if($emergencia == 1){$emergencia = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$emergencia = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$fugas             = $cargaMtoMod[$i]['fugas'];
			if($fugas == 1){$fugas = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$fugas = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$ductos            = $cargaMtoMod[$i]['ductos_manguera_frenos'];
			if($ductos == 1){$ductos = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$ductos = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$liquido           = $cargaMtoMod[$i]['nivel_liquido'];
			if($liquido == 1){$liquido = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$liquido = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$escape            = $cargaMtoMod[$i]['sistema_escape_fugas'];
			if($escape == 1){$escape = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$escape = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$pcv               = $cargaMtoMod[$i]['conexion_valvula_pcv'];
			if($pcv == 1){$pcv = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$pcv = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$humo              = $cargaMtoMod[$i]['emision_humo_azul_negro'];
			if($humo == 1){$humo = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$humo = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$tapas             = $cargaMtoMod[$i]['tapa_aceite_combustible'];
			if($tapas == 1){$tapas = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$tapas = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$bajas             = $cargaMtoMod[$i]['luces_bajas'];
			if($bajas == 1){$bajas = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$bajas = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$altas             = $cargaMtoMod[$i]['luces_altas'];
			if($altas == 1){$altas = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$altas = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$cocuyos           = $cargaMtoMod[$i]['cocuyos'];
			if($cocuyos == 1){$cocuyos = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$cocuyos = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$direccionales     = $cargaMtoMod[$i]['direccionales'];
			if($direccionales == 1){$direccionales = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$direccionales = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$lfreno            = $cargaMtoMod[$i]['luz_freno'];
			if($lfreno == 1){$lfreno = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$lfreno = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$lreversa          = $cargaMtoMod[$i]['luz_reversa'];
			if($lreversa == 1){$lreversa = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$lreversa = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$areversa          = $cargaMtoMod[$i]['alarma_reversa'];
			if($areversa == 1){$areversa = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$areversa = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$parqueo           = $cargaMtoMod[$i]['luces_parqueo'];
			if($parqueo == 1){$parqueo = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$parqueo = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$pito              = $cargaMtoMod[$i]['pito'];
			if($pito == 1){$pito = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$pito = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$espejos           = $cargaMtoMod[$i]['espejos'];
			if($espejos == 1){$espejos = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$espejos = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$extintor          = $cargaMtoMod[$i]['extintor_vencimiento'];
			if($extintor == 1){$extintor = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$extintor = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$botiquin          = $cargaMtoMod[$i]['botiquin'];
			if($botiquin == 1){$botiquin = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$botiquin = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$cruceta           = $cargaMtoMod[$i]['cruceta'];
			if($cruceta == 1){$cruceta = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$cruceta = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$tacos             = $cargaMtoMod[$i]['tacos'];
			if($tacos == 1){$tacos = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$tacos = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$repuesto          = $cargaMtoMod[$i]['repuesto'];
			if($repuesto == 1){$repuesto = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$repuesto = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$gato              = $cargaMtoMod[$i]['gato'];
			if($gato == 1){$gato = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$gato = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$tacometro         = $cargaMtoMod[$i]['tacometro'];
			if($tacometro == 1){$tacometro = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$tacometro = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$interiores        = $cargaMtoMod[$i]['luces_interiores'];
			if($interiores == 1){$interiores = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$interiores = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$techo             = $cargaMtoMod[$i]['luz_techo'];
			if($techo == 1){$techo = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$techo = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$tablas            = $cargaMtoMod[$i]['luz_tablas'];
			if($tablas == 1){$tablas = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$tablas = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$sillas            = $cargaMtoMod[$i]['anclaje_sillas'];
			if($sillas == 1){$sillas = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$sillas = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$silleteria        = $cargaMtoMod[$i]['silleteria_cojineria'];
			if($silleteria == 1){$silleteria = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$silleteria = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$cinturon          = $cargaMtoMod[$i]['cinturones_seguridad'];
			if($cinturon == 1){$cinturon = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$cinturon = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$timbre            = $cargaMtoMod[$i]['timbre'];
			if($timbre == 1){$timbre = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$timbre = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$episos            = $cargaMtoMod[$i]['estado_pisos'];
			if($episos == 1){$episos = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$episos = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$velocidad         = $cargaMtoMod[$i]['dispositivo_velocidad'];
			if($velocidad == 1){$velocidad = "<div style='font-size:12px; padding-right:10px'>BUENO</div>";}else{$velocidad = "<div style='font-size:12px; color:red; padding-right:10px'>MALO</div>";}
			$observacion       = $cargaMtoMod[$i]['observacion'];
        }
    }
	
	$filename = "mantenimiento_".$placa.'.pdf';

echo"
<html>
    <head>
    </head>
    <body>
        <div style='width:100%; text-align:center;'>
            <table align='center'>
                <tr>
                    <td style='width:480px;'>
                        <div>
                            <div style='color:#549dcf; font-size:36px;'>Reporte de Inspecci&oacute;n</div>
                            <div style='color:#ccc; font-size:12px;'>Resoluci&oacute;n 0315 de 2013</div>
                        </div>
                    </td>
                    <td  style='width:235px;'>
                        <div style='text-align:right'>
                            <div style='color:#ccc; font-size:12px; text-align:right'>Empresa de transporte Sultana del Valle SAS.</div>
                            <div style='color:#ccc; font-size:12px; text-align:right'>NIT. 890.301.296</div>
                            <div style='color:#ccc; font-size:12px; text-align:right'>Terminal de Transportes Of. 201-1, Cali.</div>
                        </div>
                    </td>
                </tr>
            </table>
            
            <div style='width:100%;'>
                <hr style='color:#ccc;'>
            </div>

            <table align='center'>
                <tr>
                    <td  style='width:160px; text-align:center;'>
                        <div>
                            <label><b>PLACA</b></label><br>
                            <div style='color:#ccc;'>$placa</div>
                        </div> 
                    </td>
                    <td  style='width:165px; text-align:center;'>
                        <div>
                            <label><b>N&Uacute;MERO INTERNO</b></label><br>
                            <div style='color:#ccc;'>$interno</div>
                        </div> 
                    </td>
                    <td style='width:165px; text-align:center;'>
                        <div>
                            <label><b>CONDUCTOR</b></label><br>
                            <div style='color:#ccc;'>$nombreconductor</div>
                        </div>
                    </td>
                    <td style='width:160px; text-align:center;'>
                        <div>
                            <label><b>FECHA</b></label><br>
                            <div style='color:#ccc;'>$fechaMto</div>
                        </div>
                    </td>
                </tr>
            </table>
            
            <div style='width:100%;'>
                <hr style='color:#ccc;'>
            </div>

            <table align='center'>
                <tr>
                    <td style='width:720px;'>
                        <div>
                            <label><b>Resultado de la Verificaci&oacute;n</b></label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style='width:720px;'>
                        <div style='width:100%; background-color:#549dcf; color:#fff; padding:3px 10px;'>
                            DOCUMENTOS:
                        </div>
                    </td>
                </tr>
            </table>
            <table rules='rows' align='center' width='720px'>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Vencimiento SOAT</div>
					</td>
					<td align='right' width='15%'>
						<div style='font-size:12px; padding-right:10px'>$fechaMto</div>
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Vencimiento Revisi&oacute;n TMC</div>
					</td>
					<td align='right' width='15%'>
						<div style='font-size:12px;'>$fechaTMC</div>
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Vencimiento EXTRA - CONTRA</div>
					</td>
					<td align='right' width='15%'>
						<div style='font-size:12px; padding-right:10px'>$fechaEXTRA</div>
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Vencimiento TARJETA OPERACION</div>
					</td>
					<td align='right' width='15%'>
						<div style='font-size:12px;'>$fechaOPERACION</div>
					</td>
				</tr>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Kilometraje Actual</div>
					</td>
					<td align='right' width='15%'>
						<div style='font-size:12px; padding-right:10px'>$kilometraje</div>
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Tarjeta de Propiedad</div>
					</td>
					<td align='right' width='15%'>
						<div style='font-size:12px;'>$tarjetapropiedad</div>
					</td>
				</tr>
            </table>
            
            <table align='center'>
                <tr>
                    <td style='width:720px;'>
                        <div style='width:100%; background-color:#549dcf; color:#fff; padding:3px 10px;'>
                            ESTADO DEL MOTOR:
                        </div>
                    </td>
                </tr>
            </table>
            <table rules='rows' align='center' width='720px'>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Estado Cableado el&eacute;ctrico</div>
					</td>
					<td align='right' width='15%'>
						$cableado
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Fugas de Aceite Motor</div>
					</td>
					<td align='right' width='15%'>
						$aceitemotor
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Sopote de Bateria</div>
					</td>
					<td align='right' width='15%'>
						$soportebateria
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Fugas Refrigerante</div>
					</td>
					<td align='right' width='15%'>
						$refrigerante
					</td>
				</tr>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Fugas combustible</div>
					</td>
					<td align='right' width='15%'>
						$combustible
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Estado Bomba Inyecci&oacute;n</div>
					</td>
					<td align='right' width='15%'>
						$inyeccion
					</td>
				</tr>
            </table>

            
            <table align='center'>
                <tr>
                    <td style='width:720px;'>
                        <div style='width:100%; background-color:#549dcf; color:#fff; padding:3px 10px;'>
                            CAJA DE VELOCIDADES:
                        </div>
                    </td>
                </tr>
            </table>
            <table rules='rows' align='center' width='720px'>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Funcionamiento Embrague</div>
					</td>
					<td align='right' width='15%'>
						$embrague
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Soportes de Caja</div>
					</td>
					<td align='right' width='15%'>
						$soportecaja
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Fugas de Aceite</div>
					</td>
					<td align='right' width='15%'>
						$aceitecaja
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Juego de Mandos</div>
					</td>
					<td align='right' width='15%'>
						$juegomandos
					</td>
				</tr>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Nivel de Aceite</div>
					</td>
					<td align='right' width='15%'>
						$nivelaceite
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'></div>
					</td>
					<td align='right' width='15%'>
						
					</td>
				</tr>
            </table>
            
            <table align='center'>
                <tr>
                    <td style='width:720px;'>
                        <div style='width:100%; background-color:#549dcf; color:#fff; padding:3px 10px;'>
                            TRANSMISI&Oacute;N:
                        </div>
                    </td>
                </tr>
            </table>
            <table rules='rows' align='center' width='720px'>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Ajuste</div>
					</td>
					<td align='right' width='15%'>
						$ajuste
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Juego Excesivos de Cardan</div>
					</td>
					<td align='right' width='15%'>
						$cardan
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Cadena Cardan</div>
					</td>
					<td align='right' width='15%'>
						$cadenacardan
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Fuga de Aceite</div>
					</td>
					<td align='right' width='15%'>
						$aceitecardan
					</td>
				</tr>
            </table>
            
            <table align='center'>
                <tr>
                    <td style='width:720px;'>
                        <div style='width:100%; background-color:#549dcf; color:#fff; padding:3px 10px;'>
                            SUSPENSI&Oacute;N:
                        </div>
                    </td>
                </tr>
            </table>
            <table rules='rows' align='center' width='720px'>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Fijaci&oacute;n Elementos Suspensi&oacute;n</div>
					</td>
					<td align='right' width='15%'>
						$suspension
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Llantas labrado</div>
					</td>
					<td align='right' width='15%'>
						$llanta
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Amortiguador Existencia / Fugas</div>
					</td>
					<td align='right' width='15%'>
						$amortigua
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Tijeras</div>
					</td>
					<td align='right' width='15%'>
						$tijeras
					</td>
				</tr>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Brazo Axial</div>
					</td>
					<td align='right' width='15%'>
						$brazo
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Terminales de Direcci&oacute;n</div>
					</td>
					<td align='right' width='15%'>
						$terminales
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Rotulas</div>
					</td>
					<td align='right' width='15%'>
						$rotulas
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Ballestas / Resortes</div>
					</td>
					<td align='right' width='15%'>
						$resortes
					</td>
				</tr>
            </table>
            
            <table align='center'>
                <tr>
                    <td style='width:720px;'>
                        <div style='width:100%; background-color:#549dcf; color:#fff; padding:3px 10px;'>
                            CARROCERIA:
                        </div>
                    </td>
                </tr>
            </table>
            <table rules='rows' align='center' width='720px'>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Colores y Avisos</div>
					</td>
					<td align='right' width='15%'>
						$colores
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Distintivos y Emblemas</div>
					</td>
					<td align='right' width='15%'>
						$emblemas
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Placas Laterales y Reflectivos</div>
					</td>
					<td align='right' width='15%'>
						$reflectivos
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Latoner&iacute;a y Pintura</div>
					</td>
					<td align='right' width='15%'>
						$pintura
					</td>
				</tr>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Bomperes</div>
					</td>
					<td align='right' width='15%'>
						$bomper
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Pisos y Estribos</div>
					</td>
					<td align='right' width='15%'>
						$pisos
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Mecanismos de Emergencia</div>
					</td>
					<td align='right' width='15%'>
						$emergencia
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'></div>
					</td>
					<td align='right' width='15%'>
					
					</td>
				</tr>
            </table>
            
            <table align='center'>
                <tr>
                    <td style='width:720px;'>
                        <div style='width:100%; background-color:#549dcf; color:#fff; padding:3px 10px;'>
                            FRENOS:
                        </div>
                    </td>
                </tr>
            </table>
            <table rules='rows' align='center' width='720px'>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Fugas</div>
					</td>
					<td align='right' width='15%'>
						$fugas
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Ductos Mangueras de Frenos</div>
					</td>
					<td align='right' width='15%'>
						$ductos
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Nivel L&iacute;quido</div>
					</td>
					<td align='right' width='15%'>
						$liquido
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'></div>
					</td>
					<td align='right' width='15%'>
						
					</td>
				</tr>
            </table>
            
            <table align='center'>
                <tr>
                    <td style='width:720px;'>
                        <div style='width:100%; background-color:#549dcf; color:#fff; padding:3px 10px;'>
                            EMISIONES CONTAMINANTES:
                        </div>
                    </td>
                </tr>
            </table>
            <table rules='rows' align='center' width='720px'>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Estado Sistema de Escape / Fugas</div>
					</td>
					<td align='right' width='15%'>
						$escape
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Conexi&oacute;n V&aacute;lvula PCV</div>
					</td>
					<td align='right' width='15%'>
						$pcv
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Emisi&oacute;n Humo Azul o Negro</div>
					</td>
					<td align='right' width='15%'>
						$humo
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Tapas Aceite y Combustible</div>
					</td>
					<td align='right' width='15%'>
						$tapas
					</td>
				</tr>
            </table>
            
            
            <table align='center'>
                <tr>
                    <td style='width:720px;'>
                        <div style='width:100%; background-color:#549dcf; color:#fff; padding:3px 10px;'>
                            LUCES EXTERIORES:
                        </div>
                    </td>
                </tr>
            </table>
            <table rules='rows' align='center' width='720px'>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Luces Bajas</div>
					</td>
					<td align='right' width='15%'>
						$bajas
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Luces Altas</div>
					</td>
					<td align='right' width='15%'>
						$altas
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Cocuyos</div>
					</td>
					<td align='right' width='15%'>
						$cocuyos
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Direccionales</div>
					</td>
					<td align='right' width='15%'>
						$direccionales
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Luz Freno</div>
					</td>
					<td align='right' width='15%'>
						$lfreno
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Luz Reversa</div>
					</td>
					<td align='right' width='15%'>
						$lreversa
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Alarma de Reversa</div>
					</td>
					<td align='right' width='15%'>
						$areversa
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Luces de Parqueo</div>
					</td>
					<td align='right' width='15%'>
						$parqueo
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Pito</div>
					</td>
					<td align='right' width='15%'>
						$pito
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Espejos</div>
					</td>
					<td align='right' width='15%'>
						$espejos
					</td>
				</tr>
            </table>
            
            
            <table align='center'>
                <tr>
                    <td style='width:720px;'>
                        <div style='width:100%; background-color:#549dcf; color:#fff; padding:3px 10px;'>
                            EQUIPO DE CARRETERAS:
                        </div>
                    </td>
                </tr>
            </table>
            <table rules='rows' align='center' width='720px'>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Extintor Venicimiento</div>
					</td>
					<td align='right' width='15%'>
						$extintor
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Botiqu&iacute;n</div>
					</td>
					<td align='right' width='15%'>
						$botiquin
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Cruceta</div>
					</td>
					<td align='right' width='15%'>
						$cruceta
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Tacos</div>
					</td>
					<td align='right' width='15%'>
						$tacos
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Repuesto</div>
					</td>
					<td align='right' width='15%'>
						$repuesto
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Gato</div>
					</td>
					<td align='right' width='15%'>
						$gato
					</td>
				</tr>
            </table>

            <table align='center'>
                <tr>
                    <td style='width:720px;'>
                        <div style='width:100%; background-color:#549dcf; color:#fff; padding:3px 10px;'>
                            CABINA:
                        </div>
                    </td>
                </tr>
            </table>
            <table rules='rows' align='center' width='720px'>
                <tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Tac&oacute;metro</div>
					</td>
					<td align='right' width='15%'>
						$tacometro
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Luces Interiores</div>
					</td>
					<td align='right' width='15%'>
						$interiores
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Luz de Techo</div>
					</td>
					<td align='right' width='15%'>
						$techo
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Luz de Tablas</div>
					</td>
					<td align='right' width='15%'>
						$tablas
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Anclaje de Sillas</div>
					</td>
					<td align='right' width='15%'>
						$sillas
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Silleter&iacute;a y Cojiner&iacute;a</div>
					</td>
					<td align='right' width='15%'>
						$silleteria
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Cinturones de Seguridad</div>
					</td>
					<td align='right' width='15%'>
						$cinturon
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Timbre</div>
					</td>
					<td align='right' width='15%'>
						$timbre
					</td>
				</tr>
				<tr>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Estado Pisos</div>
					</td>
					<td align='right' width='15%'>
						$episos
					</td>
					<td align='left' width='35%'>
						<div style='font-size:12px;'>Dispositivo de Velocidad</div>
					</td>
					<td align='right' width='15%'>
						$velocidad
					</td>
				</tr>
            </table>
            <table align='center'>
                <tr>
                    <td style='width:720px;'>
                        <div style='width:100%; background-color:#549dcf; color:#fff; padding:3px 10px;'>
                            OBSERVACIONES:
                        </div>
                    </td>
                </tr>
            </table>
            <table align='center' width='720px'>
                <tr>
					<td align='left' width='100%'>
						<div style='font-size:12px;'>$observacion</div>
					</td>
				</tr>
            </table>
        </div>
    </body>
</html>";

$codigo=utf8_decode($codigo);
$dompdf = new DOMPDF();
$dompdf->load_html($codigo);
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
//file_put_contents("../mod_aplicacion/Documentos/".$interno."/".$filename, $pdf);
$dompdf->stream($filename);  //para generar el archivo en el navegador

?>