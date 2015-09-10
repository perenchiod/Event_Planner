<?php
use \Esensi\Model\SoftModel;

class Location extends SoftModel {
	protected $fillable = [];

	protected $table = 'location';

	protected $rules = array (
		'city' => 'required|max:255',
		'state' => 'required|max:255',
		'zip' => 'required|max:255',
		'address' => 'required|max:300'
	);

	public function location() 
	{
		return $this->belongsTo('CalendarEvent');
	}
	
}