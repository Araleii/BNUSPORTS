<?php namespace App\Http\Controllers\Query;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\BadmintonState;
use App\Pingpang;
use App\Tennis;
use App\Application;

use Redirect, Input, Auth;

class TennisController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//找到最大的一天，加1便是要新增的日子
		$maxday =  Tennis::max('date');
		$newday = date('Y-m-d',strtotime("$maxday +1 day"));
		
		return view('query.addtennis',['newday'=>$newday]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		for($i=1; $i<=4; $i++){
			$tennis = new Tennis;
			$tennis->name = '网球'.$i.'号场';
			$tennis->date = Input::get('date');
			$tennis->six2seven = Input::get('d'.$i.'00');
			$tennis->seven2eight = Input::get('d'.$i.'10');
			$tennis->eight2nine = Input::get('d'.$i.'20');
			
			if ($tennis->save()) {
				
			} else {
				return Redirect::back()->withInput()->withErrors('保存失败！');
			}
		}
		return Redirect::back();
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
		$tennis = Tennis::find($id);
		if(Input::get('changetype')=='lock'){
			if(Input::get('time')=='six2seven'){
				$tennis->six2seven = 1;
			}else if(Input::get('time')=='seven2eight'){
				$tennis->seven2eight = 1;
			}else{
				$tennis->eight2nine = 1;
			}
		}else if(Input::get('changetype')=='unlock'){
			if(Input::get('time')=='six2seven'){
				$tennis->six2seven = 0;
			}else if(Input::get('time')=='seven2eight'){
				$tennis->seven2eight = 0;
			}else{
				$tennis->eight2nine = 0;
			}
		}

		if ($tennis->save()) {
			
			$offset=0;
			
			$startdate=strtotime(date('Y-m-d'));
			$enddate=strtotime($tennis->date);
			$offsettennis=round(($enddate-$startdate)/86400);
			
			$showtype=3;
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
			
		} else {
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}
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
