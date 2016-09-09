/* controls.php 
Programer: Rob Close
Date: January 2nd, 2015
*/
function controls(){	
	this.loadPage = function(){
		var _self = this;
		_self.navCol();
		_self.properties();
		_self.frameNavCol();
		_self.frameInfoCol();
		_self.frameHome();
		_self.frameUserMaint();
		_self.frameMentors();
		_self.frameMentorsMaint();
		_self.frameAbout();
		_self.frameAdmin();
		_self.modalControl();
		_self.gullRegister();
	}

	//////////////////////////////////
	// ALL JS FOR NavCol Frame //
	//////////////////////////////////
	this.frameNavCol = function(){
		var _self = this;
	}	

	//////////////////////////////////
	// ALL JS FOR Info Frame //
	//////////////////////////////////
	this.frameInfoCol = function(){
		var _self = this;
		var image;
		var array;
		$.get("processors/loadInfoCol.php", function(result){
			array = JSON.parse(result);
			//If the user has a mentor assigned in the database
			if( array === undefined || array === null){
				$("#infoCol_name").text("Choose a Mentor!");
				}
			//The user has no mentor in the database
			else{
				$("#infoCol_name").text(array[1] + " " + array[2]);
				$("#infoCol_email").text(array[3]);
				$("#infoCol_image").html("<img src=processors/getImage.php?id=" + array[0] + " width=125, height=100 alt=\"Not Found\" >");	
			}

		});
	}	
	
	//////////////////////////////////
	// ALL JS FOR Home Frame        //
	//////////////////////////////////
	this.frameHome = function(){
		var _self = this;
		//default load frame
		_self.currentFrame = "frameHome";
		_self.currentLink = "homeLink";
		$("#messageBox").text("Welcome!");
	}	

	////////////////////////////////////////////////
	// ALL JS FOR Users Account Maintenance Frame //
	////////////////////////////////////////////////
	this.frameUserMaint = function(){
		var _self = this;

		//Retrieve the users information
			//ajax call to query database
			$.get("processors/userMaint.php",{
				action: "retrieve",
				fname: $("#userMaint_fname").val(),
				lname: $("#userMaint_lname").val(),
				email: $("#userMaint_email").val(),
				major: $("#userMaint_major").val(),
				level: $("#userMaint_level").val()

			}, function(result){
				
				var info = JSON.parse(result);
				if(info === undefined || info === null){
					$("#messageBox").text("Error");
				}
				else{
					//Assigns the values from the JSON object to the input fields of the HTML doc
					$("#userMaint_fname").val(info[4]);
					$("#userMaint_lname").val(info[5]);
					$("#userMaint_email").val(info[6]);
					$("#userMaint_major").val(info[7]);
					$("#userMaint_level").val(info[8]);
				}
		});
		//Update the users information
		$("#userMaintUpdate").on("click", function(){
			
			//Do form Validation First!!!!


			//ajax call to query database
			$.get("processors/userMaint.php",{
				action: "update",
				fname: $("#userMaint_fname").val(),
				lname: $("#userMaint_lname").val(),
				email: $("#userMaint_email").val(),
				major: $("#userMaint_major").val(),
				level: $("#userMaint_level").val()

			}, function(result){
				console.log("Ajax call completed");
				var info = JSON.parse(result);
			
				//Assigns the values from the JSON object to the input fields of the HTML doc
				$("#userMaint_fname").val(info[4]);
				$("#userMaint_lname").val(info[5]);
				$("#userMaint_email").val(info[6]);
				$("#userMaint_major").val(info[7]);
				$("#userMaint_level").val(info[8]);
			});
		});
	}		

	//////////////////////////////////
	// ALL JS FOR Mentors Frame //
	//////////////////////////////////
	this.frameMentors = function(){
		var _self = this;
		}

	////////////////////////////////////
	// ALL JS FOR Mentors Modal Popup //
	////////////////////////////////////
	this.modalControl= function(){
		var _self = this;
		var mentor_id;
		var msg;
		
		$("#apply2BMentorBtn").on("click", function(){
			console.log("apply2BMentorBtn Clicked");
			$("#modal").fadeIn();
			$.get("processors/mentorApplicationModal.php", function(e){
			if(e == "mentor_exists"){
				console.log("User is already in the Mentor Table, result is: " + e);
				$("#modal").fadeOut();
				$(window).scrollTop(0);
				$("#messageBox").text("You are already a mentor!");
			}else{
				$(window).scrollTop(0);
				$("#mentorInfo").html(e);
			}
			});
		});

		$("#submitApplicationBtn").on("click", function(){		
			//make html form dom object
			var form = document.createElement('FORM');
			form.enctype = "application/x-www-form-urlencoded";
			
			//make form data container
			var formdata = new FormData(form);
			
			//append files
			var file = document.getElementById('mentor_app_img_file').files[0];
			if (file) {   
				formdata.append('image', file);
			}
			formdata.append('msg', $("#application").val());
			formdata.append('bio', $("#app_bio").val());
			formdata.append('max', $("#app_max").val());
			$.ajax("processors/processMentorApplication.php", {
				type: "POST",
				data: formdata,             
				cache: false,
				contentType: false, //must, tell jQuery not to process the data
				processData: false,
				complete: function(e){
					console.log("Application Submitted ");
					$("#modal").fadeOut();
					$("#messageBox").text("Thank you for applying. You will be contacted via email shortly");	
				}
			});
		});

		$("#cancelAppBtn").on('click', function(){
			$("#modal").fadeOut();
		});

		$(".mentorItem").on("click", function(){
			console.log("Mentor ID: " + $(this).val());
			mentor_id = $(this).val();
			
			$("#modal").fadeIn();
			$(window).scrollTop(0);
			//ajax call to display mentor modal
			$.get("processors/mentorBioModal.php",{
				mentor_id: mentor_id

			}, function(e){
				$("#mentorInfo").html(e);
			});
		});

		//Shows image preview when user selects a file in the "Apply to be Mentor" Modal
		$("#mentor_app_img_file").on("change", function(){
			console.log("Image changed");
			var url = this.value;
    		var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    		if (this.files && this.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        		var reader = new FileReader();
       			 reader.onload = function (e) {
            		$('#mentor_app_preview').attr('src', e.target.result);
        		}
        		reader.readAsDataURL(this.files[0]);
    			}else{
        			 $('#mentor_app_preview').attr('src', '/assets/no_preview.png');
    			}
		});

		//When select as my mentor is clicked, Checks to see if the new mentor is the same as the old mentor, if not it changes the modal to the screen that lets the user enter a message to the mentor and request them.
		$("#selectMentor").on("click", function(){
			console.log("Clicked Select Mentor");
			console.log("Mentor ID: " + mentor_id);

			$.get("processors/checkMentor.php",{
				mentor_id: mentor_id
			}, function(result){
					console.log("Result is: " + result);
					//Current Mentor and selected mentor are not the same
					if(result == 1){
						$.get("processors/assignMentorModal.php",{
							mentor_id: mentor_id
						}, function(x){
							//changes the mentorInfo modal to the assign view
							$("#mentorInfo").html(x);
						});
					}
					//The selected mentor is the same as the currently assigned
					else{
						console.log("Mentor already assigned");
						$("#modal").fadeOut();
						$("#messageBox").text("That is already your mentor!");
					}	
				});	
		});

		//Assign button clicked in assign view. This gets the message from the user and calls the assignMentor.php script to update the User_Mentor table with the new link and also emails the Mentor with the Mentee information and message
		$("#assignMentor").on("click", function(){
				var msg = $("#msg").val();
				
				console.log("Clicked assignMentor, msg is: " + msg + ", Mentor is" + mentor_id);
				$.get("processors/assignMentor.php",{
					mentor_id: mentor_id,
					msg: msg
				}, function(result){
					
					console.log("Assign Results: " + result);
					//Not logged in
					if(result == 0){
						console.log("User not logged in");
						$("#messageBox").text("User not logged in");
					}
					//Success
					else if(result != 0){
						
						console.log("Query Successful. User_Mentor table updated.");
						$("#modal").fadeOut();
						$("#messageBox").text("Your new mentor will contact you shortly!");
							_self.frameInfoCol();
					}
				});
		});

		//Close the modal
		$("#modalBackBtn").on('click', function(){
			$("#modal").fadeOut();
		});
	}	

	//////////////////////////////////
	// ALL JS FOR Mentors Maintenance Frame //
	//////////////////////////////////
	this.frameMentorsMaint = function(){
		var _self = this;

		//ajax call to query database
		$.post("processors/mentorMaint.php",{
			action: "retrieve"
		}, function(result){
			var info = JSON.parse(result);
			console.log("retrieve json before parsed is " + result);
			//Assigns the values from the JSON object to the input fields of the HTML doc
			if(info === undefined || info === null){
				
				$("#mentorMaint_bio").val("Error");
			}
			else{
				$("#mentorMaint_bio").val(info[1]);
				$("#mentorMaint_max").val(info[2]);
				$("#mentor_preview").attr("src", 'processors/getImage.php?id='+ info[0] );
			}
			});

		//Update the users information
		$("#mentorMaintUpdate").on("click", function(){

			//make html form dom object
			var form = document.createElement('FORM');
			form.enctype = "application/x-www-form-urlencoded";
			
			//make form data container
			var formdata = new FormData(form);
			
			//append files
			var file = document.getElementById('mentor_img_file').files[0];
			if (file) {   
				formdata.append('image', file);
			}
			formdata.append('action', "update");
			formdata.append('bio', $("#mentorMaint_bio").val());
			formdata.append('max', $("#mentorMaint_max").val());

			$.ajax("processors/mentorMaint.php", {
				type: "POST",
				data: formdata,             
				cache: false,
				contentType: false, //must, tell jQuery not to process the data
				processData: false,
				dataType: 'json',
				complete: function(response){
					console.log("record updated");

					//ajax call to query database. 
					$.post("processors/mentorMaint.php",{
						action: "retrieve"
					}, function(result){
						var info = JSON.parse(result);
						//Assigns the values from the JSON object to the input fields of the HTML doc
						if(info === undefined || info === null){
							console.log(info);
							$("#mentorMaint_bio").val("Error");
						}
						else{
							$("#mentorMaint_bio").val(info[1]);
							$("#mentorMaint_max").val(info[2]);
							$("#mentor_preview").attr("src", 'processors/getImage.php?id='+ info[0] );
						}
						});	
				}
			});
		}); 

		//Shows image preview when user selects a file in the "Apply to be Mentor" Modal
		$("#mentor_img_file").on("change", function(){
			console.log("Image changed");
			var url = this.value;
    		var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    		if (this.files && this.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        		var reader = new FileReader();
       			 reader.onload = function (e) {
            		$('#mentor_preview').attr('src', e.target.result);
        		}
        		reader.readAsDataURL(this.files[0]);
    			}else{
        			 $('#mentor_preview').attr('src', '/assets/no_preview.png');
    			}
		});


	}

	//////////////////////////////////
	// ALL JS FOR About Frame //
	//////////////////////////////////
	this.frameAbout = function(){
		var _self = this;
	}	
	//////////////////////////////////
	// ALL JS FOR Admin Frame       //
	//////////////////////////////////
	this.frameAdmin = function(){
		var _self = this;
		//Tab COntrols
			jQuery(document).ready(function() {
	    		jQuery('.tabs .tab-links a').on('click', function(e)  {
	        	var currentAttrValue = jQuery(this).attr('href');
		 
		        // Show/Hide Tabs
		        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
	 
		        // Change/remove current tab to active
		        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
	 
	        	e.preventDefault();
    		});
		});	
		//UserMentor table CRUD (Create, Retrieve, Update, Delete) functions
		$(".umTableButton").on("click", function(){
			var deleteFile = true;
			var action = $(this).val();
			console.log("Action is: " + action);
			//Confirm that the user wants to delete the record
			if(action == "Delete"){
				deleteFile = confirm("Do you really want to delete this record? This cannot be undone!");
			}
			//Helps prevent an accidental delete from occuring
			if(deleteFile){
				//ajax call to query database
				$.get("processors/adminUserMentorTable.php",{
					action: action,
					user_id: $("#umTable_User_id").val(),
					mentor_id: $("#umTable_Mentor_id").val()
				}, function(result){
					var info = JSON.parse(result);
					//Assigns the values from the JSON object to the input fields of the HTML doc
					if(action != "Delete"){
						$("#umTable_User_id").val(info[0]);
						$("#umTable_Mentor_id").val(info[1]);
					}else{
						$("#umTable_User_id").val("");
						$("#umTable_Mentor_id").val("");
					}	
					//Re-displays the records in the mentor table on the screen
					$.get("processors/adminUserMentorTableDump.php", function(e){
						$("#umTableDump").html(e);
					});			
				});
			}
		});

		//User table CRUD (Create, Retrieve, Update, Delete) functions
		$(".userTableButton").on("click", function(){
			var deleteFile = true;
			var action = $(this).val();
			console.log("Action is: " + action);
			console.log("group_id: "+ $("#userTable_group").val());
			//Confirm that the user wants to delete the record
			if(action == "Delete"){
				deleteFile = confirm("Do you really want to delete this record? This cannot be undone!")
			}
			if(deleteFile){
				//ajax call to query database
				console.log("Getting: ");
				$.get("processors/adminUserTable.php",{
					action: action,
					user_id: $("#userTable_user_id").val(),
					username: $("#userTable_username").val(),
					group_id: $("#userTable_group").val(),
					fname: $("#userTable_fname").val(),
					lname: $("#userTable_lname").val(),
					email: $("#userTable_email").val(),
					major: $("#userTable_major").val(),
					level: $("#userTable_level").val(),
					active: $("#userTable_active").val(),
					resetToken: $("#userTable_resetToken").val(),
					resetComplete: $("#userTable_resetComplete").val()
					
				}, function(result){
				console.log("Receiving ");
					var info = JSON.parse(result);
					//Assigns the values from the JSON object to the input fields of the HTML doc
					$("#userTable_user_id").val(info[0]);
					$("#userTable_username").val(info[1]);	
					$("#userTable_group").val(info[2]);	
					$("#userTable_fname").val(info[3]);	
					$("#userTable_lname").val(info[4]);	
					$("#userTable_email").val(info[5]);	
					$("#userTable_major").val(info[6]);	
					$("#userTable_level").val(info[7]);
					$("#userTable_active").val(info[8]);
					$("#userTable_resetToken").val(info[9]);
					$("#userTable_resetComplete").val(info[10]);

					//Re-displays the records in the User table on the screen
					$.get("processors/adminUserTableDump.php", function(e){
						$("#adminUserTableDump").html(e);
					});						
				});
			}
		});

		//Mentor table Insert, Retrieve, Update, Delete functions
		$(".mentorTableButton").on("click", function(){
			var deleteFile = true;
			var action = $(this).val();
			console.log("Action is: " + action);
			//Confirm that the user wants to delete the record
			if(action == "Delete"){
				deleteFile = confirm("Do you really want to delete this record? This cannot be undone!")
			}
			if(deleteFile){		
				//ajax call to query database
				$.get("processors/adminMentorTable.php",{
					action: action,
					user_id: $("#mentorTable_user_id").val(),
					bio: $("#mentorTable_bio").val(),
					max: $("#mentorTable_max").val(),
					active: $("#mentorTable_active").val()
					
				}, function(result){
					var info = JSON.parse(result);
					//Assigns the values from the JSON object to the input fields of the HTML doc
					$("#mentorTable_user_id").val(info[0]);
					$("#mentorTable_bio").val(info[1]);
					$("#mentorTable_max").val(info[2]);
					$("#mentorTable_active").val(info[3]);
					$("#adminPhoto").html("<img src=processors/getImage.php?id="+ info[0] +" width=125, height=100 alt=\"Not Found\" ></a><a style=\"margin:25px\" class=\"btn1\" id=\"changePhotoAdmin\">Change Photo");
				
					//Re-displays the records in the mentor table on the screen
					$.get("processors/adminMentorTableDump.php", function(e){
						$("#mentorTableDump").html(e);
					});
				});
				}
			});

		$("#changePhotoAdmin").on("click", function(){
			console.log("changing screen");
			window.open("processors/uploadImage.php?mentor_id=" + $("#mentorTable_mentor_id").val() , "_blank");
		});
		
		//Mentor table Insert, Retrieve, Update, Delete functions
		$(".gullcodeTableButton").on("click", function(){
			var deleteFile = true;
			var action = $(this).val();
			console.log("Action is: " + action);

			console.log("args: " + $("#gullcodeTable_user_id").val() + ", " +
					 $("#teamname").val() + ", " +
					 $("#shirtsize").val() + ", " +
					$("#regdate").val());


			//Confirm that the user wants to delete the record
			if(action == "Delete"){
				deleteFile = confirm("Do you really want to delete this record? This cannot be undone!")
			}
			if(deleteFile){		
				//ajax call to query database
				$.get("processors/gullcodeTableMaint.php",{
					action: action,
					user_id: $("#gullcodeTable_user_id").val(),
					teamname: $("#teamname").val(),
					shirtsize: $("#shirtsize").val(),
					regdate: $("#regdate").val()
				}, function(result){
					var info = JSON.parse(result);
					//console.log(info);
					//Assigns the values from the JSON object to the input fields of the HTML doc
					
					$("#teamname").val(info[1]);
					$("#shirtsize").val(info[2]);
					$("#regdate").val(info[3]);
					
					//Re-displays the records in the mentor table on the screen
					$.get("processors/gullcodeTableDump.php", function(e){
						$("#gullcodeTableDump").html(e);
					});
				});
				}
			});

	}		

	//////////////////////////////////////
	// NavCol Links                     //
	//////////////////////////////////////
	this.navCol = function(){
		var _self = this;
		//sets the background color for the home link
		$("#homeLink").css("background-color", "rgb(216,216,216)");
		_self.currentLink = "homeLink";

		$("#homeLink").on("click", function(){
			console.log("Clicked Home, Current Frame: " + _self.currentFrame);
			if(_self.currentFrame != "frameHome"){
				//update css for frames
				$("#" + _self.currentFrame).css("display", "none");
				$("#frameHome").css("display", "block");
				_self.currentFrame = "frameHome";
				//update css for links
				$("#" + _self.currentLink).css("background-color", "");
				$("#homeLink").css("background-color", "rgb(216,216,216)");
				_self.currentLink = "homeLink";
				console.log("Current Frame: " + _self.currentFrame);
				$("#messageBox").text("Welcome!");
			}else{
				console.log("Clicked the same link you are already on");
			}
		});

		$("#aboutLink").on("click", function(){
			console.log("Clicked About, Current Frame is " + _self.currentFrame);
			if(_self.currentFrame != "frameAbout"){
				$("#" + _self.currentFrame).css("display", "none");
				$("#frameAbout").css("display", "block");
				_self.currentFrame = "frameAbout";
				//update css for links
				$("#" + _self.currentLink).css("background-color", "");
				$("#aboutLink").css("background-color", "rgb(216,216,216)");
				_self.currentLink = "aboutLink";
				console.log("Current Frame: " + _self.currentFrame);
				$("#messageBox").text("For more information, contact the club officers");
			}else{
				console.log("Clicked the same link you are already on");
			}
		});
		
		$("#mentorsLink").on("click", function(){
			console.log("Clicked Mentors, Current Frame: " + _self.currentFrame);
			if(_self.currentFrame != "frameMentors"){
				$("#" + _self.currentFrame).css("display", "none");
				$("#frameMentors").css("display", "block");
				_self.currentFrame = "frameMentors";
				//update css for links
				$("#" + _self.currentLink).css("background-color", "");
				$("#mentorsLink").css("background-color", "rgb(216,216,216)");
				_self.currentLink = "mentorsLink";
				console.log("Current Frame: " + _self.currentFrame);
				$("#messageBox").text("Choose a mentor to learn more about them");
			}else{
				console.log("Clicked the same link you are already on");
			}
		});

		$("#userMaintLink").on("click", function(){
			console.log("Clicked Home, Current Frame: " + _self.currentFrame);
			if(_self.currentFrame != "frameUserMaint"){
				$("#" + _self.currentFrame).css("display", "none");
				$("#frameUserMaint").css("display", "block");
				_self.currentFrame = "frameUserMaint";
				//update css for links
				$("#" + _self.currentLink).css("background-color", "");
				$("#userMaintLink").css("background-color", "rgb(216,216,216)");
				_self.currentLink = "userMaintLink";
				console.log("Current Frame: " + _self.currentFrame);
				$("#messageBox").text("Make changes and click update");
			}else{
				console.log("Clicked the same link you are already on");
			}
		});
		
		$("#mentorsMaintLink").on("click", function(){
			console.log("Clicked Mentors Maint, Current Frame: " + _self.currentFrame);
			if(_self.currentFrame != "frameMentorsMaint"){
				$("#" + _self.currentFrame).css("display", "none");
				$("#frameMentorsMaint").css("display", "block");
				_self.currentFrame = "frameMentorsMaint";
				//update css for links
				$("#" + _self.currentLink).css("background-color", "");
				$("#mentorsMaintLink").css("background-color", "rgb(216,216,216)");
				_self.currentLink = "mentorsMaintLink";
				console.log("Current Frame: " + _self.currentFrame);
				$("#messageBox").text("These forms update the information others will see about you.");
			}else{
				console.log("Clicked the same link you are already on");
			}
		});
		
		$("#adminLink").on("click", function(){
			console.log("Clicked Admin, Current Frame is " + _self.currentFrame);
			if(_self.currentFrame != "frameAdmin"){
				$("#" + _self.currentFrame).css("display", "none");
				$("#frameAdmin").css("display", "block");
				_self.currentFrame = "frameAdmin";
				//update css for links
				$("#" + _self.currentLink).css("background-color", "");
				$("#adminLink").css("background-color", "rgb(216,216,216)");
				_self.currentLink = "adminLink";
				console.log("Current Frame: " + _self.currentFrame);
				$("#messageBox").text("These forms overwrite data in the tables. Be careful!");
			}else{
				console.log("Clicked the same link you are already on");
			}
		});
	} 

	this.loadHome = function (){
 		console.log("logged in ");
 	}

	this.gullRegister = function(){
		var _self = this;
		$("#gullCodeLogin").on("click", function(){
			console.log("gullCodeLogin Clicked");
			window.open("login.php?action=gullcode", "_self");
		});

		$("#gullCodeRegBtn").on("click", function(){
			console.log("gullCodeRegBtn Clicked");
			$("body").css("cursor", "progress");
			$.get("processors/gullCodeRegistrationEmail.php",{
				teamname: $("#teamname").val(),
				shirtsize: $("#shirtsize").val()
			}, function(e){
				console.log(e);
				if(e == "user_exists"){
					$("#gullRegMessage").text("Already registered!");
					$("body").css("cursor", "default");
				}else if(e == "success"){
					window.open("gullCode.php", "_self");
					$("#gullRegMessage").text("Thank you for registering!");
					$("body").css("cursor", "default");
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
		_self.currentLink = "";
	}
	
	this.loadPage();
}

