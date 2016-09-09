<?php
$username = "sumathcs_mentor";
$password = "SUMathCSClubIsGreat!!";
$db = "sumathcs_Club";
$id = $_GET['id'];
  // do some validation here to ensure id is safe
  $link = mysql_connect("localhost", $username, $password);
  mysql_select_db($db);
  $sql = "SELECT image FROM Mentors WHERE user_id=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
  mysql_close($link);
  header("Content-type: image/jpeg");
  echo $row['image'];
?>