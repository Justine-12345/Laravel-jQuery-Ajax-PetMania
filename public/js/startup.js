$(document).ready(function(){
	$('#datePicker1').hide();
	$('#datePicker2').hide();




	// Date Picker Open/Toggle
	$('#openChart1').click(function(){
		$('#datePicker1').toggle("slow");
	})
	$('#openChart2').click(function(){
		$('#datePicker2').toggle("slow");
	})
	
	$('#navForAdmin').hide();
	$('#myProfileNav, #logoutNav').hide();
	$('.pages').hide();
	$('#loginPage').show('slow');
	$('#requestNav1').hide();
	$('#animalVetNav').hide();
	console.log(sessionStorage.getItem('user_id'));


//Temp
	// $('#animalNav2').click();
	// $('#animalPage').show();


	$('#adoptNav').click(function(){
		$('.pages').hide();
		$('#landingPageMain').show(400);
	});

	$('#MainContainer').on('click', '.adoptableAnimalPicture', function(e){
		$('.pages').hide();
		$('#landingPageShow').show(400);
	});

	$('#AdoptedAnimalsContainer').on('click', '.adoptableAnimalPicture', function(e){
		$('.pages').hide();
		$('#landingPageShow').show(400);
	});

	$('#requestNav2').click(function(){
		$('.pages').hide();
		$('#requestPage').show(400);
	});

	$('#adoptedNav').click(function(){
		$('.pages').hide();
		$('#landingPageAdopted').show(400);
	});

	$('#loginNav, #loginToRegister').click(function(){
		$('.pages').hide();
		$('#loginPage').show(400);
	});

	$('#signupNav, #registerBtnLogin').click(function(){
		console.log('signupNav');
		$('.pages').hide();
		$('#registerPage').hide();
		$('#registerPage').show(400);
	});


});