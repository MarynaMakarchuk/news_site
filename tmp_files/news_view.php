<?php
require_once 'db_conect.php';
require_once 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php require_once 'head.php'; ?>

</head>

<body>

<?php require_once 'navigation.php';?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
    
	<?php 
	//userAuthorization();
    ?>
	
		</div>
	</div>

    <div class="row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">
        <!-- Blog Post -->
        <?php $id = $_GET['id']; foreach ($newsItem = selectedNews($id) as $newsData){ ?>
        <!-- Title -->
        <h1> <?php echo $newsData ['name']; ?></h1>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $newsData ['date']; ?></p>
        <p><span class="glyphicon glyphicon-time"></span> <?php echo "Количество просмотров - ".$count_view = countView($id, $newsItem ); ?></p>
        <p><span class="glyphicon glyphicon-time"></span> <a href="category_view.php?id=<?php echo $newsData ['parent']; ?>"><?php echo "Категория - ".$newsData ['name_cat']; ?></a></p>
       

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="<?php echo $newsData ['image']; ?>" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">
                <?php if(empty($_SESSION["user_id"])) {
                    $result = explode('.',$newsData ['description']);
                    foreach ($result as $key => $value){
                        if($key <= 4){
                            echo $value . ".";
                        }
                    }
                }else{
                    echo $newsData ['description'];
                } ?>
        </p>
        <?php } ?>

        <hr>


        <!-- Blog Comments -->


        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form action="" method="post" role="form">
                <div class="form-group">
                    <textarea class="form-control" type="text" name="comment" rows="3" placeholder="Enter your comments"></textarea>
                </div>
                <input type="submit" name="submit" value="Ок" class="btn btn-primary">
            </form>
        </div>

        <hr>

        <!-- Posted Comments -->

        <?php
        if (!empty($resultset = usersComments())){
        foreach ($resultset as $commentList){ ?>
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Имя пользователя:   <?php echo $commentList['user_name']; ?>
                        <small><?php echo $commentList['date_comm']; ?></small>
                    </h4>
                    <?php echo $commentList['message_comm']; ?>
                <div class="row">
                    <div class="col-sm-4">
                        <form action="" method="post">
                        <input type="hidden" name="rating" value="+1">
                        <input type="hidden" name="id_comment" value="<?php echo $commentList['id_comm']; ?>">
                        <button class="btn btn-block btn-primary">+</button>
                        </form>
                    </div>

                    <div class="col-sm-4">
                        <button class="btn btn-block btn-default">
                        <?php $test = @$_POST['rating']; $test2 = $commentList['rating_comm']; ?>
                        <?php if ($commentList['id_comm'] == @$_POST['id_comment']) {echo $test + $test2;} else { ?>
                        <?php echo $commentList['rating_comm']; } ?>
                        </button>
                    </div>

                    <div class="col-sm-4">
                        <form action="" method="post">
                        <input type="hidden" name="rating" value="-1">
                        <input type="hidden" name="id_comment" value="<?php echo $commentList['id_comm']; ?>">
                        <button class="btn btn-block btn-primary">-</button>
                        </form>
                    </div>
                </div>
                </div>
                <hr>
            </div>
            <?php
            }
         }
        ?>
	    <?php if(isset($_POST['rating'])){  //Обновляем рейтинг комментария
		   updateCommentRaiting();
		}
        
			// Запись комментария в БД
			if(isset($_SESSION["user_id"]) and isset($_POST['submit'])){
		
			if(recordComment() === true){
				echo 'Ваш комментарий ожидает модерации!';
			}else{
				echo 'false';
			}
			
			}elseif (!isset($_SESSION["user_id"]) and isset($_POST['submit'])) {
				echo 'Комментировать может только авторизованный пользователь!';
			}
		?>
    </div>


 


<hr>

<?php
require_once 'footer.php';
?>
</body>

</html>


