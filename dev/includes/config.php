<?php
ob_start();
session_start();
//set timezone
date_default_timezone_set('America/New_York');
//database credentials
define('DBHOST','localhost');
define('DBUSER','sumathcs_mentor');
define('DBPASS','SUMathCSClubIsGreat!!');
define('DBNAME','sumathcs_Club');
//application address
define('DIR','http://sumathcsclub.com/');
define('SITEEMAIL','admin@sumathcsclub.com');
try {
	//create PDO connection 
	$db = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}
//include the user class, pass in the database connection
include('user.php');
$user = new User($db); 
?>