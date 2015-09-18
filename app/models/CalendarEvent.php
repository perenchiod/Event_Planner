<?php
use \Esensi\Model\SoftModel;

class CalendarEvent extends SoftModel 
{
	protected $fillable = [];

	protected $table = 'calendar_events';

	public $rules = array (
		'start' => 'required|max:255',
		'end' => 'required|max:255',
		'title' => 'required|max:255'
	);

	public function getDate() 
	{
		return array_merge(parent::getDate(), 'start_time', 'end_time');
	}

	public function location()
	{
		return $this->belongsTo('Location');
	}
	public function user()
	{
	    return $this->belongsToMany('User', 'calendar_event_user')->withTimestamps();
	}

}