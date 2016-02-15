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
                $source4 = $this->stocks->get_stocks();
                
                foreach ($source3->result() as $record) {
                    $portfolios[] = array('who' => $record->Player, 'cash' => $record->Cash,
                        'equity' => ((string)$record->Cash + $this->players->get_equity($record->Player)));
                }
                $this->data['portfolios'] = $portfolios;
                
                foreach ($source4->result() as $record) {
                    $stockportfolios[] = array('what' => $record->Code, 'value' => $record->Value);
                }
                $this->data['stockportfolios'] = $stockportfolios;
                
		$this->render();
	}
        
        function stock($id){
                $this->data['stock-history'] = $this->stock_trade_activity($id);
                $this->data['stock-moves'] = $this->some_stock_moves($id);
                $this->data['pagebody'] = 'stockhistory/stockhistory';
                $this->data['what'] = $id;
                $this->render();
        }

        function player($id){
                $this->data['player-activity'] = $this->player_trade_activity($id);
                $this->data['pagebody'] = 'portfolio/portfolio';
                $this->data['who'] = $id;
                $this->render();
        }
        
        public function some_stock_moves($id) {
                $result = '';
                $q = $this->stocks->get_a_stocks_moves($id);
                foreach($q->result() as $row){
                    $result .= $this->parser->parse('stockhistory/moves-row', (array) $row, true);
                }
                return $this->parser->parse('stockhistory/moves-table' , array('rows' => $result), true);
        }
        
        public function stock_trade_activity($id) {
                $result = '';
                $q = $this->stocks->get_trans($id);
                foreach($q->result() as $row){
                    $result .= $this->parser->parse('stockhistory/trans-row', (array) $row, true);
                }
                return $this->parser->parse('stockhistory/trans-table' , array('rows' => $result), true);
        }
        
        public function player_trade_activity($id) {
                $result = '';
                $q = $this->players->get_trans($id);
                foreach($q->result() as $row){
                    $result .= $this->parser->parse('portfolio/trans-row', (array) $row, true);
                }
                return $this->parser->parse('portfolio/trans-table' , array('rows' => $result), true);
        }
        
}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */
