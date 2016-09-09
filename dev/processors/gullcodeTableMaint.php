<?php
//gullcodeTableMaint.php
//Programmer: Rob Clsoe
//Date: February 4th, 2015
//Desc: This script is called by the controls.js to process the gullcode table maintenace screen in the admin function
session_start(); 
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();
$user_id = $_GET['user_id'];
$teamname = $_GET['teamname'];
$shirtsize = $_GET['shirtsize'];
$regdate = $_GET['regdate'];
$action = $_GET['action'];

$retrieveQuery = "SELECT * FROM GullCodeReg WHERE user_id = '$user_id'";

//security: Cannot query db unless you are logged in (prevents direct url access)
if(isset($user_id)){
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
		$result = $mysqli->query("INSERT INTO GullCodeReg (user_id, teamname, shirtsize, regdate) VALUES ('$user_id', '$teamname', '$shirtsize', '$regdate')");

		//confirm that the information was updated and return the result
		$result = $mysqli->query($retrieveQuery);
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array);
	}
	
	//Handles the update action
	else if ($action == "Update"){
		//update the table information
		$result = $mysqli->query("UPDATE GullCodeReg SET teamname = '$teamname', shirtsize = '$shirtsize', regdate='$regdate' WHERE user_id='$user_id'" );

		//confirm that the information was updated and return the result
		$result = $mysqli->query($retrieveQuery);
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array);
	}
	//Handles the update action
	else if ($action == "Delete"){
		//Delete the table information
		$result = $mysqli->query("DELETE FROM GullCodeReg Where user_id = '$user_id'");
		echo 1;
	}
}
else{
	echo "You are not logged in";
}


?>