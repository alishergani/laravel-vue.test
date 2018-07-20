<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scientist;
use App\Framework;

class StartController extends Controller
{

	public function index()
	{
		$scientists = Scientist::all();
    return view('home', [
    	'scientists' => $scientists
    ]);
	}


	public function getJson()
	{
		$scientists_ajax = Scientist::all();
		return $scientists_ajax;
	}

	public function chartData()
	{
		$data = Framework::all();
		return $data;
		
		// return [
		// 	'labels' => ['Vue.js', 'JavaScript', 'jQuery' , 'PHP' , 'Laravel', 'Python', 'Django'],
		// 	'datasets' => array([
		// 		'label' => 'DevStack',
		// 		'backgroundColor' => '#4d8af5',
		// 		'data' => [70, 80, 95, 130, 40, 10, 3]
		// 	])
		// ];
	}

	public function piechartData()
	{
		return [
			'labels' => ['Vue.js', 'JavaScript', 'jQuery' , 'PHP' , 'Laravel', 'Python', 'Django'],
			'datasets' => array([
				'label' => 'DevStack',
				'backgroundColor' => [
					'hsl('.rand(0, 50).', '.rand(0, 100).'%, '.rand(0, 100).'%)',
					'hsl('.rand(50, 100).', '.rand(0, 100).'%, '.rand(0, 100).'%)',
					'hsl('.rand(100, 200).', '.rand(0, 100).'%, '.rand(0, 100).'%)',
					'hsl('.rand(200, 250).', '.rand(0, 100).'%, '.rand(0, 100).'%)',
					'hsl('.rand(250, 300).', '.rand(0, 100).'%, '.rand(0, 100).'%)',
					'hsl('.rand(300, 360).', '.rand(0, 100).'%, '.rand(0, 100).'%)',
					'hsl('.rand(360, 0).', '.rand(0, 100).'%, '.rand(0, 100).'%)',
				],
				'data' => [rand(0, 200),rand(0, 200),rand(0, 200),rand(0, 200),rand(0, 200),rand(0, 200),rand(0, 200)]
			])
		];
	}
	public function randomchartData()
	{
		return [
			'labels' => ['Vue.js','JavaScript','jQuery' ,'PHP' ,'Laravel','Python', 'Django'],
			'datasets' => array(
				[
					'label' => 'NewStack',
					'backgroundColor' => 'hsl('.rand(0, 360).', '.rand(0, 100).'%, 80%)',
					'data' => [rand(0, 200),rand(0, 200),rand(0, 200),rand(0, 200),rand(0, 200),rand(0, 200),rand(0, 200)]
				],
				[
					'label' => 'DevStack',
					'backgroundColor' => 'hsl('.rand(0, 180).', '.rand(180, 100).'%, 80%)',
					'data' => [rand(0, 200),rand(0, 200),rand(0, 200),rand(0, 200),rand(0, 200),rand(0, 200),rand(0, 200)]
				]
			)
		];
	}

	public function newEvent(\Illuminate\Http\Request $request)
	{
		$result = [
			'labels' => ['Vue.js', 'JavaScript', 'jQuery' , 'PHP' , 'Laravel', 'Python', 'Django'],
			'datasets' => array([
				'label' => 'DevStack',
				'backgroundColor' => '#ff085',
				'data' => [70, 80, 95, 30, 40, 50, 40]
			])
		];

		if ($request->has('label')) {
			$result['labels'][] = $request->input('label');
			$result['datasets'][0]['data'][] = (integer)$request->input('sale');

			if ($request->has('realtime')) {
				if (filter_var($request->input('realtime'), FILTER_VALIDATE_BOOLEAN)) {
					event(new \App\Events\NewEvent($result));
				}
			}
		}

		return $result;
	}
}
