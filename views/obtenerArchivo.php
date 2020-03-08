<?php
    $folder     = $_GET["var"];
	$directorio = '../Documentos/'.$folder;
	$gestor_dir = opendir($directorio);
	$archivos = '';
	while (false !== ($nombre_fichero = readdir($gestor_dir))) {
	    //$ficheros[] = $nombre_fichero;
	    $rutaArchivo = '../Documentos/'.$folder.'/'.$nombre_fichero;
	    if(!is_dir($nombre_fichero)){
	        $size = filesize($rutaArchivo);
	        $archivos .='
	        <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
            	<div class="dz-image">
            	    <a target="_blank" href="'.$rutaArchivo.'" >
            		    <img data-dz-thumbnail="" alt="'.$nombre_fichero.'" src="'.$rutaArchivo.'">
            		</a>
            	</div>
            	<a target="_blank" href="'.$rutaArchivo.'" ><div class="dz-details">    <div class="dz-size"><span data-dz-size=""><strong>'.$size.'</strong> KB</span></div>    <div class="dz-filename"><span data-dz-name="">'.$nombre_fichero.'</span></div>  </div></a>
            </div>';
            
	    }
	    
	}
echo $archivos;
?>