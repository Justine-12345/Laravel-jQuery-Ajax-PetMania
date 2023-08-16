<div id="addDiseaseModalContent">
	<div class="form-group">
		

		{!! Form::label('disease_name','Disease Name')!!}
	    {!!  Form::text('disease_name',$value = null,array('class' => 'form-control', 'id' => 'disease_name')) !!}
	    @if($errors->has('disease_name'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('disease_name') }}</i></small>
	    @endif

	    {!! Form::label('disease_desc','Disease Discription')!!}
	    {!!  Form::textarea('disease_desc',$value = null,array('class' => 'form-control','id'=>'disease_desc')) !!}
		@if($errors->has('disease_desc'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('disease_desc') }}</i></small>
	    @endif
	 
  </div>

{{--    <div style="width: 100px; margin: auto;">
 {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
      </div>      

	{!! Form::close() !!} --}}

</div>
