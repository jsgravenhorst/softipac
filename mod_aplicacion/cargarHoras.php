<?php
    error_reporting(E_ALL ^ E_NOTICE);
	require_once("../mod_conexion/db_conexion.php");
    $db = new DB_CONEXION();
    $db->connect();

	$fechacita = $_POST['fechacita'];

	$query_hora = "SELECT * 
	                FROM hora 
	                WHERE idhora NOT IN(SELECT hora_idhora 
	                                    FROM `cita` 
	                                    WHERE fechacitaini = '$fechacita' 
	                                    AND hora_idhora is not null)
                    AND tipohora_idtipohora = 1";
    
    $sql_hora = mysqli_query( $db->connect(), $query_hora );
    
    $nro_hora = mysqli_num_rows($sql_hora);
    
    if( $nro_hora > 0 ) 
    {   
        $html .= '<option>Seleccione</option>';
        while ( $row_hora = mysqli_fetch_assoc( $sql_hora ) ) 
        {
            $html .= '<option value="'.$row_hora['idhora'].'">'.$row_hora['hora'].'</option>';
        }
        echo $html;
    }

?>