@extends('layouts.base')
@include('layouts.nav')
@section('body')
<div class="alert alert-primary" role="alert" style="width: 80%; margin: auto;margin-top: 10px; text-align: center; font-size: 30px; background-color: #00abed; border: none; color: white;">
  List of All Animals
</div>


@if($message = Session::get('success') )

<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 80%; margin: auto; margin-top: 30px">
  <strong>{{ $message }} <i class="fas fa-check" style="color: green"></i></strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="container" style="margin-top: 20px">
{!!Form::open(['route' => 'search']) !!}

<div class="row">
	<div class="col-md-11" style="display: inline-block;">
 {!!  Form::text('search',$value = null,array('class' => 'form-control', 'id' => 'disease_name',  'placeholder' => 'Search Animals Here...')) !!}
    </div>
    <div class="col-md" style="display: inline-block;">
	      <div style="font-size: 15px">
 {!! Form::submit('Search', ['class' => 'btn btn-lg btn-info pull-right', 'style' => 'font-size:13px'] ) !!}
      </div>  
  </div>
	{!! Form::close() !!}
</div>
		<div class="row">
			@foreach($animals as $animal)
		  <div class="col-md-3" >
		    <div class="thumbnail">
		    	<a href="{{route('landing.show',$animal->id)}}">
		      <img src="{{$animal->animal_picture != null? asset($animal->animal_picture): url('https://i.pinimg.com/474x/d6/4e/97/d64e9765deca662e8fa07d2cfdb67f7c.jpg') }}" class="card-img-top" alt="{{$animal->animal_picture}}" style="height: 30vh; width: 100%; object-fit: cover;">
		      </a>
		      <div class="caption">
		        <h3>{{$animal->animal_name}}</h3>
		        <p>
		        	Type: {{ $animal->category->category_name }}<br>
				    	Breed: {{ $animal->animal_breed }}<br>
				    	Age: {{ $animal->animal_age }}<br>
				    	Gender: {{ $animal->animal_gender }}<br>
				    	Health: {{ $animal->animal_health }}<br>
				    	<hr>
				    	Rescuer: {{ $animal->rescuers->first()->rescuer_fname }} {{ $animal->rescuers->first()->rescuer_lname }}<br>
				    	<hr>
		        </p>
		        @if($animal->adopters->first() == null && $animal->diseases->first() == null)

				        @if(!Auth::check())
				        <p>
				        	<form method="POST" action="{{ route('adopt') }}">
									  @csrf
									    {!!  Form::hidden('animal_id', $animal->id) !!}
									    <button class="btn btn-primary">Adopt Me</button>
									</form>
				        </p>
				        @endif

				        @if(Auth::check() && auth()->user()->role == "adopter")
				        <p>
				        	<form method="POST" action="{{ route('adopt') }}">
								  @csrf
								    {!!  Form::hidden('animal_id', $animal->id) !!}
								    <button class="btn btn-primary">Adopt Me</button>
								</form>
				        </p>
				        @endif

				        @if(Auth::check() && auth()->user()->role != "adopter")
				        <h2><i style="color:green"> Not Adopted</i></h2>
				        @endif
		        @endif
		        @if($animal->adopters->first() != null || $animal->diseases->first() != null)
		        	<h2>
		        		@if($animal->adopters->first() != null)
		        			 @if($animal->adopters->first()->pivot->status === 0)
		        				<i style="color:orange;"> *Requesting</i>
		        			 @else
		        			  <i style="color:red"> *Adopted</i>
		        			 @endif
		        		@else
		        			<i style="color: green">Healing</i>
		        		@endif

		        	</h2>

		        @endif
		      </div>
		    </div>
		  </div>
		  	@endforeach
		</div>
	








</div>



@stop