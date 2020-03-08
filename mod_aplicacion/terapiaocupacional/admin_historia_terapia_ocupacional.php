<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    require_once ("../../mod_conexion/db_funciones.php");
    $db = new DB_Funciones();
    $opcion      = $_POST['opcion'];
    $idpaciente  = $_POST['idpaciente'];
    $idTerapeuta = $_POST['idTerapeuta'];
    $idcita      = $_POST['idcita'];
    $idarea      = $_POST['idarea'];
    $idhistoria  = $_POST['idhistoria'];

    if ($opcion == "consultarFechaProgramacion")
    {
        $arreglo_fecha_prog = array();
        $consultarFechaProgramacion = $db->consultarFechaProgramacion($idpaciente);

        if ($consultarFechaProgramacion != false )
        {
            for ( $i = 0; $i < sizeof($consultarFechaProgramacion); $i++)
            {
                $row_arreglo['fecha_prog'] = $consultarFechaProgramacion[$i]['fecha_prog'];
                array_push($arreglo_fecha_prog, $row_arreglo);
            }
            echo json_encode($arreglo_fecha_prog);
        }
    }

    if ($opcion == "consultarDatosPaciente")
    {
        $arreglo_DatosPaciente = array();
        $consultarDatosPaciente = $db->consultarDatosPaciente($idpaciente);

        if ( $consultarDatosPaciente != false)
        {
            for ( $i = 0; $i < sizeof($consultarDatosPaciente); $i++)
            {
                $row_arreglo['nombres']         = $consultarDatosPaciente[$i]['nombres'];
                $row_arreglo['primerapellido']  = $consultarDatosPaciente[$i]['primerapellido'];
                $row_arreglo['segundoapellido'] = $consultarDatosPaciente[$i]['segundoapellido'];
                $row_arreglo['fechanacimiento'] = $consultarDatosPaciente[$i]['fechanacimiento'];
                $row_arreglo['edad']            = $consultarDatosPaciente[$i]['edad'];
                $row_arreglo['tipoDocumento']   = $consultarDatosPaciente[$i]['tipo'];
                $row_arreglo['documento']       = $consultarDatosPaciente[$i]['documento'];
                $row_arreglo['escolaridad']     = $consultarDatosPaciente[$i]['escolaridad'];
                $row_arreglo['razonsocial']     = $consultarDatosPaciente[$i]['razonsocial'];
                array_push($arreglo_DatosPaciente, $row_arreglo);
            }
            echo json_encode($arreglo_DatosPaciente);
        }
    }

    if ($opcion == "insertarhistoria")
    {
        $insertarHistoria = $db->crearHistoriaTEO($idpaciente, $idarea, $idTerapeuta);

        if ($insertarHistoria)
        {
            echo $insertarHistoria;
        }else
            {
                $insertarHistoria = 0;
            }

    }

    if ($opcion == "consultarhistoria")
    {
        $return_arr = array();
        $consultaHistoria = $db->consultarHistoriaTEO($idpaciente,$idarea);
    }
