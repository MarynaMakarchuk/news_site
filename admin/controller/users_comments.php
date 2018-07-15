<?php
class UsersComentsController{
	public function users_comments_view()
	{ 
		require_once 'model/users_comments.php';
		$result = Comments::commentsList();
		return $result;
	}
	
	public function delete_comment()
	{ 
		require_once 'model/users_comments.php';
		if(isset($_GET['id'])) {
            $id = $_GET['id'];
			if (Comments::deleteSelectedComment($id) === TRUE) {
				$message = 'Record deleted successfully!';
			} else {
				$message = 'Error deleting record!';
			}
	    }
		return $message;
	}
	
	public function edit_comment()
	{	
		require_once 'model/users_comments.php';
        $id = $_GET['id'];
		$result = Comments::selectedComment($id);
		return $result;
	}
	
	public function update_comment()
	{
		require_once 'model/users_comments.php';
		if (isset($_POST['submit'])){
			$id = htmlspecialchars($_POST['id']);
			$news_name = htmlspecialchars($_POST['news_id']);
			$user_name = htmlspecialchars($_POST['user_id']);
			$message = htmlspecialchars($_POST['message']);
			$rating = htmlspecialchars($_POST['rating']);
			$status = $_POST['status'];
				if (Comments::updateComment($id, $user_name, $message, $rating, $status) === TRUE) {
					$message = 'Record updated successfully!';
				} else {
					$message = 'Error updating record!';
				}
		}
		return $message;
	}	
}

$commentsData = new UsersComentsController;
$act = $_GET['action'];
$result = $commentsData->$act();
require_once 'view/' . $act . '.php';



/*switch ($_GET['action']) {
    case "users_comments_view": 
        $commentList = commentsList();
        break;
	case "delete_comment": 
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
			deleteSelectedComment($id);
	    }
        break;	
	case "edit_comment": 
        $id = $_GET['id'];
		$comment = selectedComment($id);
		break;
		
	case "update_comment":	
		if (isset($_POST['submit'])){
			$id = htmlspecialchars($_POST['id']);
			$news_name = htmlspecialchars($_POST['news_id']);
			$user_name = htmlspecialchars($_POST['user_id']);
			$message = htmlspecialchars($_POST['message']);
			$rating = htmlspecialchars($_POST['rating']);
			$status = $_POST['status'];
				if (updateComment($id, $user_name, $message, $rating, $status) === TRUE) {
					$message = 'Record updated successfully!';
				} else {
					$message = 'Error updating record!';
				}
		}
	break;
}

$action = $_GET['action'];
require_once 'view/' . $action . '.php'; 
*/
?>


