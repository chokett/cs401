<?php
session_start();
require_once('includes/Dao.php');

  

  $email = htmlspecialchars($_POST['email']);
  $password = $_POST['password'];
 
function valid_length($field, $min, $max) {
  $trimmed = trim($field);
  return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}

$errors = array();
 
if(!valid_length($email, 1, 50)) {
  $errors['email'] = "Email is required. Must be less than 50 characters.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors['email'] = "Must be a valid email address.";
} 

if(!valid_length($password, 10, 128)) {
  $errors['password'] = "Please enter a password of at least length 10.";
} 


if(empty($errors)) {
  $dao = new Dao(); 
  if($dao->validateUser($email, $password)){
      header('Location: Welcome.php');     
  } else{ 
      $_SESSION['errors']['userexists'] = "couldn't add";
      header('Location: login.php');
  }
}
else{
  $_SESSION['errors'] = $errors;
  $_SESSION['presets'] = array('email' => htmlspecialchars($email));     
  header('Location: login.php');

}

?>


