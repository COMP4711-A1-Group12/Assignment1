<?php

/**
 * Controller handling logging in/out and creating a session.
 * 
 * controllers/User.php
 *
 * ------------------------------------------------------------------------
 */
class User extends Application {

    function __construct() {
        parent::__construct();
    }

    function login() {
        $user = $this->input->post('username');

        $newdata = array('username' => $user);
        $this->session->set_userdata($newdata);
        
        redirect($this->agent->referrer());
    }

    function logoff() {
        $this->session->unset_userdata('username');

        redirect($this->agent->referrer());
    }
}
