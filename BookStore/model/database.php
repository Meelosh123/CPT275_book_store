<?php

	//sets database connection variables
	$dsn = 'mysql:host=pdb3.your-hosting.net;dbname=2191257_bstore';
	$username = '2191257_bstore';
	$password = 'CPT2752016';

	//creates DB connection, includes database_error.php page if fail
	//database_error.php not yet available
	try {
		$db = new PDO($dsn, $username, $password);
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		include('database_error.php');
		exit();
	}
?>