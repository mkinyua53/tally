<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//ajax routes to help in forms
Route::get('counties/all', function(){
	$county = \App\County::with('constituency')->orderBy('name')->get();
	foreach ($county as $key) {
		$key->load('constituency');
	}
	return response()->json($county);
});

Route::get('constituencies/{constituency}', function($id){
	$constituency = \App\Constituency::with('ward')->find($id);
	return response()->json($constituency);
});

// end
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/app', function(){
	return view('tally.main');
})->middleware('auth');

Route::get('/error',function(){
	return view('errors.token_mismatch');
})->name('error');

Route::resource('agents','AgentController',['except'=>['create','edit']]);
Route::resource('aspirants','AspirantController',['except'=>['create','edit']]);
Route::resource('results','ResultController',['except'=>['create','edit']]);
Route::resource('stations','StationController',['except'=>['create','edit']]);

Route::post('agents/{agents}/avatar','AgentController@avatar')->name('agent.avatar');
Route::post('aspirants/{aspirants}/avatar','AspirantController@avatar')->name('aspirant.avatar');