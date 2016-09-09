<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<script src="js/carousel.js"></script>
	<!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/club.css">
	<link rel="stylesheet" type="text/css" href="css/carousel.css">
	
    <title>Math & Computer Science Club</title>  
  </head>

  <body>

    <!-- php include for navbar -->
    <?php
    include("includes/navbar.php");
    ?>
    <!-- end php include -->

    <!-- Begin page content -->
    <div class="container">
    	<div class="row" >
    		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    			<h3 style="display:inline;"> Welcome to the</h3> <img src="images/logo.jpg" alt="Math and Computer Science Club">
    		</div>
    		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    	</div>
    	<div class="row" style="padding:1%;">
    	</div>
    	<div class="row">
    		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
    		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" id="slider">
    		<!--The slide show goes here-->
	    		
<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
      <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>   
       <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item" style="cursor: pointer;" onclick="window.location='gullCode.php';">
              <img class="img-rounded"  src="images/gullcode_sp2014_Carousel.png"></img>
                <div class="carousel-caption">
                  <h2>Gull Code Programming Challenge</h2>
                  <p >Come out to the coding competition to test your skills against other CS and Math students!</p>
                </div>
            </div>
            <div class="item" style="cursor: pointer;" onclick="window.location='http://www.comap.com/undergraduate/contests/mcm/';">
              <img class="img-rounded"  src="images/mathModeling_Carousel.png"></img>
                <div class="carousel-caption">
                  <h2>Mathematics Modeling Contest</h2>
                  <p>Check out out Mathematical modeling competition.</p>
                </div>
            </div>
            <div class="item" style="cursor: pointer;" onclick="window.location='http://faculty.salisbury.edu/~dxdefino/Internships/Internship%20home%20page.htm';">
              <img class="img-rounded"  src="images/internship_Carousel.png"></img>
                <div class="carousel-caption">
                  <font color="black">
                  <p>Learn new skills, get real world experiance, and make money!</p></font>
                </div>
            </div>
           <div class="item" style="cursor: pointer;" onclick="window.location='whatsNew.php';">
              <img class="img-rounded"  src="images/clubEvents_Carousel.png"></img>
                <div class="carousel-caption">
                  <h2>Club Events</h2>
                  <p>Hang out with your classmates in a fun social atmosphere!</p>
                </div>
            </div>
            <div class="item" style="cursor: pointer;" onclick="window.location='skills.php';">
              <img class="img-rounded"  src="images/skills_Carousel.png"></img>
                <div class="carousel-caption">
                  <h2>Skill Enhancers</h2>
                  <p>Stay up to date with new technologies and practice rusty skills!</p>
                </div>
            </div>
        </div>

        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>

  		<!--/Slider-->
				<!--End carousel -->
    		</div>

    	</div>
      
      <p class="lead" style="text-align:center;">Annoucements:</p>
      <div class="row">
      	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      	
      	</div>
      	<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
      	Welcome back everyone! We are looking forward to a great semester!
      	</div>
      </div>
      <div class="row">
      	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      	
      	</div>
      	<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
      	Please monitor your school email for announcements about upcoming events and meetings.
      	</div>
      </div>
      <div class="row">
      	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      	
      	</div>
      	<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
      	Sign up for the upcoming March 28th, 2015 Programming Challenge <code>"Gull Code"</code>:<a href="gullCode.php">Gull Code Sign Up</a>
      	</div>
      </div>
    </div>

    <div class="footer">
      <div class="container">
        <p class="text-muted"> &copy; 2014 Salisbury University Math & Computer Science club</p>
      </div>
    </div>

  </body>
</html>
