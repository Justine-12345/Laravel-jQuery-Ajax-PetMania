{{-- 

	<style type="text/css">
		label {
		margin-top: 15px;
		font-weight: 500;
		color: white;
	}
		.illLabel {
		font-weight: 100;
	}
		i {
		color: red;
		font-weight: 500;
		text-shadow: white 1px 1px 2px;
	}

	</style>
<h2 style="text-align: center; margin-top: 30px">
	Add New Animal
</h2>
<a href="{{ route('animal.index') }} "><i class="far fa-arrow-alt-circle-left" style="font-weight: 900; color: #00abed; font-size: 20px; padding: 5px; padding-left: 13%"></i>
</a>
<div style="width: 80%; margin: auto; margin-top: 10px; background-color: #00abed; padding: 30px; border-radius: 10px; padding-bottom: 60px; margin-bottom: 30px" >


@if(count($errors) > 0)

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Invalid input encountered <i class="fas fa-exclamation-triangle"></i></strong> Please review your inputs and try to resubmit .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>



@endif
 --}}

<div id="addAnimalModalContent">



			{{-- {!!Form::open(['route' => 'animal.store', 'files' => true]) !!} --}}
			<div class="form-group">
				

				{!! Form::label('animal_name','Pet Name')!!}
			    {!!  Form::text('animal_name',$value = null,array('class' => 'form-control', 'id' => 'animal_name')) !!}
			    @if($errors->has('animal_name'))
			    <small class="form-text text-muted"><i>*{{ $errors->first('animal_name') }}</i></small>
			    @endif
		<br>
			    {!! Form::label('animal_age','Pet Age')!!}
			    {!!  Form::text('animal_age',$value = null,array('class' => 'form-control','id'=>'animal_age')) !!}
				@if($errors->has('animal_age'))
			    <small class="form-text text-muted"><i>*{{ $errors->first('animal_age') }}</i></small>
			    @endif

		<br>
			    {!! Form::label('animal_breed','Pet Breed')!!}
			    {!!  Form::text('animal_breed',$value = null,array('class' => 'form-control','animal_breed')) !!}
				@if($errors->has('animal_breed'))
			    <small class="form-text text-muted"><i>*{{ $errors->first('animal_breed') }}</i></small>
			    @endif
		<br>
			   
			    {!! Form::label('category_id','Type')!!}
	

			  <input list="category_id" name="category_id" value="{{old('category_id') != null? old('category_id'):null }}" class="form-control">
				<datalist id="category_id">
				</datalist>

		<br>
 
		        @if($errors->has('category_id'))
			    <small class="form-text text-muted"><i>*{{ $errors->first('category_id') }}</i></small>
			    @endif
		<br>
		 {!! Form::label('rescuer_id','Rescuer')!!}<span style="float:right; font-style: italic; margin-left:3px">Add New Rescuer</span> <input type="checkbox" id="newRescuer" style="float:right"> 
		 <br>

		<span id="existingRescuer" style="width:100%">
		      
			    {!!  Form::select('rescuer_id',[], null, ['class' => 'form-control', 'id' => 'rescuer_id']) !!} 
		        @if($errors->has('rescuer_id'))
			    <small class="form-text text-muted"><i>*{{ $errors->first('rescuer_id') }}</i></small>
			    @endif
		</span>

			    <div id="addNewRescuer" style="border: 1px solid #b8b4b4; padding:12px; box-shadow: 1px 1px 5px #757171; border-radius:5px">
			    		<h2>Add New Rescuer</h2>
			    		<label>First Name</label>
			    		<input type="text" name="a_rescuer_fname" id="a_rescuer_fname" class="form-control">

			    		<label>Last Name</label>
			    		<input type="text" name="a_rescuer_lname" id="a_rescuer_lname" class="form-control">

			    		<label>Age</label>
			    		<input type="number" name="a_rescuer_age" id="a_rescuer_age" class="form-control">

			    		<label>Contact</label>
			    		<input type="text" name="a_rescuer_contact" id="a_rescuer_contact" class="form-control">

			    		<label>Address</label>
			    		<input type="text" name="a_rescuer_address" id="a_rescuer_address" class="form-control">

			    		<label>Gender</label><br>
			    		Male <input type="radio" name="a_rescuer_gender" id="a_rescuer_gender1" value="Male" class=""><br>
			    		Female <input type="radio" name="a_rescuer_gender" id="a_rescuer_gender2" value="Female" class="">
			    </div>



		<br>
			    {!! Form::label('veterinarian_id','Assign Veterinarian')!!}<span style="float:right; font-style: italic; margin-left:3px">Add New Veterinarian</span> <input type="checkbox" id="newVeterinarian" style="float:right"> 

