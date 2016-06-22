<?php $thisPage = 'Home'; 
session_start();
require_once('includes/Dao.php');
require_once('includes/header.php'); 
require_once('includes/form_helper.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>

<section>
	<table style="position: relative; top: -0px; left: 0px;">	
		<tr>
			<td>
<div id="regform">
	<form method="POST" action="registration_handler.php" autocomplete="off">
	<fieldset>
		<legend>Registration</legend>
		<p>
			<label for="name">User Name:</label>
			<input type="text" id="name" name="name" style="display:block" size="25" maxlength="50" <?php preset('name'); ?>>
			<?php displayError('name'); ?>			
		</p>
		<p>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" style="display:block"size="25"  <?php preset('email'); ?>>
			<?php displayError('email'); ?>
			<?php displayError('userexists'); ?>
		</p>
		<p>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" size="25"  style="display:block">
			<?php displayError('password'); ?>
		<p>
		<p>
			<label for="password_match"  style="display:block" required>Password again:</label>
			<input type="password" id="password_match" size="25" name="password_match">
			<?php displayError('password_match'); ?>
		</p>
		
		<input type="submit" value="Register">
	
			
			<a href="login.php">Click here to Login</a>

	</fieldset>
	</form>
</div>
</section>
</td>
<td>
<aside>
	
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>
    <!-- use jssor.slider.debug.js instead for debug -->
    <script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 600);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>

    <style>
        
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 12 css */
        /*
        .jssora12l                  (normal)
        .jssora12r                  (normal)
        .jssora12l:hover            (normal mouseover)
        .jssora12r:hover            (normal mouseover)
        .jssora12l.jssora12ldn      (mousedown)
        .jssora12r.jssora12rdn      (mousedown)
        */
        .jssora12l, .jssora12r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 30px;
            height: 46px;
            cursor: pointer;
            background: url('img/a12.png') no-repeat;
            overflow: hidden;
        }
        .jssora12l { background-position: -16px -37px; }
        .jssora12r { background-position: -75px -37px; }
        .jssora12l:hover { background-position: -136px -37px; }
        .jssora12r:hover { background-position: -195px -37px; }
        .jssora12l.jssora12ldn { background-position: -256px -37px; }
        .jssora12r.jssora12rdn { background-position: -315px -37px; }
    </style>


    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 400px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: relative; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: relative; display: block; top: 0px; left: 0px; width: 100%; height: 110%;"></div>
            <div style="position:relative;display:inline;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:110%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 400px; overflow: hidden;">
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="img/02.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="img/04.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="img/05.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="img/09.jpg" />
            </div>
        
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
    </div>
	</aside>
</td>
<tr>
	</table>
	
<div class="content">
<article>
<hr>
<h1>Event Calendar</h1>
<h1>Network Community</h1>
<h1>Photo Gallery</h1>
<h1>Blogs</h1>
<h1>Member Page</h1>
</article>
</div>


<?php require_once('includes/footer.php'); 
 
clearErrors(); 
session_destroy();
?>



