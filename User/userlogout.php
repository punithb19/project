<?php 
	SESSION_START();

	$_SESSION == array();
	session_destroy();
	header("Location: ../dbms.php")
 ?>