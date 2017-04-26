@extends('layouts.main')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-body"> 
						@include('aspirants.index')
					</div>
				</div>
			</div>
			<div class="col-md-6">
				@include('aspirants.create')
			</div>
		</div>
	</div>
@endsection