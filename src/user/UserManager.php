<?php
session_start();
$usuarioexiste = (isset($_SESSION['id_usuario']))? 1:0;

//echo "usuario existe = " . $usuarioexiste . "<br>";
//echo "email = " . $_POST['email'] . "<br>";

require '../conf/configFile.php';

if((!$usuarioexiste) and  (!isset($_POST['email']))){ header("Location: " . NEW_USER_FORM);}

// cargar datos de BD si existe el usuario
require 'UserObject.php';
$userObject = new UserObject();

if($usuarioexiste){ // logeado
	$userObject->setUser($_SESSION);	
}else{ // nuevo usuario
	$userObject->set_email($_POST['email']);
	$userObject->set_password($_POST['password']);
	
	// comprobar email
	require '../db/DBManager.php';
	
	$servername = SERVER_NAME_DB;
	$username = USER_NAME_DB;
	$password = PASSWORD_DB;
	$dbname = DB_NAME;
	$dbManager = new DBManager($servername, $username, $password, $dbname);
	$dbManager->init();
	
	//$queryAll = $userObject->getAllQuery($_POST['email']);
	$count = $dbManager->getNumRows($dbManager->executeQuery($userObject->getAllQuery($_POST['email'])));
	if($count > 0){	header('Location: ' . NEW_USER_ERROR);} // el email existe
} 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Datos de usuario</title>
 <link rel="stylesheet" type="text/css" href="../css/TopNav2.css">
 <link rel="stylesheet" type="text/css" href="../css/Body.css">
  <link rel="stylesheet" type="text/css" href="../css/Forms.css">
 
</head>
<body>
	<div class="topnav">
		<a  href="<?php  echo HOME; ?>" > Home </a>
		<a class = "active" href="#gestion_de_usuarios" > Gestion de usuarios </a>
		<a href="<?php  echo CHECKLIST_MANAGER; ?>" > Checklist </a>
	</div>
	<form action="<?php  echo USER_SAVER; ?>" method="post">
		<div >
		    <label for="email">Email</label>		
			<input type="text" name="email" value="<?php  echo "" . $userObject->get_email(); ?>" required="required">
			<label for="password">Password</label>			
			<input type="text" name="password" value="<?php echo "" . $userObject->get_password(); ?>"  required="required"><br><br>			
		</div>	
		<div >
			<label for="nombre">Nombre</label>			
			<input type="text" name="nombre" value="<?php  echo "" . $userObject->get_nombre(); ?>"  required="required">
			<label for="apellido1">Apellido</label>			
			<input type="text" name="apellido1" value="<?php  echo "" . $userObject->get_apellido1(); ?>"  required="required">
			<label for="apellido2">Apellido (2)</label>			
			<input type="text" name="apellido2" value="<?php  echo "" . $userObject->get_apellido2(); ?>" ><br>
			<label for="telefono">Telefono</label>			
			<input type="text" name="telefono" value="<?php  echo "" . $userObject->get_telefono(); ?>" required="required"><br>			
		</div>
		<div >
			<label for="direccion">Direccion</label>			
			<input type="text" name="direccion" value="<?php  echo "" . $userObject->get_direccion(); ?>" ><br>
			<label for="poblacion">Poblacion</label>			
			<input type="text" name="poblacion" value="<?php  echo "" . $userObject->get_poblacion(); ?>" >
			<label for="provincia">Provincia</label>			
			<input type="text" name="provincia" value="<?php  echo "" . $userObject->get_provincia(); ?>" >
			<label for="pais">Pais</label>			
			<input type="text" name="pais" value="<?php  echo "" . $userObject->get_pais(); ?>" >
			<label for="codigo_postal">Codigo postal</label>			
			<input type="text" name="codigo_postal" value="<?php  echo "" . $userObject->get_codigo_postal(); ?>" ><br>
		</div>
		<div >
			<label for="numero_documento">Numero documento</label>			
			<input type="text" name="numero_documento" value="<?php  echo "" . $userObject->get_numero_documento(); ?>" >
			<label for="tipo_documento">Tipo documento</label>			
			<select name="tipo_documento"><option value="DNI">DNI</option><option value="NIE">NIE</option><option value="Pasaporte">Pasaporte</option><option value="Otro">Otro</option></select><br>
		</div>
		<div>
			<label for="iban">IBAN</label>			
			<input type="text" name="iban" value="<?php  echo "" . $userObject->get_IBAN(); ?>" >
		</div>
		<input type="submit">
	</form>
</body>
</html>