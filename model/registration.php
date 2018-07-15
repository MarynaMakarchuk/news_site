<?php
//Регистрация пользователя
function userRegistration($userName, $firstName, $lastName, $password, $userEmail){
	$db_handle = new DBController();	
	$query = "INSERT INTO registered_users (user_name, first_name, last_name, user_password, user_email) VALUES
	('" . $userName . "', '" . $firstName . "', '" . $lastName . "', '" . $password . "', '" . $userEmail . "')";
	$result = $db_handle->booleanQuery($query);
	return $result;
}
//Проверяет существует ли уже такое имя пользователя
function checkUserName(){
	$db_hendle = new DBController;
	$query = "SELECT user_name, user_email FROM registered_users";
    $result = $db_hendle->runSelectQuery($query);
    return $result;
}
?>