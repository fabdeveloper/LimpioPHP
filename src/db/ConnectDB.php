<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";
$conn = null;

function connectDB($servername,$username,$password,$dbname,$conn){
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		throw new Exception($conn);
	}	
	else{
		//echo "CONECTADO !!";
	}
	return $conn;	
}
?>
