<?php


	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "student_web";

	$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName); 

	if(!$connection)
		die("Database connection failed!");

?>