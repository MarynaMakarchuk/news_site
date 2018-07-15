<?php
require_once 'db_conect.php';
// Авторизация администратора
function adminAuthorization($user_name, $password){
	$db_hendle = new DBController;
	$query = "SELECT * FROM admin_users WHERE admin_name='" . $user_name . "' and admin_password = '". $password."'";
	$row = $db_hendle->runSelectQuery($query);
	return $row;
	}
	
// Приветствие пользователя после успешной авторизации
function userName(){
	$db_hendle = new DBController;
	$query = "SELECT * FROM registered_users WHERE user_id='" . $_SESSION["user_id"] . "'";
	$row = $db_hendle->runQuery($query);
	return $row['first_name'];
}
?>






