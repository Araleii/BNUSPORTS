<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect, Input, Auth;

use App\Application;

class AppController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 该方法的功能是向applications表里添加一条记录，并且返回一个预定已经受理的页面.
	 */
	public function index($type)
	{
		$application = new Application;
	
		$application->studentid = Input::get('studentid');
		$application->phone = Input::get('phone');
		$application->email = Input::get('email');
		$application->type = $type;
		if($type!='swimming'){
			$application->date = Input::get('date');
		}else{
			$application->date = date('Y-m-d');
		}
		$application->apptime = date('Y-m-d H:i:s');
		$application->enable = 1;
		$application->notes = Input::get('notes');
		$application->begintime = Input::get('begintime');
		$application->endtime = Input::get('endtime');
	
		
		
		if ($application->save()) {
				return view('appsucess',['type'=>$type]);
			} else {
				return Redirect::back()->withInput()->withErrors('申请提交失败！');
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
