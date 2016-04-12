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
	public function __construct() {
		parent::__construct();
	}

        public function stock_names() {
                $query = $this->db->query('SELECT Code FROM stocks');
                return $query;
        }
        
	public function get_stocks() {
                $query = $this->db->query('SELECT * FROM stocks');
                return $query;
        }

        public function get_trans($id) {
                $q = $this->db->query('SELECT DateTime, Stock, Trans, Quantity FROM transactions where Stock = "' . $id. '" ORDER BY DateTime DESC');
                return $q;
        }
        
        public function get_a_stocks_moves($id) {
                $query = $this->db->query('SELECT * FROM movements where Code = "' . $id. '" ORDER BY Datetime DESC');
                return $query;
        }
        
        public function get_all_moves($id) {
                $query = $this->db->query('SELECT * FROM movements ORDER BY Datetime DESC');
                return $query;
        }

	// retrieve all of the stocks
	public function all() {
		return $this->data;
	}

	// retrieve the first quote
	public function first() {
		return $this->data[0];
	}

	// retrieve the last quote
	public function last() {
		$index = count($this->data) - 1;
		return $this->data[$index];
	}

}
