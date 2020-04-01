<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$BasedeDatos = "3294270_cinepolis";

	try {

		$conn = new PDO("mysql:host=$servername;dbname=$BasedeDatos",$username, $password) ;

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		
		
	} 

	catch (PDOException $e) {

		echo "<div align='center'><h1>No me conecte</h1></div>".$e->getMessage();
		
	}

 ?>