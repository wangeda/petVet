
@extends ("layouts.head")

@section("content")
<div class=' d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		@lang('Info') {{$product->name}}
	</h1>
</div>

<div style="text-aling:center" class="row justify-content-center">
	<div class="col-sm-8">			
		<form method="POST" action="{{url('products/'.$product->id)}}" enctype="multipart/form-data">
		@method('PUT')
			<div class="form-group row">
				<!--Nombre-->
				<div class="col-sm-6">
					<label for="name"><strong>@lang('Name')</strong></label>
					<input readonly type="text"  class="form-control" name="name" id="name" value="{{$product->name}}">
					@error('name')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>

				<!--Precio-->
				<div class="col-sm-6">
					<label for="price" ><strong>@lang('Price')</strong></label>
					<input readonly type="text" class="form-control" name="price" id="price" value="{{$product->price}}">
					@error('price')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>
			</div>

			<div class="form-group row">

				<!--stock-->
				<div class="col-sm-6" >
					<label for="stock" ><strong>@lang('Stock')</strong></label>
					<input readonly type="text"  class="form-control" name="stock" id="stock" value="{{$product->stock}}">
					@error('img')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>

				<!--categoria-->
				<div class="col-sm-6" >
					<label for="category" ><strong>@lang('Category')</strong></label>
					<input readonly type="text" class="form-control" name="stock" id="stock" value="{{$product->category}}">

					@error('img')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>
			</div>

			<div class="form-group row">
			<!--img-->
				<div class="col-sm-6 text-center">
				<label for="img"><strong>@lang('Img')</strong></label>
					<div class="form-group">
						<img src=" data:image/png;base64, {{$product->img}}" width='250px' height='250px'>
					</div>
				</div>


				<div class="col-sm-6">
					<label for="description" ><strong>@lang('Description')</strong></label>
					<div class="form-group">
						<textarea readonly style="resize:none" class="form-control" name='description' rows="10" placeholder="{{$product->description}}"></textarea>
					</div>
				</div>
			</div>				

			<!--Token-->
			@csrf
			<!--Botones-->

			<div class="form-group d-flex justify-content-around row">
				<!--Borrar-->
				<div >
					<form action="{{ route('products.destroy', $product->id) }} " method="POST">
						@method('DELETE')
						@csrf
						<button class="btn btn-outline-danger">❌</button>
					</form>	
				</div>
				<!--Editar-->
				<div >
					<a class="btn btn-outline-warning" href="{{url('products/'.$product->id.'/edit') }}">✍️</a>
				</div>
				<!--Volver sin cambios-->
				<div >
					<a class="btn btn-outline-danger" href="{{ url('/products')}}" type="button" 
					   onmouseover="this.style.color='white';" 
					   onmouseout="this.style.color='red';" > @lang('Back')</a>
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
