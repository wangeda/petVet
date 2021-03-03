

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>
    	@yield('title')
	</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	
		<!--select2-->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.min.css') }}">

	
	<!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	
		<!--select2-->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
		.container-fluid {
			 height: 100vh;
		}	
		.invalid{
			color:red;
		}
		
		
		
		
		
    </style>
	
	
</head>
<body>
    <div class="container-fluid ">
   		<div id="app col-1">
   			<nav class="navbar navbar-expand-md navbar-light shadow-sm bg-white" >
   				<a class="navbar-brand" href="{{ url('/') }}"><img src="https://i.imgur.com/0wquRzC.png "></a>
				<a class="navbar-brand" href="{{ route('employees.index')}}">@lang('Employees')</a>
				<!-- <a class="navbar-brand" href="">@lang('Appointment')</a>-->
				<a class="navbar-brand" href="{{ route('customers.index')}}">@lang('Customers')</a>
				<a class="navbar-brand" href="{{ route('pets.index')}}">@lang('Pets')</a>
				<a class="navbar-brand" href="{{ route('products.index')}}">@lang('Products')</a>
				<a class="navbar-brand" href="{{ route('categories.index')}}">@lang('Categories')</a>


				 
   				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
   					<span class="navbar-toggler-icon"></span>
   				</button>
   				<div class="collapse navbar-collapse" id="navbarSupportedContent">
   					<!-- Left Side Of Navbar -->
   					<ul class="navbar-nav mr-auto">
   					</ul>
   					<!-- Right Side Of Navbar -->
   					<ul class="navbar-nav ml-auto">
   					 <!-- Authentication Links -->
						 @guest
						 @if (Route::has('login'))
						 <li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						 </li>
						 @endif
						 @if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
						@endif
   						@else
   						<li class="nav-item dropdown">
   							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
   							{{ Auth::user()->name }}
   							</a>
   							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
   								<a class="dropdown-item" href="{{ route('logout') }}"
   								onclick="event.preventDefault();
   								document.getElementById('logout-form').submit();">
   									 {{ __('Logout') }}
   								</a>
   								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
   									@csrf
   								</form>
									<a class="dropdown-item" href="{{ route('logout') }}"
   									onclick="event.preventDefault();">Configuración</a>
   							 </div>
   						 </li>
   						 @endguest
						
						<!--Idioma-->						 
						<div class="dropdown">
 							<button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							@lang('Languages')
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="{{ url ('lang', ['en'])}}">🇬🇧</a>
								<a class="dropdown-item" href="{{ url ('lang', ['es'])}}"> 🇪🇸</a>
							</div>
						</div>
  					</ul>
   				</div>
   			</nav>		
 		</div>
		@yield('content')   
		
    </div>
</body>
