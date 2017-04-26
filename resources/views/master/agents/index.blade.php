@extends('layouts.main')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					@include('agents.index')
				</div>
			</div>
			<div class="col-md-6">
				@include('agents.create')
			</div>
		</div>
	</div>
@endsection