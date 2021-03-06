@extends ("layouts.head")

@section("content")
<div class=' d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		@lang('Customers Edit Form')
	</h1>
</div>

<div style="text-aling:center" class="row justify-content-center">
	<div class="col-sm-7">				
		<form method="POST" action="{{url('customers/'.$customer->id)}}" >
		@method('PUT')

			<div class="form-group row">	
				<!--Nombre-->
				<div class="col-sm-4">
					<label for="name"><strong>@lang('Name')</strong> </label>
					<input type="text" class="form-control " name="name" placeholder="@lang('Name')..." value="{{$customer->name}}">
				 @error('name')
					<strong class="invalid"> {{ $message}}</strong>
				 @enderror
				</div>
				
				<!--primer apellido-->
				<div class="col-sm-4">
					<label for="first_surname" ><strong>@lang('First Surname')</strong></label>
				    <input type="text"  class="form-control" name="first_surname" id="first_surname" placeholder="@lang('First Surname')" value="{{$customer->first_surname}}">
					@error('first_name')
						<strong class="invalid"> {{ $message}}</strong>
					 @enderror
				</div>
				
				<!--segundo apellido-->
				<div class="col-sm-4">
					<label for="second_surname" ><strong>@lang('Second Surname')</strong></label>
				  	<input type="text"  class="form-control" name="second_surname" id="second_surname" placeholder="@lang('Second Surname')"  value="{{$customer->second_surname}}">
				</div>
			</div>
			
			
			<div class="form-group row">	
				<!--dni-->
				<div class="col-sm-6">
					<label for="dni" ><strong>@lang('DNI')</strong></label>
				    <input type="text"  class="form-control" name="dni" id="dni" placeholder="@lang('DNI')"  value="{{$customer->dni}}">
					@error('dni')
						<strong class="invalid"> {{ $message}}</strong>
					 @enderror
				</div>
				
				<!--fecha nacimiento-->
				<div class="col-sm-6">
					<!--Fecha nacimiento-->
						<label for="date_of_birth"><strong>@lang('Birth Date')</strong></label>
					    <input type="date" class="form-control" name="date_of_birth"  value="{{$customer->date_of_birth}}">
					@error('date_of_birth')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>
				
			</div>
			
			<div class="form-group row">	
				<!--direccion-->
				<div class="col-sm-8">
					<label for="address" ><strong>@lang('Address')</strong></label>
					<input type="text"  class="form-control" name="address" id="address" placeholder="@lang('Address')" value="{{$customer->address}}">
					@error('address')
						<strong class="invalid"> {{ $message}}</strong>
					 @enderror
				</div>
					
				<!--Codigo postal-->
				<div class="col-sm-4">
					<label for="CP" ><strong>@lang('Postal Code')</strong></label>
					<input type="text"  class="form-control" name="CP" id="CP" placeholder="@lang('Postal Code')"  value="{{$customer->CP}}">
					@error('CP')
						<strong class="invalid"> {{ $message}}</strong>
					 @enderror
				</div>
			</div>
				
			<div class="form-group row">	
				<!--telefono-->
				<div class="col-sm-3">
					<label for="phone" ><strong>@lang('Phone')</strong></label>
					<input type="text"  class="form-control" name="phone" id="phone" placeholder="@lang('Phone')" value="{{$customer->phone}}">
				</div>

				<!--movil-->
				<div class="col-sm-3">
					<label for="mobile" ><strong>@lang('Mobile')</strong></label>
					<input type="text"  class="form-control" name="mobile" id="mobile" placeholder="@lang('Mobile')"  value="{{$customer->mobile}}">
					@error('mobile')
						<strong class="invalid"> {{ $message}}</strong>
					 @enderror
				</div>

				<div class="col-sm-6">
					<label for="email"><strong>@lang('Email')</strong> </label>
					<input type="text" class="form-control " name="email" placeholder="@lang('Email')..." value="{{$customer->email}}">
				 @error('email')
					<strong class="invalid"> {{ $message}}</strong>
				 @enderror
				</div>
			</div>
				
				
			<!--Token-->
			@csrf
				
			<!--Botones-->
			<div class="form-group row">
				<!--Guardar-->
				<div class="col-sm-6">
					<input class="btn"style=" color:#38d3b0; border-color:#38d3b0; font-weight:bold"
							onmouseout="this.style.backgroundColor='#FFF'; this.style.borderColor='#38d3b0'; this.style.color='#38d3b0'" 
							onmouseover="this.style.backgroundColor='#38d3b0'; this.style.color='#FFF';"
							type="submit" value="@lang('Save')">
				</div>

				<!--Volver sin cambios-->
				<div class="col-sm-6 d-flex flex-row-reverse">
					<a class="btn btn-outline-danger" href="{{ url('/customers')}}" type="button" 
					   onmouseover="this.style.color='white';" 
					   onmouseout="this.style.color='red';" > @lang('Back without saving')</a>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection