<?php 
/*processMentorApplication.php
Programmer: Rob Close
Date: January 14, 2015
Description: This Script is called in the controls.php to accept a users mentor application and add it to the database. 
The admin must accept the application by changing the field "active" in the database from 0 to 1 before it will be diplsyed in the mentor listing
*/
session_start();
if(!isset($_SESSION['user_id'])){
  header("Location: ../login.php");
}
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();
$user_id = $_SESSION['user_id'];
$msg = $_POST['msg'];
$bio = $_POST['bio'];
$max = $_POST['max'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

	//Get the users info to send in the email
	$result = $mysqli->query("SELECT * FROM Users WHERE user_id = '".$user_id."'");
	$userArray = mysqli_fetch_array($result);
	
	
		//Insert the value into the Mentor table with an active tag = 0
		 $mysqli->query("INSERT INTO Mentors(user_id, bio, max, image, active) VALUES('$user_id', '$bio', '$max', '$image', 0)");
		
		/*echo "INSERT INTO Mentors(user_id, bio, max, active) VALUES('$user_id', '$bio', $max', 0)";*/
		$fname = $userArray['fname'];
		$lname = $userArray['lname'];
		$email = $userArray['email'];
		$major = $userArray['major'];
		$level = $userArray['level'];
		$to = "sumathcsclub@gmail.com";
		$subject = "New Mentor Application";
		$email_msg = "
			<html>
			<head>
			<title>New Mentor Application</title>
			</head>
			<body>
				Please review this application and if it is acceptable, update the Mentor table active column from 0 to 1 and change the Users group from 1 to 2.
			<table>
			<tr>
			<th width=\"50px\">First Name</th>
			<th width=\"50px\">Last Name</th>
			<th width=\"50px\">Email</th>
			<th width=\"300px\">Message</th>
			<th width=\"300px\">Bio</th>
			<th width=\"300px\">Max</th>
			<th width=\"50px\">Major</th>
			<th width=\"50px\">Level</th>
			<th width=\"50px\">Photo</th>
			</tr>
			<tr>
			<td align=\"center\">$fname</td>
			<td align=\"center\">$lname</td>
			<td align=\"center\">$email</td>
			<td align=\"center\">".$msg."</td>
			<td align=\"center\">".$bio."</td>
			<td align=\"center\">".$max."</td>
			<td align=\"center\">$major</td>
			<td align=\"center\">$level</td>
			<td align=\"center\"><img src=\"http://www.rkclose.com/SU_Math_CS_Club/processors/getImage.php?id=$user_id\" width=125 height=100></td>
			</tr>
			</table>
			</body>
			</html>
			";

		//content-type
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		//From the user who is applying
		$headers .= 'From: <sumathcsclub@gmail.com>' . "\r\n";
		//
		$headers .= 'Cc: rob0229@gmail.com' . "\r\n";
		//Email mentor that they have a new mentee
		mail($to, $subject, $email_msg, $headers);
		
	

?>