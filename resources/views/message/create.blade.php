@extends('layouts.base')
@include('layouts.nav')
@section('body')

<style type="text/css">
    p {
        margin: 5px;
        color: white;
    }
</style>

<div class="container">
@if($message = Session::get('success') )
<br>
<div class="alert alert-primary" role="alert" style="margin:auto;background: #5acdfa; margin-right: 135px; margin-left:135px; color: white; border: 5px solid white; border-radius: 10px"><b>{{$message}}</b></div>
@endif

@if($errors->has('message_content'))
<br>
<div class="alert alert-primary" role="alert" style="margin:auto;background: red; margin-right: 135px; margin-left:135px; color: white; border: 5px solid white; border-radius: 10px"><b>Illegal Or Bad Words Are Not Allowed For Sending Message</b></div>
@endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="background-color: #00abed;margin-top: 60px; border-radius: 10px;">
                <div class="card-header" style="padding:24px"><h1 style="color:white">{{ __('Create Message') }}</h1></div>

                <div class="card-body" style="padding: 24px;">

                  @if (session('status')) 
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                 
    {!!Form::open(['route' => 'message.store']) !!}
    <div class="form-group">

              <div class="form-group" >
 <p>
        {!! Form::label('message_subject','Subject')!!}
        {!!  Form::text('message_subject',$value = null,array('class' => 'form-control', 'id' => 'message_subject')) !!}
        @if($errors->has('message_subject'))
        <small class="form-text text-muted"><i>*{{ $errors->first('message_subject') }}</i></small>
        @endif
</p>

<p>
        {!! Form::label('message_fname','Your FirstName')!!}
        {!!  Form::text('message_fname',$value = null,array('class' => 'form-control', 'id' => 'message_fname')) !!}
        @if($errors->has('message_fname'))
        <small class="form-text text-muted"><i>*{{ $errors->first('message_fname') }}</i></small>
        @endif
</p>

<p>
        {!! Form::label('message_lname','Your LastName')!!}
        {!!  Form::text('message_lname',$value = null,array('class' => 'form-control', 'id' => 'message_lname')) !!}
        @if($errors->has('message_lname'))
        <small class="form-text text-muted"><i>*{{ $errors->first('message_lname') }}</i></small>
        @endif
</p>
<p>

        {!! Form::label('message_contact','Your Contact No.')!!}
        {!!  Form::text('message_contact',$value = null,array('class' => 'form-control', 'id' => 'message_contact')) !!}
        @if($errors->has('message_contact'))
        <small class="form-text text-muted"><i>*{{ $errors->first('message_contact') }}</i></small>
        @endif
</p>
<p>
        {!! Form::label('message_email','Your Email')!!}
        {!!  Form::email('message_email',$value = null,array('class' => 'form-control', 'id' => 'message_email')) !!}
        @if($errors->has('message_email'))
        <small class="form-text text-muted"><i>*{{ $errors->first('message_email') }}</i></small>
        @endif
</p>
    <br>
    {!!  Form::textarea('message_content',$value = null,array('class' => 'form-control', 'id' => 'message_content','placeholder'=>'Enter Your Message Here...')) !!}
        @if($errors->has('message_content'))
        <small class="form-text text-muted"><i>*{{ $errors->first('message_content') }}</i></small>
        @endif
                           
        {!!  Form::hidden('message_date', date('Y-m-d')) !!}


                        </div>

                        <div class="form-group row text-center">
                            <div class="col-md-12" style="border: 0px solid white">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button>
                                 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
