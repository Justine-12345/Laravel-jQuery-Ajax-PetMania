<div id="RegisterContainer">


<style type="text/css">
        label {
        font-weight: 500;
        color: white;
    }
        .illLabel {
        font-weight: 100;
        color: white;
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
       
        font-size: 13px;
        color: white;
    }
      </style>



 <div class="container style fade-in">
    <div class="justify-content-center">
        <div class="col-lg-12">


<a id="loginToRegister" style="z-index: 5; position: relative;text-decoration: none;"><i class="far fa-arrow-alt-circle-left" style="font-weight: 900; color: #00abed; font-size: 20px; padding: 5px; padding-left: 2%;"></i>
    <b style="color: #00abed">Log in</b>
</a>

 <div class="form-group  " style="box-shadow: 2px 2px 10px  gray; padding-left: 20px; height: 630px; background-color: #00abed; padding-top: 0px; border-radius: 20px; ">

    <form id="registerform" method="post" action="#" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
    <tr>            



<td style="width: 60%; position:relative; top: -90px;">


<div class="row" style="width:100%">
<div class="col-md">

<h2 style="text-align: center;">
  <b style=" color:white; font-size: 30px; position:relative;"> Create Account</b>
</h2>
</div>
</div>
            <div class="row" style="border: 0px solid white; width:100%">

                    <div class="col-md text-center"><p>{{ Form::file('user_pic',['id' => 'file', 'accept' =>'image/*', 'onchange' => 'loadFile(event)', 'style' => 'display:none']) }} 
                    </p>
                    <p class=" justify-content-center"><img id="output" width="100" class="border border-primary" style="border: none; border-radius: 200px; object-fit: cover; width: 100px; height: 100px" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" /></p>

                    <p class=" justify-content-center"><label class="btn btn-outline-primary border border-primary" for="file" style="cursor: pointer; border-color: white; font-size: 12px; color: white">Upload Image</label></p>

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



        <div class="row" style="width:100%">
        <div class="col-sm-6">  
        {!! Form::label('user_fname','First Name')!!}
        {!!  Form::text('user_fname',$value = null,array('class' => 'form-control', 'id' => 'user_fname', 'required')) !!}
        @if($errors->has('user_fname'))
        <small class="form-text text-muted"><i>*{{ $errors->first('user_fname') }}</i></small>
        @endif
        </div>

        <div class="col-sm-6">
        {!! Form::label('user_lname','Last Name')!!}
        {!!  Form::text('user_lname',$value = null,array('class' => 'form-control', 'id' => 'user_lname', 'required')) !!}
        @if($errors->has('user_lname'))
        <small class="form-text text-muted"><i>*{{ $errors->first('user_lname') }}</i></small>
        @endif
        </div>
      </div>


    <div class="row" style="width:100%">
        <div class="col-sm-6">
        {!! Form::label('email','Email')!!}
        {!!  Form::email('email',$value = null,array('class' => 'form-control', 'id' => 'email', 'required')) !!}
        @if($errors->has('email'))
        <small class="form-text text-muted"><i>*{{ $errors->first('email') }}</i></small>
        @endif
        </div>
        <div class="col-sm-6">
        {!! Form::label('user_contact','Contact Num')!!}
        {!!  Form::text('user_contact',$value = null,array('class' => 'form-control','id'=>'user_contact', 'required')) !!}
        @if($errors->has('user_contact'))
        <small class="form-text text-muted"><i>*{{ $errors->first('user_contact') }}</i></small>
        @endif
        </div>
    </div>

    <div class="row" style="width:100%">
        <div class="col-sm-6">
        {!! Form::label('user_gender','Gender')!!}
        {!!  Form::select('user_gender',['Male'=>'Male', 'Female'=>'Female'], null, ['class' => 'form-control', 'id' => 'user_gender', 'required']) !!} 
        @if($errors->has('user_gender'))
        <small class="form-text text-muted"><i>*{{ $errors->first('user_gender') }}</i></small>
        @endif
        </div>
     
        <div class="col-sm-6">
        {!! Form::label('user_age','Age')!!}
        {!!  Form::Number('user_age',$value = null,array('class' => 'form-control','id'=>'user_age', 'max' => '100', 'min' => '18', 'required')) !!}
        @if($errors->has('user_age'))
        <small class="form-text text-muted"><i>*{{ $errors->first('user_age') }}</i></small>
        @endif
        </div>
    </div>

  
<div class="row" style="width:100%">
    <div class="col-lg-12">
        {!! Form::label('user_address','Address')!!}
        {!!  Form::text('user_address',$value = null,array('class' => 'form-control','id'=>'user_address', 'required')) !!}
        @if($errors->has('user_address'))
        <small class="form-text text-muted"><i>*{{ $errors->first('user_address') }}</i></small>
        @endif
    </div>
</div>


    <div class="row" style="width:100%">
        <div class="col-sm-6">
        {!! Form::label('password','Password')!!}
        {!!  Form::password('password',array('class' => 'form-control', 'id' => 'password', 'required')) !!}
        @if($errors->has('password'))
        <small class="form-text text-muted"><i>*{{ $errors->first('password') }}</i></small>
        @endif 
        </div>

        <div class="col-sm-6">
        {!! Form::label('password-confirm','Confirm Password')!!}
        
        {!!  Form::password('password_confirmation',array('class' => 'form-control', 'id' => 'password_confirm', 'required' => true, 'autocomplete' => 'new-password')) !!}

        @if($errors->has('password_confirmation'))
        <small class="form-text text-muted"><i>*{{ $errors->first('password_confirmation') }}</i></small>
        @endif 
    </div>
    </div>

        <div class="row" style="width:100%">
            <div class="col-sm" style="width: 100px; margin:auto; margin-top: 20px;">

{!!  Form::hidden('role', 'new') !!}

             {!! Form::submit('Register', ['class' => 'btn btn-primary','style' =>'width:100%', 'id'=>'registerSubmit']) !!}
            </div>
        </div>

        </td>
        <td style="padding-left: 20px; padding-right: 0px"> 
        
            <img src="https://i.pinimg.com/originals/99/c3/68/99c36881337ac6439549000f6c9845ed.png" width="100%" height="630" style="object-fit: cover;object-position: center; border-radius: 0px 20px 20px 0px; position: relative;bottom: 0px">

         

            <div style="position: relative;bottom:300px ; color: #00abed; font-size: 30px; text-shadow: white 2px 2px 5px; text-align: center;font-family:">
                <h2 style="font-family:;"><b>Welcome To Our Pet Shop</b></h2>
                <br>
            <b class="hovicon effect-8" style="height: 50px; width: 50px;margin: 0px; position: relative; left: 60px; top: 15px"></b>
              <i class=" fas fa-paw" style="font-size: 30; padding-right: 0px; color: #00abed; border: 3px dashed #00abed; padding :10px; border-radius: 20px; margin-top: 0px; z-index: 3"></i> <b style="padding-left: 10px"> PetMania</b>
             </div>
        </td>
    </tr>
</table>
                    </form>
                
            </div>
        </div>
    </div>
</div>


@include('design.style')
</div>
