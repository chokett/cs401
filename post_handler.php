<?php
session_start();
require_once ('includes/Dao.php');
require_once('includes/form_helper.php');


$queryParams = "";


if(isset($_GET['filterButton'])) {
  if(empty($_GET['username'])) {
    $queryParams = "?error=Username can't be empty.";
  } else {
    $username = trim($_GET['username']);
    try {
      $dao = new Dao();
      if($dao->userExists($username)) {
        $queryParams="?username=" . htmlspecialchars($username);
      } else {
        $queryParams = "?error=Username does not exist.";
      }
    } catch (Exception $e) {
      echo "<p>Failed to check for user. Please try again later.</p>.";
    
      die; 
    }
  }
}


if(isset($_GET['clearButton'])) {
  
}


if (isset($_POST["deleteButton"])) {
  $id = $_POST["id"];

 
  try {
    $dao = new Dao();
   
    $dao->deletePostById($id);
  } catch (Exception $e) {
    echo "<p>Failed to delete the post. Please try again later</p>."; 
    die; 
  }
}


if (isset($_POST["modifyButton"])) {
  $id = $_POST["id"];
  $message = "This post has been modified";
  
  try {
    $dao = new Dao();
    $dao->updatePost($id, $message);
  } catch (Exception $e) {
    echo "<p>Failed to update the post. Please try again later</p>.";
   
    die; 
  }
}

header("Location:posts.php" . $queryParams);
?>
