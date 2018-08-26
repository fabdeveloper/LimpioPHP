<?php

/* RUTAS en TEST ***************************/

// SERVER TEST
//define("SERVER", "http://localhost/fab/");

// BD TEST
//define("SERVER_NAME_DB", "localhost");
//define("USER_NAME_DB", "root");
//define("PASSWORD_DB", "nomelase");
//define("DB_NAME", "Test_Environment");

/* RUTAS en PROD ***************************/

// SERVER PROD
define("SERVER", "http://fabo-t.000webhostapp.com/");

// BD
define("SERVER_NAME_DB", "localhost");
define("USER_NAME_DB", "id6656439_fabdeveloper");
define("PASSWORD_DB", "Nomelase'1");
define("DB_NAME", "id6656439_alfa");

/* *****************************************/

// LOGIN
// loginForm
//define("LOGIN_FORM", SERVER . "login/loginForm.html");
define("LOGIN_FORM", SERVER . "login/LoginManager.php");

// LoginManager
define("LOGIN_MANAGER", SERVER . "login/LoginManager.php");

// loginError
define("LOGIN_ERROR", SERVER . "login/loginError.html");

// Olvido su password ?
define("OLVIDO", SERVER . "login/olvido.html");



// USER
// new user form
define("NEW_USER_FORM", SERVER . "user/NewUserForm.php");
// new user error
define("NEW_USER_ERROR", SERVER . "user/newUserError.html");

// user saver
define("USER_SAVER", SERVER . "user/UserSaver.php");

// user Manager
define("USER_MANAGER", SERVER . "user/UserManager.php");



// CURRICULUM
// checklist
// ChecklistManager
define("CHECKLIST_MANAGER", SERVER . "user/curriculum/checklistManager.php");
// otro manager
define("OTRO_MANAGER", SERVER . "curriculum/OtroManager.php");


// HOME
// home
define("HOME", SERVER . "home/home.php");

// PUBLIC
// index.php
define("PUBLIC_INDEX", SERVER . "public/index.php");


?>