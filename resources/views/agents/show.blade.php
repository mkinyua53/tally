<div id="agent_detail">
	<div class="panel panel-primary panel-body">
		<p><img class="img-circle img-responsive" src="{{ asset($agent->avatar) }}" style="float: right; height: 150px; width: auto;"></p>
		<p>
			{{ Form::open(['route'=>['agent.avatar',$agent->id],'id'=>'agent-avatar','files'=>'true']) }}
				<div class="form-inline">
					<div class="form-group">
						{{ Form::file('avatar') }}
					</div>
					<div class="form-group">
						<button class="btn btn-default" type="submit" title="Upload file">Submit</button>
					</div>
				</div>
			{{ Form::close() }}
		</p>	
	</div>
	<dl class="dl-horizontal">
		<dt>Name</dt><dd>{{ $agent->name or '' }}</dd>
		<dt>Phone</dt><dd>{{ $agent->phone or '' }}</dd>
		<dt>Email</dt><dd>{{ $agent->email or '' }}</dd>
		<dt>DATES</dt><dd>Created {{ \Carbon\Carbon::parse($agent->created_at)->diffForHumans() }}</dd>
					<dd>Updated {{ \Carbon\Carbon::parse($agent->updated_at)->diffForHumans() }}</dd>
	</dl>
</div>
<script>
	
// $('#agent-avatar').submit(function(e){
// 	e.preventDefault()
// 	var formurl = $(this).attr('action')
// 	var formdata = $(this).serialize()

// 	$.ajax({
// 		type: "POST",
// 		url: formurl,
// 		data: formdata,

// 		success: function(data){
// 			// $('img').attr('src') = url++data.avatar
// 		},
// 		error: function (data){
// 			console.log(data)
// 			var formerror = $.parseJSON(data.responseText)
// 			$(this).prepend(formerror.avatar)
// 		}
// 	})
// })
</script>
