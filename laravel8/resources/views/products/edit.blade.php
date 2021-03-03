
@extends ("layouts.head")

@section("content")
<div class=' d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		@lang('Product Edit Form')
	</h1>
</div>

<div style="text-aling:center" class="row justify-content-center">
	<div class="col-sm-8 align-self-center">			
		<form method="POST" action="{{url('products/'.$product->id)}}" enctype="multipart/form-data">
		@method('PUT')
			<div class="form-group row">
				
				<!--Nombre-->
				<div class="col-sm-6">
					<label for="name" ><strong>@lang('Name')</strong></label>
					<input type="text" class="form-control" name="name" id="name" value="{{$product->name}}">
					@error('name')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>

				<!--Precio-->
				<div class="col-sm-6">
					<label for="price" ><strong>@lang('Price')</strong></label>
					<input type="text" class="form-control" name="price" id="price" value="{{$product->price}}">
					@error('price')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>
			</div>

			<div class="form-group row">

				<!--stock-->
				<div class="col-sm-6" >
					<label for="stock" ><strong>@lang('Stock')</strong></label>
					<input type="text"  class="form-control" name="stock" id="stock" value="{{$product->stock}}">
					@error('stock')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>

				<!--categoria-->
				<div class="col-sm-6" >
					<label for="category_id" ><strong>@lang('Category')</strong></label>
						<select class="form-control" style="width: 100%" name="category_id" id="category" value="{{$product->categories->name}}" >
							@foreach ($categories as $category)
								<?php
									if ($category->id == $product->id) {
										echo    "<option value='{$category->id}' selected>{$category->name}</option>";
									} else {
										echo    "<option value='{$category->id}'>{$category->name}</option>";
									}
								?>
							@endforeach

						</select>
					
				</div>
			</div>

			<!--img-->

			<div class="form-group row">
				<!--img-->
				<div class="col-sm-6 text-center">
					<label for="img" ><strong>@lang('Img')</strong></label>
					<div class="form-group">
						<img src=" data:image/png;base64, {{$product->img}}" width='250px' height='250px'>
					 </div>
						<input type="file" name="img" id='img' class="form-control-file" >
				</div>

				<div class="col-sm-6">
					<label for="description" ><strong>@lang('Description')</strong></label>
					<div class="form-group">
						<textarea name="description" style="resize:none" class="form-control" rows="10" placeholder="{{$product->description}}"></textarea>
					</div>
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
