<?php  
	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "paglaom2");

	//create database connection
	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	//test if connection succeeded
	if(mysqli_connect_errno()){
		die("Database Connection Failed: " . 
			mysql_connect_errno() .
				"(" . mysql_connect_errno() .")"
		); 
	}
?>