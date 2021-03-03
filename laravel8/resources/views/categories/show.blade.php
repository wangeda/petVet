@extends ("layouts.head")
@section('title', 'Categories')

@section("content")
<div class=' d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		@lang('Info') {{$category->name}}
	</h1>
</div>
<div style="text-aling:center" class="row justify-content-center">
	<div class="col-sm-7">				
		<form method="POST" action="{{url('categories/'.$category->id)}}" >
		@method('PUT') 
			<div class="form-group row">
				<!--Nombre-->
				<div class="col-sm-6">
					<label for="name" ><strong>@lang('Name')</strong></label>
					<input readonly type="text"  class="form-control" name="name" id="name" value="{{$category->name}}">
					@error('name')
						<strong class="invalid"> {{ $message}}</strong>
					@enderror
				</div>

				<!--img-->
				<div class='col-sm-12'>
					<label for="description" ><strong>@lang('Description')</strong></label>
				  <div class="form-group">
						<textarea readonly name="description" style="resize:none" class="form-control" rows="10" placeholder="{{$category->description}}"></textarea>
				 </div>

				</div>
			</div>
			<!--Token-->
			@csrf

			<!--Botones-->
			<div class="form-group d-flex justify-content-around row">
				<!--Borrar-->
				<div >
					<form action="{{ route('categories.destroy', $category->id) }} " method="POST">
						@method('DELETE')
						@csrf
						<button class="btn btn-outline-danger">❌</button>
					</form>	
				</div>
				<!--Editar-->
				<div >
					<a class="btn btn-outline-warning" href="{{url('categories/'.$category->id.'/edit') }}">✍️</a>
				</div>
				<!--Volver sin cambios-->
				<div >
					<a class="btn btn-outline-danger" href="{{ url('/categories')}}" type="button" 
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
