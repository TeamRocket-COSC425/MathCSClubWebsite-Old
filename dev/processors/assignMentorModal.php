<?php
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();

//get mentors info
$result = $mysqli->query("SELECT M.bio, M.image_id, U.fname, U.lname, U.major, U.email FROM Users U, Mentors M WHERE U.user_id = M.user_id AND mentor_id = ". $mentor_id);
$mentArray = mysqli_fetch_array($result);

$fname = $mentArray['fname'];
$lname = $mentArray['lname'];
$bio = $mentArray['bio'];
$image_id = $mentArray['image_id'];

?>
<div align="center">
	<div style="font-size:3.5em; font-weight: bold;" id="mentorName">Mentor: <?php echo $fname . " " . $lname ?></div>
	<div style="font-size:2em; font-weight: bold;">Please tell your new mentor a little about yourself.</div>
	<div style=" text-align: center; width: 80%; font-size:2em; font-weight: bold;"><textarea id="msg" type="text"></textarea></div>
	<div style=" font-size: 2.25em" id="assignMentor" class = "btn2">Send Request</div>
	<div id="modalBackBtn" class="btn1">Cancel</div>
</div>