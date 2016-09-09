/* controls.php 
Programer: Rob Close
Date: January 2nd, 2015
*/
function login_controls(){	
	this.loadPage = function(){
		var _self = this;
		_self.login();
		_self.properties();
		_self.frameLogin();
		_self.frameRegister();
	}

	//////////////////////////////////
	// ALL JS FOR Login Frame //
	//////////////////////////////////
	this.frameLogin = function(){
		var _self = this;
		_self.currentFrame = "frameLogin";
	}

	//////////////////////////////////
	// ALL JS FOR Registration Frame //
	//////////////////////////////////
	this.frameRegister = function(){
		var _self = this;

		$("#regBackBtn").on("click", function(){
				console.log("Clicked Cancel");
				$("#" + _self.currentFrame).css("display", "none");
					$("#frameLogin").css("display", "block");
					_self.currentFrame = "frameLogin";
					console.log("Current Frame: " + _self.currentFrame);
		});

		$("#submitNewUser").on("click", function(){
				console.log("Clicked submit new user");
				$.get("processors/registerUser.php",{
				password: $("#pass").val(),
				username: $("#user").val(),
				fname: $("#fname").val(),
				lname: $("#lname").val(),
				email: $("#email").val(),
				major: $("#major").val(),
				level: $("#level").val()
			}, function(result){
				console.log("Result is: " + result);
				if(result == 0){
					console.log("query error: " + result);
					console.log("username is " + $("#user").val())
				}

				else if(result == 1){
					window.location = "mentor_user.php";
				}
				else if(result == 2 ){
					alert("Username is taken");
					console.log("Username taken");
				}
				else if(result == 3){
					alert("Email is already used for a different account");
					console.log("Email is taken");
				}

			});
		});

		$(document).ready(function () {
		   $("#txtConfirmPassword").keyup(checkPasswordMatch);
		});
	}
		
	//////////////////////////////////
	// Login and Register Functions //
	//////////////////////////////////
	this.login = function(){
		var _self = this;
		//switch frames to register function when user clicks "Create Account"
		$("#register").on("click", function(){
			console.log("Clicked Register");
			$("#" + _self.currentFrame).css("display", "none");
				$("#frameRegister").css("display", "block");
				_self.currentFrame = "frameRegister";
				console.log("Current Frame: " + _self.currentFrame);
		});

		$("#login").on("click", function(){

			$.get("processors/checkUserLogin.php",{
				username: $("#username").val(),
				password: $("#password").val()
			}, function(result){
				console.log("Result is " + result);
				//Not a valid username and password
				if(result == 0 ){
					// Have red text message appear 
					console.log("Invalid Username/Password");
					alert("Invalid Username, Password, or both");

				}
				//User is user level
				else if(result == 1){
					window.location = "mentor_user.php";	
				}
				//User is an Mentor level
				else if(result == 2){
					window.location = "mentor_mentor.php";
				}
				//User is an Admin level
				else if(result == 3){
					window.location = "mentor_admin.php";
				}
				//User must verify account
				else if(result == 4){
					console.log("Account Not Verified");
					alert("Your Account is not verified. Please Check your email and follow the instructions");
				}	
			});		
		});
	}
	///////////////////////
	// GLOBAL PROPERTIES //
	///////////////////////
	this.properties = function(){
		var _self = this;
		_self.currentFrame ="";
	}
	this.loadPage();
}

function checkPasswordMatch() {
		    var password = $("#pass").val();
		    var confirmPassword = $("#rePass").val();

		    if (password != confirmPassword)
		        $("#divCheckPasswordMatch").html("Passwords do not match!");
		    //else
		        //$("#divCheckPasswordMatch").html("Passwords match.");
}

