var rescuerTablecount = 0;
$('#resuersNav').click(function(){
	
	if (rescuerTablecount > 0) {
	$('#rescuerTable').DataTable().ajax.reload();
	console.log('refresh');}
	
	//Rescuer DataTable
if (rescuerTablecount <= 0) {
	rescuerTablecount ++;
	$('#rescuerTable').DataTable({
     ajax: {
     url :"/api/rescuer/",
     beforeSend: function (xhr) {
	   xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
	  },
     // dataSrc: "",
     },
     // select: true,
     dom: 'Bfrtip',
     buttons: [
              {text: 'Add Rescuer',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      // alert( 'Button activated' )
                      $("#rescuerCreateform").trigger("reset");
                       $('#rescuerCreateModal').modal('show');
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
              { "data": "rescuer_fname" },
              { "data": "rescuer_lname" },
              { "data": "rescuer_age" },
              { "data": "rescuer_contact" },
              { "data": "rescuer_address" },
              { "data": "rescuer_gender" },
              { "data" : null,render : function ( data, type, row ) {
                  return "<a data-bs-toggle='modal' data-bs-target='#rescuerShowModal' class='rescuerShowBtn' data-id="+data.user_id+"><i class='far fa-eye' aria-hidden='true' style='font-size:24px'  data-id="+ data.user_id +"></i></a><a data-bs-toggle='modal' data-bs-target='#rescuerEditModal' class='rescuerEditBtn' data-id="+ data.user_id + "><i class='fa fa-pencil-square-o' aria-hidden='true' data-id="+data.user_id+" style='font-size:24px' ></i></a><a class='rescuerDeletebtn' data-id="+ data.user_id + "><i  class='rescuerDeletebtn2 fa fa-trash-o' style='font-size:24px; color:red' ></i></a>";
                }
              }
        ],
       });

//Modal close
	$('.closeModal').click(function(){
		$('#rescuerCreateModal').modal('hide');
		$('#rescuerShowModal').modal('hide');
		$('#rescuerEditModal').modal('hide');
	});
	// $('')


//Rescuer Form Validation 
	var rescuerAddform = $('#rescuerCreateform').validate({
					rules: {
						rescuer_fname:{required:true},
						rescuer_lname:{required:true},
						email:{required:true, email:true},
						rescuer_age:{required:true, number:true},
						rescuer_gender:{required:true},
						rescuer_contact:{required:true, number:true},
						rescuer_address:{required:true},
					    rescuer_pic:{required:true},
						password:{required:true,  minlength : 5, equalTo: '#addRescuerModalContent #password_confirm'},
						password_confirm : {minlength : 5,equalTo : "#addRescuerModalContent #password"},
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
				       else {error.insertAfter(element)}
					}
	});






//Rescuer Store
	$('#rescuerCreateSubmit').on('click',function(e){
		e.preventDefault();
		rescuerAddform.form();
	    var data = $('#rescuerCreateform')[0];
	    let formData = new FormData($('#rescuerCreateform')[0]);
	  
	    $.ajax({
	            type: "POST",
	            url: "/api/rescuer",
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

	               	    $("#rescuerCreateModal").modal("hide");
	                    var $rescuerTable = $('#rescuerTable').DataTable();
         				$rescuerTable.row.add(data).draw(false);
	            },
	            error: function(error) {
	                console.log('error');
	            }
	        });
	});



//Rescuer Edit
$('#rescuerTable').on('click', '.rescuerEditBtn', function(e){
		e.preventDefault();
		$('#editRescuerModalContent #animal_image').prop('src','');
		$('#rescuerEditModal').modal('show');
		var id = $(this).attr('data-id');
		console.log(id);

		$.ajax({
			type: "GET",
		    dataType: 'json',
		    url: "/api/rescuer/"+id+"/edit",
		    beforeSend: function (xhr) {
			xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
			}, 
		    success: function(data){
		    	// console.log(data);
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
	var rescuerEditform = $('#rescuerEditform').validate({
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
	$('#rescuerEditSubmit').click(function(e){
		e.preventDefault();
		// rescuerEditform.form();

		var id = $('#editRescuerModalContent #user_id').val();
		console.log(id);

	    var data = $('#rescuerEditform')[0];
	    let formData = new FormData($('#rescuerEditform')[0]);
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
        	$('#rescuerEditModal').each(function(){
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

//Rescuer Show
$('#rescuerTable').on('click', '.rescuerShowBtn', function(e){
		
		$('#showRescuerModalContent #s_rescuer_image').prop('src','');
		$('#showRescuerModalContent #s_rescuer_fname').html('');
		$('#showRescuerModalContent #s_rescuer_lname').html('');
		$('#showRescuerModalContent #s_email').html('');
		$('#showRescuerModalContent #s_rescuer_age').html('');
		$('#showRescuerModalContent #s_rescuer_gender').html('');
		$('#showRescuerModalContent #s_rescuer_address').html('');
		$('#showRescuerModalContent #s_rescuer_id').html('');
		$('#showRescuerModalContent #rescuerAnimals').html('');

		e.preventDefault();
		$('#rescuerShowModal').modal('show');
		var id = $(this).attr('data-id');
		console.log(id);
		$.ajax({
			type: "GET",
		    url: "/api/rescuer/"+id, 
		    beforeSend: function (xhr) {
			xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
			},
		    dataType: 'json',
		    success: function(data){
		    	console.log(data.rescuer_fname);
		    	$('#showRescuerModalContent #s_rescuer_image').prop('src',data.user.user_picture);
		    	$('#showRescuerModalContent #s_rescuer_fname').append(data.rescuer_fname);
		    	$('#showRescuerModalContent #s_rescuer_lname').append(data.rescuer_lname);
		    	$('#showRescuerModalContent #s_email').append(data.user.email);
		    	$('#showRescuerModalContent #s_rescuer_age').append(data.rescuer_age);
		    	$('#showRescuerModalContent #s_rescuer_gender').append(data.rescuer_gender);
		    	$('#showRescuerModalContent #s_rescuer_address').append(data.rescuer_address);
		    	$('#showRescuerModalContent #s_rescuer_id').append(data.user_id);


		    	for (var i = 0; i < data.animals.length; i++) {
		    		var animal = data.animals[i];

		    		var tr = $('<tr style="border-bottom:1px solid #d1e6f1; padding:24px;">');
		    		tr.append('<p scope="col" class="animal"> Animal Name : '+animal.animal_name+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Gender : '+animal.animal_gender+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Breed : '+animal.animal_breed+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Age : '+animal.animal_age+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Health Status : '+animal.animal_health+'</p></hr>');
		    		$('#showRescuerModalContent #rescuerAnimals').append(tr);
		    	}
		    },
		    error: function(){
		    	console.log('AJAX error');
		    }
		});


});

//Rescuer Delete
	$("body").on("click",".rescuerDeletebtn",function(e){
	 console.log('delete');
	 e.preventDefault();
	 
    var table = $('#rescuerTable').DataTable();
    var id = $(this).data('id');
    var $row = $(this).closest('tr');
   console.log(id);
    bootbox.confirm("Are you sure?", function(result){
        if (result){
            if(result){
                $.ajax({
                    type:'DELETE',
                    url:'/api/rescuer/'+ id,
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