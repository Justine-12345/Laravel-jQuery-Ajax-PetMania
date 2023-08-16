<div id="showRescuerModalContent">
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

<h3 style="text-align: center; color: #1b293e; margin-top: 20px">
Rescuer Profile
</h3>
</div>

<img id="s_rescuer_image" class="img" alt="rescuer Image" style="width: 40%; height: 300px; border-radius: 150px; object-fit: cover; border: 10px solid  #00abed; position: absolute; left: 30%; right: 5%; margin-top: 70px;">



<div>
	<h2 style="text-align: center;margin-bottom: 0px;" id="s_rescuer_fname">
	</h2>
	<h6 style="text-align: center;">
	<small>The Rescuer</small>
	</h6>
</div>



{{-- ***FOR ADMIN ONLY*** --}}
{{-- <div style="width: 100%; margin-left: 0%;">

@if($rescuer->deleted_at == null)
{!!Form::model($rescuer, ['route' => ['rescuer.destroy',$rescuer->user_id], 'method' => 'DELETE']) !!}

<a href="{{ url()->previous()  }}"><i class="far fa-arrow-alt-circle-left" style="font-weight: 900; color: #00abed; font-size: 20px; padding: 5px; padding-left: 13%; visibility: {{auth()->user()->role != "admin"? "hidden":null}};"></i>
</a>
@if(auth()->user()->role == "admin")
<button type="submit" style="padding: 0px; margin: 0px; border: none;background-color: inherit; float:right; padding-right: 13%;">
    <i class="far fa-trash-alt" style="font-size: 20px; font-weight: 900; color: #00abed; margin: 0px">
    </i>
</button>

@endif

<span style="float: right;padding-right:{{auth()->user()->role == "admin" ?"5px": "14%"}} ">
    <a href="{{ route('rescuer.edit', $rescuer->user_id) }}">
    <i class="far fa-edit" style="font-size: 20px; font-weight: 900; color: #00abed"></i>
    </a>
</span>    


{!! Form::close() !!}
@else
<a href="{{ url()->previous()  }}"><i class="far fa-arrow-alt-circle-left" style="font-weight: 900; color: #00abed; font-size: 20px; padding: 5px; padding-left: 13%"></i>
</a>
<span style="float: right; padding-right: 13%">
@if(auth()->user()->role == "admin")
<a href="{{ route('rescuer.restore',$rescuer->user_id) }}">
        <i class="fas fa-trash-restore" style="font-size: 20px; font-weight: 900; color: #00abed"></i></a>
@endif
@endif
</span>
</div> --}}


<div class="container" style="background-color: #00abed; padding: 0px 0px 5px 0px;font-weight: 500; border-radius: 5px; width: 75%; margin-bottom: 30px; margin-top:400px">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true">Profile</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false">Rescued</a>
  </li>  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show " id="home1" role="tabpanel" aria-labelledby="home-tab">
  {{-- Profile --}}
 <table class="table">
  <thead>
    <tr>
      <th scope="col">FirstName</th>
      <th scope="col"><span class="inRight" id="s_rescuer_fname"></span></th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="col">LastName</th>
      <th scope="col" ><span class="inRight" id="s_rescuer_lname"></span></th>
    </tr>
    <tr>
      <th scope="col">Email</th>
      <th scope="col" ><span class="inRight" id="s_email"></span></th>
    </tr>
     <tr>
      <th scope="col">Age</th>
      <th scope="col" ><span class="inRight" id="s_rescuer_age"></span></th>
    </tr>
    <tr>
      <th scope="col">Gender</th>
      <th scope="col" ><span class="inRight" id="s_rescuer_gender"></span></th>
    </tr>
     <tr>
      <th scope="col">Contact Num</th>
      <th scope="col" ><span class="inRight" id="s_rescuer_contact"></span></th>
    </tr>
     <tr>
      <th scope="col">Address</th>
      <th scope="col" ><span class="inRight" id="s_rescuer_address"></span></th>
    </tr>
      <tr>
      <th scope="col">Record ID</th>
      <th scope="col"><span class="inRight" id="s_rescuer_id"></span></th>
    </tr>
  </tbody>
</table>
</div>
  <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
  {{-- rescued --}}

{{--   @if($rescuer->animals->first() == null)

  <div style="height: 365px; padding-top: 30px">
  	<h3 style="text-align: center; color: #eaedf2">{{ $rescuer->rescuer_fname}} {{ $rescuer->rescuer_lname}} has not yet rescued an animal</h3>
  </div>

  	@else --}}
  <table class="table" >
  <thead id="rescuerAnimals">
{{-- @php
  $i = 1;  
@endphp
@foreach($rescuer->animals as $animal)
  @php
   $categoryName="";
    foreach ($categories as $category) {
       if($category->id == $animal->category_id){
        $categoryName = $category->category_name;
       }
    }
  @endphp --}}
    {{-- <tr> --}}
      {{-- <p scope="col" class="animal"><b> {{ $i++ }}.)</b> Animal Name : {{ $animal->animal_name }}</p>
      <p scope="col" class="animal ai"> Gender : {{ $animal->animal_gender }}</p>
      <p scope="col" class="animal ai"> Breed : {{ $animal->animal_health }}</p>
      <p scope="col" class="animal ai"> Age : {{ $animal->animal_age }}</p>
      <p scope="col" class="animal ai"> Health Status : {{ $animal->animal_health }}</p> --}}
    {{-- </tr> --}}
    <hr style="border-top: 2px solid #E2E7E2">
{{-- @endforeach --}}
  </thead>
</table>
{{-- @endif --}}
</div>
</div>
</div>
</div>
