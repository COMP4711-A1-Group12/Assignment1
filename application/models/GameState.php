<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GameState extends CI_Model {
    
    public function __construct() {
	parent::__construct();
    }
    
    function gameStatus(){
        $homepage = file_get_contents('http://bsx.jlparry.com/status');
        $xml = simplexml_load_string($homepage);
        return $xml;
    }
    
}