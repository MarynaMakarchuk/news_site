<?php
require_once 'db_conect.php';
require_once 'model/function.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'view/common/head.php';?>
</head>
<header>
<?php require_once 'view/common/header.php';?>
</header>
<body>
    <div id="wrapper">
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<?php
						if(!empty($_POST["login"])) {					
						$user_name = htmlspecialchars($_POST["user_name"]);
						$password = htmlspecialchars($_POST["password"]);
						$row = adminAuthorization($user_name, $password);
						if(is_array($row)) {	
						foreach ($row as $key => $result){
							$_SESSION["user_id"] = $result['admin_id'];
						}
						}else {
							$message = "Invalid Username or Password!";
						}
						}
						if(!empty($_POST["logout"])){
						$_SESSION["user_id"] = "";
						session_destroy();
						}
						?>
						<div class="col-lg-12">
							<?php 
							if(empty($_SESSION["user_id"])) { 
								require_once 'view/autorization_view.php';
							}else {
								$welcome = userName();
								require_once 'view/welcome_view.php';
									if ($_GET['route'] != ''){
										$route = $_GET['route'];
										require_once 'controller/' . $route . '.php';
									}else {
								require_once 'controller/index.php';
									}									
							}							
							?> 
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require_once 'view/common/footer.php';?>
</body>
</html>