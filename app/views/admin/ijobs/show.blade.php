@extends('admin._layouts.default')

@section('main')
	<h2>Display Job</h2>

	<hr>

	<h3>{{ $ijob->title }}</h3>
	<h5>@{{ $ijob->created_at }}</h5>
	{{ $ijob->body }}

	@if ($ijob->image)
		<hr>
		<figure><img src="{{ Image::resize($ijob->image, 800, 600) }}" alt=""></figure>
	@endif
@stop
