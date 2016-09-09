<?php
//userMaint.php
//Programmer: Rob Clsoe
//Date: January 14, 2015
//Desc: This script is called by the controls.js to process the user maintenace screen update funtion

session_start(); 
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();
$user_id = $_SESSION['user_id'];
$action = $_GET['action'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$major = $_GET['major'];
$level = $_GET['level'];

//security: Cannot query db unless you are logged in (prevents direct url access)
if($user_id != ""){
	//Handles the retrieve action
	if($action == "retrieve"){
		$result = $mysqli->query("SELECT * FROM Users WHERE user_id = '". $user_id."'");
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array);
	}
	
	//Handles the update action
	else if ($action == "update"){
		//uopdate the table information
		$result = $mysqli->query("UPDATE Users SET fname = '".$fname."', lname = '".$lname."', email = '".$email."', major = '".$major."', level = '".$level."' WHERE user_id = '". $user_id."'");

		//confirm that the information was updated and return the result
		$result = $mysqli->query("SELECT * FROM Users WHERE user_id = '". $user_id."'");
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array);
	}
	//DO Not Allow The User To Delete their account or Insert!
}
else{
	echo "You are not logged in";
}


?>