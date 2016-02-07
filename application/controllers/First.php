<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our players model has been autoloaded, because we use it everywhere.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class First extends Application {

	function __construct()
	{
		parent::__construct();
	}

	//-------------------------------------------------------------
	//  The normal pages
	//-------------------------------------------------------------

	function index()
        {
		$this->data['pagebody'] = 'portfolio';
		$record = $this->players->first();
		$this->data = array_merge($this->data, $record);
		
		$this->render();
	}
        
        function zzz()
        {
                $this->data['pagebody'] = 'portfolio';
		$record = $this->players->first();
		$this->data = array_merge($this->data, $record);
		
		$this->render();
        }
        
        function gimme($num) 
        {
                if(isset($num)) {
                    $this->data['pagebody'] = 'portfolio';
		$record = $this->players->data[$num - 1];
		$this->data = array_merge($this->data, $record);
		
		$this->render();
                }
        }
        
}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */
