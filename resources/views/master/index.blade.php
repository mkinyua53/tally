@extends('layouts.main')

@section('content')
	<div class="container">
		@include('layouts.partials._appnav')
		<div class="row">
			<div class="col-md-6 pull-right" id="main">
				<h2 v-text="title"></h2>
			</div>
			<div class="col-md-6" id="all_agents" style="display: none;">
				<h2 class="text-center">All Agents</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Added</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="agent in all_agents">{{-- @{{ agent }} --}}</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script>
		var agents = new Vue({
			el: '#all_agents',
			data: {
				all_agents: ''
			},
			methods: {
				loadAgents: function(){
				var app = this
					axios.get(window.location.origin+"/agents")
						.then(function(response){
							response.data = app.all_agents
						})
				}
			},
			computed: {

			}
		})

		var main = new Vue({
			el: '#main',
			data: {
				title: 'Welcome to Live Tally'
			}
		})
	</script>
	<script>
		$('#agents').on('click',function(){
			$('#all_agents').show()
		})
	</script>
@endsection