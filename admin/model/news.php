<?php
class News{
	// Список новостей
	public static function newsList()
	{
		$db_hendle = new DBController;
		$query = "SELECT
		a.id,a.name,a.description,a.parent,a.image,a.status,a.count_view,a.date, 
		b.id_cat,b.name_cat 
		FROM news a 
		LEFT JOIN category b 
		ON a.parent = b.id_cat
		ORDER BY a.id";
		$result = $db_hendle->runSelectQuery($query);
		return $result;
	}
	
	// Загружаем файл 
	public static function uploadFile(){
		if (isset($_POST["submit"])) {
		// Get Image Dimension
		$fileinfo = getimagesize($_FILES["file-input"]["tmp_name"]);
		$width = $fileinfo[0];
		$height = $fileinfo[1];
		
		$allowed_image_extension = array(
			"png",
			"jpg",
			"jpeg"
		);
		
		// Get image file extension
		$file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);
		
		// Validate file input to check if is not empty
		if (! file_exists($_FILES["file-input"]["tmp_name"])) {
			$response = array(
				"type" => "error",
				"message" => "Choose image file to upload. Problem in uploading image files."
			);
		}    // Validate file input to check if is with valid extension
		else if (! in_array($file_extension, $allowed_image_extension)) {
			$response = array(
				"type" => "error",
				"message" => "Upload valiid images. Only PNG and JPEG are allowed. Problem in uploading image files."
			);
			echo $result;
		}    // Validate image file size
		else if (($_FILES["file-input"]["size"] > 2000000)) {
			$response = array(
				"type" => "error",
				"message" => "Image size exceeds 2MB. Problem in uploading image files."
			);
		}    // Validate image file dimension
		else if ($width > "1500" || $height > "1500") {
			$response = array(
				"type" => "error",
				"message" => "Image dimension should be within 1500X1500. Problem in uploading image files."
			);
		} else {
			//$target = "/var/www/st8487/data/www/8487-5af584411cde5.st.php-academy.org/images/" . basename($_FILES["file-input"]["name"]);
			$target = "../images/" . basename($_FILES["file-input"]["name"]);
			if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
				$response = array(
					"type" => "success",
					"message" => "Image uploaded successfully."
				);
			} else {
				$response = array(
					"type" => "error",
					"message" => "Problem in uploading image files." 
				);
			}
		}
			if(!empty($response)) { 
				echo $response["message"] . "<br>";
			}
		}
		return true;
	}
	
		// Список категорий
	public static function categoryItem(){
		$db_hendle = new DBController;
		$query = "SELECT * FROM category";
		$result = $db_hendle->runSelectQuery($query);
		return $result;
	}
	
	// Добавляем новую новость
	public static function addNewNews($name, $description, $parent, $target_to_database , $status, $date)
	{
		$db_hendle = new DBController;
		$query = $sql = "INSERT INTO news (name, description, parent, image, status, date)
		VALUES ('$name', '$description', '$parent', '$target_to_database ', '$status', '$date')";
		$result = $db_hendle->booleanQuery($query);
		return $result;
	}
	
	// Возвращает массив - одну выбранную новость
	public static function selectedNews($id){
		$db_hendle = new DBController;
		$query = "SELECT * FROM news WHERE id=$id";
		$result = $db_hendle->runSelectQuery($query);
		return $result;
	}
		
	// Удаляем выбранную новость
	public static function deleteSelectedNews($id){
		$db_hendle = new DBController;
		$query = "DELETE FROM news WHERE id=$id";
		$result = $db_hendle->booleanQuery($query);
		return $result;
	}
	
	// Редактируем новость c выбранной картинкой
	public static function updateNewsWithImage($id, $name, $description, $parent, $target_to_database, $status, $date){
		$db_hendle = new DBController;
		$query = "UPDATE news SET name='".$name."', 
				description='".$description."', 
				parent='".$parent."', 
				image='".$target_to_database."', 
				status='".$status."',
				date='".$date."'
				WHERE id='".$id."' ";
		$result = $db_hendle->booleanQuery($query);
		return $result;
	}

	// Редактируем новость c не выбранной картинкой
	public static function updateNewsWithoutImage($id, $name, $description, $parent, $status, $date){
		$db_hendle = new DBController;
		$query = "UPDATE news SET name='".$name."', 
				description='".$description."', 
				parent='".$parent."',  
				status='".$status."',
				date='".$date."'				
				WHERE id='".$id."' ";
		$result = $db_hendle->booleanQuery($query);
		return $result;
	}
			
}
?>






