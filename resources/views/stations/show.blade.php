<?php
use App\Result;
?>
<div id="station">
	<ul class="list-unstyled">
		<li>
			<dl class="dl-horizontal">
				<dt>Name</dt><dd>{{ $station->name or '' }}</dd>
			</dl>
		</li>
		<li>
			<dl class="dl-horizontal">
				<dt>Ward</dt><dd>{{ $station->ward->name or '' }}</dd>
			</dl>
		</li>
		<li>
			<dl class="dl-horizontal">
				<dt>Registered Voters</dt><dd>{{ $station->expected_votes or '' }}</dd>
			</dl>
		</li>
		<li>
			<dl class="dl-horizontal">
				<dt>Total Voters</dt><dd>{{ $station->total_votes or '' }}</dd>
			</dl>
		</li>
		<li>
			<dl class="dl-horizontal">
				<dt>Valid Votes</dt><dd>{{ $station->valid or '' }}</dd>
			</dl>
		</li>
		<li>
			<dl class="dl-horizontal">
				<dt>Spoilt Votes</dt><dd>{{ $station->spoilt or '' }}</dd>
			</dl>
		</li>
	</ul>

	<div id="station-results">
		<h3 class="title text-center">Results From This stations</h3>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Time</th>
						<th>Aspirant</th>
						<td>Votes</td>
					</tr>
				</thead>
				<tbody>
					@foreach($station->result->sortBy('created_at') as $r)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $r->created_at or '' }}</td>
						<td>{{ $r->aspirant->name or '' }}</td>
						<td>{{ $r->votes or '' }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
	</div>
</div>
<script type="text/javascript" src="{{ asset('js/station.js') }}"></script>