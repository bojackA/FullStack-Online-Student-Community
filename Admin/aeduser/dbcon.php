<?php
	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASS = '';
	$DB_NAME = 'file_upload';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "file_upload";
  
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	if(!$conn){
	  echo "Database connection error".mysqli_connect_error();
	}
  
?>