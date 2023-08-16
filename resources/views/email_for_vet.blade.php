<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body style="background-color: #bde5f1; text-align: center;">
<h3 style="color: #2d606f">New Animal Rescued</h3>
<b>
<p style="color: #2d606f">Good Day <b>{{ucwords($vet->user_fname)}}</b>!!!, this letter was sent to let you know that there is new rescued animals. Information of new rescued animals are provided below </p>
<hr>
{{-- <h4>Animal Info</h4> --}}
<ul style="list-style: none; color: #2d606f">
	<img src="{{ $message->embed($animal->animal_picture) }}" style="width:200px; height:200px; object-fit: cover;" >
	<li style="margin-bottom: 5px;">Animal Name       : <b>{{$animal->animal_name}}</b></li>
	<li style="margin-bottom: 5px;">Animal Type       : <b>{{$animal->category->category_name}}</b></li>
	<li style="margin-bottom: 5px;">Animal Breed      : <b>{{$animal->animal_breed}}</b></li>
	<li style="margin-bottom: 5px;">Animal Gender     : <b>{{$animal->animal_gender}}</b></li>
	<li style="margin-bottom: 5px;">Animal Age        : <b>{{$animal->animal_age}}</b></li>
	<li style="margin-bottom: 5px;">Animal Health     : <b>{{$animal->animal_health}}</b></li>
	<li style="margin-bottom: 5px;">Disease    : <b>
	@foreach($animal->diseases as $disease)
		{{$disease->disease_name." "}}
	@endforeach

	</b></li> 
</ul>
</b>
</body>
</html>