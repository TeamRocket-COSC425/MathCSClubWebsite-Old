<!-- 
frames.Class.php
Programer: Rob Close rob0229@gmail.com
Date: January 2nd, 2015
Desc: This file is loaded by the landing pages (mentor_user.php, mentor_mentor.php, and mentor_admin.php) to display the various content frames that are displayed to the user by the javascript controller.
-->

<?php
session_start();

require_once('database.Class.php');
// include "processors/displayMentors.php";

class frames {

	//Information Display in right frame
	public function frameInfoCol() { ?>
		<div id="frameInfoCol" style="text-align: center; font-size:2em">
        	<div class="list">Your Mentor</div>
       		<?php	
      		echo "<div id=\"infoCol_name\"></div>";
      		echo "<div id=\"infoCol_email\"></div>";
      		echo "<div id=\"infoCol_image\"></div>";
			?>			
		</div>
	<?php }

	public function frameHome() { ?>
		<div id="frameHome" style="text-align: center; font-size:2em">
			<div style="font-weight: bold; font-size: 1.5em"> Math & Computer Science Club Calendar </div>
			  <div class="calendar">
			  	<!-- Embeds Salisbury Universities Math and CS Calendar--> 
			  	<iframe src="https://www.google.com/calendar/embed?src=sumathcsclub%40gmail.com&ctz=America/New_York" style="border: 0" width="600" height="400" frameborder="0" scrolling="no"></iframe>   
			  </div>  	
			
		</div>
	<?php }

	// Edit data input
	public function edit($connection, $data){
		$data = trim($data);
		$data = mysqli_real_escape_string($connection, $data);
		return $data;
	}

	public function frameUserMaint() { ?>
		<div id="frameUserMaint" style="text-align: center; font-size:2em">
			  <h1> User Account Maintenance Here </h1> 
   			<table align="center">
   				<tr><td>Username</td><td><?php echo $_SESSION['username'];?></td></tr>
   				<tr><td>First Name</td><td><input type="text" id="userMaint_fname" style="min-width: 325px"></td></tr>
   				<tr><td>Last Name</td><td><input type="text" id="userMaint_lname" style="min-width: 325px"></td></tr>
   				<tr><td>Email</td><td><input type="text" id="userMaint_email" style="min-width: 325px"></td></tr>
   				<tr><td>Major</td><td>
					<select id="userMaint_major" style="min-width: 325px" value="">   
						<option>Computer Science Major</option>
						<option>Computer Science Major, Math Minor</option>
						<option>Mathematics Major, Applied</option>
						<option>Mathematics Major, COSC Concentration</option>
						<option>Mathematics Major, Traditional</option>
						<option>Mathematics Major, Secondary Education</option>
						<option>Mathematics Major, Stats Concentration</option>
						<option value="------" disabled>------------</option>
						<option>Actuarial Science Major</option>        
						<option>Computer Science Minor</option>
						<option>Mathematics Minor</option>
						<option>Statistics Minor</option>
						<option value="------" disabled>------------</option>
						<option>Other</option>
					</select></td></tr>
		   		<tr><td>Class Level</td><td>
				<select id="userMaint_level" style="min-width: 325px" value="">
					<option>Freshman</option>        
					<option>Sophmore</option>
					<option>Junior</option>
					<option>Senior</option>
					<option>Graduate</option>
					<option value="------" disabled>------------</option>
					<option>Transfer, Freshman Equivalent</option> 
					<option>Transfer, Sophmore Equivalent</option> 
					<option>Transfer, Junior Equivalent</option> 
					<option>Transfer, Senior Equivalent</option> 
				</select></td></tr>
		   		<tr><td colspan="2" align="center"><input type="submit" id="userMaintUpdate" value="Update"></td></tr>
   				</table>	
		</div>
	<?php }

