<?php

function insertUser($nombre,$apellido1,$apellido2,$email, $password, $telefono,$direccion,$poblacion,
					$provincia,$pais,$codigo_postal,$numero_documento,$tipo_documento, $iban, $conn){
	
	echo "inicia insertUser...";
	echo "recibido: nombre= $nombre"; 	
	/*
	$consulta = "INSERT INTO usuarios (nombre,apellido1, " +
													"apellido2," +
													"email, " +
													"telefono, " +
													"direccion, " +
													"poblacion, " +
													"provincia, " +
													"pais, " +
													"codigo_postal, " +
													"numero_documento, " +
													"tipo_documento, " +
													"iban" +
													") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";	
	$stmt = $conn->prepare($consulta);
	echo "enlazando parametros...";	
	//ssssissssisss
	$stmt->bind_param("sssssssssssss", $nombre,$apellido1,$apellido2,$email,$telefono,$direccion,$poblacion,$provincia,$pais,$codigo_postal,
			$numero_documento, $tipo_documento,$iban);			
	echo "ejecutando consulta...";	
	$stmt->execute();
	echo "New records created successfully";
	$stmt->close();	
	*/	
	/***********************/
	
	$consulta = "INSERT INTO usuarios(nombre,apellido1,apellido2,email,password,telefono,direccion,poblacion,provincia,pais,codigo_postal,numero_documento,tipo_documento,iban)" .
				"VALUES('" . $nombre . "','" . $apellido1 . "','" . $apellido2 . "','" .
						$email . "','" . $password . "'," . $telefono . ",'" . $direccion . "','" . $poblacion . "','" . $provincia . "','" . $pais . "'," . $codigo_postal . ",'" . 
						$numero_documento . "','" . $tipo_documento . "','" . $iban . "')";	
						
	echo "ejecutando consulta...";
	echo "consulta = $consulta";		
	
	if (mysqli_query($conn, $consulta)) {
			echo "New record created successfully";
	} else {
			echo "Error: " . $consulta . "<br>" . mysqli_error($conn);
			throw new Exception($conn);			
	}					
	/***********************/


	
}

?>