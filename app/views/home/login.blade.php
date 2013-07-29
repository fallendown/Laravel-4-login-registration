@extends('master')

@section('content')


<div class="row">
	<div class="span4 offset1">
		<div class="well">
			<legend>Please Login</legend>
			{{ Form::open(array('url' => 'login')) }}
			@if($errors->any())
			<div class="alert alert-error">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</div>
			@endif
			{{ Form::text('email', '', array('placeholder' => 'Email')) }}<br>
			{{ Form::password('password', array('placeholder' => 'Password')) }}<br>
			{{ Form::submit('Login', array('class' => 'btn btn-success')) }}
			{{ HTML::link('register', 'Register', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
		</div>
	</div>
</div>

@stop