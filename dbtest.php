<?php
require_once('includes/Dao.php');
echo "im here";
$dao = new Dao();
$users = $dao->getUsers();
var_dump($users);

$exists = $dao->userExists('snoopy@doghouse.com');
var_dump($exists);

$exists = $dao->userExists('doesnotexit@doesnot.com');
var_dump($exists);

$email = "newuser@mail.com";
$password = "superSecretpassword";
$name = "NewUserfrr";
echo "im here";
if($dao->userExists($email)){
	echo "Can't add user. Already exists";
} else {
	if($dao->addUser($email, $password, $name)){
		echo "Sucessfully added user: $email";
	} else{
		echo "Something unexpected happened";
	}
}

?>