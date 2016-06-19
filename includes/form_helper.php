<?php


function clearErrors() {
  unset($_SESSION['errors']); 
  unset($_SESSION['presets']);  
}

function valid_length($field, $min, $max) {
  $trimmed = trim($field);
  return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
}

function preset($key) {
	if(isset($_SESSION['presets'][$key]) && !empty($_SESSION['presets'][$key])) { 
		echo 'value="' . $_SESSION['presets'][$key] . '" '; 
	}
}

function displayError($key) {
	if(isset($_SESSION['errors'][$key])) { ?>
		<span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['errors'][$key] ?></span>
	<?php }
}

function validateSession() {
  if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"] === true) {
    return true;
  } else {
    return false;
  }
}


function redirectError($location, $errors, $presets =NULL){
  $_SESSION['errors'] = $errors;
  if($errors){
    $_SESSION['presets'] = $presets;
  }
  header("Location: $location");
  die;
}

function redirectSuccess($location, $user = NULL){
  if($user){
    $_SESSION['user'] = $user;
  }
  header("Location: $location");
}

?>