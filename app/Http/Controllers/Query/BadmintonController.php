<?php namespace App\Http\Controllers\Query;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\BadmintonState;

use Redirect, Input, Auth;

class BadmintonController extends Controller {

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
		$maxday =  BadmintonState::max('date');
		$newday = date('Y-m-d',strtotime("$maxday +1 day"));
		
		return view('query.addbadminton',['newday'=>$newday]);
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		for($i=0; $i<10; $i++){
			$badmintonstate = new BadmintonState;
			$badmintonstate->name = '羽毛球场地'.$i;
			$badmintonstate->date = Input::get('date');
			$badmintonstate->morning = Input::get('d'.$i.'00');
			$badmintonstate->afternoon = Input::get('d'.$i.'10');
			$badmintonstate->evening = Input::get('d'.$i.'20');
			$badmintonstate->price = 30;
			
			if ($badmintonstate->save()) {
				
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
	 在这里，0代表空闲，1代表被锁定，2代表被预定
	 */
	public function update(Request $request,$id)
	{
		$badminton = BadmintonState::find($id);
		if(Input::get('changetype')=='lock'){
			if(Input::get('time')=='morning'){
				$badminton->morning = 1;
			}else if(Input::get('time')=='afternoon'){
				$badminton->afternoon = 1;
			}else{
				$badminton->evening = 1;
			}
		}else if(Input::get('changetype')=='unlock'){
			if(Input::get('time')=='morning'){
				$badminton->morning = 0;
			}else if(Input::get('time')=='afternoon'){
				$badminton->afternoon = 0;
			}else{
				$badminton->evening = 0;
			}
		}

		if ($badminton->save()) {
			return Redirect::back();
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
