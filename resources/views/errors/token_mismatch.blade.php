<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Mwatha Kinyua <mwatha.kinyua\hotmail.com>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Convenience tallying of results for agents.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{{ csrf_token() }}">
	<title>Session Error</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</head>
	<div id="navbar">@include('layouts.partials._nav')</div>
<body>
	<header class="text-center">
		<h1>Your Session Expired!</h1>
		<h4>You have been logged out of the application because your session expired.</h4>
		<ul class="list-inline">
			<li>
				<a class="btn btn-default" href="{{ URL::to('login') }}">Login</a>
			</li>
		</ul>
	</header>
	<p>It is possible you tried to use a bad method to navigate within the application!</p>
	<style>
		header{
			background-color: rgba(0,0,0,0.1);
			background: -webkit-linear-gradient(45deg, rgba(50,210,20,0.5), rgba(0,100,200,0.5), rgba(0,240,0,0.2), rgba(0,100,255,0.5)); /*Safari 5.1-6*/
			background: -o-linear-gradient(45deg, rgba(50,210,20,0.5), rgba(0,100,200,0.5), rgba(0,240,0,0.2), rgba(0,100,255,0.5)); /*Opera 11.1-12*/
			background: -moz-linear-gradient(45deg, rgba(50,210,20,0.5), rgba(0,100,200,0.5), rgba(0,240,40,0.2), rgba(0,100,255,0.5)); /*Fx 3.6-15*/
			background: linear-gradient(to 45deg, rgba(50,210,20,0.5), rgba(0,100,200,0.5), rgba(0,240,0,0.2), rgba(0,100,255,0.5))); /*Standard*/
			background-size: cover;
			height: 100vh;
			margin-bottom: 0px;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}
		#navbar{
			height: 0px;
			background-color: inherit;
		}
	</style>
</body>
</html>
