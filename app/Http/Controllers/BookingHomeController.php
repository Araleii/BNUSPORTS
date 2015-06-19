<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Order;
use App\BadmintonState;
use App\Pingpang;
use App\Tennis;


use Redirect, Input, Auth;

class BookingHomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 {type}/{date}/{time}
	 */
	public function index($type,$date,$time,$name,$id)
	{
		return view('BookingHome',
			[
				'type'=>$type,
				'date'=>$date,
				'time'=>$time,
				'name'=>$name,
				'id'=>$id
			]);
	}
	
	
	/**
	 * 用于完成支付，将账单写入数据库，并且修改场馆状态
	 *
	 * @return Response
	 */
	
	public function pay( $userid,$type,$gymname,$bookingdate,$time,$id)
	{
			
			$order = new Order;
			
			$order->userid = $userid;
			$order->type = $type;
			$order->gymname = $gymname;
			$order->paytime = date('Y-m-d H:i:s');
			$order->bookingtime = $bookingdate;
			$order->time = $time;
					
			//如果账单成功存储，就修改场馆状态
			if ($order->save()) {
				
				
				
				$startdate=strtotime(date('Y-m-d'));
				$enddate=strtotime($bookingdate);
				
				if($type=="badminton"){
					$offset=round(($enddate-$startdate)/86400);
					$offsettennis=0;
				}else if($type=="tennis"){
					$offset=0;
					$offsettennis=round(($enddate-$startdate)/86400);
				}else{
					$offset=0;
					$offsettennis=0;
				}
				
				$d = date('Y-m-d',strtotime('+'.$offset.' day'));
				$today = date('Y-m-d');
				$totalday = BadmintonState::where('date', '>=', $today)->distinct()->count('date');
				for($i=0;$i<$totalday;$i++){
					$days[$i]=date('Y-m-d',strtotime('+'.$i.' day'));
				}
				
				
				$dtennis = date('Y-m-d',strtotime('+'.$offsettennis.' day'));
				$totaldaytennis = Tennis::where('date', '>=', $today)->distinct()->count('date');
				for($i=0;$i<$totaldaytennis;$i++){
					$daystennis[$i]=date('Y-m-d',strtotime('+'.$i.' day'));
				}

						
				
				if($type=="badminton"){
					//这里处理羽毛球
					$badmintonstate = BadmintonState::find($id);
					if($time=='morning'){
						$badmintonstate->morning = 2;
					}else if($time=='afternoon'){
						$badmintonstate->afternoon = 2;
					}else{
						$badmintonstate->evening = 2;
					}
					
					if ($badmintonstate->save()) {
						
						//成功完成!
						$pingpangs = Pingpang::where('date', '=', $today)->get();
						$tennises = Tennis::where('date', '=', $dtennis)->get();
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
							'showtype'=>1
							])
						->withBadmintonstates(BadmintonState::where('date', '=', $d)->get());
					
					}else{
						return Redirect::back()->withInput()->withErrors('修改状态失败！');
					}	
				}else if($type=='pingpang'){
					//这里处理乒乓球
					
					$pingpang = Pingpang::find($id);
					if($time=='six2seven'){
						$pingpang->six2seven = 2;
					}else if($time=='seven2eight'){
						$pingpang->seven2eight = 2;
					}else{
						$pingpang->eight2nine = 2;
					}
					
					if ($pingpang->save()) {
						
						//成功完成!
						$pingpangs = Pingpang::where('date', '=', $today)->get();
						$tennises = Tennis::where('date', '=', $dtennis)->get();
						
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
							'showtype'=>2
							])
						->withBadmintonstates(BadmintonState::where('date', '=', $d)->get());
					
					}else{
						return Redirect::back()->withInput()->withErrors('修改状态失败！');
					}	
					
				}else if($type=='tennis'){
					$tennis = Tennis::find($id);
					if($time=='six2seven'){
						$tennis->six2seven = 2;
					}else if($time=='seven2eight'){
						$tennis->seven2eight = 2;
					}else{
						$tennis->eight2nine = 2;
					}
					
					if ($tennis->save()) {
						
						//成功完成!
						$pingpangs = Pingpang::where('date', '=', $today)->get();
						$tennises = Tennis::where('date', '=', $dtennis)->get();

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
							'showtype'=>3
							])
						->withBadmintonstates(BadmintonState::where('date', '=', $d)->get());
					
					}else{
						return Redirect::back()->withInput()->withErrors('修改状态失败！');
					}	
				}else{
							//这里处理其他类型的场馆
				}
			}else{
				return Redirect::back()->withInput()->withErrors('预订失败！');
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
