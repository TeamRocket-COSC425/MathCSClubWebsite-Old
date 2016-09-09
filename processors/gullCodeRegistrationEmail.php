<?php
session_start();
 require_once("../includes/database.Class.php");
 $db = Database::getInstance();
 $mysqli = $db->getConnection();

 $user_id = $_SESSION['user_id'];
 $teamname = $_GET['teamname'];
 $shirtsize = $_GET['shirtsize'];
 $regdate = date("Ymd");


//Check if user is already registered
$result = $mysqli->query("SELECT * FROM GullCodeReg WHERE user_id = '$user_id'");

if($result != "" && mysqli_num_rows($result) > 0){
	echo "user_exists";
}
else{
	//insert info into the GullCode Registration Table
	$mysqli->query("INSERT INTO GullCodeReg (user_id, teamname, shirtsize, regdate) VALUES ('$user_id', '$teamname', '$shirtsize', $regdate)");

	//send email to club notifying that a user has registered
	$result = $mysqli->query("SELECT fname, lname, email, major, level FROM Users WHERE user_id = '$user_id'");
	$userArray = mysqli_fetch_array($result);
		$fname = $userArray['fname'];
		$lname = $userArray['lname'];
		$email = $userArray['email'];
		$major = $userArray['major'];
		$level = $userArray['level'];
		$to = "sumathcsclub@gmail.com";
		$subject = "New GullCode Registration";
		$email_msg = "
			<html>
			<head>
			<title>New GullCode Registration</title>
			</head>
			<body>
				This user has registered and been added to the roster
			<table>
			<tr>
			<th width=\"50px\">First Name</th>
			<th width=\"50px\">Last Name</th>
			<th width=\"50px\">Email</th>
			<th width=\"50px\">Major</th>
			<th width=\"50px\">Level</th>
			<th width=\"50px\">Team Name</th>
			<th width=\"50px\">Shirt Size</th>
			<th width=\"50px\">Date</th>
			</tr>
			<tr>
			<td align=\"center\">$fname</td>
			<td align=\"center\">$lname</td>
			<td align=\"center\">$email</td>
			<td align=\"center\">$major</td>
			<td align=\"center\">$level</td>
			<td align=\"center\">$teamname</td>
			<td align=\"center\">$shirtsize</td>
			<td align=\"center\">$date</td>
			</tr>
			</table>
			</body>
			</html>
			";

		//content-type
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		//
		$headers .= 'From: <sumathcsclub@gmail.com>' . "\r\n";
		//ESend email
		mail($to, $subject, $email_msg, $headers);


		//Send the user a thank you email
		$to = $email;
		$subject = "GullCode Registration";
		$email_msg = "
			<html>
			<head>
			<title>GullCode Registration</title>
			</head>
			<body>
				Thank you for registering for the upcoming GullCode Challenge. If you have any questions, please contact the club at sumathcsclub@gmail.com. <br/> Thank you!
			<table>
			<tr>
			<th width=\"50px\">First Name</th>
			<th width=\"50px\">Last Name</th>
			<th width=\"50px\">Email</th>
			<th width=\"50px\">Major</th>
			<th width=\"50px\">Level</th>
			<th width=\"50px\">Team Name</th>
			<th width=\"50px\">Shirt Size</th>
			<th width=\"50px\">Date</th>
			</tr>
			<tr>
			<td align=\"center\">$fname</td>
			<td align=\"center\">$lname</td>
			<td align=\"center\">$email</td>
			<td align=\"center\">$major</td>
			<td align=\"center\">$level</td>
			<td align=\"center\">$teamname</td>
			<td align=\"center\">$shirtsize</td>
			<td align=\"center\">$date</td>
			</tr>
			</table>
			</body>
			</html>
			";

		//content-type
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		//From the user who is applying
		$headers .= 'From: <sumathcsclub@gmail.com>' . "\r\n";
		//Send Email
		mail($to, $subject, $email_msg, $headers);



		echo "success";
}


?>