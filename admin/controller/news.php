<?php
class NewsController{
	public function news_view()
    {
		require_once 'model/news.php';
        // Получаем список категорий
        $result = News::newsList();
        return $result;
    }
	
	public function insert_news()
    {
		require_once 'model/news.php';
		$categoryList = News::categoryItem();
		$name = '';
		$description = '';
		$parent = '';
		$image = '';
		$status = '';
		$date = date("Y-m-d h:i:sa");
		$data['image'] = News::uploadFile();
		
			if(isset($_POST['name']) and isset($_POST['description'])){
				$name = htmlspecialchars($_POST['name']);
				$description = htmlspecialchars($_POST['description']);
				$parent = htmlspecialchars($_POST['parent']);
				$target_to_database = "images/" . basename($_FILES["file-input"]["name"]);
				$status = $_POST['status'];
				if (News::addNewNews($name, $description, $parent, $target_to_database, $status, $date) === TRUE) {
					$message = 'New record created successfully!';
				}else {
					$message = 'Record error!';
				}
			}
			
		$data['message'] = $message;
		$data['category_list'] = $categoryList;
        return $data;
    }
		
	public function delete_news()
	{
		require_once 'model/news.php';
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			if (News::deleteSelectedNews($id) === TRUE) {
				$message = 'Record deleted successfully!';
			} else {
				$message = 'Error deleting record!';
			}			 
		}
		return $message;
	}
		
	public function edit_news()
	{	
		require_once 'model/news.php';
        $id = $_GET['id'];
		$data = [];
		$data['news'] = News::selectedNews($id);
		$data['category_list'] = News::categoryItem();
		return $data;
	}
	
	public function update_news()
	{	
		require_once 'model/news.php'; 
       
		if (isset($_POST['submit'])){
			$id = htmlspecialchars($_POST['id']);
			$name = htmlspecialchars($_POST['name']);
			$description = htmlspecialchars($_POST['description']);
			$parent = htmlspecialchars($_POST['parent']);
			$target = "../images/" . basename($_FILES["file-input"]["name"]);
			$target_to_database = "images/" . basename($_FILES["file-input"]["name"]);
			//$image = $_POST['old_image'];
			$status = $_POST['status'];
			$date = date("Y-m-d h:i:sa");
			 
			if ($_FILES["file-input"]["name"] !== "") {
					News::uploadFile();
					if (News::updateNewsWithImage($id, $name, $description, $parent, $target_to_database, $status, $date) === TRUE) {
						$message = 'Record updated successfully!';
						//echo "(" . $_FILES["image"]["name"] . ")"; 
					} else {
						$message = 'Error updating record 1!';
				}
			} else {
				if (News::updateNewsWithoutImage($id, $name, $description, $parent, $status, $date) === TRUE) {
						$message = 'Record updated successfully with previous image!'; 
					} else {
						$message = 'Error updating record 2!';
				}
			}
		}
		return $message;
	}
}

$newsData = new NewsController;
$act = $_GET['action'];
$result = $newsData->$act();
require_once 'view/' . $act . '.php';

?>


