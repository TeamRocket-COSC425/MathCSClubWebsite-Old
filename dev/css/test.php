<!-- test.php
  Programmer: Hilary Vernon
  Updated: January 25, 2015
  A test main landing page for the Mentor Program website
-->

<?php
session_start();
$_SESSION['username'] = "";
$_SESSION['password'] = "";
$_SESSION['user_id'] = "";

require_once("includes/frames_login.Class.php");
$frames = new frames_login();
?>

<html>

  <!-- HTML includes for jQuery and bootstrap -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/jquery.min.js"></script>
    <script src="js/login_controls.js"></script>
    <script src="js/carousel.js"></script>    
    <script type="text/javascript" src="js/verifyAddress.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.2.0/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/mentor.css">
    <link rel="stylesheet" type="text/css" href="css/carousel.css">
    <link rel="stylesheet" type="text/css" href="css/additional_css.css">
    <script src="bootstrap-3.2.0/dist/js/bootstrap.js"></script>
    <title>Math & Computer Science Club</title>  
  </head>

  <!-- 
    1/21/15
    This navbar should be an include file, so we don't need to copy and paste this every time. 
    HV - fix this later
  -->

  <!-- begin navbar -->
  <body>
      <div class="navbar navbar-default " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">SU Math & Computer Science Club</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
            <li><a href="about.html">About</a></li>
            <li><a href="whatsNew.html">Whats New</a></li>
            <li><a href="mentor_login.php">Mentor Program</a></li>
            <li><a href="calendar.html">Calendar</a></li>
                  
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stay Informed <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="pictures.html">Pictures</a></li> <!-- these pictures are from the stone ages -->
                <li><a href="pme.html">Pi Mu Epsilon</a></li> <!-- these pictures are from the stone ages -->
                <li><a href="news.html">News</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Extras</li>
                 <li><a href="gullCode.html">Gull Code</a></li>
                <li><a href="games.html">Games</a></li>
                <li><a href="skills.html">Skill Enhancer </a></li>
                <li><a href="http://www.salisbury.edu/mathcosc/Tutor/Tutoring%20Schedule%20Fall%202014.pdf">Tutor Schedule</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <!-- End navbar -->



<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column" style="background-color:rgba(230,229,227,0.6); ">
			<!-- Begin Heading -->
			<h3>
				Math and Computer Science Mentor Program Landing Page
			</h3>
			<!-- End Heading -->
		</div>
	</div>
	<br><br>
	<!-- changed here to eq-height fix -->
	<div class="row row-eq-height">
		<!-- Link Column --> 
		<div class="col-md-2 column" style="background-color:rgba(230,229,227,0.6); padding-right:2px;">
			<p>
				Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</small>

			</p>
		</div>

		<!-- Content Column -->
		<div class="col-md-6 column" style="background-color:rgba(230,229,227,0.6);">
			<p>
				Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</small>
			</p>
		</div>

		<!-- Description Column -->
		<div class="col-md-4 column" style="background-color:rgba(230,229,227,0.6);">
			<dl>
				<dt>
					Description lists
				</dt>
				<dd>
					A description list is perfect for defining terms.
				</dd>
				<dt>
					Euismod
				</dt>
				<dd>
					Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
				</dd>
				<dd>
					Donec id elit non mi porta gravida at eget metus.
				</dd>
				<dt>
					Malesuada porta
				</dt>
				<dd>
					Etiam porta sem malesuada magna mollis euismod.
				</dd>
				<dt>
					Felis euismod semper eget lacinia
				</dt>
				<dd>
					Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
				</dd>
			</dl>
			<dl>
				<dt>
					Description lists
				</dt>
				<dd>
					A description list is perfect for defining terms.
				</dd>
				<dt>
					Euismod
				</dt>
				<dd>
					Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
				</dd>
				<dd>
					Donec id elit non mi porta gravida at eget metus.
				</dd>
				<dt>
					Malesuada porta
				</dt>
				<dd>
					Etiam porta sem malesuada magna mollis euismod.
				</dd>
				<dt>
					Felis euismod semper eget lacinia
				</dt>
				<dd>
					Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
				</dd>
			</dl>
		</div>
	</div>
</div>