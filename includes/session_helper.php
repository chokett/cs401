<?php 

function loginUser($user){ 
      $_SESSION['access_granted'] = true;
      $_SESSION['username'] = $user['name'];
      $_SESSION['userid'] = $user['id'];
      session_regenerate_id(true);
}

function isAccessGranted(){
    if(isset($_SESSION['access_granted']) && ($_SESSION['access_granted'] === true)){
      return true;
    } else{
      return false;
    }
}

?>