var adopterTablecount = 0;
$('#adoptersNav').click(function(){

	if (adopterTablecount > 0) {
	$('#adopterTable').DataTable().ajax.reload();
	console.log('refresh');}

	
	//Adopter DataTable
if (adopterTablecount <= 0) {
	adopterTablecount ++;
	$('#adopterTable').DataTable({
     ajax: {
     url :"/api/adopter/",
     beforeSend: function (xhr) {
	   xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
	  },
     // dataSrc: "",
     },
     // select: true,
     dom: 'Bfrtip',
     buttons: [
              {text: 'Add Adopter',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      // alert( 'Button activated' )
                      $("#adopterCreateform").trigger("reset");
                       $('#adopterCreateModal').modal('show');
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
              { "data": "adopter_fname" },
              { "data": "adopter_lname" },
              { "data": "adopter_age" },
              { "data": "adopter_contact" },
              { "data": "adopter_address" },
              { "data": "adopter_gender" },
              { "data" : null,render : function ( data, type, row ) {
                  return "<a data-bs-toggle='modal' data-bs-target='#adopterShowModal' class='adopterShowBtn' data-id="+data.user_id+"><i class='far fa-eye' aria-hidden='true' style='font-size:24px'  data-id="+ data.user_id +"></i></a><a data-bs-toggle='modal' data-bs-target='#adopterEditModal' class='adopterEditBtn' data-id="+ data.user_id + "><i class='fa fa-pencil-square-o' aria-hidden='true' data-id="+data.user_id+" style='font-size:24px' ></i></a><a class='adopterDeletebtn' data-id="+ data.user_id + "><i  class='adopterDeletebtn2 fa fa-trash-o' style='font-size:24px; color:red' ></i></a>";
                }
              }
        ],
       });



	$('.closeModal').click(function(){
		$('#adopterCreateModal').modal('hide');
	 	$('#adopterEditModal').modal('hide');
	 	$('#adopterShowModal').modal('hide');	
	});



//Rescuer Form Validation 
	var adopterAddform = $('#adopterCreateform').validate({
					rules: {
						adopter_fname:{required:true},
						adopter_lname:{required:true},
						email:{required:true, email:true},
						adopter_age:{required:true, number:true},
						adopter_gender:{required:true},
						adopter_contact:{required:true, number:true},
						adopter_address:{required:true},
					    adopter_pic:{required:true},
						password:{required:true,  minlength : 5, equalTo: '#addAdopterModalContent #password_confirm'},
						password_confirm : {minlength : 5,equalTo : "#addAdopterModalContent #password"},
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
				       else {error.insertAfter(element)}
					}
	});



//Adopter Store
	$('#adopterCreateSubmit').on('click',function(e){
		e.preventDefault();
		adopterAddform.form();
	    var data = $('#adopterCreateform')[0];
	    let formData = new FormData($('#adopterCreateform')[0]);
	  
	    $.ajax({
	            type: "POST",
	            url: "/api/adopter",
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

	               	    $("#adopterCreateModal").modal("hide");
	                    var $adopterTable = $('#adopterTable').DataTable();
         				$adopterTable.row.add(data).draw(false);
	            },
	            error: function(error) {
	                console.log('error');
	            }
	        });
	});



//Adopter Edit
$('#adopterTable').on('click', '.adopterEditBtn', function(e){
		e.preventDefault();
		$('#editAdopterModalContent #user_image').prop('src','');
		$('#adopterEditModal').modal('show');
		var id = $(this).attr('data-id');
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


//Veterinarian Edit Form Validation 
	var adopterEditform = $('#adopterEditform').validate({
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
	$('#adopterEditSubmit').click(function(e){
		e.preventDefault();
		// rescuerEditform.form();

		var id = $('#editAdopterModalContent #user_id').val();
		console.log(id);

	    var data = $('#adopterEditform')[0];
	    let formData = new FormData($('#adopterEditform')[0]);
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
        	$('#adopterEditModal').each(function(){
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
$('#adopterTable').on('click', '.adopterShowBtn', function(e){
		$('#showAdopterModalContent #s_adopter_image').prop('src','');
		$('#showAdopterModalContent #s_adopter_fname').html('');
		$('#showAdopterModalContent #s_adopter_lname').html('');
		$('#showAdopterModalContent #s_email').html('');
		$('#showAdopterModalContent #s_adopter_age').html('');
		$('#showAdopterModalContent #s_adopter_gender').html('');
		$('#showAdopterModalContent #s_adopter_address').html('');
		$('#showAdopterModalContent #s_adopter_contact').html('');
		$('#showAdopterModalContent #s_adopter_id').html('');
		$('#showAdopterModalContent #adopterAnimals').html('');
		e.preventDefault();
		$('#adopterShowModal').modal('show');
		var id = $(this).attr('data-id');
		console.log(id);
		$.ajax({
			type: "GET",
		    url: "/api/adopter/"+id,
		    beforeSend: function (xhr) {
	  		 xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
	  		}, 
		    dataType: 'json',
		    success: function(data){
		    	// console.log(data.animals);
		    	$('#showAdopterModalContent #s_adopter_image').prop('src',data.user.user_picture);
		    	$('#showAdopterModalContent #s_adopter_fname').append(data.adopter_fname);
		    	$('#showAdopterModalContent #s_adopter_lname').append(data.adopter_lname);
		    	$('#showAdopterModalContent #s_email').append(data.user.email);
		    	$('#showAdopterModalContent #s_adopter_age').append(data.adopter_age);
		    	$('#showAdopterModalContent #s_adopter_gender').append(data.adopter_gender);
		    	$('#showAdopterModalContent #s_adopter_address').append(data.adopter_address);
		    	$('#showAdopterModalContent #s_adopter_contact').append(data.adopter_contact);
		    	$('#showAdopterModalContent #s_adopter_id').append(data.user_id);


		    	for (var i = 0; i < data.animals.length; i++) {
		    		var animal = data.animals[i];

		    		var tr = $('<tr style="border-bottom:1px solid #d1e6f1; padding:24px;">');
		    		tr.append('<p scope="col" class="animal"> Animal Name : '+animal.animal_name+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Gender : '+animal.animal_gender+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Breed : '+animal.animal_breed+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Age : '+animal.animal_age+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Health Status : '+animal.animal_health+'</p></hr>');
		    		$('#showAdopterModalContent #adopterAnimals').append(tr);
		    	}
		    },
		    error: function(){
		    	console.log('AJAX error');
		    }
		});


});


//Adopter Delete
	$("body").on("click",".adopterDeletebtn",function(e){
	 console.log('delete');
	 e.preventDefault();
	 
    var table = $('#adopterTable').DataTable();
    var id = $(this).data('id');
    var $row = $(this).closest('tr');
   console.log(id);
    bootbox.confirm("Are you sure?", function(result){
        
            if(result){
                $.ajax({
                    type:'DELETE',
                    url:'/api/adopter/'+ id,
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