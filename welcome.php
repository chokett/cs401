<?php $thisPage = 'Home';
        require_once('includes/header.php');
        require_once('includes/navigation.php');
session_start(); ?>
<!DOCTYPE html>
<html>
<body>
<div class="content">

	<h1>Welcome <?= $_SESSION['user']; ?>!</h1>
<article>
<hr>
<h1>Event Calendar</h1>
<h1>Network Community</h1>
<h1>Photo Gallery</h1>
<h1>Blogs</h1>
<h1>Member Page</h1>
</article>
</div>
</section>
</body>
</html>

<?php require_once('includes/footer.php');
clearErrors(); ?>