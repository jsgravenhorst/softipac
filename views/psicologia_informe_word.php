<?php

    ob_start();
    error_reporting(E_ALL ^ E_NOTICE);

    require_once("../mod_conexion/db_funciones.php");
    require_once ("../vendor/PHPWord.php");

    $idpaciente  = $_GET['var'];

    $db               = new DB_Funciones();
    $cargaInforme     = $db->imprimirInformePsico($idpaciente);
    $indice           = 0;
    $valoracion       = "";
    $rutaPlantilla    = '../resource/Plantilla.docx';
    /**********************************************************************VARIABLES LIBERIA PHPWORD***************************************************************************************************************/
    $PHPWord = new PHPWord();
    $informe = $PHPWord->loadTemplate($rutaPlantilla);
    /**********************************************************************DATOS PACIENTE***************************************************************************************************************************/
    $informe->setValue('{identificacion}', $cargaInforme['datospaciente'][$indice]['documento']);
    $informe->setValue('{nombrePac}', $cargaInforme['datospaciente'][$indice]['nombres']);
    $informe->setValue('{lugarNamPac}', $cargaInforme['datospaciente'][$indice]['lugarnacimiento']);
    $informe->setValue('{fechNamPac}', date( 'd M Y', strtotime($cargaInforme['datospaciente'][$indice]['fechanacimiento'])));
    $informe->setValue('{edadPac}', $cargaInforme['datospaciente'][$indice]['edad']);
    $informe->setValue('{mesesPac}', $cargaInforme['datospaciente'][$indice]['meses']);
    $informe->setValue('{dirPac}', $cargaInforme['datospaciente'][$indice]['direccion']);
    $informe->setValue('{ciudadResPac}', $cargaInforme['datospaciente'][$indice]['ciudadresidencia']);
    $informe->setValue('{informantePac}', $cargaInforme['datospaciente'][$indice]['informante']);
    /******************************************************************DATOS PADRE***************************************************************************************************************************/
    $informe->setValue('{nombrePadre}', $cargaInforme['datospadre'][$indice]['nombres']);
    $informe->setValue('{edadPadre}', $cargaInforme['datospadre'][$indice]['edad']);
    $informe->setValue('{escolaridadPadre}', $cargaInforme['datospadre'][$indice]['escolaridad']);
    $informe->setValue('{ocupacionPadre}', $cargaInforme['datospadre'][$indice]['ocupacion']);
    $informe->setValue('telefonoCelularPadre',  $cargaInforme['datospadre'][$indice]['telefonocelular']);
    $informe->setValue('telefonoFijoPadre', $cargaInforme['datospadre'][$indice]['telefonofijo']);
    /**********************************************************************DATOS MADRE***************************************************************************************************************************/
    $informe->setValue('{nombreMadre}', $cargaInforme['datosmadre'][$indice]['nombres']);
    $informe->setValue('{edadMadre}', $cargaInforme['datosmadre'][$indice]['edad']);
    $informe->setValue('{escolaridadMadre}', $cargaInforme['datosmadre'][$indice]['escolaridad']);
    $informe->setValue('{ocupacionMadre}', $cargaInforme['datosmadre'][$indice]['ocupacion']);
    $informe->setValue('telefonoCelularMadre',  $cargaInforme['datosmadre'][$indice]['telefonocelular']);
    $informe->setValue('telefonoFijoMadre', $cargaInforme['datosmadre'][$indice]['telefonofijo']);
    /**********************************************************************DATOS SESIONES*******************************************************************************/
    for( $i = 0; $i < sizeof($cargaInforme['datosvaloracion']); $i++ )
    {
        if ($valoracion == '')
        {
            $valoracion = date( 'd M Y', strtotime($cargaInforme['datosvaloracion'][$i]['fch_val']));
        }else
        {
            $valoracion = $valoracion. ' - '. date( 'd M Y', strtotime($cargaInforme['datosvaloracion'][$i]['fch_val']));
        }

    }
    $informe->setValue('{citaInicial}', date( 'd M Y', strtotime($cargaInforme['datossesiones'][$indice]['cita_inicial'])));
    $informe->setValue('{entrevistaAcudiente}', date( 'd M Y', strtotime($cargaInforme['datossesiones'][$indice]['entr_acudiente'])));
    $informe->setValue('{valoraciones}', $valoracion);
    $informe->setValue('{fechaInforme}', date( 'd M Y', strtotime($cargaInforme['datossesiones'][$indice]['fech_informe'])));
