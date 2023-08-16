<div  id="LoginContainer">

<style type="text/css">
            label {
        margin-top: 0px;
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
    }
    label{
        color: white;
    }

    .login{
        font-size: 20px;
        font-weight: 500;
    }

    *{
        border: 0px solid white;
    }



    </style>

{{-- <div style="position:absolute;width: 100%;"> --}}

{{-- </div> --}}
<div class="col-md-4"></div>
<div class="col-md-5">
 <div class="animate__animated animate__fadeInLeft col-md-4" style="box-shadow: gray 2px 2px 10px;
 height: 560px; background-color: #00abed; border-radius: 0pc; width: 400px;z-index: 5;border-radius: 5px;margin-top: 15px;">

<div style="text-align:center;margin-top: 30px;">

<i class="fas fa-paw" style="font-size: 50px; color: #f0f4f6; border: 3px dashed #f0f4f6; border-radius: 30px;position: relative; bottom:px; padding: 20px;margin-bottom: 30px;"></i>

</div>  


  <b style=" color: white; font-size: 35px; padding-right: 15px; display:block;text-align: center;"> PetMania Login </b>

  
<div class=" alert alert-danger" id="loginWarning" role="alert" style="height: 25px; padding-top: 0px;position: fixed; display: block; width: 350px; font-weight:700; margin-top:0px;"></div>


  

<div class="row" style="margin-top: 10px;">
   {{--  {!!Form::open(['route' => 'check', 'method' => 'post', ]) !!} --}}
   <form id="loginForm" method="post" action="#" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="col-lg" style="margin-left: 20px;">  
        {!! Form::label('email','Email:')!!}
        {!!  Form::email('email',$value = null,array('class' => 'form-control', 'id' => 'email', 'required', 'style' => '')) !!}
        @if($errors->has('email'))
        <small class="form-text text-muted"><i>*{{ $errors->first('email') }}</i></small>
        @endif
       
        </div>

        <div class="col-lg" style="margin-top:30px; margin-left: 20px;">
        {!! Form::label('password','Password:')!!}
        {!!  Form::password('password',array('class' => 'form-control', 'id' => 'password', 'required')) !!}

        @if($errors->has('password'))
        <small class="form-text text-muted"><i>*{{ $errors->first('password') }}</i></small>
        @endif 
        </div>
        <br>

     {{--    <div class="col-lg text-center" style="margin-top: 30px;">
        {!! Form::checkbox('remember') !!}
        {!! Form::label('remember','Remember me')!!}
        </div>
    --}}
     
        <div class="col justify-content-center" style="text-align: center;margin-left: 20px;">

        {!! Form::submit('Log in', ['class' => 'login btn btn-primary','style' =>'width:100%', 'id'=>'loginSubmit'] ) !!}
      {{--   <a href="{{ route('forgot') }}" style="color: white">
        <b>Forgot Password?</b>
        </a> --}}
        </div>
                   
        
</form>
</div>


<div class="row">
<div class="col-md" style="margin-left:15px">
<hr>
</div>
</div>

<div class="row" style="margin-top: 10px">
            <div class="col justify-content-center" style="text-align: center;margin-left: 20px;">

             <a class="login btn btn-primary" style="color: white; width: 100%" id="registerBtnLogin">
             <b>Create Account</b>
             </a>
            </div>
        </div> 


     
</div>
</div>
<div class="col-md-3"></div>

@include('design.style')
</div>























