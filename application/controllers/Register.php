<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Register extends Application {

    function __construct() {
        parent::__construct();   
    }
    function index(){
        $this->data['pagebody'] = 'registration';
        $this->load->helper('form');
        $this->render();
    }
    function insert(){
        
        $form_data = $this->input->post();
        $first = $this->input->post("fname");
        $last = $this->input->post("lname");       
        $user = $this->input->post("username");
        $pass = $this->input->post("password");
        $pic = $this->input->post("picture");
        
        $data = array(
           'fname' => $first,
           'lname' => $last ,
           'username' => $user,
           'password' => $pass,
           'picture' => $pic
        );

        $this->db->insert('member', $data); 
        echo 'success';
    }
}