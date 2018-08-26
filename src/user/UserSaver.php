<?php
session_start();

require '../conf/configFile.php';

require 'UserObject.php';
$userObject = new UserObject();

require '../db/DBManager.php';
$servername = SERVER_NAME_DB;
$username = USER_NAME_DB;
$password = PASSWORD_DB;
$dbname = DB_NAME;
$dbManager = new DBManager($servername, $username, $password, $dbname);
$dbManager->init();


$userObject->setUser($_POST);
$userObject->set_id_usuario($_SESSION['id_usuario']);

// usuario nuevo o actualizacion ?

$id_usuario = $_SESSION['id_usuario'];
if($id_usuario > 0){
	$query = $userObject->getUpdateUserQuery();
}else{
	$query = $userObject->getInsertUserQuery();	
}

$result = $dbManager->executeQuery($query);

if($result){
	echo "Ha ido bien.";
}else{
	echo "<h1>Error grabando los datos</h1>";	
}

echo "<br><br>" . "la query : " . $query;


?>
