<div id="editDiseaseModalContent">

	<style type="text/css">
		label {
		margin-top: 15px;
		font-weight: 500;
		color: black;
	}
		.illLabel {
		font-weight: 100;
		padding-bottom: 10px;
		padding-left: 5px;
	}
		i {
		color: red;
		font-weight: 500;
		text-shadow: white 1px 1px 2px;
	}

	</style>
<h2 style="text-align: center; margin-top: 30px; color:#1b293e">
	Edit Disease
</h2>

	<div class="form-group">
		{!!  Form::hidden('id',null,array('id' => 'id')) !!}

		{!! Form::label('disease_name','Disease Name')!!}
	    {!!  Form::text('disease_name',null,array('class' => 'form-control', 'id' => 'disease_name')) !!}
	    @if($errors->has('disease_name'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('disease_name') }}</i></small>
	    @endif

	    {!! Form::label('disease_desc','Disease Description')!!}
	    {!!  Form::textarea('disease_desc',null,array('class' => 'form-control', 'id' => 'disease_desc')) !!}
	    @if($errors->has('disease_desc'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('disease_desc') }}</i></small>
	    @endif

          
  </div>

   <div style="width: 100px; margin: auto;">
{{--  {!! Form::submit('Update', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
      </div>      

	{!! Form::close() !!} --}}

</div>
</div>