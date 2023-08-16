@extends('layouts.base')
@include('layouts.nav')
@section('body')
<style type="text/css">
    .inRight{
      float: right;
      font-size: 25px;
      color: #eaedf2;
    }
    th{
      color: #eaedf2;
    }
    .animal{
      color: #eaedf2;
      padding-left: 20px;
      font-weight: 700;
    }
    .ai{
      padding-left: 40px
    }

</style>
<div>

<h2 style="text-align:center;">Requesting For Adoptation</h2>
@if($message = Session::get('success') )
<br>
<div class="alert alert-primary" role="alert" style="margin:auto;background: #5acdfa; margin-right: 135px; margin-left:135px; color: white;"><b>{{$message}}</b></div>
<br>
@endif

 <div class="row" style="width:100%;">
@foreach($adopters as $adopter)

  @foreach($adopter->animals as $animal)

   <div class="row" style="background-color:#00abed; color:white; margin-bottom: 30px; width: 40%; margin:auto; margin-bottom:30px; padding: 24px;border-radius: 10px;">
    <div class="col-lg-4 text-center" >
         <a href="{{route('animal.show',$animal->id)}}">
              <img src="{{$animal->animal_picture != null? asset($animal->animal_picture): url('https://i.pinimg.com/474x/d6/4e/97/d64e9765deca662e8fa07d2cfdb67f7c.jpg') }}" class="card-img-top" alt="{{$animal->animal_picture}}" style="height: 20vh; width: 100%; object-fit: cover; border-radius: 50%; border:5px solid white">
          </a>

          <b>{{$animal->animal_name}}</b>
      
    </div> 
    <div class="col-lg text-left" >
         <p>Adopter: <b><a href="{{route('adopter.show',$adopter->user_id)}}" style="color:white;">{{$adopter->adopter_fname}} {{$adopter->adopter_fname}}</a></b></p>
         <p>Age: <b>{{$animal->animal_age}}</b></p>
         <p>Gender: <b>{{$animal->animal_gender}}</b></p>
         <p>Breed: <b>{{$animal->animal_breed}}</b></p>
         <p>Health: <b>{{$animal->animal_health}}</b></p> 
         <p>Adopting Status: <b>{{$animal->pivot->status == 0? "Pending": "Adopted"}}</b></p>
         <p>
          @if($animal->pivot->status == 0)
            <a href="{{route('adopt.confirm',['animal_id'=>$animal->id, 'adopter_id' => $adopter->id])}}"><button class="btn btn-primary" style="float:right;">Confirm</button></a>
          @else
            <b style="float:right"><small style="font-weight: 300"><i>{{date_format(date_create($animal->pivot->created_at),"M/d/Y h:i:s a");}}</i></small> | Adopted </b>
          @endif
         </p>
    </div> 
  </div>
  
  @endforeach
@endforeach
  </div>

</div>
@stop