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
    <h1><code>Gull Code</code>: Salisbury University Programming Competition</h1></br>
    <div>
      <img src="images/gullcode.JPG" alt ="400"  width="1000"/>
    </div>
    <p align="center" class="credit">  Gull Code - Spring 2015  </p>
	
    <p><b>Date:</b> TBD</p>
	<p><b>Registration deadline:</b>TBD</p>
    <p><b>Time:</b> TBD</p>
    <p><b>Location:</b> Salisbury University, TETC room 152</p>

    <p>Teams will be given a set of problems to be solved using either JAVA, C++, or Python which will require a logical or mathematical algorithm to solve.<br><br>

     Each team can have up to 3 members to code their solutions. Teams are allowed to use their own laptop computers or the school desktops where available.<br><br>

     The team that completes the most problems correctly within the 4 hour time window will be declared the winner. In the event of a tie, a judge will determine the winner based on efficiency of the algorithm and code design. All judgments are final.<br><br>

     It is recommended that teams practice solving sample problems to determine the most efficient methods of solving multiple problems at the same time. Every team member has strengths and weaknesses. It is better to identify these attributes before the challenge. Sample problems can be found at the bottom of this page (follow the links).<br><br>

    </p>
	

    
    <p><b>Prizes:<br> </b>
<!--     1st place   = $100 per team member<br>
    2nd place  = $50 per team member<br>
    3rd place   = Movie Passes for each team member</b></p> -->
    TBD !!
    
    <p><b>All team members will be given a T-shirt for participating and we will have multiple door prizes and food!</b></p>
      </br></br></br>
       <b><h4><font color="red">Example Questions and answers for gullcode:</b></h4></font>
   </br>
       <b>Question:</b> Reverse String
        </br><b>Input:</b> yrubsilas
        </br><b>Output:</b> salisbury
    </br></br>

    <b>Question:</b> Spell Check
   </br><b>Input:</b> ababababab
    </br><b>Output:</b> Valid
</br></br>

 <b>Question:</b> Palindrome
   </br><b>Input:</b> releveler
    </br><b>Output:</b> Valid
</br></br>


   <b>Question:</b>  Frequent Integer
   </br><b>Input:</b> array size = 6, array {1, 2, 2, 2, 4, 2}
    </br><b>Output:</b> 2
    </br></br>

        <div align="center" class="register" style="background-color: rgba(230,229,227,0.9);">
          <strong>Here’s an example on how to Register: <br/>
            <!-- display login link if not logged in! -->

          <table>
                
                <?php 
                if(!isset($_SESSION['loggedin'])) { ?>
                    <tr><td colspan="2" align="center" style="padding: 5%"><input type="button" class="btn-lg btn-primary" value="Login" id="gullCodeLogin"/></td></tr> 
                <?php 
                }else{ ?>
                    <tr><td colspan="2" align="center">Each team member must register seperately:</td></tr>
                    <tr><th>Name</th><td><?php echo $fname . " " . $lname?></td></tr>
                    <tr><th>Email</th><td><?php echo $email?></td></tr>
                    <tr><th>Major</th><td><?php echo $major?></td></tr>
                    <tr><th>Level</th><td><?php echo $level?></td></tr>
                    <?php 
                    if(mysqli_num_rows($registered_result) == 0){
                       
                        echo "<tr><td> Team Name:</td><td><input type=\"text\" id=\"teamname\"/></td></tr>";
                        echo "<tr><td> T-Shirt Size:</td><td><select id=\"shirtsize\"><option>Small</option><option>Medium</option><option>Large</option><option>X Large</option><option>XX Large</option><option>XXX Large</option></select></td></tr>";
                        echo "<tr><td colspan=\"2\" align=\"center\"><input type=\"submit\" value=\"Submit\" id=\"gullCodeRegBtn\"/></td></tr>";
                        echo "<tr><td colspan=\"2\" align=\"center\"><div id=\"gullRegMessage\" style=\"color: red; font-weight:bold;\"></div></td></tr>";
                    }else{
                        echo "<tr><td> Team Name:</td><td>". $reg_array['teamname'] ."</td></tr>";
                        echo " <tr><td> T-Shirt Size:</td><td>". $reg_array['shirtsize']."</td></tr>";
                        if($action = "registered"){
                        echo "<tr><td colspan=\"2\" align=\"center\"><div id=\"gullRegMessage\" style=\"color: red; font-weight:bold;\">Thank you for registering!</div></td></tr>";
                        }
                    }
               }
                ?>
          </table>
        </div> 
        <p style="font-weight:bold text-align:center;" align="center"> Please email any questions to: sumathcsclub@gmail.com</p>       

  </br></br></br></br>
    
        <p class="sponsor" style="font-size: 2em;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Thank you to all of our Sponsors!</p>
        <img src="images/sponsers.png" /> </br>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="images/henson.jpg" /> </br></br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Thank you Henson School of Salisbury University for making this happen. 
<!--       <p>
        <p class="sponsor" style="text-align: center;">
            <a href="http://www.omnitechpro.com/"><img alt="" src="images/omni-large.png" height="240" width="210" ></a><br/>
            Omnitech Pro has sponsored every Gull Code so far! Thanks Jeremy!
        </p><br/>
        <p class="sponsor" style="text-align: center;">
            <a href="http://apartmentsmart.com/"><img alt="" height="243" src="images/apartmentSmart.png" width="290"></a><br/> 
            Apartmentsmart.com has sponsored every Gull Code so far! Thanks Dave!
        </p><br/>
        <p class="sponsor" style="text-align: center;">
            <a href="http://www.d3corp.com/"><img alt="" src="images/D3CorpLogo.png" height="215" width="210"></a><br/>
            D3Corp has sponsored every Gull Code so far! Thanks Jay!
        </p><br/>
        <p class="sponsor" style="text-align: center;">
            <a href="http://www.delmarvadigital.com/"><img alt="" src="images/DelmarvaDigital.png" height="215" width="400"></a><br/>
            Delmarva Digital has sponsored every Gull Code so far! Thanks Alan!
        </p><br/>
         <p class="sponsor" style="text-align: center;">
            <a href="http://www.feisystems.com/"><img alt="" src="images/FEILogo.png" height="200" width="500"></a><br/>
            Our Newest Sponsor! Thanks Tiffani!
        </p><br/>
 -->        

</br></br></br></br>
      </p>
    </div>
    <script>var controls = new controls();</script>
    <?php 
     require("includes/footer.php");
    ?>