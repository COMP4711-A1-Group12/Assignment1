<?php

/**
 * This is a "CMS" model for players, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Players extends CI_Model {

	// The data comes from http://www.quotery.com/top-100-funny-quotes-of-all-time/?PageSpeed=noscript
	var $data = array(
		array('id' => '1', 'who' => 'Bob Monkhouse', 'mug' => 'bob-monkhouse-150x150.jpg', 'where' => '/player/1',
			'recent_trans' => 'recent transactions', 'current_holds' => 'current holdings'),
		array('id' => '2', 'who' => 'Elayne Boosler', 'mug' => 'elayne-boosler-150x150.jpg', 'where' => '/player/2',
			'recent_trans' => 'recent transactions', 'current_holds' => 'current holdings'),
		array('id' => '3', 'who' => 'Mark Russell', 'mug' => 'mark-russell-150x150.jpg', 'where' => '/player/3',
			'recent_trans' => 'recent transactions', 'current_holds' => 'current holdings'),
		array('id' => '4', 'who' => 'Anonymous', 'mug' => 'Anonymous-150x150.jpg', 'where' => '/player/4',
			'recent_trans' => 'recent transactions', 'current_holds' => 'current holdings'),
		array('id' => '5', 'who' => 'Socrates', 'mug' => 'socrates-150x150.jpg', 'where' => '/player/5',
			'recent_trans' => 'recent transactions', 'current_holds' => 'current holdings'),
		array('id' => '6', 'who' => 'Isaac Asimov', 'mug' => 'isaac-asimov-150x150.jpg', 'where' => '/player/6',
			'recent_trans' => 'recent transactions', 'current_holds' => 'current holdings'),
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single quote
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record){
			if ($record['id'] == $which){
				return $record;
                        }
                }
		return null;
	}

	// retrieve all of the players
	public function all()
	{
		return $this->data;
	}

	// retrieve the first quote
	public function first()
	{
		return $this->data[0];
	}

	// retrieve the last quote
	public function last()
	{
		$index = count($this->data) - 1;
		return $this->data[$index];
	}

}
