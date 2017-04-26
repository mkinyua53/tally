@extends('layouts.main')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-body"> 
						<ol class="list-group">
							<li class="list-group-item"><strong>Agent: </strong>{{ $result->agent->name or '' }}</li>
							<li class="list-group-item"><strong>Added: </strong>{{ \Carbon\Carbon::parse($result->created_at)->diffForHumans() }}</li>
							<li class="list-group-item"><strong>Station: </strong>{{ $result->station->name or '' }}</li>
							<li class="list-group-item"><strong>Aspirant: </strong>{{ $result->aspirant->name or '' }}</li>
							<li class="list-group-item"><strong>Votes: </strong>{{ $result->votes or '' }}</li>
						</ol>
						<button class="pull-right btn btn-default" data-toggle="modal" data-target="#myModal">Edit</button>
					</div>
				</div>
			</div>
			<div class="col-md-6">
			
			</div>
		</div>
	</div>
	<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
		<div class="modal-dialog" role="document">
    		<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					{{ Form::model($result,['route'=>['results.update',$result->id],'method'=>'PUT']) }}
				        <div class="form-group">
							{{ Form::label('votes','Votes') }}
							{{ Form::number('votes',null,['class'=>'form-control','placeholder'=>'Number of Votes','required']) }}
							<span class="help-block votes-error"></span>
						</div>
						<div class="form-group text-center">
							<button class="btn btn-primary" type="submit">Submit</button>
						</div>
					{{ Form::close() }}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@endsection