	// Displays the mentor information
	public function frameMentors() { ?>
		<div id="frameMentors">
		
			<!-- Table with Available Mentors -->
			<table class = "table">
				<caption> Available Mentors </caption>
				<thead>
					<tr>
						<th>Photo</th>
						<th>Name</th>
						<th>Major</th>
						<th>More Info</th>
					</tr>
				</thead>

				<?php
	   			$db = Database::getInstance();
				$mysqli = $db->getConnection();
				$result = $mysqli->query("SELECT M.user_id, M.bio, M.image, U.fname, U.lname, U.major, U.email FROM Users U, Mentors M WHERE U.user_id = M.user_id AND M.active = 1 AND M.max > (SELECT COUNT(*) FROM User_Mentor UM WHERE UM.user_id_mentor = M.user_id)");

					while($array= mysqli_fetch_array($result)){
						echo "<tr>";
							echo "<td><img src=processors/getImage.php?id=".$array['user_id']." width=125, height=100></td><td>".$array['fname']." ".$array['lname']."</td><td>".$array['major']."</td><td><button class =\"mentorItem btn btn-default\" value=\"".$array['user_id']."\" >More Info</button></td>";
						echo "</tr>";
					}
			?>
   			</table>

   			<!-- Apply as a mentor -->
			<div class="btn btn-default" id="apply2BMentorBtn" style="font-weight: bold">Apply to be a mentor!</div> 
			
		</div>
		
	<?php }

	//Select A Mentor Modal
	public function modal() { ?>
		<div id="modal">
			<div id="mentorInfo"></div>	
		</div>
	<?php }

	// Register as a mentor
	public function frameMentorsMaint() { ?>
		<div id="frameMentorsMaint" style="text-align: center; font-size:2em">
   			<h1>Mentors Info Maintenance</h1>
	   			<table align="center">
	   				<tr><th>Username</th><th><?php echo $_SESSION['username'];?></th></tr>
	   				<tr><th>Bio</th><td style="height: 250px; width: 400px"><textarea id="mentorMaint_bio" value="<?php echo $mentorMaint_bio; ?>" ></textarea></td></tr>
	   				<tr><th>Maximum Number of Mentees</th><td><select id="mentorMaint_max" value="" style="min-width: 400px"><option>1</option><option>2</option><option>3</option><option>4</option></select></td></tr>
   					<tr><td align="center" colspan="2"><img id="mentor_preview" src="processors/getImage.php?id=<?php echo $_SESSION['user_id']; ?>" alt="your image" width="200" height="150" /></td></tr>
					<tr><td align="center" colspan="2"><input type="file" id="mentor_img_file" accept="image/*"/></td></tr>
   					<tr style="height: 3em"><td colspan="2" align="center" ><input type="submit" id="mentorMaintUpdate" value="Update"></td></tr>
   					</table>  	
		</div>
	<?php }
	
	// About the Mentor Program
	public function frameAbout() { ?>
		<div id="frameAbout">
   			<p style="font-size:2em">The Salisbury University Math & Computer Science Club Mentor Program is your key to success. </p>
   				<p style="font-size:16px; text-align:left; margin: 2% 10%">You are not alone. Many students have worked through similar, if not the exact same problems that you are right now. This Mentor program is designed give you the advantage of learning from their success and mistakes. 
   				</p>
   				<p style="font-size:16px; text-align:left; margin: 2% 10%">To enroll, choose a mentor from the list in the mentor link to the left and you will be contacted by your selected mentor using your prefered contact method. Your mentor will be as involved in your experience here at SU as you would like. Feel free to change mentors at any time, no questions asked. This program is most effective when you find a good mentor/mentee relationship.
   				</p>
   				<p style="font-size:16px; text-align:left; margin: 2% 10%">Our mentor program is hosted by the Math & Computer Science Club and administered by the Club officers. You can find more information about the officers <a href="about.php" >here</a>. 
   				</p>
   				<p style="font-size:16px; text-align:left; margin: 2% 10%">Mentors are selected based on their involvement in the department and their desire to pass along some of the lessons they have learned. As with any social program, you should notify the administrators of any concerns you have about any of the suggestions your mentor may share. Remember, they are just students like you!
   				</p>
		</div>
	<?php }

