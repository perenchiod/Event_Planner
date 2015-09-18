<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function doLogin() 
    {
        $username = Input::get('username');
        $password = Input::get('password');
        if (Auth::attempt(array('username' => $username, 'password' => $password))) {
        	Session::flash('successfulLogin' , "You're logged in");
            return Redirect::action('CalendarEventController@index');
        } else {
            // Display session flash message , log email that tried to authenticate
            Session::flash('failedLogin' , 'Incorrect username or password.');
            Log::warning('{{{$username}}} tried to login.');
            return Redirect::action('CalendarEventController@index');
        }
    }

    public function doLogout() 
    {
        Auth::logout();
        Session::flash('loggedOut' , 'Successfully logged out.');
        return Redirect::action('CalendarEventController@index');
    }

    public function getEvent() 
    {
    	$event = CalendarEvent::with('user')->get();
		return Response::json($event);
    }

    public function registerUser() 
    {
    	return View::make('/user/register');
    }

    public function storeUser() 
    {
    	$user = new User();
    	$user->first_name = Input::get('first_name');
    	$user->last_name = Input::get('last_name');
    	$user->email = Input::get('email');
    	$user->username = Input::get('username');
    	$user->password = Input::get('password');
    	$user->save();
    	return Redirect::action('LocationController@index');
    }


}
