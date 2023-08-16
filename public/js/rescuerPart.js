$(document).ready(function(){

	

console.log("sds");
	//Rescuer Edit
	$('#showRescuerModalContent1 #rescuerEditBtn1').click(function(e){
		e.preventDefault();
		$('#editRescuerModalContent #user_image').prop('src','');
		var id = sessionStorage.getItem('user_id');
		console.log(id);
		$.ajax({
			type: "GET",
		    dataType: 'json',
		    url: "/api/rescuer/"+id+"/edit",
		    beforeSend: function (xhr) {
			xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
			}, 
		    success: function(data){
		    	console.log(data);
		    	$('#editRescuerModalContent #user_image').prop('src', data.user.user_picture);
		    	$('#editRescuerModalContent #user_id').val(data.user.id);
		    	$('#editRescuerModalContent #old_user_picture').val(data.user.user_picture);
		    	$('#editRescuerModalContent #role').val(data.user.role);
		    	$('#editRescuerModalContent #rescuer_fname').val(data.rescuer_fname);
		    	$('#editRescuerModalContent #rescuer_lname').val(data.rescuer_lname);
		    	$('#editRescuerModalContent #rescuer_age').val(data.rescuer_age);
		    	$('#editRescuerModalContent #rescuer_gender').val(data.rescuer_gender);
		    	$('#editRescuerModalContent #rescuer_contact').val(data.rescuer_contact);
		    	$('#editRescuerModalContent #rescuer_address').val(data.rescuer_address);	
		    },
		    error: function(){}
		});
	});




//Rescuer Edit Form Validation 
	var rescuerEditform = $('#rescuerEditform1').validate({
					rules: {
						rescuer_fname:{required:true},
						rescuer_lname:{required:true},
						rescuer_age:{required:true, number:true},
						rescuer_gender:{required:true},
						rescuer_contact:{required:true, number:true},
						rescuer_address:{required:true},
						password:{minlength : 5, equalTo: '#editRescuerModalContent #password_confirm'},
						password_confirm : {minlength : 5,equalTo : "#editRescuerModalContent #password"},
					 	},

					messages: {
						rescuer_fname:{required:'Rescuer first name is required'},
						rescuer_lname:{required:'Rescuer last name is required'},
					 	rescuer_age:{required:'Rescuer age is required'},
					    rescuer_contact:{required:'Rescuer contact is required'}},


					errorPlacement: function(error, element){
					
						if (element.is(':radio')){
				         error.insertAfter($('input:radio:last'))}
				       else if (element.is(':checkbox')){
				         error.insertAfter($('input:checkbox:last'))}
				       else {error.insertBefore(element)}
					}
	});



//Rescuer Update
	$('#rescuerEditSubmit1').click(function(e){
		e.preventDefault();
		// rescuerEditform.form();

		var id = $('#editRescuerModalContent #user_id').val();
		console.log(id);

	    var data = $('#rescuerEditform1')[0];
	    let formData = new FormData($('#rescuerEditform1')[0]);
	    formData.append('_method', 'put');
	    formData.append('_token', "{{ csrf_token() }}");
	    var table = $('#rescuerTable').DataTable();

	    var aRow = $("tr td:contains("+id+")").closest('tr');
	    $.ajax({
        type: "POST",
        url: "/api/rescuer/"+id,
        beforeSend: function (xhr) {
		xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
		},
        data: formData,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: "json",
        success: function(data) {
        	$('#rescuerEditModal1').each(function(){
                    $(this).modal('hide'); 
              });
         		$('#showRescuerModalContent1 #s_rescuer_image').prop('src',data.user.user_picture);
		    	$('#showRescuerModalContent1 #s_rescuer_fname').html(data.rescuer_fname);
		    	$('#showRescuerModalContent1 #s_rescuer_lname').html(data.rescuer_lname);
		    	$('#showRescuerModalContent1 #s_email').html(data.user.email);
		    	$('#showRescuerModalContent1 #s_rescuer_age').html(data.rescuer_age);
		    	$('#showRescuerModalContent1 #s_rescuer_gender').html(data.rescuer_gender);
		    	$('#showRescuerModalContent1 #s_rescuer_address').html(data.rescuer_address);
		    	$('#showRescuerModalContent1 #s_rescuer_id').html(data.user_id);
        },
        error: function(error) {
            console.log('error');
        }
    });
		
	});

	


});