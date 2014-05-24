@extends('admin._layouts.default')

@section('main')

	<div id="login" class="login">
		{{ Form::open() }}

			@if ($errors->has('login'))
				<div class="alert alert-error">{{ $errors->first('login', ':message') }}</div>
			@endif

			<div class="control-group">
				{{ Form::label('email', 'Email') }}
				<div class="controls">
					{{ Form::text('email') }}
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('password', 'Password') }}
				<div class="controls">
					{{ Form::password('password') }}
				</div>
			</div>

			<div class="form-actions">
				{{ Form::submit('Login', array('class' => 'btn-login')) }}
			</div>

		{{ Form::close() }}
	</div>
	<div class="signup">
		{{ Form::open() }}
			@if ($errors->has ('signup'))
				<div class="alert alert-error">{{ $errors->first('signup', ':message') }}</div>
			@endif

			<div class="control-group">
				{{ Form::label('email', 'Email') }}
				<div class="controls">
					{{ Form::text('newemail') }}
				</div>
			</div>
			<div class="control-group">
				{{ Form::label('newpass', 'Password') }}
				<div class="controls">
					{{ Form::password('newpass') }}
				</div>
			</div>
			<div class="form-actions">
				{{ Form::submit('Login', array('class' => 'btn-login pill')) }}
			</div>
	</div>
@stop