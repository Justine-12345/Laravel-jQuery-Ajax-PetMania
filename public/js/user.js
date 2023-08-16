var userTablecount = 0;
$('#newUserNav').click(function(){
	//Adopter DataTable

if (userTablecount <= 0) {
	userTablecount ++;
	$('#userTable').DataTable({
     ajax: { 
     url :"/api/user/",
     beforeSend: function (xhr) {
	   xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
	 },
     // dataSrc: "",
     },
     // select: true,
     dom: 'Bfrtip',
     buttons: [
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
              { "data": "id" },
              { "data": "role" },
              { "data": "user_fname" },
              { "data": "user_lname" },
              { "data": "user_age" },
              { "data": "user_contact" },
              { "data": "user_address" },
              { "data": "user_gender" },
              { "data" : null,render : function ( data, type, row ) {
                  return "<a data-bs-toggle='modal' data-bs-target='#userShowModal' class='userShowBtn' data-id="+data.id+"><i class='far fa-eye' aria-hidden='true' style='font-size:24px'  data-id="+ data.id +"></i></a><a data-bs-toggle='modal' data-bs-target='#userEditModal' class='userEditBtn' data-id="+ data.id + "><i class='fa fa-pencil-square-o' aria-hidden='true' data-id="+data.id+" style='font-size:24px' ></i></a><a class='userDeletebtn' data-id="+ data.id + "><i  class='userDeletebtn2 fa fa-trash-o' style='font-size:24px; color:red' ></i></a>";
                }
              }
        ],
       });

	$('.closeModal').click(function(){
	 	$('#userEditModal').modal('hide');
	 	$('#userShowModal').modal('hide');	
	});



//User Edit
$('#userTable').on('click', '.userEditBtn', function(e){
		e.preventDefault();
		$('#editUserModalContent #user_image').prop('src','');
		$('#userEditModal').modal('show');
		var id = $(this).attr('data-id');
		console.log(id);

		$.ajax({
			type: "GET",
		    dataType: 'json',
		    url: "/api/user/"+id+"/edit",
		     beforeSend: function (xhr) {
			   xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
			 }, 
		    success: function(data){
		    	console.log(data.adopter_fname);
		    	$('#editUserModalContent #user_image').prop('src', data.user_picture);
		    	$('#editUserModalContent #user_id').val(data.id);
		    	$('#editUserModalContent #old_user_picture').val(data.user_picture);
		    	$('#editUserModalContent #role').val(data.role);
		    	$('#editUserModalContent #user_fname').val(data.user_fname);
		    	$('#editUserModalContent #user_lname').val(data.user_lname);
		    	$('#editUserModalContent #user_age').val(data.user_age);
		    	$('#editUserModalContent #user_gender').val(data.user_gender);
		    	$('#editUserModalContent #user_contact').val(data.user_contact);
		    	$('#editUserModalContent #user_address').val(data.user_address);	
		    },
		    error: function(){}
		});
	});



//User Edit Form Validation 
	var userEditform = $('#userEditform').validate({
					rules: {
						user_fname:{required:true},
						user_lname:{required:true},
						user_age:{required:true, number:true},
						user_gender:{required:true},
						user_contact:{required:true, number:true},
						user_address:{required:true},
						password:{minlength : 5, equalTo: '#editUserModalContent #password_confirm'},
						password_confirm : {minlength : 5,equalTo : "#editUserModalContent #password"},
					 	},

					messages: {
						user_fname:{required:'User first name is required'},
						user_lname:{required:'User last name is required'},
					 	user_age:{required:'User age is required'},
					    user_contact:{required:'User contact is required'}},


					errorPlacement: function(error, element){
						if (element.is(':radio')){
				         error.insertBefore($('input:radio:last'))}
				       else if (element.is(':checkbox')){
				         error.insertBefore($('input:checkbox:last'))}
				       else {error.insertBefore(element)}
					}
	});


//User Update
	$('#userEditSubmit').click(function(e){
		e.preventDefault();
		// rescuerEditform.form();

		var id = $('#editUserModalContent #user_id').val();
		console.log(id);

	    var data = $('#userEditform')[0];
	    let formData = new FormData($('#userEditform')[0]);
	    formData.append('_method', 'put');
	    formData.append('_token', "{{ csrf_token() }}");
	    var table = $('#userTable').DataTable();
	    var aRow = $("tr td:contains("+id+")").closest('tr');

	    $.ajax({
        type: "POST",
        url: "/api/user/"+id,
        beforeSend: function (xhr) {
		 xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
		},
        data: formData,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: "json",
        success: function(data) {
        	$('#userEditModal').each(function(){
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


//User Show
$('#userTable').on('click', '.userShowBtn', function(e){
		
		$('#showUserModalContent #s_user_image').prop('src','');
		$('#showUserModalContent #s_user_fname').html('');
		$('#showUserModalContent #s_user_lname').html('');
		$('#showUserModalContent #s_email').html('');
		$('#showUserModalContent #s_user_age').html('');
		$('#showUserModalContent #s_user_gender').html('');
		$('#showUserModalContent #s_user_address').html('');
		$('#showUserModalContent #s_user_id').html('');
		$('#showUserModalContent #s_user_contact').html('');

		e.preventDefault();
		$('#userShowModal').modal('show');
		var id = $(this).attr('data-id');
		console.log(id);
		$.ajax({
			type: "GET",
		    url: "/api/user/"+id,
		    beforeSend: function (xhr) {
			 xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
			}, 
		    dataType: 'json',
		    success: function(data){
		    	// console.log(data.animals);
		    	$('#showUserModalContent #s_user_image').prop('src',data.user_picture);
		    	$('#showUserModalContent #s_user_fname').append(data.user_fname);
		    	$('#showUserModalContent #s_user_lname').append(data.user_lname);
		    	$('#showUserModalContent #s_email').append(data.email);
		    	$('#showUserModalContent #s_user_age').append(data.user_age);
		    	$('#showUserModalContent #s_user_contact').append(data.user_contact);
		    	$('#showUserModalContent #s_user_gender').append(data.user_gender);
		    	$('#showUserModalContent #s_user_address').append(data.user_address);
		    	$('#showUserModalContent #s_user_id').append(data.id);

		    },
		    error: function(){
		    	console.log('AJAX error');
		    }
		});


});


//Adopter Delete
	$("body").on("click",".userDeletebtn",function(e){
	 console.log('delete');
	 e.preventDefault();
	 
    var table = $('#userTable').DataTable();
    var id = $(this).data('id');
    var $row = $(this).closest('tr');
   console.log(id);
    bootbox.confirm("Are you sure?", function(result){
        if (result){
            if(result){
                $.ajax({
                    type:'DELETE',
                    url:'/api/user/'+ id,
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
       		 }
   		 });
	});

}

});