<?php

//restrited to admin
//links: redownload stock data from bsx OR monitor bsx server for game status
//set defaults: frequency of state checking OR transaction tracking

/*register with bsx server 
 * IF game is "ready" or "open" POST to bsx/register:
 * team: B00
 * name: team name
 * password: on d2l
 * 
 * server responds with xml document with team code, auth token. valid for max 2
 * 
 */
 
class agentManagement extends MY_Controller {

    function __construct() {
        parent::__construct();   
    }
    function index(){
       
        $status = $this->GameState->gameStatus();
        if((string)$status->desc != "closed"){    
            $xml = simplexml_load_string($this->response());           
        }
        else{
           print_r('error');
        }

        $this->render();
    }
    function response(){
        $postdata = http_build_query(
            array(
                'team' => 'B12',
                'name' => 'comp4711team12',
                'password' => 'tuesday'
            )
        );
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context = stream_context_create($opts);
        $result = file_get_contents('http://bsx.jlparry.com/register', false, $context);
        print_r($result);
        return $result;            
    }
}