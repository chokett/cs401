<?php $thisPage = 'Calendar'; 
session_start();
require_once('includes/form_helper.php');
require_once('includes/session_helper.php');
if(!isAccessGranted()) {
	$errors['message'] = "You must login to access page.";
	redirectError("login.php", $errors);
}  
require_once('includes/header.php'); 
require_once('includes/navigation.php'); 
?>
<body>
<div class="content">
<h1 id="welcome-message">Welcome to our event calendar. </h1>
<h2>UNI-que happening in Boise &hearts;</h2>
<p>
Calendar here.
</p>

<h3>Things and stuff</h3><br>

  </div>
</body>
<?php require_once('includes/footer.php'); ?>
