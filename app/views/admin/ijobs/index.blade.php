@extends('admin._layouts.default')

@section('main')

	<h1>
		Jobs <a href="{{ URL::route('admin.ijobs.create') }}" class="btn btn-success"><i class="icon-plus-sign"></i> Add new article</a>
	</h1>

	<hr>

	{{ Notification::showAll() }}

	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>When</th>
				<th><i class="icon-cog"></i></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($ijobs as $ijob)
				<tr>
					<td>{{ $ijob->id }}</td>
					<td><a href="{{ URL::route('admin.ijobs.show', $ijob->id) }}">{{ $ijob->title }}</a></td>
					<td>{{ $ijob->created_at }}</td>
					<td>
						<a href="{{ URL::route('admin.ijobs.edit', $ijob->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>

						{{ Form::open(array('route' => array('admin.ijobs.destroy', $ijob->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
							<button type="submit" href="{{ URL::route('admin.ijobs.destroy', $ijob->id) }}" class="btn btn-danger btn-mini">Delete</button>
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop
