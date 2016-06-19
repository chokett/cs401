<?php $thisPage = 'Home';
session_start(); 
require_once('includes/form_helper.php');
require_once('includes/session_helper.php');
if(!isAccessGranted()) {
	$errors['message'] = "You must login to access page.";
	redirectError("login.php", $errors);
}  
require_once('includes/header.php');
require_once('includes/navigation.php');



if(!isAccessGranted()) {
	$errors['message'] = "You must login to access page.";
	redirectError("login.php", $errors);
} 
$user = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
	<body>
		<div class="content">
			<h1>Welcome <?= $user ?>!</h1>
			<article>
				<hr>
				<h1>Event Calendar</h1>
				<h1>Network Community</h1>
				<h1>Photo Gallery</h1>	
				<h1>Blogs</h1>
				<h1>Member Page</h1>
			</article>
		</div>
	</body>
</html>

<?php require_once('includes/footer.php');
?>
