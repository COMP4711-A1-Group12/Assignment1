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
        $this->render();
    }
    function connect(){
        $mysql_hostname = "localhost";
        $mysql_user = "root";
        $mysql_password = "";
        $mysql_database = "comp4711";
        $prefix = "";
        $bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
        mysql_select_db($mysql_database, $bd) or die("Could not select database");

        session_start();
//        include('connection.php');
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $mname=$_POST['mname'];
        $address=$_POST['address'];
        $contact=$_POST['contact'];
        $pic=$_POST['pic'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        mysql_query("INSERT INTO member(fname, lname, gender, address, contact, picture, username, password)"
                . "VALUES('$fname', '$lname', '$mname', '$address', '$contact', '$pic', '$username', '$password')");
        header("location: registration.php?remarks=success");
        mysql_close($con);
    }

}