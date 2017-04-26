<div id="create-station">
	<div class="panel panel-danger panel-body">
		<ul class="list-group">
			<li class="list-group-item">
				<p>By Default, Creating a station will also create an aspirant called "Spoilt-'station->name'."</p>
				<p>This 'aspirant' will be used to store the spoilt votes for that station.</p>
				<p>As the results are entered, the station's total will be updated automatically.</p>
			</li>
		</ul>
	</div>
	{{ Form::open(['route'=>['stations.store'],'id'=>'create-station-form']) }}
		<div class="form-group">
			{{ Form::label('name','Station\'s name') }}
			{{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter the station\'s name ...','required']) }}
			<span class="help-block name-error"></span>
		</div>

		<div class="form-group">
			{{ Form::label('ward_id','Ward Location') }}
			{{ Form::select('ward_id',$ward,null,['class'=>'form-control','placeholder'=>'Select the ward the station is located.','required']) }}
			<span class="help-block ward-error"></span>
		</div>

		<div>
			{{ Form::label('expected_votes','Total Registered Voters') }}
			{{ Form::number('expected_votes',null,['class'=>'form-control','placeholder'=>'Enter this info if available']) }}
			<span class="help-block total_votes-error"></span>
		</div>

		<div class="form-group">
			<button class="btn btn-primary" type="submit" title="Save this Station">Submit</button>
		</div>
		<span id="station-info"></span>
	{{ Form::close() }}
</div>
<script type="text/javascript" src="{{ asset('js/station.js') }}"></script>