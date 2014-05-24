@if (Sentry::check())
	<ul class="nav">
		<li class="{{ Request::is('admin/pages*') ? 'active' : null }}"><a href="{{ URL::route('admin.pages.index') }}"><i class="icon-book"></i> Pages</a></li>
		<li class="{{ Request::is('admin/ijobs*') ? 'active' : null }}"><a href="{{ URL::route('admin.ijobs.index') }}"><i class="icon-edit"></i> Jobs</a></li>
		<li><a href="{{ URL::route('admin.logout') }}"><i class="icon-lock"></i> Logout</a></li>
	</ul>
@endif
