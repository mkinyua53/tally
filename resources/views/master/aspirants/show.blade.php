@extends('layouts.main')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-body"> 
						@include('aspirants.show')
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
					{{ Form::model($aspirant,['route'=>['aspirants.update',$aspirant->id],'method'=>'PUT']) }}
				        <div class="form-group">
							{{ Form::label('name','Name') }}
							{{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter the aspirant\'s name','required']) }}
							<span class="help-block name-error"></span>
						</div>
						<div class="form-group">
							{{ Form::label('level','The Aspiring Seat') }}
							{{ Form::select('level',['MCA'=>'MCA','Women Rep'=>'Women Rep','MP'=>'MP','Youth Rep'=>'Youth Rep','Disabled Rep'=>'Disabled Rep','Senator'=>'Senator','Governor'=>'Governor','President'=>'President'],null,['class'=>'form-control','placeholder'=>'Select One ...','required']) }}
							<span class="help-block level-error"></span>
						</div>
						
						<div class="form-group">
							{{ Form::label('ward_id','Ward') }}
							{{ Form::select('ward_id',$ward,null,['class'=>'form-control','placeholder'=>'Select Ward ...','required']) }}
							<span class="help-block ward-error"></span>
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