@extends('layouts.main')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-body"> 
						@include('results.index')
					</div>
				</div>
			</div>
			<div class="col-md-6">
				@include('results.create')
			</div>
		</div>
	</div>
@endsection