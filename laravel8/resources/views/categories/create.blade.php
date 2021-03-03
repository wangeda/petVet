@extends ("layouts.head")
@section('title', 'Categories')
@section("content")
<div class=' d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		@lang('Categories Creation Form')
	</h1>
</div>


<div style="text-aling:center" class="row justify-content-center">
	<div class="col-sm-7 offset-sm-1 ">		
		<form method="POST" action="{{url('/categories')}}" >
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
				<div class='col-sm-12'>
					<label for='description'><strong>Description</strong></label>
					<textarea style="resize:none" class="form-control" name='description' rows="10" placeholder="{{old('description')}}"></textarea>
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
				<div class="col-sm-6 d-flex flex-row-reverse " >
					<a class="btn btn-outline-danger " href="{{ url('/categories')}}" type="button" 
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
