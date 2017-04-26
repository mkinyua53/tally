@extends('layouts.main')

@section('content')
	<div class="container-fluid">
		@include('layouts.partials._appnav')
		<div class="panel panel-info" style="background-color: rgba(150,200,200,0.5); height: 80vh; overflow: auto">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6 pull-right" id="liveApp">
						{{-- <h1 v-on:click="aspirants">Hello There!<small> Welcome to live Results.</small></h1>
						<div>@{{ message }}</div> --}}
					</div>
					<div class="col-md-6 content">
						
					</div>
				</div>
			</div>
		</div>
	
	</div>
	{{-- <script type="text/javascript" src="{{ asset('js/main.js') }}"></script> --}}
	<script>
		// const tally = new Vue({
		// 	el: '#liveApp',
		// 	data: {
		// 		message: 'Vue App.'
		// 	},
		// 	methods: {
		// 		aspirants: function(){
		// 			var app = this
		// 			$.ajax({
		// 				url: window.location.origin+"/aspirants",
		// 				success: function(data){
		// 					app.message = data
		// 				},
		// 				error: function(data){
		// 					app.message = data.status+' '+data.responseText
		// 				}
		// 			})
		// 		}
		// 	},
		// 	computed: {
		// 		//
		// 	}
		// })
		var url = window.location.origin
		var agent_button = $('#agents')
		var add_agent = $('#new-agent-link')
		var aspirant_button = $('#aspirants')
		var add_aspirant = $('#new-aspirant-link')
		var result_button = $('#results')
		var add_result = $('#new-result-link')
		var station_button = $('#stations')
		var add_station = $('#new-station-link')

		add_agent.on('click',function(){
			loadAgentForm()
		})

		agent_button.click(function(){
			loadAgent()
		})

		aspirant_button.on('click',function(){
			loadAspirant()
		})

		add_aspirant.on('click',function(){
			loadAspirantForm()
		})

		result_button.on('click', function(){
			loadResult()
		})

		add_result.on('click',function(){
			loadResultForm()
		})

		station_button.on('click', function(){
			loadStation()
		})

		add_station.on('click',function(){
			loadStationForm()
		})

		function loadAgent(){
			$.ajax({
				url: url+"/agents",

				success: function(data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadAgentForm(){
			$.ajax({
				url: url+"/agents?type=create",

				success: function(data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadAspirant(){
			$.ajax({
				url: url+"/aspirants",

				success: function(data){
					console.log(data)
					$('.content').html(data)
				},
				error: function(data){
					console.log(data)
					$('.content').html(data.responseText)
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadAspirantForm(){
			$.ajax({
				url: url+"/aspirants?type=create",

				success: function (data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadResult(){
			$.ajax({
				url: url+"/results",

				success: function (data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadResultForm(){
			$.ajax({
				url: url+"/results?type=create",

				success: function(data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadStation(){
			$.ajax({
				url: url+"/stations",

				success: function (data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

		function loadStationForm(){
			$.ajax({
				url: url+"/stations?type=create",

				success: function(data){
					$('.content').html(data)
				},
				error: function(data){
					$('.content').html('<h2 class="text-center">'+data.status+' '+data.statusText+'<h2>')
				}
			})
		}

	</script>
@endsection