<?php namespace App\Http\Controllers\Query;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\BadmintonState;
use App\Pingpang;
use App\Tennis;
use App\Application;


class QueryHomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 //该方法负责羽毛球
	public function index($offset,$offsettennis,$showtype)
	{
// 羽毛球的数据处理
		$d = date('Y-m-d',strtotime('+'.$offset.' day'));
		$today = date('Y-m-d');
		$totalday = BadmintonState::where('date', '>=', $today)->distinct()->count('date');
		for($i=0;$i<$totalday;$i++){
			$days[$i]=date('Y-m-d',strtotime('+'.$i.' day'));
		}
// 羽毛球的数据处理结束

// 乒乓球的数据处理
		$pingpangs = Pingpang::where('date', '=', $today)->get();
// 乒乓球的数据处理结束

// 网球的数据处理
		$dtennis = date('Y-m-d',strtotime('+'.$offsettennis.' day'));
		$totaldaytennis = Tennis::where('date', '>=', $today)->distinct()->count('date');
		for($i=0;$i<$totaldaytennis;$i++){
			$daystennis[$i]=date('Y-m-d',strtotime('+'.$i.' day'));
		}
		$tennises = Tennis::where('date', '=', $dtennis)->get();
// 网球的数据处理结束


// 篮球订单的数据处理
		$basketballs = Application::where('type', '=', 'basketball')->get();
//  篮球订单的数据处理结束

		return view('query.queryhome',
			[  
				'days'=>$days,
				'daystennis'=>$daystennis,
			    'offset'=>$offset,
				'offsettennis'=>$offsettennis,
				'totalday'=>$totalday,
				'totaldaytennis'=>$totaldaytennis,
				'pingpangs'=>$pingpangs,
				'tennises'=>$tennises,
				'showtype'=>$showtype,
				'basketballs'=>$basketballs
			])
		->withBadmintonstates(BadmintonState::where('date', '=', $d)->get());
	}

	 //该方法负责乒乓球
	public function pingpang()
	{
		return view('query.queryhome')->withBadmintonstates(BadmintonState::all());
	}
	
	
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
