
@extends('layouts.head')

@section('title', 'Employees')

@section('content')

<div class='d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		 {{$employee->name}} {{$employee->first_surname}} @lang('Info')
	</h1>

</div>


<div style="text-aling:center" class="row justify-content-center">
	<div class="col-sm-7">			
		<form>
			<div class="form-group row">	
				<!--identificador-->
				<div class="col-sm-6">
					<label for="id" ><strong>@lang('Identifier Number')</strong></label>
				  	<input readonly class="form-control" value="{{$employee->id}}" >
				</div>

				<!--Nombre-->
				<div class="col-sm-6">
					<label for="name" ><strong>@lang('Name')</strong></label>
				  	<input readonly class="form-control" value="{{$employee->name}}" >
				</div>
			</div>

			<div class="form-group row">	
				<!--primer apellido-->
				<div class="col-sm-6">
					<label for="first_surname" ><strong>@lang('First Surname')</strong></label>
				  	<input readonly class="form-control" value="{{$employee->first_surname}}" >
				</div>

				<!--segundo apellido-->
				<div class="col-sm-6">
					<label for="second_surname" ><strong>@lang('Second Surname')</strong></label>
				  	<input readonly class="form-control" value="{{{$employee->second_surname}}}" >
				</div>
			</div>

			<div class="form-group row">	
				<!--dni-->
				<div class="col-sm-6">
					<label for="dni" ><strong>@lang('DNI')</strong></label>
					<input readonly class="form-control" value="{{$employee->dni}}" >
				</div>

				<!--fecha nacimiento-->
				<div class="col-sm-6">
					<label for="date_of_birth" ><strong>@lang('Date of birth')</strong></label>
					<input readonly class="form-control" value="{{$employee->date_of_birth->format('d/m/Y')}}" >
				</div>
			</div>

			<div class="form-group row">	
				<!--direccion-->
				<div class="col-sm-6">
					<label for="address" ><strong>@lang('Address')</strong></label>
				  	<input readonly class="form-control" value="{{$employee->address}}">
				</div>

				<!--Codigo postal-->
				<div class="col-sm-6">
					<label for="CP" ><strong>@lang('Postal Code')</strong></label>
				  	<input readonly class="form-control" value="{{$employee->CP}}">
				</div>
			</div>

			<div class="form-group row">	
				<!--telefono-->
				<div class="col-sm-3">
					<label for="phone" ><strong>@lang('Phone')</strong></label>
				  	<input readonly class="form-control" value="{{$employee->phone}}">
				</div>

				<!--movil-->
				<div class="col-sm-3">
					<label for="mobile" ><strong>@lang('Mobile')</strong></label>
				  	<input readonly class="form-control" value="{{$employee->mobile}}">
				</div>

				<!--email-->
				<div class="col-sm-6">
					<label for="email"><strong>@lang('Email')</strong> </label>
					<input readonly class="form-control" value="{{$employee->email}}">
				</div>
			</div>

			<div class="form-group row">	
				<!--especializacion-->
				<div class="col-sm-5">
					<label for="specialization" ><strong>@lang('Specialization')</strong></label>
				  	<input readonly class="form-control" value="{{$employee->specialization}}" >
				</div>

				<!--departamento-->
				<div class="col-sm-5">
					<label for="departmen_id" ><strong>@lang('Department')</strong></label>
				  	<input readonly class="form-control" value="{{$employee->departments->name}}" >
				</div>

				<div class="col-sm-2">
					<label for="driver_license"><strong>@lang('Driver License') </strong></label>
					<?php 
						if($employee->driver_license==1){
							echo "<input readonly class='form-control text-center' value='✔' >";
						}else{
							echo "<input readonly class='form-control text-center' value='' > ";
						}
					?>		
				</div>
			</div>

			<!--Botones-->

			<div class="form-group d-flex justify-content-around row">
				<!--Borrar-->
				<div >
					<form action="{{ route('employees.destroy', $employee->id) }} " method="POST">
						@method('DELETE')
						@csrf
						<button class="btn btn-outline-danger">❌</button>
					</form>	
				</div>
				<!--Editar-->
				<div >
					<a class="btn btn-outline-warning" href="{{url('employees/'.$employee->id.'/edit') }}">✍️</a>
				</div>
				<!--Volver sin cambios-->
				<div >
					<a class="btn btn-outline-danger" href="{{ url('/employees')}}" type="button" 
					   onmouseover="this.style.color='white';" 
					   onmouseout="this.style.color='red';" > @lang('Back without saving')</a>
				</div>
			</div>
		</form>
	</div>
</div>


@endsection
