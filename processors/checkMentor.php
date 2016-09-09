<?php
/*checkMentor.php
Programmer: Rob Close
Date: January 14, 2015
Description: This function checks if the requested mentor is already assigned to the user
*/

session_start();
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();

//arguments from calling function
$mentor_id = $_GET['mentor_id'];
$user_id = $_SESSION['user_id'];
$currentMentor = "";

//Check to see if the mentor is already assigned to this user
//Checks the current mentor for the user
$result = $mysqli->query("SELECT * FROM `User_Mentor` WHERE user_id = '".$user_id."'");
if($result != ""){
	$array = mysqli_fetch_array($result);
	$currentMentor = $array['mentor_id'];

	//checks to see if the current mentor is the same as the requested
	if($currentMentor != $mentor_id){
		//selected mentor is not the same
		echo 1;
	}
	else{
		//mentor is the same as currently assigned
		echo 0;
	}
}
else{
	//selected mentor is not the same
	echo 1;
}
?>