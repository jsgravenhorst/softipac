<?php
    if (isset($_GET['term'])){
    	# conectare la base de datos
        $con=@mysqli_connect("localhost", "tachinav_softipa", "softipac_2017", "tachinav_bd_softipac_final");
    	
    $return_arr = array();
    /* Si la conexion a la base de datos , ejecuta instruccion SQL. */
    if ($con)
    {
    	$fetch = mysqli_query($con,"SELECT * FROM eps where razonsocial like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
    	
    	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
    	while ($row = mysqli_fetch_array($fetch)) {
    		$id_producto=$row['ideps'];
    		$row_array['value'] = $row['nit']." | ".$row['razonsocial'];
    		$row_array['ideps']=$row['ideps'];
    		$row_array['eps']=$row['razonsocial'];
    		array_push($return_arr,$row_array);
        }
    }
    
    /* Cierra la conexion. */
    mysqli_close($con);
    
    /* Codifica el resultado del array en JSON. */
    echo json_encode($return_arr);
    
    }
?>