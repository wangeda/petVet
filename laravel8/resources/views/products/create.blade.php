
@extends ("layouts.head")
@section("content")
<div class=' d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		@lang('Products Creation Form')
	</h1>
</div>

<div style="text-aling:center" class="row justify-content-center">
	<div class="col-sm-7 offset-sm-1 ">		
		<form method="POST" action="{{url('/products')}}" enctype="multipart/form-data">
			<div class="form-group row">
				
				<!--Nombre-->
				<div class="col-sm-6">
					<label for="name" ><strong>@lang('Name')</strong></label>
					<input type="text"  class="form-control" name="name" id="name" value="{{old('name')}}">
					@error('name')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>

				<!--img-->
				<div class="col-sm-6" >
					<label for="img"><strong>Img</strong> </label>
					<input type="file" name="img" id='img' class="form-control-file" >
					@error('img')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<!--Precio-->
				<div class="col-sm-4">
					<label for="price" ><strong>@lang('Precio')</strong></label>
					<input type="text" class="form-control" name="price" id="price" value="{{old('price')}}">
					@error('price')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>

				<!--stock-->
				<div class="col-sm-4" >
					<label for="stock" ><strong>@lang('Stock')</strong></label>
					<input type="text"  class="form-control" name="stock" id="stock" value="{{old('stock')}}">
					@error('stock')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>

				<!--categoria-->
				<div class="col-sm-4" >
					<label for="category" ><strong>@lang('Categoría')</strong></label>
						<select class="form-control" style="width: 100%" name="category_id" id="category" value="{{old('category')}}" >
							@foreach ($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
					
				</div>
			</div>

			<div class="form-group row">
				<div class='col-sm-12'>
					<label><strong>Description</strong></label>
						<textarea style="resize:none" class="form-control" name='description' rows="10" placeholder="{{old('description')}}"></textarea>
				</div>
			</div>


			<!--Token-->
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

				<!--crear categoria-->
				<div class="col-sm-3">
					<a href="{{ route('categories.create')}}" class="btn btn-outline-warning text-muted" >@lang('➕') @lang('Category')</a>

				</div>

				<!--Volver sin cambios-->
				<div class="col-sm-4 d-flex flex-row-reverse" >
					<a class="btn btn-outline-danger " href="{{ url('/products')}}" type="button" 
					   onmouseover="this.style.color='white';" onmouseout="this.style.color='red';" > @lang('Back without saving')</a>
				</div>
			</div>
		</form>
	</div>
</div>



<script>
	$(document).ready(function() {
		$('#category').select2({
			theme:'bootstrap4',
			width: 'resolve',
		});
	});
	
</script>



@endsection
