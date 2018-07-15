<?php
class CategoryController {
	
	public function category_view()
    {
		require_once 'model/category.php';
        // Получаем список категорий
        $result = Category::getCategories();
        return $result;
    }
	
	public function delete_category()
    {
		require_once 'model/category.php';
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
			if (Category::deleteSelectedСategory($id) === TRUE) {
				$message = 'Record deleted successfully!';
			} else {
				$message = 'Error deleting record!';
			}
	    }
        return $message;
    }
	
	
	public function edit_category()
    {
		require_once 'model/category.php';
            $id = $_GET['id'];
			$result = Category::selectedСategory($id);	
        return $result;
    }
	
	public function update_category()
	{
		require_once 'model/category.php';
        if (isset($_POST['submit'])){
		$id = htmlspecialchars($_POST['id']);
		$name = htmlspecialchars($_POST['name']);
		$description = htmlspecialchars($_POST['description']);
		$status = $_POST['status'];
				if (Category::updateSelectedСategory($id, $name, $description, $status) === TRUE) {
					$message = 'Record updated successfully!';
				} else {
					$message = 'Error updating record!'; 
				}
		}
		return $message;
	}
	
	
	
	
	public function insert_category()
    {
		require_once 'model/category.php';
		
		$name = htmlspecialchars($_POST['name']);
		$description = htmlspecialchars($_POST['description']);
		$status = htmlspecialchars($_POST['status']);
		$date = date("Y-m-d h:i:sa");
        if(isset($_POST['name']) and isset($_POST['description'])){
			if (Category::addNewCategory($name, $description, $status, $date) === TRUE) {
				$message = 'New record created successfully!';
			} else {
				$message = 'Record error!';
			}
		}
		return $message;
	}
	
	
}
$categoriesData = new CategoryController;
$act = $_GET['action'];
$result = $categoriesData->$act();
require_once 'view/' . $act . '.php'; 

/*require_once 'model/category.php';
switch ($_GET['action']) {

    case "category_view": 
        $categoryList = categoryList();
        break;
    case "insert_category":
		$name = htmlspecialchars(@$_POST['name']);
		$description = htmlspecialchars(@$_POST['description']);
		$status = htmlspecialchars(@$_POST['status']);
		$date = date("Y-m-d h:i:sa");
        if(isset($_POST['name']) and isset($_POST['description'])){
			if (AddNewCategory($name, $description, $status, $date) === TRUE) {
				echo 'New record created successfully!';
			} else {
				echo 'Record error!';
			}
		}
        break;
	case "delete_category": 
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
			deleteSelectedСategory($id);
	    }
        break;	
	case "edit_category": 
        $id = $_GET['id'];
		$categoryList = selectedСategory($id);
		break;
	case "update_category": 
        if (isset($_POST['submit'])){
		$id = htmlspecialchars($_POST['id']);
		$name = htmlspecialchars($_POST['name']);
		$description = htmlspecialchars($_POST['description']);
		$status = $_POST['status'];
				if (updateSelectedСategory($id, $name, $description, $status) === TRUE) {
					$message = 'Record updated successfully!';
				} else {
					$message = 'Error updating record!'; 
				}
	}
		break;
}*/

//$action = $_GET['action'];
//require_once 'view/' . $act . '.php'; 

/*if($_GET['action']){
	echo $_GET['action'];
}*/
?>


