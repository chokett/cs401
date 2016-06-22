<?php $thisPage = 'Calendar'; 
session_start(); 
require_once('includes/form_helper.php');
require_once('includes/session_helper.php');
include 'calendar2.php';
if(!isAccessGranted()) {
	$errors['message'] = "You must login to access page.";
	redirectError("login.php", $errors);
}  
require_once('includes/header.php'); 
require_once('includes/navigation.php'); 
?>
<head>
	<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="content">
<h1 id="welcome-message">Welcome to our event calendar. </h1>
<h2>UNI-que happening in Boise &hearts;</h2>
<p>
<?php
$calendar = new Calendar();
 
echo $calendar->show();
?>
</p>

  </div>
</body>
<?php require_once('includes/footer.php'); ?>
