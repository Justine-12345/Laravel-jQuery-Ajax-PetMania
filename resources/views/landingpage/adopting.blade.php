@extends('layouts.base')
@include('layouts.nav')
@section('body')

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" style="background-color: #00abed;margin-top: 60px; padding:24px; color:white">
                <div class="card-header">{{ __('Adopting') }}</div>

                <div class="card-body">
                  @if (session('status')) 
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('adopt') }}">
                        @csrf

{!!  Form::hidden('animal_id', $animal->id) !!}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Qualified Adopters List') }}</label>

                            <div class="col-md-6">
                              
								    {!!  Form::select('adopter_id',$adopters, null, ['class' => 'form-control', 'id' => 'adopter_id']) !!} 
							 
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Adopt Now') }}
                                </button>
                                 <a href="{{ route('message.create') }}" class="btn btn-success">
                                    {{ __('Message Admin') }}
                                </a>
                                <br>
                            <small><b style="color: darkgreen">If you didn't find your name or your are interested to adopt out animals just click "Message Admin"</b></small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 --}}

<style type="text/css">
    .inRight{
      float: right;
      font-size: 25px;
      color: #eaedf2;
    }
    th{
      color: #eaedf2;
    }
</style>


<div>

<div>
<h3 style="text-align: center; color: #1b293e; margin-top: 20px">
Animal Profile
</h3>
</div>

@if(isset($animal->animal_picture))
<div style="width: 300px; margin: auto; margin-top: 30px">
<img src="{{ asset($animal->animal_picture)}}" class="img" alt="animal Image" style="width: 100%; height: 300px; border-radius: 150px; object-fit: cover; border: 10px solid  #00abed;" >
</div>
@else
<div style="width: 300px; margin: auto; margin-top: 30px">
<img src="{{ url('https://cdn0.iconfinder.com/data/icons/characters-2-2-flat/223/wolf-dog-animal-character-avatar-smileface-profile-512.png') }}" style="width: 100%; height: 300px; border-radius: 150px; border: 10px solid  #00abed;" >
</div>
@endif

<div>
  <h2 style="text-align: center;margin-bottom: 0px;">{{ $animal->animal_name}} 

  </h2>
  <h6 style="text-align: center;">
  <small>The {{ $animal->category->category_name}}</small>
  </h6>


</div>
<div class="text-center" style="display: block; border: 0px solid white;">
  <form method="POST" action="{{ route('adopt') }}">
@csrf
{!!  Form::hidden('animal_id', $animal->id) !!}
 <button type="submit" class="btn btn-primary">
                                    {{ __('Adopt Now') }}
                                </button>
</form>
</div>


<div style="width: 100%; margin-left: 0%;">

  
  {{-- ***FOR ADMIN ONLY*** --}}
@if($animal->deleted_at == null)
{!!Form::model($animal, ['route' => ['animal.destroy',$animal->id], 'method' => 'DELETE']) !!}
<a href="{{ url()->previous() }}"><i class="far fa-arrow-alt-circle-left" style="font-weight: 900; color:  #00abed; font-size: 20px; padding: 5px; padding-left: 13%"></i>
</a>

@if(auth()->user()->role == "admin")
<span style="float: right; padding-right:13%">
    <a href="{{ route('animal.edit', $animal->id) }}">
    <i class="far fa-edit" style="font-size: 20px; font-weight: 900; color:  #00abed"></i>
    </a>
<button type="submit" style="padding: 0px; margin: 0px; border: none;background-color: inherit;">
    <i class="far fa-trash-alt" style="font-size: 20px; font-weight: 900; color:  #00abed; margin: 0px">
    </i>
</button>
@endif

</span>
{!! Form::close() !!}
@else
<a href="{{ route('animal.index') }}"><i class="far fa-arrow-alt-circle-left" style="font-weight: 900; color:  #00abed; font-size: 20px; padding: 5px; padding-left: 13%"></i>
</a>
<span style="float: right; padding-right: 13%">
  @if(auth()->user()->role == "admin")
<a href="{{ route('animal.restore',$animal->id) }}">
        <i class="fas fa-trash-restore" style="font-size: 20px; font-weight: 900; color:  #00abed"></i></a>
  @endif
@endif
</span>
</div>

<div class="container" style="background-color: #00abed; padding: 0px 0px 5px 0px;font-weight: 500; border-radius: 5px; width: 75%; margin-bottom: 30px">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Adopter</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Illness</a>
  </li>
   <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#vet" role="tab" aria-controls="vet" aria-selected="false">Assigned Vet</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tabb" data-toggle="tab" href="#contactt" role="tab" aria-controls="contact" aria-selected="false">Rescuer</a>
  </li>   
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  {{-- Profile --}}
 <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col"><span class="inRight">{{ $animal->animal_name}}</span></th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="col">Type</th>
      <th scope="col" ><span class="inRight">{{ $animal->category->category_name}}</span></th>
    </tr>
     <tr>
      <th scope="col">Age</th>
      <th scope="col" ><span class="inRight">{{ $animal->animal_age}}</span></th>
    </tr>
    <tr>
      <th scope="col">Gender</th>
      <th scope="col" ><span class="inRight">{{ $animal->animal_gender}}</span></th>
    </tr>
     <tr>
      <th scope="col">Breed</th>
      <th scope="col" ><span class="inRight">{{ $animal->animal_breed}}</span></th>
    </tr>
      <tr>
      <th scope="col">Health</th>
      <th scope="col"><span class="inRight">{{ $animal->animal_health}}</span></th>
    </tr>
      <tr>
      <th scope="col">Record ID</th>
      <th scope="col"><span class="inRight">{{ $animal->id}}</span></th>
    </tr>
  </tbody>
