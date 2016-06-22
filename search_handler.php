<?php
require_once('includes/form_helper.php');
session_start();
$query = $_GET['query'];
$result = searchFile($query);
if($result == TRUE){
	$errors['message'] = "FOUND";
	header('Location: welcome.php');
} else {
	$errors['message'] = "Not Found";
	header('Location: welcome.php');
}

function searchFile($value, $file = 'firstname.txt'){
	$values = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	return array_search($value, $values);
}
?>
