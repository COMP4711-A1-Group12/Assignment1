<?php

/**
* controllers/Bingo.php
*/

class Bingo extends Application
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$record = $this->players->get(5);
		$this->data = array_merge($this->data, $record);
		$this->data['pagebody'] = 'justone';
		$this->render();	
	}
}
