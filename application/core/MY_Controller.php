<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright   2010-2013, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

	protected $data = array();	  // parameters for view components
	protected $id;				  // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct() {
		parent::__construct();
		$this->data = array();
		$this->data['title'] = 'Stock Ticker';	// our default title
		$this->errors = array();
		$this->data['pageTitle'] = 'welcome';   // our default page
                $this->data['stocks-drop'] = $this->dropdown_stocks();
                $this->data['players-drop'] = $this->dropdown_players();
                $this->data['Registration'] = $this->data['pagebody'] = 'Registration';
	}

	/**
	 * Render this page
	 */
	function render() {
		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		if (empty($this->session->userdata('username')))
			$this->data['login'] = $this->parser->parse('login', $this->data, true);
		else {
        	$this->data['username'] = $this->session->userdata('username');
			$this->data['login'] = $this->parser->parse('logoff', $this->data, true);
		}

		// finally, build the browser page!
		$this->data['data'] = &$this->data;
		$this->parser->parse('_template', $this->data);
	}

        public function dropdown_stocks() {
                $result = '';
                $q = $this->stocks->stock_names();
                foreach($q->result() as $row) {
                    $result .= $this->parser->parse('stock_dropdown', (array) $row, true);
                }
                $data['options'] = $result;
                return $this->parser->parse('the_dropdown', $data);
        }
        
        public function dropdown_players() {
                $result = '';
                $q = $this->players->player_names();
                foreach($q->result() as $row) {
                    $result .= $this->parser->parse('player_dropdown', (array) $row, true);
                }
                $data['options'] = $result;
                return $this->parser->parse('the_dropdown', $data);
        }
        public function register(){
            $this->data['pagebody'] = 'Registration';
        }
}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */