<?php
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();

//arguments from calling function
$mentor_id = $_GET['mentor_id'];

//get mentors info
$result = $mysqli->query("SELECT M.bio, U.fname, U.lname, U.major, U.email FROM Users U, Mentors M WHERE U.user_id = M.user_id AND M.user_id = ". $mentor_id);
$mentArray = mysqli_fetch_array($result);

$fname = $mentArray['fname'];
$lname = $mentArray['lname'];
$bio = $mentArray['bio'];


?>
<div align="center">
	<div style="font-size:4em; font-weight: bold;" id="mentorName"><?php echo $fname . " " . $lname ?></div>
	<div style=" text-align: center; width: 80%;" id="bio"><?php echo $bio ?></div>
	<div style="margin-top:5%;" id="image"><?php echo "<img src=processors/getImage.php?id=".$mentor_id." width=125, height=100>"?></div>
	<div style="margin-top:5%;" id="selectMentor" class="btn btn-default">Select as my Mentor</div> &nbsp; &nbsp; &nbsp;
	<div style="margin-top:5%;" id="modalBackBtn" class="btn btn-default">Back</div>
</div>