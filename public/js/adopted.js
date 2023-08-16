$('#adoptedNav').click(function(){
	$('#adoptedRow').html('');
	$.ajax({
		type: "GET",
		    dataType: 'json',
		    url: "/api/frontpage",
		    success: function(data){
		    	$.each(data.data, function( index, value ) {
		    		var card ='';

				  if (value.adopters[0]) {
				  	console.log(value.adopters[0].pivot.status)
				  	var stat = "";
				  	if (value.adopters[0].pivot.status == 0){
				  		stat = "<span style='color:orange;'><i title='Adoption Pending' class='fas fa-certificate' style='color:orange; font-size:20px'></i>Pending Request...</span>";
				  	}
				  	else{
				  		stat = "<span style='color:green'><i title='Adopted' class='fas fa-certificate' style='color:green; font-size:20px'></i>Adopted</span>";
				  	}

				  		card += '<div class="col-md-3" ><div class="thumbnail"><img data-id="'+value.id+'" class="adoptableAnimalPicture" src="'+value.animal_picture+'" class="card-img-top" alt="Animal Picture" style="height: 30vh; width: 100%; object-fit: cover;cursor:pointer;">';
				  		card += '<div class="caption"><h3>'+value.animal_name+'</h3><ul style="list-style:none;" id="adoptableAnimalDetail">';
						card += '<li>Type: '+value.category.category_name+'</li><li>Breed: '+value.animal_breed+'</li><li>Age: '+value.animal_age+'</li><li>Gender: '+value.animal_age+'</li><li>Health: '+value.animal_health+'</li><hr><li>Rescuer: '+value.rescuers[0].rescuer_fname+' '+value.rescuers[0].rescuer_lname+'</li><hr>';
						card += '<li><h4>'+stat+'</h4></li>';
						 }
					$('#adoptedRow').hide().append(card).show(400);
				});
		    },
		    error: function(data){}
	});


$('#AdoptedAnimalsContainer').on('click', '.adoptableAnimalPicture', function(e){


		console.log(id);
			e.preventDefault();
		var id = $(this).attr('data-id');
		$.ajax({
			type: "GET",
		    dataType: 'json',
		    url: "/api/main/show/"+id,
		    success: function(data){
		    	

		    	$('#commentContainer').html('');
		    	$('#s_diseases').html('');
		    	$('#showAnimalFrontContent #s_animal_image').prop('src',data.animal_picture);
		    	$('#showAnimalFrontContent #s_animal_name').html(data.animal_name);
		    	$('#showAnimalFrontContent #s_animal_category').html("The "+data.category.category_name);
		    	$('#showAnimalFrontContent #s_animal_age').html(data.animal_age);
		    	$('#showAnimalFrontContent #s_animal_gender').html(data.animal_gender);
		    	$('#showAnimalFrontContent #s_animal_breed').html(data.animal_breed);
		    	$('#showAnimalFrontContent #s_animal_health').html(data.animal_health);
		    	$('#showAnimalFrontContent #animal_id').val(data.id);
		    	$('#showAnimalFrontContent #s_animal_id').html(data.id);
		    	$('#adoptionRequestform #adopter_id').val(sessionStorage.getItem('user_id'));
		    	

		    	if (data.adopters[0]) {

		 
	     			$('#adoptBtnForm').attr('disabled',true);
		    		$('#adoptBtnForm').html('Adopted Already');

		    	$('#showAnimalFrontContent #noAdopter').hide();
		    	$('#showAnimalFrontContent #hasAdopter').show();

		    	$('#showAnimalFrontContent #s_adopter_fname').html(data.adopters[0].adopter_fname);
		    	$('#showAnimalFrontContent #s_adopter_lname').html(data.adopters[0].adopter_lname);
		    	$('#showAnimalFrontContent #s_adopter_contact').html(data.adopters[0].adopter_contact);
		    	$('#showAnimalFrontContent #s_adopter_address').html(data.adopters[0].adopter_address);
		    	$('#showAnimalFrontContent #s_adopter_id').html(data.adopters[0].id);
		        }
		        else{
		        	$('#adoptBtnForm').removeAttr('disabled');
		    		$('#adoptBtnForm').html('Adopt');
		        	$('#showAnimalFrontContent #noAdopter').show();
		    	    $('#showAnimalFrontContent #hasAdopter').hide();
		        }

		    	if (data.diseases[0]) {
		    		$('#showAnimalFrontContent #noDisease').hide();
		    		$('#showAnimalFrontContent #hasDisease').show();
			    	for (var i = 0; i < data.diseases.length; i++) {
			    		var disease = data.diseases[i];
			    		console.log(disease);
			    		var count = i + 1;
			    	var desc = '<tr style="border-top:1px solid #9acee2"><th scope="col" style="width: 30%">'+count+'. '+disease.disease_name+'</th>';
			    	desc += '<th scope="col"><span style="font-size: 20px; ">'+disease.disease_desc+'</span></th></tr>';
			    	$('#s_diseases').append(desc);
			    	}
		   		}else{
		   			$('#showAnimalFrontContent #noDisease').show();
		    		$('#showAnimalFrontContent #hasDisease').hide();
		   		}

		   		if (data.veterenarians[0]) {
		   		$('#showAnimalFrontContent #s_veterinarian_fname').html(data.veterenarians[0].veterinarian_fname);
		   		$('#showAnimalFrontContent #s_veterinarian_lname').html(data.veterenarians[0].veterinarian_lname);
		   		$('#showAnimalFrontContent #s_veterinarian_age').html(data.veterenarians[0].veterinarian_age);
		   		$('#showAnimalFrontContent #s_veterinarian_contact').html(data.veterenarians[0].veterinarian_contact);
		   		$('#showAnimalFrontContent #s_veterinarian_address').html(data.veterenarians[0].veterinarian_address);
		   		$('#showAnimalFrontContent #s_veterinarian_id').html(data.veterenarians[0].veterinarian_id);
		   		}

		   		if (data.rescuers[0]) {
		   		$('#showAnimalFrontContent #s_rescuer_fname').html(data.rescuers[0].rescuer_fname);
		   		$('#showAnimalFrontContent #s_rescuer_lname').html(data.rescuers[0].rescuer_lname);
		   		$('#showAnimalFrontContent #s_rescuer_age').html(data.rescuers[0].rescuer_age);
		   		$('#showAnimalFrontContent #s_rescuer_contact').html(data.rescuers[0].rescuer_contact);
		   		$('#showAnimalFrontContent #s_rescuer_address').html(data.rescuers[0].rescuer_address);
		   		$('#showAnimalFrontContent #s_rescuer_id').html(data.rescuers[0].rescuer_id);
		   		}

		   		if (data.comments[0]) {
		   			for (var i = 0; i < data.comments.length; i++) {
		   				var comment = data.comments[i];
		   				var created_at = comment.created_at;
		   				var date = created_at.split('T');
		   				console.log('1');
		   				console.log(comment.comment_name);

		   				var commenthtml = '<div class="col-lg-12" style="background-color: #5bc0de; height: 100px; border-radius: 10px; padding:24px; color:#04426e; margin-bottom: 24px"><div class="row"><div class="col-lg">';
		   				commenthtml += 'Commented By: '+ comment.comment_name +' | <small>'+date[0]+'</small></div></div><br><div class="row"><div class="col-lg" style="margin-left:24px; margin-top:10px;margin-bottom:50px">';
		   				commenthtml += ''+comment.comment_content+'</div></div></div><br>';
		   				$('#commentContainer').append(commenthtml);
		   			}
		   		}

		    },
		    error: function(){
		    	console.log('AJAX error');
		    }
		});

	});



});