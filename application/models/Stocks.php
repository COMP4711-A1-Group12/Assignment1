<?php

/**
 * This is a "CMS" model for players, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Stocks extends CI_Model {

	// The data comes from http://www.quotery.com/top-100-funny-quotes-of-all-time/?PageSpeed=noscript
	var $data = array(
		array('id' => '1', 'who' => 'gold', 'mug' => 'gold.jpg', 'where' => '/stock/1',
			'what' => '$1000'),
		array('id' => '2', 'who' => 'oil', 'mug' => 'oil.jpg', 'where' => '/stock/2',
			'what' => '$500'),
		array('id' => '3', 'who' => 'bonds', 'mug' => 'bonds.jpg', 'where' => '/stock/3',
			'what' => '$600')
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
		foreach ($this->data as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	// retrieve all of the stocks
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
