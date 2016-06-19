<?php $thisPage = 'login'; 
session_start();
require_once('includes/header.php');
require_once('includes/form_helper.php');
?>


<!DOCTYPE html>
<html>
<head>
  <title>Login page</title>
  
</head>
<body>
<h3>Login page</h3>

<form method="post" action="login_handler.php" autocomplete="off">
  <fieldset>
  <legend>Login</legend>
    <div>
      <p>
        <label for="email">Email:</label>
         <input type="email" id="email" name="email" style="display:block" size="25"   <?php preset('email'); ?>>
         <?php displayError('email');?>
      </p>
      <p>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" size="25" style="display:block">
          <?php displayError('password'); ?>
      <p>  
      <input  type="submit" value="Log In"/>
      <?php displayError('message'); ?>

  </fieldset>
</form>
<aside id="register-now" class="floating-btn">
  <a href="index.php">New Users Register Now</a>
 </aside>
</body>
</html>
<?php require_once('includes/footer.php');  

?>