<?php namespace App\Http\Controllers\Query;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\BadmintonState;

class GymController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($offset)
	{
		$d = date('Y-m-d',strtotime('+'.$offset.' day'));
		$today = date('Y-m-d');
		$totalday = BadmintonState::where('date', '>=', $today)->distinct()->count('date');
		
		for($i=0;$i<$totalday;$i++){
			$days[$i]=date('Y-m-d',strtotime('+'.$i.' day'));
		}
		
		return view('query.queryadminhome',['days'=>$days,'offset'=>$offset,'totalday'=>$totalday])
		->withBadmintonstates(BadmintonState::where('date', '=', $d)->get());
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