<?php
$ds = DIRECTORY_SEPARATOR;
$folder = $_GET['var'];
$storeFolder = '../Documentos/'.$folder;

    $result  = array();
 
    $files = scandir($storeFolder);                 
    if ( false!==$files ) {
        foreach ( $files as $file ) {
            if ( '.'!=$file && '..' !=$file && strpos($file, '.') !== false) {       
                $obj['name'] = $file;
                $size = filesize($storeFolder.$ds.$file);
                $obj['size'] = filesize($storeFolder.$ds.$file);
                $obj['text'] = '<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
            	<div class="dz-image">
            	    <a target="_blank" href="'.$storeFolder.'/'.$file.'" >
            		    <img data-dz-thumbnail="" alt="'.$file.'" src="'.$storeFolder.'/'.$file.'">
            		</a>
            	</div>
            	<a target="_blank" href="'.$storeFolder.'/'.$file.'" ><div class="dz-details">    <div class="dz-size"><span data-dz-size=""><strong>'.$size.'</strong> KB</span></div>    <div class="dz-filename"><span data-dz-name="">'.$file.'</span></div>  </div></a>
            </div>';
                
                
                $result[] = $obj;
            }
        }
    }
     
    header('Content-type: text/json');             
    header('Content-type: application/json');
    echo json_encode($result);

?>     