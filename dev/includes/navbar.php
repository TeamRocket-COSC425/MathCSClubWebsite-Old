<?php
session_start();

?>
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
          <a class="navbar-brand" href="index.php">SU Math & Computer Science Club</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
            <li><a href="about.php">About</a></li>
            <li><a href="whatsNew.php">Whats New</a></li>
            <li><a href="login.php">Mentor Program</a></li>
            <li><a href="calendar.php">Calendar</a></li>
                  
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stay Informed <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="pictures.php">Pictures</a></li> <!-- these pictures are from the stone ages -->
                <li><a href="pme.php">Pi Mu Epsilon</a></li> <!-- these pictures are from the stone ages -->
                <li><a href="news.php">News</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Extras</li>
                 <li><a href="gullCode.php">Gull Code</a></li>
                <li><a href="games.php">Games</a></li>
                <li><a href="skills.php">Skill Enhancer </a></li>
                <li><a href="http://www.salisbury.edu/mathcosc/Tutor/Tutoring%20Schedule%20Spring%202015.pdf">Tutor Schedule</a></li>
              </ul>
            </li>
            <li><?php if($_SESSION['loggedin'] == TRUE){echo "<a href=\"processors/logout.php\">Log Out</a>";}else{echo "<a href=\"login.php\">Log In</a>";} ?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <!-- End navbar -->

<!-- Additional css -->
<style>
.navbar-default {
  background-color: #005e79;
  border-color: #1b677e;
}
.navbar-default .navbar-brand {
  color: #e6e5e3;
}
.navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus {
  color: #ffffff;
}
.navbar-default .navbar-text {
  color: #e6e5e3;
}
.navbar-default .navbar-nav > li > a {
  color: #e6e5e3;
}
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
  color: #ffffff;
}
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
  color: #ffffff;
  background-color: #1b677e;
}
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
  color: #ffffff;
  background-color: #1b677e;
}
.navbar-default .navbar-toggle {
  border-color: #1b677e;
}
.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
  background-color: #1b677e;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #e6e5e3;
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #e6e5e3;
}
.navbar-default .navbar-link {
  color: #e6e5e3;
}
.navbar-default .navbar-link:hover {
  color: #ffffff;
}

@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #e6e5e3;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #ffffff;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #ffffff;
    background-color: #1b677e;
  }
}
.row-eq-height {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
}
html {
  /*background-image: url('login_background.jpg');*/
}

ul.nav li a, ul.nav li a:visited {
    color: ##21657D !important;
}

ul.nav li.active a {
    color: ##003256 !important;
}
</style>
<!-- End Additional css -->