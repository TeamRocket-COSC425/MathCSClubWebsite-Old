<?php
session_start();
require_once("includes/database.Class.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();
$action=$_POST['action'];
$user_id = $_SESSION['user_id'];
$result = $mysqli->query("SELECT fname, lname, email, major, level FROM Users WHERE user_id = $user_id");
$array = mysqli_fetch_array($result);
$registered_result = $mysqli->query("SELECT * FROM GullCodeReg WHERE user_id = $user_id");
$reg_array = mysqli_fetch_array($registered_result);

$fname = $array['fname'];
$lname = $array['lname'];
$email = $array['email'];
$major = $array['major'];
$level = $array['level'];

 $title = "SUMathCS GullCode";
require("includes/header.php"); 
require("includes/navbar.php");
?>
    <!-- end php include -->

    <!-- Begin page content -->
    <div class="container" align="center"style="background-color: rgba(230,229,227,0.9);";>
    <h1><code>Math Challenge</code>: Salisbury University Mathematics Competition</h1></br>
    Under construction, coming soon in Spring 2017!
    
    <script>var controls = new controls();</script>
    <?php 
     require("includes/footer.php");
    ?>