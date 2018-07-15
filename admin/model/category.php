<?php
class Category{
	// Выбираем категории
	public static function getCategories()
    {
		$db_hendle = new DBController;
		$query = "SELECT * FROM category";
		$result = $db_hendle->runSelectQuery($query);
		return $result;
    }
	
	// Удаляем выбранную категорию
	public static function deleteSelectedСategory($id)
    {
		$db_hendle = new DBController;
		$query = "DELETE FROM category WHERE id_cat=$id";
		$result = $db_hendle->booleanQuery($query);
		return $result;
    }
	
	// Выбыраем данные из выбранной категории
	public static function selectedСategory($id)
	{
		$db_hendle = new DBController;
		$query = "SELECT * FROM category WHERE id_cat=$id";
		$result = $db_hendle->runSelectQuery($query);
		return $result;
	}
	
	// Редактируем выбранную категорию
	public static function updateSelectedСategory($id, $name, $description, $status)
	{
		$db_hendle = new DBController;
		$query = "UPDATE category SET name_cat='".$name."', description_cat='".$description."', status_cat='".$status."' WHERE id_cat='".$id."' ";
		$result = $db_hendle->booleanQuery($query);
		return $result;
	}
	
	
	// Добавляем новую категорию
	public static function addNewCategory($name, $description, $status, $date)
	{
		$db_hendle = new DBController;
		$query = "INSERT INTO category (name_cat, description_cat, status_cat, date_cat)
		VALUES ('$name', '$description', '$status', '$date')";
		$result = $db_hendle->booleanQuery($query);
		return $result;
    }
}



/*
// Выбираем категории
function categoryList(){
    $db_hendle = new DBController;
    $query = "SELECT * FROM category";
    $categoryList = $db_hendle->runSelectQuery($query);
    return $categoryList;
}

// Удаляем выбранную категорию
function deleteSelectedСategory($id){
	$db_hendle = new DBController;
    $query = "DELETE FROM category WHERE id_cat=$id";
    $result = $db_hendle->booleanQuery($query);
    return $result;
}

// Выбыраем данные из выбранной категории
function selectedСategory($id){
    $db_hendle = new DBController;
    $query = "SELECT * FROM category WHERE id_cat=$id";
    $category = $db_hendle->runSelectQuery($query);
    return $category;
}

// Редактируем выбранную категорию
function updateSelectedСategory($id, $name, $description, $status){
	$db_hendle = new DBController;
    $query = "UPDATE category SET name_cat='".$name."', description_cat='".$description."', status_cat='".$status."' WHERE id_cat='".$id."' ";
	$result = $db_hendle->booleanQuery($query);
	return $result;
}
// Добавляем новую категорию
function addNewCategory($name, $description, $status, $date){
	$db_hendle = new DBController;
	$query = "INSERT INTO category (name_cat, description_cat, status_cat, date_cat)
	VALUES ('$name', '$description', '$status', '$date')";
	$result = $db_hendle->booleanQuery($query);
	return $result;
}*/
