@extends('layouts.base')
@include('layouts.nav')
@section('body')
<style type="text/css">
    .inRight{
      float: right;
      font-size: 25px;
      color: #eaedf2;
    }
    th{
      color: #eaedf2;
    }
    .animal{
      color: #eaedf2;
      padding-left: 20px;
      font-weight: 700;
    }
    .ai{
      padding-left: 40px
    }

</style>


<div>


  <h2 style="margin-top: 30px; text-align: center;">Your account was <b>banned</b>. If you have any inquiry regarding to this issue please contact us.</h2>
  <h4 style="text-align: center;"><a href="{{route('message.create')}}"><button class="btn btn-primary">Contact Us</button></a> </h4>


@stop