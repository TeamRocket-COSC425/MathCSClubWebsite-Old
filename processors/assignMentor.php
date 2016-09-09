<?php
/*assignMentor.php
Programmer: Rob Close
Date: January 12, 2015
Description: This function is called when a user selects a Mentor from the Mentors frame to be their assigned Mentor
*/
session_start();
if(!isset($_SESSION['user_id'])){
	header("Location: ../mentor_login.php"); 
}
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();
//arguments from calling function
$mentor_id = $_GET['mentor_id'];
$user_id = $_SESSION['user_id'];
$msg = $_GET['msg'];

	//Get the mentor user info
	$result = $mysqli->query("SELECT * FROM Users WHERE user_id = '$mentor_id'");
	$mentUserArray = mysqli_fetch_array($result);
	$ment_fname = $mentUserArray['fname'];
	$ment_lname = $mentUserArray['lname'];

	//Get the users info to send to the mentor in the email
	$result = $mysqli->query("SELECT * FROM Users WHERE user_id = '$user_id'");
	$userArray = mysqli_fetch_array($result);
	$fname = $userArray['fname'];
	$lname = $userArray['lname'];
	$email = $userArray['email'];
	$major = $userArray['major'];
	$level = $userArray['level'];
	$to = $mentUserArray['email'];
	$subject = "You have a new Mentee!";
	$email_msg = "
	<html>
	<head>
	<title>New Mentee</title>
	</head>
	<body>
	<p>$ment_fname $ment_lname, you have a new Mentee!</p>
	<table>
	<tr>
	<th width=\"50px\">First Name</th>
	<th width=\"50px\">Last Name</th>
	<th width=\"50px\">email</th>
	<th width=\"300px\">Message</th>
	<th width=\"50px\">Major</th>
	<th width=\"50px\">Level</th>
	</tr>
	<tr>
	<td align=\"center\">$fname</td>
	<td align=\"center\">$lname</td>
	<td align=\"center\">$email</td>
	<td align=\"center\">".$msg."</td>
	<td align=\"center\">$major</td>
	<td align=\"center\">$level</td>
	</tr>
	</table>
	</body>
	</html>
	";

	//content-type
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	//Must be a valid email address on the server to preven default sender address
	$headers .= 'From: <sumathcsclub@gmail.com>' . "\r\n";
	//
	$headers .= 'Cc: sumathcsclub@gmail.com' . "\r\n";


	//Checks to ensure a user is logged in and then inserts the row into the User_Mentor Linking Table
	
			//remove existing user_id row if it exists. Do we want to warn the user that they are about to drop their current mentor?
			$result = $mysqli->query("DELETE FROM User_Mentor WHERE user_id_mentee = '$user_id'");
			//add new row linking the User to the Mentor
			$result = $mysqli->query("INSERT INTO User_Mentor VALUES ('$user_id', '$mentor_id')");

			//Email mentor that they have a new mentee
			mail($to,$subject,$email_msg, $headers);
			echo "User id - ".$user_id. " SQL-  INSERT INTO User_Mentor VALUES ('$user_id', '$mentor_id')";
		echo $result;
?>