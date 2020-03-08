<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("../mod_conexion/db_conexion.php");
    $db = new DB_CONEXION();
    $db->connect();
    
    $idarea     = $_POST['idarea'];
    $opcion     = $_POST['opcion'];
    
    if($opcion == 1){
        if($idarea == 6 ){
            $query_lista = "SELECT concat_ws(' ', nombres, primerapellido) as nombre,
                                idusuario
                            FROM usuario
                            WHERE area_idarea is not null";
        }else if($idarea == 7){
            $query_lista = "SELECT concat_ws(' ', nombres, primerapellido) as nombre,
                                idusuario
                            FROM usuario
                            WHERE area_idarea is not null";
        }else{
            $query_lista = "SELECT concat_ws(' ', nombres, primerapellido) as nombre,
                                idusuario
                            FROM usuario
                            WHERE area_idarea = $idarea";
        }
        
        
        $sql_lista = mysqli_query( $db->connect(), $query_lista );
        
        $nro_lista = mysqli_num_rows($sql_lista);
        
        $html = '<option value="">Seleccione</option>';
        
        if( $nro_lista > 0 ) 
        {               
            while ( $row_lista = mysqli_fetch_assoc( $sql_lista ) ) 
            {
                $html .= '<option value="'.$row_lista['idusuario'].'">'.$row_lista['nombre'].'</option>';
            }
            echo $html;
        }
    }
    
    if($opcion == 2){
        $return_arr     = array();
        $arr_estado     = array();
        
        $query_lista = "SELECT concat_ws(' ', nombres, primerapellido) as nombre,
                                idusuario
                            FROM usuario
                            WHERE area_idarea = $idarea";
        
        $sql_lista = mysqli_query( $db->connect(), $query_lista );
        
        $nro_lista = mysqli_num_rows($sql_lista);
        
        if( $nro_lista > 0 ) 
        {               
            while ( $row_lista = mysqli_fetch_assoc( $sql_lista ) ) 
            {
                $row_array['id']        = $row_lista['idusuario'];
        		$row_array['nombre']    = $row_lista['nombre'];
        	    error_log("idusioanr ".$row_lista['idusuario']." nombre ".$row_lista['nombre']);
        	    array_push($arr_estado,$row_array);
            }
            array_push($return_arr, $arr_estado);
        }
        echo json_encode($return_arr);
    }
    
    
    

?>