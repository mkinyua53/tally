<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Mwatha Kinyua <mwatha.kinyua\hotmail.com>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Convenience tallying of results for agents.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{{ csrf_token() }}">
	<title>Tallying Machine</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>

	{{-- Development --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	{{-- Development --}}
</head>
	@include('layouts.partials._nav')
<body>
	@if(Session::has('message'))
		<div class="message container text-center">
			<div class="alert alert-info alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>{{ Session::get('message')}}</strong>
			</div>
		</div>
	@endif
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	@yield('content')
</body>
</html>