<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_funciones.php");
	$db = new DB_Funciones(); 
    
    $return_arr         = array();
    $arr_tipodoc        = array();
    $arr_genero         = array();
    $arr_escolaridad    = array();
    $arr_eps            = array();
    $arr_acutipodoc     = array();
    $arr_acuparentesco  = array();
    $arr_acuescolaridad = array();
    
    //CARGAR LISTA TIPO DOCUMENTO
    
    $cargaTipoDocumento   	= $db->adminCargarTipoDocumento();

    if( $cargaTipoDocumento != false ) 
    { 		
        for ( $i = 0; $i< sizeof($cargaTipoDocumento); $i++ ) 
    	{
    	    $row_array['id']        = $cargaTipoDocumento[$i]['idtipodocumento'];
    		$row_array['nombre']    = $cargaTipoDocumento[$i]['tipo'];
    	    
    	    array_push($arr_tipodoc,$row_array);
    	    //error_log("Cargando documento ".$cargaTipoDocumento[$i]['tipo']);
    	}
    	array_push($return_arr, $arr_tipodoc);
    }else{
        error_log("Cargando documento ".$cargaTipoDocumento[$i]['tipo']);
    }
    
    //CARGAR LISTA TIPO SEXO
    
    $cargaSexo   	= $db->adminCargarSexo();

    if( $cargaSexo != false ) 
    { 		
        for ( $i = 0; $i< sizeof($cargaSexo); $i++ ) 
    	{
    	    $row_array1['id']       = $cargaSexo[$i]['idgenero'];
    		$row_array1['nombre']   = $cargaSexo[$i]['genero'];
    	    
    	    array_push($arr_genero,$row_array1);
    	    //error_log("Cargando sexo ".$cargaSexo[$i]['genero']);
    	}
    	array_push($return_arr, $arr_genero);
    }else{
        error_log("Cargando sexo ".$cargaSexo[$i]['genero']);
    }
    
    //CARGAR LISTA ESCOLARIDAD

    $cargaEscolaridad   	= $db->adminCargarEscolaridad();
    
    if( $cargaEscolaridad != false ) 
    { 		
        for ( $i = 0; $i< sizeof($cargaEscolaridad); $i++ ) 
    	{
    	    $row_array2['id']       = $cargaEscolaridad[$i]['idescolaridad'];
    		$row_array2['nombre']   = $cargaEscolaridad[$i]['escolaridad'];
    	    
    	    array_push($arr_escolaridad,$row_array2);
    	    //error_log("Cargando escolaridad ".$cargaEscolaridad[$i]['escolaridad']);
    	}
    	array_push($return_arr, $arr_escolaridad);
    }else{
        error_log("Cargando escolaridad ".$cargaEscolaridad[$i]['escolaridad']);
    }
    
    //CARGAR LISTA EPS

    $cargaEPS  	= $db->adminCargarEPS();
    
    if( $cargaEPS != false ) 
    { 		
        for ( $i = 0; $i< sizeof($cargaEPS); $i++ ) 
    	{
    	    $row_array3['id']       = $cargaEPS[$i]['ideps'];
    		$row_array3['nombre']   = $cargaEPS[$i]['razonsocial'];
    	    
    	    array_push($arr_eps,$row_array3);
    	    //error_log("Cargando eps ".$cargaEPS[$i]['razonsocial']);
    	}
    	array_push($return_arr, $arr_eps);
    }else{
        error_log("Cargando eps ".$cargaEPS[$i]['razonsocial']);
    }
    
    //CARGAR LISTA ACUDIENTE TIPO DOCUMENTO
    
    $cargaAcuTipoDocumento   	= $db->adminCargarTipoDocumento();

    if( $cargaAcuTipoDocumento != false ) 
    { 		
        for ( $i = 0; $i< sizeof($cargaAcuTipoDocumento); $i++ ) 
    	{
    	    $row_array4['id']        = $cargaAcuTipoDocumento[$i]['idtipodocumento'];
    		$row_array4['nombre']    = $cargaAcuTipoDocumento[$i]['tipo'];
    	    
    	    array_push($arr_acutipodoc,$row_array4);
    	    //error_log("Cargando tipodoc acudiente ".$cargaAcuTipoDocumento[$i]['tipo']);
    	}
    	array_push($return_arr, $arr_acutipodoc);
    }else{
        error_log("Cargando tipodoc acudiente ".$cargaAcuTipoDocumento[$i]['tipo']);
    }
    
    //CARGAR LISTA ACUDIENTE PARENTESCO
    
    $cargaParentesco   	= $db->adminCargarParentesco();

    if( $cargaParentesco != false ) 
    { 		
        for ( $i = 0; $i< sizeof($cargaParentesco); $i++ ) 
    	{
    	    $row_array5['id']        = $cargaParentesco[$i]['idparentesco'];
    		$row_array5['nombre']    = $cargaParentesco[$i]['parentesco'];
    	    
    	    array_push($arr_acuparentesco,$row_array5);
    	    //error_log("Cargando parentesco ".$cargaParentesco[$i]['parentesco']);
    	}
    	array_push($return_arr, $arr_acuparentesco);
    }else{
        error_log("Cargando parentesco ".$cargaParentesco[$i]['parentesco']);
    }
    
    //CARGAR LISTA ACUDIENTE ESCOLARIDAD

    $cargaAcuEscolaridad   	= $db->adminCargarEscolaridad();
    
    if( $cargaAcuEscolaridad != false ) 
    { 		
        for ( $i = 0; $i< sizeof($cargaAcuEscolaridad); $i++ ) 
    	{
    	    $row_array6['id']       = $cargaAcuEscolaridad[$i]['idescolaridad'];
    		$row_array6['nombre']   = $cargaAcuEscolaridad[$i]['escolaridad'];
    	    
    	    array_push($arr_acuescolaridad,$row_array6);
    	    //error_log("Cargando escolaridad acu ".$cargaAcuEscolaridad[$i]['escolaridad']);
    	}
    	array_push($return_arr, $arr_acuescolaridad);
    }else{
        error_log("Cargando escolaridad acu ".$cargaAcuEscolaridad[$i]['escolaridad']);
    }
    
    echo json_encode($return_arr);

?>