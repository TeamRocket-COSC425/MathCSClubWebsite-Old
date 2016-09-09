<!-- 
adminUserMentorTableDump.php
Programer: Rob Close rob0229@gmail.com
Date: January 27th, 2015
Desc: This script is called by the controls.js in the frameAdmin function on a #mentorTableButton Click event to load the contents of the Mentor table to the html.
-->

<?php 
require_once('../includes/database.Class.php');
?>
 <table align="center">
	<tr><th>User_Id_mentee</th><th>User_ID_Mentor</th></tr> 
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