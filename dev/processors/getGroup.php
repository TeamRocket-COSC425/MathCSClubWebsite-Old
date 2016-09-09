<?php 
/*getGroup.php
Programmer: Rob Close
Date: January 14, 2015
Description: This function returns the group id of the current user for the controls.js
*/
session_start();
if($_SESSION['username'] == "" ){
  header("location: mentor_login.php");
}

echo $_SESSION['group'];

?>