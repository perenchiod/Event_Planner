<?php

class LocationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /location
	 *
	 * @return Response
	 */
	public function index()
	{
		$locations = Location::get();
		$CalendarEvent = CalendarEvent::paginate(6);
		return View::make('/home')->with(array('locations' => $locations, 'events' => $CalendarEvent));	
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /location/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('/location/create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /location
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$location = new Location();
		$location->address = Input::get('address');
		$location->city = Input::get('city');
		$location->state = Input::get('state');
		$location->zip = Input::get('zip');
		$location->save();

		$locations = Location::orderBy('created_at', 'desc')->paginate(6);
		return Redirect::action('LocationController@index');
		
	}
	

	/**
	 * Display the specified resource.
	 * GET /location/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$location = Location::find($id);
		if(!$location) {
			Session::flash('errorMessage' , "Blog post was not found");
			App::abort(404);
		} 
		Log::info(Input::all());
		return View::make('/event')->with('location' , $location);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /location/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function edit($id)
	// {
	// 	$location = Location::find($id);
	// 	return View::make('/')->with('location' , $location);
	// }

	/**
	 * Update the specified resource in storage.
	 * PUT /location/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Location::$rules);
		
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		} else {
			$location->address = Input::get('address');
			$location->city = Input::get('city');
			$location->state = Input::get('state');
			$location->zip = Input::get('zip');
			$location->save();

			return View::make('/submit')->with('location' , $location);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /location/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$location = Location::find($id);
		$location->delete();
		return Redirect::action('LocationController@index');
	}

	 public function getLocation() 
    {
    	$location = Post::with('location')->get();
		return Response::json($location);
    }


}