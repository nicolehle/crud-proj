<?php
	session_start();

	// practice purpose

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
	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	// INSERT DATA
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')");
		$_SESSION['message'] = "Address saved";
		header('location: index.php');
	}

	// UPDATE DATA
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];

	mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
	$_SESSION['message'] = "Address updated!";
	header('location: index.php');
}
