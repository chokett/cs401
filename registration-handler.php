<?php 
session_start();
require_once('includes/Dao.php');



$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$password_match = htmlspecialchars($_POST['password_match']);

$errors = array();

if(!valid_length($name, 1, 50)) {
	$errors['name'] = "Full name is required. Must be less than 50 characters.";
}

if(!valid_length($email, 1, 50)) {
	$errors['email'] = "Email is required. Must be less than 50 characters.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errors['email'] = "Must be a valid email address.";
} 

if(!valid_length($password, 10, 128)) {
	$errors['password'] = "Please enter a password of at least length 10.";
} else if($password != $password_match) {
	$errors['password_match'] = "Passwords do not match.";
}

function valid_length($field, $min, $max) {
	$trimmed = trim($field);
	return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}


if(empty($errors)) {
	$dao = new Dao();	
	if($dao->userExists($email)){
		$_SESSION['errors']['userexists'] = "Email already exists";
		header('Location: index.php');
	} 
	else {
		if($dao->addUser($email, $password, $name)){
			$_SESSION['user'] = htmlspecialchars($name);
			header('Location: welcome.php');
		} 
		else{	
			$_SESSION['errors']['userexists'] = "couldn't add";
			header('Location: index.php');
		}
	}	
}
else{
	$_SESSION['errors'] = $errors;
	$_SESSION['presets'] = array('name' => htmlspecialchars($name),
					'email' => htmlspecialchars($email));			
	header('Location: index.php');

}

?>

