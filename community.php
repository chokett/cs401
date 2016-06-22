<?php $thisPage = 'Network Community'; 
session_start(); 
require_once('includes/form_helper.php');
require_once('includes/session_helper.php');
if(!isAccessGranted()) {
	$errors['message'] = "You must login to access page.";
	redirectError("login.php", $errors);
}  
require_once('includes/header.php'); 
require_once('includes/navigation.php'); 
require_once ('includes/Dao.php'); 
?>

	<html>

  <body>
    <div class = "content">
    <h1>Welcome to the Network Community page. &hearts;</h1>
    <form name="commentForm" action="community_handler.php" method="POST">
      <div>
        <label for="comment">Leave a comment:</label>
        <input type="text" id="comment" name="comment">
      </div>
      <div>
        <input type="submit" name="commentButton" value="Submit">
      </div>
    </form>
    <?php
    $dao = new Dao();
    $comments = $dao->getComments();
    if ($comments) { ?>
    <div class ="comment">
    <table>
    <?php foreach ($comments as $comment) { ?>
      <tr>
        <td><?= $comment["comment"]; ?></td>
        <td><?= $comment["created"]; ?></td>
      </tr>
    <?php } ?>
    </table>
    <?php } ?>
    </div>
  </body>
</html>
  <?php require_once('includes/footer.php'); ?>
