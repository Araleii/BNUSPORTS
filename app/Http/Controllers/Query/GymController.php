<?php namespace App\Http\Controllers\Query;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\BadmintonState;
use App\Pingpang;
use App\Tennis;
use App\Application;

use Redirect, Input, Auth;

class GymController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($offset,$offsettennis,$showtype)
	{
		$d = date('Y-m-d',strtotime('+'.$offset.' day'));
		$today = date('Y-m-d');
		$totalday = BadmintonState::where('date', '>=', $today)->distinct()->count('date');
		
		for($i=0;$i<$totalday;$i++){
			$days[$i]=date('Y-m-d',strtotime('+'.$i.' day'));
		}
		
		$pingpangs = Pingpang::where('date', '=', $today)->get();
		
		$dtennis = date('Y-m-d',strtotime('+'.$offsettennis.' day'));
		$totaldaytennis = Tennis::where('date', '>=', $today)->distinct()->count('date');
		for($i=0;$i<$totaldaytennis;$i++){
			$daystennis[$i]=date('Y-m-d',strtotime('+'.$i.' day'));
		}
		$tennises = Tennis::where('date', '=', $dtennis)->get();
		
// 篮球订单的数据处理
		$basketballs = Application::where('type', '=', 'basketball')->get();
		$basketballs = $basketballs->sortByDesc('id');
//  篮球订单的数据处理结束

// 足球订单的数据处理
		$footballs = Application::where('type', '=', 'football')->get();
		$footballs = $footballs->sortByDesc('id');
// 足球订单的数据处理结束

// 游泳订单的数据处理
		$swimmings = Application::where('type', '=', 'swimming')->get();
		$swimmings = $swimmings->sortByDesc('id');
// 游泳订单的数据处理结束
		
		return view('query.queryadminhome',
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
				'basketballs'=>$basketballs,
				'footballs'=>$footballs,
				'swimmings'=>$swimmings
			])
		->withBadmintonstates(BadmintonState::where('date', '=', $d)->get());
		
	}
	
	public function Dealwithapp($id)
	{
		$offset = 0;
		$offsettennis = 0;
		$showtype = 5;
		
		$d = date('Y-m-d',strtotime('+'.$offset.' day'));
		$today = date('Y-m-d');
		$totalday = BadmintonState::where('date', '>=', $today)->distinct()->count('date');
		
		for($i=0;$i<$totalday;$i++){
			$days[$i]=date('Y-m-d',strtotime('+'.$i.' day'));
		}
		
		$pingpangs = Pingpang::where('date', '=', $today)->get();
		
		$dtennis = date('Y-m-d',strtotime('+'.$offsettennis.' day'));
		$totaldaytennis = Tennis::where('date', '>=', $today)->distinct()->count('date');
		for($i=0;$i<$totaldaytennis;$i++){
			$daystennis[$i]=date('Y-m-d',strtotime('+'.$i.' day'));
		}
		$tennises = Tennis::where('date', '=', $dtennis)->get();
		
	
		$application = Application::find($id);
		if(Input::get('result')=='yes'){
			$application->enable = 2;
		}else{
			$application->enable = 0;
		}
		
		if ($application->save()) {
			
// 篮球订单的数据处理
			$basketballs = Application::where('type', '=', 'basketball')->get();
// 篮球订单的数据处理结束

// 足球订单的数据处理
			$footballs = Application::where('type', '=', 'football')->get();
// 足球订单的数据处理结束
			
			
			return view('query.queryadminhome',
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
				'basketballs'=>$basketballs,
				'footballs'=>$footballs
			])
		->withBadmintonstates(BadmintonState::where('date', '=', $d)->get());
			
		} else {
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}
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
