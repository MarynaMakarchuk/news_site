<?php
require_once 'db_conect.php';


function idNameCat(){
    $db_hendle = new DBController;
    $query = "SELECT id_cat, name_cat FROM category ";
    $categories = $db_hendle->runSelectQuery($query);
    return $categories;
}

/*function selectedСategory($id){
    $db_hendle = new DBController;
    $query1 = "SELECT * FROM category WHERE id_cat=$id";
    $category = $db_hendle->runSelectQuery($query1);
    return $category;
}


function showNews($idCurentCat, $limit){
    $db_hendle = new DBController;
    $query1 = "SELECT * FROM news WHERE parent=$idCurentCat ORDER BY date ASC LIMIT $limit";
    $allnews = $db_hendle->runSelectQuery($query1);
    return $allnews;
}
*/

function showLastNews($limit){
    $db_hendle = new DBController;
    $query2 = "SELECT * FROM news ORDER BY date ASC LIMIT $limit";
    $lastnews = $db_hendle->runSelectQuery($query2);
    return $lastnews;
}


//Возвращает массив - одну выбранную новость
/*function selectedNews($id){
    $db_hendle = new DBController;
    $query3 = "SELECT * FROM news WHERE id=$id";
    $newsContent = $db_hendle->runSelectQuery($query3);
    return $newsContent;
}*/

//Возвращает массив - одну выбранную новость
/*function selectedNews($id){
    $db_hendle = new DBController;
    $query = "SELECT
	a.id,a.name,a.description,a.parent,a.image,a.count_view,a.date, 
	b.id_cat,b.name_cat 
	FROM news a 
	LEFT JOIN category b 
	ON a.parent = b.id_cat
	WHERE a.id='" . $id ."'
	ORDER BY a.id";
    $newsData = $db_hendle->runSelectQuery($query);
    return $newsData;
}*/


	
//Обновляет и возвращает количество просмотров выбранной новости
/*function countView($id, $newsItem )
{
    $db_hendle = new DBController;
    if ($newsItem > 0) {
        foreach ($newsItem as $item) {
            $count_view = $item['count_view'];
            $count_view++;
        }
        $query4 = "UPDATE news SET count_view='" . $count_view . "' WHERE id='" . $id . "' ";
        $viewers = $db_hendle->booleanQuery($query4);
    }
    return $count_view;
}*/

//Выбирает новости с базы данных по заданным параметрам - категория новости, с какой новости выбираем и количество выбираемых новостей
function newsPages($page, $kol){
    $db_hendle = new DBController;
    $art = ($page * $kol) - $kol; // определяем, с какой записи нам выводить
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query5 = "SELECT * FROM news WHERE parent=$id LIMIT $art,$kol";
        $newsForPages = $db_hendle->runSelectQuery($query5);
    }
    return $newsForPages;
}


/*
function countNews($id, $kol){
    $db_hendle = new DBController;
    $query6 = "SELECT COUNT(*) FROM news WHERE parent=$id";
    $test = $db_hendle->runSelectQuery($query6);
    $row = $test[0];
    $total = implode($row); // всего записей
    $str_pag = ceil($total / $kol);
    return $str_pag;
}*/


//Авторизация пользователя
function userAuthorization($user_name, $password){
	//session_start();
	$db_hendle = new DBController;
	$query = "SELECT * FROM registered_users WHERE user_name='" . $user_name . "' and user_password = '". $password ."'";
	$row = $db_hendle->runSelectQuery($query);
	return $row;
}

//Приветствие пользователя после успешной авторизации
function userName(){
	$db_hendle = new DBController;
	$query = "SELECT * FROM registered_users WHERE user_id='" . $_SESSION["user_id"] . "'";
	$row = $db_hendle->runQuery($query);
	return $row['first_name'];
}


/*/Вывод комментариев, проверенных админом
function usersComments() {
	$db_hendle = new DBController;
	$id = $_GET['id'];
	$query8 = "SELECT * FROM comment WHERE news_id_comm='".$id."' AND status_comm ='1' ORDER BY rating_comm DESC";
	$row = $db_hendle->runSelectQuery($query8);
	return $row;
}*/

//Вывод комментариев, проверенных админом
/*function usersComments() {
	$db_hendle = new DBController;
	$id = $_GET['id'];
	$query = "SELECT
	a.id_comm,a.news_id_comm,a.user_id_comm,a.message_comm,a.rating_comm,a.status_comm,a.date_comm, 
	b.user_id,b.user_name 
	FROM comment a 
	LEFT JOIN registered_users b 
	ON a.user_id_comm = b.user_id
	WHERE a.news_id_comm='" . $id ."'
	AND status_comm ='1'
	ORDER BY rating_comm DESC";
	//$query8 = "SELECT * FROM comment WHERE news_id_comm='".$id."' AND status_comm ='1' ORDER BY rating_comm DESC";
	$row = $db_hendle->runSelectQuery($query);
	return $row;
}

//Обновляем рейтинг комментария 
function updateCommentRaiting(){
	$db_hendle = new DBController;
	$id = $_GET['id'];
	$id_comment = $_POST['id_comment'];
	$query9 = "SELECT rating_comm FROM comment WHERE id_comm='".$id_comment."' ";
	$result = $db_hendle->runSelectQuery($query9);
	foreach ($result as $key => $row ){
		//$row['rating'];
		$rating = $_POST['rating'] + $row['rating_comm'];
	}
	$query10 = "UPDATE comment SET rating_comm='".$rating."' WHERE news_id_comm='".$id."' AND id_comm='".$id_comment."' ";
	$result1 = $db_hendle->booleanQuery($query10);
	return true;
}

// Запись комментария в БД
function recordComment(){
	$db_hendle = new DBController;
	$message = $_POST['comment'];
	$user_id = $_SESSION["user_id"];
	$news_id =  $_GET['id'];
	$query10 = "INSERT INTO comment (news_id_comm, user_id_comm, message_comm, status_comm) VALUES ('$news_id', '$user_id', '$message', '0')";
	$result = $db_hendle->booleanQuery($query10);
	return $result;
}*/

?>






