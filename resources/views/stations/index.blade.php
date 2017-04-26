<div id="all-stations">
	<h3 class="title text-center">Polling Stations</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Ward</th>
				<th>Registered Voters</th>
				<th>Total Votes</th>
				<th>Valid Votes</th>
				<th>Spoilt</th>
			</tr>
		</thead>
		<tbody>
			@foreach($station as $s)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td><a href="{{ URL::to('stations/'.$s->id) }}">{{ $s->name or '' }}</a></td>
				<td>{{ $s->ward->name or '' }}</td>
				<td>{{ $s->expected_votes }}</td>
				<td>{{ $s->total_votes or '' }}</td>
				<td style="color: darkgreen;">{{ $s->valid or '' }}</td>
				<td style="color: red;">{{ $s->spoilt or '' }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script type="text/javascript" src="{{ asset('js/station.js') }}"></script>