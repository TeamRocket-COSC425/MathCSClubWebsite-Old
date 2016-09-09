<!-- 
adminUserTableDump.php
Programer: Rob Close rob0229@gmail.com
Date: February 5th, 2015
Desc: This script is called by the controls.js in the frameAdmin function on a #mentorTableButton Click event to load the contents of the Mentor table to the html.
-->

<?php 
require_once('../includes/database.Class.php');
?>
 <table align="center">
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