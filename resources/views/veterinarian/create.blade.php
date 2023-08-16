<div id="addVeterinarianModalContent">
	<div class="form-group">
		

		{!! Form::label('veterinarian_fname','First Name')!!}
	    {!!  Form::text('veterinarian_fname',$value = null,array('class' => 'form-control', 'id' => 'veterinarian_fname')) !!}
	    @if($errors->has('veterinarian_fname'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_fname') }}</i></small>
	    @endif
	     <br>
	    {!! Form::label('veterinarian_lname','Last Name')!!}
	    {!!  Form::text('veterinarian_lname',$value = null,array('class' => 'form-control','id'=>'veterinarian_lname')) !!}
		@if($errors->has('veterinarian_lname'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_lname') }}</i></small>
	    @endif
	     <br>
	    {!! Form::label('email','Email')!!}
	    {!!  Form::email('email',$value = null,array('class' => 'form-control','id'=>'email')) !!}
		@if($errors->has('email'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('email') }}</i></small>
	    @endif
	     <br>

	    {!! Form::label('veterinarian_age','Age')!!}
	    {!!  Form::text('veterinarian_age',$value = null,array('class' => 'form-control','id' =>'veterinarian_age')) !!}
		@if($errors->has('veterinarian_age'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_age') }}</i></small>
	    @endif
	     <br>
	   {!! Form::label('veterinarian_gender','Gender')!!}
        {!!  Form::select('veterinarian_gender',['Male'=>'Male', 'Female'=>'Female'], null, ['class' => 'form-control', 'id' => 'veterinarian_gender', 'required']) !!} 
        @if($errors->has('veterinarian_gender'))
        <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_gender') }}</i></small>
        @endif
         <br>

	    {!! Form::label('veterinarian_contact','Contact Num')!!}
	    {!!  Form::text('veterinarian_contact',$value = null,array('class' => 'form-control','id' =>'veterinarian_contact')) !!}
		@if($errors->has('veterinarian_contact'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_contact') }}</i></small>
	    @endif
	     <br>
	    {!! Form::label('veterinarian_address','Address')!!}
	    {!!  Form::text('veterinarian_address',$value = null,array('class' => 'form-control','id' =>'veterinarian_address')) !!}
		@if($errors->has('veterinarian_address'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_address') }}</i></small>
	    @endif
	   	 <br>

        {!! Form::label('exampleFormControlSelect1','Upload Veterinarian Image')!!}<br>
        {{ Form::file('veterinarian_pic',['id' => 'veterinarian_pic', ]) }} 
        @if($errors->has('veterinarian_pic'))
	      <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_pic') }}</i></small>
	    @endif
	     <br>

	   {!! Form::label('password','Password')!!}
        {!!  Form::password('password',array('class' => 'form-control', 'id' => 'password', 'required')) !!}
        @if($errors->has('password'))
        <small class="form-text text-muted"><i>*{{ $errors->first('password') }}</i></small>
        @endif 
         <br>

      {!! Form::label('password-confirm','Confirm Password')!!}
        {!!  Form::password('password_confirmation',array('class' => 'form-control', 'id' => 'password_confirm', 'required' => true, 'autocomplete' => 'new-password')) !!}

        @if($errors->has('password_confirmation'))
        <small class="form-text text-muted"><i>*{{ $errors->first('password_confirmation') }}</i></small>
        @endif 
  </div>

{{--    <div style="width: 100px; margin: auto;">
 {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
      </div>      

	{!! Form::close() !!} --}}

</div>

