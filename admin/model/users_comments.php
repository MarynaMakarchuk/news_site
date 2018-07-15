<?php
class Comments{
	
	// Список комментариев пользователей
	public static function commentsList()
	{
		$db_hendle = new DBController;
		$query = "SELECT
		a.id_comm,a.news_id_comm,a.user_id_comm,a.message_comm,a.rating_comm,a.status_comm,a.date_comm, 
		b.id,b.name,
		c.user_id,c.user_name
		FROM comment a 
		LEFT JOIN news b 
		ON a.news_id_comm = b.id
		LEFT JOIN registered_users c
		ON a.user_id_comm = user_id";
		$result = $db_hendle->runSelectQuery($query);
		return $result;
	}
		
	// Удаляем выбранный комментарий
	public static function deleteSelectedComment($id){
		$db_hendle = new DBController;
		$query = "DELETE FROM comment WHERE id_comm=$id";
		$result = $db_hendle->booleanQuery($query);
		return $result;
	}	
	
	// Возвращает массив - один выбранный комментарий
	public static function selectedComment($id){
		$db_hendle = new DBController;
		$query = "SELECT * FROM comment WHERE id_comm=$id";
		$result = $db_hendle->runSelectQuery($query);
		return $result;
	}
	
	// Редактируем комментарий
	public static function updateComment($id, $user_id, $message, $rating, $status){
		$db_hendle = new DBController;
		$query = "UPDATE comment 
		SET user_id_comm='".$user_id."',
		message_comm='".$message."', 
		rating_comm='".$rating."', 
		status_comm='".$status."' 
		WHERE id_comm='".$id."' ";
		$result = $db_hendle->booleanQuery($query);
		return $result;
	}	
}



/*
// Список комментариев пользователей
function commentsList(){
    $db_hendle = new DBController;
    $query = "SELECT
	a.id_comm,a.news_id_comm,a.user_id_comm,a.message_comm,a.rating_comm,a.status_comm,a.date_comm, 
	b.id,b.name,
	c.user_id,c.user_name
	FROM comment a 
	LEFT JOIN news b 
	ON a.news_id_comm = b.id
	LEFT JOIN registered_users c
	ON a.user_id_comm = user_id";
    $commentsList = $db_hendle->runSelectQuery($query);
    return $commentsList;
}


// Удаляем выбранный комментарий
function deleteSelectedComment($id){
	$db_hendle = new DBController;
    $query = "DELETE FROM comment WHERE id_comm=$id";
    $result = $db_hendle->booleanQuery($query);
    return $result;
}

// Возвращает массив - один выбранный комментарий
function selectedComment($id){
    $db_hendle = new DBController;
    $query = "SELECT * FROM comment WHERE id_comm=$id";
    $oneComment = $db_hendle->runSelectQuery($query);
    return $oneComment;
}

// Редактируем комментарий
function updateComment($id, $user_id, $message, $rating, $status){
	$db_hendle = new DBController;
    $query = "UPDATE comment 
	SET user_id_comm='".$user_id."',
	message_comm='".$message."', 
	rating_comm='".$rating."', 
	status_comm='".$status."' 
	WHERE id_comm='".$id."' ";
	$result = $db_hendle->booleanQuery($query);
	return $result;
}
*/

