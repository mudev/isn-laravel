<?php namespace App\Controllers\Admin;

use App\Models\Isnjob;
use App\Services\Validators\ArticleValidator;
use Image, Input, Notification, Redirect, Sentry, Str;

class JobsController extends \BaseController {

	/**
	 * Display the login page
	 * @return View
	 */

	public function index()
	{
		return \View::make('admin.ijobs.index')->with('isnjobs', Isnjob::all());
	}

	public function show($id)
	{
		return \View::make('admin.ijobs.show')->with('isnjob',Isnjob::find($id));
	}

	public function create()
	{
		return \View::make('admin.ijobs.create');
	}

	public function store()
	{
		$validation = new ArticleValidator;

		if ($validation->passes())
		{
			$ijob = new Isnjob;
			$ijob->title   = Input::get('title');
			$ijob->slug    = Str::slug(Input::get('title'));
			$ijob->body    = Input::get('body');
			$ijob->user_id = Sentry::getUser()->id;
			$ijob->save();

			// Now that we have the article ID we need to move the image
			if (Input::hasFile('image'))
			{
				$ijob->image = Image::upload(Input::file('image'), 'articles/' . $ijob->id);
				$ijob->save();
			}

			Notification::success('The job was saved.');

			return Redirect::route('admin.ijobs.e dit', $ijob->id);
		}

		return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	public function edit($id)
	{
		return \View::make('admin.ijobs.edit')->with('article', Isnjob::find($id));
	}

	public function update($id)
	{
		$validation = new ArticleValidator;

		if ($validation->passes())
		{
			$ijob = Isnjob::find($id);
			$ijob->title   = Input::get('title');
			$ijob->slug    = Str::slug(Input::get('title'));
			$ijob->body    = Input::get('body');
			$ijob->user_id = Sentry::getUser()->id;
			if (Input::hasFile('image')) $ijob->image   = Image::upload(Input::file('image'), 'articles/' . $ijob->id);
			$ijob->save();

			Notification::success('The job was saved.');

			return Redirect::route('admin.ijobs.edit', $ijob->id);
		}

		return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	public function destroy($id)
	{
		$ijob = Isnjob::find($id);
		$ijob->delete();

		Notification::success('The job was deleted.');

		return Redirect::route('admin.ijobs.index');
	}

}

