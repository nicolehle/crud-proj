<?php
	session_start();

	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "mysql");
	define("DB_DATABASE", "crud");

	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

	if (!$db) {
		die("Connection failed: " . mysqli_connect_error());
	}

/*
	$sql = "INSERT INTO info (name, address) VALUES
	            ('John', 'Rambo')";
	if(mysqli_query($db, $sql)){
	    echo "Records added successfully.";
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
	}
*/

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')");
		$_SESSION['message'] = "Address saved";
		header('location: index.php');
	}
