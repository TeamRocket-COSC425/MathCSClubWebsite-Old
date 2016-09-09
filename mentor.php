<?php
session_start();
 $title = "SUMathCS Login";
//include config
require_once('includes/config.php');

//if logged in redirect to members page
if( $user->is_logged_in() ){ 
  switch($_SESSION['group_id']){
    case 1 :
      header('Location: mentor_user.php'); 
      break;
    case 2 :
      header('Location: mentor_mentor.php'); 
      break;
    case 3 : 
      header('Location: mentor_admin.php'); 
      break;
    default :
      header('Location: login.php'); 
      break;
  }
} 
$action;
if(isset($_GET['action'])){
	$action = $_GET['action'];
}

//process login form if submitted
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($user->login($username,$password)){ 
		$message = "group_id";
		$x = $_SESSION['group_id'];
		$error[] = 'Group_id is $x';

		//returns to gullcode page after logging in 
		if($action == "gullcode"){
			header('Location: gullCode.php');
		}else{
			//redirect to members page
		  	switch($_SESSION['group_id']){
		    case 1 :
		      header('Location: mentor_user.php'); 
		      break;
		    case 2 :
		      header('Location: mentor_mentor.php'); 
		      break;
		    case 3 : 
		      header('Location: mentor_admin.php'); 
		      break;
		    default :
		      header('Location: login.php'); 
		      break;
		  }
		}
	  exit; 
	} else {
		$error[] = 'Wrong username or password or your account has not been activated.';
	}
}//end if submit
//define page title
$title = 'Login';
//include navbar & header template

require('includes/header.php'); 
require('includes/navbar.php');
?>

<div class="container" style="height: 100%;">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" style="background-color: rgba(230,229,227,0.9);">
			<form role="form" method="post" action="" autocomplete="off">
				<!-- images/mentor.png 
				<img src="" align="center" width="100%">
				-->
				<h3>The mentor program is a great way to learn about the department and get involved, sign up below! </h3>
				<hr>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}
				if(isset($_GET['action'])){
					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='login_message'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2 class='login_message'>Please check your inbox for a reset link.</h2>";
							break;
						case 'resetAccount':
							echo "<h2 class='login_message'>Password changed, you may now login.</h2>";
							break;
						case 'joined':
							echo "<h2 class='login_message'>Registration successful, please check your email to activate your account.</h2>";
							break;

					}
				}
				?>

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
				</div>

				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>
				
				<div class="row">
					<div class="col-xs-9 col-sm-9 col-md-9">
						 <a href='reset.php'>Forgot your Password?</a>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-9 col-sm-9 col-md-9">
						 <a href='register.php'>Register</a>
					</div>
				</div>
				
				<hr>

				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>			</br>
		</br>
	</br>
		</div>
	</div>

</div>

<?php 

//include header template
require('includes/footer.php'); 
?>