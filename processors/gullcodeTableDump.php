<!-- 
ullcodeTableDump.php
Programer: Rob Close rob0229@gmail.com
Date: February 4,, 2015
Desc: This script is called by the controls.js in the frameAdmin function on a #gullcodeableButton Click event to load the contents of the GullCodeReg table to the html.
-->

<?php 
require_once('../includes/database.Class.php');
?>
 <table align="center">
	<tr><th>User_Id</th><th>Team Name</th><th>Shirt Size</th><th>Date</th></tr> 
		<?php
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$result = $mysqli->query("SELECT * FROM GullCodeReg");
				while($array= mysqli_fetch_array($result)){
				 	echo "<tr>";
						echo "<td align=\"center\">".$array['user_id']."</td><td align=\"center\">".$array['teamname']."</td><td align=\"center\">".$array['shirtsize']."</td><td align=\"center\">".$array['regdate']."</td>";
				 	echo "</tr>";
				 }
		?>
</table>