<div id="showAdopterModalContent1">
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

<div>

<h3 style="text-align: center; color: #1b293e; margin-top: 20px">
Adopter Profile <button id="adopterEditBtn1" type="button" class="" data-toggle="modal" data-target="#adopterEditModal1" style="background-color:unset;">
      <i class="far fa-edit" style="font-size: 20px; font-weight: 900; color: #00abed; text-shadow: unset;bottom: 3px;position: relative;cursor: pointer;" id="adopterEditBtn1"></i>
    </button>
</h3>
</div>

<img id="s_adopter_image" class="img" alt="adopter Image" style="width: 40%; height: 300px; border-radius: 150px; object-fit: cover; border: 10px solid  #00abed; position: absolute; left: 30%; right: 5%; margin-top: 70px;">




<div>
  <h2 style="text-align: center;margin-bottom: 0px;" id="s_adopter_fname">
  </h2>
  <h6 style="text-align: center;">
  <small>The Adopter</small>
  </h6>
</div>


<div class="modal fade" id="adopterEditModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Adopter</h4>
      </div>
    <form id="adopterEditform1" method="post" action="" enctype="multipart/form-data">
      <div class="modal-body">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('adopter.edit');
      </div>
    </form>
      <div class="modal-footer">
        <button type="button" class="closeModal btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="adopterEditSubmit1" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


  {{-- ***FOR ADMIN ONLY*** --}}
{{-- <div style="width: 100%; margin-left: 0%;">
@if($adopter->deleted_at == null)
{!!Form::model($adopter, ['route' => ['adopter.destroy',$adopter->user_id], 'method' => 'DELETE']) !!}

<a href="{{ url()->previous()  }}"><i class="far fa-arrow-alt-circle-left" style="font-weight: 900; color: #00abed; font-size: 20px; padding: 5px; padding-left: 13%; visibility: {{auth()->user()->role != "admin"? "hidden":null}};"></i>
</a>
@if(auth()->user()->role == "admin")
<button type="submit" style="padding: 0px; margin: 0px; border: none;background-color: inherit; float:right; padding-right: 13%;">
    <i class="far fa-trash-alt" style="font-size: 20px; font-weight: 900; color: #00abed; margin: 0px">
    </i>
</button>

@endif

<span style="float: right; padding-right: {{auth()->user()->role == "admin" ?"5px": "14%"}}">
    <a href="{{ route('adopter.edit', $adopter->user_id) }}">
    <i class="far fa-edit" style="font-size: 20px; font-weight: 900; color: #00abed"></i>
    </a>
</span>    


{!! Form::close() !!}
@else
<a href="{{ url()->previous()  }}"><i class="far fa-arrow-alt-circle-left" style="font-weight: 900; color: #00abed; font-size: 20px; padding: 5px; padding-left: 13%"></i>
</a>
<span style="float: right; padding-right: 13%">
@if(auth()->user()->role == "admin")
<a href="{{ route('adopter.restore',$adopter->user_id) }}">
        <i class="fas fa-trash-restore" style="font-size: 20px; font-weight: 900; color: #00abed"></i></a>
@endif
@endif
</span>
</div> --}}




<div class="container" style="background-color: #00abed; padding: 0px 0px 5px 0px;font-weight: 500; border-radius: 5px; width: 75%; margin-bottom: 30px; margin-top: 380px;">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home22" role="tab" aria-controls="home22" aria-selected="true">Profile</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile22" role="tab" aria-controls="profile22" aria-selected="false">Adopted</a>
  </li>  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home22" role="tabpanel" aria-labelledby="home-tab">
  {{-- Profile --}}
 <table class="table">
  <thead>
    <tr>
      <th scope="col">FirstName</th>
      <th scope="col"><span class="inRight" id="s_adopter_fname"></span></th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="col">LastName</th>
      <th scope="col" ><span class="inRight" id="s_adopter_lname"></span></th>
    </tr>
     <tr>
      <th scope="col">Email</th>
      <th scope="col" ><span class="inRight" id="s_email"></span></th> 
    </tr>
     <tr>
      <th scope="col">Age</th>
      <th scope="col" ><span class="inRight" id="s_adopter_age"></span></th>
    </tr>
    <tr>
      <th scope="col">Gender</th>
      <th scope="col" ><span class="inRight" id="s_adopter_gender"></span></th>
    </tr>
     <tr>
      <th scope="col">Contact Num</th>
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
  <div class="tab-pane fade" id="profile22" role="tabpanel" aria-labelledby="profile-tab">
  {{-- rescued --}}

{{-- @php
  $i = 0;
  foreach ($adopter->animals as $animal_adopted) {
    if ($animal_adopted->pivot->status == 1) {
       $i++;
    }
  }
@endphp

  @if($adopter->animals->first() == null || $i == 0)

  <div style="height: 365px; padding-top: 30px">
    <h3 style="text-align: center; color: #eaedf2">{{ $adopter->adopter_fname}} {{ $adopter->adopter_lname}} has not yet adopted an animal</h3>
  </div>

    @else --}}
  <table class="table" >
  <thead id="adopterAnimals">
{{-- @php
  $i = 1;  
@endphp
@foreach($adopter->animals as $animal)
  @php
   $categoryName="";
    foreach ($categories as $category) {
       if($category->id == $animal->category_id){
        $categoryName = $category->category_name;
       }
    }
  @endphp
    @if($animal->pivot->status == 1)
      <tr>
        <p scope="col" class="animal"><b> {{ $i++ }}.)</b> Animal Name : {{ $animal->animal_name }}</p>
        <p scope="col" class="animal ai"> Type : {{ $categoryName }}</p>
        <p scope="col" class="animal ai"> Gender : {{ $animal->animal_gender }}</p>
        <p scope="col" class="animal ai"> Breed : {{ $animal->animal_health }}</p>
        <p scope="col" class="animal ai"> Age : {{ $animal->animal_age }}</p>
        <p scope="col" class="animal ai"> Health Status : {{ $animal->animal_health }}</p>
      </tr>
    <hr style="border-top: 2px solid #E2E7E2">
    @endif
@endforeach --}}
  </thead>
</table>
{{-- @endif --}}
<script src="{{asset('js/adopterPart.js')}}"></script>
</div>
</div>
</div>
</div>
</div>