	<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|scientists
*/

Route::get('/', function() {
	return view('welcome');
});

Route::get('/start', 'StartController@index');
// Route::get('/start', function () {
// 	$scientists = DB::table('colors_table')->get();
// 	return view('home', [
//   	'scientists' => $scientists
//   ]);
// });

Route::get('/start/get-json', 'StartController@getJson');

Route::get('/start/chart-data', 'StartController@chartData');

Route::get('/start/pie-chart-data', 'StartController@piechartData');

Route::get('/start/random-chart-data', 'StartController@randomchartData');

Route::get('/start/socket-chart', 'StartController@newEvent');