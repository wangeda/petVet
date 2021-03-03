
@extends('layouts.head')

@section('title', 'Products')

@section('content')

<div class='d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		@lang('Products List')
	</h1>
	<a href="{{ route('products.create')}}" class="btn" style="background-color:#38d3b0; color:white; font-weight:bold"
	   onmouseover="this.style.backgroundColor='#FFF'; this.style.borderColor='#38d3b0'; this.style.color='#38d3b0'" 
	   onmouseout="this.style.backgroundColor='#38d3b0'; this.style.color='#FFF';">@lang('Add') @lang('Product')</a>
</div>

<div class="form-group row">
	<div class="col-sm-10 offset-sm-1 onset-sm-1">
		<table id="products" class="table table-hover" class='container'>
			<thead>
			  <tr>
				  <th class='text-center'>Id</th>
				  <th class='text-center'>@lang('Name')</th>
				  <th class='text-center'>@lang('Price')</th>
				  <th class='text-center'>@lang('Stock')</th>
				  <th class='text-center'>@lang('Category')</th>

				  <th style="width:20px"></th>
				  <th style="width:20px"></th>
				  <th style="width:20px"></th>
			  </tr>
			</thead>
			<tbody>
				@foreach($products as $product)
			  <tr>
				  <td class='text-center'>{{$product->id}}</td>
				  <td class='text-center'>{{$product->name}}</td>
				  <td class='text-center'>{{$product->price}}</td>
				  <td class='text-center'>{{$product->stock}}</td>
				  <td class='text-center'>{{$product->categories->name}}</td>

				  <td class='text-center'><a href=" {{url('products/'.$product->id)}}" ><button class='btn btn-outline-primary'>🔎</button></a></td>
				  <td class='text-center'><a href="{{url('products/'.$product->id.'/edit') }}" ><button class='btn btn-outline-warning'>✍️</button></a></td>
				  <td class='text-center'><form action="{{ route('products.destroy', $product->id) }}" method="POST">
					  @method('DELETE')
					  @csrf
					  <button class="btn btn-outline-danger">❌</button>
					  </form>
				  </td>		  
			  </tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>





@if( Config::get('app.locale')  == 'es')
    <script>
    $(document).ready(function() {
      $('#products').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      });
    });
    </script>
@else
    <script>
        $(document).ready( function () {
            $('#products').DataTable();
        } );
    </script>
@endif
@endsection
