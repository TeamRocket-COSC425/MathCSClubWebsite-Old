<?php
session_start();
if(!isset($_SESSION['user_id'])){
  header("location: ../mentor_login.php");
}

require_once("../includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();
$mentor_id=$_SESSION['user_id'];

if($_GET['mentor_id']){
	$mentor_id=$_GET['mentor_id'];
}

$image;
$file;

if(isset($_POST['submit'])){
	$file = $_FILES['newImage']['tmp_name'];
	if(!isset($file))
	{
	    echo "Please select an Image";
	}
	else{
		$image = addslashes(file_get_contents($_FILES['newImage']['tmp_name']));
		$imagesize = getimagesize($_FILES['newImage']['tmp_name']);
		if ($imagesize == FALSE){
			echo "This is not a file";
		}
		else{
			$result = $mysqli->query("UPDATE Mentors SET image = '" .$image. "' WHERE user_id = ".$mentor_id);
		}
	}

}



?>
<html>
	<head>
		<title>Upload Image</title>
		<link rel="stylesheet" type="text/css" href="../css/mentor.css">
  	</head>
  <body>
      <div class="imageUpload">
       <div id="messageBox">Mentor Image Maintenance<br/>Choose a file and click submit</div>
       <form method="post" enctype="multipart/form-data" action="<?php echo $PHP_SELF ?>">
       	<table align="center"> 
       		<tr><th>Current Photo</th><td><img src="getImage.php?id=<?php echo $mentor_id ?>" height="150" width="200" ></td></tr>
       		<tr><td></td><td><input type="file" name="newImage"/></td></tr>
       		<tr><td colspan="2" align="center"><input type="submit" name="submit" align="center"></td></tr>
       	</table>
       </form>
      </div>
  </body>
</html>
