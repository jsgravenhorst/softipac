<?php 
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    if(!isset($_SESSION['auth']) == "yes"){
      header("location:../index.php");
    } else {
      if(isset($_POST['cerrar'])){
      session_unset();
      session_destroy();
      header("location:index.php");
      }
    }
