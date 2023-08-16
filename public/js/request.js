$('#requestNav2').click(function(){
	$("#RequestTableContainer #cbody").html('');


	var info = [sessionStorage.getItem('role'),sessionStorage.getItem('user_id')];
	console.log(info);
	$.ajax({
	    dataType: 'json',
	    url: "/api/adopter/request/"+info,
	    type: "GET",
	    success: function(data){
	      // console.log(data);
	      $.each(data, function(key, value){
	      	if (value.adopters[0]){
	      		    var adopter_id = value.adopters[0].id;
	      			console.log(value.adopters[0].pivot.code);
			        // console.log(value.adopters.pivot);
			        var status ="";

			       // if(value.adopters[0].pivot.status == 0){
			        if(value.adopters[0].pivot.status == 0){
			        	status = "waiting...";
			        }else{
			        	status = "confirm";
			        }
			        var id = value.id;
			        var tr = $("<tr>");
			        tr.append($("<td>").html(id));
			        tr.append($("<td>").html(value.animal_name));
			        tr.append($("<td>").html(value.adopters[0].adopter_fname));
			        tr.append($("<td>").html(value.adopters[0].adopter_lname));
			        tr.append($("<td>").html(value.adopters[0].adopter_contact));
			        tr.append($("<td>").html(status));
			        tr.append($("<td>").html(value.adopters[0].pivot.code));
			        if(value.adopters[0].pivot.status == 0){
			        tr.append("<td align='center'><a data-bs-toggle='modal' data-bs-target='#editModal' id='acceptRequestBtn' class='acceptRequestBtn' data-code="+value.adopters[0].pivot.code+" data-animalId="+id+" data-adopterId="+adopter_id+" style='cursor:pointer'><i class='fas fa-user-check' aria-hidden='true' style='color:#438ffe;font-size:24px; cursor:pointer' title='Confirm Adoption'></a></i></td>");
			      	}else{
			      	tr.append("<td align='center'><a ><i class='fas fa-stamp' aria-hidden='true' style='font-size:24px; color:#9e9e9e' title='Adoption Confirm'></a></i></td>");
			      	}
			        // tr.append("<td><a href='#'  class='deletebtn' data-id="+ id + "><i  class='fa fa-trash-o' style='font-size:24px; color:red' ></a></i></td>");
			        // console.log(tr);
			        $("#RequestTableContainer #cbody").append(tr);
		    // }
		}

	      });
	    },
	    error: function(){
	      console.log('AJAX load did not work');
	      alert("error");
	    }
	 });


	$('#cbody').on('click','.acceptRequestBtn', function(){

		console.log($(this).attr('data-animalId'));
		console.log($(this).attr('data-adopterId'));

		var animal_id = $(this).attr('data-animalId');
		var adopter_id = $(this).attr('data-adopterId');
		var code = $(this).attr('data-code');

		// $("#cbody td:contains("+animal_id+")").parent().remove();

		 bootbox.confirm("Do You Want To Confirm This Adoption Request?", function(result){
       
            if(result){
                $.ajax({
                    type:'GET',
                    url:'/api/adopt/confirm/'+animal_id+'/'+adopter_id+'/'+code,
                    dataType: "json",
                    success:function(data){
                        console.log(data);
                        		$("#cbody td:contains("+animal_id+")").parent().remove();
	                            alert('success');
	                            var adopter_id = data.adopters[0].id;
	                            var id = data.id;

	                              if(data.adopters[0].pivot.status == 0){
							        	status = "waiting...";
							        }else{
							        	status = "confirm";
							        }

						        var tr = $("<tr>");
						        tr.append($("<td>").html(id));
						        tr.append($("<td>").html(data.animal_name));
						        tr.append($("<td>").html(data.adopters[0].adopter_fname));
						        tr.append($("<td>").html(data.adopters[0].adopter_lname));
						        tr.append($("<td>").html(data.adopters[0].adopter_contact));
						        tr.append($("<td>").html(status));
						        tr.append($("<td>").html(data.adopters[0].pivot.code));
						        if(data.adopters[0].pivot.status == 0){
						        tr.append("<td align='center'><a data-bs-toggle='modal' data-bs-target='#editModal' id='acceptRequestBtn' class='acceptRequestBtn' data-code="+data.adopters[0].pivot.code+" data-animalId="+id+" data-adopterId="+adopter_id+" style='cursor:pointer'><i class='fas fa-user-check' aria-hidden='true' style='color:#438ffe;font-size:24px; cursor:pointer' title='Confirm Adoption'></a></i></td>");
						      	}else{
						      	tr.append("<td align='center'><a ><i class='fas fa-stamp' aria-hidden='true' style='font-size:24px; color:#9e9e9e' title='Adoption Confirm'></a></i></td>");
						      	}
						        // tr.append("<td><a href='#'  class='deletebtn' data-id="+ id + "><i  class='fa fa-trash-o' style='font-size:24px; color:red' ></a></i></td>");
						        // console.log(tr);
						        $("#RequestTableContainer #cbody").append(tr);

                   			 }
                		});
          		  }
       		 
   		 });

	});



	$('#adoptionRequestSearch').autocomplete({
		autoFocus : true,
		 source:function(request, response){
		 	var term = $('#adoptionRequestSearch').val();
		 	console.log(term);
        $.ajax({
            url:'/api/searchreq/'+term,
            type:'GET',
            dataType:'json',
            headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            // data:{search: request.term},
            success:function(data){
                response(data);
                $('#adoptionRequestSearch').val(term);
                 // console.log(data);
            }
        });
    },

    focus:function(event, ui){
    	console.log(ui.item.value);
        $.ajax({
            type:"GET",
            url:"/api/searchreq/click/"+ui.item.value,
            dataType:"json",
            success:function(data){
                $("#RequestTableContainer #cbody").html('');
                console.log(data.animal_name);
                // $.each(data.data, function( index, value ) {
		    	 var adopter_id = data.adopters[0].id;
	                            var id = data.id;

	                              if(data.adopters[0].pivot.status == 0){
							        	status = "waiting...";
							        }else{
							        	status = "confirm";
							        }

						        var tr = $("<tr>");
						        tr.append($("<td>").html(id));
						        tr.append($("<td>").html(data.animal_name));
						        tr.append($("<td>").html(data.adopters[0].adopter_fname));
						        tr.append($("<td>").html(data.adopters[0].adopter_lname));
						        tr.append($("<td>").html(data.adopters[0].adopter_contact));
						        tr.append($("<td>").html(status));
						        tr.append($("<td>").html(data.adopters[0].pivot.code));
						        if(data.adopters[0].pivot.status == 0){
						        tr.append("<td align='center'><a data-bs-toggle='modal' data-bs-target='#editModal' id='acceptRequestBtn' class='acceptRequestBtn' data-code="+data.adopters[0].pivot.code+" data-animalId="+id+" data-adopterId="+adopter_id+" style='cursor:pointer'><i class='fas fa-user-check' aria-hidden='true' style='color:#438ffe;font-size:24px; cursor:pointer' title='Confirm Adoption'></a></i></td>");
						      	}else{
						      	tr.append("<td align='center'><a ><i class='fas fa-stamp' aria-hidden='true' style='font-size:24px; color:#9e9e9e' title='Adoption Confirm'></a></i></td>");
						      	}
						        // tr.append("<td><a href='#'  class='deletebtn' data-id="+ id + "><i  class='fa fa-trash-o' style='font-size:24px; color:red' ></a></i></td>");
						        // console.log(tr);
						        $("#RequestTableContainer #cbody").hide().append(tr).show(400);
				// });



            },
            error:function(){
                console.log('AJAX load did not work');
                alert("error");
            }
        });
    },

	});




	$('#adoptionRequestSearch').keyup(function(){
		if(!$(this).val()){
				$("#RequestTableContainer #cbody").html('');
				$.ajax({
					    dataType: 'json',
					    url: "/api/adopter/request/"+info,
					    type: "GET",
					    success: function(data){
					      // console.log(data);
					      $.each(data, function(key, value){
					      	if (value.adopters[0]){
					      		    var adopter_id = value.adopters[0].id;
					      			console.log(value.adopters[0].pivot.code);
							        // console.log(value.adopters.pivot);
							        var status ="";

							       // if(value.adopters[0].pivot.status == 0){
							        if(value.adopters[0].pivot.status == 0){
							        	status = "waiting...";
							        }else{
							        	status = "confirm";
							        }
							        var id = value.id;
							        var tr = $("<tr>");
							        tr.append($("<td>").html(id));
							        tr.append($("<td>").html(value.animal_name));
							        tr.append($("<td>").html(value.adopters[0].adopter_fname));
							        tr.append($("<td>").html(value.adopters[0].adopter_lname));
							        tr.append($("<td>").html(value.adopters[0].adopter_contact));
							        tr.append($("<td>").html(status));
							        tr.append($("<td>").html(value.adopters[0].pivot.code));
							        if(value.adopters[0].pivot.status == 0){
							        tr.append("<td align='center'><a data-bs-toggle='modal' data-bs-target='#editModal' id='acceptRequestBtn' class='acceptRequestBtn' data-code="+value.adopters[0].pivot.code+" data-animalId="+id+" data-adopterId="+adopter_id+" style='cursor:pointer'><i class='fas fa-user-check' aria-hidden='true' style='color:#438ffe;font-size:24px; cursor:pointer' title='Confirm Adoption'></a></i></td>");
							      	}else{
							      	tr.append("<td align='center'><a ><i class='fas fa-stamp' aria-hidden='true' style='font-size:24px; color:#9e9e9e' title='Adoption Confirm'></a></i></td>");
							      	}
							        // tr.append("<td><a href='#'  class='deletebtn' data-id="+ id + "><i  class='fa fa-trash-o' style='font-size:24px; color:red' ></a></i></td>");
							        // console.log(tr);
							        $("#RequestTableContainer #cbody").hide().append(tr).show(400);
						    // }
						}

					      });
					    },
					    error: function(){
					      console.log('AJAX load did not work');
					      alert("error");
					    }
					 });


		}
	});

});