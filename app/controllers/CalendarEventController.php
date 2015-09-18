<?php

class CalendarEventController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /location
	 *
	 * @return Response
	 */
	public function index()
	{
		$locations = Location::orderBy('created_at', 'desc')->paginate(6);
		$events = CalendarEvent::orderBy('created_at', 'desc')->paginate(6);
		return View::make('/home')->with(array('locations' => $locations, 'events' => $events));	
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /location/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('events.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /location
	 *
	 * @return Response
	 */
	public function store()
	{
		$event = new CalendarEvent();
		$event->start = Input::get('start');
		$event->end = Input::get('end');
		$event->title = Input::get('title');
		$event->description = Input::get('description');
		if (Input::hasFile('img')) {
	            $event->img = Input::file('img')->move("images/uploaded/");
	    }
		if(Input::has('price')) {
			$event->price = Input::get('price');
		}
		$event->user_id = Auth::id();
		$event->location_id = Input::get('locationID');
		$event->save();
		Log::info('Log Message', Input::all());
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
		$CalendarEvent = CalendarEvent::find($id);
		$EventID = $CalendarEvent->location_id;
		$Location = Location::find($EventID);
		if(!$CalendarEvent) {
			Session::flash('errorMessage' , "Blog post was not found");
			App::abort(404);
		} 
		Log::info(Input::all());
		return View::make('/event')->with(array('event' => $CalendarEvent, 'location' => $Location));
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
		$location = CalendarEvent::find($id);
		$location->delete();
 		// Modify destroy() to send back JSON if it's been requested
        if (Request::wantsJson()) {
            return Response::json(array('Response' , "Good!"));
        } else {
            return Redirect::action('LocationController@index');
        }	
	}

	 public function getEvent() 
    {
    	$events = CalendarEvent::with('location')->get();
		return Response::json($events);
    }


}