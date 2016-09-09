<?php
//adminMentorTable.php
//Programmer: Rob Close
//Date: January 16, 2015
//Desc: This script is called by the controls.js to process the adminMentorTable functions on the admin page

session_start(); 
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();
$admin_id = $_SESSION['user_id'];

$action = $_GET['action'];
$user_id = $_GET['user_id'];
$bio= $_GET['bio'];
$max = $_GET['max'];
$active = $_GET['active'];


//security: Cannot query db unless you are logged in (prevents direct url access)
if($admin_id != ""){
	//Handles the retrieve action
	if($action == "Retrieve"){
		$result = $mysqli->query("SELECT user_id, bio, max, active FROM Mentors WHERE user_id = '". $user_id."'");
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array);
	}

	//Handles the insert action
	else if($action == "Insert"){
		//Insert information
		$result = $mysqli->query("INSERT INTO Mentors ( user_id, bio, max, active) VALUES ('$user_id', '$bio', '$max', '$active')");

		//confirm that the information was updated and return the result
		$result = $mysqli->query("SELECT user_id, bio, max, active FROM Mentors WHERE user_id = '$user_id'");
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array);
	}
	
	//Handles the update action
	else if ($action == "Update"){
		//update the table information
		$result = $mysqli->query("UPDATE Mentors SET user_id = '$user_id', bio = '$bio', max = '$max', active='$active' WHERE user_id='$user_id'" );

		//confirm that the information was updated and return the result
		$result = $mysqli->query("SELECT user_id, bio, max, active FROM Mentors WHERE user_id = '$user_id'");
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array);
	}
	//Handles the update action
	else if ($action == "Delete"){
		//Delete the table information
		$result = $mysqli->query("DELETE FROM Mentors Where user_id = '$user_id'");

		echo 1;
	}
	
}
else{
	echo "You are not logged in";
}


?>