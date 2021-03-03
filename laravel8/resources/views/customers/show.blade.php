
@extends('layouts.head')

@section('title', 'Customers')

@section('content')

<div class='d-flex flex-column align-items-center'>
	<h1 class='mt-4 mb-3'>
		 {{$customer->name}} {{$customer->first_surname}} @lang('Info')
	</h1>
</div>


<div style="text-aling:center" class="row justify-content-center">
	<div class="col-sm-7">			
		<form>
			<div class="form-group row">	
				<!--identificador-->
				<div class="col-sm-6">
					<label for="id" ><strong>@lang('Identifier Number')</strong></label>
					<input readonly class="form-control" value="{{$customer->id}}" >
				</div>

				<!--Nombre-->
				<div class="col-sm-6">
					<label for="name" ><strong>@lang('Name')</strong></label>
				  	<input readonly class="form-control" value="{{$customer->name}}" >
				</div>
			</div>

			<div class="form-group row">	
				<!--primer apellido-->
				<div class="col-sm-6">
					<label for="first_surname" ><strong>@lang('First Surname')</strong></label>
				  	<input readonly class="form-control" value="{{$customer->first_surname}}" >
				</div>

				<!--segundo apellido-->
				<div class="col-sm-6">
					<label for="second_surname" ><strong>@lang('Second Surname')</strong></label>
				  	<input readonly class="form-control" value="{{{$customer->second_surname}}}" >
				</div>
			</div>

			<div class="form-group row">	
				<!--dni-->
				<div class="col-sm-6">
					<label for="dni" ><strong>@lang('DNI')</strong></label>
				  	<input readonly class="form-control" value="{{$customer->dni}}" >
				</div>

				<!--fecha nacimiento-->
				<div class="col-sm-6">
					<label for="date_of_birth" ><strong>@lang('Date of birth')</strong></label>
				  	<input readonly class="form-control" value="{{$customer->date_of_birth->format('d/m/Y')}}" >
				</div>
			</div>

			<div class="form-group row">	
				<!--direccion-->
				<div class="col-sm-6">
					<label for="address" ><strong>@lang('Address')</strong></label>
				  	<input readonly class="form-control" value="{{$customer->address}}">
				</div>

				<!--Codigo postal-->
				<div class="col-sm-6">
					<label for="CP" ><strong>@lang('Postal Code')</strong></label>
				  	<input readonly class="form-control" value="{{$customer->CP}}">
				</div>
			</div>

			<div class="form-group row">	
				<!--telefono-->
				<div class="col-sm-3">
					<label for="phone" ><strong>@lang('Phone')</strong></label>
				  	<input readonly class="form-control" value="{{$customer->phone}}">
				</div>

				<!--movil-->
				<div class="col-sm-3">
					<label for="mobile" ><strong>@lang('Mobile')</strong></label>
				  	<input readonly class="form-control" value="{{$customer->mobile}}">
				</div>

				<div class="col-sm-6">
					<label for="email"><strong>@lang('Email')</strong> </label>
					<input readonly class="form-control" value="{{$customer->email}}">
				</div>
			</div>

			<!--Botones-->

			<div class="form-group d-flex justify-content-around row">
				<!--Borrar-->
				<div >
					<form action="{{ route('customers.destroy', $customer->id) }} " method="POST">
						@method('DELETE')
						@csrf
						<button class="btn btn-outline-danger">❌</button>
					</form>	
				</div>
				<!--Editar-->
				<div >
					<a class="btn btn-outline-warning" href="{{url('customers/'.$customer->id.'/edit') }}">✍️</a>
				</div>
				<!--Volver sin cambios-->
				<div >
					<a class="btn btn-outline-danger" href="{{ url('/customers')}}" type="button" 
					   onmouseover="this.style.color='white';" 
					   onmouseout="this.style.color='red';" > @lang('Back')</a>
				</div>
			</div>
		</form>

		<?php

		echo "<hr><h2>Pets List</h2>";
		echo "<table class='table'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th scope='col'>Name</th>";
		echo "<th scope='col'>Specie</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";


		for($i=0;$i<count($pet);$i++){
			echo "<tr>";
			if($pet[$i]->customer_id == $customer->id){
				echo "<td>{$pet[$i]->name}</td>";
				echo "<td>{$pet[$i]->specie}</td>";
			};
			echo "</tr>";
		};
		echo "</tbody>";
		echo "</table>";

		?>
	</div>
</div>










@endsection