	// Admin tab
	public function frameAdmin() { ?>
	<div id="frameAdmin" style=" font-size:2em">
		<div class="tabs">
	    <ul class="tab-links">
	        <li class="active"><a href="#tab1">User_Mentor Table </a></li>
	        <li><a href="#tab2">Users Table</a></li>
	        <li><a href="#tab3">Mentors Table</a></li>
			<li><a href="#tab4">GullCode Registration Table</a></li>
	    </ul>
		    <div class="tab-content">
		        <div id="tab1" class="tab active">
		            <div id="userMentorTableMaintenance">User_Mentor Table Maintenance
			   			<table border="1px" >
			   				<tr><td>Mentee User ID</td><td><input type="text" id="umTable_User_id"></td></tr>
			   				<tr><td>Mentor User ID</td><td><input type="text" id="umTable_Mentor_id"></td></tr>
			   				<tr><td colspan="2" align="center"><input type="submit" class="umTableButton" value="Retrieve"><input type="submit" class="umTableButton" value="Insert"><input type="submit" class="umTableButton" value="Update"><input type="submit" class="umTableButton" value="Delete"></td></tr>
			   			</table>
			   			<div style="margin: auto; text-align: center;">Table Contents</div>
			   			<div style="margin: auto; text-align: center;" id="umTableDump">
			   			<table align="center"  border="1px">
			   				<tr><th>Mentee User Id</th><th>Mentor User Id</th></tr>
			   			<?php
			   				$db = Database::getInstance();
							$mysqli = $db->getConnection();
							$result = $mysqli->query("SELECT * FROM User_Mentor");
								while($array= mysqli_fetch_array($result)){
									echo "<tr>";
									echo "<td align=\"center\">".$array['user_id_mentee']."</td><td align=\"center\">".$array['user_id_mentor']."</td>";
									echo "</tr>";
								}
						?>
						</table>
					</div>
		   			</div>
		        </div>
		        <div id="tab2" class="tab">
		            <div id="userTableMaintenance">User Table Maintenance
		   			<table  border="1px">
		   				<tr><td>User ID</td><td><input type="text" id="userTable_user_id"></td></tr>
		   				<tr><td>Username</td><td><input type="text" id="userTable_username"></td></tr>
		   				<tr><td>Group ID</td><td><select id = "userTable_group" value="1"><option>1</option><option>2</option><option>3</option></select></tr>
		   				<tr><td>First Name</td><td><input type="text" id="userTable_fname"></td></tr>
		   				<tr><td>Last Name</td><td><input type="text" id="userTable_lname"></td></tr>
		   				<tr><td>Email</td><td><input type="text" id="userTable_email"></td></tr>
		   				<tr><td>Major</td><td>
		   					<select id="userTable_major" >
			   					<option>Computer Science Major</option>
								<option>Computer Science Major, Math Minor</option>
								<option>Mathematics Major, Applied</option>
								<option>Mathematics Major, COSC Concentration</option>
								<option>Mathematics Major, Traditional</option>
								<option>Mathematics Major, Secondary Education</option>
								<option>Mathematics Major, Stats Concentration</option>
								<option value="------" disabled>------------</option>
								<option>Actuarial Science Major</option>        
								<option>Computer Science Minor</option>
								<option>Mathematics Minor</option>
								<option>Statistics Minor</option>
								<option value="------" disabled>------------</option>
								<option>Other</option>
		   					</select></td></tr>
				   		<tr><td>Class Level</td><td>
				   			<select id="userTable_level">
								<option>Freshman</option>        
								<option>Sophmore</option>
								<option>Junior</option>
								<option>Senior</option>
								<option>Graduate</option>
								<option value="------" disabled>------------</option>
								<option>Transfer, Freshman Equivalent</option> 
								<option>Transfer, Sophmore Equivalent</option> 
								<option>Transfer, Junior Equivalent</option> 
								<option>Transfer, Senior Equivalent</option> 
							</select></td></tr>
				   			<tr><td>Active (Should be "Yes" if email account verified)</td><td><input type="text" id="userTable_active"></td></tr>
							<tr><td>resetToken (For password recovery)</td><td><input type="text" id="userTable_resetToken"></td></tr>
							<tr><td>resetComplete (For password recovery)</td><td><input type="text" id="userTable_resetComplete"></td></tr>
		   					<tr><td colspan="2" align="center"> <input type="submit" class="userTableButton" value="Retrieve"><input type="submit" class="userTableButton" value="Insert"><input type="submit" class="userTableButton" value="Update"><input type="submit" class="userTableButton" value="Delete"></td></tr>
		   			</table>

		   			<div style="margin: auto; text-align: center;">Table Contents</div>
		   			<div style="margin: auto; text-align: center; font-size: .5em" id="adminUserTableDump">
			   			<table align="center"  border="1px">
			   				<tr><th>User_id</th><th>Username</th><th>group_id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Major</th><th>Class Level</th><th>Active</th></tr>
			   			<?php
			   				$db = Database::getInstance();
							$mysqli = $db->getConnection();
							$result = $mysqli->query("SELECT * FROM Users");
								while($array= mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td align=\"center\">".$array['user_id']."</td><td align=\"center\">".$array['username']."</td><td align=\"center\">".$array['group_id']."</td><td align=\"center\">".$array['fname']."</td><td align=\"center\">".$array['lname']."</td><td align=\"center\">".$array['email']."</td><td align=\"center\">".$array['major']."</td><td align=\"center\">".$array['level']."</td><td align=\"center\">".$array['active']."</td>";
									echo "</tr>";
								}
						?>
						</table>
					</div>
		   			</div>
		        </div>
		 
		        <div id="tab3" class="tab">
		            <div id="mentorTableMaintenance">Mentor Table Maintenance</div>
		   			<table align="center"  border="1px">
		   				<tr><th>User ID</th><td><input type="text" id="mentorTable_user_id" style="width: 400px"></td></tr>
		   				<tr><th>Bio</th><td style="height: 250px; width: 400px"><textarea id="mentorTable_bio"></textarea></td></tr>
		   				<tr><th>Max Number Of Mentees</th><td><select id="mentorTable_max" value="4" style="min-width: 200px"><option>1</option><option>2</option><option>3</option><option>4</option></select></td></tr>
		   				<tr><th>Active (Must be 1 to be displayed in the Mentor listing)</th><td><select id="mentorTable_active"><option>0</option><option>1</option></select></td></tr>
		   				<tr><th>Photo</th><td><a id="adminPhoto"></a></td></tr>
						<tr><td colspan="2" align="center"><input type="submit" class="mentorTableButton" value="Retrieve"><input type="submit" class="mentorTableButton" value="Insert"><input type="submit" class="mentorTableButton" value="Update"><input type="submit" class="mentorTableButton" value="Delete"></td></tr>
		   			</table>
					<div style="margin: auto; text-align: center;">Table Contents</div>
					<div style="margin: auto; text-align: center; font-size: .5em" id="mentorTableDump">
			   			<table align="center"  border="1px">
			   				<tr><th>User_Id</th><th>Bio</th><th>Max</th><th>Active</th><th>Photo</th></tr>
			   			<?php
			   				$db = Database::getInstance();
							$mysqli = $db->getConnection();
							$result = $mysqli->query("SELECT * FROM Mentors");
								while($array= mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td align=\"center\">".$array['user_id']."</td><td align=\"center\">".$array['bio']."</td><td align=\"center\">".$array['max']."</td><td align=\"center\">".$array['active']."</td><td align=\"center\"><img src=processors/getImage.php?id=". $array['user_id']." height=\"150\" width=\"200\"></td>";
									echo "</tr>";
								}
						?>
						</table>
					</div>		
		        </div>
				
				<div id="tab4" class="tab">
		            <div id="gullCodeTableMaintenance">GullCode Table Maintenance</div>
		   			<table align="center"  border="1px">
		   				<tr><th>User ID:</th><td><input type="text" id="gullcodeTable_user_id" style="width: 400px"></th></tr>
		   				<tr><th> Team Name:</th><td><input type="text" id="teamname"/></td></tr>
						<tr><th> T-Shirt Size:</th><td><select id="shirtsize"><option>Small</option><option>Medium</option><option>Large</option><option>X Large</option><option>XX Large</option><option>XXX Large</option></select></td></tr>
						<tr><th> Registration Date:</th><td><input type="date" id="regdate"/></td></tr>
						<tr><td colspan="2" align="center"><input type="submit" class="gullcodeTableButton" value="Retrieve"><input type="submit" class="gullcodeTableButton" value="Insert"><input type="submit" class="gullcodeTableButton" value="Update"><input type="submit" class="gullcodeTableButton" value="Delete"></td></tr>
		   			</table>
					<div style="margin: auto; text-align: center;">Table Contents</div>
					<div style="margin: auto; text-align: center; font-size: .5em" id="gullcodeTableDump">
			   			<table align="center"  border="1px">
			   				<tr><th>User_Id</th><th>Team Name</th><th>T-Shirt Size</th></tr>
			   			<?php
			   				$db = Database::getInstance();
							$mysqli = $db->getConnection();
							$result = $mysqli->query("SELECT * FROM GullCodeReg");
								while($array= mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td align=\"center\">".$array['user_id']."</td><td align=\"center\">".$array['teamname']."</td><td align=\"center\">".$array['shirtsize']."</td>";
									echo "</tr>";
								}
						?>
						</table>
					</div>		
		        </div>
		    </div>
		</div>
	</div>
	<?php }
}
?>