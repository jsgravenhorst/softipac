<?php 
    include('../directiva.php');
    
    $usuario    = $_SESSION['nom_usuario'];
    $idusuario  = $_SESSION['idusuario'];
    $areausr    = $_SESSION['idarea'];
?>

    <div class="sidebar-container"> 
        <div class="logo">
            <h3>Apa Autismo Cali</h3>
        </div> <!-- .logo -->
        
        <div class="user-meta">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                    Bienvenido<i class="fa fa-angle-down"></i>
                    <span><?php echo"$usuario"; ?></span>
                </button>
                <div class="dropdown-menu">
                    <!--<li><a href="#" class="dropdown-item"><i class="fa fa-cog"></i>Perfil</a></li>-->
                    <li><a href="../logout.php" class="dropdown-item"><i class="fa fa-sign-out"></i>Salir</a></li>
                </div>
            </div> <!-- .dropdown-menu -->
        </div><!-- .user-meta -->
        
        <ul class="sidebar-nav">
            <li>
                <a href="panel.php"><i class="fa fa-fw fa-th"></i> Men&uacute;</a>
            </li>
            
            <li>
                <a href="panel_citas.php"><i class="fa fa-fw fa-list-alt"></i> Citas</a>
            </li>
            
            <li>
                <a href="panel_evaluacion.php"><i class="fa fa-fw fa-book"></i> Evaluaci&oacute;n Inicial</a>
            </li>
            <!--<li>
                <a href="panel_evolucion.php"><i class="fa fa-fw fa-address-card"></i> Evoluciones</a>
            </li>-->
            <li>
                <a href="pacientes_listado.php"><i class="fa fa-fw fa-users"></i> Listado Pacientes</a>
            </li>
            <li>
                <a href="panel_usuario.php"><i class="fa fa-fw fa-male"></i> Usuarios</a>
            </li>
        </ul>    
        
    </div><!-- .sidebar-container -->