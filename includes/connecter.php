<?php 
	$dsn    = "mysql:host=localhost;dbname=IGEPFE";
	$user   = "root";
	$pass   = "12345";
	$option = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

        $connexion = null;

	try{
		$connexion = new PDO($dsn,$user, $pass, $option);
		$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo $e.getMessage();
	}

?>
