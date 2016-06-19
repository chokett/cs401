<?php
session_start();
require_once('includes/Dao.php');
require_once('includes/session_helper.php');
require_once('includes/form_helper.php');

$email = htmlspecialchars($_POST['email']);
$password = $_POST['password'];
 
$errors = array();



if(!valid_length($email, 1, 50)) {
  $errors['email'] = "Email is required. Must be less than 50 characters.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors['email'] = "Must be a valid email address.";
} 

if(!valid_length($password, 10, 128)) {
  $errors['password'] = "Please enter a password of at least length 10.";
} 

$presets = ['email' => htmlspecialchars($email)];

if(empty($errors)) {
  try {
    $dao = new Dao(); 
    $user = $dao->validateUser($email, $password);
    if($user){
      loginUser($user);
      redirectSuccess("welcome.php");
    } else{ 
      $errors['message'] = "Invalid email or password.";
      redirectError("login.php", $errors, $presets);
    }
  } catch (Exception $e) {
    echo $e->getMessage();
    $errors['message'] = "Contact support or come back later";
    redirectError("login.php", $errors, $presets);
  }
}
else {
  redirectError("login.php", $errors, $presets);
}

?>


