<?php
require_once 'model/category.php';

switch ($_GET['action']) {
    case "category_view": 
		$id = $_GET['id'];
        $selectedСategory = selectedСategory($id);
        break;
	case "index_view": 		
		$categories = idNameCategory();
		foreach ($categories as $category){
		    $idCurentCat = $category['id_cat'];
			$limit = 3;
			$allnewscurent = showNews($idCurentCat, $limit);
			foreach ($allnewscurent as $news){
				$allnews[] = $news;
			}
		}
		$mostVisitedNews = mostVisitedNews(3);
        break;
	case "news_view":
	$id = $_GET['id'];
	$news_id = htmlspecialchars(@$_GET['id']);
	$user_id = htmlspecialchars(@$_SESSION["user_id"]);
	$message = htmlspecialchars(@$_POST['comment']);
	$newsItem = selectedNews($id);
	$resultset = usersComments();
	if(isset($_POST['rating'])){  //Обновляем рейтинг комментария
		   updateCommentRaiting();
		}
			// Запись комментария в БД
	if(isset($_SESSION["user_id"]) and isset($_POST['submit'])){
	
	if(recordComment($news_id, $user_id, $message) === true){
		$message = 'Ваш комментарий ожидает модерации!';
	}else{
		$message = 'false';
	}
	
	}elseif (!isset($_SESSION["user_id"]) and isset($_POST['submit'])) {
		$message = 'Комментировать может только авторизованный пользователь!';
	}
	break;
}
$action = $_GET['action'];
require_once 'view/' . $action . '.php';
?>


