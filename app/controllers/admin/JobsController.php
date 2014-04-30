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
		return \View::make('admin.articles.index')->with('isnjobs', Isnjob::all());
	}

	public function show($id)
	{
		return \View::make('admin.articles.show')->with('isnjob',Isnjob::find($id));
	}

	public function create()
	{
		return \View::make('admin.articles.create');
	}

	public function store()
	{
		$validation = new ArticleValidator;

		if ($validation->passes())
		{
			$article = new Isnjob;
			$article->title   = Input::get('title');
			$article->slug    = Str::slug(Input::get('title'));
			$article->body    = Input::get('body');
			$article->user_id = Sentry::getUser()->id;
			$article->save();

			// Now that we have the article ID we need to move the image
			if (Input::hasFile('image'))
			{
				$article->image = Image::upload(Input::file('image'), 'articles/' . $article->id);
				$article->save();
			}

			Notification::success('The job was saved.');

			return Redirect::route('admin.articles.edit', $article->id);
		}

		return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	public function edit($id)
	{
		return \View::make('admin.articles.edit')->with('article', Isnjob::find($id));
	}

	public function update($id)
	{
		$validation = new ArticleValidator;

		if ($validation->passes())
		{
			$article = Isnjob::find($id);
			$article->title   = Input::get('title');
			$article->slug    = Str::slug(Input::get('title'));
			$article->body    = Input::get('body');
			$article->user_id = Sentry::getUser()->id;
			if (Input::hasFile('image')) $article->image   = Image::upload(Input::file('image'), 'articles/' . $article->id);
			$article->save();

			Notification::success('The job was saved.');

			return Redirect::route('admin.articles.edit', $article->id);
		}

		return Redirect::back()->withInput()->withErrors($validation->errors);
	}

	public function destroy($id)
	{
		$article = Isnjob::find($id);
		$article->delete();

		Notification::success('The job was deleted.');

		return Redirect::route('admin.articles.index');
	}

}

