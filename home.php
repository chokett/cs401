<?php
session_start();

    $links = array( 'Home' => 'index.php',
                    'Event Calendar'  => 'calendar.php',
                    'Network Community' => 'community.php',
                    'Photo Gallery' => 'gallery.php',
                    'Blogs' => 'blogs.php',


    function preset($key) {
        if(isset($_SESSION['presets'][$key]) && !empty($_SESSION['presets'][$key])) { 
            echo 'value="' . $_SESSION['presets'][$key] . '" '; 
        }
    }

    function displayError($key) {
        if(isset($_SESSION['errors'][$key])) { ?>
            <span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['errors'][$key] ?></span>
        <?php }
    }

    function clearErrors() {
        unset($_SESSION['errors']); 
        unset($_SESSION['presets']);    
    }

 //   $fullName = htmlspecialchars($_POST['fullName']);
 //   $email = htmlspecialchars($_POST['email']);
 //   $password = htmlspecialchars($_POST['password']);
 //   $password_match = htmlspecialchars($_POST['password_match']);

    var_dump($_POST);
    
?> 

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="styling.css" type="text/css" />
<title>
        UNI-que Home
</title>\
</head>
<body>
    <header>

        <h1>
            UNI-que Networking Interactive
        </h1>
        <?php include("includes/header.html");?>
        <?php include("includes/navigation.html");?>
    
        <nav>
                <ul> 
                <li><a href="">Home</a></li>
                <li><a href="">Event Calendar</a></li>
                <li><a href="">Network Community</a></li>
                <li><a href="">Photo Gallery</a></li>
                <li><a href="">Blogs</a></li>

            </ul>
        </nav>
    </header>
        
            <img src="UNI-image.jpg" alt="UNI Image" style ="width:700px;height:400px;"></a>
        </aside>
    <div>    
    <section>
       <form method ="POST" action="registration-handler.php" autocomplete="off">
            <fieldset>
            <legend>Registration</legend>
            <p>
                <label for="fullName">Your Name:</label>
                <input type="text" id="fullName" name="fullName" maxlength="50" <?php preset('fullName'); ?>>
                <?php diplayError('fullName'); ?>
            </p>            
            <p>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" <?php preset('email'); ?> required>
                <?php displayError('email'); ?>
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <?php displayError('password'); ?>
            </p>
            <p>
                <label for="password_match">Password again:</label>
                <input type="password" id="password_match" name="password_match">
                <?php displayError('password_match'); ?>
            </p>    
            <input type="submit" value="Sign up now">
            </fieldset>
       </form>
    </section>
<img src="UNI-image.jpg" alt="UNI Image" style ="width:700px;height:400px;"></a>
</div>
 <hr>


    <section>
        <a href= #calendar><ing src="calendar.jpg" alt="calendar image" style="width:50px;height:50px;">Event Calendar</a>
    </section>
<br>
    <section>
        <a href= #community><ing src="community.jpg" alt="community image" style="width:50px;height:50px;">Network Community</a><br>
    </section>
<br>
    <section>
        <a href= #gallery><ing src="gallery.jpg" alt="gallery image" style="width:50px;height:50px;">Photo Gallery</a><br>
    </section>
<br>
    <section>
        <a href= #blog><ing src="blog.jpg" alt="blog image" style="width:50px;height:50px;">Blogs</a>
    </section>
<br>
    <section>
        <a href= #member-page><ing src="member-page.jpg" alt="member-page image" style="width:50px;height:50px;">Member Page</a>
    </section>
<br>

<?php include("includes/footer.html");?>

</body>
</html>
