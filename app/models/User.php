<?php

use \Esensi\Model\SoftModel;
use \Esensi\Model\Traits\HashingModelTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends SoftModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public $rules = array (
		'email' => 'required|email|max:255|unique:users',
		'first_name' => 'required|max:255',
		'last_name' => 'required|max:255',
		'password' => 'required|confirmed',
	);

	public function user()
	{
	    return $this->hasMany('CalendarEvent');
	}

	public function setPasswordAttribute($value)
	{
	    $this->attributes['password'] = Hash::make($value);
	}

	public function calendarEvents()
	{
	    return $this->belongsToMany('CalendarEvent', 'calendar_event_user')->withTimestamps();
	}

}
