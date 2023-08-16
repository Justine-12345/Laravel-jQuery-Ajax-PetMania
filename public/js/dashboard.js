$('#dashboardNav').click(function(){
	// Nav
	$('#newUserNav').click(function(){
		$('.pages').hide();
		$('#userPage').show('400');
	});

	$('#dashboardNav').click(function(){
		$('.pages').hide();
		$('#dashboardPage').show('400');
	});

	$('#animalNav2, #animalVetNav').click(function(){
		$('.pages').hide();
		$('#animalPage').show('400');
	});

	$('#resuersNav').click(function(){
		$('.pages').hide();
		$('#rescuerPage').show('400');
	});

	$('#adoptersNav').click(function(){
		$('.pages').hide();
		$('#adopterPage').show('400');
	});

	$('#veterinariansNav').click(function(){
		$('.pages').hide();
		$('#veterinarianPage').show('400');
	});

	$('#diseasesNav').click(function(){
		$('.pages').hide();
		$('#diseasePage').show('400');
	});


	// Date Picker For Adopter Chart
	$( "#datepickerAdoptedStart" ).datepicker({
	  dateFormat: "yy-mm-dd"
	});
	$( "#datepickerAdoptedEnd" ).datepicker({
	  dateFormat: "yy-mm-dd"
	});

	// Date Picker For Rescued Chart
	$( "#datepickerRescuedStart" ).datepicker({
	  dateFormat: "yy-mm-dd"
	});
	$( "#datepickerRescuedEnd" ).datepicker({
	  dateFormat: "yy-mm-dd"
	});

	// Date Picker Hide



		var rescuedMonth = new Array();
		var rescuedCount = new Array();
		var adoptedMonth = new Array();
		var adoptedCount = new Array();


		// adopted per Month
		const ctx = document.getElementById('myChart').getContext('2d');
				const myChart = new Chart(ctx, {
				    type: 'bar',
				    data: {
				        labels: adoptedMonth,
				        datasets: [{
				            label: 'Adopted Animals Per Month',
				            data:adoptedCount,
				            backgroundColor: [
				                'rgba(255, 99, 132, 0.2)',
				                'rgba(54, 162, 235, 0.2)',
				                'rgba(255, 206, 86, 0.2)',
				                'rgba(75, 192, 192, 0.2)',
				                'rgba(153, 102, 255, 0.2)',
				                'rgba(255, 159, 64, 0.2)'
				            ],
				            borderColor: [
				                'rgba(255, 99, 132, 1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 206, 86, 1)',
				                'rgba(75, 192, 192, 1)',
				                'rgba(153, 102, 255, 1)',
				                'rgba(255, 159, 64, 1)'
				            ],
				            borderWidth: 1
				        }]
				    },
				    responsive: true,
 				    maintainAspectRatio: true,
				    options: {
				        scales: {
				            yAxes: [{
					            ticks: {
					                beginAtZero: true
					            }
					        }]
				        }
				    }
				});



				const ctx1 = document.getElementById('myChart1').getContext('2d');
				const myChart1 = new Chart(ctx1, {
				    type: 'bar',
				    data: {
				        labels: rescuedMonth,
				        datasets: [{
				            label: 'Rescued Animals Per Month',
				            data:rescuedCount,
				            backgroundColor: [
				                'rgba(255, 99, 132, 0.2)',
				                'rgba(54, 162, 235, 0.2)',
				                'rgba(255, 206, 86, 0.2)',
				                'rgba(75, 192, 192, 0.2)',
				                'rgba(153, 102, 255, 0.2)',
				                'rgba(255, 159, 64, 0.2)'
				            ],
				            borderColor: [
				                'rgba(255, 99, 132, 1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 206, 86, 1)',
				                'rgba(75, 192, 192, 1)',
				                'rgba(153, 102, 255, 1)',
				                'rgba(255, 159, 64, 1)'
				            ],
				            borderWidth: 1
				        }]
				    },
				    responsive: true,
 				    maintainAspectRatio: false,
				    options: {
				        scales: {
				            yAxes: [{
					            ticks: {
					                beginAtZero: true
					            }
					        }]
				        }
				    }
				});




	// Chart Initial Display
	$.ajax({
		type: "GET",
		dataType: 'json',
		url: "/api/dashboard/index/",
		beforeSend: function (xhr) {
	    xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
		}, 
		success: function(data){
				
		    	for (var i = 0; i < data.animalAdopted.length; i++) {
		    		var animalAdopt = data.animalAdopted[i];
		    		adoptedMonth.push(animalAdopt.month);
		    		adoptedCount.push(animalAdopt.adopted);
		    	}

		    	// Put data into chart
		    	myChart.data.labels = adoptedMonth;
				myChart.data.datasets[0].data = adoptedCount;
				myChart.update();
		    	

		    	
		    	for (var i = 0; i < data.animalRescued.length; i++) {
		    		var animalRescue = data.animalRescued[i];
		    		rescuedMonth.push(animalRescue.month);
		    		rescuedCount.push(animalRescue.rescued);
		    	}
		    	// Put data into chart
		    	myChart1.data.labels = rescuedMonth;
				myChart1.data.datasets[0].data = rescuedCount;
				myChart1.update();

		},
		error: function(){}
	});




	$('#datepickerAdoptedApply').click(function(){
		var date = new Array();
		var dateStart = $( "#datepickerAdoptedStart" ).val();
		var dateEnd = $( "#datepickerAdoptedEnd" ).val();
		date.push(dateStart);
		date.push(dateEnd);
		console.log(date);
		if (dateStart > dateEnd) {
			$('#rangeWarning1').hide().html('*Invalid Range Input').fadeIn('slow');
		}else{
			$('#rangeWarning1').html('');
			$('#datePicker1').hide('fast');
			$('#openChart1').html(dateStart+" <b>-</b> "+dateEnd);
				$.ajax({
			type: "GET",
		    dataType: 'json',
		    url: "/api/dashboard/adjustAdopted/"+date, 
		    beforeSend: function (xhr) {
		    xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
			}, 
		    success: function(data){
		    	console.log(data);
		    	var adoptedMonth = new Array();
				var adoptedCount = new Array();
		    	for (var i = 0; i < data.length; i++) {
		    		var animalAdopt = data[i];
		    		// console.log(data);
		    		adoptedMonth.push(animalAdopt.month);
		    		adoptedCount.push(animalAdopt.adopted);
		    	}
		    	myChart.data.labels = adoptedMonth;
				myChart.data.datasets[0].data = adoptedCount;
				// console.log(myChart.data.datasets[0].data);
				myChart.update();

			    },
			    error: function(){}
			});
		}
	});





	$('#datepickerRescuedApply').click(function(){
		var date = new Array();
		var dateStart = $( "#datepickerRescuedStart" ).val();
		var dateEnd = $( "#datepickerRescuedEnd" ).val();
		date.push(dateStart);
		date.push(dateEnd);
		console.log(date);
		if (dateStart > dateEnd) {
			$('#rangeWarning2').hide().html('*Invalid Range Input').fadeIn('slow');
		}else{
			$('#rangeWarning2').html('');
			$('#datePicker2').hide('fast');
			$('#openChart2').html(dateStart+" <b>-</b> "+dateEnd);
				$.ajax({
			type: "GET",
		    dataType: 'json',
		    url: "/api/dashboard/adjustRescued/"+date, 
		    beforeSend: function (xhr) {
		    xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
			}, 
		    success: function(data){
		    	var rescuedMonth = new Array();
				var rescuedCount = new Array();
		    	for (var i = 0; i < data.length; i++) {
		    		var animalRescue = data[i];
		    		console.log(animalRescue);
		    		rescuedMonth.push(animalRescue.month);
		    		rescuedCount.push(animalRescue.rescued);
		    	}
		    	myChart1.data.labels = rescuedMonth;
				myChart1.data.datasets[0].data = rescuedCount;
				// console.log(myChart.data.datasets[0].data);
				myChart1.update();
			    },
			    error: function(){}
			});
		}
	});

});