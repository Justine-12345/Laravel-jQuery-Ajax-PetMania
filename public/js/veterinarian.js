var veterinarianTablecount = 0;
$('#veterinariansNav').click(function(){
	//Veterinarian DataTable

	if (veterinarianTablecount > 0) {
	$('#veterinarianTable').DataTable().ajax.reload();
	console.log('refresh');}

if (veterinarianTablecount <= 0) {
	veterinarianTablecount ++;
	$('#veterinarianTable').DataTable({
     ajax: {
     url :"/api/veterinarian/",
     beforeSend: function (xhr) {
	   xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
	 },
     // dataSrc: "",
     },
     // select: true,
     dom: 'Bfrtip',
     buttons: [
              {text: 'Add Veterinarian',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      // alert( 'Button activated' )
                      $("#veterinarianCreateform").trigger("reset");
                       $('#veterinarianCreateModal').modal('show');
                  }
              },
               {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
             {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
        
              'colvis'
      

          ],columns: [
              { "data": "user_id" },
              { "data": "veterinarian_fname" },
              { "data": "veterinarian_lname" },
              { "data": "veterinarian_age" },
              { "data": "veterinarian_contact" },
              { "data": "veterinarian_address" },
              { "data": "veterinarian_gender" },
              { "data" : null,render : function ( data, type, row ) {
                  return "<a data-bs-toggle='modal' data-bs-target='#veterinarianShowModal' class='veterinarianShowBtn' data-id="+data.user_id+"><i class='far fa-eye' aria-hidden='true' style='font-size:24px'  data-id="+ data.user_id +"></i></a><a data-bs-toggle='modal' data-bs-target='#veterinarianEditModal' class='veterinarianEditBtn' data-id="+ data.user_id + "><i class='fa fa-pencil-square-o' aria-hidden='true' data-id="+data.user_id+" style='font-size:24px' ></i></a><a class='veterinarianDeletebtn' data-id="+ data.user_id + "><i  class='veterinarianDeletebtn2 fa fa-trash-o' style='font-size:24px; color:red' ></i></a>";
                }
              }
        ],
       });

	$('.closeModal').click(function(){
		$('#veterinarianCreateModal').modal('hide');
		$('#veterinarianEditModal').modal('hide');
		$('#veterinarianShowModal').modal('hide');
	});



//Veterinarian Form Validation 
	var veterinarianAddform = $('#veterinarianCreateform').validate({
					rules: {
						veterinarian_fname:{required:true},
						veterinarian_lname:{required:true},
						email:{required:true, email:true},
						veterinarian_age:{required:true, number:true},
						veterinarian_gender:{required:true},
						veterinarian_contact:{required:true, number:true},
						veterinarian_address:{required:true},
					    veterinarian_pic:{required:true},
						password:{required:true,  minlength : 5, equalTo: '#addVeterinarianModalContent #password_confirm'},
						password_confirm : {minlength : 5,equalTo : "#addVeterinarianModalContent #password"},
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
				       else {error.insertAfter(element)}
					}
	});



//Veterinarian Store
	$('#veterinarianCreateSubmit').on('click',function(e){
		e.preventDefault();
		veterinarianAddform.form();
	    var data = $('#veterinarianCreateform')[0];
	    let formData = new FormData($('#veterinarianCreateform')[0]);
	  
	    $.ajax({
	            type: "POST",
	            url: "/api/veterinarian",
	            beforeSend: function (xhr) {
				 xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
				},
	            data: formData,
	            contentType: false,
	            processData: false,
	            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	            dataType: "json",
	            success: function(data) {  	  
	               	  console.log('success');
	               	  console.log(data);
	               	    $("#veterinarianCreateModal").modal("hide");
	                    var $veterinarianTable = $('#veterinarianTable').DataTable();
         				$veterinarianTable.row.add(data).draw(false);
	            },
	            error: function(error) {
	                console.log('error');
	            }
	        });
	});




//Veterinarian Edit
$('#veterinarianTable').on('click', '.veterinarianEditBtn', function(e){
		e.preventDefault();
		$('#editVeterinarianModalContent #animal_image').prop('src','');
		$('#veterinarianEditModal').modal('show');
		var id = $(this).attr('data-id');
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
	var veterinarianEditform = $('#veterinarianEditform').validate({
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
	$('#veterinarianEditSubmit').click(function(e){
		e.preventDefault();
		// rescuerEditform.form();

		var id = $('#editVeterinarianModalContent #user_id').val();
		console.log(id);

	    var data = $('#veterinarianEditform')[0];
	    let formData = new FormData($('#veterinarianEditform')[0]);
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
        	$('#veterinarianEditModal').each(function(){
                    $(this).modal('hide'); 
              });

           if(data == 'transfer'){
           		 table.row( aRow ).remove().draw(false);
           }else{
           		table.row(aRow).data(data).invalidate().draw(false);
           }            
			// 
        },
        error: function(error) {
            console.log('error');
        }
    });
		
	});




//Adopter Show
$('#veterinarianTable').on('click', '.veterinarianShowBtn', function(e){
		
		$('#showVeterinarianModalContent #s_veterinarian_image').prop('src','');
		$('#showVeterinarianModalContent #s_veterinarian_fname').html('');
		$('#showVeterinarianModalContent #s_veterinarian_lname').html('');
		$('#showVeterinarianModalContent #s_email').html('');
		$('#showVeterinarianModalContent #s_veterinarian_age').html('');
		$('#showVeterinarianModalContent #s_veterinarian_gender').html('');
		$('#showVeterinarianModalContent #s_veterinarian_contact').html('');
		$('#showVeterinarianModalContent #s_veterinarian_address').html('');
		$('#showVeterinarianModalContent #s_veterinarian_id').html('');
		$('#showVeterinarianModalContent #veterinarianAnimals').html('');

		e.preventDefault();
		$('#veterinarianShowModal').modal('show');
		var id = $(this).attr('data-id');
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
		    	$('#showVeterinarianModalContent #s_veterinarian_image').prop('src',data.user.user_picture);
		    	$('#showVeterinarianModalContent #s_veterinarian_fname').append(data.veterinarian_fname);
		    	$('#showVeterinarianModalContent #s_veterinarian_lname').append(data.veterinarian_lname);
		    	$('#showVeterinarianModalContent #s_email').append(data.user.email);
		    	$('#showVeterinarianModalContent #s_veterinarian_age').append(data.veterinarian_age);
		    	$('#showVeterinarianModalContent #s_veterinarian_contact').append(data.veterinarian_contact);
		    	$('#showVeterinarianModalContent #s_veterinarian_gender').append(data.veterinarian_gender);
		    	$('#showVeterinarianModalContent #s_veterinarian_address').append(data.veterinarian_address);
		    	$('#showVeterinarianModalContent #s_veterinarian_id').append(data.user_id);


		    	for (var i = 0; i < data.animals.length; i++) {
		    		var animal = data.animals[i];

		    		var tr = $('<tr style="border-bottom:1px solid #d1e6f1; padding:24px;">');
		    		tr.append('<p scope="col" class="animal"> Animal Name : '+animal.animal_name+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Gender : '+animal.animal_gender+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Breed : '+animal.animal_breed+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Age : '+animal.animal_age+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Health Status : '+animal.animal_health+'</p></hr>');
		    		$('#showVeterinarianModalContent #veterinarianAnimals').append(tr);
		    	}
		    },
		    error: function(){
		    	console.log('AJAX error');
		    }
		});


});



//Veterinarian Delete
	$("body").on("click",".veterinarianDeletebtn",function(e){
	 console.log('delete');
	 e.preventDefault();
	 
    var table = $('#veterinarianTable').DataTable();
    var id = $(this).data('id');
    var $row = $(this).closest('tr');
   console.log(id);
    bootbox.confirm("Are you sure?", function(result){
            if(result){
                $.ajax({
                    type:'DELETE',
                    url:'/api/veterinarian/'+ id,
                    beforeSend: function (xhr) {
					 xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
					},
                    dataType: "json",
                    success:function(data){
                        console.log(data);
                            table.row( $row ).remove().draw(false);
                            $row.fadeOut(4000, function () {
                               table.row( $row ).remove().draw(false);
                             });
                            bootbox.alert(data.success);
                   			 }
                		});
          		  }
   		 });
	});

	}
});