<span id="existingVeterinarian" style="width:100%">
			    {!!  Form::select('veterinarian_id',[], null, ['class' => 'form-control', 'id' => 'veterinarian_id']) !!} 
		        @if($errors->has('veterinarian_id'))
			    <small class="form-text text-muted"><i>*{{ $errors->first('veterinarian_id') }}</i></small>
			    @endif
</span> 


<div id="addNewVeterinarian" style="border: 1px solid #b8b4b4; padding:12px; box-shadow: 1px 1px 5px #757171; border-radius:5px">
			    		<h2>Add New Veterinarian</h2>
			    		<label>First Name</label>
			    		<input type="text" name="a_veterinarian_fname" id="a_veterinarian_fname" class="form-control">

			    		<label>Last Name</label>
			    		<input type="text" name="a_veterinarian_lname" id="a_veterinarian_lname" class="form-control">

			    		<label>Age</label>
			    		<input type="number" name="a_veterinarian_age" id="a_veterinarian_age" class="form-control">

			    		<label>Contact</label>
			    		<input type="text" name="a_veterinarian_contact" id="a_veterinarian_contact" class="form-control">

			    		<label>Address</label>
			    		<input type="text" name="a_veterinarian_address" id="a_veterinarian_address" class="form-control">

			    		<label>Gender</label><br>
			    		Male <input type="radio" name="a_veterinarian_gender" id="a_veterinarian_gender1" value="Male" class=""><br>
			    		Female <input type="radio" name="a_veterinarian_gender" id="a_veterinarian_gender2" value="Female" class="">
</div>




		<br>

		        {!! Form::label('Illness')!!}
		        @if($errors->has('disease_id'))
			    <small class="form-text text-muted"><i>*{{ $errors->first('disease_id') }}</i></small>
			    @endif
		        <br>
		       	<div id="disease_id">
		       		
		       	</div>
		        	
		        	<br>
		        
			    	<br>
		           
		            <div >
		            	 {!! Form::label( 'Gender') !!}
		                <div class="radio" >
		                    
		                    {!! Form::radio('animal_gender', 'Male', true, ['id' => 'radio1', 'style' =>'width:250px;box-shadow:none' ]) !!}
		                    {!! Form::label('radio1', 'Male', [ 'class' => '']) !!}
		                </div>
		             
		                <div class="radio">
		                   
		                    {!! Form::radio('animal_gender', 'Female', false, ['id' => 'radio2', 'style' =>'width:250px;box-shadow:none']) 
		                    !!}
		                     {!! Form::label('radio2', 'Female') !!}
		                </div>
		            </div>
		            @if($errors->has('animal_gender'))
			        <small class="form-text text-muted"><i>*{{ $errors->first('animal_gender') }}</i></small>
			        @endif
		<br>
			        <div class="form-group">
		           {!! Form::label('exampleFormControlSelect1','Upload Animal Image')!!}<br>
		           {{ Form::file('animal_pic',['id' => 'animal_pic', ]) }} 


		           @if($errors->has('animal_pic'))
			        <small class="form-text text-muted"><i>*{{ $errors->first('animal_pic') }}</i></small>
			       @endif
			      </div>

		  </div>
</div>
		  {{--  <div style="width: 100px; margin: auto;">
		 {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
		      </div>  --}}     

			{{-- {!! Form::close() !!} --}}



