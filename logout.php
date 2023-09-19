<?php
    include 'admin/error.php';
	session_start();
	session_destroy();
	//session_unset($_SESSION['USERNAME']);
	//session_unset($_SESSION['ROLE']);
	//session_unset($_SESSION['ID']);
	header("Location:index.php");
	die();
?>