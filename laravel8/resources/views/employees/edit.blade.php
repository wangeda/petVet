@extends ("layouts.head")

@section("content")
<div class=' d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		@lang('employees Creation Form')
	</h1>
</div>

<div style="text-aling:center" class="row justify-content-center">
	<div class="col-sm-7">		
		<form method="POST" action="{{url('employees/'.$employee->id)}}">
			@method('PUT')

			<div class="form-group row">
				<!--Nombre-->
				<div class="col-sm-4">
					<label for="name"><strong>@lang('Name')</strong> </label>
					<input type="text" class="form-control " name="name" placeholder="@lang('Name')..." value="{{$employee->name}}">
				@error('name')
					<strong class="invalid"> {{ $message}}</strong>
				 @enderror
				</div>

				<!--primer apellido-->
				<div class="col-sm-4">
					<label for="first_surname" ><strong>@lang('First Surname')</strong></label>
				  	<input type="text"  class="form-control" name="first_surname" id="first_surname" placeholder="@lang('First Surname')..." value="{{$employee->first_surname}}">
					@error('first_name')
						<strong class="invalid"> {{ $message}}</strong>
					 @enderror
				</div>

				<!--segundo apellido-->
				<div class="col-sm-4">
					<label for="second_surname" ><strong>@lang('Second Surname')</strong></label>
				  	<input type="text"  class="form-control" name="second_surname" id="second_surname" placeholder="@lang('Second Surname')..."  value="{{$employee->second_surname}}">
				</div>
			</div>


			<div class="form-group row">	

				<!--dni-->
				<div class="col-sm-6">
					<label for="dni" ><strong>@lang('DNI')</strong></label>
					<input type="text"  class="form-control" name="dni" id="dni" placeholder="@lang('DNI')"  value="{{$employee->dni}}">
					@error('dni')
						<strong class="invalid"> {{ $message}}</strong>
					 @enderror
				</div>

				<!--fecha nacimiento-->
				<div class="col-sm-6">
					<label for="date_of_birth" ><strong>@lang('Date of birth')</strong></label>
					<input type="date"  class="form-control" name="date_of_birth" id="date_of_birth" value="{{$employee->date_of_birth}}">
					@error('date_of_birth')
						<strong class="invalid"> {{ $message}}</strong>
					 @enderror
				</div>

			</div>

			<div class="form-group row">

				<!--direccion-->
				<div class="col-sm-6">
				<label for="address" ><strong>@lang('Address')</strong></label>
				  <input type="text"  class="form-control" name="address" id="address" placeholder="@lang('Address')" value="{{$employee->address}}">
					@error('address')
						<strong class="invalid"> {{ $message}}</strong>
					 @enderror
				</div>

				<!--Codigo postal-->
				<div class="col-sm-6">
				<label for="CP" ><strong>@lang('Postal Code')</strong></label>
				  <input type="text"  class="form-control" name="CP" id="CP" placeholder="@lang('Postal Code')"  value="{{$employee->CP}}">
					@error('CP')
						<strong class="invalid"> {{ $message}}</strong>
					 @enderror
				</div>
			</div>

			<div class="form-group row">

				<!--telefono-->
				<div class="col-sm-3">
					<label for="phone" ><strong>@lang('Phone')</strong></label>
					<input type="text"  class="form-control" name="phone" id="phone" placeholder="@lang('Phone')" value="{{$employee->phone}}">
				</div>

				<!--movil-->
				<div class="col-sm-3">
					<label for="mobile" ><strong>@lang('Mobile')</strong></label>
					<input type="text"  class="form-control" name="mobile" id="mobile" placeholder="@lang('Mobile')"  value="{{$employee->mobile}}">
					@error('mobile')
						<strong class="invalid"> {{ $message}}</strong>
					 @enderror
				</div>

				<!--email-->

				<div class="col-sm-6">
					<label for="email"><strong>@lang('Email')</strong> </label>
					<input type="text" class="form-control " name="email" placeholder="@lang('Email')..." value="{{$employee->email}}">
					@error('email')
						<strong class="invalid"> {{ $message}}</strong>
					 @enderror
				</div>
			</div>

				<div class="form-group row">

				<!--especilizacion-->
				<div class="col-sm-6">
				<label for="specialization"><strong>@lang('Specialization')</strong> </label>
					<select class="form-control" style="width: 100%" name="specialization" id="specialization" value="{{$employee->specialization}}" >
						<option value="Anesthesiology">@lang('Anesthesiology')</option>
						<option value="Cardiology">@lang('Cardiology')</option>
						<option value="Surgery">@lang('Surgery')</option>
						<option value="Dermatology">@lang('Dermatology')</option>
						<option value="Physiotherapy">@lang('Physiotherapy')</option>
						<option value="Neurology">@lang('Neurology')</option>
						<option value="Ophthalmology">@lang('Ophthalmology')</option>
						<option value="Orthopedics">@lang('Orthopedics')</option>
						<option value="Others">@lang('Others')</option>
					</select>
					@error('specialization')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>

				<!-- Carnet de conducir-->
				<div class="col-sm-6">
				<label for="department_id"><strong>@lang('Department')</strong> </label>
					<select class="form-control" style="width: 100%" name="department_id" id="department" value="{{$employee->specialization}}" >
						<option value="1">@lang('Esthetic')</option>
						<option value="2">@lang('Administration')</option>
						<option value="3">@lang('Medicine')</option>
					</select>
				</div>
			</div>

			<div class="text-center">
				<label for="driver_license"><strong>@lang('Driver License')</strong> </label>
					<?php
						if($employee->driver_license == 1){
							echo "<input type='checkbox' name='driver_license' value='{$employee->driver_license}' checked>";
						}
						else{
							echo "<input type='checkbox' name='driver_license' value='{$employee->driver_license}'>";
						}
					?>

			</div>

			<!--Token-->
			@csrf

			<!--Botones-->
			<div class="form-group row">

				<!--Guardar-->
				<div class="col-sm-6">
					<input class="btn btn-outline-#35d3b0" style="background-color:#38d3b0;" 
						   onmouseover="this.style.backgroundColor='#FFF'; this.style.borderColor='#38d3b0'" 
						   onmouseout="this.style.backgroundColor='#38d3b0';"
						   type="submit" value="@lang('Save')">
				</div>
				<!--Volver sin cambios-->
				<div class="col-sm-6 d-flex flex-row-reverse" >
					<a class="btn btn-outline-danger" href="{{ url('/employees')}}" type="button" 
					   onmouseover="this.style.color='white';" onmouseout="this.style.color='red';" > @lang('Back without saving')</a>
				</div>		
			</div>
		</form>
	</div>
</div>


@endsection

		