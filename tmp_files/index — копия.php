<?php
require_once 'db_conect.php';
require_once 'function.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
require_once 'head.php';
?>
</head>
<body>

<?php
require_once 'navigation.php';
?>

<?php
require_once 'header.php';
?>
<?php 
		userAuthorization();
?>
<!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
        <!-- Blog Search Well -->
        <div class="well">
		
            <h4>Авторизация</h4>
            <!-- /.input-group -->
                <?php if(empty($_SESSION["user_id"])) { ?>
                    <form action="" method="post" id="frmLogin">
                        <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
                        <div class="field-group">
                            <div><label for="login">Username</label></div>
                            <div><input name="user_name" type="text" class="form-control"></div>
                        </div>
                        <div class="field-group">
                            <div><label for="password">Password</label></div>
                            <div><input name="password" type="password" class="form-control"> </div>
                        </div>
                        <br>
                        <div class="field-group">
                            <div><input type="submit" name="login" value="Login" class="btn btn-default"></span></div>
                        </div>
                    </form>
                 <?php
					} else {
				 ?>
						<form action="" method="post" id="frmLogout">
							<div class="member-dashboard">Welcome <?php echo ucwords(userName());?>, you have successfully logged in!<br>
								<br><input type="submit" name="logout" value="Logout" class="btn btn-default"></div>
						</form>
				<?php } ?>
							</div>
		</div>
    </div>
<!-- /.row -->
						<?php
							if ($_GET['route'] != ''){
								$route = $_GET['route'];							
								include 'controller/' . $route. '.php';
							}						
						?> 

<!-- Page Content -->
<div class="container">

    <!-- Related Projects Row -->
    <div class="row">

        <?php foreach ($categories = idNameCat() as $category){ ?>
        <div class="col-lg-12">
            <h3 class="page-header"><a href="category_view.php?id=<?php echo $category['id_cat']; ?>"><?php echo $category['name_cat']; ?></a></h3>
        </div>
            <?php $limit = 3;
			foreach ($allnews = showNews($category['id_cat'], $limit) as $news){?>
        <div class="col-sm-3 col-xs-6">
            <img class="img-responsive portfolio-item" src="<?php echo $news['image']; ?>" alt="">
            <a href="news_view.php?id=<?php echo $news['id']; ?>"><?php echo $news['name']; ?></a>
        </div>
            <?php } ?>
        <?php } ?>

        <div class="col-lg-12">
            <h3 class="page-header">Последние новости</h3>
        </div>
        <?php foreach ($lastnews = showLastNews(3) as $item){?>
        <div class="col-sm-3 col-xs-6">
            <img class="img-responsive portfolio-item" src="<?php echo $item ['image']; ?>" alt="">
            <a href="news_view.php?id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a>
        </div>
        <?php } ?>
    </div>
    <!-- /.row -->
<!-- /.container -->
</div>




<?php
require_once 'footer.php';
?>

</body>

</html>

