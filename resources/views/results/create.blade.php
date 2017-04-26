<div id="create-result">
	<h3 class="title text-center">Add New Results</h3>
	{{ Form::open(['route'=>['results.store'],'id'=>'create-result-form']) }}
		<div class="form-group" id="myAgents">
			{{ Form::label('agent_id','Agent') }}
			{{ Form::select('agent_id',$agent,null,['class'=>'form-control','placeholder'=>'Select Agent','required']) }}
		</div>
		<span class="help-block myAgents agent-error"></span>

		<div class="form-group">
			{{ Form::label('time','Time') }}
			{{ Form::text('time',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Result\'s creation time (nullable)']) }}
			<span class="help-block time-error"></span>
		</div>
		<span class="current-time"></span>

		<div class="form-group">
			{{ Form::label('station_id','Station') }}
			{{ Form::select('station_id',$station,null,['class'=>'form-control','placeholder'=>'Choose Station','required']) }}
			<span class="help-block station-error"></span>
		</div>

		<div class="form-group">
			<span style="color: red;">If you are entering 'Spoilt Votes', choose the apropriate Spoilt 'aspirant' for that station. e.g <a title="Choose this value to update spoilt votes">Spoilt-<span id="spoilt">Karatina</span></a></span><br>
			{{ Form::label('aspirant_id','Aspirant') }}
			{{ Form::select('aspirant_id',$aspirant,null,['class'=>'form-control','placeholder'=>'Choose Aspirant','required']) }}
			<span class="help-block aspirant-error"></span>
		</div>

		<div class="form-group">
			{{ Form::label('votes','Votes') }}
			{{ Form::number('votes',null,['class'=>'form-control','placeholder'=>'Number of Votes','required']) }}
			<span class="help-block votes-error"></span>
		</div>

		<div class="form-group text-center">
			<button class="btn btn-primary" type="submit">Submit</button>
		</div>
		<span id="result-info"></span>
		
	{{ Form::close() }}
</div>
<script type="text/javascript" src="{{ asset('js/result.js') }}"></script>
<script>
	$(function(){
		$('#station_id').on('change', function(){
			var example = $(this).val()
			$('#aspirant_id').val(example).css('text','red')
		})
	})
</script>