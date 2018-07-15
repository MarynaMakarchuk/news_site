<?php
require_once 'db_conect.php';
require_once 'function.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once 'view/common/head.php';
?>
</head>
<body>
<?php
require_once 'navigation.php';
require_once 'header.php';
?>						

<!-- Page Content -->
<div class="container">
	<div class="row">
		<div class="col-md-9">
		<?php
				if ($_GET['route'] != ''){
					$route = $_GET['route'];							
					include 'controller/' . $route. '.php';
				}else {
					include 'controller/index.php';
				}
		?>
		</div>
		<?php 
		$user_name = htmlspecialchars($_POST["user_name"]);
		$password = htmlspecialchars($_POST["password"]);
		if(!empty($_POST["login"])) {
		$row = userAuthorization($user_name, $password);
		if(is_array($row)) {	
		foreach ($row as $key => $result){
            $_SESSION["user_id"] = $result['user_id'];
		}
        }else {
            $message = "Invalid Username or Password!";
        }
		}
		if(!empty($_POST["logout"])) {
        $_SESSION["user_id"] = "";
        session_destroy();
		}
		
		?>
        <?php
		require_once 'view/autorization_view.php';
		?>
	</div>
</div>

<?php
require_once 'view/common/footer.php';
?>
</body>
</html>

