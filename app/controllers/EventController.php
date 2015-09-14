<?php

class EventController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /location
	 *
	 * @return Response
	 */
	public function index()
	{
		$locations = Location::paginate(4);
		$events = CalendarEvent::paginate(4);
		return View::make('/home')->with(array('locations' => $locations, 'events' => $events));	
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /location/create
	 *
	 * @return Response
	 */
	// public function create()
	// {
	// 	return View::make('/create');
	// }

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

		$event = new CalendarEvent();
		$event->start = Input::get('start');
		$event->end = Input::get('end');
		$event->title = Input::get('title');
		$event->description = Input::get('description');
		if(Input::has('price')) {
			$event->price = Input::get('price');
		}
		$event->save();

		$locations = Location::paginate(7);
		Session::flash('goodMessage' , 'All went right here!');
		return View::make('/store')->with('locations' , $locations);
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
		$location = Location::with('calendar_events')->find('user_id');
		if(!$location) {
			Session::flash('errorMessage' , "Blog post was not found");
			App::abort(404);
		} 
		return View::make('event/')->with('location' , $location);
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