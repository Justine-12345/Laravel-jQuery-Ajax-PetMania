<div id="showUserModalContent">
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
New User  Profile
</h3>
</div>

<img id="s_user_image" class="img" alt="user Image" style="width: 40%; height: 300px; border-radius: 150px; object-fit: cover; border: 10px solid  #00abed; position: absolute; left: 30%; right: 5%; margin-top: 70px;">


<div>
	<h2 style="text-align: center;margin-bottom: 0px;" id="s_rescuer_fname">
	</h2>
	<h6 style="text-align: center;">
	<small>New User</small>
	</h6>
</div>



  {{-- ***FOR ADMIN ONLY*** --}}
{{-- <div style="width: 100%; margin-left: 0%;">
@if($user->deleted_at == null)
{!!Form::model($user, ['route' => ['user.destroy',$user->id], 'method' => 'DELETE']) !!}
<a href="{{ route('user.index') }}"><i class="far fa-arrow-alt-circle-left" style="font-weight: 900; color: #00abed; font-size: 20px; padding: 5px; padding-left: 13%"></i>
</a>

@if(auth()->user()->role == 'admin')
<span style="float: right; padding-right: 13%">
    <a href="{{ route('user.edit', $user->id) }}" style="text-decoration: none;">
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
<a href="{{ route('user.index') }}"><i class="far fa-arrow-alt-circle-left" style="font-weight: 900; color: #00abed; font-size: 20px; padding: 5px; padding-left: 13%"></i>
</a>
@if(auth()->user()->role == 'admin')
<span style="float: right; padding-right: 13%">
<a href="{{ route('user.restore',$users[0]['id']) }}">
        <i class="fas fa-trash-restore" style="font-size: 20px; font-weight: 900; color: #00abed"></i></a>
@endif
@endif
</span>
</div> --}}

<div class="container" style="background-color: #00abed; padding: 0px 0px 5px 0px;font-weight: 500; border-radius: 5px; width: 75%; margin-bottom: 30px;margin-top: 380px;">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home6" role="tab" aria-controls="home6" aria-selected="true" style="color:#1b293e">Profile</a>
  </li>
 {{--  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Job</a>
  </li> --}}  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home6" role="tabpanel" aria-labelledby="home-tab">
  {{-- Profile --}}
 <table class="table">
  <thead>
    <tr>
      <th scope="col">FirstName</th>
      <th scope="col"><span class="inRight" id="s_user_fname"></span></th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="col">LastName</th>
      <th scope="col" ><span class="inRight" id="s_user_lname"></span></th>
    </tr>
     <tr>
      <th scope="col">Email</th>
      <th scope="col" ><span class="inRight" id="s_email"></span></th>
    </tr>
     <tr>
      <th scope="col">Age</th>
      <th scope="col" ><span class="inRight" id="s_user_age"></span></th>
    </tr>
    <tr>
      <th scope="col">Gender</th>
      <th scope="col" ><span class="inRight" id="s_user_gender"></span></th>
    </tr>
     <tr>
      <th scope="col">Contact Num</th>
      <th scope="col" ><span class="inRight" id="s_user_contact"></span></th>
    </tr>
     <tr>
      <th scope="col">Address</th>
      <th scope="col" ><span class="inRight" id="s_user_address"></span></th>
    </tr>
      <tr>
      <th scope="col">Record ID</th>
      <th scope="col"><span class="inRight" id="s_user_id"></span></th>
    </tr>
  </tbody>
</table>
</div>
  {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <tr>
      <p scope="col" class=" animal"> Job Name : {{ $users[0]['job_name'] }}</p>
      <p scope="col" class="animal"> Job Description : {{ $users[0]['job_desc']}}</p>
    </tr>
    <hr style="border-top: 2px solid #E2E7E2">
  </div> --}}
</div>
</div>
</div>
</div>