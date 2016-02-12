<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our players model has been autoloaded, because we use it everywhere.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class User extends Application {

    function __construct() {
        parent::__construct();
    }

    function login() {
        $user = $this->input->post('username');

        $newdata = array('username'  => $user);
        $this->session->set_userdata($newdata);

        redirect($this->agent->referrer());
    }

    function logoff() {
        $this->session->unset_userdata('username');

        redirect($this->agent->referrer());
    }
}
