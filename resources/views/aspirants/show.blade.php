<div id="aspirant_detail">
	<div class="panel panel-primary panel-body">
		<p><img class="img-circle img-responsive" src="{{ asset($aspirant->avatar) }}" style="float: right; height: 150px; width: auto;"></p>
		<p>
			{{ Form::open(['route'=>['aspirant.avatar',$aspirant->id],'id'=>'aspirant-avatar','files'=>'true']) }}
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
		<dt>Name</dt><dd>{{ $aspirant->name or '' }}</dd>
		<dt>Ward</dt><dd>{{ $aspirant->ward->name or '' }}</dd>
		<dt>Seat</dt><dd>{{ $aspirant->level or '' }}</dd>
		<dt>DATES</dt><dd>Created {{ \Carbon\Carbon::parse($aspirant->created_at)->diffForHumans() }}</dd>
					<dd>Updated {{ \Carbon\Carbon::parse($aspirant->updated_at)->diffForHumans() }}</dd>
	</dl>
</div>
<script>
// $(function(){	
// 	$('#aspirant-avatar').submit(function(e){
// 		e.preventDefault()
// 		var formurl = $(this).attr('action')
// 		var formdata = $(this).serialize()

// 		$.ajax({
// 			type: "POST",
// 			url: formurl,
// 			data: formdata,

// 			success: function(data){
// 				// $('img').attr('src') = url++data.avatar
// 			},
// 			error: function (data){
// 				console.log(data)
// 				var formerror = $.parseJSON(data.responseText)
// 				$(this).prepend(formerror.avatar)
// 			}
// 		})
// 	})
// })
</script>
