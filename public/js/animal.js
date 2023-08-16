var animalTablecount = 0;
$('#animalNav2, #animalVetNav').click(function () {






	$('#animalCreateform #addNewRescuer').hide();
	$('#animalCreateform #addNewVeterinarian').hide();


	$('#newRescuer').change(function () {

		var stat = $(this).prop('checked');
		if (stat == true) {
			$('#animalCreateform #addNewRescuer').slideDown(400);
			$('#animalCreateform #existingRescuer').hide(400);

		} else {
			$('#animalCreateform #addNewRescuer').slideUp(400);
			$('#animalCreateform #existingRescuer').show(400);
		}
	});

	$('#newVeterinarian').change(function () {

		var stat = $(this).prop('checked');
		if (stat == true) {
			$('#animalCreateform #addNewVeterinarian').slideDown(400);
			$('#animalCreateform #existingVeterinarian').hide(400);

		} else {
			$('#animalCreateform #addNewVeterinarian').slideUp(400);
			$('#animalCreateform #existingVeterinarian').show(400);
		}
	});


	$('#rescuer_id').change(function () {
		var stat = $(this).val();
		if (stat == "") {
			$('#newRescuer').prop('disabled', false);
		} else {
			$('#newRescuer').prop('disabled', true);
		}

	});


	$('#veterinarian_id').change(function () {
		var stat = $(this).val();
		if (stat == "") {
			$('#newVeterinarian').prop('disabled', false);
		} else {
			$('#newVeterinarian').prop('disabled', true);
		}

	});









	if (sessionStorage.getItem('role') == 'veterinarian') {
		$('.pages').hide();
		$('#animalPage').show(400);
	}

	//Animals DataTable
	if (animalTablecount <= 0) {
		animalTablecount++;

		$('#animalTable').DataTable({
			ajax: {
				url: "/api/animal",
				beforeSend: function (xhr) {
					xhr.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token') + '');
				},
				// dataSrc: "",
			},
			// select: true,
			dom: 'Bfrtip',
			buttons: [
				{
					text: 'Add Animal',
					className: 'btn btn-primary',
					action: function (e, dt, node, config) {
						// alert( 'Button activated' )
						$("#animalCreateform").trigger("reset");
						$('#disease_id').html('');
						$('#animalCreateModal').modal('show');
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


			], columns: [
				{ "data": "animal_id" },
				{ "data": "animal_name" },
				{ "data": "category_name" },
				{ "data": "animal_gender" },
				{ "data": "animal_age" },
				{ "data": "animal_breed" },
				{ "data": "animal_health" },
				{
					"data": null, render: function (data, type, row) {
						return "<a href='#' data-bs-toggle='modal' data-bs-target='#animalShowModal' class='animalShowBtn' data-id=" + data.animal_id + "><i class='far fa-eye' aria-hidden='true' style='font-size:24px'  data-id=" + data.animal_id + "></i></a><a href='#' data-bs-toggle='modal' data-bs-target='#animalEditModal' class='animalEditBtn' data-id=" + data.animal_id + "><i class='fa fa-pencil-square-o' aria-hidden='true' data-id=" + data.animal_id + " style='font-size:24px' ></i></a><a class='animalDeletebtn' data-id=" + data.animal_id + "><i  class='animalDeletebtn2 fa fa-trash-o' style='font-size:24px; color:red' ></i></a>";
					}
				}
			],
		});


		//Modal close
		$('.closeModal').click(function () {

			$('#animalCreateModal').modal('hide');
			$('#animalShowModal').modal('hide');
			$('#animalEditModal').modal('hide');
		});


		//Animals Create Modal 
		$('#animalCreateModal').on('show.bs.modal', function (e) {
			$.ajax({
				type: "GET",
				dataType: 'json',
				url: "/api/animal/create",
				beforeSend: function (xhr) {
					xhr.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token') + '');
				},
				success: function (data) {
					console.log(data);

					$('#addAnimalModalContent #category_id').html('');
					$('#addAnimalModalContent #rescuer_id').html('');
					$('#addAnimalModalContent #veterinarian_id').html('');
					$('#addAnimalModalContent #veterinarian_id').html('');

					$.each(data.categories, function (key, value) {
						var option = $('<option value="' + key + '" label="' + value + '">');
						$('#category_id').append(option);
					});


					$.each(data.rescuers, function (key, value) {
						var option = $('<option value="' + key + '">' + value + '</option>');
						$('#rescuer_id').append(option);
					});
					var blankResOption = $('<option value="" selected>---None---</option>');
					$('#rescuer_id').prepend(blankResOption);

					$.each(data.veterinarians, function (key, value) {
						var option = $('<option value="' + key + '">' + value + '</option>');
						$('#veterinarian_id').append(option);
					});
					var blankVetOption = $('<option value="" selected>---None---</option>');
					$('#veterinarian_id').prepend(blankVetOption);

					$.each(data.diseases, function (key, value) {
						var option = $('<input type="checkbox" name="disease_id[]" value="' + key + '"> <label style="margin-right:20px">' + value + '</label><br>');
						$('#disease_id').append(option);
					});



				},
				error: function () {
					console.log('AJAX load did not work');
					alert("error");
				}
			});
		});


		//Animals Form Validation 
		var animalAddform = $('#animalCreateform').validate({
			rules: {
				animal_name: { required: true, maxlength: 12 },
				animal_gender: { required: true },
				animal_age: { required: true, number: true },
				animal_breed: { required: true },
				category_id: { required: true, number: true },
				// rescuer_id:{required:true, number:true},
				// veterinarian_id:{required:true, number:true},
				disease_id: { required: true, number: true },
				animal_pic: { required: true }
			},

			messages: {
				animal_name: { required: 'Animal name is required' },
				animal_gender: { required: 'Animal gender is required' },
				animal_age: { required: 'Animal age is required' },
				animal_breed: { required: 'Animal breed is required' }
			},


			errorPlacement: function (error, element) {

				if (element.is(':radio')) {
					error.insertAfter($('input:radio:last'))
				}
				else if (element.is(':checkbox')) {
					error.insertAfter($('input:checkbox:last'))
				}
				else { error.insertAfter(element) }
			}
		});


		//Animals Store
		$('#animalCreateSubmit').on('click', function (e) {
			e.preventDefault();
			animalAddform.form();
			var data = $('#animalCreateform')[0];
			let formData = new FormData($('#animalCreateform')[0]);

			$.ajax({
				type: "POST",
				url: "/api/animal",
				beforeSend: function (xhr) {
					xhr.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token') + '');
				},
				data: formData,
				contentType: false,
				processData: false,
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				dataType: "json",
				success: function (data) {
					console.log(data);
					$("#animalCreateModal").modal("hide");
					var $animalTable = $('#animalTable').DataTable();
					$animalTable.row.add(data).draw(false);
					$('#animalCreateform #addNewRescuer').hide();
					$('#animalCreateform #addNewVeterinarian').hide();
					$('#animalCreateform #existingRescuer').show(400);
					$('#animalCreateform #existingVeterinarian').show(400);
					$('#newRescuer').prop('disabled', false);
					$('#newVeterinarian').prop('disabled', false);
				},
				error: function (error) {
					console.log('error');
				}
			});
		});

		//Animals Show
		$('#animalTable').on('click', '.animalShowBtn', function (e) {
			$('#showAnimalModalContent #s_diseases').html('');
			$('#showAnimalModalContent #s_adopter_fname').html('');
			$('#showAnimalModalContent #s_adopter_lname').html('');
			$('#showAnimalModalContent #s_adopter_contact').html('');
			$('#showAnimalModalContent #s_adopter_address').html('');
			$('#showAnimalModalContent #s_adopter_id').html('');
			e.preventDefault();
			$('#animalShowModal').modal('show');
			var id = $(this).attr('data-id');
			$.ajax({
				type: "GET",
				dataType: 'json',
				url: "/api/animal/" + id,
				beforeSend: function (xhr) {
					xhr.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token') + '');
				},
				success: function (data) {
					console.log("data.animal_picture", data.animal_picture)
					$('#showAnimalModalContent #s_animal_image').prop('src', data.animal_picture);
					$('#showAnimalModalContent #s_animal_name').html(data.animal_name);
					$('#showAnimalModalContent #s_animal_category').html("The " + data.category.category_name);
					$('#showAnimalModalContent #s_animal_age').html(data.animal_age);
					$('#showAnimalModalContent #s_animal_gender').html(data.animal_gender);
					$('#showAnimalModalContent #s_animal_breed').html(data.animal_breed);
					$('#showAnimalModalContent #s_animal_health').html(data.animal_health);
					$('#showAnimalModalContent #s_animal_id').html(data.id);

					if (data.adopters[0]) {
						$('#showAnimalModalContent #s_adopter_fname').html(data.adopters[0].adopter_fname);
						$('#showAnimalModalContent #s_adopter_lname').html(data.adopters[0].adopter_lname);
						$('#showAnimalModalContent #s_adopter_contact').html(data.adopters[0].adopter_contact);
						$('#showAnimalModalContent #s_adopter_address').html(data.adopters[0].adopter_address);
						$('#showAnimalModalContent #s_adopter_id').html(data.adopters[0].id);
					}

					if (data.diseases[0]) {

						for (var i = 0; i < data.diseases.length; i++) {
							var disease = data.diseases[i];
							console.log(disease.disease_name);
							// var count = i + 1;
							var desc = '<tr style="border-top:1px solid #9acee2"><th scope="col" style="width: 30%">' + disease.disease_name + '</th>';
							desc += '<th scope="col"><span style="font-size: 20px; ">' + disease.disease_desc + '</span></th></tr>';
							$('#showAnimalModalContent #s_diseases').append(desc);
						}
					}

					if (data.veterenarians[0]) {
						$('#showAnimalModalContent #s_veterinarian_fname').html(data.veterenarians[0].veterinarian_fname);
						$('#showAnimalModalContent #s_veterinarian_lname').html(data.veterenarians[0].veterinarian_lname);
						$('#showAnimalModalContent #s_veterinarian_age').html(data.veterenarians[0].veterinarian_age);
						$('#showAnimalModalContent #s_veterinarian_contact').html(data.veterenarians[0].veterinarian_contact);
						$('#showAnimalModalContent #s_veterinarian_address').html(data.veterenarians[0].veterinarian_address);
						$('#showAnimalModalContent #s_veterinarian_id').html(data.veterenarians[0].id);
					}

					if (data.rescuers[0]) {
						$('#showAnimalModalContent #s_rescuer_fname').html(data.rescuers[0].rescuer_fname);
						$('#showAnimalModalContent #s_rescuer_lname').html(data.rescuers[0].rescuer_lname);
						$('#showAnimalModalContent #s_rescuer_age').html(data.rescuers[0].rescuer_age);
						$('#showAnimalModalContent #s_rescuer_contact').html(data.rescuers[0].rescuer_contact);
						$('#showAnimalModalContent #s_rescuer_address').html(data.rescuers[0].rescuer_address);
						$('#showAnimalModalContent #s_rescuer_id').html(data.rescuers[0].id);
					}

				},
				error: function () {
					console.log('AJAX error');
				}
			});

		});

		//Animals Clear Show And Edit Modals
		$('#animalShowModal, #animalEditform ').on('hide.bs.modal', function () {
			$('#showAnimalModalContent #s_animal_image').prop('src', '');
			$('#showAnimalModalContent #s_animal_name').html("");
			$('#showAnimalModalContent #s_animal_category').html("");
			$('#showAnimalModalContent #s_animal_age').html("");
			$('#showAnimalModalContent #s_animal_gender').html("");
			$('#showAnimalModalContent #s_animal_breed').html("");
			$('#showAnimalModalContent #s_animal_health').html("");
			$('#showAnimalModalContent #s_animal_id').html("");

			$('#showAnimalModalContent #s_adopter_fname').html("");
			$('#showAnimalModalContent #s_adopter_lname').html("");
			$('#showAnimalModalContent #s_adopter_contact').html("");
			$('#showAnimalModalContent #s_adopter_address').html("");
			$('#showAnimalModalContent #s_adopter_id').html("");

			$('#s_diseases').html("");

			$('#showAnimalModalContent #s_veterinarian_fname').html("");
			$('#showAnimalModalContent #s_veterinarian_lname').html("");
			$('#showAnimalModalContent #s_veterinarian_age').html("");
			$('#showAnimalModalContent #s_veterinarian_contact').html("");
			$('#showAnimalModalContent #s_veterinarian_address').html("");
			$('#showAnimalModalContent #s_veterinarian_id').html("");

			$('#showAnimalModalContent #s_rescuer_fname').html("");
			$('#showAnimalModalContent #s_rescuer_lname').html("");
			$('#showAnimalModalContent #s_rescuer_age').html("");
			$('#showAnimalModalContent #s_rescuer_contact').html("");
			$('#showAnimalModalContent #s_rescuer_address').html("");
			$('#showAnimalModalContent #s_rescuer_id').html("");

			//Clear Edit
			$('#animalEditform').get(0).reset();
			$('#editAnimalModalContent #disease_id').html('');

			$('#editAnimalModalContent input[type="checkbox"]').prop('checked', false);
		});



		//Animal Edit
		$('#animalTable').on('click', '.animalEditBtn', function (e) {
			e.preventDefault();
			$('#editAnimalModalContent #disease_id').html('');
			$('#editAnimalModalContent #category_id').html('');
			$('#editAnimalModalContent #rescuer_id').html('');
			$('#editAnimalModalContent #veterinarian_id').html('');
			$('#editAnimalModalContent #animal_image').prop('src', '');
			$('#editAnimalModalContent #adopter_id').html('');
			$('#animalEditModal').modal('show');
			var id = $(this).attr('data-id');
			console.log(id);

			$.ajax({
				type: "GET",
				dataType: 'json',
				url: "/api/animal/" + id + "/edit",
				beforeSend: function (xhr) {
					xhr.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token') + '');
				},
				success: function (data) {
					console.log(data.animal);
					$('#editAnimalModalContent #animal_id').val(data.animal.id);
					$('#editAnimalModalContent #animal_image').prop('src', data.animal.animal_picture);
					$('#editAnimalModalContent #animal_name').val(data.animal.animal_name);
					$('#editAnimalModalContent #animal_age').val(data.animal.animal_age);
					$('#editAnimalModalContent #animal_breed').val(data.animal.animal_breed);

					$.each(data.categories, function (key, value) {
						console.log(key);
						var option = $('<option value="' + key + '">' + value + '</option>');
						$('#editAnimalModalContent #category_id').append(option);
					});
					$('#editAnimalModalContent #category_id').val(data.animal.category_id);


					$.each(data.rescuers, function (key, value) {
						var option = $('<option value="' + key + '">' + value + '</option>');
						$('#editAnimalModalContent #rescuer_id').append(option);
					});
					$('#editAnimalModalContent #rescuer_id').val(data.animal.rescuers[0].id);


					$.each(data.veterinarians, function (key, value) {
						console.log(key);
						var option = $('<option value="' + key + '">' + value + '</option>');
						$('#editAnimalModalContent #veterinarian_id').append(option);
					});
					$('#editAnimalModalContent #veterinarian_id').val(data.animal.veterenarians[0].id);


					$.each(data.adopters, function (key, value) {
						console.log(key);
						var option = $('<option value="' + key + '">' + value + '</option>');
						$('#editAnimalModalContent #adopter_id').append(option);
					});
					var Boption = $('<option value="0">---None---</option>');
					$('#editAnimalModalContent #adopter_id').prepend(Boption);
					if (data.animal.adopters[0]) {
						$('#editAnimalModalContent #adopter_id').val(data.animal.adopters[0].id);
					}
					else {
						$('#editAnimalModalContent #adopter_id').val('');
					}

					console.log(data.animal.diseases[0]);




					$.each(data.diseases, function (key, value) {

						if (data.animal.diseases[0]) {
							var c = 0;
							for (var i = 0; i < data.animal.diseases.length; i++) {
								var disease = data.animal.diseases[i];

								if (disease.id == key) {
									var option = $('<input type="checkbox" name="disease_id[]" value="' + key + '" checked> <label style="margin-right:20px">' + value + '</label><br>');
									$('#editAnimalModalContent #disease_id').append(option);
									c++;
								}
								else {
									var option = $('<input type="checkbox" name="disease_id[]" value="' + key + '"> <label style="margin-right:20px">' + value + '</label><br>');
								}

							}
							if (c <= 0) {
								$('#editAnimalModalContent #disease_id').append(option);
							}

						}
						else {
							var option = $('<input type="checkbox" name="disease_id[]" value="' + key + '"> <label style="margin-right:20px">' + value + '</label><br>');
							$('#editAnimalModalContent #disease_id').append(option);
						}
					});

					$('#editAnimalModalContent input[value="' + data.animal.animal_gender + '"]').prop('checked', true);

				},
				error: function () { }
			});
		});

		//Animal Edit Form Validation
		var animalEditform = $('#animalEditform').validate({
			rules: {
				animal_name: { required: true, maxlength: 12 },
				animal_gender: { required: true },
				animal_age: { required: true, number: true },
				animal_breed: { required: true },
				category_id: { required: true, number: true },
				rescuer_id: { required: true, number: true },
				veterinarian_id: { required: true, number: true },
				disease_id: { required: true, number: true }
			},

			messages: {
				animal_name: { required: 'Animal name is required' },
				animal_gender: { required: 'Animal gender is required' },
				animal_age: { required: 'Animal age is required' },
				animal_breed: { required: 'Animal breed is required' }
			},


			errorPlacement: function (error, element) {
				if (element.is(':radio')) {
					error.insertAfter($('input:radio:last'))
				}
				else if (element.is(':checkbox')) {
					error.insertAfter($('input:checkbox:last'))
				}
				else { error.insertAfter(element) }
			}
		});


		//Animals Update
		$('#animalEditSubmit').click(function (e) {
			e.preventDefault();
			animalEditform.form();

			var id = $('#editAnimalModalContent #animal_id').val();
			console.log(id);

			var data = $('#animalEditform')[0];
			let formData = new FormData($('#animalEditform')[0]);
			formData.append('_method', 'put');
			formData.append('_token', "{{ csrf_token() }}");
			var table = $('#animalTable').DataTable();
			var aRow = $("tr td:contains(" + id + ")").closest('tr');

			$.ajax({
				type: "POST",
				url: "/api/animal/" + id,
				beforeSend: function (xhr) {
					xhr.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token') + '');
				},
				data: formData,
				contentType: false,
				processData: false,
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				dataType: "json",
				success: function (data) {
					console.log(data);
					$('#animalEditModal').each(function () {
						$(this).modal('hide');
					});
					table.row(aRow).data(data).invalidate().draw(false);
				},
				error: function (error) {
					console.log('error');
				}
			});

		});

		//Animlas Delete
		$("body").on("click", ".animalDeletebtn", function (e) {
			console.log('delete');
			e.preventDefault();

			var table = $('#animalTable').DataTable();
			var id = $(this).data('id');
			var $row = $(this).closest('tr');

			bootbox.confirm("Are you sure?", function (result) {
				if (result) {
					if (result) {
						$.ajax({
							type: 'DELETE',
							url: '/api/animal/' + id,
							beforeSend: function (xhr) {
								xhr.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token') + '');
							},
							dataType: "json",
							success: function (data) {
								console.log(data);
								table.row($row).remove().draw(false);
								$row.fadeOut(4000, function () {
									table.row($row).remove().draw(false);
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