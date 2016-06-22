<?php
require_once('includes/session_helper.php');
if(session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>UNI-que <?= $thisPage; ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="UNI-que Networking Interactive">
  <link href='style.css' type='text/css' rel='stylesheet'> 
  <link href="images/favicon.ico" rel="shortcut icon" type="images/jpg">


</head>
 
   <div id="header">
	<table style="position: relative; top: -0px; left: 0px;">	
	<tr>
		<div class="logo">
				<td><a href='welcome.php'><img src="images/icon2.png" alt="UNI-logo"></td>
			</div>
		<aside id="user-actions" class="flaoting-btn">
			<?php if(isAccessGranted()){ ?>
				<a href="logout.php">Logout</a>
				<?php } else { ?>
				<a href="login.php">Sign In</a>
				<?php } ?>
			</aside>	
			
			<div class="text">
			<td><h1>UNI-que Networking Interactive</h1></td>
			</div> 
	</tr>
	</table>
	</div>
