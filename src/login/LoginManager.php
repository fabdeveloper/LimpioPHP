<?php
session_start();

//print  "iniciando LoginManager";

require '../conf/configFile.php'; //echo "cargado modulo de configuracion" . "<br>";echo "home en : " . HOME;
require('../user/UserObject.php');
require '../db/DBManager.php'; 

$servername = SERVER_NAME_DB;
$username = USER_NAME_DB;
$password = PASSWORD_DB;
$dbname = DB_NAME;

$dBManager = new DBManager($servername, $username, $password, $dbname);
$dBManager->init();
$userObject = new UserObject();

if ( ! empty( $_POST ) ) {
	if ( isset( $_POST['email'] ) && isset( $_POST['password'] ) ) {
		$password = $_POST["password"];
		$email = $_POST["email"];
		//$_SESSION['email'] = $email;
	}
}
// existe usuario
$queryResult = $dBManager->executeQuery($userObject->getAllQuery($email));
$emailexists = $dBManager->getNumRows($queryResult);

if(!$emailexists){// EL EMAIL NO EXISTE
	//header('Location:' . LOGIN_ERROR);	
	//echo "<h1>Email desconocido</h1><br>";
			
}else{
	$row = $dBManager->getNextRow($queryResult);	
	 $passwordDB = $row["password"];	
	 $passwordValidation = $passwordDB === $password;
	 //echo "id_usuario = " . $row["id_usuario"];
	 if(!$passwordValidation){// PASSWORD INCORRECTO
	 	//header('Location:' . LOGIN_ERROR);	
	 	//echo "<h1>Password incorrecto</h1><br>";
	 	 
	 
	 }else{// ACCESO PERMITIDO			 	
			 $_SESSION['id_usuario'] = $row["id_usuario"];
			 $_SESSION['email'] = $row["email"];
			 $_SESSION['password'] = $row["password"];
			 $_SESSION['nombre'] = $row["nombre"];
			 $_SESSION['apellido1'] = $row["apellido1"];
			 $_SESSION['apellido2'] = $row["apellido2"];
			 $_SESSION['telefono'] = $row["telefono"];
			 $_SESSION['direccion'] = $row["direccion"];
			 $_SESSION['poblacion'] = $row["poblacion"];
			 $_SESSION['provincia'] = $row["provincia"];
			 $_SESSION['pais'] = $row["pais"];
			 $_SESSION['codigo_postal'] = $row["codigo_postal"];
			 $_SESSION['numero_documento'] = $row["numero_documento"];
			 $_SESSION['tipo_documento'] = $row["tipo_documento"];
			 $_SESSION['IBAN'] = $row["IBAN"];
			 $_SESSION['tipo_user'] = $row["tipo_user"];
			 $_SESSION['valido'] = $row["valido"];
			 $_SESSION['fecha_creacion'] = $row["fecha_creacion"];
			 $_SESSION['fecha_ultimoacceso'] = $row["fecha_ultimoacceso"];
			 $_SESSION['fecha_nacimiento'] = $row["fecha_nacimiento"];				 

	 		header('Location:' . HOME);	 		
	 }	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
 <link rel="stylesheet" type="text/css" href="../css/TopNav2.css">
  <link rel="stylesheet" type="text/css" href="../css/Body.css"> 
</head>
<body>
	<div class="topnav">
	  	<a class="active" href="#login">Login</a>	
		<a href="<?php  echo OLVIDO; ?>">Olvido su password ?</a>
		<a href="<?php  echo NEW_USER_FORM; ?>">Nuevo usuario ?</a>
		<div class="login-container">
			<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<input  placeholder="Username" type="text" name="email" required="required">
				<input placeholder="Password" 	type="password" name="password" >
				<button	type="submit">Login</button>
			</form>
		</div>
	</div>	
	<div>
		<?php 
		if(!$emailexists){	echo "<h1>Email desconocido</h1><br>"; }
		elseif (!$passwordValidation) {echo "<h1>Password incorrecto</h1><br>";}		
		?>
	</div>
</body>
</html>
