var diseaseTablecount = 0;
$('#diseasesNav').click(function(){
	//Disease DataTable

if (diseaseTablecount <= 0) {
	diseaseTablecount ++;
	$('#diseaseTable').DataTable({
     ajax: {
     url :"/api/disease/",
     beforeSend: function (xhr) {
	   xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
	 },
     // dataSrc: "",
     },
     // select: true,
     dom: 'Bfrtip',
     buttons: [
              {text: 'Add Disease',
                  className: 'btn btn-primary',
                  action: function ( e, dt, node, config ) {
                      // alert( 'Button activated' )
                      $("#diseaseCreateform").trigger("reset");
                       $('#diseaseCreateModal').modal('show');
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
              { "data": "id" },
              { "data": "disease_name" },
              { "data": "disease_desc" },
              { "data" : null,render : function ( data, type, row ) {
                  return "<a data-bs-toggle='modal' data-bs-target='#diseaseShowModal' class='diseaseShowBtn' data-id="+data.id+"><i class='far fa-eye' aria-hidden='true' style='font-size:24px'  data-id="+ data.id +"></i></a><a data-bs-toggle='modal' data-bs-target='#diseaseEditModal' class='diseaseEditBtn' data-id="+ data.id + "><i class='fa fa-pencil-square-o' aria-hidden='true' data-id="+data.id+" style='font-size:24px' ></i></a><a class='diseaseDeletebtn' data-id="+ data.id + "><i  class='diseaseDeletebtn2 fa fa-trash-o' style='font-size:24px; color:red' ></i></a>";
                }
              }
        ],
       });

	$('.closeModal').click(function(){
		$('#diseaseCreateModal').modal('hide');
		$('#diseaseEditModal').modal('hide');
		$('#diseaseShowModal').modal('hide');
	});


//Disease Form Validation 
	var diseaseAddform = $('#diseaseCreateform').validate({
					rules: {
						disease_name:{required:true},
						disease_desc:{required:true},
					 	},

					messages: {
						disease_name:{required:'Disease name is required'},
						disease_desc:{required:'Disease Description is required'},
					 	},
					errorPlacement: function(error, element){
						console.log(element);
						error.insertBefore(element)
					}
	});





//Disease Store
	$('#diseaseCreateSubmit').on('click',function(e){
		e.preventDefault();
		diseaseAddform.form();
	    var data = $('#diseaseCreateform')[0];
	    let formData = new FormData($('#diseaseCreateform')[0]);
	  
	    $.ajax({
	            type: "POST",
	            url: "/api/disease",
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
	               	    $("#diseaseCreateModal").modal("hide");
	                    var $diseaseTable = $('#diseaseTable').DataTable();
         				$diseaseTable.row.add(data).draw(false);
	            },
	            error: function(error) {
	                console.log('error');
	            }
	        });
	});


//Disease Edit
$('#diseaseTable').on('click', '.diseaseEditBtn', function(e){
		e.preventDefault();
		$('#editDiseaseModalContent #id').html('');
		$('#editDiseaseModalContent #disease_name').html('');
		$('#editDiseaseModalContent #disease_desc').html('');
		$('#diseaseEditModal').modal('show');
		var id = $(this).attr('data-id');
		console.log(id);

		$.ajax({
			type: "GET",
		    dataType: 'json',
		    url: "/api/disease/"+id+"/edit",
		    beforeSend: function (xhr) {
			 xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
			}, 
		    success: function(data){
		    	console.log(data);
		    	$('#editDiseaseModalContent #id').val(data.id);
		    	$('#editDiseaseModalContent #disease_name').val(data.disease_name);
		    	$('#editDiseaseModalContent #disease_desc').val(data.disease_desc);
		    },
		    error: function(){}
		});
	});


//Disease Edit Form Validation 
	var diseaseEditform = $('#diseaseEditform').validate({
					rules: {
						disease_name:{required:true},
						disease_desc:{required:true},
					 	},

					messages: {
						disease_name:{required:'Disease name is required'},
						disease_desc:{required:'Disease Description is required'},
					 	},


					errorPlacement: function(error, element){
						console.log(element);
						error.insertBefore(element)
					}
	});


//Disease Update
	$('#diseaseEditSubmit').click(function(e){
		e.preventDefault();
		// diseaseEditform.form();

		var id = $('#editDiseaseModalContent #id').val();
		console.log(id);

	    var data = $('#diseaseEditform')[0];
	    let formData = new FormData($('#diseaseEditform')[0]);
	    formData.append('_method', 'put');
	    formData.append('_token', "{{ csrf_token() }}");
	    var table = $('#diseaseTable').DataTable();
	    var aRow = $("tr td:contains("+id+")").closest('tr');

	    $.ajax({
        type: "POST",
        url: "/api/disease/"+id,
        beforeSend: function (xhr) {
	      xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
		},
        data: formData,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: "json",
        success: function(data) {
        	$('#diseaseEditModal').each(function(){
                    $(this).modal('hide'); 
              });
           		table.row(aRow).data(data).invalidate().draw(false);           
			// 
        },
        error: function(error) {
            console.log('error');
        }
    });
		
	});


//Disease Show
$('#diseaseTable').on('click', '.diseaseShowBtn', function(e){
		
		$('#showDiseaseModalContent #s_disease_name').html('');
		$('#showDiseaseModalContent #s_disease_desc').html('');
		$('#showDiseaseModalContent #s_disease_id').html('');
		$('#showDiseaseModalContent #diseasedAnimals').html('');

		e.preventDefault();
		$('#diseaseShowModal').modal('show');
		var id = $(this).attr('data-id');
		console.log(id);
		$.ajax({
			type: "GET",
		    url: "/api/disease/"+id,
		    beforeSend: function (xhr) {
			 xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
			}, 
		    dataType: 'json',
		    success: function(data){
		    	// console.log(data.animals);
		    	$('#showDiseaseModalContent #s_disease_name').append(data.disease_name);
		    	$('#showDiseaseModalContent #s_disease_desc').append(data.disease_desc);
		    	$('#showDiseaseModalContent #s_disease_id').append(data.id);
		    
		    	for (var i = 0; i < data.animals.length; i++) {
		    		var animal = data.animals[i];
		    		var tr = $('<tr style="border-bottom:1px solid #d1e6f1; padding:24px;">');
		    		tr.append('<p scope="col" class="animal"> Animal Name : '+animal.animal_name+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Gender : '+animal.animal_gender+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Breed : '+animal.animal_breed+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Age : '+animal.animal_age+'</p>');
		    		tr.append('<p scope="col" class="animal ai"> Health Status : '+animal.animal_health+'</p></hr>');
		    		$('#showDiseaseModalContent #diseasedAnimals').append(tr);
		    	}
		    },
		    error: function(){
		    	console.log('AJAX error');
		    }
		});


});




//Adopter Delete
	$("body").on("click",".diseaseDeletebtn",function(e){
	 console.log('delete');
	 e.preventDefault();
	 
    var table = $('#diseaseTable').DataTable();
    var id = $(this).data('id');
    var $row = $(this).closest('tr');
   console.log(id);
    bootbox.confirm("Are you sure?", function(result){
        if (result){
            if(result){
                $.ajax({
                    type:'DELETE',
                    url:'/api/disease/'+ id,
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