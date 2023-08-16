@extends('layouts.base')
@include('layouts.nav')
@section('body')
<style type="text/css">
        label {
        font-weight: 500;
    }
        .illLabel {
        font-weight: 100;
    }
        i {
        color: red;
        font-weight: 500;
        text-shadow: white 1px 1px 2px;
    }

    .form-control {
       border-radius: 18px;
       height: 30px;
       font-size: 12px;
    }
    label{
        color: darkgreen;
        font-size: 13px;
    }
    </style>



 <div class="container style fade-in">
    <div class="row justify-content-center">
        <div class="col-lg-16">

<div style="height: 30px"></div>


 <div class="form-group  " style="box-shadow: 2px 2px 10px  gray; margin-top: 5px; padding-left: 20px; height: 590px; background-color: #5AF2CD; padding-top: 0px; border-radius: 20px">

    {!!Form::open(['route' => 'user.store', 'files' => true, ]) !!}
<table>
    <tr>            



<td style="width: 60%;">

<div style="position: relative;bottom: 110px;">
<div class="row" style="position: relative; top:30px">
<div class="col-md">

<h2 style="text-align: center; padding: 20px">
  <b style=" color: darkgreen; font-size: 30px; padding-right: 15px"> Create Account</b>
</h2>
</div>
</div>
            <div class="row">
                    <div class="col text-left"><p>{{ Form::file('user_pic',['id' => 'file', 'accept' =>'image/*', 'onchange' => 'loadFile(event)', 'style' => 'display:none']) }} 
                    </p>
                    <p class="row justify-content-center"><img id="output" width="100" class="border border-success" style="border: none; border-radius: 200px; object-fit: cover; width: 100px; height: 100px" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" /></p>
                    <p class="row justify-content-center"><label class="btn btn-outline-success border border-success" for="file" style="cursor: pointer; border-color: darkgreen; font-size: 12px">Upload Image</label></p>

                    @if($errors->has('idPicture'))
                        <small><i>*{{ $errors->first('idPicture') }}</i></small>
                        @endif
                    <script>
                    var loadFile = function(event) {
                        var image = document.getElementById('output');
                        image.src = URL.createObjectURL(event.target.files[0]);
                    };
                    </script></div>
            </div>



        <div class="row">
        <div class="col-sm">  
        {!! Form::label('user_fname','First Name')!!}
        {!!  Form::text('user_fname',$value = null,array('class' => 'form-control', 'id' => 'user_fname', 'required')) !!}
        @if($errors->has('user_fname'))
        <small class="form-text text-muted"><i>*{{ $errors->first('user_fname') }}</i></small>
        @endif
        </div>

        <div class="col-sm">
        {!! Form::label('user_lname','Last Name')!!}
        {!!  Form::text('user_lname',$value = null,array('class' => 'form-control', 'id' => 'user_lname', 'required')) !!}
        @if($errors->has('user_lname'))
        <small class="form-text text-muted"><i>*{{ $errors->first('user_lname') }}</i></small>
        @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
        {!! Form::label('email','Email')!!}
        {!!  Form::email('email',$value = null,array('class' => 'form-control', 'id' => 'email', 'required')) !!}
        @if($errors->has('email'))
        <small class="form-text text-muted"><i>*{{ $errors->first('email') }}</i></small>
        @endif
        </div>
        <div class="col-sm">
        {!! Form::label('user_contact','Contact Num')!!}
        {!!  Form::text('user_contact',$value = null,array('class' => 'form-control','user_contact', 'required')) !!}
        @if($errors->has('user_contact'))
        <small class="form-text text-muted"><i>*{{ $errors->first('user_contact') }}</i></small>
        @endif
        </div>
    </div>
    <div class="row">

        <div class="col-sm">
        {!! Form::label('user_gender','Gender')!!}
        {!!  Form::select('user_gender',['Male'=>'Male', 'Female'=>'Female'], null, ['class' => 'form-control', 'id' => 'user_gender', 'required']) !!} 
        @if($errors->has('user_gender'))
        <small class="form-text text-muted"><i>*{{ $errors->first('user_gender') }}</i></small>
        @endif
        </div>
     
        <div class="col-sm">
        {!! Form::label('user_age','Age')!!}
        {!!  Form::Number('user_age',$value = null,array('class' => 'form-control','id'=>'user_age', 'max' => '100', 'min' => '18', 'required')) !!}
        @if($errors->has('user_age'))
        <small class="form-text text-muted"><i>*{{ $errors->first('user_age') }}</i></small>
        @endif
        </div>
    </div>

  
<div class="row">
    <div class="col-lg">
        {!! Form::label('user_address','Address')!!}
        {!!  Form::text('user_address',$value = null,array('class' => 'form-control','user_address', 'required')) !!}
        @if($errors->has('user_address'))
        <small class="form-text text-muted"><i>*{{ $errors->first('user_address') }}</i></small>
        @endif
    </div>
</div>


    <div class="row">
        <div class="col-sm">
        {!! Form::label('password','Password')!!}
        {!!  Form::password('password',array('class' => 'form-control', 'id' => 'password', 'required')) !!}
        @if($errors->has('password'))
        <small class="form-text text-muted"><i>*{{ $errors->first('password') }}</i></small>
        @endif 
        </div>

        <div class="col-sm">
        {!! Form::label('password-confirm','Confirm Password')!!}
        
        {!!  Form::password('password_confirmation',array('class' => 'form-control', 'id' => 'password-confirm', 'required' => true, 'autocomplete' => 'new-password')) !!}

        @if($errors->has('password_confirmation'))
        <small class="form-text text-muted"><i>*{{ $errors->first('password_confirmation') }}</i></small>
        @endif 
    </div>
    </div>

        <div class="row" style="margin-top: 10px">
            <div class="col-sm-4 offset-sm-4">

{!!  Form::hidden('job_id', 1) !!}

             {!! Form::submit('Register', ['class' => 'btn btn-success','style' =>'width:100%'] ) !!}
            </div>
        </div>
                    
</div>
        </td>
        <td style="padding-left: 20px; padding-right: 0px"> 
        
            <img src="https://i.pinimg.com/originals/99/c3/68/99c36881337ac6439549000f6c9845ed.png" width="100%" height="590" style="object-fit: cover;object-position: center; border-radius: 0px 20px 20px 0px; position: relative;bottom: 0px">

         

            <div style="position: relative;bottom:300px ; color: #183C18; font-size: 30px; text-shadow: white 2px 2px 5px; text-align: center;font-family:">
                <h2 style="font-family:;"><b>Welcome To Our Pet Shop</b></h2>
                <br>
            <b class="hovicon effect-8" style="height: 50px; width: 50px;margin: 0px; position: relative; left: 60px; top: 15px"></b>
              <i class=" fas fa-paw" style="font-size: 30; padding-right: 0px; color: #183C18; border: 3px dashed darkgreen; padding :10px; border-radius: 20px; margin-top: 0px; z-index: 3"></i> <b style="padding-left: 10px"> PetMania</b>
             </div>
        </td>
    </tr>
</table>
                    {!! Form::close() !!}
                
            </div>
        </div>
    </div>
</div>


@include('design.style')
@endsection
