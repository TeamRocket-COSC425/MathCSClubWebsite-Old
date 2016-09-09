 <?php
 $title = "SUMathCS Home";
    include("includes/header.php");
    include("includes/navbar.php");
    ?>

    <!-- Begin page content -->
    <div class="container" style="background-color: rgba(230,229,227,0.9);">
    	<div class="row" >
    	</div>
    	<div class="row" style="padding:1%;">
    	</div>
    	<div class="row">
			<!-- <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> -->
    		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			</div>
    		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" id="slider">
    		<!--The slide show goes here-->
	    		
<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
      <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
			<!-- 
            <li data-target="#myCarousel" data-slide-to="4"></li>
			-->
        </ol>   
		
       <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item" style="cursor: pointer;" onclick="window.location='gullCode.php';">
              <img class="img-rounded"  src="images/gullcode_sp2014_Carousel.png"></img>
                <div class="carousel-caption">
				  <br/><br/><br/><br/>
                  <h2>Gull Code Programming Challenge</h2>
	
                  <p >Come out to the coding competition to test your skills against other CS and Math students!</p>
                </div>
            </div>
			<!--   Chelsey requested this being taken out.
            <div class="item" style="cursor: pointer;" onclick="window.location='http://www.comap.com/undergraduate/contests/mcm/';">
              <img class="img-rounded"  src="images/mathModeling_Carousel.png"></img>
                <div class="carousel-caption">
                  <h2>Mathematics Modeling Contest</h2>
                  <p>Check out out Mathematical modeling competition.</p>
                </div>
            </div>
			-->
			<!-- Chelsey requested this being taken out.
            <div class="item" style="cursor: pointer;" onclick="window.location='http://faculty.salisbury.edu/~dxdefino/Internships/Internship%20home%20page.htm';">
              <img class="img-rounded"  src="images/internship_Carousel.png"></img>
                <div class="carousel-caption">
                  <font color="black">
                  <p>Learn new skills, get real world experience, and make money!</p></font>
                </div>
            </div>
			-->
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
			
            <div class="item" style="cursor: pointer;" onclick="window.location='mentor.php';">
              <img class="img-rounded"  src="images/mentorX.jpg"></img>
                <div class="carousel-caption">
                  <font color="black">
                  <p>Learn new skills, get real world experience, and make money!</p></font>
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
      <div style="text-align:center; font-size: 1.5em; ">
      
	  <!-- Taken out per Chelsey's request
      <p style="font-size: 2em; font-weight: bold">Announcements:</p>
	  -->
	  <br />
      <div class="row">
      	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      	
      	</div>
      	<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-center">
		
		Welcome to Salisbury University’s Math/ComputerScience/DPS Club Website! <br />
		The club is open to everyone: majors, minors, and anyone else in the SU <br />
		community with an interest in mathematics, computer science, and much more. <br />
		We host a wide variety of events and everything from talks, field trips, pumpkin carving, etc. <br />
		Meetings are Wednesdays at 5pm in Henson 101. Explore the page for more details!<br />
		
		<!--
      	Welcome back everyone! We are looking forward to a great semester! </br>
      	Please monitor your school email about upcoming events and meetings </br>
      	Thank you to all the sponsers and participants in the fall Gull Code. </br>
		
        <a href="gullCode.php"> <font color="red"> Next Gull Code: TBA </b></font></a>
        </br>
        <font color="#595858">Join us on Wendesday's at 5:00pm in 101, </br>
        Dead Poets Society questions every week!! </br>
         </br></font>
        -->   
        </div>
      </div>
    </div>
  </div>
</br></br></br></br></br>
 <?php 
     require("includes/footer.php");
?>