<?php
session_start();

require '../conf/configFile.php';

if(!isset($_SESSION['email'])){header("Location: " . LOGIN_FORM);}
if(isset($_SESSION['id_usuario'])){ $id_usuario = $_SESSION['id_usuario']; }

// gestor de checklist
require 'ChecklistObject.php';
$checklist = new ChecklistObject($id_usuario);
$checklist->setItemsValuesFromPost($_POST);

// gestor de BD
require '../../db/DBManager.php';

$servername = SERVER_NAME_DB;
$username = USER_NAME_DB;
$password = PASSWORD_DB;
$dbname = DB_NAME;

$insertado = false;

try{
		$DBManager = new DBManager($servername, $username, $password, $dbname);
		$DBManager->init();
		
		$deleteQuery = $checklist->getDeleteChecklistQuery();
		$DBManager->executeQuery($deleteQuery);
		
		$insertQuery = $checklist->getInsertChecklistQuery(); 
		$DBManager->executeQuery($insertQuery);			
		$insertado = true;
		$DBManager->closeDB();

}catch (Exception $e){
	echo "Exception en OtroManager: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Saving Data</title>
</head>
<body>
<h1>
<?php 
	$mensaje = ($insertado)? "Curriculum actualizado" :  "Error grabando datos";
	echo $mensaje;
?>
</h1><br>

<a href="<?php  echo HOME; ?>">Home</a><br>
<a href="<?php  echo USER_MANAGER; ?>">Gestion de usuarios</a><br>
<a href="<?php  echo CHECKLIST_MANAGER; ?>">Checklist</a><br>

</body>
</html>

