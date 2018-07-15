<?php
require_once 'model/registration.php';

// Проверяем все ли поля заполнены 
if(!empty($_POST['register_user'])){
foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	$error_message = 'All fields are required!';
	}
}

// Проверяем существует ли пользователь с заданными $user_name
foreach($users=checkUserName() as $data){
	$name[] = $data['user_name'];
	$email[] = $data['user_email'];
		foreach ($name as $usersName){
			if($usersName == $_POST['userName']){
			$error_message = 'Such user name has already used!';
			}
		}
}

// Сопоставляем пароль
if($_POST['password'] != $_POST['confirm_password']){ 
$error_message = 'Passwords should be the same!<br>'; 
}

// Проверяем email
if(!isset($error_message)) {
	if (!filter_var( $_POST['userEmail'], FILTER_VALIDATE_EMAIL)) {
	$error_message = 'Invalid email address!';
	}
}

$userName=htmlspecialchars($_POST['userName']);
$firstName=htmlspecialchars($_POST['firstName']);
$lastName=htmlspecialchars($_POST['lastName']);
$password=htmlspecialchars($_POST['password']);
$userEmail=htmlspecialchars($_POST['userEmail']);

}
if((!isset($error_message)) and (isset($_POST['register_user']))) {
$result = userRegistration($userName, $firstName, $lastName, $password, $userEmail);
if(!empty($result)) {
		$error_message = "";
		$success_message = "You have registered successfully!";	
		unset($_POST);
	} else {
		$error_message = "Problem in registration. Try again!";	
	}
}

require_once 'view/registration_view.php'; 
?>


