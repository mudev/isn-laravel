<?= '<span style="color:red">' . Session::get('login_error') . '</span>' ?>
<?= Form::open() ?>
<?= Form::label('email', 'Email address: ') ?>
<?= Form::text('email', Input::old('email')) ?>
<?= Form::label('password', 'Password:') ?>
<?= Form::password('password') ?>
<?= Form::submit('Login!') ?>
<?= Form::close() ?>