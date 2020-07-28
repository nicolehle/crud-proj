<?php
	session_start();

	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "mysql");
	define("DB_DATABASE", "crud");

	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')");
		$_SESSION['message'] = "Address saved";
		header('location: index.php');
	}
