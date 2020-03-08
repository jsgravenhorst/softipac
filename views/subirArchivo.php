<?php 
    require_once("../mod_conexion/db_funciones.php"); 
    $db = new DB_Funciones();

    $archivo        = $_FILES["file"];
    $templocation   = $archivo["tmp_name"];
    $name           = $archivo["name"];
    $carpeta        = $_POST["carpeta"];
    $idusuario      = $_POST["carpeta"];
    
    error_log("Subir Archivo".$name);
    
    if(!$templocation){
        echo"No se ha seleccionado ningun archivo";
    }
    
    $folder = makeDir('../Documentos/'.$carpeta);
    
    if(move_uploaded_file($templocation, "../Documentos/$carpeta/$name")){
        echo"Archivos guardados correctamente";
    }else{
        echo"Error al subir los archivos";
    }
    
    $archivo = $name;
    $ruta   = 'Documentos/'.$carpeta;
    $fecha  = date("Y-m-d H:i:s");
    
    $insert = $db->insertarArchivo($idusuario,
                                    $carpeta,
                                    $archivo,
                                    $ruta,
                                    $fecha);
    
    if ( $insert ){
    	echo "success";
    }else{
        echo "error";
    }

    function makeDir($path) {
        $ret = @mkdir($path); // use @mkdir if you want to suppress warnings/errors
        return $ret === true || is_dir($path);
    }

?>