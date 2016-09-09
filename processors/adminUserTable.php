<?php
//adminUserTable.php
//Programmer: Rob Close
//Date: January 16, 2015
//Desc: This script is called by the controls.js to process the adminUserTable functions on the admin page

session_start(); 
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();
$admin_id = $_SESSION['user_id'];

$action = $_GET['action'];
$user_id = $_GET['user_id'];
$username = $_GET['username'];
$group_id = $_GET['group_id'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$major = $_GET['major'];
$level = $_GET['level'];
$active = $_GET['active'];
$resetToken = $_GET['resetToken'];
$resetComplete = $_GET['resetComplete'];
$retrieveQuery = "SELECT user_id, username, group_id, fname, lname, email, major, level, active, resetToken, resetComplete FROM Users WHERE user_id = '$user_id'";

//security: Cannot query db unless you are logged in (prevents direct url access)
if(isset($_SESSION['user_id'])){
	//Handles the retrieve action
	if($action == "Retrieve"){
		$result = $mysqli->query($retrieveQuery);
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array); 
	}

	//Handles the insert action
	else if($action == "Insert"){
		//Insert information
		$result = $mysqli->query("INSERT INTO Users (user_id, username, group_id, fname, lname, email, major, level, active, resetToken, resetComplete) VALUES ('$user_id', '$username', '$group_id', '$fname', '$lname', '$email', '$major', '$level', '$active', '$resetToken', '$resetComplete')");

		//confirm that the information was updated and return the result
		$result = $mysqli->query($retrieveQuery);
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array);
	}
	
	//Handles the update action
	else if ($action == "Update"){
		//update the table information
		$result = $mysqli->query("UPDATE Users SET username = '$username', group_id = '$group_id', fname = '$fname', lname = '$lname', email = '$email' , major = '$major', level = '$level', active='$active', resetToken = '$resetToken', resetComplete='$resetComplete' WHERE user_id = '$user_id'");

		//confirm that the information was updated and return the result
		$result = $mysqli->query($retrieveQuery);
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array);
	}
	//Handles the update action
	else if ($action == "Delete"){
		//Delete the table information
		$result = $mysqli->query("DELETE FROM Users WHERE user_id = '$user_id'");
		echo 1;
	}
	
}
else{
	echo "You are not logged in";
}


?>