<div id="editAnimalModalContent">

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
<h2 style="text-align: center; margin-top: 30px">
	Edit Animal
</h2>


<img id="animal_image" src="" class="img" alt="animal Image" style="width: 40%; height: 300px; border-radius: 150px; object-fit: cover; border: 10px solid  #00abed; position: absolute; left: 30%; right: 5%; margin-top: 50px;" >
	
	<div class="form-group" style="margin-top:300px">

		 {!! Form::label('exampleFormControlSelect1','Update Animal Image')!!}<br>
           {{ Form::file('animal_pic',['id' => 'animal_pic', ]) }} 
           @if($errors->has('animal_pic'))
	        <small class="form-text text-muted"><i>*{{ $errors->first('animal_pic') }}</i></small>
	       @endif
	<br>	
		{!!  Form::hidden('animal_id',null,array('id' => 'animal_id')) !!}

	   {{--  {!!  Form::text('old_animal_adopter',null,array('id' => 'old_animal_adopter')) !!} --}}

		{!! Form::label('animal_name','Pet Name')!!}
	    {!!  Form::text('animal_name',null,array('class' => 'form-control', 'id' => 'animal_name')) !!}
	    @if($errors->has('animal_name'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('animal_name') }}</i></small>
	    @endif
  <br>
	    {!! Form::label('animal_age','Pet Age')!!}
	    {!!  Form::text('animal_age',null,array('class' => 'form-control','id'=>'animal_age')) !!}
		@if($errors->has('animal_age'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('animal_age') }}</i></small>
	    @endif

<br>
	    {!! Form::label('animal_breed','Pet Breed')!!}
	    {!!  Form::text('animal_breed',null,array('class' => 'form-control','animal_breed')) !!}
		@if($errors->has('animal_breed'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('animal_breed') }}</i></small>
	    @endif
   <br>
	  {!! Form::label('category_id','Type')!!}
	    {!!  Form::select('category_id',[], null, ['class' => 'form-control', 'id' => 'category_id']) !!} 
        @if($errors->has('category_id'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('category_id') }}</i></small>
	    @endif
<br>
        {!! Form::label('rescuer_id','Rescuer')!!}
	    {!!  Form::select('rescuer_id',[], null, ['class' => 'form-control', 'id' => 'rescuer_id']) !!} 
        @if($errors->has('rescuer_id'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_id') }}</i></small>
	    @endif
<br>
 
       {!! Form::label('veterinarian_id','Assign Veterinarian')!!}
	    {!!  Form::select('veterinarian_id',[], null, ['class' => 'form-control', 'id' => 'veterinarian_id']) !!} 
        @if($errors->has('veterinarian_id'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_id') }}</i></small>
	    @endif
 
<br> 	
		


 		
	 	    {!! Form::label('adopter_id','Adopter')!!}
		    {!!  Form::select('adopter_id',[], null,['class' => 'form-control', 'id' => 'adopter_id']) !!} 
	       {{--  @if($errors->has('adopter_id'))
		    <small class="form-text text-muted"><i>*{{ $errors->first('adopter_id') }}</i></small>
		    @endif --}}
		
		
<br>
        {!! Form::label('Illness')!!}
        @if($errors->has('disease_id'))
	    <small class="form-text text-muted"><i>*{{ $errors->first('disease_id') }}</i></small>
	    @endif
        <br>
          {{--  @foreach ($diseases as $disease => $disease_name)
	           @php 
	           	$hasDis = 0;
	           		foreach ($animal->diseases as $Adisease) {

	           			if($Adisease->id == $disease){
	           				$hasDis = 1;
	           			}
	           		}
	           @endphp
           <div class="form-check form-check-inline">
           @if ($hasDis == 1)
           {!! Form::checkbox('disease_id[]',$disease, true, array('class'=>'form-check-label','id'=>'disease_id')) !!} 
            {!!Form::label('Illness', $disease_name,array('class'=>'illLabel')) !!}

           @else
          {!! Form::checkbox('disease_id[]',$disease, null, array('class'=>'form-check-label','id'=>'disease_id')) !!} 
            {!!Form::label('Illness', $disease_name,array('class'=>'illLabel')) !!}
           
           @endif
           </div>
           <br>
          @endforeach 
 --}}

            <div id="disease_id">

		    </div>

	    	<br>
            {!! Form::label( 'Gender') !!}
            <div>
                <div class="radio">

              		
                    {!! Form::radio('animal_gender', 'Male', null, ['id' => 'radio1',  'class' => 'form-control', 'style' =>'width:250px;box-shadow:none']) !!}
                    {!! Form::label('radio1', 'Male') !!}<br>
               
                    {!! Form::radio('animal_gender', 'Female', null, ['id' => 'radio1',  'class' => 'form-control', 'style' =>'width:250px;box-shadow:none']) !!}
                    {!! Form::label('radio1', 'Female') !!}
               
                </div>
             
               
            </div>
            @if($errors->has('animal_gender'))
	        <small class="form-text text-muted"><i>*{{ $errors->first('animal_gender') }}</i></small>
	        @endif


          
  </div>

{{--    <div style="width: 100px; margin: auto;">
 {!! Form::submit('Update', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
      </div>      
 --}}

</div>

