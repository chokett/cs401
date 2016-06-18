<?php
require_once('includes/Dao.php');

$dao = new Dao();

$email = "newuser@mail.com";
$password = "superSecretpassword";
$name = "NewUserfrr";

if($dao->userExists($email)){
	echo "Can't add user. Already exists";
} else {
	//hash my password
	if($dao->addUser($email, $password, $name)){
		echo "Sucessfully added user: $email";
	} else{
		echo "Something unexpected happened";
	}
}

?>