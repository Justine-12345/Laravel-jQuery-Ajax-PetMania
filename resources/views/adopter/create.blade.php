<div id="addAdopterModalContent">
	<div class="form-group">
		

		{!! Form::label('adopter_fname','First Name')!!}
	    {!!  Form::text('adopter_fname',$value = null,array('class' => 'form-control', 'id' => 'adopter_fname')) !!}
	    @if($errors->has('adopter_fname'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('adopter_fname') }}</i></small>
	    @endif
	    <br>
	    {!! Form::label('adopter_lname','Last Name')!!}
	    {!!  Form::text('adopter_lname',$value = null,array('class' => 'form-control','id'=>'adopter_lname')) !!}
		@if($errors->has('adopter_lname'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('adopter_lname') }}</i></small>
	    @endif
	    <br>
	    {!! Form::label('email','Email')!!}
	    {!!  Form::email('email',$value = null,array('class' => 'form-control','id'=>'email')) !!}
		@if($errors->has('email'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('email') }}</i></small>
	    @endif
	     <br>

	    {!! Form::label('adopter_age','Age')!!}
	    {!!  Form::text('adopter_age',$value = null,array('class' => 'form-control','id'=>'adopter_age')) !!}
		@if($errors->has('adopter_age'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('adopter_age') }}</i></small>
	    @endif
	     <br>
	   {!! Form::label('adopter_gender','Gender')!!}
        {!!  Form::select('adopter_gender',['Male'=>'Male', 'Female'=>'Female'], null, ['class' => 'form-control', 'id' => 'adopter_gender', 'required']) !!} 
        @if($errors->has('adopter_gender'))
        <small class="form-text text-muted"><i>*{{ $errors->first('adopter_gender') }}</i></small>
        @endif
         <br>

	    {!! Form::label('adopter_contact','Contact Num')!!}
	    {!!  Form::text('adopter_contact',$value = null,array('class' => 'form-control','id'=>'adopter_contact')) !!}
		@if($errors->has('adopter_contact'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('adopter_contact') }}</i></small>
	    @endif
	     <br>
	    {!! Form::label('adopter_address','Address')!!}
	    {!!  Form::text('adopter_address',$value = null,array('class' => 'form-control','id'=>'adopter_address')) !!}
		@if($errors->has('adopter_address'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('adopter_address') }}</i></small>
	    @endif
	   	 <br>

        {!! Form::label('exampleFormControlSelect1','Upload adopter Image')!!}<br>
        {{ Form::file('adopter_pic',['id' => 'adopter_pic', ]) }} 
        @if($errors->has('adopter_pic'))
	      <small class="form-text text-muted"><i>*{{ $errors->first('adopter_pic') }}</i></small>
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

