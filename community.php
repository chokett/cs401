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
  


	<h1>Welcome to the Network Community page.</h1>
	
	<h2>UNI-que member community &hearts;</h2>
	<p>
	<html>
  <head>
    <title>List of Comments</title>
  </head>
  <body>
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
    $comments = $dao->getComments();
    if ($comments) { ?>
    <table>
    <?php foreach ($comments as $comment) { ?>
      <tr>
        <td><?= $comment["comment"]; ?></td>
        <td><?= $comment["created"]; ?></td>
      </tr>
    <?php } ?>
    </table>
    <?php } ?>
  </body>
</html>
	</p>

	<h3>Things and stuff</h3>
</div>
  <?php require_once('includes/footer.php'); ?>
