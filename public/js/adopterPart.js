$(document).ready(function(){


	//Adopter Edit
$('#showAdopterModalContent1 #adopterEditBtn1').click(function(e){
		e.preventDefault();
		$('#editAdopterModalContent #user_image').prop('src','');
		var id = sessionStorage.getItem('user_id');
		console.log(id);
		$.ajax({
			type: "GET",
		    dataType: 'json',
		    url: "/api/adopter/"+id+"/edit",
		    beforeSend: function (xhr) {
		 	  xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
		    }, 
		    success: function(data){
		    	console.log(data.adopter_fname);
		    	$('#editAdopterModalContent #user_image').prop('src', data.user.user_picture);
		    	$('#editAdopterModalContent #user_id').val(data.user.id);
		    	$('#editAdopterModalContent #old_user_picture').val(data.user.user_picture);
		    	$('#editAdopterModalContent #role').val(data.user.role);
		    	$('#editAdopterModalContent #adopter_fname').val(data.adopter_fname);
		    	$('#editAdopterModalContent #adopter_lname').val(data.adopter_lname);
		    	$('#editAdopterModalContent #adopter_age').val(data.adopter_age);
		    	$('#editAdopterModalContent #adopter_gender').val(data.adopter_gender);
		    	$('#editAdopterModalContent #adopter_contact').val(data.adopter_contact);
		    	$('#editAdopterModalContent #adopter_address').val(data.adopter_address);	
		    },
		    error: function(){}
		});
	});


//Adopter Edit Form Validation 
	var adopterEditform = $('#adopterEditform1').validate({
					rules: {
						adopter_fname:{required:true},
						adopter_lname:{required:true},
						adopter_age:{required:true, number:true},
						adopter_gender:{required:true},
						adopter_contact:{required:true, number:true},
						adopter_address:{required:true},
						password:{minlength : 5, equalTo: '#editAdopterModalContent #password_confirm'},
						password_confirm : {minlength : 5,equalTo : "#editAdopterModalContent #password"},
					 	},

					messages: {
						adopter_fname:{required:'Adopter first name is required'},
						adopter_lname:{required:'Adopter last name is required'},
					 	adopter_age:{required:'Adopter age is required'},
					    adopter_contact:{required:'Adopter contact is required'}},


					errorPlacement: function(error, element){
						
						if (element.is(':radio')){
				         error.insertAfter($('input:radio:last'))}
				       else if (element.is(':checkbox')){
				         error.insertAfter($('input:checkbox:last'))}
				       else {error.insertBefore(element)}
					}
	});


	//Adopter Update
	$('#adopterEditSubmit1').click(function(e){
		e.preventDefault();
		// rescuerEditform.form();

		var id = $('#editAdopterModalContent #user_id').val();
		console.log(id);

	    var data = $('#adopterEditform1')[0];
	    let formData = new FormData($('#adopterEditform1')[0]);
	    formData.append('_method', 'put');
	    formData.append('_token', "{{ csrf_token() }}");
	    var table = $('#adopterTable').DataTable();
	    var aRow = $("tr td:contains("+id+")").closest('tr');

	    $.ajax({
        type: "POST",
        url: "/api/adopter/"+id,
        beforeSend: function (xhr) {
		   xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
	 	},
        data: formData,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: "json",
        success: function(data) {
        	$('#adopterEditModal1').each(function(){
                    $(this).modal('hide'); 
              });
				$('#showAdopterModalContent1 #s_adopter_image').prop('src',data.user.user_picture);
		    	$('#showAdopterModalContent1 #s_adopter_fname').html(data.adopter_fname);
		    	$('#showAdopterModalContent1 #s_adopter_lname').html(data.adopter_lname);
		    	$('#showAdopterModalContent1 #s_email').html(data.user.email);
		    	$('#showAdopterModalContent1 #s_adopter_age').html(data.adopter_age);
		    	$('#showAdopterModalContent1 #s_adopter_contact').html(data.adopter_contact);
		    	$('#showAdopterModalContent1 #s_adopter_gender').html(data.adopter_gender);
		    	$('#showAdopterModalContent1 #s_adopter_address').html(data.adopter_address);
		    	$('#showAdopterModalContent1 #s_adopter_id').html(data.user_id);

        },
        error: function(error) {
            console.log('error');
        }
    });
		
	});

});