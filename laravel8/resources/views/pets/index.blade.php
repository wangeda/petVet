
@extends('layouts.head')

@section('title', 'Pets')

@section('content')

<div class='d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		@lang('Pets List')
	</h1>
	<a href="{{ route('pets.create')}}" class="btn" style="background-color:#38d3b0; color:white; font-weight:bold"
	   onmouseover="this.style.backgroundColor='#FFF'; this.style.borderColor='#38d3b0'; this.style.color='#38d3b0'" 
	   onmouseout="this.style.backgroundColor='#38d3b0'; this.style.color='#FFF';">@lang('Add') @lang('Pet')</a>

</div>

<div class="form-group row">
	<div class="col-sm-10 offset-sm-1 onset-sm-1">
		<table id="pets" class="table table-hover" class='container'>
			<thead>
			  <tr>
				  <th class='text-center'>Id</th>
				  <th class='text-center'>@lang('Name')</th>
				  <th class='text-center'>@lang('Specie')</th>
				  <th class='text-center'>@lang('Gender')</th>
				  <th class='text-center'>@lang('Age')</th>
				  <th class='text-center'>@lang('Allergies')</th>
				  <th class='text-center'>@lang('Chronic Condition')</th>
				  <th class='text-center'>@lang('Vaccination Date')</th>
				  <th class='text-center'>@lang('Customer Name')</th>


				  <th style="width:20px"></th>
				  <th style="width:20px"></th>
				  <th style="width:20px"></th>
			  </tr>
			</thead>
			<tbody>
				@foreach($pets as $pet)
			  <tr>
				  <td class='text-center'>{{$pet->id}}</td>
				  <td class='text-center'>{{$pet->name}}</td>
				  <td class='text-center'>{{$pet->specie}}</td>
				  <td class='text-center'>{{$pet->genders->gender}}</td>
				  <td class='text-center'>{{$pet->getAge($pet->date_of_birth)}}</td>
				  <td class='text-center'>{{$pet->allergies}}</td>
				  <td class='text-center'>{{$pet->chronic_condition}}</td>
				  <td class='text-center'>{{$pet->vaccination_date->format("d/m/Y")}}</td>
				  <td class='text-center'><a href="{{url('customers/'.$pet->customer_id)}}">{{$pet->customers->name}} {{$pet->customers->first_surname}}</a></td>

				  <td class='text-center'><a href=" {{url('pets/'.$pet->id)}}" ><button class='btn btn-outline-primary'>🔎</button></a></td>
				  <td class='text-center'><a href="{{url('pets/'.$pet->id.'/edit') }}" ><button class='btn btn-outline-warning'>✍️</button></a></td>
				  <td class='text-center'><form action="{{ route('pets.destroy', $pet->id) }}" method="POST">
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
      $('#pets').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      });
    });
    </script>
@else
    <script>
        $(document).ready( function () {
            $('#pets').DataTable();
        } );
    </script>
@endif


@endsection
