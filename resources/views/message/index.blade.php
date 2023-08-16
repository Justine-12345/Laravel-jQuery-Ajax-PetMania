@extends('layouts.base')
@include('layouts.nav')
@section('body')

<div>
<style type="text/css">
  tr {
    font-size: 12px;
    text-align: left;
  }
  a{
    color: black;
    text-decoration: none;
  }

   a:hover {
    color: red;
    text-decoration: none;
  }

    i {
    font-size: 15px;
    padding: 5px;
  }
  
</style>

@if($message = Session::get('success') )

<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 80%; margin: auto; margin-top: 30px">
  <strong>{{ $message }} <i class="fas fa-check" style="color: green"></i></strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif


{{-- <div style="position: fixed;width: 10% ; right: 5px; bottom:0px;" >
<h2>
@if(auth()->user()->role == "admin")
<form action="{{ route('disease.create') }}" method="get">
<button type="submit" class="btn" style="width: 100%; font-size: 12px; background-color: #1DD023; color: white" >Add <i class="fas fa-plus"></i></button>
</form>
@endif
<div>
</h2>
</div> --}}


 <br /> <h3 align="center">Message Inbox</h3> <br /> 
  <div class="table-responsive table-striped"> 
  <div class="panel panel-default" style="box-shadow: 1px 1px 6px gray; margin-right: 30px; margin-left:30px"> <div class="panel-heading">{{date('M-d-Y')}}</div> 
  <div class="panel-body"> {!! $dataTable->table() !!} 
   </div> </div> </div> <br /> <br /> 



{!! $dataTable->scripts() !!}
</div>
<style type="text/css">
  .page-link{
    color: darkgreen;
  }
  .page-link:hover {
    background-color: lightgreen;
  }
</style>
@stop





