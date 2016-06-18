<?php $thisPage = 'login'; 
session_start();
require_once('includes/Dao.php');
require_once('includes/header.php');


/**
* Prints preset for given key (if one exists).
*/
function preset($key) {
  if(isset($_SESSION['presets'][$key]) && !empty($_SESSION['presets'][$key])) { 
    echo 'value="' . $_SESSION['presets'][$key] . '" '; 
  }
}


/**
* Prints error for given key (if one exists).
*/
function displayError($key) {
  if(isset($_SESSION['errors'][$key])) { ?>
    <span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['errors'][$key] ?></span>
  <?php }
}

/**
* Clears error data from session when we are done so they don't show
* up on refresh or if user submits correct info next time around.
*/
function clearErrors() {
  unset($_SESSION['errors']); 
  unset($_SESSION['presets']);  
}

function validateSession() {
  if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"] === true) {
    //can also verify USER_AGENT and IP are the same.
    return true;
  } else {
    return false;
  }
}

/**
 * Regenerates the session id and sets the login flag to true.
 */
function loginUser($email) {
  session_regenerate_id(true);
  $_SESSION["access_granted"] = true;
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Login page</title>
  <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<h3>Login page</h3>

<!-- <form method="post" action="http://cs.boisestate.edu/~marissa/classes/401/param&#45;tester.php"> -->
<form method="post" action="login_handler.php">
  <fieldset>
  <legend>Login</legend>
    <div>
      <p>
        <label for="email">Email:</label>
         <input type="email" id="email" name="email" style="display:block" <?php preset('email'); ?>>
         <?php displayError('email'); ?>
         <?php displayError('userexists'); ?>
      </p>
      <p>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" style="display:block">
          <?php displayError('password'); ?>
      <p>  
    <div>
      <input name="postSubmitButton2" type="submit" value="Log In"/>
    </div>
  </fieldset>
</form>
</body>
</html>
