<?php
//userMaint.php
//Programmer: Rob Clsoe
//Date: January 15, 2015
//Desc: This script is called by the controls.js to process the user maintenace screen update funtion

session_start(); 
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();
$user_id = $_SESSION['user_id'];
$action = $_POST['action'];
$bio = $_POST['bio'];
$max = $_POST['max'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

//security: Cannot query db unless you are logged in (prevents direct url access)
if(isset($_SESSION['user_id'])){

	//Handles the retrieve action
	if($action == "retrieve"){

		$result = $mysqli->query("SELECT * FROM Mentors WHERE user_id = '$user_id'");
		$array = mysqli_fetch_array($result);
		//returns a json object of the array
		echo json_encode($array);
	}
	
	//Handles the update action
	else if ($action == "update"){
		//update the table information; Do not update image if none is chosen!
		if($image != ""){
			$result = $mysqli->query("UPDATE Mentors SET bio = '$bio', max = '$max', image= '$image' WHERE user_id = '$user_id'");
		}else{
			$result = $mysqli->query("UPDATE Mentors SET bio = '$bio', max = '$max' WHERE user_id = '$user_id'");
		}
	}
	//DO Not Allow The User To Delete their account or Insert!
}
else{
	echo "You are not logged in";
}


?>