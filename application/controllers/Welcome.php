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

	function __construct() {
		parent::__construct();
	}

	//-------------------------------------------------------------
	//  The normal pages
	//-------------------------------------------------------------

	function index() {
		$this->data['pagebody'] = 'homepage';	// this is the view we want shown
		// build the list of authors, to pass on to our view
		$source = $this->players->all(); //ART I WAS EDITING HERE
                $source2 = $this->stocks->all();
                $source3 = $this->players->get_players();
                foreach ($source3->result() as $record) {
                    $portfolios[] = array('who' => $record->Player);
                }
                $this->data['portfolios'] = $portfolios;
                
                
		$portfolios = array();
                $stockportfolios = array();
                /*
		foreach ($source as $record) {
			$portfolios[] = array('who' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where']);
		}
		$this->data['portfolios'] = $portfolios;
                */
                foreach ($source2 as $record2) {
			$stockportfolios[] = array('who' => $record2['who'], 'mug' => $record2['mug'], 'href' => $record2['where']);
		}
		$this->data['stockportfolios'] = $stockportfolios;

		$this->render();
	}
        /*
        function parse_players() {
            
                $result = '';
                
                $q = $this->players->get_players();
                
                foreach ($q->result() as $row) {
                    $row->StockValue = $this->players->get_stock_value($row->Player);
                    $row->Equity = $row->StockValue + $row->Cash;
                    $result .= $this->parser->parse('homepage/player_row', (array) $row, true);
                }
                
                $data['rows'] = $result;
                
                return $this->parser->parse('homepage/players_table', $data, true);
           
                
        }
        */
        
        function stock($id){
                $record2 = $this->stocks->data[$id-1];
                $this->data = array_merge($this->data, $record2);
                $this->data['pagebody'] = 'stockhistory';

                $this->render();
        }

        function player($id){
                $q = $this->players->get_trans($id);
                foreach($q->result() as $record) {
                    $transactions[] = array('key' => $record->Code, 'otherkey' => $record->Column);
                }
                $this->data['portfolios'] = $transactions;
                
                $this->data['pagebody'] = 'portfolio';
                $this->data['who'] = $id;
                $this->render();
        }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */
