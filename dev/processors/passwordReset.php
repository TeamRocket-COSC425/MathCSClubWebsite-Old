<!-- 
resetPassword.php
Programmer: Rob Close rob0229@gmail.com
Date: January 25th 2015
Desc: This script is accessed as a link from a password reset request email.
-->
<?php

/*if(!(isset($_GET['reset_code'])){
	header("../mentor_login.php");
}*/
/*
$reset_code = $_GET['reset_code']
if(isset("submit")){
	if ($_POST['newPass'] != $_POST['confirmNewPass']){
	
	}

}*/
?>

<div class="passwordResetScreen">
	<form method="POST" action="<?php echo $SELF_PHP ?>">
		<div> Enter a new Password<input type="password" name="newPass" required></div>
		<div> Confirm new Password<input type="password" name="confirmNewPass" required></div>
		<input name="submit" value="Submit" type="submit">
	</form>
</div>