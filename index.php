<?php $thisPage = 'Home'; 
session_start();
require_once('includes/Dao.php');
require_once('includes/header.php'); 
require_once('includes/form_helper.php');


?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>

<section>
<div id="regform">
	<form method="POST" action="registration_handler.php" autocomplete="off">
	<fieldset>
		<legend>Registration</legend>
		<p>
			<label for="name">User Name:</label>
			<input type="text" id="name" name="name" style="display:block" size="25" maxlength="50" <?php preset('name'); ?>>
			<?php displayError('name'); ?>

			
		</p>
		<p>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" style="display:block"size="25"  <?php preset('email'); ?>>
			<?php displayError('email'); ?>
			<?php displayError('userexists'); ?>
		</p>
		<p>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" size="25"  style="display:block">
			<?php displayError('password'); ?>
		<p>
		<p>
			<label for="password_match"  style="display:block" required>Password again:</label>
			<input type="password" id="password_match" size="25" name="password_match">
			<?php displayError('password_match'); ?>
		</p>
		
		<input type="submit" value="Register">
	
			
			<a href="login.php">Click here to Login</a>

	</fieldset>
	</form>
</div>
</section>


<div class="content">
<article>
<hr>
<h1>Event Calendar</h1>
<h1>Network Community</h1>
<h1>Photo Gallery</h1>
<h1>Blogs</h1>
<h1>Member Page</h1>
</article>
</div>

<section>
	<h3>Search our site</h3>
	<form id="searchForm" action="search-handler.php">
		<label for="query">Enter search string:</label>
		<input type="text" id="query" name="query">
		<input type="submit">
	</form>
</section>

<?php require_once('includes/footer.php');  
clearErrors(); 
session_destroy();
?>


