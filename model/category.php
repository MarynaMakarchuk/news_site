<?php
// Возвращает id и имена категорий
function idNameCategory(){
    $db_hendle = new DBController;
    $query = "SELECT id_cat, name_cat FROM category WHERE status_cat='1'";
    $categories = $db_hendle->runSelectQuery($query);
    return $categories;
}
// Выбыраем данные из выбранной категории
function selectedСategory($id){
    $db_hendle = new DBController;
    $query = "SELECT * FROM category WHERE id_cat=$id";
    $category = $db_hendle->runSelectQuery($query);
    return $category;
}
// Выбираем новость по id категории в заданном количестве
function showNews($idCurentCat, $limit){
    $db_hendle = new DBController;
    $query = "SELECT * FROM news WHERE parent=$idCurentCat ORDER BY date ASC LIMIT $limit";
    $allnews = $db_hendle->runSelectQuery($query);
    return $allnews;
}

// Выбираем последние новости в заданном количестве
function showRecentNews($limit){
    $db_hendle = new DBController;
    $query = "SELECT * FROM news ORDER BY date ASC LIMIT $limit";
    $lastnews = $db_hendle->runSelectQuery($query);
    return $lastnews;
}

// Выбираем новости в которых больше всего просмотров в заданном количестве
function mostVisitedNews($limit){
    $db_hendle = new DBController;
    $query = "SELECT * FROM news ORDER BY count_view DESC LIMIT $limit";
    $mostVisitedNews = $db_hendle->runSelectQuery($query);
    return $mostVisitedNews;
}
 //// Выбыраем данные из выбранной новости
function selectedNews($id){
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
}


	
//Обновляет и возвращает количество просмотров выбранной новости
function countView($id, $newsItem )
{
    $db_hendle = new DBController;
    if ($newsItem > 0) {
        foreach ($newsItem as $item) {
            $count_view = $item['count_view'];
            $count_view++;
        }
        $query = "UPDATE news SET count_view='" . $count_view . "' WHERE id='" . $id . "' ";
        $viewers = $db_hendle->booleanQuery($query);
    }
    return $count_view;
}
//Считает количество новостей для вывода на одной странице для выбранной категории
function countNews($id, $kol){
    $db_hendle = new DBController;
    $query6 = "SELECT COUNT(*) FROM news WHERE parent=$id";
    $test = $db_hendle->runSelectQuery($query6);
    $row = $test[0];
    $total = implode($row); // всего записей
    $str_pag = ceil($total / $kol);
    return $str_pag;
}

//Вывод комментариев, проверенных админом
function usersComments() {
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
	//$query = "SELECT * FROM comment WHERE news_id_comm='".$id."' AND status_comm ='1' ORDER BY rating_comm DESC";
	$row = $db_hendle->runSelectQuery($query);
	return $row;
}

//Обновляем рейтинг комментария 
function updateCommentRaiting(){
	$db_hendle = new DBController;
	$id = $_GET['id'];
	$id_comment = $_POST['id_comment'];
	$query = "SELECT rating_comm FROM comment WHERE id_comm='".$id_comment."' ";
	$result = $db_hendle->runSelectQuery($query);
	foreach ($result as $key => $row ){
		//$row['rating'];
		$rating = $_POST['rating'] + $row['rating_comm'];
	}
	$query = "UPDATE comment SET rating_comm='".$rating."' WHERE news_id_comm='".$id."' AND id_comm='".$id_comment."' ";
	$result1 = $db_hendle->booleanQuery($query);
	return true;
}

// Запись комментария в БД
function recordComment($news_id, $user_id, $message){
	$db_hendle = new DBController;
	$query = "INSERT INTO comment (news_id_comm, user_id_comm, message_comm, status_comm) VALUES ('$news_id', '$user_id', '$message', '0')";
	$result = $db_hendle->booleanQuery($query);
	return $result;
}

?>