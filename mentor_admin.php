<!-- mentor.php
  Main page for the Mentor Program 
  Programmer: Rob Close
  Date: January 2nd, 2015
-->
<?php
session_start();

require('includes/config.php'); 
//if not logged in redirect to login page
if(!$user->is_logged_in() || $_SESSION['group_id'] != 3){ header('Location: login.php'); } 
//define page title
$title = "SUMathCS Mentor";
require_once("includes/frames.Class.php");
$frames = new frames();

require('includes/header.php'); 
require('includes/navbar.php');
 
?>

  <div id="mentor_container">
    <div id="messageBox">Welcome to the Mentor Program</div>
      <div class="navCol">
        <ul class="list">
          <li id="homeLink">Home</a></li>
          <li id="aboutLink">About</a></li>
          <li id="mentorsLink">Mentors</a></li>
          <li id="userMaintLink">User Account Update</a></li>
          <li id="mentorsMaintLink">Mentor Account Update</a></li>
          <li id="adminLink">Admin</a></li>
        </ul>
      </div> 
      <div class="infoCol">
        <!-- Info Column FRAME -->
        <?php $frames -> frameInfoCol(); ?>
      </div> 
      <div class="content">
        <!-- Default Content Landing FRAME -->
        <?php $frames -> frameHome(); ?>
        <!-- About FRAME -->
        <?php $frames -> frameAbout(); ?>
        <!-- Mentors FRAME -->
        <?php $frames -> frameMentors(); ?>
        <!-- User Account Info Maintenance-->
        <?php $frames -> frameUserMaint(); ?>
        <!-- Mentor Account Info Maintenance-->
        <?php $frames -> frameMentorsMaint(); ?>
        <!-- Admin function -->
        <?php $frames -> frameAdmin(); ?>
        <!-- MODAL POPUP -->
        <?php $frames -> modal(); ?>
      </div>
  </div>     
  <script>var controls = new controls();</script>  
  </div>
    <div class="footer">
      <div class="container">
        <p class="text-muted"> &copy; 2014 Salisbury University Math & Computer Science club</p>
      </div>
    </div>
  </body>
</html>
