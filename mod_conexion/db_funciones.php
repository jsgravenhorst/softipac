<?php

/**
 * @author Olonte Apps
 * @copyright 2015
 */

class DB_Funciones {
 
    private $db;
    
    function __construct() {
        require_once("db_conexion.php");
        $this->db = new DB_CONEXION();
        $this->db->connect();
    }
 
  public function __destruct() {     
      
  }
  
  public function closeConnect(){
    $this->db->close();  
  }
  
  public function validaUsuario($nick, $password){
  
    $query_user = "SELECT nombres, 
                        password, 
                        nombreusuario,
                        idusuario,
                        area_idarea
                    FROM usuario
                    WHERE nombreusuario = '$nick' and password= '$password'";
    
    $sql_user = mysqli_query( $this->db->connect(), $query_user );
    
    $nro_user = mysqli_num_rows($sql_user);
    
    if( $nro_user > 0 ) 
    {               
        while ( $row_user = mysqli_fetch_assoc( $sql_user ) ) 
        {
            $arreglo_user[]= $row_user;
        }
        return $arreglo_user;
    }else{
        return false;
    } 
    $this->db->close(); 
  }


public function adminCargarUsuario(){
  
    $usuarioApl   = 1;
    $estadoActivo = 1;

    $query_adminUsuario= "SELECT u.*
                                ,a.area
                          FROM usuario u
                          LEFT OUTER JOIN area a ON u.area_idarea = a.idarea
                          WHERE u.tipousuario_idtipousuario = $usuarioApl
                          AND u.estado_idestado = $estadoActivo";
    
    $sql_adminUsuario = mysqli_query( $this->db->connect(), $query_adminUsuario );
    
    $nro_adminUsuario = mysqli_num_rows($sql_adminUsuario);
    
    if( $nro_adminUsuario > 0 ) 
    {               
        while ( $row_adminUsuario = mysqli_fetch_assoc( $sql_adminUsuario) ) 
        {
            $arreglo_adminUsuario[]= $row_adminUsuario;
        }
        return $arreglo_adminUsuario;
    }else{
        return false;
    } 
    
  }
  
  public function adminCargarPacientes(){
  
    $query_adminPaciente= "SELECT *
            FROM usuario u, eps e
            WHERE u.tipousuario_idtipousuario = 3
            AND e.ideps = u.eps_ideps";
    
    $sql_adminPaciente = mysqli_query( $this->db->connect(), $query_adminPaciente );
    
    $nro_adminPaciente = mysqli_num_rows($sql_adminPaciente);
    
    if( $nro_adminPaciente > 0 ) 
    {               
        while ( $row_adminPaciente = mysqli_fetch_assoc( $sql_adminPaciente) ) 
        {
            $arreglo_adminPaciente[]= $row_adminPaciente;
        }
        return $arreglo_adminPaciente;
    }else{
        return false;
    } 
    
  }
  
  
  public function insertarDocumento($documento,$idTipoDocumento)
  {
      $error = 0;

      $query_insDocumento = "INSERT INTO documento(documento,
                                                  tipodocumento_idtipodocumento)
                                         VALUES  ('$documento',
                                                  '$idTipoDocumento')";

      $sql_insDocumento = mysqli_query($this->db->connect(),$query_insDocumento);

      if($sql_insDocumento)
      {
          $query_idDocumento = "SELECT MAX(iddocumento) id FROM documento";

          $sql_idDocumento = mysqli_query($this->db->connect(),$query_idDocumento);

          if($sql_idDocumento)
          {
              $row_idDocumento =  mysqli_fetch_assoc($sql_idDocumento);

              $idDocUsuario = $row_idDocumento['id'];

              return $idDocUsuario;
          }else{
              return $error;
          }
      }else
      {
        return $error;
      }
  }

  public function actualizarDocumento($iddocumento,
                                      $documento,
                                      $tipodocumento_idtipodocumento)
  {
      $query_upDocumento = "UPDATE documento
                              SET   documento                     = '$documento',
                                    tipodocumento_idtipodocumento = '$tipodocumento_idtipodocumento'
                              WHERE iddocumento                   = '$iddocumento'";

      $sql_upDocumento = mysqli_query($this->db->connect(),$query_upDocumento);

      if($sql_upDocumento){
          return true;
      }else
      {
         return false;
      }
  }

  public function insertarDiagnostico($tipodiagnostico_idtipodiagnostico,
                                      $diagnostico,
                                      $remitido,
                                      $usuario_idusuario)
  {
       $query_insDiagnostico = "INSERT INTO diagnostico(tipodiagnostico_idtipodiagnostico,
                                                        diagnostico,
                                                        remitido,
                                                        usuario_idusuario)
                                              VALUES ('$tipodiagnostico_idtipodiagnostico',
                                                      '$diagnostico',
                                                      '$remitido',
                                                      '$usuario_idusuario')";

        $sql_insDiagnostico = mysqli_query($this->db->connect(),$query_insDiagnostico);

        if($sql_insDiagnostico)
        {
            return true;
        }else
        {
            return false;
        }
    }

  public function actualizarDiagnostico($diagnostico,$remitido,$usuario_idusuario)
    {
        $query_upDiagnostico = "UPDATE diagnostico
                                SET diagnostico = '$diagnostico',
                                    remitido    = '$remitido'
                                WHERE usuario_idusuario = '$usuario_idusuario'";

        $sql_upDiagnostico = mysqli_query($this->db->connect(),$query_upDiagnostico);

        if($sql_upDiagnostico)
        {
            return true;
        }else
        {
            return false;
        }
    }
  
  public function insertar_Usuario($tipousuario_idtipousuario,
                                   $estado_idestado,
                                   $parentesco_idparentesco,
                                   $documento_iddocumento,
                                   $nombres,
                                   $primerapellido,
                                   $segundoapellido,
                                   $fechanacimiento,
                                   $edad,
                                   $meses,
                                   $genero_idgenero,
                                   $escolaridad_idescolaridad,
                                   $ocupacion,
                                   $tutela,
                                   $eps_ideps,
                                   $direccion,
                                   $telefonofijo,
                                   $telefonocelular,
                                   $email)
    {
       $paciente = 3;
       $error    = 0;
        /**
         * Si el usuario que se va a guardar es un paciente
         */
       if( $tipousuario_idtipousuario == $paciente)
       {
           $query_insUsuario = "INSERT INTO usuario(tipousuario_idtipousuario,
                                                    estado_idestado,
                                                    parentesco_idparentesco,
                                                    documento_iddocumento,
                                                    nombres,
                                                    primerapellido,
                                                    segundoapellido,
                                                    fechanacimiento,
                                                    edad,
                                                    meses,
                                                    genero_idgenero,
                                                    escolaridad_idescolaridad,
                                                    tutela,
                                                    eps_ideps)
                                           VALUES ('$tipousuario_idtipousuario',
                                                   '$estado_idestado',
                                                   '$parentesco_idparentesco',
                                                   '$documento_iddocumento',
                                                   '$nombres',
                                                   '$primerapellido',
                                                   '$segundoapellido',
                                                   '$fechanacimiento',
                                                   '$edad',
                                                   '$meses',
                                                   '$genero_idgenero',
                                                   '$escolaridad_idescolaridad',
                                                   '$tutela',
                                                   '$eps_ideps')";
       /**
        * Si el usuario que se va a guardar es un pariente
        */
       }else
       {
           $query_insUsuario = "INSERT INTO usuario(tipousuario_idtipousuario,
                                                    estado_idestado,
                                                    parentesco_idparentesco,
                                                    documento_iddocumento,
                                                    nombres,
                                                    primerapellido,
                                                    segundoapellido,
                                                    edad,
                                                    escolaridad_idescolaridad,
                                                    ocupacion,
                                                    direccion,
                                                    telefonofijo,
                                                    telefonocelular,
                                                    email)
                                           VALUES ('$tipousuario_idtipousuario',
                                                   '$estado_idestado',
                                                   '$parentesco_idparentesco',
                                                   '$documento_iddocumento',
                                                   '$nombres',
                                                   '$primerapellido',
                                                   '$segundoapellido',
                                                   '$edad',
                                                   '$escolaridad_idescolaridad',
                                                   '$ocupacion',
                                                   '$direccion',
                                                   '$telefonofijo',
                                                   '$telefonocelular',
                                                   '$email')";

       }

      $sql_insUsuario = mysqli_query($this->db->connect(),$query_insUsuario);

      if($sql_insUsuario)
      {
          $query_idUsuario = "SELECT MAX(idusuario) id FROM usuario";

          $sql_idUsuario = mysqli_query($this->db->connect(),$query_idUsuario);

          if($sql_idUsuario)
          {
              $row_idUsuario =  mysqli_fetch_assoc( $sql_idUsuario );

              $idUsuario = $row_idUsuario['id'];

              return $idUsuario;
          }else
          {
              return $error;
          }
      }else
      {
          return $error;
      }
    }
  
    public function actualizar_Usuario($idusuario,
                                     $parentesco_idparentesco,
                                     $nombres,
                                     $primerapellido,
                                     $segundoapellido,
                                     $fechanacimiento,
                                     $edad,
                                     $meses,
                                     $genero_idgenero,
                                     $escolaridad_idescolaridad,
                                     $ocupacion,
                                     $tutela,
                                     $eps_ideps,
                                     $direccion,
                                     $telefonofijo,
                                     $telefonocelular,
                                     $email)
  {
      $hijo = 3; // Parentesco

      if($parentesco_idparentesco == $hijo)
      {

          $query_upUsuario = "UPDATE usuario
                              SET nombres                   = '$nombres',
                                  primerapellido            = '$primerapellido',
                                  segundoapellido           = '$segundoapellido',
                                  fechanacimiento           = '$fechanacimiento',
                                  edad                      = '$edad',
                                  meses                     = '$meses',
                                  genero_idgenero           = '$genero_idgenero,',
                                  escolaridad_idescolaridad = '$escolaridad_idescolaridad',
                                  tutela                    = '$tutela',
                                  eps_ideps                 = '$eps_ideps'
                             WHERE idusuario = '$idusuario'";
      }else
      {
          $query_upUsuario = "UPDATE usuario
                              SET  parentesco_idparentesco   = '$parentesco_idparentesco',
                                   nombres                   = '$nombres',
                                   primerapellido            = '$primerapellido',
                                   segundoapellido           = '$segundoapellido',
                                   edad                      = '$edad',
                                   escolaridad_idescolaridad = '$escolaridad_idescolaridad',
                                   ocupacion                 = '$ocupacion',
                                   direccion                 = '$direccion',
                                   telefonofijo              = '$telefonofijo',
                                   telefonocelular           = '$telefonocelular',
                                   email                     = '$email'
                              WHERE idusuario = '$idusuario'";
      }

      $sql_upPaciente = mysqli_query($this->db->connect(),$query_upUsuario);

      if($sql_upPaciente)
      {
          return true;
      }else
      {
          return false;
      }
  }
  
  public function validarEscolaridad($idEscolaridad) {
        $idescolaridadOtro = 8;
        if ($idEscolaridad == null || $idEscolaridad == ' ')
        {
            return $idescolaridadOtro;
        }else
        {
            return $idEscolaridad;
        }
    }
  
  public function procesarInsUsuario($documento,
                                     $idTipoDocumento,
                                     $idPaciente,
                                     $tipousuario_idtipousuario,
                                     $estado_idestado,
                                     $parentesco_idparentesco,
                                     $nombres,
                                     $primerapellido,
                                     $segundoapellido,
                                     $fechanacimiento,
                                     $edad,
                                     $meses,
                                     $genero_idgenero,
                                     $escolaridad_idescolaridad,
                                     $ocupacion,
                                     $tutela,
                                     $eps_ideps,
                                     $direccion,
                                     $telefonofijo,
                                     $telefonocelular,
                                     $email)
    {
        $valor_df = " ";
        $exito    = 1;
        $error    = 0;
        /**
         * Se inserta el documento del usuario y se obtiene el Id
         */
        $sql_insDocumento = $this->insertarDocumento($documento, $idTipoDocumento);

        if($sql_insDocumento != $error)
        {
            $idDocUsuario = $sql_insDocumento;
           /* $idescolaridad = validarEscolaridad($escolaridad_idescolaridad);
            $escolaridad_idescolaridad = $idescolaridad; */
            /**
             * Si el usuario que se va a procesar es un paciente
             */
            if ($idPaciente == null)
            {
                $sql_insUsuario = $this->insertar_Usuario ( $tipousuario_idtipousuario,
                                                            $estado_idestado,
                                                            $parentesco_idparentesco,
                                                            $idDocUsuario,
                                                            $nombres,
                                                            $primerapellido,
                                                            $segundoapellido,
                                                            $fechanacimiento,
                                                            $edad,
                                                            $meses,
                                                            $genero_idgenero,
                                                            $escolaridad_idescolaridad,
                                                            $valor_df,
                                                            $tutela,
                                                            $eps_ideps,
                                                            $valor_df,
                                                            $valor_df,
                                                            $valor_df,
                                                            $valor_df);
                if($sql_insUsuario != $error)
                {
                    $idUsuario = $sql_insUsuario;

                    return $idUsuario;

                }else {
                    return $error;
                }
                /**
                 * Si el usuario que se va a procesar es un pariente
                 */
            }else{

                $sql_insUsuario = $this->insertar_Usuario($tipousuario_idtipousuario,
                                                            $estado_idestado,
                                                            $parentesco_idparentesco,
                                                            $idDocUsuario,
                                                            $nombres,
                                                            $primerapellido,
                                                            $segundoapellido,
                                                            $valor_df,
                                                            $edad,
                                                            $valor_df,
                                                            $valor_df,
                                                            $escolaridad_idescolaridad,
                                                            $ocupacion,
                                                            $valor_df,
                                                            $valor_df,
                                                            $direccion,
                                                            $telefonofijo,
                                                            $telefonocelular,
                                                            $email);
                if($sql_insUsuario != $error)
                {
                    $idUsuario = $sql_insUsuario;
                    /**
                     * Se guardan los datos de la Afinidad entre el Paciente y el Pariente
                     */
                    $sql_insAfinidad = $this->insertarAfinidad($idPaciente,$idUsuario);

                    if($sql_insAfinidad)
                    {
                        return $exito;
                    }else {
                        return $error;
                    }
                }else
                {
                    return $error;
                }
            }
        }else
        {
            return $error;
        }
    }

    public function procesarUpUsuario($iddocumento,
                                     $documento,
                                     $tipodocumento_idtipodocumento,
                                     $idusuario,
                                     $tipousuario_idtipousuario,
                                     $parentesco_idparentesco,
                                     $nombres,
                                     $primerapellido,
                                     $segundoapellido,
                                     $fechanacimiento,
                                     $edad,
                                     $meses,
                                     $genero_idgenero,
                                     $escolaridad_idescolaridad,
                                     $ocupacion,
                                     $tutela,
                                     $eps_ideps,
                                     $direccion,
                                     $telefonofijo,
                                     $telefonocelular,
                                     $email)
  {
       $hijo = 1; // Parentesco

      $query_upDocumento = "UPDATE documento
                            SET   documento                     = '$documento',
                                  tipodocumento_idtipodocumento = '$tipodocumento_idtipodocumento'
                            WHERE iddocumento                   = '$iddocumento'";

      $sql_upDocumento = mysqli_query($this->db->connect(),$query_upDocumento);

      if($sql_upDocumento)
      {

          /**
           * Si el usuario a actualizar es el Paciente
           */
          if($parentesco_idparentesco == $hijo)
          {
                  $query_upUsuario = "UPDATE usuario
                                  SET nombres                   = '$nombres',
                                      primerapellido            = '$primerapellido',
                                      segundoapellido           = '$segundoapellido',
                                      fechanacimiento           = '$fechanacimiento',
                                      edad                      = '$edad',
                                      meses                     = '$meses',
                                      genero_idgenero           = '$genero_idgenero',
                                      escolaridad_idescolaridad = '$escolaridad_idescolaridad',
                                      tutela                    = '$tutela',
                                      eps_ideps                 = '$eps_ideps'
                             WHERE idusuario = '$idusuario'";

          /**
           * Si el usuario a actualizar es el Pariente
           */
          }else
          {
              $query_upUsuario = "UPDATE usuario
                              SET  tipousuario_idtipousuario = '$tipousuario_idtipousuario',
                                   parentesco_idparentesco   = '$parentesco_idparentesco',
                                   nombres                   = '$nombres',
                                   primerapellido            = '$primerapellido',
                                   segundoapellido           = '$segundoapellido',
                                   edad                      = '$edad',
                                   escolaridad_idescolaridad = '$escolaridad_idescolaridad',
                                   ocupacion                 = '$ocupacion',
                                   direccion                 = '$direccion',
                                   telefonofijo              = '$telefonofijo',
                                   telefonocelular           = '$telefonocelular',
                                   email                     = '$email'
                              WHERE idusuario = '$idusuario'";
          }

          $sql_upPaciente = mysqli_query($this->db->connect(),$query_upUsuario);

          if($sql_upPaciente)
          {
              return true;
          }else
          {
              return false;
          }
      }
  }
  
  public function insertarAfinidad($usuario_idusuario,$idfamiliar)
  {
      $query_insAfinidad = "INSERT INTO afinidad(usuario_idusuario,
                                                 idfamiliar)
                                        VALUES ('$usuario_idusuario',
                                               '$idfamiliar')";

      $sql_insAfinidad = mysqli_query($this->db->connect(),$query_insAfinidad);

      if($sql_insAfinidad){
           return true;
      }else{
          return false;
      }
  }
  
  public function  insertarCita($tipocita_idtipocita,
                                $estado_idestado,
                                $usuario_idusuario,
                                $usuario_idusuapl,
                                $fechacitaini,
                                $hora_tipohora_idtipohora,
                                $hora_idhora,
                                $observacion,
                                $motivoconsulta,
                                $expectativas,
                                $recomtenercta,
                                $infogral)
  {
      $agenda = 1; // Tipo Cita Agenda

      if($tipocita_idtipocita == $agenda)
      {
          $query_insCita = "INSERT INTO cita (tipocita_idtipocita,
                                            estado_idestado,
                                            usuario_idusuario,
                                            usuario_idusuapl,
                                            fechacitaini,
                                            hora_tipohora_idtipohora,
                                            hora_idhora,
                                            observacion)
                                   VALUES ('$tipocita_idtipocita',
                                           '$estado_idestado',
                                           '$usuario_idusuario',
                                           '$usuario_idusuapl',
                                           '$fechacitaini',
                                           '$hora_tipohora_idtipohora',
                                           '$hora_idhora',
                                           '$observacion')";
      }else
      {
          
          
          
          $query_insCita = "INSERT INTO cita(tipocita_idtipocita,
                                             estado_idestado,
                                             usuario_idusuario,
                                             usuario_idusuapl,
                                             fechacitaini,
                                             motivoconsulta,
                                             expectativas,
                                             recomtenercta,
                                             infogral)
                                   VALUES('$tipocita_idtipocita',
                                          '$estado_idestado',
                                          '$usuario_idusuario',
                                          '$usuario_idusuapl',
                                          '$fechacitaini',
                                          '$motivoconsulta',
                                          '$expectativas',
                                          '$recomtenercta',
                                          '$infogral')";
      }

      $sql_insCita = mysqli_query($this->db->connect(),$query_insCita);

      if($sql_insCita)
      {
          return true;
      }else
      {
          return false;
      }

  }
  

  //////insertarEvolucion
  
  public function insertarEvolucion($idusuario, $textoEvolucion){
    

    $texto = htmlentities($textoEvolucion,ENT_QUOTES,"UTF-8");
    
    
    //para mostrar el valor html_entity_decode($salida);
    
    $query_InsertEvolucion = "INSERT into evolucionprueba(textoevolucion, idusuario)
                            VALUES('$texto',$idusuario)";

    $sql_InsertEvolucion = mysqli_query($this->db->connect(),$query_InsertEvolucion);
    
    if ($sql_InsertEvolucion) {
        return true;
    }else {
        return false;
    }
    $this->db->close(); 
  }
  
  public function actualizaEvolucion($idpaciente,
                                            $conclusion,
                                            $idarea,
                                            $idbateria){
                                                
        $texto = htmlentities($conclusion,ENT_QUOTES,"UTF-8");

        $query_upEvolucion ="UPDATE conclusion
                        SET  conclusion         = '$texto'
                        WHERE bateria_idbateria = $idbateria 
                        AND usuario_idusuario1  = $idpaciente
                        AND bateria_area_idarea = $idarea";
        
        $sql_upEvolucion = mysqli_query($this->db->connect(),$query_upEvolucion);

        if($sql_upEvolucion){
          return true;
        }else
        {
         return false;
        }
    }
  
  public function consultarEvolucion(){
        
        $query_consultaEvolucion   = "SELECT * 
                                    FROM evolucionprueba";
                                    
        $sql_consultaEvolucion   = mysqli_query( $this->db->connect(), $query_consultaEvolucion );
        
        $nro_consultaEvolucion= mysqli_num_rows($sql_consultaEvolucion);
        
        if( $nro_consultaEvolucion > 0 ) 
        {
            while ( $row_consultaEvolucion = mysqli_fetch_assoc( $sql_consultaEvolucion) ) 
            {
                $arreglo_consultaEvolucion[] = $row_consultaEvolucion;
            }
            return $arreglo_consultaEvolucion;
        }else{
            return false;
        }
    }
  
  
  
  //////Registro Archivos
  
  public function insertarArchivo($idhistoria,
                                    $carpeta,
                                    $archivo,
                                    $ruta,
                                    $fecha){    
    
    $query_InsertAnexo = "INSERT into anexos(idhistoria, nro_interno, archivo, ruta, fecha_cargue)
                            VALUES($idhistoria, $carpeta, '$archivo', '$ruta', '$fecha')";

    $sql_InsertAnexo = mysqli_query($this->db->connect(),$query_InsertAnexo);
    
    if ($sql_InsertAnexo) {
        return true;
    }else {
        return false;
    }
    $this->db->close(); 
  }
  
  
  public function eliminarArchivo($idanexo){
      
    $cargarArchivo = $this->cargarArchivo($idanexo);
    if( $cargarArchivo > 0 ) 
    {          
        for ( $i = 0; $i< sizeof($cargarArchivo); $i++ ) 
    	{
            $nomarchivo		= $cargarArchivo[$i]['archivo'];
            $ruta	        = $cargarArchivo[$i]['ruta'];
            $archivo        = "../".$ruta."/".$nomarchivo;
            
            if(file_exists($archivo)){
                unlink($archivo);
            }
        }
    }
    
    $query_DELAnexo = "DELETE FROM anexos
                        WHERE idanexo in ($idanexo)";

    $sql_DELAnexo = mysqli_query($this->db->connect(),$query_DELAnexo);
    
    if ($sql_DELAnexo) {
        return true;
    }else {
        return false;
    }
    $this->db->close(); 
  }
  
  public function adminCargarListArchivos($idhistoria){
  
    $query_adminListArchivos= "select * from anexos
                            where idhistoria = $idhistoria";
    
    $sql_adminListArchivos = mysqli_query( $this->db->connect(), $query_adminListArchivos );
    
    $nro_adminListArchivos = mysqli_num_rows($sql_adminListArchivos);

    if( $nro_adminListArchivos > 0 ) 
    {               
        while ( $row_adminListArchivos = mysqli_fetch_assoc( $sql_adminListArchivos) ) 
        {
            $arreglo_adminListArchivos[]= $row_adminListArchivos;
        }
        return $arreglo_adminListArchivos;
    }else{
        return false;
    } 
    $this->db->close(); 
  }
  
  public function cargarArchivo($idanexo){
  
    $query_Archivos= "select * from anexos
                            where idanexo = $idanexo";
    
    $sql_Archivos = mysqli_query( $this->db->connect(), $query_Archivos );
    
    $nro_Archivos = mysqli_num_rows($sql_Archivos);
    
    if( $nro_Archivos > 0 ) 
    {               
        while ( $row_Archivos = mysqli_fetch_assoc( $sql_Archivos) ) 
        {
            $arreglo_Archivos[]= $row_Archivos;
        }
        return $arreglo_Archivos;
    }else{
        return false;
    } 
    $this->db->close(); 
  }
  
  
  
  
  
  
/****************************************************************************************************************************************************************************/
/*   														        HISTORIA CLINICA PSICOLOGIA
/*****************************************************************************************************************************************************************************/

  public function crearHistoria($idpaciente, $idarea, $idTerapeuta){
        
        $fecha = date("Y-m-d");
        
        $query_crearHistoria = "INSERT INTO historiaclinica (area_idarea,usuario_idusuario,usuario_idusuario1,fechacreacion)
                                VALUES  ('$idarea','$idpaciente','$idTerapeuta','$fecha')";

        $sql_crearHistoria = mysqli_query($this->db->connect(),$query_crearHistoria);
        
        if($sql_crearHistoria){
            
            $resultlast = mysqli_query($this->db->connect(),"SELECT MAX(idhistoriaclinica) id FROM historiaclinica");
            $rowlast = mysqli_fetch_row($resultlast);
            $idHistoria = $rowlast[0];
            
            /******************************************************************Remision************************************************************************************************/
            $query_insRemision  = "INSERT INTO remision (historiaclinica_idhistoriaclinica) VALUES ($idHistoria)";

            $sql_insRemision = mysqli_query($this->db->connect(),$query_insRemision);
            
            /******************************************************************Diagnosticos Previos************************************************************************************************************/
            $query_insDiag = "INSERT INTO diagnostico (tipodiagnostico_idtipodiagnostico,usuario_idusuario,historiaclinica_idhistoriaclinica) 
                                    VALUES (1,$idpaciente,$idHistoria)";
            
            $sql_insDiag = mysqli_query($this->db->connect(),$query_insDiag);
            
            /******************************************************************Historia o Antecedentes de las Dificultades************************************************************************************************************/
            $query_insAntDificultades = "INSERT INTO antecedente (tipoantecedente_idtipoantecedente,historiaclinica_idhistoriaclinica) 
                                VALUES (1,$idHistoria)";
            
            $sql_insAntDificultades = mysqli_query($this->db->connect(),$query_insAntDificultades);
            
            /******************************************************************Tratamientos Anteriores************************************************************************************************************/
            
            /******************************************************************Antecedentes Familiares Importantes************************************************************************************************************/

            $query_insAntFamiliares = "INSERT INTO antecedente (tipoantecedente_idtipoantecedente,historiaclinica_idhistoriaclinica) VALUES (2,$idHistoria)";
            
            $sql_insAntFamiliares = mysqli_query($this->db->connect(),$query_insAntFamiliares);

            /******************************************************************Antecedentes Prenatales************************************************************************************************************/

            $query_insAntPrenata = "INSERT INTO antecedente (tipoantecedente_idtipoantecedente,historiaclinica_idhistoriaclinica) VALUES (3,$idHistoria)";
            
            $sql_insAntPrenata = mysqli_query($this->db->connect(),$query_insAntPrenata);


            /******************************************************************Prenatal - Parto************************************************************************************************************/

            $query_insAntParto = "INSERT INTO antecedente (tipoantecedente_idtipoantecedente,historiaclinica_idhistoriaclinica) VALUES (4,$idHistoria)";
            
            $sql_insAntParto = mysqli_query($this->db->connect(),$query_insAntParto);
            
            /******************************************************************Antecedentes Postnatales e Historia Previa del Paciente********************************************************/
            $query_insAntPosnata = "INSERT INTO antecedente (tipoantecedente_idtipoantecedente,historiaclinica_idhistoriaclinica) VALUES (5,$idHistoria)";
            
            $sql_insAntPosnata = mysqli_query($this->db->connect(),$query_insAntPosnata);
            


            /******************************************************************Historia de Desarrollo**************************************************************************************/

            $query_insDllo1 = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo,historiaclinica_idhistoriaclinica) VALUES (1,$idHistoria)";
            $sql_insDllo1 = mysqli_query($this->db->connect(),$query_insDllo1);

            /*Se debe obtener el ultimo id de la tabla desarrollo donde el tipo desarrollo sea 1 */
            $resultDllo = mysqli_query($this->db->connect(),"SELECT MAX(iddesarrollo) FROM desarrollo WHERE tipodesarrollo_idtipodesarrollo = 1 AND historiaclinica_idhistoriaclinica = $idHistoria");
            $rowlastDllo = mysqli_fetch_row($resultDllo);
            $idDllo1 = $rowlastDllo[0];

            /*  Forma Alimentacion 1=Materno  */
            $query_insPeriodo1 = "INSERT INTO periodoalimentacion(desarrollo_iddesarrollo,desarrollo_historia_idhistoria,formaalimentacion_idformaalimentacion) VALUES ($idDllo1,$idHistoria,1)";
            
            $sql_insPeriodo1 = mysqli_query($this->db->connect(),$query_insPeriodo1);

            /* Forma Alimentacion 2=Tetero  */
            $query_insPeriodo2 = "INSERT INTO periodoalimentacion(desarrollo_iddesarrollo,desarrollo_historia_idhistoria,formaalimentacion_idformaalimentacion) VALUES ($idDllo1,$idHistoria,2)";
            
            $sql_insPeriodo2 = mysqli_query($this->db->connect(),$query_insPeriodo2);
            
            
            
            /******************************************************************Empleo Elementos Alimentaci贸n**************************************************************************************/
            $query_insDllo2 = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo,historiaclinica_idhistoriaclinica) VALUES (2,$idHistoria)";
            $sql_insDllo2 = mysqli_query($this->db->connect(),$query_insDllo2);

            /*Se debe obtener el ultimo id de la tabla desarrollo donde el tipo desarrollo sea 2 */
            $resultDllo2 = mysqli_query($this->db->connect(),"SELECT MAX(iddesarrollo) FROM desarrollo WHERE tipodesarrollo_idtipodesarrollo = 2 AND historiaclinica_idhistoriaclinica = $idHistoria");
            $rowlastDllo2 = mysqli_fetch_row($resultDllo2);
            $idDllo2 = $rowlastDllo2[0];

            $query_insUtens1 = "INSERT INTO empleoutensilio (desarrollo_iddesarrollo, desarrollo_historiaclinica_idhistoriaclinica,utensilio_idutensilio) VALUES ($idDllo2,$idHistoria,1)";
            $sql_insUtens1 = mysqli_query($this->db->connect(),$query_insUtens1);
            
            $query_insUtens2 = "INSERT INTO empleoutensilio (desarrollo_iddesarrollo, desarrollo_historiaclinica_idhistoriaclinica,utensilio_idutensilio) VALUES ($idDllo2,$idHistoria,2)";
            $sql_insUtens2 = mysqli_query($this->db->connect(),$query_insUtens2);
            
            $query_insUtens3 = "INSERT INTO empleoutensilio (desarrollo_iddesarrollo, desarrollo_historiaclinica_idhistoriaclinica,utensilio_idutensilio) VALUES ($idDllo2,$idHistoria,3)";
            $sql_insUtens3 = mysqli_query($this->db->connect(),$query_insUtens3);
            
            $query_insUtens4 = "INSERT INTO empleoutensilio (desarrollo_iddesarrollo, desarrollo_historiaclinica_idhistoriaclinica,utensilio_idutensilio) VALUES ($idDllo2,$idHistoria,4)";
            $sql_insUtens4 = mysqli_query($this->db->connect(),$query_insUtens4);
            
            $query_insUtens5 = "INSERT INTO empleoutensilio (desarrollo_iddesarrollo, desarrollo_historiaclinica_idhistoriaclinica,utensilio_idutensilio) VALUES ($idDllo2,$idHistoria,5)";
            $sql_insUtens5 = mysqli_query($this->db->connect(),$query_insUtens5);

            /******************************************************************Dificultades Comida***********************************************************************************************/

            $query_insDllo3 = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo,historiaclinica_idhistoriaclinica) VALUES (3,$idHistoria)";
            $sql_insDllo3 = mysqli_query($this->db->connect(),$query_insDllo3);

            /*Se debe obtener el ultimo id de la tabla desarrollo donde el tipo desarrollo sea 3 */
            $resultDllo3 = mysqli_query($this->db->connect(),"SELECT MAX(iddesarrollo) FROM desarrollo WHERE tipodesarrollo_idtipodesarrollo = 3 AND historiaclinica_idhistoriaclinica = $idHistoria");
            $rowlastDllo3 = mysqli_fetch_row($resultDllo3);
            $idDllo3 = $rowlastDllo3[0];
            
            $query_insComida1 = "INSERT INTO dificultadcomida (desarrollo_iddesarrollo,dificultad_iddificultad,desarrollo_historiaclinica_idhistoriaclinica) VALUES ($idDllo3,1,$idHistoria)";
            $sql_insComida1 = mysqli_query($this->db->connect(),$query_insComida1);
            
            $query_insComida2 = "INSERT INTO dificultadcomida (desarrollo_iddesarrollo,dificultad_iddificultad,desarrollo_historiaclinica_idhistoriaclinica) VALUES ($idDllo3,2,$idHistoria)";
            $sql_insComida2 = mysqli_query($this->db->connect(),$query_insComida2);
            
            $query_insComida3 = "INSERT INTO dificultadcomida (desarrollo_iddesarrollo,dificultad_iddificultad,desarrollo_historiaclinica_idhistoriaclinica) VALUES ($idDllo3,3,$idHistoria)";
            $sql_insComida3 = mysqli_query($this->db->connect(),$query_insComida3);
            
            $query_insComida4 = "INSERT INTO dificultadcomida (desarrollo_iddesarrollo,dificultad_iddificultad,desarrollo_historiaclinica_idhistoriaclinica) VALUES ($idDllo3,4,$idHistoria)";
            $sql_insComida4 = mysqli_query($this->db->connect(),$query_insComida4);
            
            $query_insComida5 = "INSERT INTO dificultadcomida (desarrollo_iddesarrollo,dificultad_iddificultad,desarrollo_historiaclinica_idhistoriaclinica) VALUES ($idDllo3,5,$idHistoria)";
            $sql_insComida5 = mysqli_query($this->db->connect(),$query_insComida5);

            /******************************************************************Desarrollo del Lenguaje ***********************************************************************************************/

            $query_insDllo4 = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo,historiaclinica_idhistoriaclinica) VALUES (4,$idHistoria)";
            $sql_insDllo4 = mysqli_query($this->db->connect(),$query_insDllo4);

            /*Se debe obtener el ultimo id de la tabla desarrollo donde el tipo desarrollo sea 4 */
            $resultDllo4 = mysqli_query($this->db->connect(),"SELECT MAX(iddesarrollo) FROM desarrollo WHERE tipodesarrollo_idtipodesarrollo = 4 AND historiaclinica_idhistoriaclinica = $idHistoria");
            $rowlastDllo4 = mysqli_fetch_row($resultDllo4);
            $idDllo4 = $rowlastDllo4[0];
            
            $query_insHabla1 = "INSERT INTO habla (desarrollo_iddesarrollo, frase_idfrase, desarrollo_historiaclinica_idhistoriaclinica) VALUES ($idDllo4,1,$idHistoria)";
            $sql_insHabla1 = mysqli_query($this->db->connect(),$query_insHabla1);
            
            $query_insHabla2 = "INSERT INTO habla (desarrollo_iddesarrollo, frase_idfrase, desarrollo_historiaclinica_idhistoriaclinica) VALUES ($idDllo4,2,$idHistoria)";
            $sql_insHabla2 = mysqli_query($this->db->connect(),$query_insHabla2);
            
            $query_insHabla3 = "INSERT INTO habla (desarrollo_iddesarrollo, frase_idfrase, desarrollo_historiaclinica_idhistoriaclinica) VALUES ($idDllo4,3,$idHistoria)";
            $sql_insHabla3 = mysqli_query($this->db->connect(),$query_insHabla3);

            $query_insHabla4 = "INSERT INTO habla (desarrollo_iddesarrollo, frase_idfrase, desarrollo_historiaclinica_idhistoriaclinica) VALUES ($idDllo4,4,$idHistoria)";
            $sql_insHabla4 = mysqli_query($this->db->connect(),$query_insHabla4);
            

            /******************************************************************Dificultades de Habla ***************************************************************************************************/

            $query_insDllo5 = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo,historiaclinica_idhistoriaclinica) VALUES (5,$idHistoria)";
            $sql_insDllo5 = mysqli_query($this->db->connect(),$query_insDllo5);

            /******************************************************************Comunicacion no Verbal ***************************************************************************************************/

            $query_insDllo6 = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo,historiaclinica_idhistoriaclinica) VALUES (6,$idHistoria)";
            $sql_insDllo6 = mysqli_query($this->db->connect(),$query_insDllo6);

            /****************************************************************************************************************************************************************************/
            /*   																	DESARROLLO	SOCIO-EMOCIONAL																						*/
            /******************************************************************Desarrolo Socio - Emocional ***************************************************************************************************/

            $query_insDllo7 = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo,historiaclinica_idhistoriaclinica) VALUES (7,$idHistoria)";
            $sql_insDllo7 = mysqli_query($this->db->connect(),$query_insDllo7);

            /******************************************************************Resistencia al cambio - apego a Objetos / Rutinas *******************************************************************************/

            $query_insDllo8 = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo,historiaclinica_idhistoriaclinica) VALUES (8,$idHistoria)";
            $sql_insDllo8 = mysqli_query($this->db->connect(),$query_insDllo8);


            /****************************************************************************************************************************************************************************/
            /*   																	RESPUESTA SENSORIAL
            /******************************************************************Auditiva***************************************************************************************************/
						
		    $query_insRespSens1 = "INSERT INTO respuestasensorial (estimulo_idestimulo, 
        							    estimulo_tiporespuesta_idtiporespuesta, 
        								estimulo_tipoestimulo_idtipoestimulo,
                                        historiaclinica_idhistoriaclinica)
                                    VALUES (1,1,1,$idHistoria)";
            $sql_insinsRespSens1 = mysqli_query($this->db->connect(),$query_insRespSens1);
			
			$query_insRespSens2 = "INSERT INTO respuestasensorial (estimulo_idestimulo, 
        							    estimulo_tiporespuesta_idtiporespuesta, 
        								estimulo_tipoestimulo_idtipoestimulo,
                                        historiaclinica_idhistoriaclinica)
                                    VALUES (2,1,2,$idHistoria)";
            $sql_insinsRespSens2 = mysqli_query($this->db->connect(),$query_insRespSens2);

            /******************************************************************Visual***************************************************************************************************/ 
			
			$query_insRespSens3 = "INSERT INTO respuestasensorial (estimulo_idestimulo, 
        							    estimulo_tiporespuesta_idtiporespuesta, 
        								estimulo_tipoestimulo_idtipoestimulo,
                                        historiaclinica_idhistoriaclinica)
                                    VALUES (3,2,1,$idHistoria)";
            $sql_insinsRespSens3 = mysqli_query($this->db->connect(),$query_insRespSens3);
                        
			$query_insRespSens4 = "INSERT INTO respuestasensorial (estimulo_idestimulo, 
        							    estimulo_tiporespuesta_idtiporespuesta, 
        								estimulo_tipoestimulo_idtipoestimulo,
                                        historiaclinica_idhistoriaclinica)
                                    VALUES (4,2,2,$idHistoria)";
            $sql_insinsRespSens4 = mysqli_query($this->db->connect(),$query_insRespSens4);
                        
            /******************************************************************Otro Receptor***************************************************************************************************/
			
			$query_insRespSens5 = "INSERT INTO respuestasensorial (estimulo_idestimulo, 
        							    estimulo_tiporespuesta_idtiporespuesta, 
        								estimulo_tipoestimulo_idtipoestimulo,
                                        historiaclinica_idhistoriaclinica)
                                    VALUES (5,3,1,$idHistoria)";
            $sql_insinsRespSens5 = mysqli_query($this->db->connect(),$query_insRespSens5);
			
			$query_insRespSens6 = "INSERT INTO respuestasensorial (estimulo_idestimulo, 
        							    estimulo_tiporespuesta_idtiporespuesta, 
        								estimulo_tipoestimulo_idtipoestimulo,
                                        historiaclinica_idhistoriaclinica)
                                    VALUES (6,3,2,$idHistoria)";
            $sql_insinsRespSens6 = mysqli_query($this->db->connect(),$query_insRespSens6);

            /****************************************************************** Sueno ******************************************************************************************************/                        

			$query_insRespSens7 = "INSERT INTO respuestasensorial (estimulo_idestimulo, 
        							    estimulo_tiporespuesta_idtiporespuesta, 
        								estimulo_tipoestimulo_idtipoestimulo,
                                        historiaclinica_idhistoriaclinica)
                                    VALUES (7,4,3,$idHistoria)";
            $sql_insinsRespSens7 = mysqli_query($this->db->connect(),$query_insRespSens7);


            /*   																	DESEMPENO ACTUAL																					*/
            /****************************************************************** Desempeno Actual Repertorios Basicos*********************************************************************/

            $query_insRepBas = "INSERT INTO repertoriobasico (historiaclinica_idhistoriaclinica) VALUES ($idHistoria)";
            $sql_insRepBas = mysqli_query($this->db->connect(),$query_insRepBas);
            
            /****************************************************************** Higiene  *********************************************************************************************/

            $query_insHigiene1 = "INSERT INTO higiene (aseopersonal_idaseopersonal, historiaclinica_idhistoriaclinica) VALUES (1,$idHistoria)";
            $sql_insHigiene1 = mysqli_query($this->db->connect(),$query_insHigiene1);
            
            $query_insHigiene2 = "INSERT INTO higiene (aseopersonal_idaseopersonal, historiaclinica_idhistoriaclinica) VALUES (2,$idHistoria)";
            $sql_insHigiene2 = mysqli_query($this->db->connect(),$query_insHigiene2);
            
            $query_insHigiene3 = "INSERT INTO higiene (aseopersonal_idaseopersonal, historiaclinica_idhistoriaclinica) VALUES (3,$idHistoria)";
            $sql_insHigiene3 = mysqli_query($this->db->connect(),$query_insHigiene3);
            
            $query_insHigiene4 = "INSERT INTO higiene (aseopersonal_idaseopersonal, historiaclinica_idhistoriaclinica) VALUES (4,$idHistoria)";
            $sql_insHigiene4 = mysqli_query($this->db->connect(),$query_insHigiene4);
            
            $query_insHigiene5 = "INSERT INTO higiene (aseopersonal_idaseopersonal, historiaclinica_idhistoriaclinica) VALUES (5,$idHistoria)";
            $sql_insHigiene5 = mysqli_query($this->db->connect(),$query_insHigiene5);
            
            $query_insHigiene6 = "INSERT INTO higiene (aseopersonal_idaseopersonal, historiaclinica_idhistoriaclinica) VALUES (6,$idHistoria)";
            $sql_insHigiene6 = mysqli_query($this->db->connect(),$query_insHigiene6);

            /****************************************************************** Vestido  *********************************************************************************************/

            $query_insVestido1 = "INSERT INTO formavestirse (prenda_idprenda,historiaclinica_idhistoriaclinica) VALUES (1,$idHistoria)";
            $sql_insVestido1 = mysqli_query($this->db->connect(),$query_insVestido1);
            
            $query_insVestido2 = "INSERT INTO formavestirse (prenda_idprenda,historiaclinica_idhistoriaclinica) VALUES (2,$idHistoria)";
            $sql_insVestido2 = mysqli_query($this->db->connect(),$query_insVestido2);
            
            $query_insVestido3 = "INSERT INTO formavestirse (prenda_idprenda,historiaclinica_idhistoriaclinica) VALUES (3,$idHistoria)";
            $sql_insVestido3 = mysqli_query($this->db->connect(),$query_insVestido3);
            
            $query_insVestido4 = "INSERT INTO formavestirse (prenda_idprenda,historiaclinica_idhistoriaclinica) VALUES (4,$idHistoria)";
            $sql_insVestido4 = mysqli_query($this->db->connect(),$query_insVestido4);
            
            $query_insVestido5 = "INSERT INTO formavestirse (prenda_idprenda,historiaclinica_idhistoriaclinica) VALUES (5,$idHistoria)";
            $sql_insVestido5 = mysqli_query($this->db->connect(),$query_insVestido5);
            
            $query_insVestido6 = "INSERT INTO formavestirse (prenda_idprenda,historiaclinica_idhistoriaclinica) VALUES (6,$idHistoria)";
            $sql_insVestido6 = mysqli_query($this->db->connect(),$query_insVestido6);
            
            $query_insVestido7 = "INSERT INTO formavestirse (prenda_idprenda,historiaclinica_idhistoriaclinica) VALUES (7,$idHistoria)";
            $sql_insVestido7 = mysqli_query($this->db->connect(),$query_insVestido7);
            
            $query_insHabilidad1 = "INSERT INTO registrohabilidad (habilidadmotriz_idhabilidadmotriz,historiaclinica_idhistoriaclinica) VALUES(1,$idHistoria)";
            $sql_insHabilidad1 = mysqli_query($this->db->connect(),$query_insHabilidad1);
            
            $query_insHabilidad2 = "INSERT INTO registrohabilidad (habilidadmotriz_idhabilidadmotriz,historiaclinica_idhistoriaclinica) VALUES(2,$idHistoria)";
            $sql_insHabilidad2 = mysqli_query($this->db->connect(),$query_insHabilidad2);
            
            $query_insHabilidad3 = "INSERT INTO registrohabilidad (habilidadmotriz_idhabilidadmotriz,historiaclinica_idhistoriaclinica) VALUES(3,$idHistoria)";
            $sql_insHabilidad3 = mysqli_query($this->db->connect(),$query_insHabilidad3);
            
            $query_insHabilidad4 = "INSERT INTO registrohabilidad (habilidadmotriz_idhabilidadmotriz,historiaclinica_idhistoriaclinica) VALUES(4,$idHistoria)";
            $sql_insHabilidad4 = mysqli_query($this->db->connect(),$query_insHabilidad4);
            
            $query_insHabilidad5 = "INSERT INTO registrohabilidad (habilidadmotriz_idhabilidadmotriz,historiaclinica_idhistoriaclinica) VALUES(5,$idHistoria)";
            $sql_insHabilidad5 = mysqli_query($this->db->connect(),$query_insHabilidad5);
            
            $query_insHabilidad6 = "INSERT INTO registrohabilidad (habilidadmotriz_idhabilidadmotriz,historiaclinica_idhistoriaclinica) VALUES(6,$idHistoria)";
            $sql_insHabilidad6 = mysqli_query($this->db->connect(),$query_insHabilidad6);

            /****************************************************************************************************************************************************************************/
            /*   																	HABILIDADES ESPECIALES 																					*/
            /****************************************************************** Habilidades Especiales *********************************************************************/

            $query_insHabilidad = "INSERT INTO habilidad (historiaclinica_idhistoriaclinica) VALUES ($idHistoria)";
            $sql_insHabilidad= mysqli_query($this->db->connect(),$query_insHabilidad);
            
            /****************************************************************************************************************************************************************************/
            //*   																	BATERIAS 						        															*/
            // usuario_idusuario  = Terapeuta --
            //usuario_idusuario1 = Paciente  --
            
            // M-CHAT --
            //*******************************************************************M-CHAT*********************************************************************************************************** --

            $query_insMCHAT = "INSERT INTO respuesta(pregunta_idpregunta
            			   	       ,pregunta_bateria_idbateria
            					   ,pregunta_bateria_area_idarea
            					   ,usuario_idusuario
            					   ,usuario_idusuario1
            					   ,respuesta)VALUES (1,1,1,5,$idpaciente,NULL),
                                                       (2,1,1,5,$idpaciente,NULL),
                                                           (3,1,1,5,$idpaciente,NULL),
                                                           (4,1,1,5,$idpaciente,NULL),
                                                           (5,1,1,5,$idpaciente,NULL),
                                                           (6,1,1,5,$idpaciente,NULL),
                                                           (7,1,1,5,$idpaciente,NULL),
                                                           (8,1,1,5,$idpaciente,NULL),
                                                           (9,1,1,5,$idpaciente,NULL),
                                                           (10,1,1,5,$idpaciente,NULL),
                                                           (11,1,1,5,$idpaciente,NULL),
                                                           (12,1,1,5,$idpaciente,NULL),
                                                           (13,1,1,5,$idpaciente,NULL),
                                                           (14,1,1,5,$idpaciente,NULL),
                                                           (15,1,1,5,$idpaciente,NULL),
                                                           (16,1,1,5,$idpaciente,NULL),
                                                           (17,1,1,5,$idpaciente,NULL),
                                                           (18,1,1,5,$idpaciente,NULL),
                                                           (19,1,1,5,$idpaciente,NULL),
                                                           (20,1,1,5,$idpaciente,NULL),
                                                           (21,1,1,5,$idpaciente,NULL),
                                                           (22,1,1,5,$idpaciente,NULL),
                                                           (23,1,1,5,$idpaciente,NULL)";
            
            $sql_insMCHAT = mysqli_query($this->db->connect(),$query_insMCHAT);
            
            $query_insConclusionMCHAT = "INSERT INTO conclusion (conclusion, usuario_idusuario, usuario_idusuario1, bateria_idbateria, bateria_area_idarea) 
                                         VALUES ( NULL, 5, $idpaciente, 1, 1)";
                                        
            $sql_insConclusionMCHAT = mysqli_query($this->db->connect(),$query_insConclusionMCHAT);
            
            //*******************************************************************DSM V *********************************************************************************************************** --
            
            
            $query_insDSMV = "INSERT INTO respuesta ( pregunta_idpregunta								   
                                   ,pregunta_bateria_idbateria
            			   	       ,pregunta_bateria_area_idarea                                   
            					   ,usuario_idusuario
            					   ,usuario_idusuario1)
            		        VALUES(24,2,1,5,$idpaciente),
            					  (25,2,1,5,$idpaciente),
                                  (26,2,1,5,$idpaciente),
                                  (27,2,1,5,$idpaciente),
                                  (28,2,1,5,$idpaciente),
            				      (29,2,1,5,$idpaciente),
                                  (30,2,1,5,$idpaciente),
                                  (31,2,1,5,$idpaciente),
                                  (32,2,1,5,$idpaciente),
                                  (33,2,1,5,$idpaciente),
                                  (34,2,1,5,$idpaciente)";
            
            $sql_insDSMV = mysqli_query($this->db->connect(),$query_insDSMV);
            
            $query_insConclusionDSMV = "INSERT INTO conclusion (conclusion, usuario_idusuario, usuario_idusuario1, bateria_idbateria, bateria_area_idarea) 
                                         VALUES ( NULL, 5, $idpaciente, 2, 1)";
                                        
            $sql_insConclusionDSMV = mysqli_query($this->db->connect(),$query_insConclusionDSMV);


            //******************************************************************* IDEA *********************************************************************************************************** --
            //*********************************************************************Respuesta por Pregunta Dimension *****************************************************************************************--                              
            
            $query_insIDEA ="INSERT INTO respuesta (pregunta_idpregunta
            					  ,criterio_dim_idcriterio_dim
            					  ,pregunta_bateria_idbateria
            					  ,pregunta_bateria_area_idarea
            					  ,usuario_idusuario
            					  ,usuario_idusuario1
            					  ,respuesta) 
            		VALUES (35,1,3,1,5,$idpaciente,0),
            			   (36,1,3,1,5,$idpaciente,0),
            			   (37,1,3,1,5,$idpaciente,0),
            			   (38,1,3,1,5,$idpaciente,0),
            			   (39,1,3,1,5,$idpaciente,0),
            			   (40,2,3,1,5,$idpaciente,0),
            			   (41,2,3,1,5,$idpaciente,0),
            			   (42,2,3,1,5,$idpaciente,0),
            			   (43,2,3,1,5,$idpaciente,0),
            		       (44,2,3,1,5,$idpaciente,0),
            			   (45,3,3,1,5,$idpaciente,0),
            			   (46,3,3,1,5,$idpaciente,0),
            			   (47,3,3,1,5,$idpaciente,0),
            			   (48,3,3,1,5,$idpaciente,0),
            			   (49,3,3,1,5,$idpaciente,0),
            			   (50,4,3,1,5,$idpaciente,0),
            			   (51,4,3,1,5,$idpaciente,0),
            			   (52,4,3,1,5,$idpaciente,0),
            			   (53,4,3,1,5,$idpaciente,0),
            			   (54,4,3,1,5,$idpaciente,0),
            			   (55,5,3,1,5,$idpaciente,0),
            			   (56,5,3,1,5,$idpaciente,0),
            			   (57,5,3,1,5,$idpaciente,0),
            			   (58,5,3,1,5,$idpaciente,0),
            			   (59,5,3,1,5,$idpaciente,0),
            			   (60,6,3,1,5,$idpaciente,0),
            			   (61,6,3,1,5,$idpaciente,0),
            			   (62,6,3,1,5,$idpaciente,0),
            			   (63,6,3,1,5,$idpaciente,0),
            			   (64,6,3,1,5,$idpaciente,0),
            			   (65,7,3,1,5,$idpaciente,0),
            			   (66,7,3,1,5,$idpaciente,0),
            			   (67,7,3,1,5,$idpaciente,0),
            			   (68,7,3,1,5,$idpaciente,0),
            			   (69,7,3,1,5,$idpaciente,0),
            			   (70,8,3,1,5,$idpaciente,0),
            			   (71,8,3,1,5,$idpaciente,0),
            			   (72,8,3,1,5,$idpaciente,0),
            			   (73,8,3,1,5,$idpaciente,0),
            			   (74,8,3,1,5,$idpaciente,0),
            			   (75,9,3,1,5,$idpaciente,0),
            			   (76,9,3,1,5,$idpaciente,0),
            			   (77,9,3,1,5,$idpaciente,0),
            			   (78,9,3,1,5,$idpaciente,0),
            			   (79,9,3,1,5,$idpaciente,0),
            			   (80,10,3,1,5,$idpaciente,0),
            			   (81,10,3,1,5,$idpaciente,0),
            			   (82,10,3,1,5,$idpaciente,0),
            			   (83,10,3,1,5,$idpaciente,0),
            			   (84,10,3,1,5,$idpaciente,0),
            			   (85,11,3,1,5,$idpaciente,0),
            			   (86,11,3,1,5,$idpaciente,0),
            			   (87,11,3,1,5,$idpaciente,0),
            			   (88,11,3,1,5,$idpaciente,0),
            			   (89,11,3,1,5,$idpaciente,0),
            			   (90,12,3,1,5,$idpaciente,0),
            			   (91,12,3,1,5,$idpaciente,0),
            			   (92,12,3,1,5,$idpaciente,0),
            			   (93,12,3,1,5,$idpaciente,0),
            			   (94,12,3,1,5,$idpaciente,0)";
            			   
            $sql_insIDEA = mysqli_query($this->db->connect(),$query_insIDEA);
            
            $query_insConclusionIDEA = "INSERT INTO conclusion (conclusion, usuario_idusuario, usuario_idusuario1, bateria_idbateria, bateria_area_idarea) 
                                         VALUES ( NULL, 5, $idpaciente, 3, 1)";
                                        
            $sql_insConclusionIDEA = mysqli_query($this->db->connect(),$query_insConclusionIDEA);

            // *********************************************************************Respuesta por Pregunta Criterio *****************************************************************************************--                                                            
            
            $query_insDIM ="INSERT INTO respuesta ( criterio_dim_idcriterio_dim		
            			   		   ,pregunta_bateria_idbateria
            					   ,pregunta_bateria_area_idarea
            					   ,usuario_idusuario
            					   ,usuario_idusuario1) 
                            VALUES(1,3,1,5,$idpaciente),
            		   		      (2,3,1,5,$idpaciente),
            					  (3,3,1,5,$idpaciente),
            					  (4,3,1,5,$idpaciente),
            					  (5,3,1,5,$idpaciente),
            					  (6,3,1,5,$idpaciente),
            					  (7,3,1,5,$idpaciente),
            					  (8,3,1,5,$idpaciente),
            					  (9,3,1,5,$idpaciente),
            					  (10,3,1,5,$idpaciente),
            					  (11,3,1,5,$idpaciente),
            					  (12,3,1,5,$idpaciente)";     
            
            $sql_insDIM = mysqli_query($this->db->connect(),$query_insDIM);

            return $idHistoria;

        }else{
            $idHistoria = 0;
            return $idHistoria;
        }
    }
  
  
  
    public function consultarHistoria($idpaciente, $idarea){
        $query_consultaHistoria   = "SELECT *
                                    FROM historiaclinica
                                    WHERE usuario_idusuario = $idpaciente
                                    AND area_idarea = $idarea";
                                    
        $sql_consultaHistoria   = mysqli_query( $this->db->connect(), $query_consultaHistoria );
            
        $nro_consultaHistoria = mysqli_num_rows($sql_consultaHistoria);
        
        if( $nro_consultaHistoria > 0 ) 
        {               
            while ( $row_consultaHistoria = mysqli_fetch_assoc( $sql_consultaHistoria) ) 
            {
                $arreglo_consultaHistoria[]= $row_consultaHistoria;
            }
            return $arreglo_consultaHistoria;
        }else{
            return false;
        }
    }
    
    
    /******************************************************************TAB DATOS GENERALES************************************************************************************************/
    
    public function consultarHistoriaPsicoId($idpaciente){
        
        $query_consultaHistoriaPsicoId   = "SELECT idhistoriaclinica
                                        FROM historiaclinica
                                        WHERE area_idarea = 1
                                        AND usuario_idusuario = $idpaciente";
        
        $sql_consultaHistoriaPsicoId   = mysqli_query( $this->db->connect(), $query_consultaHistoriaPsicoId );
        
        $nro_consultaHistoriaPsicoId = mysqli_num_rows($sql_consultaHistoriaPsicoId);

        if( $nro_consultaHistoriaPsicoId > 0 ) 
        {              
            while ( $row_consultaHistoriaPsicoId = mysqli_fetch_assoc( $sql_consultaHistoriaPsicoId) ) 
            {
                $arreglo_consultaHistoriaPsicoId[]= $row_consultaHistoriaPsicoId;
            }
            return $arreglo_consultaHistoriaPsicoId;
        }else{
            return false;
        }
    }
    
    public function consultarIdHistoriaPsico($idpaciente){
        
        $query_consultaIdHistoriaPsico   = "SELECT idhistoriaclinica
                                        FROM historiaclinica
                                        WHERE area_idarea = 1
                                        AND usuario_idusuario = $idpaciente";
        
        $sql_consultaIdHistoriaPsico   = mysqli_query( $this->db->connect(), $query_consultaIdHistoriaPsico );
        
        $nro_consultaIdHistoriaPsico = mysqli_num_rows($sql_consultaIdHistoriaPsico);

        if( $nro_consultaIdHistoriaPsico > 0 ) 
        {              
            while ( $row_consultaIdHistoriaPsico = mysqli_fetch_assoc( $sql_consultaIdHistoriaPsico) ) 
            {
                $arreglo_consultaIdHistoriaPsico[]= $row_consultaIdHistoriaPsico;
            }
            return $arreglo_consultaIdHistoriaPsico;
        }else{
            return false;
        }
    }
    public function consultarDatosRemision($idpaciente)
    {
        $idareaPsico = 1;

        $query_consultaRemision = "SELECT r.remitidopor
                                          ,r.motivo
                                   FROM  remision r
                                        ,historiaclinica h 
                                   WHERE h.usuario_idusuario = '$idpaciente'
                                   AND h.idhistoriaclinica = r.historiaclinica_idhistoriaclinica
                                   AND h.area_idarea = '$idareaPsico'";
        $sql_consultaRemision   = mysqli_query( $this->db->connect(), $query_consultaRemision );

        $nro_consultaRemision = mysqli_num_rows($sql_consultaRemision);

        if( $nro_consultaRemision > 0 )
        {
            while ( $row_consultaRemision = mysqli_fetch_assoc( $sql_consultaRemision) )
            {
                $arreglo_consultaRemision[]= $row_consultaRemision;
            }

        }else{
            return false;
        }

        return $arreglo_consultaRemision;
    }
    
    public function consultarDatosHistoria($idpaciente, $idhistoria){
        
        $query_consultaRemision   = "SELECT  rem.idremision
                                           ,rem.remitidopor
                                    	   ,rem.motivo
                                           ,h.usuario_idusuario
                                           ,u.ciudadresidencia
                                           ,u.direccion
                                           ,u.informante
                                           ,u.lugarnacimiento
                                    FROM remision rem, historiaclinica h, usuario u
                                    WHERE rem.historiaclinica_idhistoriaclinica = $idhistoria
                                    AND h.idhistoriaclinica = rem.historiaclinica_idhistoriaclinica
                                    AND u.idusuario = h.usuario_idusuario";
                                    
        $sql_consultaRemision   = mysqli_query( $this->db->connect(), $query_consultaRemision );
            
        $nro_consultaRemision = mysqli_num_rows($sql_consultaRemision);

        if( $nro_consultaRemision > 0 ) 
        {              
            while ( $row_consultaRemision = mysqli_fetch_assoc( $sql_consultaRemision) ) 
            {
                $arreglo_consultaDatosHistoria[]= $row_consultaRemision;
            }
            //return $arreglo_consultaDatosHistoria;
        }else{
            return false;
        }
        
        return $arreglo_consultaDatosHistoria;
    }
    
    
    
    public function consultarConstitucion($idpaciente){
        
        $query_consultaConstitucion   = "SELECT fam.idusuario
                                      ,par.parentesco 
                                      ,fam.nombres
                                      ,fam.primerapellido
                                      ,fam.edad
                                      ,fam.ocupacion
                                      ,af.constfamiliar
                                FROM  usuario fam
                                     ,afinidad af
                                     ,parentesco par
                                WHERE af.usuario_idusuario = $idpaciente
                                AND  af.idfamiliar = fam.idusuario
                                AND  fam.parentesco_idparentesco = par.idparentesco";
        
        $sql_consultaConstitucion   = mysqli_query( $this->db->connect(), $query_consultaConstitucion );
        
        $nro_consultaConstitucion = mysqli_num_rows($sql_consultaConstitucion);

        if( $nro_consultaConstitucion > 0 ) 
        {              
            while ( $row_consultaConstitucion = mysqli_fetch_assoc( $sql_consultaConstitucion) ) 
            {
                $arreglo_consultaConstitucion[]= $row_consultaConstitucion;
            }
            return $arreglo_consultaConstitucion;
        }else{
            return false;
        }
    }
    
     public function insertarConstitucion($idpaciente,
                                            $nombresConstitucion,
                                            $apellidosConstitucion,
                                            $edadConstitucion,
                                            $acudienteIdParentesco,
                                            $ocupacionConstitucion){
                                                
        $query_insConstitucion = "INSERT INTO usuario(nombres, primerapellido, edad, parentesco_idparentesco, ocupacion, tipousuario_idtipousuario, estado_idestado, documento_iddocumento)
                                VALUES('$nombresConstitucion', '$apellidosConstitucion', $edadConstitucion, $acudienteIdParentesco, '$ocupacionConstitucion', 4, 3, 1)";

        $sql_insConstitucion = mysqli_query($this->db->connect(),$query_insConstitucion);
        
        if($sql_insConstitucion){
            
            $resultlastConst = mysqli_query($this->db->connect(),"SELECT MAX(idusuario) FROM usuario");
            $rowlastConst = mysqli_fetch_row($resultlastConst);
            $idConst = $rowlastConst[0];
            
            /******************************************************************Remision************************************************************************************************/
            $query_insConstAfinidad  = "INSERT INTO afinidad (constfamiliar, usuario_idusuario, idfamiliar) VALUES ('S',$idpaciente,$idConst)";

            $sql_insConstAfinidad = mysqli_query($this->db->connect(),$query_insConstAfinidad);
            
            return true;
        }else{
            return false;
        }
    }
    
    public function actualizarConstitucion($idpaciente, $valor){
        
        $query_upConstitucion = "UPDATE afinidad
                              SET   constfamiliar   = '$valor'
                              WHERE idfamiliar      = $idpaciente";

        $sql_upConstitucion = mysqli_query($this->db->connect(),$query_upConstitucion);
        
        if($sql_upConstitucion){
          return true;
        }else
        {
         return false;
        }
    }
    
    public function actualizarDatosGrales($idpaciente, $idhistoria, $remitidoRemision, $motivoRemision, $pacienteDireccion, $pacienteCiudad, $informante, $pacienteLugarNacimiento){
        
        $query_upDGRemision = "UPDATE remision 
                                SET remitidopor = '$remitidoRemision',
                                	motivo      = '$motivoRemision'
                                WHERE historiaclinica_idhistoriaclinica = $idhistoria";

        $sql_upDGRemision = mysqli_query($this->db->connect(),$query_upDGRemision);
        
        $query_upDGUsuario = "UPDATE usuario 
                                SET direccion           = '$pacienteDireccion',
                                	ciudadresidencia    = '$pacienteCiudad',
                                	informante          = '$informante',
                                	lugarnacimiento     = '$pacienteLugarNacimiento'
                                WHERE idusuario = $idpaciente";

        $sql_upDGUsuario = mysqli_query($this->db->connect(),$query_upDGUsuario);
        
        if($sql_upDGUsuario){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    
/******************************************************************TAB CONSULTA************************************************************************************************/
    
    public function consultarMotivo($idpaciente, $idhistoria){
        
        $query_consultaMotivo   = "SELECT idhistoriaclinica,
                                            motivoconsulta
                                    FROM historiaclinica
                                    WHERE idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaMotivo   = mysqli_query( $this->db->connect(), $query_consultaMotivo );
        
        $nro_consultaMotivo = mysqli_num_rows($sql_consultaMotivo);
        
        if( $nro_consultaMotivo > 0 ) 
        {
            while ( $row_consultaMotivo = mysqli_fetch_assoc( $sql_consultaMotivo) ) 
            {
                $arreglo_consultaMotivo[] = $row_consultaMotivo;
            }
            return $arreglo_consultaMotivo;
        }else{
            return false;
        }
    }
    
    public function consultarMotivoPaciente($idpaciente){
        
        $query_consultaMotivoPac   = "SELECT h.*
                                    FROM historiaclinica h, informe i
                                    WHERE i.usuario_idusuario1 = $idpaciente
                                    AND h.usuario_idusuario = i.usuario_idusuario1
                                    AND h.area_idarea = 1";
                                    
        $sql_consultaMotivoPac   = mysqli_query( $this->db->connect(), $query_consultaMotivoPac );
        
        $nro_consultaMotivoPac = mysqli_num_rows($sql_consultaMotivoPac);
        
        if( $nro_consultaMotivoPac > 0 ) 
        {
            while ( $row_consultaMotivoPac = mysqli_fetch_assoc( $sql_consultaMotivoPac) ) 
            {
                $arreglo_consultaMotivoPac[] = $row_consultaMotivoPac;
            }
            return $arreglo_consultaMotivoPac;
        }else{
            return false;
        }
    }
    
    
    public function consultarDiagnosticoPrevio($idpaciente, $idhistoria){
        
        $query_consultaDiagnosticoPrevio   = "SELECT  dg.iddiagnostico
                                                   ,dg.diagnostico 
                                            FROM diagnostico dg
                                            WHERE dg.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaDiagnosticoPrevio   = mysqli_query( $this->db->connect(), $query_consultaDiagnosticoPrevio );
        
        $nro_consultaDiagnosticoPrevio = mysqli_num_rows($sql_consultaDiagnosticoPrevio);
        
        if( $nro_consultaDiagnosticoPrevio > 0 ) 
        {
            while ( $row_consultaDiagnosticoPrevio = mysqli_fetch_assoc( $sql_consultaDiagnosticoPrevio) ) 
            {
                $arreglo_consultaDiagnosticoPrevio[] = $row_consultaDiagnosticoPrevio;
            }
            return $arreglo_consultaDiagnosticoPrevio;
        }else{
            return false;
        }
    }
    
    
    public function consultarAnteDif($idpaciente, $idhistoria){
        
        $query_consultaAnteDif   = " SELECT ant.idantecedente
                                            ,ant.edad_ini_dif
                                    		,ant.porqueante
                                            ,ant.otrascondrep
                                    FROM antecedente ant
                                     WHERE ant.historiaclinica_idhistoriaclinica = $idhistoria
                                     AND ant.tipoantecedente_idtipoantecedente = 1";
                                    
        $sql_consultaAnteDif   = mysqli_query( $this->db->connect(), $query_consultaAnteDif );
        
        $nro_consultaAnteDif = mysqli_num_rows($sql_consultaAnteDif);
        
        if( $nro_consultaAnteDif > 0 ) 
        {
            while ( $row_consultaAnteDif = mysqli_fetch_assoc( $sql_consultaAnteDif) ) 
            {
                $arreglo_consultaAnteDif[] = $row_consultaAnteDif;
            }
            return $arreglo_consultaAnteDif;
        }else{
            return false;
        }
    }
    
    
        public function insertarTratamientos($idhistoria,
                                            $tratamientoProblemaInstitucion,
                                            $tratamientoProblemaProfesion,
                                            $tratamientoProblemaTiempo,
                                            $tratamientoProblemaEdad,
                                            $tratamientoProblemaDuracion,
                                            $tratamientoProblemaResultados){
                                                
        $query_insTratamientos = "INSERT INTO tratamiento(institucion, profesion, tiempo, edad, duracion, resultados, historiaclinica_idhistoriaclinica)
                                VALUES('$tratamientoProblemaInstitucion',
                                            '$tratamientoProblemaProfesion',
                                            '$tratamientoProblemaTiempo',
                                            '$tratamientoProblemaEdad',
                                            '$tratamientoProblemaDuracion',
                                            '$tratamientoProblemaResultados', 
                                            $idhistoria)";

        $sql_insTratamientos = mysqli_query($this->db->connect(),$query_insTratamientos);
        
        if($sql_insTratamientos){
            return true;
        }else{
            return false;
        }
    }
    
    public function consultarTratamientos($idhistoria){
        
        $query_consultaTratamientos   = "SELECT tr.idtratamiento
                                                ,tr.institucion
                                        		,tr.profesion
                                                ,tr.tiempo
                                                ,tr.edad
                                                ,tr.duracion
                                                ,tr.resultados
                                         FROM tratamiento tr
                                         WHERE tr.historiaclinica_idhistoriaclinica = $idhistoria";
                                         
                                         /*select t.*
from tratamiento t
	 ,historiaclinica h
 WHERE h.usuario_idusuario = 293
 AND t.historiaclinica_idhistoriaclinica= h.idhistoriaclinica*/
        
        $sql_consultaTratamientos   = mysqli_query( $this->db->connect(), $query_consultaTratamientos );
        
        $nro_consultaTratamientos = mysqli_num_rows($sql_consultaTratamientos);

        if( $nro_consultaTratamientos > 0 ) 
        {              
            while ( $row_consultaTratamientos = mysqli_fetch_assoc( $sql_consultaTratamientos) ) 
            {
                $arreglo_consultaTratamientos[]= $row_consultaTratamientos;
            }
            return $arreglo_consultaTratamientos;
        }else{
            return false;
        }
    }
    
    
    public function consultarTratamientosUsuario($idusuario){
        
        $query_consultaTratamientosUsuario   = "SELECT t.*
                                        FROM tratamiento t
                                        	 ,historiaclinica h
                                         WHERE h.usuario_idusuario = $idusuario
                                         AND t.historiaclinica_idhistoriaclinica= h.idhistoriaclinica";

        
        $sql_consultaTratamientosUsuario   = mysqli_query( $this->db->connect(), $query_consultaTratamientosUsuario );
        
        $nro_consultaTratamientosUsuario = mysqli_num_rows($sql_consultaTratamientosUsuario);

        if( $nro_consultaTratamientosUsuario > 0 ) 
        {              
            while ( $row_consultaTratamientosUsuario = mysqli_fetch_assoc( $sql_consultaTratamientosUsuario) ) 
            {
                $arreglo_consultaTratamientosUsuario[]= $row_consultaTratamientosUsuario;
            }
            return $arreglo_consultaTratamientosUsuario;
        }else{
            return false;
        }
    }
    
    
    
    public function actualizaTabConsulta($idhist,
                                            $idantecedente,
                                            $motivoConsultaObservacion,
                                            $diagnosticos,
                                            $edadIniDif,
                                            $porqueante,
                                            $otrasConductas){
                                                
        $query_upHistClinica = "UPDATE historiaclinica
                                SET motivoconsulta = '$motivoConsultaObservacion'
                                WHERE idhistoriaclinica = $idhist";

        $sql_upHistClinica  = mysqli_query($this->db->connect(),$query_upHistClinica);
        
        $query_upDiag = "UPDATE diagnostico
                            SET diagnostico = '$diagnosticos'
                            WHERE historiaclinica_idhistoriaclinica = $idhist";
                            
        $sql_upDiag  = mysqli_query($this->db->connect(),$query_upDiag);
        
        $query_upAnte1 ="UPDATE antecedente
                         SET edad_ini_dif  = '$edadIniDif'
                             ,porqueante   = '$porqueante'
                             ,otrascondrep = '$otrasConductas'
                        WHERE idantecedente = $idantecedente
                        AND tipoantecedente_idtipoantecedente = 1
                        AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upAnte1  = mysqli_query($this->db->connect(),$query_upAnte1);
        
        if($sql_upAnte1){
          return true;
        }else
        {
         return false;
        }
    }
    
    
/******************************************************************TAB ANTECEDENTES************************************************************************************************/
    
    public function consultarAntFamiliar($idpaciente, $idhistoria){
        
        $query_consultaAntFamiliar   = "SELECT ant.idantecedente
                                               ,ant.lineamaterna
                                          	   ,ant.lineapaterna
                                        FROM antecedente ant
                                        WHERE ant.historiaclinica_idhistoriaclinica = $idhistoria
                                        AND ant.tipoantecedente_idtipoantecedente = 2";
                                    
        $sql_consultaAntFamiliar   = mysqli_query( $this->db->connect(), $query_consultaAntFamiliar );
        
        $nro_consultaAntFamiliar = mysqli_num_rows($sql_consultaAntFamiliar);
        
        if( $nro_consultaAntFamiliar > 0 ) 
        {
            while ( $row_consultaAntFamiliar = mysqli_fetch_assoc( $sql_consultaAntFamiliar) ) 
            {
                $arreglo_consultaAntFamiliar[] = $row_consultaAntFamiliar;
            }
            return $arreglo_consultaAntFamiliar;
        }else{
            return false;
        }
    }
    
    
    public function consultarAntPrenatal($idpaciente, $idhistoria){
        
        $query_consultaAntPrenatal   = "SELECT ant.idantecedente
                                              ,ant.embarazodeseado
                                          	  ,ant.anticonceptivos
                                              ,ant.abortivas
                                              ,ant.adoptado
                                              ,ant.actitudembarazo
                                              ,ant.consgpadres
                                              ,ant.enfinfecciosas
                                              ,ant.enferuptivas
                                              ,ant.enfotras
                                              ,ant.dftcemocionales
                                              ,ant.controlmedico
                                              ,ant.rayosx
                                              ,ant.ecografias
                                        FROM antecedente ant
                                        WHERE ant.historiaclinica_idhistoriaclinica = $idhistoria
                                        AND ant.tipoantecedente_idtipoantecedente = 3";
                                    
        $sql_consultaAntPrenatal   = mysqli_query( $this->db->connect(), $query_consultaAntPrenatal );
        
        $nro_consultaAntPrenatal = mysqli_num_rows($sql_consultaAntPrenatal);
        
        if( $nro_consultaAntPrenatal > 0 ) 
        {
            while ( $row_consultaAntPrenatal = mysqli_fetch_assoc( $sql_consultaAntPrenatal) ) 
            {
                $arreglo_consultaAntPrenatal[] = $row_consultaAntPrenatal;
            }
            return $arreglo_consultaAntPrenatal;
        }else{
            return false;
        }
    }
    
    public function consultarAntParto($idpaciente, $idhistoria){
        
        $query_consultaAntParto   = "SELECT ant.idantecedente
                                          ,ant.duracion
                                      	  ,ant.parto
                                          ,ant.inducido
                                          ,ant.lugar
                                          ,ant.atendidopor
                                          ,ant.dificultades
                                          ,ant.incubadora
                                          ,ant.defectoscong
                                          ,ant.talla
                                          ,ant.peso
                                          ,ant.observaciones	
                                    FROM antecedente ant
                                    WHERE ant.historiaclinica_idhistoriaclinica = $idhistoria
                                    AND ant.tipoantecedente_idtipoantecedente = 4";
                                    
        $sql_consultaAntParto   = mysqli_query( $this->db->connect(), $query_consultaAntParto );
        
        $nro_consultaAntParto = mysqli_num_rows($sql_consultaAntParto);
        
        if( $nro_consultaAntParto > 0 ) 
        {
            while ( $row_consultaAntParto = mysqli_fetch_assoc( $sql_consultaAntParto) ) 
            {
                $arreglo_consultaAntParto[] = $row_consultaAntParto;
            }
            return $arreglo_consultaAntParto;
        }else{
            return false;
        }
    }
    

    public function actualizaTabAntecedentes($idhist,
                                                $idantecedente2,
                                                $lineamaterna,
                                                $lineapaterna,
                                                $idantecedente3,
                                                $embarazodeseado,
                                                $anticonceptivos,
                                                $abortivas,
                                                $adoptado,
                                                $actitudembarazo,
                                                $consgpadres,
                                                $enfinfecciosas,
                                                $enferuptivas,
                                                $enfotras,
                                                $dftcemocionales,
                                                $controlmedico,
                                                $rayosx,
                                                $ecografias,
                                                $idantecedente4,
                                                $duracion,
                                                $parto,
                                                $inducido,
                                                $lugar,
                                                $atendidopor,
                                                $dificultades,
                                                $incubadora,
                                                $defectoscong,
                                                $talla,
                                                $peso,
                                                $observacionesParto){
                                                
        $query_upAntFam = "UPDATE antecedente
                                SET lineamaterna  = '$lineamaterna'
                                  	,lineapaterna = '$lineapaterna'
                                WHERE idantecedente = $idantecedente2
                                AND tipoantecedente_idtipoantecedente = 2
                                AND historiaclinica_idhistoriaclinica = $idhist";

        $sql_upAntFam  = mysqli_query($this->db->connect(),$query_upAntFam);
        
        $query_upAntPre = "UPDATE antecedente
                            SET embarazodeseado  = '$embarazodeseado'
                              	,anticonceptivos = '$anticonceptivos'
                                ,abortivas       = '$abortivas'
                                ,adoptado		 = '$adoptado'
                                ,actitudembarazo = '$actitudembarazo'
                                ,consgpadres     = '$consgpadres'
                                ,enfinfecciosas  = '$enfinfecciosas'
                                ,enferuptivas    = '$enferuptivas'
                                ,enfotras        = '$enfotras'
                                ,dftcemocionales = '$dftcemocionales'
                                ,controlmedico   = '$controlmedico'
                                ,rayosx			 = '$rayosx'
                                ,ecografias      = '$ecografias'
                            WHERE idantecedente = $idantecedente3
                            AND tipoantecedente_idtipoantecedente = 3
                            AND historiaclinica_idhistoriaclinica = $idhist";
                            
        $sql_upAntPre  = mysqli_query($this->db->connect(),$query_upAntPre);
        
        $query_upAntParto ="UPDATE antecedente
                        SET    duracion        = '$duracion'
                          	  ,parto		   = '$parto'
                              ,inducido        = '$inducido'
                              ,lugar           = '$lugar'
                              ,atendidopor     = '$atendidopor'
                              ,dificultades    = '$dificultades'
                              ,incubadora      = '$incubadora'
                              ,defectoscong    = '$defectoscong'
                              ,talla           = '$talla'
                              ,peso            = '$peso'
                              ,observaciones   = '$observacionesParto'
                        WHERE idantecedente = $idantecedente4
                        AND tipoantecedente_idtipoantecedente = 4
                        AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upAntParto  = mysqli_query($this->db->connect(),$query_upAntParto);
        
        if($sql_upAntParto){
          return true;
        }else
        {
         return false;
        }
    }
    
/******************************************************************TAB POSTNATALES************************************************************************************************/
    
    public function consultarAntPostnatal($idpaciente, $idhistoria){
        
        $query_consultaAntPost   = "SELECT ant.idantecedente
                                          ,ant.enfposnatal
                                    	  ,ant.alergiasposnatal
                                          ,ant.convulsiones
                                          ,ant.cardiacos
                                          ,ant.respiratorios
                                          ,ant.eruptivaposnatal
                                          ,ant.vacunas
                                          ,ant.eeg
                                          ,ant.tomoaxcomp
                                          ,ant.potenevocauditivos
                                          ,ant.neurologo
                                          ,ant.otrosprofesionales
                                    FROM antecedente ant
                                    WHERE ant.historiaclinica_idhistoriaclinica = $idhistoria
                                    AND ant.tipoantecedente_idtipoantecedente = 5";
                                    
        $sql_consultaAntPost   = mysqli_query( $this->db->connect(), $query_consultaAntPost );
        
        $nro_consultaAntPost = mysqli_num_rows($sql_consultaAntPost);
        
        if( $nro_consultaAntPost > 0 ) 
        {
            while ( $row_consultaAntPost = mysqli_fetch_assoc( $sql_consultaAntPost) ) 
            {
                $arreglo_consultaAntPost[] = $row_consultaAntPost;
            }
            return $arreglo_consultaAntPost;
        }else{
            return false;
        }
    }
    
    
    public function consultarDesarrollo($idpaciente, $idhistoria){
        
        $query_consultaDllo   = "SELECT  frm.idformaalimentacion
                                       ,frm.forma
                                       ,prda.idperiodoalimentacion
                                       ,prda.seleccion
                                	   ,prda.desde
                                       ,prda.hasta
                                       ,des.iddesarrollo
                                       ,des.difgenpaciente       
                                FROM  desarrollo des
                                	 ,periodoalimentacion	prda 
                                     ,formaalimentacion frm
                                WHERE des.historiaclinica_idhistoriaclinica = $idhistoria
                                AND des.tipodesarrollo_idtipodesarrollo = 1
                                AND prda.desarrollo_iddesarrollo = des.iddesarrollo
                                AND prda.desarrollo_historia_idhistoria = des.historiaclinica_idhistoriaclinica
                                AND prda.formaalimentacion_idformaalimentacion = frm.idformaalimentacion";
                                    
        $sql_consultaDllo   = mysqli_query( $this->db->connect(), $query_consultaDllo );
        
        $nro_consultaDllo = mysqli_num_rows($sql_consultaDllo);
        
        if( $nro_consultaDllo > 0 ) 
        {
            while ( $row_consultaDllo = mysqli_fetch_assoc( $sql_consultaDllo) ) 
            {
                $arreglo_consultaDllo[] = $row_consultaDllo;
            }
            return $arreglo_consultaDllo;
        }else{
            return false;
        }
    }
    
    public function consultarEleAlim($idpaciente){
        $areaPsico = 1;
        $query_consultaEleAlim   = "SELECT  e.*       
                                    FROM  empleoutensilio e
                                          ,historiaclinica h
                                    WHERE h.usuario_idusuario = $idpaciente
                                    AND h.area_idarea = $areaPsico
                                    AND e.desarrollo_historiaclinica_idhistoriaclinica = h.idhistoriaclinica";
                                    
        $sql_consultaEleAlim   = mysqli_query( $this->db->connect(), $query_consultaEleAlim );
        
        $nro_consultaEleAlim = mysqli_num_rows($sql_consultaEleAlim);
        
        if( $nro_consultaEleAlim > 0 ) 
        {
            while ( $row_consultaEleAlim = mysqli_fetch_assoc( $sql_consultaEleAlim) ) 
            {
                $arreglo_consultaEleAlim[] = $row_consultaEleAlim;
            }
            return $arreglo_consultaEleAlim;
        }else{
            return false;
        }
    }
    
    
    
    public function consultarDifComida($idpaciente, $idhistoria){
        
        $query_consultaComida   = "SELECT df.iddificultad
                                          ,df.dificultad
                                          ,dfc.iddificultadcomida
                                          ,dfc.seleccion
                                          ,des.iddesarrollo
                                          ,des.obsrdifcomida
                                          ,des.horario
                                          ,des.lugar
                                          ,des.donde
                                    FROM  desarrollo des
                                          ,dificultadcomida dfc 
                                          ,dificultad df 
                                    WHERE des.historiaclinica_idhistoriaclinica = $idhistoria
                                    AND des.tipodesarrollo_idtipodesarrollo = 3
                                    AND dfc.desarrollo_iddesarrollo = des.iddesarrollo
                                    AND dfc.desarrollo_historiaclinica_idhistoriaclinica = des.historiaclinica_idhistoriaclinica
                                    AND dfc.dificultad_iddificultad = df.iddificultad";
                                    
        $sql_consultaComida   = mysqli_query( $this->db->connect(), $query_consultaComida );
        
        $nro_consultaComida = mysqli_num_rows($sql_consultaComida);
        
        if( $nro_consultaComida > 0 ) 
        {
            while ( $row_consultaComida = mysqli_fetch_assoc( $sql_consultaComida) ) 
            {
                $arreglo_consultaComida[] = $row_consultaComida;
            }
            return $arreglo_consultaComida;
        }else{
            return false;
        }
    }
    
    
    ////actualiza tab postnatales
    
    public function actualizaTabPostnatal($idhist,
                                            $idantecedente5,
                                            $enfposnatal,
                                            $alergiasposnatal,
                                            $convulsiones,
                                            $cardiacos,
                                            $respiratorios,
                                            $eruptivaposnatal,
                                            $vacunas,
                                            $eeg,
                                            $tomoaxcomp,
                                            $potenevocauditivos,
                                            $neurologo,
                                            $otrosprofesionales,
                                            $iddesarrollo1,
                                            $seleccionMaterna,
                                            $desdeMaterna,
                                            $hastaMaterna,
                                            $seleccionTetero,
                                            $desdeTetero,
                                            $hastaTetero,
                                            $difgenpaciente,
                                            $iddesarrollo2,
                                            $cuchara,
                                            $tenedor,
                                            $cuchillo,
                                            $vaso,
                                            $pitillo,
                                            $iddesarrollo3,
                                            $cogerla,
                                            $robarla,
                                            $derramar,
                                            $sobreselectividad,
                                            $obsrdifcomida,
                                            $horario,
                                            $lugarcomida,
                                            $dondecomida){
  
        $query_upAntecedente5 = "UPDATE antecedente
                                SET enfposnatal        = '$enfposnatal'
                                   ,alergiasposnatal   = '$alergiasposnatal'
                                   ,convulsiones       = '$convulsiones'
                                   ,cardiacos          = '$cardiacos'
                                   ,respiratorios      = '$respiratorios'
                                   ,eruptivaposnatal   = '$eruptivaposnatal'
                                   ,vacunas            = '$vacunas'
                                   ,eeg                = '$eeg'
                                   ,tomoaxcomp         = '$tomoaxcomp'
                                   ,potenevocauditivos = '$potenevocauditivos'
                                   ,neurologo		   = '$neurologo'
                                   ,otrosprofesionales = '$otrosprofesionales'
                                WHERE idantecedente = $idantecedente5
                                AND tipoantecedente_idtipoantecedente = 5
                                AND historiaclinica_idhistoriaclinica = $idhist";
                                
        $sql_upAntecedente5  = mysqli_query($this->db->connect(),$query_upAntecedente5);
        
        $query_upPeriodoMaterna = "UPDATE periodoalimentacion
                            SET  seleccion = '$seleccionMaterna'
                            	,desde     = '$desdeMaterna'
                                ,hasta     = '$hastaMaterna'    
                            WHERE formaalimentacion_idformaalimentacion = 1
                            AND desarrollo_iddesarrollo = $iddesarrollo1
                            AND desarrollo_historia_idhistoria = $idhist";
                                
         $sql_upPeriodoMaterna  = mysqli_query($this->db->connect(),$query_upPeriodoMaterna);
         
         $query_upPeriodoTetero = "UPDATE periodoalimentacion
                            SET  seleccion = '$seleccionTetero'
                            	,desde     = '$desdeTetero'
                                ,hasta     = '$hastaTetero'    
                            WHERE formaalimentacion_idformaalimentacion = 2
                            AND desarrollo_iddesarrollo = $iddesarrollo1
                            AND desarrollo_historia_idhistoria = $idhist";
                                
         $sql_upPeriodoTetero  = mysqli_query($this->db->connect(),$query_upPeriodoTetero);

        $query_upDllo1 = "UPDATE desarrollo 
                            SET  difgenpaciente = '$difgenpaciente'
                            WHERE iddesarrollo = $iddesarrollo1
                            AND historiaclinica_idhistoriaclinica = $idhist 
                            AND tipodesarrollo_idtipodesarrollo = 1";
        
        $sql_upDllo1  = mysqli_query($this->db->connect(),$query_upDllo1);
        
        $query_upUtensilio1 ="UPDATE empleoutensilio
                                SET dependencia_iddependencia = '$cuchara'
                                WHERE desarrollo_iddesarrollo = $iddesarrollo2
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhist
                                AND utensilio_idutensilio = 1";
                                
        $sql_upUtensilio1  = mysqli_query($this->db->connect(),$query_upUtensilio1);

        $query_upUtensilio2 ="UPDATE empleoutensilio
                                SET dependencia_iddependencia = '$tenedor'
                                WHERE desarrollo_iddesarrollo = $iddesarrollo2
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhist
                                AND utensilio_idutensilio = 2";
                                
        $sql_upUtensilio2  = mysqli_query($this->db->connect(),$query_upUtensilio2);
        
        $query_upUtensilio3 ="UPDATE empleoutensilio
                                SET dependencia_iddependencia = '$cuchillo'
                                WHERE desarrollo_iddesarrollo = $iddesarrollo2
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhist
                                AND utensilio_idutensilio = 3";
                                
        $sql_upUtensilio3  = mysqli_query($this->db->connect(),$query_upUtensilio3);
        
        $query_upUtensilio4 ="UPDATE empleoutensilio
                                SET dependencia_iddependencia = '$vaso'
                                WHERE desarrollo_iddesarrollo = $iddesarrollo2
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhist
                                AND utensilio_idutensilio = 4";
                                
        $sql_upUtensilio4  = mysqli_query($this->db->connect(),$query_upUtensilio4);
        
        $query_upUtensilio5 ="UPDATE empleoutensilio
                                SET dependencia_iddependencia = '$pitillo'
                                WHERE desarrollo_iddesarrollo = $iddesarrollo2
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhist
                                AND utensilio_idutensilio = 5";
                                
        $sql_upUtensilio5  = mysqli_query($this->db->connect(),$query_upUtensilio5);
        
        $query_upComida1 = "UPDATE dificultadcomida
                            SET seleccion = '$cogerla'
                            WHERE dificultad_iddificultad = 1
                            AND desarrollo_iddesarrollo = $iddesarrollo3
                            AND desarrollo_historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upComida1  = mysqli_query($this->db->connect(),$query_upComida1);
        
        $query_upComida2 = "UPDATE dificultadcomida
                            SET seleccion = '$robarla'
                            WHERE dificultad_iddificultad = 2
                            AND desarrollo_iddesarrollo = $iddesarrollo3
                            AND desarrollo_historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upComida2  = mysqli_query($this->db->connect(),$query_upComida2);

        $query_upComida3 = "UPDATE dificultadcomida
                            SET seleccion = '$derramar'
                            WHERE dificultad_iddificultad = 3
                            AND desarrollo_iddesarrollo = $iddesarrollo3
                            AND desarrollo_historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upComida3  = mysqli_query($this->db->connect(),$query_upComida3);
        
        $query_upComida4 = "UPDATE dificultadcomida
                            SET seleccion = '$sobreselectividad'
                            WHERE dificultad_iddificultad = 4
                            AND desarrollo_iddesarrollo = $iddesarrollo3
                            AND desarrollo_historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upComida4  = mysqli_query($this->db->connect(),$query_upComida4);
        
        $query_upComida5 = "UPDATE dificultadcomida
                            SET seleccion = '$lugarcomida'
                            WHERE dificultad_iddificultad = 5
                            AND desarrollo_iddesarrollo = $iddesarrollo3
                            AND desarrollo_historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upComida5  = mysqli_query($this->db->connect(),$query_upComida5);

                                            
        $query_upDlloComida = "UPDATE desarrollo
                            SET   obsrdifcomida = '$obsrdifcomida'
                                  ,horario      = '$horario'
                                  ,donde        = '$dondecomida'
                            WHERE iddesarrollo = $iddesarrollo3
                            AND tipodesarrollo_idtipodesarrollo = 3
                            AND historiaclinica_idhistoriaclinica = $idhist";
                            
        $sql_upDlloComida  = mysqli_query($this->db->connect(),$query_upDlloComida);
        
        if($sql_upDlloComida){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    /******************************************************************TAB LENGUAJE************************************************************************************************/
    
    public function consultarDllolenguaje($idpaciente, $idhistoria){
        
        $query_consultaDllo4   = "SELECT  fr.idfrase
                                       ,fr.frase
                                       ,hb.idhabla
                                       ,hb.seleccion
                                       ,hb.edad
                                       ,hb.observaciones
                                       ,des.iddesarrollo
                                       ,des.expdesea
                                       ,des.nombraobjetos
                                       ,des.claridadhablar
                                       ,des.narrahechos
                                       ,des.senalaobjetos
                                       ,des.buscaobjetos
                                       ,des.primerapersona
                                       ,des.respreguntas
                                       ,des.hacepreguntas
                                       ,des.dialoga
                                       ,des.diflenguaje
                                FROM desarrollo des
                                     ,habla hb 
                                     ,frase fr
                                WHERE  des.historiaclinica_idhistoriaclinica = $idhistoria
                                AND des.tipodesarrollo_idtipodesarrollo = 4 
                                AND hb.desarrollo_iddesarrollo = des.iddesarrollo
                                AND hb.desarrollo_historiaclinica_idhistoriaclinica = des.historiaclinica_idhistoriaclinica
                                AND hb.frase_idfrase = fr.idfrase";
                                    
        $sql_consultaDllo4   = mysqli_query( $this->db->connect(), $query_consultaDllo4 );
        
        $nro_consultaDllo4 = mysqli_num_rows($sql_consultaDllo4);
        
        if( $nro_consultaDllo4 > 0 ) 
        {
            while ( $row_consultaDllo4 = mysqli_fetch_assoc( $sql_consultaDllo4) ) 
            {
                $arreglo_consultaDllo4[] = $row_consultaDllo4;
            }
            return $arreglo_consultaDllo4;
        }else{
            return false;
        }
    }
    
    
    public function consultarDifHabla($idpaciente, $idhistoria){
        
        $query_consultaDifHabla   = "SELECT des.iddesarrollo
                                          ,des.ecolalia
                                    	  ,des.obsrdifhabla
                                          ,des.sondifhabla
                                          ,des.preservdifhabla
                                          ,des.gritosdifhabla
                                          ,des.tonofindifhabla
                                    FROM desarrollo des	
                                    WHERE des.historiaclinica_idhistoriaclinica = $idhistoria
                                    AND des.tipodesarrollo_idtipodesarrollo = 5";
                                    
        $sql_consultaDifHabla   = mysqli_query( $this->db->connect(), $query_consultaDifHabla);
        
        $nro_consultaDifHabla = mysqli_num_rows($sql_consultaDifHabla);
        
        if( $nro_consultaDifHabla > 0 ) 
        {
            while ( $row_consultaDifHabla = mysqli_fetch_assoc( $sql_consultaDifHabla) ) 
            {
                $arreglo_consultaDifHabla[] = $row_consultaDifHabla;
            }
            return $arreglo_consultaDifHabla;
        }else{
            return false;
        }
    }
    
    public function consultarComNoVerbal($idpaciente, $idhistoria){
        
        $query_consultaComNoVerbal   = "SELECT  des.iddesarrollo
                                           ,des.entiendegestos
                                    	   ,des.utilizagestos
                                           ,des.utilizasenal
                                    FROM desarrollo des	
                                    WHERE des.historiaclinica_idhistoriaclinica = $idhistoria
                                    AND des.tipodesarrollo_idtipodesarrollo = 6";
                                    
        $sql_consultaComNoVerbal   = mysqli_query( $this->db->connect(), $query_consultaComNoVerbal);
        
        $nro_consultaComNoVerbal = mysqli_num_rows($sql_consultaComNoVerbal);
        
        if( $nro_consultaComNoVerbal > 0 ) 
        {
            while ( $row_consultaComNoVerbal = mysqli_fetch_assoc( $sql_consultaComNoVerbal) ) 
            {
                $arreglo_consultaComNoVerbal[] = $row_consultaComNoVerbal;
            }
            return $arreglo_consultaComNoVerbal;
        }else{
            return false;
        }
    }
    
    
    /////actualiza tab lenguaje
    
    public function actualizaTabLenguaje($idhist,
                                            $iddesarrollo4,
                                            $balbuceo,
                                            $edadbalbuceo,
                                            $observacionbalbuceo,
                                            $palabras,
                                            $edadpalabras,
                                            $observacionpalabras,
                                            $frases,
                                            $edadfrases,
                                            $observacionfrases,
                                            $expdesea,
                                            $nombraobjetos,
                                            $claridadhablar,
                                            $narrahechos,
                                            $senalaobjetos,
                                            $buscaobjetos,
                                            $primerapersona,
                                            $respreguntas,
                                            $hacepreguntas,
                                            $dialoga,
                                            $diflenguaje,
                                            $iddesarrollo5,
                                            $ecolalia,
                                            $obsrdifhabla,
                                            $sondifhabla,
                                            $preservdifhabla,
                                            $gritosdifhabla,
                                            $tonofindifhabla,
                                            $iddesarrollo6,
                                            $entiendegestos,
                                            $utilizagestos,
                                            $utilizasenal){
                                                
        $query_upHabla1 = "UPDATE habla
                        SET  seleccion     = '$balbuceo'
                            ,edad     	   = '$edadbalbuceo'
                            ,observaciones = '$observacionbalbuceo'
                        WHERE frase_idfrase = 1
                        AND desarrollo_iddesarrollo = $iddesarrollo4
                        AND desarrollo_historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upHabla1  = mysqli_query($this->db->connect(),$query_upHabla1);
        
        $query_upHabla2 = "UPDATE habla
                        SET  seleccion     = '$palabras'
                            ,edad     	   = '$edadpalabras'
                            ,observaciones = '$observacionpalabras'
                        WHERE frase_idfrase = 2
                        AND desarrollo_iddesarrollo = $iddesarrollo4
                        AND desarrollo_historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upHabla2  = mysqli_query($this->db->connect(),$query_upHabla2);
        
        $query_upHabla3 = "UPDATE habla
                        SET  seleccion     = '$frases'
                            ,edad     	   = '$edadfrases'
                            ,observaciones = '$observacionfrases'
                        WHERE frase_idfrase = 3
                        AND desarrollo_iddesarrollo = $iddesarrollo4
                        AND desarrollo_historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upHabla3  = mysqli_query($this->db->connect(),$query_upHabla3);

        $query_upDllo4 = "UPDATE desarrollo
                            SET expdesea       = '$expdesea'
                               ,nombraobjetos  = '$nombraobjetos'
                               ,claridadhablar = '$claridadhablar'
                               ,narrahechos    = '$narrahechos'
                               ,senalaobjetos  = '$senalaobjetos'
                               ,buscaobjetos   = '$buscaobjetos'
                               ,primerapersona = '$primerapersona'
                               ,respreguntas   = '$respreguntas'
                               ,hacepreguntas  = '$hacepreguntas'
                               ,dialoga        = '$dialoga'
                               ,diflenguaje    = '$diflenguaje'
                            WHERE iddesarrollo = $iddesarrollo4
                            AND tipodesarrollo_idtipodesarrollo = 4
                            AND historiaclinica_idhistoriaclinica =  $idhist";
                                            
        $sql_upDllo4  = mysqli_query($this->db->connect(),$query_upDllo4);
        
        $query_upDllo5 ="UPDATE desarrollo
                             SET   ecolalia        = '$ecolalia'
                            	  ,obsrdifhabla    = '$obsrdifhabla'
                                  ,sondifhabla     = '$sondifhabla'
                                  ,preservdifhabla = '$preservdifhabla'
                                  ,gritosdifhabla  = '$gritosdifhabla'
                                  ,tonofindifhabla = '$tonofindifhabla'
                            WHERE iddesarrollo = $iddesarrollo5
                            AND historiaclinica_idhistoriaclinica = $idhist 
                            AND tipodesarrollo_idtipodesarrollo = 5";
        
        $sql_upDllo5  = mysqli_query($this->db->connect(),$query_upDllo5);
        
        $query_upDllo6 ="UPDATE desarrollo
                            SET   entiendegestos = '$entiendegestos'
                            	 ,utilizagestos  = '$utilizagestos'
                                 ,utilizasenal   = '$utilizasenal'
                            WHERE iddesarrollo = $iddesarrollo6
                            AND historiaclinica_idhistoriaclinica = $idhist 
                            AND tipodesarrollo_idtipodesarrollo = 6";
        
        $sql_upDllo6  = mysqli_query($this->db->connect(),$query_upDllo6);
        
        if($sql_upDllo6){
          return true;
        }else
        {
         return false;
        }
    }
    
    /******************************************************************TAB EMOCIONAL************************************************************************************************/
    
    public function consultarDlloSoEmocional($idpaciente, $idhistoria){
        
        $query_consultaDllo7   = "SELECT des.iddesarrollo
                                       ,des.primerasonrisa
                                       ,des.levantabrazos
                                       ,des.llantoporaus
                                       ,des.reconvoces
                                       ,des.otros
                                       ,des.contvisualesp
                                       ,des.contdemanda
                                       ,des.buscaconsfamlia
                                       ,des.resptaemociones
                                       ,des.risasinmotivo
                                       ,des.llantosinmotivo
                                       ,des.interpares
                                       ,des.interadulto
                                       ,des.usojuguetes
                                       ,des.juegos
                                       ,des.anticipapeligros
                                FROM desarrollo des	
                                WHERE des.historiaclinica_idhistoriaclinica = $idhistoria
                                AND des.tipodesarrollo_idtipodesarrollo = 7";
                                    
        $sql_consultaDllo7   = mysqli_query( $this->db->connect(), $query_consultaDllo7 );
        
        $nro_consultaDllo7 = mysqli_num_rows($sql_consultaDllo7);
        
        if( $nro_consultaDllo7 > 0 ) 
        {
            while ( $row_consultaDllo7 = mysqli_fetch_assoc( $sql_consultaDllo7) ) 
            {
                $arreglo_consultaDllo7[] = $row_consultaDllo7;
            }
            return $arreglo_consultaDllo7;
        }else{
            return false;
        }
    }
    
    
    public function consultarResistencia($idpaciente, $idhistoria){
        
        $query_consultaDllo8   = "SELECT  des.iddesarrollo
                                       ,des.cambioshorarios
                                	   ,des.cambiorutas
                                       ,des.ubicacionesp
                                       ,des.apegoobjetos
                                       ,des.actvrepetiivas
                                FROM desarrollo des	
                                WHERE des.historiaclinica_idhistoriaclinica = $idhistoria
                                AND des.tipodesarrollo_idtipodesarrollo = 8";
                                    
        $sql_consultaDllo8   = mysqli_query( $this->db->connect(), $query_consultaDllo8 );
        
        $nro_consultaDllo8 = mysqli_num_rows($sql_consultaDllo8);
        
        if( $nro_consultaDllo8 > 0 ) 
        {
            while ( $row_consultaDllo8 = mysqli_fetch_assoc( $sql_consultaDllo8) ) 
            {
                $arreglo_consultaDllo8[] = $row_consultaDllo8;
            }
            return $arreglo_consultaDllo8;
        }else{
            return false;
        }
    }
    
    
    /////actualiza tab Emocional
    
    public function actualizaTabEmocional($idhist,
                                            $iddesarrollo7,
                                            $primerasonrisa,
                                            $levantabrazos,
                                            $llantoporaus,
                                            $reconvoces,
                                            $otrosemocional,
                                            $contvisualesp,
                                            $contdemanda,
                                            $buscaconsfamlia,
                                            $resptaemociones,
                                            $risasinmotivo,
                                            $llantosinmotivo,
                                            $interpares,
                                            $interadulto,
                                            $usojuguetes,
                                            $juegos,
                                            $anticipapeligros,
                                            $iddesarrollo8,
                                            $cambioshorarios,
                                            $cambiorutas,
                                            $ubicacionesp,
                                            $apegoobjetos,
                                            $actvrepetiivas){
        
        $query_upDllo7 ="UPDATE desarrollo
                            SET primerasonrisa   = '$primerasonrisa'
                               ,levantabrazos    = '$levantabrazos'
                               ,llantoporaus     = '$llantoporaus'
                               ,reconvoces       = '$reconvoces'
                               ,otros            = '$otrosemocional'
                               ,contvisualesp    = '$contvisualesp'
                               ,contdemanda      = '$contdemanda'
                               ,buscaconsfamlia  = '$buscaconsfamlia'
                               ,resptaemociones  = '$resptaemociones'
                               ,risasinmotivo    = '$risasinmotivo'
                               ,llantosinmotivo  = '$llantosinmotivo'
                               ,interpares       = '$interpares'
                               ,interadulto      = '$interadulto'
                               ,usojuguetes      = '$usojuguetes'
                               ,juegos           = '$juegos'
                               ,anticipapeligros = '$anticipapeligros'
                            WHERE iddesarrollo = $iddesarrollo7
                            AND historiaclinica_idhistoriaclinica = $idhist 
                            AND tipodesarrollo_idtipodesarrollo = 7";
        
        $sql_upDllo7  = mysqli_query($this->db->connect(),$query_upDllo7);
        
        $query_upDllo8 ="UPDATE desarrollo
                            SET cambioshorarios = '$cambioshorarios'
                            	,cambiorutas    = '$cambiorutas'
                                ,ubicacionesp   = '$ubicacionesp'
                                ,apegoobjetos   = '$apegoobjetos'
                                ,actvrepetiivas = '$actvrepetiivas'
                            WHERE iddesarrollo = $iddesarrollo8
                            AND historiaclinica_idhistoriaclinica = $idhist
                            AND tipodesarrollo_idtipodesarrollo = 8";
        
        $sql_upDllo8  = mysqli_query($this->db->connect(),$query_upDllo8);
        
        if($sql_upDllo8){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    /******************************************************************TAB SENSORIAL************************************************************************************************/
    
    public function consultarAuditiva($idpaciente, $idhistoria){
        
        $query_consultaAuditiva   = "SELECT res.idrespuestasensorial
                                          ,res.resptanombre
                                    	  ,res.resptasonidos
                                          ,res.sospechasordera
                                          ,res.otros
                                          ,res.sonidosesp
                                          ,res.sonidosext
                                          ,res.tapaoidos
                                          ,res.golpeaobj
                                          ,res.audicion
                                          ,res.estimulo_idestimulo 
                                          ,res.observaciones
                                    FROM  respuestasensorial res            
                                    WHERE res.historiaclinica_idhistoriaclinica = $idhistoria
                                    AND  res.estimulo_idestimulo IN (1,2); ";
                                    
        $sql_consultaAuditiva   = mysqli_query( $this->db->connect(), $query_consultaAuditiva );
        
        $nro_consultaAuditiva = mysqli_num_rows($sql_consultaAuditiva);
        
        if( $nro_consultaAuditiva > 0 ) 
        {
            while ( $row_consultaAuditiva = mysqli_fetch_assoc( $sql_consultaAuditiva) ) 
            {
                $arreglo_consultaAuditiva[] = $row_consultaAuditiva;
            }
            return $arreglo_consultaAuditiva;
        }else{
            return false;
        }
    }
    
    public function consultarVisual($idpaciente, $idhistoria){
        
        $query_consultaVisual   = "SELECT  res.idrespuestasensorial
                                           ,res.orientamirada
                                    	   ,res.buscamirada
                                           ,res.giraobjetos
                                           ,res.miradaperdida
                                           ,res.reojo
                                           ,res.acercaaleja
                                           ,res.estimulo_idestimulo
                                           ,res.observaciones
                                    FROM  respuestasensorial res            
                                    WHERE res.historiaclinica_idhistoriaclinica = $idhistoria
                                    AND  res.estimulo_idestimulo IN (3,4)";
                                    
        $sql_consultaVisual   = mysqli_query( $this->db->connect(), $query_consultaVisual );
        
        $nro_consultaVisual = mysqli_num_rows($sql_consultaVisual);
        
        if( $nro_consultaVisual > 0 ) 
        {
            while ( $row_consultaVisual = mysqli_fetch_assoc( $sql_consultaVisual) ) 
            {
                $arreglo_consultaVisual[] = $row_consultaVisual;
            }
            return $arreglo_consultaVisual;
        }else{
            return false;
        }
    }
    
    public function consutlarReceptor($idpaciente, $idhistoria){
        
        $query_consultaReceptor   = "SELECT  res.idrespuestasensorial
                                           ,res.olfativo
                                    	   ,res.gustativo
                                           ,res.tactil
                                           ,res.puntapies
                                           ,res.aleteos
                                           ,res.balanceo
                                           ,res.juegosaliva
                                           ,res.escupir
                                           ,res.mvtoextrept
                                           ,res.autoagresiones
                                           ,res.estimulo_idestimulo
                                    FROM  respuestasensorial res            
                                    WHERE res.historiaclinica_idhistoriaclinica = $idhistoria
                                    AND  res.estimulo_idestimulo IN (5,6)";
                                    
        $sql_consultaReceptor   = mysqli_query( $this->db->connect(), $query_consultaReceptor );
        
        $nro_consultaReceptor = mysqli_num_rows($sql_consultaReceptor);
        
        if( $nro_consultaReceptor > 0 ) 
        {
            while ( $row_consultaReceptor = mysqli_fetch_assoc( $sql_consultaReceptor) ) 
            {
                $arreglo_consultaReceptor[] = $row_consultaReceptor;
            }
            return $arreglo_consultaReceptor;
        }else{
            return false;
        }
    }
    
    public function consutlarSueno($idpaciente, $idhistoria){
        
        $query_consultaSueno   = "SELECT res.idrespuestasensorial
                                           ,res.camaindepte
                                    	   ,res.cuartoindepte
                                           ,res.justificacion
                                           ,res.horario
                                           ,res.difisueno
                                           ,res.estimulo_idestimulo
                                    FROM  respuestasensorial res            
                                    WHERE res.historiaclinica_idhistoriaclinica = $idhistoria
                                    AND  res.estimulo_idestimulo = 7";
                                    
        $sql_consultaSueno   = mysqli_query( $this->db->connect(), $query_consultaSueno );
        
        $nro_consultaSueno = mysqli_num_rows($sql_consultaSueno);
        
        if( $nro_consultaSueno > 0 ) 
        {
            while ( $row_consultaSueno = mysqli_fetch_assoc( $sql_consultaSueno) ) 
            {
                $arreglo_consultaSueno[] = $row_consultaSueno;
            }
            return $arreglo_consultaSueno;
        }else{
            return false;
        }
    }
    
    /////actualiza tab Sensorial
    
    public function actualizaTabSensorial($idhist,
                                            $idrespuestasensorial,
                                            $resptanombre,
                                            $resptasonidos,
                                            $sospechasordera,
                                            $otrossensorial,
                                            $sonidosesp,
                                            $sonidosext,
                                            $tapaoidos,
                                            $golpeaobj,
                                            $audicion,
                                            $observacionauditiva,
                                            $orientamirada,
                                            $buscamirada,
                                            $giraobjetos,
                                            $miradaperdida,
                                            $reojo,
                                            $acercaaleja,
                                            $observacionvisual,
                                            $olfativo,
                                            $gustativo,
                                            $tactil,
                                            $puntapies,
                                            $aleteos,
                                            $balanceo,
                                            $juegosaliva,
                                            $escupir,
                                            $mvtoextrept,
                                            $autoagresiones,
                                            $camaindepte,
                                            $cuartoindepte,
                                            $justificacion,
                                            $horariosueno,
                                            $difisueno){
        
        $query_upResp1 ="UPDATE respuestasensorial
                            SET resptanombre     = '$resptanombre'
                            	,resptasonidos   = '$resptasonidos'
                                ,sospechasordera = '$sospechasordera'
                                ,otros           = '$otrossensorial'
                            WHERE historiaclinica_idhistoriaclinica = $idhist
                            AND estimulo_idestimulo = 1";
        
        $sql_upResp1  = mysqli_query($this->db->connect(),$query_upResp1);
        
        $query_upResp2 ="UPDATE respuestasensorial    
                            SET sonidosesp      = '$sonidosesp'
                               ,sonidosext      = '$sonidosext'
                               ,tapaoidos       = '$tapaoidos'
                               ,golpeaobj       = '$golpeaobj'
                               ,audicion        = '$audicion'
                               ,observaciones   = '$observacionauditiva'
                            WHERE historiaclinica_idhistoriaclinica = $idhist
                            AND estimulo_idestimulo = 2";
        
        $sql_upResp2  = mysqli_query($this->db->connect(),$query_upResp2);
        
        $query_upResp3 ="UPDATE respuestasensorial
                            SET orientamirada = '$orientamirada'
                            	,buscamirada  = '$buscamirada'
                            WHERE historiaclinica_idhistoriaclinica = $idhist
                            AND estimulo_idestimulo = 3";
        
        $sql_upResp3 = mysqli_query($this->db->connect(),$query_upResp3);
        
        $query_upResp4 ="UPDATE respuestasensorial
                            SET giraobjetos    = '$giraobjetos'
                                ,miradaperdida = '$miradaperdida'
                                ,reojo         = '$reojo'
                                ,acercaaleja   = '$acercaaleja'
                                ,observaciones ='$observacionvisual'
                            WHERE historiaclinica_idhistoriaclinica = $idhist
                            AND estimulo_idestimulo = 4";
        
        $sql_upResp4 = mysqli_query($this->db->connect(),$query_upResp4);
        
        $query_upResp5 ="UPDATE respuestasensorial
                            SET olfativo   = '$olfativo'
                            	,gustativo = '$gustativo'
                                ,tactil    = '$tactil'
                            WHERE historiaclinica_idhistoriaclinica = $idhist
                            AND estimulo_idestimulo = 5";
        
        $sql_upResp5 = mysqli_query($this->db->connect(),$query_upResp5);
        
        $query_upResp6 ="UPDATE respuestasensorial
                            SET puntapies       = '$puntapies'
                                ,aleteos        = '$aleteos'
                                ,balanceo       = '$balanceo'
                                ,juegosaliva    = '$juegosaliva'
                                ,escupir        = '$escupir'
                                ,mvtoextrept    = '$mvtoextrept'
                                ,autoagresiones = '$autoagresiones'
                            WHERE historiaclinica_idhistoriaclinica = $idhist
                            AND estimulo_idestimulo = 6";
        
        $sql_upResp6 = mysqli_query($this->db->connect(),$query_upResp6);
        
        $query_upResp7 ="UPDATE respuestasensorial
                            SET camaindepte    = '$camaindepte'
                            	,cuartoindepte = '$cuartoindepte'
                                ,justificacion = '$justificacion'
                                ,horario       = '$horariosueno'
                                ,difisueno     = '$difisueno'
                            WHERE historiaclinica_idhistoriaclinica = $idhist
                            AND estimulo_idestimulo = 7";
        
        $sql_upResp7 = mysqli_query($this->db->connect(),$query_upResp7);

        if($sql_upResp7){
          return true;
        }else
        {
         return false;
        }
    }
    
    /******************************************************************TAB DESEMPENO************************************************************************************************/
    
    public function consultarDesempeno($idpaciente, $idhistoria){
        
        $query_consultaDesempeno   = "SELECT rep.idrepertoriobasico
                                          ,rep.contactovisual
                                    	  ,rep.periodosatencion
                                          ,rep.imitacionmotora
                                          ,rep.seguinstrucciones
                                          ,rep.esqcorporal
                                    FROM repertoriobasico rep
                                    WHERE rep.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaDesempeno   = mysqli_query( $this->db->connect(), $query_consultaDesempeno );
        
        $nro_consultaDesempeno = mysqli_num_rows($sql_consultaDesempeno);
        
        if( $nro_consultaDesempeno > 0 ) 
        {
            while ( $row_consultaDesempeno = mysqli_fetch_assoc( $sql_consultaDesempeno) ) 
            {
                $arreglo_consultaDesempeno[] = $row_consultaDesempeno;
            }
            return $arreglo_consultaDesempeno;
        }else{
            return false;
        }
    }
    
    
    public function consultarHigiene($idpaciente, $idhistoria){
        
        $query_consultaHigiene   = "SELECT hg.idhigiene
                                    		,hg.dependencia_iddependencia
                                          ,htc.controlesfinter
                                          ,hg.aseopersonal_idaseopersonal
                                    FROM historiaclinica htc
                                         ,higiene hg      
                                    WHERE hg.historiaclinica_idhistoriaclinica = $idhistoria
                                    AND hg.historiaclinica_idhistoriaclinica = htc.idhistoriaclinica";
                                    
        $sql_consultaHigiene   = mysqli_query( $this->db->connect(), $query_consultaHigiene );
        
        $nro_consultaHigiene = mysqli_num_rows($sql_consultaHigiene);
        
        if( $nro_consultaHigiene > 0 ) 
        {
            while ( $row_consultaHigiene = mysqli_fetch_assoc( $sql_consultaHigiene) ) 
            {
                $arreglo_consultaHigiene[] = $row_consultaHigiene;
            }
            return $arreglo_consultaHigiene;
        }else{
            return false;
        }
    }
    
    
    
    /////actualiza tab Desempeno Actual
    
    public function actualizaTabDesActual($idhist,
                                            $idrepertoriobasico,
                                            $contactovisual,
                                            $periodosatencion,
                                            $imitacionmotora,
                                            $seguinstrucciones,
                                            $esqcorporal,
                                            $corporal,
                                            $cepillado,
                                            $manos,
                                            $cara,
                                            $peinado,
                                            $toalla,
                                            $controlesfinter,
                                            $observacionprenda1,
                                            $observacionprenda2,
                                            $observacionprenda3,
                                            $observacionprenda4,
                                            $observacionprenda5,
                                            $observacionprenda6,
                                            $observacionprenda7,
                                            $amarra,
                                            $desamarra,
                                            $subecierre,
                                            $bajacierre,
                                            $abotona,
                                            $desabotona,
                                            $observacionHabilidad1,
                                            $observacionHabilidad2,
                                            $observacionHabilidad3,
                                            $observacionHabilidad4,
                                            $observacionHabilidad5,
                                            $observacionHabilidad6){
        
        $query_upDesActual ="UPDATE repertoriobasico
                            SET  contactovisual     = '$contactovisual'
                            	 ,periodosatencion  = '$periodosatencion'
                                 ,imitacionmotora   = '$imitacionmotora'
                                 ,seguinstrucciones = '$seguinstrucciones'
                                 ,esqcorporal       = '$esqcorporal'
                            WHERE  idrepertoriobasico = $idrepertoriobasico
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upDesActual  = mysqli_query($this->db->connect(),$query_upDesActual);
        
        $query_upHigiene1 ="UPDATE higiene
                            SET dependencia_iddependencia = '$corporal'
                            WHERE aseopersonal_idaseopersonal = 1
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upHigiene1  = mysqli_query($this->db->connect(),$query_upHigiene1);
        
        $query_upHigiene2 ="UPDATE higiene
                            SET dependencia_iddependencia = '$cepillado'
                            WHERE aseopersonal_idaseopersonal = 2
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upHigiene2  = mysqli_query($this->db->connect(),$query_upHigiene2);

        $query_upHigiene3 ="UPDATE higiene
                            SET dependencia_iddependencia = '$manos'
                            WHERE aseopersonal_idaseopersonal = 3
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upHigiene3  = mysqli_query($this->db->connect(),$query_upHigiene3);

        $query_upHigiene4 ="UPDATE higiene
                            SET dependencia_iddependencia = '$cara'
                            WHERE aseopersonal_idaseopersonal = 4
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upHigiene4  = mysqli_query($this->db->connect(),$query_upHigiene4);
        
        $query_upHigiene5 ="UPDATE higiene
                            SET dependencia_iddependencia = '$peinado'
                            WHERE aseopersonal_idaseopersonal = 5
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upHigiene5  = mysqli_query($this->db->connect(),$query_upHigiene5);
        
        $query_upHigiene6 ="UPDATE higiene
                            SET dependencia_iddependencia = '$toalla'
                            WHERE aseopersonal_idaseopersonal = 6
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upHigiene6  = mysqli_query($this->db->connect(),$query_upHigiene6);
        
        $query_upFormaVestir1 ="UPDATE formavestirse
                            SET Observaciones = '$observacionprenda1'
                            WHERE prenda_idprenda = 1
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upFormaVestir1  = mysqli_query($this->db->connect(),$query_upFormaVestir1);
        
        $query_upFormaVestir2 ="UPDATE formavestirse
                            SET Observaciones = '$observacionprenda2'
                            WHERE prenda_idprenda = 2
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upFormaVestir2  = mysqli_query($this->db->connect(),$query_upFormaVestir2);
        
        $query_upFormaVestir3 ="UPDATE formavestirse
                            SET Observaciones = '$observacionprenda3'
                            WHERE prenda_idprenda = 3
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upFormaVestir3  = mysqli_query($this->db->connect(),$query_upFormaVestir3);
        
        $query_upFormaVestir4 ="UPDATE formavestirse
                            SET Observaciones = '$observacionprenda4'
                            WHERE prenda_idprenda = 4
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upFormaVestir4  = mysqli_query($this->db->connect(),$query_upFormaVestir4);
        
        $query_upFormaVestir5 ="UPDATE formavestirse
                            SET Observaciones = '$observacionprenda5'
                            WHERE prenda_idprenda = 5
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upFormaVestir5  = mysqli_query($this->db->connect(),$query_upFormaVestir5);
        
        $query_upFormaVestir6 ="UPDATE formavestirse
                            SET Observaciones = '$observacionprenda6'
                            WHERE prenda_idprenda = 6
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upFormaVestir6  = mysqli_query($this->db->connect(),$query_upFormaVestir6);
        
        $query_upFormaVestir7 ="UPDATE formavestirse
                            SET Observaciones = '$observacionprenda7'
                            WHERE prenda_idprenda = 7
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upFormaVestir7  = mysqli_query($this->db->connect(),$query_upFormaVestir7);
        
        
        $query_upRegistroHabilidad1 ="UPDATE registrohabilidad
                            SET seleccion = '$amarra',
                                observaciones = '$observacionHabilidad1'
                            WHERE habilidadmotriz_idhabilidadmotriz = 1
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upRegistroHabilidad1  = mysqli_query($this->db->connect(),$query_upRegistroHabilidad1);
        
        $query_upRegistroHabilidad2 ="UPDATE registrohabilidad
                            SET seleccion = '$desamarra',
                                observaciones = '$observacionHabilidad2'
                            WHERE habilidadmotriz_idhabilidadmotriz = 2
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upRegistroHabilidad2  = mysqli_query($this->db->connect(),$query_upRegistroHabilidad2);
        
        $query_upRegistroHabilidad3 ="UPDATE registrohabilidad
                            SET seleccion = '$subecierre',
                                observaciones = '$observacionHabilidad3'
                            WHERE habilidadmotriz_idhabilidadmotriz = 3
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upRegistroHabilidad3  = mysqli_query($this->db->connect(),$query_upRegistroHabilidad3);
        
        $query_upRegistroHabilidad4 ="UPDATE registrohabilidad
                            SET seleccion = '$bajacierre',
                                observaciones = '$observacionHabilidad4'
                            WHERE habilidadmotriz_idhabilidadmotriz = 4
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upRegistroHabilidad4  = mysqli_query($this->db->connect(),$query_upRegistroHabilidad4);
        
        $query_upRegistroHabilidad5 ="UPDATE registrohabilidad
                            SET seleccion = '$abotona',
                                observaciones = '$observacionHabilidad5'
                            WHERE habilidadmotriz_idhabilidadmotriz = 5
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upRegistroHabilidad5  = mysqli_query($this->db->connect(),$query_upRegistroHabilidad5);
        
        $query_upRegistroHabilidad6 ="UPDATE registrohabilidad
                            SET seleccion = '$desabotona',
                                observaciones = '$observacionHabilidad6'
                            WHERE habilidadmotriz_idhabilidadmotriz = 6
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upRegistroHabilidad6  = mysqli_query($this->db->connect(),$query_upRegistroHabilidad6);
        
        $query_upHigieneHist ="UPDATE historiaclinica
                                SET controlesfinter = '$controlesfinter'
                                WHERE idhistoriaclinica  = $idhist";
        
        $sql_upHigieneHist  = mysqli_query($this->db->connect(),$query_upHigieneHist);

        if($sql_upHigieneHist){
          return true;
        }else
        {
         return false;
        }
    }
    
    /////Consultar Forma vestir
    
    public function consultarPrendasVestir($idhistoria){
        
        $query_consultaPrendasVestir   = "SELECT * 
                                            FROM formavestirse fm, prenda p 
                                            WHERE fm.historiaclinica_idhistoriaclinica = $idhistoria
                                            AND fm.prenda_idprenda = p.idprenda";
                                    
        $sql_consultaPrendasVestir   = mysqli_query( $this->db->connect(), $query_consultaPrendasVestir );
        
        $nro_consultaPrendasVestir = mysqli_num_rows($sql_consultaPrendasVestir);
        
        if( $nro_consultaPrendasVestir > 0 ) 
        {
            while ( $row_consultaPrendasVestir = mysqli_fetch_assoc( $sql_consultaPrendasVestir) ) 
            {
                $arreglo_consultaPrendasVestir[] = $row_consultaPrendasVestir;
            }
            return $arreglo_consultaPrendasVestir;
        }else{
            return false;
        }
    }
    
    
    /////actualiza Forma vestir
    
    public function actualizaPrendaVestir($idhist,
                                            $respuesta,
                                            $idprenda,
                                            $valor){
                                                
        $query_upFormaVestir ="UPDATE formavestirse
                            SET $respuesta = '$valor'
                            WHERE prenda_idprenda = $idprenda
                            AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upFormaVestir  = mysqli_query($this->db->connect(),$query_upFormaVestir);

        if($sql_upFormaVestir){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    /////Consultar Habilidad Motriz
    
    public function consultarHabilidadMotriz($idhistoria){
        
        $query_consultaHabilidadMotriz   = "SELECT * 
                                            FROM registrohabilidad r, habilidadmotriz h 
                                            WHERE r.historiaclinica_idhistoriaclinica = $idhistoria
                                            AND r.habilidadmotriz_idhabilidadmotriz = h.idhabilidadmotriz";
                                    
        $sql_consultaHabilidadMotriz   = mysqli_query( $this->db->connect(), $query_consultaHabilidadMotriz );
        
        $nro_consultaHabilidadMotriz = mysqli_num_rows($sql_consultaHabilidadMotriz);
        
        if( $nro_consultaHabilidadMotriz > 0 ) 
        {
            while ( $row_consultaHabilidadMotriz = mysqli_fetch_assoc( $sql_consultaHabilidadMotriz) ) 
            {
                $arreglo_consultaHabilidadMotriz[] = $row_consultaHabilidadMotriz;
            }
            return $arreglo_consultaHabilidadMotriz;
        }else{
            return false;
        }
    }
    
    /******************************************************************TAB HABILIDADES************************************************************************************************/
    
    public function consultarHabilidades($idpaciente, $idhistoria){
        
        $query_consultaHabilidad   = "SELECT hb.idhabilidad
                                          ,hb.habilespeciales
                                    	   ,hb.dificultadescond
                                           ,hb.caractambiente
                                    FROM habilidad hb 
                                    WHERE hb.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaHabilidad   = mysqli_query( $this->db->connect(), $query_consultaHabilidad );
        
        $nro_consultaHabilidad = mysqli_num_rows($sql_consultaHabilidad);
        
        if( $nro_consultaHabilidad > 0 ) 
        {
            while ( $row_consultaHabilidad = mysqli_fetch_assoc( $sql_consultaHabilidad) ) 
            {
                $arreglo_consultaHabilidad[] = $row_consultaHabilidad;
            }
            return $arreglo_consultaHabilidad;
        }else{
            return false;
        }
    }
    
    /////actualiza tab Habilidades
    
    public function actualizaTabHabilidades($idhist,
                                            $habilespeciales,
                                            $dificultadescond,
                                            $caractambiente){
        
        $query_upHabilidad ="UPDATE habilidad
                            SET  habilespeciales  = '$habilespeciales'
                                ,dificultadescond = '$dificultadescond'
                                ,caractambiente   = '$caractambiente'
                            WHERE historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upHabilidad  = mysqli_query($this->db->connect(),$query_upHabilidad);

        if($sql_upHabilidad){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    /////////PRUEBAS MCHAT
    
    public function consultarMchat($idpaciente, $idarea){
        
        $query_consultaMchat   = "SELECT r.idrespuesta
                                      ,r.pregunta_idpregunta
                                  	  ,r.pregunta_bateria_idbateria
                                	  ,r.pregunta_bateria_area_idarea
                                	  ,r.usuario_idusuario
                                	  ,r.usuario_idusuario1
                                	  ,r.respuesta
                                	  ,r.criterio
                                	  ,p.pregunta
                                FROM respuesta r, pregunta p
                                WHERE r.usuario_idusuario1 = $idpaciente
                                AND r.pregunta_idpregunta = p.idpregunta
                                AND r.pregunta_bateria_idbateria = 1
                                AND r.pregunta_bateria_area_idarea = $idarea";
                                    
        $sql_consultaMchat   = mysqli_query( $this->db->connect(), $query_consultaMchat );
        
        $nro_consultaMchat= mysqli_num_rows($sql_consultaMchat);
        
        if( $nro_consultaMchat > 0 ) 
        {
            while ( $row_consultaMchat = mysqli_fetch_assoc( $sql_consultaMchat) ) 
            {
                $arreglo_consultaMchat[] = $row_consultaMchat;
            }
            return $arreglo_consultaMchat;
        }else{
            return false;
        }
    }
    
    /////////conclusiones MCHAT
    
    public function consultarConclusionMchat($idpaciente, $idarea){
        
        $query_consultaConclusionMchat   = "SELECT * 
                                            FROM conclusion 
                                            WHERE usuario_idusuario1 = $idpaciente
                                            AND bateria_idbateria = 1
                                            AND bateria_area_idarea = $idarea
                                            AND usuario_idusuario = 5";
                                    
        $sql_consultaConclusionMchat   = mysqli_query( $this->db->connect(), $query_consultaConclusionMchat );
        
        $nro_consultaConclusionMchat= mysqli_num_rows($sql_consultaConclusionMchat);
        
        if( $nro_consultaConclusionMchat > 0 ) 
        {
            while ( $row_consultaConclusionMchat = mysqli_fetch_assoc( $sql_consultaConclusionMchat) ) 
            {
                $arreglo_consultaConclusionMchat[] = $row_consultaConclusionMchat;
            }
            return $arreglo_consultaConclusionMchat;
        }else{
            return false;
        }
    }
    
    
    public function actualizaConclusiones($idpaciente,
                                            $conclusion,
                                            $idarea,
                                            $idbateria){
                                                
        /*$texto = htmlentities(addslashes($conclusion),ENT_QUOTES,"UTF-8");
        $conclusion = utf8_encode($texto);
        error_log("conclusiones $conclusion");*/
        
        $query_upConclusiones ="UPDATE conclusion
                        SET  conclusion         = '$conclusion'
                        WHERE bateria_idbateria = $idbateria 
                        AND usuario_idusuario1  = $idpaciente
                        AND bateria_area_idarea = $idarea";
        
        $sql_upConclusiones = mysqli_query($this->db->connect(),$query_upConclusiones);

        if($sql_upConclusiones){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    
    /////actualiza Mchat
    
    public function actualizaPreguntasMchat($idpaciente,
                                            $idrespuesta,
                                            $idoption,
                                            $idarea){
        if($idoption == 1){
            $anormal = 1;
            $critica = 0;
            $normal = 0;
        }
        
        if($idoption == 2){
            $anormal = 0;
            $critica = 1;
            $normal = 0;
        }
        
        if($idoption == 3){
            $anormal = 0;
            $critica = 0;
            $normal = 1;
        }
        
        $query_upMchat ="UPDATE respuesta
                        SET  criterio  = $idoption
                        WHERE idrespuesta                = $idrespuesta 
                        AND usuario_idusuario1           = $idpaciente
                        AND pregunta_bateria_area_idarea = $idarea;";
        
        $sql_upMchat  = mysqli_query($this->db->connect(),$query_upMchat);

        if($sql_upMchat){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    
    /////////PRUEBAS DSMV
    
    public function consultarDSMV($idpaciente, $idarea){
        
        $query_consultaDSMV   = "SELECT r.idrespuesta
                                      ,r.pregunta_idpregunta
                                  	  ,r.pregunta_bateria_idbateria
                                	  ,r.pregunta_bateria_area_idarea
                                	  ,r.usuario_idusuario
                                	  ,r.usuario_idusuario1
                                	  ,r.respuesta
                                	  ,r.tea
                                	  ,p.pregunta
                                	  ,u.nombres
                                FROM respuesta r, pregunta p, usuario u
                                WHERE r.usuario_idusuario1 = $idpaciente
                                AND u.idusuario = r.usuario_idusuario1
                                AND r.pregunta_idpregunta = p.idpregunta
                                AND r.pregunta_bateria_idbateria = 2
                                AND r.pregunta_bateria_area_idarea = $idarea";
                                    
        $sql_consultaDSMV   = mysqli_query( $this->db->connect(), $query_consultaDSMV );
        
        $nro_consultaDSMV= mysqli_num_rows($sql_consultaDSMV);
        
        if( $nro_consultaDSMV > 0 ) 
        {
            while ( $row_consultaDSMV = mysqli_fetch_assoc( $sql_consultaDSMV) ) 
            {
                $arreglo_consultaDSMV[] = $row_consultaDSMV;
            }
            return $arreglo_consultaDSMV;
        }else{
            return false;
        }
    }
    
    /////////conclusiones DSMV
    
    public function consultarConclusionDSMV($idpaciente, $idarea){
        
        $query_consultaConclusionDSMV   = "SELECT * 
                                            FROM conclusion 
                                            WHERE usuario_idusuario1 = $idpaciente
                                            AND bateria_idbateria = 2
                                            AND bateria_area_idarea = $idarea
                                            AND usuario_idusuario = 5";
                                    
        $sql_consultaConclusionDSMV   = mysqli_query( $this->db->connect(), $query_consultaConclusionDSMV );
        
        $nro_consultaConclusionDSMV= mysqli_num_rows($sql_consultaConclusionDSMV);
        
        if( $nro_consultaConclusionDSMV > 0 ) 
        {
            while ( $row_consultaConclusionDSMV = mysqli_fetch_assoc( $sql_consultaConclusionDSMV) ) 
            {
                $arreglo_consultaConclusionDSMV[] = $row_consultaConclusionDSMV;
            }
            return $arreglo_consultaConclusionDSMV;
        }else{
            return false;
        }
    }
    
    /////ACTUALIZA DSMV
    
    public function actualizaPreguntasDSMV($idpaciente,
                                            $idrespuesta,
                                            $idoption,
                                            $idarea){
        
        $query_upDSMV ="UPDATE respuesta
                        SET  tea  = $idoption
                        WHERE idrespuesta                = $idrespuesta 
                        AND usuario_idusuario1           = $idpaciente
                        AND pregunta_bateria_area_idarea = $idarea;";
        
        $sql_upDSMV  = mysqli_query($this->db->connect(),$query_upDSMV);

        if($sql_upDSMV){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    /////////PRUEBAS DSMV TEA
    
    public function consultarDSMVTEA($idpaciente, $idarea, $idpregunta){
        
        $query_consultaDSMVTEA   = "SELECT r.idrespuesta
                                      ,r.pregunta_idpregunta
                                  	  ,r.pregunta_bateria_idbateria
                                	  ,r.pregunta_bateria_area_idarea
                                	  ,r.usuario_idusuario
                                	  ,r.usuario_idusuario1
                                	  ,r.respuesta
                                	  ,r.criterio
                                	  ,r.tea
                                FROM respuesta r
                                WHERE r.usuario_idusuario1 = $idpaciente
                                AND r.pregunta_idpregunta = $idpregunta
                                AND r.pregunta_bateria_idbateria = 2
                                AND r.pregunta_bateria_area_idarea = $idarea";
                                    
        $sql_consultaDSMVTEA   = mysqli_query( $this->db->connect(), $query_consultaDSMVTEA );
        
        $nro_consultaDSMVTEA= mysqli_num_rows($sql_consultaDSMVTEA);
        
        if( $nro_consultaDSMVTEA > 0 ) 
        {
            while ( $row_consultaDSMVTEA = mysqli_fetch_assoc( $sql_consultaDSMVTEA) ) 
            {
                $arreglo_consultaDSMVTEA[] = $row_consultaDSMVTEA;
            }
            return $arreglo_consultaDSMVTEA;
        }else{
            return false;
        }
    }
    
    /////ACTUALIZA TEA
    
    public function actualizaPreguntasTEA($idpaciente,
                                            $idpregunta,
                                            $texto,
                                            $idarea){
                                                
        $descripcion = htmlentities($texto,ENT_QUOTES,"UTF-8");
        
        $query_upTEA ="UPDATE respuesta
                        SET  tea  = '$descripcion'
                        WHERE pregunta_idpregunta        = $idpregunta 
                        AND usuario_idusuario1           = $idpaciente
                        AND pregunta_bateria_area_idarea = $idarea;";
        
        $sql_upTEA  = mysqli_query($this->db->connect(),$query_upTEA);

        if($sql_upTEA){
          return true;
        }else
        {
         return false;
        }
    }
    
    /////////PRUEBAS IDEA
    
    public function consultarIDEA($idpaciente, $idarea){
        
        $query_consultaIDEA   = "SELECT r.idrespuesta
                                      ,r.pregunta_idpregunta
                                  	  ,r.pregunta_bateria_idbateria
                                	  ,r.pregunta_bateria_area_idarea
                                	  ,r.usuario_idusuario
                                	  ,r.usuario_idusuario1
                                	  ,r.respuesta
                                	  ,r.criterio
                                	  ,r.criterio_dim_idcriterio_dim
                                	  ,p.pregunta
                                FROM respuesta r, pregunta p
                                WHERE r.usuario_idusuario1 = $idpaciente
                                AND r.pregunta_idpregunta = p.idpregunta
                                AND r.pregunta_bateria_idbateria = 3
                                AND r.pregunta_bateria_area_idarea = $idarea";
                                    
        $sql_consultaIDEA   = mysqli_query( $this->db->connect(), $query_consultaIDEA );
        
        $nro_consultaIDEA= mysqli_num_rows($sql_consultaIDEA);
        
        if( $nro_consultaIDEA > 0 ) 
        {
            while ( $row_consultaIDEA = mysqli_fetch_assoc( $sql_consultaIDEA) ) 
            {
                $arreglo_consultaIDEA[] = $row_consultaIDEA;
            }
            return $arreglo_consultaIDEA;
        }else{
            return false;
        }
    }
    
    /////////conclusiones IDEA
    
    public function consultarConclusionIDEA($idpaciente, $idarea){
        
        $query_consultaConclusionIDEA   = "SELECT * 
                                            FROM conclusion 
                                            WHERE usuario_idusuario1 = $idpaciente
                                            AND bateria_idbateria = 3
                                            AND bateria_area_idarea = $idarea
                                            AND usuario_idusuario = 5";
                                    
        $sql_consultaConclusionIDEA   = mysqli_query( $this->db->connect(), $query_consultaConclusionIDEA );
        
        $nro_consultaConclusionIDEA= mysqli_num_rows($sql_consultaConclusionIDEA);
        
        if( $nro_consultaConclusionIDEA > 0 ) 
        {
            while ( $row_consultaConclusionIDEA = mysqli_fetch_assoc( $sql_consultaConclusionIDEA) ) 
            {
                $arreglo_consultaConclusionIDEA[] = $row_consultaConclusionIDEA;
            }
            return $arreglo_consultaConclusionIDEA;
        }else{
            return false;
        }
    }
    
    /////////RESPUESTA PRUEBAS IDEA
    
    public function consultarIDEARespuesta($idpaciente, $idarea){
        
        $query_consultaIDEARespuesta   = "SELECT idrespuesta 
                                                ,criterio_dim_idcriterio_dim 
                                                ,pregunta_bateria_idbateria 
                                                ,pregunta_bateria_area_idarea 
                                                ,usuario_idusuario 
                                                ,usuario_idusuario1 
                                                ,respuesta 
                                        FROM respuesta 
                                        WHERE usuario_idusuario1 = $idpaciente
                                        AND pregunta_bateria_idbateria = 3
                                        AND pregunta_bateria_area_idarea = $idarea
                                        AND pregunta_idpregunta IS NULL ";
                                    
        $sql_consultaIDEARespuesta   = mysqli_query( $this->db->connect(), $query_consultaIDEARespuesta );
        
        $nro_consultaIDEARespuesta= mysqli_num_rows($sql_consultaIDEARespuesta);
        
        if( $nro_consultaIDEARespuesta > 0 ) 
        {
            while ( $row_consultaIDEARespuesta = mysqli_fetch_assoc( $sql_consultaIDEARespuesta) ) 
            {
                $arreglo_consultaIDEARespuesta[] = $row_consultaIDEARespuesta;
            }
            return $arreglo_consultaIDEARespuesta;
        }else{
            return false;
        }
    }
    
    
    /////ACTUALIZA IDEA
    
    public function actualizaPreguntasIDEA($idpaciente,
                                            $idrespuesta,
                                            $idoption,
                                            $idarea){
        
        $query_upIDEA ="UPDATE respuesta
                        SET  respuesta  = $idoption
                        WHERE idrespuesta                = $idrespuesta 
                        AND usuario_idusuario1           = $idpaciente
                        AND pregunta_bateria_area_idarea = $idarea;";
        
        $sql_upIDEA  = mysqli_query($this->db->connect(),$query_upIDEA);

        if($sql_upIDEA){
          return true;
        }else
        {
         return false;
        }
    }
    
    public function actualizaPreguntasIDEATerapeuta($idpaciente,
                                            $idrespuesta,
                                            $idoption,
                                            $idarea){
        
        $query_upIDEATerapeuta ="UPDATE respuesta
                        SET  respuesta  = $idoption
                        WHERE idrespuesta                = $idrespuesta 
                        AND usuario_idusuario1           = $idpaciente
                        AND pregunta_bateria_area_idarea = $idarea;";
        
        $sql_upIDEATerapeuta  = mysqli_query($this->db->connect(),$query_upIDEATerapeuta);

        if($sql_upIDEATerapeuta){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    /************************ INFORME FINAL ************************/
    
    public function consultarInformeFinal($idpaciente,$idarea ){
        $query_consultaInformeFinal   = "SELECT *
                                         FROM informe
                                         WHERE area_idarea = $idarea
                                         AND usuario_idusuario1 = $idpaciente";
                                    
        $sql_consultaInformeFinal   = mysqli_query( $this->db->connect(), $query_consultaInformeFinal );
            
        $nro_consultaInformeFinal = mysqli_num_rows($sql_consultaInformeFinal);
        
        if( $nro_consultaInformeFinal > 0 ) 
        {               
            while ( $row_consultaInformeFinal = mysqli_fetch_assoc( $sql_consultaInformeFinal) ) 
            {
                $arreglo_consultaInformeFinal[]= $row_consultaInformeFinal;
            }
            return $arreglo_consultaInformeFinal;
        }else{
            return false;
        }
    }
    

     public  function consultarDatosInf($idpaciente) {

        $query_datos_inf = "SELECT lugarnacimiento
                                  ,informante
                            FROM usuario       
                            WHERE idusuario= '$idpaciente'";

        $sql_datos_inf = mysqli_query( $this->db->connect(), $query_datos_inf );

        $nro_datos_inf = mysqli_num_rows($sql_datos_inf);

        if( $nro_datos_inf > 0 )
        {
            while ( $row_datos_inf = mysqli_fetch_assoc( $sql_datos_inf) )
            {
                $arreglo_datos_inf[]= $row_datos_inf;
            }
            return $arreglo_datos_inf;
        }else{
            return false;
        }
    }
    
    public function crearInformeFinal($idterapeuta, $idarea, $idpaciente){
        
        $fecha = date("Y-m-d");
        
        $query_crearInformeFinal = "INSERT INTO informe (fechacreacion
                                                        ,usuario_idusuario
                                                        ,area_idarea
                                                        ,usuario_idusuario1)
                                    VALUES('$fecha'
                                           ,'$idterapeuta'
                                           ,'$idarea'
                                           ,'$idpaciente')";

        $sql_crearInformeFinal = mysqli_query($this->db->connect(),$query_crearInformeFinal);
        
        if($sql_crearInformeFinal){

        	$resultlast = mysqli_query($this->db->connect(),"SELECT MAX(idinforme) id FROM informe");
            $rowlast = mysqli_fetch_row($resultlast);
            $idHistoria = $rowlast[0];
        	return $idHistoria;

        }else{
            $idHistoria = 0;
            return $idHistoria;
        }
    }
    
    
    public function actualizarInformeFinal( $idpaciente,
                                            $idinforme,
                                            $ObjEvaluacionObservacion, 
                                            $MetEvaluacionObservacion, 
                                            $ResultadosObservacion,
                                            $ConclusionesObservacion,
                                            $RecomendacionesObservacion){
        
        $query_upInformeFinal ="UPDATE informe
                        SET  objetivo           = '$ObjEvaluacionObservacion',
                             metodoeval         = '$MetEvaluacionObservacion',
                             resultados         = '$ResultadosObservacion',
                             conclusiones       = '$ConclusionesObservacion',
                             recomendaciones    = '$RecomendacionesObservacion'
                        WHERE idinforme         = '$idinforme'
                        AND usuario_idusuario1  = '$idpaciente'";
        
        $sql_upInformeFinal  = mysqli_query($this->db->connect(),$query_upInformeFinal);

        if($sql_upInformeFinal){
          return true;
        }else
        {
         return false;
        }
    }
    
    //////////////////////PROGRAMACION
    
    public function insertarProgramacion($idpaciente,
                                        $idusuario,
                                        $fecha,
                                        $horaini,
                                        $horafin,
                                        $area,
                                        $profesional,
                                        $lugarevaluacion,
                                        $observaciones){
        
        $query_insProgramacion = "INSERT INTO programacion (fecha,
                                                        horaini,
                                                        horafin,
                                                        lugarevaluacion,
                                                        observacion,
                                                        area_idarea,
                                                        usuario_idusuario,
                                                        usuario_idusuario1,
                                                        usuario_idusuario2)
                                    VALUES('$fecha',
                                            '$horaini',
                                            '$horafin',
                                            '$lugarevaluacion',
                                            '$observaciones',
                                            $area,
                                            $idpaciente,
                                            $idusuario,
                                            $profesional)";

        $sql_insProgramacion = mysqli_query($this->db->connect(),$query_insProgramacion);
        
        if($sql_insProgramacion){
        	return true;
        }else{
            return false;
        }
    }
    

    public function adminCargarListProgramacion($idpaciente){
       
                                    
       $query_consultaListProg =    "SELECT prog.idprogramacion 
                                           ,prog.fecha
                                           ,prog.horaini
                                           ,prog.horafin
                                           ,prog.area_idarea
                                           ,IFNULL( ( SELECT area
                                                      FROM area arterpr
                                                         ,usuario teraprog
                                                      WHERE arterpr.idarea  = teraprog.area_idarea
                                                      AND teraprog.idusuario = prog.usuario_idusuario2 ),
                                                    ( SELECT arpr.area
                                                      FROM area arpr
                                                      WHERE arpr.idarea = prog.area_idarea)) area
                                           ,(SELECT CONCAT(prof.nombres,' ',prof.primerapellido, ' ', IFNULL(prof.segundoapellido,' ') )
                                             FROM usuario prof
                                             WHERE  prof.idusuario = prog.usuario_idusuario2) profesional
                                           ,prog.lugarevaluacion
                                           ,prog.observacion
                                    FROM programacion prog
                                    WHERE prog.usuario_idusuario = $idpaciente";                  
                                    
        $sql_consultaListProg   = mysqli_query( $this->db->connect(), $query_consultaListProg );
            
        $nro_consultaListProg = mysqli_num_rows($sql_consultaListProg);
        
        if( $nro_consultaListProg > 0 ) 
        {               
            while ( $row_consultaListProg = mysqli_fetch_assoc( $sql_consultaListProg) ) 
            {
                $arreglo_consultaListProg[]= $row_consultaListProg;
            }
            return $arreglo_consultaListProg;
        }else{
            return false;
        }
    }
    
    
    public function actualizarProgramacion($idprogramacion,
                                            $idpaciente,
                                            $idusuario,
                                            $fecha,
                                            $horaini,
                                            $horafin,
                                            $area,
                                            $profesional,
                                            $lugarevaluacion,
                                            $observaciones){
        
        $query_updateProg="UPDATE programacion
                            SET  fecha              = '$fecha',
                                horaini             = '$horaini',
                                horafin             = '$horafin',
                                lugarevaluacion     = '$lugarevaluacion',
                                observacion         = '$observaciones',
                                area_idarea         = $area,
                                usuario_idusuario   = $idpaciente,
                                usuario_idusuario1  = $idusuario,
                                usuario_idusuario2  = $profesional
                            WHERE idprogramacion    = $idprogramacion";
        
        $sql_updateProg   = mysqli_query($this->db->connect(),$query_updateProg );

        if($sql_updateProg ){
          return true;
        }else{
         return false;
        }
    }
    
    public function editarProgramacion($idprogramacion,$idpaciente, $idusuario, $idarea)
    {
        if ($idarea !== "6" && $idarea !== "7")
        {
            $query_editarListProg = "SELECT *,
                                        concat_ws(' ', nombres, primerapellido) as nombre_terapeuta
                                     FROM programacion p, usuario u
                                     WHERE p.idprogramacion = $idprogramacion
                                     AND p.usuario_idusuario = $idpaciente
                                     AND p.usuario_idusuario1 = $idusuario
                                     AND p.usuario_idusuario2 = u.idusuario";
        }  else
        {
            $query_editarListProg = "SELECT *
                                    FROM programacion p
                                    WHERE p.idprogramacion = $idprogramacion
                                    AND p.usuario_idusuario = $idpaciente
                                    AND p.usuario_idusuario1 = $idusuario";
        }

        $sql_editarListProg   = mysqli_query( $this->db->connect(), $query_editarListProg );
            
        $nro_editarListProg = mysqli_num_rows($sql_editarListProg);
        
        if( $nro_editarListProg > 0 ) 
        {               
            while ( $row_editarListProg = mysqli_fetch_assoc( $sql_editarListProg) ) 
            {
                $arreglo_editarListProg[]= $row_editarListProg;
            }
            return $arreglo_editarListProg;
        }else{
            return false;
        }
    }
    
    public function eliminarProgramacion($idprogramacion){          
    
        $query_DELProg = "DELETE FROM programacion
                        WHERE idprogramacion = $idprogramacion";
    
        $sql_DELProg = mysqli_query($this->db->connect(),$query_DELProg);
        
        if ($sql_DELProg) {
            return true;
        }else {
            return false;
        }
    }
    
    
    ////////////////consultar sesiones de evaluacion
    
    public function consultarSesionEvaluacion($idpaciente){
          $idareaPs = 1;

           $query_consultaSesionEvaluacion   = "SELECT 'Cita Inicial' sesion
                                                        ,fechacitaini fecha
                                                        ,'' persona
                                                        ,'' valoraciones 
                                                 FROM cita
                                                 WHERE usuario_idusuario = $idpaciente
                                                 AND tipocita_idtipocita = 2
                                            UNION
                                                SELECT 'Entrevista Acudiente'
                                                       ,fechacreacion
                                                       ,''
                                                       ,'' 
                                                FROM historiaclinica
                                                WHERE usuario_idusuario = $idpaciente
                                            UNION
                                                SELECT 'Fecha del Informe'
                                                      ,fechacreacion
                                                      ,''
                                                      ,'' 
                                                FROM informe
                                                WHERE usuario_idusuario1 = $idpaciente
                                            UNION
                                                SELECT 'Valoraciones'
                                                        ,''
                                                        ,''
                                                        ,fecha as valoraciones 
                                                FROM programacion
                                                WHERE usuario_idusuario = $idpaciente
                                                AND area_idarea = $idareaPs
                                            UNION
                                                SELECT 'Psicologo'
                                                       ,''
                                                       ,concat_ws(' ', nombres, primerapellido) as persona,'' 
                                                FROM usuario
                                                WHERE idusuario =  (SELECT  usuario_idusuario
                                                                    FROM  informe
                                                                    WHERE usuario_idusuario1 = $idpaciente
                                                                    AND area_idarea = $idareaPs) ";
                                    
        $sql_consultaSesionEvaluacion   = mysqli_query( $this->db->connect(), $query_consultaSesionEvaluacion );
            
        $nro_consultaSesionEvaluacion = mysqli_num_rows($sql_consultaSesionEvaluacion);
        
        if( $nro_consultaSesionEvaluacion > 0 ) 
        {               
            while ( $row_consultaSesionEvaluacion = mysqli_fetch_assoc( $sql_consultaSesionEvaluacion) ) 
            {
                $arreglo_consultaSesionEvaluacion[]= $row_consultaSesionEvaluacion;
            }
            return $arreglo_consultaSesionEvaluacion;
        }else{
            return false;
        }
    }
    
    //////////////////////////
  
    public function consultarCita($idpaciente, $idcita){
      
        $query_consultaCita= "SELECT cita.tipocita_idtipocita citatipocitaidtipocita,
                                     cita.idcita,
                                     cita.fechacitaini,
                                     cita.observacion,
                                     cita.motivoconsulta motivoconsulta,
                                     cita.expectativas expectativas,
                                     cita.recomtenercta recomtenercta,
                                     cita.infogral infogral,
                                     hora.idhora hora_idhora,
                                     hora.hora,
                                     CONCAT(usr_aplicador.nombres,' ',usr_aplicador.primerapellido) nombre_aplicador,
                                     paciente.documento_iddocumento pacienteIdDocumento,
                                     paciente.idusuario pacienteIdUsuario,
                                     paciente.parentesco_idparentesco pacienteIdParentesco,
                                     documentopaciente.tipodocumento_idtipodocumento pacienteIdTipoDocumento,
                                     pacientetipodocumento.tipo pacienteTipoDocumento,
                                     documentopaciente.documento pacienteDocumento,
                                     paciente.nombres pacienteNombres,
                                     paciente.primerapellido pacientePrimerApellido,
                                     paciente.segundoapellido pacienteSegundoApellido,
                                     paciente.fechanacimiento pacienteFechaNacimiento,
                                     paciente.edad pacienteEdad,
                                     paciente.meses pacienteMeses,
                                     paciente.direccion pacientedireccion,
                                     paciente.ciudadresidencia pacienteciudadresidencia,
                                     genero.genero,
                                     paciente.genero_idgenero pacienteIdGenero,
                                     paciente.escolaridad_idescolaridad pacienteIdEscolaridad,
                                     pacienteescolaridad.escolaridad pacienteEscolaridad,
                                     paciente.tutela pacienteTutela,
                                     paciente.eps_ideps pacienteIdEps,
                                     pacienteeps.razonsocial pacienteEps,
                                     diagnostico.diagnostico diagnosticos,
                                     diagnostico.remitido remitido,
                                     documentoacudiente.tipodocumento_idtipodocumento acudienteIdTipoDocumento,
                                     acudientetipodocumento.tipo acudienteTipoDocumento,
                                     acudiente.documento_iddocumento acudienteIdDocumento,
                                     acudiente.tipousuario_idtipousuario acudienteIdTipoUsuario,
                                     acudiente.idusuario acudienteIdUsuario,
                                     documentoacudiente.documento acudienteDocumento,
                                     acudiente.tipousuario_idtipousuario idtipousuario,
                                     acudiente.parentesco_idparentesco acudienteIdParentesco,
                                     acudienteparentesco.parentesco acudienteParentesco,
                                     acudiente.nombres acudienteNombres,
                                     acudiente.primerapellido acudientePrimerApellido,
                                     acudiente.segundoapellido acudienteSegundoApellido,
                                     acudiente.edad acudienteEdad,
                                     acudiente.escolaridad_idescolaridad acudienteIdEscolaridad,
                                     acudienteescolaridad.escolaridad acudienteEscolaridad,
                                     acudiente.ocupacion acudienteOcupacion,
                                     acudiente.direccion acudienteDireccion,
                                     acudiente.telefonofijo acudienteTelefonoFijo,
                                     acudiente.telefonocelular acudienteTelefonoCelular,
                                     acudiente.email acudienteEmail
                            FROM
                              usuario paciente
                                INNER JOIN
                                    afinidad
                                    ON (
                                        afinidad.usuario_idusuario=paciente.idusuario
                                    )
                                INNER JOIN
                                    usuario acudiente
                                        ON (
                                            afinidad.idfamiliar=acudiente.idusuario
                                        )
                                INNER JOIN
                                    cita
                                        ON (
                                            cita.usuario_idusuario=paciente.idusuario
                                        )
                                INNER JOIN
                                    documento documentopaciente
                                        ON (
                                            paciente.documento_iddocumento = documentopaciente.iddocumento
                                        )
                                INNER JOIN
                                    diagnostico
                                        ON (
                                            paciente.idusuario = diagnostico.usuario_idusuario
                                        )
                                INNER JOIN
                                    documento documentoacudiente
                                        ON (
                                            acudiente.documento_iddocumento = documentoacudiente.iddocumento
                                        )
                                INNER JOIN
                                    tipodocumento pacientetipodocumento
                                        ON documentopaciente.tipodocumento_idtipodocumento = pacientetipodocumento.idtipodocumento
                                INNER JOIN
                                    tipodocumento acudientetipodocumento
                                        ON documentoacudiente.tipodocumento_idtipodocumento = acudientetipodocumento.idtipodocumento
                                INNER JOIN
                                    genero
                                        ON genero.idgenero = paciente.genero_idgenero
                                INNER JOIN
                                    escolaridad pacienteescolaridad
                                        ON (
                                            paciente.escolaridad_idescolaridad = pacienteescolaridad.idescolaridad
                                        )
                                INNER JOIN
                                    eps pacienteeps
                                        ON (
                                            paciente.eps_ideps = pacienteeps.ideps
                                        )
                                INNER JOIN
                                    escolaridad acudienteescolaridad
                                        ON (
                                            acudiente.escolaridad_idescolaridad = acudienteescolaridad.idescolaridad
                                        )
                                INNER JOIN
                                    parentesco acudienteparentesco
                                        ON (
                                            acudiente.parentesco_idparentesco = acudienteparentesco.idparentesco
                                        )
                                INNER JOIN
                                    usuario usr_aplicador
                                        ON (
                                            cita.usuario_idusuapl = usr_aplicador.idusuario
                                           )
                                LEFT OUTER JOIN
                                    hora
                                        ON cita.hora_idhora=hora.idhora
                                        AND cita.hora_tipohora_idtipohora=hora.tipohora_idtipohora
                                WHERE
                                    cita.idcita=$idcita
                                ORDER BY
                                    cita.fechacitaini ASC ,
                                    hora.idhora ASC ;";
    
        $sql_consultaCita = mysqli_query( $this->db->connect(), $query_consultaCita );
        
        $nro_consultaCita = mysqli_num_rows($sql_consultaCita);
        
        if( $nro_consultaCita > 0 ) 
        {               
            while ( $row_consultaCita = mysqli_fetch_assoc( $sql_consultaCita) ) 
            {
                $arreglo_consultaCita[]= $row_consultaCita;
            }
            return $arreglo_consultaCita;
        }else{
            return false;
        } 
      
    }
  
  public function actualizarCita($tipocita_idtipocita,
                                 $idCita,
                                 $fechacitaini,
                                 $hora_idhora,
                                 $observacion,
                                 $motivoconsulta,
                                 $expectativas,
                                 $recomtenercta,
                                 $infogral,
                                 $usuario_idusuapl)
  {
      $agenda = 1; // Tipo Cita Agenda
      /**
       * Si la cita es una Agenda
       */
      if($tipocita_idtipocita == $agenda) {
          $query_upCita = " UPDATE cita
                            SET fechacitaini             = '$fechacitaini',
                                hora_idhora              = '$hora_idhora',
                                observacion              = '$observacion',
                                usuario_idusuapl         = '$usuario_idusuapl'
                            WHERE idcita = '$idCita'";
      /**
       * Si la cita es una Cita de Informacion
       */
      }else
      {
          $query_upCita = " UPDATE cita
                            SET fechacitaini     = '$fechacitaini',
                                motivoconsulta   = '$motivoconsulta',
                                expectativas     = '$expectativas',
                                recomtenercta    = '$recomtenercta',
                                infogral         = '$infogral',
                                usuario_idusuapl = '$usuario_idusuapl'
                            WHERE idcita = '$idCita'";
      }

      $sql_upCita = mysqli_query($this->db->connect(),$query_upCita);

      if($sql_upCita)
      {
         return true;
      }else
      {
         return false;
      }

  }
  
  public function actualizarEstadoCita($tipocita_idtipocita,
                                      $usuario_idusuario,
                                      $estado_idestado)
 {
     $query_upCita = "UPDATE cita
                      SET estado_idestado = '$estado_idestado'
                      WHERE tipocita_idtipocita = '$tipocita_idtipocita'
                      AND usuario_idusuario = '$usuario_idusuario'";

     $sql_upCita = mysqli_query($this->db->connect(),$query_upCita);

     if($sql_upCita)
     {
         return true;
     }else
     {
         return false;
     }


 }
  
  public function  insertarAgenda($idusuario,
                                 $fechaCitaIni,
                                 $horacita,
                                 $observacion,
                                 $pacienteIdTipoDocumento,
                                 $pacienteDocumento,
                                 $pacienteNombres,
                                 $pacientePrimerApellido,
                                 $pacienteSegundoApellido,
                                 $pacienteFechaNacimiento,
                                 $pacienteEdad,
                                 $pacienteMeses,
                                 $pacienteIdGenero,
                                 $pacienteIdEscolaridad,
                                 $pacienteTutela,
                                 $pacienteIdEps,
                                 $pacienteEps,
                                 $diagnosticos,
                                 $acudienteIdTipoDocumento,
                                 $acudienteDocumento,
                                 $acudienteIdParentesco,
                                 $acudienteNombres,
                                 $acudientePrimerApellido,
                                 $acudienteSegundoApellido,
                                 $acudienteEdad,
                                 $acudienteIdEscolaridad,
                                 $acudienteOcupacion,
                                 $acudienteDireccion,
                                 $acudienteTelefonoFijo,
                                 $acudienteTelefonoCelular,
                                 $acudienteEmail)
 {
     $paciente            = 3; // Tipo Usuario Paciente
     $acudiente           = 5; // Tipo Usuario Acudiente
     $pacientIdParentesco = 1; // Hijo
     $estado_inactivo     = 2; // Inactivo
     $agenda              = 1; // Tipo Cita Agenda
     $estado_pendiente    = 3; // Pendiente
     $hora_agenda         = 1; // Tipo Hora Agenda
     $diagnostico_inicial = 1; // Tipo del Diagnostico
     $idPaciente          = null;
     $valor_df            = " ";
     $error               = 0;
     
     if($pacienteIdEps == ""){
            //error_log("eps $pacienteEps ideps $pacienteIdEps");
            $resultlast = mysqli_query($this->db->connect(),"SELECT MAX(ideps)+1 id FROM eps");
            $rowlast = mysqli_fetch_row($resultlast);
            $pacienteIdEps = $rowlast[0];
            
            /******************************************************************Remision************************************************************************************************/
            $query_insEps  = "INSERT INTO eps (razonsocial) VALUES ('$pacienteEps')";

            $sql_insEps = mysqli_query($this->db->connect(),$query_insEps);
     }
     
     $sql_insPaciente = $this->procesarInsUsuario($pacienteDocumento,
                                                  $pacienteIdTipoDocumento,
                                                  $idPaciente,
                                                  $paciente,
                                                  $estado_inactivo,
                                                  $pacientIdParentesco,
                                                  $pacienteNombres,
                                                  $pacientePrimerApellido,
                                                  $pacienteSegundoApellido,
                                                  $pacienteFechaNacimiento,
                                                  $pacienteEdad,
                                                  $pacienteMeses,
                                                  $pacienteIdGenero,
                                                  $pacienteIdEscolaridad,
                                                  $valor_df,
                                                  $pacienteTutela,
                                                  $pacienteIdEps,
                                                  $valor_df,
                                                  $valor_df,
                                                  $valor_df,
                                                  $valor_df);
     if($sql_insPaciente != $error)
     {
        $idPaciente = $sql_insPaciente;
         /**
          * Se insertan los datos del diagnostico del Paciente
          */
         $sql_insDiagnostico = $this->insertarDiagnostico($diagnostico_inicial,
                                                          $diagnosticos,
                                                          $valor_df,
                                                          $idPaciente);
         if($sql_insDiagnostico)
         {
             /**
              * Se insertan los datos del Acudiente
              */
             $sql_insAcudiente = $this->procesarInsUsuario($acudienteDocumento,
                                                           $acudienteIdTipoDocumento,
                                                           $idPaciente,
                                                           $acudiente,
                                                           $estado_inactivo,
                                                           $acudienteIdParentesco,
                                                           $acudienteNombres,
                                                           $acudientePrimerApellido,
                                                           $acudienteSegundoApellido,
                                                           $valor_df,
                                                           $acudienteEdad,
                                                           $valor_df,
                                                           $valor_df,
                                                           $acudienteIdEscolaridad,
                                                           $acudienteOcupacion,
                                                           $valor_df,
                                                           $valor_df,
                                                           $acudienteDireccion,
                                                           $acudienteTelefonoFijo,
                                                           $acudienteTelefonoCelular,
                                                           $acudienteEmail);
             if($sql_insAcudiente != $error)
             {
                 /**
                  * Se guardan los datos de la Agenda
                  */
                 $sql_insAgenda = $this->insertarCita($agenda,
                                                      $estado_pendiente,
                                                      $idPaciente,
                                                      $idusuario,
                                                      $fechaCitaIni,
                                                      $hora_agenda,
                                                      $horacita,
                                                      $observacion,
                                                      $valor_df,
                                                      $valor_df,
                                                      $valor_df,
                                                      $valor_df);
                 if($sql_insAgenda)
                 {
                     return true;
                 }else
                 {
                     return false;
                 }
             }else
             {
                 return false;
             }
         }else
         {
             return false;
         }
     }
     $this->db->close();
 }
 
 
 public function actualizarAgenda($idusuario,
                                  $idcita,
                                  $fechaCitaIni,
                                  $horacita,
                                  $observacion,
                                  $pacienteIdTipoDocumento,
                                  $pacienteIdDocumento,
                                  $pacienteDocumento,
                                  $pacienteIdUsuario,
                                  $pacienteIdParentesco,
                                  $pacienteNombres,
                                  $pacientePrimerApellido,
                                  $pacienteSegundoApellido,
                                  $pacienteFechaNacimiento,
                                  $pacienteEdad,
                                  $pacienteMeses,
                                  $pacienteIdGenero,
                                  $pacienteIdEscolaridad,
                                  $pacienteTutela,
                                  $pacienteIdEps,
                                  $diagnosticos,
                                  $acudienteIdTipoDocumento,
                                  $acudienteIdDocumento,
                                  $acudienteDocumento,
                                  $acudienteIdUsuario,
                                  $acudienteIdParentesco,
                                  $acudienteNombres,
                                  $acudientePrimerApellido,
                                  $acudienteSegundoApellido,
                                  $acudienteEdad,
                                  $acudienteIdEscolaridad,
                                  $acudienteOcupacion,
                                  $acudienteDireccion,
                                  $acudienteTelefonoFijo,
                                  $acudienteTelefonoCelular,
                                  $acudienteEmail)
  {
      $agenda    = 1;
      $acudiente = 5;
      $valor_df  = " ";

      $sql_upPaciente = $this->procesarUpUsuario($pacienteIdDocumento,
                                                 $pacienteDocumento,
                                                 $pacienteIdTipoDocumento,
                                                 $pacienteIdUsuario,
                                                 $valor_df,
                                                 $pacienteIdParentesco,
                                                 $pacienteNombres,
                                                 $pacientePrimerApellido,
                                                 $pacienteSegundoApellido,
                                                 $pacienteFechaNacimiento,
                                                 $pacienteEdad,
                                                 $pacienteMeses,
                                                 $pacienteIdGenero,
                                                 $pacienteIdEscolaridad,
                                                 $valor_df,
                                                 $pacienteTutela,
                                                 $pacienteIdEps,
                                                 $valor_df,
                                                 $valor_df,
                                                 $valor_df,
                                                 $valor_df);
      if($sql_upPaciente)
      {
          /**
           *
           * Se actualizan los datos de Diagnostico del Paciente
           */
          $sql_upDiagnostico = $this->actualizarDiagnostico($diagnosticos,
                                                            $valor_df,
                                                            $pacienteIdUsuario);
          if($sql_upDiagnostico)
          {
              /**
               * Se actualizan los datos del acudiente
               */
              $sql_upAcudiente = $this->procesarUpUsuario($acudienteIdDocumento,
                                                          $acudienteDocumento,
                                                          $acudienteIdTipoDocumento,
                                                          $acudienteIdUsuario,
                                                          $acudiente,
                                                          $acudienteIdParentesco,
                                                          $acudienteNombres,
                                                          $acudientePrimerApellido,
                                                          $acudienteSegundoApellido,
                                                          $valor_df,
                                                          $acudienteEdad,
                                                          $valor_df,
                                                          $valor_df,
                                                          $acudienteIdEscolaridad,
                                                          $acudienteOcupacion,
                                                          $valor_df,
                                                          $valor_df,
                                                          $acudienteDireccion,
                                                          $acudienteTelefonoFijo,
                                                          $acudienteTelefonoCelular,
                                                          $acudienteEmail);

              if($sql_upAcudiente)
              {
                  $sql_upAgenda = $this->actualizarCita($agenda,
                                                        $idcita,
                                                        $fechaCitaIni,
                                                        $horacita,
                                                        $observacion,
                                                        $valor_df,
                                                        $valor_df,
                                                        $valor_df,
                                                        $valor_df,
                                                        $idusuario);
                  if($sql_upAgenda)
                  {
                      return true;
                  }else
                  {
                      return false;
                  }
              }else
              {
                  return false;
              }
          }else
          {
              return false;
          }
      }else{
          return false;
      }

      $this->db->close();
  }
  
    /**
    * Si el paciente ya ha sido creado por el usuario en la pagina de Agenda
    */
  public function insertarCitaInformacion( $fechacita,
                                           $motivoConsulta,
                                           $expectativas,
                                           $recomTenerCta,
                                           $inFoGral,
                                           $idusuario,
                                           $pacienteIdTipoDocumento,
                                           $pacienteIdDocumento,
                                           $pacienteDocumento,
                                           $pacienteIdUsuario,
                                           $pacienteNombres,
                                           $pacientePrimerApellido,
                                           $pacienteSegundoApellido,
                                           $pacienteFechaNacimiento,
                                           $pacienteEdad,
                                           $pacienteMeses,
                                           $pacienteIdGenero,
                                           $pacienteIdEscolaridad,
                                           $pacienteTutela,
                                           $pacienteIdEps,
                                           $pacienteEps,
                                           $diagnosticos,
                                           $remitido,
                                           $madreIdTipoDocumento,
                                           $madreIdDocumento,
                                           $madreDocumento,
                                           $madreIdTipoUsuario,
                                           $madreIdUsuario,
                                           $madreNombres,
                                           $madrePrimerApellido,
                                           $madreSegundoApellido,
                                           $madreEdad,
                                           $madreIdEscolaridad,
                                           $madreOcupacion,
                                           $madreDireccion,
                                           $madreTelefonoFijo,
                                           $madreTelefonoCelular,
                                           $madreEmail,
                                           $padreIdTipoDocumento,
                                           $padreIdDocumento,
                                           $padreDocumento,
                                           $padreIdTipoUsuario,
                                           $padreIdUsuario,
                                           $padreNombres,
                                           $padrePrimerApellido,
                                           $padreSegundoApellido,
                                           $padreEdad,
                                           $padreIdEscolaridad,
                                           $padreOcupacion,
                                           $padreDireccion,
                                           $padreTelefonoFijo,
                                           $padreTelefonoCelular,
                                           $padreEmail,
                                           $acudienteIdTipoDocumento,
                                           $acudienteIdDocumento,
                                           $acudienteDocumento,
                                           $acudienteIdParentesco,
                                           $acudienteIdUsuario,
                                           $acudienteNombres,
                                           $acudientePrimerApellido,
                                           $acudienteSegundoApellido,
                                           $acudienteEdad,
                                           $acudienteIdEscolaridad,
                                           $acudienteOcupacion,
                                           $acudienteDireccion,
                                           $acudienteTelefonoFijo,
                                           $acudienteTelefonoCelular,
                                           $acudienteEmail)
  {

      $hijo             = 1; // Parentesco
      $madre            = 3; // Parentesco
      $padre            = 2; // Parentesco
      $pariente         = 4; // Tipo Usuario
      $acudiente        = 5; // Tipo Usuario
      $agenda           = 1; // Cita Agenda
      $cita_informacion = 2; // Cita Informacion
      $estado_inactivo  = 2; // Inactivo
      $estado_pendiente = 3; // Pendiente
      $estado_terminado = 5; // Terminado
      $valor_df         = " ";
      $exito            = 1;
      $error            = 0;
      $esAcudiente      = false;
      
      
      if($pacienteIdEps == ""){
            $resultlast = mysqli_query($this->db->connect(),"SELECT MAX(ideps)+1 id FROM eps");
            $rowlast = mysqli_fetch_row($resultlast);
            $pacienteIdEps = $rowlast[0];
            
            /******************************************************************Remision************************************************************************************************/
            $query_insEps  = "INSERT INTO eps (razonsocial) VALUES ('$pacienteEps')";

            $sql_insEps = mysqli_query($this->db->connect(),$query_insEps);
     }
      
      /**
       * Se actualizan los datos del paciente
       */
      $sql_upPaciente = $this->procesarUpUsuario($pacienteIdDocumento,
                                                 $pacienteDocumento,
                                                 $pacienteIdTipoDocumento,
                                                 $pacienteIdUsuario,
                                                 $valor_df,
                                                 $hijo,
                                                 $pacienteNombres,
                                                 $pacientePrimerApellido,
                                                 $pacienteSegundoApellido,
                                                 $pacienteFechaNacimiento,
                                                 $pacienteEdad,
                                                 $pacienteMeses,
                                                 $pacienteIdGenero,
                                                 $pacienteIdEscolaridad,
                                                 $valor_df,
                                                 $pacienteTutela,
                                                 $pacienteIdEps,
                                                 $valor_df,
                                                 $valor_df,
                                                 $valor_df,
                                                 $valor_df);
      if($sql_upPaciente)
      {
          /**
           *
           * Se actualizan los datos de Diagnostico del Paciente
           */
          $sql_upDiagnostico = $this->actualizarDiagnostico($diagnosticos,
                                                            $remitido,
                                                            $pacienteIdUsuario);
          if($sql_upDiagnostico)
          {
              /**
               * Se valida si el acudiente es la Madre
               * Si lo es entonces se actualizan los datos de la madre
               */
              if($acudienteIdParentesco == $madre)
              {
                  /**
                   * Se debe validar si el usuario esta cambiando el acudiente para que sea la madre del paciente
                   */
                  if($madreIdUsuario != null)
                  {
                      /**
                       *  Se actualizan los datos del la Madre
                       */
                      $sql_Madre = $this->procesarUpUsuario($madreIdDocumento,
                                                            $madreDocumento,
                                                            $madreIdTipoDocumento,
                                                            $madreIdUsuario,
                                                            $acudiente,
                                                            $madre,
                                                            $madreNombres,
                                                            $madrePrimerApellido,
                                                            $madreSegundoApellido,
                                                            $valor_df,
                                                            $madreEdad,
                                                            $valor_df,
                                                            $valor_df,
                                                            $madreIdEscolaridad,
                                                            $madreOcupacion,
                                                            $valor_df,
                                                            $valor_df,
                                                            $madreDireccion,
                                                            $madreTelefonoFijo,
                                                            $madreTelefonoCelular,
                                                            $madreEmail);
                   /**
                    * Si el acudiente no era la madre del paciente cuando se creo la Agenda
                    * se debe insertar los datos de la madre por primera vez
                    */
                  }else
                  {
                      /**
                       * Se guardan los datos de la madre y la afinidad con el paciente
                       */
                      $sql_Madre = $this->procesarInsUsuario($madreDocumento,
                                                             $madreIdTipoDocumento,
                                                             $pacienteIdUsuario,
                                                             $acudiente,
                                                             $estado_inactivo,
                                                             $madre,
                                                             $madreNombres,
                                                             $madrePrimerApellido,
                                                             $madreSegundoApellido,
                                                             $valor_df,
                                                             $madreEdad,
                                                             $valor_df,
                                                             $valor_df,
                                                             $madreIdEscolaridad,
                                                             $madreOcupacion,
                                                             $valor_df,
                                                             $valor_df,
                                                             $madreDireccion,
                                                             $madreTelefonoFijo,
                                                             $madreTelefonoCelular,
                                                             $madreEmail);
                  }
                  if($sql_Madre || $sql_Madre == $exito)
                  {
                      /**
                       * Se valida si la madre del paciente era el acudiente desde que se creo el registro
                       * en la Agenda
                       */
                      if($madreIdTipoUsuario == $acudiente)
                      {
                          $esAcudiente = true;
                      }
                      /**
                       * Se valida si el Padre era el acudiente cuando se creo el registro en la Agenda
                       */
                      if($padreIdUsuario != null)
                      {
                          /**
                           * El padre era el acudiente
                           */
                          $esAcudiente = true;
                          /**
                           * Se actualizan los datos del Padre
                           */
                          $sql_Padre = $this->procesarUpUsuario($padreIdDocumento,
                                                                $padreDocumento,
                                                                $padreIdTipoDocumento,
                                                                $padreIdUsuario,
                                                                $pariente,
                                                                $padre,
                                                                $padreNombres,
                                                                $padrePrimerApellido,
                                                                $padreSegundoApellido,
                                                                $valor_df,
                                                                $padreEdad,
                                                                $valor_df,
                                                                $valor_df,
                                                                $padreIdEscolaridad,
                                                                $padreOcupacion,
                                                                $valor_df,
                                                                $valor_df,
                                                                $padreDireccion,
                                                                $padreTelefonoFijo,
                                                                $padreTelefonoCelular,
                                                                $padreEmail);
                      }else
                      {
                          /**
                           * Se guardan los datos del padre y la afinidad con el paciente por primera vez
                           */
                          $sql_Padre = $this->procesarInsUsuario($padreDocumento,
                                                                 $padreIdTipoDocumento,
                                                                 $pacienteIdUsuario,
                                                                 $pariente,
                                                                 $estado_inactivo,
                                                                 $padre,
                                                                 $padreNombres,
                                                                 $padrePrimerApellido,
                                                                 $padreSegundoApellido,
                                                                 $valor_df,
                                                                 $padreEdad,
                                                                 $valor_df,
                                                                 $valor_df,
                                                                 $padreIdEscolaridad,
                                                                 $padreOcupacion,
                                                                 $valor_df,
                                                                 $valor_df,
                                                                 $padreDireccion,
                                                                 $padreTelefonoFijo,
                                                                 $padreTelefonoCelular,
                                                                 $padreEmail);
                      }
                      if($sql_Padre  || $sql_Padre == $exito)
                      {
                        /**
                          * El padre no era el acudiente del paciente cuando se creo en la Agenda
                        */
                        if(!$esAcudiente)
                        {
                            /**
                             * Se actualiza el acuendiente cambiando el tipo_idtipousuario a pariente
                             */
                            $sql_upAcudiente = $this->procesarUpUsuario($acudienteIdDocumento,
                                                                        $acudienteDocumento,
                                                                        $acudienteIdTipoDocumento,
                                                                        $acudienteIdUsuario,
                                                                        $pariente,
                                                                        $acudienteIdParentesco,
                                                                        $acudienteNombres,
                                                                        $acudientePrimerApellido,
                                                                        $acudienteSegundoApellido,
                                                                        $valor_df,
                                                                        $acudienteEdad,
                                                                        $valor_df,
                                                                        $valor_df,
                                                                        $acudienteIdEscolaridad,
                                                                        $acudienteOcupacion,
                                                                        $valor_df,
                                                                        $valor_df,
                                                                        $acudienteDireccion,
                                                                        $acudienteTelefonoFijo,
                                                                        $acudienteTelefonoCelular,
                                                                        $acudienteEmail);
                            if(!$sql_upAcudiente)
                            {
                                return false;
                            }
                        }
                      }else
                      {
                          return false;
                      }
                  }else
                  {
                      return false;
                  }
              /**
               * Se valida si el acudiente es el Padre
               * Si lo es entonces se actualizan los datos del Padre
              */
              }elseif($acudienteIdParentesco == $padre)
              {
                  /**
                   * Se debe validar si el usuario esta cambiando el acudiente para que sea el padre del paciente
                   */
                  /**
                   * Se debe validar si el usuario esta cambiando el acudiente para que sea el padre del paciente
                   */
                  if($padreIdUsuario != null)
                  {
                      /**
                       *  Se actualizan los datos del Padre
                       */
                      $sql_Padre = $this->procesarUpUsuario($padreIdDocumento,
                                                              $padreDocumento,
                                                              $padreIdTipoDocumento,
                                                              $padreIdUsuario,
                                                              $acudiente,
                                                              $padre,
                                                              $padreNombres,
                                                              $padrePrimerApellido,
                                                              $padreSegundoApellido,
                                                              $valor_df,
                                                              $padreEdad,
                                                              $valor_df,
                                                              $valor_df,
                                                              $padreIdEscolaridad,
                                                              $padreOcupacion,
                                                              $valor_df,
                                                              $valor_df,
                                                              $padreDireccion,
                                                              $padreTelefonoFijo,
                                                              $padreTelefonoCelular,
                                                              $padreEmail);
                   /**
                    * Si el acudiente no era el padre del paciente cuando se creo la Agenda
                    * se debe insertar los datos del padre por primera vez
                    */
                  }else
                  {
                      /**
                       * Se guardan los datos del padre y la afinidad con el paciente
                       */
                      $sql_Padre = $this->procesarInsUsuario($padreDocumento,
                                                             $padreIdTipoDocumento,
                                                             $pacienteIdUsuario,
                                                             $acudiente,
                                                             $estado_inactivo,
                                                             $padre,
                                                             $padreNombres,
                                                             $padrePrimerApellido,
                                                             $padreSegundoApellido,
                                                             $valor_df,
                                                             $padreEdad,
                                                             $valor_df,
                                                             $valor_df,
                                                             $padreIdEscolaridad,
                                                             $padreOcupacion,
                                                             $valor_df,
                                                             $valor_df,
                                                             $padreDireccion,
                                                             $padreTelefonoFijo,
                                                             $padreTelefonoCelular,
                                                             $padreEmail);
                  }
                  if($sql_Padre  || $sql_Padre == $exito)
                  {
                      /**
                       * Se valida si el padre del paciente era el acudiente desde que se creo el registro
                       * en la Agenda
                       */
                      if($padreIdTipoUsuario == $acudiente)
                      {
                          $esAcudiente = true;
                      }
                      /**
                       * Se valida si el Madre era el acudiente cuando se creo el registro en la Agenda
                       */
                      if($madreIdUsuario != null)
                      {
                          /**
                           * La madre era la acudiente
                           */
                          $esAcudiente = true;
                          /**
                           *  Se actualizan los datos del la Madre
                           */

                          $sql_Madre = $this->procesarUpUsuario($madreIdDocumento,
                                                                $madreDocumento,
                                                                $madreIdTipoDocumento,
                                                                $madreIdUsuario,
                                                                $pariente,
                                                                $madre,
                                                                $madreNombres,
                                                                $madrePrimerApellido,
                                                                $madreSegundoApellido,
                                                                $valor_df,
                                                                $madreEdad,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreIdEscolaridad,
                                                                $madreOcupacion,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreDireccion,
                                                                $madreTelefonoFijo,
                                                                $madreTelefonoCelular,
                                                                $madreEmail);
                      }else
                      {
                          /**
                           * Se guardan los datos de la madre y la afinidad con el paciente por primera vez
                           */
                          $sql_Madre = $this->procesarInsUsuario($madreDocumento,
                                                                 $madreIdTipoDocumento,
                                                                 $pacienteIdUsuario,
                                                                 $pariente,
                                                                 $estado_inactivo,
                                                                 $madre,
                                                                 $madreNombres,
                                                                 $madrePrimerApellido,
                                                                 $madreSegundoApellido,
                                                                 $valor_df,
                                                                 $madreEdad,
                                                                 $valor_df,
                                                                 $valor_df,
                                                                 $madreIdEscolaridad,
                                                                 $madreOcupacion,
                                                                 $valor_df,
                                                                 $valor_df,
                                                                 $madreDireccion,
                                                                 $madreTelefonoFijo,
                                                                 $madreTelefonoCelular,
                                                                 $madreEmail);
                      }
                      if($sql_Madre || $sql_Madre == $error)
                      {
                          /**
                           * La madre no era el acudiente del paciente cuando se creo en la Agenda
                           */
                          if(!$esAcudiente)
                          {
                              /**
                               * Se actualiza el acuendiente cambiando el tipo_idtipousuario a pariente
                               */
                              $sql_upAcudiente = $this->procesarUpUsuario($acudienteIdDocumento,
                                                                          $acudienteDocumento,
                                                                          $acudienteIdTipoDocumento,
                                                                          $acudienteIdUsuario,
                                                                          $pariente,
                                                                          $acudienteIdParentesco,
                                                                          $acudienteNombres,
                                                                          $acudientePrimerApellido,
                                                                          $acudienteSegundoApellido,
                                                                          $valor_df,
                                                                          $acudienteEdad,
                                                                          $valor_df,
                                                                          $valor_df,
                                                                          $acudienteIdEscolaridad,
                                                                          $acudienteOcupacion,
                                                                          $valor_df,
                                                                          $valor_df,
                                                                          $acudienteDireccion,
                                                                          $acudienteTelefonoFijo,
                                                                          $acudienteTelefonoCelular,
                                                                          $acudienteEmail);
                              if(!$sql_upAcudiente)
                              {
                                  return false;
                              }
                          }

                      }else
                      {
                          return false;
                      }
                  }else
                  {
                      return false;
                  }
              /**
               * Se valida si el acudiente no es ni la Madre ni el Padre
               * Si no lo es entonces se guardan los datos de la madre y del padre por primera vez, se
               * actualizan los datos del Acudiente
               */
              }else
              {
                  /**
                   * Se guardan los datos de la madre y la afinidad con el paciente
                   */
                  $sql_insMadre = $this->procesarInsUsuario($madreDocumento,
                                                            $madreIdTipoDocumento,
                                                            $pacienteIdUsuario,
                                                            $pariente,
                                                            $estado_inactivo,
                                                            $madre,
                                                            $madreNombres,
                                                            $madrePrimerApellido,
                                                            $madreSegundoApellido,
                                                            $valor_df,
                                                            $madreEdad,
                                                            $valor_df,
                                                            $valor_df,
                                                            $madreIdEscolaridad,
                                                            $madreOcupacion,
                                                            $valor_df,
                                                            $valor_df,
                                                            $madreDireccion,
                                                            $madreTelefonoFijo,
                                                            $madreTelefonoCelular,
                                                            $madreEmail);
                  if($sql_insMadre != $error)
                  {
                      /**
                       * Se guardan los datos del padre y la afinidad con el paciente
                       */
                      $sql_insPadre = $this->procesarInsUsuario($padreDocumento,
                                                                $padreIdTipoDocumento,
                                                                $pacienteIdUsuario,
                                                                $pariente,
                                                                $estado_inactivo,
                                                                $padre,
                                                                $padreNombres,
                                                                $padrePrimerApellido,
                                                                $padreSegundoApellido,
                                                                $valor_df,
                                                                $padreEdad,
                                                                $valor_df,
                                                                $valor_df,
                                                                $padreIdEscolaridad,
                                                                $padreOcupacion,
                                                                $valor_df,
                                                                $valor_df,
                                                                $padreDireccion,
                                                                $padreTelefonoFijo,
                                                                $padreTelefonoCelular,
                                                                $padreEmail);
                      if($sql_insPadre != $error)
                      {
                          /**
                           *  Se actualizan los datos de la Acudiente
                           */
                          $sql_upAcudiente = $this->procesarUpUsuario($acudienteIdDocumento,
                                                                      $acudienteDocumento,
                                                                      $acudienteIdTipoDocumento,
                                                                      $acudienteIdUsuario,
                                                                      $acudiente,
                                                                      $acudienteIdParentesco,
                                                                      $acudienteNombres,
                                                                      $acudientePrimerApellido,
                                                                      $acudienteSegundoApellido,
                                                                      $valor_df,
                                                                      $acudienteEdad,
                                                                      $valor_df,
                                                                      $valor_df,
                                                                      $acudienteIdEscolaridad,
                                                                      $acudienteOcupacion,
                                                                      $valor_df,
                                                                      $valor_df,
                                                                      $acudienteDireccion,
                                                                      $acudienteTelefonoFijo,
                                                                      $acudienteTelefonoCelular,
                                                                      $acudienteEmail);
                          if(!$sql_upAcudiente)
                          {
                            return false;
                          }
                      }else
                      {
                          return false;
                      }
                  }else{
                      return false;
                  }
              }
              /**
               * Se guardan los datos de la Cita de Informacion
              */
              $sql_insCitaInformacion = $this->insertarCita($cita_informacion,
                                                            $estado_pendiente,
                                                            $pacienteIdUsuario,
                                                            $idusuario,
                                                            $fechacita,
                                                            $valor_df,
                                                            $valor_df,
                                                            $valor_df,
                                                            $motivoConsulta,
                                                            $expectativas,
                                                            $recomTenerCta,
                                                            $inFoGral);
             if($sql_insCitaInformacion)
             {
                   /**
                    * Se actualiza el estado de la Agenda
                   */
                   $sql_upAgenda = $this->actualizarEstadoCita($agenda,
                                                               $pacienteIdUsuario,
                                                               $estado_terminado);
                  if($sql_upAgenda)
                  {
                     return true;
                  }else
                  {
                    return false;
                  }
             }else
             {
                  return false;
             }
          }else
          {
              return false;
          }
      }else
      {
          return false;
      }
      $this->db->close();
  }
  
    /**
    * Si el paciente no ha sido creado aun sino que esta siendo creado desde la pagina Cita Informacion
    */
  public function insertar_CitaInformacion( $fechacita,
                                             $motivoConsulta,
                                             $expectativas,
                                             $recomTenerCta,
                                             $inFoGral,
                                             $idusuario,
                                             $pacienteIdTipoDocumento,
                                             $pacienteDocumento,
                                             $pacienteNombres,
                                             $pacientePrimerApellido,
                                             $pacienteSegundoApellido,
                                             $pacienteFechaNacimiento,
                                             $pacienteEdad,
                                             $pacienteMeses,
                                             $pacienteIdGenero,
                                             $pacienteIdEscolaridad,
                                             $pacienteTutela,
                                             $pacienteIdEps,
                                             $pacienteEps,
                                             $diagnosticos,
                                             $remitido,
                                             $madreIdTipoDocumento,
                                             $madreDocumento,
                                             $madreNombres,
                                             $madrePrimerApellido,
                                             $madreSegundoApellido,
                                             $madreEdad,
                                             $madreIdEscolaridad,
                                             $madreOcupacion,
                                             $madreDireccion,
                                             $madreTelefonoFijo,
                                             $madreTelefonoCelular,
                                             $madreEmail,
                                             $padreIdTipoDocumento,
                                             $padreDocumento,
                                             $padreNombres,
                                             $padrePrimerApellido,
                                             $padreSegundoApellido,
                                             $padreEdad,
                                             $padreIdEscolaridad,
                                             $padreOcupacion,
                                             $padreDireccion,
                                             $padreTelefonoFijo,
                                             $padreTelefonoCelular,
                                             $padreEmail,
                                             $acudienteIdTipoDocumento,
                                             $acudienteDocumento,
                                             $acudienteIdParentesco,
                                             $acudienteNombres,
                                             $acudientePrimerApellido,
                                             $acudienteSegundoApellido,
                                             $acudienteEdad,
                                             $acudienteIdEscolaridad,
                                             $acudienteOcupacion,
                                             $acudienteDireccion,
                                             $acudienteTelefonoFijo,
                                             $acudienteTelefonoCelular,
                                             $acudienteEmail)
    {
        $idPaciente          = null;
        $paciente            = 3; // Tipo Usuario Paciente
        $idtipousuario       = 4; // Tipo Usuario Acudiente
        $pariente            = 4; // Tipo Usuario Pariente
        $madre               = 3; // Parentesco
        $padre               = 2; // Parentesco
        $acudiente           = 5; // Tipo Usuario Acudiente
        $pacientIdParentesco = 1; // Hijo
        $estado_inactivo     = 2; // Inactivo
        $estado_pendiente    = 3; // Pendiente
        $cita_informacion    = 2; // Tipo Cita Informacion
        $diagnostico_inicial = 1; // Tipo del Diagnostico
        $valor_df            = " ";
        $error               = 0;
        
        if($pacienteIdEps == ""){
            //error_log("cita_informacion eps $pacienteEps ideps $pacienteIdEps");
            $resultlast = mysqli_query($this->db->connect(),"SELECT MAX(ideps)+1 id FROM eps");
            $rowlast = mysqli_fetch_row($resultlast);
            $pacienteIdEps = $rowlast[0];
            
            /******************************************************************Remision************************************************************************************************/
            $query_insEps  = "INSERT INTO eps (razonsocial) VALUES ('$pacienteEps')";

            $sql_insEps = mysqli_query($this->db->connect(),$query_insEps);
        }
        
        /**
         * Se insertan los datos del Paciente
         */
         
        //error_log("insertando cita datos del paciente");
        $sql_insPaciente = $this->procesarInsUsuario($pacienteDocumento,
                                                     $pacienteIdTipoDocumento,
                                                     $idPaciente,
                                                     $paciente,
                                                     $estado_inactivo,
                                                     $pacientIdParentesco,
                                                     $pacienteNombres,
                                                     $pacientePrimerApellido,
                                                     $pacienteSegundoApellido,
                                                     $pacienteFechaNacimiento,
                                                     $pacienteEdad,
                                                     $pacienteMeses,
                                                     $pacienteIdGenero,
                                                     $pacienteIdEscolaridad,
                                                     $valor_df,
                                                     $pacienteTutela,
                                                     $pacienteIdEps,
                                                     $valor_df,
                                                     $valor_df,
                                                     $valor_df,
                                                     $valor_df);
        if ($sql_insPaciente != $error)
        {
            $idPaciente = $sql_insPaciente;
            /**
             * Se insertan los datos del diagnostico del Paciente
             */
             
            //error_log("insertando cita datos del diagnostico");
            $sql_insDiagnostico = $this->insertarDiagnostico($diagnostico_inicial,
                                                             $diagnosticos,
                                                             $remitido,
                                                             $idPaciente);
            if($sql_insDiagnostico)
            {
                /**
                 * Se valida si la madre es el acudiente
                 */
                if($acudienteIdParentesco == $madre)
                {
                    $idtipousuario = $acudiente;
                }

                /**
                 * Se guardan los datos de la madre y al afinidad con el paciente
                 */

                    $sql_insMadre = $this->procesarInsUsuario($madreDocumento,
                                                              $madreIdTipoDocumento,
                                                              $idPaciente,
                                                              $idtipousuario,
                                                              $estado_inactivo,
                                                              $madre,
                                                              $madreNombres,
                                                              $madrePrimerApellido,
                                                              $madreSegundoApellido,
                                                              $valor_df,
                                                              $madreEdad,
                                                              $valor_df,
                                                              $valor_df,
                                                              $madreIdEscolaridad,
                                                              $madreOcupacion,
                                                              $valor_df,
                                                              $valor_df,
                                                              $madreDireccion,
                                                              $madreTelefonoFijo,
                                                              $madreTelefonoCelular,
                                                              $madreEmail);
                if($sql_insMadre != $error)
                {
                    $idtipousuario = $pariente;

                    /**
                     * Se valida si el acudiente es el Padre
                     */
                    if($acudienteIdParentesco == $padre)
                    {
                        $idtipousuario = $acudiente;
                    }

                    /**
                     * Se guardan los datos del padre y la afinidad con el paciente
                     */
                    $sql_insPadre = $this->procesarInsUsuario($padreDocumento,
                                                              $padreIdTipoDocumento,
                                                              $idPaciente,
                                                              $idtipousuario,
                                                              $estado_inactivo,
                                                              $padre,
                                                              $padreNombres,
                                                              $padrePrimerApellido,
                                                              $padreSegundoApellido,
                                                              $valor_df,
                                                              $padreEdad,
                                                              $valor_df,
                                                              $valor_df,
                                                              $padreIdEscolaridad,
                                                              $padreOcupacion,
                                                              $valor_df,
                                                              $valor_df,
                                                              $padreDireccion,
                                                              $padreTelefonoFijo,
                                                              $padreTelefonoCelular,
                                                              $padreEmail);
                    if($sql_insPadre != $error)
                    {
                        if($acudienteIdParentesco != $madre && $acudienteIdParentesco != $padre)
                        {
                            /**
                            *  Se guardan los datos del acudiente y la afinidad con el paciente
                            */
                             //error_log("insertando cita datos del acudiente");
                            $sql_insAcudiente = $this->procesarInsUsuario($acudienteDocumento,
                                                                          $acudienteIdTipoDocumento,
                                                                          $idPaciente,
                                                                          $acudiente,
                                                                          $estado_inactivo,
                                                                          $acudienteIdParentesco,
                                                                          $acudienteNombres,
                                                                          $acudientePrimerApellido,
                                                                          $acudienteSegundoApellido,
                                                                          $valor_df,
                                                                          $acudienteEdad,
                                                                          $valor_df,
                                                                          $valor_df,
                                                                          $acudienteIdEscolaridad,
                                                                          $acudienteOcupacion,
                                                                          $valor_df,
                                                                          $valor_df,
                                                                          $acudienteDireccion,
                                                                          $acudienteTelefonoFijo,
                                                                          $acudienteTelefonoCelular,
                                                                          $acudienteEmail);
                            if($sql_insAcudiente == $error)
                            {
                                return false;
                            }
                        }
                    }else{
                        return false;
                    }
                }else
                {
                    return false;
                }
                /**
                 * Se guardan los datos de la Cita de Informacion
                 */
                 //error_log("insertando cita datos Cita informacion");
                $sql_insCitaInformacion = $this->insertarCita($cita_informacion,
                                                              $estado_pendiente,
                                                              $idPaciente,
                                                              $idusuario,
                                                              $fechacita,
                                                              $valor_df,
                                                              $valor_df,
                                                              $valor_df,
                                                              $motivoConsulta,
                                                              $expectativas,
                                                              $recomTenerCta,
                                                              $inFoGral);
                if($sql_insCitaInformacion)
                {
                    return true;
                }else
                {
                    return false;
                }
            }else
            {
                return false;
            }
        }else
        {
            return false;
        }
        $this->db->close();
    }

    public function actualizarCitaInfor($fechaCitaIni,
                                              $idcita,
                                              $motivoConsulta,
                                              $expectativas,
                                              $recomTenerCta,
                                              $inFoGral,
                                              $idusuario,
                                              $pacienteIdTipoDocumento,
                                              $pacienteIdDocumento,
                                              $pacienteDocumento,
                                              $pacienteIdUsuario,
                                              $pacienteNombres,
                                              $pacientePrimerApellido,
                                              $pacienteSegundoApellido,
                                              $pacienteFechaNacimiento,
                                              $pacienteEdad,
                                              $pacienteMeses,
                                              $pacienteIdGenero,
                                              $pacienteIdEscolaridad,
                                              $pacienteTutela,
                                              $pacienteIdEps,
                                              $diagnosticos,
                                              $remitido,
                                              $madreIdTipoDocumento,
                                              $madreIdDocumento,
                                              $madreDocumento,
                                              $madreIdTipoUsuario,
                                              $madreIdUsuario,
                                              $madreNombres,
                                              $madrePrimerApellido,
                                              $madreSegundoApellido,
                                              $madreEdad,
                                              $madreIdEscolaridad,
                                              $madreOcupacion,
                                              $madreDireccion,
                                              $madreTelefonoFijo,
                                              $madreTelefonoCelular,
                                              $madreEmail,
                                              $padreIdTipoDocumento,
                                              $padreIdDocumento,
                                              $padreDocumento,
                                              $padreIdTipoUsuario,
                                              $padreIdUsuario,
                                              $padreNombres,
                                              $padrePrimerApellido,
                                              $padreSegundoApellido,
                                              $padreEdad,
                                              $padreIdEscolaridad,
                                              $padreOcupacion,
                                              $padreDireccion,
                                              $padreTelefonoFijo,
                                              $padreTelefonoCelular,
                                              $padreEmail,
                                              $acudienteIdTipoDocumento,
                                              $acudienteIdDocumento,
                                              $acudienteDocumento,
                                              $acudienteIdParentesco,
                                              $acudienteIdTipoUsuario,
                                              $acudienteIdUsuario,
                                              $acudienteNombres,
                                              $acudientePrimerApellido,
                                              $acudienteSegundoApellido,
                                              $acudienteEdad,
                                              $acudienteIdEscolaridad,
                                              $acudienteOcupacion,
                                              $acudienteDireccion,
                                              $acudienteTelefonoFijo,
                                              $acudienteTelefonoCelular,
                                              $acudienteEmail)
    {
        $hijo             = 1; // Parentesco
        $madre            = 3; // Parentesco
        $padre            = 2; // Parentesco
        $acudiente        = 5; // Parentesco
        $pariente         = 4; // Tipo Usuario
        $cita_informacion = 2; // Cita Informacion
        $valor_df         = " ";
        $exito            = 1;
        $error            = 0;
        
        $idPaciente          = null;
        $paciente            = 3; // Tipo Usuario Paciente
        $idtipousuario       = 4; 
        $pacientIdParentesco = 1; // Hijo
        $estado_inactivo     = 2; // Inactivo
        
        /**
         * Se actualizan los datos del paciente
         */
        $sql_upPaciente = $this->procesarUpUsuario($pacienteIdDocumento,
                                                   $pacienteDocumento,
                                                   $pacienteIdTipoDocumento,
                                                   $pacienteIdUsuario,
                                                   $valor_df,
                                                   $hijo,
                                                   $pacienteNombres,
                                                   $pacientePrimerApellido,
                                                   $pacienteSegundoApellido,
                                                   $pacienteFechaNacimiento,
                                                   $pacienteEdad,
                                                   $pacienteMeses,
                                                   $pacienteIdGenero,
                                                   $pacienteIdEscolaridad,
                                                   $valor_df,
                                                   $pacienteTutela,
                                                   $pacienteIdEps,
                                                   $valor_df,
                                                   $valor_df,
                                                   $valor_df,
                                                   $valor_df);
        if ($sql_upPaciente != $error)
        {
            /**
             *
             * Se actualizan los datos de Diagnostico del Paciente
             */
            $sql_upDiagnostico = $this->actualizarDiagnostico($diagnosticos,
                                                              $remitido,
                                                              $pacienteIdUsuario);
            if($sql_upDiagnostico)
            {
                /**
                 * Si el acudiente sigue siendo la madre del paciente o sigue siendo el padre
                 */
                if(($acudienteIdParentesco == $madre && $madreIdTipoUsuario == $acudiente) || /* La madre es el acudiente  */
                    ($acudienteIdParentesco == $padre && $padreIdTipoUsuario == $acudiente))  /* El padre es el acudiente */
                {
                    /* Se actualiza los datos de la madre */
                   if($madreIdDocumento != "")
                   {
                        $sql_Madre = $this->procesarUpUsuario($madreIdDocumento,
                                                              $madreDocumento,
                                                              $madreIdTipoDocumento,
                                                              $madreIdUsuario,
                                                              $madreIdTipoUsuario,
                                                              $madre,
                                                              $madreNombres,
                                                              $madrePrimerApellido,
                                                              $madreSegundoApellido,
                                                              $valor_df,
                                                              $madreEdad,
                                                              $valor_df,
                                                              $valor_df,
                                                              $madreIdEscolaridad,
                                                              $madreOcupacion,
                                                              $valor_df,
                                                              $valor_df,
                                                              $madreDireccion,
                                                              $madreTelefonoFijo,
                                                              $madreTelefonoCelular,
                                                              $madreEmail);
                        if ($sql_Madre)
                        {
                            /* Se acutualizan los datos del padre */
                            if ($padreIdUsuario != "")
                            {
                                $sql_upPadre = $this->procesarUpUsuario($padreIdDocumento,
                                                                        $padreDocumento,
                                                                        $padreIdTipoDocumento,
                                                                        $padreIdUsuario,
                                                                        $padreIdTipoUsuario,
                                                                        $padre,
                                                                        $padreNombres,
                                                                        $padrePrimerApellido,
                                                                        $padreSegundoApellido,
                                                                        $valor_df,
                                                                        $padreEdad,
                                                                        $valor_df,
                                                                        $valor_df,
                                                                        $padreIdEscolaridad,
                                                                        $padreOcupacion,
                                                                        $valor_df,
                                                                        $valor_df,
                                                                        $padreDireccion,
                                                                        $padreTelefonoFijo,
                                                                        $padreTelefonoCelular,
                                                                        $padreEmail);
                               if ($sql_upPadre == false)
                               {
                                   return false;
                               }
                            }else
                                {
                                    /* Se guardan los datos de la padre y la afinidad con el paciente */
                                    $sql_Padre = $this->procesarInsUsuario($padreDocumento,
                                                                            $padreIdTipoDocumento,
                                                                            $pacienteIdUsuario,
                                                                            $padreIdTipoUsuario,
                                                                            $estado_inactivo,
                                                                            $padre,
                                                                            $padreNombres,
                                                                            $padrePrimerApellido,
                                                                            $padreSegundoApellido,
                                                                            $valor_df,
                                                                            $padreEdad,
                                                                            $valor_df,
                                                                            $valor_df,
                                                                            $padreIdEscolaridad,
                                                                            $padreOcupacion,
                                                                            $valor_df,
                                                                            $valor_df,
                                                                            $padreDireccion,
                                                                            $padreTelefonoFijo,
                                                                            $padreTelefonoCelular,
                                                                            $padreEmail);
                                    if ($sql_Padre == $error)
                                    {
                                        return false;
                                    }
                            }
                        }else
                            {
                            return false;
                        }
                    }else
                        {
                            /* Se guardan los datos de la madre y la afinidad con el paciente */
                            $sql_Madre = $this->procesarInsUsuario($madreDocumento,
                                                                   $madreIdTipoDocumento,
                                                                   $pacienteIdUsuario,
                                                                   $idtipousuario,
                                                                   $estado_inactivo,
                                                                   $madre,
                                                                   $madreNombres,
                                                                   $madrePrimerApellido,
                                                                   $madreSegundoApellido,
                                                                   $valor_df,
                                                                   $madreEdad,
                                                                   $valor_df,
                                                                   $valor_df,
                                                                   $madreIdEscolaridad,
                                                                   $madreOcupacion,
                                                                   $valor_df,
                                                                   $valor_df,
                                                                   $madreDireccion,
                                                                   $madreTelefonoFijo,
                                                                   $madreTelefonoCelular,
                                                                   $madreEmail);
                          if ($sql_Madre == $exito)
                          {
                              /* Se actualizan los datos del padre */
                              if ($padreIdDocumento != "")
                              {
                                  $sql_upPadre = $this->procesarUpUsuario($padreIdDocumento,
                                                                          $padreDocumento,
                                                                          $padreIdTipoDocumento,
                                                                          $padreIdUsuario,
                                                                          $padreIdTipoUsuario,
                                                                          $padre,
                                                                          $padreNombres,
                                                                          $padrePrimerApellido,
                                                                          $padreSegundoApellido,
                                                                          $valor_df,
                                                                          $padreEdad,
                                                                          $valor_df,
                                                                          $valor_df,
                                                                          $padreIdEscolaridad,
                                                                          $padreOcupacion,
                                                                          $valor_df,
                                                                          $valor_df,
                                                                          $padreDireccion,
                                                                          $padreTelefonoFijo,
                                                                          $padreTelefonoCelular,
                                                                          $padreEmail);
                                  if ($sql_upPadre == false)
                                  {
                                      return false;
                                  }
                              }else
                              {
                                  /**
                                   *   Se guardan los datos del padre y la afinidad con el paciente
                                   */
                                  $sql_insPadre = $this->procesarInsUsuario($padreDocumento,
                                                                            $padreIdTipoDocumento,
                                                                            $pacienteIdUsuario,
                                                                            $idtipousuario,
                                                                            $estado_inactivo,
                                                                            $padre,
                                                                            $padreNombres,
                                                                            $padrePrimerApellido,
                                                                            $padreSegundoApellido,
                                                                            $valor_df,
                                                                            $padreEdad,
                                                                            $valor_df,
                                                                            $valor_df,
                                                                            $padreIdEscolaridad,
                                                                            $padreOcupacion,
                                                                            $valor_df,
                                                                            $valor_df,
                                                                            $padreDireccion,
                                                                            $padreTelefonoFijo,
                                                                            $padreTelefonoCelular,
                                                                            $padreEmail);
                                  if($sql_insPadre == $error)
                                  {
                                      return false;
                                  }
                              }
                          }else
                              {
                              return false;
                          }
                    }

                    /**
                    * El acudiente era el padre y ahora va a ser la madre
                     */
                }elseif(($acudienteIdParentesco == $madre && $madreIdTipoUsuario == $pariente) &&
                    ($padreIdTipoUsuario == $acudiente))
                {
                    /* Se actualizan los datos de la madre */
                    if ($madreIdUsuario  != "")
                    {
                        $sql_upMadre = $this->procesarUpUsuario($madreIdDocumento,
                                                                $madreDocumento,
                                                                $madreIdTipoDocumento,
                                                                $madreIdUsuario,
                                                                $acudiente,
                                                                $madre,
                                                                $madreNombres,
                                                                $madrePrimerApellido,
                                                                $madreSegundoApellido,
                                                                $valor_df,
                                                                $madreEdad,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreIdEscolaridad,
                                                                $madreOcupacion,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreDireccion,
                                                                $madreTelefonoFijo,
                                                                $madreTelefonoCelular,
                                                                $madreEmail);
                        if ($sql_upMadre)
                        {
                            /* Se actualizan los datos del Padre */
                            if ($padreIdUsuario != "")
                            {
                                $sql_upPadre = $this->procesarUpUsuario($padreIdDocumento,
                                                                        $padreDocumento,
                                                                        $padreIdTipoDocumento,
                                                                        $padreIdUsuario,
                                                                        $pariente,
                                                                        $padre,
                                                                        $padreNombres,
                                                                        $padrePrimerApellido,
                                                                        $padreSegundoApellido,
                                                                        $valor_df,
                                                                        $padreEdad,
                                                                        $valor_df,
                                                                        $valor_df,
                                                                        $padreIdEscolaridad,
                                                                        $padreOcupacion,
                                                                        $valor_df,
                                                                        $valor_df,
                                                                        $padreDireccion,
                                                                        $padreTelefonoFijo,
                                                                        $padreTelefonoCelular,
                                                                        $padreEmail);
                                if($sql_upPadre == false)
                                {
                                    return false;
                                }
                            }else
                            {
                                $sql_upPadre = $this->procesarInsUsuario($padreDocumento,
                                                                         $padreIdTipoDocumento,
                                                                         $pacienteIdUsuario,
                                                                         $padreIdTipoUsuario,
                                                                         $estado_inactivo,
                                                                         $padre,
                                                                         $padreNombres,
                                                                         $padrePrimerApellido,
                                                                         $padreSegundoApellido,
                                                                         $valor_df,
                                                                         $padreEdad,
                                                                         $valor_df,
                                                                         $valor_df,
                                                                         $padreIdEscolaridad,
                                                                         $padreOcupacion,
                                                                         $valor_df,
                                                                         $valor_df,
                                                                         $padreDireccion,
                                                                         $padreTelefonoFijo,
                                                                         $padreTelefonoCelular,
                                                                         $padreEmail);
                                if ($sql_upPadre == $error)
                                {
                                    return false;
                                }
                            }
                        }
                        else
                        {
                            return false;
                        }
                    }else
                    {
                        /*Se guardan los datos de la madre y su afinidad con el pacinete */
                        $sql_upMadre = $this->procesarInsUsuario($madreDocumento,
                                                                $madreIdTipoDocumento,
                                                                $pacienteIdUsuario,
                                                                $madreIdTipoUsuario,
                                                                $estado_inactivo,
                                                                $madre,
                                                                $madreNombres,
                                                                $madrePrimerApellido,
                                                                $madreSegundoApellido,
                                                                $valor_df,
                                                                $madreEdad,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreIdEscolaridad,
                                                                $madreOcupacion,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreDireccion,
                                                                $madreTelefonoFijo,
                                                                $madreTelefonoCelular,
                                                                $madreEmail);
                        if ($sql_upMadre == $exito)
                        {
                            /* Se actualizan los datos del Padre */
                           if ($padreIdUsuario != "")
                           {
                               $sql_upPadre = $this->procesarUpUsuario($padreIdDocumento,
                                                                       $padreDocumento,
                                                                       $padreIdTipoDocumento,
                                                                       $padreIdUsuario,
                                                                       $pariente,
                                                                       $padre,
                                                                       $padreNombres,
                                                                       $padrePrimerApellido,
                                                                       $padreSegundoApellido,
                                                                       $valor_df,
                                                                       $padreEdad,
                                                                       $valor_df,
                                                                       $valor_df,
                                                                       $padreIdEscolaridad,
                                                                       $padreOcupacion,
                                                                       $valor_df,
                                                                       $valor_df,
                                                                       $padreDireccion,
                                                                       $padreTelefonoFijo,
                                                                       $padreTelefonoCelular,
                                                                       $padreEmail);
                               if($sql_upPadre == false)
                               {
                                   return false;
                               }
                           }else
                               {
                                   /* Se guardan los datos del padre junto con su afinidad con el paciente */
                                   $sql_upPadre = $this->procesarInsUsuario($padreDocumento,
                                                                           $padreIdTipoDocumento,
                                                                           $pacienteIdUsuario,
                                                                           $padreIdTipoUsuario,
                                                                           $estado_inactivo,
                                                                           $padre,
                                                                           $padreNombres,
                                                                           $padrePrimerApellido,
                                                                           $padreSegundoApellido,
                                                                           $valor_df,
                                                                           $padreEdad,
                                                                           $valor_df,
                                                                           $valor_df,
                                                                           $padreIdEscolaridad,
                                                                           $padreOcupacion,
                                                                           $valor_df,
                                                                           $valor_df,
                                                                           $padreDireccion,
                                                                           $padreTelefonoFijo,
                                                                           $padreTelefonoCelular,
                                                                           $padreEmail);
                                   if ($sql_upPadre == $error)
                                   {
                                       return false;
                                   }
                           }
                        }else
                        {
                            return false;
                        }
                    }
                /**
                 * Si el acudiente era la madre y ahora va a ser el padre
                 */
                }elseif(($acudienteIdParentesco == $padre && $padreIdTipoUsuario == $pariente)
                    && ($madreIdTipoUsuario == $acudiente) )
                {
                    /**
                     *  Se actualizan los datos del Padre
                     */
                    if ($padreIdUsuario != "")
                    {
                        $sql_upPadre = $this->procesarUpUsuario($padreIdDocumento,
                                                                $padreDocumento,
                                                                $padreIdTipoDocumento,
                                                                $padreIdUsuario,
                                                                $acudiente,
                                                                $padre,
                                                                $padreNombres,
                                                                $padrePrimerApellido,
                                                                $padreSegundoApellido,
                                                                $valor_df,
                                                                $padreEdad,
                                                                $valor_df,
                                                                $valor_df,
                                                                $padreIdEscolaridad,
                                                                $padreOcupacion,
                                                                $valor_df,
                                                                $valor_df,
                                                                $padreDireccion,
                                                                $padreTelefonoFijo,
                                                                $padreTelefonoCelular,
                                                                $padreEmail);


                    }else
                        {
                            /* Se guardan los datos del padre y su afinidad con el paciente */
                            $sql_upPadre = $this->procesarInsUsuario( $padreDocumento,
                                                                      $padreIdTipoDocumento,
                                                                      $pacienteIdUsuario,
                                                                      $padreIdTipoUsuario,
                                                                      $estado_inactivo,
                                                                      $padre,
                                                                      $padreNombres,
                                                                      $padrePrimerApellido,
                                                                      $padreSegundoApellido,
                                                                      $valor_df,
                                                                      $padreEdad,
                                                                      $valor_df,
                                                                      $valor_df,
                                                                      $padreIdEscolaridad,
                                                                      $padreOcupacion,
                                                                      $valor_df,
                                                                      $valor_df,
                                                                      $padreDireccion,
                                                                      $padreTelefonoFijo,
                                                                      $padreTelefonoCelular,
                                                                      $padreEmail);
                            if ($sql_upPadre == $exito)
                            {
                                $sql_upPadre = true;
                            }else
                            {
                                $sql_upPadre = false;
                            }
                    }

                    if($sql_upPadre)
                    {
                        /**
                         * Se actualizan los datos de la madre
                         */
                        $sql_upMadre = $this->procesarUpUsuario($madreIdDocumento,
                                                                $madreDocumento,
                                                                $madreIdTipoDocumento,
                                                                $madreIdUsuario,
                                                                $pariente,
                                                                $madre,
                                                                $madreNombres,
                                                                $madrePrimerApellido,
                                                                $madreSegundoApellido,
                                                                $valor_df,
                                                                $madreEdad,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreIdEscolaridad,
                                                                $madreOcupacion,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreDireccion,
                                                                $madreTelefonoFijo,
                                                                $madreTelefonoCelular,
                                                                $madreEmail);
                        if(!$sql_upMadre)
                        {
                            return false;
                        }
                    }else
                    {
                        return false;
                    }
                    /**
                     * Si el acudiente no era ni la madre ni el padre y ahora va ser cualquiera de los dos
                     */
                }elseif( ($acudienteIdParentesco == $madre && $madreIdTipoUsuario == $pariente) &&
                    ($padreIdTipoUsuario != $acudiente) ||
                    ($acudienteIdParentesco == $padre && $padreIdTipoUsuario == $pariente) &&
                    ($madreIdTipoUsuario != $acudiente))
                {
                    /**
                     * El acudiente va ser la madre del paciente
                     */
                    if($acudienteIdParentesco == $madre)
                    {
                        $madreIdTipoUsuario = $acudiente;
                    }
                    /**
                     * Se actualizan los datos de la madre
                     */

                    /*  Si la madre no ha sido creada aun. Se debe insertar el usuario en vez de actualizar */
                    if ($madreIdUsuario == "")
                    {
                        $sql_upMadre = $this->procesarInsUsuario($madreDocumento,
                                                  $madreIdTipoDocumento,
                                                  $pacienteIdUsuario,
                                                  $madreIdTipoUsuario,
                                                  $estado_inactivo,
                                                  $madre,
                                                  $madreNombres,
                                                  $madrePrimerApellido,
                                                  $madreSegundoApellido,
                                                  $valor_df,
                                                  $madreEdad,
                                                  $valor_df,
                                                  $valor_df,
                                                  $madreIdEscolaridad,
                                                  $madreOcupacion,
                                                  $valor_df,
                                                  $valor_df,
                                                  $madreDireccion,
                                                  $madreTelefonoFijo,
                                                  $madreTelefonoCelular,
                                                  $madreEmail);
                        if ($sql_upMadre == $exito)
                        {
                            $sql_upMadre = true;
                        }else
                            {
                            $sql_upMadre = false;
                        }

                    }else
                        {
                         /* Se actualizan los datos de  la madre */
                        $sql_upMadre = $this->procesarUpUsuario($madreIdDocumento,
                                                                $madreDocumento,
                                                                $madreIdTipoDocumento,
                                                                $madreIdUsuario,
                                                                $madreIdTipoUsuario,
                                                                $madre,
                                                                $madreNombres,
                                                                $madrePrimerApellido,
                                                                $madreSegundoApellido,
                                                                $valor_df,
                                                                $madreEdad,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreIdEscolaridad,
                                                                $madreOcupacion,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreDireccion,
                                                                $madreTelefonoFijo,
                                                                $madreTelefonoCelular,
                                                                $madreEmail);
                    }
                    if($sql_upMadre)
                    {
                        /**
                         * Se valida si el acudiente era el padre del paciente
                         */
                        if($acudienteIdParentesco == $padre)
                        {
                            $padreIdTipoUsuario = $acudiente;
                        }

                        // Si el padre no existe se debe crear en vez de actualizar
                       if ($padreIdUsuario == "")
                       {
                           $sql_upPadre = $this->procesarInsUsuario($padreDocumento,
                                                                   $padreIdTipoDocumento,
                                                                   $pacienteIdUsuario,
                                                                   $padreIdTipoUsuario,
                                                                   $estado_inactivo,
                                                                   $padre,
                                                                   $padreNombres,
                                                                   $padrePrimerApellido,
                                                                   $padreSegundoApellido,
                                                                   $valor_df,
                                                                   $padreEdad,
                                                                   $valor_df,
                                                                   $valor_df,
                                                                   $padreIdEscolaridad,
                                                                   $padreOcupacion,
                                                                   $valor_df,
                                                                   $valor_df,
                                                                   $padreDireccion,
                                                                   $padreTelefonoFijo,
                                                                   $padreTelefonoCelular,
                                                                   $padreEmail);
                           if ($sql_upPadre == $exito)
                           {
                               $sql_upPadre = true;
                           }else
                           {
                               $sql_upPadre = false;
                           }
                       } else
                       {
                           /**
                            *  Se actualizan los datos del Padre
                            */
                           $sql_upPadre = $this->procesarUpUsuario($padreIdDocumento,
                                                                   $padreDocumento,
                                                                   $padreIdTipoDocumento,
                                                                   $padreIdUsuario,
                                                                   $padreIdTipoUsuario,
                                                                   $padre,
                                                                   $padreNombres,
                                                                   $padrePrimerApellido,
                                                                   $padreSegundoApellido,
                                                                   $valor_df,
                                                                   $padreEdad,
                                                                   $valor_df,
                                                                   $valor_df,
                                                                   $padreIdEscolaridad,
                                                                   $padreOcupacion,
                                                                   $valor_df,
                                                                   $valor_df,
                                                                   $padreDireccion,
                                                                   $padreTelefonoFijo,
                                                                   $padreTelefonoCelular,
                                                                   $padreEmail);
                       }

                        if($sql_upPadre)
                        {

                            /**
                             *  Se actualizan los datos de la Acudiente que deja de serlo
                             */
                            $sql_upAcudiente = $this->procesarUpUsuario($acudienteIdDocumento,
                                                                        $acudienteDocumento,
                                                                        $acudienteIdTipoDocumento,
                                                                        $acudienteIdUsuario,
                                                                        $pariente,
                                                                        $acudienteIdParentesco,
                                                                        $acudienteNombres,
                                                                        $acudientePrimerApellido,
                                                                        $acudienteSegundoApellido,
                                                                        $valor_df,
                                                                        $acudienteEdad,
                                                                        $valor_df,
                                                                        $valor_df,
                                                                        $acudienteIdEscolaridad,
                                                                        $acudienteOcupacion,
                                                                        $valor_df,
                                                                        $valor_df,
                                                                        $acudienteDireccion,
                                                                        $acudienteTelefonoFijo,
                                                                        $acudienteTelefonoCelular,
                                                                        $acudienteEmail);
                            if(!$sql_upAcudiente)
                            {
                                return false;
                            }
                        }else
                        {
                            return false;
                        }
                    }else
                    {
                        return false;
                    }
                    /**
                     * Si el acudiente no es ni la Madre ni el Padre ni tampoco van a serlo
                     */
                }elseif($acudienteIdParentesco != $madre && $acudienteIdParentesco != $padre)
                {
                    /*  Si la madre no ha sido creada aun. Se debe insertar el usuario en vez de actualizar */
                    if ($madreIdUsuario == "")
                    {
                        $sql_upMadre = $this->procesarInsUsuario($madreDocumento,
                                                                $madreIdTipoDocumento,
                                                                $pacienteIdUsuario,
                                                                $madreIdTipoUsuario,
                                                                $estado_inactivo,
                                                                $madre,
                                                                $madreNombres,
                                                                $madrePrimerApellido,
                                                                $madreSegundoApellido,
                                                                $valor_df,
                                                                $madreEdad,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreIdEscolaridad,
                                                                $madreOcupacion,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreDireccion,
                                                                $madreTelefonoFijo,
                                                                $madreTelefonoCelular,
                                                                $madreEmail);
                        if ($sql_upMadre == $exito)
                        {
                            $sql_upMadre = true;
                        }else
                        {
                            $sql_upMadre = false;
                        }

                    }else
                    {
                        /**
                         * Se actualizan los datos de la madre
                         */
                        $sql_upMadre = $this->procesarUpUsuario($madreIdDocumento,
                                                                $madreDocumento,
                                                                $madreIdTipoDocumento,
                                                                $madreIdUsuario,
                                                                $madreIdTipoUsuario,
                                                                $madre,
                                                                $madreNombres,
                                                                $madrePrimerApellido,
                                                                $madreSegundoApellido,
                                                                $valor_df,
                                                                $madreEdad,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreIdEscolaridad,
                                                                $madreOcupacion,
                                                                $valor_df,
                                                                $valor_df,
                                                                $madreDireccion,
                                                                $madreTelefonoFijo,
                                                                $madreTelefonoCelular,
                                                                $madreEmail);
                    }
                    if($sql_upMadre)
                    {
                        // Si el padre no existe se debe crear en vez de actualizar
                        if ($padreIdUsuario == "")
                        {
                            $sql_upPadre = $this->procesarInsUsuario($padreDocumento,
                                                                     $padreIdTipoDocumento,
                                                                     $pacienteIdUsuario,
                                                                     $padreIdTipoUsuario,
                                                                     $estado_inactivo,
                                                                     $padre,
                                                                     $padreNombres,
                                                                     $padrePrimerApellido,
                                                                     $padreSegundoApellido,
                                                                     $valor_df,
                                                                     $padreEdad,
                                                                     $valor_df,
                                                                     $valor_df,
                                                                     $padreIdEscolaridad,
                                                                     $padreOcupacion,
                                                                     $valor_df,
                                                                     $valor_df,
                                                                     $padreDireccion,
                                                                     $padreTelefonoFijo,
                                                                     $padreTelefonoCelular,
                                                                     $padreEmail);
                            if ($sql_upPadre == $exito)
                            {
                                $sql_upPadre = true;
                            }else
                            {
                                $sql_upPadre = false;
                            }
                        }else
                        {
                            /**
                             *  Se actualizan los datos del Padre
                             */
                            $sql_upPadre = $this->procesarUpUsuario($padreIdDocumento,
                                                                    $padreDocumento,
                                                                    $padreIdTipoDocumento,
                                                                    $padreIdUsuario,
                                                                    $padreIdTipoUsuario,
                                                                    $padre,
                                                                    $padreNombres,
                                                                    $padrePrimerApellido,
                                                                    $padreSegundoApellido,
                                                                    $valor_df,
                                                                    $padreEdad,
                                                                    $valor_df,
                                                                    $valor_df,
                                                                    $padreIdEscolaridad,
                                                                    $padreOcupacion,
                                                                    $valor_df,
                                                                    $valor_df,
                                                                    $padreDireccion,
                                                                    $padreTelefonoFijo,
                                                                    $padreTelefonoCelular,
                                                                    $padreEmail);
                        }

                        if($sql_upPadre)
                        {
                            /**
                             *  Se actualizan los datos de la Acudiente
                             */
                            $sql_upAcudiente = $this->procesarUpUsuario($acudienteIdDocumento,
                                                                        $acudienteDocumento,
                                                                        $acudienteIdTipoDocumento,
                                                                        $acudienteIdUsuario,
                                                                        $acudienteIdTipoUsuario,
                                                                        $acudienteIdParentesco,
                                                                        $acudienteNombres,
                                                                        $acudientePrimerApellido,
                                                                        $acudienteSegundoApellido,
                                                                        $valor_df,
                                                                        $acudienteEdad,
                                                                        $valor_df,
                                                                        $valor_df,
                                                                        $acudienteIdEscolaridad,
                                                                        $acudienteOcupacion,
                                                                        $valor_df,
                                                                        $valor_df,
                                                                        $acudienteDireccion,
                                                                        $acudienteTelefonoFijo,
                                                                        $acudienteTelefonoCelular,
                                                                        $acudienteEmail);
                            if(!$sql_upAcudiente)
                            {
                                return false;
                            }
                        }
                    }
                }

                /**
                 * Se actualiza la Cita de Informacion
                 */
                $sql_upCitaInformacion = $this->actualizarCita($cita_informacion,
                                                               $idcita,
                                                               $fechaCitaIni,
                                                               $valor_df,
                                                               $valor_df,
                                                               $motivoConsulta,
                                                               $expectativas,
                                                               $recomTenerCta,
                                                               $inFoGral,
                                                               $idusuario);
                if($sql_upCitaInformacion)
                {
                    //se convierte a cita de información
                    $query_upCita = "UPDATE cita
                                    SET tipocita_idtipocita = $cita_informacion
                                    WHERE usuario_idusuario = $pacienteIdUsuario";
                    
                    $sql_upCita = mysqli_query($this->db->connect(),$query_upCita);
                    
                    if($sql_upCita){
                        return true;
                    }else{
                        return false;
                    }
                    
                    
                }else
                {
                    return false;
                }
            }else
            {
                return false;
            }
        }else
        {
            return false;
        }
    }
  
  public function insertarUsuario(  $usarioIdTipoDocumento,
                                	$documento,
                                	$usuarioNombres,
                                	$usuarioPrimerApellido,
                                	$usuarioSegundoApellido,
                                    $usuarioLugarNacimiento,
                                    $usuarioFechaNacimiento,
                                    $usuarioEdad,
                                    $idGenero,
                                    $usuarioDireccion,
                                    $usuarioTelefonoFijo,
                                    $usuarioTelefonoCelular,
                                    $usuarioEmail,
                                	$usuarioIdEscolaridad,
                                	$usuarioArea,
                                    $universidad,
                                    $tarjetaprofesional,
                                    $registro,
                                    $nombreUsuario,
                                    $password,
                                	$roles,
                                	$imagen)
  {
      $usuarioIdEstado  = 1;
      $error            = 0;

      $sql_insDocumento = $this->insertarDocumento($documento, $usarioIdTipoDocumento);
    
      if($sql_insDocumento != $error)
      {
            $password = md5($password);

            $query_insUsuario = "INSERT INTO usuario(documento_iddocumento,
                                                     estado_idestado,
                                                     nombres, 
                                                     primerapellido, 
                                                     segundoapellido,
                                                     lugarnacimiento,
                                                     fechanacimiento,
                                                     edad, 
                                                     genero_idgenero,
                                                     direccion,
                                                     telefonofijo,
                                                     telefonocelular,
                                                     email,
                                                     escolaridad_idescolaridad,
                                                     area_idarea,
                                                     universidad,
                                                     tarjetaprofesional,
                                                     registro,
                                                     nombreusuario,
                                                     password,
                                                     tipousuario_idtipousuario, 
                                                     firmadigital)
                                              VALUES('$sql_insDocumento',
                                                     '$usuarioIdEstado',
                                                     '$usuarioNombres',
                                                     '$usuarioPrimerApellido',
                                                     '$usuarioSegundoApellido',
                                                     '$usuarioLugarNacimiento',
                                                     '$usuarioFechaNacimiento',
                                                     '$usuarioEdad',
                                                     '$idGenero',
                                                     '$usuarioDireccion',
                                                     '$usuarioTelefonoFijo',
                                                     '$usuarioTelefonoCelular',
                                                     '$usuarioEmail',
                                                     '$usuarioIdEscolaridad',
                                                     '$usuarioArea',
                                                     '$universidad',
                                                     '$tarjetaprofesional',
                                                     '$registro',
                                                     '$nombreUsuario',
                                                     '$password',
                                                     '$roles',
                                                     '$imagen')";

            $sql_insUsuario = mysqli_query($this->db->connect(),$query_insUsuario);

            if ($sql_insUsuario) {
                return true;
            }else {
                return false;
            }

      }else {
          return false;
      }

  }
  
  public function actualizarUsuario($idusuarioMod,
                                    $usarioIdTipoDocumento,
                                    $iddocumento,
                                	$documento,
                                	$usuarioNombres,
                                	$usuarioPrimerApellido,
                                	$usuarioSegundoApellido,
                                    $usuarioLugarNacimiento,
                                    $usuarioFechaNacimiento,
                                    $usuarioEdad,
                                	$idGenero,
                                    $usuarioDireccion,
                                    $usuarioTelefonoFijo,
                                    $usuarioTelefonoCelular,
                                    $usuarioEmail,
                                	$usuarioIdEscolaridad,
                                	$usuarioArea,
                                    $universidad,
                                    $tarjetaprofesional,
                                	$registro,
                                    $nombreUsuario,
                                    $password,
                                	$roles,
                                	$imagen)
    {
                                	    
        $this->actualizarDocumento($iddocumento, $documento, $usarioIdTipoDocumento);
        
        /*$idEscolaridad = validarEscolaridad($usuarioIdEscolaridad);
        $usuarioIdEscolaridad = $idEscolaridad;*/
      if ($password != '')
      {
          $password = md5($password);

          if ($imagen != '') 
          {
              $query_UPUsuario = "UPDATE usuario
                        SET nombres                     = '$usuarioNombres',
                            primerapellido              = '$usuarioPrimerApellido',
                            segundoapellido             = '$usuarioSegundoApellido',
                            lugarnacimiento             = '$usuarioLugarNacimiento',
                            fechanacimiento             = '$usuarioFechaNacimiento',
                            edad                        = '$usuarioEdad',
                            genero_idgenero             = '$idGenero',
                            direccion                   = '$usuarioDireccion',
                            telefonofijo                = '$usuarioTelefonoFijo',
                            telefonocelular             = '$usuarioTelefonoCelular',
                            email                       = '$usuarioEmail',
                            escolaridad_idescolaridad   = '$usuarioIdEscolaridad',
                            area_idarea                 = '$usuarioArea',
                            universidad                 = '$universidad',
                            tarjetaprofesional          = '$tarjetaprofesional',
                            registro                    = '$registro',
                            nombreusuario               = '$nombreUsuario',
                            password                    = '$password',
                            tipousuario_idtipousuario   = '$roles',
                            firmadigital                = '$imagen'
                        WHERE idusuario = '$idusuarioMod'";
          } else 
              {
                  $query_UPUsuario = "UPDATE usuario
                            SET nombres                     = '$usuarioNombres',
                                primerapellido              = '$usuarioPrimerApellido',
                                segundoapellido             = '$usuarioSegundoApellido',
                                lugarnacimiento             = '$usuarioLugarNacimiento',
                                fechanacimiento             = '$usuarioFechaNacimiento',
                                edad                        = '$usuarioEdad',
                                genero_idgenero             = '$idGenero',
                                direccion                   = '$usuarioDireccion',
                                telefonofijo                = '$usuarioTelefonoFijo',
                                telefonocelular             = '$usuarioTelefonoCelular',
                                email                       = '$usuarioEmail',
                                escolaridad_idescolaridad   = '$usuarioIdEscolaridad',
                                area_idarea                 = '$usuarioArea',
                                universidad                 = '$universidad',
                                tarjetaprofesional          = '$tarjetaprofesional',
                                registro                    = '$registro',
                                nombreusuario               = '$nombreUsuario',
                                password                    = '$password',
                                tipousuario_idtipousuario   = '$roles'
                            WHERE idusuario = '$idusuarioMod'";
              }
      } else
          {
              if ($imagen != '')
              {
                  $query_UPUsuario = "UPDATE usuario
                            SET nombres                     = '$usuarioNombres',
                                primerapellido              = '$usuarioPrimerApellido',
                                segundoapellido             = '$usuarioSegundoApellido',
                                lugarnacimiento             = '$usuarioLugarNacimiento',
                                fechanacimiento             = '$usuarioFechaNacimiento',
                                edad                        = '$usuarioEdad',
                                genero_idgenero             = '$idGenero',
                                direccion                   = '$usuarioDireccion',
                                telefonofijo                = '$usuarioTelefonoFijo',
                                telefonocelular             = '$usuarioTelefonoCelular',
                                email                       = '$usuarioEmail',
                                escolaridad_idescolaridad   = '$usuarioIdEscolaridad',
                                area_idarea                 = '$usuarioArea',
                                universidad                 = '$universidad',
                                tarjetaprofesional          = '$tarjetaprofesional',
                                registro                    = '$registro',
                                nombreusuario               = '$nombreUsuario',
                                tipousuario_idtipousuario   = '$roles',
                                firmadigital                = '$imagen'
                            WHERE idusuario = '$idusuarioMod'";
              } else
                  {
                      $query_UPUsuario = "UPDATE usuario
                                    SET nombres                     = '$usuarioNombres',
                                        primerapellido              = '$usuarioPrimerApellido',
                                        segundoapellido             = '$usuarioSegundoApellido',
                                        lugarnacimiento             = '$usuarioLugarNacimiento',
                                        fechanacimiento             = '$usuarioFechaNacimiento',
                                        edad                        = '$usuarioEdad',
                                        genero_idgenero             = '$idGenero',
                                        direccion                   = '$usuarioDireccion',
                                        telefonofijo                = '$usuarioTelefonoFijo',
                                        telefonocelular             = '$usuarioTelefonoCelular',
                                        email                       = '$usuarioEmail',
                                        escolaridad_idescolaridad   = '$usuarioIdEscolaridad',
                                        area_idarea                 = '$usuarioArea',
                                        universidad                 = '$universidad',
                                        tarjetaprofesional          = '$tarjetaprofesional',
                                        registro                    = '$registro',
                                        nombreusuario               = '$nombreUsuario',
                                        tipousuario_idtipousuario   = '$roles'
                                    WHERE idusuario = '$idusuarioMod'";
                  }
          }
          
          $sql_UPUsuario = mysqli_query($this->db->connect(), $query_UPUsuario);

          if ($sql_UPUsuario) {
              return true;
          } else {
              return false;
          }
 }
  
  public function eliminarUsuario($idusuario){          
    
  $query_DELUsuario = "UPDATE usuario
                        SET estado_idestado = 2
                        WHERE idusuario = $idusuario";

    $sql_DELUsuario = mysqli_query($this->db->connect(),$query_DELUsuario);
    
    if ($sql_DELUsuario) {
        return true;
    }else {
        return false;
    }
  }
  
  
  public function adminCargarUsuarioMod($idusuario){
  
    $query_adminUsuarioMod= "SELECT *
                                    ,t.tipo tipo
                                    ,tu.tipo tipousuario
                            FROM usuario u, documento d, tipodocumento t, genero g, escolaridad e, area a, tipousuario tu
                            WHERE idusuario = $idusuario
                            AND u.documento_iddocumento = d.iddocumento
                            AND d.tipodocumento_idtipodocumento = t.idtipodocumento
                            AND g.idgenero = u.genero_idgenero
                            AND u.escolaridad_idescolaridad = e.idescolaridad
                            AND u.area_idarea = a.idarea
                            AND u.tipousuario_idtipousuario = tu.idtipousuario";
    
    $sql_adminUsuarioMod = mysqli_query( $this->db->connect(), $query_adminUsuarioMod );
    
    $nro_adminUsuarioMod = mysqli_num_rows($sql_adminUsuarioMod);
    
    if( $nro_adminUsuarioMod > 0 ) 
    {               
        while ( $row_adminUsuarioMod = mysqli_fetch_assoc( $sql_adminUsuarioMod) ) 
        {
            $arreglo_adminUsuarioMod[]= $row_adminUsuarioMod;
        }
        return $arreglo_adminUsuarioMod;
    }else{
        return false;
    } 
    
  }



public function adminCargarTipoDocumento(){
  
    $query_admintipodoc= "SELECT *
                            FROM tipodocumento";
    
    $sql_admintipodoc = mysqli_query( $this->db->connect(), $query_admintipodoc );
    
    $nro_admintipodoc = mysqli_num_rows($sql_admintipodoc);
    
    if( $nro_admintipodoc > 0 ) 
    {               
        while ( $row_admintipodoc = mysqli_fetch_assoc( $sql_admintipodoc) ) 
        {
            $arreglo_admintipodoc[]= $row_admintipodoc;
        }
        return $arreglo_admintipodoc;
    }else{
        return false;
    } 
    
  }

public function adminCargarSexo(){
  
    $query_adminSexo= "SELECT *
                            FROM genero";
    
    $sql_adminSexo = mysqli_query( $this->db->connect(), $query_adminSexo );
    
    $nro_adminSexo = mysqli_num_rows($sql_adminSexo);
    
    if( $nro_adminSexo > 0 ) 
    {               
        while ( $row_adminSexo = mysqli_fetch_assoc( $sql_adminSexo) ) 
        {
            $arreglo_adminSexo[]= $row_adminSexo;
        }
        return $arreglo_adminSexo;
    }else{
        return false;
    } 
    
  }
  
  public function adminCargarEscolaridad(){
  
    $query_adminEscolaridad= "SELECT *
                            FROM escolaridad";
    
    $sql_adminEscolaridad = mysqli_query( $this->db->connect(), $query_adminEscolaridad );
    
    $nro_adminEscolaridad = mysqli_num_rows($sql_adminEscolaridad);
    
    if( $nro_adminEscolaridad > 0 ) 
    {               
        while ( $row_adminEscolaridad = mysqli_fetch_assoc( $sql_adminEscolaridad) ) 
        {
            $arreglo_adminEscolaridad[]= $row_adminEscolaridad;
        }
        return $arreglo_adminEscolaridad;
    }else{
        return false;
    } 
    
  }
  
  
  public function adminCargarEPS(){
  
    $query_adminEPS= "SELECT *
                            FROM eps";
    
    $sql_adminEPS = mysqli_query( $this->db->connect(), $query_adminEPS );
    
    $nro_adminEPS = mysqli_num_rows($sql_adminEPS);
    
    if( $nro_adminEPS > 0 ) 
    {               
        while ( $row_adminEPS = mysqli_fetch_assoc( $sql_adminEPS) ) 
        {
            $arreglo_adminEPS[]= $row_adminEPS;
        }
        return $arreglo_adminEPS;
    }else{
        return false;
    } 
    
  }
  
  public function adminCargarParentesco(){
  
    $query_adminParentesco= "SELECT *
                            FROM parentesco";
    
    $sql_adminParentesco = mysqli_query( $this->db->connect(), $query_adminParentesco );
    
    $nro_adminParentesco = mysqli_num_rows($sql_adminParentesco);
    
    if( $nro_adminParentesco > 0 ) 
    {               
        while ( $row_adminParentesco = mysqli_fetch_assoc( $sql_adminParentesco) ) 
        {
            $arreglo_adminParentesco[]= $row_adminParentesco;
        }
        return $arreglo_adminParentesco;
    }else{
        return false;
    } 
    
  }
  



public function cargarListadoAgenda() {

    $tipocita_idtipocita       = 1; // Agenda
    $tipousuario_idtipousuario = 5; // Acudiente
    $estado_idestado           = 3; // Pendiente

        $query_listadoAgenda = "SELECT
                                    cita.tipocita_idtipocita,
                                    cita.idcita,
                                    cita.fechacitaini,
                                    hora.hora,
                                    paciente.idusuario,
                                    paciente.nombres,
                                    paciente.primerapellido,
                                    acudiente.telefonofijo,
                                    acudiente.telefonocelular
                                FROM
                                  usuario paciente
                                    INNER JOIN
                                        afinidad
                                        ON (
                                            afinidad.usuario_idusuario=paciente.idusuario
                                        )
                                    INNER JOIN
                                        usuario acudiente
                                            ON (
                                                afinidad.idfamiliar=acudiente.idusuario
                                            )
                                    INNER JOIN
                                        cita
                                            ON (
                                                cita.usuario_idusuario=paciente.idusuario
                                            )
                                   LEFT OUTER JOIN
                                        hora
                                            ON cita.hora_idhora=hora.idhora
                                            AND cita.hora_tipohora_idtipohora=hora.tipohora_idtipohora
                                    WHERE
                                        cita.tipocita_idtipocita='$tipocita_idtipocita'
                                        AND cita.estado_idestado='$estado_idestado'
                                        AND acudiente.tipousuario_idtipousuario='$tipousuario_idtipousuario'
                                    ORDER BY
                                        cita.fechacitaini ASC ,
                                        hora.idhora ASC ;";

        $sql_listadoAgenda = mysqli_query( $this->db->connect(), $query_listadoAgenda );

        $nro_listadoAgenda = mysqli_num_rows($sql_listadoAgenda);

        if( $nro_listadoAgenda > 0 )
        {
            while ( $row_listadoAgenda = mysqli_fetch_assoc( $sql_listadoAgenda ) )
            {
                $arreglo_listadoAgenda[]= $row_listadoAgenda;
            }
            return $arreglo_listadoAgenda;
        }else
        {
            return false;
        }
        $this->db->close();
    }

    public function cargarListadoCitasInformacion() {

      $tipoCita  = 2; // Cita Informacion
      $paciente  = 3;
      $acudiente = 5;
      $estado    = 3; // Pendiente
      
      $query_listadoCitaInformacion = "SELECT
                                          cita.tipocita_idtipocita,
                                          cita.idcita,
                                          documento.documento,
                                          paciente.idusuario,
                                          paciente.nombres,
                                          paciente.primerapellido,
                                          eps.razonsocial,
                                          escolaridad.escolaridad,
                                          acudiente.telefonocelular
                                        FROM
                                          usuario paciente
                                          INNER JOIN
                                          afinidad
                                            ON (
                                            afinidad.usuario_idusuario=paciente.idusuario
                                            )
                                          INNER JOIN
                                          usuario acudiente
                                            ON (
                                            afinidad.idfamiliar=acudiente.idusuario
                                            )
                                          INNER JOIN
                                          documento
                                            ON (
                                            documento.iddocumento=paciente.documento_iddocumento
                                            )
                                          INNER JOIN
                                          cita
                                            ON (
                                            cita.usuario_idusuario=paciente.idusuario
                                            )
                                          INNER JOIN
                                          eps
                                            ON (
                                            eps.ideps=paciente.eps_ideps
                                            )
                                          INNER JOIN
                                          escolaridad
                                            ON (
                                            escolaridad.idescolaridad=paciente.escolaridad_idescolaridad
                                            )
                                        WHERE
                                          cita.tipocita_idtipocita='$tipoCita'
                                          AND cita.estado_idestado='$estado'
                                          AND paciente.tipousuario_idtipousuario='$paciente'
                                          AND acudiente.tipousuario_idtipousuario='$acudiente'
                                        ORDER BY
                                          cita.idcita ASC;";

      $sql_listadoCitaInformacion = mysqli_query( $this->db->connect(), $query_listadoCitaInformacion );

      $nro_listadoCitaInformacion = mysqli_num_rows($sql_listadoCitaInformacion);

      if( $nro_listadoCitaInformacion > 0 )
      {
          while ( $row_listadoCitaInformacion = mysqli_fetch_assoc( $sql_listadoCitaInformacion ) )
          {
              $arreglo_listadoCitaInformacion[]= $row_listadoCitaInformacion;
          }
          return $arreglo_listadoCitaInformacion;
      }else
      {
          return false;
      }
      $this->db->close();

     }

    public function cancelarCita($idcita) {

        $idestado = 4; // Estado cancelado

        $query_cita = "UPDATE cita
                        SET estado_idestado  = $idestado
                        WHERE idcita = '$idcita'";

        $sql_cita = mysqli_query($this->db->connect(),$query_cita);

        if ($sql_cita)
        {
            return true;
        }else
        {
            return false;
        }

    }


public function cargarListadoEvaluacion($area) {

      $tipoCita  = 2; // Cita Informacion
      $acudiente = 5;
      
      $query_listadoHistoria = "SELECT ct.tipocita_idtipocita
                                        	  ,ct.idcita
                                              ,doc.documento
                                        	  ,pac.idusuario
                                        	  ,pac.nombres
                                        	  ,pac.primerapellido
                                        	  ,eps.razonsocial
                                        	  ,esc.escolaridad
                                        	  ,acu.telefonocelular
                                              ,(SELECT CONCAT(tera.nombres,' ',tera.primerapellido ) 
                                        	    FROM usuario tera
                                        		WHERE prog.usuario_idusuario2 = tera.idusuario
                                        		AND prog.area_idarea = tera.area_idarea
                                        		GROUP BY tera.idusuario) terapeuta
                                        FROM usuario pac
                                        	 ,cita ct
                                        	 ,documento doc
                                             ,eps
                                             ,escolaridad esc
                                             ,usuario acu
                                             ,afinidad afd
                                             ,programacion prog
                                        WHERE  pac.documento_iddocumento  = doc.iddocumento 
                                        AND pac.idusuario 		          = afd.usuario_idusuario
                                        AND pac.idusuario                 = ct.usuario_idusuario
                                        AND ct.tipocita_idtipocita        = $tipoCita
                                        AND afd.idfamiliar 			 	  = acu.idusuario
                                        AND acu.tipousuario_idtipousuario = $acudiente
                                        AND pac.eps_ideps                 = eps.ideps
                                        AND pac.escolaridad_idescolaridad = esc.idescolaridad
                                        AND pac.idusuario                 = prog.usuario_idusuario
                                        AND prog.area_idarea              = $area
                                        GROUP BY pac.idusuario";

      $sql_listadoHistoria = mysqli_query( $this->db->connect(), $query_listadoHistoria );

      $nro_listadoHistoria = mysqli_num_rows($sql_listadoHistoria);

      if( $nro_listadoHistoria > 0 )
      {
          while ( $row_listadoHistoria = mysqli_fetch_assoc( $sql_listadoHistoria ) )
          {
              $arreglo_listadoHistoria[]= $row_listadoHistoria;
          }
          return $arreglo_listadoHistoria;
      }else
      {
          return false;
      }
      $this->db->close();

     }

  public function adminCargarProgramacion($idpaciente) {
        $acudiente = 5;
        $query_programacion = "SELECT pac.fechanacimiento fchnacpr
                                     ,CONCAT(pac.nombres, ' ', pac.primerapellido, ' ', IFNULL(pac.segundoapellido, ' ')) nompachrini
                                     ,pac.edad edhrfin
                                     ,pac.meses meses 
                                     ,CONCAT(doc.documento,' - ', tipdoc.tipo) doclugar
                                     ,CONCAT(acu.nombres,' ', acu.primerapellido, ' - ', par.parentesco ) acuobs
                                     ,pac.direccion dirnomtera
                                     ,CONCAT(IFNULL(acu.telefonofijo,' '), ' - ', 'Celular', ' ', IFNULL(acu.telefonocelular, ' ')) telarea
                                     ,eps.razonsocial epsnomterapr
                                     ,'' datosteraprog
                                     ,'' firmateraprog
                                FROM  usuario       pac
                                     ,tipodocumento tipdoc
                                     ,documento     doc
                                     ,usuario       acu
                                     ,parentesco    par
                                     ,afinidad      afd
                                     ,eps
                                WHERE pac.idusuario                       = $idpaciente
                                  AND   pac.documento_iddocumento         = doc.iddocumento
                                  AND   doc.tipodocumento_idtipodocumento = tipdoc.idtipodocumento
                                  AND   pac.idusuario                     = afd.usuario_idusuario
                                  AND   acu.idusuario                     = afd.idfamiliar
                                  AND   acu.parentesco_idparentesco       = par.idparentesco
                                  AND   acu.tipousuario_idtipousuario     = $acudiente
                                  AND   pac.eps_ideps                     = eps.ideps
                            UNION
                                SELECT  prog.fecha fchprnac
                                        ,prog.horaini nompachrini
                                        ,prog.horafin edhrfin
                                        ,'' meses
                                        ,prog.lugarevaluacion doclugar
                                        ,prog.observacion acuobs
                                        ,(SELECT CONCAT(tera.nombres,' ',tera.primerapellido)
                                         FROM usuario tera
                                         WHERE  tera.idusuario = prog.usuario_idusuario2) dirnomtera
                                        ,IFNULL((SELECT artera.area
                                                 FROM  area artera
                                                      ,usuario tera
                                                 WHERE artera.idarea = tera.area_idarea
                                                 AND tera.idusuario = prog.usuario_idusuario2 ) ,
                                                (SELECT a.area
                                                 FROM area a
                                                 WHERE a.idarea = prog.area_idarea)) telarea
                                        ,(SELECT CONCAT(teraprog.nombres, ' ', teraprog.primerapellido, IFNULL(teraprog.segundoapellido, ' '))
                                          FROM usuario teraprog
                                          WHERE teraprog.idusuario = prog.usuario_idusuario1) epsnomterapr
                                        ,(SELECT CONCAT(arterpr.area, ', ', 'T.P # ', teraprog.tarjetaprofesional, 'Reg. #', IFNULL(teraprog.registro, ' '))
                                          FROM area arterpr
                                              ,usuario teraprog
                                          WHERE arterpr.idarea = teraprog.area_idarea
                                             AND teraprog.idusuario = prog.usuario_idusuario1) datosteraprog
                                        ,(SELECT teraprog.firmadigital
                                          FROM usuario teraprog
                                          WHERE teraprog.idusuario = prog.usuario_idusuario1) firmateraprog
                                FROM programacion prog
                                WHERE prog.usuario_idusuario = $idpaciente;";

      $sql_programacion = mysqli_query( $this->db->connect(), $query_programacion );
      
      $arreglo_progamacion = array();
     
      $nro_progamacion = mysqli_num_rows($sql_programacion);

      if( $nro_progamacion > 0 )
      {
          while ( $row_progamacion = mysqli_fetch_assoc( $sql_programacion) )
          {
              $arreglo_progamacion[]= $row_progamacion;
          }
          return $arreglo_progamacion;
      }else {
          return false;
      }
  }
  
    
    /****************************************************************************************************************************************************************************/
/*   														        HISTORIA CLINICA FONOAUDIOLOGIA
/*****************************************************************************************************************************************************************************/

  public function crearHistoriaFono($idpaciente, $idarea, $idTerapeuta){
        
        $fecha = date("Y-m-d");
        
        $query_crearHistoriaFono = "INSERT INTO historiaclinica (area_idarea,usuario_idusuario,usuario_idusuario1,fechacreacion)
                                VALUES  ('$idarea','$idpaciente','$idTerapeuta','$fecha')";

        $sql_crearHistoriaFono = mysqli_query($this->db->connect(),$query_crearHistoriaFono);
        
        if($sql_crearHistoriaFono){
            
            $resultlast = mysqli_query($this->db->connect(),"SELECT MAX(idhistoriaclinica) id FROM historiaclinica");
            $rowlast = mysqli_fetch_row($resultlast);
            $idHistoria = $rowlast[0];
            
            /*******************************************************Antecedentes Familiares*****************************************************************************************/
            /**
              p_idtipoantecedente = 2
             */
            $query_insAntecedente = "INSERT INTO antecedente (tipoantecedente_idtipoantecedente, historiaclinica_idhistoriaclinica) VALUES (2, $idHistoria)";
            $sql_insAntecedente = mysqli_query($this->db->connect(),$query_insAntecedente);
            
            $query_insVivienda = "INSERT INTO vivienda (usuario_idusuario) VALUES ($idpaciente)";
            $sql_insVivienda = mysqli_query($this->db->connect(),$query_insVivienda);
            
            /*******************************************************Antecedentes Prenatales*****************************************************************************************/
            /**
              p_idtipoantecedente = 3
             */
            $query_insAntecedentePre = "INSERT INTO antecedente (tipoantecedente_idtipoantecedente, historiaclinica_idhistoriaclinica) VALUES (3, $idHistoria)";
            $sql_insAntecedentePre = mysqli_query($this->db->connect(),$query_insAntecedentePre);
            
            /*******************************************************Antecedentes Perinatal*****************************************************************************************/
            /**
              p_idtipoantecedente = 4
             */
            $query_insAntecedentePer = "INSERT INTO antecedente (tipoantecedente_idtipoantecedente, historiaclinica_idhistoriaclinica) VALUES (4, $idHistoria)";
            $sql_insAntecedentePer = mysqli_query($this->db->connect(),$query_insAntecedentePer);
            
            /*******************************************************Antecedentes Posnatales*****************************************************************************************/
            /**
              p_idtipoantecedente = 5
             */
            $query_insAntecedentePos = "INSERT INTO antecedente (tipoantecedente_idtipoantecedente, historiaclinica_idhistoriaclinica) VALUES (5, $idHistoria)";
            $sql_insAntecedentePos = mysqli_query($this->db->connect(),$query_insAntecedentePos);
            
            /************************************************************TAB DESARROLLO DEL LENGUAJE*****************************************************************************************/
            /*******************************************************Desarrollo Lenguaje *****************************************************************************************/
            /**
              p_idtipodesarrollo = 4
             */
            $query_insDlloLen = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo, historiaclinica_idhistoriaclinica) VALUES (4, $idHistoria)";
            $sql_insDlloLen = mysqli_query($this->db->connect(),$query_insDlloLen);
            
            /*******************************************************Desarrollo Ni�0�9o *****************************************************************************************/
            /**
              p_idtipodesarrollo = 9
             */
            $query_insDlloNino = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo, historiaclinica_idhistoriaclinica) VALUES (9, $idHistoria)";
            $sql_insDlloNino = mysqli_query($this->db->connect(),$query_insDlloNino);
            
            $resultlast = mysqli_query($this->db->connect(),"SELECT MAX(iddesarrollo) FROM desarrollo WHERE tipodesarrollo_idtipodesarrollo = 9 AND historiaclinica_idhistoriaclinica = $idHistoria");
            $rowlast = mysqli_fetch_row($resultlast);
            $idDesarrollo= $rowlast[0];
            
            /*
             Con el MAX(iddesarrollo)  se crean 3 registros en la tabla periodoalimentacion donde los valores de la p_idformaalimentacion son:
             p_idformaalimentacion = 1 - 2 - 3
             */
            $query_insPerAlim1 = "INSERT INTO periodoalimentacion (desarrollo_iddesarrollo,desarrollo_historia_idhistoria,formaalimentacion_idformaalimentacion) VALUES  ($idDesarrollo, $idHistoria, 1)";
            $sql_insPerAlim1 = mysqli_query($this->db->connect(),$query_insPerAlim1);
            
            $query_insPerAlim2 = "INSERT INTO periodoalimentacion (desarrollo_iddesarrollo,desarrollo_historia_idhistoria,formaalimentacion_idformaalimentacion) VALUES  ($idDesarrollo, $idHistoria, 2)";
            $sql_insPerAlim2 = mysqli_query($this->db->connect(),$query_insPerAlim2);
            
            $query_insPerAlim3 = "INSERT INTO periodoalimentacion (desarrollo_iddesarrollo,desarrollo_historia_idhistoria,formaalimentacion_idformaalimentacion) VALUES  ($idDesarrollo, $idHistoria, 3)";
            $sql_insPerAlim3 = mysqli_query($this->db->connect(),$query_insPerAlim3);
            
            /*******************************************************Desarrollo Motor *****************************************************************************************/
            /**
              p_idtipodesarrollo = 11
             */
            $query_insDlloMotor = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo, historiaclinica_idhistoriaclinica) VALUES (11, $idHistoria)";
            $sql_insDlloMotor = mysqli_query($this->db->connect(),$query_insDlloMotor);
            
            /*    Se debe obtener el ultimo id de la tabla desarrollo donde p_idtipodesarrollo=11                          */
            $resultlast = mysqli_query($this->db->connect(),"SELECT MAX(iddesarrollo) FROM desarrollo WHERE tipodesarrollo_idtipodesarrollo = 11 AND historiaclinica_idhistoriaclinica = $idHistoria");
            $rowlast = mysqli_fetch_row($resultlast);
            $idDlloMotor= $rowlast[0];
            
            /*
             Con el MAX(iddesarrollo) se crean 8 registros en la tabla motor donde los valores del p_idmovimiento son:
             p_idmovimiento = 1 - 2 - 3 - 4 -5 - 6 - 7 - 8
            
             El campo Observaciones se guarda en la tabla desarrollo en el campo obsrmotor
             */
            $query_insMotor1 = "INSERT INTO motor (desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica,movimiento_idmovimiento) VALUES ($idDlloMotor, $idHistoria, 1)";
            $sql_insMotor1 = mysqli_query($this->db->connect(),$query_insMotor1);
            
            $query_insMotor2 = "INSERT INTO motor (desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica,movimiento_idmovimiento) VALUES ($idDlloMotor, $idHistoria, 2)";
            $sql_insMotor2 = mysqli_query($this->db->connect(),$query_insMotor2);
            
            $query_insMotor3 = "INSERT INTO motor (desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica,movimiento_idmovimiento) VALUES ($idDlloMotor, $idHistoria, 3)";
            $sql_insMotor3 = mysqli_query($this->db->connect(),$query_insMotor3);
            
            $query_insMotor4 = "INSERT INTO motor (desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica,movimiento_idmovimiento) VALUES ($idDlloMotor, $idHistoria, 4)";
            $sql_insMotor4 = mysqli_query($this->db->connect(),$query_insMotor4);
            
            $query_insMotor5 = "INSERT INTO motor (desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica,movimiento_idmovimiento) VALUES ($idDlloMotor, $idHistoria, 5)";
            $sql_insMotor5 = mysqli_query($this->db->connect(),$query_insMotor5);
            
            $query_insMotor6 = "INSERT INTO motor (desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica,movimiento_idmovimiento) VALUES ($idDlloMotor, $idHistoria, 6)";
            $sql_insMotor6 = mysqli_query($this->db->connect(),$query_insMotor6);
            
            $query_insMotor7 = "INSERT INTO motor (desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica,movimiento_idmovimiento) VALUES ($idDlloMotor, $idHistoria, 7)";
            $sql_insMotor7 = mysqli_query($this->db->connect(),$query_insMotor7);
            
            $query_insMotor8 = "INSERT INTO motor (desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica,movimiento_idmovimiento) VALUES ($idDlloMotor, $idHistoria, 8)";
            $sql_insMotor8 = mysqli_query($this->db->connect(),$query_insMotor8);
            
            /*******************************************************Desarrollo Comportamiento *****************************************************************************************/

            /**
              p_idtipodesarrollo = 12
             */
            $query_insDlloComp = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo, historiaclinica_idhistoriaclinica) VALUES (12, $idHistoria)";
            $sql_insDlloComp = mysqli_query($this->db->connect(),$query_insDlloComp);
            
            /*    Se debe obtener el ultimo id de la tabla desarrollo donde p_idtipodesarrollo=12                         */
            $resultlast = mysqli_query($this->db->connect(),"SELECT MAX(iddesarrollo) FROM desarrollo WHERE tipodesarrollo_idtipodesarrollo = 12 AND historiaclinica_idhistoriaclinica = $idHistoria");
            $rowlast = mysqli_fetch_row($resultlast);
            $idDlloComp= $rowlast[0];

            /*
             Con el MAX(iddesarrollo) se crean 7 reguistros en la tabla habito donde los valores del p_idcomportamiento son:
             p_idcomportamiento = 1 - 2 - 3 - 4 -5 - 6 - 7
            
             El campo Otros se guarda en la tabla desarrollo en el campo otroscomportamientos
             */
             
            $query_insHabito1 = "INSERT INTO habito (comportamiento_idcomportamiento, desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica) VALUES (1, $idDlloComp, $idHistoria)";
            $sql_insHabito1 = mysqli_query($this->db->connect(),$query_insHabito1);
            
            $query_insHabito2 = "INSERT INTO habito (comportamiento_idcomportamiento, desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica) VALUES (2, $idDlloComp, $idHistoria)";
            $sql_insHabito2 = mysqli_query($this->db->connect(),$query_insHabito2);
            
            $query_insHabito3 = "INSERT INTO habito (comportamiento_idcomportamiento, desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica) VALUES (3, $idDlloComp, $idHistoria)";
            $sql_insHabito3 = mysqli_query($this->db->connect(),$query_insHabito3);
            
            $query_insHabito4 = "INSERT INTO habito (comportamiento_idcomportamiento, desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica) VALUES (4, $idDlloComp, $idHistoria)";
            $sql_insHabito4 = mysqli_query($this->db->connect(),$query_insHabito4);
            
            $query_insHabito5 = "INSERT INTO habito (comportamiento_idcomportamiento, desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica) VALUES (5, $idDlloComp, $idHistoria)";
            $sql_insHabito5 = mysqli_query($this->db->connect(),$query_insHabito5);
            
            $query_insHabito6 = "INSERT INTO habito (comportamiento_idcomportamiento, desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica) VALUES (6, $idDlloComp, $idHistoria)";
            $sql_insHabito6 = mysqli_query($this->db->connect(),$query_insHabito6);
            
            $query_insHabito7 = "INSERT INTO habito (comportamiento_idcomportamiento, desarrollo_iddesarrollo,desarrollo_historiaclinica_idhistoriaclinica) VALUES (7, $idDlloComp, $idHistoria)";
            $sql_insHabito7 = mysqli_query($this->db->connect(),$query_insHabito7);

            /*******************************************************Desarrollo Sue�0�9o *****************************************************************************************/
            /**
              p_idtipodesarrollo = 13
             */
            $query_insSueno = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo, historiaclinica_idhistoriaclinica) VALUES (13, $idHistoria)";
            $sql_insSueno = mysqli_query($this->db->connect(),$query_insSueno);
            
            /*******************************************************Desarrollo Conducta Personal *****************************************************************************************/

            /**
              p_idtipodesarrollo = 14
             */
            $query_insConducta = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo, historiaclinica_idhistoriaclinica) VALUES (14, $idHistoria)";
            $sql_insConducta = mysqli_query($this->db->connect(),$query_insConducta);
            
            /*******************************************************Desarrollo Tratamientos Realizados *****************************************************************************************/

            /**
              p_idtipodesarrollo = 15
             */
            $query_insTratRealiza = "INSERT INTO desarrollo (tipodesarrollo_idtipodesarrollo, historiaclinica_idhistoriaclinica) VALUES (15, $idHistoria)";
            $sql_insTratRealiza = mysqli_query($this->db->connect(),$query_insTratRealiza);
            
            /*    Se debe obtener el ultimo id de la tabla desarrollo donde p_idtipodesarrollo=15                         */
            $resultlast = mysqli_query($this->db->connect(),"SELECT MAX(iddesarrollo) FROM desarrollo WHERE tipodesarrollo_idtipodesarrollo = 15 AND historiaclinica_idhistoriaclinica = $idHistoria");
            $rowlast = mysqli_fetch_row($resultlast);
            $idDlloTrat= $rowlast[0];

            /*
              Con el MAX(iddesarrollo) se crean 7 registros en la tabla realizado donde los valores del p_idtratamientorealizado son:
             p_idtratamientorealizado = 1 - 2 - 3 - 4 -5 - 6 - 7
            El valor del campo otros se guarda en el campo otrostramiento de la tabla desarrollo
             */
            $query_insRealizado1 = "INSERT INTO realizado (desarrollo_iddesarrollo, desarrollo_historiaclinica_idhistoriaclinica, tratamientorealizado_idtratamientorealizado) VALUES  ($idDlloTrat,  $idHistoria, 1)";
            $sql_insRealizado1 = mysqli_query($this->db->connect(),$query_insRealizado1);
            
            $query_insRealizado2 = "INSERT INTO realizado (desarrollo_iddesarrollo, desarrollo_historiaclinica_idhistoriaclinica, tratamientorealizado_idtratamientorealizado) VALUES  ($idDlloTrat,  $idHistoria, 2)";
            $sql_insRealizado2 = mysqli_query($this->db->connect(),$query_insRealizado2);
            
            $query_insRealizado3 = "INSERT INTO realizado (desarrollo_iddesarrollo, desarrollo_historiaclinica_idhistoriaclinica, tratamientorealizado_idtratamientorealizado) VALUES  ($idDlloTrat,  $idHistoria, 3)";
            $sql_insRealizado3 = mysqli_query($this->db->connect(),$query_insRealizado3);
            
            $query_insRealizado4 = "INSERT INTO realizado (desarrollo_iddesarrollo, desarrollo_historiaclinica_idhistoriaclinica, tratamientorealizado_idtratamientorealizado) VALUES  ($idDlloTrat,  $idHistoria, 4)";
            $sql_insRealizado4 = mysqli_query($this->db->connect(),$query_insRealizado4);
            
            $query_insRealizado5 = "INSERT INTO realizado (desarrollo_iddesarrollo, desarrollo_historiaclinica_idhistoriaclinica, tratamientorealizado_idtratamientorealizado) VALUES  ($idDlloTrat,  $idHistoria, 5)";
            $sql_insRealizado5 = mysqli_query($this->db->connect(),$query_insRealizado5);
            
            $query_insRealizado6 = "INSERT INTO realizado (desarrollo_iddesarrollo, desarrollo_historiaclinica_idhistoriaclinica, tratamientorealizado_idtratamientorealizado) VALUES  ($idDlloTrat,  $idHistoria, 6)";
            $sql_insRealizado6 = mysqli_query($this->db->connect(),$query_insRealizado6);
            
            $query_insRealizado7 = "INSERT INTO realizado (desarrollo_iddesarrollo, desarrollo_historiaclinica_idhistoriaclinica, tratamientorealizado_idtratamientorealizado) VALUES  ($idDlloTrat,  $idHistoria, 7)";
            $sql_insRealizado7 = mysqli_query($this->db->connect(),$query_insRealizado7);
            
            
            /************************************************************TAB INFORMACI�0�7N ESCOLAR********************************************************************************************/

            /***********************************************************Historia Escolar*******************************************************************************************************/
            $query_insHistEsc = "INSERT INTO historiaescolar (historiaclinica_idhistoriaclinica) VALUES ($idHistoria)";
            $sql_insHistEsc = mysqli_query($this->db->connect(),$query_insHistEsc);
            
            /*********************************************************************Independencia y Autonom��a********************************************************************************************/
            /***** En que alimentaci��n necesita ayuda, Que tipo de ayuda ?  *****/
            /*
             p_idalimentacion = 1
             */
            $query_insAlim1 = "INSERT INTO seleccionalimentacion (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (1, $idHistoria)";
            $sql_insAlim1 = mysqli_query($this->db->connect(),$query_insAlim1);
            
            $query_insAlim2 = "INSERT INTO seleccionalimentacion (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (2, $idHistoria)";
            $sql_insAlim2 = mysqli_query($this->db->connect(),$query_insAlim2);
            
            /*
              Con el valor de p_idalimentacion = 2 se deben crear 5 registro con los valores de p_idutensilio = 1 - 2 - 3 - 4 -5
             */
            $resultlast = mysqli_query($this->db->connect(),"SELECT MAX(idseleccionalimentacion) FROM seleccionalimentacion WHERE alimentacion_idalimentacion = 2 AND historiaclinica_idhistoriaclinica = $idHistoria");
            $rowlast = mysqli_fetch_row($resultlast);
            $idSelAlim= $rowlast[0];

            $query_insAlim3 = "INSERT INTO seleccionalimentacion (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (3, $idHistoria)";
            $sql_insAlim3 = mysqli_query($this->db->connect(),$query_insAlim3);
            
            $query_insAlim4 = "INSERT INTO seleccionalimentacion (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (4, $idHistoria)";
            $sql_insAlim4 = mysqli_query($this->db->connect(),$query_insAlim4);
            
            $query_insAlim5 = "INSERT INTO seleccionalimentacion (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (5, $idHistoria)";
            $sql_insAlim5 = mysqli_query($this->db->connect(),$query_insAlim5);
            
            $query_insAlim6 = "INSERT INTO seleccionalimentacion (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (6, $idHistoria)";
            $sql_insAlim6 = mysqli_query($this->db->connect(),$query_insAlim6);
            
            $query_insAlim7 = "INSERT INTO seleccionalimentacion (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (7, $idHistoria)";
            $sql_insAlim7 = mysqli_query($this->db->connect(),$query_insAlim7);
            
            $query_insAlim8 = "INSERT INTO seleccionalimentacion (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (8, $idHistoria)";
            $sql_insAlim8 = mysqli_query($this->db->connect(),$query_insAlim8);
            
            $query_insAlim9 = "INSERT INTO seleccionalimentacion (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (9, $idHistoria)";
            $sql_insAlim9 = mysqli_query($this->db->connect(),$query_insAlim9);
            
            $query_insAlim10 = "INSERT INTO seleccionalimentacion (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (10, $idHistoria)";
            $sql_insAlim10 = mysqli_query($this->db->connect(),$query_insAlim10);
            
            $query_insAlim11 = "INSERT INTO seleccionalimentacion (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (11, $idHistoria)";
            $sql_insAlim11 = mysqli_query($this->db->connect(),$query_insAlim11);
            
            $query_insAlim12 = "INSERT INTO ayudaparental (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (12, $idHistoria)";
            $sql_insAlim12 = mysqli_query($this->db->connect(),$query_insAlim12);
            
            $query_insAlim13 = "INSERT INTO seleccionalimentacion (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (13, $idHistoria)";
            $sql_insAlim13 = mysqli_query($this->db->connect(),$query_insAlim13);
            
            $query_insAlim14 = "INSERT INTO seleccionalimentacion (alimentacion_idalimentacion, historiaclinica_idhistoriaclinica) VALUES (14, $idHistoria)";
            $sql_insAlim14 = mysqli_query($this->db->connect(),$query_insAlim14);
            
            
            ////////////////////////// PRUEBAS FONOAUDIOLOGIA
            /********************************************Ubicaci��n Temporo - Espacial**********************************************************************/
            $query_RespuestaTemporo = "INSERT INTO respuesta (pregunta_idpregunta								   
                                              ,pregunta_bateria_idbateria      
                        			   	      ,pregunta_bateria_area_idarea                                   
                        					  ,usuario_idusuario
                          					  ,usuario_idusuario1)
                                       VALUES(95,4,3,'$idTerapeuta','$idpaciente'),
                                             (96,4,3,'$idTerapeuta','$idpaciente'),
                        		    	     (97,4,3,'$idTerapeuta','$idpaciente'),
                                             (98,4,3,'$idTerapeuta','$idpaciente'),
                                             (99,4,3,'$idTerapeuta','$idpaciente'),
                          				     (100,4,3,'$idTerapeuta','$idpaciente'),
                                             (101,4,3,'$idTerapeuta','$idpaciente'),
                                             (102,4,3,'$idTerapeuta','$idpaciente'),
                                             (103,4,3,'$idTerapeuta','$idpaciente')";

            $sql_RespuestaTemporo = mysqli_query($this->db->connect(),$query_RespuestaTemporo);
            
            /***************************************Evaluacion de habla******************************************************************************************/		 
            
            $query_RespuestaHabla = "INSERT INTO respuesta (pregunta_idpregunta								   
                                          ,pregunta_bateria_idbateria
                    			   	      ,pregunta_bateria_area_idarea                                   
                    					  ,usuario_idusuario
                    					  ,usuario_idusuario1)
                                    VALUES  (104,5,3,'$idTerapeuta','$idpaciente')";

            $sql_RespuestaHabla = mysqli_query($this->db->connect(),$query_RespuestaHabla);
            
            /***************************************Soporte Fisico******************************************************************************************/		 
            
            $query_RespuestaSoporteFisico = "INSERT INTO respuesta (pregunta_idpregunta								   
                                                                   ,pregunta_bateria_idbateria
                                            			   	       ,pregunta_bateria_area_idarea                                   
                                            					   ,usuario_idusuario
                                            					   ,usuario_idusuario1)
                                            VALUES  (105,6,3,'$idTerapeuta','$idpaciente'),
                                            	    (106,6,3,'$idTerapeuta','$idpaciente'),
                                            	    (107,6,3,'$idTerapeuta','$idpaciente'),
                                            	    (108,6,3,'$idTerapeuta','$idpaciente'),
                                            	    (109,6,3,'$idTerapeuta','$idpaciente')";

            $sql_RespuestaSoporteFisico = mysqli_query($this->db->connect(),$query_RespuestaSoporteFisico);
            
            /***************************************Aspectos Comunicativos ******************************************************************************************/		 

            $query_RespuestaAspComunicativos = "INSERT INTO respuesta (pregunta_idpregunta								   
                                                                       ,pregunta_bateria_idbateria
                                                			   	       ,pregunta_bateria_area_idarea                                   
                                                					   ,usuario_idusuario
                                                					   ,usuario_idusuario1)
                                                VALUES  (110,7,3,'$idTerapeuta','$idpaciente')";

            $sql_RespuestaAspComunicativos = mysqli_query($this->db->connect(),$query_RespuestaAspComunicativos);
            
            /***************************************Componente Fonologico******************************************************************************************/		 

            $query_RespuestaCompFonologico = "INSERT INTO respuesta (pregunta_idpregunta								   
                                                      ,pregunta_bateria_idbateria
                                			   	      ,pregunta_bateria_area_idarea                                   
                                					  ,usuario_idusuario
                                					  ,usuario_idusuario1)
                                            VALUES  (111,8,3,'$idTerapeuta','$idpaciente'),
                                            		(112,8,3,'$idTerapeuta','$idpaciente')";

            $sql_RespuestaCompFonologico = mysqli_query($this->db->connect(),$query_RespuestaCompFonologico);
            
            /***************************************Cuadro Fonologico******************************************************************************************/		 

            
            $query_RespuestaCuadroFonologico = "INSERT INTO respuesta (pregunta_idpregunta								   
                                                                      ,pregunta_bateria_idbateria
                                                			   	      ,pregunta_bateria_area_idarea                                   
                                                					  ,usuario_idusuario
                                                					  ,usuario_idusuario1)
                                                VALUES (113,9,3,'$idTerapeuta','$idpaciente'),
                                                		 (114,9,3,'$idTerapeuta','$idpaciente'),
                                                		 (115,9,3,'$idTerapeuta','$idpaciente'),
                                                		 (116,9,3,'$idTerapeuta','$idpaciente'),
                                                		 (117,9,3,'$idTerapeuta','$idpaciente'),
                                                       (118,9,3,'$idTerapeuta','$idpaciente')";

            $sql_RespuestaCuadroFonologico = mysqli_query($this->db->connect(),$query_RespuestaCuadroFonologico);
            
            /***************************************Componente Semantico******************************************************************************************/		 
		
		    $query_RespuestaCompSemantico = "INSERT INTO respuesta (pregunta_idpregunta								   
                                                                  ,pregunta_bateria_idbateria
                                            			   	      ,pregunta_bateria_area_idarea                                   
                                            					  ,usuario_idusuario
                                            					  ,usuario_idusuario1)
                                            VALUES (119,10,3,'$idTerapeuta','$idpaciente'),
                                            		(120,10,3,'$idTerapeuta','$idpaciente')";

            $sql_RespuestaCompSemantico = mysqli_query($this->db->connect(),$query_RespuestaCompSemantico);
            
            /***************************************Componente Morfosintactico******************************************************************************************/		 

            $query_RespuestaCompMorfosintactico = "INSERT INTO respuesta (pregunta_idpregunta								   
                                                                  ,pregunta_bateria_idbateria
                                            			   	      ,pregunta_bateria_area_idarea                                   
                                            					  ,usuario_idusuario
                                            					  ,usuario_idusuario1)
                                            VALUES  (121,11,3,'$idTerapeuta','$idpaciente')";

            $sql_RespuestaCompMorfosintactico = mysqli_query($this->db->connect(),$query_RespuestaCompMorfosintactico);

            /***************************************Componente Pragmatico******************************************************************************************/		 
            
            $query_RespuestaCompPragmatico = "INSERT INTO respuesta (pregunta_idpregunta								   
                                                                   ,pregunta_bateria_idbateria
                                            			   	       ,pregunta_bateria_area_idarea                                   
                                            					   ,usuario_idusuario
                                            	  				   ,usuario_idusuario1)
                                            VALUES  (122,12,3,'$idTerapeuta','$idpaciente')";

            $sql_RespuestaCompPragmatico = mysqli_query($this->db->connect(),$query_RespuestaCompPragmatico);
            
            /***************************************Lenguaje Expresivo******************************************************************************************/		 

            
            $query_RespuestaLengExpresivo = "INSERT INTO respuesta (pregunta_idpregunta								   
                                                                  ,pregunta_bateria_idbateria
                                            			   	      ,pregunta_bateria_area_idarea                                   
                                            					  ,usuario_idusuario
                                            					  ,usuario_idusuario1)
                                            VALUES (123,13,3,'$idTerapeuta','$idpaciente'),
                                            	    (124,13,3,'$idTerapeuta','$idpaciente'),	
                                            	    (125,13,3,'$idTerapeuta','$idpaciente'),
                                            	    (126,13,3,'$idTerapeuta','$idpaciente'),
                                                   (127,13,3,'$idTerapeuta','$idpaciente'),
                                            	    (128,13,3,'$idTerapeuta','$idpaciente'),
                                            	    (129,13,3,'$idTerapeuta','$idpaciente'),
                                            	    (130,13,3,'$idTerapeuta','$idpaciente'),
                                            	    (131,13,3,'$idTerapeuta','$idpaciente'),
                                            	    (132,13,3,'$idTerapeuta','$idpaciente'),
                                                   (133,13,3,'$idTerapeuta','$idpaciente'),       
                                                   (134,13,3,'$idTerapeuta','$idpaciente')";

            $sql_RespuestaLengExpresivo = mysqli_query($this->db->connect(),$query_RespuestaLengExpresivo);


            /***************************************Lenguaje Comprensivo******************************************************************************************/		 

            $query_RespuestaLengComprensivo = "INSERT INTO respuesta (pregunta_idpregunta								   
                                                                      ,pregunta_bateria_idbateria
                                                			   	      ,pregunta_bateria_area_idarea                                   
                                                					  ,usuario_idusuario
                                                					  ,usuario_idusuario1)
                                                VALUES (135,14,3,'$idTerapeuta','$idpaciente'),
                                                       (136,14,3,'$idTerapeuta','$idpaciente'),
                                                       (137,14,3,'$idTerapeuta','$idpaciente')";

            $sql_RespuestaLengComprensivo = mysqli_query($this->db->connect(),$query_RespuestaLengComprensivo);
       
            /***************************************Audicion******************************************************************************************/		 

            $query_RespuestaAudicion = "INSERT INTO respuesta (pregunta_idpregunta								   
                                                              ,pregunta_bateria_idbateria
                                        			   	      ,pregunta_bateria_area_idarea                                   
                                        					  ,usuario_idusuario
                                        					  ,usuario_idusuario1)
                                        VALUES (138,15,3,'$idTerapeuta','$idpaciente'),
                                               (139,15,3,'$idTerapeuta','$idpaciente'),
                                        		 (140,15,3,'$idTerapeuta','$idpaciente'),
                                        		 (141,15,3,'$idTerapeuta','$idpaciente'),
                                        		 (142,15,3,'$idTerapeuta','$idpaciente'),
                                        		 (143,15,3,'$idTerapeuta','$idpaciente'),
                                        		 (144,15,3,'$idTerapeuta','$idpaciente'),
                                               (145,15,3,'$idTerapeuta','$idpaciente'),
                                        		 (146,15,3,'$idTerapeuta','$idpaciente')";

            $sql_RespuestaAudicion = mysqli_query($this->db->connect(),$query_RespuestaAudicion);

            return $idHistoria;

        }else{
            $idHistoria = 0;
            return $idHistoria;
        }
    }
    
    public function consultarHistoriaFono($idpaciente, $idarea){
        $query_consultaHistoria   = "SELECT *
                                    FROM historiaclinica
                                    WHERE usuario_idusuario = $idpaciente
                                    AND area_idarea = $idarea";
                                    
        $sql_consultaHistoria   = mysqli_query( $this->db->connect(), $query_consultaHistoria );
            
        $nro_consultaHistoria = mysqli_num_rows($sql_consultaHistoria);
        
        if( $nro_consultaHistoria > 0 ) 
        {               
            while ( $row_consultaHistoria = mysqli_fetch_assoc( $sql_consultaHistoria) ) 
            {
                $arreglo_consultaHistoria[]= $row_consultaHistoria;
            }
            return $arreglo_consultaHistoria;
        }else{
            return false;
        }
    }
    
    
    public function consultarMotivoFono($idpaciente, $idhistoria){
        
        $query_consultaMotivo   = "SELECT motivoconsulta, institucion
                                           ,area_idarea
                                    FROM historiaclinica
                                    WHERE usuario_idusuario = $idpaciente";
                                    
        $sql_consultaMotivo   = mysqli_query( $this->db->connect(), $query_consultaMotivo );
        
        $nro_consultaMotivo = mysqli_num_rows($sql_consultaMotivo);
        
        if( $nro_consultaMotivo > 0 ) 
        {
            while ( $row_consultaMotivo = mysqli_fetch_assoc( $sql_consultaMotivo) ) 
            {
                $arreglo_consultaMotivo[] = $row_consultaMotivo;
            }
            return $arreglo_consultaMotivo;
        }else{
            return false;
        }
    }
    
    public function consultaNroHnos($idpaciente, $idhistoria){
        
        $query_consultaNroHnos   = " SELECT numerohermanos
                                          ,lugarocupa
                                    FROM usuario
                                    WHERE idusuario = $idpaciente";
                                    
        $sql_consultaNroHnos  = mysqli_query( $this->db->connect(), $query_consultaNroHnos );
        
        $nro_consultaNroHnos = mysqli_num_rows($sql_consultaNroHnos);
        
        if( $nro_consultaNroHnos > 0 ) 
        {
            while ( $row_consultaNroHnos = mysqli_fetch_assoc( $sql_consultaNroHnos) ) 
            {
                $arreglo_consultaNroHnos[] = $row_consultaNroHnos;
            }
            return $arreglo_consultaNroHnos;
        }else{
            return false;
        }
    }
    
    
    public function consultaAnteFamFono($idpaciente, $idhistoria){
        
        $query_consultaAnte2   = "SELECT  idantecedente
                                       ,transtornoneurologico
                                       ,problemaspsiquiatrico
                                       ,deficienciasvisaudt
                                       ,alteracionlenguaje
                                       ,deficitcongnitivo
                                       ,adicciones
                                       ,transaprendizaje
                                       ,permanecemayortiempo
                                       ,parentesco_idparentesco
                                FROM antecedente
                                WHERE historiaclinica_idhistoriaclinica = $idhistoria
                                AND tipoantecedente_idtipoantecedente = $idpaciente";
                                    
        $sql_consultaAnte2  = mysqli_query( $this->db->connect(), $query_consultaAnte2 );
        
        $nro_consultaAnte2 = mysqli_num_rows($sql_consultaAnte2);
        
        if( $nro_consultaAnte2 > 0 ) 
        {
            while ( $row_consultaAnte2 = mysqli_fetch_assoc( $sql_consultaAnte2) ) 
            {
                $arreglo_consultaAnte2[] = $row_consultaAnte2;
            }
            return $arreglo_consultaAnte2;
        }else{
            return false;
        }
    }
    
    
    public function consultaAntePreFono($idpaciente, $idhistoria){
        
        $query_consultaAnte3   = "SELECT  idantecedente
                                       ,numeroembarazos
                                       ,abortos
                                       ,mesaborto
                                       ,mesescontrolembr
                                       ,lugarcontrolembr
                                       ,convulsiones
                                       ,drogadiccion
                                       ,alcoholismo
                                       ,tabaquismo
                                       ,traumatismo
                                       ,toxoplasmosis
                                       ,preclampsia
                                       ,infecciones
                                       ,medicamento
                                       ,cualmedicamento
                                       ,intoxicaciones
                                       ,alimentacion
                                       ,estadoemocional
                                       ,otrosantcfono
                                FROM antecedente
                                WHERE historiaclinica_idhistoriaclinica = $idhistoria
                                AND tipoantecedente_idtipoantecedente = $idpaciente";
                                    
        $sql_consultaAnte3  = mysqli_query( $this->db->connect(), $query_consultaAnte3 );
        
        $nro_consultaAnte3 = mysqli_num_rows($sql_consultaAnte3);
        
        if( $nro_consultaAnte3 > 0 ) 
        {
            while ( $row_consultaAnte3 = mysqli_fetch_assoc( $sql_consultaAnte3) ) 
            {
                $arreglo_consultaAnte3[] = $row_consultaAnte3;
            }
            return $arreglo_consultaAnte3;
        }else{
            return false;
        }
    }
    
    public function consultaAntePerFono($idpaciente, $idhistoria){
        
        $query_consultaAnte4   = "SELECT idantecedente
                                      ,forceps
                                      ,circularcordon
                                      ,cefalica
                                      ,podalica
                                      ,antendidohospital
                                      ,atendidocasa
                                      ,partera
                                      ,obsrperinatal
                                FROM antecedente
                                WHERE historiaclinica_idhistoriaclinica = $idhistoria
                                AND tipoantecedente_idtipoantecedente   = $idpaciente";
                                    
        $sql_consultaAnte4  = mysqli_query( $this->db->connect(), $query_consultaAnte4 );
        
        $nro_consultaAnte4 = mysqli_num_rows($sql_consultaAnte4);
        
        if( $nro_consultaAnte4 > 0 ) 
        {
            while ( $row_consultaAnte4 = mysqli_fetch_assoc( $sql_consultaAnte4) ) 
            {
                $arreglo_consultaAnte4[] = $row_consultaAnte4;
            }
            return $arreglo_consultaAnte4;
        }else{
            return false;
        }
    }
    
    public function consultaAntePosFono($idpaciente, $idhistoria){
        
        $query_consultaAnte5   = "SELECT idantecedente
                                       ,llanto
                                       ,hipoxia
                                       ,cianosis
                                       ,oxigeno
                                       ,reanimacion
                                       ,ictericia
                                       ,transfusion
                                       ,fototerapia
                                       ,meconio
                                       ,traumatismo
                                       ,cualtraumatismo
                                      ,obsrposnatal
                                FROM antecedente
                                WHERE historiaclinica_idhistoriaclinica = $idhistoria
                                AND  tipoantecedente_idtipoantecedente = $idpaciente";
                                    
        $sql_consultaAnte5  = mysqli_query( $this->db->connect(), $query_consultaAnte5 );
        
        $nro_consultaAnte5 = mysqli_num_rows($sql_consultaAnte5);
        
        if( $nro_consultaAnte5 > 0 ) 
        {
            while ( $row_consultaAnte5 = mysqli_fetch_assoc( $sql_consultaAnte5) ) 
            {
                $arreglo_consultaAnte5[] = $row_consultaAnte5;
            }
            return $arreglo_consultaAnte5;
        }else{
            return false;
        }
    }
    
    
    public function consultaVivienda($idpaciente, $idhistoria){
        
        $query_consultaV   = "SELECT v.idvivienda
                                   ,v.estrato_idestrato
                                   ,e.estrato
                                   ,v.tipovivienda_idtipovivienda
                                   ,t.tipo
                                   ,v.descripcion
                            FROM vivienda v
                                ,estrato e
                                ,tipovivienda t
                            WHERE v.usuario_idusuario = $idpaciente
                            AND  v.estrato_idestrato  = e.idestrato
                            AND  v.tipovivienda_idtipovivienda = t.idtipovivienda";
                                    
        $sql_consultaV  = mysqli_query( $this->db->connect(), $query_consultaV );
        
        $nro_consultaV = mysqli_num_rows($sql_consultaV);
        
        if( $nro_consultaV > 0 ) 
        {
            while ( $row_consultaV = mysqli_fetch_assoc( $sql_consultaV) ) 
            {
                $arreglo_consultaV[] = $row_consultaV;
            }
            return $arreglo_consultaV;
        }else{
            return false;
        }
    }
    
    
    public function consultaDlloLeng($idpaciente, $idarea){
        
        $query_consultaDlloLeng   = "SELECT hab.frase_idfrase
                                          ,fra.frase
                                          ,hab.seleccion
                                          ,hab.edad
                                          ,hab.observaciones
                                    FROM habla hab
                                         ,frase fra
                                         ,historiaclinica hist
                                    WHERE hab.desarrollo_historiaclinica_idhistoriaclinica = hist.idhistoriaclinica
                                    AND hab.frase_idfrase = fra.idfrase
                                    AND hab.frase_idfrase = 4
                                    AND hist.area_idarea = $idarea
                                    AND hist.usuario_idusuario = $idpaciente";
                                    
        $sql_consultaDlloLeng  = mysqli_query( $this->db->connect(), $query_consultaDlloLeng );
        
        $nro_consultaDlloLeng = mysqli_num_rows($sql_consultaDlloLeng);
        
        if( $nro_consultaDlloLeng > 0 ) 
        {
            while ( $row_consultaDlloLeng = mysqli_fetch_assoc( $sql_consultaDlloLeng) ) 
            {
                $arreglo_consultaDlloLeng[] = $row_consultaDlloLeng;
            }
            return $arreglo_consultaDlloLeng;
        }else{
            return false;
        }
    }
    
    public function consultaDlloLeng4($idpaciente, $idhistoria){
        
        $query_consultaDlloLeng4   = "SELECT iddesarrollo
                                           ,comprensionlenguaje
                                           ,problemasarticulatorios
                                           ,lenguajeinteligible
                                    FROM desarrollo
                                    WHERE historiaclinica_idhistoriaclinica = $idhistoria
                                    AND tipodesarrollo_idtipodesarrollo = $idpaciente";
                                    
        $sql_consultaDlloLeng4  = mysqli_query( $this->db->connect(), $query_consultaDlloLeng4 );
        
        $nro_consultaDlloLeng4 = mysqli_num_rows($sql_consultaDlloLeng4);
        
        if( $nro_consultaDlloLeng4 > 0 ) 
        {
            while ( $row_consultaDlloLeng4 = mysqli_fetch_assoc( $sql_consultaDlloLeng4) ) 
            {
                $arreglo_consultaDlloLeng4[] = $row_consultaDlloLeng4;
            }
            return $arreglo_consultaDlloLeng4;
        }else{
            return false;
        }
    }
    
    public function consultaDlloLeng9($idpaciente, $idhistoria){
        
        $query_consultaDlloLeng9   = "SELECT p.idperiodoalimentacion
                                          ,f.idformaalimentacion
                                          ,f.forma
                                          ,p.seleccion
                                          ,p.desde
                                    FROM periodoalimentacion p
                                        ,formaalimentacion f
                                        ,desarrollo d
                                    WHERE p.desarrollo_iddesarrollo             = d.iddesarrollo
                                    AND p.formaalimentacion_idformaalimentacion = f.idformaalimentacion
                                    AND d.tipodesarrollo_idtipodesarrollo       = 9
                                    AND p.desarrollo_historia_idhistoria        = $idhistoria";
                                    
        $sql_consultaDlloLeng9  = mysqli_query( $this->db->connect(), $query_consultaDlloLeng9 );
        
        $nro_consultaDlloLeng9 = mysqli_num_rows($sql_consultaDlloLeng9);
        
        if( $nro_consultaDlloLeng9 > 0 ) 
        {
            while ( $row_consultaDlloLeng9 = mysqli_fetch_assoc( $sql_consultaDlloLeng9) ) 
            {
                $arreglo_consultaDlloLeng9[] = $row_consultaDlloLeng9;
            }
            return $arreglo_consultaDlloLeng9;
        }else{
            return false;
        }
    }
    
    public function consultaDlloLeng91($idpaciente, $idhistoria){
        
        $query_consultaDlloLeng91   = "SELECT  iddesarrollo
                                           ,succion
                                           ,deglucion
                                           ,sialorrea
                                           ,apariciondientes
                                           ,masticacion
                                    FROM desarrollo
                                    WHERE historiaclinica_idhistoriaclinica = $idhistoria
                                    AND tipodesarrollo_idtipodesarrollo = $idpaciente";
                                    
        $sql_consultaDlloLeng91  = mysqli_query( $this->db->connect(), $query_consultaDlloLeng91 );
        
        $nro_consultaDlloLeng91 = mysqli_num_rows($sql_consultaDlloLeng91);
        
        if( $nro_consultaDlloLeng91 > 0 ) 
        {
            while ( $row_consultaDlloLeng91 = mysqli_fetch_assoc( $sql_consultaDlloLeng91) ) 
            {
                $arreglo_consultaDlloLeng91[] = $row_consultaDlloLeng91;
            }
            return $arreglo_consultaDlloLeng91;
        }else{
            return false;
        }
    }
    
    public function consultaDlloLeng10($idpaciente, $idhistoria){
        
        $query_consultaDlloLeng10   = "SELECT iddesarrollo
                                         ,liquidos
                                         ,semisolidos
                                         ,solidos
                                         ,balanceado
                                         ,comesolo
                                         ,diurno
                                         ,nocturno
                                         ,enuresis
                                         ,encopresis
                                         ,vision
                                         ,audicion
                                         ,traumatismos
                                         ,enfprimanos
                                    FROM desarrollo
                                    WHERE historiaclinica_idhistoriaclinica = $idhistoria
                                    AND tipodesarrollo_idtipodesarrollo = $idpaciente";
                                    
        $sql_consultaDlloLeng10  = mysqli_query( $this->db->connect(), $query_consultaDlloLeng10 );
        
        $nro_consultaDlloLeng10 = mysqli_num_rows($sql_consultaDlloLeng10);
        
        if( $nro_consultaDlloLeng10 > 0 ) 
        {
            while ( $row_consultaDlloLeng10 = mysqli_fetch_assoc( $sql_consultaDlloLeng10) ) 
            {
                $arreglo_consultaDlloLeng10[] = $row_consultaDlloLeng10;
            }
            return $arreglo_consultaDlloLeng10;
        }else{
            return false;
        }
    }
    
    public function consultaDlloLeng11($idpaciente, $idhistoria){
        
        $query_consultaDlloLeng11   = "SELECT mot.idmotor
                                              ,mot.seleccion
                                              ,mot.edad
                                              ,des.iddesarrollo
                                        FROM motor mot
                                            ,movimiento mov
                                            ,desarrollo des
                                        WHERE mot.desarrollo_iddesarrollo          = des.iddesarrollo
                                        AND mot.movimiento_idmovimiento            = mov.idmovimiento
                                        AND des.tipodesarrollo_idtipodesarrollo    = $idpaciente
                                        AND des.historiaclinica_idhistoriaclinica  = $idhistoria";
                                    
        $sql_consultaDlloLeng11  = mysqli_query( $this->db->connect(), $query_consultaDlloLeng11 );
        
        $nro_consultaDlloLeng11 = mysqli_num_rows($sql_consultaDlloLeng11);
        
        if( $nro_consultaDlloLeng11 > 0 ) 
        {
            while ( $row_consultaDlloLeng11 = mysqli_fetch_assoc( $sql_consultaDlloLeng11) ) 
            {
                $arreglo_consultaDlloLeng11[] = $row_consultaDlloLeng11;
            }
            return $arreglo_consultaDlloLeng11;
        }else{
            return false;
        }
    }
    
    
    public function consultaDlloObsr11($idpaciente, $idhistoria){
        
        $query_consultaDlloObsr11   = "SELECT  iddesarrollo
                                               ,obsrmotor
                                        FROM desarrollo
                                        WHERE historiaclinica_idhistoriaclinica = $idhistoria
                                        AND tipodesarrollo_idtipodesarrollo = $idpaciente";
                                    
        $sql_consultaDlloObsr11  = mysqli_query( $this->db->connect(), $query_consultaDlloObsr11 );
        
        $nro_consultaDlloObsr11 = mysqli_num_rows($sql_consultaDlloObsr11);
        
        if( $nro_consultaDlloObsr11 > 0 ) 
        {
            while ( $row_consultaDlloObsr11 = mysqli_fetch_assoc( $sql_consultaDlloObsr11) ) 
            {
                $arreglo_consultaDlloObsr11[] = $row_consultaDlloObsr11;
            }
            return $arreglo_consultaDlloObsr11;
        }else{
            return false;
        }
    }
    
    public function consultaDlloLeng12($idpaciente, $idhistoria){
        
        $query_consultaDlloLeng12   = "SELECT h.idhabito
                                              ,h.seleccion
                                              ,h.edad
                                              ,d.iddesarrollo
                                        FROM habito h
                                            ,desarrollo d
                                        WHERE h.desarrollo_iddesarrollo         = d.iddesarrollo
                                        AND d.tipodesarrollo_idtipodesarrollo   = $idpaciente
                                        AND d.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaDlloLeng12  = mysqli_query( $this->db->connect(), $query_consultaDlloLeng12 );
        
        $nro_consultaDlloLeng12 = mysqli_num_rows($sql_consultaDlloLeng12);
        
        if( $nro_consultaDlloLeng12 > 0 ) 
        {
            while ( $row_consultaDlloLeng12 = mysqli_fetch_assoc( $sql_consultaDlloLeng12) ) 
            {
                $arreglo_consultaDlloLeng12[] = $row_consultaDlloLeng12;
            }
            return $arreglo_consultaDlloLeng12;
        }else{
            return false;
        }
    }
    
    public function consultaDlloObsr12($idpaciente, $idhistoria){
        
        $query_consultaDlloObsr12   = "SELECT  iddesarrollo
                                               ,otroscomportamientos
                                        FROM desarrollo
                                        WHERE historiaclinica_idhistoriaclinica = $idhistoria
                                        AND tipodesarrollo_idtipodesarrollo     = $idpaciente";
                                    
        $sql_consultaDlloObsr12  = mysqli_query( $this->db->connect(), $query_consultaDlloObsr12 );
        
        $nro_consultaDlloObsr12 = mysqli_num_rows($sql_consultaDlloObsr12);
        
        if( $nro_consultaDlloObsr12 > 0 ) 
        {
            while ( $row_consultaDlloObsr12 = mysqli_fetch_assoc( $sql_consultaDlloObsr12) ) 
            {
                $arreglo_consultaDlloObsr12[] = $row_consultaDlloObsr12;
            }
            return $arreglo_consultaDlloObsr12;
        }else{
            return false;
        }
    }
    
    public function consultaDlloLeng13($idpaciente, $idhistoria){
        
        $query_consultaDlloLeng13   = "SELECT iddesarrollo
                                              ,tranquilo
                                              ,intranquilo
                                              ,insonmio
                                              ,duermesolo
                                              ,conquienduerme
                                             ,obsrsueno
                                        FROM desarrollo
                                        WHERE historiaclinica_idhistoriaclinica = $idhistoria
                                        AND tipodesarrollo_idtipodesarrollo = $idpaciente";
                                    
        $sql_consultaDlloLeng13  = mysqli_query( $this->db->connect(), $query_consultaDlloLeng13 );
        
        $nro_consultaDlloLeng13 = mysqli_num_rows($sql_consultaDlloLeng13);
        
        if( $nro_consultaDlloLeng13 > 0 ) 
        {
            while ( $row_consultaDlloLeng13 = mysqli_fetch_assoc( $sql_consultaDlloLeng13) ) 
            {
                $arreglo_consultaDlloLeng13[] = $row_consultaDlloLeng13;
            }
            return $arreglo_consultaDlloLeng13;
        }else{
            return false;
        }
    }
    
    public function consultaDlloLeng14($idpaciente, $idhistoria){
        
        $query_consultaDlloLeng14   = "SELECT iddesarrollo
                                              ,inquieto
                                              ,pasivo
                                              ,distraido
                                              ,impulsivo
                                              ,sociable
                                              ,destructor
                                              ,peleador
                                              ,desatento
                                              ,timido
                                              ,independiente
                                              ,estanimocomun
                                              ,fobias
                                              ,juegopreferido
                                              ,personaspreferidas
                                              ,amigosfacil
                                              ,compartejuego
                                              ,fatigabilidad
                                              ,conductasexual
                                              ,obsrconducta
                                        FROM desarrollo
                                        WHERE historiaclinica_idhistoriaclinica = $idhistoria
                                        AND tipodesarrollo_idtipodesarrollo     = $idpaciente";
                                    
        $sql_consultaDlloLeng14  = mysqli_query( $this->db->connect(), $query_consultaDlloLeng14 );
        
        $nro_consultaDlloLeng14 = mysqli_num_rows($sql_consultaDlloLeng14);
        
        if( $nro_consultaDlloLeng14 > 0 ) 
        {
            while ( $row_consultaDlloLeng14 = mysqli_fetch_assoc( $sql_consultaDlloLeng14) ) 
            {
                $arreglo_consultaDlloLeng14[] = $row_consultaDlloLeng14;
            }
            return $arreglo_consultaDlloLeng14;
        }else{
            return false;
        }
    }
    
    public function consultaDlloLeng15($idpaciente, $idhistoria){
        
        $query_consultaDlloLeng15   = "SELECT r.idrealizado
                                               ,r.seleccion
                                               ,r.tiempo
                                               ,r.observaciones
                                               ,d.iddesarrollo
                                               ,t.idtratamientorealizado
                                        FROM realizado r
                                            ,tratamientorealizado t
                                            ,desarrollo d
                                        WHERE r.desarrollo_iddesarrollo = d.iddesarrollo
                                        AND r.tratamientorealizado_idtratamientorealizado = t.idtratamientorealizado
                                        AND d.tipodesarrollo_idtipodesarrollo             = $idpaciente
                                        AND d.historiaclinica_idhistoriaclinica           = $idhistoria";
                                    
        $sql_consultaDlloLeng15  = mysqli_query( $this->db->connect(), $query_consultaDlloLeng15 );
        
        $nro_consultaDlloLeng15 = mysqli_num_rows($sql_consultaDlloLeng15);
        
        if( $nro_consultaDlloLeng15 > 0 ) 
        {
            while ( $row_consultaDlloLeng15 = mysqli_fetch_assoc( $sql_consultaDlloLeng15) ) 
            {
                $arreglo_consultaDlloLeng15[] = $row_consultaDlloLeng15;
            }
            return $arreglo_consultaDlloLeng15;
        }else{
            return false;
        }
    }
    
    public function consultaDlloLeng16($idpaciente, $idhistoria){
        
        $query_consultaDlloLeng16   = "SELECT  iddesarrollo
                                               ,otrostratamieto
                                        FROM  desarrollo
                                        WHERE historiaclinica_idhistoriaclinica = $idhistoria
                                        AND tipodesarrollo_idtipodesarrollo     = $idpaciente";
                                    
        $sql_consultaDlloLeng16  = mysqli_query( $this->db->connect(), $query_consultaDlloLeng16 );
        
        $nro_consultaDlloLeng16 = mysqli_num_rows($sql_consultaDlloLeng16);
        
        if( $nro_consultaDlloLeng16 > 0 ) 
        {
            while ( $row_consultaDlloLeng16 = mysqli_fetch_assoc( $sql_consultaDlloLeng16) ) 
            {
                $arreglo_consultaDlloLeng16[] = $row_consultaDlloLeng16;
            }
            return $arreglo_consultaDlloLeng16;
        }else{
            return false;
        }
    }
    
    public function consultaInfEsc($idpaciente, $idhistoria){
        
        $query_consultaIE   = "SELECT idhistoriaescolar
                                      ,escolaridad
                                      ,motivo
                                      ,edadnivelinicio
                                      ,nivelesrepitencia
                                      ,cualesniveles
                                      ,areasdificultad
                                      ,aptitudhabilidadesdest
                                      ,procesoadaptador
                                     ,actitudfrenteambesc
                                     ,apoyofamiliar
                                     ,observacinoesgen
                                FROM historiaescolar
                                WHERE historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaIE  = mysqli_query( $this->db->connect(), $query_consultaIE );
        
        $nro_consultaIE = mysqli_num_rows($sql_consultaIE);
        
        if( $nro_consultaIE > 0 ) 
        {
            while ( $row_consultaIE = mysqli_fetch_assoc( $sql_consultaIE) ) 
            {
                $arreglo_consultaIE[] = $row_consultaIE;
            }
            return $arreglo_consultaIE;
        }else{
            return false;
        }
    }
    
    
    public function consultaAlimEfi($idpaciente, $idhistoria){
        
        $query_consultaAE   = "SELECT s.idseleccionalimentacion
                                  ,s.dependencia_iddependencia
                                  ,s.alimentacion_idalimentacion
                            FROM seleccionalimentacion  s
                                ,alimentacion a
                            WHERE s.alimentacion_idalimentacion = a.idalimentacion
                            AND a.idalimentacion                    = 1
                            AND s.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE  = mysqli_query( $this->db->connect(), $query_consultaAE );
        
        $nro_consultaAE = mysqli_num_rows($sql_consultaAE);
        
        if( $nro_consultaAE > 0 ) 
        {
            while ( $row_consultaAE = mysqli_fetch_assoc( $sql_consultaAE) ) 
            {
                $arreglo_consultaAE[] = $row_consultaAE;
            }
            return $arreglo_consultaAE;
        }else{
            return false;
        }
    }
    
    public function consultaAlimEfi2($idpaciente, $idhistoria){
        
        $query_consultaAE   = "SELECT s.idseleccionalimentacion
                                  ,s.dependencia_iddependencia
                                  ,s.alimentacion_idalimentacion
                            FROM seleccionalimentacion  s
                                ,alimentacion a
                            WHERE s.alimentacion_idalimentacion = a.idalimentacion
                            AND a.idalimentacion                    = 2
                            AND s.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE  = mysqli_query( $this->db->connect(), $query_consultaAE );
        
        $nro_consultaAE = mysqli_num_rows($sql_consultaAE);
        
        if( $nro_consultaAE > 0 ) 
        {
            while ( $row_consultaAE = mysqli_fetch_assoc( $sql_consultaAE) ) 
            {
                $arreglo_consultaAE[] = $row_consultaAE;
            }
            return $arreglo_consultaAE;
        }else{
            return false;
        }
    }
    
    public function consultaAlimEfi3($idpaciente, $idhistoria){
        
        $query_consultaAE   = "SELECT s.idseleccionalimentacion
                                       ,s.solido
                                       ,s.semisolido
                                       ,s.pure
                                       ,s.compota
                                       ,s.alimentacion_idalimentacion
                                 FROM seleccionalimentacion s
                                      ,alimentacion a
                                WHERE s.alimentacion_idalimentacion     = a.idalimentacion
                                AND a.idalimentacion                    = 3
                                AND s.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE  = mysqli_query( $this->db->connect(), $query_consultaAE );
        
        $nro_consultaAE = mysqli_num_rows($sql_consultaAE);
        
        if( $nro_consultaAE > 0 ) 
        {
            while ( $row_consultaAE = mysqli_fetch_assoc( $sql_consultaAE) ) 
            {
                $arreglo_consultaAE[] = $row_consultaAE;
            }
            return $arreglo_consultaAE;
        }else{
            return false;
        }
    }
    
    public function consultaAlimEfi4($idpaciente, $idhistoria){
        
        $query_consultaAE4   = "SELECT s.idseleccionalimentacion
                                       ,s.seleccion
                                       ,s.texto
                                       ,s.alimentacion_idalimentacion
                                 FROM seleccionalimentacion s
                                      ,alimentacion a
                                WHERE s.alimentacion_idalimentacion     = a.idalimentacion
                                AND a.idalimentacion                    = 4
                                AND s.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE4  = mysqli_query( $this->db->connect(), $query_consultaAE4 );
        
        $nro_consultaAE4 = mysqli_num_rows($sql_consultaAE4);
        
        if( $nro_consultaAE4 > 0 ) 
        {
            while ( $row_consultaAE4 = mysqli_fetch_assoc( $sql_consultaAE4) ) 
            {
                $arreglo_consultaAE4[] = $row_consultaAE4;
            }
            return $arreglo_consultaAE4;
        }else{
            return false;
        }
    }
    
    public function consultaAlimEfi5($idpaciente, $idhistoria){
        
        $query_consultaAE5   = "SELECT s.idseleccionalimentacion
                                       ,s.seleccion
                                       ,s.alimentacion_idalimentacion
                                 FROM seleccionalimentacion s
                                      ,alimentacion a
                                WHERE s.alimentacion_idalimentacion     = a.idalimentacion
                                AND a.idalimentacion                    = 5
                                AND s.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE5  = mysqli_query( $this->db->connect(), $query_consultaAE5 );
        
        $nro_consultaAE5 = mysqli_num_rows($sql_consultaAE5);
        
        if( $nro_consultaAE5 > 0 ) 
        {
            while ( $row_consultaAE5 = mysqli_fetch_assoc( $sql_consultaAE5) ) 
            {
                $arreglo_consultaAE5[] = $row_consultaAE5;
            }
            return $arreglo_consultaAE5;
        }else{
            return false;
        }
    }
    
    public function consultaAlimEfi6($idpaciente, $idhistoria){
        
        $query_consultaAE6   = "SELECT s.idseleccionalimentacion
                                       ,s.seleccion
                                       ,s.texto
                                       ,s.alimentacion_idalimentacion
                                 FROM seleccionalimentacion s
                                      ,alimentacion a
                                WHERE s.alimentacion_idalimentacion     = a.idalimentacion
                                AND a.idalimentacion                    = 6
                                AND s.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE6  = mysqli_query( $this->db->connect(), $query_consultaAE6 );
        
        $nro_consultaAE6 = mysqli_num_rows($sql_consultaAE6);
        
        if( $nro_consultaAE6 > 0 ) 
        {
            while ( $row_consultaAE6 = mysqli_fetch_assoc( $sql_consultaAE6) ) 
            {
                $arreglo_consultaAE6[] = $row_consultaAE6;
            }
            return $arreglo_consultaAE6;
        }else{
            return false;
        }
    }
    
    public function consultaAlimEfi7($idpaciente, $idhistoria){
        
        $query_consultaAE7   = "SELECT  s.idseleccionalimentacion
                                       ,s.liquidoclaro
                                       ,s.liquidoespeso
                                       ,s.alimentacion_idalimentacion
                                FROM seleccionalimentacion s
                                      ,alimentacion a
                                WHERE s.alimentacion_idalimentacion     = a.idalimentacion
                                AND a.idalimentacion                    = 7
                                AND s.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE7  = mysqli_query( $this->db->connect(), $query_consultaAE7 );
        
        $nro_consultaAE7 = mysqli_num_rows($sql_consultaAE7);
        
        if( $nro_consultaAE7 > 0 ) 
        {
            while ( $row_consultaAE7 = mysqli_fetch_assoc( $sql_consultaAE7) ) 
            {
                $arreglo_consultaAE7[] = $row_consultaAE7;
            }
            return $arreglo_consultaAE7;
        }else{
            return false;
        }
    }
    
    public function consultaAlimEfi8($idpaciente, $idhistoria){
        
        $query_consultaAE8   = "SELECT s.idseleccionalimentacion
                                       ,s.seleccion
                                       ,s.alimentacion_idalimentacion
                                 FROM seleccionalimentacion s
                                      ,alimentacion a
                                WHERE s.alimentacion_idalimentacion     = a.idalimentacion
                                AND a.idalimentacion                    = 8
                                AND s.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE8  = mysqli_query( $this->db->connect(), $query_consultaAE8 );
        
        $nro_consultaAE8 = mysqli_num_rows($sql_consultaAE8);
        
        if( $nro_consultaAE8 > 0 ) 
        {
            while ( $row_consultaAE8 = mysqli_fetch_assoc( $sql_consultaAE8) ) 
            {
                $arreglo_consultaAE8[] = $row_consultaAE8;
            }
            return $arreglo_consultaAE8;
        }else{
            return false;
        }
    }
    
    public function consultaAlimEfi9($idpaciente, $idhistoria){
        
        $query_consultaAE9   = "SELECT s.idseleccionalimentacion
                                       ,s.seleccion
                                       ,s.texto
                                       ,s.alimentacion_idalimentacion
                                 FROM seleccionalimentacion s
                                      ,alimentacion a
                                WHERE s.alimentacion_idalimentacion     = a.idalimentacion
                                AND a.idalimentacion                    = 9
                                AND s.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE9  = mysqli_query( $this->db->connect(), $query_consultaAE9 );
        
        $nro_consultaAE9 = mysqli_num_rows($sql_consultaAE9);
        
        if( $nro_consultaAE9 > 0 ) 
        {
            while ( $row_consultaAE9 = mysqli_fetch_assoc( $sql_consultaAE9) ) 
            {
                $arreglo_consultaAE9[] = $row_consultaAE9;
            }
            return $arreglo_consultaAE9;
        }else{
            return false;
        }
    }
    
    public function consultaAlimEfi10($idpaciente, $idhistoria){
        
        $query_consultaAE10   = "SELECT s.idseleccionalimentacion
                                       ,s.saliva
                                       ,s.alimento
                                       ,s.agua
                                       ,s.observaciones
                                       ,s.alimentacion_idalimentacion
                                FROM seleccionalimentacion s
                                      ,alimentacion a
                                WHERE s.alimentacion_idalimentacion     = a.idalimentacion
                                AND a.idalimentacion                    = 10
                                AND s.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE10  = mysqli_query( $this->db->connect(), $query_consultaAE10 );
        
        $nro_consultaAE10 = mysqli_num_rows($sql_consultaAE10);
        
        if( $nro_consultaAE10 > 0 ) 
        {
            while ( $row_consultaAE10 = mysqli_fetch_assoc( $sql_consultaAE10) ) 
            {
                $arreglo_consultaAE10[] = $row_consultaAE10;
            }
            return $arreglo_consultaAE10;
        }else{
            return false;
        }
    }
    
    
    public function consultaAlimEfi11($idpaciente, $idhistoria){
        
        $query_consultaAE11   = "SELECT  s.idseleccionalimentacion
                                        ,s.seleccion
                                        ,s.texto
                                        ,s.alimentacion_idalimentacion
                                FROM seleccionalimentacion s
                                     ,alimentacion a
                                WHERE s.alimentacion_idalimentacion     = a.idalimentacion
                                AND a.idalimentacion                    = 11
                                AND s.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE11  = mysqli_query( $this->db->connect(), $query_consultaAE11 );
        
        $nro_consultaAE11 = mysqli_num_rows($sql_consultaAE11);
        
        if( $nro_consultaAE11 > 0 ) 
        {
            while ( $row_consultaAE11 = mysqli_fetch_assoc( $sql_consultaAE11) ) 
            {
                $arreglo_consultaAE11[] = $row_consultaAE11;
            }
            return $arreglo_consultaAE11;
        }else{
            return false;
        }
    }
    
    
    public function consultaAyudaPar12($idpaciente, $idhistoria){
        
        $query_consultaAE12   = " SELECT ay.idayudaparental
                                            ,ay.seleccion
                                            ,ay.motivo
                                            ,ay.alimentacionparental_idalimentacionparental
                                            ,ay.duracion
                                            ,ay.alimentacion_idalimentacion
                                    FROM ayudaparental ay
                                         ,alimentacion al
                                    WHERE ay.alimentacion_idalimentacion = al.idalimentacion
                                    AND al.idalimentacion                    = 12
                                    AND ay.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE12  = mysqli_query( $this->db->connect(), $query_consultaAE12 );
        
        $nro_consultaAE12 = mysqli_num_rows($sql_consultaAE12);
        
        if( $nro_consultaAE12 > 0 ) 
        {
            while ( $row_consultaAE12 = mysqli_fetch_assoc( $sql_consultaAE12) ) 
            {
                $arreglo_consultaAE12[] = $row_consultaAE12;
            }
            return $arreglo_consultaAE12;
        }else{
            return false;
        }
    }
    
    public function consultaAlimEfi13($idpaciente, $idhistoria){
        
        $query_consultaAE13   = "SELECT  s.idseleccionalimentacion
                                        ,s.seleccion
                                        ,s.texto
                                        ,s.alimentacion_idalimentacion
                                FROM seleccionalimentacion s
                                     ,alimentacion a
                                WHERE s.alimentacion_idalimentacion     = a.idalimentacion
                                AND a.idalimentacion                    = 13
                                AND s.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE13  = mysqli_query( $this->db->connect(), $query_consultaAE13 );
        
        $nro_consultaAE13 = mysqli_num_rows($sql_consultaAE13);
        
        if( $nro_consultaAE13 > 0 ) 
        {
            while ( $row_consultaAE13 = mysqli_fetch_assoc( $sql_consultaAE13) ) 
            {
                $arreglo_consultaAE13[] = $row_consultaAE13;
            }
            return $arreglo_consultaAE13;
        }else{
            return false;
        }
    }
    
    public function consultaAlimEfi14($idpaciente, $idhistoria){
        
        $query_consultaAE14   = "SELECT  s.idseleccionalimentacion
                                        ,s.seleccion
                                        ,s.observaciones
                                        ,s.alimentacion_idalimentacion
                                FROM seleccionalimentacion s
                                     ,alimentacion a
                                WHERE s.alimentacion_idalimentacion     = a.idalimentacion
                                AND a.idalimentacion                    = 14
                                AND s.historiaclinica_idhistoriaclinica = $idhistoria";
                                    
        $sql_consultaAE14  = mysqli_query( $this->db->connect(), $query_consultaAE14 );
        
        $nro_consultaAE14 = mysqli_num_rows($sql_consultaAE14);
        
        if( $nro_consultaAE14 > 0 ) 
        {
            while ( $row_consultaAE14 = mysqli_fetch_assoc( $sql_consultaAE14) ) 
            {
                $arreglo_consultaAE14[] = $row_consultaAE14;
            }
            return $arreglo_consultaAE14;
        }else{
            return false;
        }
    }
    
    public function consultaImpresionDiag($idpaciente, $idhistoria){
        
        $query_consultaImpD   = "SELECT impresiondiagnostica
                                       ,observaciones
                                       ,area_idarea
                                FROM historiaclinica
                                WHERE idhistoriaclinica = $idhistoria
                                AND area_idarea = $idpaciente";
                                    
        $sql_consultaImpD  = mysqli_query( $this->db->connect(), $query_consultaImpD );
        
        $nro_consultaImpD = mysqli_num_rows($sql_consultaImpD);
        
        if( $nro_consultaImpD > 0 ) 
        {
            while ( $row_consultaImpD = mysqli_fetch_assoc( $sql_consultaImpD) ) 
            {
                $arreglo_consultaImpD[] = $row_consultaImpD;
            }
            return $arreglo_consultaImpD;
        }else{
            return false;
        }
    }
    public function consultarAntPrenatalFono($idpaciente, $idhistoria){
        
        $query_consultaAntPrenatal   = "SELECT ant.idantecedente
                                              ,ant.embarazodeseado
                                          	  ,ant.anticonceptivos
                                              ,ant.abortivas
                                              ,ant.adoptado
                                              ,ant.actitudembarazo
                                              ,ant.consgpadres
                                              ,ant.enfinfecciosas
                                              ,ant.enferuptivas
                                              ,ant.enfotras
                                              ,ant.dftcemocionales
                                              ,ant.controlmedico
                                              ,ant.rayosx
                                              ,ant.ecografias
                                        FROM antecedente ant
                                        WHERE ant.historiaclinica_idhistoriaclinica = $idhistoria
                                        AND ant.tipoantecedente_idtipoantecedente = 3";
                                    
        $sql_consultaAntPrenatal   = mysqli_query( $this->db->connect(), $query_consultaAntPrenatal );
        
        $nro_consultaAntPrenatal = mysqli_num_rows($sql_consultaAntPrenatal);
        
        if( $nro_consultaAntPrenatal > 0 ) 
        {
            while ( $row_consultaAntPrenatal = mysqli_fetch_assoc( $sql_consultaAntPrenatal) ) 
            {
                $arreglo_consultaAntPrenatal[] = $row_consultaAntPrenatal;
            }
            return $arreglo_consultaAntPrenatal;
        }else{
            return false;
        }
    }
    
    public function consultarAntPartoFono($idpaciente, $idhistoria){
        
        $query_consultaAntParto   = "SELECT ant.idantecedente
                                          ,ant.duracion
                                      	  ,ant.parto
                                          ,ant.inducido
                                          ,ant.lugar
                                          ,ant.atendidopor
                                          ,ant.dificultades
                                          ,ant.incubadora
                                          ,ant.defectoscong
                                          ,ant.talla
                                          ,ant.peso
                                          ,ant.observaciones	
                                    FROM antecedente ant
                                    WHERE ant.historiaclinica_idhistoriaclinica = $idhistoria
                                    AND ant.tipoantecedente_idtipoantecedente = 4";
                                    
        $sql_consultaAntParto   = mysqli_query( $this->db->connect(), $query_consultaAntParto );
        
        $nro_consultaAntParto = mysqli_num_rows($sql_consultaAntParto);
        
        if( $nro_consultaAntParto > 0 ) 
        {
            while ( $row_consultaAntParto = mysqli_fetch_assoc( $sql_consultaAntParto) ) 
            {
                $arreglo_consultaAntParto[] = $row_consultaAntParto;
            }
            return $arreglo_consultaAntParto;
        }else{
            return false;
        }
    }
    
    ///ACTUALIZACION DATOS FONOAUDIOLOGIA
    
    public function actualizarAnamnesis($idhist,
                                        $idpaciente,
                                        $fechaIngreso,
                                        $pacienteInstitucion,
                                        $motivoConsultaObservacion,
                                        $numerohermanos,
                                        $lugarocupa,
                                        $transtornoneurologico,
                                        $problemaspsiquiatrico,
                                        $deficienciasvisaudt,
                                        $alteracionlenguaje,
                                        $deficitcongnitivo,
                                        $adicciones,
                                        $transaprendizaje,
                                        $acudienteIdParentesco,
                                        $permanecemayortiempo,
                                        $estrato,
                                        $tipovivienda,
                                        $descripcion,
                                        $numeroembarazos,
                                        $abortos,
                                        $mesaborto,
                                        $mesescontrolembr,
                                        $lugarcontrolembr,
                                        $convulsiones,
                                        $drogadiccion,
                                        $alcoholismo,
                                        $tabaquismo,
                                        $traumatismo,
                                        $cualtraumatismo,
                                        $toxoplasmosis,
                                        $preclampsia,
                                        $infecciones,
                                        $medicamento,
                                        $cualmedicamento,
                                        $intoxicaciones,
                                        $cualintoxicacion,
                                        $alimentacion,
                                        $estadoemocional,
                                        $otrosantcfono,
                                        $forceps,
                                        $circularcordon,
                                        $cefalica,
                                        $podalica,
                                        $antendidohospital,
                                        $atendidocasa,
                                        $partera,
                                        $obsrperinatal,
                                        $llanto,
                                        $hipoxia,
                                        $cianosis,
                                        $oxigeno,
                                        $reanimacion,
                                        $ictericia,
                                        $transfusion,
                                        $fototerapia,
                                        $meconio,
                                        $traumatismopost,
                                        $cualtraumatismopos,
                                        $obsrposnatal){

        $query_upMotivoCons = "UPDATE historiaclinica
                                        SET motivoconsulta  = '$motivoConsultaObservacion',
                                            institucion     = '$pacienteInstitucion'
                                        WHERE idhistoriaclinica = $idhist
                                        AND area_idarea = 3";
                                        
        $sql_upMotivoCons = mysqli_query($this->db->connect(),$query_upMotivoCons);
        
        $query_upUsuario = "UPDATE usuario
                            SET numerohermanos = $numerohermanos
                               ,lugarocupa  = $lugarocupa
                            WHERE idusuario = $idpaciente";
                                
        $sql_upUsuario = mysqli_query($this->db->connect(),$query_upUsuario);
                                
        $query_upAnt = "UPDATE antecedente
                        SET parentesco_idparentesco = $acudienteIdParentesco
                        WHERE tipoantecedente_idtipoantecedente = 2
                        AND historiaclinica_idhistoriaclinica = $idhist";

        $sql_upAnt = mysqli_query($this->db->connect(),$query_upAnt);
        
        $query_upAnt2 = "UPDATE antecedente
                        SET  transtornoneurologico  = '$transtornoneurologico'
                             ,problemaspsiquiatrico = '$problemaspsiquiatrico'
                             ,deficienciasvisaudt   = '$deficienciasvisaudt'
                             ,alteracionlenguaje    = '$alteracionlenguaje'
                             ,deficitcongnitivo     = '$deficitcongnitivo'
                             ,adicciones            = '$adicciones'
                             ,transaprendizaje      = '$transaprendizaje'
                             ,permanecemayortiempo  = '$permanecemayortiempo'
                        WHERE tipoantecedente_idtipoantecedente = 2
                        AND historiaclinica_idhistoriaclinica = $idhist";
        
        $sql_upAnt2 = mysqli_query($this->db->connect(),$query_upAnt2);
        
        $query_upVivienda = "UPDATE vivienda
                        SET estrato_idestrato           = $estrato
                           ,tipovivienda_idtipovivienda = $tipovivienda
                           ,descripcion                 = '$descripcion'
                        WHERE usuario_idusuario         = $idpaciente";
        
        $sql_upVivienda = mysqli_query($this->db->connect(),$query_upVivienda);
        
        $query_upAnt3 = "UPDATE antecedente
                        SET    numeroembarazos    = '$numeroembarazos'
                               ,abortos           = '$abortos'
                               ,mesaborto         = '$mesaborto'
                               ,mesescontrolembr  = '$mesescontrolembr'
                               ,lugarcontrolembr  = '$lugarcontrolembr'
                               ,drogadiccion      = '$drogadiccion'
                               ,convulsiones      = '$convulsiones'
                               ,alcoholismo       = '$alcoholismo'
                               ,tabaquismo        = '$tabaquismo'
                               ,traumatismo       = '$traumatismo'
                               ,cualtraumatismo   = '$cualtraumatismo'
                               ,toxoplasmosis     = '$toxoplasmosis'
                               ,preclampsia       = '$preclampsia'
                               ,infecciones       = '$infecciones'
                               ,medicamento       = '$medicamento'
                               ,cualmedicamento   = '$cualmedicamento'
                               ,intoxicaciones    = '$intoxicaciones'
                               ,cualintoxicacion  = '$cualintoxicacion'
                               ,alimentacion      = '$alimentacion'
                               ,estadoemocional   = '$estadoemocional'
                               ,otrosantcfono     = '$otrosantcfono'
                        WHERE tipoantecedente_idtipoantecedente = 3
                        AND historiaclinica_idhistoriaclinica = $idhist";

        $sql_upAnt3 = mysqli_query($this->db->connect(),$query_upAnt3);
        
        $query_upAnt4 = "UPDATE antecedente
                            SET    forceps           = '$forceps'
                                  ,circularcordon    = '$circularcordon'
                                  ,cefalica          = '$cefalica'
                                  ,podalica          = '$podalica'
                                  ,antendidohospital = '$antendidohospital'
                                  ,atendidocasa      = '$atendidocasa'
                                  ,partera           = '$partera'
                                  ,obsrperinatal     = '$obsrperinatal'
                            WHERE  tipoantecedente_idtipoantecedente = 4
                            AND historiaclinica_idhistoriaclinica = $idhist";
                                        
        $sql_upAnt4 = mysqli_query($this->db->connect(),$query_upAnt4);
        
        $query_upAnt5 = "UPDATE antecedente
                        SET llanto              = '$llanto'
                               ,hipoxia         = '$hipoxia'
                               ,cianosis        = '$cianosis'
                               ,oxigeno         = '$oxigeno'
                               ,reanimacion     = '$reanimacion'
                               ,ictericia       = '$ictericia'
                               ,transfusion     = '$transfusion'
                               ,fototerapia     = '$fototerapia'
                               ,meconio         = '$meconio'
                               ,traumatismo     = '$traumatismopost'
                               ,cualtraumatismo = '$cualtraumatismopos'
                              ,obsrposnatal     = '$obsrposnatal'
                        WHERE tipoantecedente_idtipoantecedente = 5
                        AND historiaclinica_idhistoriaclinica  = $idhist";
                                        
        $sql_upAnt5 = mysqli_query($this->db->connect(),$query_upAnt5);
        
        if($sql_upAnt5){
          return true;
        }else
        {
         return false;
        }
    }
    
    public function actualizarDlloLeng($idhistoria,
                                        $idhistoriapsico,
                                        $idpaciente,
                                        $silabeo,
                                        $edadsilabeo,
                                        $observacionsilabeo,
                                        $comprensionlenguaje,
                                        $problemasarticulatorios,
                                        $lenguajeinteligible,
                                        $seleccionMaterna,
                                        $edadmaterna,
                                        $seleccionArtificial,
                                        $edadartificial,
                                        $seleccionMixta,
                                        $edadmixta,
                                        $succion,
                                        $deglucion,
                                        $sialorrea,
                                        $apariciondientes,
                                        $masticacion,
                                        $liquidos,
                                        $semisolidos,
                                        $solidos,
                                        $balanceado,
                                        $comesolo,
                                        $diurno,
                                        $nocturno,
                                        $enuresis,
                                        $encopresis,
                                        $vision,
                                        $audicion,
                                        $traumatismos,
                                        $enfprimanos,
                                        $controlcabeza,
                                        $edadcontrolcabeza,
                                        $sento,
                                        $edadsento,
                                        $gateo,
                                        $edadgateo,
                                        $camino,
                                        $edadcamino,
                                        $prefmanual,
                                        $edadprefmanual,
                                        $equilibrio,
                                        $edadequilibrio,
                                        $motfina,
                                        $edadmotfina,
                                        $motgruesa,
                                        $edadmotgruesa,
                                        $obsrmotor,
                                        $succiondigital,
                                        $edadsucciondigital,
                                        $balanceo,
                                        $edadbalanceo,
                                        $onicofagia,
                                        $musarana,
                                        $golpea,
                                        $arrancacabello,
                                        $aleteo,
                                        $otroscomportamientos,
                                        $tranquilo,
                                        $intranquilo,
                                        $insonmio,
                                        $duermesolo,
                                        $conquienduerme,
                                        $obsrsueno,
                                        $inquieto,
                                        $pasivo,
                                        $distraido,
                                        $impulsivo,
                                        $sociable,
                                        $destructor,
                                        $peleador,
                                        $desatento,
                                        $timido,
                                        $independiente,
                                        $estanimocomun,
                                        $fobias,
                                        $juegopreferido,
                                        $personaspreferidas,
                                        $amigosfacil,
                                        $compartejuego,
                                        $fatigabilidad,
                                        $conductasexual,
                                        $obsrconducta,
                                        $neurologia,
                                        $tiemponeurologia,
                                        $obsrneurologia,
                                        $fonoaudiologia,
                                        $tiempofonoaudiologia,
                                        $obsrfonoaudiologia,
                                        $teo,
                                        $tiempoteo,
                                        $obsrteo,
                                        $fisioterapia,
                                        $tiempofisioterapia,
                                        $obsrfisioterapia,
                                        $psico,
                                        $tiempopsico,
                                        $obsrpsico,
                                        $farmacologio,
                                        $tiempofarmacologio,
                                        $obsrfarmacologio,
                                        $cuidadosesp,
                                        $tiempocuidadosesp,
                                        $obsrcuidadosesp,
                                        $otrostratamieto){
        
        $query_upDlloLeng = "UPDATE habla
                            SET seleccion       = '$silabeo'
                                ,edad           = '$edadsilabeo'
                                ,observaciones  = '$observacionsilabeo'
                            WHERE frase_idfrase = 4
                            AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoriapsico";
                                        
        $sql_upDlloLeng = mysqli_query($this->db->connect(),$query_upDlloLeng);
        
        $query_upDlloLeng4 = "UPDATE desarrollo
                                SET comprensionlenguaje       = '$comprensionlenguaje'
                                    ,problemasarticulatorios  = '$problemasarticulatorios'
                                    ,lenguajeinteligible      = '$lenguajeinteligible'
                                WHERE tipodesarrollo_idtipodesarrollo   = 4
                                AND historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng4 = mysqli_query($this->db->connect(),$query_upDlloLeng4);
        
        $query_upDlloLengMaterna = "UPDATE periodoalimentacion
                                SET seleccion   = '$seleccionMaterna'
                                    ,desde      = '$edadmaterna'
                                WHERE formaalimentacion_idformaalimentacion = 1
                                AND  desarrollo_historia_idhistoria        = $idhistoria";
                                        
        $sql_upDlloLengMaterna = mysqli_query($this->db->connect(),$query_upDlloLengMaterna);
        
        $query_upDlloLengTetero = "UPDATE periodoalimentacion
                                SET seleccion   = '$seleccionArtificial'
                                    ,desde      = '$edadartificial'
                                WHERE formaalimentacion_idformaalimentacion = 2
                                AND  desarrollo_historia_idhistoria        = $idhistoria";
                                        
        $sql_upDlloLengTetero = mysqli_query($this->db->connect(),$query_upDlloLengTetero);
        
        $query_upDlloLengMixta = "UPDATE periodoalimentacion
                                SET seleccion = '$seleccionMixta'
                                    ,desde     = '$edadmixta'
                                WHERE formaalimentacion_idformaalimentacion = 3
                                AND  desarrollo_historia_idhistoria        = $idhistoria";
                                        
        $sql_upDlloLengMixta = mysqli_query($this->db->connect(),$query_upDlloLengMixta);
        
        $query_upDlloLeng91 = "UPDATE desarrollo
                                SET  succion             = '$succion'
                                       ,deglucion        = '$deglucion'
                                       ,sialorrea        = '$sialorrea'
                                       ,apariciondientes = '$apariciondientes'
                                       ,masticacion      = '$masticacion'
                                WHERE tipodesarrollo_idtipodesarrollo   = 9
                                AND historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng91 = mysqli_query($this->db->connect(),$query_upDlloLeng91);
        
        $query_upDlloLeng10 = "UPDATE desarrollo
                                SET   liquidos    = '$liquidos'
                                     ,semisolidos = '$semisolidos'
                                     ,solidos     = '$solidos'
                                     ,balanceado  = '$balanceado'
                                     ,comesolo    = '$comesolo'
                                     ,diurno      = '$diurno'
                                     ,nocturno    = '$nocturno'
                                     ,enuresis    = '$enuresis'
                                     ,encopresis  = '$encopresis'
                                     ,vision      = '$vision'
                                     ,audicion    = '$audicion'
                                     ,traumatismos = '$traumatismos'
                                     ,enfprimanos  = '$enfprimanos'
                                WHERE tipodesarrollo_idtipodesarrollo = 11
                                AND historiaclinica_idhistoriaclinica = $idhistoria";

        $sql_upDlloLeng10 = mysqli_query($this->db->connect(),$query_upDlloLeng10);
        
        $query_upDlloLeng111 = "UPDATE motor
                                SET seleccion = '$controlcabeza'
                                    ,edad     = '$edadcontrolcabeza'
                                WHERE movimiento_idmovimiento = 1
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng111 = mysqli_query($this->db->connect(),$query_upDlloLeng111);
        
        $query_upDlloLeng112 = "UPDATE motor
                                SET seleccion = '$sento'
                                    ,edad     = '$edadsento'
                                WHERE movimiento_idmovimiento = 2
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng112 = mysqli_query($this->db->connect(),$query_upDlloLeng112);
        
        $query_upDlloLeng113 = "UPDATE motor
                                SET seleccion = '$gateo'
                                    ,edad     = '$edadgateo'
                                WHERE movimiento_idmovimiento = 3
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng113 = mysqli_query($this->db->connect(),$query_upDlloLeng113);
        
        $query_upDlloLeng114 = "UPDATE motor
                                SET seleccion = '$camino'
                                    ,edad     = '$edadcamino'
                                WHERE movimiento_idmovimiento = 4
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng114 = mysqli_query($this->db->connect(),$query_upDlloLeng114);
        
        $query_upDlloLeng115 = "UPDATE motor
                                SET seleccion = '$prefmanual'
                                    ,edad     = '$edadprefmanual'
                                WHERE movimiento_idmovimiento = 5
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng115 = mysqli_query($this->db->connect(),$query_upDlloLeng115);
        
        $query_upDlloLeng116 = "UPDATE motor
                                SET seleccion = '$equilibrio'
                                    ,edad     = '$edadequilibrio'
                                WHERE movimiento_idmovimiento = 6
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng116 = mysqli_query($this->db->connect(),$query_upDlloLeng116);
        
        $query_upDlloLeng117 = "UPDATE motor
                                SET seleccion = '$motfina'
                                    ,edad     = '$edadmotfina'
                                WHERE movimiento_idmovimiento = 7
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng117 = mysqli_query($this->db->connect(),$query_upDlloLeng117);
        
        $query_upDlloLeng118 = "UPDATE motor
                                SET seleccion = '$motgruesa'
                                    ,edad     = '$edadmotgruesa'
                                WHERE movimiento_idmovimiento = 8
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng118 = mysqli_query($this->db->connect(),$query_upDlloLeng118);

        $query_upDlloLeng11Ob = "UPDATE desarrollo
                                SET obsrmotor = '$obsrmotor'
                                WHERE tipodesarrollo_idtipodesarrollo = 11
                                AND historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng11Ob = mysqli_query($this->db->connect(),$query_upDlloLeng11Ob);
        
        $query_upDlloLengHabito1 = "UPDATE habito
                                    SET seleccion  = '$succiondigital'
                                       ,edad       = '$edadsucciondigital'
                                    WHERE comportamiento_idcomportamiento = 1
                                    AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLengHabito1 = mysqli_query($this->db->connect(),$query_upDlloLengHabito1);
        
        $query_upDlloLengHabito2 = "UPDATE habito
                                    SET seleccion  = '$balanceo'
                                       ,edad       = '$edadbalanceo'
                                    WHERE comportamiento_idcomportamiento = 2
                                    AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLengHabito2 = mysqli_query($this->db->connect(),$query_upDlloLengHabito2);
        
        $query_upDlloLengHabito3 = "UPDATE habito
                                    SET seleccion  = '$onicofagia'
                                    WHERE comportamiento_idcomportamiento = 3
                                    AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLengHabito3 = mysqli_query($this->db->connect(),$query_upDlloLengHabito3);
        
        $query_upDlloLengHabito4 = "UPDATE habito
                                    SET seleccion  = '$musarana'
                                    WHERE comportamiento_idcomportamiento = 4
                                    AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLengHabito4 = mysqli_query($this->db->connect(),$query_upDlloLengHabito4);
        
        $query_upDlloLengHabito5 = "UPDATE habito
                                    SET seleccion  = '$golpea'
                                    WHERE comportamiento_idcomportamiento = 5
                                    AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLengHabito5 = mysqli_query($this->db->connect(),$query_upDlloLengHabito5);
        
        $query_upDlloLengHabito6 = "UPDATE habito
                                    SET seleccion  = '$arrancacabello'
                                    WHERE comportamiento_idcomportamiento = 6
                                    AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLengHabito6 = mysqli_query($this->db->connect(),$query_upDlloLengHabito6);
        
        $query_upDlloLengHabito7 = "UPDATE habito
                                    SET seleccion  = '$aleteo'
                                    WHERE comportamiento_idcomportamiento = 7
                                    AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLengHabito7 = mysqli_query($this->db->connect(),$query_upDlloLengHabito7);

        $query_upDlloLeng12 = "UPDATE desarrollo
                                    SET otroscomportamientos = '$otroscomportamientos'
                                    WHERE tipodesarrollo_idtipodesarrollo = 12
                                    AND historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng12 = mysqli_query($this->db->connect(),$query_upDlloLeng12);

        $query_upDlloLeng13 = "UPDATE desarrollo
                                SET tranquilo       = '$tranquilo'
                                    ,intranquilo    = '$intranquilo'
                                    ,insonmio       = '$insonmio'
                                    ,duermesolo     = '$duermesolo'
                                    ,conquienduerme = '$conquienduerme'
                                    ,obsrsueno      = '$obsrsueno'
                                WHERE tipodesarrollo_idtipodesarrollo = 13
                                AND historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng13 = mysqli_query($this->db->connect(),$query_upDlloLeng13);

        $query_upDlloLeng14 = "UPDATE desarrollo
                                SET inquieto            = '$inquieto'
                                   ,pasivo              = '$pasivo'
                                   ,distraido           = '$distraido'
                                   ,impulsivo           = '$impulsivo'
                                   ,sociable            = '$sociable'
                                   ,destructor          = '$destructor'
                                   ,peleador            = '$peleador'
                                   ,desatento           = '$desatento'
                                   ,timido              = '$timido'
                                   ,independiente       = '$independiente'
                                   ,estanimocomun       = '$estanimocomun'
                                   ,fobias              = '$fobias'
                                   ,juegopreferido      = '$juegopreferido'
                                   ,personaspreferidas  = '$personaspreferidas'
                                   ,amigosfacil         = '$amigosfacil'
                                   ,compartejuego       = '$compartejuego'
                                   ,fatigabilidad       = '$fatigabilidad'
                                   ,conductasexual      = '$conductasexual'
                                   ,obsrconducta        = '$obsrconducta'
                                WHERE tipodesarrollo_idtipodesarrollo   = 14
                                AND historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng14 = mysqli_query($this->db->connect(),$query_upDlloLeng14);
        
        $query_upDlloLeng151 = "UPDATE realizado
                                SET seleccion     = '$neurologia'
                                   ,tiempo        = '$tiemponeurologia'
                                   ,observaciones = '$obsrneurologia'
                                WHERE tratamientorealizado_idtratamientorealizado  = 1
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng151 = mysqli_query($this->db->connect(),$query_upDlloLeng151);
        
        $query_upDlloLeng152 = "UPDATE realizado
                                SET seleccion     = '$fonoaudiologia'
                                   ,tiempo        = '$tiempofonoaudiologia'
                                   ,observaciones = '$obsrfonoaudiologia'
                                WHERE tratamientorealizado_idtratamientorealizado  = 2
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng152 = mysqli_query($this->db->connect(),$query_upDlloLeng152);
        
        $query_upDlloLeng153 = "UPDATE realizado
                                SET seleccion     = '$teo'
                                   ,tiempo        = '$tiempoteo'
                                   ,observaciones = '$obsrteo'
                                WHERE tratamientorealizado_idtratamientorealizado  = 3
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng153 = mysqli_query($this->db->connect(),$query_upDlloLeng153);
        
        $query_upDlloLeng154 = "UPDATE realizado
                                SET seleccion     = '$fisioterapia'
                                   ,tiempo        = '$tiempofisioterapia'
                                   ,observaciones = '$obsrfisioterapia'
                                WHERE tratamientorealizado_idtratamientorealizado  = 4
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng154 = mysqli_query($this->db->connect(),$query_upDlloLeng154);
        
        $query_upDlloLeng155 = "UPDATE realizado
                                SET seleccion     = '$psico'
                                   ,tiempo        = '$tiempopsico'
                                   ,observaciones = '$obsrpsico'
                                WHERE tratamientorealizado_idtratamientorealizado  = 5
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng155 = mysqli_query($this->db->connect(),$query_upDlloLeng155);
        
        $query_upDlloLeng156 = "UPDATE realizado
                                SET seleccion     = '$farmacologio'
                                   ,tiempo        = '$tiempofarmacologio'
                                   ,observaciones = '$obsrfarmacologio'
                                WHERE tratamientorealizado_idtratamientorealizado  = 6
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng156 = mysqli_query($this->db->connect(),$query_upDlloLeng156);
        
        $query_upDlloLeng157 = "UPDATE realizado
                                SET seleccion     = '$cuidadosesp'
                                   ,tiempo        = '$tiempocuidadosesp'
                                   ,observaciones = '$obsrcuidadosesp'
                                WHERE tratamientorealizado_idtratamientorealizado  = 7
                                AND desarrollo_historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng157 = mysqli_query($this->db->connect(),$query_upDlloLeng157);
        
        $query_upDlloLeng158 = "UPDATE desarrollo
                                SET otrostratamieto = '$otrostratamieto'
                                WHERE tipodesarrollo_idtipodesarrollo   = 15
                                AND historiaclinica_idhistoriaclinica = $idhistoria";
                                        
        $sql_upDlloLeng158 = mysqli_query($this->db->connect(),$query_upDlloLeng158);

        if($sql_upDlloLeng158){
          return true;
        }else
        {
         return false;
        }
    }
    
    public function actualizarHistEscolar($idhistoria,
                                        $idpaciente,
                                        $escolaridad,
                                        $motivoEsc,
                                        $edadnivelinicio,
                                        $nivelesrepitencia,
                                        $cualesniveles,
                                        $areasdificultad,
                                        $aptitudhabilidadesdest,
                                        $procesoadaptador,
                                        $actitudfrenteambesc,
                                        $apoyofamiliar,
                                        $observacinoesgen){

        $query_upDlloHisEsc = "UPDATE historiaescolar
                                SET  escolaridad              = '$escolaridad'
                                    ,motivo                   = '$motivoEsc'
                                    ,edadnivelinicio          = '$edadnivelinicio'
                                    ,nivelesrepitencia        = '$nivelesrepitencia'
                                    ,cualesniveles            = '$cualesniveles'
                                    ,areasdificultad          = '$areasdificultad'
                                    ,aptitudhabilidadesdest   = '$aptitudhabilidadesdest'
                                    ,procesoadaptador         = '$procesoadaptador'
                                    ,actitudfrenteambesc      = '$actitudfrenteambesc'
                                    ,apoyofamiliar            = '$apoyofamiliar'
                                    ,observacinoesgen         = '$observacinoesgen'
                                WHERE historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upDlloHisEsc = mysqli_query($this->db->connect(),$query_upDlloHisEsc);

        if($sql_upDlloHisEsc){
          return true;
        }else
        {
         return false;
        }
    }
    
    public function actualizarAlimentacion($idhistoria,
                                            $idhistoriapsico,
                                            $idpaciente,
                                            $alimentacionayuda,
                                            $decidealimentos,
                                            $solido,
                                            $semisolido,
                                            $pure,
                                            $compota,
                                            $perdidapeso,
                                            $cuantoskilos,
                                            $interesalimentarse,
                                            $rechazoalimento,
                                            $cualalimento,
                                            $liquidoclaro,
                                            $liquidoespeso,
                                            $comerapido,
                                            $actividadcome,
                                            $cualactividad,
                                            $saliva,
                                            $alimento,
                                            $agua,
                                            $observaciones,
                                            $neumonias,
                                            $neumoniasfrec,
                                            $ayudaparental,
                                            $motivoayudaparental,
                                            $cualayudaparental,
                                            $tiempoayudaparental,
                                            $comerestofamilia,
                                            $porquecomerestofamilia,
                                            $comeotraspersonas,
                                            $obsrcomunicativos){

        $query_upAlim1 = "UPDATE seleccionalimentacion
                            SET dependencia_iddependencia         = '$alimentacionayuda'
                            WHERE alimentacion_idalimentacion       = 1
                            AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim1 = mysqli_query($this->db->connect(),$query_upAlim1);
        
        $query_upAlim2 = "UPDATE seleccionalimentacion
                            SET dependencia_iddependencia         = '$decidealimentos'
                            WHERE alimentacion_idalimentacion       = 2
                            AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim2 = mysqli_query($this->db->connect(),$query_upAlim2);
        
        $query_upAlim3 = "UPDATE seleccionalimentacion
                            SET solido      = '$solido'
                                ,semisolido = '$semisolido'
                                ,pure       = '$pure'
                                ,compota    = '$compota'
                            WHERE alimentacion_idalimentacion     = 3
                            AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim3 = mysqli_query($this->db->connect(),$query_upAlim3);
        
        $query_upAlim4 = "UPDATE seleccionalimentacion
                            SET  seleccion = '$perdidapeso'
                                 ,texto    = '$cuantoskilos'
                            WHERE alimentacion_idalimentacion       = 4
                            AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim4 = mysqli_query($this->db->connect(),$query_upAlim4);
        
        $query_upAlim5 = "UPDATE seleccionalimentacion
                            SET  seleccion = '$interesalimentarse'
                            WHERE alimentacion_idalimentacion       = 5
                            AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim5 = mysqli_query($this->db->connect(),$query_upAlim5);

        $query_upAlim6 = "UPDATE seleccionalimentacion
                        SET  seleccion = '$rechazoalimento'
                             ,texto    = '$cualalimento'
                        WHERE alimentacion_idalimentacion       = 6
                        AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim6 = mysqli_query($this->db->connect(),$query_upAlim6);

        $query_upAlim7 = "UPDATE seleccionalimentacion
                            SET  liquidoclaro   = '$liquidoclaro'
                                 ,liquidoespeso = '$liquidoespeso'
                            WHERE alimentacion_idalimentacion       = 7
                            AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim7 = mysqli_query($this->db->connect(),$query_upAlim7);

        $query_upAlim8 = "UPDATE seleccionalimentacion
                            SET  seleccion = '$comerapido'
                            WHERE alimentacion_idalimentacion       = 8
                            AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim8 = mysqli_query($this->db->connect(),$query_upAlim8);
        
        $query_upAlim9 = "UPDATE seleccionalimentacion
                            SET  seleccion = '$actividadcome'
                                 ,texto    = '$cualactividad'
                            WHERE alimentacion_idalimentacion       = 9
                            AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim9 = mysqli_query($this->db->connect(),$query_upAlim9);
        
         $query_upAlim10 = "UPDATE seleccionalimentacion
                            SET  saliva         = '$saliva'
                                 ,alimento      = '$alimento'
                                 ,agua          = '$agua'
                                 ,observaciones = '$observaciones'
                            WHERE alimentacion_idalimentacion       = 10
                            AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim10 = mysqli_query($this->db->connect(),$query_upAlim10);
        

        $query_upAlim11 = "UPDATE seleccionalimentacion
                            SET  seleccion = '$neumonias'
                                 ,texto    = '$neumoniasfrec'
                            WHERE alimentacion_idalimentacion       = 11
                            AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim11 = mysqli_query($this->db->connect(),$query_upAlim11);

        $query_upAlim12 = "UPDATE ayudaparental
                            SET   seleccion                                   = '$ayudaparental'
                                 ,motivo                                      = '$motivoayudaparental'
                                 ,duracion                                    = '$tiempoayudaparental'
                                 ,alimentacionparental_idalimentacionparental = $cualayudaparental
                            WHERE alimentacion_idalimentacion     = 12
                            AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim12 = mysqli_query($this->db->connect(),$query_upAlim12);
        
        $query_upAlim13 = "UPDATE seleccionalimentacion
                            SET  seleccion = '$comerestofamilia'
                                 ,texto    = '$porquecomerestofamilia'
                            WHERE alimentacion_idalimentacion       = 13
                            AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim13 = mysqli_query($this->db->connect(),$query_upAlim13);
        
        $query_upAlim14 = "UPDATE seleccionalimentacion
                        SET  seleccion      = '$comeotraspersonas'
                            ,observaciones  = '$obsrcomunicativos'
                        WHERE alimentacion_idalimentacion       = 14
                        AND historiaclinica_idhistoriaclinica = $idhistoria";
                                   
        $sql_upAlim14 = mysqli_query($this->db->connect(),$query_upAlim14);

        if($sql_upAlim14){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    public function actualizarImpDiagnostica($idhistoria,
                                            $idhistoriapsico,
                                            $idpaciente,
                                            $impresiondiagnostica){
 
        $query_upImpDiag = "UPDATE historiaclinica
                            SET impresiondiagnostica = '$impresiondiagnostica'
                            WHERE idhistoriaclinica   = $idhistoria
                            AND area_idarea           = 3";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    /********************************************Pruebas fonoaudiologia *********************************************************************************************************/
    
    public function cargaTemporoEspacial($idpaciente, $idbateria, $idarea){
        
        $query_TemporoEspacial   = "SELECT p.idpregunta
                                          ,p.pregunta
                                    	  ,r.idrespuesta
                                    	  ,r.respuesta
                                    	  ,r.observaciones
                                    FROM respuesta r, pregunta p
                                    WHERE r.usuario_idusuario1        = $idpaciente
                                    AND r.pregunta_bateria_idbateria   = 4
                                    AND r.pregunta_bateria_area_idarea = $idarea
                                    AND r.pregunta_idpregunta = p.idpregunta;";
                                    
        $sql_TemporoEspacial   = mysqli_query( $this->db->connect(), $query_TemporoEspacial );
        
        $nro_TemporoEspacial = mysqli_num_rows($sql_TemporoEspacial);
        
        if( $nro_TemporoEspacial > 0 ) 
        {
            while ( $row_TemporoEspacial = mysqli_fetch_assoc( $sql_TemporoEspacial) ) 
            {
                $arreglo_TemporoEspacial[] = $row_TemporoEspacial;
            }
            return $arreglo_TemporoEspacial;
        }else{
            return false;
        }
    }
    
    public function respuestaTemporoEspacial($idpaciente, $idrespuesta, $idoption, $texto, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET respuesta      = $idoption
                                ,observaciones = '$texto'
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 4
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    public function cargaEvaluacionHabla($idpaciente, $idbateria, $idarea){
        
        $query_EvaluacionHabla   = "SELECT p.idpregunta
                                          ,p.pregunta
                                    	  ,r.idrespuesta
                                    	  ,r.respuesta
                                    	  ,r.observaciones
                                    FROM respuesta r, pregunta p
                                    WHERE r.usuario_idusuario1        = $idpaciente
                                    AND r.pregunta_bateria_idbateria   = 5
                                    AND r.pregunta_bateria_area_idarea = $idarea
                                    AND r.pregunta_idpregunta = p.idpregunta;";
                                    
        $sql_EvaluacionHabla   = mysqli_query( $this->db->connect(), $query_EvaluacionHabla );
        
        $nro_EvaluacionHabla = mysqli_num_rows($sql_EvaluacionHabla);
        
        if( $nro_EvaluacionHabla > 0 ) 
        {
            while ( $row_EvaluacionHabla = mysqli_fetch_assoc( $sql_EvaluacionHabla) ) 
            {
                $arreglo_EvaluacionHabla[] = $row_EvaluacionHabla;
            }
            return $arreglo_EvaluacionHabla;
        }else{
            return false;
        }
    }
    
    public function respuestaEvaluacionHabla($idpaciente, $idrespuesta, $texto, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET observaciones = '$texto'
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 5
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    //Soporte Fisico
    
    public function cargaSoporteFisico($idpaciente, $idbateria, $idarea){
        
        $query_SoporteFisico   = "SELECT p.idpregunta
                                         ,p.pregunta
                                    	 ,r.idrespuesta
                                    	 ,r.pregunta_idpregunta 
                                    	 ,r.succion
                                    	 ,r.deglucion
                                    	 ,r.mordida
                                    	 ,r.busqueda
                                    	 ,r.moro
                                    	 ,r.presionpalmar
                                    	 ,r.noaplica
                                    	 ,r.otros
                                    	 ,r.normal
                                    	 ,r.alterada
                                    	 ,r.hipotonico
                                    	 ,r.hipertonico
                                    	 ,r.aumentada
                                    	 ,r.disminuida	
                                    FROM respuesta r, pregunta p
                                    WHERE r.usuario_idusuario1         = $idpaciente
                                    AND r.pregunta_bateria_idbateria   = 6
                                    AND r.pregunta_bateria_area_idarea = $idarea
                                    AND r.pregunta_idpregunta = p.idpregunta";
                                    
        $sql_SoporteFisico   = mysqli_query( $this->db->connect(), $query_SoporteFisico );
        
        $nro_SoporteFisico = mysqli_num_rows($sql_SoporteFisico);
        
        if( $nro_SoporteFisico > 0 ) 
        {
            while ( $row_SoporteFisico = mysqli_fetch_assoc( $sql_SoporteFisico) ) 
            {
                $arreglo_SoporteFisico[] = $row_SoporteFisico;
            }
            return $arreglo_SoporteFisico;
        }else{
            return false;
        }
    }
    
    public function respuestaSoporteFisico($idpaciente, $idrespuesta, $campo, $idoption, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET $campo = '$idoption'
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = $idbateria
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    //Aspectos comunicativos
    
    public function cargaAspectosComunicativos($idpaciente, $idbateria, $idarea){
        
        $query_AspectosComunicativos   = "SELECT 
                                             idrespuesta
                                        	 ,atenvisual 
                                            ,compmirobj 
                                        	 ,atenauditiva 
                                        	 ,mireschabla 
                                        	 ,interinteracc 
                                        	 ,resordsenc 
                                        	 ,comcor 
                                        	 ,vocalintencom 
                                        	 ,intercaras 
                                        	 ,vocalarvar 
                                        	 ,protoconv 
                                        	 ,gestindi 
                                        	 ,imitasilpal 
                                        	 ,vocainv 
                                        	 ,reconpal 
                                        	 ,imitacion 
                                        	 ,respordcomp
                                        FROM respuesta
                                        WHERE usuario_idusuario1         = $idpaciente
                                        AND pregunta_bateria_idbateria   = 7
                                        AND pregunta_bateria_area_idarea = $idarea";
                                    
        $sql_AspectosComunicativos   = mysqli_query( $this->db->connect(), $query_AspectosComunicativos );
        
        $nro_AspectosComunicativos = mysqli_num_rows($sql_AspectosComunicativos);
        
        if( $nro_AspectosComunicativos > 0 ) 
        {
            while ( $row_AspectosComunicativos = mysqli_fetch_assoc( $sql_AspectosComunicativos) ) 
            {
                $arreglo_AspectosComunicativos[] = $row_AspectosComunicativos;
            }
            return $arreglo_AspectosComunicativos;
        }else{
            return false;
        }
    }
    
    public function respuestaAspectosComunicativos($idpaciente, $idrespuesta, $campo, $idoption, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET $campo = '$idoption'
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 7
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    //Componente fonologico
    
    public function cargaComponentefonologico($idpaciente, $idbateria, $idarea){
        
        $query_Componentefonologico   = "SELECT p.idpregunta
                                         ,p.pregunta
                                    	 ,r.idrespuesta  
                                         ,r.sonfis_intel 
                                    	 ,r.bal_semintel 
                                    	 ,r.juesil_inintel
                                    FROM respuesta r, pregunta p
                                    WHERE r.usuario_idusuario1         = $idpaciente
                                    AND r.pregunta_bateria_idbateria   = 8
                                    AND r.pregunta_bateria_area_idarea = $idarea
                                    AND r.pregunta_idpregunta = p.idpregunta";
                                    
        $sql_Componentefonologico   = mysqli_query( $this->db->connect(), $query_Componentefonologico );
        
        $nro_Componentefonologico = mysqli_num_rows($sql_Componentefonologico);
        
        if( $nro_Componentefonologico > 0 ) 
        {
            while ( $row_Componentefonologico = mysqli_fetch_assoc( $sql_Componentefonologico) ) 
            {
                $arreglo_Componentefonologico[] = $row_Componentefonologico;
            }
            return $arreglo_Componentefonologico;
        }else{
            return false;
        }
    }
    
    public function respuestaComponentefonologico($idpaciente, $idrespuesta, $campo, $idoption, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET $campo = '$idoption'
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 8
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    //Cuadro fonologico
    
    public function cargaCuadrofonologico($idpaciente, $idbateria, $idarea){
        
        $query_Cuadrofonologico   = "SELECT p.idpregunta
                                        ,p.pregunta
                                        ,r.idrespuesta  
                                        ,r.p 
                                		,r.b 
                                		,r.m 
                                		,r.s 
                                		,r.ch
                                		,r.t 
                                		,r.d 
                                		,r.f 
                                		,r.j 
                                		,r.k 
                                		,r.g 
                                		,r.l 
                                		,r.n 
                                		,r.ll 
                                		,r.nn 
                                		,r.r 
                                		,r.rr
                                		,observaciones
                                    FROM respuesta r, pregunta p
                                    WHERE r.usuario_idusuario1         = $idpaciente
                                    AND r.pregunta_bateria_idbateria   = 9
                                    AND r.pregunta_bateria_area_idarea = $idarea
                                    AND r.pregunta_idpregunta = p.idpregunta";
                                    
        $sql_Cuadrofonologico   = mysqli_query( $this->db->connect(), $query_Cuadrofonologico );
        
        $nro_Cuadrofonologico = mysqli_num_rows($sql_Cuadrofonologico);
        
        if( $nro_Cuadrofonologico > 0 ) 
        {
            while ( $row_Cuadrofonologico = mysqli_fetch_assoc( $sql_Cuadrofonologico) ) 
            {
                $arreglo_Cuadrofonologico[] = $row_Cuadrofonologico;
            }
            return $arreglo_Cuadrofonologico;
        }else{
            return false;
        }
    }
    
    public function respuestaCuadrofonologico($idpaciente, $idrespuesta, $campo, $idoption, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET $campo = '$idoption'
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 9
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    //Componente semantico
    
    public function cargaComponenteSemantico($idpaciente, $idbateria, $idarea){
        
        $query_ComponenteSemantico = "SELECT p.idpregunta
                                        ,p.pregunta
                                    	,r.idrespuesta  
                                        ,r.id_cau_ef 
                                        ,r.nom_lug_obj
                                        ,r.clas_temp 
                                        ,r.def_med_fin
                                    FROM respuesta r, pregunta p
                                    WHERE r.usuario_idusuario1         = $idpaciente
                                    AND r.pregunta_bateria_idbateria   = 10
                                    AND r.pregunta_bateria_area_idarea = $idarea
                                    AND r.pregunta_idpregunta = p.idpregunta";
                                    
        $sql_ComponenteSemantico   = mysqli_query( $this->db->connect(), $query_ComponenteSemantico );
        
        $nro_ComponenteSemantico = mysqli_num_rows($sql_ComponenteSemantico);
        
        if( $nro_ComponenteSemantico > 0 ) 
        {
            while ( $row_ComponenteSemantico = mysqli_fetch_assoc( $sql_ComponenteSemantico) ) 
            {
                $arreglo_ComponenteSemantico[] = $row_ComponenteSemantico;
            }
            return $arreglo_ComponenteSemantico;
        }else{
            return false;
        }
    }
    
    public function respuestaComponenteSemantico($idpaciente, $idrespuesta, $campo, $idoption, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET $campo = '$idoption'
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 10
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    //Componente Morfosintactico
    
    public function cargaComponenteMorfosintactico($idpaciente, $idbateria, $idarea){
        
        $query_ComponenteMorfosintactico = "SELECT p.idpregunta
                                        ,p.pregunta
                                    	,r.idrespuesta  
                                        ,r.articulos 
                                		,r.sustantivos
                                		,r.verbos 
                                		,r.adjetivos 
                                		,r.preposiciones
                                		,r.genero 
                                		,r.numero 
                                		,r.diminutivo 
                                		,r.tiempo 
                                		,r.frasessimples 
                                		,r.frasescomplejas
                                    FROM respuesta r, pregunta p
                                    WHERE r.usuario_idusuario1         = $idpaciente
                                    AND r.pregunta_bateria_idbateria   = 11
                                    AND r.pregunta_bateria_area_idarea = $idarea
                                    AND r.pregunta_idpregunta = p.idpregunta";
                                    
        $sql_ComponenteMorfosintactico   = mysqli_query( $this->db->connect(), $query_ComponenteMorfosintactico );
        
        $nro_ComponenteMorfosintactico = mysqli_num_rows($sql_ComponenteMorfosintactico);
        
        if( $nro_ComponenteMorfosintactico > 0 ) 
        {
            while ( $row_ComponenteMorfosintactico = mysqli_fetch_assoc( $sql_ComponenteMorfosintactico) ) 
            {
                $arreglo_ComponenteMorfosintactico[] = $row_ComponenteMorfosintactico;
            }
            return $arreglo_ComponenteMorfosintactico;
        }else{
            return false;
        }
    }
    
    public function respuestaComponenteMorfosintactico($idpaciente, $idrespuesta, $campo, $idoption, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET $campo = '$idoption'
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 11
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    //Componente Pragmatico
    
    public function cargaComponentePragmatico($idpaciente, $idbateria, $idarea){
        
        $query_ComponentePragmatico = "SELECT p.idpregunta
                                        ,p.pregunta
                                    	,r.idrespuesta  
                                        ,r.contvisual 
                                        ,r.iniconver 
                                        ,r.ansiedad 
                                        ,r.finaltema 
                                        ,r.initema 
                                        ,r.mantema 
                                        ,r.cambtema 
                                        ,r.curiosidad 
                                        ,r.saludo 
                                        ,r.enojo 
                                        ,r.inicom
                                        ,r.alturno 
                                        ,r.sentevent
                                    FROM respuesta r, pregunta p
                                    WHERE r.usuario_idusuario1         = $idpaciente
                                    AND r.pregunta_bateria_idbateria   = 12
                                    AND r.pregunta_bateria_area_idarea = $idarea
                                    AND r.pregunta_idpregunta = p.idpregunta";
                                    
        $sql_ComponentePragmatico   = mysqli_query( $this->db->connect(), $query_ComponentePragmatico );
        
        $nro_ComponentePragmatico = mysqli_num_rows($sql_ComponentePragmatico);
        
        if( $nro_ComponentePragmatico > 0 ) 
        {
            while ( $row_ComponentePragmatico = mysqli_fetch_assoc( $sql_ComponentePragmatico) ) 
            {
                $arreglo_ComponentePragmatico[] = $row_ComponentePragmatico;
            }
            return $arreglo_ComponentePragmatico;
        }else{
            return false;
        }
    }
    
    public function respuestaComponentePragmatico($idpaciente, $idrespuesta, $campo, $idoption, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET $campo = '$idoption'
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 12
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    //Lenguaje Expresivo
    
    public function cargaLenguajeExpresivo($idpaciente, $idbateria, $idarea){
        
        $query_LenguajeExpresivo = "SELECT p.idpregunta
                                        ,p.pregunta
                                    	,r.idrespuesta  
                                        ,r.normal_si
                                        ,r.alterado_no
                                    FROM respuesta r, pregunta p
                                    WHERE r.usuario_idusuario1         = $idpaciente
                                    AND r.pregunta_bateria_idbateria   = 13
                                    AND r.pregunta_bateria_area_idarea = $idarea
                                    AND r.pregunta_idpregunta = p.idpregunta";
                                    
        $sql_LenguajeExpresivo   = mysqli_query( $this->db->connect(), $query_LenguajeExpresivo );
        
        $nro_LenguajeExpresivo = mysqli_num_rows($sql_LenguajeExpresivo);
        
        if( $nro_LenguajeExpresivo > 0 ) 
        {
            while ( $row_LenguajeExpresivo = mysqli_fetch_assoc( $sql_LenguajeExpresivo) ) 
            {
                $arreglo_LenguajeExpresivo[] = $row_LenguajeExpresivo;
            }
            return $arreglo_LenguajeExpresivo;
        }else{
            return false;
        }
    }
    
    public function respuestaLenguajeExpresivo($idpaciente, $idrespuesta, $campo, $idoption, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET $campo = '$idoption'
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 13
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    public function cargaLenguajeExpresivo2($idpaciente, $idbateria, $idarea){
        
        $query_LenguajeExpresivo2 = "SELECT p.idpregunta
                                        ,p.pregunta
                                    	,r.idrespuesta  
                                        ,r.respuesta
                                    FROM respuesta r, pregunta p
                                    WHERE r.usuario_idusuario1         = $idpaciente
                                    AND r.pregunta_bateria_idbateria   = 13
                                    AND r.pregunta_bateria_area_idarea = $idarea
                                    AND r.pregunta_idpregunta = p.idpregunta";
                                    
        $sql_LenguajeExpresivo2   = mysqli_query( $this->db->connect(), $query_LenguajeExpresivo2 );
        
        $nro_LenguajeExpresivo2 = mysqli_num_rows($sql_LenguajeExpresivo2);
        
        if( $nro_LenguajeExpresivo2 > 0 ) 
        {
            while ( $row_LenguajeExpresivo2 = mysqli_fetch_assoc( $sql_LenguajeExpresivo2) ) 
            {
                $arreglo_LenguajeExpresivo2[] = $row_LenguajeExpresivo2;
            }
            return $arreglo_LenguajeExpresivo2;
        }else{
            return false;
        }
    }
    
    public function respuestaLenguajeExpresivo2($idpaciente, $idrespuesta, $idoption, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET respuesta      = $idoption
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 13
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    // Lenguaje comprensivo
    public function cargaLenguajeComprensivo($idpaciente, $idbateria, $idarea){
        
        $query_LenguajeComprensivo = "SELECT p.idpregunta
                                        ,p.pregunta
                                    	,r.idrespuesta  
                                        ,r.respuesta
                                    FROM respuesta r, pregunta p
                                    WHERE r.usuario_idusuario1         = $idpaciente
                                    AND r.pregunta_bateria_idbateria   = 14
                                    AND r.pregunta_bateria_area_idarea = $idarea
                                    AND r.pregunta_idpregunta = p.idpregunta";
                                    
        $sql_LenguajeComprensivo   = mysqli_query( $this->db->connect(), $query_LenguajeComprensivo );
        
        $nro_LenguajeComprensivo = mysqli_num_rows($sql_LenguajeComprensivo);
        
        if( $nro_LenguajeComprensivo > 0 ) 
        {
            while ( $row_LenguajeComprensivo = mysqli_fetch_assoc( $sql_LenguajeComprensivo) ) 
            {
                $arreglo_LenguajeComprensivo[] = $row_LenguajeComprensivo;
            }
            return $arreglo_LenguajeComprensivo;
        }else{
            return false;
        }
    }
    
    public function respuestaLenguajeComprensivo($idpaciente, $idrespuesta, $idoption, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET respuesta      = $idoption
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 14
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    // Carga audicion
    public function cargaAudicion($idpaciente, $idbateria, $idarea){
        
        $query_Audicion = "SELECT p.idpregunta
                                        ,p.pregunta
                                    	,r.idrespuesta
                                    	,r.normal_si
                                    	,r.alterado_no
                                        ,r.respuesta
                                        ,r.oido_der
                                        ,r.oido_izqr
                                        ,r.observaciones
                                    FROM respuesta r, pregunta p
                                    WHERE r.usuario_idusuario1         = $idpaciente
                                    AND r.pregunta_bateria_idbateria   = 15
                                    AND r.pregunta_bateria_area_idarea = $idarea
                                    AND r.pregunta_idpregunta = p.idpregunta";
                                    
        $sql_Audicion   = mysqli_query( $this->db->connect(), $query_Audicion );
        
        $nro_Audicion = mysqli_num_rows($sql_Audicion);
        
        if( $nro_Audicion > 0 ) 
        {
            while ( $row_Audicion = mysqli_fetch_assoc( $sql_Audicion) ) 
            {
                $arreglo_Audicion[] = $row_Audicion;
            }
            return $arreglo_Audicion;
        }else{
            return false;
        }
    }
    
    public function respuestaAudicion($idpaciente, $idrespuesta, $normal_si, $alterado_no, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET normal_si      = $normal_si
                            ,alterado_no      = $alterado_no
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 15
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    public function respuestaAudicionSelect($idpaciente, $idrespuesta, $idoption, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET respuesta      = $idoption
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 15
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    public function respuestaAudicionObservaciones($idpaciente, $idrespuesta, $campo, $texto, $idbateria, $idarea){
 
        $query_upImpDiag = "UPDATE respuesta
                            SET $campo      = '$texto'
                            WHERE usuario_idusuario1 = $idpaciente
                            AND idrespuesta = $idrespuesta
                            AND pregunta_bateria_idbateria = 15
                            AND pregunta_bateria_area_idarea = $idarea";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    public function imprimirInformePsico($idpaciente)
    {
        $datos_informe = array();
        $padre         = 2;
        $madre         = 3;
        $idpsico       = 1;
        $cita_inf      = 2;

        /********************************************Datos del Paciente *********************************************************************************************************/
        $query_paciente = "SELECT CONCAT(tipdoc.tipo,' - ',doc.documento) documento
                                 ,CONCAT(pac.nombres, ' ', pac.primerapellido, ' ', IFNULL(pac.segundoapellido, ' ')) nombres
                                 ,CONCAT(pac.lugarnacimiento) lugarnacimiento
                                 ,pac.fechanacimiento 
                                 ,pac.edad 
                                 ,pac.meses
                                 ,pac.direccion 
                                 ,pac.ciudadresidencia
                                 ,pac.informante
                                 ,eps.razonsocial eps
                           FROM usuario pac
                                ,documento doc
                                ,tipodocumento tipdoc
                                ,eps
                           WHERE pac.idusuario = '$idpaciente'
                           AND pac.eps_ideps = eps.ideps
                           AND pac.documento_iddocumento = doc.iddocumento
                           AND doc.tipodocumento_idtipodocumento = tipdoc.idtipodocumento";

        $sql_paciente = mysqli_query($this->db->connect(),$query_paciente);

        $nro_filas_paciente = mysqli_num_rows( $sql_paciente);

        if ( $nro_filas_paciente > 0)
        {

            while ( $row_paciente = mysqli_fetch_assoc($sql_paciente))
            {
                $arreglo_paciente[] = $row_paciente;
            }

            $datos_informe['datospaciente'] = $arreglo_paciente;

            /***************************************************************Datos del Padre **************************************************************************************/
            $query_padre = "SELECT CONCAT(pad.nombres, ' ', pad.primerapellido, ' ', IFNULL(pad.segundoapellido, ' ')) nombres
                                  ,pad.edad edad
                                  ,esc.escolaridad 
                                  ,pad.ocupacion  
                                  ,pad.telefonocelular 
                                  ,pac.telefonofijo 
                           FROM usuario pac
                               ,usuario pad
                               ,afinidad af
                               ,escolaridad esc
                           WHERE pac.idusuario = '$idpaciente'
                           AND pac.idusuario = af.usuario_idusuario
                           AND af.idfamiliar = pad.idusuario
                           AND pad.parentesco_idparentesco = '$padre'
                           AND pad.escolaridad_idescolaridad = esc.idescolaridad";

            $sql_padre = mysqli_query($this->db->connect(),$query_padre);

            $nro_filas_padre = mysqli_num_rows( $sql_padre );

            if ( $nro_filas_padre > 0)
            {
                while ( $row_padre = mysqli_fetch_assoc($sql_padre))
                {
                    $arreglo_padre[] = $row_padre;
                }

                $datos_informe['datospadre'] = $arreglo_padre;

                /************************************************************************Datos Madre ******************************************************************************************************************/
                $query_madre = "SELECT CONCAT(pad.nombres, ' ', pad.primerapellido, ' ', IFNULL(pad.segundoapellido, ' ')) nombres
                                      ,pad.edad edad
                                      ,esc.escolaridad 
                                      ,pad.ocupacion  
                                      ,pad.telefonocelular 
                                      ,pac.telefonofijo 
                                FROM usuario pac
                                    ,usuario pad
                                    ,afinidad af
                                    ,escolaridad esc
                                WHERE pac.idusuario = '$idpaciente'
                                AND pac.idusuario = af.usuario_idusuario
                                AND af.idfamiliar = pad.idusuario
                                AND pad.parentesco_idparentesco = '$madre'
                                AND pad.escolaridad_idescolaridad = esc.idescolaridad";

                $sql_madre = mysqli_query($this->db->connect(),$query_madre);

                $nro_filas_madre = mysqli_num_rows( $sql_madre );

                if ( $nro_filas_madre > 0)
                {
                    while ( $row_madre = mysqli_fetch_assoc($sql_madre))
                    {
                        $arreglo_madre[] = $row_madre;
                    }

                    $datos_informe['datosmadre'] = $arreglo_madre;


                    /******************************************************************************Sesiones************************************************************************************************************/
                    $query_sesiones = "SELECT cit.fechacitaini  cita_inicial
                                             ,hst.fechacreacion entr_acudiente
                                             ,inf.fechacreacion fech_informe
                                             ,CONCAT(tera.nombres,' ', tera.primerapellido) psic
                                             ,ar.area
                                             ,tera.universidad       univ
                                             ,tera.tarjetaprofesional tarjp
                                             ,tera.registro       reg
                                             ,tera.firmadigital  firma
                                       FROM cita cit
                                           ,historiaclinica hst
                                           ,informe inf
                                            ,usuario tera
                                            ,area ar
                                       WHERE  cit.usuario_idusuario = '$idpaciente'
                                       AND cit.tipocita_idtipocita = '$cita_inf'
                                       AND cit.usuario_idusuario = hst.usuario_idusuario
                                       AND hst.area_idarea = '$idpsico'
                                       AND  inf.usuario_idusuario1 = hst.usuario_idusuario
                                       AND inf.area_idarea = hst.area_idarea
                                       AND inf.usuario_idusuario = tera.idusuario 
                                       AND inf.area_idarea = ar.idarea";

                    $sql_sesiones = mysqli_query($this->db->connect(),$query_sesiones);

                    $nro_filas_sesiones = mysqli_num_rows( $sql_sesiones );

                    if ( $nro_filas_sesiones > 0) {

                        while ($row_sesiones = mysqli_fetch_assoc($sql_sesiones)) {
                            $arreglo_sesiones[] = $row_sesiones;
                        }

                        $datos_informe['datossesiones'] = $arreglo_sesiones;

                        $query_valoracion = "SELECT fecha fch_val
                                            FROM programacion
                                            WHERE usuario_idusuario = '$idpaciente'
                                           AND area_idarea = '$idpsico'";

                        $sql_valoracion = mysqli_query($this->db->connect(),$query_valoracion);

                        $nro_filas_valoracion = mysqli_num_rows( $sql_valoracion );

                        if ( $nro_filas_valoracion > 0) {
                            while ($row_valoracion = mysqli_fetch_assoc($sql_valoracion)) {
                                $arreglo_valoracion[] = $row_valoracion;
                            }
                            $datos_informe['datosvaloracion'] = $arreglo_valoracion;

                            /******************************************************************************Constitucion Familiar************************************************************************************************/
                            $query_consfamiliar = "SELECT par.parentesco
                                                         ,CONCAT(fam.nombres, ' ' ,fam.primerapellido) nombres
                                                         ,fam.edad
                                                         ,fam.ocupacion                                                              
                                                   FROM  usuario fam
                                                        ,afinidad af
                                                        ,parentesco par
                                                   WHERE af.usuario_idusuario = '$idpaciente'
                                                   AND  af.idfamiliar = fam.idusuario
                                                   AND af.constfamiliar IS NOT NULL
                                                   AND  fam.parentesco_idparentesco = par.idparentesco";

                            $sql_consfamiliar = mysqli_query($this->db->connect(),$query_consfamiliar);

                            $nro_filas_consfamiliar = mysqli_num_rows( $sql_consfamiliar );

                            if ( $nro_filas_consfamiliar > 0) {
                                while ($row_consfamiliar = mysqli_fetch_assoc($sql_consfamiliar)) {
                                    $arreglo_consfamiliar[] = $row_consfamiliar;
                                }
                                $datos_informe['datosconsfamiliar'] = $arreglo_consfamiliar;

                                /******************************************************************************Datos Historia************************************************************************************************/
                                $query_historia = "SELECT t.institucion
                                                         ,t.profesion
                                                         ,t.tiempo
                                                         ,t.edad
                                                         ,t.duracion
                                                         ,t.resultados
                                                  FROM tratamiento t
                                                      ,historiaclinica h
                                                  WHERE h.usuario_idusuario = '$idpaciente'
                                                  AND t.historiaclinica_idhistoriaclinica= h.idhistoriaclinica";

                                $sql_historia = mysqli_query($this->db->connect(),$query_historia);

                                $nro_filas_historia = mysqli_num_rows( $sql_historia );

                                if ( $nro_filas_historia > 0)
                                {
                                    while ($row_historia = mysqli_fetch_assoc($sql_historia)) {
                                        $arreglo_historia[] = $row_historia;
                                    }
                                    $datos_informe['datoshistoria'] = $arreglo_historia;

                                    /******************************************************************************Datos Informe************************************************************************************************/
                                    $query_informe = "SELECT hst.motivoconsulta
                                                            ,dgn.diagnostico
                                                            ,inf.objetivo
                                                            ,inf.metodoeval
                                                            ,inf.resultados
                                                            ,inf.conclusiones
                                                            ,inf.recomendaciones
                                                      FROM historiaclinica hst
                                                          ,diagnostico dgn
                                                          ,informe inf
                                                      WHERE hst.usuario_idusuario = '$idpaciente'
                                                     AND hst.area_idarea = '$idpsico'
                                                     AND dgn.usuario_idusuario = hst.usuario_idusuario
                                                     AND dgn.historiaclinica_idhistoriaclinica = hst.idhistoriaclinica
                                                     AND inf.usuario_idusuario1 = hst.usuario_idusuario
                                                     AND inf.area_idarea = hst.area_idarea";

                                    $sql_informe = mysqli_query($this->db->connect(),$query_informe);

                                    $nro_filas_informe = mysqli_num_rows( $sql_informe );

                                    if ( $nro_filas_informe > 0)
                                    {
                                        while ($row_informe = mysqli_fetch_assoc($sql_informe)) {
                                            $arreglo_informe[] = $row_informe;
                                        }
                                        $datos_informe['datosinforme'] = $arreglo_informe;

                                        return $datos_informe;

                                    }else
                                    {
                                        return false;
                                    }


                                }else
                                {
                                    return false;
                                }
                            }else
                            {
                                return false;
                            }

                        }else
                        {
                            return false;
                        }


                    }else
                    {
                        return false;
                    }

                }else
                {
                    return false;
                }

            }else
            {
                return false;
            }

        }else
        {
            return false;
        }

    }
    
    
    
    /************************ INFORME FINAL FONOAUDIOLOGIA ************************/
    
    public function cargaFechaValoracion($idpaciente, $idarea){
        
        $query_consultaFchVal   = "SELECT fechacreacion 
                                    FROM historiaclinica 
                                    WHERE area_idarea = $idarea 
                                    AND usuario_idusuario = $idpaciente";
        
        $sql_consultaFchVal   = mysqli_query( $this->db->connect(), $query_consultaFchVal );
        
        $nro_consultaFchVal = mysqli_num_rows($sql_consultaFchVal);

        if( $nro_consultaFchVal > 0 ) 
        {              
            while ( $row_consultaFchVal = mysqli_fetch_assoc( $sql_consultaFchVal) ) 
            {
                $arreglo_consultaFchVal[] = $row_consultaFchVal;
            }
            return $arreglo_consultaFchVal;
        }else{
            return false;
        }
    }
    
    
    public function cargaFechaEntregaInforme($idpaciente, $idarea){
        
        $query_consultaFchVal   = "SELECT fechacreacion 
                                    FROM informe 
                                    WHERE area_idarea = $idarea 
                                    AND usuario_idusuario1 = $idpaciente";
        
        $sql_consultaFchVal   = mysqli_query( $this->db->connect(), $query_consultaFchVal );
        
        $nro_consultaFchVal = mysqli_num_rows($sql_consultaFchVal);

        if( $nro_consultaFchVal > 0 ) 
        {              
            while ( $row_consultaFchVal = mysqli_fetch_assoc( $sql_consultaFchVal) ) 
            {
                $arreglo_consultaFchVal[] = $row_consultaFchVal;
            }
            return $arreglo_consultaFchVal;
        }else{
            return false;
        }
    }
    
    public function consultarInformeFinalFono($idpaciente,$idarea ){
        $query_consultaInformeFinal   = "SELECT *
                                         FROM informe
                                         WHERE area_idarea = $idarea
                                         AND usuario_idusuario1 = $idpaciente";
                                    
        $sql_consultaInformeFinal   = mysqli_query( $this->db->connect(), $query_consultaInformeFinal );
            
        $nro_consultaInformeFinal = mysqli_num_rows($sql_consultaInformeFinal);
        
        if( $nro_consultaInformeFinal > 0 ) 
        {               
            while ( $row_consultaInformeFinal = mysqli_fetch_assoc( $sql_consultaInformeFinal) ) 
            {
                $arreglo_consultaInformeFinal[]= $row_consultaInformeFinal;
            }
            return $arreglo_consultaInformeFinal;
        }else{
            return false;
        }
    }

    
    public function crearInformeFinalFono($idpaciente, $idarea, $idterapeuta){
        
        $fecha = date("Y-m-d");
        
        $query_crearInformeFinalFono = "INSERT INTO informe (fechacreacion
                                                        ,usuario_idusuario
                                                        ,area_idarea
                                                        ,usuario_idusuario1)
                                    VALUES('$fecha'
                                           ,'$idterapeuta'
                                           ,'$idarea'
                                           ,'$idpaciente')";

        $sql_crearInformeFinalFono = mysqli_query($this->db->connect(),$query_crearInformeFinalFono);
        
        if($sql_crearInformeFinalFono){

        	$resultlast = mysqli_query($this->db->connect(),"SELECT MAX(idinforme) id FROM informe");
            $rowlast = mysqli_fetch_row($resultlast);
            $idInforme = $rowlast[0];
            
            /////////// EXTRA ORAL  //////////////
            
            //Boca
            $query_opciones1 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 1)";
            $sql_opciones1 = mysqli_query($this->db->connect(),$query_opciones1);
            
            //Labio superior
            $query_opciones2 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 2)";
            $sql_opciones2 = mysqli_query($this->db->connect(),$query_opciones2);
            
            //labio inferior
            $query_opciones3 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 3)";
            $sql_opciones3 = mysqli_query($this->db->connect(),$query_opciones3);
            
            /////////// INTRA ORAL  //////////////
            
            //Encia normal
            $query_opciones4 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 4)";
            $sql_opciones4 = mysqli_query($this->db->connect(),$query_opciones4);
            
            //color encia
            $query_opciones5 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 5)";
            $sql_opciones5 = mysqli_query($this->db->connect(),$query_opciones5);
            
            //sensibilidad encia
            $query_opciones6 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 6)";
            $sql_opciones6 = mysqli_query($this->db->connect(),$query_opciones6);
            
            //Boca seca
            $query_opciones7 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 7)";
            $sql_opciones7 = mysqli_query($this->db->connect(),$query_opciones7);
            
            /////////// CONFIGURACION OSEA  //////////////
            /*
            //Simetria facial
            $query_opciones8 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 8)";
            $sql_opciones8 = mysqli_query($this->db->connect(),$query_opciones8);
            
            //tono muscular
            $query_opciones9 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 9)";
            $sql_opciones9 = mysqli_query($this->db->connect(),$query_opciones9);
            
            //sensibilidad
            $query_opciones10 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 10)";
            $sql_opciones10 = mysqli_query($this->db->connect(),$query_opciones10);
            
            //movilidad
            $query_opciones11 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 11)";
            $sql_opciones11 = mysqli_query($this->db->connect(),$query_opciones11);
            */
            
            /////////// ALIMENTACION  //////////////
            
            //Fase anticipatoria
            $query_opciones12 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 12)";
            $sql_opciones12 = mysqli_query($this->db->connect(),$query_opciones12);
            
            //fase preparatoria
            $query_opciones13 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 13)";
            $sql_opciones13 = mysqli_query($this->db->connect(),$query_opciones13);
            
            //Fase oral
            $query_opciones14 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 14)";
            $sql_opciones14 = mysqli_query($this->db->connect(),$query_opciones14);
            
            //conclusioin
            $query_opciones15 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 15)";
            $sql_opciones15 = mysqli_query($this->db->connect(),$query_opciones15);
            
            
            /////////// CONDUCTAS PRELINGUISTICAS  //////////////
            
            //�0�7 Realiza movimientos con alguna parte del cuerpo, al escuchar que alguien le habla ?
            $query_opciones16 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 16)";
            $sql_opciones16 = mysqli_query($this->db->connect(),$query_opciones16);
            
            //�0�7 Sigue con los ojos la direcci��n de la mirada del adulto ?'
            $query_opciones17 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 17)";
            $sql_opciones17 = mysqli_query($this->db->connect(),$query_opciones17);
            
            //�0�7 Posee sonrisa social ?'
            $query_opciones18 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 18)";
            $sql_opciones18 = mysqli_query($this->db->connect(),$query_opciones18);
            
            //�0�7 El ni�0�9o(a) comprende cuando lo llaman por su nombre ?
            $query_opciones19 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 19)";
            $sql_opciones19 = mysqli_query($this->db->connect(),$query_opciones19);
            
            // El ni�0�9o(a) comprende palabras en diferentes contextos ?
            $query_opciones20 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 20)";
            $sql_opciones20 = mysqli_query($this->db->connect(),$query_opciones20);
            
            //�0�7 Responde a los juegos propuestos por el interlocutor ?'
            $query_opciones21 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 21)";
            $sql_opciones21 = mysqli_query($this->db->connect(),$query_opciones21);
            
            //�0�7 Imita s��labas y palabras ?
            $query_opciones22 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 22)";
            $sql_opciones22 = mysqli_query($this->db->connect(),$query_opciones22);
            
            //�0�7 Se�0�9ala partes de su cuerpo al solicit��rselo ?'
            $query_opciones23 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 23)";
            $sql_opciones23 = mysqli_query($this->db->connect(),$query_opciones23);
            
            /////////// LENGUAJE  //////////////
            
            //Lenguaje Expresivo
            $query_opciones24 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 24)";
            $sql_opciones24 = mysqli_query($this->db->connect(),$query_opciones24);
            
            //Lenguaje Comprensivo
            $query_opciones25 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 25)";
            $sql_opciones25 = mysqli_query($this->db->connect(),$query_opciones25);
            
            /////////// CONDUCTA Y HABITOS  //////////////
            
            //Conducta  y habitos
            $query_opciones26 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 26)";
            $sql_opciones26 = mysqli_query($this->db->connect(),$query_opciones26);
            
            /////////// COGNITIVO  //////////////
            
            //Cognitivo
            $query_opciones27 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 27)";
            $sql_opciones27 = mysqli_query($this->db->connect(),$query_opciones27);
            
            /////////// JUEGO  //////////////
            
            //Juego
            $query_opciones28 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 28)";
            $sql_opciones28 = mysqli_query($this->db->connect(),$query_opciones28);
            
            /////////// AREA SOCIAL  //////////////
            
            //Area social
            $query_opciones29 = "INSERT INTO opciones (informe_idinforme, examen_idexamen) VALUES ($idInforme, 29)";
            $sql_opciones29 = mysqli_query($this->db->connect(),$query_opciones29);
            
            
        	return $idInforme;

        }else{
            $idInforme = 0;
            return $idInforme;
        }
    }

    public function cargaDiagnostico($idinforme){

        $query_Diagnostico  = "SELECT idinforme
                                      ,resultados
                              FROM informe
                              WHERE idinforme = $idinforme";

        $sql_Diagnostico  = mysqli_query( $this->db->connect(), $query_Diagnostico );

        $nro_Diagnostico = mysqli_num_rows($sql_Diagnostico);

        if( $nro_Diagnostico > 0 )
        {
            while ( $row_Diagnostico = mysqli_fetch_assoc( $sql_Diagnostico) )
            {
                $arreglo_Diagnostico[] = $row_Diagnostico;
            }
            return $arreglo_Diagnostico;
        }else{
            return false;
        }
    }

    public function respuestaDiagnostico($idinforme,$texto){

        $query_upDiagnostico = "UPDATE informe
                                SET resultados = '$texto'
                                WHERE idinforme = $idinforme";

        $sql_upDiagnostico= mysqli_query($this->db->connect(),$query_upDiagnostico);

        if($sql_upDiagnostico){
            return true;
        }else
        {
            return false;
        }
    }
    
    public function cargaRecomendaciones($idinforme){
        
        $query_Recomendaciones   = "SELECT idinforme
                                         ,recomendaciones
                                    FROM informe
                                    WHERE idinforme = $idinforme";
                                    
        $sql_Recomendaciones   = mysqli_query( $this->db->connect(), $query_Recomendaciones );
        
        $nro_Recomendaciones = mysqli_num_rows($sql_Recomendaciones);
        
        if( $nro_Recomendaciones > 0 ) 
        {
            while ( $row_Recomendaciones = mysqli_fetch_assoc( $sql_Recomendaciones) ) 
            {
                $arreglo_Recomendaciones[] = $row_Recomendaciones;
            }
            return $arreglo_Recomendaciones;
        }else{
            return false;
        }
    }
    
    
    public function respuestaRecomendaciones($idinforme,$texto){
 
        $query_upRecomendaciones = "UPDATE informe
                                    SET recomendaciones = '$texto'
                                    WHERE idinforme = $idinforme";
                                   
        $sql_upRecomendaciones = mysqli_query($this->db->connect(),$query_upRecomendaciones);

        if($sql_upRecomendaciones){
          return true;
        }else
        {
         return false;
        }
    }
    
    
    //Sistema Estomatognatico
    
    public function cargaEstomatognatico($idinforme, $idexamen){
        
        $query_Estomato   = "SELECT idopciones
                                     ,examen_idexamen
                                     ,normal
                                     ,amplia
                                     ,pequena
                                     ,grueso
                                     ,corto
                                     ,evertido
                                     ,irregularidad
                                     ,encianormal
                                     ,amarillo
                                     ,blanco
                                     ,rojo
                                     ,otro
                                     ,hiposensible
                                     ,hipersensible
                                     ,si
                                     ,no
                                FROM opciones
                                WHERE informe_idinforme = $idinforme
                                AND examen_idexamen = $idexamen";
                                    
        $sql_Estomato   = mysqli_query( $this->db->connect(), $query_Estomato );
        
        $nro_Estomato = mysqli_num_rows($sql_Estomato);
        
        if( $nro_Estomato > 0 ) 
        {
            while ( $row_Estomato = mysqli_fetch_assoc( $sql_Estomato) ) 
            {
                $arreglo_Estomato[] = $row_Estomato;
            }
            return $arreglo_Estomato;
        }else{
            return false;
        }
    }
    
    public function respuestaEstomatognatico($idinforme,
                                            $idopciones,
                                            $idexamen,
                                            $campo,
                                            $idoption){
 
        $query_upImpDiag = "UPDATE opciones
                            SET  $campo   = '$idoption'
                            WHERE idopciones = $idopciones
                            AND informe_idinforme = $idinforme
                            AND examen_idexamen = $idexamen";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    public function cargaAlimentacion($idinforme, $idexamen){

        $query_Alimentacion   = "SELECT idopciones
                                       ,texto
                                FROM opciones
                                WHERE informe_idinforme = $idinforme
                                AND examen_idexamen     = $idexamen";
                                    
        $sql_Alimentacion   = mysqli_query( $this->db->connect(), $query_Alimentacion );
        
        $nro_Alimentacion = mysqli_num_rows($sql_Alimentacion);
        
        if( $nro_Alimentacion > 0 ) 
        {
            while ( $row_Alimentacion = mysqli_fetch_assoc( $sql_Alimentacion) ) 
            {
                $arreglo_Alimentacion[] = $row_Alimentacion;
            }
            return $arreglo_Alimentacion;
        }else{
            return false;
        }
    }
    
    public function respuestaAlimentacion($idinforme,
                                            $idopciones,
                                            $idexamen,
                                            $texto){
 
        $query_upImpDiag = "UPDATE opciones
                            SET    texto     = '$texto'
                            WHERE idopciones = $idopciones
                            AND informe_idinforme = $idinforme
                            AND examen_idexamen   = $idexamen";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }
    
    //Sistema Prelinguistico
    
    public function cargaPrelinguistico($idinforme, $idexamen){
        
        $query_Prelinguistico   = "SELECT idopciones
                                     ,si
                                     ,no
                                     ,algunas
                                     ,otro
                                     ,texto
                                FROM opciones
                                WHERE informe_idinforme = $idinforme
                                AND examen_idexamen = $idexamen";
                                    
        $sql_Prelinguistico   = mysqli_query( $this->db->connect(), $query_Prelinguistico );
        
        $nro_Prelinguistico = mysqli_num_rows($sql_Prelinguistico);
        
        if( $nro_Prelinguistico > 0 ) 
        {
            while ( $row_Prelinguistico = mysqli_fetch_assoc( $sql_Prelinguistico) ) 
            {
                $arreglo_Prelinguistico[] = $row_Prelinguistico;
            }
            return $arreglo_Prelinguistico;
        }else{
            return false;
        }
    }
    
    public function respuestaPrelinguistico($idinforme,
                                            $idopciones,
                                            $idexamen,
                                            $campo,
                                            $idoption){
 
        $query_upImpDiag = "UPDATE opciones
                            SET  $campo   = '$idoption'
                            WHERE idopciones = $idopciones
                            AND informe_idinforme = $idinforme
                            AND examen_idexamen = $idexamen";
                                   
        $sql_upImpDiag = mysqli_query($this->db->connect(),$query_upImpDiag);

        if($sql_upImpDiag){
          return true;
        }else
        {
         return false;
        }
    }

    public function actualizarCitaInformacion($fechaCitaIni,
                                              $idcita,
                                              $motivoConsulta,
                                              $expectativas,
                                              $recomTenerCta,
                                              $inFoGral,
                                              $idusuario,
                                              $pacienteIdTipoDocumento,
                                              $pacienteIdDocumento,
                                              $pacienteDocumento,
                                              $pacienteIdUsuario,
                                              $pacienteNombres,
                                              $pacientePrimerApellido,
                                              $pacienteSegundoApellido,
                                              $pacienteFechaNacimiento,
                                              $pacienteEdad,
                                              $pacienteMeses,
                                              $pacienteIdGenero,
                                              $pacienteIdEscolaridad,
                                              $pacienteTutela,
                                              $pacienteIdEps,
                                              $diagnosticos,
                                              $remitido,
                                              $madreIdTipoDocumento,
                                              $madreIdDocumento,
                                              $madreDocumento,
                                              $madreIdTipoUsuario,
                                              $madreIdUsuario,
                                              $madreNombres,
                                              $madrePrimerApellido,
                                              $madreSegundoApellido,
                                              $madreEdad,
                                              $madreIdEscolaridad,
                                              $madreOcupacion,
                                              $madreDireccion,
                                              $madreTelefonoFijo,
                                              $madreTelefonoCelular,
                                              $madreEmail,
                                              $padreIdTipoDocumento,
                                              $padreIdDocumento,
                                              $padreDocumento,
                                              $padreIdTipoUsuario,
                                              $padreIdUsuario,
                                              $padreNombres,
                                              $padrePrimerApellido,
                                              $padreSegundoApellido,
                                              $padreEdad,
                                              $padreIdEscolaridad,
                                              $padreOcupacion,
                                              $padreDireccion,
                                              $padreTelefonoFijo,
                                              $padreTelefonoCelular,
                                              $padreEmail,
                                              $acudienteIdTipoDocumento,
                                              $acudienteIdDocumento,
                                              $acudienteDocumento,
                                              $acudienteIdParentesco,
                                              $acudienteIdTipoUsuario,
                                              $acudienteIdUsuario,
                                              $acudienteNombres,
                                              $acudientePrimerApellido,
                                              $acudienteSegundoApellido,
                                              $acudienteEdad,
                                              $acudienteIdEscolaridad,
                                              $acudienteOcupacion,
                                              $acudienteDireccion,
                                              $acudienteTelefonoFijo,
                                              $acudienteTelefonoCelular,
                                              $acudienteEmail)
    {

        $hijo = 1; // Parentesco
        $madre = 3; // Parentesco
        $padre = 2; // Parentesco
        $acudiente = 5; // Parentesco
        $pariente = 4; // Tipo Usuario
        $cita_informacion = 2; // Cita Informacion
        $valor_df = " ";
        $exito = 1;
        $error = 0;

        $idPaciente = null;
        $idtipousuario = 4; // Pariente
        $estado_inactivo = 2; // Inactivo

        /* Se actualizan los datos del paciente  */
        $sql_upPaciente = $this->procesarUpUsuario($pacienteIdDocumento,
                                                   $pacienteDocumento,
                                                   $pacienteIdTipoDocumento,
                                                   $pacienteIdUsuario,
                                                   $valor_df,
                                                   $hijo,
                                                   $pacienteNombres,
                                                   $pacientePrimerApellido,
                                                   $pacienteSegundoApellido,
                                                   $pacienteFechaNacimiento,
                                                   $pacienteEdad,
                                                   $pacienteMeses,
                                                   $pacienteIdGenero,
                                                   $pacienteIdEscolaridad,
                                                   $valor_df,
                                                   $pacienteTutela,
                                                   $pacienteIdEps,
                                                   $valor_df,
                                                   $valor_df,
                                                   $valor_df,
                                                   $valor_df);
        if ($sql_upPaciente != $error)
        {
            /* Se actualizan los datos de Diagnostico del Paciente */
            $sql_upDiagnostico = $this->actualizarDiagnostico($diagnosticos, $remitido, $pacienteIdUsuario);

            if($sql_upDiagnostico)
            {
                if ($acudienteIdParentesco == $madre )
                {
                    $madreIdTipoUsuario = $acudiente;
                    $padreIdTipoUsuario = $idtipousuario;
                }elseif ($acudienteIdParentesco == $padre)
                {
                    $padreIdTipoUsuario = $acudiente;
                    $madreIdTipoUsuario = $idtipousuario;
                }elseif ($acudienteIdParentesco != $madre && $acudienteIdParentesco != $padre)
                {
                    $acudienteIdTipoUsuario = $acudiente;
                    $madreIdTipoUsuario     = $idtipousuario;
                    $padreIdTipoUsuario     = $idtipousuario;

                    if ($acudienteIdUsuario == "")
                    {
                        $sql_insAcudiente = $this->procesarInsUsuario( $acudienteDocumento,
                                                                       $acudienteIdTipoDocumento,
                                                                       $acudienteIdUsuario,
                                                                       $acudienteIdTipoUsuario,
                                                                       $estado_inactivo,
                                                                       $acudienteIdParentesco,
                                                                       $acudienteNombres,
                                                                       $acudientePrimerApellido,
                                                                       $acudienteSegundoApellido,
                                                                       $valor_df,
                                                                       $acudienteEdad,
                                                                       $valor_df,
                                                                       $valor_df,
                                                                       $acudienteIdEscolaridad,
                                                                       $acudienteOcupacion,
                                                                       $valor_df,
                                                                       $valor_df,
                                                                       $acudienteDireccion,
                                                                       $acudienteTelefonoFijo,
                                                                       $acudienteTelefonoCelular,
                                                                       $acudienteEmail);
                        if ($sql_insAcudiente == $error)
                        {
                            return false;
                        }
                    }else
                    {
                        $sql_upAcudiente = $this->procesarUpUsuario($acudienteIdDocumento,
                                                                    $acudienteDocumento,
                                                                    $acudienteIdTipoDocumento,
                                                                    $acudienteIdUsuario,
                                                                    $acudienteIdTipoUsuario,
                                                                    $acudienteIdParentesco,
                                                                    $acudienteNombres,
                                                                    $acudientePrimerApellido,
                                                                    $acudienteSegundoApellido,
                                                                    $valor_df,
                                                                    $acudienteEdad,
                                                                    $valor_df,
                                                                    $valor_df,
                                                                    $acudienteIdEscolaridad,
                                                                    $acudienteOcupacion,
                                                                    $valor_df,
                                                                    $valor_df,
                                                                    $acudienteDireccion,
                                                                    $acudienteTelefonoFijo,
                                                                    $acudienteTelefonoCelular,
                                                                    $acudienteEmail);
                        if ($sql_upAcudiente == false)
                        {
                            return false;
                        }
                    }
                }
                /*******************************************************************************************Se crea o actualiza la madre y el padre********************************************************************************************************/
                if ($madreIdUsuario == "")
                {
                    $sql_insMadre = $this->procesarInsUsuario( $madreDocumento,
                                                               $madreIdTipoDocumento,
                                                               $pacienteIdUsuario,
                                                               $madreIdTipoUsuario,
                                                               $estado_inactivo,
                                                               $madre,
                                                               $madreNombres,
                                                               $madrePrimerApellido,
                                                               $madreSegundoApellido,
                                                               $valor_df,
                                                               $madreEdad,
                                                               $valor_df,
                                                               $valor_df,
                                                               $madreIdEscolaridad,
                                                               $madreOcupacion,
                                                               $valor_df,
                                                               $valor_df,
                                                               $madreDireccion,
                                                               $madreTelefonoFijo,
                                                               $madreTelefonoCelular,
                                                               $madreEmail);
                    if ($sql_insMadre == $exito)
                    {
                        $sql_upMadre = true;
                    }else
                    {
                        $sql_upMadre = false;
                    }
                }else
                    {
                        $sql_upMadre = $this->procesarUpUsuario( $madreIdDocumento,
                                                                 $madreDocumento,
                                                                 $madreIdTipoDocumento,
                                                                 $madreIdUsuario,
                                                                 $madreIdTipoUsuario,
                                                                 $madre,
                                                                 $madreNombres,
                                                                 $madrePrimerApellido,
                                                                 $madreSegundoApellido,
                                                                 $valor_df,
                                                                 $madreEdad,
                                                                 $valor_df,
                                                                 $valor_df,
                                                                 $madreIdEscolaridad,
                                                                 $madreOcupacion,
                                                                 $valor_df,
                                                                 $valor_df,
                                                                 $madreDireccion,
                                                                 $madreTelefonoFijo,
                                                                 $madreTelefonoCelular,
                                                                 $madreEmail);
                    }
                if ($sql_upMadre)
                {
                    if ($padreIdUsuario == "")
                    {
                        $sql_insPadre = $this->procesarInsUsuario( $padreDocumento,
                                                                   $padreIdTipoDocumento,
                                                                   $pacienteIdUsuario,
                                                                   $padreIdTipoUsuario,
                                                                   $estado_inactivo,
                                                                   $padre,
                                                                   $padreNombres,
                                                                   $padrePrimerApellido,
                                                                   $padreSegundoApellido,
                                                                   $valor_df,
                                                                   $padreEdad,
                                                                   $valor_df,
                                                                   $valor_df,
                                                                   $padreIdEscolaridad,
                                                                   $padreOcupacion,
                                                                   $valor_df,
                                                                   $valor_df,
                                                                   $padreDireccion,
                                                                   $padreTelefonoFijo,
                                                                   $padreTelefonoCelular,
                                                                   $padreEmail);
                        if ($sql_insPadre == $error)
                        {
                            return false;
                        }
                    }else
                        {
                            $sql_upPadre = $this->procesarUpUsuario($padreIdDocumento,
                                                                    $padreDocumento,
                                                                    $padreIdTipoDocumento,
                                                                    $padreIdUsuario,
                                                                    $padreIdTipoUsuario,
                                                                    $padre,
                                                                    $padreNombres,
                                                                    $padrePrimerApellido,
                                                                    $padreSegundoApellido,
                                                                    $valor_df,
                                                                    $padreEdad,
                                                                    $valor_df,
                                                                    $valor_df,
                                                                    $padreIdEscolaridad,
                                                                    $padreOcupacion,
                                                                    $valor_df,
                                                                    $valor_df,
                                                                    $padreDireccion,
                                                                    $padreTelefonoFijo,
                                                                    $padreTelefonoCelular,
                                                                    $padreEmail);
                            if ($sql_upPadre == false)
                            {
                                return false;
                            }
                        }
                }else
                {
                    return false;
                }
                /***********************************************************************************************************************************************************************************************************************************/
                /* Se actualiza la Cita de Informacion */
                $sql_upCitaInformacion = $this->actualizarCita( $cita_informacion,
                                                                $idcita,
                                                                $fechaCitaIni,
                                                                $valor_df,
                                                                $valor_df,
                                                                $motivoConsulta,
                                                                $expectativas,
                                                                $recomTenerCta,
                                                                $inFoGral,
                                                                $idusuario);
                if ($sql_upCitaInformacion)
                {
                    //se convierte a cita de información
                    $query_upCita = "UPDATE cita
                                    SET tipocita_idtipocita = $cita_informacion
                                    WHERE usuario_idusuario = $pacienteIdUsuario";

                    $sql_upCita = mysqli_query($this->db->connect(),$query_upCita);

                    if($sql_upCita)
                    {
                        return true;
                    }else
                    {
                        return false;
                    }
                }else
                {
                    return false;
                }

            }else
            {
                return false;
            }
        }else
        {
            return false;
        }

    }
    public function ejecutarQuery($query)
    {
        $arreglo = array();

        $sql = mysqli_query($this->db->connect(), $query);
        $nro_registros = mysqli_num_rows($sql);
        if ($nro_registros)
        {
            while ($row = mysqli_fetch_assoc($sql))
            {
                $arreglo[] = $row;
            }
            return $arreglo;
        }else {
            return false;
        }
    }

    public function imprimirInformeFono($idpaciente, $idinforme)
    {
        $datos_informe = array();
        $mama = 3;
        $idareaFono = 3;
        $idareaPsico = 1;

        /**************************************************************************************************************Datos del Paciente *****************************************************************************************************************/

        $query_paciente = "SELECT CONCAT(tipdoc.tipo,' - ',doc.documento) documento
                                 ,CONCAT(pac.nombres, ' ', pac.primerapellido, ' ', IFNULL(pac.segundoapellido, ' ')) nombres
                                 ,CONCAT(pac.lugarnacimiento) lugarnacimiento
                                 ,pac.fechanacimiento
                                 ,pac.edad
                                 ,pac.direccion
                                 ,pac.ciudadresidencia
                                 ,CONCAT(fam.nombres,' ',fam.primerapellido) nombremam
                                 ,pac.informante
                                 ,eps.razonsocial eps
                           FROM usuario pac
                                ,usuario fam
                                ,afinidad af
                                ,documento doc
                                ,tipodocumento tipdoc
                                ,eps
                           WHERE pac.idusuario = '$idpaciente'
                           AND af.usuario_idusuario = pac.idusuario
                           AND af.idfamiliar = fam.idusuario
                           AND fam.parentesco_idparentesco = '$mama'
                           AND pac.eps_ideps = eps.ideps
                           AND pac.documento_iddocumento = doc.iddocumento
                           AND doc.tipodocumento_idtipodocumento = tipdoc.idtipodocumento";

        $query = $this->ejecutarQuery($query_paciente);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['datospaciente'] = $query;

        /*********************************************************************************************************Fecha Evaluacion Fonoaudiologia **********************************************************************************************************/

        $query_fech_eval = "SELECT fecha fecha_prog
                            FROM programacion
                            WHERE usuario_idusuario = '$idpaciente'
                            AND area_idarea = '$idareaFono'
                            ORDER BY fecha LIMIT 1";

        $query = $this->ejecutarQuery($query_fech_eval);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['fecha_eval'] = $query;

        /**************************************************************************************************************Fecha Entrega Informe ****************************************************************************************************************/
        $query_fecha_entregra = "SELECT fechacreacion fecha_crea
                                 FROM informe
                                 WHERE idinforme = '$idinforme'";

        $query = $this->ejecutarQuery($query_fecha_entregra);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['fecha_entr'] = $query;

        /********************************************************************************************Motivo Consulta - Remitido Por- Diagnosticos Previos*******************************************************************************************/

        $query_mot_rem_diag = "SELECT h.motivoconsulta
                                     ,r.remitidopor
                                     ,r.motivo
                                     ,d.diagnostico
                              FROM historiaclinica h
                                  ,remision r
                                  ,diagnostico d
                              WHERE h.usuario_idusuario = '$idpaciente'
                              AND h.area_idarea = '$idareaPsico'
                              AND h.idhistoriaclinica = d.historiaclinica_idhistoriaclinica
                              AND h.idhistoriaclinica = r.historiaclinica_idhistoriaclinica";

        $query = $this->ejecutarQuery($query_mot_rem_diag);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['mot_rem_diag'] = $query;

        /***********************************************************************************************Evaluacion del Sistema Estomatognatico  **********************************************************************************************/

        /**********************************************************************************************************Examen Extra Oral ********************************************************************************************************/

        /************************************************************************************************************* Boca ******************************************************************************************************************/

        $boca = 1;
        $query_boca = "SELECT  normal                             
                              ,amplia
                              ,pequena
                      FROM opciones
                      WHERE informe_idinforme = '$idinforme'
                      AND examen_idexamen     = $boca";

        $query = $this->ejecutarQuery($query_boca);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['boca'] = $query;

        /******************************************************************************************************************Labio Superior*******************************************************************************************************************/
        $labiosupgr = 2;

        $query_lab_sub_grueso = "SELECT grueso
                                       ,corto
                                       ,normal
                                       ,evertido
                                       ,irregularidad
                                 FROM opciones
                                 WHERE informe_idinforme = '$idinforme'
                                 AND examen_idexamen     = '$labiosupgr'";

        $query = $this->ejecutarQuery($query_lab_sub_grueso);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['labiosup'] =  $query;

        /****************************************************************************************************************Labio Inferior******************************************************************************************************************/
        $labioinfgr = 3;
        $query_lab_inf_grueso = "SELECT grueso
                                       ,corto
                                       ,normal
                                       ,evertido
                                 FROM opciones
                                 WHERE informe_idinforme = '$idinforme'
                                 AND examen_idexamen     = '$labioinfgr'";

        $query = $this->ejecutarQuery($query_lab_inf_grueso);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['labioinf'] = $query;

        /****************************************************************************************************************Examen Intraoral ***************************************************************************************************************/
        /************************************************************************************************************  Encia Normal ********************************************************************************************************************/
        $encianormal = 4;

        $query_enc_normal = "SELECT normal 
                            FROM   opciones
                            WHERE informe_idinforme = '$idinforme'
                            AND examen_idexamen     = '$encianormal'";

        $query = $this->ejecutarQuery($query_enc_normal);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['encnormal'] = $query;

        /*****************************************************************************************************************Color Encia*********************************************************************************************************************/

        $colorencia = 5;
        $query_color_enc = "SELECT normal 
                                  ,amarillo
                                  ,blanco
                                  ,rojo
                                  ,otro
                            FROM   opciones
                            WHERE informe_idinforme = '$idinforme'
                            AND examen_idexamen     = '$colorencia'";

        $query = $this->ejecutarQuery($query_color_enc);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['enccolor'] = $query;

        /**********************************************************************************************************Sensibilidad Encia******************************************************************************************************************/
        $senencia = 6;
        $query_sen_enc = "SELECT normal
                                ,hiposensible
                                ,hipersensible
                         FROM opciones
                         WHERE informe_idinforme = '$idinforme'
                         AND examen_idexamen     = '$senencia'";

        $query = $this->ejecutarQuery($query_sen_enc);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['encsen'] = $query;

        /************************************************************************************************************* Boca Seca ********************************************************************************************************************/
        $bocaseca = 7;

        $query_boca_seca = "SELECT si
                                  ,no
                            FROM opciones
                            WHERE informe_idinforme = '$idinforme'
                            AND examen_idexamen     = '$bocaseca'";
        $query = $this->ejecutarQuery($query_boca_seca);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['bocaseca'] = $query;
        /**************************************************************************************************CONFIGURACION OSEA******************************************************************************************************************************/
        /******************************************************************************************************** Simetria Facial**************************************************************************************************************************/
        $simetriafac = 106;
        $query_sim_facial = "SELECT normal
                                   ,alterada
                             FROM respuesta
                             WHERE usuario_idusuario1 = '$idpaciente'
                             AND pregunta_idpregunta  = '$simetriafac' ";

        $query = $this->ejecutarQuery($query_sim_facial);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['simfacial'] = $query;

        /********************************************************************************************************* Tono muscular ****************************************************************************************************************************/
        $tonmuscular = 107;
        $query_ton_muscular = "SELECT normal
                                     ,hipotonico
                                     ,hipertonico
                               FROM respuesta
                               WHERE usuario_idusuario1 = '$idpaciente'
                               AND pregunta_idpregunta  = '$tonmuscular'";

        $query = $this->ejecutarQuery($query_ton_muscular);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['tonmuscular'] = $query;

        /*************************************************************************************************************Sensibilidad ***********************************************************************************************************************/
        $sensibilidad = 108;
        $query_sensibilidad = "SELECT normal
                                     ,aumentada
                                     ,disminuida
                               FROM respuesta
                               WHERE usuario_idusuario1 = '$idpaciente'
                               AND pregunta_idpregunta  = '$sensibilidad' ";

        $query = $this->ejecutarQuery($query_sensibilidad);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['sensibilidad'] = $query;

        /************************************************************************************************************ Movilidad  **************************************************************************************************************************/

        $movilidad = 109;
        $query_movilidad = "SELECT normal
                                  ,alterada
                            FROM respuesta
                            WHERE usuario_idusuario1 = '$idpaciente'
                            AND pregunta_idpregunta  = '$movilidad'";

        $query = $this->ejecutarQuery($query_movilidad);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['movilidad'] = $query;

        /**********************************************************************************************************ALIMENTACION******************************************************************************************************************************/
        /********************************************************************************************************  Fase Anticipatoria ***********************************************************************************************************************/
        $faseant = 11;
        $query_fase_ant = "SELECT texto faseant
                           FROM opciones 
                           WHERE informe_idinforme = '$idinforme'
                           AND examen_idexamen = '$faseant'";

        $query = $this->ejecutarQuery($query_fase_ant);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['faseantp'] = $query;

        /*********************************************************************************************************************Fase Preparatoria ***********************************************************************************************************/
        $fasepre = 12;
        $query_fase_pre = "SELECT texto fasepre
                           FROM opciones
                           WHERE informe_idinforme = '$idinforme'
                           AND examen_idexamen = '$fasepre'";

        $query = $this->ejecutarQuery($query_fase_pre);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['faseprep'] = $query;

        /************************************************************************************************************************Fase Oral*********************************************************************** ******************************************/

        $faseoral = 13;
        $query_fase_oral = "SELECT texto faseoral
                            FROM opciones 
                            WHERE informe_idinforme = '$idinforme'
                            AND examen_idexamen = '$faseoral'";
        $query = $this->ejecutarQuery($query_fase_oral);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['faseorl'] = $query;

        /***************************************************************************************************************Conclusion*************************************************************************************************************************/
        $conclusion = 14;
        $query_conclusion = "SELECT texto
                             FROM opciones 
                             WHERE informe_idinforme = '$idinforme'
                             AND examen_idexamen = '$conclusion'";

        $query = $this->ejecutarQuery($query_conclusion);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['conclusion'] = $query;

        /****************************************************************************************************************************CONDUCTA PRELINGUISTICA********************************************************************************************/
        /******************************************************************************************************************** Realiza Movimientos ******************************************************************************************************/

        $movimiento = 15;
        $query_movimiento = "SELECT si
                                   ,no
                                  ,texto
                             FROM opciones 
                             WHERE informe_idinforme = '$idinforme'
                             AND examen_idexamen = '$movimiento'";

        $query = $this->ejecutarQuery($query_movimiento);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['movimiento'] = $query;

        /**************************************************************************************************************** Sigue con los ojos  ***********************************************************************************************************/

        $sigueojos = 16;
        $query_sigue_ojos = "SELECT si
                                   ,no
                                   ,algunas
                                   ,texto
                             FROM opciones 
                             WHERE informe_idinforme = '$idinforme'
                             AND examen_idexamen = '$sigueojos'";

        $query = $this->ejecutarQuery($query_sigue_ojos);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['sigueojos'] = $query;

        /************************************************************************************************************* Posee sonrisa social  ************************************************************************************************************/
        $sonrisa = 17;
        $query_sonrisa = "SELECT si
                                ,no
                                ,algunas
                                ,texto
                          FROM opciones 
                          WHERE informe_idinforme = '$idinforme'
                          AND examen_idexamen = '$sonrisa'";

        $query = $this->ejecutarQuery($query_sonrisa);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['sonrisa'] =  $query;

        /************************************************************************************************************* Comprende llaman nombre  ************************************************************************************************************/
        $comprendenom = 18;
        $query_comp_nom = "SELECT si
                                 ,no
                          FROM opciones 
                          WHERE informe_idinforme = '$idinforme'
                          AND examen_idexamen = '$comprendenom'";

        $query = $this->ejecutarQuery($query_comp_nom);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['compnom'] = $query;

        /*************************************************************************************************************** Comprende palabras  **************************************************************************************************************/
        $comprendepal = 19;
        $query_comp_pal = "SELECT si
                                 ,no
                           FROM opciones 
                           WHERE informe_idinforme = '$idinforme'
                           AND examen_idexamen = '$comprendepal'";

        $query = $this->ejecutarQuery($query_comp_pal);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['comppal']  = $query;

        /************************************************************************************************************* Responde a los juegos ***************************************************************************************************************/
        $juegos = 20;
        $query_juegos = "SELECT si
                               ,no
                               ,algunas
                               ,otro
                         FROM opciones 
                         WHERE informe_idinforme = '$idinforme'
                         AND examen_idexamen = '$juegos'";

        $query = $this->ejecutarQuery($query_juegos);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['juegos'] = $query;

        /********************************************************************************************************************** Imita silabas **************************************************************************************************************/
        $imitasil = 21;
        $query_imita_sil = "SELECT si
                                  ,no
                            FROM opciones 
                            WHERE informe_idinforme = '$idinforme'
                            AND examen_idexamen = '$imitasil'";

        $query = $this->ejecutarQuery($query_imita_sil);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['imitasil'] = $query;

        /************************************************************************************************************** Señala partes *********************************************************************************************************************/
        $senpartes = 22;
        $query_sen_partes = "SELECT si
                                   ,no
                             FROM opciones 
                             WHERE informe_idinforme = '$idinforme'
                             AND examen_idexamen = '$senpartes'";

        $query = $this->ejecutarQuery($query_sen_partes);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['senpartes'] = $query;

        /****************************************************************************************************************************LENGUAJE**************************************************************************************************************/
        /***************************************************************************************************************************Lenguaje Expresivo  ****************************************************************************************************/
        $expr = 23;
        $query_expr = "SELECT texto
                       FROM opciones 
                       WHERE informe_idinforme = '$idinforme'
                       AND examen_idexamen = '$expr'";

        $query = $this->ejecutarQuery($query_expr);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['expr'] = $query;

        /************************************************************************************************************************ Lenguaje Comprensivo *****************************************************************************************************/
        $compr = 24;
        $query_compr = "SELECT texto
                        FROM opciones 
                        WHERE informe_idinforme = '$idinforme'
                        AND examen_idexamen = '$compr'";
        $query = $this->ejecutarQuery($query_compr);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['compr'] =  $query;

        /**************************************************************************************************************CONDUCTA Y HABITOS******************************************************************************************************************/
        $habitos = 25;
        $query_habitos = "SELECT texto
                          FROM opciones 
                          WHERE informe_idinforme = '$idinforme'
                          AND examen_idexamen = '$habitos'";

        $query = $this->ejecutarQuery($query_habitos);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['habitos'] = $query;

        /***************************************************************************************************************COGNITIVO**************************************************************************************************************************/
        $cognitivo = 26;
        $query_cognitivo = "SELECT texto
                            FROM opciones 
                            WHERE informe_idinforme = '$idinforme'
                            AND examen_idexamen = '$cognitivo'";

        $query = $this->ejecutarQuery($query_cognitivo);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['cognitivo'] = $query;

        /********************************************************************************************************************************JUEGO*************************************************************************************************************************************************************************************************************************/
        $juego = 27;
        $query_juego = "SELECT texto
                        FROM opciones 
                        WHERE informe_idinforme = '$idinforme'
                        AND examen_idexamen = '$juego'";

        $query = $this->ejecutarQuery($query_juego);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['juego'] = $query;

        /**************************************************************************************************************************AREA SOCIAL*************************************************************************************************************/
        $areasocial = 28;
        $query_area_social = "SELECT texto
                              FROM opciones 
                              WHERE informe_idinforme = '$idinforme'
                              AND examen_idexamen = '$areasocial'";
        $query = $this->ejecutarQuery($query_area_social);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['areasoc'] = $query;

        /**********************************************************************************************************DIAGNOSTICOS Y RECOMENDACIONES***********************************************************************************************************/
        $query_diag_recom = "SELECT resultados
                                   ,recomendaciones
                            FROM informe
                            WHERE idinforme = '$idinforme'";
        $query = $this->ejecutarQuery($query_diag_recom);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['diagrecom'] = $query;

        /*************************************************************************************************************DATOS TERAPEUTA*********************************************************************************************************************/
        $query_datos_tera = "SELECT u.firmadigital  firma
                                   ,CONCAT(u.nombres, u.primerapellido) fono
                                   ,a.area
                                   ,u.universidad
                                   ,u.tarjetaprofesional
                                   ,u.registro
                             FROM usuario u
                                 ,informe i
                                 ,area a
                             WHERE u.idusUario = i.usuario_idusuario
                             AND u.area_idarea = a.idarea
                             AND i.usuario_idusuario1 = '$idpaciente'";
        $query = $this->ejecutarQuery($query_datos_tera);

        if (!is_array($query))
        {
            return false;
        }

        $datos_informe['datostera'] = $query;

        /**************************************************************************************************************************************************************************************************************************************************/

        return $datos_informe;

    }
    /******************************************************************************************************************************************************************************************************************************************************
     *                                                                                                  TERAPIA OCUPACIONAL
    ********************************************************************************************************************************************************************************************************************************************************/
    function crearHistoriaTEO($idpaciente, $idarea, $idTerapeuta)
    {
        $fecha = date("Y-m-d");
        $query_crearHistoriaTeo = "INSERT INTO historiaclinica(area_idarea, usuario_idusuario, usuario_idusuario1, fechacreacion)
                                    VALUES ('$idarea','$idpaciente','$idTerapeuta','$fecha')";
        $sql_crearHistoriaTeo = mysqli_query($this->db->connect(),$query_crearHistoriaTeo);

        if ($sql_crearHistoriaTeo)
        {
            $resultlast = mysqli_query($this->db->connect(), "SELECT MAX(idhistoriaclinica) id FROM historiaclinica");
            $rowlast = mysqli_fetch_row($resultlast);
            $idhistoria = $rowlast[0];

            /*******************************************************Antecedentes Familiares*****************************************************************************************/
            $idant_familiar = 2;
            $query_insAntecedenteFam = "INSERT INTO antecedente(tipoantecedente_idtipoantecedente, historiaclinica_idhistoriaclinica) VALUES ('$idant_familiar', '$idhistoria')";
            $sql_insAntecedenteFam = mysqli_query($this->db->connect(), $query_insAntecedenteFam);

            /*******************************************************Antecedentes Prenatales*****************************************************************************************/
            $idant_prenatal = 4;
            $query_insAntecedentePre = "INSERT INTO antecedente(tipoantecedente_idtipoantecedente, historiaclinica_idhistoriaclinica) VALUES ('$idant_prenatal', '$idhistoria')";
            $sql_insAntecedentePre = mysqli_query($this->db->connect(), $query_insAntecedentePre);
            /*******************************************************Antecedentes Posnatales*****************************************************************************************/
            $idant_posnatal = 5;
            $query_insAntecedentePos = "INSERT INTO antecedente(tipoantecedente_idtipoantecedente, historiaclinica_idhistoriaclinica) VALUES ('$idant_posnatal', '$idhistoria')";
            $sql_insAntecedentePos = mysqli_query($this->db->connect(), $query_insAntecedentePos);
            /*******************************************************Antecedentes Patologicos*****************************************************************************************/
            $idant_patologico = 6;
            $query_insAntecedentePat = "INSERT INTO antecedente(tipoantecedente_idtipoantecedente, historiaclinica_idhistoriaclinica) VALUES ('$idant_patologico', '$idhistoria')";
            $sql_insAntecedentePat = mysqli_query($this->db->connect(), $query_insAntecedentePat);
            /*******************************************************Antecedentes Quirurgicos*****************************************************************************************/
            $idant_quirurgico = 7;
            $query_insAntecedenteQui = "INSERT INTO antecedente(tipoantecedente_idtipoantecedente, historiaclinica_idhistoriaclinica) VALUES ('$idant_quirurgico', '$idhistoria')";
            $sql_insAntecedenteQui = mysqli_query($this->db->connect(), $query_insAntecedenteQui);
            /*******************************************************Antecedentes Farmacologicos*****************************************************************************************/
            $idant_farmacologico = 8;
            $query_insAntecedenteFarm = "INSERT INTO antecedente(tipoantecedente_idtipoantecedente, historiaclinica_idhistoriaclinica) VALUES ('$idant_farmacologico', '$idhistoria')";
            $sql_insAntecedenteFarm = mysqli_query($this->db->connect(), $query_insAntecedenteFarm);
            /*******************************************************Antecedentes Terapeuticos*****************************************************************************************/
            $idant_terapuetico = 9;
            $query_insAntecedenteTera = "INSERT INTO antecedente(tipoantecedente_idtipoantecedente, historiaclinica_idhistoriaclinica) VALUES ('$idant_terapuetico', '$idhistoria')";
            $sql_insAntecedenteTera = mysqli_query($this->db->connect(), $query_insAntecedenteTera);

            return $idhistoria;
        }else
            {
                return 0;
            }

    }
    function consultarHistoriaTEO($idpaciente, $idarea)
    {
        $query_consultaHistoria   = "SELECT *
                                    FROM historiaclinica
                                    WHERE usuario_idusuario = $idpaciente
                                    AND area_idarea = $idarea";

        $sql_consultaHistoria   = mysqli_query( $this->db->connect(), $query_consultaHistoria );

        $nro_consultaHistoria = mysqli_num_rows($sql_consultaHistoria);

        if( $nro_consultaHistoria > 0 )
        {
            while ( $row_consultaHistoria = mysqli_fetch_assoc( $sql_consultaHistoria) )
            {
                $arreglo_consultaHistoria[]= $row_consultaHistoria;
            }
            return $arreglo_consultaHistoria;
        }else{
            return false;
        }
    }

    function consultarFechaProgramacion($idpaciente)
    {
        $idarea = 5;

        $query_fecha_pro = "SELECT fecha fecha_prog
                            FROM programacion
                            WHERE usuario_idusuario = '$idpaciente'
                            AND area_idarea = '$idarea'
                            ORDER BY fecha LIMIT 1";

        $sql_fecha_prog = mysqli_query( $this->db->connect(), $query_fecha_pro );

        $nro_fecha_prog = mysqli_num_rows($sql_fecha_prog);

        if ( $nro_fecha_prog > 0 )
        {
            while ($row_fecha_prog= mysqli_fetch_assoc( $sql_fecha_prog ) )
            {
                $arreglo_fecha_prog[] = $row_fecha_prog;
            }
        }else
        {
            return false;
        }

        return $arreglo_fecha_prog;

    }


    function consultarDatosPaciente( $idPaciente )
    {
        $query_datosPaciente = "SELECT u.nombres
                                      ,u.primerapellido
                                      ,u.segundoapellido
                                      ,u.fechanacimiento
                                      ,u.edad
                                      ,tp.tipo
                                      ,d.documento
                                      ,e.escolaridad
                                      ,ep.razonsocial
                               FROM usuario u
                                   ,tipodocumento tp
                                   ,documento d
                                   ,escolaridad e
                                   ,eps ep
                               WHERE idusuario = '$idPaciente'
                               AND u.documento_iddocumento = d.iddocumento
                               AND d.tipodocumento_idtipodocumento = tp.idtipodocumento
                               AND u.escolaridad_idescolaridad = e.idescolaridad
                               AND u.eps_ideps = ideps";

        $sql_datosPaciente = mysqli_query( $this->db->connect(), $query_datosPaciente );

        $nro_datosPaciente = mysqli_num_rows($sql_datosPaciente);

        if ( $nro_datosPaciente > 0 )
        {
            while ($row_datosPaciente = mysqli_fetch_assoc( $sql_datosPaciente ) )
            {
                $arreglo_datosPaciente[] = $row_datosPaciente;
            }
        }else
            {
            return false;
        }

        return $arreglo_datosPaciente;

    }

    /**CONSULTA DE INFORMACION WEB ADMIN
    **/

    
    
    public function error( $tipoError )  {
        
        $error = array();
        $message = null;
        
        /**
        * Tipo Error   Descripcion
        *     1        Error session
        *     2        No existen datos en la tabla
        *     3        Usuario incorrecto
        *     4        El usuario no tiene mesasa asignadas
        *     5        Error insertando los registros en la tabla
        */
        switch($tipoError) {
            case 0:
                  $message = "Error carga inicial de datos";
                  break;
            case 1: 
                   $message = "Error en session";  
                   break;
            case 2:   
                   $message = "No existen datos en la tabla";
                   break;
            case 3:
                   $message = "Error cargando datos Usuario";
                   break;
            case 4:
                   $message = "El usuario no tiene mesas asignadas";  
                   break;      
            case 5:
                   $message = "Error insertando datos en la tabla";
                   break;
            case 6:
                   $message = "Error actualizando datos en la tabla";
                   break;
            case 7:
                   $message = "Error leyendo datos de la tabla";
                   break;
        }
        
        $error['success'] = "0";
        $error['error']   = $message;
        
        return $error;
    }
          
}

?>