<div id="showDiseaseModalContent">
<style type="text/css">
		.inRight{
			float: right;
			font-size: 25px;
			color: white;
		}
		th{
			color: white;
		}
    .animal{
      color: white;
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
Disease Information
</h3>
</div>


<div>
	<h2 style="text-align: center;margin-bottom: 0px;" id="s_disease_name">
	</h2>
	<h6 style="text-align: center;">
	<small>Illness</small>
	</h6>
</div>



  {{-- ***FOR ADMIN ONLY*** --}}
{{-- <div style="width: 100%; margin-left: 0%;">
@if($disease->deleted_at == null)
{!!Form::model($disease, ['route' => ['disease.destroy',$disease->id], 'method' => 'DELETE']) !!}
<a href="{{ route('disease.index') }}"><i class="far fa-arrow-alt-circle-left" style="font-weight: 900; color: #00abed; font-size: 20px; padding: 5px; padding-left: 13%"></i>
</a>
@if(auth()->user()->role == "admin")
<span style="float: right; padding-right: 13%">
    <a href="{{ route('disease.edit', $disease->id) }}">
    <i class="far fa-edit" style="font-size: 20px; font-weight: 900; color: #00abed"></i>
    </a>
<button type="submit" style="padding: 0px; margin: 0px; border: none;background-color: inherit;">
    <i class="far fa-trash-alt" style="font-size: 20px; font-weight: 900; color: #00abed; margin: 0px">
    </i>
</button>
</span>
@endif
{!! Form::close() !!}
@else
<a href="{{ route('disease.index') }}"><i class="far fa-arrow-alt-circle-left" style="font-weight: 900; color: #00abed; font-size: 20px; padding: 5px; padding-left: 13%"></i>
</a>
<span style="float: right; padding-right: 13%">
@if(auth()->user()->role == "admin")
<a href="{{ route('disease.restore',$disease->id) }}">
        <i class="fas fa-trash-restore" style="font-size: 20px; font-weight: 900; color: #00abed"></i></a>
@endif
@endif
</span>
</div> --}}

<div class="container" style="background-color: #00abed; padding: 0px 0px 5px 0px;font-weight: 500; border-radius: 5px; width: 75%; margin-bottom: 30px">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home4" role="tab" aria-controls="home4" aria-selected="true">Profile</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile5" aria-selected="false">Infected/Injured</a>
  </li>  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab">
  {{-- Profile --}}
 <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col"><span class="inRight" id="s_disease_name"></span></th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="col">Description</th>
      <th scope="col" ><span class="inRight" id="s_disease_desc"></span></th>
    </tr>
    <tr>
      <th scope="col">Record ID</th>
      <th scope="col" ><span class="inRight" id="s_disease_id"></span></th>
    </tr>
  </tbody>
</table>
</div>
  <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab">
  {{-- rescued --}}

{{-- 
  @if(count($disease->animals)<1)
  <div style="height: 365px; padding-top: 30px">
  	<h3 style="text-align: center; color: white">No result found</h3>
  </div>
  	@else --}}
  <table class="table" >
  <thead id="diseasedAnimals">
{{-- @php
  $i = 1;  
@endphp
@foreach($disease->animals as $animal)
    <tr>
     
      <p scope="col" class="animal"><b> {{ $i++ }}.)</b> Animal Name : {{ $animal->animal_name }}</p>
      <p scope="col" class="animal ai"> Type : {{ $animal->category_name }}</p>
      <p scope="col" class="animal ai"> Gender : {{ $animal->animal_gender }}</p>
      <p scope="col" class="animal ai"> Breed : {{ $animal->animal_health }}</p>
      <p scope="col" class="animal ai"> Age : {{ $animal->animal_age }}</p>
      <p scope="col" class="animal ai"> Health Status : {{ $animal->animal_health }}</p>
    </tr>
    <hr style="border-top: 2px solid #E2E7E2">
@endforeach --}}
  </thead>
</table>
{{-- @endif --}}
</div>
</div>
</div>
</div>
</div>
