/* controls.php 
Programer: Rob Close
Date: February 3rd, 2015
*/
function controls(){	
	this.loadPage = function(){
		var _self = this;
		_self.gullRegister();
	
	}

	this.gullRegister = function(){
		var _self = this;
		$("#gullCodeLogin").on("click", function(){
			console.log("gullCodeLogin CLicked");
			window.loadPage("mentor_login.php?action=gullcode");
		});

		$("#gullCodeRegBtn").on("click", function(){

			
		}, function(e){

		});


	}
	///////////////////////
	// GLOBAL PROPERTIES //
	///////////////////////
	this.properties = function(){
		var _self = this;
		
	}
	
	this.loadPage();
}