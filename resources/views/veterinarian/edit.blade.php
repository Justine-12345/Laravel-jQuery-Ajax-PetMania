<div id="editVeterinarianModalContent">

	<style type="text/css">
		label {
		margin-top: 15px;
		font-weight: 500;
		color: white;
	}
		.illLabel {
		font-weight: 100;
		padding-bottom: 10px;
		padding-left: 5px;
	}
		i {
		color: red;
		font-weight: 500;
		text-shadow: white 1px 1px 2px;
	}

	</style>
<h2 style="text-align: center; margin-top: 30px">
	Edit veterinarian
</h2>


<img id="user_image" src="" class="img" alt="rescuer Image" style="width: 40%; height: 300px; border-radius: 150px; object-fit: cover; border: 10px solid  #00abed; position: absolute; left: 30%; right: 5%; margin-top: 50px;" >
	<div class="form-group" style="margin-top:400px">

		 {!! Form::label('exampleFormControlSelect1','Update veterinarian Image')!!}<br>
           {{ Form::file('user_picture',['id' => 'user_picture', ]) }} 
           @if($errors->has('user_picture'))
	        <small class="form-text text-muted"><i>*{{ $errors->first('user_picture') }}</i></small>
	       @endif
	<br>	

		{!!  Form::hidden('user_id',null,array('id' => 'user_id')) !!}
		{!!  Form::hidden('old_user_picture',null,array('id'=>'old_user_picture')) !!}

	{{-- 	{!!  Form::hidden('old_user_picture',$veterinarian->user->user_picture) !!}
		{!!  Form::hidden('role',$veterinarian->user->role) !!} --}}

{{-- @if(auth()->user()->role == "admin")
		{!! Form::label('role','Role')!!} --}}
        {!! Form::select('role',['new'=>'New','adopter'=>'Adopter', 'rescuer'=>'Rescuer', 'veterinarian' => 'Veterinarian', 'admin' => 'Admin', 'deactive' => 'Deactive'], null, ['class' => 'form-control', 'id' => 'role', 'required']) !!} 
        @if($errors->has('role'))
        <small class="form-text text-muted"><i>*{{ $errors->first('role') }}</i></small>
        @endif
{{-- @endif  --}}


		{!! Form::label('veterinarian_fname','First Name')!!}
	    {!!  Form::text('veterinarian_fname',null,array('class' => 'form-control', 'id' => 'veterinarian_fname')) !!}
	    @if($errors->has('veterinarian_fname'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_fname') }}</i></small>
	    @endif

	    {!! Form::label('veterinarian_lname','Last Name')!!}
	    {!!  Form::text('veterinarian_lname',null,array('class' => 'form-control','id'=>'veterinarian_lname')) !!}
		@if($errors->has('veterinarian_lname'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_lname') }}</i></small>
	    @endif


	    {!! Form::label('veterinarian_age','Age')!!}
	    {!!  Form::text('veterinarian_age',null,array('class' => 'form-control','id'=>'veterinarian_age')) !!}
	  	@if($errors->has('veterinarian_age'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_age') }}</i></small>
	    @endif

	   
        {!! Form::label('veterinarian_gender','Gender')!!}
        {!! Form::select('veterinarian_gender',['Male'=>'Male', 'Female'=>'Female'],null, ['class' => 'form-control', 'id' => 'veterinarian_gender', 'required']) !!} 
        @if($errors->has('veterinarian_gender'))
        <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_gender') }}</i></small>
        @endif
     

	    {!! Form::label('veterinarian_contact','Contact Num')!!}
	    {!!  Form::text('veterinarian_contact',null,array('class' => 'form-control','id'=>'veterinarian_contact')) !!}
		@if($errors->has('veterinarian_contact'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_contact') }}</i></small>
	    @endif

	    {!! Form::label('veterinarian_address','Address')!!}
	    {!!  Form::text('veterinarian_address',null,array('class' => 'form-control','id'=>'veterinarian_address')) !!}
		@if($errors->has('veterinarian_address'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_address') }}</i></small>
	    @endif

	  @include('auth.changePassword')

          
  </div>

{{--    <div style="width: 100px; margin: auto;">
 {!! Form::submit('Update', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
      </div>      

	{!! Form::close() !!} --}}

</div>



