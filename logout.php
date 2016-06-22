<?php
require_once('includes/session_helper.php');
session_start();

logoutUser();
header("Location: index.php");
?>
