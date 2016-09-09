<?php
//admin.php
//Programmer: Charlie Sun
//Date: January 15, 2015
//Desc: This script is called by the controls.js to process the admin page

session_start(); 
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();
$admin_user_id = $_SESSION['user_id'];
$action = $_GET['action'];
$user_id = $_GET['user_id'];
$mentor_id = $_GET['mentor_id'];


//security: Cannot query db unless you are logged in (prevents direct url access)
if(isset($_SESSION['user_id'])){
	//Handles the retrieve action
	if($action == "Retrieve"){

		$result = $mysqli->query("SELECT * FROM User_Mentor WHERE user_id_mentee = '". $user_id."'");
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array);
	}

	//Handles the insert action
	else if($action == "Insert"){
		//Insert information
		$result = $mysqli->query("INSERT INTO User_Mentor (user_id_mentee, user_id_mentor) VALUES ('". $user_id."', ".$mentor_id.")");

		//confirm that the information was updated and return the result
		$result = $mysqli->query("SELECT * FROM User_Mentor WHERE user_id_mentee = '". $user_id."'");
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array);
	}
	
	//Handles the update action
	else if ($action == "Update"){
		//uopdate the table information
		$result = $mysqli->query("UPDATE User_Mentor SET user_id_mentor = '".$mentor_id."' WHERE user_id_mentee = '". $user_id."'");

		//confirm that the information was updated and return the result
		$result = $mysqli->query("SELECT * FROM User_Mentor WHERE user_id_mentee = '". $user_id."'");
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array);
	}
	//Handles the update action
	else if ($action == "Delete"){
		//Delete the table information
		$result = $mysqli->query("DELETE FROM User_Mentor Where user_id_mentee = '$user_id'");
		$result = $mysqli->query("SELECT * FROM User_Mentor WHERE user_id_mentee = '". $user_id."'");
		$array = mysqli_fetch_array($result);
		echo json_encode($array);
	}	
}
else{
	echo "You are not logged in";
}


?>