</table>

  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  {{-- Adopter --}}

  @if($animal->adopters->first() == null)
  <div style="height: 365px; padding-top: 30px">
    <h3 style="text-align: center; color: #eaedf2">{{ $animal->animal_name}} is not adopted yet!!!</h3>
  </div>
    @else
  <table class="table" >
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col"><span class="inRight">{{ $animal->adopters->first()->adopter_fname}}</span></th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="col">Last Type</th>
      <th scope="col" ><span class="inRight">{{ $animal->adopters->first()->adopter_lname}}</span></th>
    </tr>
     <tr>
      <th scope="col">Contact Number</th>
      <th scope="col" ><span class="inRight">{{ $animal->adopters->first()->adopter_contact}}</span></th>
    </tr>
     <tr>
      <th scope="col">Arress</th>
      <th scope="col" ><span class="inRight">{{ $animal->adopters->first()->adopter_address}}</span></th>
    </tr>
      <tr>
      <th scope="col">Record ID</th>
      <th scope="col"><span class="inRight">{{ $animal->adopters->first()->id}}</span></th>
    </tr>
  </tbody>
</table>
@endif
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  {{-- Disease --}}

    @if($animal->diseases->first() == null)
  <div style="height: 365px; padding-top: 30px">
    <h3 style="text-align: center; color: #eaedf2">{{ $animal->animal_name}} is free from any illness, yehey!!!</h3>
  </div>
    @else
  <table class="table">
  <thead>
    @php
      $i = 0;
    @endphp
    @foreach($animal->diseases as $disease)
    @php
      $i++;
    @endphp
    <tr>
      <th scope="col" style="width: 30%">{{ $i }}. {{ $disease->disease_name }}</th>
      <th scope="col"><span style="font-size: 20px"> {{ $disease->disease_desc }}</span></th>
    </tr>
    @endforeach

  </thead>
</table>
@endif

</div>


  <div class="tab-pane fade" id="vet" role="tabpanel" aria-labelledby="contact-tabb">
  {{-- vet --}}
  @if($animal->veterenarians->first() == null)
  <div style="height: 365px; padding-top: 30px">
    <h3 style="text-align: center; color: #eaedf2">{{ $animal->animal_name}} doesn't have a veterinarian </h3>
  </div>
    @else
   <table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col"><span class="inRight">{{ $animal->veterenarians->first()->veterinarian_fname}}</span></th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="col">Last Name</th>
      <th scope="col" ><span class="inRight">{{ $animal->veterenarians->first()->veterinarian_lname}}</span></th>
    </tr>
     <tr>
      <th scope="col">Age</th>
      <th scope="col" ><span class="inRight">{{ $animal->veterenarians->first()->veterinarian_age}}</span></th>
    </tr>
      <tr>
      <th scope="col">Contact number</th>
      <th scope="col"><span class="inRight">{{ $animal->veterenarians->first()->veterinarian_contact}}</span></th>
    </tr>
      <tr>
      <th scope="col">Address</th>
      <th scope="col"><span class="inRight">{{ $animal->veterenarians->first()->veterinarian_address}}</span></th>
    </tr>
     <tr>
      <th scope="col">Record ID</th>
      <th scope="col"><span class="inRight">{{ $animal->veterenarians->first()->id}}</span></th>
    </tr>
  </tbody>
</table>
@endif
</div>




  <div class="tab-pane fade" id="contactt" role="tabpanel" aria-labelledby="contact-tabb">
  {{-- Rescuer --}}
   <table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col"><span class="inRight">{{ $animal->rescuers->first()->rescuer_fname}}</span></th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="col">Last Name</th>
      <th scope="col" ><span class="inRight">{{ $animal->rescuers->first()->rescuer_lname}}</span></th>
    </tr>
     <tr>
      <th scope="col">Age</th>
      <th scope="col" ><span class="inRight">{{ $animal->rescuers->first()->rescuer_age}}</span></th>
    </tr>
      <tr>
      <th scope="col">Contact number</th>
      <th scope="col"><span class="inRight">{{ $animal->rescuers->first()->rescuer_contact}}</span></th>
    </tr>
      <tr>
      <th scope="col">Address</th>
      <th scope="col"><span class="inRight">{{ $animal->rescuers->first()->rescuer_address}}</span></th>
    </tr>
     <tr>
      <th scope="col">Record ID</th>
      <th scope="col"><span class="inRight">{{ $animal->rescuers->first()->id}}</span></th>
    </tr>
  </tbody>
</table>

</div>
</div>
</div>
    
</div>


@stop