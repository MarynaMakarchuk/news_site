<?php
require_once "db_conect.php";
require_once 'function.php';

function userRegistration(){
/* Form Required Field Validation */
if(!empty($_POST['register_user'])){
foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	$error_message = "All Fields are required";
	break;
	}
}
/* Password Matching Validation */
if(@$_POST['password'] != @$_POST['confirm_password']){ 
$error_message = 'Passwords should be same<br>'; 
}

/* Email Validation */
if(!isset($error_message)) {
	if (!filter_var( $_POST['userEmail'], FILTER_VALIDATE_EMAIL)) {
	$error_message = "Invalid Email Address";
	}
}


if(!isset($error_message)) {
	$db_handle = new DBController();
	$query = "INSERT INTO registered_users (user_name, first_name, last_name, user_password, user_email) VALUES
	('" . $_POST["userName"] . "', '" . $_POST['firstName'] . "', '" . $_POST['lastName'] . "', '" . /*md5*/($_POST['password']) . "', '" . $_POST['userEmail'] . "')";
	$result = $db_handle->insertQuery($query);
	if(!empty($result)) {
		$error_message = "";
		$success_message = "You have registered successfully!";	
		unset($_POST);
	} else {
		$error_message = "Problem in registration. Try Again!";	
	}
}
}
return true;
}

userRegistration();
?>



<form name="frmRegistration" method="post" action="">
	<table border="0" width="500" class="demo-table">
		<?php if(!empty($success_message)) { ?>	
		<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
		<?php } ?>
		<?php if(!empty($error_message)) { ?>	
		<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
		<?php } ?>
		<tr>
			<td>User Name</td>
			<td><input type="text" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
		</tr>
		<tr>
			<td>First Name</td>
			<td><input type="text" name="firstName" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="lastName" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" value=""></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" name="confirm_password" value=""></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"></td>
		</tr>
		<tr>
			<td><input type="submit" name="register_user" value="Register" class="btnRegister"></td>
		</tr>
	</table>
</form>