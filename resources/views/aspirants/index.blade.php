<div id="all-aspirants">
	<h3 class="text-center title">Aspirants</h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Level</th>
				<th>Ward</th>
				<th>Votes</th>
			</tr>
		</thead>
		<tbody>
			@foreach($aspirant as $a)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td><a href="{{ URL::to('aspirants/'.$a->id) }}">{{ $a->name or '' }}</a></td>
				<td>{{ $a->level }}</td>
				<td>{{ $a->ward->name }}</td>
				<td>{{ $a->votes }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script type="text/javascript" src="{{ asset('js/aspirant.js') }}"></script>
<style>
	.help-block{
		color: red;
	}
</style>