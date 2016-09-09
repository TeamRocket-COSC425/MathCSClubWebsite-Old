<?php
/*loadInfoCol.php
Programmer: Rob Close
Date: January 14, 2015
Description: This script loads the Information column data
*/
session_start();
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();
$user_id = $_SESSION['user_id'];

	$result = $mysqli->query("SELECT M.user_id, U.fname, U.lname, U.email FROM Mentors M, Users U WHERE U.user_id = (SELECT user_id FROM Mentors WHERE user_id = (SELECT user_id_mentor FROM User_Mentor WHERE user_id_mentee= '$user_id') ) AND M.user_id = (SELECT user_id_mentor FROM User_Mentor WHERE user_id_mentee= '$user_id')");	
	$array = mysqli_fetch_array($result);
	echo json_encode($array);
?>