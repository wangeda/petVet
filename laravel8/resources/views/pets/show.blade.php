
@extends('layouts.head')

@section('title', 'Pets')

@section('content')

<div class='d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		@lang('Info') {{$pet->name}}
	</h1>
</div>

<div style="text-aling:center" class="row justify-content-center">
	<div class="col-sm-7">		
		<form>
			<div class="form-group row">	
				<!--identificador-->
				<div class="col-sm-6">
					<label for="id" ><strong>@lang('Identifier Number')</strong></label>
					<input readonly class="form-control" value="{{$pet->id}}" >
				</div>

				<!--Nombre-->
				<div class="col-sm-6">
					<label for="name" ><strong>@lang('Name')</strong></label>
					<input readonly class="form-control" value="{{$pet->name}}" >
				</div>
			</div>

			<div class="form-group row">	
				<!--especie-->
				<div class="col-sm-6">
					<label for="specie" ><strong>@lang('Specie')</strong></label>
					<input readonly class="form-control" value="{{$pet->specie}}" >
				</div>

				<!--raza-->
				<div class="col-sm-6">
					<label for="breed" ><strong>@lang('Breed')</strong></label>
					<input readonly class="form-control" value="{{{$pet->breed}}}" >
				</div>
			</div>

			<div class="form-group row">	
				<!--genero-->
				<div class="col-sm-6">
					<label for="gender" ><strong>@lang('Gender')</strong></label>
					<?php
					if($pet->genders->gender == 'M'){
						echo "<input readonly class='form-control' value=Male>";
					}
					else if($pet->genders->gender == 'F'){
						echo "<input readonly class='form-control' value='Female'>";
					}
					?>
				</div>

				<!--fecha nacimiento-->
				<div class="col-sm-6">
					<label for="date_of_birth"><strong>@lang('Date of birth')</strong></label>
					<input readonly class="form-control" value="{{$pet->date_of_birth->format('d/m/Y')}}" >
				</div>

			</div>

			<div class="form-group row">	
				<!--alergias-->
				<div class="col-sm-6">
					<label for="allergies" ><strong>@lang('Allergies')</strong></label>
					<input readonly class="form-control" value="{{$pet->allergies}}">
				</div>

				<!--Conciciones cronicas-->
				<div class="col-sm-6">
					<label for="chronic_condition"><strong>@lang('Chronic condition')</strong></label>
	  				<input readonly class="form-control" value="{{$pet->chronic_condition}}">
				</div>
			</div>

			<div class="form-group row">	
				<!--fecha de vacunacion-->
				<div class="col-sm-6">
					<label for="vaccination_date" ><strong>@lang('Vaccination Date')</strong></label>
					 <input readonly class="form-control" value="{{$pet->vaccination_date->format('d/m/Y')}}">
				</div>

				<!--cliente-->
				<div class="col-sm-6">
					<label for="customer_id" ><strong>@lang('Customer Name')</strong></label>
					<input readonly class="form-control" value="{{$pet->customers->name}} {{$pet->customers->first_surname}}">
				</div>

			</div>

			<div class="form-group row">	
				<!--creacion-->
				<div class="col-sm-6">
					<label for="created_at" ><strong>@lang('Create Date')</strong></label>
				  	<input readonly class="form-control" value="{{$pet->created_at}}" >
				</div>

				<!--modificacion-->
				<div class="col-sm-6">
					<label for="updated_at"><strong>@lang('Update Date')</strong></label>
				  	<input readonly class="form-control" value="{{$pet->updated_at}}" >
				</div>
			</div>
			
			<!--Botones-->
			<div class="form-group d-flex justify-content-around row">
				<!--Borrar-->
				<div >
					<form action="{{ route('pets.destroy', $pet->id) }} " method="POST">
						@method('DELETE')
						@csrf
						<button class="btn btn-outline-danger">❌</button>
					</form>	
				</div>
				<!--Editar-->
				<div >
					<a class="btn btn-outline-warning" href="{{url('pets/'.$pet->id.'/edit') }}">✍️</a>
				</div>
				<!--Volver sin cambios-->
				<div >
					<a class="btn btn-outline-danger" href="{{ url('/pets')}}" type="button" 
					   onmouseover="this.style.color='white';" 
					   onmouseout="this.style.color='red';" > @lang('Back without saving')</a>
				</div>
			</div>
		</form>
	</div>
</div>


@endsection