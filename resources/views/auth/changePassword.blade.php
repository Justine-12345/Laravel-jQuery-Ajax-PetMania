<hr>
<style type="text/css">
    label{
        color: black;
    }
</style>
<h3 style="color:black;">Change Password (Optional)</h3>
	    {!! Form::label('current_password','Current Password')!!}
        {!!  Form::password('current_password',array('class' => 'form-control', 'id' => 'current_password', 'placeholder' => '')) !!}
        @if($errors->has('current_password'))
        <small class="form-text text-muted"><i>*{{ $errors->first('current_password') }}</i></small>
        @endif 

	     {!! Form::label('password','New Password')!!}
        {!!  Form::password('password',array('class' => 'form-control', 'id' => 'password')) !!}
        @if($errors->has('password'))
        <small class="form-text text-muted"><i>*{{ $errors->first('password') }}</i></small>
        @endif 


       {!! Form::label('password-confirm','Confirm Password')!!}
        {!!  Form::password('password_confirmation',array('class' => 'form-control', 'id' => 'password_confirm', 'autocomplete' => 'new-password')) !!}

        @if($errors->has('password_confirmation'))
        <small class="form-text text-muted"><i>*{{ $errors->first('password_confirmation') }}</i></small>
        @endif 