<div class="" id="create-aspirant">
	<h3 class="title text-center">Add Aspirant</h3>
	{{ Form::open(['route'=>['aspirants.store'],'id'=>'new-aspirant']) }}
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
		<div id="counties">
			
		</div>
		<div class="form-group">
			{{ Form::label('ward_id','Ward') }}
			{{ Form::select('ward_id',$ward,null,['class'=>'form-control','placeholder'=>'Select Ward ...','required']) }}
			<span class="help-block ward-error"></span>
		</div>
		{{-- <div class="form-group">
			<label for="avatar"> Choose Photo.</label>
			<input type="file" name="avatar" required="">
			<span class="help-block avatar-error">Photo needs to be less than 2 MB</span>
		</div> --}}
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Submit</button>
		</div>
	{{ Form::close() }}
</div>
<div id="aspirant-info"></div>
<script type="text/javascript" src="{{ asset('js/aspirant.js') }}"></script>
<style>
	.help-block{
		color: red;
	}
</style>
