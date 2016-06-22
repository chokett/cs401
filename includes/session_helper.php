<?php 

function loginUser($user){ 
      $_SESSION['access_granted'] = true;
      $_SESSION['username'] = $user['name'];
      $_SESSION['userid'] = $user['id'];
      session_regenerate_id(true);
}
function logoutUser(){
  session_unset();
  session_regenerate_id(true);
  session_destroy();
}


function isAccessGranted(){
    if(isset($_SESSION['access_granted']) && ($_SESSION['access_granted'] === true)){
      return true;
    } else{
      return false;
    }
}

?>