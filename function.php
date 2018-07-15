<?php
require_once 'db_conect.php';

// Выбирает id и имена категорий
function idNameCat(){
    $db_hendle = new DBController;
    $query = "SELECT id_cat, name_cat FROM category WHERE status_cat='1' ";
    $categories = $db_hendle->runSelectQuery($query);
    return $categories;
}

//Последние новости
function showLastNews($limit){
    $db_hendle = new DBController;
    $query2 = "SELECT * FROM news ORDER BY date ASC LIMIT $limit";
    $lastnews = $db_hendle->runSelectQuery($query2);
    return $lastnews;
}

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

?>






