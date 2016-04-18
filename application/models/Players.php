<?php

/**
 * This is a "CMS" model for players, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Players extends CI_Model {   
	// Constructor
	public function __construct() {
		parent::__construct('players', 'id');
	}

        public function player_names() {
                $query = $this->db->query('SELECT Player FROM players');
                return $query;
        }
        
        public function get_players() {
                $query = $this->db->query('select * from players');
     
                return $query;
        }
        public function get_assets($id) {
                $query = $this->db->query('select sum(quantity) from transactions where Player = "'
                        .$id . '" and trans = "buy"');
            
                foreach($query->row() as $id){
                    return $id;
                }
                return false;
        }
        public function get_liabilities($id) {
                $query = $this->db->query('select sum(quantity) from transactions where Player = "'
                        .$id . '" and trans = "sell"');
            
                foreach($query->row() as $id){
                    return $id;
                }
                return false;
        }        

        public function get_trans($id) {
                $q = $this->db->query('SELECT DateTime, Stock, Trans, Quantity FROM transactions where Player = "' . $id. '" ORDER BY DateTime DESC');
                return $q;
        }
        
        public function get_holds($id) {
                $q = $this->db->query('SELECT Stock, Quantity, Value FROM holdings where Player = "' . $id. '" ORDER BY Stock DESC');
                return $q;
        }
        
	// retrieve all of the players
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
