$(document).ready(function(){

	$('#WaitingContainer').hide();
	//Rescuer Form Validation 
	var registerform = $('#registerform').validate({
					rules: {
						file:{required:true},
						user_fname:{required:true},
						user_lname:{required:true},
						email:{required:true, email:true},
						user_contact:{required:true, number:true},
						user_gender:{required:true},
						user_age:{required:true, number:true},
					    user_address:{required:true},
						password:{required:true,  minlength : 5, equalTo: '#RegisterContainer #password_confirm'},
						password_confirm : {minlength : 5,equalTo : "#RegisterContainer #password"},
					 	},

					messages: {
						user_fname:{required:'First name is required'},
						user_lname:{required:'Last name is required'},
					 	email:{required:'Email is required'},
					    user_contact:{required:'Contact is required'}},


					errorPlacement: function(error, element){
						
						if (element.is(':radio')){
				         error.insertBefore($('input:radio:last'))}
				       else if (element.is(':checkbox')){
				         error.insertBefore($('input:checkbox:last'))}
				       else {error.insertBefore(element)}
					}
	});


//Register Store
	$('#registerSubmit').on('click',function(e){
		e.preventDefault();


		registerform.form();
	    var data = $('#registerform')[0];
	    let formData = new FormData($('#registerform')[0]);
	  
	    $.ajax({
	            type: "POST",
	            url: "/api/create",
	            data: formData,
	            contentType: false,
	            processData: false,
	            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	            dataType: "json",
	            success: function(data) {  
	            console.log(data);	  
	            	  sessionStorage.setItem("user_id", data.response.user.id);
	               	  sessionStorage.setItem("role", data.response.user.role);
	               	  sessionStorage.setItem("token", data.response.token);

	               	  console.log('success');
	               	  console.log('registered');
	               	  $('#output').attr('src','https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png');		
	               	  $('#registerform').get(0).reset();
	               	  $('#registerPage').hide('fast');
	               	  $('#myProfileNav, #logoutNav').show(400);
	               	  $('#editAdopterModalContent #role, #loginNav, #signupNav').hide();
	               	  $('#waitingPage').show(400);
	            },
	            error: function(error) {
	                console.log('error');
	            }
	        });
	});


});