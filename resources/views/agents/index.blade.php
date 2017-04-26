<div id="all-agents">
	<h3 class="title text-center">Agents</h3>
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
			@foreach($agent as $a)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td><a href="{{ URL::to('agents/'.$a->id) }}">{{ $a->name or ''}}</a></td>
				<td>{{ $a->phone or '' }}</td>
				<td>{{ $a->email or '' }}</td>
				<td>{{ \Carbon\Carbon::parse($a->created_at)->diffForHumans() }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
<script type="text/javascript" src="{{ asset('js/agent.js') }}"></script>
{{-- <a class="pull-right btn btn-default" id="add-new" ">Add New Agent</a> --}}
</div>

