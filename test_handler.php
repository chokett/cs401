<?php

session_start();
unset($_SESSION['error']); 
require_once('Dao.php');
if(isset($_POST['email']))
{
	
	$email = $_POST['email'];
	try {
		$dao = new Dao();
		$found = $dao->getRow($email);
		if(empty($found)) { // result will be empty if user was not in DB.
			$results = $dao->addRow($email);
		} else {
			// user already exists, use a session to send an error message
			// back to the user.
			$_SESSION['error'] = "Email exists '$email'. Please choose another.";
		}
		header('Location: index.php');
	} catch (PDOException $e) {
		echo $e->getMessage(); // only print this during development. Don't print in production.
		echo "<p>Failed to add email. Please come back later.</p>";
		die();
	}
}