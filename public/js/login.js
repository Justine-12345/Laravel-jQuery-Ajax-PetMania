$(document).ready(function(){


$('#loginWarning').hide();
//Login Form Validation 
	var loginForm = $('#loginForm').validate({
					rules: {
						email:{required:true, email:true},
						password:{required:true},
					 	},

					messages: {
						email:{required:'Email is required'},
						password:{required:'Password is required'}},


					errorPlacement: function(error, element){
						
					error.css({'color':'red','font-style':'italic'});
				       error.insertBefore(element)
					}
	});
// adopterAddform.form();

	// Login Check
$('#loginSubmit').click(function(e){
		e.preventDefault();
		// console.log("wdwadaw");
		// // adopterAddform.form();
	    var data = $('#loginForm')[0];
	    let formData = new FormData($('#loginForm')[0]);
	  
	    $.ajax({
	            type: "POST",
	            url: "/api/check/user",
	            data: formData,
	            contentType: false,
	            processData: false,
	            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	            dataType: "json",
	            success: function(data) {  	
	            console.log(data);  
	               	 if (data.Message != "Success"){
	               	 	$('#loginWarning').hide().html(data.Message).fadeIn('fast');
	               	 }
	               	 else{
	               	 	$('#loginWarning').hide();
	               	 	$('#loginPage').hide(500);
	               	 	var role = data.response.user.role;
	               	 	sessionStorage.setItem("user_id", data.response.user.id);
	               	 	sessionStorage.setItem("role", data.response.user.role);
	               	 	sessionStorage.setItem("token", data.response.token);
	               	 	console.log(sessionStorage.getItem('user_id'));
	               	 	console.log(sessionStorage.getItem('token'));
	               	 	console.log(sessionStorage.getItem('role'));
	               	 	if (role == 'admin'){
	               	 		$('#animalVetNav').hide();
	               	 		$('#dashboardNav').click();
	               	 		$('#dashboardPage').show('400');
	               	 		$('#navForUsers').hide('400');
	               	 		$('#navForAdmin').show('400');

	               	 	}
	               	 	if (role == 'rescuer'){
	               	 		//Rescuer Show
	               	 		$('#animalVetNav').hide();
	               	 		$('#rescuerShowPage').show('400');
	               	 						$('#adoptNav, #requestNav1').hide(400);	
	               	 						$('#HadLog1, #myProfileNav, #logoutNav').show(400);
	               	 						$('#editRescuerModalContent #role, #loginNav, #signupNav').hide();

											$('#showRescuerModalContent1 #s_rescuer_image').prop('src','');
											$('#showRescuerModalContent1 #s_rescuer_fname').html('');
											$('#showRescuerModalContent1 #s_rescuer_lname').html('');
											$('#showRescuerModalContent1 #s_email').html('');
											$('#showRescuerModalContent1 #s_rescuer_age').html('');
											$('#showRescuerModalContent1 #s_rescuer_gender').html('');
											$('#showRescuerModalContent1 #s_rescuer_address').html('');
											$('#showRescuerModalContent1 #s_rescuer_id').html('');
											$('#showRescuerModalContent1 #rescuerAnimals').html('');

											$.ajax({
												type: "GET",
											    url: "/api/rescuer/"+data.response.user.id, 
											    beforeSend: function (xhr) {
												xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
												},
											    dataType: 'json',
											    success: function(data){
											    	// console.log(data.animals);
											    	$('#showRescuerModalContent1 #s_rescuer_image').prop('src',data.user.user_picture);
											    	$('#showRescuerModalContent1 #s_rescuer_fname').append(data.rescuer_fname);
											    	$('#showRescuerModalContent1 #s_rescuer_lname').append(data.rescuer_lname);
											    	$('#showRescuerModalContent1 #s_email').append(data.user.email);
											    	$('#showRescuerModalContent1 #s_rescuer_age').append(data.rescuer_age);
											    	$('#showRescuerModalContent1 #s_rescuer_gender').append(data.rescuer_gender);
											    	$('#showRescuerModalContent1 #s_rescuer_address').append(data.rescuer_address);
											    	$('#showRescuerModalContent1 #s_rescuer_id').append(data.user_id);


											    	for (var i = 0; i < data.animals.length; i++) {
											    		var animal = data.animals[i];

											    		var tr = $('<tr style="border-bottom:1px solid #d1e6f1; padding:24px;">');
											    		tr.append('<p scope="col" class="animal"> Animal Name : '+animal.animal_name+'</p>');
											    		tr.append('<p scope="col" class="animal ai"> Gender : '+animal.animal_gender+'</p>');
											    		tr.append('<p scope="col" class="animal ai"> Breed : '+animal.animal_breed+'</p>');
											    		tr.append('<p scope="col" class="animal ai"> Age : '+animal.animal_age+'</p>');
											    		tr.append('<p scope="col" class="animal ai"> Health Status : '+animal.animal_health+'</p></hr>');
											    		$('#showRescuerModalContent1 #rescuerAnimals').append(tr);
											    	}
											    },
											    error: function(){
											    	console.log('AJAX error');
											    }
											});
									

	               	 	}
	               	 	if (role == 'adopter'){	
	               	 					$('#animalVetNav').hide();
	               	 					$('#arf, #requestNav1').hide();
	               	 					$('#arfL').show();
	               	 					$('#adopterShowPage').show('400');
										$('#myProfileNav, #logoutNav').show();
										$('#editAdopterModalContent #role, #loginNav, #signupNav').hide();

										$('#showAdopterModalContent1 #s_adopter_image').prop('src','');
										$('#showAdopterModalContent1 #s_adopter_fname').html('');
										$('#showAdopterModalContent1 #s_adopter_lname').html('');
										$('#showAdopterModalContent1 #s_email').html('');
										$('#showAdopterModalContent1 #s_adopter_age').html('');
										$('#showAdopterModalContent1 #s_adopter_gender').html('');
										$('#showAdopterModalContent1 #s_adopter_address').html('');
										$('#showAdopterModalContent1 #s_adopter_contact').html('');
										$('#showAdopterModalContent1 #s_adopter_id').html('');
										$('#showAdopterModalContent1 #adopterAnimals').html('');
										e.preventDefault();
										var id = data.response.user.id;
										// console.log(id);
										$.ajax({
											type: "GET",
										    url: "/api/adopter/"+id,
										    beforeSend: function (xhr) {
									  		 xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
									  		}, 
										    dataType: 'json',
										    success: function(data){
										    	// console.log(data.animals);
										    	$('#showAdopterModalContent1 #s_adopter_image').prop('src',data.user.user_picture);
										    	$('#showAdopterModalContent1 #s_adopter_fname').append(data.adopter_fname);
										    	$('#showAdopterModalContent1 #s_adopter_lname').append(data.adopter_lname);
										    	$('#showAdopterModalContent1 #s_email').append(data.user.email);
										    	$('#showAdopterModalContent1 #s_adopter_age').append(data.adopter_age);
										    	$('#showAdopterModalContent1 #s_adopter_gender').append(data.adopter_gender);
										    	$('#showAdopterModalContent1 #s_adopter_contact').append(data.adopter_contact);
										    	$('#showAdopterModalContent1 #s_adopter_address').append(data.adopter_address);
										    	$('#showAdopterModalContent1 #s_adopter_id').append(data.user_id);


										    	for (var i = 0; i < data.animals.length; i++) {
										    		var animal = data.animals[i];
										    		var reqStat = "";

										    		if (animal.pivot.status == 0){
										    			reqStat = "Pending ...";
										    		}else{
										    			reqStat = "Confirm";
										    		}

										    		var tr = $('<tr style="border-bottom:1px solid #d1e6f1; padding:24px;">');
										    		tr.append('<p scope="col" class="animal"> Animal Name : '+animal.animal_name+'</p>');
										    		tr.append('<p scope="col" class="animal ai"> Gender : '+animal.animal_gender+'</p>');
										    		tr.append('<p scope="col" class="animal ai"> Breed : '+animal.animal_breed+'</p>');
										    		tr.append('<p scope="col" class="animal ai"> Age : '+animal.animal_age+'</p>');
										    		tr.append('<p scope="col" class="animal ai"> Health Status : '+animal.animal_health+'</p></hr>');
										    		tr.append('<p scope="col" class="animal ai"> Request Status : '+reqStat+'</p></hr>');
										    		$('#showAdopterModalContent1 #adopterAnimals').append(tr);
										    	}
										    },
										    error: function(){
										    	console.log('AJAX error');
										    }
										});
	               	 	}
	               	 	if (role == 'veterinarian'){
	               	 						$('#animalVetNav').show(400);
	               	 						$('#veterinarianShowPage').show(400);
	               	 		 				$('#adoptNav, #requestNav1, #loginNav, #signupNav').hide(400);	
	               	 						$('#HadLog1, #myProfileNav, #logoutNav').show(400);
	               	 						$('#editVeterinarianModalContent #role').hide();

												$('#showVeterinarianModalContent1 #s_veterinarian_image').prop('src','');
												$('#showVeterinarianModalContent1 #s_veterinarian_fname').html('');
												$('#showVeterinarianModalContent1 #s_veterinarian_lname').html('');
												$('#showVeterinarianModalContent1 #s_email').html('');
												$('#showVeterinarianModalContent1 #s_veterinarian_age').html('');
												$('#showVeterinarianModalContent1 #s_veterinarian_gender').html('');
												$('#showVeterinarianModalContent1 #s_veterinarian_address').html('');
												$('#showVeterinarianModalContent1 #s_veterinarian_id').html('');
												$('#showVeterinarianModalContent1 #veterinarianAnimals').html('');

												e.preventDefault();
												var id = data.response.user.id;
												console.log(id);
												$.ajax({
													type: "GET",
												    url: "/api/veterinarian/"+id,
												    beforeSend: function (xhr) {
													 xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
													}, 
												    dataType: 'json',
												    success: function(data){
												    	// console.log(data.animals);
												    	$('#showVeterinarianModalContent1 #s_veterinarian_image').prop('src',data.user.user_picture);
												    	$('#showVeterinarianModalContent1 #s_veterinarian_fname').append(data.veterinarian_fname);
												    	$('#showVeterinarianModalContent1 #s_veterinarian_lname').append(data.veterinarian_lname);
												    	$('#showVeterinarianModalContent1 #s_email').append(data.user.email);
												    	$('#showVeterinarianModalContent1 #s_veterinarian_contact').append(data.veterinarian_contact);
												    	$('#showVeterinarianModalContent1 #s_veterinarian_age').append(data.veterinarian_age);
												    	$('#showVeterinarianModalContent1 #s_veterinarian_gender').append(data.veterinarian_gender);
												    	$('#showVeterinarianModalContent1 #s_veterinarian_address').append(data.veterinarian_address);
												    	$('#showVeterinarianModalContent1 #s_veterinarian_id').append(data.user_id);


												    	for (var i = 0; i < data.animals.length; i++) {
												    		var animal = data.animals[i];

												    		var tr = $('<tr style="border-bottom:1px solid #d1e6f1; padding:24px;">');
												    		tr.append('<p scope="col" class="animal"> Animal Name : '+animal.animal_name+'</p>');
												    		tr.append('<p scope="col" class="animal ai"> Gender : '+animal.animal_gender+'</p>');
												    		tr.append('<p scope="col" class="animal ai"> Breed : '+animal.animal_breed+'</p>');
												    		tr.append('<p scope="col" class="animal ai"> Age : '+animal.animal_age+'</p>');
												    		tr.append('<p scope="col" class="animal ai"> Health Status : '+animal.animal_health+'</p></hr>');
												    		$('#showVeterinarianModalContent1 #veterinarianAnimals').append(tr);
												    	}
												    },
												    error: function(){
												    	console.log('AJAX error');
												    }
												});
	               	 	}
	               	 	if(role == 'new'){
	               	 		$('#animalVetNav').hide();
	               	 		$('#waitingPage').show(400);
	               	 		$('#requestNav1,#myProfileNav, #logoutNav').show();
							$('#editAdopterModalContent #role, #loginNav, #signupNav').hide();
	               	 	}

	               	 }
	            },
	            error: function(error) {
	                console.log('error');
	            }
	        });
	});

	$('#myProfileNav, #myProfileNav2').click(function(){
		var role = sessionStorage.getItem('role');
		console.log(role);
		if (role == "rescuer"){
			$('.pages').hide();
			$('#rescuerShowPage').show(400);
		}
		if (role == "adopter"){
			$('.pages').hide();
			$('#adopterShowPage').show(400);
		}
		if (role == "veterinarian"){
			$('.pages').hide();
			$('#veterinarianShowPage').show(400);
		}
		if (role == "admin"){
			$('.pages').hide();
			$('#dashboardPage').show(400);
		}
		if (role == "new"){
			console.log("bago");
			$('.pages').hide();
			$('#waitingPage').show(400);
		}

	});

	$('#logoutNav, #logoutNav2').click(function(){



	$.ajax({
	    dataType: 'json',
	    url: "/api/logout/"+sessionStorage.getItem('user_id'),
	     beforeSend: function (xhr) {
			xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
		},
	    type: "GET",
	    success: function(data){
	      console.log(data);
	    },
	    error: function(){
	      console.log('AJAX load did not work');
	      alert("error");
	    }
	 });


		console.log(sessionStorage.getItem('user_id'));
		sessionStorage.clear();
		$('.pages').hide();
		$('#animalVetNav').hide();
		$('#navForAdmin, #myProfileNav, #logoutNav').hide();
		$('#navForUsers, #loginNav, #signupNav, #adoptNav, #arf').show();
		$('#loginPage').show(400);
		 console.log('logoutOut');
	});



});