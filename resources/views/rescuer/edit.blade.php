<div id="editRescuerModalContent">
	<style type="text/css">
		label {
		margin-top: 15px;
		font-weight: 500;
		color: black;
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
	Edit Rescuer
</h2>


<img id="user_image" src="" class="img" alt="rescuer Image" style="width: 40%; height: 300px; border-radius: 150px; object-fit: cover; border: 10px solid  #00abed; position: absolute; left: 30%; right: 5%; margin-top: 50px;" >
	
<div class="form-group" style="margin-top:400px">

		 {!! Form::label('exampleFormControlSelect1','Update Rescuer Image')!!}<br>
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

		{!! Form::label('rescuer_fname','First Name')!!}
	    {!!  Form::text('rescuer_fname',null,array('class' => 'form-control', 'id' => 'rescuer_fname')) !!}
	    @if($errors->has('rescuer_fname'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_fname') }}</i></small>
	    @endif

	    {!! Form::label('rescuer_lname','Last Name')!!}
	    {!!  Form::text('rescuer_lname',null,array('class' => 'form-control','id'=>'rescuer_lname')) !!}
		@if($errors->has('rescuer_lname'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_lname') }}</i></small>
	    @endif


	    {!! Form::label('rescuer_age','Age')!!}
	    {!!  Form::text('rescuer_age',null,array('class' => 'form-control','id'=>'rescuer_age')) !!}
	  	@if($errors->has('rescuer_age'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_age') }}</i></small>
	    @endif

	   
        {!! Form::label('rescuer_gender','Gender')!!}
        {!! Form::select('rescuer_gender',['Male'=>'Male', 'Female'=>'Female'], null, ['class' => 'form-control', 'id' => 'rescuer_gender', 'required']) !!} 
        @if($errors->has('rescuer_gender'))
        <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_gender') }}</i></small>
        @endif
     
	    {!! Form::label('rescuer_contact','Contact Num')!!}
	    {!!  Form::text('rescuer_contact',null,array('class' => 'form-control','id'=>'rescuer_contact')) !!}
		@if($errors->has('rescuer_contact'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_contact') }}</i></small>
	    @endif

	    {!! Form::label('rescuer_address','Address')!!}
	    {!!  Form::text('rescuer_address',null,array('class' => 'form-control','id'=>'rescuer_address')) !!}
		@if($errors->has('rescuer_address'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_address') }}</i></small>
	    @endif

	  @include('auth.changePassword')
          
  </div>

   <div style="width: 100px; margin: auto;">
 {{-- {!! Form::submit('Update', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
      </div>      

	{!! Form::close() !!} --}}

</div>
</div>

