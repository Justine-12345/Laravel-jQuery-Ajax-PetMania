$(document).ready(function(){

	//Veterinarian Edit
$('#showVeterinarianModalContent1 #veterinarianEditBtn1').click(function(e){
		e.preventDefault();
		var id = sessionStorage.getItem('user_id');
		console.log(id);

		$.ajax({
			type: "GET",
		    dataType: 'json',
		    url: "/api/veterinarian/"+id+"/edit",
		    beforeSend: function (xhr) {
			 xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
			}, 
		    success: function(data){
		    	console.log(data);
		    	$('#editVeterinarianModalContent #user_image').prop('src', data.user.user_picture);
		    	$('#editVeterinarianModalContent #user_id').val(data.user.id);
		    	$('#editVeterinarianModalContent #old_user_picture').val(data.user.user_picture);
		    	$('#editVeterinarianModalContent #role').val(data.user.role);
		    	$('#editVeterinarianModalContent #veterinarian_fname').val(data.veterinarian_fname);
		    	$('#editVeterinarianModalContent #veterinarian_lname').val(data.veterinarian_lname);
		    	$('#editVeterinarianModalContent #veterinarian_age').val(data.veterinarian_age);
		    	$('#editVeterinarianModalContent #veterinarian_gender').val(data.veterinarian_gender);
		    	$('#editVeterinarianModalContent #veterinarian_contact').val(data.veterinarian_contact);
		    	$('#editVeterinarianModalContent #veterinarian_address').val(data.veterinarian_address);	
		    },
		    error: function(){}
		});
	});


//Veterinarian Edit Form Validation 
	var veterinarianEditform = $('#veterinarianEditform1').validate({
					rules: {
						veterinarian_fname:{required:true},
						veterinarian_lname:{required:true},
						veterinarian_age:{required:true, number:true},
						veterinarian_gender:{required:true},
						veterinarian_contact:{required:true, number:true},
						veterinarian_address:{required:true},
						password:{minlength : 5, equalTo: '#editVeterinarianModalContent #password_confirm'},
						password_confirm : {minlength : 5,equalTo : "#editVeterinarianModalContent #password"},
					 	},

					messages: {
						veterinarian_fname:{required:'Veterinarian first name is required'},
						veterinarian_lname:{required:'Veterinarian last name is required'},
					 	veterinarian_age:{required:'Veterinarian age is required'},
					    veterinarian_contact:{required:'Veterinarian contact is required'}},


					errorPlacement: function(error, element){
						
						if (element.is(':radio')){
				         error.insertAfter($('input:radio:last'))}
				       else if (element.is(':checkbox')){
				         error.insertAfter($('input:checkbox:last'))}
				       else {error.insertBefore(element)}
					}
	});




//Adopter Update
	$('#veterinarianEditSubmit1').click(function(e){
		e.preventDefault();
		// rescuerEditform.form();

		var id = $('#editVeterinarianModalContent #user_id').val();
		console.log(id);

	    var data = $('#veterinarianEditform1')[0];
	    let formData = new FormData($('#veterinarianEditform1')[0]);
	    formData.append('_method', 'put');
	    formData.append('_token', "{{ csrf_token() }}");
	    var table = $('#veterinarianTable').DataTable();
	    var aRow = $("tr td:contains("+id+")").closest('tr');

	    $.ajax({
        type: "POST",
        url: "/api/veterinarian/"+id,
        beforeSend: function (xhr) {
		 xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
		},
        data: formData,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: "json",
        success: function(data) {
        	console.log(data);
        	$('#veterinarianEditModal1').each(function(){
                    $(this).modal('hide'); 
              });

         		$('#showVeterinarianModalContent1 #s_veterinarian_image').prop('src',data.user.user_picture);
		    	$('#showVeterinarianModalContent1 #s_veterinarian_fname').html(data.veterinarian_fname);
		    	$('#showVeterinarianModalContent1 #s_veterinarian_lname').html(data.veterinarian_lname);
		    	$('#showVeterinarianModalContent1 #s_email').html(data.user.email);
		    	$('#showVeterinarianModalContent1 #s_veterinarian_age').html(data.veterinarian_age);
		    	$('#showVeterinarianModalContent1 #s_veterinarian_contact').html(data.veterinarian_contact);
		    	$('#showVeterinarianModalContent1 #s_veterinarian_gender').html(data.veterinarian_gender);
		    	$('#showVeterinarianModalContent1 #s_veterinarian_address').html(data.veterinarian_address);
		    	$('#showVeterinarianModalContent1 #s_veterinarian_id').html(data.user_id);        
			// 
        },
        error: function(error) {
            console.log('error');
        }
    });
		
	});

});