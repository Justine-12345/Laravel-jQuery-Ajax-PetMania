@extends('layouts.base')
@include('layouts.nav')
@section('body')
<div class="alert alert-primary" role="alert" style="width: 80%; margin: auto;margin-top: 10px; text-align: center; font-size: 30px; background-color: #00abed; border: none; color: white;">
  Ready To Adopt Animals
</div>


@if($message = Session::get('success') )

<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 80%; margin: auto; margin-top: 30px">
  <strong>{{ $message }} <i class="fas fa-check" style="color: green"></i></strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="container" style="margin-top: 20px">
{!!Form::open(['route' => 'search']) !!}

<div class="row">
	<div class="col-md-11" style="display: inline-block;">
 {!!  Form::text('search',$value = null,array('class' => 'form-control', 'id' => 'disease_name',  'placeholder' => 'Search Animals Here...')) !!}
    </div>
    <div class="col-md" style="display: inline-block;">
	      <div style="font-size: 15px">
 {!! Form::submit('Search', ['class' => 'btn btn-lg btn-info pull-right', 'style' => 'font-size:13px'] ) !!}
      </div>  
  </div>
	{!! Form::close() !!}
</div>
	
		
<h1>Search</h1>

There are {{ $searchResults->count() }} results

@foreach($searchResults->groupByType() as $type => $modelSearchResults)
   <h2>{{ $type }}</h2>
   
   @foreach($modelSearchResults as $searchResult)
       <ul>
            <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
       </ul>
   @endforeach
	
@endforeach


</div>



@stop