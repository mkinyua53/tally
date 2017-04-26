@extends('layouts.main')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-body"> 
						@include('stations.show')
						<button class="pull-right btn btn-default" data-toggle="modal" data-target="#myModal">Edit</button>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				
			</div>
			<div class="col-md-6">
				<div class="panel panel-danger">
					<div class="panel-body">
						<h3 class="title text-center">Aspirants in this Station</h3>
						<table class="table table-striped table-bordered">
							<?php
							use \App\Station;
							use \App\Aspirant;
							$aspirant = $station->aspirant->sortByDesc('votes');
							?>
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Ward</th>
									<th>Votes</th>
								</tr>
							</thead>
							<tbody>
								@foreach($aspirant as $a)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $a->name }}</td>
									<td>{{ $a->ward->name }}</td>
									<td>{{ $a->votes }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
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
					{{ Form::model($station,['route'=>['stations.update',$station->id],'method'=>'PUT']) }}
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