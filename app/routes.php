<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;				

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::error(function(ModelNotFoundException $e)
{
    return Response::view('404', array(), 404);
});

App::missing(function($exception)
{
    return Response::view('404', array(), 404);
});

Route::get('/', function()
{
	return Response::json(Array('name'=>'GurbaniDB','version'=>'1.0.0'));
});

Route::get('random', function()
{
	$data = Scripture::find(800)->melody;
	return Response::json($data);
});

Route::get('scripture/{id?}', function($id = 1)
{
	$data = Scripture::where('id', '=', $id)->firstOrFail();
	$data['melody'] = json_decode((String)Scripture::find($id)->melody);
	$data['author'] = json_decode((String)Scripture::find($id)->author);
	$data['language'] = json_decode((String)Scripture::find($id)->language);

	return Response::json($data);
});

Route::get('translation/{scripture_id?}/{language_id?}', function($scripture_id = 1, $language_id = 1)
{
	$data = Translation::whereRaw("scripture_id = {$scripture_id} and language_id = {$language_id}")->firstOrFail();
	$data['scripture'] = json_decode((String)Translation::find($data->id)->scripture);
	$data['language'] = json_decode((String)Translation::find($data->id)->language);
	
	return Response::json($data);
});

Route::get('melody', function()
{
	$data = Melody::all();

	return Response::json($data);
});

Route::get('melody/{id?}', function($id = 1)
{
	$data = Melody::where('id', '=', $id)->firstOrFail();

	return Response::json($data);
});

Route::get('author', function()
{
	$data = Author::all();

	return Response::json($data);
});

Route::get('author/{id?}', function($id = 1)
{
	$data = Author::where('id', '=', $id)->firstOrFail();

	return Response::json($data);
});

Route::get('language', function()
{
	$data = Language::all();

	return Response::json($data);
});

Route::get('language/{id?}', function($id = 1)
{
	$data = Language::where('id', '=', $id)->firstOrFail();

	return Response::json($data);
});