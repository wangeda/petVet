
@extends('layouts.head')

@section('title', 'Employees')

@section('content')

<div class='d-flex flex-column align-items-center'>
	<h1 class="mt-4 mb-3">
		@lang('Employees List')
	</h1>
	<a href="{{ route('employees.create')}}" class="btn" style="background-color:#38d3b0; color:white; font-weight:bold"
	   onmouseover="this.style.backgroundColor='#FFF'; this.style.borderColor='#38d3b0'; this.style.color='#38d3b0'" 
	   onmouseout="this.style.backgroundColor='#38d3b0'; this.style.color='#FFF';"
	   >@lang('Add') @lang('Employee')</a>
</div>


<div class="form-group row">
	<div class="col-sm-10 offset-sm-1 onset-sm-1">
		<table id="employees" class="table table-hover" class='container'>
			<thead>
			  <tr>
				  <th class='text-center'>Id</th>
				  <th class='text-center'>@lang('Name')</th>
				  <th class='text-center'>@lang('First Surname')</th>
				  <th class='text-center'>@lang('Age')</th>
				  <th class='text-center'>@lang('DNI')</th>
				  <th class='text-center'>@lang('Mobile')</th>
				  <th class='text-center'>@lang('Email')</th>
				  <th class='text-center'>@lang('Department')</th>
				  <th class='text-center'>@lang('Driver License')</th>


				  <th style="width:20px"></th>
				  <th style="width:20px"></th>
				  <th style="width:20px"></th>
			  </tr>
			</thead>
			<tbody>
				@foreach($employees as $employee)
			  <tr>
				  <td class='text-center'>{{$employee->id}}</td>
				  <td class='text-center'>{{$employee->name}}</td>
				  <td class='text-center'>{{$employee->first_surname}}</td>
				  <td class='text-center'>{{$employee->getAge($employee->date_of_birth)}}</td>
				  <td class='text-center'>{{$employee->dni}}</td>
				  <td class='text-center'>{{$employee->mobile}}</td>
				  <td class='text-center'>{{$employee->email}}</td>
				  <td class='text-center'>{{$employee->departments->name}}</td>
				 <?php 
						if($employee->driver_license==1){
							echo "<td class='text-center' >✔</td>";
						}else{
							echo "<td> </td>";
						}
					  ?>

				  <td class='text-center'><a href=" {{url('employees/'.$employee->id)}}" ><button class='btn  btn-outline-primary'>🔎</button></a></td>
				  <td class='text-center'><a href="{{url('employees/'.$employee->id.'/edit') }}"><button class='btn btn-outline-warning '>✍️</button></a></td>
				  <td class='text-center'><form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
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
      $('#employees').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      });
    });
    </script>
@else
    <script>
        $(document).ready( function () {
            $('#employees').DataTable();
        } );
    </script>
@endif
@endsection
