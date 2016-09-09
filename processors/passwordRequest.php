<!-- 
resetPassword.php
Programmer: Rob Close rob0229@gmail.com
Date: January 25th 2015
Desc: This script is called by the mentor_login.php file and sends an email to the user with a link to reset their password.

-->
<?php
require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();

$email = $_GET['email'];
$com_code = md5(uniqid(rand()));

//get entry in db matching entered email address
$result= $mysqli->query("SELECT email FROM USERS WHERE email = $email");
//a record exists with that email
if(mysqli_num_rows($result) != 0 ){
	//send email with reset link

	$to = $email;
	  	$subject = "Password reset link from SU Mentor Program";
	  	//From the user who is applying
		$headers .= 'From: <sumathcsclub@gmail.com>' . "\r\n";
		//For testing, switch to sumathcsclub@gmail.com after testing
	   	$message = "Please click the link below to reset your password. If you did not request this action, disregard this email. rn";
	   	$message .= "http://www.rkclose.com/Club_Dev_site/processors/passwordReset.php?resetkey=$com_code";

	   	$sentmail = mail($to,$subject,$message,$headers);

   if($sentmail)
            {
   echo "Your Confirmation link Has Been Sent To Your Email Address.";
   }



}



?>