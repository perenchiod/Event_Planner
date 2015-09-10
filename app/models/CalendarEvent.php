<?php
use \Esensi\Model\SoftModel;

class CalendarEvent extends SoftModel 
{
	protected $fillable = [];

	protected $table = 'calendar_events';

	protected $rules = array (
		'start' => 'required|max:255',
		'end' => 'required|max:255',
		'title' => 'required|max:255',
		'location_id' => 'required|confirmed|unique:calendar_events'
	);

	public function getDate() 
	{
		return array_merge(parent::getDate(), 'start_time', 'end_time');
	}

	public function event()
	{
		return $this->belongsTo('User' , 'user_id');
	}

}