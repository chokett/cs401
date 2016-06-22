<?php $thisPage = 'Photo Gallery';
      $upload_dir = "uploads"; 
session_start(); 
require_once('includes/form_helper.php');
require_once('includes/session_helper.php');
if(!isAccessGranted()) {
	$errors['message'] = "You must login to access page.";
	redirectError("login.php", $errors);
}  
require_once('includes/header.php');  
require_once('includes/navigation.php'); 
include('UberGallery/resources/UberGallery.php');
?>


<div class="content">
<head>

 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  </head>

<h1>Welcome to our photo gallery. </h1>
</div> 
<?php
    // Initialize the UberGallery object
$gallery = new UberGallery();
$gallery = UberGallery::init()->createGallery('/Users/chokett98/Documents/repos/401repo/UberGallery/gallery-images'); 
    // Initialize the gallery array
    $galleryArray = $gallery->readImageDirectory('/Users/chokett98/Documents/repos/401repo/UberGallery/gallery-images');



?>
<div class="forms">
<?php if($_SERVER['REQUEST_METHOD'] == "POST") {
  # Print all values received in the POST array
  foreach($_POST as $key => $value) { ?>
    <p><?= $key . ': '; print_r(htmlspecialchars($value)); ?></p>
<?php  }
  # Handle the uploaded files.
  $picture_file = $_FILES['picture']; ?>
  <p>Picture File: <pre><?php print_r($picture_file); ?></pre></p>
<?php
  # move the tmp image to an uploads directory and display it.
  # NOTE: You would want to do more work to validate file name,
  # file size, type, etc.
  $imagepath = $upload_dir . "/" . $picture_file['name'];
  if(is_uploaded_file($picture_file['tmp_name'])) {
    move_uploaded_file($picture_file['tmp_name'], "$imagepath"); ?>
    <img src="<?= $imagepath; ?>" alt="user image" style="display:block"/>
<?php
  }
} else { ?>
  <!-- We are posting this form back to ourselves. The form is only displayed
      on an HTTP GET -->
<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

  <!-- START HTML 5 ONLY... MAY NOT BE SUPPORTED ON ALL BROWSERS -->
  <fieldset>
    <legend>Upload Pictures</legend>
      <div>
        <label id="picture">Would you like to upload a picture?</label>
        <!-- NOTE that the accept parameter is new and not very reliable. -->
        <input type="file" id="picture" name="picture" accept="image/*">
        
        <div class="submit">
           <input type="submit" value="Submit Picture">
         </div>
      </div>
  </fieldset>

  </form>
<?php } ?>
</div> 


<?php require_once('includes/footer.php'); ?>

