<div class="" id="create-agent">
	<h3 class="title text-center">Add Agent</h3>
	{{ Form::open(['route'=>['agents.store'],'id'=>'create-agent-form','files'=>'true']) }}
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
		
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Save</button>
		</div>
	{{ Form::close() }}
	<div id="agent-info"></div>
</div>
<script type="text/javascript" src="{{ asset('js/agent.js') }}"></script>
<style>
	.help-block{
		color: red;
	}
	
</style>