<?php
session_start();

require '../../conf/configFile.php';

if(!isset($_SESSION['id_usuario'])){header("Location: " . LOGIN_FORM);}
else { $id_usuario = $_SESSION['id_usuario']; }
	


//echo "id_usuario = " . $id_usuario;
// objeto checklist
require 'ChecklistObject.php';
$checklist = new ChecklistObject($id_usuario);

// gestor de BD
require '../../db/DBManager.php';

try {	
	$servername = SERVER_NAME_DB;
	$username = USER_NAME_DB;
	$password = PASSWORD_DB;
	$dbname = DB_NAME;
	$DBManager = new DBManager($servername, $username, $password, $dbname);
	$DBManager->init();
	
	// inicializar el form con datos de BD	
	$row = $DBManager->getNextRow($DBManager->executeQuery($checklist->getChecklistQuery()));
	
	$carnet = $row['carnet'];
	$vehiculo = $row['vehiculo'];
	$ingles = $row['ingles'];
	$aleman = $row['aleman'];
	$catalan = $row['catalan'];
	$cocina = $row['cocina'];
	$plancha = $row['plancha'];
	$cuidado_personas = $row['cuidado_personas'];
	$canguro = $row['canguro'];
	/*
	echo "carnet = " . $carnet;
	echo "vehiculo = " . $vehiculo;
	echo "ingles = " . $ingles;
	echo "leman = " . $aleman;
	echo "atalan = " . $catalan;
	echo "cocina = " . $cocina;
	echo "plancha = " . $plancha;
	echo "cuidado_personas = " . $cuidado_personas;
	echo "canguro = " . $canguro;
*/	
	
	$DBManager->closeDB();	
	
}catch (Exception $e){
	echo "Exception = " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
 <link rel="stylesheet" type="text/css" href="../../css/TopNav2.css">
 <link rel="stylesheet" type="text/css" href="../../css/Body.css">
  <link rel="stylesheet" type="text/css" href="../../css/Checkbox.css">
 
</head>
<body>
	<div class="topnav">
		<a href="<?php  echo HOME; ?>" > Home </a>
		<a href="<?php  echo USER_MANAGER; ?>" > Gestion de usuarios </a>
		<a class = "active" href="#checklist" > Checklist </a>
	</div>
	
	
	<h1>Titulo</h1>

	
	<form  action = "<?php  echo OTRO_MANAGER; ?>" method="post">
		<div >
		<ul>
		<label class="container">Carnet de conducir
			<input type="checkbox" name="carnet" <?php if ($carnet){ echo "checked"; }; ?>>
		  <span class="checkmark"></span>
		</label>
		<label class="container">Vehículo
			<input type="checkbox" name="vehiculo" <?php if ($vehiculo){ echo "checked"; }; ?>>
		  <span class="checkmark"></span>
		</label>
		<label class="container">Ingles
			<input type="checkbox" name="ingles" <?php if ($ingles){ echo "checked"; }; ?>>
		  <span class="checkmark"></span>
		</label>
		<label class="container">Aleman
			<input type="checkbox" name="aleman" <?php if ($aleman){ echo "checked"; }; ?>>
		  <span class="checkmark"></span>
		</label>
		<label class="container">Catalan
			<input type="checkbox" name="catalan" <?php if ($catalan){ echo "checked"; }; ?>>
		  <span class="checkmark"></span>
		</label>
		<label class="container">Cocina
			<input type="checkbox" name="cocina"  <?php if ($cocina){ echo "checked"; }; ?>>
		  <span class="checkmark"></span>
		</label>
		<label class="container">Plancha
			<input type="checkbox" name="plancha" <?php if ($plancha){ echo "checked"; }; ?>>
		  <span class="checkmark"></span>
		</label>
		<label class="container">Cuidado de personas
			<input type="checkbox" name="cuidado_personas" <?php if ($cuidado_personas){ echo "checked"; }; ?>>
		  <span class="checkmark"></span>
		</label>
		<label class="container">Canguro
			<input type="checkbox" name="canguro" <?php if ($canguro){ echo "checked"; }; ?>>
		  <span class="checkmark"></span>
		</label>
		</ul>
		 <input type="submit">
		</div>
	</form>
</body>
</html>