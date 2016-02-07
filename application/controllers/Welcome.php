<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our players model has been autoloaded, because we use it everywhere.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Welcome extends Application {

	function __construct()
	{
		parent::__construct();
	}

	//-------------------------------------------------------------
	//  The normal pages
	//-------------------------------------------------------------

	function index()
	{
		$this->data['pagebody'] = 'homepage';	// this is the view we want shown
		// build the list of authors, to pass on to our view
		$source = $this->players->all();
		$portfolios = array();
		foreach ($source as $record)
		{
			$portfolios[] = array('who' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where']);
		}
		$this->data['portfolios'] = $portfolios;

		$this->render();
	}
        
        function shucks()
	{
            
                $this->data['pagebody'] = 'portfolio';
		$record = $this->players->get(2);
		$this->data = array_merge($this->data, $record);
		
		$this->render();
        }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */
