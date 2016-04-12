<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 
class gamePlay extends MY_Controller {

    function __construct() {
        parent::__construct();   
    }
    function index(){
        $this->load->model('GameState');
        $status = $this->GameState->gameStatus();
        $this->load->view('game');
        if((string)$status->desc != "closed"){    
//            
//            $this->data['status'] = ;
        }
        $this->data['status'] = "the game is closed";
        $this->render();
    }
    function sell(){
        
    }
    
    function buy(){
        
    }
}

//restricted to current logged in only (only in navbar when logged in)
//show portfolio (cash , equity, current market status)
//choose a stock and quantity
//buy or sell actions

/*
 * SELL STOCK - POST request to bsx/sell with fields:
 * team: team code
 * token: your agent auth token
 * player: name
 * stock: code of stock player wishes to sell
 * quantity: of stocks
 * certificate: code for stock - can be more than one
 * 
 * BUY STOCK - POST request to bsx/buy with fields:
 * team: team code
 * token: your agent auth token
 * player: name
 * stock: code of stock player wishes to sell
 * quantity: of stocks
 * 
 * IF sufficient cash: stock certificate returned as XML doc
 * team: team code
 * player: name
 * stock: code of stock player wishes to sell
 * quantity: of stocks
 * certificate: code for stock - can be more than one
 * & receipt for cash spent
 * 
 * ELSE error message
     */