<<<<<<< HEAD
<?php $thisPage = 'Home';
?>

<?php require_once('phpincludes/header.php'); ?>
<?php require_once('phpincludes/nav.php'); ?>
<?php require_once('phpincludes/forms.php'); ?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>UNI-que Home</title>
		<link href="favicon.ico" type="img/x-icon" rel="shortcut icon">
		<link rel="stylesheet" href="styling.css" type="text/css" />
	</head>
<body>
<aside>


<img src="UNI-image.jpg" alt="UNI Image" ></a>

</aside>
<div class="login">
<form method ="POST" action="registration-handler.php" autocomplete="off">
  <fieldset>
    <legend>Registration</legend>
    <p>
	<label for="fullName">Full Name:</label>
	<input type="text" id="fullName" name="fullName" maxlength="50" required>
    </p>            
    <p>
	<label for="email">Email:</label>
	<input type="email" id="email" name="email" required>
       
    </p>
    <p>
	<label for="password">Password:</label>
	<input type="password" id="password" name="password" required>
	
    </p>
    <p>
	<label for="password_match">Password again:</label>
	<input type="password" id="password_match" name="password_match" required>
	
    </p>    
    <input type="submit" value="Sign up now">
    <input type="submit" value="Log In">
  </fieldset>
</form>
</div>

<article>
<hr>
<h1>Event Calendar</h1><br>
<h1>Network Community</h1><br>
<h1>Photo Gallery</h1><br>
<h1>Blogs</h1><br>
<h1>Member Page</h1><br>
</article>

<?php include("footer.html");?>

</body>
</html>


