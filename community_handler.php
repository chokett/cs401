<?php
require_once('includes/form_helper.php');
require_once "includes/Dao.php";
require_once('includes/session_helper.php');
session_start();

if (isset($_POST["commentButton"])) {

  $comment = htmlspecialchars($_POST["comment"]);
 
  try {
    $dao = new Dao();
    $dao->saveComment($comment);
  } catch (Exception $e) {

    echo "<p>Failed to save your comment. Please try again later</p>.";
    die(); 
  }
}

header("Location: comment.php");
die();
?>
