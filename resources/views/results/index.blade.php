<div id="all-results">
	<h3 class="title text-center">All Results</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Agent</th>
				<th>Time</th>
				<th>Station</th>
				<th>Aspirant</th>
				<th>Votes</th>
			</tr>
		</thead>
		<tbody>
			@foreach($result as $r)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td><a href="{{ URL::to('results/'.$r->id) }}">{{ $r->agent->name or '' }}</a></td>
				<td>{{ \Carbon\Carbon::parse($r->created_at)->diffForHumans() }}</td>
				<td>{{ $r->station->name or '' }}</td>
				<td>{{ $r->aspirant->name or '' }}</td>
				<td>{{ $r->votes or '' }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script type="text/javascript" src="{{ asset('js/result.js') }}"></script>