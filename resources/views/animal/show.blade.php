<div id="showAnimalModalContent">

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

<img id="s_animal_image" class="img" alt="animal Image" style="width: 40%; height: 300px; border-radius: 150px; object-fit: cover; border: 10px solid  #00abed; position: absolute; left: 30%; right: 5%; margin-top: 70px;" >

</div>

<div>
	<h2 id="s_animal_name" style="text-align: center;margin-bottom: 0px;">
	</h2>
	<h6 style="text-align: center;">
	<small id="s_animal_category"></small>
	</h6>
</div>

{{-- EDIT DELETE OPTIONS --}}
{{-- <div style="width: 100%; margin-left: 0%;">

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
</div> --}}

<div class="container" style="background-color: #00abed; padding: 0px 0px 5px 0px;font-weight: 500; border-radius: 5px; width: 75%; margin-bottom: 30px; margin-top:350px">
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
      <th scope="col"><span class="inRight" id="s_animal_name"></span></th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="col">Type</th>
      <th scope="col" ><span class="inRight" id="s_animal_category"></span></th>
    </tr>
     <tr>
      <th scope="col">Age</th>
      <th scope="col" ><span class="inRight" id="s_animal_age"></span></th>
    </tr>
    <tr>
      <th scope="col">Gender</th>
      <th scope="col" ><span class="inRight" id="s_animal_gender"></span></th>
    </tr>
     <tr>
      <th scope="col">Breed</th>
      <th scope="col" ><span class="inRight" id="s_animal_breed"></span></th>
    </tr>
      <tr>
      <th scope="col">Health</th>
      <th scope="col"><span class="inRight" id="s_animal_health"></span></th>
    </tr>
      <tr>
      <th scope="col">Record ID</th>
      <th scope="col"><span class="inRight" id="s_animal_id"></span></th>
    </tr>
  </tbody>
</table>

  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  {{-- Adopter --}}


  <table class="table" >
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col"><span class="inRight" id="s_adopter_fname"></span></th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="col">Last Type</th>
      <th scope="col" ><span class="inRight" id="s_adopter_lname"></span></th>
    </tr>
     <tr>
      <th scope="col">Contact Number</th>
      <th scope="col" ><span class="inRight" id="s_adopter_contact"></span></th>
    </tr>
     <tr>
      <th scope="col">Address</th>
      <th scope="col" ><span class="inRight" id="s_adopter_address"></span></th>
    </tr>
      <tr>
      <th scope="col">Record ID</th>
      <th scope="col"><span class="inRight" id="s_adopter_id"></span></th>
    </tr>
  </tbody>
</table>

  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  {{-- Disease --}}
  <table class="table">
  <thead>
    <tr id="s_diseases">
    </tr>
  </thead>
</table>


</div>


  <div class="tab-pane fade" id="vet" role="tabpanel" aria-labelledby="contact-tabb">
  {{-- vet --}}

   <table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col"><span class="inRight" id="s_veterinarian_fname"></span></th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="col">Last Name</th>
      <th scope="col" ><span class="inRight" id="s_veterinarian_lname"></span></th>
    </tr>
     <tr>
      <th scope="col">Age</th>
      <th scope="col" ><span class="inRight" id="s_veterinarian_age"></span></th>
    </tr>
      <tr>
      <th scope="col">Contact number</th>
      <th scope="col"><span class="inRight" id="s_veterinarian_contact"></span></th>
    </tr>
      <tr>
      <th scope="col">Address</th>
      <th scope="col"><span class="inRight" id="s_veterinarian_address"></span></th>
    </tr>
     <tr>
      <th scope="col">Record ID</th>
      <th scope="col"><span class="inRight" id="s_veterinarian_id"></span></th>
    </tr>
  </tbody>
</table>

</div>




  <div class="tab-pane fade" id="contactt" role="tabpanel" aria-labelledby="contact-tabb">
  {{-- Rescuer --}}
   <table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col"><span class="inRight" id="s_rescuer_fname"></span></th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="col">Last Name</th>
      <th scope="col" ><span class="inRight" id="s_rescuer_lname"></span></th>
    </tr>
     <tr>
      <th scope="col">Age</th>
      <th scope="col" ><span class="inRight" id="s_rescuer_age"></span></th>
    </tr>
      <tr>
      <th scope="col">Contact number</th>
      <th scope="col"><span class="inRight" id="s_rescuer_contact"></span></th>
    </tr>
      <tr>
      <th scope="col">Address</th>
      <th scope="col"><span class="inRight" id="s_rescuer_address"></span></th>
    </tr>
     <tr>
      <th scope="col">Record ID</th>
      <th scope="col"><span class="inRight" id="s_rescuer_id"></span></th>
    </tr>
  </tbody>
</table>

</div>
</div>
</div>
		
</div>
