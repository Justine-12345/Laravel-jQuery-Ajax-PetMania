<div id="AdoptedAnimalsContainer">

<div class="alert alert-primary" role="alert" style="width: 80%; margin: auto;margin-top: 10px; text-align: center; font-size: 30px; background-color: #00abed; border: none; color: white;">
  Adopted Animals
</div>


@if($message = Session::get('success') )
<br>
<div class="alert alert-primary" role="alert" style="margin:auto;background: #5acdfa; margin-right: 135px; margin-left:135px; color: white;"><b>{{$message}}</b></div>
@endif

<div class="container" style="margin-top: 20px">


{{-- <form id="adoptableSearchBox" method="post" action="#">
	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">
	<div class="col-md-11" style="display: inline-block;">
 {!!  Form::text('search',$value = null,array('class' => 'form-control', 'id' => 'adoptableSearch',  'placeholder' => 'Search Adoptable Animals Here...', 'style'=>'margin-top:5px')) !!}
    </div>
    <div class="col-md" style="display: inline-block;">
	      <div style="font-size: 15px">
 {!! Form::submit('Search', ['class' => 'btn btn-lg btn-info pull-right', 'style' => 'font-size:13px; border-radius:20px'] ) !!}
      </div>  
  </div>
</div>
</form> --}}
	
	{{-- 	<div class="row">
		@foreach($animals as $animal)

				@if($animal->adopter_id == "")

				   @php
				    	$i = 0;
				    	foreach ($diseases as $disease) {
				    		if($animal->id == $disease->animal_id){
				    			$i++;
				    		}
				    	}
				    @endphp				
				    @if($i <= 0)
				    <div class="col-md ">
						<div class="card" style="width: 18rem; margin-top: 20px">
				  <img src="{{ asset($animal->animal_picture) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 250px; object-position: center;">
				  <div style="border: 1px solid lightgray; padding: 10px">
				    <h5 class="card-title">Name: {{ $animal->animal_name }}</h5>
				    <p class="card-text" style="font-size: 12px">
				    	Type: {{ $animal->category_name }}<br>
				    	Breed: {{ $animal->animal_breed }}<br>
				    	Age: {{ $animal->animal_age }}<br>
				    	Gender: {{ $animal->animal_gender }}<br>
				    	Health: {{ $animal->animal_health }}<br>
				    	<hr>
				    	Rescuer: {{ $animal->rescuer_fname }} {{ $animal->rescuer_lname }}<br>
				    	<hr>
				     <a href="{{ route('adopting', $animal->id) }}" class="btn btn-success btn-lg" tabindex="-1" role="button" style="font-size: 15px">Adopt Me!</a>
				    </p>

				    	 </div>
				      </div>
				     </div> 
				    @endif
				@endif
			@endforeach


		</div> --}}



		
		<div class="row" id="adoptedRow">
		{{-- Card Start --}}
		 {{--  <div class="col-md-3" >
		    <div class="thumbnail">
		    <a href=""> 
		      <img id="adoptableAnimalPicture" src="" class="card-img-top" alt="Animal Picture" style="height: 30vh; width: 100%; object-fit: cover;">
		    </a>
		      <div class="caption">
		        <h3></h3>
		        <ul style="list-style:none;" id="adoptableAnimalDetail">
		     			<li>Name:</li>
		        	    <li>Type:</li>
				    	<li>Breed:</li>
				    	<li>Age:</li>
				    	<li>Gender:</li>
				    	<li>Health:</li>
				    	<hr>
				    	<li>Rescuer:</li>
				    	<hr>
		        </ul>
		        <p>
             <button class="btn btn-primary" class="adoptMeBtn">Adopt Me</button>
		        </p>
		      </div>
		    </div>
		  </div> --}}
		  {{-- Card End --}}

		</div>
	








</div>

</div>