/**********************************************************************DATOS CONSTITUCIÓN FAMILIAR*******************************************************************************/

    $arregloParentesco        = array();
    $arreglonombreFamiliar    = array();
    $arregloEdadFamiliar      = array();
    $arregloOcupacionFamiliar = array();

    for ($i = 0; $i < sizeof($cargaInforme['datosconsfamiliar']); $i++)
    {
        $arregloParentesco[$i]      = $cargaInforme['datosconsfamiliar'][$i]['parentesco'];
        $arreglonombresFamiliar[$i] =  $cargaInforme['datosconsfamiliar'][$i]['nombres'];
        $arregloEdadFamiliar[$i]    = $cargaInforme['datosconsfamiliar'][$i]['edad'];
        $arregloOcupaFamiliar[$i]   = $cargaInforme['datosconsfamiliar'][$i]['ocupacion'];
    }

    $tablaCompFamiliar = array(
        'parentesco' => $arregloParentesco,
        'nombres'    => $arreglonombresFamiliar,
        'edad'       => $arregloEdadFamiliar,
        'ocupa'      =>  $arregloOcupaFamiliar
    );

    $informe->cloneRow('TCOMPFAM', $tablaCompFamiliar);

    $arregloProfesion    = array();
    $arregloInstitucion  = array();
    $arregloTiempo       = array();
    $arregloEdad         = array();
    $arregloDuracion    = array();
    $arregloResultados  = array();

    for ($j = 0; $j < sizeof($cargaInforme['datoshistoria']); $j++)
    {
        $arregloProfesion[$j]   = $cargaInforme['datoshistoria'][$j]['profesion'];
        $arregloInstitucion[$j] = $cargaInforme['datoshistoria'][$j]['institucion'];
        $arregloTiempo[$j]      = $cargaInforme['datoshistoria'][$j]['tiempo'];
        $arregloEdad[$j]        = $cargaInforme['datoshistoria'][$j]['edad'];
        $arregloDuracion[$j]    = $cargaInforme['datoshistoria'][$j]['duracion'];
        $arregloResultados[$j]  = $cargaInforme['datoshistoria'][$j]['resultados'];
    }

    $tablaHistoria = array(
        'prof'   => $arregloProfesion,
        'inst'   => $arregloInstitucion,
        'tiempo' => $arregloTiempo,
        'edini'  => $arregloEdad,
        'dura'  =>$arregloDuracion,
        'resul' => $arregloResultados
    );

    $informe->cloneRow('THIS', $tablaHistoria);

    /**********************************************************************DATOS INFORME*******************************************************************************/
    $informe->setValue('{motivoConsulta}', nl2br($cargaInforme['datosinforme'][$indice]['motivoconsulta']));
    $informe->setValue('{diagnosticosPrevios}', nl2br($cargaInforme['datosinforme'][$indice]['diagnostico']));
    $informe->setValue('{objetivoEvaluacion}', nl2br($cargaInforme['datosinforme'][$indice]['objetivo']));
    $informe->setValue('{metodoEvaluacion}', nl2br($cargaInforme['datosinforme'][$indice]['metodoeval']));
    $informe->setValue('{resultados}', nl2br($cargaInforme['datosinforme'][$indice]['resultados']));
    $informe->setValue('{conclusiones}', nl2br($cargaInforme['datosinforme'][$indice]['conclusiones']));
    $informe->setValue('{recomendaciones}', nl2br($cargaInforme['datosinforme'][$indice]['recomendaciones']));

    /**********************************************************************DATOS PSICOLOGO*****************************************************************************/
    $firma              = $cargaInforme['datossesiones'][$indice]['firma'];
    $informe->setValue('{psicologo}', $cargaInforme['datossesiones'][$indice]['psic']);
    $informe->setValue('{nombrePsicologo}', strtoupper($cargaInforme['datossesiones'][$indice]['psic']));
   // $informe->addImage('{firma}', $firma);
    $informe->setValue('{area}',   $cargaInforme['datossesiones'][$indice]['area']);
    $informe->setValue('{universidad}',$cargaInforme['datossesiones'][$indice]['univ']);
    $informe->setValue('{tarjetaProfesional}', $cargaInforme['datossesiones'][$indice]['tarjp']);
    $informe->setValue('{registro}',  $cargaInforme['datossesiones'][$indice]['reg']);

    $nombreArchivo  = "informe_". str_replace(' ', '_', $cargaInforme['datospaciente'][$indice]['nombres']).'.docx';
    $informe->save($nombreArchivo);

    // Vamos a dar la opcion para descargar el archivo
     header("Content-Disposition: attachment; filename=$nombreArchivo");

    //leemos el archivo para que se descargue
    readfile($nombreArchivo);
    // Se elimina el archivo del servidor
    unlink($nombreArchivo);







