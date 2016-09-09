<?php
/*********************************
  mentorApplicationModal.php
  Programmer: Rob Close
  Date: January 14th, 2015

  Programmer: Hilary Vernon
  Date Edited: January 25, 2015
  Change Log: Updated to comply with bootstrap, added classes taken option
***********************************/

session_start();
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();

if(!isset($_SESSION['user_id'])){
	header("Location: ../login.php");
}
$user_id = $_SESSION['user_id'];

	//Check to see if the user_id already exists in the mentor table
	$result = $mysqli->query("SELECT * FROM Mentors WHERE user_id = '$user_id'");
	if(mysqli_num_rows($result) != 0){
		echo "mentor_exists";
		exit;
	}
	
?>
<div align="center">
<h4>Each mentor brings a unique set of qualities and experience to this program. Without mentors, the program would not exist. </h4><br>
<div style="font-size: 14px; font-weight: bold;">Why do you want to be a mentor?</div>
<div style=" text-align: center; font-size:14px;"><textarea id="application" style="width: 70%; height:15%"></textarea></div>
<div style="font-size: 14px; font-weight: bold;">Write a bio that new mentees will read about you, some helpful information to include would be interests, classes taken, etc.</div>
<div style=" text-align: center; font-size:14px;"><textarea id="app_bio" style="width: 70%; height:15%"></textarea></div>
<div style="font-size: 14px; font-weight: bold;">What is the max number of Mentees you wish to have? (No more than 4)</div>
<div style=" text-align: center; font-size:14px;"><select id="app_max" style="width: 70%"><option>1</option><option>2</option><option>3</option><option>4</option></select></div>
<div><img id="mentor_app_preview" src="#" alt="your image" width="200" height="150" /></div>
<div><input type="file" id="mentor_app_img_file" accept="image/*"/></div>
<div class="btn btn-default" id="submitApplicationBtn" style="margin: 5%;">Submit</div>
<div class="btn btn-default" id="cancelAppBtn">Cancel</div>
</div>





