<?php 
error_reporting(E_ALL ^ E_NOTICE);
session_start();

if ($_SESSION['token'] == $_GET['token'] )
	{
		session_unset();
		session_destroy();
		header("location:index.php");
	}
?>
