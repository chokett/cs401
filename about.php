<?php $thisPage = 'About';
session_start(); 
require_once('includes/session_helper.php');
require_once('includes/form_helper.php');
if(!isAccessGranted()) {
	$errors['message'] = "You must login to access page.";
	redirectError("login.php", $errors);
} 
require_once('includes/header.php'); 
require_once('includes/navigation.php'); ?>

<div class="content">
        <h1>Thank you for visiting us.</h1>

        <h2>About us stuff;</h2>
        <p>
        UNI-que stuff here.
        </p>

</div>
  <?php require_once('includes/footer.php'); ?>
