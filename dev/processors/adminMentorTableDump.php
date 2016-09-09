<!-- 
adminMentorTableDump.php
Programer: Rob Close rob0229@gmail.com
Date: January 27th, 2015
Desc: This script is called by the controls.js in the frameAdmin function on a #mentorTableButton Click event to load the contents of the Mentor table to the html.
-->

<?php 
require_once('../includes/database.Class.php');
?>
 <table align="center">
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