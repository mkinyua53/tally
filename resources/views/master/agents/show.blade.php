@extends('layouts.main')

@section('content')
	<div class="container">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-info">
				<div class="panel-body">
					@include('agents.show')
					<button class="pull-right btn btn-default" data-toggle="modal" data-target="#myModal">Edit</button>
				</div>
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
					{{ Form::model($agent,['route'=>['agents.update',$agent->id],'method'=>'PUT']) }}
				        <div class="form-group">
							{{ Form::label('name','Enter Agent Full Name') }}
							{{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Agent\'s Full Name','required']) }}
							<span class="help-block name-error"></span>
						</div>
						<div class="form-group">
							{{ Form::label('phone','Phone Number') }}
							{{ Form::text('phone',null,['class'=>'form-control','placeholder'=>'+254722123456','required']) }}
							<span class="help-block phone-error"></span>
						</div>
						<div class="form-group">
							{{ Form::label('email','Email') }}
							{{ Form::email('email',null,['class'=>'form-control','placeholder'=>'you@yourdomain.com','required']) }}
							<span class="help-block email-error"></span>
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