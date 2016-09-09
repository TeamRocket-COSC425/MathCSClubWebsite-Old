<?php
session_start();

require_once('database.Class.php');


class frames_login {

	//All the center frame displays
	public function frameLogin() { 
			
		?>
		<div id="frameLogin" style="font-size:2em">
   			<div class="login">
	          <div>Username<input type="text" id="username" required></div>
	          <div>Password <input type="password" id="password" required></div>
	          <div><input type="submit" name="login" value="Login" id="login"></div>
        	  <a id="register" type="text">Create Account</a>
        	</div>
  		</div>
	<?php }

	public function frameRegister() { 

		?>
		<div class="login" id="frameRegister" style="text-align: center; font-size:2em">
   			<h1>Register</h1>
   			 	<table>
   			 		<tr><td class="regFormLeftCol">Username</td><td class="regFormRightCol"><input type="text" id="user" required></td></tr>
		   			<tr><td class="regFormLeftCol">Password</td><td class="regFormRightCol"><input type="password" id="pass"  required></td></tr>
		   			<tr><td class="regFormLeftCol">Re-Type Password</td><td class="regFormRightCol"> <input type="password" id="rePass" onChange="checkPasswordMatch();" required></td></tr>
		   			<tr><td class="regAlert" colspan ="2"><div id="divCheckPasswordMatch"> </div></td></tr>
		   			<tr><td class="regFormLeftCol">First Name</td><td class="regFormRightCol"><input type="text" id="fname" required></td></tr>
		   			<tr><td class="regFormLeftCol">Last Name</td><td class="regFormRightCol"><input type="text" id="lname" name="lname" required></td></tr>
		   			<tr><td class="regFormLeftCol">Email</td><td class="regFormRightCol"><input type="text" id="email" name="email" required></td></tr>
		   			<tr><td class="regFormLeftCol">Major</td><td class="regFormRightCol"><select id="major" ><option value="Computer Science">Computer Science</option><option>Math</option><option>Other</option></select></td></tr>
		   			<tr><td class="regFormLeftCol">Class Level</td><td class="regFormRightCol"><select id="level"><option value="Freshman">Freshman</option><option>Sophomore</option><option>Junior</option><option>Senior</option></select></td></tr>
		   			<tr><td colspan="2" align="center"><input type="submit" name="submitNewUser" id="submitNewUser" value="Submit"></td></tr>	
		   			<tr><td colspan="2" align="center"><input type="submit" id="regBackBtn" value="Cancel"></td></tr>
			    </table>
   		</div>
	<?php }
}

?>