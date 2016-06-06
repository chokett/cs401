<?php $thisPage = 'Home'; 
require_once('includes/header.php'); 
session_start();

/**
 * Prints preset for given key (if one exists).
 */
function preset($key) {
	if(isset($_SESSION['presets'][$key]) && !empty($_SESSION['presets'][$key])) { 
		echo 'value="' . $_SESSION['presets'][$key] . '" '; 
	}
}


/**
 * Prints error for given key (if one exists).
 */
function displayError($key) {
	if(isset($_SESSION['errors'][$key])) { ?>
		<span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['errors'][$key] ?></span>
	<?php }
}

/**
 * Clears error data from session when we are done so they don't show
 * up on refresh or if user submits correct info next time around.
 */
function clearErrors() {
	unset($_SESSION['errors']);	
	unset($_SESSION['presets']);	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>

<section>
<div id="regform">
	<form method="POST" action="registration-handler.php" autocomplete="off">
	<fieldset>
		<legend>Registration</legend>
		<p><label for="fullName" style="display:block" required>User Name:</label>
		<input type="text" id="fullName" name="fullName" maxlength="50"required <?php preset('fullName'); ?>
		<?php displayError('fullName'); ?></p>
		<p><label for="email" style="display:block" required>Email:</label>
		<input type="email" id="email" name="email" <?php preset('email'); ?> >
		<?php displayError('email'); ?></p>
		<p><label for="password" style="display:block" required>Password:</label>
		<input type="password" id="password" name="password">
		<?php displayError('password'); ?></p>
		<p><label for="password_match" style="display:block"required>Password again:</label>
		<input type="password" id="password_match" name="password_match">
		<?php displayError('password_match'); ?></p>
		
        <input type="submit" value="Register">
  		<input type="button" value="Log In">
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
clearErrors(); ?>


