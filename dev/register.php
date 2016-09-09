<!-- register.php
  Main page for the Mentor Program 
  Programmer: Rob Close
  Date: January 2nd, 2015

  Programmer: Hilary Vernon
  Updated: January 21, 2015
  Change Log: Added comments, cleaned up code, combined login and registration page

  Programmer: Rob Close
  Updated: January 29, 2015
  Change Log: Completely re-wrote to incorperate new login system
-->
<?php require('includes/config.php'); 
session_start();
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

//if form has been submitted process it
if(isset($_POST['submit'])){
  //very basic validation
  if(strlen($_POST['username']) < 3){
    $error[] = 'Username is too short.';
  } else {
    $stmt = $db->prepare('SELECT username FROM Users WHERE username = :username');
    $stmt->execute(array(':username' => $_POST['username']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!empty($row['username'])){
      $error[] = 'Username provided is already in use.';
    }
  }
  if(strlen($_POST['password']) < 3){
    $error[] = 'Password is too short.';
  }
  if(strlen($_POST['passwordConfirm']) < 3){
    $error[] = 'Confirm password is too short.';
  }
  if($_POST['password'] != $_POST['passwordConfirm']){
    $error[] = 'Passwords do not match.';
  }
  if($_POST['fname'] == "" ){
     $error[] = 'First name cannot be blank.';
  }
  if($_POST['lname'] == ""){
     $error[] = 'Last name cannot be blank.';
  }
  //email validation
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $error[] = 'Please enter a valid email address';
  } else {
    $stmt = $db->prepare('SELECT email FROM Users WHERE email = :email');
    $stmt->execute(array(':email' => $_POST['email']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!empty($row['email'])){
      $error[] = 'Email address already in use.';
    } 
  }
  //if no errors have been created carry on
  if(!isset($error)){
    //hash the password
    $hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);
    //create the activasion code
    $activasion = md5(uniqid(rand(),true));
    try {
      //insert into database with a prepared statement
      $stmt = $db->prepare('INSERT INTO Users (username,password,email,group_id,fname,lname,major,level,active) VALUES (:username, :password, :email, :group_id, :fname, :lname, :major, :level, :active)');
      $stmt->execute(array(
        ':username' => $_POST['username'],
        ':password' => $hashedpassword,
        ':email' => $_POST['email'],
        ':group_id'  => 1,
        ':fname' => $_POST['fname'],
        ':lname' => $_POST['lname'],
        ':major' => $_POST['major'],
        ':level' => $_POST['level'],
        ':active' => $activasion
      ));
      $id = $db->lastInsertId('user_id');
      //send email
      $to = $_POST['email'];
      $subject = "Registration Confirmation";
      $body = "Thank you for registering on the SU Math & Computer Science Club website.\n\n To activate your account, please click on this link:\n\n ".DIR."activate.php?x=$id&y=$activasion\n\n Regards Site Admin \n\n";
      $additionalheaders = "From: <admin@sumathcsclub.com>\r\n";
      $additionalheaders .= "Reply-To: admin@sumathcsclub.com";
      mail($to, $subject, $body, $additionalheaders);
      //redirect to index page
      header('Location: login.php?action=joined');
      exit;
    //else catch the exception and show the error.
    } catch(PDOException $e) {
        $error[] = $e->getMessage();
    }
  }
}
//define page title
$title = 'Log In';
//include header template
include("includes/header.php");   
include("includes/navbar.php");
?>

<div class="container" style="height: 100%;">
  <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form role="form" method="post" action="" autocomplete="off">
        <p style="background-color: rgba(230,229,227,0.9); font-size: 3em; text-align: center; font-weight: bold;">Account Registration</p>
        <p style="background-color: rgba(230,229,227,0.9);">Already a member? <a href='login.php'>Login</a></p>
        <hr>

        <?php
        //check for any errors
        if(isset($error)){
          foreach($error as $error){
            echo '<p class="bg-danger">'.$error.'</p>';
          }
        }
        //if action is joined show sucess
        // if(isset($_GET['action']) && $_GET['action'] == 'joined'){
        //   echo "<p class='login_message'>Registration successful, please check your email to activate your account.</p>";
        // }
        ?>

        <div class="form-group">
          <input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
        </div>
        <div class="form-group">
          <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
        </div>
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="4">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="fname" id="fname" class="form-control input-lg" placeholder="First Name" tabindex="5" value="<?php if(isset($error)){ echo $_POST['fname']; } ?>">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="lname" id="lname" class="form-control input-lg" placeholder="Last Name" tabindex="6" value="<?php if(isset($error)){ echo $_POST['lname']; } ?>">
            </div>
          </div>
            <div class="form-group">
             <select name ="major" id="major" class="form-control input-lg" tabindex="6">
                <option>Computer Science</option>
                <option>Mathematics </option>
                <option value="------" disabled>------------</option>
                <option>Other</option>
             </select> 
            </div>
            <div class="form-group">
             <select name="level" id="level" class="form-control input-lg" tabindex="7">
              <option>Freshman</option>        
              <option>Sophmore</option>
              <option>Junior</option>
              <option>Senior</option>
              <option>Graduate</option>
             </select>
            </div>
          </div>
        <div class="row">
          <div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="8"></div>
        </div>
      </form>
    </div>
  </div>

</div>

<?php 
//include header template
require('includes/footer.php'); 
?>