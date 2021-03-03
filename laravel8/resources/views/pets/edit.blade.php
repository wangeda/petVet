
@extends ("layouts.head")

@section("content")
<div class=' d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		@lang('Pets Edit Form')
	</h1>
</div>
<div style="text-aling:center" class="row justify-content-center">
	<div class="col-sm-7">				
		<form method="POST" action="{{url('pets/'.$pets->id)}}" >
		@method('PUT')

			<!--Nombre-->
			<div class="form-group row">
				<div class="col-sm-6" >
					<label for="name"><strong>@lang('Name')</strong></label>
					<input type="text" class="form-control" name="name" placeholder="@lang('Name')" value="{{$pets->name}}">
				@error('name')
					<strong class="invalid"> {{ $message}}</strong>
				@enderror
				</div>

				<!--Raza-->
				<div class="col-sm-6" >
					<label for="breed" ><strong>@lang('Breed')</strong></label>
				  	<input type="text" class="form-control" name="breed" placeholder="@lang('Breed')" value="{{$pets->breed}}">
				@error('breed')
					<strong class="invalid"> {{ $message}}</strong>
				@enderror
				</div>
			</div>

			<div class="form-group row">
				<!--Especie-->
				<div class="col-sm-4">
					<label for="specie"><strong>@lang('Specie')</strong> </label>
					<select class="form-control" style="width: 100%" name="specie" id="specie" value="{{$pets->specie}}" >
						<option >@lang('Lizard')</option>
						<option >@lang('Snake')</option>
						<option >@lang('Guinea pig')</option>
						<option >@lang('Rabbit')</option>
						<option >@lang('Cat')</option>
						<option >@lang('Dog')</option>
						<option >@lang('Hedgehog')</option>
						<option >@lang('Rodents')</option>
						<option >@lang('Others')</option>
					</select>
					@error('specie')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>

				<div class="col-sm-4">
					<!--Género-->
					<label for="gender_id" ><strong>@lang('Gender')</strong> </label>
					<?php
						if($pets->genders->gender == 'M'){
							echo "<input readonly type='text' class='form-control' name='gender_id'  value='Male'>";
						}
						else if($pets->genders->gender == 'F'){
							echo "<input readonly type='text' class='form-control' name='gender_id' value='Female'>";
						}
					?>
					@error('gender')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>

				<div class="col-sm-4">
				<!--Fecha nacimiento-->
					<label for="date_of_birth"><strong>@lang('Birth Date')</strong></label>
					<input type="date" class="form-control" name="date_of_birth"  value="{{$pets->date_of_birth}}">
				@error('date_of_birth')
					<strong class="invalid"> {{ $message}}</strong>
				@enderror
				</div>
			</div>

			<div class="form-group row">
				<!--Alergias-->
				<div class="col-sm-4">
					<label for="allergies"><strong>@lang('Allergies')</strong> </label>
					<select class="form-control" style="width: 100%" name="allergies" id="allergies" value="{{$pets->allergies}}">
						<option value="none">@lang('None')</option>
						<option value="pollen">@lang('Pollen')</option>
						<option value="Dust">@lang('Dust')</option>
						<option value="Mold">@lang('Mold')</option>
						<option value="Fleas">@lang('Fleas')</option>
						<option value="Bee">@lang('Bee')</option>
						<option value="Wasp">@lang('Wasp')</option>
						<option value="otros">@lang('Others')</option>
					@error('allergies')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
					</select>
				</div>

				<!--Condiciones crónicas-->
				<div class="col-sm-8">
					<label for="chronic_condition"><strong>@lang('Chronic Condition')</strong> </label>
					<select class="form-control" style="width: 100%" name="chronic_condition" id="chronic_condition" value="{{$pets->chronic_condition}}">
						<option value="none">@lang('None')</option>
						<option value="chronic_kidney_failure">@lang('Chronic kidney failure')</option>
						<option value="hyperthyroidism">@lang('Hyperthyroidism')</option>
						<option value="diabetes">@lang('Diabetes')</option>
						<option value="leukemia">@lang('Leukemia virus')</option>
						<option value="inmunodeficiency">@lang('Immunodeficiency virus')</option>
						<option value="lemunodeficiency">@lang('Lemunodeficiency virus')</option>
						<option value="cancer">@lang('Cancer')</option>
						<option value="gastric_tosion">@lang('Gastric Torsion')</option>
						<option value="Lyme">@lang('Lyme Disease')</option>
						<option value="Heartworm">@lang('Heartworm disease')</option>
						<option value="otros">@lang('Others')</option>
					@error('chronic_condition')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
					</select>
				</div>
			</div>


			<div class="form-group row">
				<!--Fecha de vacunacion-->
				<div class="col-sm-4">
					<label for="vaccination_date"><strong>@lang('Vaccination Date')</strong> </label>
					<input type="date" class="form-control" name="vaccination_date" value="{{$pets->vaccination_date}}">
					@error('vaccination_date')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>

				<!--Nombre del propietario-->
				<div class="col-sm-8">
					<label for="customer_id"><strong>@lang('Owner Name')</strong> </label>
					<select class="form-control" style="width: 100%" name="customer_id" id="customer" value="$pets->customers->name">
						@foreach ($customers as $customer)
							<option value="{{$customer->id}}">{{$customer->name}} {{$customer->first_surname}}</option>
						@endforeach
					@error('customer_id')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
					</select>
				</div>	
			</div>
			<!--token-->
			@csrf    

			<!--Botones-->

			<div class="form-group row">

				<!--Guardar-->
				<div class="col-sm-5">

					<input class="btn"style=" color:#38d3b0; border-color:#38d3b0; font-weight:bold"
							onmouseout="this.style.backgroundColor='#FFF'; this.style.borderColor='#38d3b0'; this.style.color='#38d3b0'" 
							onmouseover="this.style.backgroundColor='#38d3b0'; this.style.color='#FFF';"
							type="submit" value="@lang('Save')">
				</div>

				<!--crear cliente-->
				<div class="col-sm-3">
					<a href="{{ route('customers.create')}}" class="btn btn-outline-warning text-muted" 
						>@lang('➕') @lang('Customer')</a>

				</div>

				<!--Volver sin cambios-->
				<div class="col-sm-4 d-flex flex-row-reverse" >
					<a class="btn btn-outline-danger " href="{{ url('/pets')}}" type="button" 
					   onmouseover="this.style.color='white';" onmouseout="this.style.color='red';" > @lang('Back without saving')</a>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#specie').select2({
			theme:'bootstrap4',
			style='resolve',

		});
	});
	
	$(document).ready(function() {
		$('#allergies').select2({
			theme:'bootstrap4',
			style='resolve',
		});
	});
	
	$(document).ready(function() {
		$('#chronic_condition').select2({
			theme:'bootstrap4',
			style='resolve',
		});
	});
	
	$(document).ready(function() {
		$('#customer').select2({
			theme:'bootstrap4',
			style='resolve',
		});
	});
	
</script>



@endsection
