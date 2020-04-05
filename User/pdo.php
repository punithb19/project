<?php 
	try{
	$pdo = new PDO ('mysql:host=localhost;port=3307;dbname=ppp','root' , ' ' );
	//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	}
	catch(PDOException $error){
		$error->getMessage();

	}

 ?>

