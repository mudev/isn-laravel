<h2>ISN Registration</h2>
<?php $messages = $errors->all('<p style="color:red;">:message</p>') ?>
<?php foreach ($messages as $msg): ?>
<?= $msg ?>
<?php endforeach; ?>
<? Form::open() ?>
	<?= Form::label('email', 'Email Address:') ?>
	<?= Form::text('email', Input::old('email')) ?>
	<br>
	<?= Form::label('password', 'Password') ?>
	<?= Form::password('password') ?>
	<br>
	<?= Form::label('password_confirm', 'Retype Password:') ?>
	<?= Form::password('password_confirm') ?>
	<br>
	<?= Form::label('name', 'Name: ') ?>
	<?= Form::text('name', Input::old('name')) ?>
	<br>
	<?= Form::label('admin', 'Admin?: ') ?>
	<?= Form::checkbox('admin','true', Input::old('admin')) ?>
	<?= Form::submit('Register!') ?>
<?= Form::close() ?>