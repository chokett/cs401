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

        <p>We are a networking group that takes the working out of networking. Our goal is to 
          get people with like minds together in an atmosphere that breaks down the barriers of typical networking
          groups through fun and interactive games. This type of atmosphere leads to better business leads as well
          as building stronger relationships. If you would like to contact us and let us host your next event,
          <p>call us at <a href=208-555-5767>208-555-5767 </a> 
          <p> or </p>
          <p>
           email us at <a href=chokett@gmail.com a>chokett&gmail.com
        </p>
    
</div>
  <?php require_once('includes/footer.php'); ?>
