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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #00abed;margin-top: 60px;padding: 24px; border-radius: 1%; box-shadow: 1px 1px 5px grey;">
                <div class="card-header" style="color:white;"><h3>{{ __('View Message') }}</h3></div>

                <div class="card-body">
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

     			<p><b>Subject: </b>{{ ucwords($messages->message_subject )}}</p>
     			<p><b>Date: </b>{{ ucwords($messages->message_date )}}</p>
     			<p><b>Sender: </b>{{ ucwords($messages->message_fname )}} {{ ucwords($messages->message_lname )}}</p></p>
     			<p><b>Contact No: </b>{{ ucwords($messages->message_contact )}}</p>
     			<p><b>Email: </b>{{ $messages->message_email }}</p>
                <hr>
     			<p><b>Message: </b><br>{{ ucwords($messages->message_content )}}</p>
                    

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@stop