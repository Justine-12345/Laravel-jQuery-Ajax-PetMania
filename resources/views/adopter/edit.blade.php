<div id="editAdopterModalContent">

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
	Edit Adopter
</h2>


<img id="user_image" src="" class="img" alt="rescuer Image" style="width: 40%; height: 300px; border-radius: 150px; object-fit: cover; border: 10px solid  #00abed; position: absolute; left: 30%; right: 5%; margin-top: 50px;" >

<div class="form-group" style="margin-top:400px">

		 {!! Form::label('exampleFormControlSelect1','Update adopter Image')!!}<br>
           {{ Form::file('user_picture',['id' => 'user_picture', ]) }} 
           @if($errors->has('user_picture'))
	        <small class="form-text text-muted"><i>*{{ $errors->first('user_picture') }}</i></small>
	       @endif
	<br>	
	{!!  Form::hidden('user_id',null,array('id' => 'user_id')) !!}
		{!!  Form::hidden('old_user_picture',null,array('id'=>'old_user_picture')) !!}

{{-- @if(auth()->user()->role == "admin") --}}
		{!! Form::label('role','Role')!!}
        {!! Form::select('role',['new'=>'New','adopter'=>'Adopter', 'rescuer'=>'Rescuer', 'veterinarian' => 'Veterinarian', 'admin' => 'Admin', 'deactive' => 'Deactive'], null, ['class' => 'form-control', 'id' => 'role', 'required']) !!} 
        @if($errors->has('role'))
        <small class="form-text text-muted"><i>*{{ $errors->first('role') }}</i></small>
        @endif
{{-- @endif  --}}


		{!! Form::label('adopter_fname','First Name')!!}
	    {!!  Form::text('adopter_fname',null,array('class' => 'form-control', 'id' => 'adopter_fname')) !!}
	    @if($errors->has('adopter_fname'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('adopter_fname') }}</i></small>
	    @endif

	    {!! Form::label('adopter_lname','Last Name')!!}
	    {!!  Form::text('adopter_lname',null,array('class' => 'form-control','id'=>'adopter_lname')) !!}
		@if($errors->has('adopter_lname'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('adopter_lname') }}</i></small>
	    @endif


	    {!! Form::label('adopter_age','Age')!!}
	    {!!  Form::text('adopter_age',null,array('class' => 'form-control','adopter_age')) !!}
	  	@if($errors->has('adopter_age'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('adopter_age') }}</i></small>
	    @endif

	   
        {!! Form::label('adopter_gender','Gender')!!}
        {!! Form::select('adopter_gender',['Male'=>'Male', 'Female'=>'Female'], null, ['class' => 'form-control', 'id' => 'adopter_gender', 'required']) !!} 
        @if($errors->has('adopter_gender'))
        <small class="form-text text-muted"><i>*{{ $errors->first('adopter_gender') }}</i></small>
        @endif
     




	    {!! Form::label('adopter_contact','Contact Num')!!}
	    {!!  Form::text('adopter_contact',null,array('class' => 'form-control','adopter_contact')) !!}
		@if($errors->has('adopter_contact'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('adopter_contact') }}</i></small>
	    @endif

	    {!! Form::label('adopter_address','Address')!!}
	    {!!  Form::text('adopter_address',null,array('class' => 'form-control','adopter_address')) !!}
		@if($errors->has('adopter_address'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('adopter_address') }}</i></small>
	    @endif

	  @include('auth.changePassword')

          
  </div>

   <div style="width: 100px; margin: auto;">
 {{-- {!! Form::submit('Update', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
      </div>      

	{!! Form::close() !!} --}}

</div>
</div>

