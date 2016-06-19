<?php
require_once('includes/form_helper.php');
session_start();
$query = $_GET['query'];
$result = searchFile($query))
if($result == TRUE){
	echo "FOUND";
	header('Location: found.php');
} else {
	echo"Not Found";
	header('Location: not-found.php');
}

function searchFile($value, $file = 'names.txt'){
	$values = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	return array_search($value, $values);
}
?>
