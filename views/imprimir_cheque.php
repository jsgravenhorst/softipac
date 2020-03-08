<?php

    ob_start();
    error_reporting(E_ALL ^ E_NOTICE);

    require_once ("../vendor/PHPWord.php");

    $rutaPlantilla    = '../resource/PlantillaCheque.docx';
    /**********************************************************************VARIABLES LIBERIA PHPWORD***************************************************************************************************************/
    $PHPWord = new PHPWord();
    $cheque = $PHPWord->loadTemplate($rutaPlantilla);
    $annon = "2020";
    $mes   = "02";
    $dia   = "10";
    $valor = "7000000000";
    $paguesea = "JOHANN STIG GRAVENHORST RODRIGUEZXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
    $lasumade = "SIETE MILLONES DE PESOS MCTEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";


    $cheque->setValue('{anon}', $annon );
    $cheque->setValue('{mes}', $mes );
    $cheque->setValue('{dia}', $dia);
    $cheque->setValue('{valor}', $valor);

    $cheque->setValue('{paguesea}', $paguesea);
    $cheque->setValue('{lasumade}', $lasumade);


    $nombreArchivo  = "cheque". '.docx';
    $cheque->save($nombreArchivo);

    // Vamos a dar la opcion para descargar el archivo
    header("Content-Disposition: attachment; filename=$nombreArchivo");

    //leemos el archivo para que se descargue
    readfile($nombreArchivo);
    // Se elimina el archivo del servidor
    unlink($nombreArchivo);







