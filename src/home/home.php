<?php
session_start();

require '../conf/configFile.php';

if ( isset( $_SESSION['id_usuario'] ) ) {
	// Grab user data from the database using the user_id
	// Let them access the "logged in only" pages
} else {
	// Redirect them to the login page
	header("Location: " . LOGIN_FORM);
	//header("Location: http://localhost/fab/login/LoginManager.php");
	
}

?>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="../css/TopNav2.css">
 <link rel="stylesheet" type="text/css" href="../css/Body.css">
</head>
<body>
<div class="topnav">
<a class = "active" href="#home" > Home </a>
<a href="<?php  echo USER_MANAGER; ?>" > Gestion de usuarios </a>
<a href="<?php  echo CHECKLIST_MANAGER; ?>" > Checklist </a>
</div>
<div style="padding-left:100px">
<h1>Esta es la HOME</h1>
</div>
<?php  require '../test/newfile.php';?>
</body>



</html>