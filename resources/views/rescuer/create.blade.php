<div id="addRescuerModalContent">
	<div class="form-group">
		

		{!! Form::label('rescuer_fname','First Name')!!}
	    {!!  Form::text('rescuer_fname',$value = null,array('class' => 'form-control', 'id' => 'rescuer_fname')) !!}
	    @if($errors->has('rescuer_fname'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_fname') }}</i></small>
	    @endif
	     <br>
	    {!! Form::label('rescuer_lname','Last Name')!!}
	    {!!  Form::text('rescuer_lname',$value = null,array('class' => 'form-control','id'=>'rescuer_lname')) !!}
		@if($errors->has('rescuer_lname'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_lname') }}</i></small>
	    @endif
	     <br>
	    {!! Form::label('email','Email')!!}
	    {!!  Form::email('email',$value = null,array('class' => 'form-control','id'=>'email')) !!}
		@if($errors->has('email'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('email') }}</i></small>
	    @endif
	     <br>

	    {!! Form::label('rescuer_age','Age')!!}
	    {!!  Form::text('rescuer_age',$value = null,array('class' => 'form-control','rescuer_age')) !!}
		@if($errors->has('rescuer_age'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_age') }}</i></small>
	    @endif
	     <br>
	   {!! Form::label('rescuer_gender','Gender')!!}
        {!!  Form::select('rescuer_gender',['Male'=>'Male', 'Female'=>'Female'], null, ['class' => 'form-control', 'id' => 'rescuer_gender', 'required']) !!} 
        @if($errors->has('rescuer_gender'))
        <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_gender') }}</i></small>
        @endif
         <br>

	    {!! Form::label('rescuer_contact','Contact Num')!!}
	    {!!  Form::text('rescuer_contact',$value = null,array('class' => 'form-control','rescuer_contact')) !!}
		@if($errors->has('rescuer_contact'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_contact') }}</i></small>
	    @endif
	     <br>
	    {!! Form::label('rescuer_address','Address')!!}
	    {!!  Form::text('rescuer_address',$value = null,array('class' => 'form-control','rescuer_address')) !!}
		@if($errors->has('rescuer_address'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_address') }}</i></small>
	    @endif
	   	 <br>

        {!! Form::label('exampleFormControlSelect1','Upload Rescuer Image')!!}<br>
        {{ Form::file('rescuer_pic',['id' => 'rescuer_pic', ]) }} 
        @if($errors->has('rescuer_pic'))
	      <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_pic') }}</i></small>
	    @endif
	     <br>

	   {!! Form::label('password','Password')!!}
        {!!  Form::password('password',array('class' => 'form-control', 'id' => 'password', 'required')) !!}
        @if($errors->has('password'))
        <small class="form-text text-muted"><i>*{{ $errors->first('password') }}</i></small>
        @endif 
         <br>

      {!! Form::label('password_confirm','Confirm Password')!!}
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

