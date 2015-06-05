<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Activity;

use Redirect, Input;

class ActivityController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  return view('activityhome')->withActivities(Activity::all());
	}
	
	public function adminhome()
	{
	  return view('activityadminhome')->withActivities(Activity::all());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('activity.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|unique:pages|max:255',
			'starttime' => 'required',
			'endtime' => 'required',
			'place' => 'required',
			'organizer' => 'required',
			'tel'=> 'required',
			'requirement' => 'max:255',
		]);

		$activity = new Activity;
		$activity->title = Input::get('title');
		$activity->starttime = Input::get('starttime');
		$activity->endtime = Input::get('endtime');
		$activity->place = Input::get('place');
		$activity->organizer = Input::get('organizer');
		$activity->tel = Input::get('tel');
		$activity->email = Input::get('email');
		$activity->requirement = Input::get('requirement');
		$activity->detail = Input::get('detail');
		//$activity->user_id = 1;//Auth::user()->id;

		if ($activity->save()) {
			return Redirect::to('activity');
		} else {
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}
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
		return view('activity.edit')->withActivity(Activity::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$this->validate($request, [
			'title' => 'required|unique:pages|max:255',
			'starttime' => 'required',
			'endtime' => 'required',
			'place' => 'required',
			'organizer' => 'required',
			'tel'=> 'required',
			'requirement' => 'max:255',
		]);

		$activity = Activity::find($id);
		
		$activity->title = Input::get('title');
		$activity->starttime = Input::get('starttime');
		$activity->endtime = Input::get('endtime');
		$activity->place = Input::get('place');
		$activity->organizer = Input::get('organizer');
		$activity->tel = Input::get('tel');
		$activity->email = Input::get('email');
		$activity->requirement = Input::get('requirement');
		$activity->detail = Input::get('detail');
		//$activity->user_id = 1;//Auth::user()->id;

		if ($activity->save()) {
			return Redirect::to('activity');
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
		$activity = Activity::find($id);
		$activity->delete();

		return Redirect::to('activity');
	}

}
