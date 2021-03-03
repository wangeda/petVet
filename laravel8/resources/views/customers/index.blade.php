
@extends('layouts.head')

@section('title', 'Customers')

@section('content')

<div class='d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		@lang('Customers List')
	</h1>
	<a href="{{ route('customers.create')}}" class="btn" style="background-color:#38d3b0; color:white; font-weight:bold"
	   onmouseover="this.style.backgroundColor='#FFF'; this.style.borderColor='#38d3b0'; this.style.color='#38d3b0'" 
	   onmouseout="this.style.backgroundColor='#38d3b0'; this.style.color='#FFF';"
	   >@lang('Add') @lang('Customer')</a>
</div>


<div class="form-group row">
	<div class="col-sm-10 offset-sm-1 onset-sm-1">
		<table id="customers" class="table table-hover" class='container'>
			<thead>
			  <tr>
				  <th class='text-center'>Id</th>
				  <th class='text-center'>@lang('Name')</th>
				  <th class='text-center'>@lang('First Surname')</th>
				  <th class='text-center'>@lang('Age')</th>
				  <th class='text-center'>@lang('DNI')</th>
				  <th class='text-center'>@lang('Mobile')</th>
				  <th class='text-center'>@lang('Email')</th>


				  <th style="width:20px"></th>
				  <th style="width:20px"></th>
				  <th style="width:20px"></th>
			  </tr>
			</thead>
			<tbody>
				@foreach($customers as $customer)
			  <tr>
				  <td class='text-center'>{{$customer->id}}</td>
				  <td class='text-center'>{{$customer->name}}</td>
				  <td class='text-center'>{{$customer->first_surname}}</td>
				  <td class='text-center'>{{$customer->getAge($customer->date_of_birth)}}</td>
				  <td class='text-center'>{{$customer->dni}}</td>
				  <td class='text-center'>{{$customer->mobile}}</td>
				  <td class='text-center'>{{$customer->email}}</td>

				  <td class='text-center'><a href=" {{url('customers/'.$customer->id)}}" ><button class='btn  btn-outline-primary'>🔎</button></a></td>
				  <td class='text-center'><a href="{{url('customers/'.$customer->id.'/edit') }}"><button class='btn btn-outline-warning '>✍️</button></a></td>
				  <td class='text-center'><form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
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
      $('#customers').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      });
    });
    </script>
@else
    <script>
        $(document).ready( function () {
            $('#customers').DataTable();
        } );
    </script>
@endif
@endsection
