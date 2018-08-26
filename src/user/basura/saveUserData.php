<?php

try {
	// conectar DB 
	echo "Empieza."; 
	require '../db/ConnectDB.php'; echo "cargado modulo.";

	$username = "root";
	$password = "nomelase";
	$dbname = "Test_Environment";
	$conn = connectDB($servername,$username,$password,$dbname,$conn);


	
	$nombre = $_POST["nombre"]; 
	$apellido1 = $_POST["apellido1"];
	$apellido2 = $_POST["apellido2"];
	$email = $_POST["email"];
	$password = $_POST["password"];	
	$telefono = $_POST["telefono"];
	$direccion = $_POST["direccion"];
	$poblacion = $_POST["poblacion"];
	$provincia = $_POST["provincia"];
	$pais = $_POST["pais"];
	$codigo_postal = $_POST["codigo_postal"];
	$numero_documento = $_POST["numero_documento"];
	$tipo_documento = $_POST["tipo_documento"];
	$iban = $_POST["iban"];
	
	
	require 'insertUser.php'; echo "cargado modulo insertUser.php";
	
	insertUser($nombre, $apellido1, $apellido2, $email, $password, $telefono, $direccion, $poblacion, $provincia, $pais, $codigo_postal, $numero_documento, $tipo_documento, $iban, $conn);
	
	
	
	
	// cerrar DB
	require '../db/CloseDB.php';
	closeDB($conn);

}catch (Exception $e){
	echo $e->errorMessage();
}


?>