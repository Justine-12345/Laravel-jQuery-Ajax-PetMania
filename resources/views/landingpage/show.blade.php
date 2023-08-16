<div id="showAnimalFrontContent">

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
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#homeF" role="tab" aria-controls="homeF" aria-selected="true">Profile</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profileF" role="tab" aria-controls="profileF" aria-selected="false">Adopter</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contactF" role="tab" aria-controls="contactF" aria-selected="false">Illness</a>
  </li>
   <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#vetF" role="tab" aria-controls="vetF" aria-selected="false">Assigned Vet</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tabb" data-toggle="tab" href="#contacttF" role="tab" aria-controls="contacttF" aria-selected="false">Rescuer</a>
  </li>  
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tabb" data-toggle="tab" href="#commentF" role="tab" aria-controls="commentF" aria-selected="false">Comment</a>
  </li>  
{{-- 
<form id="adoptBtnForm" method="post" action="#" enctype="multipart/form-data" style="display: inline-block;float: right;margin: 5px;">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {!! Form::hidden('animal_id', null, array('id'=>'animal_id')) !!}
    <button class="btn btn-primary" type="submit" style="color:white;">Adopt Me</button>
</form> --}}
  <li style="float:right; margin: 5px;" id="adoptBtnFormLi">
    <button id="adoptBtnForm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#adoptionRequestModal" style="background-color:unset;" data-id="" style="margin: 5px;">
     Adopt Me
    </button>
  <li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="homeF" role="tabpanel" aria-labelledby="home-tab">
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
  <div class="tab-pane fade" id="profileF" role="tabpanel" aria-labelledby="profile-tab">
  {{-- Adopter --}}
<div id="noAdopter">
  <h2 style="color: white; text-align: center;" id="notYetAdopted">Not Adopted Yet</h2>
</div>
<div id="hasAdopter">
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
  </div>
  <div class="tab-pane fade" id="contactF" role="tabpanel" aria-labelledby="contact-tab">
  {{-- Disease --}}
  <div id="noDisease">
  <h2 style="color: white; text-align: center;">This Animals Is Certified Health <i class="fas fa-check-circle" id="badge" style="color:#1c9109; font-size:20px; text-shadow:unset;" title="Healthy Badge"></i></h2>
</div>
<div id="hasDisease">
  <table class="table">
  <thead>
    <tr id="s_diseases">
    </tr>
  </thead>
</table>
</div>

</div>


  <div class="tab-pane fade" id="vetF" role="tabpanel" aria-labelledby="contact-tabb">
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




  <div class="tab-pane fade" id="contacttF" role="tabpanel" aria-labelledby="contact-tabb">
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


<div class="tab-pane fade" id="commentF" role="tabpanel" aria-labelledby="contact-tab" style="padding:24px">
  {{-- Comment --}}
  <table class="table">
  <thead>
    <tr id="s_comments">
      Comments Here 
      <form id="commentform" method="post" action="#" enctype="multipart/form-data" style="padding: 50px;">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">

            {!! Form::label('comment_name','Your Name Here(Optional)') !!}
            {!! Form::text('comment_name',null,['class'=>'form-control','id'=>'comment_name','rows' => 7, 'cols' => 40, 'placeholder'=> 'Leave it blank to become anonymous...']) !!}

            {!! Form::label('comment_content','Write Your Comments Here') !!} <i class="fas fa-feather"></i>
            {!! Form::textarea('comment_content',null,['class'=>'form-control','id'=>'comment_content' ,'rows' => 7, 'cols' => 40, 'placeholder'=> 'Type Here.....', 'required'=>'true']) !!}

            {!!  Form::hidden('animal_id',null,array('id' => 'animal_id')) !!}

            {!!Form::submit('Submit', ['class'=> 'btn btn-primary', 'style'=>'margin-top:5px; color: white', 'id'=>'animalCommentSubmit']); !!}

        </form>
    </tr>
    <br>
    <br>

    <tr id="commentContainer">

    </tr>

  </thead>
</table>
</div>
</div>
</div>



<div class="modal fade" id="adoptionRequestModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Adoption Request For <i>"<b id="s_animal_name" style="color:black;"></b>"</i></h4>
      </div>
    <form id="adoptionRequestform" method="post" action="" enctype="multipart/form-data">
      <div class="modal-body">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div id="arfL">
              <h2 style="text-align:center;">Click Submit To Send Adoption Request</h2>
          </div>
          <div id="arf">
            {!! Form::label('adopter_fname','First Name') !!}
            {!! Form::text('adopter_fname',null,['class'=>'form-control','id'=>'adopter_fname','rows' => 7, 'cols' => 40]) !!}

            {!! Form::label('adopter_lname','Last Name') !!}
            {!! Form::text('adopter_lname',null,['class'=>'form-control','id'=>'adopter_lname','rows' => 7, 'cols' => 40]) !!}

            {!! Form::label('adopter_email','Email') !!}
            {!! Form::text('adopter_email',null,['class'=>'form-control','id'=>'adopter_email','rows' => 7, 'cols' => 40]) !!}

            {!! Form::label('adopter_contact','Contact Number') !!}
            {!! Form::text('adopter_contact',null,['class'=>'form-control','id'=>'adopter_contact','rows' => 7, 'cols' => 40]) !!}

            {!!  Form::hidden('animal_id',null,array('id' => 'animal_id')) !!}

            {!!  Form::hidden('adopter_id',null,array('id' => 'adopter_id')) !!}
            </div>
      </div>
    </form>
      <div class="modal-footer">
        <button type="button" class="closeModal btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="adoptionRequestformSubmit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>



    
</div>
